<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Carbon\Carbon;

class Guest extends Model
{
    use Searchable;

    /**
     * Hide specific attributes when serialized
     *
     * @var array
     */
    protected $hidden = [
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

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRsvpedYes($query)
    {
        return $query->where('rsvp', 1);
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRsvpedNo($query)
    {
        return $query->where('rsvp', 0);
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHasntRsvped($query)
    {
        return $query->where('rsvp', null);
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUpdatedPastWeek($query)
    {
        return $query->whereDate('updated_at', '>=', Carbon::now()->subWeek());
    }

    /**
     * Get user friendly RSVP status.
     *
     * @param  string  $value
     * @return string
     */
    public function getPrettyRsvpAttribute($value)
    {
        if ($this->rsvp === 1) {
            return 'yes';
        } elseif ($this->rsvp === 0) {
            return 'no';
        }
        return 'maybe';
    }

    public function invite()
    {
        return $this->belongsTo('App\Models\Invite');
    }
}
