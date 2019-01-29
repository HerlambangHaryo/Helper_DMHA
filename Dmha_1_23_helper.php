<?php

	use App\daftar_multi_hak_akses;
	use App\app_list;

	// Maintenance
    // create_menu_1_23();
    function create_menu_1_23(){        
        // ------------------------------------------------------------------------- INITIALIZE
            $status_id      = '1';
            $dmha_id        = '23';
            $parent_id      = NULL;
            $tipe           = '1';
            $urutan         = '2';
            $nama           = 'Maintenance';
            $link           = 'javascript:;';
            $deskripsi      = NULL;
            $has_sub        = NULL;
            $icon           = '89';
            $css_js         = NULL;
            $ui             = NULL;
            $tipe_data      = '6';
            $form           = NULL;
            $kategori       = '3';

        // ------------------------------------------------------------------------- ACTION
            // delete dmha yang sama
            daftar_multi_hak_akses::double_dmha_checking($dmha_id);

            // delete dmha yang sama
            app_list::double_app_list_checking($dmha_id);

            // insert dmha terbaru            
            //full_insert($STATUS_ID,$DMHA_ID,$PARENT_ID,$TIPE,$URUTAN,$NAMA,$LINK,$DESKRIPSI,$HAS_SUB,$ICON,$CSS_JS,$UI,$TIPE_DATA,$FORM,$KATEGORI)
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori);

            // insert dmha terbaru
            app_list::full_insert($dmha_id);
        ////////////////////////////////////////////////////////////////////////////        
    }

    // Maintenance sub menu by default
    // create_sub_menu_by_default_1_23();
    function create_sub_menu_1_23(){ 
        // ------------------------------------------------------------------------- MAIN INITIALIZE
            $status_id      = '1';
            $parent_id      = '23';
            $tipe           = '1';
            $urutan         = 0;
            $deskripsi      = 'Maintenance';
            $has_sub        = NULL;
            $ui             = '1';

        // ------------------------------------------------------------------------- SUB INITIALIZE DATA
            $dmha_id        = $parent_id.'01';
            $urutan         ++;
            $nama           = 'Data';
            $link           = str_replace(' ', '_', $nama.' '.$deskripsi);
            $icon           = '40';
            $css_js         = '3';
            $tipe_data      = '7';
            $form           = NULL;
            $kategori       = '1';

        // ------------------------------------------------------------------------- ACTION
            // delete dmha yang sama
            daftar_multi_hak_akses::double_dmha_checking($dmha_id);

            // insert dmha terbaru            
            //full_insert($STATUS_ID,$DMHA_ID,$PARENT_ID,$TIPE,$URUTAN,$NAMA,$LINK,$DESKRIPSI,$HAS_SUB,$ICON,$CSS_JS,$UI,$TIPE_DATA,$FORM,$KATEGORI)
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori);

        // ------------------------------------------------------------------------- SUB INITIALIZE ADD
            $dmha_id        = $parent_id.'02';
            $urutan         ++;
            $nama           = 'Add';
            $link           = str_replace(' ', '_', $nama.' '.$deskripsi);
            $icon           = '75';
            $css_js         = '4';
            $tipe_data      = '1';
            $form           = '1';
            $kategori       = '1';

        // ------------------------------------------------------------------------- ACTION
            // delete dmha yang sama
            daftar_multi_hak_akses::double_dmha_checking($dmha_id);

            // insert dmha terbaru            
            //full_insert($STATUS_ID,$DMHA_ID,$PARENT_ID,$TIPE,$URUTAN,$NAMA,$LINK,$DESKRIPSI,$HAS_SUB,$ICON,$CSS_JS,$UI,$TIPE_DATA,$FORM,$KATEGORI)
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori);

        // ------------------------------------------------------------------------- SUB INITIALIZE EDIT
            $dmha_id        = $parent_id.'03';
            $urutan         ++;
            $nama           = 'Edit';
            $link           = str_replace(' ', '_', $nama.' '.$deskripsi);
            $icon           = '71';
            $css_js         = '4';
            $tipe_data      = '2';
            $form           = '1';
            $kategori       = '2';

        // ------------------------------------------------------------------------- ACTION
            // delete dmha yang sama
            daftar_multi_hak_akses::double_dmha_checking($dmha_id);

            // insert dmha terbaru            
            //full_insert($STATUS_ID,$DMHA_ID,$PARENT_ID,$TIPE,$URUTAN,$NAMA,$LINK,$DESKRIPSI,$HAS_SUB,$ICON,$CSS_JS,$UI,$TIPE_DATA,$FORM,$KATEGORI)
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori);

            /*
        // ------------------------------------------------------------------------- SUB INITIALIZE COPY
            $dmha_id        = $parent_id.count_sub_dmha($parent_id);
            $urutan         ++;
            $nama           = 'Copy';
            $link           = str_replace(' ', '_', $nama.' '.$deskripsi);
            $icon           = '91';
            $css_js         = '4';
            $tipe_data      = '3';
            $form           = '1';
            $kategori       = '2';

        // ------------------------------------------------------------------------- ACTION
            // delete dmha yang sama
            daftar_multi_hak_akses::double_dmha_checking($dmha_id);

            // insert dmha terbaru            
            //full_insert($STATUS_ID,$DMHA_ID,$PARENT_ID,$TIPE,$URUTAN,$NAMA,$LINK,$DESKRIPSI,$HAS_SUB,$ICON,$CSS_JS,$UI,$TIPE_DATA,$FORM,$KATEGORI)
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori);
            */

        // ------------------------------------------------------------------------- SUB INITIALIZE DELETE
            $dmha_id        = $parent_id.'04';
            $urutan         ++;
            $nama           = 'Delete';
            $link           = str_replace(' ', '_', $nama.' '.$deskripsi);
            $icon           = '71';
            $css_js         = '4';
            $tipe_data      = '4';
            $form           = '1';
            $kategori       = '2';

        // ------------------------------------------------------------------------- ACTION
            // delete dmha yang sama
            daftar_multi_hak_akses::double_dmha_checking($dmha_id);

            // insert dmha terbaru            
            //full_insert($STATUS_ID,$DMHA_ID,$PARENT_ID,$TIPE,$URUTAN,$NAMA,$LINK,$DESKRIPSI,$HAS_SUB,$ICON,$CSS_JS,$UI,$TIPE_DATA,$FORM,$KATEGORI)
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori);

        //////////////////////////////////////////////////////////////////////////// 
    }
