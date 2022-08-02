<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class URL extends Model
{
    protected $fillable = ['url', 'http_status_code', 'last_access', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
