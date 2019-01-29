<?php

    use App\data_0004;
    use App\data_002914;
        use Carbon\Carbon;

    // CMS Control 
    // data_1_002917();
    function read_table_data_1_0004($AUTH_MAS,$PARENT_ID,$VALUE,$SCREEN_WIDTH)
    {
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            if($SCREEN_WIDTH < 1366)
                {$jumlah_kolom = 8;}
            else
                {$jumlah_kolom = 11;}
            
            if(!is_null($VALUE))
                {$isi_model = data_0004::read_data_order_by_desc_and_value($PARENT_ID,$VALUE);}
            elseif(is_null($VALUE))
                {$isi_model = data_0004::read_data_order_by_desc($PARENT_ID);}

            $isi .= '<colgroup>';
                $isi .= '<col width="'.action_width_general().'">';
                $isi .= col_loop(3);
                $isi .= '<col width="'.action_width_general().'">';
            $isi .= '</colgroup>';
            
            $isi .= '<thead>';
            $isi .= '<tr>';
                $isi .= th_me('ID');
                $isi .= th_me('Menit');
                $isi .= th_me('Deskripsi');
                $isi .= th_me('Status');
                $isi .= th_me('Action');
            $isi .= '</tr>';
            $isi .= '</thead>';

            $isi .= '<tbody>';
        // ------------------------------------------------------------------------- ACTION
            if(count($isi_model) > 0)
            {
                foreach ($isi_model as $row) 
                {
                    $isi .= '<tr>';
                        $isi .= td_class_me('text-right', $row->id);
                        $isi .= td_class_me('text-center', $row->minute);

                        $description = '';
                        $description .= $row->description;

                        if(!is_null($row->start))
                        {
                            $description .= '<br/>';

                            $dt = new Carbon($row->start);

                            $description .= $dt->toDayDateTimeString();
                        }

                        $isi .= td_me($description);

                        $isi .= td_class_me('text-center', generate_button_table($AUTH_MAS,$PARENT_ID,$row->id)); 
                        $isi .= td_class_me('text-center', generate_dropdown_button($AUTH_MAS,$PARENT_ID,$row->id));      
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

    function data_0004_isi($LINK)
    {
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
        // ------------------------------------------------------------------------- ACTION
            $INIT_param_1 = data_002914::let_me_check_what_is_your_dmha_id($LINK);

            $isi_model = data_0004::read_data_order_by_desc($INIT_param_1->parent_id);

            $isi .= '<div class="bold text-center">';
                $isi .= $INIT_param_1->deskripsi;
            $isi .= '</div>';

            $isi .= '<table class="content-margin-t-10">';
                $isi .= '<colgroup>';
                    $isi .= '<col width="'.action_width_general().'">';
                    $isi .= '<col width="80%">';
                    $isi .= '<col width="'.action_width_general().'">';
                $isi .= '</colgroup>';

            $isi .= '<tbody>';
            foreach ($isi_model as $row) 
            {
                $isi .= '<tr>';
                $isi .= td_class_me('border-full content-padding-10 text-center', $row->minute);
                $isi .= td_class_me('border-full content-padding-10', $row->description);
                $isi .= td_class_me('border-full content-padding-10', '<span class="hidden">000</span>');
                $isi .= '</tr>';         
            }

            $isi .= '</tbody>';
            $isi .= '</table>';

        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////   
    }

    function sum_final_score_1_0004()
    {
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
        // ------------------------------------------------------------------------- ACTION
            $isi = data_0004::total_final_score();

        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////   

    }