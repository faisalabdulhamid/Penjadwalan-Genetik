@extends('layouts.template')

@section('content')
    <div class="col-sm-9">
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Form Tambah Dosen</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="{{ route('dosen.update', $dosen->id) }}" method="POST">
                            <div class="form-group {{ ($errors->has('nidn')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="nidn">
                                    NIDN
                                </label>
                                <div class="col-md-9">
                                    <input class="form-control" name="nidn" id="nidn" value="{{ $dosen->nidn }}">
                                    @if($errors->has('nidn'))
                                        <span class="help-block">{{ $errors->first('nidn') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('nidn')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="nama">
                                    Nama
                                </label>
                                <div class="col-md-9">
                                    <input class="form-control" name="nama" id="nama" value="{{ $dosen->nama }}">
                                    @if($errors->has('nama'))
                                        <span class="help-block">{{ $errors->first('nama') }}</span>
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