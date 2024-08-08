@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="gender"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                                <div class="col-md-6">
                                    <select id="gender" name="gender"
                                        class="form-control @error('gender') is-invalid @enderror" required>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female
                                        </option>
                                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other
                                        </option>
                                    </select>

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="birth_date"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Birth Date') }}</label>

                                <div class="col-md-6">
                                    <input id="birth_date" type="date"
                                        class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                                        value="{{ old('birth_date') }}" required>

                                    @error('birth_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="mobileNumber"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Mobile Number') }}</label>

                                <div class="col-md-6">
                                    <input id="mobileNumber" type="text"
                                        class="form-control @error('mobileNumber') is-invalid @enderror" name="mobileNumber"
                                        value="{{ old('mobileNumber') }}" required>

                                    @error('mobileNumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Role Selection -->
                            <div class="row mb-3">
                                <label for="role"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                                <div class="col-md-6">
                                    <select id="role" name="role"
                                        class="form-control @error('role') is-invalid @enderror" required
                                        onchange="toggleAdditionalFields(this.value)">
                                        <option value="tutee" {{ old('role') == 'tutee' ? 'selected' : '' }}>Tutee
                                        </option>
                                        <option value="tutor" {{ old('role') == 'tutor' ? 'selected' : '' }}>Tutor
                                        </option>
                                    </select>

                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Additional Fields for Tutor -->
                            <div id="tutor-fields" style="display: none;">
                                <div class="row mb-3">
                                    <label for="qualification"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Qualification') }}</label>

                                    <div class="col-md-6">
                                        <input id="qualification" type="text"
                                            class="form-control @error('qualification') is-invalid @enderror"
                                            name="qualification" value="{{ old('qualification') }}">

                                        @error('qualification')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="experience"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Experience') }}</label>

                                    <div class="col-md-6">
                                        <input id="experience" type="text"
                                            class="form-control @error('experience') is-invalid @enderror" name="experience"
                                            value="{{ old('experience') }}">

                                        @error('experience')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="expertise"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Expertise') }}</label>

                                    <div class="col-md-6">
                                        <input id="expertise" type="text"
                                            class="form-control @error('expertise') is-invalid @enderror" name="expertise"
                                            value="{{ old('expertise') }}">

                                        @error('expertise')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="price"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>

                                    <div class="col-md-6">
                                        <input id="price" type="number" step="0.01"
                                            class="form-control @error('price') is-invalid @enderror" name="price"
                                            value="{{ old('price') }}">

                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="bankaccountNumber"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Bank Account Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="bankaccountNumber" type="text"
                                            class="form-control @error('bankaccountNumber') is-invalid @enderror"
                                            name="bankaccountNumber" value="{{ old('bankaccountNumber') }}">

                                        @error('bankaccountNumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleAdditionalFields(role) {
            const tutorFields = document.getElementById('tutor-fields');
            if (role === 'tutor') {
                tutorFields.style.display = 'block';
            } else {
                tutorFields.style.display = 'none';
            }
        }

        // Set the initial state of additional fields based on the selected role
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.getElementById('role');
            toggleAdditionalFields(roleSelect.value);
        });
    </script>
@endsection
