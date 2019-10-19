<?php

namespace App;

use App\Providers\PostCreated;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    protected $dispatchesEvents = [
        'created' => PostCreated::class
    ];
}
