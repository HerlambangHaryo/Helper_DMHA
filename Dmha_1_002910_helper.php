<?php

    use App\data_002910;
    use App\data_002915;

    // CMS Control 
    // data_1_002910();
    function read_table_data_1_002910($AUTH_MAS,$VALUE){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            
            if(!is_null($VALUE))
                {$isi_model = data_002910::read_data_order_by_desc_and_value($VALUE);}
            elseif(is_null($VALUE))
                {$isi_model = data_002910::read_data_order_by_desc();}

            $isi .= '<colgroup>';
                $isi .= '<col width="'.action_width_general().'">';
                $isi .= col_loop(4);
                $isi .= '<col width="'.action_width_general().'">';
            $isi .= '</colgroup>';
            $isi .= '<thead>';
            $isi .= '<tr>';
                $isi .= th_me('ID');
                $isi .= th_me('Nama');
                $isi .= th_me('Input Type');
                $isi .= th_me('Class');
                $isi .= th_me('JQuery');
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
                        $isi .= td_class_me('text-center',data_002915::read_data_by_id($row->input_type,'nama'));
                        $isi .= td_class_me('text-center',$row->class);
                        $isi .= td_class_me('text-center',$row->jquery);
                        $isi .= td_class_me('text-center',generate_dropdown_button($AUTH_MAS,'002910',$row->id));     

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