@extends('layouts.app')

@section('title', 'plan list')

@section('content')
    <h2>Plan List</h2>
    <a class="btn btn-primary" href="{{ route('plans.create') }}">Add plans</a>

    <x-response-component/>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
    <tbody>
        @forelse ($plans as $plan)
        <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$plan->name}}</td>
        <td>{{$plan->price}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('plans.edit', $plan->id)}}">Edit</a>
            <form action="{{ route('plans.destroy', $plan->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
        </tr>
        
        @empty
        <tr rowspan="3">No data found</tr>
        @endforelse
    </tbody>
    </table>
@endsection