<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class PrepareDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prepare:db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prepare Db with dummy Data';

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
        try
        {
            $this->info('preparing db...');
            Artisan::call('migrate:fresh');
            Artisan::call('db:seed');
            $this->info('prepared db successfully');
        }catch(Exception $e)
        {
            dd($e->getMessage());
        }

    }
}
