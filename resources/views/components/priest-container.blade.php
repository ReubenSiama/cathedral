<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-10 md:mt-0">
    <div class="flex flex-col items-center py-10">
        @if ($image == '')
            <img class="w-24 h-24 mb-3 rounded-full shadow-lg object-cover" src="{{ asset('images/placeholder.webp') }}" alt="{{ $name }}"/>
        @else
            <img class="w-24 h-24 mb-3 rounded-full shadow-lg object-cover" src="{{ asset('storage/'.$image) }}" alt="{{ $name }}"/>
        @endif
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $name }}</h5>
        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $designation }}</span>
    </div>
</div>
