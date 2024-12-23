<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Universty;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $universties = Universty::all();

        return view('admin.dashboard', compact('universties'));
    }

    public function addUniversty(Request $request){
        $validateData=$request->validate([
            'name'=>'required',
            'email'=>'required|unique:universties,email',
            'location'=>'nullable',
            'image' => 'nullable'
        ]);
        $universty = Universty::create([
            'name'=>$validateData['name'],
            'email'=>$validateData['email'],
            'location'=>$validateData['location'] ?? null,
            'image'=>$validateData['image'] ?? 'https://media.istockphoto.com/id/1222357475/vector/image-preview-icon-picture-placeholder-for-website-or-ui-ux-design-vector-illustration.jpg?s=612x612&w=0&k=20&c=KuCo-dRBYV7nz2gbk4J9w1WtTAgpTdznHu55W9FjimE=',
        ]);
        return redirect()->back()->with('success', 'University added successfully!');
    }

    public function destroy($id)
{
    try {
        $university = Universty::findOrFail($id);
        $university->delete();
        return response()->json(['message' => 'University deleted successfully!'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Failed to delete university.'], 400);
    }
}

}
