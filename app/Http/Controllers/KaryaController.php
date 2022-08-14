<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Journey;
use App\Models\JourneyHistory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class KaryaController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'             => 'Upload Karya',
            'document'          => Document::where('user_id', auth()->user()->id)->first()
        ];
        return view('_users.karya', $data);
    }

    public function save(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'description'   => ['required', 'min:100'],
            'file'          => ['required','mimes:jpg,jpeg,png','max:2048', 'dimensions:max_width=800,max_height=600'],
        ],
        [
            'description.min'       => 'Minimal 100 karakter',
            'description.required'  => 'Bagian Deskripsi penjelasan karya wajib di isi',
            'file.required'         => 'Anda belum melampirkan file karya anda',
            'file.mimes'            => 'Ekstensi file yang di perbolehkan hanya JPEG / JPG / PNG',
            'file.max'              => 'Besar file yang di perbolehkan hanya 2 MB',
            'file.dimensions'       => 'Pastikan dimensi file anda Lebar 800px dan Tinggi 600px',
        ]);

        if ($validated->fails()) {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        } else {
            if ($request->hasFile('file')){

                $journey = Journey::where('slug', 'need-review')->first();
                JourneyHistory::create([
                    'user_id'   =>  auth()->user()->id,
                    'journey_id' => $journey->id,
                ]);

                $uniqFolder = uniqid();
                $image = $request->file('file')->store('karya-'.$uniqFolder);
                Document::create([
                    'user_id'       => auth()->user()->id,
                    'file'          => $image ,
                    'description'   => $request->description,
                ]);
                return redirect('upload-karya')->with([
                    'text' => 'Karya anda berhasil di upload',
                    'status' => 'success',
                ]);
            } else {
                return redirect('upload-karya')->with([
                    'text' => 'Karya anda gagal di upload',
                    'status' => 'error',
                ]);
            }
        }
    }
}
