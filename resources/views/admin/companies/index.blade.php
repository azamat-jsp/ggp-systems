@extends('layouts.admin')
@section('title')
    Clients
@endsection

@section('content')
    <div>
        <div style="float: right; margin: 27px">
            <a href="{{ route('companies.create') }}" class="btn btn-success">Add company</a>
        </div>
    </div>
    <div class="card-body">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">address</th>
                <th scope="col">city</th>
                <th scope="col">created_at</th>
                <th scope="col">actions</th>
            </tr>
            </thead>
            <tbody>
            @isset($companies)
                @foreach($companies as $company)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->address }}</td>
                        <td>{{ $company->city }}</td>
                        <td>{{ $company->created_at }}</td>
                        <td>
                            <div style="display: flex">
                                <a href="{{ route('companies.edit', $company) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('companies.destroy', $company)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endisset
            </tbody>
        </table>
        @if ($companies->links()->paginator->hasPages())
            <div class="mt-4 p-4 box has-text-centered">
                {{ $companies->links() }}
            </div>
        @endif
    </div>

@endsection
@push('js')
    <script>

    </script>
@endpush
