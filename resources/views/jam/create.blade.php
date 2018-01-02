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
                        <h4 class="panel-title">Form Tambah Jam</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="{{ route('jam.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group {{ ($errors->has('range_jam')) ? 'has-error' : '' }}">
                                <label class="col-md-3 control-label" for="range_jam">
                                    Range Jam
                                </label>
                                <div class="col-md-9">
                                    <input class="form-control" name="range_jam" id="range_jam" value="{{ old('range_jam') }}">
                                    @if($errors->has('range_jam'))
                                        <span class="help-block">{{ $errors->first('range_jam') }}</span>
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