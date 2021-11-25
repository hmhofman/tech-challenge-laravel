<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \ZipArchive;
use App\Models\Huge;

class ChallengeTwo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'techchallenge:two';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run tech challenge two';

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
        $dataFolder = '/var/www/html/data/';
        $filename = "${dataFolder}huge.zip";
        $zip = new \ZipArchive;

        $res = $zip->open($filename);
        if ($res === true) {
            $zip->extractTo("${dataFolder}huge.csv");
            $zip->close();
            echo "Memory usage after extraction: ". round(memory_get_peak_usage()/1000000, 2);

            $handle = fopen("${dataFolder}huge.csv/huge", "r");
            $header = false;
            $counter = 0;
            if ($handle) {
                while (($line = fgets($handle)) !== false) {
                    $counter += 1;
                    if (!$header) {
                        $header = true;
                        continue;
                    } else {
                        $data = explode("\t", $line);
                        if (count($data) == 6) {
                            // id	first_name	last_name	email	gender	ip_address
                            $huge = [
                                'id' => $data[0],
                                'first_name' => $data[1],
                                'last_name' => $data[2],
                                'email' => $data[3],
                                'gender' => $data[4],
                                'ip_address' => $data[5]
                            ];
                            $huge = Huge::create($huge);
                            $huge->save();
                            // dd($huge);
                        } else {
                            dd($data);
                        }
                    }
                    if ($counter % 1000 == 0) {
                        echo ($counter/1000).' ';
                        if ($counter/10000) {
                            echo "\r\n";
                        }
                    }
                }
                
                fclose($handle);
            } else {
                return Command::ERROR;
            } 
        }
        echo "Memory usage after import: ". round(memory_get_peak_usage()/1000000, 2);
        return Command::SUCCESS;
    }
}
