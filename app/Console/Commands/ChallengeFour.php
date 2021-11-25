<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Barryvdh\Snappy;
use Barryvdh\Snappy\IlluminateSnappyPdf;
use Barryvdh\Snappy\Facades\SnappyPdf;


class ChallengeFour extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'techchallenge:four';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run tech challenge four';

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
        $html = view(
            'random',
            []
        );
        $html = $html->render();
        // dd($html);

        $pdf = \App::make('snappy.pdf.wrapper');
        $pdf->setPaper('a4')
            ->setOption('margin-top', 70 + config('snappy.pdf.options.margin-top'))
            ->setOption('margin-bottom', 30 + config('snappy.pdf.options.margin-bottom'))
            // ->setOption('enable-local-file-access', "")
            ->setOption('load-error-handling', 'ignore')
            ->setOption('dpi', 150);

        $pdf->loadHTML($html);
        $file = '/var/www/html/data/ChallengeFour.pdf';
        if (file_exists($file)) {
            unlink($file);
        }
        $pdf->save($file);

        return Command::SUCCESS;
    }
}
