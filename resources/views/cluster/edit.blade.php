@extends('layouts.app')
@section('title', 'Buat Kategori')

@section('content')
    <div class="card p-3">
        <form action="{{ route('cluster.update', $cluster->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $cluster->name }}">
            </div>
            <div class="mb-3">
                <label for="active" class="form-label">Aktif atau Non Aktif [1/0]</label>
                <input type="text" class="form-control" id="active" name="active" value="{{ $cluster->active }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
