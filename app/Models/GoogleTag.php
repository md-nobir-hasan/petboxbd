<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleTag extends Model
{
    use HasFactory;
    protected $fillable = ['gtag_header', 'gtag_footer'];
}

