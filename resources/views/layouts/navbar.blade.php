@php
    $activeClass = 'block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent
          md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500';
    $inactiveClass = 'block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0
          md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700
          dark:hover:text-white md:dark:hover:bg-transparent'
@endphp
<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="hidden md:flex flex-wrap justify-center items-center mx-auto max-w-screen-xl p-4">
    <a href="{{ Route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('images/new_logo.png') }}" alt="Logo" class="h-10">
    </a>
    {{-- <div class="flex items-center space-x-6 rtl:space-x-reverse">
      <span class="text-sm">
        Kulikawn, Aizawl
        <br>
        Mizoram, 796015
      </span>
    </div> --}}
  </div>
</nav>

<nav class="bg-white border-gray-200 dark:bg-gray-900
shadow-md dark:border-gray-700 inset-x-0 z-50
">
  <div class="container flex flex-wrap items-center justify-between md:justify-center mx-auto p-4">
    <a href="/" class="flex md:hidden items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('images/new_logo.png') }}" alt="Logo" class="h-8">
    </a>
    <button data-collapse-toggle="navbar-default"
    type="button" class="
    inline-flex items-center
    p-2 w-10 h-10
    justify-center
    text-sm text-gray-500
    rounded-lg md:hidden hover:bg-gray-100
    focus:outline-none focus:ring-2
    focus:ring-gray-200 dark:text-gray-400
    dark:hover:bg-gray-700 dark:focus:ring-gray-600"
    aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="flex flex-col p-4 md:p-0 mt-4 border border-gray-100
      rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0
      md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="{{ route('home') }}" class="{{ Route::is('home') ? $activeClass : $inactiveClass }}" aria-current="page">Home</a>
        </li>
        <li>
          <a href="{{ route('bishops.and.priests') }}" class="{{ Route::is('bishops.and.priests') ? $activeClass : $inactiveClass }}" aria-current="page">Bishops & Priests</a>
        </li>
        <li>
          <a href="{{ route('religious.and.catechists') }}" class="{{ Route::is('religious.and.catechists') ? $activeClass : $inactiveClass }}">Religious & Catechists</a>
        </li>
        <li>
          <a href="{{ route('stations.index') }}" class="{{ Route::is('stations.index') ? $activeClass : $inactiveClass }}">Stations</a>
        </li>
        <li>
          <a href="{{ route('associations') }}" class="{{ Route::is('associations') ? $activeClass : $inactiveClass }}">Associations</a>
        </li>
        <li>
          <a href="{{ route('parish.pastoral.council') }}" class="{{ Route::is('parish.pastoral.council') ? $activeClass : $inactiveClass }}">Parish Pastoral Council</a>
        </li>
        <li>
          <a href="{{ route('institutions') }}" class="{{ Route::is('institutions') ? $activeClass : $inactiveClass }}">Institutions</a>
        </li>
        <li>
          <a href="{{ route('others') }}" class="{{ Route::is('others') ? $activeClass : $inactiveClass }}">Others</a>
        </li>
        <li>
          <a href="{{ route('about.us') }}" class="{{ Route::is('about.us') ? $activeClass : $inactiveClass }}">About Us</a>
        </li>
        <li>
          <a href="#" class="{{ Route::is('publications') ? $activeClass : $inactiveClass }}">Publications</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
