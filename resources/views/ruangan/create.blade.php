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
                        <h4 class="panel-title">Form Tambah Ruangan</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="{{ route('ruangan.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group {{ ($errors->has('nama')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="nama">
                                    nama
                                </label>
                                <div class="col-md-9">
                                    <input class="form-control" name="nama" id="nama" value="{{ old('nama') }}">
                                    @if($errors->has('nama'))
                                        <span class="help-block">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('kapasitas')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="kapasitas">
                                    kapasitas
                                </label>
                                <div class="col-md-9">
                                    <input class="form-control" name="kapasitas" id="kapasitas" value="{{ old('kapasitas') }}">
                                    @if($errors->has('kapasitas'))
                                        <span class="help-block">{{ $errors->first('kapasitas') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('jenis')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="jenis">
                                    jenis
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="jenis" id="jenis">
                                        <option value="TEORI">TEORI</option>
                                        <option value="LABORATORIUM">LABORATORIUM</option>
                                    </select>
                                    @if($errors->has('jenis'))
                                        <span class="help-block">{{ $errors->first('jenis') }}</span>
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