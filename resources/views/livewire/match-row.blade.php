<div wire:click="$emit('showMatchDetail', '{{ $match->id }}')" class="mb-2 py-2 px-4 rounded-lg bg-white border border-white dark:bg-gray-900 dark:border-gray-800 font-bold">

    <div class="flex flex-row">
        <div class="mr-4 flex items-center">@flag($match->teamHome->code, 'w-4')</div>
        <div class="flex-grow">{{ __($match->teamHome->name) }}</div>
        @if ($match->started)
            <div class="w-4">{{ $match->score_home }}</div>
        @else
            <div class="w-16 uppercase text-center">{{ $match->date->formatLocalized('%a %e') }}</div>
        @endif
    </div>

    <div class="flex flex-row">
        <div class="mr-4 flex items-center">@flag($match->teamAway->code, 'w-4')</div>
        <div class="flex-grow">{{ __($match->teamAway->name) }}</div>
        @if ($match->started)
            <div class="w-4">{{ $match->score_away }}</div>
        @else
            <div class="w-16 text-center">{{ $match->date->format('H:i') }}</div>
        @endif
    </div>

</div>
