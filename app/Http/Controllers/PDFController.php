<?php
  
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use mikehaertl\wkhtmlto\Pdf;
use \Barryvdh\DomPDF\Facade\Pdf as PDFS;

  
class PDFController extends Controller
{
    /**
     * Write code on Construct
     *
     * @return \Illuminate\Http\Response
     */
    public function preview()
    {
        return view('chart');
    }
  
    /**
     * Write code on Construct
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        // $render = view('chart')->render();
  
        // $pdf = new Pdf;
        // $pdf->addPage($render);
        // $pdf->setOptions(['javascript-delay' => 5000]);
        // $pdf->saveAs(public_path('report.pdf'));
   
        // return response()->download(public_path('report.pdf'));
        // $render = view('chart')->render();
        
        
        $render = view('chart')->render();
        
        $pdf = new Pdf;
        // $pdf->addPage(public_path('test.html'));
        $pdf->addPage($render);
        $pdf->setOptions(['javascript-delay' => 5000]);
        if (!$pdf->saveAs(public_path('report.pdf'))){
            $message="No se pudo guardar";
            $success=false;
            return view('message',compact('message','success'));
        }else {
            return response()->download(public_path('report.pdf'));
        }
    }
}