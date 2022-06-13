<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $primaryKey = '_id';

    protected $fillable = ['title'];

    function post(){
        return $this->belongsToMany(Post::class,null,'category_ids', 'post_ids');
    }
}
