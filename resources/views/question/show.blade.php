<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vote') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <a href="/dashboard" class="text-green-400">Back to dashboard</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-4 px-3">
                <h1 class="font-bold text-2xl text-green-500 pb-4">{{ $question->question }}</h1>

                <form action="{{ route('vote', ['question' => $question->id]) }}" method="POST">
                    @csrf

                    <div class="mb-5">
                        <label for="option_A" class="block font-medium text-sm text-gray-700">Option A:</label>
                        <input type="radio" id="option_A" name="selected_option" value="option_A">
                        <span>{{ $question->option_A }}</span>
                        {{-- <div class="progress mt-2">
                            <div class="progress-bar bg-green-400" role="progressbar"
                                style="width: {{ $optionAPercentage }}%" aria-valuenow="{{ $optionAPercentage }}"
                                aria-valuemin="0" aria-valuemax="100">{{ $optionAPercentage }}%</div>
                        </div>--}}
                    </div> 

                    <div class="mb-5">
                        <label for="option_B" class="block font-medium text-sm text-gray-700">Option B:</label>
                        <input type="radio" id="option_B" name="selected_option" value="option_B">
                        <span>{{ $question->option_B }}</span>
                        {{-- <div class="progress mt-2">
                            <div class="progress-bar bg-green-400" role="progressbar"
                                style="width: {{ $optionBPercentage }}%" aria-valuenow="{{ $optionBPercentage }}"
                                aria-valuemin="0" aria-valuemax="100">{{ $optionBPercentage }}%</div>
                        </div>
                    </div> --}}
                </div>

                    @if ($question->option_C)
                        <div class="mb-5">
                            <label for="option_C" class="block font-medium text-sm text-gray-700">Option C:</label>
                            <input type="radio" id="option_C" name="selected_option" value="option_C">
                            <span>{{ $question->option_C }}</span>
                            {{-- <div class="progress mt-2">
                                <div class="progress-bar bg-green-400" role="progressbar"
                                    style="width: {{ $optionCPercentage }}%" aria-valuenow="{{ $optionCPercentage }}"
                                    aria-valuemin="0" aria-valuemax="100">{{ $optionCPercentage }}%</div>
                            </div>
                        </div> --}}
                    </div>
                    @endif

                    @if ($question->option_D)
                        <div class="mb-5">
                            <label for="option_D" class="block font-medium text-sm text-gray-700">Option D:</label>
                            <input type="radio" id="option_D" name="selected_option" value="option_D">
                            <span>{{ $question->option_D }}</span>
                            {{-- <div class="progress mt-2">
                                <div class="progress-bar bg-green-400" role="progressbar"
                                    style="width: {{ $optionDPercentage }}%" aria-valuenow="{{ $optionDPercentage }}"
                                    aria-valuemin="0" aria-valuemax="100">{{ $optionDPercentage }}%</div>
                            </div> --}}
                        </div>
                    @endif

                    <button type="submit" class="text-white bg-green-600 px-3 py-2 rounded">Vote</button>

                    @admin
                    <a href="{{ route('admin.showResult', ['question' => $question->id]) }}" class="text-green bg-white px-3 py-2 rounded  border-green-400 border-2">Show Result</a>
                    @endadmin
                </form>
            </div>
        </div>
    </div>
    @if (session()->has('error'))
        <div x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            class="fixed bg-red-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
            <p>{{ session('error') }}</p>
        </div>
    @endif
</x-app-layout>
