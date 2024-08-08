@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Tutors List') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Qualification') }}</th>
                                    <th>{{ __('Experience') }}</th>
                                    <th>{{ __('Expertise') }}</th>
                                    <th>{{ __('Price') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tutors as $tutor)
                                    <tr>
                                        <td>{{ $tutor->user->name }}</td>
                                        <td>{{ $tutor->qualification }}</td>
                                        <td>{{ $tutor->experience }}</td>
                                        <td>{{ $tutor->expertise }}</td>
                                        <td>{{ $tutor->price }}</td>
                                        <td>
                                            <a href="{{ route('tutor.show', $tutor->id) }}"
                                                class="btn btn-info">{{ __('View') }}</a>
                                            <a href="{{ route('tutor.edit', $tutor->id) }}"
                                                class="btn btn-primary">{{ __('Edit') }}</a>
                                            <form action="{{ route('tutor.destroy', $tutor->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
