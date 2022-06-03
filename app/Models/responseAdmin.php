<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class responseAdmin extends Model
{
    use HasFactory;
    protected $table = 'response_admins';
    protected $guarded = false;
}
