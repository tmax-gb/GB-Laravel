<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public static $availableFields = ['id','name','email','password'];

    protected $table = 'users';

	protected $fillable = [
		'name',
		'email',
		'password'
	];
}
