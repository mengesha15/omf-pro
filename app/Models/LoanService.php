<?php

namespace App\Models;
use App\Models\ApprovedLoan;
use App\Models\RequestedLoan;
use App\Models\Borrower;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanService extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'loan_service_name',
        'loan_service_description',
        'loan_service_interest_rate',
    ];

    public function borrower(){
        return $this->hasMany(Borrower::class);
    }
    public function approve_loan(){
        return $this->hasMany(ApprovedLoan::class);
    }

    public function requested_loan(){
        return $this->hasMany(RequestedLoan::class);
    }
}
