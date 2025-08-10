<?php

namespace App\Models;
use Mongodb\Laravel\Eloquent\Model;

class UserMongo extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'users_mongo';
    protected $fillable = ['user_name', 'password'];

    protected static $defaultUsers = [
        ['user_name' => 'admin', 'password' => 'adminPassword'],
        ['user_name' => 'user_2', 'password' => 'password_2'],
        ['user_name' => 'user_3', 'password' => 'password_3']
    ];

    public static function createMongoUser()
    {
        $user = UserMongo::all()->first();

        if (!$user) {
            foreach (self::$defaultUsers as $attribute) {
                UserMongo::create($attribute);
            }
        }

        return UserMongo::all();
    }
}
