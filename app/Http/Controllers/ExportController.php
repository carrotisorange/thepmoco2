<?php

namespace App\Http\Controllers;

use \PDF;
use Illuminate\Support\Str;
use Session;

class ExportController extends Controller
{
     public function generatePDF($folder_path, $data)
     {
        $pdf = PDF::loadView($folder_path, $data);

        $pdf->output();
               
        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();
         
        $width = $canvas->get_width();

        $canvas->set_opacity(.2,"Multiply");

        $canvas->set_opacity(.2);

        $canvas->page_text($width/5, $height/2, Str::limit(Session::get('property'), 15), null, 55, array(0,0,0),2,2,-30);

        return $pdf;
     }

}
