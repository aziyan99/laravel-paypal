@extends('layouts.main')

@section('title', 'Payment - Subscription')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12"> @if(\Session::has('error'))
            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
            {{ \Session::forget('error') }}
            @endif
            @if(\Session::has('success'))
            <div class="alert alert-success">{{ \Session::get('success') }}</div>
            {{ \Session::forget('success') }}
            @endif
            @if(\Session::has('cancel'))
            <div class="alert alert-info">{{ \Session::get('cancel') }}</div>
            {{ \Session::forget('cancel') }}
            @endif
            <div class="card mt-2">
                <div class="card-header">
                    Order Summary #Invoice Number 0001
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-stripped table-hover">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>QTY</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ESP 32</td>
                                    <td>${{ number_format("6", 2, ",", ".") }}</td>
                                    <td>2</td>
                                    <td>${{ number_format(6*2, 2, ",", ".") }}</td>
                                </tr>
                                <tr>
                                    <td>ESP8266</td>
                                    <td>${{ number_format("3", 2, ",", ".") }}</td>
                                    <td>2</td>
                                    <td>${{ number_format(3*2, 2, ",", ".") }}</td>
                                </tr>
                                <tr>
                                    <td>Arduino Nano</td>
                                    <td>${{ number_format("4", 2, ",", ".") }}</td>
                                    <td>2</td>
                                    <td>${{ number_format(4*2, 2, ",", ".") }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end">Total Payment</td>
                                    <td>${{ number_format("26", 2, ",", ".") }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('payment.process') }}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-paypal me-2" viewBox="0 0 16 16">
                            <path
                                d="M14.06 3.713c.12-1.071-.093-1.832-.702-2.526C12.628.356 11.312 0 9.626 0H4.734a.7.7 0 0 0-.691.59L2.005 13.509a.42.42 0 0 0 .415.486h2.756l-.202 1.28a.628.628 0 0 0 .62.726H8.14c.429 0 .793-.31.862-.731l.025-.13.48-3.043.03-.164.001-.007a.351.351 0 0 1 .348-.297h.38c1.266 0 2.425-.256 3.345-.91.379-.27.712-.603.993-1.005a4.942 4.942 0 0 0 .88-2.195c.242-1.246.13-2.356-.57-3.154a2.687 2.687 0 0 0-.76-.59l-.094-.061ZM6.543 8.82a.695.695 0 0 1 .321-.079H8.3c2.82 0 5.027-1.144 5.672-4.456l.003-.016c.217.124.4.27.548.438.546.623.679 1.535.45 2.71-.272 1.397-.866 2.307-1.663 2.874-.802.57-1.842.815-3.043.815h-.38a.873.873 0 0 0-.863.734l-.03.164-.48 3.043-.024.13-.001.004a.352.352 0 0 1-.348.296H5.595a.106.106 0 0 1-.105-.123l.208-1.32.845-5.214Z" />
                        </svg>
                        Process with Paypal
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
