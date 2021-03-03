<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offer extends Model
{
    use HasFactory;

    protected $table = 'offer';

    protected $fillable = ['name_en','name_ar','details_en','details_ar','price'];

    public $timestamps = false;
}
