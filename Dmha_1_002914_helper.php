<?php

    use App\data_002914;
    use App\data_002901;
    use App\data_002902;
    use App\data_002903;
    use App\data_002904;
    use App\data_002905;
    use App\data_002906;
    use App\data_002907;
    use App\data_002908;
    use App\data_002911;
    use App\data_002913;

    // CMS Control 
    // data_1_002914();
    function read_table_data_1_002914($AUTH_MAS,$VALUE,$SCREEN_WIDTH){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            if($SCREEN_WIDTH < 1366)
                {$jumlah_kolom = 8;}
            else
                {$jumlah_kolom = 11;}
            
            
            if(!is_null($VALUE))
                {$isi_model = data_002914::read_data_order_by_desc_and_value($VALUE);}
            elseif(is_null($VALUE))
                {$isi_model = data_002914::read_data_order_by_desc();}

            $isi .= '<colgroup>';
                $isi .= col_loop($jumlah_kolom-2);
                $isi .= '<col width="'.action_width_general().'">';
            $isi .= '<tr>';
            $isi .= '</colgroup>';
            $isi .= '<thead>';
            $isi .= '<tr>';        
                $isi .= th_me('Status<br/>DMHA<br/>Parent');
                $isi .= th_me('Tipe<br/>Has-Sub');
                $isi .= th_me('Urutan');
                $isi .= th_me('Nama');

                if($SCREEN_WIDTH < 1366)
                {
                    $isi .= th_me('Content<br/>UI');
                    $isi .= th_me('Css Js');
                    $isi .= th_me('Custom Css Js');
                }

                $isi .= th_me('Tipe Data');
                $isi .= th_me('Kategori');
                $isi .= th_me('SDP');
                $isi .= th_me('Action');
            $isi .= '</tr>';
            $isi .= '</thead>';

            $isi .= '<tbody>';
        // ------------------------------------------------------------------------- ACTION
            if(count($isi_model) > 0){
                foreach ($isi_model as $row) {
                    $isi .= '<tr>';

                        $isi .= td_me('<b>'.data_002906::read_data_by_id($row->status_id,'nama').'</b><br/>'.$row->dmha_id.'<br/>'.$row->parent_id);

                        $isi .= td_class_me('text-center',data_002907::read_data_by_id($row->tipe,'nama').'<br/>'.$row->has_sub);

                        $isi .= td_class_me('text-center',$row->urutan);   

                        $isi .= td_me(convert_me_to_font_awesome($row->icon).' '.$row->nama.' <b>'.data_002904::read_data_by_id($row->form,'nama').'</b><br/>'.$row->link.'<br/>'.$row->deskripsi);



                        if($SCREEN_WIDTH < 1366)
                        {
                            $isi .= td_class_me('text-center',data_002902::read_data_by_id($row->content,'nama').'<br/>'.data_002901::read_data_by_id($row->ui,'nama'));
                            
                            $isi .= td_class_me('text-center',data_002913::read_data_by_id($row->css_js,'nama'));

                            $isi .= td_class_me('text-center',data_002903::read_data_by_id($row->custom_css_js,'nama'));
                        }




                        $isi .= td_class_me('text-center',data_002908::read_data_by_id($row->tipe_data,'nama'));

                        $isi .= td_class_me('text-center',data_002905::read_data_by_id($row->kategori,'nama'));

                        $isi .= td_class_me('text-center',data_002911::read_data_by_id($row->data_002911_id,'nama'));

                        $isi .= td_class_me('text-center',generate_dropdown_button($AUTH_MAS,'002914',$row->prim));   
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