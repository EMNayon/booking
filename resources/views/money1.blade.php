<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Receipt PDF</title>
    <style>
        body {
            width: 21cm;
            /* Set width to match A4 width */
            margin: auto;
            /* Center the content horizontally */
            padding: 0.5cm;
            /* Add padding to keep content away from page edges */
            box-sizing: border-box;
            border: 1px solid grey;
            /* Include padding in the total width */
        }
        .container{
            font-size: 10px;
        }
        /* start */
        .company-name {
            display: flex;
            text-align: center;
            justify-content: center;
            line-height: 0;
        }

        .logo img {
            height: 70px;
            width: 70px;
        }

        .name .bangla-text {
            color: green;
            text-align: center;
        }
        
        .name .line2{
            font-size: 8px;
        }

        .line {

            text-decoration: underline;
            font-size: 14px;
        }


        /* end */
        .office-addres {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-size: 10px;
        }

        .bin {
            /* padding-top: 15px;
            padding-bottom: 5x; */

        }

        .money-receipt {
            line-height: 0.7;
            text-align: center;
        }

        .money-receipt .money-receipt-name {
            font-size: 14px;
        }

        .money-receipt-info {
            line-height: 0.5;
        }

        .money-receipt-info .span1 {
            margin-left: 60px;
        }

        .money-receipt-info .span2 {
            margin-left: 29px;
        }

        .money-receipt-info .span3 {
            margin-left: 32px;
        }

        .money-receipt-info .span5 {
            margin-right: 32px;
            font-weight: bolder;
            /* padding-bottom: 30px; */
        }

        .span6 {
            margin-right: 20px;
        }

        .money-receipt-info {
            display: flex;
            flex-direction: column;
            line-height: 0;
            padding: 0;
            margin: 0;

        }

        .class-insurance {
            display: flex;
            /* flex-direction: row;
            justify-content: space-between;
            padding-bottom: 20px; */
        }

        .class-insurance1 {
            display: flex;
            flex-direction: column;
            padding-top: 3px;
        }

        .class-insurance1, p {
            display: flex;
            align-items: center;
            margin-top: 0px;
        }

        .class-insurance1, .span6 {
            margin-right: 10px;
            /* Adjust spacing between span6 and underline */
        }


        .d {
            display: flex;
            justify-content: space-between;
        }

        .line3 {
            border-bottom: 1px solid black;
            flex: 1;
            /* Grow to fill remaining space */
            white-space: nowrap;
            /* Prevent line breaks */
            overflow: hidden;
            /* Hide overflow */
            text-overflow: ellipsis;
            /* Show ellipsis for overflow */
            width: 40vh;
        }

        .date {
            margin-right: 10px;
        }




        .line1 {
            border-bottom: 1px solid black;
            flex: 1;
            padding-top: 12px;
            margin-left: 12px;
            min-height: 1px;
            /* Ensure there's a minimum height for the border to be visible */
            width: 100%;
        }

        .drawn {
            display: flex;
            /* flex-wrap: nowrap;
            align-items: center; */
        }

        .line2 {
            border-bottom: 1px solid black;
            flex: 1;
            /* padding-top: px; */
            margin-left: 12px;
            min-height: 1px;
            /* Ensure there's a minimum height for the border to be visible */
            width: 100%;
        }

        /* table  */
        table {
            width: 40%;
            border: 1px solid black;
            /* Add border to the table */
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        .table-section {
            display: flex;
            justify-content: space-between;
            /* Align items with space between them */
            align-items: flex-start;
            padding-top: 40px;
        }

        .table {
            margin-right: 20px;
        }

        .table-section img {
            width: 100px;
            height: 100px;
            margin-right: 100px;
            padding-top: 20px;
        }

        .footer {
            text-align: center;
            padding-bottom: 5px;
        }

        .footer p {
            color: grey;
            line-height: 0;
        }

        .footer-receipt {
            background-color: rgb(175, 175, 175);
            padding: 5px;
        }

        .footer-note {
            color: red;
        }

        /* CSS for A4 size paper */
    </style>
</head>

<body>
    <section class="container" >
        <!--start logo and companye name -->
        <div class="company-name">
            {{-- <div class="logo">
                <img src="images/logo.png">
            </div> --}}
            <img src="{{ public_path('/') }}code/{{ $path }}" style="width: 20px;" />
            <div class="name">
                {{-- <h1 class="bangla-text">মার্কেন্টাইল ইসলামী ইন্স্যুরেন্স পিএলসি</h1> --}}
                <h1 class="line">Mercantile Islami Insurance PLC</h1>
                {{-- <p class="line"></p> --}}
                <p class="">ISLAMI SRIYAHA VITTIK PRICHALITO</p>
            </div>
            <!-- <img src="./images/logoText.png"> -->
        </div>
        <!--end logo and companye name -->

        <!--start companey addres  -->
        <p class="office-addres">Head Office: Red Crescent Bhaban 61, Motijheel C/A (1st Floor), Dhaka-1000, <br />
            Bangladesh. Phone: +88-02-223387467, +88-02-223387662, +88-02-223387463 <br /> Email: info@miiplc.com Web:
            www.miiplc.com</p>
        <!--end companey addres  -->

        <p class="bin">BIN : {{ $member->bin_no }}</p>

        <div class="money-receipt">
            <p class="money-receipt-name">MONEY RECEIPT</p>
            <p>MUSHAK : {{ $member->mushak }}</p>
        </div>



        <div class="money-receipt-info">
            <p>Issuing Office <span class="span1">:</span> {{ $member->issuing_office }}</p>
            <p>Money Receipt No <span class="span2">:</span> {{ $member->money_receipt_no }}</p>
            <div class="class-insurance">
                <p>Class of Insurance<span class="span3">:</span> {{ $member->class_of_insurance }}</p>
                <p>Date <span class="span4">:</span> {{ $member->issue_date }}</p>
            </div>
            <p> <span class="span5" >Received with thanks from</span> {{ $member->name }}, {{ $member->address }}</p>
        </div>




        <div class="class-insurance1">
            <p><span class="span6">The sum of </span> <span class="line2"> Tk. {{ $member->total_premium }} (Fifteen
                    Thousand Seven Hundred
                    Sixty Three taka)</span></p>

            <div class="d">
                <p><span class="span6">Mode of Payment </span> <span class="line3"> Pay Order: {{ $member->mode_of_payment }}</span></p>
                <p class="date-full"><span class="date">Dated </span> <span class="line">{{ $member->issue_date }}</span></p>
            </div>


            <div class="drawn">
                <span>Drawn on </span>
                <p class="line1">{{ $member->drawn_on }}</p>

            </div>
            <p> Issued against <span class="line2"> {{ $member->policy_no }}</span></p>
        </div>

        <!-- table  -->
        <div class="table-section">
            <table class="table">

                <tr>
                    <th>Premium</th>
                    <td>BDT</td>
                    <td>{{ $member->premium }}</td>
                </tr>
                <tr>
                    <th>VAT</th>
                    <td>BDT</td>
                    <td>{{ $member->total_premium - $member->premium }}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>BDT</td>
                    <td>{{ $member->total_premium }}</td>
                </tr>
            </table>

            {{-- <img src="./images/scc.png"> --}}
            <img src="{{ public_path('/') }}code/{{ $path }}" style="width: 100px;" />
        </div>

        <div class="footer">
            <p>This RECEIPT is computer generated, authorized signature is not required.</p>
            <div class="footer-receipt">Receipt valid subject to encashment of cheque/P.O./D.D.</div>
        </div>
        <span class="footer-note">* Note: If have any complain about Insurance, call 16130.</span>

    </section>
</body>

</html>
