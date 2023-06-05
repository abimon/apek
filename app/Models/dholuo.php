<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dholuo extends Model
{
    use HasFactory;
    protected $fillable=[
        'd_title',
        'e_title',
        'composer',
        'key',
        'stanza1',
        'stanza2',
        'stanza3',
        'stanza4',
        'stanza5',
        'stanza6',
        'chorus',
    ];
}
