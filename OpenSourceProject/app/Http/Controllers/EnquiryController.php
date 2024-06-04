<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{

    public function index(){
        $userId = auth()->id();

        // Retrieve enquiries for the authenticated user
        $enquiries = Enquiry::where('user_id', $userId)->get();
        return view('enquiry', compact('enquiries'));
    }
    public function store(Request $request)
{
    $validatedData = $request->validate([
        "user_id" => ['required', 'integer', 'exists:users,id'],
        "name" => ['required', 'string', 'max:255'],      
        "email" => ['required', 'string', 'email', 'max:255'],
        "mobileNumber" => ['required', 'string', 'max:20'],
        "departureDate" => ['required', 'date'],
        "packageName" => ['required', 'string', 'max:255'],
        "additional" => ['nullable', 'string'],
    ]);

    Enquiry::create($validatedData);

    // Return a success response or redirect
    return redirect()->route('enquiryHistory')->with('success', 'Enquiry created successfully.');
}


    public function enquiryUpdate($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        return view('enquiries.update', compact('enquiry'));
    }

    // Handle the update request
    public function update(Request $request, $id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobileNumber' => 'required|string|max:20',
            'departureDate' => 'required|date',
            'additional' => 'nullable|string',
        ]);
        
        $enquiry->update($request->all());

        return redirect()->route('enquiryHistory')->with('success', 'Enquiry updated successfully.');
    }

    public function destroy($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->delete();

        return redirect()->route('enquiryHistory')->with('success', 'Enquiry deleted successfully.');
    }

}
