<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
okay
</body>
</html>
{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            width: 21cm; /* Set width to match A4 width */
            margin: auto; /* Center the content horizontally */
            padding: 0.5cm; /* Add padding to keep content away from page edges */
            box-sizing: border-box;
            border: 1px solid grey;
             /* Include padding in the total width */
        }

        /* start */
        .company-name{
            display: flex;
            text-align: center;
            justify-content: center;
            line-height: 0;
        }
        .logo img{
            height: 70px;
            width: 70px;
        }

        .name .bangla-text{

            color: green;
            text-align: center;
        }
        .line {

            text-decoration: underline;
        }


        /* end */
        .office-addres {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-size: 20px;
        }

        .bin{
            padding-top: 15px;
            padding-bottom: 5x;

        }

        .money-receipt{
            line-height: 0.7;
            text-align: center;
        }
        .money-receipt .money-receipt-name{
            font-size: 20px;
        }
        .money-receipt-info{
            line-height: 0.5;
        }
        .money-receipt-info .span1{
            margin-left: 60px;
        }
        .money-receipt-info .span2{
            margin-left: 29px;
        }
        .money-receipt-info .span3{
            margin-left: 32px;
        }

        .money-receipt-info .span5{
            margin-right: 32px;
            font-weight:600;
            /* padding-bottom: 30px; */
        }

        .span6{
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
            flex-direction: row;
            justify-content: space-between;
            padding-bottom: 20px;
        }
        .class-insurance1 {
            display: flex;
            flex-direction: column;
            padding-top: 3px;
        }

        .class-insurance1 p {
            display: flex;
            align-items: center;
            margin-top: 0px;
        }

        .class-insurance1 .span6 {
            margin-right: 10px; /* Adjust spacing between span6 and underline */
        }


        .d {
            display: flex;
            justify-content: space-between;
        }

        .line3 {
            border-bottom: 1px solid gray;
            flex: 1; /* Grow to fill remaining space */
            white-space: nowrap; /* Prevent line breaks */
            overflow: hidden; /* Hide overflow */
            text-overflow: ellipsis; /* Show ellipsis for overflow */
            width: 40vh;
        }

        .date{
            margin-right: 10px;
        }




        .line1{
            border-bottom: 1px solid gray;
            flex: 1;
            padding-top: 12px;
            margin-left: 12px;
            min-height: 1px; /* Ensure there's a minimum height for the border to be visible */
            width: 100%;
        }

        .drawn{
            display: flex;
            flex-wrap: nowrap;
            align-items: center;
        }

        .line2{
            border-bottom: 1px solid gray;
            flex: 1;
            /* padding-top: px; */
            margin-left: 12px;
            min-height: 1px; /* Ensure there's a minimum height for the border to be visible */
            width: 100%;
        }

        /* table  */
        table {
            width: 40%;
            border: 1px solid black; /* Add border to the table */
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        .table-section {
            display: flex;
            justify-content: space-between; /* Align items with space between them */
            align-items: flex-start;
            padding-top: 40px;
        }

        .table {
            margin-right: 20px;
        }

        .table-section img {
            height: 200px;
            width: auto;
            margin-right: 100px;
            padding-top: 20px;
        }

        .footer{
            text-align: center;
            padding-bottom: 5px;
        }
        .footer p{
            color: grey;
            line-height: 0;
        }
        .footer-receipt{
            background-color: rgb(175, 175, 175);
            padding: 5px;
        }
        .footer-note{
            color: red;
        }

        /* CSS for A4 size paper */

    </style>
</head>

<body>
    <section class="container">
        <!--start logo and companye name -->
        <div class="company-name">
            <div class="logo">
                <img src="images/logo.png">
            </div>
            <div class="name">
                <h1 class="bangla-text">মার্কেন্টাইল ইসলামী ইন্স্যুরেন্স পিএলসি</h1>
                <h1 class="line">Mercantile Islami Insurance PLC</h1>
                <p class="line"></p>
                <p>ISLAMI SRIYAHA VITTIK PRICHALITO</p>
            </div>
            <!-- <img src="./images/logoText.png"> -->
        </div>
        <!--end logo and companye name -->

        <!--start companey addres  -->
        <p class="office-addres">Head Office: Red Crescent Bhaban 61, Motijheel C/A (1st Floor), Dhaka-1000, <br />
            Bangladesh. Phone: +88-02-223387467, +88-02-223387662, +88-02-223387463 <br /> Email: info@miiplc.com Web:
            www.miiplc.com</p>
        <!--end companey addres  -->

        <p class="bin">BIN : 000419221-0202</p>

        <div class="money-receipt">
            <p class="money-receipt-name">MONEY RECEIPT</p>
            <p>MUSHAK : 6.3</p>
        </div>



        <div class="money-receipt-info">
            <p>Issuing Office <span class="span1">:</span> Moghbazar Branch</p>
            <p>Money Receipt No <span class="span2">:</span> MGB-2023-443</p>
            <div class="class-insurance">
                <p>Class of Insurance <span class="span3">:</span> Miscellaneous</p>
                <p>Date <span class="span4">:</span> 10-09-2023</p>
            </div>
            <p> <span class="span5">Received with thanks from</span> ISLAM UDDIN, BAYAMPUR, KANAIGHAT, KANAIGHAT,
                SYLHET.</p>
        </div>




        <div class="class-insurance1">
            <p><span class="span6">The sum of</span> <span class="line2">Tk. 15,763.00 (Fifteen Thousand Seven Hundred
                    Sixty Three taka)</span></p>

                    <div class="d">
                        <p><span class="span6">Mode of Payment </span> <span class="line3">Pay Order; 2997049</span></p>
                        <p class="date-full"><span class="date">Dated</span> <span class="line">10-09-2023</span></p>
                    </div>


            <div class="drawn">
                <p>Drawn on </p>
                <p class="line1"></p>

            </div>
            <p> Issued against<span class="line2">MIIPLC/MGB/OMP-00108/09/2023( B&H )</span></p>
        </div>

        <!-- table  -->
        <div class="table-section">
            <table class="table">

                <tr>
                    <td>Premium</td>
                    <td>BDT</td>
                    <td>13,707.00</td>
                </tr>
                <tr>
                    <td>VAT</td>
                    <td>BDT</td>
                    <td>2,056.00</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>BDT</td>
                    <td>2,056.00</td>
                </tr>
            </table>

            <img src="./images/scc.png">
        </div>

        <div class="footer">
            <p>This RECEIPT is computer generated, authorized signature is not required.</p>
            <div class="footer-receipt">Receipt valid subject to encashment of cheque/P.O./D.D.</div>
        </div>
        <span class="footer-note">* Note: If have any complain about Insurance, call 16130.</span>

    </section>
</body>

</html> --}}
