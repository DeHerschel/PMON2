<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'IP',
        'domain',
        'MAC',

    ];
    use HasFactory;
    public function getRouteKeyName()
    {
        return 'name';
    }
    public function Roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
    public function Problems()
    {
        return $this->hasMany('App\Models\Problem');
    }
}
