<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LearningPath;

class Question extends Model
{
    use HasFactory;

    private $protected = ['id'];

    public function learningPath()
    {
        return $this->belongsTo(LearningPath::class);
    }
}
