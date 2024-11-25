<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Item as ModelsItem;
use Illuminate\Support\Facades\Storage;

class ItemShow extends Component
{
    public $item;

    // Mount function to load the item to be viewed
    public function mount($id)
    {
        $this->item = ModelsItem::findOrFail($id);
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
    
        $this->dispatch('alert:shown');
        // Flash message dan dispatch event
        session()->flash('message', 'Data barang dan gambar terkait berhasil dihapus.');
        session()->flash('status', 'success');
         // Trigger event Livewire untuk notifikasi
    
        // Redirect ke halaman indeks barang
        return redirect()->route('barang.index');

    }

    public function render()
    {
        return view('pages.items.show'); // Ensure this file has a root HTML element
    }
}
