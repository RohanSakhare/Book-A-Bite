<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TestimonialModel;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class TestimonialController extends Controller
{
    public function TestimonialScript(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = TestimonialModel::latest()->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $edit = route('edit_testimonial', ['testimonial_id' => $row->testimonial_id]);
                        $delete = route('delete_testimonial', ['testimonial_id' => $row->testimonial_id]);

                        $actionBtn = '<a href="' . $edit . '" class="btn mt-2 btn-primary">Edit</a>';
                        $actionBtn .= '<form id="delete-form-' . $row->testimonial_id . '" action="' . $delete . '" method="POST" style="display:inline;">
                                      ' . csrf_field() . '
                                      ' . method_field('DELETE') . '
                                      <button type="button" class="delete-button btn btn-danger mt-2 " onclick="confirmDelete(' . $row->testimonial_id . ')">Delete</button>
                                      </form>';
                        return $actionBtn;
                    })
                    ->addColumn('image', function ($row) {
                        return '<img style="width:50px; height:50px;" src="' . asset($row->image) . '" class="img-fluid shadow img-thumbnail" alt="img">';
                    })
                    ->rawColumns(['image', 'action'])
                    ->make(true);
            }
        } catch (\Exception $e) {
            Log::error('Error in TestimonialScript: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred'], 500);
        }
        return view('admin/testinomial/testinomial');
    }
    public function TestimonialAdmin()
    {
        return view('admin/testinomial/testinomial');
    }
    public function Add()
    {
        return view('admin/testinomial/add');
    }

    public function Store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'name' => 'required',
            'profession' => 'required',
            'review' => 'required',
        ]);
        $path = 'admin-assets/images/testinomial/';

        // Handle the file upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension(); // Create a unique filename
            $file->move(public_path($path), $filename); // Save the file to the specified path
            $imagePath = $path . $filename; // Create full path for storage in DB
        } else {
            return back()->withErrors(['image' => 'Image upload failed. Please try again.']);
        }
        $data = [
            'image' => $imagePath,
            'name' => $request->name,
            'profession' => $request->profession,
            'review' => $request->review,
        ];
        TestimonialModel::create($data);

        session()->flash('success', 'Data has been added successfully!');
        return redirect('admin/testimonial');
    }
    public function Edit($testimonial_id)
    {
        $data = TestimonialModel::findOrFail($testimonial_id);
        return view('Admin/testinomial/edit', compact('data'));
    }
    public function Update(Request $request, $testimonial_id)
    {
        $request->validate([
            'name' => 'required',
            'profession' => 'required',
            'review' => 'required',
        ]);

        $data = TestimonialModel::findOrFail($testimonial_id);
        $data->name = $request->input('name');
        $data->profession = $request->input('profession');
        $data->review = $request->input('review');

        if ($request->hasFile('image')) {
            $path = 'admin-assets/images/testinomial/';
            if (File::exists(public_path($data->image))) {
                File::delete(public_path($data->image));
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move(public_path($path), $filename);
            $data->image = $path . $filename;
        } else {
            $data->image = $request->input('current_image');
        }



        $data->save();
        session()->flash('success', 'Data has been updated successfully!');
        return redirect('admin/testimonial');
    }
    public function Delete($testimonial_id)
    {
        $testinomial = TestimonialModel::findOrFail($testimonial_id);
        $testinomial->delete();
        if (File::exists(public_path($testinomial->image))) {
            File::delete(public_path($testinomial->image));
        }
        session()->flash('success', 'Data has been Deleted successfully!');
        return redirect('admin/testimonial');
    }
}
