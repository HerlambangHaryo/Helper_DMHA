<?php

    use App\daftar_multi_hak_akses;
    use App\app_list;

    use App\data_2129;

    // Admin Control jenis kelamin
    // data_1_2129();
    function data_1_2129_order_by_nama_asc(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $isi_model = data_2129::read_data_order_by_nama_asc();
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
            if(count($isi_model) > 0){
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
                        $isi .= generate_dropdown_button('2129',$row->id);
                        $isi .= '</td>';
                    $isi .= '</tr>';
                }
            }else{
                $isi .= '<tr>';
                    $isi .= '<td class="text-center" colspan="3">';
                    $isi .= flash_messages(6);
                    $isi .= '</td>';
                $isi .= '</tr>';                
            }
            $isi .= '</tbody>';
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////    
    }