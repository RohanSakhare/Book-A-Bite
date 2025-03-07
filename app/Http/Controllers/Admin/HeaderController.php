<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeaderModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;


class HeaderController extends Controller
{
    public function HeaderScript(Request $request)
    {
        if ($request->ajax()) {
            $data = HeaderModel::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit = route('edit_header', ['header_id' => $row->header_id]);

                    $delete = route('delete_header', ['header_id' => $row->header_id]);

                    $actionBtn = '<a href="' . $edit . '" class="btn mt-2 btn-primary">Edit</a>';
                    $actionBtn .= '<form id="delete-form-' . $row->header_id . '" action="' . $delete . '" method="POST" style="display:inline;">
                                  ' . csrf_field() . '
                                  ' . method_field('DELETE') . '
                                  <button type="button" class="delete-button btn btn-danger mt-2 ms-2" onclick="confirmDelete(' . $row->header_id . ')">Delete</button>
                                  </form>';
                    return $actionBtn;
                })
                ->addColumn('image', function ($row) {
                    return '<img style="width:50px; height:50px;" src="' . asset($row->image) . '" class="img-fluid shadow img-thumbnail" alt="img">';
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
        return view('Admin/header/header');
    }

    public function Header()
    {
        return view('Admin/header/header');
    }

    public function Add()
    {

        return view('Admin/header/add');
    }

    public function Store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required',
        ]);
        $path = 'admin-assets/images/header/';

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
        ];
        HeaderModel::create($data);

        session()->flash('success', 'Data has been added successfully!');
        return redirect('admin/header');
    }

    public function Edit($header_id)
    {
        $data = HeaderModel::findOrFail($header_id);
        return view('Admin/header/edit', compact('data'));
    }

    public function Update(Request $request, $header_id)
    {
    $request->validate([
        'title' => 'required',
    ]);

    $data = HeaderModel::findOrFail($header_id);
    $data->title = $request->input('title'); // Corrected column name

    if ($request->hasFile('image')) {
        $path = 'admin-assets/images/header/';
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
    return redirect('admin/header');
    }

    public function Delete($header_id)
    {
        $header = HeaderModel::findOrFail($header_id);
        $header->delete();
        if (File::exists(public_path($header->image))) {
            File::delete(public_path($header->image));
        }
        session()->flash('success', 'Data has been added successfully!');
        return redirect('admin/header');
    }
}
