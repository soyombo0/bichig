<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class LearningPath extends Model
{
    use HasFactory;

    private $protected = ['id'];

    public function users()
    {
        return $this->belongsToMany(User:class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
