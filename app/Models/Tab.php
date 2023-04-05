<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tab extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'performer',
        'user_id',
        'tuning_id',
        'tempo',
        'tab'
    ];

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
