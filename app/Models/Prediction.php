<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{

    protected $fillable = [
        'user_id',
        'match_id',
        'score_home',
        'score_away',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeUserPredictions($query)
    {
        return $query->whereUserId(\Auth::user()->id);
    }

    public function scopeForCurrentUser($query)
    {
        return $query->whereUserId(\Auth::user()->id);
    }

    public function hasNoScore()
    {
        return is_null($this->game->score_home) && is_null($this->game->score_away);
    }
}
