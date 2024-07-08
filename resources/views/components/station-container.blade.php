<div id="controls-carousel" class="relative w-full mt-10" data-carousel="static">
    <div class="relative h-[30rem] overflow-hidden md:h-[20rem] rounded-xl">
        @foreach ($stations as $station)
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <div class="bg-[#D9D9D9] bg-opacity-20 absolute block w-full h-full items-center content-center">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center content-center">
                        <div class="hidden md:flex rounded-xl placeholder-gray-100 pl-10 p-4">
                            <img class="h-full w-full bg-cover" src="{{ asset('storage/'.$station->banner) }}" class="rounded-xl" alt="{{ $station->name }}">
                        </div>
                        <div class="col-span-1 md:col-span-2 px-14 p-4">
                            <h1 class="text-md md:text-xl font-extrabold uppercase">
                                {{ $station->name }}
                            </h1>
                            {{ $station->address }}
                            <p class="mb-4">
                                {{ $station->short_description }}
                            </p>
                            <a class="bg-green-500 hover:bg-green-400 rounded px-4 py-2 text-white" href="{{ route('stations.index', $station) }}">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-[#D9D9D9] dark:bg-gray-800/30 group-hover:bg-[#D9D9D9] group-hover:bg-opacity-80 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-[#D9D9D9] dark:bg-gray-800/30 group-hover:bg-[#D9D9D9] group-hover:bg-opacity-80 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
