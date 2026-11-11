<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\UserFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\Contracts\OAuthenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use App\Models\User\UserClientInformation;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [

        'name',

        'email',

        'password',

        'role'

    ];

    protected $hidden = [

        'password',

        'remember_token'

    ];

    public function client_information()
    {

        return $this->hasOne(UserClientInformation::class, 'profile_id', 'id');
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function scopeValidateEmail($query, $email)
    {

        return $query->where('email', $email);
    }
}
