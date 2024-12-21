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
        <div class="p-4 items-center">
            @foreach ($terms as $term)
                <h1 class="text-center text-xl font-extrabold">
                    {{ $term->name }}({{ $term->duration }})
                </h1>
                @foreach ($term->ppcObAndCommittees as $committees)
                    @if ($committees->type === \App\Enums\ObAndCommitteeType::OB)
                        <h2 class="text-lg font-bold mt-4">{{ $committees->name }}</h2>
                        <div class="mt-4">
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th class="border border-gray-300 p-2">Position</th>
                                        <th class="border border-gray-300 p-2">Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($committees->members as $member)
                                        <tr>
                                            <td class="border border-gray-300 p-2">{{ $member->role }}</td>
                                            <td class="border border-gray-300 p-2">{{ $member->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                @endforeach
                <h2 class="text-lg font-bold mt-4 uppercase">Different committee established</h2>
                @foreach ($term->ppcObAndCommittees as $committees)
                    @if ($committees->type !== \App\Enums\ObAndCommitteeType::OB)
                        <h2 class="text-lg font-bold mt-4">{{ $committees->name }}</h2>
                        <div class="mt-4">
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th class="border border-gray-300 p-2">Position</th>
                                        <th class="border border-gray-300 p-2">Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($committees->members as $member)
                                        <tr>
                                            <td class="border border-gray-300 p-2">{{ $member->role }}</td>
                                            <td class="border border-gray-300 p-2">{{ $member->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    @endif
</div>
