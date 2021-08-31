<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;


class Law extends Model
{
    use SoftDeletes;
    use Notifiable;

    protected $table    = 'laws';
    protected $primaryKey = 'law_id';
    protected $fillable = ['law_id','user_id','offer', 'type','name_id','law_name','year','file_law','date_out','date_announce','stutas','comment'];





    public function type_name()
    {
        return $this->belongsTo('App\Type', 'type', 't_id');
    }

    public function name_name()
    {
        return $this->belongsTo('App\Name', 'name_id', 'id');
    }

    public function scopeIdDescending($query)
    {
        return $query->orderBy('id','DESC');
    }






}
