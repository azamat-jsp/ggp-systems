@extends('layouts.admin')

@section('content')
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br />
        @endif
        <form method="post" action="{{ route('clients.store') }}">
            <div class="form-group">
                @csrf
                <label for="firstName">first_name:</label>
                <input type="text" class="form-control" id="firstName" name="first_name" value="{{ request()->old('first_name') }} "/>
            </div>
            <div class="form-group">
                <label for="lastName">last_name :</label>
                <input type="text" class="form-control" id="lastName" name="last_name" value="{{ request()->old('last_name')}}" />
            </div>
            <div class="form-group">
                <label for="address">address :</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ request()->old('address')}}" />
            </div>
            <div class="form-group">
                <label for="age">age :</label>
                <input type="text" class="form-control" id="age" name="age" value="{{ request()->old('age')}}" />
            </div>
            <div class="form-group">
                <label for="company_id">company :</label>
                <select class="form-select" aria-label="company list" id="company_id" name="companies[]" multiple>
                    @isset($companies)
                        @foreach($companies as $id => $item)
                            <option value="{{ $id }}">{{ $item }}</option>
                        @endforeach
                    @endisset
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create client</button>
        </form>
    </div>
@endsection
