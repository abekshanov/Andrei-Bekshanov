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
    protected $signature = 'deploy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command executes changes of current project to github and to hosting server';

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
 /*       $commitComment = $this->ask('Опишите какие изменения внесены в проект: ');
 //на клиенте
        system('git add .');
        system('git commit -m "description....."');
        system('git checkout master');
        system('git merge нужная_ветка');
        system('git push origin master');
        system('git checkout нужная_ветка');
 //на сервер
        system('ssh egoist68@egoist68.beget.tech');
        system('cd athlete-profile.loc');
        system('git pull origin');
        system('php artisan migrate');
        system('exit');



        if ($ok) {
            $this->info('OK!');
        }
        else {
            $this->info('FAILED!');
        }*/
    }
}
