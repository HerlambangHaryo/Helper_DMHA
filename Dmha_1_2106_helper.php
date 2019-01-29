<?php

	use App\daftar_multi_hak_akses;
	use App\app_list;

    use App\data_2105;

	// Admin Control Plot Locations
    // data_1_2106();
	function data_1_2106_order_by_desc(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $isi_model = user::select_all();
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
