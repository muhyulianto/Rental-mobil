@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Rental list</div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Mobil</th>
                                    <th>Start date</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rents as $rent)
                                <tr>
                                    <td>{{ $rent->users->name}}</td>
                                    <td>{{ $rent->nama_lengkap_mobil}}</td>
                                    <td>{{ $rent->format_start_date }}</td>
                                    <td>{{ $rent->duration.' Hari' }}</td>
                                    <td> {{ $rent->status }} </td>
                                    <td>
                                        <a href="{{ route('rent.show', $rent->id) }}" type="button" class="btn btn-success btn-sm">View</a>
                                        <a href="#" class="btn btn-primary btn-sm">Checkout</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $rents->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection