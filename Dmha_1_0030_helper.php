<?php

    use App\daftar_multi_hak_akses;
    use App\app_list;

    use App\data_0030;

    // Kwitansi 
    // data_1_0030();
    function read_table_data_1_0030($AUTH_MAS,$VALUE){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            if(!is_null($VALUE))
                {$isi_model = data_0030::read_data_order_by_desc_and_value($VALUE);}
            elseif(is_null($VALUE))
                {$isi_model = data_0030::read_data_order_by_desc();}

            $isi .= '<colgroup>';
                $isi .= '<col width="'.action_width_general().'">';
                $isi .= col_loop(6);
                $isi .= '<col width="'.action_width_general().'">';
                $isi .= '<col width="'.action_width_general().'">';
            $isi .= '</colgroup>';

            $isi .= '<thead>';
            $isi .= '<tr>';
                $isi .= th_me('ID');
                $isi .= th_me('Telah Terima Dari');
                $isi .= th_me('Sejumlah');
                $isi .= th_me('Untuk Pembayaran');
                $isi .= th_me('Tanggal');
                $isi .= th_me('No. Kwitansi');
                $isi .= th_me('Kota');
                $isi .= th_me('Print');
                $isi .= th_me('Action');
            $isi .= '</tr>';
            $isi .= '</thead>';

            $isi .= '<tbody>';
        // ------------------------------------------------------------------------- ACTION
            if(count($isi_model) > 0){
                foreach ($isi_model as $row) {
                    $isi .= '<tr>';
                        $isi .= td_class_me('text-right',$row->id);
                        $isi .= td_me($row->telah_terima_dari);
                        $isi .= td_me($row->sejumlah);
                        $isi .= td_me($row->untuk_pembayaran);
                        $isi .= td_me($row->tanggal);
                        $isi .= td_me($row->nomer_kwitansi);
                        $isi .= td_me($row->kota);
                        $isi .= td_class_me('text-center',generate_button_dropdown($AUTH_MAS,'0030',$row->id));      
                        $isi .= td_class_me('text-center',generate_dropdown_button($AUTH_MAS,'0030',$row->id));      
                    $isi .= '</tr>';
                }
            }elseif(count($isi_model) == 0 && !is_null($VALUE)){
                $isi .= '<tr>';
                    $isi .= td_class_colspan_me('text-center',9,'"'.$VALUE.'"'.flash_messages(7)); 
                $isi .= '</tr>';                
            }else{
                $isi .= '<tr>';
                    $isi .= td_class_colspan_me('text-center',9,flash_messages(6)); 
                $isi .= '</tr>';                
            }
            $isi .= '</tbody>';
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////    
    }

    function data_0030_isi($ID,$VALUE){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

        // ------------------------------------------------------------------------- ACTION
            $isi .= data_0030::read_data_by_id($ID,$VALUE);
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    } 