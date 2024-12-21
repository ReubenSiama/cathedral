<div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    @foreach ($items as $item)
        @php
            if(isset($item->banner) && !empty($item->banner)) {
                $image = 'storage/'.$item->banner;
            } else {
                $image = $item->image ? 'storage/'.$item->image : 'images/placeholder.webp';
            }
        @endphp
        <div
        @if ($clickable)
        wire:click="$dispatch('openModal', { component: 'view-item', arguments: { item: {{ $item }}, 'model': '{{ $model }}'} })"
        @endif
        class="bg-white border
        border-gray-200
        rounded-lg
        shadow
        dark:bg-gray-800
        dark:border-gray-700
        text-center
        hover:cursor-pointer
        ">
            <div class="w-full h-72 object-cover rounded-lg">
                <img class="h-full w-full object-cover rounded-t-lg" src="{{ asset($image) }}" alt="{{ $item->name }}" /></div>
            <div class="p-5">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->name }}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $item->address }}</p>
            </div>
        </div>
    @endforeach
</div>
