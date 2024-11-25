<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class About extends Component
{
    #[Layout('layouts.marketing')]
    public function render()
    {
        return view('pages.about');
    }
}
