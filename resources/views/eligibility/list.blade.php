@extends('layouts.app')

@section('title', 'Eligibility list')

@section('content')
    <h2>Eligibility List</h2>
    <a class="btn btn-primary" href="{{ route('eligibility.create') }}">Add Eligibility</a>

    <x-response-component/>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Eligibility Name</th>
            <th scope="col">Age</th>
            <th scope="col">Salary</th>
            <th scope="col">Last Login</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
    <tbody>
        @forelse ($criteria as $criteria)
        <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{ $criteria->name}}</td>
        <th>{{ $criteria->age_less_than}} - {{ $criteria->age_greater_than}}</th>
        <th>{{ $criteria->income_less_than}} - {{ $criteria->income_greater_than}}</th>
        <td>{{ $criteria->last_login_days_ago}} days ago</td>
        <td>
            <a href="{{ route('eligibility.edit', $criteria->id)}}">Edit</a>
            <form action="{{ route('eligibility.destroy', $criteria->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
        </tr>
        
        @empty
        <tr rowspan="3">No data found</tr>
        @endforelse
    </tbody>
    </table>
@endsection