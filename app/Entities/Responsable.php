<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $table = 'responsables';

    protected $fillable = [
        'responsable'
    ];  
    public function responsable()
    {
        return $this->belongsTo(Responsable::class, 'responsable_id');
    }      
}
