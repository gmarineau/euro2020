<div wire:click="$emit('showPrediction', '{{ $match->id }}')" class="mb-2 py-2 px-4 shadow-lg rounded-lg bg-white dark:bg-gray-900 dark:border-gray-800 font-bold{{ Auth::user()->canPredictGame($match) ? ' bg-white' : ' bg-red-50 border-l-8 border-red-400' }}">

    <div class="flex flex-row">
        <div class="mr-4 flex items-center">@flag($match->teamHome->code, 'w-4')</div>
        <div class="flex-grow">{{ __($match->teamHome->name) }}</div>
        <div class="w-4">{{ $match->userPrediction?->score_home ?? '-' }}</div>
    </div>

    <div class="flex flex-row">
        <div class="mr-4 flex items-center">@flag($match->teamAway->code, 'w-4')</div>
        <div class="flex-grow">{{ __($match->teamAway->name) }}</div>
        <div class="w-4">{{ $match->userPrediction?->score_away ?? '-' }}</div>
    </div>

</div>
