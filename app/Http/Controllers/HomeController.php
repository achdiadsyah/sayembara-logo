<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Journey;
use App\Models\JourneyHistory;
use App\Models\Document;
use App\Models\Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'             => 'Dashboard',
            'journeys'          => JourneyHistory::where('user_id', Auth::id())->with('journey')->get(),
            'latest_journey'    => JourneyHistory::where('user_id', Auth::id())->orderBy('created_at', 'desc')->limit(1)->get(),
            'document'          => Document::where('user_id', auth()->user()->id)->first(),
            'config'            => Config::where('id', 1)->first()
        ];
        return view('home', $data);
    }

    public function adminDashboardData(Request $request)
    {
        if($request->ajax()){
            $data = [
                'totalNew'          => User::where('journey_id', Journey::where('slug', 'new')->first()->id)->count(),
                'totalNeedReview'   => User::where('journey_id', Journey::where('slug', 'need-review')->first()->id)->count(),
                'totalReviewed'     => User::where('journey_id', Journey::where('slug', 'on-review')->first()->id)->count(),
                'totalAssesment'    => User::where('journey_id', Journey::where('slug', 'assesment')->first()->id)->count(),
                'totalPassed'       => User::where('journey_id', Journey::where('slug', 'passed')->first()->id)->count(),
                'totalUnPassed'     => User::where('journey_id', Journey::where('slug', 'unpassed')->first()->id)->count(),
            ];
            return $data;
        }
    }

    public function adminDashboardUpdate(Request $request)
    {
        Config::where('id', 1)->update([
            'open_register'         => $request->open_register,
            'close_register'        => $request->close_register,
            'close_register_time'   => $request->close_register_time,
            'annoucement'           => $request->annoucement,
        ]);
        return redirect('home')->with([
            'text' => 'Berhasil merubah data',
            'status' => 'success',
        ]);
    }

    public function info()
    {
        $data = [
            'title'             => 'Layanan Informasi',
        ];
        return view('_users.info', $data);
    }

    public function syarat(Request $request)
    {
        $data = [
            'title'             => 'Syarat Pendaftaran Karya'
        ];
        return view('_users.syarat', $data);
    }

    public function completing()
    {
        $data = User::where('id', Auth::id())->first();

        if ($data->name == NULL || $data->nik == NULL || $data->phone == NULL || $data->registered_as == NULL || $data->registered_as_info == NULL) {
            return view('auth.completing');
        }
        return redirect('home');
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
