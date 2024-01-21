<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

use MongoDB\Laravel\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

	protected $connection = 'mongodb';
    	protected $collection = 'item_lists';
    	protected $guarded=[];
    protected $fillable = [
        'name',
    ];
}
