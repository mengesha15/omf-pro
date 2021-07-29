<?php

namespace App\Models;
use App\Models\Employee;
use App\Models\Borrower;
use App\Models\ApprovedLoan;
use App\Models\LoanDisburseRecord;
use App\Models\SavingTransaction;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'user_role',
        'employee_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    public function borrower(){
        return $this->hasMony(Borrower::class);
    }
    public function approvedLoan(){
        return $this->hasMony(ApprovedLoan::class);
    }
    public function disbursedLoan(){
        return $this->hasMony(LoanDisburseRecord::class);
    }
    public function savingTransaction(){
        return $this->hasMony(SavingTransaction::class);
    }
}
