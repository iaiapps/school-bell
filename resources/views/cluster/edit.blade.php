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
                <label for="active" class="form-label">Aktif atau Tidak Aktif </label>
                <select name="active" id="active" class="form-select">
                    @if ($cluster->active == 1)
                        <option value="{{ $cluster->active }}">Aktif</option>
                    @elseif ($cluster->active == 0)
                        <option value="{{ $cluster->active }}">Tidak Aktif</option>
                    @endif
                    <option disabled>--- --- --- ---</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
    </div>
@endsection
