@extends('layouts.template')
@section('content')
    <div class="col-sm-9">
        <h2>Ketentuan Dosen</h2>
        <hr>
        <form role="form" action="{{ route('ketentuan-dosen.store') }}" method="POST">
            {{ csrf_field() }}
        <div class="form-inline">
            <div class="form-group">
                <label for="dosen" class="control-label">
                    Dosen
                </label>
                <select name="dosen" id="dosen" class="form-control" name="dosen" onchange="change_dosen()">
                    @foreach(App\Dosen::all() as $dt)
                        <option value="{{ $dt->id }}" {{ ($dosen->id == $dt->id)? 'selected': '' }}>{{ $dt->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-default">Simpan</button>
        </div>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Hari</th>
                <th>Jam</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @php($i=1)
            @foreach(App\Hari::all() as $hari)
                @foreach(App\Jam::all() as $jam)
                    <tr>
                        @php($ket = App\KetentuanDosen::where('dosen_id', $dosen->id)
                            ->where('hari_id', $hari->id)
                            ->where('jam_id', $jam->id)
                            ->first())
                        <td>{{ $hari->nama }}</td>
                        <td>{{ $jam->range_jam }}</td>
                        <td>
                            <select class="form-control" name="ketentuan[{{ $hari->id }}][{{ $jam->id }}]">
                                <option value="1">Pasti Bisa Hadir</option>
                                <option value="2" {{ ($ket['bobot_fitness'] == 2)?'selected':'' }}>Bisa Hadir</option>
                                <option value="3" {{ ($ket['bobot_fitness'] == 3)?'selected':'' }}>Diusahakan Untuk Bisa Hadir</option>
                                <option value="4" {{ ($ket['bobot_fitness'] == 4)?'selected':'' }}>Lebih Banyak Tidak Bisanya</option>
                                <option value="5" {{ ($ket['bobot_fitness'] == 5)?'selected':'' }}>Tidak Bisa Hadir</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
        </form>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        function change_dosen(){
            var dosen = document.getElementById('dosen');
            window.location.href = "{{ route('ketentuan-dosen.show', '') }}/"+dosen.options[dosen.selectedIndex].value;
        }
    </script>
@endpush