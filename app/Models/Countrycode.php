<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countrycode extends Model
{
    use HasFactory;

    protected $table = 'countrycode';
    protected $primaryKey = 'id_countrycode';

    protected $fillable = [
        'country_name',
        'data_countrycode',
    ];

    public $timestamps = true;
}
