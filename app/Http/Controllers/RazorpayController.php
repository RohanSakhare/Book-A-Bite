<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use RealRashid\SweetAlert\Facades\Alert;

class RazorpayController extends Controller
{
    public function index()
    {
        return view('admin/payment');
    }

    public function processPayment(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {
            // Fetch Payment details
            $payment = $api->payment->fetch($input['razorpay_payment_id']);

            if ($payment->status == "authorized") {
                $payment->capture(['amount' => $payment->amount]);

                Alert::success('Payment Successful', 'Your payment has been received!');
                return redirect()->route('razorpay.payment');
            } else {
                Alert::error('Payment Failed', 'Something went wrong, please try again.');
                return redirect()->route('razorpay.payment');
            }
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->route('razorpay.payment');
        }
    }
}
