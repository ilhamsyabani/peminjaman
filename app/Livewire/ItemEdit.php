<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Images as ModelImages;
use App\Models\Item as ModelItem;
use App\Models\Location;
use App\Models\Locker;
use App\Models\Room;
use App\Models\Purchase;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ItemEdit extends Component
{
    use WithFileUploads;

    public $item;
    public $name;
    public $code;
    public $amount;
    public $category_id;
    public $official_code;
    public $location_type;
    public $condition;
    public $status;
    public $description;
    public $purchase_id;
    public $location_id;
    public $storages = [];
    public $imagesPath = [];
    public $existingImages = [];
    public $imageIdToDelete = null; // Store the image ID to delete

    protected $listeners = ['imagesUploaded' => 'handleImagesUploaded'];

    // Load the item and populate data fields
    public function mount($id)
    {
        $this->item = ModelItem::findOrFail($id);
        $this->populateItemData();
    }

    public function confirmDelete($imageId)
    {
        // Set the ID of the image to delete and trigger modal visibility
        $this->imageIdToDelete = $imageId;
    }

    public function removeImage()
    {
        if ($this->imageIdToDelete) {
            $image = ModelImages::find($this->imageIdToDelete);

            if ($image) {
                Storage::disk('public')->delete($image->path);
                $image->delete();

                session()->flash('message', 'Gambar berhasil dihapus.');
            } else {
                session()->flash('message', 'Gambar tidak ditemukan.');
            }

            // Reset the image ID after deletion
            $this->imageIdToDelete = null;
        }
    }

    private function populateItemData()
    {
        $this->name = $this->item->name;
        $this->code = $this->item->code;
        $this->amount = $this->item->amount;
        $this->category_id = $this->item->category_id;
        $this->official_code = $this->item->official_code;
        $this->location_type = $this->item->location_type; // polymorphic
        $this->location_id = $this->item->location_id; // polymorphic
        $this->condition = $this->item->condition;
        $this->status = $this->item->status;
        $this->description = $this->item->description;
        $this->purchase_id = $this->item->purchase_id;
        $this->existingImages = $this->item->images->pluck('path')->toArray();

        $this->loadStorages($this->location_type);
    }

    public function handleImagesUploaded($filePath)
    {
        $this->imagesPath[] = $filePath;
    }

    public function updatedLocationType($value)
    {
        $this->loadStorages($value);
    }

    private function loadStorages($type)
    {
        if ($type == 'Location') {
            $this->storages = Location::pluck('name', 'id');
        } elseif ($type == 'Room') {
            $this->storages = Room::pluck('name', 'id');
        } elseif ($type == 'Locker') {
            $this->storages = Locker::pluck('name', 'id');
        } else {
            $this->storages = [];
        }
    }

    public function updateItem()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:items,code,' . $this->item->id,
            'category_id' => 'required|exists:categories,id',
            'official_code' => 'nullable|string|max:255|unique:items,official_code,' . $this->item->id,
            'location_type' => 'required|string|in:Location,Room,Locker',
            'condition' => 'nullable|string',
            'status' => 'nullable|string',
            'amount' => 'nullable|integer',
            'description' => 'nullable|string',
            'purchase_id' => 'required|exists:purchases,id',
            'imagesPath' => 'array',
        ];

        if ($this->location_type === 'Location') {
            $rules['location_id'] = 'required|exists:locations,id';
        } elseif ($this->location_type === 'Room') {
            $rules['location_id'] = 'required|exists:rooms,id';
        } elseif ($this->location_type === 'Locker') {
            $rules['location_id'] = 'required|exists:lockers,id';
        }

        $validated = $this->validate($rules);

       
        $this->item->update($validated);

        if ($validated['imagesPath'] == []) {
            foreach ($validated['imagesPath'] as $imageUpload) {
                ModelImages::create([
                    'item_id' => $this->item->id,
                    'path' => $imageUpload,
                ]);
            }
        }

        session()->flash('message', 'Data Barang berhasil diperbarui');
        session()->flash('status', 'success');
        $this->dispatch('alert:shown');
    }

    public function render()
    {
        return view('pages.items.edit', [
            'locationOptions' => $this->storages,
            'categories' => Category::pluck('name', 'id'),
            'purchases' => Purchase::pluck('name', 'id'),
        ]);
    }
}
