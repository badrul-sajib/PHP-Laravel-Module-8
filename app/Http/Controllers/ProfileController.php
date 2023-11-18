<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request, $id)
    {
        // Declare variables and assign values
        $name = "Donal Trump";
        $age = "75";

        // Store data in an associative array
        $data = [
            'id' => $id,
            'name' => $name,
            'age' => $age
        ];

        // Set cookie
        $name = 'access_token';
        $value = '123-XYZ';
        $minutes = '1';
        $path = '/';
        $domain = $_SERVER['SERVER_NAME'];
        $secure = false;
        $httpOnly = true;
        $accessToken = Cookie::make(
            $name, $value, $minutes, $path, $domain, $secure, $httpOnly
        );

        // Return this data as response with status-code `200` and cookie
        $response = new Response($data, 200);
        $response->withCookie($accessToken);

        return $response;
    }
}
