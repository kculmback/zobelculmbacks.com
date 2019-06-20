<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    /**
     * Hide specific attributes when serialized
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function guests()
    {
        return $this->hasMany('App\Models\Guest');
    }
}
