<?php

namespace App\Models;
use App\Models\LoanService;
use App\Models\Borrower;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestedLoan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'requesed_amount',
        'requested_loan_id',
        'ruquested_by',
        'approved_by',
        'loan_service_id',
    ];

    protected $hidden = [
        'status'
    ];

    public function loanService(){
        return $this->belongsTo(LoanService::class);
    }
    public function borrower(){
        return $this->belongsTo(Borrower::class);
    }
}
