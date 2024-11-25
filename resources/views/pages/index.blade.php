<?php

use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{state, rules};

name('home');
// middleware(['redirect-to-dashboard']);

?>

<x-layouts.marketing>
    @volt('home')
        <div>
            <x-ui.marketing.hero />
            <x-ui.marketing.blog />
            <livewire:items-list />
        </div>
    @endvolt
</x-layouts.marketing>
