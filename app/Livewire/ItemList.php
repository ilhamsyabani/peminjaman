<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Item as ModelItem;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class ItemList extends Component
{
    use WithPagination;


    public $search;
    public $location;
    public $status;
    public $category;
    public $sortBy;
    public $sortDir = "DESC";

    #[Layout('layouts.marketing')]
    public function render()
    {
        $items = ModelItem::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->status !== '', function ($query) {
                $query->where('status', $this->status);
            })
            ->when($this->location !== '', function ($query) {
                $query->where('location_type', $this->location);
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate(9);

        return view('items', compact('items'));
    }
}
