<?php

namespace App\Console\Commands;

use App\Mail\NewEmployeesMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendNewEmployeesEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to companies which has new entered employee';

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
        // Get companies which has employees entered in last week
        
        $companies = \App\Company::with('newEmployees')->whereHas('newEmployees')->get();

        foreach($companies as $company)
        {
            Mail::to($company->email)->send(new NewEmployeesMail($company,$company->newEmployees));
        }
    }
}
