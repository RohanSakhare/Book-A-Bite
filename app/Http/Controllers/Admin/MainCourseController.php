<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use App\Models\MainCourseModel;

class MainCourseController extends Controller
{

    public function MainCourseScript(Request $request)
    {
        if ($request->ajax()) {
            $data = MainCourseModel::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit = route('edit_main_course', ['main_course_id' => $row->main_course_id]);

                    $delete = route('delete_main_course', ['main_course_id' => $row->main_course_id]);

                    $actionBtn = '<a href="' . $edit . '" class="btn mt-2 btn-primary">Edit</a>';
                    $actionBtn .= '<form id="delete-form-' . $row->main_course_id . '" action="' . $delete . '" method="POST" style="display:inline;">
                                  ' . csrf_field() . '
                                  ' . method_field('DELETE') . '
                                  <button type="button" class="delete-button btn btn-danger mt-2 ms-2" onclick="confirmDelete(' . $row->main_course_id . ')">Delete</button>
                                  </form>';

                    return $actionBtn;
                })
                ->addColumn('image', function ($row) {
                    return '<img style="width:50px; height:50px;" src="' . asset($row->image) . '" class="img-fluid shadow img-thumbnail" alt="img">';
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
        return view('admin/maincourse/maincourse');
    }

    public function MainCourse()
    {
        return view('admin/maincourse/maincourse');
    }

    public function Add()
    {
        return view('Admin/maincourse/add');
    }

    public function Store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'price_now' => 'required',
            'price_before' => 'required',
        ]);
        $path = 'admin-assets/images/maincourse/';

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
        MainCourseModel::create($data);

        session()->flash('success', 'Data has been added successfully!');
        return redirect('admin/main_course');
    }

    public function Edit($main_course_id)
    {
        $data = MainCourseModel::findOrFail($main_course_id);
        return view('Admin/maincourse/edit', compact('data'));
    }

    public function Update(Request $request, $main_course_id)
    {
        $request->validate([
            'title' => 'required',
            'price_now' => 'required',
            'price_before' => 'required',
        ]);

        $data = MainCourseModel::findOrFail($main_course_id);
        $data->title = $request->input('title');
        $data->price_now = $request->input('price_now');
        $data->price_before = $request->input('price_before');

        if ($request->hasFile('image')) {
            $path = 'admin-assets/images/maincourse/';
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
        return redirect('admin/main_course');
    }

    public function Delete($main_course_id)
    {
        $maincourse = MainCourseModel::findOrFail($main_course_id);
        $maincourse->delete();
        if (File::exists(public_path($maincourse->image))) {
            File::delete(public_path($maincourse->image));
        }
        session()->flash('success', 'Data has been Deleted successfully!');
        return redirect('admin/main_course');
    }

}
