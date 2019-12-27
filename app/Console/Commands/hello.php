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
        $commitComment = $this->ask('Опишите какие ИЗМЕНЕИЯ внесены в проект: ');
        $currentBranch = $this->ask('Укажите ИМЯ ВЕТКИ, на которой были изменения: ');
        //на клиенте
        system('git add .');
        system('git commit -m "'.$commitComment.'"');
        system('git checkout master');
        system('git merge '.$currentBranch);
        system('git push origin master');
        system('git checkout '.$currentBranch);

        //на сервер
        if ($this->confirm('Вносим изменения на хостинг? [y|n]:')){
            system('ssh egoist68@egoist68.beget.tech');
            system('cd athlete-profile.loc');
            system('git pull origin');
            system('composer-php7.2 install');
            system('php artisan migrate');
            system('exit');
        }

    }
}
