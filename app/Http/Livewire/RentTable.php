<?php

namespace App\Http\Livewire;

use App\Rent;
use App\Traits\DataTableTraits;
use DB;
use Livewire\Component;

class RentTable extends Component
{
    use DataTableTraits;

    public function render()
    {
        $rents = Rent::join('customers', 'rents.customer_id', '=', 'customers.id')
            ->join('cars', 'rents.car_id', '=', 'cars.id')
            ->select('rents.*', 'customers.name', DB::raw('CONCAT(cars.brand," ",cars.name) as car_name'))
            ->where('customers.name', 'LIKE', '%' . $this->search . '%')
            ->orwhere('cars.name', 'LIKE', '%' . $this->search . '%')
            ->orwhere('cars.brand', 'LIKE', '%' . $this->search . '%')
            ->orderBy(
                $this->orderBy,
                $this->orderAsc == true ? 'ASC' : 'DESC'
            )
            ->paginate($this->perPage);

        return view('livewire.rent-table')->with('rents', $rents);
    }
}
