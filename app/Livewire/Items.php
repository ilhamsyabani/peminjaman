<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Item as ModelsItem;
use Livewire\Attributes\Layout;

#[Layout('component.layouts.marketing')]
class Items extends Component
{
    public function render()
    {
        $items = ModelsItem::paginate(4);
        return view('pages.items', compact('items'));
    }
}
