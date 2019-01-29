<?php

	use App\daftar_multi_hak_akses;
	use App\app_list;

	// Map Permohonan
    // create_menu_1_05();    
    function create_menu_1_05(){
        // ------------------------------------------------------------------------- INITIALIZE
            $status_id      = '1';
            $dmha_id        = '05';
            $parent_id      = NULL;
            $tipe           = '1';
            $urutan         = '5';
            $nama           = 'Map Permohonan';
            $link           = 'javascript:;';
            $deskripsi      = NULL;
            $has_sub        = 'has-sub';
            $icon           = '93';
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

    // create_sub_menu_1_05();    
    function create_sub_menu_1_05($PARENT_ID,$NAMA,$STATUS){
        // ------------------------------------------------------------------------- MAIN INITIALIZE
            $status_id      = '1';
            $parent_id      = $PARENT_ID;
            $tipe           = '1';
            $urutan         = '0';
            $deskripsi      = 'Map Permohonan';
            $has_sub        = NULL;
            $ui             = '1';
            $content        = '0';
            $custom_css_js  = '0';

        // ------------------------------------------------------------------------- SUB INITIALIZE DATA
            $dmha_id        = $parent_id.count_sub_dmha($parent_id);
            $nama           = str_replace('_', ' ', $NAMA);
            $link           = 'javascript:;';
            $icon           = NULL;
            $css_js         = NULL;
            $tipe_data      = '6';
            $form           = NULL;
            $kategori       = '1';
            $temp_dmha      = $dmha_id;

        // ------------------------------------------------------------------------- ACTION
            if(strtolower($STATUS) == 'new'){
                $dmha_id    = $parent_id.count_sub_dmha($parent_id);
            }else{
                daftar_multi_hak_akses::double_dmha_checking($STATUS.'%');
                $dmha_id    = $STATUS;
            }

            // insert dmha terbaru            
            //full_insert($STATUS_ID,$DMHA_ID,$PARENT_ID,$TIPE,$URUTAN,$NAMA,$LINK,$DESKRIPSI,$HAS_SUB,$ICON,$CSS_JS,$UI,$TIPE_DATA,$FORM,$KATEGORI)
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori,$content,$custom_css_js);
        ////////////////////////////////////////////////////////////////////////////        
    }

    // Pengurusan sub menu by default
    // create_named_sub_menu_1_02();
    function create_sub_sub_menu_1_05($PARENT_ID,$NAMA,$STATUS){ 
        // ------------------------------------------------------------------------- MAIN INITIALIZE
            $status_id      = '1';
            $parent_id      = $PARENT_ID;
            $tipe           = '1';
            $urutan         = '0';
            $deskripsi      = 'Map Permohonan';
            $has_sub        = NULL;
            $ui             = '1';
            $content        = '0';
            $custom_css_js  = '0';

        // ------------------------------------------------------------------------- SUB INITIALIZE DATA
            $dmha_id        = $parent_id.count_sub_dmha($parent_id);
            $nama           = str_replace('_', ' ', $NAMA);
            $link           = 'javascript:;';
            $icon           = NULL;
            $css_js         = NULL;
            $tipe_data      = '6';
            $form           = NULL;
            $kategori       = '1';
            $temp_dmha      = $dmha_id;

        // ------------------------------------------------------------------------- ACTION
            if(strtolower($STATUS) == 'new'){
                $dmha_id    = $parent_id.count_sub_dmha($parent_id);
            }else{
                daftar_multi_hak_akses::double_dmha_checking($STATUS.'%');
                $dmha_id    = $STATUS;
            }

            // insert dmha terbaru            
            //full_insert($STATUS_ID,$DMHA_ID,$PARENT_ID,$TIPE,$URUTAN,$NAMA,$LINK,$DESKRIPSI,$HAS_SUB,$ICON,$CSS_JS,$UI,$TIPE_DATA,$FORM,$KATEGORI)
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori,$content,$custom_css_js);

        // ------------------------------------------------------------------------- RE-SUB INITIALIZE DATA
            $parent_id      = $dmha_id;
            $deskripsi      = str_replace('_', ' ', $NAMA);
            $urutan         = 0;

        // ------------------------------------------------------------------------- SUB-SUB INITIALIZE Set Print
            $dmha_id        = $temp_dmha.count_sub_dmha($parent_id);
            $urutan         ++;
            $nama           = 'Print';
            $link           = str_replace(' ', '_', $nama.' '.$deskripsi);
            $icon           = '91';
            $css_js         = '4';
            $tipe_data      = '8';
            $form           = NULL;
            $kategori       = '2';
            $content        = '4';
            $custom_css_js  = '0';
            $tipe           = '4';
            $ui             = '6';

        // ------------------------------------------------------------------------- ACTION
            if(strtolower($STATUS) == 'new'){
                $dmha_id    = $parent_id.count_sub_dmha($parent_id);
            }else{
                daftar_multi_hak_akses::double_dmha_checking($STATUS.'%');
                $dmha_id    = $STATUS;
            }

            // insert dmha terbaru            
            //full_insert($STATUS_ID,$DMHA_ID,$PARENT_ID,$TIPE,$URUTAN,$NAMA,$LINK,$DESKRIPSI,$HAS_SUB,$ICON,$CSS_JS,$UI,$TIPE_DATA,$FORM,$KATEGORI)
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori,$content,$custom_css_js);


        // ------------------------------------------------------------------------- SUB-SUB INITIALIZE EDIT
            $dmha_id        = $temp_dmha.count_sub_dmha($parent_id);
            $urutan         ++;
            $nama           = 'Edit';
            $link           = str_replace(' ', '_', $nama.' '.$deskripsi);
            $icon           = '71';
            $css_js         = '4';
            $tipe_data      = '2';
            $form           = '1';
            $kategori       = '2';
            $content        = '4';
            $custom_css_js  = '2';
            $tipe           = '4';
            $ui             = '1';

        // ------------------------------------------------------------------------- ACTION
            if(strtolower($STATUS) == 'new'){
                $dmha_id    = $parent_id.count_sub_dmha($parent_id);
            }else{
                daftar_multi_hak_akses::double_dmha_checking($STATUS.'%');
                $dmha_id    = $STATUS;
            }

            // insert dmha terbaru            
            //full_insert($STATUS_ID,$DMHA_ID,$PARENT_ID,$TIPE,$URUTAN,$NAMA,$LINK,$DESKRIPSI,$HAS_SUB,$ICON,$CSS_JS,$UI,$TIPE_DATA,$FORM,$KATEGORI)
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori,$content,$custom_css_js);
            
        // ------------------------------------------------------------------------- SUB-SUB INITIALIZE DELETE
            $dmha_id        = $temp_dmha.count_sub_dmha($parent_id);
            $urutan         ++;
            $nama           = 'Delete';
            $link           = str_replace(' ', '_', $nama.' '.$deskripsi);
            $icon           = '72';
            $css_js         = '4';
            $tipe_data      = '4';
            $form           = '1';
            $kategori       = '2';
            $content        = '4';
            $custom_css_js  = '2';
            $tipe           = '4';

        // ------------------------------------------------------------------------- ACTION
            if(strtolower($STATUS) == 'new'){
                $dmha_id    = $parent_id.count_sub_dmha($parent_id);
            }else{
                daftar_multi_hak_akses::double_dmha_checking($STATUS.'%');
                $dmha_id    = $STATUS;
            }

            // insert dmha terbaru            
            //full_insert($STATUS_ID,$DMHA_ID,$PARENT_ID,$TIPE,$URUTAN,$NAMA,$LINK,$DESKRIPSI,$HAS_SUB,$ICON,$CSS_JS,$UI,$TIPE_DATA,$FORM,$KATEGORI)
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori,$content,$custom_css_js);

        
        //////////////////////////////////////////////////////////////////////////// 
    }

    // data_map_permohonan($PARENT_ID);    
    function data_map_permohonan($PARENT_ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $isi_model = daftar_multi_hak_akses::what_is_my_parent_id($PARENT_ID);
            $counter = 0;
            $random = str_random(3);
            
        // ------------------------------------------------------------------------- ACTION
            $isi .= accordion_open($random);
            foreach ($isi_model as $row) {
                $counter ++;
                $isi .= data_card_accordion_open($row->nama,$counter,$random);
                $isi .= data_tabel_open();

                $isi .= thead_data_map_permohonan();
                $isi .= tbody_data_map_permohonan($row->dmha_id);

                $isi .= data_tabel_close();
                $isi .= data_card_accordion_close();
            }
            $isi .= accordion_close();
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////        
    }

    // thead_data_map_permohonan();    
    function thead_data_map_permohonan(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
        // ------------------------------------------------------------------------- ACTION
            $isi .= '<thead>';
            $isi .= '<tr>';
            $isi .= '<th>';
            $isi .= '#';
            $isi .= '</th>';
            $isi .= '<th>';
            $isi .= 'Nama Surat';
            $isi .= '</th>';
            $isi .= '<th>';
            $isi .= 'Action';
            $isi .= '</th>';
            $isi .= '</tr>';
            $isi .= '</thead>';
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////        
    }

    // tbody_data_map_permohonan();    
    function tbody_data_map_permohonan($DMHA_ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $isi_model = daftar_multi_hak_akses::what_is_my_parent_id_by_tipe_data($DMHA_ID,8);
        // ------------------------------------------------------------------------- ACTION
            foreach ($isi_model as $row) {                
                $isi .= '<tbody>';
                $isi .= '<tr>';
                $isi .= '<td>';
                $isi .= '#';
                $isi .= '</td>';
                $isi .= '<td>';
                $isi .= $row->nama;
                $isi .= '<br/>';
                $isi .= $DMHA_ID;
                $isi .= '<br/>';
                $isi .= $row->dmha_id;
                $isi .= '</td>';
                $isi .= '<td>';
                $isi .= 'Action';
                $isi .= '</td>';
                $isi .= '</tr>';
                $isi .= '</tbody>';
            }
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////        
    }

    // ;    
    function data_1_05_for_set_print($DMHA_ID,$ID,$PARAM_2){
        // ------------------------------------------------------------------------- INITIALIZE
            //0501
            $isi = '';
            $isi_model = daftar_multi_hak_akses::what_is_my_parent_id($ID);
            $counter = 0;
            $random = str_random(3);

          
        // ------------------------------------------------------------------------- ACTION
            $isi .= accordion_open($random);
            foreach ($isi_model as $row) {
                $counter++;
                $isi .= data_card_accordion_open($row->nama,$counter,$random);
                $isi .= data_tabel_open();
                $isi .= data_1_05_for_table_set_print($DMHA_ID,$row->dmha_id,$PARAM_2);
                $isi .= data_tabel_close();
                $isi .= data_card_accordion_close();
            }
            $isi .= accordion_close();
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////        
    }


    function data_1_05_for_table_set_print($DMHA_ID,$ID,$PARAM_2){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $isi_model = daftar_multi_hak_akses::what_is_my_parent_id($ID);
            $counter = 0;

            $isi .= '<colgroup>';
                $isi .= '<col width="'.action_width_general().'">';
                $isi .= '<col>';
                $isi .= '<col width="'.action_width_general().'">';
            $isi .= '</colgroup>';
            $isi .= '<thead>';
            $isi .= '<tr>';
                $isi .= '<th>';
                $isi .= '#';
                $isi .= '</th>';
                $isi .= '<th>';
                $isi .= 'Nama Surat';
                $isi .= '</th>';
                $isi .= '<th>';
                $isi .= 'Action';
                $isi .= '</th>';
            $isi .= '</tr>';
            $isi .= '</thead>';

            $isi .= '<tbody>';
        // ------------------------------------------------------------------------- ACTION
            foreach ($isi_model as $row) {
                $counter++;
                $isi .= '<tr>';
                    $isi .= '<td class="text-right">';
                    $isi .=  $row->dmha_id;
                    $isi .= '</td>';
                    $isi .= '<td>';
                    $isi .=  $row->nama;
                    $isi .= '</td>';
                    $isi .= '<td class="text-center">';
                    $isi .= single_link($DMHA_ID,$ID,$row->dmha_id,$PARAM_2,8);
                    $isi .= '</td>';
                $isi .= '</tr>';
            }
            $isi .= '</tbody>';
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////        
    }


