<?php

namespace App\Livewire;

use App\Models\Borrowers as ModelsBorrowers;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class BorrowersTable extends Component
{
    use WithPagination;

    public $perPage = 5;
    public $search = '';
    public $status = '';
    public $sortBy = 'created_at';
    public $sortDir = 'DESC';

    public function setSortingBy($sortByCol)
    {
        if ($this->sortBy === $sortByCol) {
            $this->sortDir = ($this->sortDir == "ASC") ? "DESC" : "ASC";
            return;
        }
        $this->sortBy = $sortByCol;
        $this->sortDir = "DESC";
    }

    // Update search query and reset pagination
    public function updateSearch()
    {
        $this->resetPage(); // Reset pagination to page 1
    }

    // Update status filter and reset pagination
    public function updateStatus()
    {
        $this->resetPage(); // Reset pagination to page 1
    }

    public function delete(ModelsBorrowers $borrower)
    {
        Storage::delete($borrower->photo);
        $borrower->delete();
    }

    public function render()
    {
        return view('components.ui.borrowers-table', [
            'borrowers' => ModelsBorrowers::search($this->search)
                ->when($this->status !== '', function ($query) {
                    $query->where('status', $this->status);
                })
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage),
        ]);
    }
}
