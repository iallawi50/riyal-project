<?php


namespace App\Models;

use Model;

class Store extends Model {


    public static $table ="storeinformation";

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
} 