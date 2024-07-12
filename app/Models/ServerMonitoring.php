<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerMonitoring extends Model
{
    use HasFactory;

    protected $fillable = [
        'server_name',
        'cpu_usage',
        'ram_usage',
        'disk_usage',
    ];
}
