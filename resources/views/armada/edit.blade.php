@extends('adminlte::page')

@section('content')
   <div class="row">
       <div class="col-lg-6">
           <div class="card">
               <div class="card-header border-0">
                   <div class="card-title">
                       Edit data armada mobil
                   </div>
               </div>
               <div class="card-body">
                    <form action="{{ route("armada.update", $armada->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <fieldset disabled="disabled">
                            <div class="form-group">
                                <label for="id_mobil">Mobil</label>
                                <input type="text" id="nomor_plat" class="form-control disabled" value="{{ $armada->cars->nama_lengkap_mobil }}" aria-describedby="nomor_plat_help">
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <label for="nomor_plat">Nomor plat</label>
                            <input type="text" name="nomor_plat" id="nomor_plat" class="form-control" value="{{ $armada->nomor_plat }}" aria-describedby="nomor_plat_help">
                            <small id="nomor_plat_help" class="text-muted"></small>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload    "></i>
                            Update
                        </button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left    "></i>
                            Batal
                        </a>
                    </form>
               </div>
           </div>
       </div>
   </div> 
@endsection