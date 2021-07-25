<?php

namespace App\Models;
use App\Models\Account;
use App\Models\Branch;
use App\Models\SavingService;
use App\Models\SavingTransaction;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
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
        'customer_status', // what is the job of this customer
        'birthDate',
        'account_balance',
        'phoneNumber',
        'branch_id',
        'account_number',
        'saving_service_id',
        'customerPhoto',
    ];


    public function account(){
        return $this->hasMany(Account::class);
    }
    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function savingService(){
        return $this->belongsTo(SavingService::class);
    }
    public function savingTransaction(){
        return $this->hasMany(SavingTransaction::class);
    }
}
