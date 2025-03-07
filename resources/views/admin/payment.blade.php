<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Payment</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>

    @include('sweetalert::alert')

    <form action="{{ route('razorpay.payment.store') }}" method="POST">
        @csrf
        <input type="hidden" name="amount" id="amount" value="500">
        <button type="button" id="pay-btn">Pay ₹500</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('pay-btn').addEventListener('click', function() {
            var options = {
                "key": "{{ env('RAZORPAY_KEY') }}",
                "amount": 50000, // Amount in paise (500 INR)
                "currency": "INR",
                "name": "Book A Bite",
                "description": "Test Payment",
                "image": "https://yourwebsite.com/logo.png",
                "handler": function (response){
                    var form = document.forms[0];
                    var input = document.createElement("input");
                    input.type = "hidden";
                    input.name = "razorpay_payment_id";
                    input.value = response.razorpay_payment_id;
                    form.appendChild(input);
                    form.submit();
                },
                "theme": {
                    "color": "#3399cc"
                }
            };

            var rzp1 = new Razorpay(options);
            rzp1.open();
        });
    </script>

</body>
</html>
