<div class="">
    <div class="h-80 bg-cover bg-no-repeat relative" style="background-image: url({{ asset('storage/'.$item['banner']) }})">
        <div wire:click="$dispatch('closeModal')" class="absolute top-2 right-2 rounded-full bg-white shadow-md text-black py-1 px-3 hover:cursor-pointer">
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
            {!! $item['about'] !!}
        </div>
    </div>
</div>
