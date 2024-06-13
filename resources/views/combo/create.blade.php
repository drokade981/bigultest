@extends('layouts.app')

@section('title', 'create combo plan')

@section('content')
    <h1>{{ isset($combo) ? 'Edit Plan' : 'Create New Plan' }}</h1>
    <form method="post" action="{{ isset($combo) ? route('combo.update', $combo->id) : route('combo.store') }}" >
    @if(isset($combo))
        @method('PUT')
    @endif
    <div class="row g-3">
        @csrf
        <div class="col">
                <label for="plan_id" class="form-label">plan</label>
                <select id="plan_id" name="plan_id" class="form-select">

                <option selected value="">Choose plan</option>
                @forelse($plans as $plan)
                <option value="{{$plan->id}}" @if(isset($combo) && $plan->id == $combo->plan_id) selected @endif>{{$plan->name}}</option>
                @empty
                @endforelse
                </select>
            
            @error('plan_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <input type="text" class="form-control" name="name" placeholder="Plan name" aria-label="Plan name" value="{{ old('name', $combo->name ?? '') }}">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <input type="text" class="form-control" name="price" placeholder="Price" aria-label="Price" value="{{ old('price', $combo->price ?? '') }}">
            @error('price')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary" > {{ isset($combo) ? 'Update' : 'Create' }}</button>
        </div>
    </div>
    </form>
@endsection