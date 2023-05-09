<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Tab extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'performer',
        'user_id',
        'tuning_id',
        'tempo',
        'tab',
        'publicity'
    ];

    public function newQuery($excludeDeleted = true) {
        $query = parent::newQuery($excludeDeleted);
        $query->whereRaw('(publicity = 1 or user_id = ?)', [Auth::user()->id ?? 0]);
        return $query;
    }

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function tuning() {
        return $this->hasOne(Tuning::class, 'id', 'tuning_id');
    }

    public function likes() {
        return $this->hasMany(Like::class, 'tab_id', 'id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'tab_id', 'id');
    }
}
