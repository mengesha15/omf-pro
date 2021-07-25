<?php

namespace App\Models;

use App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingService extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Saving_service_name',
        'discription',
        'interest_rate',
    ];

    public function customer(){
        return $this->hasMany(Customer::class);
    }
}
