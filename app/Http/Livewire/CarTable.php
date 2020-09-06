<?php

namespace App\Http\Livewire;

use App\Car;
use App\Traits\DataTableTraits;
use Livewire\Component;

class CarTable extends Component
{
    use DataTableTraits;

    public function render()
    {
        $cars = Car::withCount('armadas')
            ->where('type', 'LIKE', '%' . $this->search . '%')
            ->orWhere('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere(\DB::raw('CONCAT(brand," ",name)'), 'LIKE', '%' . $this->search . '%')
            ->orWhere('brand', 'LIKE', '%' . $this->search . '%')
            ->orWhere('price', 'LIKE', '%' . $this->search . '%')
            ->orderBy(
                $this->orderBy,
                $this->orderAsc == true ? 'ASC' : 'DESC'
            )
            ->paginate(10);

        return view('livewire.car-table')->with('cars', $cars);
    }
}
