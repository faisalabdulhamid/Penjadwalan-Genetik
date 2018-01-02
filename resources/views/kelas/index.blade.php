@extends('layouts.template')
@section('content')
    <div class="col-sm-9">
        <h2>kelas</h2>
        <hr>
        <a href="{{ route('kelas.create') }}" class="btn btn-default btn-sm pull-right">Tambah</a>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th width="40px">No</th>
                <th>Kelas</th>
                <th>Tahun Ajaran</th>
                <th width="150px">Action</th>
            </tr>
            </thead>
            <tbody>
            @php($i=1)
            @foreach($kelas->all() as $d)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $d->kelas }}</td>
                    <td>{{ $d->tahunAjaran->tahun_ajaran }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-default" href="{{ route('kelas.edit', $d->id) }}">Edit</a>
                            <a class="btn btn-default" href="{{ route('kelas.destroy', $d->id) }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('form-destroy').submit();">
                                Delete
                            </a>
                            <form id="form-destroy" action="{{ route('kelas.destroy', $d->id) }}" method="POST" style="display: none;">
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