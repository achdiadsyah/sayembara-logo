<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class AdminController extends Controller
{
    public function pesertaBaru(Request $request)
    {

        if ($request->ajax()) {
            $data = User::where('is_admin', 0)->where('journey')->latest()->get();
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
