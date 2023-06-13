<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'formation_id',
        'status',
        'session_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function formation () {
        return $this->belongsTo(Formation::class, 'formation_id');
    }
}
