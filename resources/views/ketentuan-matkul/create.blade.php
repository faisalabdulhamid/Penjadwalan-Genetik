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
                        <h4 class="panel-title">Form Tambah Ketentuan Matakuliah</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="{{ route('ketentuan-matkul.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group {{ ($errors->has('matkul')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="matkul">
                                    Matakuliah
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="matkul" id="matkul">
                                        <option value="">Pilih</option>
                                        @php($jenis = '')
                                        @foreach(App\Matakuliah::has('ketentuan', 0)->get() as $ketentuan)
                                            <option value="{{ $ketentuan->id }}">{{ $ketentuan->nama }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('matkul'))
                                        <span class="help-block">{{ $errors->first('matkul') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('ruangan')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="ruangan">
                                    Ruangan
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="ruangan" id="ruangan">
                                        {{-- where('jenis', $jenis)->get() --}}
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
                            <button class="btn btn-default pull-right">Simpan</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection