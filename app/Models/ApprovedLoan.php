<?php

namespace App\Models;
use App\Models\LoanService;
use App\Models\User;
use App\Models\Borrower;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovedLoan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'approved_amount',
        'approved_loan_id',
        'requested_by',
        'approved_by',
        'borrower_roll_number',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function loanService(){
        return $this->belongsTo(LoanService::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function borrower(){
        return $this->belongsTo(Borrower::class);
    }
}
