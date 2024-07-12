<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'disk_space',
        'bandwidth',
        'email_accounts',
    ];

    public function hostingAccounts()
    {
        return $this->hasMany(HostingAccount::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
