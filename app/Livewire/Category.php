<?php

namespace App\Livewire;

use App\Models\Category as ModelsCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;

    public $name;
    public $description;
    public $updateData = false;
    public $category_id;
    public $keyword;

    // Menyimpan kategori baru
    public function store()
    {
        $rules = [
            'name' => 'required',
            'description' =>  'required',
        ];

        $pesan = [
            'name.required' => 'Nama wajib diisi',
            'description.required' => 'Deskripsi wajib diisi',
        ];

        $validated = $this->validate($rules, $pesan);

        ModelsCategory::create($validated);

        session()->flash('message', 'Data kategori berhasil dibuat');
        session()->flash('status', 'success');

        // Menggunakan dispatch untuk alert
        $this->dispatch('alert:shown');

        $this->resetForm();
    }

    // Mengedit kategori
    public function editCategory($id)
    {
        $data = ModelsCategory::find($id);

        $this->name = $data->name;
        $this->description = $data->description;

        $this->updateData = true;
        $this->category_id = $id;
    }

    // Memperbarui kategori yang sudah ada
    public function updateCategory()
    {
        $rules = [
            'name' => 'required',
            'description' =>  'required',
        ];

        $pesan = [
            'name.required' => 'Nama wajib diisi',
            'description.required' => 'Deskripsi wajib diisi',
        ];

        $validated = $this->validate($rules, $pesan);

        $data = ModelsCategory::find($this->category_id);

        $data->update($validated);
        $this->updateData = false;
        $this->category_id = '';

        session()->flash('message', 'Data kategori berhasil diperbarui');
        session()->flash('status', 'success');

        // Menggunakan dispatch untuk alert
        $this->dispatch('alert:shown');

        $this->resetForm();
    }

    // Fungsi untuk mereset form
    public function resetForm()
    {
        $this->reset(['name', 'description', 'category_id', 'updateData']);

    }


    //Fungsi untuk hapus data
    public function deleteCategory($id){
        ModelsCategory::find($id)->delete();

        session()->flash('message', 'Data kategori berhasil dihapus');
        session()->flash('status', 'success');

        // Menggunakan dispatch untuk alert
        $this->dispatch('alert:shown');

        $this->resetForm();
    }
    // Render tampilan Livewire
    public function render()
    {
        if($this->keyword !== null){
            $data = ModelsCategory::where('name', 'like', '%' . $this->keyword .'%')->orderBy('name', 'asc')->paginate(5);
        }else{
            $data = ModelsCategory::orderBy('name', 'asc')->paginate(5);
        }
        
        return view('livewire.category', ['categoris' => $data]);
    }
}

