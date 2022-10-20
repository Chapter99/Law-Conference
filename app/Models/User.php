<?php

namespace App\Models;

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
        'title',
        'academic',
        'fname',
        'lname',
        'address',
        'province',
        'postcode',
        'tel',
        'register_type',
        'partner',
        'org',
        'present',
        'email',
        'password',
        'isAdmin',
        'status',
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

    public function papers(){
        return $this->hasMany('App\Models\Paper');
    }

    public function payment(){
        return $this->hasMany('App\Models\Payment', 'user_id', 'id');
    }
}
