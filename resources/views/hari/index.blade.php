@extends('layouts.template')
@section('content')
    <div class="col-sm-9">
        <h2>Hari</h2>
        <hr>
        <a href="{{ route('hari.create') }}" class="btn btn-default btn-sm pull-right">Tambah</a>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th width="40px">No</th>
                <th>Nama</th>
                <th width="150px">Action</th>
            </tr>
            </thead>
            <tbody>
            @php($i=1)
            @foreach($hari->all() as $d)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-default" href="{{ route('hari.edit', $d->id) }}">Edit</a>
                            <a class="btn btn-default" href="{{ route('hari.destroy', $d->id) }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('form-destroy').submit();">
                                Delete
                            </a>
                            <form id="form-destroy" action="{{ route('hari.destroy', $d->id) }}" method="POST" style="display: none;">
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