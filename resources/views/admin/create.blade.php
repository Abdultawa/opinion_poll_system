<x-app-layout>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
        <form method="POST" action="{{ route('admin.store') }}">
            @csrf

            <x-form.input name="question" type="text" required />
            <x-form.input name="option_A" type="text" required />
            <x-form.input name="option_B" type="text" required />
            <x-form.input name="option_C" type="text" required />
            <x-form.input name="option_D" type="text" required />
            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->category) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>
            <x-form.button>Add Question</x-form.button>
        </form> 
</div>
</div>
</div>
</div>
@if (session()->has('success'))
    <div x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 4000)"
    x-show="show"
    class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm"
    >
    <p>{{ session('success') }}</p>
    </div>
    @endif
</x-app-layout>
<!-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> -->
