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
        <form method="post" action="{{ route('companies.store') }}">
            <div class="form-group">
                @csrf
                <label for="name">name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ request()->old('name')}}" />
            </div>
            <div class="form-group">
                <label for="address">address :</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ request()->old('address')}}" />
            </div>
            <div class="form-group">
                <label for="city">city :</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ request()->old('city')}}"/>
            </div>
            <button type="submit" class="btn btn-primary">Create company</button>
        </form>
    </div>
@endsection
