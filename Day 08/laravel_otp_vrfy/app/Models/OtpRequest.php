<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OtpRequest extends Model
{
    use HasFactory;

    // Specify the table name (optional if it follows Laravel's naming conventions)
    protected $table = 'otp_requests';

    // Define which fields are mass assignable
    protected $fillable = [
        'email',
        'otp_code',
        'expires_at',
        'is_verified',
    ];

    // Define the date attributes for Carbon to work with
    protected $dates = [
        'expires_at',
    ];
}
