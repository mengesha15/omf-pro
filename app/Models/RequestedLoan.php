<?php

namespace App\Models;
use App\Models\LoanService;
use App\Models\Borrower;
use App\Models\User;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestedLoan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'requesed_amount',
        'borrower_id',
        'ruquested_by',
        'approved_by',
        'loan_service_id',
    ];

    protected $hidden = [
        'status'
    ];

    public function loan_service(){
        return $this->belongsTo(LoanService::class);
    }
    public function borrower(){
        return $this->belongsTo(Borrower::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
