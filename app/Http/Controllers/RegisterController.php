<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Register a new User
     *
     * @param UserRegisterRequest $request
     * @return JsonResponse
     */
    public function register(UserRegisterRequest $request): JsonResponse
    {
        $data = $request->only('name', 'email', 'password');

        try {

            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make( $data['password'] );
            $user->save();

            // TODO: Send Email Notification

            return response()->json([
                'message' => 'You have been registered successfully.'
            ]);

        }catch (Exception $exception){
            return response()->json([
                'message' => $exception->getMessage()
            ]);
        }
    }
}
