<div class="col-span-3 p-4">
    <select wire:model.live="selectedInstituteId" id="branch" class="w-full flex md:hidden mt-4">
        @foreach ($institutes as $institute)
            <option value="{{ $institute->id }}">{{ $institute->name }}</option>
        @endforeach
    </select>
    @php
        $instituteActive = 'text-blue-600 border-blue-600 active dark:text-blue-500 dark:border-blue-500';
        $instituteInactive = 'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300';
    @endphp
    <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="hidden md:flex flex-wrap -mb-px">
            @foreach ($institutes as $institute)
                <li wire:click="changeInstitute({{ $institute->id }})" class="me-2 hover:cursor-pointer">
                    <span class="inline-block p-4 border-b-2 rounded-t-lg {{ $institute->id == $selectedInstitute?->id ? $instituteActive : $instituteInactive }}">
                        {{ $institute->name }}
                        <br>
                        <span class="text-xs">{{ $institute->address }}</span>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="mt-4">
        @if ($selectedInstitute)
            {!! $selectedInstitute?->description !!}
        @else
            No Institutes
        @endif
    </div>
</div>
