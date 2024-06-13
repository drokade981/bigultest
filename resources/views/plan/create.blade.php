@extends('layouts.app')

@section('title', 'create plan')

@section('content')
    <h1>{{ isset($plan) ? 'Edit Plan' : 'Create New Plan' }}</h1>
    <form method="post" action="{{ isset($plan) ? route('plans.update', $plan->id) : route('plans.store') }}" >
    @if(isset($plan))
        @method('PUT')
    @endif
    <div class="row g-3">
        @csrf
        <div class="col">
            <input type="text" class="form-control" name="name" placeholder="Plan name" aria-label="Plan name" value="{{ old('name', $plan->name ?? '') }}">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <input type="text" class="form-control" name="price" placeholder="Price" aria-label="Price" value="{{ old('price', $plan->price ?? '') }}">
            @error('price')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary" > {{ isset($plan) ? 'Update' : 'Create' }}</button>
        </div>
    </div>
    </form>
@endsection