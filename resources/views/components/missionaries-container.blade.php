<div class="">
    <div class="font-bold text-lg">{{ $title }}</div>
    <ul>
        @foreach ($missionaries as $missionary)
            <li>{{ $missionary->name }} ({{ $missionary->address }})</li>
        @endforeach
    </ul>
</div>
