<div>
    <div class="d-flex justify-content-between">
        <div class="form-group">
            <select class="form-control form-control-sm" wire:model="perPage">
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
                <input type="text" class="form-control form-control-sm" placeholder="search here" wire:model="search">
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-vertical-center">
            <thead>
                <tr>
                    <th>
                        NO
                    </th>
                    <th>
                        Invoice Number
                    </th>
                    <th>
                        <a href="#" role="button" class="text-dark" wire:click.prevent="ordering('name')">
                            Customer Name
                        </a>
                    </th>
                    <th>
                        <a href="#" role="button" class="text-dark" wire:click.prevent="ordering('total_price')">
                            Total
                        </a>
                    </th>
                    <th>
                        Status
                    </th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $key => $invoice)
                <tr>
                    <td>
                        {{ $invoices->firstItem() + $key }}
                    </td>
                    <td>
                        {{ $invoice->invoice_number }}
                    </td>
                    <td>
                        <a href="{{ route("customer.show", $invoice->customers->id) }}">
                            {{ $invoice->customers->name }}
                        </a>
                    </td>
                    <td>
                        {{ $invoice->format_total_price }}
                    <td>
                    @if ($invoice->status == 'pending')
                    <div class="text-danger">
                        <i class="fa fa-hourglass-half" aria-hidden="true"></i> {{ $invoice->status }}
                    </div>
                    @else
                    <div class="text-success">
                        <i class="fas fa-check    "></i> {{ $invoice->status}}
                    </div>
                    @endif
                    </td>
                    <td class="text-right">
                        <a href="{{ route("invoice.show", $invoice->id) }}" class="btn btn-success btn-sm" >
                            <i class="fas fa-eye    "></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between">
        <div class="align-self-center">
            Showing {{ $invoices->currentPage() }} to {{ $invoices->perPage() }} of {{ $invoices->total() }} entries
        </div>
        {{ $invoices->links() }}
    </div>
</div>
