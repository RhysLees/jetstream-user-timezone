<?php

namespace RhysLees\JetstreamUserTimezone\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RhysLees\JetstreamUserTimezone\JetstreamUserTimezone
 */
class JetstreamUserTimezone extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \RhysLees\JetstreamUserTimezone\JetstreamUserTimezone::class;
    }
}
