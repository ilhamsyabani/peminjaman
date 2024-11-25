<?php

namespace App\Livewire;

use App\Models\Location;
use App\Models\Room as ModelsRoom;
use Livewire\Component;
use Livewire\WithPagination;

class Room extends Component
{
    use WithPagination;

    public $name;
    public $location_id;
    public $updateData = false;
    public $Room_id;
    public $keyword;
    public $location_filter= 'Semua lokasi';

    // Menyimpan ruangan baru
    public function storeRoom()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'location_id' => 'required|string|exists:locations,id',
        ];

        $pesan = [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama melebihi 255 karakter',
            'location_id.required'=> 'Lokasi wajib diisi',
            'location_id.exists'=> 'Lokasi tidak ditemukan',
        ];

        $validated = $this->validate($rules, $pesan);

        ModelsRoom::create($validated);

        session()->flash('message', 'Data ruangan berhasil dibuat');
        session()->flash('status', 'success');

        // Menggunakan dispatch untuk alert
        $this->dispatch('alert:shown');

        $this->resetForm();
    }

    // Mengedit ruangan
    public function editRoom($id)
    {
        $data = ModelsRoom::find($id);

        $this->name = $data->name;

        $this->updateData = true;
        $this->Room_id = $id;
    }

    // Memperbarui ruangan yang sudah ada
    public function updateRoom()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'location_id' => 'required|string|exists:locations,id',
        ];

        $pesan = [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama melebihi 255 karakter',
            'location_id.required'=> 'Lokasi wajib diisi',
            'location_id.exists'=> 'Lokasi tidak ditemukan',
        ];


        $validated = $this->validate($rules, $pesan);

        $data = ModelsRoom::find($this->Room_id);

        $data->update($validated);
        $this->updateData = false;
        $this->Room_id = '';

        session()->flash('message', 'Data ruangan berhasil diperbarui');
        session()->flash('status', 'success');

        // Menggunakan dispatch untuk alert
        $this->dispatch('alert:shown');

        $this->resetForm();
    }

    // Fungsi untuk mereset form
    public function resetForm()
    {
        $this->reset(['name', 'Room_id', 'updateData']);

    }


    //Fungsi untuk hapus data
    public function deleteRoom($id){
        ModelsRoom::find($id)->delete();

        session()->flash('message', 'Data ruangan berhasil dihapus');
        session()->flash('status', 'success');

        // Menggunakan dispatch untuk alert
        $this->dispatch('alert:shown');

        $this->resetForm();
    }


    public function render()
    {
        $query = ModelsRoom::query();
    
        if ($this->keyword !== null) {
            $query->where('name', 'like', '%' . $this->keyword . '%');
        }
    

        if ($this->location_filter !== 'Semua lokasi') {
            $query->where('location_id', 'like', '%' . $this->location_filter . '%');
        }

    
        $data = $query->orderBy('name', 'asc')->paginate(5);
    
        $locations = Location::pluck('name', 'id');
    
        return view('livewire.room', ['rooms' => $data, 'locations' => $locations]);
    }   
}
