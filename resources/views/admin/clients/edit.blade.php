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
        <form method="post" action="{{ route('clients.update', $client) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="firstName">first_name:</label>
                <input type="text" class="form-control" id="firstName" name="first_name" value="{{ $client->first_name }}"/>
            </div>
            <div class="form-group">
                <label for="lastName">last_name :</label>
                <input type="text" class="form-control" id="lastName" name="last_name" value="{{ $client->last_name }}"/>
            </div>
            <div class="form-group">
                <label for="address">address :</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $client->address }}"/>
            </div>
            <div class="form-group">
                <label for="age">age :</label>
                <input type="text" class="form-control" id="age" name="age" value="{{ $client->age }}"/>
            </div>
            <div class="form-group">
                <label for="company_id">company_id :</label>
                <select class="form-select" aria-label="company list" id="company_id" name="companies[]" multiple>
                    @isset($companies)
                        @foreach($companies as $id => $item)
                            <option @if(in_array($id, $client->companies->pluck('id')->toArray())) selected @endif value="{{ $id }}">{{ $item }}</option>
                        @endforeach
                    @endisset
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update client</button>
        </form>
    </div>
@endsection
