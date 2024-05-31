<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agoda Pdf</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-size:10px;
        }

        .container {
            width: 65%;
            padding: 2%;
            margin: 5% auto;
            border: 2px solid black;
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

        .red {
            color: red
        }

        .white {
            color: white;
        }

        .tiny-circle {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin: 0 2px;

            display: inline-block;
        }

        .red-bg {
            background-color: red;
        }

        .yellow-bg {
            background-color: yellow
        }

        .green-bg {
            background-color: green;
        }

        .purple-bg {
            background-color: purple
        }

        .skyblue-bg {
            background-color: skyblue;
        }

        .ash-bg {
            background-color: rgb(187, 182, 182)
        }

        .agoda {
            width: 15%;
            margin: 0 2.1%;

        }

        .w-40 {
            width: 40%;

        }

        .w-60 {
            max-width: 60%;

        }

        .w-50 {
            width: 46%;
        }

        .agoda-left {
            padding-right: 2%;
            padding-bottom: 2%;
            padding-top: 2%;
            margin-top: 1%;
            margin-bottom: 1%;
        }

        .agoda-right {
            padding-right: 2%;
            padding-bottom: 2%;
            padding-top: 2%;
            margin-top: 1%;
            margin-bottom: 1%;
        }

        .ash-border {
            border: 3px solid #c2bfbf;
            padding: 5px;
        }

        .w-custom-60 {
            width: 50%;
            border: 3px solid #c2bfbf;
            padding-left: 10px;
        }

        .w-custom2-60 {
            width: 50%;
            border: 3px solid white;
            padding-left: 10px;
        }

        .promotion-main {
            /* margin-left: 10px; */
            margin-top: 3px;
            margin-left: 22px;
            margin-bottom: 3px;

            padding-left: 10px;
            padding-top: 10px;
            padding-left: 68px;
            padding-bottom: 3px;
        }

        .promotion-left {
            padding-right: 2%;
            padding-bottom: 2%;
            padding-top: 2%;
            margin-top: 1%;
            margin-bottom: 1%;

        }

        .promotion-right {
            padding-right: 2%;
            padding-bottom: 2%;
            padding-top: 2%;
            margin-top: 1%;
            margin-bottom: 1%;
        }

        .ash-border {
            border: 2px solid rgb(187, 182, 182);
        }

        .w-75 {
            width: 75%;
        }
    </style>
</head>

<body>
    <div class="container">
        {{-- header --}}
        <div>
            <div class="left">agoda</div>
            <div class="right"><span>Booking</span> <span class="red">Confirmation</span></div>
            <div class="clear"></div>
        </div>

        {{-- colorful ball --}}
        <div>
            <div class="left">
                <div>
                    <div class="tiny-circle red-bg left"></div>
                    <div class="tiny-circle yellow-bg left"></div>
                    <div class="tiny-circle green-bg left"></div>
                    <div class="tiny-circle purple-bg left"></div>
                    <div class="tiny-circle skyblue-bg left"></div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="right">
                <p>Please Present either an eletronic or paper copy of your booking information upon check-in</p>
            </div>
            <div class="clear"></div>
        </div>


        {{-- agoda heading --}}

        <div>
            <div class="ash-bg">
                <span class="white agoda">agoda</span>
                <span class="white agoda">agoda</span>
                <span class="white agoda">agoda</span>
                <span class="white agoda">agoda</span>
                <span class="white agoda">agoda</span>
                <span class="white agoda">agoda</span>
                <span class="white agoda">agoda</span>
                <span class="white agoda">agoda</span>
                <span class="white agoda">agoda</span>
                <span class="white agoda">agoda</span>
                <span class="white agoda">agoda</span>
            </div>
        </div>

        {{-- input fields --}}
        <div>
            {{-- agoda booking info left --}}
            <div class="left w-50">
                <div>
                    <div class="left red w-40 agoda-left">Booking Id:</div>
                    <div class="left w-60 agoda-right">{{ $agoda->booking_id }}</div>
                    <div class="clear"></div>
                </div>

                <div>
                    <div class="left red w-40 agoda-left">Booking Reference No</div>
                    <div class="left w-60 agoda-right">{{ $agoda->booking_reference_no }}</div>
                    <div class="clear"></div>
                </div>

                <div>
                    <div class="left red w-40 agoda-left">Client</div>
                    <div class="left w-60 agoda-right">{{ $agoda->client }}</div>
                    <div class="clear"></div>
                </div>

                <div>
                    <div class="left red w-40 agoda-left">Member Id:</div>
                    <div class="left w-60 agoda-right">{{ $agoda->member_id }}</div>
                    <div class="clear"></div>
                </div>

                <div>
                    <div class="left red w-40 agoda-left">Country of Residence:</div>
                    <div class="left w-60 agoda-right">{{ $agoda->country_of_residence }}</div>
                    <div class="clear"></div>
                </div>


                <div>
                    <div class="left red w-40 agoda-left">Property</div>
                    <div class="left agoda-right w-custom-60 ">{{ $agoda->hotel->name }}</div>
                    <div class="clear"></div>
                </div>

                <div>
                    <div class="left red w-40 agoda-left">Address</div>
                    <div class="left  agoda-right w-custom-60">{{ $agoda->hotel->city->name}},{{   $agoda->hotel->city->state->name}} , {{ $agoda->hotel->city->state->country->name }}</div>
                    <div class="clear"></div>
                </div>


                <div>
                    <div class="left red w-40 agoda-left">Property Contact Number</div>
                    <div class="left agoda-right w-custom-60">{{ $agoda->property_contact_number }}</div>
                    <div class="clear"></div>
                </div>


            </div>

            {{-- promotion right --}}
            <div class="left w-50 ash-bg promotion-main">
                <div>
                    <div class="left red w-40 promotion-left">Number of Rooms:</div>
                    <div class="left w-custom2-60 promotion-right">{{ $agoda->number_of_rooms }}</div>
                    <div class="clear"></div>
                </div>

                <div>
                    <div class="left red w-40 promotion-left">Number of Extra Beds:</div>
                    <div class="left w-custom2-60  promotion-right">{{ $agoda->number_of_extra_beds }}</div>
                    <div class="clear"></div>
                </div>

                <div>
                    <div class="left red w-40 promotion-left">Number Of Adults:</div>
                    <div class="left w-custom2-60  promotion-right">{{ $agoda->number_of_adults }}</div>
                    <div class="clear"></div>
                </div>

                <div>
                    <div class="left red w-40 promotion-left">Number of Children:</div>
                    <div class="left w-custom2-60  promotion-right">{{ $agoda->number_of_childern }}</div>
                    <div class="clear"></div>
                </div>
                <div>
                    <div class="left red w-40 promotion-left">Room Type: </div>
                    <div class="left w-custom2-60  promotion-right">{{ $agoda->room_type }}</div>
                    <div class="clear"></div>
                </div>

                <div>
                    <div class="left red w-40 promotion-left">Promotion:</div>
                    <div class="left w-custom2-60  promotion-right">Long Stay Deal, Price includes {{ $agoda->promotion }} discount!
                    </div>
                    <div class="clear"></div>
                </div>
                <div style="margin-top: 16%;">
                    <p style="margin-top: 1%;">For Full Promotion details and conditins see confirmation eamil
                    </p>
                </div>

            </div>
            <div class="clear"></div>
        </div>

        {{-- cancelation policy --}}
        <div class="ash-bg">
            <p>Cancellation Policy: Risk-free booking! You can cancel until July 25, 2024 and pay nothing! Any
                cancellation received within 7 days prior to the arrival date will
                incur the first night's charge. Any cancellation received within 1 day prior to the arrival date
                will be charged for the entire stay. Failure to arrive at your hotel or
                property will be treated as a No-Show and will incur a charge of 100% of the booking value
                (Hotel policy).</p>
        </div>


        {{-- Benefits --}}
        <div class="ash-bg" style="margin-top: 10px;">
            <p>Benefits Included Coffee & tea, Express check-in, Free WiFi, Free fitness center access</p>
        </div>


        {{-- signature section --}}
        <div class="ash-border">
            {{-- arrival departure --}}
            <div class="left w-75" style="border:1px solid black;">
                <div>
                    {{-- arrival --}}
                    <div class="left w-50">
                        <div>
                            <div class="left red w-40 ">Arrival:</div>
                            <div class="left w-60 "><span class="red">{{ $check_in_month }} {{ $check_in_date }},{{ $check_in_year }}</span></div>
                            <div class="clear"></div>
                        </div>
                    </div>

                    {{-- departure --}}
                    <div class="left w-50">
                        <div>
                            <div class="left red w-40 "><span class="red">Departure:</span></div>
                            <div class="left w-60 ">{{ $check_out_month }} {{ $check_out_date }}, {{ $check_out_year }}</span></div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div>
                    <div class="left ash-bg">Payment Method: Visa</div>
                    <div class="left ash-bg">Card No: XXXX-XXXX-XXXX-7658</div>
                    <div class="clear"></div>
                </div>
                <div>
                    <p>Booked And Payble By</p>
                </div>
                <div>
                    <div class="ash-bg">
                        <p>Agoda Company Pte, Ltd.</p>
                        <p>30 Cecil Street, Prudential Tower #19-08,</p>
                        <p>Singapore 049712</p>
                    </div>
                </div>
            </div>
            <div class="right ">
                <div class="ash-border">
                    {{-- <img src="{{ asset('assets/image/agoda-signature.png') }}" alt=""
                        style="width:180px; padding: 10px"> --}}
                </div>
            </div>
            <div class="clear"></div>
        </div>

        {{-- REmarks --}}
        <div>
            <div>
                <p>Remarks:</p>
            </div>
            <div>
                <p>Included : Taxes and fees USD {{ $agoda->total_price }}</p>
            </div>
            <div>
                <p>You chose a future price: payment by you in USD will be due on Wednesday, July 24, 2024; On that</p>
            </div>
            <div>
                <p>date, a USD amount will be calculated from AUD {{ $agoda->total_price }} and charged to you, subject to these terms
                </p>
            </div>
            <div>
                <p>affecting your price.</p>
            </div>
            <div>
                <p>Guest List: MD AL AMIN</p>
            </div>
            <div>
                <p>All special requests are subject to availability upon arrival</p>
            </div>
        </div>

        {{-- customer service --}}
        <div>
            <div class="right">
                <p>Call our Customer Service Center 24/7 :</p>
                <p>Customer Support :</p>
                <p>(Long distance charge may apply)</p>
            </div>
            <div class="clear"></div>
        </div>

        {{-- notes --}}

        <div class="ash-border">
            <div >
                <p>Notes</p>
                <ul>
                    <li>
                        <p>IMPORTANT: At check-in, you must present a valid photo ID with your address confirming the
                            same name as the lead guest on the booking. For
                            bookings paid with a credit card, you may also need to present the card used to make the
                            payment. Failure to do so may result in the hotel
                            requesting additional payment or your reservation not being honored.</p>
                    </li>

                    <li>
                        <p>
                            IMPORTANT: At check-in, you must present a valid photo ID with your address confirming the
                            same name as the lead guest on the booking. For
                            bookings paid with a credit card, you may also need to present the card used to make the
                            payment. Failure to do so may result in the hotel
                            requesting additional payment or your reservation not being honored.
                        </p>
                    </li>


                    <li>
                        <p>
                            The total price for this booking does not include mini-bar items, telephone usage, laundry
                            service, etc. The property will bill you directly.
                        </p>
                    </li>

                    <li>
                        <p>In cases where Breakfast is included with the room rate, please note that certain properties
                            may charge extra for children travelling with their
                            parents. If applicable, the property will bill you directly. Upon arrival, if you have any
                            questions, please verify with the property.</p>
                    </li>


                </ul>
            </div>
        </div>
    </div>
</body>

</html>
