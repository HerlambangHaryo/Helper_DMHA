<?php

	use App\daftar_multi_hak_akses;
	use App\app_list;

    use App\data_2111;

	// Admin Control Specs
    // data_1_2111();
	function data_1_2111_order_by_desc(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $isi_model = data_2111::select_all();
            $counter = 0;

        // ------------------------------------------------------------------------- ACTION
            foreach ($isi_model as $row) {
                $counter++;
                $isi .= '<tr>';
                    $isi .= '<td>';
                    $isi .=     $counter;
                    $isi .= '</td>';
                    $isi .= '<td>';
                    $isi .=     $row->name;
                    $isi .= '</td>';
                    $isi .= '<td>';
                    $isi .=     $row->email;
                    $isi .= '</td>';
                    $isi .= '<td>';
                    $isi .=     '';
                    $isi .= '</td>';
                $isi .= '</tr>';
            }
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////	
	}
