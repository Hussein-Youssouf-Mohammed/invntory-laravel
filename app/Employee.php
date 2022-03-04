<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name', 'email', 'address', 'phone', 'sallery', 'join_date', 'nid', 'image'
    ];
}
