<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vaccine PDF</title>
    <style type="text/css">
        body{
            background: #fff;
            margin: 0;
            font-family: nirmala;
        }
        .container{
            height: auto;
            width: 100%;
            border: 1px solid #EBEBEB;

        }
        .headerTable tr, .headerTable tr, .headerTable td{
            border: none;
        }
        .p-1{
            font-size: 15px;
            font-family: nirmala;
        }
        .p-2{
            font-size: 15px;
            font-family: nirmala;
        }
        /*qr start*/
        .qr{
            width: 30%;
            margin: 0px auto;
        }
        .qr img{
            display: block;
            width: 100%;
        }
        .text-center{
            text-align: center;
        }
        /*qr end*/
        /*header end*/

        /*main start*/
        /*main title start*/
        .main-title{
            text-align: center;border-width:none;
        }
        .main-title h1{
            margin: 10px 0px 10px 0px;
            font-size: 20px;

        }
        /*main title end*/
        /*table start*/
        .InformationTable tr th, .InformationTable tr td{
            border-collapse: collapse;
            border: 1px;
            border-bottom-style: dashed;
            border-top-style: dashed;
            border-color: #e3dcdc;
            padding: {{ $member->total_dose > 2 ? '6px' : '10px' }};
        }
        .InformationTable{
            font-size: 16px;
        }
        table tr th{
            padding: 10px;
            font-size: 10px;
            background: #EEEEEE;
        }
        /*table end*/
        /*main footer start*/
        .main-footer{
            width: 50%;
            margin: 0px auto;
            text-align: center;
        }
        .main-footer img{
            display: block;
            width: 100%;
        }
        /*main footer end*/
        /*main end*/
    /*    certificate start */
        .certificate{
            margin-top: 15%;
            margin-left: 5%;
            margin-right: 5%;
        }
        .text-end{
            text-align: right;
        }
        .text-start{
            text-align: left;
        }
        .text-center{

            line-height: 1.6;

        }
        .main{
            background: url("https://blogger.googleusercontent.com/img/a/AVvXsEjmyUcmqGm9E8Kii0uWo3w3oYCt53FnksUWf2e8yzOT3uAIAiF-FW7W3NbIyf0PXaRJayt3be5I8tMuiHbIJqw0Mu9_l9cV0d5ll3QA2Mv-4qsAPrbCPnjtT0WRNrtwtqgcsq0ti7JnoIPoUZJP0bF2wz3Hu9kC48sHE3WIV38r3FblL3UTnrIMMWA6Fw=w640-h466");
            background-repeat: no-repeat;
            @if($member->total_dose > 2)
            background-size: 85% 43%; /* width height */
            background-position: 85% 55%; /* hor, ver */
            @else
            background-size: 85% 40%; /* width height */
            background-position: 85% 65%; /* hor, ver */
            @endif
       }

    </style>
</head>
<body>
    <div class="main">

<div class="">
    <div class="certificate">
        <table width="100%" style="border: 1px solid green;">
            <tr>
                <td style="border-right: 1px solid green;width: 48%">
                    <table width="100%" style="padding: 1px; border: none" class="certificateInnerTable">
                        <tr>
                            <td colspan="2" style="text-align: center"><img src="{{public_path().'/bd_logo.png'}}" style="height: 60px; width: 60px"/></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center; font-size: 13px;">
                                Government of the People's Republic of Bangladesh <br>
                                Ministry of Health and Family Welfare
                            </td>
                        </tr>
                        <tr style="background: green;">
                            <td colspan="2" style="color: white; font-size: 20px; text-align: center">
                                <span><b>COVID-19</b>
                                    <br>
                                    Vaccination Certificate
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center">
                                Certificate No: BD1{{$member->certificate_no}}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center">
                                <img src="{{public_path('/')}}code/{{$path}}" style="height: 100px; width: 100px"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;font-weight: bold;font-size: 17px;color: black">
                                {{$member->name}}
                            </td>
                        </tr>
                        <tr style="background: green;color: white">
                            <td style="text-align: right;color: white">
                                NID No
                            </td>
                            <td style="text-align: left;color: white">
                                {{!empty($member->nid) ? $member->nid : "N/A"}}
                            </td>
                        </tr>
                        <tr style="background: green;color: white">
                            <td style="text-align: right;color: white">
                                Passport No
                            </td>
                            <td style="text-align: left;color: white">
                                {{!empty($member->passport) ? $member->passport : "N/A"}}
                            </td>
                        </tr>
                        <tr style="background: green;color: white">
                            <td style="text-align: right;color: white">
                                Nationality
                            </td>
                            <td style="text-align: left;color: white">{{$member->nationality}}</td>
                        </tr>
                        <tr style="background: green;color: white">
                            <td style="text-align: right;color: white">Vaccine Name</td>
                            <td style="text-align: left;color: white">
                                @if(!empty($member->name_of_dose_1))
                                    @if($member->name_of_dose_1 == \App\Models\Member::VACCINE_NAME_1)
                                        Pfizer (Pfizer- <br>
                                        BioNTech)
                                    @else
                                    {{$member->name_of_dose_1}}
                                    @endif

                                @endif
                            </td>
                        </tr>
                        <tr style="background: green;color: white">
                            <td style="text-align: right;color: white">
                                Total Doses
                            </td>
                            <td style="text-align: left;color: white">{{$member->total_dose}}</td>
                        </tr>
                    </table>
                </td>
                <td width="3%"></td>
                <td style="border-left: 1px solid green;width: 49%">
                    <table width="100%" style="padding: 1px; border: none" class="certificateInnerTable">
                        <tr>
                            <td colspan="2" style="height: 70px"></td>
                        </tr>
                        <tr style="border: 5px solid greenyellow;">
                            <td colspan="2">
                                <hr style="width: 100%; color: green;">
                            </td>
                        </tr>
                        <tr style="border-bottom: 2px solid red;">

                        </tr>
                        <tr style="border-top: 1px solid green;">
                            <td colspan="2" style="text-align: center; font-size: 18px;">
                               To Verify this certificate please <br>
                                visit <b>www.surokkha.gov.bd/verify</b> <br>
                                <span style="font-size: 12px">Or</span> <br>
                                <b>Scan the QR code.</b>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" style="text-align: center">
                                <hr style="width: 100%; color: green;">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;font-size: 18px">
                                For any further assistance, please <br>
                                visit www.dghs.gov.bd or<br>
                                email: info@dghs.gov.bd
                            </td>
                        </tr>
                        <tr style="border-bottom: 2px solid red;">
                            <td colspan="2">
                                <hr style="width: 100%; color: green;">
                            </td>
                        </tr>
                        <tr style="border-bottom: 2px solid red;">
                            <td colspan="2" style="text-align: center">
                                <img src="{{public_path().'/certificate_footer.PNG'}}" style="height: 50px; width: 150px;" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="height: 30px"></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>
