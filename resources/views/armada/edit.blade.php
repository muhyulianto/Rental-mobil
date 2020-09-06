@extends('adminlte::page')

@section('content')
   <div class="row">
       <div class="col-lg-6">
           <div class="card">
               <div class="card-header border-0">
                   <div class="card-title">
                       Edit Armada Data
                   </div>
               </div>
               <div class="card-body">
                    <form action="{{ route("armada.update", $armada->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <fieldset disabled="disabled">
                            <div class="form-group">
                                <label for="car_id">Car Name</label>
                                <input type="text" id="license_plate" class="form-control disabled" value="{{ $armada->format_name }}" >
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <label for="license_plate">License Plate</label>
                            <input type="text" name="license_plate" id="license_plate" class="form-control" value="{{ $armada->license_plate }}" autocomplete="off" required>
                            <small id="license_plate_help" class="text-muted"></small>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload    "></i>
                            Update
                        </button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left    "></i>
                            Cancel
                        </a>
                    </form>
               </div>
           </div>
       </div>
   </div> 
@endsection