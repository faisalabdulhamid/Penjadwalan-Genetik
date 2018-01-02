@extends('layouts.template')
@section('content')
    <div class="col-sm-9">
        <h2>Matakuliah</h2>
        <hr>
        <a href="{{ route('matkul.create') }}" class="btn btn-default btn-sm pull-right">Tambah</a>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th width="30%">Kode MK</th>
                <th>Nama</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Jenis</th>
                <th width="150px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($matkul->all() as $d)
                <tr>
                    <td>{{ $d->kode_mk }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->sks }}</td>
                    <td>{{ $d->semester }}</td>
                    <td>{{ $d->jenis }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-default" href="{{ route('matkul.edit', $d->id) }}">Edit</a>
                            <a class="btn btn-default" href="{{ route('matkul.destroy', $d->id) }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('form-destroy').submit();">
                                Delete
                            </a>
                            <form id="form-destroy" action="{{ route('matkul.destroy', $d->id) }}" method="POST" style="display: none;">
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