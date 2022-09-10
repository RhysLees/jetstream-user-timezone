<?php

namespace RhysLees\JetstreamUserTimezone\Rules;

use Illuminate\Contracts\Validation\Rule;

class TimezoneRule implements Rule
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
        if (config('jetstream-user-timezone.timezones') == []) {
            return true;
        }

        return in_array($value, config('jetstream-user-timezone.timezones'));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a valid timezone from the available options.';
    }
}
