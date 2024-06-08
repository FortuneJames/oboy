<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table = 'investment_history';
    
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship to the Investment model
    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }
}
