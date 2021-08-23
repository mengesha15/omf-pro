<?php

namespace App\Models;
use App\Models\Branch;
use App\Models\User;
use App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_type',
        'from_or_to',
        'transaction_amount',
        'customer_account_number',
        'branch_id',
        'user_username',
    ];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
