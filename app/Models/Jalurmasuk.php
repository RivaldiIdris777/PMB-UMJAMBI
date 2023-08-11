<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jalurmasuk extends Model
{
    use HasFactory;
    protected $table = 'tb_jalur_pendaftaran';
    protected $primaryKey = 'id_jalur_pendaftaran';
    protected $fillable = [];
    public $timestamps = false;
}
