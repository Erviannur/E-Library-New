<?php

namespace App\Models;

use Mtvs\EloquentHashids\HasHashid;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HashidRouting;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VisitorLog extends Model
{
    use HasFactory, HasHashid, HashidRouting;

    protected $appends = ['hashid'];

    protected $hidden = ['id'];

    protected $guarded = [];
}
