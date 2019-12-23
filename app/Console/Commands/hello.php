<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class hello extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hello1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command executes git status';

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
        //
       if (system('git status')) $this->info('OK!');
       else $this->info('FAILED!');
    }
}
