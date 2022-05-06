<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\ZipCodesImport;
class ZipCodesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:zipcodes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        \Excel::import(new ZipCodesImport, public_path('zipcodes.xls'));
    }
}
