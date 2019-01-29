<?php

	use App\daftar_multi_hak_akses;
	use App\app_list;
    use App\data_18;


    use App\icons;

	// Work Order
    // create_menu_1_18();
	function create_menu_1_18(){		
        // ------------------------------------------------------------------------- INITIALIZE
            $status_id      = '1';
            $dmha_id        = '18';
            $parent_id      = NULL;
            $tipe           = '1';
            $urutan         = '1';
            $nama           = 'Work Order';
            $link           = 'javascript:;';
            $deskripsi      = NULL;
            $has_sub        = NULL;
            $icon           = '67';
            $css_js         = NULL;
            $ui             = NULL;
            $tipe_data      = '6';
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
    // create_sub_menu_by_default_1_18();
    function create_sub_menu_1_18(){ 
        // ------------------------------------------------------------------------- MAIN INITIALIZE
            $status_id      = '1';
            $parent_id      = '18';
            $tipe           = '1';
            $urutan         = 0;
            $deskripsi      = 'Work Order';
            $has_sub        = NULL;
            $ui             = '1';
            $content        = '4';
            $custom_css_js  = '4';

        // ------------------------------------------------------------------------- SUB INITIALIZE DATA
            $dmha_id        = $parent_id.count_sub_dmha($parent_id);
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
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori,$content,$custom_css_js);

        // ------------------------------------------------------------------------- SUB INITIALIZE ADD
            $dmha_id        = $parent_id.count_sub_dmha($parent_id);
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
            // delete dmha yang sama
            daftar_multi_hak_akses::double_dmha_checking($dmha_id);

            // insert dmha terbaru            
            //full_insert($STATUS_ID,$DMHA_ID,$PARENT_ID,$TIPE,$URUTAN,$NAMA,$LINK,$DESKRIPSI,$HAS_SUB,$ICON,$CSS_JS,$UI,$TIPE_DATA,$FORM,$KATEGORI)
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori,$content,$custom_css_js);

        // ------------------------------------------------------------------------- SUB INITIALIZE EDIT
            $dmha_id        = $parent_id.count_sub_dmha($parent_id);
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
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori,$content,$custom_css_js);

            
        // ------------------------------------------------------------------------- SUB INITIALIZE COPY
            $dmha_id        = $parent_id.count_sub_dmha($parent_id);
            $urutan         ++;
            $nama           = 'Set Status';
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
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori,$content,$custom_css_js);

        // ------------------------------------------------------------------------- SUB INITIALIZE
            $dmha_id        = $parent_id.count_sub_dmha($parent_id);
            $urutan         ++;
            $nama           = 'Assign Associated Worker';
            $link           = str_replace(' ', '_', $nama.' '.$deskripsi);
            $icon           = '92';
            $css_js         = '4';
            $tipe_data      = '2';
            $form           = '1';
            $kategori       = '2';

        // ------------------------------------------------------------------------- ACTION
            // delete dmha yang sama
            daftar_multi_hak_akses::double_dmha_checking($dmha_id);

            // insert dmha terbaru            
            //full_insert($STATUS_ID,$DMHA_ID,$PARENT_ID,$TIPE,$URUTAN,$NAMA,$LINK,$DESKRIPSI,$HAS_SUB,$ICON,$CSS_JS,$UI,$TIPE_DATA,$FORM,$KATEGORI)
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori,$content,$custom_css_js);

        // ------------------------------------------------------------------------- SUB INITIALIZE
            $dmha_id        = $parent_id.count_sub_dmha($parent_id);
            $urutan         ++;
            $nama           = 'Report';
            $link           = str_replace(' ', '_', $nama.' '.$deskripsi);
            $icon           = '92';
            $css_js         = '4';
            $tipe_data      = '2';
            $form           = '1';
            $kategori       = '2';

        // ------------------------------------------------------------------------- ACTION
            // delete dmha yang sama
            daftar_multi_hak_akses::double_dmha_checking($dmha_id);

            // insert dmha terbaru            
            //full_insert($STATUS_ID,$DMHA_ID,$PARENT_ID,$TIPE,$URUTAN,$NAMA,$LINK,$DESKRIPSI,$HAS_SUB,$ICON,$CSS_JS,$UI,$TIPE_DATA,$FORM,$KATEGORI)
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori,$content,$custom_css_js);

        // ------------------------------------------------------------------------- SUB INITIALIZE 
            $dmha_id        = $parent_id.count_sub_dmha($parent_id);
            $urutan         ++;
            $nama           = 'Assignment';
            $link           = str_replace(' ', '_', $nama.' '.$deskripsi);
            $icon           = '92';
            $css_js         = '4';
            $tipe_data      = '2';
            $form           = '1';
            $kategori       = '2';

        // ------------------------------------------------------------------------- ACTION
            // delete dmha yang sama
            daftar_multi_hak_akses::double_dmha_checking($dmha_id);

            // insert dmha terbaru            
            //full_insert($STATUS_ID,$DMHA_ID,$PARENT_ID,$TIPE,$URUTAN,$NAMA,$LINK,$DESKRIPSI,$HAS_SUB,$ICON,$CSS_JS,$UI,$TIPE_DATA,$FORM,$KATEGORI)
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori,$content,$custom_css_js);

        // ------------------------------------------------------------------------- SUB INITIALIZE
            $dmha_id        = $parent_id.count_sub_dmha($parent_id);
            $urutan         ++;
            $nama           = 'My Assignment';
            $link           = str_replace(' ', '_', $nama.' '.$deskripsi);
            $icon           = '92';
            $css_js         = '4';
            $tipe_data      = '2';
            $form           = '1';
            $kategori       = '2';

        // ------------------------------------------------------------------------- ACTION
            // delete dmha yang sama
            daftar_multi_hak_akses::double_dmha_checking($dmha_id);

            // insert dmha terbaru            
            //full_insert($STATUS_ID,$DMHA_ID,$PARENT_ID,$TIPE,$URUTAN,$NAMA,$LINK,$DESKRIPSI,$HAS_SUB,$ICON,$CSS_JS,$UI,$TIPE_DATA,$FORM,$KATEGORI)
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori,$content,$custom_css_js);

        // ------------------------------------------------------------------------- SUB INITIALIZE
            $dmha_id        = $parent_id.count_sub_dmha($parent_id);
            $urutan         ++;
            $nama           = 'Set Material';
            $link           = str_replace(' ', '_', $nama.' '.$deskripsi);
            $icon           = '92';
            $css_js         = '4';
            $tipe_data      = '2';
            $form           = '1';
            $kategori       = '2';

        // ------------------------------------------------------------------------- ACTION
            // delete dmha yang sama
            daftar_multi_hak_akses::double_dmha_checking($dmha_id);

            // insert dmha terbaru            
            //full_insert($STATUS_ID,$DMHA_ID,$PARENT_ID,$TIPE,$URUTAN,$NAMA,$LINK,$DESKRIPSI,$HAS_SUB,$ICON,$CSS_JS,$UI,$TIPE_DATA,$FORM,$KATEGORI)
            daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$parent_id,$tipe,$urutan,$nama,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori,$content,$custom_css_js);
            
        //////////////////////////////////////////////////////////////////////////// 
    }

    // data_1_1801();
    function data_1_18_order_by_desc(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $isi_model = data_18::read_data_order_by_desc();
            $counter = 0;

            $isi .= '<colgroup>';
                $isi .= '<col width="'.action_width_general().'">';
                $isi .= '<col>';
                $isi .= '<col>';
                $isi .= '<col>';
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
                $isi .= 'Image';
                $isi .= '</th>';

                $isi .= '<th>';
                $isi .= 'Description';
                $isi .= '</th>';


                $isi .= '<th>';
                $isi .= 'Location';
                $isi .= '</th>';

                $isi .= '<th>';
                $isi .= 'Priority';
                $isi .= '</th>';

                $isi .= '<th>';
                $isi .= 'Status';
                $isi .= '</th>';

                $isi .= '<th>';
                $isi .= 'Category';
                $isi .= '</th>';

                $isi .= '<th>';
                $isi .= 'Assign By';
                $isi .= '</th>';

                $isi .= '<th>';
                $isi .= 'Date';
                $isi .= '</th>';

                $isi .= '<th>';
                $isi .= 'Resource';
                $isi .= '</th>';

                $isi .= '<th>';
                $isi .= 'Action';
                $isi .= '</th>';
            $isi .= '</tr>';
            $isi .= '</thead>';

            $isi .= '<tbody>';
        // ------------------------------------------------------------------------- ACTION
            if(count($isi_model) == 0){ $isi .= no_data_table(10); }
            else{
                foreach ($isi_model as $row) {
                    $counter++;
                    $isi .= '<tr>';
                        $isi .= '<td class="text-right">';
                        $isi .= $counter;
                        $isi .= '</td>';
                        $isi .= '<td>';
                        $isi .=  '<img src="https://picsum.photos/100"/>';
                        $isi .= '</td>';
                        $isi .= '<td>';
                        $isi .=  $row->deskripsi;
                        $isi .= '</td>';
                        $isi .= '<td>';
                        $isi .=  $row->deskripsi;
                        $isi .= '</td>';
                        $isi .= '<td>';
                        $isi .=  $row->deskripsi;
                        $isi .= '</td>';
                        $isi .= '<td>';
                        $isi .=  $row->deskripsi;
                        $isi .= '</td>';
                        $isi .= '<td>';
                        $isi .=  $row->deskripsi;
                        $isi .= '</td>';
                        $isi .= '<td>';
                        $isi .=  $row->deskripsi;
                        $isi .= '</td>';
                        $isi .= '<td>';
                        $isi .=  $row->deskripsi;
                        $isi .= '</td>';
                        $isi .= '<td>';
                        $isi .=  $row->deskripsi;
                        $isi .= '</td>';
                        $isi .= '<td class="text-center">';
                        $isi .= generate_dropdown_button('2102',$row->id);
                        $isi .= '</td>';
                    $isi .= '</tr>';
                }
            }
            $isi .= '</tbody>';
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////    
    }
