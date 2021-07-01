<?php

namespace App\Console\Commands;

use App\Models\Game;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchGoalsByMatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fd:goals-match {match_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch the goals for a given match from Football Data API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $match_id = $this->argument('match_id');

        $game = Game::find($match_id);
        $this->updateGoals($game, $this->getLiveMatchGoals($game));
    }

    private function getLiveMatchGoals(Game $game): array
    {
        $response = Http::withHeaders([
            'X-Auth-Token' => config('services.football_data_api.auth_token'),
        ])->get('http://api.football-data.org/v2/matches/'. $game->football_data_match_id);

        $match = $response->json();

        return $match['match']['goals'];
    }

    private function updateGoals(Game $game, array $goals): void
    {
        $goals = collect($goals);

        $game->goals()->delete();

        if ($goals->isEmpty()) {
            return;
        }

        $goals->each(fn($goal) => $game->goals()->create([
            'minute' => $goal['minute'],
            'scored_by' => $goal['scorer']['name'],
            'team' => $goal['team']['id'] === $game->teamHome->football_data_team_id ? 'home' : 'away',
        ]));
    }
}
