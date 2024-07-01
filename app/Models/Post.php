<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'cover_image',
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Category()
{
    return $this->belongsToMany(Category::class, 'post_has_category', 'post_id', 'category_id');
}
}
