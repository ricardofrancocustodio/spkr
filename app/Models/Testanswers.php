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
        'id_question',
        'recorded_answer',
    ];

    public $timestamps = true;
}
