<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMP PDF</title>
   <style>
    *{
        margin: 0;
        padding: 0;
    }
    body {
        width: 21cm; /* Set width to match A4 width */
        margin: auto; /* Center the content horizontally */
        padding: 0.5cm; /* Add padding to keep content away from page edges */
        box-sizing: border-box;
        border: 1px solid grey; /* Include padding in the total width */
    }
    .header {
        text-align: center;
        padding-bottom: 4px;
    }

    .header h3{
        color: red;
        font-weight: 500;
        font-size: 15px;
    }
    .header img{
        height: 100px;
        width: auto;
    }
    .header h4{
    font-weight: bold;
    }

    .header-box p{
        border: 2px solid grey;
        padding: 3px;
    }

    .plicy-details{
        padding-top: 5px;
        width: 100%;
    }

    table, th, td {
        border:1px solid black;
        border-collapse: collapse;
        font-size: 12px;
      }
      .table-space{
        padding: 5px;
      }
      .table {
        width: 100%; /* Make the table full width */
        border-collapse: collapse; /* Collapse table borders */
    }

    .table td, .table th {
        padding: 4px; /* Add padding to table cells */
        border: 1px solid grey; /* Add border to table cells */
    }

    .table-space {
        padding: 2px;
        color: white;
        background-color: green; /* Add extra padding to the header row */
    }
    .table p{

        text-align: center;
    }
    .table p span{
        font-weight: bold;
    }

    .terms{
        padding-top: 5px;
    }
    .terms ol{
        margin-left: 30px;
        padding-top: 8px;
    }
    .italic {
        font-style: italic; /* Apply italic style */
    }
    .footer{
        text-align: center;
    }
    .footer img{
        height: 100px;
        width: auto;
    }
    .footer span{
        margin-right: 20px;
    }
   </style>
</head>

<body>
    <section style="font-size: 10px;">
        <div class="header">
            <h3>Policy of OMP Insurance</h3>
            {{-- <img src="./images/scc.png"> --}}
            <img src="{{ public_path('/') }}code/{{ $path }}" style="height: 100px; width: 100px; border:1px solid black;" />
            <p>Please scan the QR code to validate your policy and benefits</p>
            <h4>OVERSEAS MEDICLAIM IDENTIFICATION (B&H) SCHEDULE</h4>
        </div>
        <div class="header-box">
            <p >This Overseas Mediclaim Insurance is only available to Bangladeshi Citizens between 6 months and 79 years
                of age who are
                undertaking bonfide trips outside Bangladesh which will not involve any form of manual work and do not
                exceed 180 days in
                duration unless specifically extended.</p>
        </div>

        <div class="plicy-details">
            <table class="table">
                <tr>
                    <td colspan="6" class="table-space">Mercantile Islami Insurance PLC OMP Policy Details
                    </td>
                </tr>
                <tr >
                    <td colspan="" >Policy No.</td>
                    <td colspan="3">{{$member->policy_no}}</td>
                    <td>Issue Date</td>
                    <td>{{$member->issue_date}}</td>

                </tr>
                <tr>
                    <td>Plan Type</td>
                    <td colspan="5">{{$member->plan_type}}</td>

                </tr>
                <tr>
                    <td colspan="">Area of Travel</td>
                    <td colspan="5">{{$member->area_of_travel}}</td>
                </tr>

                <tr>
                    <td colspan="">No. of Dayes Covered</td>
                    <td colspan="5">{{$member->no_of_days_covered}}</td>
                </tr>

                <tr>
                    <td colspan="">Premium</td>
                    <td colspan="">BDT {{$member->premium}}</td>
                    <td>VAT</td>
                    <td>BDT {{$member->total_premium - $member->premium}}</td>
                    <td>Total Premium</td>
                    <td>BDT {{$member->total_premium}}</td>
                </tr>

                <tr>
                    <td colspan="">Money Receipt URL</td>
                    <td colspan="3">{{route('scan').'/'.$member->code}}</td>
                    <td>MR No.</td>
                    <td>{{$member->mr_no}}</td>

                </tr>
            </table>
        </div>


        <div class="plicy-details">
            <table class="table">
                <tr>
                    <td colspan="12" class="table-space">Insured Details
                    </td>
                </tr>



                <tr>
                    <td colspan="">Name</td>
                    <td colspan="5">{{$member->name}}</td>
                    <td colspan="">Mobile No.</td>
                    <td colspan="5">{{$member->mobile_no}}</td>

                </tr>

                <tr>
                    <td colspan="">Address</td>
                    <td colspan="11">{{$member->address}}</td>

                </tr>
                <tr>
                    <td>Age</td>
                    <td colspan="2">{{$member->age}} +</td>
                    <td>Date of Birth</td>
                    <td>{{$member->dob}}</td>
                    <td>Passport No.</td>
                    <td>{{$member->pass_no}}</td>
                    <td>Nationality</td>
                    <td colspan="4">{{$member->nationality}}</td>
                </tr>
            </table>
        </div>

        <div class="plicy-details">
            <table class="table">
                <tr>
                    <td colspan="12" class="table-space">Type of Benifites
                    </td>
                </tr>



                <tr>
                    <td colspan="">Emergency Medical Evaculation</td>
                    <td colspan="5">Included in accidental & Sickness Medical Reimbursement as per policy.</td>


                </tr>

                <tr>
                    <td colspan="">Limit of Liability for B&H</td>
                    <td colspan="11">USA and Canada USD 100,000.00 or EURO equivalent. <br />
                        Rest of the World USD 50,000.00 or EURO equivalent.<br />
                        For schengen counrty EURO 30,000.00.</td>

                </tr>

            </table>
        </div>

        <div class="plicy-details">
            <table class="table">
                <tr>
                    <td colspan="12" class="table-space">Emergency Assurance
                    </td>
                </tr>



                <tr>
                    <td>
                        <p>
                            <span> Claims Handling Agent of IMR</span> <br />
                            IntanaGlobal, <br />
                            TelNo.: +44 (0) 207 902 7405 <br />
                            E-mail: ops@intana-global.com
                        </p>
                    </td>
                </tr>


            </table>
        </div>

        <div class="terms">
            <h5 class="italic">Terms and Conditions Apply</h5>
            <ol>
                <li>
                    <p>Warranted that if any alteration/Modification/ Cancellation of this policy is needed the insured
                        must inform the insurer Mercantile Islami Insurance PLC in writing before his/her departure from
                        Bangladesh.</p>
                </li>
                <li>
                    <p>In the event of hospitalization, the insured Person or treating hospital is required to contact
                        the assigned Emergency Assistance within 24 hours of admission and the Insured Person or
                        treating hospital must receive an acknowledgment on the coverage.</p>
                </li>
            </ol>
        </div>

        <div class="footer">
            <img src="./images/logo.png">
            <h3>Mercantile Islami Insurance PLC</h3>
            <p>Address: Head Office, Red Crescent Bhaban 61, Motijheel C/A (1st Floor), Dhaka-1000, Bangladesh. <br/>
                Phone: +88-02-223387467, +88-02-223387662, +88-02-223387463 <br/>
                <span>Website: www.miiplc.com</span>
                Mail: info@miiplc.com <br/>
                Developed & Maintained By Confidence Software Limited</p>
        </div>
    </section>
</body>

</html>
