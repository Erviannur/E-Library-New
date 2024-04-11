<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;

class Author extends Model
{
    use HasFactory, HasHashid, HashidRouting;


    protected $appends = ['hashid'];

    protected $hidden = ['id'];

    protected $guarded = [];

    protected $fillable = ['name', 'slug'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
