<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Journey;
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
}
