@extends('layouts.app')
@section('title', 'Kategori Jadwal')

@section('content')
    <div class="card p-3">
        <div class="align-middle">
            <p class="float-start fs-5 m-0">Kategori jadwal bel yang aktif </p>
            <p class="float-end"><a href="{{ route('cluster.create') }}" class="btn btn-primary">tambah kategori</a></p>
        </div>
        <hr>
        <table class="table align-middle table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Aktif</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clusters as $cluster)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cluster->name }}</td>
                        <td>{{ $cluster->active == 1 ? 'Aktif' : 'Non Aktif' }}</td>
                        <td>
                            <a href="{{ route('cluster.edit', $cluster->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form method="POST" action="{{ route('cluster.destroy', $cluster->id) }}" class="d-inline"
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
