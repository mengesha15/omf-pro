<?php

namespace App\Models;
 use App\Models\Branch;
 use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
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
        'jobPosition',
        'birthDate',
        'salary',
        'phoneNumber',
        'employeePhoto',
        'branch_id',
    ];


    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function user(){
        return $this->hasOne(User::class);
    }
}
