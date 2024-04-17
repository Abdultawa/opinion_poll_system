<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($questions as $question)
                <div class="col-span-1 sm:col-span-1 md:col-span-1">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 overflow-hidden rounded-full">
                                    <img src="../src/assets/img/profile-19.jpeg" alt="avatar" class="w-full h-full object-cover">
                                </div>
                                <div class="ml-4">
                                    <h6 class="font-semibold">{{ __('Jimmy Turner') }}</h6>
                                    <p class="text-xs text-gray-600">{{ $question->created_at->diffForHumans() }}</p>
                                </div>
                                <a href=""
                                class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold ml-28"
                                style="font-size: 10px"
                                >{{$question->category->category}}</a>
                            </div>
                            <h2 class="font-bold text-lg mb-3">{{ __('Question') }}</h2>
                            <p class="text-sm">{{ $question->question }}</p>
                        </div>
                        <div class="px-6 py-4 bg-gray-100 flex justify-end">
                            <a href="{{ route('question.show', ['question' => $question->id]) }}" class="text-blue-500 hover:text-blue-700">{{ __('View Question') }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
        <p>{{ session('success') }}</p>
    </div>
    @endif
</x-app-layout>
