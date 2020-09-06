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
                    <th>No</th>
                    <th>
                        <a href="#" role="button" class="text-dark" wire:click.prevent="ordering('name')">
                            Customer Name
                            @include('include.ordering-icon', ['order' => 'name'])
                        </a>
                    </th>
                    <th>
                        ID Card Number
                    </th>
                    <th>
                        Phone Number
                    </th>
                    <th class="text-right" style="width: 130px">Action</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($customers as $key => $customer)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->id_card_number }}</td>
                    <td>{{ $customer->phone_number }}</td>
                    <td class="text-right">
                        <a href="{{ route('customer.show', $customer->id) }}" type="button" class="btn btn-success btn-sm">
                            <i class="fas fa-eye    "></i>
                        </a>
                        <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-pencil-alt    "></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete">
                            <i class="fas fa-trash    "></i>
                        </button>
                        @include('customer.modal-delete')
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">
                    Data not found
                </td>
            </tr>
            @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-between">
            <div class="align-self-center">
                Showing {{ $customers->currentPage() }} to {{ $customers->perPage() }} of {{ $customers->total() }} entries
            </div>
            {{ $customers->links() }}
        </div>
    </div>
</div>
