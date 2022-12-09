<?php

namespace App\Models\Front;

use App\Models\AnswerComment;
use App\Models\Comment;
use App\Models\User;
use http\Url;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','description','user_id','image','keywords'];
    protected $attributes = [
        'hit'=>200,
        'status'=>0,
        //0 = deactive && 1 = active
    ];
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function incerment(){
        return $this->increment('hit');
    }
    public function comments(){
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
    public function answerComments(){
        return $this->hasMany(AnswerComment::class);
    }
}
