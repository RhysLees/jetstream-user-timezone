<?php

namespace RhysLees\JetstreamUserTimezone\Actions;

use Illuminate\Support\Facades\Validator;
use RhysLees\JetstreamUserTimezone\Contracts\UpdatesUserTimezone;
use RhysLees\JetstreamUserTimezone\Rules\TimezoneRule;

class UpdateUserTimezone implements UpdatesUserTimezone
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  string  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'timezone' => ['present', 'string', 'max:64', 'timezone', new TimezoneRule()],
        ])->validateWithBag('updateTimezone');

        if ($input['timezone'] == '') {
            $input['timezone'] = null;
        }

        $user->forceFill([
            'timezone' => $input['timezone'],
        ])->save();
    }
}
