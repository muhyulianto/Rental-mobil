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
    <div class="table-responsive-lg">
        <table class="table table-vertical-center">
            <thead>
                <tr>
                    <th>
                        No
                    </th>
                    <th>
                        <a href="#" role="button" class="text-dark" wire:click.prevent="ordering('type')">
                            Type
                            @include('include.ordering-icon', ['order' => 'type'])
                        </a>
                    </th>
                    <th>
                        <a href="#" role="button" class="text-dark" wire:click.prevent="ordering('brand')">
                            Brand
                            @include('include.ordering-icon', ['order' => 'brand'])
                        </a>
                    </th>
                    <th>
                        <a href="#" role="button" class="text-dark" wire:click.prevent="ordering('name')">
                            Name
                            @include('include.ordering-icon', ['order' => 'name'])
                        </a>
                    </th>
                    <th>
                        <a href="#" role="button" class="text-dark" wire:click.prevent="ordering('price')">
                            Price
                            @include('include.ordering-icon', ['order' => 'price'])
                        </a>
                    </th>
                    <th>
                        <a href="#" role="button" class="text-dark" wire:click.prevent="ordering('armada_count')">
                            Unit
                            @include('include.ordering-icon', ['order' => 'armada_count'])
                        </a>
                    </th>
                    <th style="width: 180px" class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($cars as $key => $car)
                <tr>
                    <td>
                        {{ $key + 1 }}
                    </td>
                    <td scope="row">{{ $car->type }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->format_price }}</td>
                    <td>{{ $car->format_armada_count }}</td>
                    <td class="text-right">
                        <a href="{{ route('car.show', $car->id) }}" class="btn btn-success btn-sm"><span class="fa fa-eye"></span></a>
                        <a href="{{ route('car.edit', $car->id) }}" type="button" class="btn btn-primary btn-sm"><span class="fa fa-pen"></span></a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete">
                            <i class="fas fa-trash    "></i>
                        </button>
                        @include('car.modal-delete')
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between">
        <div class="align-self-center">
            Showing {{ $cars->currentPage() }} to {{ $cars->perPage() }} of {{ $cars->total() }} entries
        </div>
        {{ $cars->links() }}
    </div>
</div>
