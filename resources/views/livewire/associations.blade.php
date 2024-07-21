<div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    <div class="col-span-1 hidden md:flex">
        <div class="">
            <ul class="w-full bg-gray-100 p-4 rounded-lg">
                @foreach ($associations as $data)
                <li class="p-4 rounded-lg mb-4
                hover:cursor-pointer hover:bg-gray-200
                {{ $association->id == $data->id ? 'bg-gray-200' : 'bg-white shadow-lg' }}"
                    wire:click="changeAssociation({{ $data->id }})">
                    {{ $data->name }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-span-3 p-4">
        <select wire:model.live="associationId" id="association" class="w-full flex md:hidden">
            @foreach ($associations as $data)
                <option value="{{ $data->id }}">{{ $data->name }}</option>
            @endforeach
        </select>
        <select wire:model.live="branchId" id="branch" class="w-full flex md:hidden mt-4">
            @foreach ($branches as $branch)
                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
            @endforeach
        </select>
        @php
            $branchActive = 'text-blue-600 border-blue-600 active dark:text-blue-500 dark:border-blue-500';
            $branchInactive = 'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300';
        @endphp
        <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
            <ul class="hidden md:flex flex-wrap -mb-px">
                @foreach ($branches as $branch)
                    <li wire:click="changeBranch({{ $branch->id }})" class="me-2 hover:cursor-pointer">
                        <span class="inline-block p-4 border-b-2 rounded-t-lg {{ $branch->id == $selectedBranch?->id ? $branchActive : $branchInactive }}">
                            {{ $branch->name }}
                            <br>
                            <span class="text-xs">{{ $branch->address }}</span>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="mt-4">
            @if ($selectedBranch)
                @if ($selectedBranch?->image)
                <img src="{{ asset('storage/'.$selectedBranch->image) }}" alt="{{ $selectedBranch->name }}"
                class="object-cover w-full md:w-[30%] mb-6 md:ml-6 rounded-lg md:float-end">
                @endif
                {!! $selectedBranch?->description !!}
            @else
                No branches
            @endif
        </div>
    </div>
</div>
