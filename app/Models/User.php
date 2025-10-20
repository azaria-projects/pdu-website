<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Filterable, Notifiable;

    protected $table    = 'users';
    protected $hidden   = [ 'password' ];
    protected $fillable = [ 
        'role',
        'name', 
        'email', 
        'password' 
    ];

    public static function boot() 
    {
        parent::boot();
        static::saving(function ($model) {
            if ($model->isDirty('password')) {
                $model->password = Hash::make($model->password);
            }
        });
    }

    public static function searchable(): array
    {
        return [ 'name', 'email' ];
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

}
