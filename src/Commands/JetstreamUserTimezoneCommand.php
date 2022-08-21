<?php

namespace RhysLees\JetstreamUserTimezone\Commands;

use Illuminate\Console\Command;

class JetstreamUserTimezoneCommand extends Command
{
    public $signature = 'jetstream-user-timezone';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
