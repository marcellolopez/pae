<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
	protected $table = 'role_user';
    protected $fillable = [
        'role_id',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(MotivoConsulta::class, 'user_id');
    }       

    public function role()
    {
        return $this->belongsTo(MotivoConsulta::class, 'role_id');
    }   

}
