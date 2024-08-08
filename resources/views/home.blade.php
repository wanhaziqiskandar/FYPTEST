@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                        {{ Auth::user()->name }}
                        <div class="card-body" style="background-color: white">
                            <a href="{{route ('tutor.index')}}" class="d-flex justify-content-center btn btn-dark">Go to tutor page</a>
                        </div> --}}

                        <div class="card mb-3">
                            <div class="card-header" style="background-color: #E3E1D9">Tutor</div>
                            <div class="card-body" style="background-color: #F2EFE5">
                                <a href="{{ route('tutor.index') }}" class="btn btn-dark">Go to Tutor page</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
