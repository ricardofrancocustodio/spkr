<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practicetest extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'practice_test';
    protected $primaryKey = 'id_practice_test';

    protected $fillable = [
        'practice_test_name',

    ];

    public $timestamps = true;
}
