<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Property;
use \PDF;
use Illuminate\Support\Str;

class FileExportController extends Controller
{
     public function generate_pdf(Property $property, $data, $folder_path)
     {
         $pdf = PDF::loadView($folder_path, $data);

         $pdf->output();
               
         $canvas = $pdf->getDomPDF()->getCanvas();

         $height = $canvas->get_height();
         
         $width = $canvas->get_width();

         $canvas->set_opacity(.2,"Multiply");

         $canvas->set_opacity(.2);

        $canvas->page_text($width/5, $height/2, Str::limit($property->property, 15), null, 55, array(0,0,0),2,2,-30);

         return $pdf;

     }
}
