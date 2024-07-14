<div class="grid grid-cols-4 gap-4">
    <div class="col-span-1 bg-gray-100 p-4 rounded-lg">
        <ul>
            @foreach ($institutions as $data)
            <li class="p-4 rounded-lg mb-4
            hover:cursor-pointer hover:bg-gray-200
            {{ $institution->id == $data->id ? 'bg-gray-200' : 'bg-white shadow-lg' }}"
             wire:click="changeInstitution({{ $data }})">
                {{ $data->name }}
                <br>
                <span class="text-sm">
                    {{ $data->address }}
                </span>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="col-span-3 p-4">
        <h1 class="text-center text-xl font-extrabold">
            {{ $institution->name }}
        </h1>
        <h4 class="text-center text-sm">
            {{ $institution->address }}
        </h4>
        <div class="mt-4">
            @if ($institution->image)
                <img src="{{ asset('storage/'.$institution->image) }}" alt="{{ $institution->name }}" class="h-52 w-52 object-cover float-end">
            @endif
            {!! $institution->description !!}
        </div>
    </div>
</div>
