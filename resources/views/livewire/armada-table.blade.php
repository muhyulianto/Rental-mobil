<div>
    <div class="d-flex justify-content-between">
        <div class="form-group">
            <select class="form-control" wire:model="perPage">
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
            </select>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-search    "></i>
                    </div>
                </div>
                <input type="text" class="form-control" placeholder="search here" wire:model="search">
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-vertical-center">
            <thead>
                <tr>
                    <th>
                        No
                    </th>
                    <th>
                        <a href="#" role="button" class="text-dark" wire:click.prevent="ordering('name')">
                            Car Name
                            @include('include.ordering-icon', ['order' => 'name'])
                        </a>
                    </th>
                    <th>
                        License Plate
                    </th>
                    <th>
                        <a href="#" role="button" class="text-dark" wire:click.prevent="ordering('status')">
                            Status
                            @include('include.ordering-icon', ['order' => 'status'])
                        </a>
                    </th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($armadas as $key => $armada)
                <tr>
                    <td>
                        {{ $key + 1 }}
                    </td>
                    <td scope="row">
                        <a href="{{ route("car.show", $armada->cars->id) }}">
                            {{ $armada->format_name }}
                        </a>
                    </td>
                    <td>
                        {{ $armada->license_plate }}
                    </td>
                    <td>
                        {{ $armada->status }}
                    </td>
                    <td class="text-right">
                        <a href="{{ route("armada.edit", $armada->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-pencil-alt    "></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete">
                            <i class="fas fa-trash    "></i>
                        </button>
                    </td>
                </tr>
                @include('armada.modal-delete')
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between">
        <div class="align-self-center">
            Showing {{ $armadas->currentPage() }} to {{ $armadas->perPage() }} of {{ $armadas->total() }} entries
        </div>
        {{ $armadas->links() }}
    </div>
</div>
