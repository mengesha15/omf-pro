<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\DB;

use App\Models\Borrower;

class LoanInterestCalculator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'loanInterest:calculator';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loan interest calculator for omf company.';

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
        Borrower::where('borrowed_amount',0)->delete();
        echo "New loan update\n----------------\n";
        $borrowers = Borrower::join('loan_services','loan_services.id','=','borrowers.loan_service_id')->select('borrowed_amount','roll_number','loan_service_interest_rate')->get();
        foreach ($borrowers as $borrower) {
            $borrowed_amount = $borrower->borrowed_amount;
            $roll_number = $borrower->roll_number;
            $interest_rate = $borrower->loan_service_interest_rate;
            $intererst = ($borrowed_amount*$interest_rate)/518400;
            $new__borrowed_amount = round($borrowed_amount + $intererst,2);
            Borrower::where('roll_number',$roll_number)->update([
                'borrowed_amount' => $new__borrowed_amount,
            ]);
            echo 'Roll No: '.$roll_number.' Current borrowed: '.$borrowed_amount.' Interest rate '.$interest_rate.' New borrowed: '.$new__borrowed_amount."\n";
        }
        echo "\n\n New saving update\n----------------\n";
    }
}
