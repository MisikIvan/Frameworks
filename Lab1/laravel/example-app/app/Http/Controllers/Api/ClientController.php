<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'role:Client']);
    }


    public function dashboard(): JsonResponse
    {
        return response()->json(['message' => 'Welcome, Client!']);
    }
}
