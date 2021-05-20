<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'post_tag');
    }
    public static function getPosts(){
        return DB::table('posts')->select('id','title','body')->get()->toArray();
    }
}
