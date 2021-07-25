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
        'discription',
        'interest_rate',
    ];

    public function borrower(){
        return $this->hasMany(Borrower::class);
    }
    public function approvedLoan(){
        return $this->hasMany(ApprovedLoan::class);
    }

    public function requestedLoan(){
        return $this->hasMany(RequestedLoan::class);
    }
}
