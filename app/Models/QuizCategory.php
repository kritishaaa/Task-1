<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'quiz_categories';

    protected $fillable = [
        'title', 'slug'
    ];

    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'category_id');
    }
 

}
