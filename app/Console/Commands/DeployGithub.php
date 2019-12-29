<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeployGithub extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deploy:github';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command executes changes of current project to github';

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

        system("
            git add .;
            git commit -m \"$commitComment\";
            git checkout master;
            git merge $currentBranch;
            git push origin master;
            git checkout $currentBranch;
        ");
    }
}
