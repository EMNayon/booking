<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>TRAVEL INSURANCE CERTIFICATE</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            text-indent: 0;
        }

        h1 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 10pt;
        }

        h2 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 7.5pt;
        }

        .p,
        p {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 7.5pt;
            margin: 0pt;
        }

        .s1 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 7.5pt;
        }

        .s2 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 7.5pt;
        }

        .s3 {
            color: #7E7E7E;
            font-family: Arial, sans-serif;
            font-style: italic;
            font-weight: normal;
            text-decoration: none;
            font-size: 6.5pt;
        }

        h3 {
            color: #7E7E7E;
            font-family: Arial, sans-serif;
            font-style: italic;
            font-weight: bold;
            text-decoration: none;
            font-size: 6.5pt;
        }

        .s4 {
            color: #7E7E7E;
            font-family: Arial, sans-serif;
            font-style: italic;
            font-weight: normal;
            text-decoration: none;
            font-size: 6.5pt;
        }

        .s5 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 9pt;
        }

        .s6 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: underline;
            font-size: 7.5pt;
        }

        .s7 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: italic;
            font-weight: normal;
            text-decoration: none;
            font-size: 7.5pt;
        }

        .s8 {
            color: #70B56E;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 7.5pt;
        }

        .a {
            color: #70B56E;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 7.5pt;
        }

        table,
        tbody {
            vertical-align: top;
            overflow: visible;
        }
    </style>
</head>

<body>
    <p style="padding-left: 15pt;text-indent: 0pt;text-align: left;"><span>
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td><img width="169" height="67"
                            src="{{ asset('/assets/image/WecarePdfImage/wecare_logo.png') }}" />
                    </td>
                </tr>
            </table>
        </span></p>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>

    <h1 style="padding-top: 5pt;text-indent: 0pt;text-align: center;"><a name="bookmark0">TRAVEL
            INSURANCE CERTIFICATE</a><a name="bookmark1">&zwnj;</a><a name="bookmark2">&zwnj;</a></h1>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <table style="border-collapse:separate;" cellspacing="8">
        <tr style="height:8pt">
            <td style="width:121pt">
                <h2 style="text-indent: 0pt;text-align: left;">POLICY NO: <span
                        class="p">WC-{{ $member->certificate_no }}
                    </span></h2>
            </td>
            <td style="width:121pt">
                <h2 style="text-indent: 0pt;text-align: left;">ISSUE DATE: <span
                        class="p">{{ $member->effective_date }} </span></h2>
            </td>
            <td style="width:121pt">
                <h2 style="text-indent: 0pt;text-align: left;">PLAN: <span class="p">COVID PLAN
                        (KSA)
                    </span></h2>
            </td>
            <td style="width:121pt">
                <h2 style="text-indent: 0pt;text-align: left;">AGENT: <span class="p">NATIONAL</span></h2>
            </td>
        </tr>
        <tr style="height:38pt">
            <td style="width:121pt" bgcolor="#DBDBDB">
                <p class="s1" style="padding-top: 5pt;padding-left: 4pt;text-indent: 0pt;text-align: left;">
                    DESTINATION</p>
                <p class="s2" style="padding-top: 2pt;padding-left: 4pt;text-indent: 0pt;text-align: left;">
                    {{ $member->destination }}</p>
            </td>
            <td style="width:124pt" bgcolor="#DBDBDB">
                <p class="s1" style="padding-top: 5pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">FROM TO
                </p>
                <p class="s2" style="padding-top: 2pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                    {{ $member->effective_date }} {{ date('d-m-Y', strtotime($member->effective_date . ' +30 days')) }}
                </p>
            </td>
            <td style="width:123pt" bgcolor="#DBDBDB">
                <p class="s1" style="padding-top: 5pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">COUNTRY
                    OF RESIDENCE</p>
                <p class="s2" style="padding-top: 2pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                    {{ $member->nationality }}</p>
            </td>
            <td style="width:121pt" bgcolor="#DBDBDB">
                <p class="s1" style="padding-top: 5pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                    TELEPHONE NO</p>
                <p class="s2" style="padding-top: 2pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                    {{ $member->phone_no }}</p>
            </td>
        </tr>
        <tr style="height:38pt">
            <td style="width:121pt" bgcolor="#DBDBDB">
                <p class="s1" style="padding-top: 5pt;padding-left: 4pt;text-indent: 0pt;text-align: left;">FULL
                    NAME</p>
                <p class="s2" style="padding-top: 2pt;padding-left: 4pt;text-indent: 0pt;text-align: left;">
                    {{ $member->name }}</p>
            </td>
            <td style="width:124pt" bgcolor="#DBDBDB">
                <p class="s1" style="padding-top: 5pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">DATE OF
                    BIRTH</p>
                <p class="s2" style="padding-top: 2pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                    {{ $member->dob }}</p>
            </td>
            <td style="width:123pt" bgcolor="#DBDBDB">
                <p class="s1" style="padding-top: 5pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">PASSPORT
                    NUMBER</p>
                <p class="s2" style="padding-top: 2pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                    {{ $member->passport }}</p>
            </td>
            <td style="width:121pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
        </tr>
    </table>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <p class="s3" style="padding-left: 7pt;text-indent: 0pt;line-height: 135%;text-align: left;">Contrary to any
        stipulations stated in the General Conditions,the plan subscribed to,under this Letter of Confirmation, covers
        exclusively the below mentioned Benefits. Limitations &amp; Excesses shown in the table hereafter.</p>
    <p class="s3" style="padding-left: 7pt;text-indent: 0pt;text-align: left;">The General Conditions form an
        integral part of this Letter of Confirmation.</p>
    <h3 style="padding-top: 2pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">For more info/modification
        regarding your policy, <a href="mailto:enquiry@wecare-center.com" class="s4" target="_blank">kindly do not
            hesitate to contact your authorized agent or e-mail us on enquiry@wecare-center.com</a></h3>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <table style="border-collapse:collapse;margin-left:6pt" cellspacing="0">
        <tr style="height:18pt">
            <td style="width:248pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB"
                bgcolor="#DBDBDB">
                <p class="s5" style="padding-top: 1pt;padding-left: 3pt;text-indent: 0pt;text-align: left;">BENEFITS
                </p>
            </td>
            <td style="width:124pt" bgcolor="#DBDBDB">
                <p class="s5" style="padding-top: 1pt;padding-left: 3pt;text-indent: 0pt;text-align: left;">SUM
                    INSURED</p>
            </td>
            <td style="width:123pt;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB"
                bgcolor="#DBDBDB">
                <p class="s5" style="padding-top: 1pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">EXCESS
                </p>
            </td>
        </tr>
        <tr style="height:15pt">
            <td
                style="width:248pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 3pt;text-indent: 0pt;text-align: left;">
                    Emergency Medical expenses due to COVID-19</p>
            </td>
            <td
                style="width:124pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">Up to
                    $ 20 000</p>
            </td>
            <td
                style="width:123pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">0</p>
            </td>
        </tr>
        <tr style="height:17pt">
            <td style="width:248pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB"
                bgcolor="#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 3pt;text-indent: 0pt;text-align: left;">
                    Quarantine expenses due to COVID-19</p>
            </td>
            <td style="width:124pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB"
                bgcolor="#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">Up to
                    $100 Per Day Max 14 Days</p>
            </td>
            <td style="width:123pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB"
                bgcolor="#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">0</p>
            </td>
        </tr>
        <tr style="height:15pt">
            <td
                style="width:248pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 3pt;text-indent: 0pt;text-align: left;">
                    Emergency Medical Evacuation &amp; Repatriation due to COVID</p>
            </td>
            <td
                style="width:124pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">Up to
                    $10 000*</p>
            </td>
            <td
                style="width:123pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">0</p>
            </td>
        </tr>
        <tr style="height:17pt">
            <td style="width:248pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB"
                bgcolor="#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 3pt;text-indent: 0pt;text-align: left;">
                    Repatriation of Mortal remains</p>
            </td>
            <td style="width:124pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB"
                bgcolor="#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">Real
                    Cost</p>
            </td>
            <td style="width:123pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB"
                bgcolor="#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">0</p>
            </td>
        </tr>
        <tr style="height:15pt">
            <td
                style="width:248pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 3pt;text-indent: 0pt;text-align: left;">
                    Emergency Dental Coverage</p>
            </td>
            <td
                style="width:124pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">Up to
                    $ 100</p>
            </td>
            <td
                style="width:123pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">$ 30
                </p>
            </td>
        </tr>
        <tr style="height:17pt">
            <td style="width:248pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB"
                bgcolor="#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 3pt;text-indent: 0pt;text-align: left;">Flight
                    Cancelation</p>
            </td>
            <td style="width:124pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB"
                bgcolor="#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">Up to
                    $ 50</p>
            </td>
            <td style="width:123pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB"
                bgcolor="#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">6
                    Hours</p>
            </td>
        </tr>
        <tr style="height:15pt">
            <td
                style="width:248pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 3pt;text-indent: 0pt;text-align: left;">Loss
                    Of baggage</p>
            </td>
            <td
                style="width:124pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">Up to
                    $ 100</p>
            </td>
            <td
                style="width:123pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">$ 25
                </p>
            </td>
        </tr>
        <tr style="height:17pt">
            <td style="width:248pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB"
                bgcolor="#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 3pt;text-indent: 0pt;text-align: left;">Delay
                    Of baggage</p>
            </td>
            <td style="width:124pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB"
                bgcolor="#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">Up to
                    $ 50</p>
            </td>
            <td style="width:123pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB"
                bgcolor="#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">12
                    Hours</p>
            </td>
        </tr>
        <tr style="height:15pt">
            <td
                style="width:248pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 3pt;text-indent: 0pt;text-align: left;">Loss
                    Of Passport</p>
            </td>
            <td
                style="width:124pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">Up to
                    $ 100</p>
            </td>
            <td
                style="width:123pt;border-left-style:solid;border-left-width:1pt;border-left-color:#DBDBDB;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#DBDBDB;border-right-style:solid;border-right-width:1pt;border-right-color:#DBDBDB">
                <p class="s2" style="padding-top: 2pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">0</p>
            </td>
        </tr>
    </table>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <p style="padding-left: 7pt;text-indent: 0pt;text-align: left;">Above sums insured are per person &amp; per period
        of cover</p>
    <p class="s6" style="padding-top: 6pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">Important Notes:
    </p>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <p style="padding-left: 7pt;text-indent: 0pt;line-height: 130%;text-align: left;">-Upon calling the Alarm Center
        and claim being processed on direct billing procedure, no deductible shall apply for insured up to 70 years old
        In all cases,deductible shall apply for Insured above 70 years old.</p>
    <p style="padding-left: 7pt;text-indent: 0pt;line-height: 130%;text-align: left;">Deductible shall be maintained
        for all insured bracket of age if claims are accepted and processed on reimbursement basis. (Please refer to the
        General Conditions for all deductiable details)</p>
    <p style="padding-left: 7pt;text-indent: 0pt;text-align: left;">In case claim is accepted on reimbursement,please
        refer to the General Conditions.</p>
    <p style="padding-top: 2pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">-This policy is specially designed
        to cover Covid-19 related expenses only.(Please carefully read the general conditions)</p>
    <p style="padding-top: 2pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">Coverage in the USA, Canada, Japan
        &amp; Australia for Emergency Medical Expenses and Evacuation &amp; Repatriation due to Covid-19 is limited to
        US</p>
    <p style="padding-top: 2pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">$ 20,000 per benefit.</p>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <p class="s6" style="padding-bottom: 3pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">Confirmation
        Code:</p>
    <p style="padding-left: 7pt;text-indent: 0pt;text-align: left;"><span>
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <img src="{{ public_path('/') }}code/{{ $path }}"
                            style="height: 150px; width: 150px" />
                    </td>
                </tr>
            </table>
        </span></p>
    <p class="s7" style="padding-top: 6pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">For official
        use,scan the above code to validate this confirmation letter</p>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <p class="s8"
        style="padding-top: 5pt;padding-left: 3pt;text-indent: 0pt;line-height: 130%;text-align: left;background: #DBDBDB;">
        <span style=" color: #000;">PLEASE KEEP THIS LETTER OF CONFIRMATION WITH YOU AT ALL in case of emergency or
            claims of assistance,call us on: </span>+91 95 11 45 89 <span style=" color: #000;">TIMES Claims must be
            reported within 48 hours from occurrence of the </span>78 or +91 87 56 54 23 70 <a
            href="mailto:claims@wecare-center.com"
            style=" color: black; font-family:Arial, sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 7.5pt;"
            target="_blank">or send e-mail to: </a><a href="mailto:claims@wecare-center.com" class="a"
            target="_blank">claims@wecare-</a>center.com <span style=" color: #000;">event and all related original
            documents must be submitted to the You will be asked to provide the reference of this letter and/or show
            this Company by the beneficiary within four (4) months maximum. document. This purchase is
            non-refundable.Please refer to your receipt</span>
    </p>
    <p style="padding-left: 6pt;text-indent: 0pt;text-align: left;" />
</body>

</html>
