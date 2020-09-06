<?php

namespace App\Http\Livewire;

use App\Armada;
use App\Traits\DataTableTraits;
use Livewire\Component;

class ArmadaTable extends Component
{
    use DataTableTraits;

    public function render()
    {
        $armadas = Armada::join('cars', 'armadas.car_id', '=', 'cars.id')
            ->select('armadas.*', \DB::raw('CONCAT_WS(" ", brand, name) as name'))
            ->where(\DB::raw('CONCAT_WS(" ", brand, name)'), 'LIKE', '%' . $this->search . '%')
            ->orWhere('license_plate', 'LIKE', '%' . $this->search . '%')
            ->orWhere('status', 'LIKE', '%' . $this->search . '%')
            ->orderBy(
                $this->orderBy,
                $this->orderAsc == true ? 'ASC' : 'DESC'
            )
            ->paginate($this->perPage);

        return view('livewire.armada-table')->with('armadas', $armadas);
    }
}
