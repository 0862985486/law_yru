<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Law extends Model
{
    use SoftDeletes;
    use Notifiable;

    protected $table    = 'laws';
    protected $fillable = ['offer', 'type','name_id','name', 'file_law','date_out','date_announce','stutas'];


    public function type_name()
    {
        return $this->belongsTo('App\Type', 'type', 'id');
    }

    public function name_name()
    {
        return $this->belongsTo('App\Name', 'name_id', 'id');
    }


}
