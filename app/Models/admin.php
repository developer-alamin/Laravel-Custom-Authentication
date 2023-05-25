<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins_table';
    protected $fillable = [
        'admin_name',
        'admin_mobile',
        'admin_id',
        'admin_email',
        'admin_img',
        'admin_password'
    ];
}
