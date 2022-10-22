<?php

namespace App\Console\Commands;

use App\Http\Controllers\SalaryController;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salary:calculate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will genrate salary for all users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $salary=new SalaryController();
        $salary->calculate();
    }
}
