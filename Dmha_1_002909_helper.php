<?php

    use App\data_002909;
    use App\data_002910;
    use App\data_002911;

    // CMS Control 
    // data_1_002909();
    function read_table_data_1_002909($AUTH_MAS,$VALUE){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            
            if(!is_null($VALUE))
                {$isi_model = data_002909::read_data_order_by_desc_and_value($VALUE);}
            elseif(is_null($VALUE))
                {$isi_model = data_002909::read_data_order_by_desc();}

            $isi .= '<colgroup>';
                $isi .= '<col width="'.action_width_general().'">';
                $isi .= col_loop(10);
                $isi .= '<col width="'.action_width_general().'">';
            $isi .= '</colgroup>';
            $isi .= '<thead>';
            $isi .= '<tr>';
                $isi .= th_me('ID');
                $isi .= th_me('Nama');
                $isi .= th_me('Class Pertanyaan');
                $isi .= th_me('Sumber Data Pengisian');
                $isi .= th_me('Pertanyaan Type');
                $isi .= th_me('Panjang Field');
                $isi .= th_me('Urutan');
                $isi .= th_me('id Acuan');
                $isi .= th_me('id Acuan 2');
                $isi .= th_me('Required');
                $isi .= th_me('Kata Hubung');
                $isi .= th_me('Action');
            $isi .= '</tr>';
            $isi .= '</thead>';

            $isi .= '<tbody>';
        // ------------------------------------------------------------------------- ACTION
            if(count($isi_model) > 0){
                foreach ($isi_model as $row) {
                    //$counter++;
                    $isi .= '<tr>';
                        $isi .= td_class_me('text-center',$row->id);

                        $isi .= td_me($row->nama.'<br><i>'.$row->name.'</i>');

                        $isi .= td_me($row->class_pertanyaans);

                        $isi .= td_class_me('text-center',data_002911::read_data_by_id($row->sumber_data_pengisian_id,'nama'));

                        $isi .= td_class_me('text-center',data_002910::read_data_by_id($row->tipe_pertanyaan_id,'nama'));

                        $isi .= td_class_me('text-center',$row->panjang_field);

                        $isi .= td_class_me('text-center',$row->urutan);

                        $isi .= td_me(data_002909::read_data_by_id($row->id_acuan,'nama'));

                        $isi .= td_me(data_002909::read_data_by_id($row->id_acuan2,'nama'));

                        $isi .= td_class_me('text-center',active_yes_no($row->required));

                        $isi .= td_class_me('text-center',$row->kata_hubung);

                        $isi .= td_class_me('text-center',generate_dropdown_button($AUTH_MAS,'002909',$row->id));       
                    $isi .= '</tr>';
                }
            }elseif(count($isi_model) == 0 && !is_null($VALUE)){
                $isi .= '<tr>';
                    $isi .= td_class_colspan_me('text-center',10,'"'.$VALUE.'"'.flash_messages(7)); 
                $isi .= '</tr>';                
            }else{
                $isi .= '<tr>';
                    $isi .= td_class_colspan_me('text-center',12,flash_messages(6)); 
                $isi .= '</tr>';                
            }
            $isi .= '</tbody>';
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////    
    }