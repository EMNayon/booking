<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>file_1665229590041</title>
    <meta name="author" content="CM1" />
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            text-indent: 0;
        }

        .s1 {
            color: black;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 10pt;
        }

        h1 {
            color: #CA1F25;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 18.5pt;
        }

        .s2 {
            color: #333;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 8pt;
        }

        .s3 {
            color: #FFF;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 8pt;
        }

        .s4 {
            color: #CA1F25;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 8pt;
        }

        .s5 {
            color: #333;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: medium;
            text-decoration: none;
            font-size: 8.5pt;
        }

        .s6 {
            color: #303030;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 7.5pt;
        }

        h2 {
            color: #FFF;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 8.5pt;
        }

        h3 {
            color: #333;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 7.5pt;
        }

        .s7 {
            color: #333;
            font-family: Arial, sans-serif;
            font-style: italic;
            font-weight: normal;
            text-decoration: none;
            font-size: 7.5pt;
        }

        h4 {
            color: #333;
            font-family: Arial, sans-serif;
            font-style: italic;
            font-weight: bold;
            text-decoration: none;
            font-size: 6pt;
        }

        p {
            color: #333;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 5.5pt;
            margin: 0pt;
        }

        .s8 {
            color: #333;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 6.5pt;
        }

        .s9 {
            color: #333;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 8.5pt;
        }

        .s10 {
            color: #CA1F25;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 7.5pt;
        }

        .s11 {
            color: #E01E25;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 8pt;
        }

        .s12 {
            color: #333;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 7.5pt;
        }

        .s13 {
            color: #333;
            font-family: Arial, sans-serif;
            font-style: italic;
            font-weight: normal;
            text-decoration: none;
            font-size: 6.5pt;
        }

        li {
            display: block;
        }

        #l1 {
            padding-left: 0pt;
            counter-reset: c1 1;
        }

        #l1>li>*:first-child:before {
            counter-increment: c1;
            content: counter(c1, decimal)". ";
            color: #333;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 5.5pt;
        }

        #l1>li:first-child>*:first-child:before {
            counter-increment: c1 0;
        }

        table,
        tbody {
            vertical-align: top;
            overflow: visible;
        }

        .column {
            float: left;
            width: 50%;
        }

        .column-1-3 {
            float: left;
            width: 20pt;
        }

        .column-2-3 {
            float: left;
            width: 30pt;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        ol#l1 {
            list-style: none;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>

    <div class="row">
        <div class="column"><img width="240" height="76"
                src="{{ asset('assets/image/TravelPdfImage/travel_logo.png') }}" />
        </div>
        <div class="column"><img style="float: right;margin-top: 18px;display: block;" width="82" height="33"
                src="{{ asset('assets/image/TravelPdfImage/qic_logo.png') }}" />
        </div>
    </div>

    <div style="border: 2px solid #B3B3B3;padding: 7pt;margin: 10pt;">

        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <h1 style="padding-top: 11pt;text-indent: 0pt;text-align: center;">Certificate of Insurance</h1>
        <img style="margin-left: 44%;display: block;" width="85" height="85"
            src="{{ public_path('/') }}code/{{ $path }}" />
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p class="s2" style="text-indent: 0pt;text-align: center;">Please scan the QR code to
            validate your policy and benefits</p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <table style="border-collapse:collapse;width:460pt" cellspacing="0">
            <tr style="height:18pt">
                <td style="width:439pt" colspan="6" bgcolor="#CA1F25">
                    <p class="s3" style="padding-top: 4pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">Tune
                        Protect Travel Visit Assurance</p>
                </td>
            </tr>
            <tr style="height:18pt">
                <td style="width:74pt;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p class="s4" style="padding-top: 4pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                        Policy
                        No.</p>
                </td>
                <td style="width:154pt;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF;border-right-style:solid;border-right-width:2pt;border-right-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p class="s5" style="padding-top: 4pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                        {{ $member->certificate_no }}</p>
                </td>
                <td style="width:68pt;border-left-style:solid;border-left-width:2pt;border-left-color:#FFFFFF;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p class="s4" style="padding-top: 4pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                        Issue
                        Date</p>
                </td>
                <td style="width:66pt;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p class="s5" style="padding-top: 4pt;padding-left: 14pt;text-indent: 0pt;text-align: left;">
                        {{ $member->effective_date }}</p>
                </td>
                <td style="width:24pt;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p style="text-indent: 0pt;text-align: left;"><br /></p>
                </td>
                <td style="width:53pt;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p style="text-indent: 0pt;text-align: left;"><br /></p>
                </td>
            </tr>
            <tr style="height:17pt">
                <td style="width:74pt;border-top-style:solid;border-top-width:2pt;border-top-color:#FFFFFF;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p class="s4" style="padding-top: 3pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">Area
                        of
                        Travel</p>
                </td>
                <td style="width:154pt;border-top-style:solid;border-top-width:2pt;border-top-color:#FFFFFF;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF;border-right-style:solid;border-right-width:2pt;border-right-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p class="s5" style="padding-top: 3pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                        {{ $member->destination }}
                    </p>
                </td>
                <td style="width:68pt;border-top-style:solid;border-top-width:2pt;border-top-color:#FFFFFF;border-left-style:solid;border-left-width:2pt;border-left-color:#FFFFFF;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p class="s4" style="padding-top: 3pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">Plan
                        Type</p>
                </td>
                <td style="width:66pt;border-top-style:solid;border-top-width:2pt;border-top-color:#FFFFFF;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p class="s5" style="padding-top: 3pt;padding-left: 14pt;text-indent: 0pt;text-align: left;">
                        Inbound, Gold</p>
                </td>
                <td style="width:24pt;border-top-style:solid;border-top-width:2pt;border-top-color:#FFFFFF;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p class="s5" style="padding-top: 3pt;text-indent: 0pt;text-align: left;">(Covid</p>
                </td>
                <td style="width:53pt;border-top-style:solid;border-top-width:2pt;border-top-color:#FFFFFF;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p class="s5" style="padding-top: 3pt;text-indent: 0pt;text-align: left;">Plus)</p>
                </td>
            </tr>
            <tr style="height:17pt">
                <td style="width:74pt;border-top-style:solid;border-top-width:2pt;border-top-color:#FFFFFF;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p class="s4" style="padding-top: 3pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                        Departure Date</p>
                </td>
                <td style="width:154pt;border-top-style:solid;border-top-width:2pt;border-top-color:#FFFFFF;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF;border-right-style:solid;border-right-width:2pt;border-right-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p class="s5" style="padding-top: 3pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                        2021-11-29</p>
                </td>
                <td style="width:68pt;border-top-style:solid;border-top-width:2pt;border-top-color:#FFFFFF;border-left-style:solid;border-left-width:2pt;border-left-color:#FFFFFF;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p class="s4" style="padding-top: 3pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                        Return
                        Date</p>
                </td>
                <td style="width:66pt;border-top-style:solid;border-top-width:2pt;border-top-color:#FFFFFF;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p class="s5" style="padding-top: 3pt;padding-left: 14pt;text-indent: 0pt;text-align: left;">
                        {{ date('d-m-Y', strtotime($member->effective_date . ' +30 days')) }}</p>
                </td>
                <td style="width:24pt;border-top-style:solid;border-top-width:2pt;border-top-color:#FFFFFF;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p style="text-indent: 0pt;text-align: left;"><br /></p>
                </td>
                <td style="width:53pt;border-top-style:solid;border-top-width:2pt;border-top-color:#FFFFFF;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p style="text-indent: 0pt;text-align: left;"><br /></p>
                </td>
            </tr>
            <tr style="height:18pt">
                <td style="width:74pt;border-top-style:solid;border-top-width:2pt;border-top-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p class="s4" style="padding-top: 3pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                        Validity</p>
                </td>
                <td style="width:154pt;border-top-style:solid;border-top-width:2pt;border-top-color:#FFFFFF;border-right-style:solid;border-right-width:2pt;border-right-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p class="s5" style="padding-top: 3pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">30
                        Day(s) (Return)</p>
                </td>
                <td style="width:68pt;border-top-style:solid;border-top-width:2pt;border-top-color:#FFFFFF;border-left-style:solid;border-left-width:2pt;border-left-color:#FFFFFF;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p class="s4" style="padding-top: 3pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                        Passport</p>
                </td>
                <td style="width:66pt;border-top-style:solid;border-top-width:2pt;border-top-color:#FFFFFF;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p class="s5" style="padding-top: 3pt;padding-left: 14pt;text-indent: 0pt;text-align: left;">
                        {{ $member->passport }}</p>
                </td>
                <td style="width:24pt;border-top-style:solid;border-top-width:2pt;border-top-color:#FFFFFF;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p style="text-indent: 0pt;text-align: left;"><br /></p>
                </td>
                <td style="width:53pt;border-top-style:solid;border-top-width:2pt;border-top-color:#FFFFFF;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#FFFFFF"
                    bgcolor="#F1F1F1">
                    <p style="text-indent: 0pt;text-align: left;"><br /></p>
                </td>
            </tr>
        </table>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <table style="border-collapse:collapse;width:460pt" cellspacing="0">
            <tr style="height:18pt">
                <td style="width:28pt" bgcolor="#CA1F25">
                    <p class="s3" style="padding-top: 4pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                        No.
                    </p>
                </td>
                <td style="width:151pt" bgcolor="#CA1F25">
                    <p class="s3" style="padding-top: 4pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                        Insured Name</p>
                </td>
                <td style="width:126pt" bgcolor="#CA1F25">
                    <p class="s3" style="padding-top: 4pt;padding-right: 8pt;text-indent: 0pt;text-align: right;">
                        Gender</p>
                </td>
                <td style="width:69pt" bgcolor="#CA1F25">
                    <p class="s3" style="padding-top: 4pt;padding-left: 8pt;text-indent: 0pt;text-align: left;">
                        DOB
                    </p>
                </td>
                <td style="width:61pt" bgcolor="#CA1F25">
                    <p class="s3" style="padding-top: 4pt;padding-right: 7pt;text-indent: 0pt;text-align: right;">
                        Nationality</p>
                </td>
            </tr>
            <tr style="height:17pt">
                <td style="width:28pt;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#CA1F25">
                    <p class="s6" style="padding-top: 3pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">1
                    </p>
                </td>
                <td style="width:151pt;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#CA1F25">
                    <p class="s6" style="padding-top: 3pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                        {{ $member->name }}</p>
                </td>
                <td style="width:126pt;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#CA1F25">
                    <p class="s6"
                        style="padding-top: 3pt;padding-right: 10pt;text-indent: 0pt;text-align: right;">
                        {{ strtoupper($member->gender) }}</p>
                </td>
                <td style="width:69pt;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#CA1F25">
                    <p class="s6" style="padding-top: 3pt;padding-left: 17pt;text-indent: 0pt;text-align: left;">
                        {{ $member->dob }}</p>
                </td>
                <td style="width:61pt;border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#CA1F25">
                    <p class="s6" style="padding-top: 3pt;padding-right: 7pt;text-indent: 0pt;text-align: right;">
                        {{ $member->nationality }}</p>
                </td>
            </tr>
        </table>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>

        <table style="border-collapse:collapse;width:460pt" cellspacing="0">
            <thead>
                <tr style="height:18pt">
                    <td style="width:470pt" colspan="6" bgcolor="#CA1F25">
                        <p class="s3"
                            style="padding-top: 4pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                            Type
                            of Benefits</p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr style="height:17pt">
                    <td
                        style="border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#CA1F25;text-align: center;">
                        <img width="34" height="35"
                            src="{{ asset('assets/image/TravelPdfImage/helicopter_icon.png') }}" />
                    </td>
                    <td style="border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#CA1F25">
                        <p style="text-indent: 0pt;text-align: left;" />
                        <h3 style="text-indent: 0pt;line-height: 109%;text-align: left;">Emergency
                            Medical
                            Evacuation
                        </h3>
                        <p class="s7" style="text-indent: 0pt;line-height: 9pt;text-align: left;">Up to
                            USD 5,000
                        </p>
                    </td>
                    <td
                        style="border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#CA1F25;text-align: center;">
                        <img width="35" height="35"
                            src="{{ asset('assets/image/TravelPdfImage/file_icon.png') }}" />

                    </td>
                    <td style="border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#CA1F25">
                        <p style="text-indent: 0pt;text-align: left;" />
                        <h3 style="text-indent: 0pt;line-height: 109%;text-align: left;">Accidental &amp;
                            Sickness
                            Medical Reimbursement
                        </h3>
                        <p class="s7" style="text-indent: 0pt;line-height: 9pt;text-align: left;">Up to USD 15,000
                        </p>
                    </td>
                    <td
                        style="border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#CA1F25;text-align: center;">
                        <img width="34" height="35"
                            src="{{ asset('assets/image/TravelPdfImage/home_icon.png') }}" />
                    </td>
                    <td style="border-bottom-style:solid;border-bottom-width:2pt;border-bottom-color:#CA1F25">
                        <h3 style="text-indent: 0pt;line-height: 109%;text-align: left;">
                            Repatriation of
                            Mortal Remains
                        </h3>
                        <p class="s7" style="text-indent: 0pt;line-height: 9pt;text-align: left;">Up to
                            USD 5,000
                        </p>

                    </td>
                </tr>
            </tbody>
        </table>

        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <h4 style="padding-top: 4pt;padding-left: 18pt;text-indent: 0pt;text-align: left;">Terms and conditions apply
        </h4>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <ol style="width: 460pt;" id="l1">
            <li data-list-text="1.">
                <p style="padding-left: 43pt;text-indent: -13pt;text-align: left;">1. Tune Protect Travel Visit
                    Assurance
                    shall not be subject to assignment, change, upgrade and/or refund.</p>
            </li>
            <li data-list-text="2.">
                <p style="padding-top: 1pt;padding-left: 43pt;text-indent: -13pt;text-align: left;">2. Inbound coverage
                    starts
                    upon arrival into country of destination.</p>
            </li>
            <li data-list-text="3.">
                <p style="padding-top: 1pt;padding-left: 43pt;text-indent: -13pt;line-height: 118%;text-align: left;">
                    3.
                    For
                    Covid-19 related claims, up to 50% sublimit for accidental and medical reimbursement limit with an
                    excess fee of USD 100. 5% Excess is applicable for all sections except Section 2A.</p>
            </li>
            <li data-list-text="4.">
                <p style="padding-left: 43pt;text-indent: -13pt;line-height: 118%;text-align: left;">4. In the event of
                    hospitalization, the Covered Person or treating hospital is required to contact the assigned
                    Emergency
                    Assistance within 24 hours of admission and the Insured Person or treating hospital must receive an
                    acknowledgement on the coverage.</p>
            </li>
            <li data-list-text="5.">
                <p style="padding-left: 43pt;text-indent: -13pt;line-height: 6pt;text-align: left;">5. Pre-existing
                    medical
                    conditions are excluded as stated in the General Exclusions Section of the Policy Wording.</p>
            </li>
            <li data-list-text="6.">
                <p style="padding-left: 43pt;text-indent: -13pt;text-align: left;">6. The Insured/ Claimant will need
                    to
                    submit the claim within thirty (30) days from the incident.</p>
            </li>
            <li data-list-text="7.">
                <p style="padding-top: 1pt;padding-left: 43pt;text-indent: -13pt;line-height: 118%;text-align: left;">
                    7.
                    For
                    Medical Claims, original document is mandatory for claim evaluation, failing to submit will result
                    in
                    rejection of claim. The Insured/ Claimant has maximum of ninety (90) Days to submit all supporting
                    documents of the incident after submission of claim request.</p>
            </li>
            <li data-list-text="8.">
                <p style="padding-left: 43pt;text-indent: -13pt;line-height: 6pt;text-align: left;">8. The Insured
                    Person
                    is
                    required to pay Excess of USD 100.00 and only applicable for Accidental &amp; Sickness Medical
                    Reimbursement.</p>
            </li>
            <li data-list-text="9.">
                <p style="padding-top: 1pt;padding-left: 43pt;text-indent: -13pt;text-align: left;">9. Only for Omani
                    Nationals or Residents of Oman returning to Oman would be covered for a maximum period of 30 days
                    for
                    Covid-19 benefits only.</p>
            </li>
            <li data-list-text="10.">
                <p style="padding-top: 1pt;padding-left: 43pt;text-indent: -16pt;line-height: 118%;text-align: left;">
                    10.
                    The
                    Oman Insurance Association (“OIA”), has agreed that the Oman VAT Law &amp; Regulations requires VAT
                    to
                    be applied at 5% on inbound and outbound travel insurance.</p>
            </li>
            <li data-list-text="11.">
                <p style="padding-left: 43pt;text-indent: -16pt;line-height: 6pt;text-align: left;">11. I/Holder of the
                    Policy
                    hereby agree to the Terms &amp; Conditions of this Certificate of Insurance and the benefits/
                    coverages.
                </p>
            </li>
        </ol>

        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <div class="row">
            <div class="column"></div>
            <div class="column" style="float: right;display: block;">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <p class="s8"
                                style="padding-left: 228pt;text-indent: 48pt;line-height: 117%;text-align: right;">
                                Underwritten
                                by<br> Oman Qatar Insurance Company</p>
                        </td>
                        <td><img width="66" height="83"
                                src="{{ asset('assets/image/TravelPdfImage/sill_sing.jpeg') }}" />
                        </td>
                        <td><img style="margin-top: 23pt;" width="83" height="33"
                                src="{{ asset('assets/image/TravelPdfImage/qic_logo.png') }}" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2">
                            <p class="s8" style="text-indent: 0pt;text-align: right;">P.O Box 3660 Ruwi 112
                                Sultanate
                                of
                                Oman
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>

    </div>























    <div class="page-break"></div>

    <div class="row">
        <div class="column"><img width="240" height="76"
                src="{{ asset('assets/image/TravelPdfImage/travel_logo.png') }}" />
        </div>
        <div class="column"><img style="float: right;margin-top: 18px;display: block;" width="82" height="33"
                src="{{ asset('assets/image/TravelPdfImage/qic_logo.png') }}" />
        </div>
    </div>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <div style="border: 2px solid #B3B3B3;padding: 7pt;margin: 10pt;">

        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <table style="border-collapse:collapse;width:100%;" cellspacing="0">
            <tr style="height:32pt">
                <td style="width:146pt;border-top-style:solid;border-top-width:1pt;border-top-color:#B3B3B3;border-left-style:solid;border-left-width:1pt;border-left-color:#B3B3B3;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#B3B3B3;border-right-style:solid;border-right-width:1pt;border-right-color:#B3B3B3"
                    colspan="2">
                    <p class="s9" style="padding-top: 6pt;padding-left: 9pt;text-indent: 0pt;text-align: left;">
                        Policy
                        Wording</p>
                    <p style="padding-top: 2pt;padding-left: 9pt;text-indent: 0pt;text-align: left;"><a
                            href="https://s3-ap-southeast-1.amazonaws.com/tuneprotect.com-emeia/pdf/TPVA_Inbound_OM.pdf"
                            class="s10">Download Now</a></p>
                </td>
                <td
                    style="width:146pt;border-top-style:solid;border-top-width:1pt;border-top-color:#B3B3B3;border-left-style:solid;border-left-width:1pt;border-left-color:#B3B3B3;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#B3B3B3;border-right-style:solid;border-right-width:1pt;border-right-color:#B3B3B3">
                    <p class="s9" style="padding-top: 6pt;padding-left: 9pt;text-indent: 0pt;text-align: left;">
                        Claim
                    </p>
                    <p style="padding-top: 2pt;padding-left: 9pt;text-indent: 0pt;text-align: left;"><a
                            href="https://claims.tune2protect.com/default.aspx?langid=en" class="s10">Submit Your
                            Claim
                            Online</a></p>
                </td>
                <td
                    style="width:146pt;border-top-style:solid;border-top-width:1pt;border-top-color:#B3B3B3;border-left-style:solid;border-left-width:1pt;border-left-color:#B3B3B3;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#B3B3B3;border-right-style:solid;border-right-width:1pt;border-right-color:#B3B3B3">
                    <p class="s9" style="padding-top: 6pt;padding-left: 9pt;text-indent: 0pt;text-align: left;">
                        General Enquiry</p>
                    <p style="padding-top: 2pt;padding-left: 9pt;text-indent: 0pt;text-align: left;"><a
                            href="mailto:travelassurance@tuneprotect.com"
                            class="s10">travelassurance@tuneprotect.com</a></p>
                </td>
            </tr>
            <tr style="height:20pt">
                <td style="width:438pt;border-top-style:solid;border-top-width:1pt;border-top-color:#B3B3B3;border-left-style:solid;border-left-width:1pt;border-left-color:#B3B3B3;border-right-style:solid;border-right-width:1pt;border-right-color:#B3B3B3"
                    colspan="4">
                    <p class="s9" style="padding-top: 6pt;padding-left: 9pt;text-indent: 0pt;text-align: left;">
                        Emergency Assistance</p>
                </td>
            </tr>
            <tr style="height:23pt">
                <td style="width:89pt;border-left-style:solid;border-left-width:1pt;border-left-color:#B3B3B3">
                    <p class="s11" style="padding-top: 2pt;padding-left: 9pt;text-indent: 0pt;text-align: left;">
                        Middle
                        East</p>
                    <p class="s12" style="padding-left: 9pt;text-indent: 0pt;line-height: 9pt;text-align: left;">
                        +971 4
                        4203920</p>
                </td>
                <td style="width:89pt">
                    <p class="s11" style="padding-top: 2pt;padding-left: 25pt;text-indent: 0pt;text-align: left;">
                        US
                        &amp; Canada</p>
                    <p class="s12" style="padding-left: 25pt;text-indent: 0pt;line-height: 9pt;text-align: left;">
                        +178
                        6472 7700</p>
                </td>
                <td style="width:89pt">
                    <p class="s11" style="padding-top: 2pt;padding-left: 13pt;text-indent: 0pt;text-align: left;">
                        Europe/North Africa</p>
                    <p class="s12" style="padding-left: 13pt;text-indent: 0pt;line-height: 9pt;text-align: left;">
                        +441
                        786 310 605</p>
                </td>
                <td style="width:89pt;border-right-style:solid;border-right-width:1pt;border-right-color:#B3B3B3">
                    <p class="s11" style="padding-top: 2pt;padding-left: 12pt;text-indent: 0pt;text-align: left;">
                        Indian Subcontinent</p>
                    <p class="s12" style="padding-left: 12pt;text-indent: 0pt;line-height: 9pt;text-align: left;">
                        +911
                        244 688 488</p>
                </td>
            </tr>
            <tr style="height:17pt">
                <td
                    style="width:89pt;border-left-style:solid;border-left-width:1pt;border-left-color:#B3B3B3;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#B3B3B3">
                    <p class="s13" style="padding-left: 9pt;text-indent: 0pt;text-align: left;">(English &amp;
                        Arabic)
                    </p>
                </td>
                <td style="width:89pt;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#B3B3B3">
                    <p class="s13" style="padding-left: 25pt;text-indent: 0pt;text-align: left;">(English, French
                        &amp;
                        Arabic)</p>
                </td>
                <td style="width:89pt;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#B3B3B3">
                    <p class="s13" style="padding-left: 13pt;text-indent: 0pt;text-align: left;">(English, French
                        &amp;
                        Arabic)</p>
                </td>
                <td
                    style="width:89pt;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#B3B3B3;border-right-style:solid;border-right-width:1pt;border-right-color:#B3B3B3">
                    <p class="s13" style="padding-left: 12pt;text-indent: 0pt;text-align: left;">(English &amp;
                        Arabic)
                    </p>
                </td>
            </tr>
        </table>

        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>

        <table style="margin-left:44.919pt" border="0" cellspacing="10" cellpadding="5">
            <tr style="vertical-align: middle;">
                <td><img width="117" height="78"
                        src="{{ asset('assets/image/TravelPdfImage/blug_tag.png') }}" />
                </td>
                <td><img style="margin-top:3.5pt;" width="106" height="69"
                        src="{{ asset('assets/image/TravelPdfImage/gettransfer_tag.png') }}" />
                </td>
                <td><img style="margin-top:3.5pt;" width="106" height="69"
                        src="{{ asset('assets/image/TravelPdfImage/stemz_tag.png') }}" />
                </td>
                <td><img style="margin-top:3.5pt;" width="106" height="69"
                        src="{{ asset('assets/image/TravelPdfImage/ama_tag.png') }}" />
                </td>
            </tr>
        </table>

        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <div class="row">
            <div class="column"></div>
            <div class="column" style="float: right;display: block;">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <p class="s8"
                                style="padding-left: 228pt;text-indent: 48pt;line-height: 117%;text-align: right;">
                                Underwritten
                                by<br> Oman Qatar Insurance Company</p>
                        </td>
                        <td><img width="66" height="83"
                                src="{{ asset('assets/image/TravelPdfImage/sill_sing.jpeg') }}" />
                        </td>
                        <td><img style="margin-top: 23pt;" width="83" height="33"
                                src="{{ asset('assets/image/TravelPdfImage/qic_logo.png') }}" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2">
                            <p class="s8" style="text-indent: 0pt;text-align: right;">
                                P.O Box 3660 Ruwi 112
                                Sultanate
                                of
                                Oman
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
    </div>

</body>

</html>
