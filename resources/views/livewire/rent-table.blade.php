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
    <div class="table-responsive-lg mb-4">
        <table class="table table-vertical-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>
                        <a href="#" role="button" class="text-dark" wire:click.prevent="ordering('name')">
                            Customer name
                            @include('include.ordering-icon', ['order' => 'name'])
                        </a>
                    </th>
                    <th>
                        <a href="#" role="button" class="text-dark" wire:click.prevent="ordering('car_name')">
                            Car name
                            @include('include.ordering-icon', ['order' => 'car_name'])
                        </a>
                    </th>
                    <th>
                        <a href="#" role="button" class="text-dark" wire:click.prevent="ordering('start_date')">
                            Start date
                            @include('include.ordering-icon', ['order' => 'start_date'])
                        </a>
                    </th>
                    <th>
                        <a href="#" role="button" class="text-dark" wire:click.prevent="ordering('duration')">
                            Duration
                            @include('include.ordering-icon', ['order' => 'duration'])
                        </a>
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
                @forelse ($rents as $key => $rent)
                <tr>
                    <td>
                        {{ $key + 1 }}
                    </td>
                    <td>
                        <a href="{{ route("customer.show", $rent->customer_id) }}">
                            {{ $rent->name}}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route("car.show", $rent->car_id) }}">
                            {{ $rent->car_name}}
                        </a>
                    </td>
                    <td>{{ $rent->format_start_date }}</td>
                    <td>{{ $rent->format_duration }}</td>
                    <td>
                        @if ($rent->status == 'pending')
                         <div class="text-danger">
                            <i class="fas fa-hourglass-half"></i>
                            {{ $rent->status }}
                        </div>
                        @elseif ($rent->status == 'onloan')
                        <div class="text-primary">
                            <i class="fas fa-car    "></i>
                            {{ $rent->status }}
                        </div>
                        @else
                        <div class="text-success">
                            <i class="fas fa-check    "></i>
                            {{ $rent->status }}
                        </div>
                        @endif
                    </td>
                    <td class="text-right">
                        @if ($rent->status == 'pending')
                        <a href="{{ route('rents.show_pending', $rent->id) }}" type="button" class="btn btn-primary btn-sm"><span class="fa fa-check"></span></a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete">
                            <i class="fas fa-trash    "></i>
                        </button>

                        @elseif ($rent->status == 'onloan')
                        <a href="{{ route('rents.show_onloan', $rent->id) }}" type="button" class="btn btn-primary btn-sm">
                            <i class="fas fa-arrow-right    "></i>
                        </a>

                        @else
                        <a href="{{ route('rents.show', $rent->id) }}" type="button" class="btn btn-success btn-sm">
                            <i class="fas fa-eye    "></i>
                        </a>
                        @endif
                    </td>
                </tr>
                @include('rent.modalDelete')
                @empty
                <tr>
                    <td class="text-center" colspan="6">Data not found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between">
        <div class="align-self-center">
            Showing {{ $rents->currentPage() }} to {{ $rents->perPage() }} of {{ $rents->total() }} entries
        </div>
        {{ $rents->links() }}
    </div>
</div>