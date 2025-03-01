<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testtype extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'test_type';
    protected $primaryKey = 'id_test_type';

    protected $fillable = [
        'test_type',

    ];

    public $timestamps = true;
}
