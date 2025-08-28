<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($workspace) {
            $workspace->slug = \Illuminate\Support\Str::slug($workspace->name);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function users() {
        return $this->belongsToMany(User::class, 'workspace_user')->withPivot('role');
    }
}
