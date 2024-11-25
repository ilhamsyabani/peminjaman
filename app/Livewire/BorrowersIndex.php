<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Borrowers as ModelsBorowers;

class BorrowersIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $isModalOpen = false;
    public $isModalDelete = false;
    public $isUpdatePage = false;
    public $page = 1;
    public $perPage = 10;
    public $sortDirection = 'DESC';
    public $sortColumn = 'created_at';
    public $confirmDeleteId = null;


    protected $queryString = ['search'];

    public function render()
    {
        return view('pages.borrowers.index');
    }
  
}
