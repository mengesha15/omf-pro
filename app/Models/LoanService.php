<?php

namespace App\Models;
use App\Models\Borrower;
use App\Models\ApprovedLoan;
use App\Models\RequestedLoan;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'loan_term'
    ];

    public function borrower(){
        return $this->hasMany(Borrower::class);
    }
    public function approve_loans(){
        return $this->hasMany(ApprovedLoan::class);
    }

    public function requested_loans(){
        return $this->hasMany(RequestedLoan::class);
    }
}
