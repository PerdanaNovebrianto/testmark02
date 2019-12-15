<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerAssesment extends Model{
    protected $table = 'answer_assesments';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pertanyaan',
        'jawaban',
        'user_id'
    ];
}
