<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Borrowers as ModelsBorrower;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class BorrowersEdit extends Component
{
    use WithFileUploads;

    public $borrower;
    public $name;
    public $no_id;
    public $photo;
    public $newPhoto; // Tambahkan untuk unggahan baru
    public $email;
    public $phone;
    public $status;
    public $address;
    public $information;

    public function mount($id)
    {
        $this->borrower = ModelsBorrower::findOrFail($id);
        $this->populateData();
    }

    public function populateData()
    {
        $this->name = $this->borrower->name;
        $this->no_id = $this->borrower->no_id;
        $this->photo = $this->borrower->photo;
        $this->email = $this->borrower->email;
        $this->phone = $this->borrower->phone;
        $this->status = $this->borrower->status;
        $this->address = $this->borrower->address;
        $this->information = $this->borrower->information;
    }

    protected $listeners = ['photosUploaded' => 'handlePhotosUploaded'];

    public function handlePhotosUploaded($filePath)
    {
        $this->photo = $filePath; // Simpan path file ke properti photo
    }

    public function updateBorrower()
    {
        // Validasi
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'no_id' => 'required|string|max:20|unique:borrowers,no_id,' . $this->borrower->id,
            'email' => 'required|email|unique:borrowers,email,' . $this->borrower->id,
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string',
            'information' => 'nullable|string|max:500',
            'newPhoto' => 'nullable|image|max:1024',
        ]);

        // Jika ada foto baru
        if ($this->newPhoto) {
            $validated['photo'] = $this->newPhoto->store('photos', 'public');
            // Hapus foto lama
            if ($this->photo && $this->photo !== $this->borrower->photo) {
                Storage::disk('public')->delete($this->borrower->photo);
            }
            $this->photo = $validated['photo'];
        }

        // Update borrower
        $this->borrower->update($validated);

        // Flash message
        session()->flash('message', 'Data peminjam berhasil diperbarui.');
        session()->flash('status', 'success');
        $this->dispatch('alert:shown');
      

        // Redirect jika perlu
        return redirect()->route('peminjam.index');
    }

    public function render()
    {
        return view('pages.borrowers.edit');
    }
}
