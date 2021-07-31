<?php

namespace App\Models;
 use App\Models\Branch;
 use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'employee_gender',
        'employee_address',
        'birth_date',
        'employee_salary',
        'phone_number',
        'employee_photo',
        'branch_id',
        'role_id',
    ];


    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function user(){
        return $this->hasOne(User::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
}
