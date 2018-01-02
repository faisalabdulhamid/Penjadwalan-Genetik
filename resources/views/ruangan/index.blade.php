@extends('layouts.template')
@section('content')
    <div class="col-sm-9">
        <h2>ruangan</h2>
        <hr>
        <a href="{{ route('ruangan.create') }}" class="btn btn-default btn-sm pull-right">Tambah</a>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th width="40px">No</th>
                <th>Nama</th>
                <th>Kapasitas</th>
                <th>Jenis</th>
                <th width="150px">Action</th>
            </tr>
            </thead>
            <tbody>
            @php($i=1)
            @foreach($ruangan->all() as $d)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->kapasitas }}</td>
                    <td>{{ $d->jenis }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-default" href="{{ route('ruangan.edit', $d->id) }}">Edit</a>
                            <a class="btn btn-default" href="{{ route('ruangan.destroy', $d->id) }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('form-destroy').submit();">
                                Delete
                            </a>
                            <form id="form-destroy" action="{{ route('ruangan.destroy', $d->id) }}" method="POST" style="display: none;">
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