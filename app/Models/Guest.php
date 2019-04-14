<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Guest extends Model
{
    use Searchable;

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

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        return ['name' => $array['name']];
    }

    public function invite()
    {
        return $this->belongsTo('App\Models\Invite');
    }
}
