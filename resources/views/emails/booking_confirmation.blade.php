<h1>Booking Confirmation - Table Reservation on {{ $booking->date }}</h1>


<p>Dear <b>{{ $booking->name }}</b>,</p>

<p>We are pleased to <b>confirm</b> your table reservation at Book A Bite.
    please find the details of your booking below:</p>
<ul>
    <li>
        <b>Date:</b> {{ $booking->date }}

    </li>
    <li>
        <b>Time:</b> {{ $booking->time }}
    </li>
    <li>
        <b>Guests:</b> {{ $booking->guests }}
    </li>
    <li>
        <b>Table Number:</b> {{ $booking->table_id }}
    </li>
</ul>

<p><b>Thank You</b> for choosing Book A Bite. We look forword to serving you</p>


<p>Best Regards, <br>
    <b>Book A Bite</b>, <br>
    <b>Location :</b> 123 Street, Chhatrapati Sambhajinagar, Maharashtra
</p>
