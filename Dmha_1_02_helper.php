<?php

    use App\daftar_multi_hak_akses;
    use App\app_list;
    use App\icons;
    use App\data_02;
    use App\data_details_02;

// ------------------------------------------------------------------------------------------------------------ new
    function check_berkas_data_id($SUMBER_DATA_PENGISIAN_ID)
    {        
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

        // ------------------------------------------------------------------------- ACTION
            $isi = data_details_02::check_berkas_data_id($SUMBER_DATA_PENGISIAN_ID);

        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////        
    }

    function check_berkas_id($DMHA_ID,$KODE_UNIK)
    {        
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

        // ------------------------------------------------------------------------- ACTION
            $isi = data_02::check_berkas_id($DMHA_ID,$KODE_UNIK);

        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////        
    }

    function table_multi_sdp_1($SUMBER_DATA_PENGISIAN_ID,$KODE_UNIK){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $isi_model = data_02::read_multi_sdp($SUMBER_DATA_PENGISIAN_ID,$KODE_UNIK);
            $counter = 0;

            $isi .= '<colgroup>';
                $isi .= '<col width="'.action_width_general().'">';
                $isi .= '<col>';
                $isi .= '<col>';
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
                $isi .= 'Sebagai';
                $isi .= '</th>';
                $isi .= '<th>';
                $isi .= 'Nama';
                $isi .= '</th>';
                $isi .= '<th>';
                $isi .= 'Tanggal Lahir';
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
                        $isi .= $row->berkas_data_id;
                        $isi .= '</td>';
                        $isi .= '<td class="text-right">';
                        $isi .= $row->helper1;
                        $isi .= '</td>';
                        $isi .= '<td>';
                        $isi .= $row->helper2;
                        $isi .= '</td>';
                        $isi .= '<td>';
                        $isi .= $row->helper3;
                        $isi .= '</td>';
                        $isi .= '<td class="text-center">';
                        $isi .= generate_dropdown_button('2133',$row->id);
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

    function table_multi_sdp_3($SUMBER_DATA_PENGISIAN_ID,$KODE_UNIK){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $isi_model = data_02::read_multi_sdp($SUMBER_DATA_PENGISIAN_ID,$KODE_UNIK);
            $counter = 0;

            $isi .= '<colgroup>';
                $isi .= '<col>';                
                $isi .= '<col>';
                $isi .= '<col>';
                $isi .= '<col width="'.action_width_general().'">';
            $isi .= '<tr>';
            $isi .= '</colgroup>';
            $isi .= '<thead>';
            $isi .= '<tr>';
                $isi .= '<th>';
                $isi .= 'NOP';
                $isi .= '</th>';
                $isi .= '<th>';
                $isi .= 'Nama';
                $isi .= '</th>';
                $isi .= '<th>';
                $isi .= 'Luas Bumi';
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
                        $isi .= $row->berkas_data_id;
                        $isi .= '</td>';
                        $isi .= '<td class="text-right">';
                        $isi .= $row->helper1;
                        $isi .= '</td>';
                        $isi .= '<td>';
                        $isi .= $row->helper2;
                        $isi .= '</td>';
                        $isi .= '<td>';
                        $isi .= $row->helper3;
                        $isi .= '</td>';
                        $isi .= '<td class="text-center">';
                        $isi .= generate_dropdown_button('2133',$row->id);
                        $isi .= '</td>';
                    $isi .= '</tr>';
                }
            }else{
                $isi .= '<tr>';
                    $isi .= '<td class="text-center" colspan="4">';
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

    function table_multi_sdp_6($SUMBER_DATA_PENGISIAN_ID,$KODE_UNIK){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $isi_model = data_02::read_multi_sdp($SUMBER_DATA_PENGISIAN_ID,$KODE_UNIK);
            $counter = 0;

            $isi .= '<colgroup>';
                $isi .= '<col width="'.action_width_general().'">';
                $isi .= '<col>';
                $isi .= '<col>';
                $isi .= '<col>';
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
                $isi .= 'Tanggal Peralihan';
                $isi .= '</th>';
                $isi .= '<th>';
                $isi .= 'Perolehan';
                $isi .= '</th>';
                $isi .= '<th>';
                $isi .= 'Alas Hak';
                $isi .= '</th>';
                $isi .= '<th>';
                $isi .= 'No. Hak';
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
                        $isi .= $row->berkas_data_id;
                        $isi .= '</td>';
                        $isi .= '<td class="text-right">';
                        $isi .= $row->helper1;
                        $isi .= '</td>';
                        $isi .= '<td>';
                        $isi .= $row->helper2;
                        $isi .= '</td>';
                        $isi .= '<td>';
                        $isi .= $row->helper3;
                        $isi .= '</td>';
                        $isi .= '<td class="text-center">';
                        $isi .= generate_dropdown_button('2133',$row->id);
                        $isi .= '</td>';
                    $isi .= '</tr>';
                }
            }else{
                $isi .= '<tr>';
                    $isi .= '<td class="text-center" colspan="6">';
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

// ------------------------------------------------------------------------------------------------------------ old
    // Pengurusan
    // create_menu_1_02();
    function create_menu_1_02(){        
        // ------------------------------------------------------------------------- INITIALIZE
            $status_id      = '1';
            $dmha_id        = '02';
            $parent_id      = NULL;
            $tipe           = '1';
            $urutan         = '1';
            $nama           = 'Pengurusan';
            $link           = 'javascript:;';
            $deskripsi      = NULL;
            $has_sub        = 'has-sub';
            $icon           = '16';
            $css_js         = NULL;
            $ui             = NULL;
            $tipe_data      = NULL;
            $form           = NULL;
            $kategori       = '3';
            $content        = '0';
            $custom_css_js  = '0';

        // ------------------------------------------------------------------------- ACTION
            // delete dmha yang sama
            daftar_multi_hak_akses::double_dmha_checking($dmha_id);

            // delete dmha yang sama
            app_list::double_app_list_checking($dmha_id);

            // insert dmha terbaru            
            //full_insert($STATUS_ID,$DMHA_ID,$PARENT_ID,$TIPE,$URUTAN,$NAMA,$LINK,$DESKRIPSI,$HAS_SUB,$ICON,$CSS_JS,$UI,$TIPE_DATA,$FORM,$KATEGORI)
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori,$content,$custom_css_js);

            // insert dmha terbaru
            app_list::full_insert($dmha_id);

        ////////////////////////////////////////////////////////////////////////////        
    }

    // Pengurusan sub menu by default
    // create_named_sub_menu_1_02();
    function create_named_sub_menu_1_02($DESKRIPSI,$STATUS){ 
        // ------------------------------------------------------------------------- MAIN INITIALIZE
            $PARENT_ID = '02';

            if(is_null($STATUS)){
                $COUNT = count_sub_dmha($PARENT_ID);
            }else{
                $COUNT = count_sub_dmha($PARENT_ID);                
            }
       
        // ------------------------------------------------------------------------- ACTION            
            create_dmha($PARENT_ID,$COUNT,'New',$DESKRIPSI,0);
        // ------------------------------------------------------------------------- ACTION            
            create_dmha($PARENT_ID.$COUNT,'01','Data',$DESKRIPSI,1);         
            create_dmha($PARENT_ID.$COUNT,'02','Add',$DESKRIPSI,1);         
            create_dmha($PARENT_ID.$COUNT,'03','Edit',$DESKRIPSI,1);         
            create_dmha($PARENT_ID.$COUNT,'04','Delete',$DESKRIPSI,1);       
            create_dmha($PARENT_ID.$COUNT,'05','Copy',$DESKRIPSI,1);          
            create_dmha($PARENT_ID.$COUNT,'06','Set Print',$DESKRIPSI,1);

        //////////////////////////////////////////////////////////////////////////// 
    }

     // data_1_2102();
    function data_1_02_order_by_desc($PARENT_ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
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
            //foreach ($isi_model as $row) {
                $counter++;
                $isi .= '<tr>';
                    $isi .= '<td class="text-right">';
                    $isi .= $counter;
                    $isi .= '</td>';
                    $isi .= '<td>';
                    $isi .=  'aa';
                    $isi .= '</td>';
                    $isi .= '<td class="text-center">';
                    $isi .= generate_dropdown_button($PARENT_ID,'1');
                    $isi .= '</td>';
                $isi .= '</tr>';
            //}
            $isi .= '</tbody>';
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////    
    }