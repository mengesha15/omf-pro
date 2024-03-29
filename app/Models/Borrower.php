<?php

namespace App\Models;
use App\Models\Branch;
use App\Models\LoanService;
use App\Models\ApprovedLoan;
use App\Models\RequestedLoan;
use App\Models\LoanDisburseRecord;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Helpers\Helper;

class Borrower extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $primaryKey = 'roll_number';

    public $incrementing = false;

    protected $fillable = [
        'roll_number',
        'first_name',
        'middle_name',
        'last_name',
        'borrower_gender',
        'borrower_address',
        'birth_date',
        'phone_number',
        'borrowed_amount',
        'user_username',
        'branch_id',
        'loan_service_id',
        'borrower_photo',
        'borrower_status',
        'status',   // approved or not e.t paid or not

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function loan_service(){
        return $this->belongsTo(LoanService::class);
    }
    public function approved_loan(){
        return $this->hasOne(ApprovedLoan::class);
    }
    public function disburse_records(){
        return $this->hasMany(LoanDisburseRecord::class);
    }
    public function requested_loan(){
        return $this->hasOne(RequestedLoan::class);
    }
}
