<?php

namespace App\Livewire;

use App\Models\Borrowers as ModelsBorrowers;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class BorrowersCreate extends Component
{
    use WithFileUploads;

    public $name; //multi data atau array untuk menyimpan semua path images yang diupload
    public $no_id;
    public $photo;
    public $email;
    public $phone;
    public $status;
    public $address;
    public $information;


    protected $listeners = ['photosUploaded' => 'handlePhotosUploaded'];

    public function handlePhotosUploaded($filePath)
    {
        // Tambahkan path file ke array uploadedImages
        $this->photo = $filePath;
    }

    public function storeBorrower()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'no_id' => 'required|string|max:20|unique:borrowers,no_id',
            'photo' => 'required',
            'email' => 'required|email|unique:borrowers,email',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string',
            'information' => 'nullable|string|max:500',
        ];

        $messages = [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'no_id.required' => 'Nomor ID wajib diisi.',
            'no_id.string' => 'Nomor ID harus berupa teks.',
            'no_id.max' => 'Nomor ID tidak boleh lebih dari 20 karakter.',
            'no_id.unique' => 'Nomor ID sudah terdaftar.',

            'photo.required' => 'Foto wajib diunggah.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',

            'phone.required' => 'Nomor telepon wajib diisi.',
            'phone.string' => 'Nomor telepon harus berupa teks.',
            'phone.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',

            'address.string' => 'Alamat harus berupa teks.',

            'information.string' => 'Deskripsi harus berupa teks.',
            'information.max' => 'Deskripsi tidak boleh lebih dari 500 karakter.',
        ];
        $validated = $this->validate($rules, $messages);
        ModelsBorrowers::create($validated);
       
        session()->flash('message', 'Data Peminjam berhasil dibuat');
        session()->flash('status', 'success');

        // Menggunakan dispatch untuk alert
        $this->dispatch('alert:shown');
        $this->resetForm();


    }

    public function render()
    {
        return view('pages.borrowers.create');
    }
}
