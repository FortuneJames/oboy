<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        // Generate transaction ID before creating a deposit
        static::creating(function ($deposit) {
            $deposit->transaction_id = rand(10000, 99999);
        });
    }

    protected function handleImageUpload()
    {
        if (request()->hasFile('image')) {
            $imagePath = request()->file('image')->store('deposit_images', 'public');
            $this->image_path = $imagePath;
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
