<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Game
 *
 * @property int $id
 * @property int $user_id
 * @property string $date
 * @property bool $corporate_area
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $german_date
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Player[] $players
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereCorporateArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereUserId($value)
 * @mixin \Eloquent
 */
class Game extends Model
{
    protected $fillable = ['user_id', 'date', 'map_id', 'corporate_area', 'winner_player_id'];

    protected $casts = [
        'corporate_area' => 'boolean',
        'winner_player_id' => 'integer',
    ];

    /**
     * Returns the date in german format
     *
     * @return string
     */
    public function getGermanDateAttribute()
    {
        return Carbon::parse($this->attributes['date'])->format('d.m.Y H:i');
    }

    /**
     * Returns the players of the game
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function players()
    {
        return $this->hasMany(Player::class)->withPivot('corporation_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scores()
    {
        return $this->hasMany(Score::class);
    }

    /**
     * Returns the map of this game
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function map()
    {
        return $this->belongsTo(Map::class);
    }
}
