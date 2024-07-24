<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AdminUsers extends Model
{
    use HasFactory;
    protected $table= "admin_users";
    protected $primaryKey = 'admin_id';
    public $timestamps= false;
    protected $fillable =
    [
        'admin_name',
        'email_address',
        'password',
    ];

}
