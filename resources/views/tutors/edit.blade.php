@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tutor Details') }}</div>

                    <div class="card-body">
                        <p><strong>{{ __('Name') }}:</strong> {{ $tutor->user->name }}</p>
                        <p><strong>{{ __('Qualification') }}:</strong> {{ $tutor->qualification }}</p>
                        <p><strong>{{ __('Experience') }}:</strong> {{ $tutor->experience }}</p>
                        <p><strong>{{ __('Expertise') }}:</strong> {{ $tutor->expertise }}</p>
                        <p><strong>{{ __('Price') }}:</strong> {{ $tutor->price }}</p>
                        <p><strong>{{ __('Bank Account Number') }}:</strong> {{ $tutor->bankaccountNumber }}</p>

                        <a href="{{ route('tutor.index') }}" class="btn btn-secondary">{{ __('Back to List') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
