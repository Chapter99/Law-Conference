<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;
    protected $table = "papers";
    protected $fillable = [
        'user_id',
        'title',
        'authors',
        'present',
        'topic',
        'abstract_word',
        'abstract_pdf',
        'abstract_word2',
        'abstract_pdf2',
        'fullpaper_word',
        'fullpaper_pdf',
        'fullpaper_word2',
        'fullpaper_pdf2',
        'poster',
        'poster2',
        'paper_status',
        'result',
        'confirm',
    ];

    public function topics()
    {
        return $this->belongsTo('App\Models\Topic', 'topic');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function payment(){
        return $this->belongsTo('App\Models\Payment', 'user_id', 'user_id');
    }

    public function reviewer_abs(){
        return $this->belongsToMany('App\Models\Reviewer', 'paper_reviewer_abs', 'paper_id', 'rev_id')
        ->withPivot('s11', 's21', 's22', 's23', 'c11', 'c21', 'c22', 'c23', 'comment', 'filename', 'result', 'approve')
        ->withTimestamps();
    }

    public function reviewer_full(){
        return $this->belongsToMany('App\Models\Reviewer', 'paper_reviewer_full', 'paper_id', 'rev_id')
        ->withPivot('s11', 's21', 's22', 's31', 's32', 's33', 's41', 's51', 's52', 's61', 's62', 's63', 'c11', 'c21', 'c22', 'c31', 'c32', 'c33', 'c41', 'c51', 'c52', 'c61', 'c62', 'c63', 'comment', 'filename', 'result', 'approve')
        ->withTimestamps();
    }

    public function reviewer_poster(){
        return $this->belongsToMany('App\Models\Reviewer', 'paper_reviewer_poster', 'paper_id', 'rev_id')
        ->withPivot('s11', 's21', 's22', 's23', 'c11', 'c21', 'c22', 'c23', 'comment', 'filename', 'result', 'approve')
        ->withTimestamps();
    }
}
