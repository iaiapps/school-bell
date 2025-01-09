@extends('layouts.app')
@section('title', 'Buat Kategori')

@section('content')
    <div class="card p-3">
        <form action="{{ route('cluster.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="active" class="form-label">Aktif atau Non Aktif [1/0]</label>
                <input type="text" class="form-control" id="active" name="active">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
