<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'user',
      'value',
      'cpf',
      'file_name',
      'file_path',
      'status'
    ];
}
