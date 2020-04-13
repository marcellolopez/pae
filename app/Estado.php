<?php
namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;
class Estado extends Model
{
    protected $fillable = [
    	'id',
    	'estado',    	
    ];

}