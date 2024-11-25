<?php

namespace App\Livewire;

use App\Models\Purchase as ModelsPurchase;
use Livewire\Component;
use Livewire\WithPagination;

class Purchase extends Component
{
    use WithPagination;

    public $name;
    public $vendor;
    public $date;
    public $description;
    public $status;
    public $updateData = false;
    public $purchase_id;
    public $keyword;

    // Menyimpan pembelian baru
    public function storePurchase()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'vendor' =>'nullable|string|max:255',
            'date' =>'required|date',
            'status' =>'required|string|max:255',
            'description' =>'nullable|string',
        ];

        $pesan = [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama melebihi 255 karakter',
        ];

        $validated = $this->validate($rules, $pesan);

        ModelsPurchase::create($validated);

        session()->flash('message', 'Data pembelian berhasil dibuat');
        session()->flash('status', 'success');

        // Menggunakan dispatch untuk alert
        $this->dispatch('alert:shown');

        $this->resetForm();
    }

    // Mengedit pembelian
    public function editPurchase($id)
    {
        $data = ModelsPurchase::find($id);

        $this->name = $data->name;
        $this->vendor =$data->vendor;
        $this->date =$data->date;
        $this->status =$data->status;
        $this->description = $data->description;

        $this->updateData = true;
        $this->purchase_id = $id;
    }

    // Memperbarui pembelian yang sudah ada
    public function updatePurchase()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'vendor' =>'nullable|string|max:255',
            'date' =>'required|date',
            'status' =>'required|string|max:255',
            'description' =>'nullable|string',
        ];

        $pesan = [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama melebihi 255 karakter',
        ];


        $validated = $this->validate($rules, $pesan);

        $data = ModelsPurchase::find($this->purchase_id);

        $data->update($validated);
        $this->updateData = false;
        $this->purchase_id = '';

        session()->flash('message', 'Data pembelian berhasil diperbarui');
        session()->flash('status', 'success');

        // Menggunakan dispatch untuk alert
        $this->dispatch('alert:shown');

        $this->resetForm();
    }

    // Fungsi untuk mereset form
    public function resetForm()
    {
        $this->reset(['name', 'description', 'vendor', 'date', 'status', 'purchase_id', 'updateData']);

    }


    //Fungsi untuk hapus data
    public function deletePurchase($id){
        ModelsPurchase::find($id)->delete();

        session()->flash('message', 'Data pembelian berhasil dihapus');
        session()->flash('status', 'success');

        // Menggunakan dispatch untuk alert
        $this->dispatch('alert:shown');

        $this->resetForm();
    }
    public function render()
    {
        if($this->keyword !== null){
            $data = ModelsPurchase::where('name', 'like', '%' . $this->keyword .'%')->orderBy('name', 'asc')->paginate(5);
        }else{
            $data = ModelsPurchase::orderBy('name', 'asc')->paginate(5);
        }
        
        return view('livewire.purchase', ['purchases' => $data]);
    }
}
