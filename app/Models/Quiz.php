<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "quizzes";

    protected $fillable = [
        'title', 'slug', 'category_id', 'thumbnail', 'description', 'retry_after', 'status'
    ];


    public function category()
    {
        return $this->belongsTo(QuizCategory::class, "category_id");
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'quiz_id');
    }


}
