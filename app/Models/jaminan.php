<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jaminan extends Model
{
    use HasFactory;
    protected $table = "jaminans";
    protected $fillable = ['id_jaminan','status','jaminan'];
}
