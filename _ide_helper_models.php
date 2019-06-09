<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Song
 *
 * @property int $id
 * @property string $name
 * @property string $artist
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song whereArtist($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song whereUpdatedAt($value)
 */
	class Song extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Guest
 *
 * @property int $id
 * @property int $invite_id
 * @property string $name
 * @property int|null $rsvp
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Invite $invite
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Guest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Guest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Guest query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Guest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Guest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Guest whereInviteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Guest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Guest whereRsvp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Guest whereUpdatedAt($value)
 */
	class Guest extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Invite
 *
 * @property int $id
 * @property string|null $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Guest[] $guests
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invite query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invite whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invite whereUpdatedAt($value)
 */
	class Invite extends \Eloquent {}
}

