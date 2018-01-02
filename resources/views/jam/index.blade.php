@extends('layouts.template')
@section('content')
    <div class="col-sm-9">
        <h2>Jam</h2>
        <hr>
        <a href="{{ route('jam.create') }}" class="btn btn-default btn-sm pull-right">Tambah</a>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th width="40px">No</th>
                <th>Range Jam</th>
                <th width="150px">Action</th>
            </tr>
            </thead>
            <tbody>
            @php($i=1)
            @foreach($jam->all() as $d)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $d->range_jam }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-default" href="{{ route('jam.edit', $d->id) }}">Edit</a>
                            <a class="btn btn-default" href="{{ route('jam.destroy', $d->id) }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('form-destroy').submit();">
                                Delete
                            </a>
                            <form id="form-destroy" action="{{ route('jam.destroy', $d->id) }}" method="POST" style="display: none;">
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