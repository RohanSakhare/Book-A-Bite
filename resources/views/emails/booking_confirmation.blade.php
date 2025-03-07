<h1>Booking Confirmation </h1>
<p>Hello {{ $booking->name }},</p>
<p>Your table booking for {{ $booking->guests }} guests on <b> {{ $booking->date }} </b> at <b> {{ $booking->time }}
    </b> confirmed.
</p>
<p>Table: {{ $booking->table_id }}</p>
<p>Thank you for choosing us!</p>
<p>
    <b>Book A Bite</b>,
</p>
<p> <b>Location :</b> 123 Street, Chhatrapati Sambhajinagar, Maharashtra
</p>
