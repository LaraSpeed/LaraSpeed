<?php

/**
 *
 * This class is the actual definition of the "php artisan code:generate command"
 */

namespace Berthe\Codegenerator;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Event;

class GenerateCodeCmd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'code:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is a Laravel Code Generator from MCD';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //Generator
        Event::fire('launch');
    }
}
