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
                        <h4 class="panel-title">Form Tambah Kelas</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="{{ route('kelas.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group {{ ($errors->has('kelas')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="kelas">
                                    kelas
                                </label>
                                <div class="col-md-9">
                                    <input class="form-control" name="kelas" id="kelas" value="{{ old('kelas') }}">
                                    @if($errors->has('kelas'))
                                        <span class="help-block">{{ $errors->first('kelas') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('tahun_ajaran')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="tahun_ajaran">
                                    Tahun Ajaran
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="tahun_ajaran" id="tahun_ajaran" value="{{ old('tahun_ajaran') }}">
                                        @foreach(App\TahunAjaran::all() as $tahun)
                                            <option value="{{ $tahun->id }}">{{ $tahun->tahun_ajaran }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('tahun_ajaran'))
                                        <span class="help-block">{{ $errors->first('tahun_ajaran') }}</span>
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