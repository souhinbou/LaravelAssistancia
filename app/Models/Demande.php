<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Demande extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    // protected $fillable=[
    //     'objet',
    //     'description',
    //     'status',
    //     'auteur_id',
    //     'admin_id',
    //     'reponse'

    // ];

    /**
     * Get the user that owns the Demande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'auteur_id');
    }

}
