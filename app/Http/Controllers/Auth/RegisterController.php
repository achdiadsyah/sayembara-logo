<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Journey;
use App\Models\JourneyHistory;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8|same:password'
        ]);
    }

    protected function create(array $data)
    {
        $journey = Journey::where('slug', 'new')->first();

        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => '0',
            'journey_id' => $journey->id,
        ]);

        $history = JourneyHistory::create([
            'user_id'   => $user->id,
            'journey_id' => $journey->id,
        ]);

        if($user && $history){
            return $user;
        }
    }
}
