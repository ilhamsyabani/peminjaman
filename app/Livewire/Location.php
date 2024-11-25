<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Location as ModelsLocation;
use Livewire\WithPagination;

class Location extends Component
{
    use WithPagination;

    public $name;
    public $updateData = false;
    public $Location_id;
    public $keyword;

    // Menyimpan lokasi baru
    public function storeLocation()
    {
        $rules = [
            'name' => 'required|string|max:255',
        ];

        $pesan = [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama melebihi 255 karakter',
        ];

        $validated = $this->validate($rules, $pesan);

        ModelsLocation::create($validated);

        session()->flash('message', 'Data lokasi berhasil dibuat');
        session()->flash('status', 'success');

        // Menggunakan dispatch untuk alert
        $this->dispatch('alert:shown');

        $this->resetForm();
    }

    // Mengedit lokasi
    public function editLocation($id)
    {
        $data = ModelsLocation::find($id);

        $this->name = $data->name;

        $this->updateData = true;
        $this->Location_id = $id;
    }

    // Memperbarui lokasi yang sudah ada
    public function updateLocation()
    {
        $rules = [
            'name' => 'required|string|max:255',
        ];

        $pesan = [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama melebihi 255 karakter',
        ];


        $validated = $this->validate($rules, $pesan);

        $data = ModelsLocation::find($this->Location_id);

        $data->update($validated);
        $this->updateData = false;
        $this->Location_id = '';

        session()->flash('message', 'Data lokasi berhasil diperbarui');
        session()->flash('status', 'success');

        // Menggunakan dispatch untuk alert
        $this->dispatch('alert:shown');

        $this->resetForm();
    }

    // Fungsi untuk mereset form
    public function resetForm()
    {
        $this->reset(['name', 'Location_id', 'updateData']);

    }


    //Fungsi untuk hapus data
    public function deleteLocation($id){
        ModelsLocation::find($id)->delete();

        session()->flash('message', 'Data lokasi berhasil dihapus');
        session()->flash('status', 'success');

        // Menggunakan dispatch untuk alert
        $this->dispatch('alert:shown');

        $this->resetForm();
    }

    public function render()
    {
        if($this->keyword !== null){
            $data = ModelsLocation::where('name', 'like', '%' . $this->keyword .'%')->orderBy('name', 'asc')->paginate(5);
        }else{
            $data = ModelsLocation::orderBy('name', 'asc')->paginate(5);
        }

        return view('livewire.location', ['locations' => $data]);
    }
}
