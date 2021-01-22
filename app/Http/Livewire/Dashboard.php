<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Order;

class Dashboard extends Component
{
    public $mensal_earnings = 0;
    public $anual_earnings = 0;
    public $efficiency = 0;
    public $pending_orders = 0;
    public $orders_price_sum_all = 0;
    public $user_id;
    public $establishments;
    public $chart_structure;
    public $months_passed = 12;
    public $months = [
        '1'     =>  'Jan',
        '2'     =>  'Fev',
        '3'     =>  'Mar',
        '4'     =>  'Abr',
        '5'     =>  'Mai',
        '6'     =>  'Jun',
        '7'     =>  'Jul',
        '8'     =>  'Ago',
        '9'     =>  'Set',
        '10'    =>  'Out',
        '11'    =>  'Nov',
        '12'    =>  'Dez'
    ];
    public $label = [];
    public $data = [];    
    public $chart_info = '';

    public function render()
    {
        return view('pages.dashboard');
    }

    public function set_earnings_chart($establishments, $c = false)
    {
        $now = Carbon::now();
        $months = [];
        $year = $now->year;
        for($i=0; $i<$this->months_passed;$i++) {
            $idx = (12 + $now->month - $i - 1)%12+1;
            $months[$idx] = 0;
            if($idx == 12) $year -= 1;
            array_push($this->label, $this->months[$idx].' '.($year-2000));
        }
        foreach($establishments as $establishment) {
            foreach($establishment['orders'] as $order) {
                if($order['state'] == Order::PAYED) {
                    $diff = Carbon::parse($order['created_at'])->diffInMonths($now);
                    if($diff<=$this->months_passed) {
                        $months[(12 + $now->month - $diff - 1)%12+1] += $order['price'];
                    }
                }
            }
        }
        $this->chart_info = '{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:'.str_replace('"', '&quot;',json_encode(array_reverse($this->label))).',&quot;datasets&quot;:[{&quot;label&quot;:&quot;Earnings&quot;,&quot;fill&quot;:true,&quot;data&quot;:'.str_replace('"', '&quot;',json_encode(array_values(array_reverse($months)))).',&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;padding&quot;:20}}]}}}';
    }

    public function update_earnings_chart($establishment)
    {
        $this->set_earnings_chart([$establishment], true);
    }

    public function mount()
    {
        $now = Carbon::now();
        $user = Auth()->user();
        $this->user_id = $user->id;
        $this->establishments = $user->establishments()->get();
        $orders_total = $orders_completed = $orders_canceled = 0;
        foreach($this->establishments as $establishment) {
            $orders = $establishment->orders()->get();
            $establishment['orders'] = $orders;
            $orders_total += count($orders);
            $orders_price_sum = 0;
            foreach($orders as $order) {
                // year
                if($order->created_at->year == $now->year) {
                    if($order->isPayed()) {
                        $this->anual_earnings += $order->price;
                        // month
                        if($order->created_at->month == $now->month) $this->mensal_earnings += $order->price;
                    }
                }
                if($order->isPending()) $this->pending_orders += 1;
                else if($order->isPayed()) {
                    $orders_completed += 1;
                    $orders_price_sum += $order->price;
                }
                else $orders_canceled += 1;
            }
            $establishment['total_earnings'] = $orders_price_sum;
            $this->orders_price_sum_all += $orders_price_sum;
        }
        if($this->orders_price_sum_all == 0) $this->orders_price_sum_all = 1;
        foreach($this->establishments as $establishment) {
            $establishment['percentage_total_earnings'] = $establishment->total_earnings*100/$this->orders_price_sum_all;
        }
        $this->establishments = $this->establishments->sortByDesc('total_earnings');
        if($orders_completed + $orders_canceled == 0) $orders_completed = 1;
        $this->efficiency = round(($orders_completed/($orders_completed + $orders_canceled))*100, 1);
        $this->pending_orders = $orders_total - $orders_completed;
        $this->set_earnings_chart($this->establishments);
    }
}
