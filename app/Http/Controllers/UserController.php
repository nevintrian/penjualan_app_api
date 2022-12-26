<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::all();
        if ($request->role == 'admin') {
            $data = User::where('role', 'admin')->get();
        }

        if ($request->role == 'customer') {
            $data = User::where('role', 'customer')->get();
        }
        return response()->json([
            'status' => true,
            'data' => $data
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        User::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Berhasil tambah data user',
            'data' => $request->all()
        ], Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        User::find($user->id)->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Berhasil ubah data user',
            'data' => $request->all()
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::find($user->id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil hapus data user',
        ], Response::HTTP_OK);
    }

    /**
     * Change password for user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $user = User::find($request->user_id);
        $hashedPassword = $user->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return response()->json([
                'status' => true,
                'message' => 'Berhasil ubah password',
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'message' => 'Password yang dimasukkan salah',
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
