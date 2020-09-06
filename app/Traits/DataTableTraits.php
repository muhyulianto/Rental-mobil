<?php

namespace App\Traits;

use Livewire\WithPagination;

trait DataTableTraits
{
    use WithPagination;
    public $orderBy = 'created_at';
    public $orderAsc = false;
    public $perPage = 10;
    public $search = '';

    // Resetting Pagination After Filtering Data
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function ordering($orderBy)
    {
        $this->orderBy = $orderBy;
        if ($this->orderBy === $orderBy) {
            $this->orderAsc = !$this->orderAsc;
        } else {
            $this->orderAsc = true;
        }
    }
}
