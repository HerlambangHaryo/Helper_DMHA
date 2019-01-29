<?php

	use App\daftar_multi_hak_akses;
	use App\app_list;

    use App\data_2115;

	// Admin Control Equipment
    // data_1_2115();
	function data_1_2115_order_by_desc(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $isi_model = data_2115::select_all();
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
