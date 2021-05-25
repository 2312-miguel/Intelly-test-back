<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        "id",
        "date_purchase",
        "value",
        "name",
        "description",
        "id_user",
        "date_register",
        "image",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public $attributes = [
        'date_purchase' => false,
        'value' => false,
        'name' => false,
        'description' => false,
        'id_user' => false,
        'image' => false,
    ];
}
