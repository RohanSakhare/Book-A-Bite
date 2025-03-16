<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactModel;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    public function ContactScript(Request $request)
    {
        if ($request->ajax()) {
            $data = ContactModel::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $delete = route('delete_contactus', ['contactus_id' => $row->contactus_id]);

                    return '<form id="delete-form-' . $row->contactus_id . '" action="' . $delete . '" method="POST" style="display:inline;">
                                  ' . csrf_field() . '
                                  ' . method_field('DELETE') . '
                                  <button type="button" class="delete-button btn btn-danger mt-2 ms-2" onclick="confirmDelete(' . $row->contactus_id . ')">Delete</button>
                                  </form>';

                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin/contactus/contact');
    }

    public function Contact()
    {
        return view('admin/contactus/contact');
    }



    public function Store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mail' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'mail' => $request->mail,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        ContactModel::create($data);

        session()->flash('success', 'Data has been sent successfully!');
        return redirect('/contact');
    }





    public function Delete($contactus_id)
    {
        $contactus = ContactModel::findOrFail($contactus_id);
        $contactus->delete();

        session()->flash('success', 'Data has been Deleted successfully!');
        return redirect('admin/contactus');
    }
}
