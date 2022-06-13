<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';

    protected $primaryKey = '_id';

    protected $fillable = ['user_id', 'title'];

    function category(){
        return $this->belongsToMany(Category::class,null,'post_ids','category_ids');
    }
}
