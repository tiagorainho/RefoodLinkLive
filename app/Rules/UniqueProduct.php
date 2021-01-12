<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Product;
use App\Models\Establishment;

class UniqueProduct implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return count(Establishment::find($value['establishment_id'])->products()->get()->where('name', '=', $value['name'])->where('id', '!=', $value['id']))==0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O nome do produto não é único';
    }
}
