<?php

namespace Backweb\WcRequestQuote\Console;

use Roots\Acorn\Console\Commands\Command;
use Backweb\WcRequestQuote\Facades\Example;

class ExampleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'example';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'My custom Acorn command.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info(
            Example::getQuote()
        );
    }
}
