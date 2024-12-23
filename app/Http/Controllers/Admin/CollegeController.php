<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collage;
use App\Models\Universty;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    // Show the dashboard of a university and its colleges
    public function dashboard($id)
    {
        $universty = Universty::findOrFail($id);  // Fetch the university by its ID
        $collages = $universty->collages;         // Fetch all colleges related to the university

        return view('admin.university_dashboard', compact('universty', 'collages'));
    }

    // Add a new college to a university
    public function addCollage(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required', // Validate that the college name is required
        ]);

        $universty = Universty::findOrFail($id);  // Fetch the university by its ID

        // Create a new college under the specified university
        Collage::create([
            'name' => $validateData['name'],
            'universty_id' => $universty->id
        ]);

        return redirect()->back()->with('success', 'College added successfully!');
    }

    // Delete a college
    public function destroy($universityId, $id)
    {
        // Fetch the university by its ID
        $university = Universty::findOrFail($universityId);

        // Fetch the college related to the university and delete it
        $college = $university->collages()->findOrFail($id);
        $college->delete();

        return redirect()->back()->with('success', 'College deleted successfully!');
    }
}
