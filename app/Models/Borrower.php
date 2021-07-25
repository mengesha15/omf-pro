<?php

namespace App\Models;
use App\Models\Branch;
use App\Models\LoanService;
use App\Models\ApprovedLoan;
use App\Models\LoanDisburseRecord;
use App\Models\RequestedLoan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName',
        'middleName',
        'lastName',
        'address',
        'birthDate',
        'phoneNumber',
        'borrower_status',
        'borrowed_amount',
        'user_id',
        'branch_id',
        'loan_service_id',
        'borrowerPhoto',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'status',
    ];


    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function loanService(){
        return $this->belongsTo(LoanService::class);
    }
    public function approvedLoan(){
        return $this->hasMany(ApprovedLoan::class);
    }
    public function disburseRecord(){
        return $this->hasMany(LoanDisburseRecord::class);
    }
    public function requestedLoan(){
        return $this->hasOne(RequestedLoan::class);
    }
}
