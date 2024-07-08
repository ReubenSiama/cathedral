@php
    if(isset($item['banner']) && !empty($item['banner'])) {
        $image = 'storage/'.$item['banner'];
    } else {
        $image = isset($item['image']) ? 'storage/'.$item['image'] : 'images/placeholder.webp';
    }

    if(isset($item['about']) && !empty($item['about'])) {
        $writeup = $item['about'];
    } else {
        $writeup = isset($item['description']) ? $item['description'] : '';
    }
@endphp
<div class="">
    <div class="h-80 bg-cover bg-no-repeat relative" style="background-image: url({{ asset($image) }})">
        <div wire:click="close" class="absolute top-2 right-2 rounded-full bg-white shadow-md text-black py-1 px-3 hover:cursor-pointer">
            &times;
        </div>
    </div>
    <div class="p-4">
        <div class="text-center text-xl font-extrabold mb-4">
            <div class="">
                {{ $item['name'] }}
            </div>
            <div class="">
                <span class="text-sm font-normal">{{ $item['address'] }}</span>
            </div>
        </div>
        <div class="">
            {!! $writeup !!}
        </div>
    </div>
</div>
