<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Demande extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $fillable=[
        'objet',
        'description'
    ];


    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
