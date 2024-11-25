<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Blog extends Component
{
    #[Layout('layouts.marketing')]
    public function render()
    {
        return view('pages.blog');
    }
}
