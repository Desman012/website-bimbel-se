<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facilities;
use App\Models\Reviews;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TestimoniExport;


class LandingController extends Controller
{
    public function index()
    {
        
        $review=Reviews::all();
        $facility=Facilities::all();
        $reviews = Reviews::paginate(5);
        $facilities = Facilities::paginate(5);
        return view('admins.landing', compact('review', 'reviews', 'facilities', 'facility'));

    }

    public function edit($id)
    {
        $data=Reviews::findOrFail($id);
        return view('admins.landing-edit', compact('data'));
    }

    public function destroy($id)
    {
        $review = Reviews::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.landing')
                        ->with('success', 'Review berhasil dihapus.');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_student' => 'required|string|max:50',
            'school'       => 'required|string|max:35',
            'review_text'  => 'required|string',
        ]);

        Reviews::create([
            'name_student' => $request->name_student,
            'school'       => $request->school,
            'review_text'  => $request->review_text,
            
        ]);

        return redirect()->route('admin.landing')
                        ->with('success', 'Review berhasil ditambahkan.');

        // return $request;
    }

    public function export_testimoni()
    {
        // return 'ciu';
        return Excel::download(new TestimoniExport, 'testimoni-data.xlsx');
    }


    public function create()
    {
        return view('admins.landing-create');
    }

    
    public function update(Request $request, $data)
    {
        $review=Reviews::findOrFail($data);
        $review->update([
            'name_student' => $request->name_student,
            'school' => $request->school,
            'review_text' => $request->review_text,
        ]);

        return redirect()->route('admin.landing')
                         ->with('success', 'Informasi admin telah di update.');
    }
}
