@extends('layouts.template')

@section('content')
    <div class="col-sm-9">
        <br>
        <br>
        <br>
        <div class="row">
            <div class=" col-md-offset-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Form Tambah Ketentuan Ruangan</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="{{ route('ketentuan-ruangan.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group {{ ($errors->has('ruangan')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="ruangan">
                                    Ruangan
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="ruangan" id="ruangan">
                                        <option value="">Pilih</option>
                                        @foreach(App\Ruangan::all() as $ruangan)
                                            <option value="{{ $ruangan->id }}">{{ $ruangan->nama }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('ruangan'))
                                        <span class="help-block">{{ $errors->first('ruangan') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('hari')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="hari">
                                    Hari
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="hari" id="hari">
                                        {{-- where('jenis', $jenis)->get() --}}
                                        <option value="">Pilih</option>
                                        @foreach(App\Hari::all() as $hari)
                                            <option value="{{ $hari->id }}">{{ $hari->nama }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('hari'))
                                        <span class="help-block">{{ $errors->first('hari') }}</span>
                                    @endif
                                </div>
                            </div>
                            <button class="btn btn-default pull-right">Simpan</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection