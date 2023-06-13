<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'desc',
        'price',
        'new_price',
        'status',
        'img_name'
    ];

    public $timestamps = false;

    public function order () {
        return $this->hasMany(Order::class, 'formation_id');
    }
}
