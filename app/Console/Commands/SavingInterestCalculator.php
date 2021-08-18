<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\DB;

use App\Models\Customer;

class SavingInterestCalculator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'savingInterest:calculator';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Saving inerest calculation of omf.';

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
        $customers = Customer::join('saving_services','saving_services.id','=','customers.saving_service_id')->select('account_balance','account_number','saving_service_interest_rate')->get();
        foreach ($customers as $customer) {
            $account_balance = $customer->account_balance;
            $account_number = $customer->account_number;
            $interest_rate = $customer->saving_service_interest_rate;
            $intererst = ($account_balance*$interest_rate)/518400;
            $new_balance = round($account_balance + $intererst,2);
            Customer::where('account_number',$account_number)->update([
                'account_balance' => $new_balance
            ]);
            echo 'Acc No: '.$account_number.' Current balance :'.$account_balance.' Interest rate: '.$interest_rate.' New balance:'.$new_balance."\n";
        }
        echo "\n";echo "\n";
        echo "Wait for next update\n---------------------\n";

    }
}
