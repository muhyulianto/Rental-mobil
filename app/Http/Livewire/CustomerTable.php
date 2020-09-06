<?php

namespace App\Http\Livewire;

use App\Customer;
use App\Traits\DataTableTraits;
use Livewire\Component;

class CustomerTable extends Component
{
    use DataTableTraits;

    public function render()
    {
        $customers = Customer::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('id_card_number', 'LIKE', '%' . $this->search . '%')
            ->orWhere('phone_number', 'LIKE', '%' . $this->search . '%')
            ->orderBy(
                $this->orderBy,
                $this->orderAsc == true ? 'ASC' : 'DESC'
            )
            ->paginate($this->perPage);

        return view('livewire.customer-table')->with('customers', $customers);
    }
}
