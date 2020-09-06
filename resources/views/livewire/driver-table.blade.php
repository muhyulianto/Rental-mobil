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
        <table class="table">
            <thead>
                <tr>
                    <th>
                        No
                    </th>
                    <th>
                        <a href="#" role="button" class="text-dark" wire:click.prevent="ordering('name')">
                            Name
                            @include('include.ordering-icon', ['order' => 'name'])
                        </a>
                    </th>
                    <th>
                        <a href="#" role="button" class="text-dark" wire:click.prevent="ordering('age')">
                            Age
                            @include('include.ordering-icon', ['order' => 'age'])
                        </a>
                    </th>
                    <th>
                        Address
                    </th>
                    <th>
                        <a href="#" role="button" class="text-dark" wire:click.prevent="ordering('status')">
                            Status
                            @include('include.ordering-icon', ['order' => 'status'])
                        </a>
                    </th>
                    <th>
                        Phone Number
                    </th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($drivers as $key => $driver)
                <tr>
                    <td>
                        {{ $drivers->firstItem() + $key }}
                    </td>
                    <td>
                        {{ $driver->name }}
                    </td>
                    <td>
                        {{ $driver->format_age }}
                    </td>
                    <td class="w-25">
                        {{ $driver->address }}
                    </td>
                    <td>
                        {{ $driver->status }}
                    </td>
                    <td>
                        {{ $driver->phone_number }}
                    </td>
                    <td class="text-right">
                        <a href="{{ route("driver.edit", $driver->id) }}" type="button" class="btn btn-primary btn-sm">
                            <i class="fas fa-pencil-alt    "></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete">
                            <i class="fas fa-trash    "></i>
                        </button>
                        @include('driver.modal-delete')
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Data not found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between">
        <div class="align-self-center">
            Showing {{ $drivers->currentPage() }} to {{ $drivers->perPage() }} of {{ $drivers->total() }} entries
        </div>
        {{ $drivers->links() }}
    </div>
</div>