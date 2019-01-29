<?php

    use App\data_002901;
    use App\data_002906;

    // CMS Control 
    // data_1_002901();
    function read_table_data_1_002919($AUTH_MAS,$VALUE){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            
            if(!is_null($VALUE))
                {$isi_model = data_002901::read_data_order_by_desc_and_value($VALUE,2);}
            elseif(is_null($VALUE))
                {$isi_model = data_002901::read_data_order_by_desc(2);}

            $isi .= '<colgroup>';
                $isi .= '<col width="'.action_width_general().'">';
                $isi .= col_loop(3);
                $isi .= '<col width="'.action_width_general().'">';
            $isi .= '</colgroup>';

            $isi .= '<thead>';
            $isi .= '<tr>';
                $isi .= th_me('ID');
                $isi .= th_me('Name');
                $isi .= th_me('Status');
                $isi .= th_me('Active');
                $isi .= th_me('Action');
            $isi .= '</tr>';
            $isi .= '</thead>';

            $isi .= '<tbody>';
        // ------------------------------------------------------------------------- ACTION
            if(count($isi_model) > 0){
                foreach ($isi_model as $row) {
                    $isi .= '<tr>';
                        $isi .= td_class_me('text-right',$row->id);
                        $isi .= td_me($row->nama);
                        $isi .= td_class_me('text-center',data_002906::read_data_by_id($row->status_id,'nama')); 
                        $isi .= td_class_me('text-center',active_badge($row->aktif));
                        $isi .= td_class_me('text-center',generate_dropdown_button($AUTH_MAS,'002919',$row->id));      
                    $isi .= '</tr>';
                }
            }else{
                $isi .= '<tr>';
                    $isi .= td_class_colspan_me('text-center',5,flash_messages(6)); 
                $isi .= '</tr>';                
            }
            $isi .= '</tbody>';
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////    
    }