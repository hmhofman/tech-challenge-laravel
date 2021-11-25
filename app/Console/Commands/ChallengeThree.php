<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Address;

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
        // $this->parentPID = getmypid(); 
        // pcntl_signal(SIGCHLD, array($this, "childSignalHandler"));
    }

    private $recordCount = 5000;
    private $threadCount = 40;
    private function getAddress($amount)
    {

        // return $records;
    }
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $master = curl_multi_init();

        $curl_arr = [];
        for ($loop = 0; $loop < $this->recordCount / $this->threadCount; $loop ++) {
            for ($i = 0; $i < $this->threadCount; $i++) {
                $curl_arr[$i] = curl_init('https://random-data-api.com/api/address/random_address');
                curl_setopt($curl_arr[$i], CURLOPT_RETURNTRANSFER, true);
                curl_multi_add_handle($master, $curl_arr[$i]);
            }
            do {
                curl_multi_exec($master, $running);
            } while($running > 0);

            for ($i = 0; $i < $this->threadCount; $i++) {
                $record = curl_multi_getcontent($curl_arr[$i]);
                // dd($results, $curl_arr[$i]);
                $address = new Address(json_decode($record, true));
                $address->save();
            }
        }
        curl_multi_close($master);

        return Command::SUCCESS;
    }

    
}
