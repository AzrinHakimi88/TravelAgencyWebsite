<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [ "user_id" ,"name", "email", "mobileNumber", "departureDate", "packageName", "additional" ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
