<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'answer';
    protected $primaryKey = 'id_answer';
    public $timestamps = true;

    public function question()
    {
        return $this->belongsTo(Question::class, 'id_question', 'id_question');
    }

    public function practiceTest()
    {
        return $this->belongsTo(PracticeTest::class, 'id_practice_test', 'id_practice_test');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'id_company', 'id_company');
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'id_tenant', 'id_tenant');
    }
}
