<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Item as ModelsItem;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class ItemIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'created_at';
    public $sortDir = 'DESC';
    public $perPage = 5;
    public $status = '';
    public $location = '';

    public function setSortingBy($sortByCol)
    {
        if ($this->sortBy === $sortByCol) {
            $this->sortDir = ($this->sortDir == "ASC") ? "DESC" : "ASC";
            return;
        }
        $this->sortBy = $sortByCol;
        $this->sortDir = "DESC";
    }

    // Update search query and reset pagination
    public function updateSearch()
    {
        $this->resetPage(); // Reset pagination to page 1
    }

    // Update status filter and reset pagination
    public function updateStatus()
    {
        $this->resetPage(); // Reset pagination to page 1
    }

    // Update location filter and reset pagination
    public function updateLocation()
    {
        $this->resetPage(); // Reset pagination to page 1
    }
    
    public function deleteItem(ModelsItem $item)
    {
        // Menghapus gambar yang terkait di storage
        if ($item->images) {
            foreach ($item->images as $image) {
                $path = $image->path; // Relatif ke storage disk 'public'
                if (Storage::disk('public')->exists($path)) { // Periksa apakah file ada
                    Storage::disk('public')->delete($path); // Hapus file dari storage
                }
            }
        }
    
        // Hapus item dari database
        $item->delete();
    
        // Flash message dan dispatch event
        session()->flash('message', 'Data barang dan gambar terkait berhasil dihapus.');
        session()->flash('status', 'success');
        $this->dispatch('alert:shown'); // Trigger event Livewire untuk notifikasi
    
        // // Redirect ke halaman indeks barang
        // return redirect()->route('barang.index');
    }
    



    public function render()
    {
        $items = ModelsItem::query()
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
            ->paginate($this->perPage);

        return view('pages.items.index', compact('items'));
    }
}
