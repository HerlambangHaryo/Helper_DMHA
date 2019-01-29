<?php

    use App\data_0005;

    // data_1_0005();
    function read_accordion_data_1_0005($AUTH_MAS,$DMHA_ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi        = '';            
            $counter    = 0;         
            $isi_model  = data_0005::read_data_order_by_asc($DMHA_ID);

        // ------------------------------------------------------------------------- ACTION
            if(count($isi_model) > 0)
            {
                foreach ($isi_model as $row) 
                {
                    $random = str_random(3);
                    $counter++;

                    $isi .= accordion_open($random);
                    $isi .= data_card_accordion_open($row->nama.'-'.$row->dmha_id,$counter,$random);
                    $isi .= data_tabel_open_without_id();
                    $isi .= read_table_data_1_0005($AUTH_MAS,$row->dmha_id);
                    $isi .= data_tabel_close();
                    $isi .= data_card_accordion_close();
                    $isi .= accordion_close();
                }
            }

        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////    
    }

    function read_table_data_1_0005($AUTH_MAS,$PARENT_ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $jumlah_kolom = 3;
            $isi_model  = data_0005::read_data_order_by_asc($PARENT_ID);

            $isi .= '<colgroup>';
                $isi .= '<col width="'.action_width_general().'">';
                $isi .= col_loop($jumlah_kolom-2);
                $isi .= '<col width="'.action_width_general().'">';
            $isi .= '</colgroup>';
            
            $isi .= '<thead>';
            $isi .= '<tr>';
                $isi .= th_me('ID');
                $isi .= th_me('Nama');
                $isi .= th_me('Action');
            $isi .= '</tr>';
            $isi .= '</thead>';

            $isi .= '<tbody>';
        // ------------------------------------------------------------------------- ACTION
            if(count($isi_model) > 0){
                foreach ($isi_model as $row) {
                    $isi .= '<tr>';
                        $isi .= td_class_me('text-right',$row->dmha_id);
                        $isi .= td_me($row->nama);
                        $isi .= td_class_me('text-center', generate_dropdown_button($AUTH_MAS,$row->dmha_id,$row->dmha_id));      
                    $isi .= '</tr>';
                }
            }else{
                $isi .= '<tr>';
                    $isi .= td_class_colspan_me('text-center',$jumlah_kolom,flash_messages(6)); 
                $isi .= '</tr>';                
            }
            $isi .= '</tbody>';
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////    
    }