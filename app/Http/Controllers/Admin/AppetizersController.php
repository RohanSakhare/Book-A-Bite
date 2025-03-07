<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppetizersModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;

class AppetizersController extends Controller
{
    public function AppetizerScript(Request $request)
    {
        if ($request->ajax()) {
            $data = AppetizersModel::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit = route('edit_appetizer', ['appetizer_id' => $row->appetizer_id]);

                    $delete = route('delete_appetizer', ['appetizer_id' => $row->appetizer_id]);

                    $actionBtn = '<a href="' . $edit . '" class="btn mt-2 btn-primary">Edit</a>';
                    $actionBtn .= '<form id="delete-form-' . $row->appetizer_id . '" action="' . $delete . '" method="POST" style="display:inline;">
                                  ' . csrf_field() . '
                                  ' . method_field('DELETE') . '
                                  <button type="button" class="delete-button btn btn-danger mt-2 ms-2" onclick="confirmDelete(' . $row->appetizer_id . ')">Delete</button>
                                  </form>';

                    return $actionBtn;
                })
                ->addColumn('image', function ($row) {
                    return '<img style="width:50px; height:50px;" src="' . asset($row->image) . '" class="img-fluid shadow img-thumbnail" alt="img">';
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
        return view('admin/appetizer/appetizer');
    }

    public function Appetizer()
    {
        return view('admin/appetizer/appetizer');
    }

    public function Add()
    {
        return view('Admin/appetizer/add');
    }

    public function Store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'price_now' => 'required',
            'price_before' => 'required',
        ]);
        $path = 'admin-assets/images/appetizer/';

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
            'title' => $request->title,
            'price_now' => $request->price_now,
            'price_before' => $request->price_before,
        ];
        AppetizersModel::create($data);

        session()->flash('success', 'Data has been added successfully!');
        return redirect('admin/appetizer');
    }

    public function Edit($appetizer_id)
    {
        $data = AppetizersModel::findOrFail($appetizer_id);
        return view('Admin/appetizer/edit', compact('data'));
    }

    public function Update(Request $request, $appetizer_id)
    {
        $request->validate([
            'title' => 'required',
            'price_now' => 'required',
            'price_before' => 'required',
        ]);

        $data = AppetizersModel::findOrFail($appetizer_id);
        $data->title = $request->input('title');
        $data->price_now = $request->input('price_now');
        $data->price_before = $request->input('price_before');

        if ($request->hasFile('image')) {
            $path = 'admin-assets/images/appetizer/';
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
        return redirect('admin/appetizer');
    }

    public function Delete($appetizer_id)
    {
        $appetizer = AppetizersModel::findOrFail($appetizer_id);
        $appetizer->delete();
        if (File::exists(public_path($appetizer->image))) {
            File::delete(public_path($appetizer->image));
        }
        session()->flash('success', 'Data has been added successfully!');
        return redirect('admin/appetizer');
    }
}
