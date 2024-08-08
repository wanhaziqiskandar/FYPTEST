<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gender',
        'birth_date',
        'mobileNumber',
        'qualification',
        'experience',
        'expertise',
        'price',
        'bankaccountNumber',
        'bankName'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
