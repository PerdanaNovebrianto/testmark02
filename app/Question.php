<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gambar',
        'pertanyaan',
        'jawaban_benar',
        'jawaban_salah1',
        'jawaban_salah2',
        'jawaban_salah3',
        'user_id'
    ];
}
