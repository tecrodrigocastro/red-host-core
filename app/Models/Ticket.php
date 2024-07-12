<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'subject',
        'message',
        'status',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
