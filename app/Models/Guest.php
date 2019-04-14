<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    /**
     * Hide specific attributes when serialized
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'invite_id',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'rsvp'];

    public function invite()
    {
        return $this->belongsTo('App\Models\Invite');
    }
}
