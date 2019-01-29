<?php

	use App\daftar_multi_hak_akses;
	use App\app_list;

    use App\data_2103;

	// Admin Control Sections
    // data_1_2103();
    function data_1_2103_order_by_name_desc(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $isi_model = data_2103::read_data_order_by_desc();
            $counter = 0;

            $isi .= '<colgroup>';
                $isi .= '<col width="'.action_width_general().'">';
                $isi .= '<col>';
                $isi .= '<col width="'.action_width_general().'">';
            $isi .= '<tr>';
            $isi .= '</colgroup>';
            $isi .= '<thead>';
            $isi .= '<tr>';
                $isi .= '<th>';
                $isi .= '#';
                $isi .= '</th>';
                $isi .= '<th>';
                $isi .= 'Name';
                $isi .= '</th>';
                $isi .= '<th>';
                $isi .= 'Action';
                $isi .= '</th>';
            $isi .= '</tr>';
            $isi .= '</thead>';

            $isi .= '<tbody>';
        // ------------------------------------------------------------------------- ACTION
            foreach ($isi_model as $row) {
                $counter++;
                $isi .= '<tr>';
                    $isi .= '<td class="text-right">';
                    $isi .= $counter;
                    $isi .= '</td>';
                    $isi .= '<td>';
                    $isi .=  $row->nama;
                    $isi .= '</td>';
                    $isi .= '<td class="text-center">';
                    $isi .= generate_dropdown_button('2102',$row->id);
                    $isi .= '</td>';
                $isi .= '</tr>';
            }
            $isi .= '</tbody>';
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////    
    }

