<div>
	<button id="dropdownDefaultButton{{ $id }}" data-dropdown-toggle="dropdown{{ $id }}" class="text-black bg-gray-100 hover:bg-gray-200 focus:ring-0 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">
		{{ app()->getLocale() }}
		<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
			<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
		</svg>
	</button>
  
	<!-- Dropdown menu -->
	<div id="dropdown{{ $id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
		<ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton{{ $id }}">
			@foreach ($languages as $language)
				<li
                wire:click="switchLanguage('{{ $language->locale }}')"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:cursor-pointer dark:hover:text-white">
                    {{ $language->name }}
				</li>
			@endforeach
		</ul>
	</div>
</div>
