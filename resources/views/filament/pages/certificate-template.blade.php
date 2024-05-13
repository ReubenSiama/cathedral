<x-filament-panels::page>
    <x-filament::link :href="route('certificate.template', [
        'type' => 'baptism',
        'orientation' => 'portrait',
        'size' => 'a5'
    ])">
        Baptism
    </x-filament::link>
    <x-filament::link :href="route('certificate.template', [
        'type' => 'first-communion',
        'orientation' => 'portrait',
        'size' => 'a4'
    ])">
        First Communion
    </x-filament::link>
    <x-filament::link :href="route('certificate.template', [
        'type' => 'confirmation',
        'orientation' => 'portrait',
        'size' => 'a4'
    ])">
        Confirmation
    </x-filament::link>
    <x-filament::link :href="route('certificate.template', [
        'type' => 'marriage',
        'orientation' => 'landscape',
        'size' => 'a4'
    ])">
        Marriage Certificate
    </x-filament::link>
    <x-filament::link :href="route('certificate.template', [
        'type' => 'funeral',
        'orientation' => 'portrait',
        'size' => 'a5'
    ])">
        Funeral
    </x-filament::link>
</x-filament-panels::page>
