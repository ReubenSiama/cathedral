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

    @if ($current == 'about_us')
        <div class="col-span-3 p-4">
            <h1 class="text-center text-xl font-extrabold">
                {{ $parishPastoralCouncil->name }}
            </h1>
            <div class="mt-4">
                {!! $parishPastoralCouncil->description !!}
            </div>
        </div>
    @elseif ($current == 'office_bearers')
    <div class="col-span-3 p-4">
        @foreach ($terms as $term)
            <h1 class="text-center text-xl font-extrabold">
                {{ $term->name }}({{ $term->duration }})
            </h1>
            @foreach ($term->ppcObAndCommittees as $committees)
                {{ $committees->type }}
                    @foreach ($term->members as $member)
                        <div class="bg-white p-4 rounded-lg shadow-lg">
                            <h1 class="text-center text-xl font-extrabold">
                                {{ $member->role }}
                            </h1>
                            <div class="mt-4">
                                {{ $member->name }}
                            </div>
                        </div>
                    @endforeach
            @endforeach
            {{-- <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            </div> --}}
        @endforeach
    </div>
    @elseif ($current == 'committees')
        Committees
    @endif
</div>


