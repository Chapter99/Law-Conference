<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Reviewer extends Authenticatable
{
    use HasFactory;
    protected $guard = "reviewer";
    protected $table = "reviewers";
    protected $fillable = [
        'title',
        'fname',
        'lname',
        'type',
        'university',
        'ss1',
        'ss2',
        'ss3',
        'ss4',
        'email',
        'telephone',
        'password',
        'invite',
        'invite_full'
    ];

    public function paper_abs(){
        return $this->belongsToMany('App\Models\Paper', 'paper_reviewer_abs', 'rev_id', 'paper_id')
        ->withPivot('s11', 's21', 's22', 's23', 'c11', 'c21', 'c22', 'c23', 'comment', 'filename', 'result', 'approve')
        ->withTimestamps();
    }

    public function paper_full(){
        return $this->belongsToMany('App\Models\Paper', 'paper_reviewer_full', 'rev_id', 'paper_id')
        ->withPivot('s11', 's21', 's22', 's31', 's32', 's33', 's41', 's51', 's52', 's61', 's62', 's63', 'c11', 'c21', 'c22', 'c31', 'c32', 'c33', 'c41', 'c51', 'c52', 'c61', 'c62', 'c63', 'comment', 'filename', 'result', 'approve')
        ->withTimestamps();
    }

    public function paper_poster(){
        return $this->belongsToMany('App\Models\Paper', 'paper_reviewer_poster', 'rev_id', 'paper_id')
        ->withPivot('s11', 's21', 's22', 's23', 'c11', 'c21', 'c22', 'c23', 'comment', 'filename', 'result', 'approve')
        ->withTimestamps();
    }
}
