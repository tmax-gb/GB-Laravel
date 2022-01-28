<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

	public static $availableFields = ['id','title','author','status','description','created_at'];
    protected $table = 'news';

	protected $fillable = [
		'category_id',
		'title',
		'slug',
		'author',
		'status',
		'description'
	];
}
