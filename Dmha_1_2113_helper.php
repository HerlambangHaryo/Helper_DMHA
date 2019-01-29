<?php

    use App\daftar_multi_hak_akses;
    use App\app_list;

    use App\data_2102;
    use App\data_2105;
    use App\data_2113;

    // Admin Control Floor Plans
    // data_1_2113();
    function data_1_2113_order_by_nama_asc(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $isi_model = data_2113::read_data_order_by_nama_asc();
            $counter = 0;

            $isi .= '<colgroup>';
                $isi .= '<col width="'.action_width_general().'">';
                $isi .= '<col>';
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
                $isi .= 'Location';
                $isi .= '</th>';
                
                $isi .= '<th>';
                $isi .= 'Floor';
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
                    $isi .=  $row->nama;
                    $isi .= '</td>';
                    $isi .= '<td>';
                    $isi .=  data_2105::read_data_by_id($row->data_2105_id,'nama');
                    $isi .= '</td>';
                    $isi .= '<td>';
                    $isi .=  data_2102::read_data_by_id(data_2105::read_data_by_id($row->data_2105_id,'data_2102_id'),'nama');
                    $isi .= '</td>';
                    $isi .= '<td class="text-center">';
                    $isi .= generate_dropdown_button('2113',$row->id);
                    $isi .= '</td>';
                $isi .= '</tr>';
            }
            $isi .= '</tbody>';
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////    
    }
