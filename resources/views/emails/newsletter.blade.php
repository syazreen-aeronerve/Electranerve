<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="x-apple-disable-message-reformatting">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Newsletter</title>

  <style type="text/css">
    a,
    a[href],
    a:hover,
    a:link,
    a:visited {
      text-decoration: none !important;
      color: #0000EE;
    }

    .link {
      text-decoration: underline !important;
    }

    p,
    p:visited {
      /* Fallback paragraph style */
      font-size: 15px;
      line-height: 24px;
      font-family: 'Helvetica', Arial, sans-serif;
      font-weight: 300;
      text-decoration: none;
      color: #000000;
    }

    h1 {
      /* Fallback heading style */
      font-size: 22px;
      line-height: 24px;
      font-family: 'Helvetica', Arial, sans-serif;
      font-weight: normal;
      text-decoration: none;
      color: #000000;
    }

    .ExternalClass p,
    .ExternalClass span,
    .ExternalClass font,
    .ExternalClass td {
      line-height: 100%;
    }

    .ExternalClass {
      width: 100%;
    }
  </style>
  <!-- End stylesheet -->

</head>

@php
    use Carbon\Carbon;
@endphp

@php
    $currentDate = Carbon::now();
@endphp

@php
    $currentMonth = $currentDate->format('F'); 
    $currentYear = $currentDate->format('Y');   
    $currentWeek = $currentDate->weekOfYear;
@endphp

<!-- You can change background colour here -->

<body style="text-align: center; margin: 0; padding-top: 10px; padding-bottom: 10px; padding-left: 0; padding-right: 0; -webkit-text-size-adjust: 100%;background-color: #f2f4f6; color: #000000" align="center">

  <!-- Fallback force center content -->
  <div style="text-align: center;">

    <!-- Email not displaying correctly -->
    <table align="center" style="text-align: center; vertical-align: middle; width: 600px; max-width: 600px;" width="600">
      <tbody>
        <tr>
          <td style="width: 596px; vertical-align: middle;" width="596">

         

          </td>
        </tr>
      </tbody>
    </table>
    <!-- Email not displaying correctly -->

    <!-- Start container for logo -->
    <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #ffffff;" width="600">
      <tbody>
        <tr>
          <td style="width: 596px; vertical-align: top; padding-left: 0; padding-right: 0; padding-top: 15px; padding-bottom: 15px;" width="596">

            <img style="width: 40px; max-width: 40px; height: 40px; max-height: 40px; text-align: center; color: #ffffff;" alt="Logo" src="{{ $message->embed(public_path('images/electranerve.png')) }}" align="center" width="180" height="85"><span style="color:black;"> ElectraNerve</span>

          </td>
        </tr>
      </tbody>
    </table>
    <!-- End container for logo -->

    <!-- Hero image -->
    <img style="width: 600px; max-width: 600px; height: 350px; max-height: 350px; text-align: center;" alt="Hero image" src="{{ $message->embed(public_path('images/musicfestival.png')) }}" align="center" width="600" height="350">
    <!-- Hero image -->

    <!-- Start single column section -->
    <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #ffffff;" width="600">
      <tbody>
        <tr>
          <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 30px; padding-bottom: 40px;" width="596">

            <h1 style="font-size: 20px; line-height: 24px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 600; text-decoration: none; color: #000000;"><h1>{{ $currentMonth }} {{ $currentYear }} Week {{ $currentWeek }} Exclusive News</h1>

            <!-- Start button (You can change the background colour by the hex code below) -->
            <a href="{{ $url }}" target="_blank" style="background-color: #000000; font-size: 15px; line-height: 22px; font-family: 'Helvetica', Arial, sans-serif; font-weight: normal; text-decoration: none; padding: 12px 15px; color: #ffffff; border-radius: 5px; display: inline-block; mso-padding-alt: 0;">

              <span style="mso-text-raise: 15pt; color: #ffffff;">Login Now</span>
 
            </a>

          </td>
        </tr>
      </tbody>
    </table>

    @foreach($eventz as $event)

    @php
$now = now(); // Current date and time

if ($now < "{$event->event_earlybird_discount_end_date} {$event->event_earlybird_discount_end_time}") {
// Early bird discount is applicable
$discountedPrice = $event->event_ticket_price - ($event->event_ticket_price * $event->event_earlybird_discount / 100);
$formattedDiscountedPrice = number_format($discountedPrice, 2);
} else {
// Early bird discount has expired, use regular price
$formattedDiscountedPrice = number_format($event->event_ticket_price, 2);
}
@endphp
    <!-- Start image -->
    <img style="width: 600px; max-width: 600px; height: 240px; max-height: 240px; text-align: center; object-fit: cover;" alt="Image" src="{{ $message->embed(public_path("EventImage/{$event->event_image}")) }}" align="center" width="600" height="240">

    <!-- End image -->

    <!-- Start heading for double column section -->
    <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #ffffff;" width="600">
      <tbody>
        <tr>
          <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 30px; padding-bottom: 0;" width="596">

            <h1 style="font-size: 20px; line-height: 24px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 600; text-decoration: none; color: #000000; margin-bottom: 0;">{{ $event->event_name }} <b style="color:blue;">{{ $event->getgenre->genre }}</b></h1>

          </td>
        </tr>
      </tbody>
    </table>
    <!-- End heading for double column section -->

    <!-- Start double column section -->
    <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #ffffff;" width="600">
      <tbody>
        <tr>
          <td style="width: 252px; vertical-align: top; padding-left: 30px; padding-right: 15px; padding-top: 0; padding-bottom: 30px; text-align: center;" width="252">

            <p style="font-size: 15px; line-height: 24px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #919293;">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }} {{ \Carbon\Carbon::parse($event->event_date . ' ' . $event->event_time)->format('D, h.i A') }}
        
            <br>
            {{ $event->venue->venue_name }}
        <br>
        @if($now < "{$event->event_earlybird_discount_end_date} {$event->event_earlybird_discount_end_time}")
    <del style="color:red;">RM {{ number_format($event->event_ticket_price, 2) }}</del>
    RM {{ $formattedDiscountedPrice }}
    @else
    RM {{ number_format($event->event_ticket_price, 2) }}
    @endif
        </p>

          </td>
        </tr>
        <tr>

          <td style="width: 252px; vertical-align: top; padding-left: 15px; padding-right: 30px; padding-top: 0; padding-bottom: 30px; text-align: center;" width="252">
            <p style="font-size: 15px; line-height: 24px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #919293;">{{ $event->event_description }}</p>

          </td>
        </tr>
      </tbody>
    </table>
    <!-- End double column section -->

    @endforeach

  

    <!-- Start footer -->
    <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #000000;" width="600">
      <tbody>
        <tr>
          <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 30px; padding-bottom: 30px;" width="596">

            <!-- Your inverted logo is here -->
            <img style="width: 40px; max-width: 40px; height: 40px; max-height: 40px; text-align: center; color: #ffffff;" alt="Logo" src="{{ $message->embed(public_path('images/electranerve.png')) }}" align="center" width="180" height="85"><span style="color:white;"> ElectraNerve</span>

            <p style="font-size: 13px; line-height: 24px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #ffffff;">
              Malaysia
            </p>

            <p style="margin-bottom: 0; font-size: 13px; line-height: 24px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #ffffff;">
              <a target="_blank" style="text-decoration: underline; color: #ffffff;" href="{{$url}}">
                {{$url}}
              </a>
            </p>

          </td>
        </tr>
      </tbody>
    </table>
    <!-- End footer -->




  </div>

</body>

</html>