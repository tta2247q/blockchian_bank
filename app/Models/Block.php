<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = [
    'block_index',
    'data',
    'previous_hash',
    'hash'
];
}
