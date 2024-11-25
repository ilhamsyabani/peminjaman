<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Borrowers as ModelsBorrower;
class BorrowersShow extends Component
{
    public $borrower;

    // Mount function to load the borrower to be viewed
    public function mount($id)
    {
        $this->borrower = ModelsBorrower::findOrFail($id);
    }

    public function render()
    {
        return view('pages.borrowers.show');
    }
}
