<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApi extends Model
{
    use HasFactory;

    protected $primarykey = "id";

    protected $table = "userapi";

    protected $fillable = [
        'name',
        'email',
        'place',
    ];
}
