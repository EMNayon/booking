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
            font-size:10px;
        }

        .container {
            width: 70%;
            margin: 3% auto;
            padding: 10px;
            border: 1px solid red;
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
            color: navy
        }

        .sky-blue {
            color: skyblue
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
                <h1><span class="navy-blue">Booking</span><span class="sky-blue">.com</span></h1>
            </div>
            <div class="w-28 right">
                <div>
                    <p>Booking Confirmation</p>
                    <p><span class="red">Confiramtion Number:</span> <span class="sky-blue">42718.38473.38743</span>
                    </p>
                    <p><span class="red">Pin Code: </span><span class="sky-blue">2133</span></p>
                </div>
            </div>

            <div class="clear"></div>
        </div>

        <div style="background-color: #cbcbcb;padding:12px;">
            <div style="">
                <div class="left" style="width:120px; height:120px; background-color:green; margin-right:15px;">logo
                </div>
                <div class="left"
                    style="margin-right:10px; margin-left:10px; border-right:1px solid grey; padding-right: 10px;">
                    <p><span class="red"><b>The Omni King Edward Hotel</b> </span></p>
                    <p><span class="red">Address:</span> 37 King Street East, M5c 1E9 Toronto</p>
                    <p><span>Phone</span> <span>+83748378478378</span> </p>
                    <p><span class="red">GPS Coordinates</span> <span>N 043 34343, W 83748378</span></p>
                </div>
                <div class="left" style="border-right: 1px solid grey; margin-right:15px;padding-right:15px;">
                    <div>
                        <p class="red">CHECK IN</p>
                        <h1>15</h1>
                        <p class="red">DECEMBER</p>
                        <p class="red"><i>Friday</i></p>
                        <p class="red"> from 15.00</p>
                    </div>
                </div>
                <div class="left" style="border-right: 1px solid grey; margin-right:15px;padding-right:15px;">
                    <div>
                        <p class="red">CHECK OUT</p>
                        <h1>22</h1>
                        <p class="red">DECEMBER</p>
                        <p class="red"><i>Friday</i></p>
                        <p class="red"> until 12.00</p>
                    </div>
                </div>

                <div class="left" style="border-right: 1px solid grey; margin-right:15px;padding-right:15px;">
                    <div>
                        <p class="red">ROOMS</p>
                        <h1>1/</h1>
                    </div>
                </div>
                <div class="left" style=" margin-right:15px;padding-right:15px;">
                    <div>
                        <p> <span class="red">NIGTHT</span><span>S</span></p>
                        <p>7</p>
                    </div>
                </div>
                <div class="clear"></div>
            </div>

            <div>
                <h1 class="red">PRICE</h1>
                <div>
                    <div class="left">1 room</div>
                    <div class="right">BDT 74,222</div>
                    <div class="clear"></div>
                </div>

                <div>
                    <h1 class="red left">Price</h1>
                    <h1 class="right"><span class="red">approx</span>BDT 74,222</h1>
                    <div class="clear"></div>
                </div>

                <div>
                    <p class="left">(for 1 guest)</p>
                    <p class=right>CAD 90.343</p>
                    <p class="clear"></p>
                </div>
                <div>
                    <p>Additional charges</p>
                    <p>The price you see below is an approximate that may include fees based on the maximum occupancy.
                        This can include taxes set by local governments or
                        charges set by the property.</p>
                </div>
                <div>
                    <p class="red left">TaX (83483%)</p>
                    <p class="right">approx BDT88,343</p>
                    <p class="clear"></p>
                </div>
                <div>
                    <p class="left">(taxes included)</p>
                    <h1 class="right">You will pay 1078934.83483 in CAD</h1>
                    <p>right</p>
                </div>

                <div>
                    <h3>The final price shown is the amount you'll pay to the property.</h3>
                </div>

                <div style="border-bottom:1px solid grey;">
                    <p>Booking.com doesn't charge guests any reservation, administration, or other fees.
                        Your card issuer may charge you a foreign transaction fee.</p>
                </div>

                <div>
                    <h3>Payment Info</h3>
                </div>
                <div style="border-bottom:1px solid grey;">
                    <p>
                        The Omni King Edward Hotel handles all payments.
                        This property accepts the following forms of payment: American Express, Visa, Mastercard, Diners
                        Club, JCB, Discover, UnionPay credit card
                    </p>
                </div>

                <div>
                    <p>Currency & Exchange Rate Ino</p>
                </div>

                <div>
                    <p>You'll pay The Omni King Edward Hotel in CAD according to the exchange rate on the day of
                        payment.
                        The amount displayed in BDT is just an estimate based on today's exchange rate for CAD.</p>
                </div>

                <div>
                    <h1>Additional Info</h1>
                </div>

                <div style="border-bottom:1px solid grey;">
                    <p>Note that additional supplements (e.g. an extra bed) aren't added in this total.
                        If you cancel, applicable taxes may still be charged by the property.
                        If you don’t show up for this booking, and you don’t cancel beforehand, the property is liable
                        to charge you the full reservation amount.
                        Remember to read the Important info below – it could contain important details not mentioned
                        here.</p>
                </div>

                <div style="height:300px;width:100%;border-top:1px solid  black; border-bottom:1px solid black;"></div>

                <div>
                    <div class="left">
                        <p class="red">Deluxe Room - 1 King Bed</p>
                        <p><span class="red">Guest name:</span> Jahirul Islam / for 3 aduts, 2 childred, up to 0 year
                        </p>
                        <p><span class="red">No Meal is Included in this room rate</span></p>

                        <p>Private Bathroom • View • Free toiletries • Bathrobe • Air conditioning • Safe • Streaming
                            service (like Netflix) •
                            Toilet • Bathtub or shower • Towels • Linens • Desk • Slippers • Refrigerator • Telephone •
                            Tea/Coffee maker •
                            Iron • Radio • Pay-per-view channels • Heating • Flat-screen TV • Hairdryer • Wake-up
                            service/Alarm clock •
                            Carpeted • Cable channels • Wake-up service • Alarm clock • Laptop safe • Wardrobe or closet
                            • Upper floors
                            accessible by elevator • Toilet paper</p>

                        <p><span class="red">Bed Size(s):</span> 1king bed (181-210cm widt)</p>
                    </div>


                    <div class="right">
                        <p><b>payment</b> no payment is needed</p>

                        <p class="red">Cancelation cost</p>

                        <p>until December 12, 2023 11:59 PM [EST]: CAD 0</p>
                        <p>from December 13, 2023 12:00 AM [EST]:</p>
                        <p class="red">CAD 324.78 –
                            Changing the dates of your stay isn't possible.</p>
                    </div>
                    <div class="clear"></div>
                </div>


                <div>
                    <div class="left">
                        <h1>Important Notice</h1>
                        <p>
                            Credit card is required at check in for incidentals at 150 CAD. For Debit
                            Card paying customers, full room and tax plus 250 CAD for standard
                            rooms and 500 CAD for suites will be obtained for security deposit at
                            check in.
                        </p>
                        <p>
                            Guests are required to show a photo ID and credit card upon check-in.
                            Please note that all Special Requests are subject to availability and
                            additional charges may apply.
                        </p>
                    </div>

                    <div class="right">
                        <h1>Hotel Policies</h1>
                        <p>Guest parking</p>
                        <ul>
                            <li> Public parking is possible on site (reservation is not needed) and
                                costs CAD 60 per day.</li>

                            <li>
                                WiFi is available in the rooms and costs CAD 14.95 per 24 hours.
                            </li>
                        </ul>
                       

                    </div>
                    <div class="clear"></div>
                </div>


                <div>
                    <div>
                        <p>You can always view, change or cancel your booking online at:</p>
                        <p>your.booking.com</p>
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
