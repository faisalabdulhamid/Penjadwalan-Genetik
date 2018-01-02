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
                        <h4 class="panel-title">Form Tambah Matakuliah</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="{{ route('matkul.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group {{ ($errors->has('kode_mk')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="kode_mk">
                                    Kode Matakuliah
                                </label>
                                <div class="col-md-9">
                                    <input class="form-control" name="kode_mk" id="nidn" value="{{ old('kode_mk') }}">
                                    @if($errors->has('kode_mk'))
                                        <span class="help-block">{{ $errors->first('kode_mk') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('nama')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="nama">
                                    Nama
                                </label>
                                <div class="col-md-9">
                                    <input class="form-control" name="nama" id="nama" value="{{ old('nama') }}">
                                    @if($errors->has('nama'))
                                        <span class="help-block">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('sks')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="sks">
                                    sks
                                </label>
                                <div class="col-md-9">
                                    <input class="form-control" name="sks" id="sks" value="{{ old('sks') }}">
                                    @if($errors->has('sks'))
                                        <span class="help-block">{{ $errors->first('sks') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('semester')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="semester">
                                    semester
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="semester" id="semester">
                                        <option value="">Pilih</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                    </select>
                                    @if($errors->has('semester'))
                                        <span class="help-block">{{ $errors->first('semester') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('jenis')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="jenis">
                                    jenis
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="jenis" id="jenis">
                                        <option>TEORI</option>
                                        <option>PRAKTIKUM</option>
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