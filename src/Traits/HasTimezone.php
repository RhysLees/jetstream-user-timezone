<?php

namespace RhysLees\JetstreamUserTimezone\Traits;

trait HasTimezone
{
    /**
     * Get the user's timezone.
     *
     * If the user has a timezone set, use that, otherwise use the default timezone
     */
    public function getTimezoneAttribute(): string
    {
        if ($this->attributes['timezone'] != null) {
            return $this->attributes['timezone'];
        } else {
            return config('jetstream-user-timezone.default_timezone');
        }
    }
}
