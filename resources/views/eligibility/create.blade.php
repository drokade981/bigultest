@extends('layouts.app')

@section('title', 'create combo plan')

@section('content')
    <h1>{{ isset($eligibility) ? 'Edit Plan' : 'Create New Plan' }}</h1>
    <form method="post" action="{{ isset($eligibility) ? route('eligibility.update', $eligibility->id) : route('eligibility.store') }}" >
    @if(isset($eligibility))
        @method('PUT')
    @endif
    <div class="row g-3">
        @csrf       
        <div class="col-5">
            <input type="text" class="form-control" name="name" placeholder="Name" aria-label="Plan name" value="{{ old('name', $eligibility->name ?? '') }}">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-5">
            <input type="text" class="form-control" name="last_login_days_ago" placeholder="Last Login Days Ago" aria-label="last_login_days_ago" value="{{ old('last_login_days_ago', $eligibility->last_login_days_ago ?? '') }}">
            @error('last_login_days_ago')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mt-2 g-3">        
        <div class="col-5">
            <input type="text" class="form-control" name="age_less_than" placeholder="Age Less Than" aria-label="age_less_than" value="{{ old('age_less_than', $eligibility->age_less_than ?? '') }}">
            @error('age_less_than')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-5">
            <input type="text" class="form-control" name="age_greater_than" placeholder="Age Greater Than" aria-label="age_greater_than" value="{{ old('age_greater_than', $eligibility->age_greater_than ?? '') }}">
            @error('age_greater_than')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mt-2 g-3">        
        <div class="col-5">
            <input type="text" class="form-control" name="income_less_than" placeholder="Income Less Than" aria-label="income_less_than" value="{{ old('income_less_than', $eligibility->income_less_than ?? '') }}">
            @error('income_less_than')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-5">
            <input type="text" class="form-control" name="income_greater_than" placeholder="Income Greater Than" aria-label="income_greater_than" value="{{ old('income_greater_than', $eligibility->income_greater_than ?? '') }}">
            @error('income_greater_than')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        
    </div>
    <div class="row mt-2 g-3">
        <div class="col">
            <button type="submit" class="btn btn-primary" > {{ isset($eligibility) ? 'Update' : 'Create' }}</button>
        </div>
    </div>
    </form>
@endsection