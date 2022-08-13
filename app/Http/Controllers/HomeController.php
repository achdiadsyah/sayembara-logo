<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JourneyHistory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title'             => 'Dashboard',
            'journeys'          => JourneyHistory::where('user_id', Auth::id())->with('journey')->get(),
            'latest_journey'    => JourneyHistory::where('user_id', Auth::id())->orderBy('created_at', 'desc')->limit(1)->get(),
        ];
        return view('home', $data);
    }

    public function completing()
    {
        $data = User::where('id', Auth::id())->first();

        if ($data->name == NULL || $data->nik == NULL || $data->phone == NULL || $data->registered_as == NULL || $data->registered_as_info == NULL) {
            return view('auth.completing');
        }
    }

    public function updateData(Request $request)
    {

        $validated = Validator::make($request->all(), [
            'name'                  => 'required|string',
            'nik'                   => 'required|unique:users,nik|min:16',
            'phone'                 => 'required|min:10',
            'registered_as'         => 'required|string',
            'registered_as_info'    => 'required',
        ]);

        if ($validated->fails()) {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        } else {
            User::where('id', auth()->user()->id)
            ->update([
                'name'                  => $request->name,
                'nik'                   => $request->nik,
                'phone'                 => "62".$request->phone,
                'registered_as'         => $request->registered_as,
                'registered_as_info'    => $request->registered_as_info,
            ]);
            return redirect()->route('home');
        }
    }
}