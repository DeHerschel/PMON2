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
        'pingData'
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
}
