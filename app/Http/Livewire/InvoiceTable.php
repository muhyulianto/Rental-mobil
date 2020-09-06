<?php

namespace App\Http\Livewire;

use App\Invoice;
use App\Traits\DataTableTraits;
use Livewire\Component;

class InvoiceTable extends Component
{
    use DataTableTraits;

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
}
