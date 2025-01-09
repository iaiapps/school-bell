@extends('layouts.app')
@section('title', 'Buat Kategori')

@section('content')
    <div class="card p-3">
        <form action="{{ route('schedule.update', $schedule->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <select name="clsuter_id" id="cluster" class="form-select">
                    @foreach ($clusters as $cluster)
                        <option value="">{{ $cluster->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="day" class="form-label">hari </label>
                <input type="text" class="form-control" id="day" name="day">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Jam</label>
                <input type="text" class="form-control" id="time" name="time">
            </div>
            <div class="mb-3">
                <label for="sound" class="form-label">Sound</label>
                <input type="text" class="form-control" id="sound" name="sound">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
