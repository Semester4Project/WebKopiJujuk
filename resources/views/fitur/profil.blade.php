@extends('layout.admin')

@section('title', 'Profil')

@section('content')
<h1>Profil Admin</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" class="form-control" value="{{ $user->email }}" disabled>
    </div>

    <div class="form-group">
        <label for="profile_picture">Foto Profil:</label>
        @if ($user->profile_picture)
            <div class="mt-2">
                <img src="{{ asset('images/profil/' . $user->profile_picture) }}" alt="Foto Profil" style="max-width: 100px; margin-right: 10px;">
            </div>
        @endif
        <input type="file" name="profile_picture" id="profile_picture" class="form-control">
    </div>    

    <button type="submit" class="btn btn-primary">Update Profil</button>
</form>
@endsection