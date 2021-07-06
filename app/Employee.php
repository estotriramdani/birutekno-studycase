<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'salary'];
    
    public function recaps()
    {
        return $this->hasMany(Recap::class);
    }
}
