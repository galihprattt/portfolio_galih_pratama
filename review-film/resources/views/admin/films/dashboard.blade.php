@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Dashboard Admin</h1>

    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('admin.films.index') }}" class="btn btn-primary w-100 mb-3">Kelola Film</a>
        </div>
    </div>
</div>
@endsection
