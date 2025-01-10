@extends('layouts.app')
@section('title', 'Upload Sound File ')

@section('content')
    <div class="card p-3">
        <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama File</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <input class="form-control" type="file" name="file" class="pt-2">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
