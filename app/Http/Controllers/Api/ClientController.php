<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    /**
     * @param Company $company
     * @return JsonResponse
     */
    public function index(Company $company): JsonResponse
    {
        $clients = $company->clients()->paginate(10);

        return response()->json($clients);
    }

    /**
     * @param Client $client
     * @return JsonResponse
     */
    public function getCompaniesByClient(Client $client): JsonResponse
    {
        $companies = $client->companies()->paginate(10);

        return response()->json($companies);
    }
}
