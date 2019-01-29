<?php

	use App\daftar_multi_hak_akses;
	use App\app_list;

	// Multi Hak Akses
    // create_menu_1_21();    
    function create_menu_1_21(){
        // ------------------------------------------------------------------------- INITIALIZE
            $status_id      = '1';
            $dmha_id        = '21';
            $parent_id      = NULL;
            $tipe           = '1';
            $urutan         = '5';
            $nama           = 'Admin Control';
            $link           = 'javascript:;';
            $deskripsi      = NULL;
            $has_sub        = 'has-sub';
            $icon           = '57';
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

    // Work Order sub menu by default
    // create_sub_menu_by_default_1_21();
    function create_named_sub_menu_1_21($NAMA,$STATUS){ 
        // ------------------------------------------------------------------------- MAIN INITIALIZE
            $status_id      = '1';
            $parent_id      = '21';
            $tipe           = '1';
            $urutan         = '3';
            $deskripsi      = 'Admin Control';
            $has_sub        = NULL;
            $ui             = '1';
            $content        = '0';
            $custom_css_js  = '0';

        // ------------------------------------------------------------------------- SUB INITIALIZE DATA
            $dmha_id        = $parent_id.'01';
            $urutan         ++;
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
            $deskripsi     .= ' '.$NAMA;
            $content        = '4';
            $custom_css_js  = '4';

        // ------------------------------------------------------------------------- SUB-SUB INITIALIZE DATA
            $dmha_id        = $temp_dmha.'01';
            $urutan         ++;
            $nama           = 'Data';
            $link           = str_replace(' ', '_', $nama.' '.$deskripsi);
            $icon           = '40';
            $css_js         = '3';
            $tipe_data      = '7';
            $form           = NULL;
            $kategori       = '1';

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

        // ------------------------------------------------------------------------- SUB-SUB INITIALIZE ADD
            $dmha_id        = $temp_dmha.'02';
            $urutan         ++;
            $nama           = 'Add';
            $link           = str_replace(' ', '_', $nama.' '.$deskripsi);
            $icon           = '75';
            $css_js         = '4';
            $tipe_data      = '1';
            $form           = '1';
            $kategori       = '1';
            $custom_css_js  = '2';

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
            $dmha_id        = $temp_dmha.'03';
            $urutan         ++;
            $nama           = 'Edit';
            $link           = str_replace(' ', '_', $nama.' '.$deskripsi);
            $icon           = '71';
            $css_js         = '4';
            $tipe_data      = '2';
            $form           = '1';
            $kategori       = '2';

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

            /*

        // ------------------------------------------------------------------------- SUB-SUB INITIALIZE COPY
            $dmha_id        = $temp_dmha.count_sub_dmha($parent_id);
            $urutan         ++;
            $nama           = 'Copy';
            $link           = str_replace(' ', '_', $nama.' '.$deskripsi);
            $icon           = '91';
            $css_js         = '4';
            $tipe_data      = '3';
            $form           = '1';
            $kategori       = '2';

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
            */

        // ------------------------------------------------------------------------- SUB-SUB INITIALIZE DELETE
            $dmha_id        = $temp_dmha.'04';
            $urutan         ++;
            $nama           = 'Delete';
            $link           = str_replace(' ', '_', $nama.' '.$deskripsi);
            $icon           = '72';
            $css_js         = '4';
            $tipe_data      = '4';
            $form           = '1';
            $kategori       = '2';

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
