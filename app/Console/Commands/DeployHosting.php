<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeployHosting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deploy:hosting';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command executes changes of current project to Hosting Server';

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
        //на сервер
        system('ssh egoist68@egoist68.beget.tech');
        system('cd athlete-profile.loc');
        system('git pull origin');
        system('composer-php7.2 install');
        system('php artisan migrate');
        system('exit');
    }
}
