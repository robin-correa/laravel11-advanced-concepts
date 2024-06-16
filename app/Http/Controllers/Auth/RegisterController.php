<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Jobs\SendWelcomeEmail;
use App\Models\User;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    /**
     * Handle user registration.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Dispatch the job to send the welcome email
        SendWelcomeEmail::dispatch($user);

        // Return a response
        return response()->json(['message' => 'User registered successfully'], Response::HTTP_CREATED);
    }
}
