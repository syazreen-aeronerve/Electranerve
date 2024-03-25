<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="description" content="Gambolthemes">
    <meta name="author" content="Gambolthemes">		
    <title>ElectraNerve</title>
    
    
            <!-- Favicon Icon -->
            <link rel="icon" type="image/png" href="{{ asset('images/electranerve.png') }}">
    
    <!-- Stylesheets -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href='{{ asset("vendor/unicons-2.0.1/css/unicons.css") }}' rel='stylesheet'>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/night-mode.css') }}" rel="stylesheet">
    
    <!-- Vendor Stylesheets -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/OwlCarousel/assets/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/OwlCarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">			
    <style>
        @media print {
            @page {
                size: A4;
                margin: 0;
            }

            .download-link{
                display: none;
            }
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
<!-- Invoice Start-->
<div class="invoice clearfix">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-8 col-md-12">
                <div class="invoice-header justify-content-between">
                    <div class="invoice-header-logo">
                        <img  src="{{ asset('images/electranerve.png') }}"  style="width:40px; height:40px;" alt=""> <span style="color:white; font-weight:bolder; font-size:20px;"> ElectraNerve</span>
                    </div>
                    <div class="invoice-header-text">
							<a href="#" class="download-link" onclick="printPage()">Print</a>
						</div>
                </div>
                <div class="invoice-body">
                    <div class="invoice_dts">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="invoice_title">E-Ticket</h2>
                            </div>
                            <div class="col-md-6">
                                <div class="vhls140">
                                    <ul>
                                        <li><div class="vdt-list">Invoice to {{ $orders->first_name }} {{ $orders->last_name }}</div></li>
                                        <li><div class="vdt-list">{{ $orders->address }}</div></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="vhls140">
                                    <ul>
                                        <li><div class="vdt-list">Ticket ID : #{{ $orders->order_id }}</div></li>
                                        <li><div class="vdt-list">Purchase Date : {{ \Carbon\Carbon::parse($orders->created_at)->format('d M Y') }}</div></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-table bt_40">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Event Details</th>
                                        <th scope="col">Billcode</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Total Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>										
                                        <td>1</td>	
                                        <td>{{  $orders->events->event_name }}<br><b style="color:blue;">{{ $orders->events->getgenre->genre }}</b></td>	
                                        <td>{{ $orders->billcode }}</td>	
                                        <td>{{ $orders->quantity }}</td>
                                        <td>RM {{ $orders->total_price }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1"></td>
                                        <td colspan="5">
                                            <div class="user_dt_trans text-end pe-xl-4">
                                                <div class="totalinv2">Total Amount: RM {{ $orders->total_price }}</div>
                                                <p>Paid via FPX</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>									
                            </table>
                        </div>
                    </div>
                    <div class="invoice_footer">
                        <div class="cut-line">
                            <i class="fa-solid fa-scissors"></i>
                        </div>
                        <div class="main-card">
                            <div class="row g-0">
                                <div class="col-lg-7">
                                    <div class="event-order-dt p-4">
                                        <div class="event-thumbnail-img">
                                            <img src="EventImage/{{$orders->events->event_image}}" alt="">
                                        </div>
                                        <div class="event-order-dt-content">
                                            <h5>{{  $orders->events->event_name }}</h5>
                                            <span>{{ \Carbon\Carbon::parse($orders->events->event_date . ' ' . $orders->events->event_time)->format('D, M j, Y g:i A') }}. Duration {{  $orders->events->event_duration_hours }}h</span>
                                            <div class="buyer-name">{{  $orders->events->venue->venue_name }}</div>
                                            <div class="booking-total-tickets">
                                                <i class="fa-solid fa-ticket rotate-icon"></i>
                                                <span class="booking-count-tickets mx-2">{{  $orders->quantity }}</span>x Ticket
                                            </div>
                                            <div class="booking-total-grand">
                                                Total : <span>{{ $orders->total_price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="QR-dt p-4">
                                        <ul class="QR-counter-type">
                                            <li>Online</li>
                                            <li>Transaction Id</li>
                                            <li>{{ $orders->transaction_id }}</li>
                                        </ul>
                                        <div class="QR-scanner">
                                  {!! QrCode::size(150)->generate($orders->transaction_id) !!} 
                                        </div>
                                        <p>Powered by ElectraNerve</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cut-line">
                            <i class="fa-solid fa-scissors"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function printPage() {
        window.print();
    }
</script>
</body>
</html>