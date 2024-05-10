<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Registration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'email', 'password', 'remember_me', // Add other fields here if needed
    ];

    // Optionally, you can define relationships or additional methods here

    /**
     * Check if the provided credentials are valid for authentication.
     *
     * @param string $email
     * @param string $password
     * @return mixed
     */
    public static function authenticate($email, $password)
    {
        $user = static::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }

        return null;
    }
}
