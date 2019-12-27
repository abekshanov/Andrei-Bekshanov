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
        exec('git add .');
        exec('git commit -m "'.$commitComment.'"');
        exec('git checkout master');
        exec('git merge '.$currentBranch);
        exec('git push origin master');
        exec('git checkout '.$currentBranch);

        //на сервер
        if ($this->confirm('Вносим изменения на хостинг? [y|n]:')){
            exec('ssh egoist68@egoist68.beget.tech');
            exec('cd athlete-profile.loc');
            exec('git pull origin');
            exec('composer-php7.2 install');
            exec('php artisan migrate');
            exec('exit');
        }

    }
}
