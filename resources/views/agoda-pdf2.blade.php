<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agoda PDF</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .left {
            float: left;
        }

        .right {
            float: right;
        }

        .clear {
            clear: both;
        }

        .container {
            border: 1px solid black;
            margin: 40px 40px;
            padding: 10px;
        }

        .red {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- header -->
        <div>
            <div class="left">
                <img src="{{$agodaImg}}" alt="" style="width: 50px; height: 50px" />
            </div>
            <div class="right">
                <h1 style="text-align: right; font-size: 16px">
                    Booking <span class="red">Confirmation</span>
                </h1>
                <p style="color: #232323; font-size: 8px">
                    Please present either an electronic or paper copy of
                    your booking confirmation upon check-in.
                </p>
            </div>
            <div class="clear"></div>
        </div>
        <!-- ash color aogda section -->
        <div class="" style="background-color: #d3d3d3;">
                <span style="font-size: 10px; color: white;margin-right:50px;margin-left:25px;">agoda</span>
                <span style="font-size: 10px; color: white;margin-right:50px;">agoda</span>
                <span style="font-size: 10px; color: white;margin-right:50px;">agoda</span>
                <span style="font-size: 10px; color: white;margin-right:50px;">agoda</span>
                <span style="font-size: 10px; color: white;margin-right:50px;">agoda</span>
                <span style="font-size: 10px; color: white;margin-right:50px;">agoda</span>
                <span style="font-size: 10px; color: white;margin-right:50px;">agoda</span>
                <span style="font-size: 10px; color: white;margin-right:50px;">agoda</span>
        </div>

        <div style="margin-top:15px;">
            <div class="left" style="padding-right: 20px; width:44%">
                <table style="padding-top: 10px;">
                    <tr>
                        <td class="red" style="font-size: 10px; padding: 3px 0px;">
                            Booking Id
                        </td>
                        <td>
                            <p style="font-size: 10px;">{{$agoda->booking_id}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="red" style="font-size: 10px; padding: 3px 0px;">
                            Booking Reference No
                        </td>
                        <td>
                            <p style="font-size: 10px;">{{$agoda->booking_reference_no}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="red" style="font-size: 10px;padding:3px 0px;">Client</td>
                        <td>
                            <p style="font-size: 10px;">{{$agoda->client}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="red" style="font-size: 10px;padding:3px 0px;">
                            Member Id
                        </td>
                        <td>
                            <p style="font-size: 10px;">{{$agoda->member_id}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="red" style="font-size: 10px;padding:3px 0px;">
                            Country Of Residence
                        </td>
                        <td>
                            <p style="font-size: 10px;">{{isset($countries[$agoda->country_of_residence]) ? $countries[$agoda->country_of_residence] : ''   }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="red" style="font-size: 10px;padding:3px 0px;">
                            Property
                        </td>
                        <td>
                            <div style="border: 2px solid #d3d3d3;text-align: center; font-size: 10px;padding: 1.5px 5px;">
                                {{$agoda->hotel->name}}
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="red" style="font-size: 10px;padding:3px 0px;">Addres</td>
                        <td>
                            <div
                                style="border: 2px solid #d3d3d3;text-align: center; font-size: 10px;padding: 1.5px 5px;">
                                {{ $agoda->hotel->city->name}},{{   $agoda->hotel->city->state->name}} , {{ $agoda->hotel->city->state->country->name }}
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="red" style="font-size: 10px; padding: 3px 0px;">
                            Property Contact Number
                        </td>
                        <td>
                            <div
                                style="border: 2px solid #d3d3d3;text-align: center; font-size: 10px;padding: 1.5px 5px;">
                                {{$agoda->property_contact_number}}</div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="right" style="background-color: #d3d3d3; width:44%;padding: 0px 20px;">
                <table style="padding: 10px;">
                    <tr>
                        <td class="red" style="font-size: 10px">Number of Rooms</td>
                        <td style="width: 150px;">
                            <div style="border: 2px solid white;text-align: center; font-size: 10px;padding: 2px 0px;"> {{$agoda->number_of_rooms}}
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="red" style="font-size: 10px">Number of Extra Beds</td>
                        <td>
                            <div style="border: 2px solid white;text-align: center; font-size: 10px;padding: 2px 0px;">{{$agoda->number_of_extra_beds}}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="red" style="font-size: 10px">Number of Adults</td>
                        <td>
                            <div style="border: 2px solid white;text-align: center; font-size: 10px;padding: 2px 0px;">{{$agoda->number_of_adults}}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="red" style="font-size: 10px">Number of Children</td>
                        <td>
                            <div style="border: 2px solid white;text-align: center; font-size: 10px;padding: 2px 0px;">{{$agoda->number_of_childern}}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="red" style="font-size: 10px">Room Type</td>
                        <td>
                            <div style="border: 2px solid white;text-align: center; font-size: 10px;padding: 2px 0px;">
                                {{$agoda->room_type}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="red" style="font-size: 10px">Promotion</td>
                        <td>
                            <div style="border: 2px solid white;text-align: center; font-size: 10px;padding: 2px 0px;">
                                {{$agoda->promotion}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="font-size: 10px;">For Full Promotion details and conditions see confirmation email
                            </p>
                        </td>
                    </tr>



                </table>
            </div>
            <div class="clear"></div>
        </div>

        <!-- paragraph section -->
        <div style="background-color: #d3d3d3; margin-top: 5px;padding: 3px 2px;">
            <p style="font-size: 10px;padding: 1px;">Cancellation Policy: Risk-free booking! You can cancel until {{ $checkInBefore7DaysMonth }} {{ $checkInBefore7DaysDate }},{{ $checkInBefore7DaysYear }} and pay nothing! Any cancellation received
                within 7 days prior to the arrival date will
                incur the first night's charge. Any cancellation received within 1 day prior to the arrival date will be
                charged for the
                entire stay. Failure to arrive at your hotel or
                property will be treated as a No-Show and will incur a charge of 100% of the booking value (Hotel
                policy).</p>
        </div>
        <div style="background-color: #d3d3d3; margin-top: 5px;padding: 3px 2px;">
            <p style="font-size: 10px;padding: 1px;">Benefits Included Coffee & tea, Express check-in, Free WiFi, Free
                fitness
                center access</p>
        </div>


        <div>
            <div style="border: 2px solid #d3d3d3; margin-top: 5px; padding: 2px 2px;">
                <div style="width:60%;" class="left">
                    <div style="margin-top: 3px;">
                        <table>
                            <tr>
                                <td class="red" style="font-size: 10px;">Arrival</td>
                                <td><input type="text" value="{{ $check_in_month }} {{ $check_in_date }},{{ $check_in_year }}" style="text-align: center;border:none;background-color:#d3d3d3;font-size:10px;"></td>
                                <td class="red" style="font-size: 10px;">Departure</td>
                                <td><input type="text" value="{{ $check_out_month }} {{ $check_out_date }}, {{ $check_out_year }}" style="text-align: center;border:none;background-color:#d3d3d3;font-size:10px;"></td>
                            </tr>
                        </table>

                    </div>
                    <div style="margin-top: 3px;">
                        <table>
                            <tr>
                                <td><input type="text" disabled value="Payment Method: Visa" style="text-align: center;border:none;background-color:#d3d3d3;font-size:10px;"></td>
                                <td><input type="text" disabled value="Card No:xxxx-xxxx-xxxx-8374" style="text-align: center;border:none;background-color:#d3d3d3;font-size:10px;width:200px;"></td>

                            </tr>
                        </table>
                    </div>
                    <div style="margin: 5px 3px;">
                        <p style="font-size: 10px;"> <b>Booked and Payble By</b> </p>
                    </div>
                    <div>
                        <div style="margin-left: 10px; padding-left: 3px; background-color: #d3d3d3;">
                            <p style="font-size: 10px;">Agoda Company Pte, Ltd.</p>
                            <p style="font-size: 10px;">30 Cecil Street, Prudential Tower #19-08,</p>
                            <p style="font-size: 10px;">Singapore 049712</p>
                        </div>
                    </div>

                </div>
                <div style="" class="left">
                    <img src="{{ $signature }}" alt="" style="width: 200px; margin-left: 20px;" >
                </div>
                <div class="clear"></div>
            </div>

        </div>

        <div style="margin-top: 5px">
            <p style="font-size:10px;"><b>Remarks:</b></p>
            <p style="font-size:10px;">Included: <b>Taxes and fees BDT {{$agoda->total_price}}</b></p>
            <p style="font-size:10px;">You chose a future price: payment by you in USD will be due on <span
                    class="red">Wednesday, July 24, 2024;</span> On that
                date, a USD amount will be calculated from <span class="red">{{$agoda->total_price}}</span> and charged to you,
                subject to <a href="#">these terms</a>
                affecting your price.</p>
            <p style="font-size:10px;"><span class="red">Guest List:</span> {{ $agoda->guest_name}} </p>
            <p style="font-size: 10px;"><b>All special requests are subject to availability upon arrival</b></p>
        </div>

        <div style="text-align: right;">
            <p style="font-size:10px;"><b>Call our Customer Service Center 24/7 :</b></p>
            <p style="font-size:10px;">Customer Support :</p>
            <p style="font-size:10px;">(Long distance charge may apply)</p>
        </div>

        <div class="" style="border: 2px solid #d3d3d3; padding: 5px; margin-top: 10px;">
            <p>Notes</p>
            <ul style="margin: 0; padding-left: 30px;">
                <li>
                    <p style="font-size: 10px;"><span class="red">Important</span>At check-in, you must present a
                        valid
                        photo ID with your address confirming the same name as the lead guest on the
                        booking. For
                        bookings paid with a credit card, you may also need to present the card used to make the
                        payment. Failure to do so may
                        result in the hotel
                        requesting additional payment or your reservation not being honored.</p>
                </li>

                <li>
                    <p style="font-size: 10px;">All rooms are guaranteed on the day of arrival. In the case of a
                        no-show, your room(s) will be released and you will be
                        subject to the terms and
                        conditions of the Cancellation/No-Show Policy specified at the time you made the booking as well
                        as noted in the
                        Confirmation Email.</p>
                </li>

                <li>
                    <p style="font-size: 10px;">The total price for this booking does not include mini-bar items,
                        telephone usage, laundry service, etc. The property
                        will bill you directly.</p>
                </li>

                <li>
                    <p style="font-size: 10px;">In cases where Breakfast is included with the room rate, please note
                        that certain properties may charge extra for
                        children travelling with their
                        parents. If applicable, the property will bill you directly. Upon arrival, if you have any
                        questions, please verify with
                        the property.</p>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>
