<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Journey;
use App\Models\JourneyHistory;
use DataTables;

class AdminController extends Controller
{
    public function pesertaBaru(Request $request)
    {

        if ($request->ajax()) {
            $data = User::where('is_admin', 0)->where('journey_id', Journey::where('slug', 'new')->first()->id)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
        $data = [
            'title'             => 'New Register',
        ];
        return view('_admin.new-reg', $data);

    }
    
    public function reviewUpdate(Request $request)
    {
        $getJourney = Journey::where('slug', $request->slug)->first();

        $user = User::where('id', $request->id)->update([
            'journey_id'    => $getJourney->id,
        ]);

        $history = JourneyHistory::create([
            'user_id'   => $request->id,
            'journey_id' => $getJourney->id,
        ]);

        if ($user && $history) {
            return redirect('home');;

        }
    }

    public function needReview(Request $request)
    {

        if ($request->ajax()) {
            $data = User::where('is_admin', 0)->where('journey_id', Journey::where('slug', 'need-review')->first()->id)->with('document')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
        $data = [
            'title'             => 'Need Review',
        ];
        return view('_admin.need-review', $data);

    }

    public function needReviewDetail(User $user)
    {
        $data = [
            'title'             => 'Need Review Detail',
            'user'              => $user    
        ];
        return view('_admin.need-review-detail', $data);
    }

    public function onReview(Request $request)
    {

        if ($request->ajax()) {
            $data = User::where('is_admin', 0)->where('journey_id', Journey::where('slug', 'on-review')->first()->id)->with('document')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
        $data = [
            'title'             => 'Reviewed File',
        ];
        return view('_admin.on-review', $data);

    }

    public function onReviewDetail(User $user)
    {
        $data = [
            'title'             => 'Reviewed Detail',
            'user'              => $user    
        ];
        return view('_admin.on-review-detail', $data);
    }

    public function assesment(Request $request)
    {

        if ($request->ajax()) {
            $data = User::where('is_admin', 0)->where('journey_id', Journey::where('slug', 'assesment')->first()->id)->with('document')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
        $data = [
            'title'             => 'Finalis File',
        ];
        return view('_admin.assesment', $data);

    }

    public function assesmentDetail(User $user)
    {
        $data = [
            'title'             => 'Finalis Detail',
            'user'              => $user,
            'is_passed'         => User::where('journey_id', Journey::where('slug', 'passed')->first()->id)->count()  
        ];
        return view('_admin.assesment-detail', $data);
    }

    public function unPassed(Request $request)
    {

        if ($request->ajax()) {
            $data = User::where('is_admin', 0)->where('journey_id', Journey::where('slug', 'unpassed')->first()->id)->with('document')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
        $data = [
            'title'             => 'Karya di Tolak',
        ];
        return view('_admin.un-passed', $data);

    }

    public function unPassedDetail(User $user)
    {
        $data = [
            'title'             => 'Karya di tolak Detail',
            'user'              => $user    
        ];
        return view('_admin.un-passed-detail', $data);
    }

    public function passed(Request $request)
    {
        $user =  User::where('is_admin', 0)
                    ->where('journey_id', Journey::where('slug', 'passed')->first()->id)
                    ->with('document')
                    ->first();
        
        $data = [
            'title'             => 'Juara Utama',
            'user'              => $user
        ];
        return view('_admin.passed', $data);

    }
}
