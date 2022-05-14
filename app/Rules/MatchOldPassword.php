<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class MatchOldPassword implements Rule
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
        return Hash::check($value, auth()->user()->password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {

        // if(\App::getLocale() == 'ru') {
        //     return 'The :attribute is match with old password.';               
        // }
        // elseif(\App::getLocale() == 'en') {
        //     return ':attribute соответствует старому паролю.';                      
        // }
        // else {
            return 'köne parol nädogry.';
        // }
    }
}
