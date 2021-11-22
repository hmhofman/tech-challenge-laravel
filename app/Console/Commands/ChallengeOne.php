<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ChallengeOne extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'techchallenge:one';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run tech challenge one';

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
     * @return int
     */
    public function handle()
    {
        // put your code here

        return Command::SUCCESS;
    }
}
