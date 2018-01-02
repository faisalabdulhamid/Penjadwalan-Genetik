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
                        <h4 class="panel-title">Form Tambah Pengampu</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="{{ route('pengampu.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group {{ ($errors->has('matakuliah')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="matakuliah">
                                    Matakuliah
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="matakuliah" id="matakuliah">
                                        <option value="">Pilih</option>
                                        @foreach(App\Matakuliah::where('semester', '1')->get() as $matkul)
                                            <option value="{{ $matkul->id }}">{{ $matkul->nama }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('matakuliah'))
                                        <span class="help-block">{{ $errors->first('matakuliah') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('dosen')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="dosen">
                                    dosen
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="dosen" id="dosen" value="{{ old('dosen') }}">
                                        <option value="">Pilih</option>
                                        @foreach(App\Dosen::all() as $dosen)
                                            <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('dosen'))
                                        <span class="help-block">{{ $errors->first('dosen') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('kelas')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="kelas">
                                    kelas
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="kelas" id="kelas">
                                        <option value="">Pilih</option>
                                        @foreach(App\Kelas::all() as $kelas)
                                            <option value="{{ $kelas->id }}" {{ ($kelas->id == 1)?'selected':'' }}>{{ $kelas->kelas }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('kelas'))
                                        <span class="help-block">{{ $errors->first('kelas') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('tahun_akademik')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="tahun_akademik">
                                    Tahun Akademik
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="tahun_akademik" id="tahun_akademik" value="{{ old('tahun_akademik') }}">
                                        <option value="">Pilih</option>
                                        @foreach(App\TahunAjaran::all() as $th)
                                            <option value="{{ $th->id }}" {{ ($th->id == 1)?'selected':'' }}>{{ $th->tahun_ajaran }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('tahun_akademik'))
                                        <span class="help-block">{{ $errors->first('tahun_akademik') }}</span>
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