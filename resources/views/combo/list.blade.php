@extends('layouts.app')

@section('title', 'plan list')

@section('content')
    <h2>Plan List</h2>
    <a class="btn btn-primary" href="{{ route('combo.create') }}">Add plans</a>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible ">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible ">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">main plan</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
    <tbody>
        @forelse ($plans as $plan)
        <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{ $plan->name}}</td>
        <th>{{ $plan->plan->name}}</th>
        <td>{{ $plan->price}}</td>
        <td>
            <a href="{{ route('combo.edit', $plan->id)}}">Edit</a>
            <form action="{{ route('combo.destroy', $plan->id) }}" method="POST" style="display:inline;">
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