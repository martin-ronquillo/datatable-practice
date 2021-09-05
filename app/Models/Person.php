<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'person';

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'born_day',
    ];

    public function setNameAttribute(string $name) : void
    {
        $this->attributes['name'] = strtolower($name);
    }

    public function getNameAttribute() : string 
    {
        return ucwords($this->attributes['name']);
    }
}
