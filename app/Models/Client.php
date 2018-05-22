<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'name', 'last_name','identification','state', 'city', 'phone' , 'email'
    ];

    public function state()
    {
        return $this->belongsTo('App\Models\Departament','state');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City','city');
    }

}
