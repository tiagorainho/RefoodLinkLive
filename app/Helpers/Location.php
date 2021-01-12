<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class Location {

    public static function distance($first_coords, $second_coords) {
        $earthRadius = 6371;

        $latFrom = deg2rad($first_coords[0]);
        $lonFrom = deg2rad($first_coords[1]);
        $latTo = deg2rad($second_coords[0]);
        $lonTo = deg2rad($second_coords[1]);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return ($angle * $earthRadius);
    }

    public static function convert_address_to_coordinates($address) {
        $response = Http::get('https://api.mapbox.com/geocoding/v5/mapbox.places/'.$address['address'].','.$address['city'].'.json', [
            'access_token' => env('MAPBOX_API_KEY'),
            #'country' => 'pt',
        ])->json();

        $coords = $response['features'];
        $establishment_coords = null;
        if(count($coords)>0) {
            $coords = $coords[0]['geometry']['coordinates'];
            $establishment_coords = [$coords[1], $coords[0]];
        }
        return $establishment_coords;
    }

    public static function get_in_range($list, $person_position, $max_distance) {
        foreach($list as $establishment)
            $establishment['distanceToCoordinate'] = $establishment->distance($person_position);
        return $list->where('distanceToCoordinate', '<', $max_distance);
    }

}