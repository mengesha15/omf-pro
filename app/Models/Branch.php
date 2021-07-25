<?php

namespace App\Models;
use App\Models\Employee;
use App\Models\Borrower;
use App\Models\Customer;
use App\Models\SavingTransaction;

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
        'branchName',
        'location',
    ];
    
    
    public function employee(){
        return $this->hasMany(Employee::class);
    }
    public function borrower(){
        return $this->hasMany(Borrower::class);
    }
    public function customer(){
        return $this->hasMany(Customer::class);
    }
    public function disbursedRecord(){
        return $this->hasMany(LoanDisburseRecord::class);
    }
    public function savingTransaction(){
        return $this->hasMany(SavingTransaction::class);
    }
}
