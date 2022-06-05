<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Company;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PHPUnit\Exception;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $clients = Client::orderBy('created_at', 'desc')->simplePaginate(10);

        return view('admin.clients.index', [
            'clients' => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $companies = Company::get()->pluck('name', 'id')->toArray();

        return view('admin.clients.create', [
            'companies' => $companies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        $validatorData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'address' => 'required|max:255',
            'age' => 'required|integer',
            'companies' => 'required|array',
        ]);

        $client = Client::create($validatorData);
        $client->companies()->attach($request->input('companies'));

        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Client  $client
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Client $client
     * @return Application|Factory|View
     */
    public function edit(Client $client)
    {
        $companies = Company::get()->pluck('name', 'id')->toArray();

        return view('admin.clients.edit', [
            'client' => $client,
            'companies' => $companies
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Client $client
     * @return RedirectResponse
     */
    public function update(Request $request, Client $client): RedirectResponse
    {
        $validatorData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'address' => 'required|max:255',
            'age' => 'required|integer',
            'companies' => 'required|array',
        ]);
        $client->companies()->detach();
        $client->companies()->attach($request->input('companies'));
        $client->update($validatorData);

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Client $client
     * @return RedirectResponse
     */
    public function destroy(Client $client): RedirectResponse
    {
        $client->companies()->detach();
        $client->delete();

        return redirect()->route('clients.index');
    }
}
