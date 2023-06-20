<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ogotera extends Model
{
    use HasFactory;
    protected $fillable=[
        'k_title',
        'e_title',
        'composer',
        'doh',
        'stanza1',
        'stanza2',
        'stanza3',
        'stanza4',
        'stanza5',
        'stanza6',
        'chorus',
    ];
}
