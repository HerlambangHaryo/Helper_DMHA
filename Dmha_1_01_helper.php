<?php

	use App\daftar_multi_hak_akses;
	use App\app_list;

	// dashboard
    // create_menu_1_01($APP_MODE)
	function create_menu_1_01($APP_MODE){
        // ------------------------------------------------------------------------- INITIALIZE
            $dmha_id    = '01';

		// ------------------------------------------------------------------------- ACTION
            daftar_multi_hak_akses::double_dmha_checking($dmha_id);
            app_list::double_app_list_checking($dmha_id);

			daftar_multi_hak_akses::insert(
        [
        	'status_id' => '1',
        	'dmha_id'   => $dmha_id,
        	'parent_id' =>  NULL,
        	'urutan'    => '0',
        	'nama'		=> 'Dashboard',
        	'link'		=> 'dashboard',
        	'bg_color'	=> '48',
        	'icon'		=> '73',
        	'css_js'	=> '1',
        	'content'	=> '1',
        	'kategori'	=> '3'
        ]
      );

      app_list::insert(
        [
        	'app_mode'  => $APP_MODE,
        	'dmha_id'   => '01'
        ]
      );
		//////////////////////////////////////////////////////////////////////////// 		
	}

    function show_dashboard($DETAIL_TEMPLATE){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

        // ------------------------------------------------------------------------- ACTION
            
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    } 
