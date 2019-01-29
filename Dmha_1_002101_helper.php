<?php

    use App\data_002101;

    // CMS Control 
    // data_1_002917();
    function read_table_data_1_002101($AUTH_MAS,$VALUE){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $jumlah_kolom = 5;
            
            if(!is_null($VALUE))
                {$isi_model = data_002101::read_data_order_by_desc_and_value($VALUE);}
            elseif(is_null($VALUE))
                {$isi_model = data_002101::read_data_order_by_desc();}

            $isi .= '<colgroup>';
                $isi .= '<col width="'.action_width_general().'">';
                $isi .= col_loop($jumlah_kolom-2);
                $isi .= '<col width="'.action_width_general().'">';
            $isi .= '</colgroup>';
            
            $isi .= '<thead>';
            $isi .= '<tr>';
                $isi .= th_me('ID');
                $isi .= th_me('Name');
                $isi .= th_me('Email');
                $isi .= th_me('Multi Access System');
                $isi .= th_me('Action');
            $isi .= '</tr>';
            $isi .= '</thead>';

            $isi .= '<tbody>';
        // ------------------------------------------------------------------------- ACTION
            if(count($isi_model) > 0){
                foreach ($isi_model as $row) {
                    $isi .= '<tr>';
                        $isi .= td_class_me('text-right',$row->id);
                        $isi .= td_me($row->name);
                        $isi .= td_me($row->email);
                        $isi .= td_me($row->email);
                        $isi .= td_class_me('text-center',generate_dropdown_button($AUTH_MAS,'002101',$row->id));      
                    $isi .= '</tr>';
                }
            }elseif(count($isi_model) == 0 && !is_null($VALUE)){
                $isi .= '<tr>';
                    $isi .= td_class_colspan_me('text-center',$jumlah_kolom,'"'.$VALUE.'"'.flash_messages(7)); 
                $isi .= '</tr>';                
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

    function select_id_data_1_002101($ID,$COL_NAME){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

        // ------------------------------------------------------------------------- ACTION
            $isi = data_002101::read_data_by_id($ID,$COL_NAME);
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////    
    }