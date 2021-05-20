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
        "name_business",
        "date_register",
        "image",
    ];
}
