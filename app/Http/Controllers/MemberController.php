<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Mpdf\QrCode\Output;
use Mpdf\QrCode\QrCode as QrCode2;
use Illuminate\Support\Facades\Response;


use PDF;

class MemberController extends Controller
{

    public static $centers = [
        'Bagerhat 250 Bed Hospital',
        'Bandarban Sadar Hospital',
        'Barguna Zilla Sadar Government Hospital',
        'Sher-E-Bangla Medical College Hospital',
        'Bhola 250 bed District Sadar Hospital',
        'Bogra 250 bed Mohammad Ali District Hospital',
        '250 Bedded General Hospital, Brahmanbaria',
        'Chandpur 250 Bed General Hospital',
        'Chittagong 250 bed general hospital',
        'Chuadanga Sadar Hospital',
        'Comilla Medical College Hospital',
        '250 Bed District Sadar Hospital, Cox\'s Bazar',
        'Dhaka Medical College Hospital',
        'Dinajpur 250 bed General Hospital',
        'Bangabandhu Sheikh Mujib Medical College and Hospital',
        'Feni Government General Hospital',
        'Zilla Government Hospital, Gaibandha',
        'Gazipur Sadar Upazila Health complex, Gazipur',
        '250 Bedded General Hospital, Gopalganj',
        'Adhunik Zilla Sadar Hospital, Habiganj',
        'Joypurhat Adhunik Hospital',
        '250 Bed Jamalpur General Hospital, Jamalpur',
        'Jessore General Hospital',
        'Jhalokathi Sadar Hospital, Jhalokati',
        'Jhenaidah Sadar Hospital',
        'Khagrachari District Sadar Hospital',
        'Khulna 250 Bed General Hospital',
        'Kishoreganj 250 Bed District Sadar Hospital',
        'Kurigram General Hospital',
        'Kushtia General Hospital',
        'Lakshmipur Sadar Hospital',
        'Lalmonirhat Sadar Hospital',
        'Madaripur Sadar Hospital',
        'Magura 250 bed District Hospital',
        '250 Bed District Hospital, Manikganj',
        'Meherpur 250 Bed District Hospital',
        'Moulvibazar Sodor Hospital',
        'Munshiganj 250 bed District Hospital',
        'Mymensingh gov Medical Hospital',
        'Naogaon 250 bed District Hospital',
        'Narail Sadar Hospital',
        'Narayanganj 300 Bed Hospital',
        'Narsingdi 100 Bed Zilla Hospital',
        'Natore Sadar Hospital',
        'Nawabganj Upazila Health Complex',
        'Netrakona Sadar Hospital',
        'Nilphamari 250 bed District Hospital',
        'Noakhali 250 Bed General Hospital',
        'Pabna 250 bed General Hospital',
        'Panchagarh District Hospital',
        'Parbatya Chattagram Government Hospital',
        'Patuakhali 250 bed Sadar Hospital',
        'Pirojpur District Hospital',
        'Rajbari General Hospital',
        'Department Of Orthopedic Surgery And Traumatology (Gent\'s)',
        'Upazila Health Complex, Sadar Rangpur',
        'Satkhira Sadar Hospital',
        'Shariatpur Sadar Hospital',
        'District Hospital, Sherpur',
        'Sheikh Fazilatunnessa Mujib General Hospital, Sirajganj',
        'Sunamganj Sadar Hospital',
        'Sylhet District Hospital',
        'Tangail 250 Bed District Hospital',
        'Adhunik Sadar Hospital',
    ];

    public static $destinations = [
        'KINGDOM OF SAUDI ARABIA',
        'UNITED ARAB EMIRATES',
        'SULTANATE OF OMAN',
        'KINGDOM OF BAHRAIN',
        'STATE OF QATAR',
        'STATE OF KUWAIT',
        'MALAYSIA',
        'ARGENTINA',
        'INDIA',
        'PORTUGAL',
        'TURKEY',
        'ITALY',
    ];

    public function showMemberForm()
    {
        return view('welcome', ['centers' => self::$centers]);
    }
    public function submitMemberForm(Request $request)
    {
        // dd('ok');
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user has enough points
        if ($user->point <= 0) {
            Session::flash('error', 'You do not have enough points to submit the form.');
            return redirect()->back();
        }

        DB::beginTransaction();
        try {
            $code = $this->generateCode();
            $member = new Member();

            $member->bin_no = $request->bin_no;
            $member->mushak = $request->mushak;
            $member->issuing_office = $request->issuing_office;
            $member->money_receipt_no = $request->money_receipt_no;
            $member->class_of_insurance = $request->class_of_insurance;
            $member->mode_of_payment = $request->mode_of_payment;
            $member->drawn_on = $request->drawn_on;

            $member->policy_no = $request->policy_no;
            $member->issue_date = $request->issue_date;
            $member->plan_type = $request->plan_type;
            $member->area_of_travel = $request->area_of_travel;
            $member->no_of_days_covered = $request->no_of_days_covered;

            $member->premium = $request->premium;
            $vatPercentage = 15;
            $vatAmount = ($request->premium * $vatPercentage) / 100;
            $member->total_premium = $request->premium + $vatAmount;

            $member->mr_no = $request->mr_no;

            $member->name = $request->name;
            $member->mobile_no = $request->mobile_no;
            $member->address = $request->address;
            $member->age = $request->age;
            $member->dob = date('d-m-Y', strtotime($request->dob));
            $member->pass_no = $request->pass_no;
            $member->nationality = $request->nationality;

            $member->code = $code;
            $member->hidden = 0;
            $member->created_by = Auth::id();

            $member->save();

            // Decrement the user's points
            $user->point -= 1;
            $user->save();

            DB::commit();
            Session::flash('success', 'File Submission Successfull.');
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', 'Something went wrong. Please try again letter');
            return redirect()->back();
        }
    }
    public function getMemberDataByCode($code)
    {
        $member = Member::where('code', $code)->first();
        return view('show', compact('member'));
    }
    public function moneyReceiptPdf($code)
    {

        $this->deleteAllFilesofByPath('code/');

        $member = Member::where('code', $code)->first();

        $qrCode = new QrCode2(route('scan').'/'.$member->code);
        $output = new Output\Png();
        $data = $output->output($qrCode, 300, [255, 255, 255], [0, 0, 0]);
        $qr_filename = time() . '.png';
        file_put_contents('code/' . $qr_filename, $data);

        //        $qrcode = base64_encode(QrCode::format('svg')->size(300)->errorCorrection('H')->generate(route('scan',[$member->code])));
        $qrcode = $qr_filename;
        $data = [
            'path' => $qrcode,
            'member' => $member,
        ];

        $pdf = PDF::loadView('money', $data);

        // $pdfName = date('y_m_d', strtotime($member->created_at)) . '-' . date('y_m_d', time());
        $pdfName = $member->name;
        return $pdf->download($pdfName . '.pdf');
        // return view('money',$data);
        // return $pdf->stream();
    }


//     public function moneyReceiptPdf($code)
// {
//     // Logic to generate PDF
//     $pdf = $this->generatePdf($code);

//     // Return PDF as response
//     return Response::make($pdf, 200, [
//         'Content-Type' => 'application/pdf',
//         'Content-Disposition' => 'inline; filename="money_receipt.pdf"',
//     ]);
// }

// private function generatePdf($code)
// {
//     // Your PDF generation logic here
//     // For example:
//     $member = Member::where('code', $code)->first();
//     $qrCode = new QrCode2(route('scan').'/'.$member->code);
//         $output = new Output\Png();
//         $data = $output->output($qrCode, 300, [255, 255, 255], [0, 0, 0]);
//         $qr_filename = time() . '.png';
//         file_put_contents('code/' . $qr_filename, $data);

//         //        $qrcode = base64_encode(QrCode::format('svg')->size(300)->errorCorrection('H')->generate(route('scan',[$member->code])));
//         $qrcode = $qr_filename;
//         $data = [
//             'path' => $qrcode,
//             'member' => $member,
//         ];
//     $pdf = PDF::loadView('money', $data);
//     return $pdf->stream();
//     // return view('money', $data);
// }

    public function moneyVerifiedPdf($code){
        $this->deleteAllFilesofByPath('code/');
        $member = Member::where('code', $code)->first();
        return view('moneyVerified', compact('member'));
    }

    public function policyPdf($code)
    {

        $this->deleteAllFilesofByPath('code/');
        $member = Member::where('code', $code)->first();

        $qrCode = new QrCode2(route('scanp') . '/pdf/'. $member->code);
        $output = new Output\Png();
        $data = $output->output($qrCode, 300, [255, 255, 255], [0, 0, 0]);
        $qr_filename = time() . '.png';
        file_put_contents('code/' . $qr_filename, $data);

        //        $qrcode = base64_encode(QrCode::format('svg')->size(300)->errorCorrection('H')->generate(route('scan',[$member->code])));
        $qrcode = $qr_filename;
        $data = [
            'path' => $qrcode,
            'member' => $member,
        ];
        $pdf = PDF::loadView('policy', $data);
        $pdfName = date('y_m_d', strtotime($member->created_at)) . '-' . date('y_m_d', time());
        return $pdf->download($pdfName . '.pdf');
    }

    // function to delete all files and subfolders from folder
   
    public function scanResultMoney(Request $request)
    {
        $code = $request->code;
        dd($code);
        if ($code == null) {
            return view('invalid');
        }
        $member = Member::where('code', $code)->first();
        if (!empty($member) && !$member->hidden) {
            $page = 'result';
            return view('show', compact('member', 'page'));
        }

        return view('invalid');
    }

    public function scanResultPolicy(Request $request)
    {
        $code = $request->id;
        if ($code == null) {
            return view('invalid');
        }
        $member = Member::where('code', $code)->first();
        if (!empty($member) && !$member->hidden) {
            $page = 'result';
            return view('show', compact('member', 'page'));
        }

        return view('invalid');
    }

    public function memberEdit($code)
    {
        $member = Member::where('code', $code)->first();
        return view('admin.member_edit', compact('member'));
    }

    public function memberDelete($code)
    {
        $member = Member::where('code', $code)->first();
        if ($member->delete()) {
            return back()->with('error', 'Successfully deleted');
        }
        return back()->with('error', 'Something went wrong. Please try again letter');
    }

    public function memberToggle($code)
    {
        $member = Member::where('code', $code)->first();
        $member->hidden = !$member->hidden;
        if ($member->save()) {
            return back()->with('error', 'Operation Successful');
        }
        return back()->with('error', 'Something went wrong. Please try again letter');
    }

    public function memberUpdate(Request $request)
    {
        DB::beginTransaction();

        try {
            $member = Member::find($request->id);

            $member->bin_no = $request->bin_no;
            $member->mushak = $request->mushak;
            $member->issuing_office = $request->issuing_office;
            $member->money_receipt_no = $request->money_receipt_no;
            $member->class_of_insurance = $request->class_of_insurance;
            $member->mode_of_payment = $request->mode_of_payment;
            $member->drawn_on = $request->drawn_on;

            $member->policy_no = $request->policy_no;
            $member->issue_date = $request->issue_date;
            $member->plan_type = $request->plan_type;
            $member->area_of_travel = $request->area_of_travel;
            $member->no_of_days_covered = $request->no_of_days_covered;

            $member->premium = $request->premium;
            $vatPercentage = 15;
            $vatAmount = ($request->premium * $vatPercentage) / 100;
            $member->total_premium = $request->premium + $vatAmount;
            $member->mr_no = $request->mr_no;

            $member->name = $request->name;
            $member->mobile_no = $request->mobile_no;
            $member->address = $request->address;
            $member->age = $request->age;
            $member->dob = date('d-m-Y', strtotime($request->dob));
            $member->pass_no = $request->pass_no;
            $member->nationality = $request->nationality;
            $member->save();
            DB::commit();
            Session::flash('success', 'Successfully Updated');
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', 'Something went wrong. Please try again letter');
            return redirect()->back();
        }
    }

    private function generateCode()
    {
        $url_length = strlen(route('login'));
        $codeLength = 6;
        $code = str_replace("/", "", Str::random($codeLength));
        return $code;
    }
}
