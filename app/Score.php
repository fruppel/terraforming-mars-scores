<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\GamePlayer
 *
 * @property int $id
 * @property int $game_id
 * @property int $player_id
 * @property int $corporation_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GamePlayer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GamePlayer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GamePlayer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GamePlayer whereCorporationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GamePlayer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GamePlayer whereGameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GamePlayer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GamePlayer wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GamePlayer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class
Score extends Model
{
    protected $fillable = ['game_id', 'player_id', 'corporation_id', 'tr', 'awards', 'milestones', 'gameboard', 'cards', 'megacredits', 'result'];

    protected $with = ['player'];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function corporation()
    {
        return $this->belongsTo(Corporation::class);
    }
}
