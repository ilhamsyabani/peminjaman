<?php

use App\Livewire\Location;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Location::class)
        ->assertStatus(200);
});
