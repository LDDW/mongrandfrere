<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use Livewire\Component;

class OrderPdfController extends Controller
{
    public bool $isShow = false;
    public $pdfView;
    public $pdfContent;
    public $data;

    protected $listeners = ['showPdfModal' => 'show'];

    public function render(){
        $data = $this->data;
        if($this->pdfView !== '' && $this->isShow){
            $pdf = app(PDF::class);
            $pdf->loadView($this->pdfView, compact('data'));
            $pdf->setPaper('A3', 'landscape');
            $this->pdfContent = $pdf->output();
        }
        return view('livewire.modal-pdf');
    }

    public function show(){
        $this->isShow = !$this->isShow;
    }

    public function hideModal(){
        $this->reset('isShow');
    }   
}
