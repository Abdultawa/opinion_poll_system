<!-- resources/views/questions/result.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Poll Results for: ') . $question->question }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-4 px-3">

                <h3 class="font-bold text-xl text-green-500 pb-4">Option A: {{ $question->option_A }}</h3>
                <p>{{ $question->option_A_votes }} {{ Str::plural('vote', $question->option_A_votes) }}</p>
                <div class="progress mt-2">
                    <div class="progress-bar bg-green-400" role="progressbar"
                        style="width: {{ $optionAPercentage }}%" aria-valuenow="{{ $optionAPercentage }}"
                        aria-valuemin="0" aria-valuemax="100">{{ number_format($optionAPercentage, 2) }}%</div>
                </div>

                <h3 class="font-bold text-xl text-green-500 pb-4 mt-6">Option B: {{ $question->option_B }}</h3>
                <p>{{ $question->option_B_votes }} {{ Str::plural('vote', $question->option_B_votes) }}</p>
                <div class="progress mt-2">
                    <div class="progress-bar bg-green-400" role="progressbar"
                        style="width: {{ $optionBPercentage }}%" aria-valuenow="{{ $optionBPercentage }}"
                        aria-valuemin="0" aria-valuemax="100">{{ number_format($optionBPercentage, 2) }}%</div>
                </div>

                @if ($question->option_C)
                    <h3 class="font-bold text-xl text-green-500 pb-4 mt-6">Option C: {{ $question->option_C }}</h3>
                    <p>{{ $question->option_C_votes }} {{ Str::plural('vote', $question->option_C_votes) }}</p>
                    <div class="progress mt-2">
                        <div class="progress-bar bg-green-400" role="progressbar"
                            style="width: {{ $optionCPercentage }}%" aria-valuenow="{{ $optionCPercentage }}"
                            aria-valuemin="0" aria-valuemax="100">{{ number_format($optionCPercentage, 2) }}%</div>
                    </div>
                @endif

                @if ($question->option_D)
                    <h3 class="font-bold text-xl text-green-500 pb-4 mt-6">Option D: {{ $question->option_D }}</h3>
                    <p>{{ $question->option_D_votes }} {{ Str::plural('vote', $question->option_D_votes) }}</p>
                    <div class="progress mt-2">
                        <div class="progress-bar bg-green-400" role="progressbar"
                            style="width: {{ $optionDPercentage }}%" aria-valuenow="{{ $optionDPercentage }}"
                            aria-valuemin="0" aria-valuemax="100">{{ number_format($optionDPercentage, 2) }}%</div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
