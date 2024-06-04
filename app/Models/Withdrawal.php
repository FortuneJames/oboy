<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        // Generate transaction ID before creating a withdrawal
        static::creating(function ($withdrawal) {
            $withdrawal->transaction_id = rand(10000, 99999);
        });
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
