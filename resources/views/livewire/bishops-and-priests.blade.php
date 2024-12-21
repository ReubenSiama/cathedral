<div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    <div class="col-span-1 bg-gray-100 p-4 rounded-lg hidden md:flex">
        <ul class="w-full">
            @foreach ($links as $link)
            <li class="p-4 rounded-lg mb-4
            hover:cursor-pointer hover:bg-gray-200
            {{ $current == $link['slug'] ? 'bg-gray-200' : 'bg-white shadow-lg' }}"
             wire:click="changeLink('{{ $link['slug'] }}')">
                {{ $link['name'] }}
            </li>
            @endforeach
        </ul>
    </div>
    <div class="col-span-3">
        <select wire:model.live="current" id="current" class="w-full flex md:hidden">
            @foreach ($links as $link)
                <option value="{{ $link['slug'] }}">{{ $link['name'] }}</option>
            @endforeach
        </select>
        @if ($current == 'bishops')
        <div class="md:container md:mx-auto mx-5 mt-6">
            <h1 class="text-center mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                BISHOPS
            </h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($bishops as $bishop)
                    <div
                    class="bg-white border border-gray-200
                    rounded-lg shadow
                    dark:bg-gray-800
                    dark:border-gray-700
                    text-center
                    ">
                        <div class="w-full h-80 object-cover rounded-lg">
                            <img class="h-full w-full object-cover rounded-t-lg" src="{{ asset($bishop->image ? 'storage/'.$bishop->image : 'images/placeholder.webp') }}" alt="{{ $bishop->name }}" />
                        </div>
                        <div class="p-5">
                            <h5 class="mb-2 uppercase font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $bishop->name }}
                                <br>
                                {{ $bishop->description }}
                            </h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {!! $bishop->bio !!}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @elseif($current == 'priests')
            <div class="bg-[#22242A] text-white py-10 mt-10">
                <div class="md:container md:mx-auto mx-5">
                    <h1 class="text-center mb-2 text-xl font-bold tracking-tight">
                        PRIESTS
                    </h1>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        @foreach ($parishPriests as $parishPriest)
                            <div
                            class="bg-white border border-gray-200
                            rounded-lg shadow
                            dark:bg-gray-800
                            dark:border-gray-700
                            text-center
                            ">
                                <div class="w-full h-60 object-cover rounded-lg">
                                    <img class="h-full w-full object-cover rounded-t-lg" src="{{ asset($parishPriest->image ? 'storage/'.$parishPriest->image : 'images/placeholder.webp') }}" alt="{{ $parishPriest->name }}" />
                                </div>
                                <div class="p-5 text-gray-900">
                                    <h5 class="mb-2 uppercase font-bold tracking-tight">
                                        {{ $parishPriest->name }}
                                    </h5>
                                    <p>
                                        {{ date('M Y', strtotime($parishPriest->from)) }} -
                                        {{ $parishPriest->to ? date('M Y', strtotime($parishPriest->to)) : 'Till Date'}}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @elseif($current == 'asst_priests')
            <div class="md:container md:mx-auto mx-5 py-10">
                <h1 class="text-center mb-2 text-xl font-bold tracking-tight">
                    ASSISTANT PARISH PRIESTS
                </h1>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    @foreach ($assistantParishPriests as $assistant)
                        <div
                        class="bg-white border border-gray-200
                        rounded-lg shadow
                        dark:bg-gray-800
                        dark:border-gray-700
                        text-center
                        ">
                            <div class="w-full h-60 object-cover rounded-lg">
                                <img class="h-full w-full object-cover rounded-t-lg" src="{{ asset($assistant->image ? 'storage/'.$assistant->image : 'images/placeholder.webp') }}" alt="{{ $assistant->name }}" />
                            </div>
                            <div class="p-5 text-gray-900">
                                <h5 class="mb-2 uppercase font-bold tracking-tight">
                                    {{ $assistant->name }}
                                </h5>
                                <p>
                                    {{ date('M Y', strtotime($assistant->from)) }} -
                                    {{ $assistant->to ? date('M Y', strtotime($assistant->to)) : 'Till Date'}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        
    </div>
</div>