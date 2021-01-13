<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Establishment;

class UniqueEstablishment implements Rule
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
        return count(Establishment::where('name', '=', $value['name'])->where('id', '!=', $value['id'])->get())==0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Nome do estabelecimento já em utilização.';
    }
}
