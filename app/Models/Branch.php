<?php

namespace App\Models;
use App\Models\Employee;
use App\Models\Borrower;
use App\Models\Customer;
use App\Models\SavingTransaction;
use App\Models\LoanDisburseRecord;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'branch_name',
        'branch_location',
    ];
    
    
    public function employees(){
        return $this->hasMany(Employee::class);
    }
    public function borrowers(){
        return $this->hasMany(Borrower::class);
    }
    public function customers(){
        return $this->hasMany(Customer::class);
    }
    public function disbursed_record(){
        return $this->hasMany(LoanDisburseRecord::class);
    }
    public function saving_transactions(){
        return $this->hasMany(SavingTransaction::class);
    }
}
