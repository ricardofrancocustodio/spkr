<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    // Criar um novo tenant
    protected $table = 'tenant';
    protected $primaryKey = 'id_tenant';

protected $fillable = [
    'tenant_name',
   
];

public $timestamps = true;


}
