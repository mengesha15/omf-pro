<?php

namespace App\Models;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
     protected $fillable = [
        'role_name',
    ];
    public function users(){
        return $this->hasMony(User::class);
    }
    public function emplyees(){
        return $this->hasMony(Employee::class);
    }
}
