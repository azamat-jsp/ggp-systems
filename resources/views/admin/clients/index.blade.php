@extends('layouts.admin')
@section('title')
    Clients
@endsection

@section('content')
    <div>
        <div style="float: right; margin: 27px">
            <a href="{{ route('clients.create') }}" class="btn btn-success">Add client</a>
        </div>
    </div>
    <div class="card-body">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">first_name</th>
                <th scope="col">last_name</th>
                <th scope="col">address</th>
                <th scope="col">age</th>
                <th scope="col">company</th>
                <th scope="col">created_at</th>
                <th scope="col">actions</th>
            </tr>
            </thead>
            <tbody>
            @isset($clients)
                @foreach($clients as $client)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $client->first_name }}</td>
                        <td>{{ $client->last_name }}</td>
                        <td>{{ $client->address }}</td>
                        <td>{{ $client->age }}</td>
                        <td>
                            @isset($client->companies)
                                @foreach($client->companies as $company)
                                    {{ $company->name }}
                                    <br />
                                @endforeach
                            @endisset
                        </td>
                        <td>{{ $client->created_at }}</td>
                        <td>
                            <div style="display: flex">
                                <a href="{{ route('clients.edit', $client) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('clients.destroy', $client)}}" method="post">
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
        @if ($clients->links()->paginator->hasPages())
            <div class="mt-4 p-4 box has-text-centered">
                {{ $clients->links() }}
            </div>
        @endif
    </div>

@endsection
@push('js')
    <script>

    </script>
@endpush
