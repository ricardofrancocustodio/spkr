<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // Criar um novo tenant
    protected $table = 'company';
    protected $primaryKey = 'id_company';

protected $fillable = [
    'company_name',
   
];

public $timestamps = true;


}