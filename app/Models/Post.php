<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \JordanMiguel\LaravelPopular\Traits\Visitable;

class Post extends Model
{
    use HasFactory, Visitable;
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'overview',
        'description',
        'thumbnail',
        'images',
    ];
    protected $with = ['author'];
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
