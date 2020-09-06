<?php

namespace App\Http\Livewire;

use App\Driver;
use App\Traits\DataTableTraits;
use Livewire\Component;

class DriverTable extends Component
{
    use DataTableTraits;

    public function render()
    {
        $drivers = Driver::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('age', 'LIKE', '%' . $this->search . '%')
            ->orWhere('address', 'LIKE', '%' . $this->search . '%')
            ->orWhere('status', 'LIKE', '%' . $this->search . '%')
            ->orderBy(
                $this->orderBy,
                $this->orderAsc == true ? 'ASC' : 'DESC'
            )
            ->paginate($this->perPage);

        return view('livewire.driver-table')->with('drivers', $drivers);
    }
}
