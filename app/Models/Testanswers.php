<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testanswers extends Model
{
    use HasFactory;

      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'testanswers';
    protected $primaryKey = 'id_testanswers';

    protected $fillable = [
        'id_evaluation',
        'id_tenant',
        'id_company',
        'id_question',
        'id_question_type',
        'id_time_question',
        'id_exam_type',
        'id_practice_test',
        'id_test_type',
    ];

    public $timestamps = true;
}
