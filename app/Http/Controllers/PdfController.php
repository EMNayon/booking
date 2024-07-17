<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Agoda;
use App\Models\Hotel;
use App\Models\State;
use App\Models\Booking;
use App\Models\Country;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function downloadAgoda($id)
    {

        // $this->deleteAllFilesofByPath('agoda/');

        $agoda     = Agoda::where('id', $id)->first();
        $roomType = RoomType::where('id', $agoda->room_type)->first();
        $roomTypeTitle = $roomType->title;

        $countries = Country::pluck('name', 'id')->toArray();

        $checkIn = $agoda->arrival;
        $checkIn = new \DateTime($agoda->arrival);
        $checkInBefore7Days = clone $checkIn; // Clone the original DateTime object
        $checkInBefore7Days->modify('-7 days');
        $checkInBefore7DaysDay = $checkInBefore7Days->format('l');
        $checkInBefore7DaysMonth = $checkInBefore7Days->format('F');
        $checkInBefore7DaysDate  = $checkInBefore7Days->format('d');
        $checkInBefore7DaysYear  = $checkInBefore7Days->format('Y');


        $checkInDay   = $checkIn->format('l');
        $checkInMonth = $checkIn->format('F');
        $checkInDate  = $checkIn->format('d');
        $checkInYear  = $checkIn->format('Y');


        $checkOut = $agoda->departure;
        $checkOut = new \DateTime($agoda->departure);

        $checkOutDay   = $checkOut->format('l');
        $checkOutMonth = $checkOut->format('F');
        $checkOutDate  = $checkOut->format('d');
        $checkOutYear  = $checkOut->format('Y');



        $signaturePathInfo   = pathinfo(public_path('images/hotels/signature_agoda.png'));
        $signature_extension = $signaturePathInfo['extension'];
        $signature           = base64_encode(file_get_contents($signaturePathInfo['dirname'] . "/" . $signaturePathInfo['basename']));
        $signature           = "data:image/" . $signature_extension . ";base64," . $signature;

        $agodaPathInfo   = pathinfo(public_path('images/hotels/agoda.png'));
        $agoda_extension = $agodaPathInfo['extension'];
        $agodaImg         = base64_encode(file_get_contents($agodaPathInfo['dirname'] . "/" . $agodaPathInfo['basename']));
        $agodaImg          = "data:image/" . $agoda_extension . ";base64," . $agodaImg;

        // dd($checkInBefore7Days);
        $data = [
            'agoda'           => $agoda,
            'countries'       => $countries,
            'check_in_day'    => $checkInDay,
            'check_in_month'  => $checkInMonth,
            'check_in_date'   => $checkInDate,
            'check_in_year'   => $checkInYear,
            'check_out_day'   => $checkOutDay,
            'check_out_month' => $checkOutMonth,
            'check_out_date'  => $checkOutDate,
            'check_out_year'  => $checkOutYear,
            'signature'       => $signature,
            'agodaImg'          => $agodaImg,
            'checkInBefore7Days' => $checkInBefore7Days,
            'checkInBefore7DaysDay' => $checkInBefore7DaysDate,
            'checkInBefore7DaysMonth' => $checkInBefore7DaysMonth,
            'checkInBefore7DaysDate' => $checkInBefore7DaysDate,
            'checkInBefore7DaysYear' => $checkInBefore7DaysYear,
            'roomTypeTitle' => $roomTypeTitle
        ];
        $pdf = PDF::loadView('agoda-pdf2', $data);

        $pdfName = date('y_m_d',strtotime($agoda->created_at)).'_'.$agoda->booking_id;
        return $pdf->download($pdfName . '.pdf');

    }

    public function downloadBooking($id)
    {

        $booking = Booking::where('id', $id)->first();

        $hotel = Hotel::where('id', $booking->hotel_id)->first();
        // $city = City::where('id', $hotel->city_id)->first();
        $state = State::where('id', $hotel->state_id)->first();
        $country = Country::where('id', $state->country_id)->first();

        $checkIn = $booking->check_in;

        $checkIn = new \DateTime($booking->check_in);
        // dd($checkIn);

        $checkInDay = $checkIn->format('l');
        $checkInMonth = $checkIn->format('F');
        $checkInDate = $checkIn->format('d');
        $checkInTime = $checkIn->format('h:i:s A');

        $checkOut = $booking->check_out;
        $checkOut = new \DateTime($booking->check_out);

        $checkOutDay = $checkOut->format('l');
        $checkOutMonth = $checkOut->format('F');
        $checkOutDate = $checkOut->format('d');
        $checkOutTime = $checkOut->format('h:i:s A');

        $data = [
            'booking' => $booking,
            'check_in_day' => $checkInDay,
            'check_in_month' => $checkInMonth,
            'check_in_date' => $checkInDate,
            'check_in_time' => $checkInTime,
            'check_out_day' => $checkOutDay,
            'check_out_month' => $checkOutMonth,
            'check_out_date' => $checkOutDate,
            'check_out_time' => $checkOutTime,
            'country' => $country
        ];


        $pdf = PDF::loadView('booking-pdf', $data);
        // $pdfName = 'test';
        $pdfName = date('y_m_d',strtotime($booking->created_at)).'_'.$booking->confirmation_number;
        return $pdf->download($pdfName . '.pdf');
    }


    public function showAgoda($id)
    {

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

        return view('agoda-pdf' , compact('data'));
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