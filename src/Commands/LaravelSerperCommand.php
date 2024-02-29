<?php

namespace GregPriday\LaravelSerper\Commands;

use Illuminate\Console\Command;

class LaravelSerperCommand extends Command
{
    public $signature = 'laravel-serper';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
