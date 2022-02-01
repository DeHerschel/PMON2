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
        'MAC'
    ];
    use HasFactory;
    public function getRouteKeyName()
    {
        return 'name';
    }
    public function Rolls()
    {
        return $this->belongsToMany('App\Models\Roll');
    }
}
