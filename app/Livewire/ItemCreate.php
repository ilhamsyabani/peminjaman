<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Images as ModelImages;
use App\Models\Item as ModelItem;
use App\Models\Location;
use App\Models\Locker;
use App\Models\Room;
use App\Models\Purchase;
use Livewire\Component;
use Livewire\WithFileUploads;

class ItemCreate extends Component
{
    use WithFileUploads;

    public $name; //multi data atau array untuk menyimpan semua path images yang diupload
    public $code;
    public $amount;
    public $category_id;
    public $official_code;
    public $location_type = '';
    public $condition;
    public $status;
    public $description;
    public $purchase_id;
    public $location_id;
    public $storages = [];
    public $imagesPath = [];

    protected $listeners = ['imagesUploaded' => 'handleImagesUploaded'];

    public function handleImagesUploaded($filePath)
    {
        // Tambahkan path file ke array uploadedImages
        $this->imagesPath[] = $filePath;
    }

    // public function updatedLocationType($value)
    // {
    //     $this->loadStorages($value);
    // }


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
        // dd($this->storages);
    }

    public function storeItem()
    {

        $rules = [
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:items,code',
            'category_id' => 'required|exists:categories,id',
            'official_code' => 'nullable|string|max:255|unique:items,official_code',
            'location_type' => 'required|string|in:Location,Room,Locker',
            'condition' => 'nullable|string',
            'status' => 'nullable|string',
            'amount' => 'nullable|string',
            'description' => 'nullable|string',
            'purchase_id' => 'required|exists:purchases,id',
            'imagesPath' => 'required|array',
        ];


        // Conditionally add location_id validation based on location_type
        if ($this->location_type === 'Location') {
            $rules['location_id'] = 'required|exists:locations,id';
        } elseif ($this->location_type === 'Room') {
            $rules['location_id'] = 'required|exists:rooms,id';
        } elseif ($this->location_type === 'Locker') {
            $rules['location_id'] = 'required|exists:lockers,id';
        }

        // Messages
        $messages = [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama melebihi 255 karakter',
            'code.required' => 'Kode wajib diisi',
            'code.unique' => 'Kode sudah dipakai oleh barang lain',
            'official_code.unique' => 'Kode sudah dipakai oleh barang lain',
            'location_id.required' => 'Location wajib diisi',
            'location_id.exists' => 'Location tidak ditemukan',
            'purchase_id.required' => 'Pembelian wajib diisi',
            'purchase_id.exists' => 'Pembelian tidak ditemukan',
            'imagesPath.required' => 'Harap upload minimal satu gambar.',
        ];
        $validated = $this->validate($rules, $messages);
        $item = ModelItem::create($validated);

        foreach ($validated['imagesPath'] as $imageArray) {
            foreach ($imageArray as $imageUpload) {
                ModelImages::create([
                    'item_id' => $item->id,
                    'path' => $imageUpload,
                ]);
            }
        }

        session()->flash('message', 'Data Barang berhasil dibuat');
        session()->flash('status', 'success');

        // Menggunakan dispatch untuk alert
        $this->dispatch('alert:shown');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset(['name', 'code', 'amount', 'category_id', 'official_code', 'location_type', 'condition', 'status', 'description', 'purchase_id', 'location_id', 'storages', 'imagesPath']);
    }

    public function render()
    {

        return view('pages.items.create', [
           'locationOptions' =>  $this->storages,
            'categories' => Category::pluck('name', 'id'),
            'purcases' => Purchase::pluck('name', 'id'),
        ]);
    }
}
