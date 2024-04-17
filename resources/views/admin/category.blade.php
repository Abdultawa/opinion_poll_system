<x-app-layout>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
        <form method="POST" action="{{ route('admin.category.store') }}">
            @csrf

            <x-form.input name="category" type="text" required />
            <x-form.textarea name="description" type="text" required />

            <x-form.button>Add Category</x-form.button>
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
