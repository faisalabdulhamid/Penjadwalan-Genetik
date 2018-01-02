@extends('layouts.template')
@section('content')
    <div class="col-sm-9">
        <h2>Dosen</h2>
        <hr>
        <a href="{{ route('dosen.create') }}" class="btn btn-default btn-sm pull-right">Tambah</a>
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
            @foreach($dosen->all() as $d)
            <tr>
                <td>{{ $d->nidn }}</td>
                <td>{{ $d->nama }}</td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-default" href="{{ route('dosen.edit', $d->id) }}">Edit</a>
                        <a class="btn btn-default" href="{{ route('dosen.destroy', $d->id) }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('form-destroy').submit();">
                            Delete
                        </a>
                        <form id="form-destroy" action="{{ route('dosen.destroy', $d->id) }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection