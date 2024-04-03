<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function index()
    {
        $getUserData = User::get();
        return view('api', ['userdata' => $getUserData]);
    }

    public function handleFormData(Request $request) 
    {
        $name = $request->username;
        $age = $request->age;
        $email = $request->email;

        if($name && $email && $age !== NULL){
            User::create([
                'name' => $name,
                'email' => $email,
                'age' => $age,
            ]);

            return redirect()->route('api');
        }
    }
    public function getDataFromApi()
    {
        $getUserData = User::get();
        $data = json_encode($getUserData);
        return $data;
    }
}
