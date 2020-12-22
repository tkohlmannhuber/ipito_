<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function spot()
    {
        return $this->belongsTo(Spot::class);
    }

    protected $fillable = [
        'title', 'spot_id', 'user_id',

    ];

    public function getImageUrlAttribute() {
        return $this->image_path ? asset('storage/images/' . $this->image_path) : null;
    }
}
