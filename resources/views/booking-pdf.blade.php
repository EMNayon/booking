<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>booking pdf</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            /* font-size: 10px; */
        }
        body {
            font-size: 10px;
        }

        .container {
            width: 90%;
            margin: 3% auto;
            padding: 10px;
            /* border: 1px solid red; */
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

        .navy-blue {
            color: rgb(9, 9, 243)
        }

        .sky-blue {
            color: rgb(16, 169, 230)
        }

        .w-68 {
            width: 68%;
        }

        .w-28 {
            width: 28%;
        }

        .red {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        {{-- heading section --}}
        <div>
            <div class="heaading w-68 left">
                <h1 style="font-size: 32px;" ><span class="navy-blue">Booking</span><span class="sky-blue">.com</span></h1>
            </div>
            <div class="w-28 right">
                <div>
                    <h2>Booking Confirmation</h2>
                    <p><span class="red">CONFIRMATION NUMBER:</span> <span
                            class="sky-blue" style="font-weight: bold;">{{ $booking->confirmation_number }}</span>
                    </p>
                    <p><span class="red">PIN CODE: </span><span class="sky-blue" style="font-weight: bold;">{{ $booking->pin_code }}</span></p>
                </div>
            </div>

            <div class="clear"></div>
        </div>

        <div style="background-color: #f8f4f4;padding:12px;border-top: 2px solid black; ">
            <div style="border-bottom: 1px solid gray; ">
                <div class="left" style="width:80px; height:80px; background-color:green; margin-right:5px; margin-bottom: 10px;">
                    <img src="{{$booking->hotel->hotel_image}}" alt="" width="80px" height="80px;">
                </div>
                <div class="left" style="margin-right:10px; margin-left:10px;  line-height: 1.6;">
                    <h3><span class="red"><b>{{ $booking->hotel->name }}</b> </span></h3>
                    <p><span class="red"><b>Address :</b></span>{{ $booking->hotel->state->name }},{{ $booking->hotel->state->country->name }}</p>
                    <p><span class="red"><b>Phone :</b> </span> <span>{{ $booking->phone }}</span> </p>
                    <p><span class="red"><b>GPS Coordinates : </b></span> <span>N {{ $booking->hotel->latitude }} , W {{ $booking->hotel->longitude }}</span></p>
                </div>
                <div class="left" style="border-right: 1px solid grey; margin-right:15px;padding-right:15px; border-left:1px solid grey; padding-left: 10px; text-align:center;">
                    <div>
                        <p class="red" style="font-size: 8px;">CHECK IN</p>
                        <h1 style="font-size: 24px;">{{ $check_in_date }}</h1>
                        <h3 class="red" style="font-weight: bold;">{{ $check_in_month }}</h3>
                        <p class="red"><i>{{ $check_in_day }}</i></p>
                        <p class="red"> from {{$check_in_time}}</p>
                    </div>
                </div>
                <div class="left" style="border-right: 1px solid grey; margin-right:15px;padding-right:15px; text-align:center;">
                    <div>
                        <p class="red" style="font-size: 8px;">CHECK OUT</p>
                        <h1 style="font-size: 24px;">{{ $check_out_date }}</h1>
                        <h3 class="red" style="font-weight: bold;">{{ $check_out_month }}</h3>
                        <p class="red"><i>{{ $check_out_day }}</i></p>
                        <p class="red"> until {{$check_out_time}}</p>
                    </div>
                </div>

                <div style="">
                    <div class="left" style="margin-right: 15px;">
                        <p class="red">ROOMS</p>
                        <h1 style="font-size: 24px;">{{ $booking->rooms }}/</h1>
                    </div>
                    <div class="left">
                        <p> <span class="red">NIGHT</span><span>S</span></p>
                        <h1 style="font-size: 24px;">{{ $booking->nights }}</h1>
                    </div>
                </div>
                <div class="clear"></div>
                {{-- <div class="left" style=" margin-right:15px;padding-right:15px;">

                </div> --}}
            </div>

            <div style="margin-top: 5px;">
                <h2 class="red">PRICE</h2>
                <div>
                    <div class="left">{{ $booking->rooms }} room</div>
                    <div class="right" style="color: gray;">{{ $country->currency_prefix }} {{ $booking->price }}</div>
                    <div class="clear"></div>
                </div>

                <div>
                    <h2 class="red left">Price</h2>
                    <h1 class="right" style="color: gray"><span class="red" style="font-size: 16px;">approx </span>{{ $country->currency_prefix }} {{ $booking->price }}</h1>
                    <div class="clear"></div>
                </div>

                <div>
                    <p class="left">(for 1 guest)</p>
                    <p class="right" style="color: gray;">{{$country->currency_prefix}} {{ $booking->price }}</p>
                    <p class="clear"></p>
                </div>
                <div>
                    <p>Additional charges</p>
                    <p>The price you see below is an approximate that may include fees based on the maximum occupancy.
                        This can include taxes set by local governments or
                        charges set by the property.</p>
                </div>
                <div>
                    <p class="red left">TaX ({{ $booking->tax * 100 }} %)</p>
                    <p class="right" style="color: gray;"><span style="color: black;">approx.</span> {{$country->currency_prefix}} {{ $booking->price }}</p>
                    <p class="clear"></p>
                </div>
                <div>
                    <p class="left">(taxes included)</p>
                    <p class="right" style="font-size: 14px; color:gray;">You'll pay {{$booking->total_price}} in {{$country->currency_prefix}}</p>
                    <p class="clear"></p>
                </div>

                <div class="">
                    <h2>The final price shown is the amount you'll pay to the property.</h2>
                </div>

                <div style="border-bottom:1px solid grey;">
                    <p style=" width: 50%; margin-bottom:5px;">Booking.com doesn't charge guests any reservation, administration, or other fees.
                        Your card issuer may charge you a foreign transaction fee.</p>
                </div>

                <div>
                    <h2>Payment Info</h2>
                </div>
                <div style="border-bottom:1px solid grey;">
                    <p style="margin-bottom: 5px;">
                        The Omni King Edward Hotel handles all payments. <br>
                        This property accepts the following forms of payment: American Express, Visa, Mastercard, Diners
                        Club, JCB, Discover, UnionPay credit card
                    </p>
                </div>

                <div>
                    <p style="font-size: 14px;">Currency & Exchange Rate Ino</p>
                </div>

                <div style="border-bottom:1px solid grey;">
                    <p style="margin-bottom: 5px;">You'll pay The Omni King Edward Hotel in {{ $country->currency_prefix }} according to the exchange rate on the day of
                        payment. <br>
                        The amount displayed in BDT is just an estimate based on <b>today's</b> exchange rate for {{ $country->currency_prefix }}.</p>
                </div>

                <div>
                    <h2>Additional Info</h2>
                </div>

                <div style="border-bottom:1px solid grey;">
                    <p style="margin-bottom: 5px;">
                        Note that additional supplements (e.g. an extra bed) aren't added in this total. <br>
                        If you cancel, applicable taxes may still be charged by the property. <br>
                        If you don’t show up for this booking, and you don’t cancel beforehand, the property is liable
                        to charge you the full reservation amount. <br>
                        Remember to read the <b>Important info</b> below – it could contain important details not mentioned
                        here.</p>
                </div>

                <div style="height:300px;width:100%;border-top:1px solid  black; border-bottom:1px solid black;">
                    <img src="{{$booking->hotel->google_map_image}}" alt="" width="690px" height="300px">
                    {{-- <img  src="data:image/png;base64,{{ $base64Image }}" alt=""> --}}
                </div>

                <div style="border-bottom: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black; margin-bottom: 5px;">
                    <div class="left" style="width: 65%; ">
                        <div style="border-right:1px solid black; margin-top:5px;">
                            <h2 class="red">Deluxe Room - {{ $booking->room_type }}</h2>
                        <p><span class="red"><b>Guest name : </b></span> {{ $booking->guest_name }} / for 3 aduts, 2
                            childred, up to 0 year
                        </p>
                        <p style="margin-bottom: 5px;"><span class="red"> <b>Meal Plan :</b> </span>No Meal is Included in this room rate</p>

                        <p style="padding-right: 15px; margin-bottom: 4px; ">Private Bathroom • View • Free toiletries • Bathrobe • Air conditioning • Safe • Streaming
                            service (like Netflix) •
                            Toilet • Bathtub or shower • Towels • Linens • Desk • Slippers • Refrigerator • Telephone •
                            Tea/Coffee maker •
                            Iron • Radio • Pay-per-view channels • Heating • Flat-screen TV • Hairdryer • Wake-up
                            service/Alarm clock •
                            Carpeted • Cable channels • Wake-up service • Alarm clock • Laptop safe • Wardrobe or closet
                            • Upper floors
                            accessible by elevator • Toilet paper</p>

                        <p style="margin-bottom: 5px;"><span class="red">Bed Size(s):</span> 1 king bed (181-210cm width)</p>
                        </div>
                    </div>


                    <div class="right" style="margin-top: 20px; width: 34%;">
                        <p><b>Prepayment</b> no prepayment is needed</p>

                        <p class="red"><b>Cancelation cost :</b></p>

                        <p style="font-size: 9px;">until December 12, 2023 11:59 PM [EST]: {{$country->currency_prefix}} 0</p>
                        <p style="font-size: 9px;">from December 13, 2023 12:00 AM [EST]: <span class="red">{{$country->currency_prefix}} 324.78 –</span></p>
                        <p class="red">
                            Changing the dates of your stay isn't possible.</p>
                    </div>
                    <div class="clear"></div>
                </div>


                <div style="">
                    <div class="left" style="width: 48%; padding-right: 15px;">
                        <h3>Important Information</h3>
                        <p>
                            Credit card is required at check in for incidentals at 150 {{ $country->currency_prefix }}. For Debit
                            Card paying customers, full room and tax plus 250 {{ $country->currency_prefix }} for standard
                            rooms and 500 CAD for suites will be obtained for security deposit at
                            check in.
                        </p>
                        <br>
                        <p>
                            Guests are required to show a photo ID and credit card upon check-in.
                            Please note that all Special Requests are subject to availability and
                            additional charges may apply.
                        </p>
                    </div>

                    <div class="right" style="width: 48%; margin-left: 15px;">
                        <h3>Hotel Policies</h3>
                        <p ><b>Guest parking</b></p>
                        <ul style="margin-left: 10px;">
                            <li> Public parking is possible on site (reservation is not needed) and
                                costs {{ $country->currency_prefix }} 60 per day.</li>

                            <li>
                                WiFi is available in the rooms and costs {{ $country->currency_prefix }} 14.95 per 24 hours.
                            </li>
                        </ul>


                    </div>
                    <div class="clear"></div>
                </div>


                <div  style=" border-top: 1px solid black;">
                    <div style="margin-top: 10px; width: 50%;">
                        <p><b>You can always view, change or cancel your booking online at:</b></p>
                        <p style="text-decoration: underline">your.booking.com</p>
                        <p>For any questions related to the property, you can contact The Omni
                            King Edward Hotel directly at: +1 416 863 9700</p>
                        <p>Or contact us by phone - we're available 24 hours a day:</p>
                        <p>When abroad or from Canada: +44 20 3320 2609
                            Looking for info about traveling safely? The safety resource center can
                            help you prepare for your trip and enjoy a safe, relaxing stay.</p>
                        <p class="sky-blue" style="text-decoration: underline">See safety resource center</p>
                        <p>We’ve gathered the most important local phone numbers to help give
                            you complete peace of mind during your stay in Canada.</p>
                        <p class="sky-blue" style="text-decoration: underline">See local emergency services</p>
                    </div>
                </div>

            </div>
        </div>



    </div>
</body>

</html>
