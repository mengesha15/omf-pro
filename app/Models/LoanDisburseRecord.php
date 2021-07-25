<?php

namespace App\Models;
use App\Models\Branch;
use App\Models\User;
use App\Models\Borrower;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanDisburseRecord extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'remaining_amount',
        'disburse_amount',
        'branch_id',
        'borrower_id',
        'disbursed_by',
    ];
    
    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function borrower(){
        return $this->belongsTo(Borrower::class);
    }

}
