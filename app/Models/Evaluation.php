<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'evaluations';
    protected $primaryKey = 'id_evaluation';


    protected $fillable = [
        'id_et_creation_user',
        'id_candidate',
        'id_question',
        'notes',
        'url_link',
        'answer_status',
        'et_status',
        'audio_evaluation_answer',
    ];

    public $timestamps = true;

}

