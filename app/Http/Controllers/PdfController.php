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
       

        $checkIn = $agoda->arrival;

        $checkIn = new \DateTime($agoda->arrival);

        $checkInDay = $checkIn->format('l');
        $checkInMonth = $checkIn->format('F');
        $checkInDate = $checkIn->format('d');
        $checkInYear = $checkIn->format('Y');


        $checkOut = $agoda->departure;

        $checkOut = new \DateTime($agoda->departure);

        $checkOutDay = $checkOut->format('l');
        $checkOutMonth = $checkOut->format('F');
        $checkOutDate = $checkOut->format('d');
        $checkOutYear = $checkOut->format('Y');
       
        $data = [
            'agoda' => $agoda,
            'check_in_day' => $checkInDay,
            'check_in_month' => $checkInMonth,
            'check_in_date' => $checkInDate,
            'check_in_year' => $checkInYear,
            'check_out_day' => $checkOutDay,
            'check_out_month' => $checkOutMonth,
            'check_out_date' => $checkOutDate,
            'check_out_year' => $checkOutYear
        ];

        $pdf = PDF::loadView('agoda-pdf', $data);

       
        $pdfName = 'test';
        return $pdf->download($pdfName . '.pdf');
        
    }

    public function downloadBooking($id)
    {

        $booking = Booking::where('id', $id)->first();
        $checkIn = $booking->check_in;

        $checkIn = new \DateTime($booking->check_in);

        $checkInDay = $checkIn->format('l');
        $checkInMonth = $checkIn->format('F');
        $checkInDate = $checkIn->format('d');


        $checkOut = $booking->check_out;

        $checkOut = new \DateTime($booking->check_out);

        $checkOutDay = $checkOut->format('l');
        $checkOutMonth = $checkOut->format('F');
        $checkOutDate = $checkOut->format('d');

        $data = [
            'booking' => $booking,
            'check_in_day' => $checkInDay,
            'check_in_month' => $checkInMonth,
            'check_in_date' => $checkInDate,
            'check_out_day' => $checkOutDay,
            'check_out_month' => $checkOutMonth,
            'check_out_date' => $checkOutDate,
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
