<?php

namespace App\Livewire;

use App\Models\Location;
use App\Models\Locker as ModelsLocker;
use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;

class Locker extends Component
{
    use WithPagination;

    public $name;
    public $room_id;
    public $updateData = false;
    public $Locker_id;
    public $keyword;
    public $location_filter = '';
    public $room_filter = '';

    // Menyimpan loker baru
    public function storeLocker()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'room_id' => 'required|string|exists:rooms,id',
        ];

        $pesan = [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama melebihi 255 karakter',
            'room_id.required' => 'Lokasi wajib diisi',
            'room_id.exists' => 'Lokasi tidak ditemukan',
        ];

        $validated = $this->validate($rules, $pesan);

        ModelsLocker::create($validated);

        session()->flash('message', 'Data loker berhasil dibuat');
        session()->flash('status', 'success');

        // Menggunakan dispatch untuk alert
        $this->dispatch('alert:shown');

        $this->resetForm();
    }

    // Mengedit loker
    public function editLocker($id)
    {
        $data = ModelsLocker::find($id);

        $this->name = $data->name;

        $this->updateData = true;
        $this->Locker_id = $id;
    }

    // Memperbarui loker yang sudah ada
    public function updateLocker()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'room_id' => 'required|string|exists:rooms,id',
        ];

        $pesan = [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama melebihi 255 karakter',
            'room_id.required' => 'Lokasi wajib diisi',
            'room_id.exists' => 'Lokasi tidak ditemukan',
        ];


        $validated = $this->validate($rules, $pesan);

        $data = ModelsLocker::find($this->Locker_id);

        $data->update($validated);
        $this->updateData = false;
        $this->Locker_id = '';

        session()->flash('message', 'Data loker berhasil diperbarui');
        session()->flash('status', 'success');

        // Menggunakan dispatch untuk alert
        $this->dispatch('alert:shown');

        $this->resetForm();
    }

    // Fungsi untuk mereset form
    public function resetForm()
    {
        $this->reset(['name', 'Locker_id', 'updateData']);
    }


    //Fungsi untuk hapus data
    public function deleteLocker($id)
    {
        ModelsLocker::find($id)->delete();

        session()->flash('message', 'Data loker berhasil dihapus');
        session()->flash('status', 'success');

        // Menggunakan dispatch untuk alert
        $this->dispatch('alert:shown');

        $this->resetForm();
    }


    public function render()
    {
        // Initialize the query
        $query = ModelsLocker::query();

        // Search filter based on keyword
        if (!empty($this->keyword)) {
            $query->where('name', 'like', '%' . $this->keyword . '%');
        }

        // Filter by room if a specific room is selected
        if ($this->room_filter !== 'Semua ruangan' && !empty($this->room_filter)) {
            $query->where('room_id', $this->room_filter);
        }

        // Filter by location if a specific location is selected, and adjust room filter options
        if ($this->location_filter !== 'Semua lokasi' && !empty($this->location_filter)) {
            $query->whereHas('room', function ($q) {
                $q->where('location_id', $this->location_filter);
            });
            // Update room filter options based on the selected location
            $roomOptions = Room::where('location_id', $this->location_filter)->pluck('name', 'id');
        } else {
            // If no specific location filter, show all rooms as options
            $roomOptions = Room::pluck('name', 'id');
        }

        // Execute the filtered query
        $data = $query->orderBy('name', 'asc')->paginate(5);

        // Retrieve location options
        $locations = Location::pluck('name', 'id');
        $rooms = Room::pluck('name', 'id');

        // Pass data to the view
        return view('livewire.locker', [
            'lockers' => $data,
            'rooms' => $rooms, //ini untuk fiil 
            'locations' => $locations,
            'roomOptions' => $roomOptions, //ini untuk filter
        ]);
    }
}
