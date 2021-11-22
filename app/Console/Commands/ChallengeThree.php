<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ChallengeThree extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'techchallenge:three';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run tech challenge three';

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
        return Command::SUCCESS;
    }
}
