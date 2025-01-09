@extends('layouts.app')
@section('title', 'Jadwal Bel')

@section('content')
    <div class="card p-3">
        <div class="align-middle">
            {{-- <p class="float-start fs-5 m-0">Kategori Bel yang aktif </p> --}}
            <p class="float-end"><a href="{{ route('schedule.create') }}" class="btn btn-primary">tambah jadwal</a></p>
        </div>
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Sound</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $schedule->cluster_id }}</td>
                        <td>{{ $schedule->day }}</td>
                        <td>{{ $schedule->name }}</td>
                        <td>{{ $schedule->time }}</td>
                        <td>{{ $schedule->sound }}</td>
                        <td>
                            <a href="{{ route('schedule.edit', $schedule->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form method="POST" action="{{ route('schedule.destroy', $schedule->id) }}" class="d-inline"
                                onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
