<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'question';
    protected $primaryKey = 'id_question';
    
    protected $fillable = [
        'id_question_type',
        'id_question',
        'recorded_answer',
        'id_tenant',    
        'id_company',
        'question_text',
        'img_question',
        'question_audio',
        'question_video',
        
    ];
    
    public $timestamps = true;
}

