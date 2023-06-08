<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PhoneBook implements FromView,ShouldAutoSize
{
    protected $addressBook;
    public function __construct($addressBook){
        $this->addressBook=$addressBook;
    }
public function view(): View
{
    return view('exports.phone-book',['addressBook'=>$this->addressBook]);
}
}
