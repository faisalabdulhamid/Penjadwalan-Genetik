@extends('layouts.template')
@section('content')
    <div class="col-sm-9">
        {{--<h2>Penjadwalan</h2>--}}
        {{--<hr>--}}
        <br>
        <br>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Penjadwalan</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('penjadwalan.post') }}">
                            {{ csrf_field() }}
                            <div class="form-group {{ ($errors->has('semester')) ? 'has-error' : '' }}">
                                <label class="control-label col-md-3">Semester</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="semester">
                                        <option value="1">GANJIL</option>
                                        <option value="0">GENAP</option>
                                    </select>
                                    @if($errors->has('semester'))
                                        <span class="help-block">{{ $errors->first('semester') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('tahun_akademik')) ? 'has-error' : '' }}">
                                <label class="control-label col-md-3">Tahun Akademik</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="tahun_akademik">
                                        @foreach(App\TahunAjaran::all() as $th)
                                            <option value="{{ $th->id }}">{{ $th->tahun_ajaran }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('tahun_akademik'))
                                        <span class="help-block">{{ $errors->first('tahun_akademik') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('populasi')) ? 'has-error' : '' }}">
                                <label class="control-label col-md-3">Jumlah Populasi</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="populasi" value="{{ old('populasi', 10) }}">
                                    @if($errors->has('populasi'))
                                        <span class="help-block">{{ $errors->first('populasi') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('crossover')) ? 'has-error' : '' }}">
                                <label class="control-label col-md-3">Probabilitas CrossOver</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="crossover" value="{{ old('crossover', 0.80) }}">
                                    @if($errors->has('crossover'))
                                        <span class="help-block">{{ $errors->first('crossover') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('mutasi')) ? 'has-error' : '' }}">
                                <label class="control-label col-md-3">Probabilitas Mutasi</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="mutasi" value="{{ old('mutasi', 0.40) }}">
                                    @if($errors->has('mutasi'))
                                        <span class="help-block">{{ $errors->first('mutasi') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('generasi')) ? 'has-error' : '' }}">
                                <label class="control-label col-md-3">Jumlah Generasi</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="generasi" value="{{ old('generasi', 100) }}">
                                    @if($errors->has('generasi'))
                                        <span class="help-block">{{ $errors->first('generasi') }}</span>
                                    @endif
                                </div>
                            </div>

                            <button class="btn btn-default pull-right">Proses</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th width="30%">NIDN</th>
                <th>Nama</th>
                <th width="150px">Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection