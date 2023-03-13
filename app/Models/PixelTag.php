<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PixelTag extends Model
{
    use HasFactory;
    protected $fillable = ['ptag_header', 'ptag_footer'];
}
