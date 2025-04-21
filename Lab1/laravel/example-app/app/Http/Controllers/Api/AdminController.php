<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'role:Admin']);
    }

    public function dashboard(): JsonResponse
    {
        return response()->json(['message' => 'Welcome, Admin!']);
    }

}
