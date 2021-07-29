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
        'saving_service_name',
        'saving_service_description',
        'saving_service_interest_rate',
    ];

    public function customers(){
        return $this->hasMany(Customer::class);
    }
}
