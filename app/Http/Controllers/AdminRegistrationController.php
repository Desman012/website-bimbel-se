<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admins;
use App\Models\Facilities;
use App\Models\Reviews;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminRegistrationController extends Controller
{
    public function index()
    {
        $admins = Admins::latest()->whereNot('id', Auth::guard('admin')->user()->id)->paginate(10);
        return view('admins.admin', compact('admins'));
    }

    public function create()
    {
        return view('admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'email' => 'required|string|email|max:255|unique:admins,email',
            'password'  => 'nullable|string|min:8|confirmed',
            'status' => 'required|in:active,inactive',
        ]);

        $admin = Admins::create([
            'full_name' => $request->full_name,
            'address' => $request->address,
            'email' => $request->email,
            'password' => $request->filled('password') ? Hash::make($request->password) : null,
            'status' => 'active',
            'role_id' => 1,
        ]);

        return redirect()->route('admin.registrations.index');
    }

    public function show(Admins $admin)
    {
        return view('admins.show', compact('admin'));
    }

    public function edit(Admins $admin)
    {
        return view('admins.edit', compact('admin'));
    }

    public function update(Request $request, Admins $admin)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'email' => 'required|string|email|max:255|unique:admins,email,',
            'password' => 'required|string|min:8|confirmed',
            'status' => 'required|in:active,inactive',
        ]);
        
        $admin->update([
            'email' => $request->email,
            'full_name' => $request->full_name,
        ]);

        if ($request->filled('password')) {
            $admin->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('admin.registrations.index')
                         ->with('success', 'Informasi admin telah di update.');
    }

    public function destroy(Admins $admin)
    {
        $admin->delete();

         return redirect()->route('admin.registrations.index')
                         ->with('success', 'Admin berhasil dihapus.');
    }

    public function landing()
    {
        
        $review=Reviews::all();
        $facility=Facilities::all();
        $reviews = Reviews::paginate(5);
        $facilities = Facilities::paginate(5);
        return view('admins.landing', compact('review', 'reviews', 'facilities', 'facility'));

    }

    public function landing_edit($id)
    {
        $data=Reviews::findOrFail($id);
        return view('admins.landing-edit', compact('data'));
    }

    public function landing_destroy($id)
    {
        $review = Reviews::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.landing')
                        ->with('success', 'Review berhasil dihapus.');
    }


    public function landing_store(Request $request)
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

    
    public function landing_create()
    {
        return view('admins.landing-create');
    }

    
    public function landing_update(Request $request, $data)
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