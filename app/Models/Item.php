<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'code',
        'name', 'name',
        'name', 'description',
        'name', 'avg_cost',
        'name', 'group',
        'name', 'unit',
        'name', 'type',
        'name', 'free',
        'name', 'image',
        'name', 'status'
    ];
}
