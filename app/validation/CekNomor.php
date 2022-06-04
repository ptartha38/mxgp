<?php

namespace App\validation;

class CekNomor
{
    /* Filter Jumlah Pembelian Kurang dari 1000 Rupiah */

    public function CekNomor($data_nomor)
    {
        if (substr(trim($data_nomor), 0, 2) == '08' or substr(trim($data_nomor), 0, 2) == '62') {
            return true;
        } else {

            return false;
        }
    }
}
