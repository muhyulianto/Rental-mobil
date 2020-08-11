<?php

namespace App\Http\Livewire;

use App\Invoice;
use Livewire\Component;
use Livewire\WithPagination;

class InvoiceTable extends Component
{
    use WithPagination;
    public $orderBy = 'created_at';
    public $orderAsc = false;
    public $perPage = 10;
    public $search = '';

    public function render()
    {
        $invoices = Invoice::with('customers')
            ->join('customers', 'invoices.customer_id', '=', 'customers.id')
            ->select('invoices.*', 'customers.name')
            ->where('name', 'LIKE', '%' . $this->search . '%')
            ->orderBy(
                $this->orderBy,
                $this->orderAsc == true ? 'ASC' : 'DESC'
            )
            ->paginate($this->perPage);

        return view('livewire.invoice-table')->with('invoices', $invoices);
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
