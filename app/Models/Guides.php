<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guides extends Model
{
    protected $fillable = ['name', 'email', 'destination_id'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
