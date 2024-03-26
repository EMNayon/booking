<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Mpdf\QrCode\QrCode as QrCode2;
use Mpdf\QrCode\Output;
use Mpdf\Mpdf;

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
        'Adhunik Sadar Hospital'
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
        $this->validate($request, [
            'certificate_no' => 'required',
            'name' => 'required',
            'dob' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
            'passport' => 'nullable|unique:members'
        ], [
            'certificate_no.required' => 'Certificate no field is required',
            'name.required' => 'Name field is required',
            'dob.required' => 'Date of Birth field is required',
            'nationality.required' => 'Nationality field is required',
            'gender.required' => 'Gender field is required',
        ]);

        DB::beginTransaction();
        try {
            $code = $this->generateCode();
            $member = new Member();
            $member->code = $code;
            $member->hidden = 0;
            $member->name = $request->name;
            $member->passport = $request->passport;
            $member->dob = date('d-m-Y', strtotime($request->dob));
            $member->nationality = $request->nationality;
            $member->destination = $request->destination;
            $member->effective_date = date('d-m-Y', strtotime($request->effective_date));
            $member->reference = $request->reference;
            $member->phone_no = $request->phone_no;
            $member->certificate_no = $request->certificate_no;
            $member->nid = $request->nid;
            $member->gender = $request->gender;
            $member->created_by = Auth::id();
            $member->save();

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
    public function printWecarePdf($code)
    {

        $this->deleteAllFilesofByPath('code/');
        $member = Member::where('code', $code)->first();

        $printdata = 'TRAVEL INSURANCE CERTIFICATE
        POLICY NUMBER WC-' . $member->certificate_no . '
        PLAN-Covid Plan (KSA)
        AGENT-NATIONAL
        PHONE-' . $member->phone_no . '
        FROM-' .  $member->effective_date . ' TO ' . date('d-m-Y', strtotime($member->effective_date . ' +30 days')) . '
        COUNTRY OF RESIDENCE ' . strtoupper($member->nationality) . '
        APPLICANT NAME-' . $member->name . '
        DATE OF BIRTH-' . $member->dob . '
        PASSPORT NO-' . $member->passport;


        $qrCode = new QrCode2($printdata);
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
        //        echo $html;
        //        exit;
        //        return view('downloadWecare', $data);

        $pdf = PDF::loadView('downloadWecare', $data);

        // $pdfName = date('y_m_d', strtotime($member->created_at)) . '-' . date('y_m_d', time());
        $pdfName = $member->name . '_' . $member->certificate_no;
        return $pdf->download($pdfName . '.pdf');
    }

    public function printTravelvisitPdf($code)
    {

        $this->deleteAllFilesofByPath('code/');
        $member = Member::where('code', $code)->first();

        $printdata = 'TRAVEL INSURANCE CERTIFICATE
        POLICY NUMBER WC-' . $member->certificate_no . '
        PLAN-Covid Plan (KSA)
        AGENT-NATIONAL
        PHONE-' . $member->phone_no . '
        FROM-' .  $member->effective_date . ' TO ' . date('d-m-Y', strtotime($member->effective_date . ' +30 days')) . '
        COUNTRY OF RESIDENCE ' . strtoupper($member->nationality) . '
        APPLICANT NAME-' . $member->name . '
        DATE OF BIRTH-' . $member->dob . '
        PASSPORT NO-' . $member->passport;


        $qrCode = new QrCode2($printdata);
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
        //        echo $html;
        //        exit;
        //        return view('downloadTravelvisit', $data);

        $pdf = PDF::loadView('downloadTravelvisit', $data);

        $pdfName = date('y_m_d', strtotime($member->created_at)) . '-' . date('y_m_d', time());
        return $pdf->download($pdfName . '.pdf');
    }

    // function to delete all files and subfolders from folder
    private function deleteAllFilesofByPath($dir, $remove = false)
    {
        $structure = glob(rtrim($dir, "/") . '/*');
        if (is_array($structure)) {
            foreach ($structure as $file) {
                if (is_dir($file))
                    deleteAll($file, true);
                else if (is_file($file))
                    unlink($file);
            }
        }
        if ($remove)
            rmdir($dir);
    }

    public function scanResult(Request $request)
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
        $centers = self::$centers;
        $destinations = self::$destinations;
        return view('admin.member_edit', compact('member', 'centers', 'destinations'));
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
        $this->validate($request, [

            'name' => 'required',
            'dob' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
            'passport' => ['nullable', Rule::unique('members')->ignore($request->id)]
        ], [
            'name.required' => 'Name field is required',
            'dob.required' => 'Date of Birth field is required',
            'nationality.required' => 'Nationality field is required',
            'gender.required' => 'Gender field is required',
        ]);
        DB::beginTransaction();

        try {
            $member = Member::find($request->id);
            $member->name = $request->name;
            $member->passport = $request->passport;
            $member->dob = date('d-m-Y', strtotime($request->dob));
            $member->nationality = $request->nationality;
            $member->destination = $request->destination;
            $member->effective_date = date('d-m-Y', strtotime($request->effective_date));
            $member->reference = $request->reference;
            $member->phone_no = $request->phone_no;
            $member->nid = $request->nid;
            $member->gender = $request->gender;
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
        $codeLength = 255 - $url_length;
        $code = str_replace("/", "", Str::random($codeLength));
        return $code;
    }
}
