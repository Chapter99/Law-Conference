<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = "payments";
    protected $fillable = [
        'user_id',
        'amount',
        'tdate',
        'filename',
        'pay_status',
        'book_no',
        'book_id',
        'comment',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
