<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;


class Participant extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'Participants';
    protected $guarded=[];
    protected $fillable = [
        'name',
        'age',
        'email',
        'address',
        'Event_ID',
    ];
}
