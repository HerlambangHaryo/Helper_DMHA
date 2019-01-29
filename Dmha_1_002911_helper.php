<?php

    use App\data_002909;
    use App\data_002911;

    // CMS Control 
    // data_1_002911();
    function read_table_data_1_002911($AUTH_MAS,$VALUE){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            
            if(!is_null($VALUE))
                {$isi_model = data_002911::read_data_order_by_desc_and_value($VALUE);}
            elseif(is_null($VALUE))
                {$isi_model = data_002911::read_data_order_by_desc();}

            $isi .= '<colgroup>';
                $isi .= '<col width="'.action_width_general().'">';
                $isi .= col_loop(4);
                $isi .= '<col width="'.action_width_general().'">';
            $isi .= '</colgroup>';

            $isi .= '<thead>';
            $isi .= '<tr>';
                $isi .= th_me('ID');
                $isi .= th_me('Name');
                $isi .= th_me('Multi Data');
                $isi .= th_me('Acuan Pertanyaan ID');
                $isi .= th_me('Urutan');
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
                        $isi .= td_class_me('text-center',active_yes_no($row->multi_data));
                        $isi .= td_class_me('text-center',data_002909::read_data_by_id($row->acuan_pertanyaan_id,'nama')); 
                        $isi .= td_class_me('text-center',$row->urutan);
                        $isi .= td_class_me('text-center',generate_dropdown_button($AUTH_MAS,'002911',$row->id));
                    $isi .= '</tr>';
                }
            }elseif(count($isi_model) == 0 && !is_null($VALUE)){
                $isi .= '<tr>';
                    $isi .= td_class_colspan_me('text-center',10,'"'.$VALUE.'"'.flash_messages(7)); 
                $isi .= '</tr>';                
            }else{
                $isi .= '<tr>';
                    $isi .= td_class_colspan_me('text-center',6,flash_messages(6)); 
                $isi .= '</tr>';                
            }
            $isi .= '</tbody>';
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////    
    }