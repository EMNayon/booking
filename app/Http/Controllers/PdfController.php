<?php

namespace App\Http\Controllers;

use App\Models\Agoda;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Booking;

class PdfController extends Controller
{
    public function downloadAgoda($id)
    {

        // $this->deleteAllFilesofByPath('agoda/');

        $agoda = Agoda::where('id', $id)->first();

        // $qrCode = new QrCode2(route('scan').'/'.$member->code);
        // $output = new Output\Png();
        // $data = $output->output($qrCode, 300, [255, 255, 255], [0, 0, 0]);
        // $qr_filename = time() . '.png';
        // file_put_contents('agoda/' . $qr_filename, $data);

        //        $qrcode = base64_encode(QrCode::format('svg')->size(300)->errorCorrection('H')->generate(route('scan',[$member->code])));
        // $qrcode = $qr_filename;
        $data = [
            'agoda' => $agoda,
        ];

        $pdf = PDF::loadView('agoda-pdf', $data);

        // $pdfName = date('y_m_d', strtotime($member->created_at)) . '-' . date('y_m_d', time());
        $pdfName = 'test';
        return $pdf->download($pdfName . '.pdf');
        // return view('money',$data);
        // return $pdf->stream();
    }

    public function downloadBooking($id)
    {
        
         $booking = Booking::where('id', $id)->first();
         $data = [
             'booking' => $booking,
         ];

         $pdf = PDF::loadView('booking-pdf', $data);
         $pdfName = 'test';
         return $pdf->download($pdfName . '.pdf');
    }


    public function showAgoda($id)
    {
        return view('agoda-pdf');
    }


    public function showBooking($id)
    {
        return view('booking-pdf');
    }
    // private function deleteAllFilesofByPath($dir, $remove = false)
    // {
    //     $structure = glob(rtrim($dir, "/") . '/*');
    //     if (is_array($structure)) {
    //         foreach ($structure as $file) {
    //             if (is_dir($file)) {
    //                 deleteAll($file, true);
    //             } else if (is_file($file)) {
    //                 unlink($file);
    //             }

    //         }
    //     }
    //     if ($remove) {
    //         rmdir($dir);
    //     }

    // }

}
