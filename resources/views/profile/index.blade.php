@extends('layouts.app')

@section('content')

    @push('style')
        <style>
            .profile-edit-card {
                background-color: #f8f9fa;
                border-radius: 10px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            }

            .profile-edit-title {
                font-size: 24px;
                color: #007bff;
                margin-bottom: 0;
                font-weight: 600;
            }

            .profile-input {
                background-color: #ffffff;
                border: 1px solid #ced4da;
                border-radius: 8px;
                padding: 10px 15px;
                transition: border-color 0.3s;
            }

            .profile-input:focus {
                border-color: #007bff;
                box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
            }

            .profile-btn {
                padding: 10px 25px;
                border-radius: 8px;
                font-size: 16px;
                background-color: #007bff;
                border: none;
                transition: background-color 0.3s;
            }

            .profile-btn:hover {
                background-color: #0056b3;
            }

            .invalid-feedback {
                color: red;
                font-size: 0.875rem;
                margin-top: 0.25rem;
            }

            .alert-success {
                background-color: #d4edda;
                border-color: #c3e6cb;
                color: #155724;
                border-radius: 8px;
                padding: 10px;
            }

        </style>
    @endpush
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card profile-edit-card">
                    <div class="card-header text-center">
                        <h2 class="profile-edit-title">Edit Your Profile</h2>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control profile-input @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control profile-input @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password" class="form-label">New Password (optional)</label>
                                <input type="password" class="form-control profile-input @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control profile-input" id="password_confirmation" name="password_confirmation">
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary profile-btn">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success text-center mt-3">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
