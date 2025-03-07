<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookingModel;
use Yajra\DataTables\Facades\DataTables;
use App\Mail\BookingConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    //
    public function BookingScript(Request $request)
    {
        if ($request->ajax()) {
            $data = BookingModel::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    $view = route('booking_view', ['bookings_id' => $row->bookings_id]);

                    $delete = route('delete_booking', ['bookings_id' => $row->bookings_id]);

                    return '<a href="' . $view . '" class="btn btn-primary">View</a>
                            <form id="delete-form-' . $row->bookings_id . '" action="' . $delete . '" method="POST" style="display:inline;">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="button" class="delete-button btn btn-danger" onclick="confirmDelete(' . $row->bookings_id . ')">Delete</button>
                            </form>';
                })

                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin/bookings/bookings');
    }

    public function Booking()
    {
        return view('admin/bookings/bookings');
    }

    public function BookingView($bookings_id)
    {
        $data = BookingModel::findOrFail($bookings_id);
        return view('admin/bookings/view', compact('data'));
    }

    public function Store(Request $request)
    {
        try {
            // Validate the request
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'number' => 'required',
                'date' => 'required|date',
                'time' => 'required',
                'guests' => 'required|integer|min:1',
                'request' => 'nullable|string',
                'table_id' => 'required|exists:tables,id'
            ]);

            // Create the booking
            $booking = BookingModel::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'number' => $request->input('number'),
                'date' => $request->input('date'),
                'time' => $request->input('time'),
                'guests' => $request->input('guests'),
                'request' => $request->input('request'),
                'table_id' => $request->input('table_id'),
            ]);

            // Send email confirmation
            Mail::to($booking->email)->send(new BookingConfirmation($booking));

            // Return success response
            return response()->json([
                'status' => 'success',
                'message' => 'Booking confirmed!'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return validation errors as JSON
            return response()->json([
                'status' => 'error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Log the exception message and stack trace
            Log::error('Error occurred while processing booking: ' . $e->getMessage(), ['exception' => $e]);

            // Handle other exceptions
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while processing your request.'
            ], 500);
        }
    }

    public function checkAvailability(Request $request)
    {
        $date = $request->query('date');
        $time = $request->query('time');

        $bookings = BookingModel::where('date', $date)
            ->where('time', $time)
            ->count();

        $totalTables = 3;
        $available = $bookings < $totalTables;

        return response()->json(['available' => $available]);
    }

    public function Delete($bookings_id)
    {
        $about = BookingModel::findOrFail($bookings_id);
        $about->delete();

        session()->flash('success', 'Data has been deleted successfully!');
        return redirect('admin/booking');
    }
}
