@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New Tutor') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tutors.store') }}">
                            @csrf

                            <!-- Add form fields for creating a tutor -->

                            <div class="row mb-3">
                                <label for="user_id" class="col-md-4 col-form-label text-md-end">{{ __('User ID') }}</label>
                                <div class="col-md-6">
                                    <input id="user_id" type="text"
                                        class="form-control @error('user_id') is-invalid @enderror" name="user_id"
                                        value="{{ old('user_id') }}" required>
                                    @error('user_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Add other fields as in the index.blade.php example -->

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
