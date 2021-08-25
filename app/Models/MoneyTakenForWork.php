<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class MoneyTakenForWork extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'user_username',
        'taken_amount',
        'given_by',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
