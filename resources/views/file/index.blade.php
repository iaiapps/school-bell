@extends('layouts.app')
@section('title', 'File Bel')

@section('content')
    <div class="card p-3">
        <div class="align-middle">
            <p class="float-start fs-5 m-0">File Bel yang terupload </p>
            <p class="float-end"><a href="{{ route('file.create') }}" class="btn btn-primary">Upload File</a></p>
        </div>
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Bel</th>
                    <th scope="col">Palyer</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $file)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $file->name }}</td>
                        <td><audio controls>
                                <source src="{{ asset('sound-file/' . $file->file) }}" type="audio/mpeg">
                            </audio>
                        </td>
                        <td>{{ $file->file }}</td>
                        <td>
                            <a href="{{ route('file.edit', $file->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form method="POST" action="{{ route('file.destroy', $file->id) }}" class="d-inline"
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
