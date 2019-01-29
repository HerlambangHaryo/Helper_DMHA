<?php

    use App\daftar_multi_hak_akses;
    use App\app_list;

    use App\user;
    use App\multi_access_systems_2120;

    // Admin Control Floor Plans
    // data_1_2101();
    function data_1_2101_join_order_by_nama_asc(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $isi_model = user::read_data_order_by_nama_asc();
            $counter = 0;

            $isi .= '<colgroup>';
                $isi .= '<col width="'.action_width_general().'">';
                $isi .= '<col>';
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
                $isi .= 'Building';
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
                    $isi .=  $row->name;
                    $isi .= '</td>';
                    $isi .= '<td>';
                    $isi .=  multi_access_systems_2120::read_data_by_id($row->mas_id,'nama');
                    $isi .= '</td>';
                    $isi .= '<td class="text-center">';
                    $isi .= generate_dropdown_button('2101',$row->id);
                    $isi .= '</td>';
                $isi .= '</tr>';
            }
            $isi .= '</tbody>';
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////    
    }
