<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;


class Admin extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable; // This trait will provide the methods required for authentication

    protected $fillable = ['name', 'email', 'password'];
}
