<?php
namespace App\Http\Controllers;

use App\Models\Opinion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// هنا هنعمل انك ممكن تقول رايك بس مينفعش تعدل عليه هيكون فيه حذف بس واللي يقدر يتحكم فيها الادمن وحته الادمن هنهندلها بعدين

class OpinionController extends Controller
{
    public function index()
    {
        $opinions = Opinion::latest()->get();
        return view('opinions.index', compact('opinions'));
    }

    public function create()
    {
         $opinions = Opinion::all();
        return view('opinions.create' , compact('opinions'));
    }

  public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:50',
        'subject' => 'nullable|string|max:255',
        'message' => 'required|string',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        // احفظ في public/opinionImages
        $file->move(public_path('opinionImages'), $filename);
        $data['image'] = 'opinionImages/' . $filename;
    }

    Opinion::create($data);

    return redirect()->route('opinions.create')
        ->with('success', 'Opinion created successfully.');
}


    public function show(Opinion $opinion)
    {
        return view('opinions.show', compact('opinion'));
    }



   public function destroy(Opinion $opinion)
{
    if ($opinion->image && file_exists(public_path($opinion->image))) {
        unlink(public_path($opinion->image));
    }
    $opinion->delete();

    return redirect()->route('opinions.create')
        ->with('success', 'Opinion deleted successfully.');
}

}
