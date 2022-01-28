<?php

namespace App\Exports;

use App\Models\Ia;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BorangIaExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $daftarIa = Ia::orderBy('id', 'desc')->get();

        return view('pages.ia.borangIa.export', compact(['daftarIa']));
    }
}
