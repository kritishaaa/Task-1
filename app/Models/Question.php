<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "questions";
    protected $fillable = [
        "title","category_id","slug","description","options","answer","status","weightage"
    ];

    protected $casts = [
        'options'=> 'json'
    ];

    public function category(): BelongsTo
    {
        return $this -> belongsTo(QuestionCategory::class,'category_id');
    }
}
