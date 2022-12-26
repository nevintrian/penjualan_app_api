<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $login = Auth::Attempt($request->all());
        if ($login) {
            $data = User::where('email', $request->email)->first();
            return response()->json([
                'status' => true,
                'message' => 'Login berhasil',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Email atau password salah'
            ]);
        }
    }
}
