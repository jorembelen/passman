<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class CheckPass implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $my_password;

   public function __construct($my_password)
   {
       $this->my_password = $my_password;
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
        return  Hash::check($this->my_password, auth()->user()->password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This password did not match with our records. Try again.';
    }
}
