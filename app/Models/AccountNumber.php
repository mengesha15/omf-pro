<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;  // It is needed to make relation between Account and Custemer class

class AccountNumber extends Model
{
    use HasFactory;
    protected $fillable =['account_number'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

}
