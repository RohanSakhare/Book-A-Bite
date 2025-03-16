<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FearturesModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class FeaturesController extends Controller
{

    public function FeaturesScript(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = FearturesModel::latest()->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $edit = route('edit_features', ['features_id' => $row->features_id]);
                        $delete = route('delete_features', ['features_id' => $row->features_id]);

                        $actionBtn = '<a href="' . $edit . '" class="btn mt-2 btn-primary">Edit</a>';
                        $actionBtn .= '<form id="delete-form-' . $row->features_id . '" action="' . $delete . '" method="POST" style="display:inline;">
                                      ' . csrf_field() . '
                                      ' . method_field('DELETE') . '
                                      <button type="button" class="delete-button btn btn-danger mt-2 ms-2" onclick="confirmDelete(' . $row->features_id . ')">Delete</button>
                                      </form>';
                        return $actionBtn;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
            }
        } catch (\Exception $e) {
            Log::error('Error in FeaturesScript: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred'], 500);
        }
        return view('admin/features/features');
    }
    public function Features()
    {
        return view('admin/features/features');
    }
    public function Add()
    {
        return view('admin/features/add');
    }

    public function Store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];
        FearturesModel::create($data);

        session()->flash('success', 'Data has been added successfully!');
        return redirect('admin/features');
    }
    public function Edit($features_id)
    {
        $data = FearturesModel::findOrFail($features_id);
        return view('Admin/features/edit', compact('data'));
    }
    public function Update(Request $request, $features_id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = FearturesModel::findOrFail($features_id);
        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $data->save();
        session()->flash('success', 'Data has been updated successfully!');
        return redirect('admin/features');
    }
    public function Delete($features_id)
    {
        $testinomial = FearturesModel::findOrFail($features_id);
        $testinomial->delete();

        session()->flash('success', 'Data has been Deleted successfully!');
        return redirect('admin/features');
    }
}
