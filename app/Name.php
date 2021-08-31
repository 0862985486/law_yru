<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Name extends Model
{
    use SoftDeletes;
    use Notifiable;

    protected $table    = 'names';
    protected $fillable = ['name'];
}
