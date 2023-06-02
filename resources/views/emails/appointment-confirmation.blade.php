<x-mail::message>
# Confirm your appointment

Please confirm your appointment by clicking the button below:

<x-mail::button :url="$confirmationLink">
    Confirm Appointment Reservation
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
