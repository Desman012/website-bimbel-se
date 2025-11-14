<?php

namespace App\Http\Controllers;
use App\Filament\Resources\AdminResource;
use Illuminate\Http\Request;

class AdminRegistrationController extends Controller
{
    public function index()
    {
        return redirect(AdminResource::getUrl());;
    }

    public function show($id)
    {
        return view('admin.registrations.show', compact('id'));
    }
}