<?php

namespace RhysLees\JetstreamUserTimezone\Contracts;

interface UpdatesUserTimezone
{
    /**
     * Validate and update the given user's timezone.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input);
}
