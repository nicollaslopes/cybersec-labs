<?php

namespace App\Models;
use Mongodb\Laravel\Eloquent\Model;

// use Illuminate\Database\Eloquent\Model;

class UserMongo extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'users_mongo';

    protected $attributes = [
        'user' => 'admin',
        'password' => 'adminPassword'
    ];

    protected $fillable = ['user', 'password'];
}
