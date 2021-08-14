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
     protected $primaryKey = 'account_number';

    public $incrementing = false;

    protected $fillable = [

        'account_number',
        'first_name',
        'middle_name',
        'last_name',
        'customer_gender',
        'customer_address',
        'birth_date',
        'account_balance',
        'phone_number',
        'branch_id',
        'saving_service_id',
        'customer_photo',
        'customer_status', // what is the job of this customer

    ];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function saving_services(){
        return $this->hasMany(SavingService::class);
    }
    public function saving_transactions(){
        return $this->hasMany(SavingTransaction::class);
    }
}
