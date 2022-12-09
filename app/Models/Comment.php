<?php

namespace App\Models;

use App\Models\Front\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','msg','email','parent_id','article_id','user_id'
    ];
    protected $attributes=['status'=>0];

    public function article(){
        return $this->belongsTo(Article::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function reply(){
        return $this->hasMany(Comment::class,'parent_id');
    }

}
