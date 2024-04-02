<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://um.pe/static/bootstrap.css">
    <link rel="stylesheet" href="https://um.pe/static/solaimanlipi.css">
    <link rel="stylesheet" href="https://um.pe/static/style.css">

    <!-- <link rel="stylesheet" href="/static/bootstrap.css">
        <link rel="stylesheet" href="/static/solaimanlipi.css"> -->
    <!-- <link rel="stylesheet" href="/static/style.css"> -->
    <style>
        td {
            padding: 3px 9px;
        }

        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {
            opacity: 0.7;
        }

        .modal {
            transition: 3s;
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .b_bottom {
            border-bottom: 1px solid #333;
            padding-left: 0px;
        }

        .res_image {
            width: 100%;
            max-width: 450px;
            height: auto;
        }
    </style>
    <title>Money Receipt</title>
</head>

<body oncontextmenu="return false;"  style="background: whitesmoke;" cz-shortcut-listen="true">
    <div class="container-fluid" style="max-width: 800px; background: #fff;">
        <div class="row">
            <div class="col">
                <div id="myModal" class="modal" style="text-align: center; display: none;">
                    <div>
                        <button class="btn btn-light" id="close" style="margin-left: 22%;"><b>X</b></button>
                    </div>
                    <div>
                        <a class="myImg" href="https://play.google.com/store/apps/details?id=com.idra.ump"
                            target="_blank" rel="noopener noreferrer">
                            <img id="myImg" src="https://um.pe/static/app_qrcode.png" alt="Qr Code Image"
                                class="img img-responsive res_image">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center mb-5">
            <div class="col-sm-12 pt-3">
                <img src="/get-logo/mercantile" alt="Company Logo" class="img img-responsive" width="100%">
            </div>
            <div class="col-sm-12">
                <span style="white-space: pre-line">Head Office: Red Crescent Bhaban 61, Motijheel C/A (1st Floor),
                    Dhaka-1000,
                    Bangladesh. Phone: +88-02-223387467, +88-02-223387662, +88-02-223387463
                    Email: info@miiplc.com Web: www.miiplc.com</span>
            </div>
        </div>

        <div class="row justify-content-between">
            <div class="col d-inline-block">
                <label for="BIN">BIN : {{$member->bin_no}}</label>
            </div>
            <div class="col d-inline-block d-print-none text-end">
                <a href="{{ route('money_receipt', [$member->code]) }}" target="_blank" style="font-size: 18px">
                    Download PDF
                </a>
            </div>
        </div>

        <div class="pe-3">
            <div class="row mt-1">
                <div class="col text-center">
                    <label for="">MONEY RECEIPT</label>
                    <p style="font-size: 11px">MUSHAK : {{$member->mushak}}</p>
                </div>
            </div>
            <div class="row py-4">
                <div class="col-sm-12 col-md-6">
                    <div class="row no-gutters">
                        <div class="col-5">Issuing Office</div>
                        <div class="col-7">
                            <div style="float: left; padding-right: 5px;">:</div>
                            <div style="float: left;"> {{ $member->issuing_office }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">Money Receipt No.</div>
                        <div class="col-7">
                            <div style="float: left; padding-right: 5px;">:</div>
                            <div style="float: left;">{{ $member->money_receipt_no }}</div>
                        </div>
                    </div>

                </div>
                <div class="row pe-0">
                    <div class="col-sm-6 col-md-6">
                        <div class="row no-gutters">
                            <div class="col-5">Class of Insurance</div>
                            <div class="col-7">
                                <div style="float: left; padding-left: 3px; padding-right: 5px;">:</div>
                                <div style="float: left;">{{ $member->class_of_insurance }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 text-end pe-0">
                        Date : {{ $member->issue_date }}
                    </div>
                </div>
            </div>
            <div class="row align-items-end my-2">
                <div class="col-4">
                    <span class="fw-bold">Received with thanks from</span>
                </div>
                <div class="col-8 b_bottom">
                    <span>{{ $member->name }} , {{ $member->address }}</span>
                </div>
            </div>
            <div class="row align-items-end mb-2">
                <div class="col-2">
                    <span>The sum of</span>
                </div>
                <div class="col-10 b_bottom">
                    {{ $member->total_premium }}
                </div>
            </div>
            <div class="row align-items-end mb-2">
                <div class="col-3">
                    <span>Mode of Payment</span>
                </div>
                <div class="col-4 b_bottom">
                    Pay Order; {{ $member->mode_of_payment }}
                </div>
                <div class="col-2 text-end">
                    <span>Dated</span>
                </div>
                <div class="col-3 b_bottom">
                    {{ $member->issue_date }}
                </div>
            </div>
            <div class="row align-items-end mb-2">
                <div class="col-2">
                    <span>Drawn on</span>
                </div>
                <div class="col-10 b_bottom">
                    {{ $member->drawn_on }}
                </div>
            </div>
            <div class="row align-items-end mb-2">
                <div class="col-2">
                    <span>Issued against</span>
                </div>
                <div class="col-10 b_bottom">
                    {{ $member->policy_no }}
                </div>
            </div>

            <div class="row">
                <div class="col-6  mt-4">
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 40%;" class="ps-2">Premium</td>
                                <td style="width: 15%;" class="text-center">BDT</td>
                                <td class="text-end pe-2">{{ $member->premium }}</td>
                            </tr>
                            <tr>
                                <td class="ps-2">Vat</td>
                                <td class="text-center">BDT</td>
                                <td class="text-end pe-2">{{  $member->total_premium  -  $member->premium }}</td>
                            </tr>
                            <tr style="background-color: lightgray;">
                                <td class="ps-2">Total</td>
                                <td class="text-center">BDT</td>
                                <td class="text-end pe-2">{{ $member->total_premium }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- <div class="col-6 text-center">
                    <img src="" alt="qrCodeImage" class="qr-code img-responsive" />
                </div> -->
                <div class="col-6 text-center">
                    <img src="{{ public_path('/') }}code/{{ $path }}" style="width: 100px;" />
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center font-weight-bold" style="color: gray; font-size: small;">
                    This RECEIPT is computer generated, authorized signature is not required.
                </div>
            </div>
            <div class="row" style="margin-left: -1px; margin-right: -13px">
                <div class="col-12 text-center fbg">
                    Receipt valid subject to encashment of cheque/P.O./D.D.
                </div>
            </div>
        </div>
        <div class="row pb-2">
            <label for="" style="color: red;">* Note: If have any complain about Insurance, call
                16130.</label>
        </div>

    </div>

    {{-- <script>
        function showModal() {
            document.getElementById("myModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }
        let modal_outside = document.querySelector(":not(.myImg)");
        modal_outside.onclick = function() {
            closeModal();
        }
        let closeButton = document.getElementById("close");
        closeButton.onclick() = function() {
            closeModal();
        }
        // const printBtn = document.getElementById('printBtn')
        // printBtn.addEventListener('click', event => window.print());
    </script> --}}

    <!-- <script src="/static/bootstrap.bundle.js"></script> -->


</body>
</html>
