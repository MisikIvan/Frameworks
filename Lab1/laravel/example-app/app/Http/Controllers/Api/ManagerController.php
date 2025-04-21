<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'role:Manager']);
    }

    public function dashboard(): JsonResponse
    {
        return response()->json(['message' => 'Welcome, Manager!']);
    }
}
