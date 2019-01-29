<?php

	use App\data_002914;
	use App\app_list;

    function create_dmha($PARENT_ID,$NEW_ID,$NAMA,$DESKRIPSI,$URUTAN,$SUMBER_DATA_PENGISIAN_ID){        
        // ------------------------------------------------------------------------- INITIALIZE
            // STATUS    
                $status_id          = '1';
                $bg_color           = NULL;

            // PARENT
                if(is_null($PARENT_ID))
                {
                    $link           = 'javascript:;';          
                }
                else
                {   
                    $DMHA           = data_002914::what_is_my_dmha_id($PARENT_ID); 


                    $link           = str_replace(' ', '_', $NAMA.' '.$DMHA->nama);          
                }

            // DMHA
                if(is_null($NEW_ID)){
                    // delete dmha yang sama
                        data_002914::double_dmha_checking_PARENT($PARENT_ID);
                    // delete dmha yang sama
                        app_list::double_app_list_checking_PARENT($PARENT_ID);

                    $dmha_id        = $PARENT_ID.count_sub_dmha($PARENT_ID);             
                }
                else
                {                
                    $dmha_id        = $PARENT_ID.$NEW_ID;
                }
                

                $has_sub        = NULL;
                $ui             = '11';


            if($NAMA == 'New') // confrim
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '1';
                //$urutan
                $NAMA           = $DESKRIPSI;
                $link           = 'javascript:;';     
                //$deskripsi
                //$has_sub
                $icon           = NULL;
                $css_js         = NULL;
                //$ui
                $tipe_data      = '6';
                $form           = NULL;
                $kategori       = '1';
                $content        = '0';
                $custom_css_js  = '0';
            }
            elseif($NAMA == 'New_counter') // confrim
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '3';
                //$urutan
                $NAMA           = $DESKRIPSI;
                $link           = 'javascript:;';     
                //$deskripsi
                //$has_sub
                $icon           = NULL;
                $css_js         = NULL;
                //$ui
                $tipe_data      = '6';
                $form           = NULL;
                $kategori       = '12';
                $content        = '0';
                $custom_css_js  = '0';
            }
            elseif($NAMA == 'New_Map_Permohonan') // confrim
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = 1;
                $urutan         = 0;
                $NAMA           = $DESKRIPSI;
                $link           = 'javascript:;';     
                //$deskripsi
                $has_sub        = 'has-sub';
                $icon           = NULL;
                $css_js         = NULL;
                //$ui
                $tipe_data      = NULL;
                $form           = NULL;
                $kategori       = NULL;
                $content        = NULL;
                $custom_css_js  = NULL;
            }
            elseif($NAMA == 'Data') // confrim
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '4';
                //$urutan
                //$NAMA
                //$link
                //$deskripsi
                //$has_sub
                $icon           = '40';
                $css_js         = '3';
                //$ui
                $tipe_data      = '7';
                $form           = NULL;
                $kategori       = '10';
                $content        = '4';
                $custom_css_js  = '2';
            }
            elseif($NAMA == 'Data_single') // confrim
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '1';
                //$urutan
                $NAMA           = 'Data';
                //$link
                //$deskripsi
                //$has_sub
                $icon           = '40';
                $css_js         = '3';
                //$ui
                $tipe_data      = '7';
                $form           = NULL;
                $kategori       = '10';
                $content        = '4';
                $custom_css_js  = '4';
            }
            elseif($NAMA == 'Look_first_four_digit') // confrim
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '1';
                //$urutan
                $NAMA           = 'Look';
                //$link
                //$deskripsi
                //$has_sub
                $icon           = '48';
                $css_js         = '3';
                //$ui
                $tipe_data      = '7';
                $form           = NULL;
                $kategori       = '2';
                $content        = '4';
                $custom_css_js  = '4';
            }
            elseif($NAMA == 'Add')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '4';
                //$urutan
                //$NAMA
                //$link
                //$deskripsi
                //$has_sub
                $icon           = '75';
                $css_js         = '4';
                //$ui
                $tipe_data      = '1';
                $form           = '2';
                $kategori       = '1';
                $content        = '0';
                $custom_css_js  = '2';
            }
            elseif($NAMA == 'Add_single')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '1';
                //$urutan
                $NAMA           = 'Add';
                //$link
                //$deskripsi
                //$has_sub
                $icon           = '75';
                $css_js         = '4';
                //$ui
                $tipe_data      = '1';
                $form           = '1';
                $kategori       = '1';
                $content        = '4';
                $custom_css_js  = '5';
            }
            elseif($NAMA == 'Add_first_four_digit')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '3';
                //$urutan
                $NAMA           = 'Add';
                //$link
                //$deskripsi
                //$has_sub
                $icon           = '75';
                $css_js         = '4';
                //$ui
                $tipe_data      = '1';
                $form           = '1';
                $kategori       = '1';
                $content        = '4';
                $custom_css_js  = '5';
            }
            elseif($NAMA == 'Add_single_task_killer')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '6';
                //$urutan
                $NAMA           = 'Add';
                $link           = str_replace(' ', '_', $NAMA.' '.$DESKRIPSI);  
                $deskripsi     .= ' '.$DESKRIPSI;
                //$has_sub
                $icon           = '75';
                $css_js         = '4';
                //$ui
                $tipe_data      = '1';
                $form           = '1';
                $kategori       = '1';
                $content        = '4';
                $custom_css_js  = '5';
            }
            elseif($NAMA == 'Edit')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '4';
                //$urutan
                //$NAMA
                //$link
                //$deskripsi
                //$has_sub
                $icon           = '71';
                $css_js         = '4';
                //$ui
                $tipe_data      = '2';
                $form           = '2';
                $kategori       = '2';
                $content        = '4';
                $custom_css_js  = '2';
            }
            elseif($NAMA == 'Edit_Pertanyaan_id')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '4';
                //$urutan
                $NAMA           = 'Edit';
                $link           = str_replace(' ', '_', $NAMA.' '.$DMHA->nama);  
                //$deskripsi
                //$has_sub
                $icon           = '71';
                $css_js         = '4';
                //$ui
                $tipe_data      = '2';
                $form           = '1';
                $kategori       = '2';
                $content        = '4';
                $custom_css_js  = '2';
            }
            elseif($NAMA == 'Edit_single')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '1';
                //$urutan
                $NAMA           = 'Edit';
                //$link
                //$deskripsi
                //$has_sub
                $icon           = '71';
                $css_js         = '4';
                //$ui
                $tipe_data      = '2';
                $form           = '1';
                $kategori       = '2';
                $content        = '4';
                $custom_css_js  = '5';
            }
            elseif($NAMA == 'Edit_first_four_digit')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '3';
                //$urutan
                $NAMA           = 'Edit';
                //$link
                //$deskripsi
                //$has_sub
                $icon           = '71';
                $css_js         = '4';
                //$ui
                $tipe_data      = '2';
                $form           = '1';
                $kategori       = '2';
                $content        = '4';
                $custom_css_js  = '5';
            }
            elseif($NAMA == 'Comment_first_four_digit_documentation')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '3';
                //$urutan
                $NAMA           = 'Comment';
                //$link
                //$deskripsi
                //$has_sub
                $icon           = '108';
                $css_js         = '4';
                //$ui
                $tipe_data      = '2';
                $form           = '1';
                $kategori       = '2';
                $content        = '4';
                $custom_css_js  = '5';
                $SUMBER_DATA_PENGISIAN_ID  = '110';
            }
            elseif($NAMA == 'Edit_single_task_killer')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '6';
                //$urutan
                $NAMA           = 'Edit';
                $link           = str_replace(' ', '_', $NAMA.' '.$DESKRIPSI);  
                $deskripsi     .= ' '.$DESKRIPSI;
                //$has_sub
                $icon           = '71';
                $css_js         = '4';
                //$ui
                $tipe_data      = '2';
                $form           = '1';
                $kategori       = '2';
                $content        = '4';
                $custom_css_js  = '5';
            }
            elseif($NAMA == 'Copy')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '4';
                //$urutan
                //$NAMA
                //$link
                //$deskripsi
                //$has_sub
                $icon           = '91';
                $css_js         = '4';
                //$ui
                $tipe_data      = '3';
                $form           = '2';
                $kategori       = '2';
                $content        = '4';
                $custom_css_js  = '2';
            }
            elseif($NAMA == 'Delete')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '4';
                //$urutan
                //$NAMA
                //$link
                //$deskripsi
                //$has_sub
                $icon           = '72';
                $css_js         = '4';
                //$ui
                $tipe_data      = '4';
                $form           = '1';
                $kategori       = '2';
                $content        = '4';
                $custom_css_js  = '2';
            }
            elseif($NAMA == 'Delete_single')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '1';
                //$urutan
                $NAMA           = 'Delete';
                //$link
                //$deskripsi
                //$has_sub
                $icon           = '72';
                $css_js         = '4';
                //$ui
                $tipe_data      = '4';
                $form           = '1';
                $kategori       = '2';
                $content        = '4';
                $custom_css_js  = '5';
            }
            elseif($NAMA == 'Delete_first_four_digit')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '3';
                //$urutan
                $NAMA           = 'Delete';
                //$link
                //$deskripsi
                //$has_sub
                $icon           = '72';
                $css_js         = '4';
                //$ui
                $tipe_data      = '4';
                $form           = '1';
                $kategori       = '2';
                $content        = '4';
                $custom_css_js  = '5';
            }
            elseif($NAMA == 'Delete_single_task_killer')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '6';
                //$urutan
                $NAMA           = 'Delete';
                $link           = str_replace(' ', '_', $NAMA.' '.$DESKRIPSI); 
                $deskripsi     .= ' '.$DESKRIPSI;
                //$has_sub
                $icon           = '72';
                $css_js         = '4';
                //$ui
                $tipe_data      = '4';
                $form           = '1';
                $kategori       = '2';
                $content        = '4';
                $custom_css_js  = '5';
            }
            elseif($NAMA == 'Start_single')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '1';
                //$urutan
                $NAMA           = 'Start';
                $link           = str_replace(' ', '_', $NAMA.' '.$DESKRIPSI); 
                $deskripsi     .= ' '.$DESKRIPSI;
                //$has_sub
                $icon           = '49';
                $css_js         = '4';
                //$ui
                $tipe_data      = '11';
                $form           = '1';
                $kategori       = '12';
                $content        = '4';
                $custom_css_js  = '5';
                $SUMBER_DATA_PENGISIAN_ID  = '103';
            }
            elseif($NAMA == 'Stop_single')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '1';
                //$urutan
                $NAMA           = 'Stop';
                $link           = str_replace(' ', '_', $NAMA.' '.$DESKRIPSI); 
                $deskripsi     .= ' '.$DESKRIPSI;
                //$has_sub
                $icon           = '50';
                $css_js         = '4';
                //$ui
                $tipe_data      = '11';
                $form           = '1';
                $kategori       = '12';
                $content        = '4';
                $custom_css_js  = '5';
                $SUMBER_DATA_PENGISIAN_ID  = '104';
            }
            elseif($NAMA == 'Documentation_single')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '1';
                //$urutan
                $NAMA           = 'Documentation';
                $link           = str_replace(' ', '_', $NAMA.' '.$DESKRIPSI); 
                $deskripsi     .= ' '.$DESKRIPSI;
                //$has_sub
                $icon           = '3';
                $css_js         = '4';
                //$ui
                $tipe_data      = '11';
                $form           = '1';
                $kategori       = '12';
                $content        = '4';
                $custom_css_js  = '5';
                $SUMBER_DATA_PENGISIAN_ID  = '105';
            }
            elseif($NAMA == 'Set Print')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '4';
                //$urutan
                //$NAMA
                //$link
                //$deskripsi
                //$has_sub
                $icon           = '19';
                $css_js         = '12';
                //$ui
                $tipe_data      = '5';
                $form           = NULL;
                $kategori       = '2';
                $content        = '0';
                $custom_css_js  = '2';
            }
            elseif($NAMA == 'Print')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '1';
                //$urutan
                //$NAMA
                //$link
                //$deskripsi
                //$has_sub
                $icon           = '19';
                $css_js         = '7';
                $ui             = '6';
                $tipe_data      = '8';
                $form           = NULL;
                $kategori       = '2';
                $content        = '0';
                $custom_css_js  = '0';
            }
            elseif($NAMA == 'Print_F6')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '3';
                //$urutan
                $NAMA           = 'Print';
                $link           = str_replace(' ', '_', $NAMA.' '.$DESKRIPSI); 
                $deskripsi     .= ' '.$DESKRIPSI;
                //$has_sub
                $icon           = '19';
                $css_js         = '14';
                $ui             = '15';
                $tipe_data      = '8';
                $form           = NULL;
                $kategori       = '2';
                $content        = '13';
                $custom_css_js  = '0';
            }
            elseif($NAMA == 'Print_F4_Portrait')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '1';
                //$urutan
                $NAMA           = 'Print';
                $link           = str_replace(' ', '_', $NAMA.' '.$DESKRIPSI); 
                $deskripsi     = ' '.$DESKRIPSI.' '.str_replace('_', ' ', $DMHA->nama);
                //$has_sub
                $icon           = '19';
                $css_js         = '7';
                $ui             = '6';
                $tipe_data      = '8';
                $form           = NULL;
                $kategori       = '2';
                $content        = '13';
                $custom_css_js  = '0';
            }
            elseif($NAMA == 'Edit_single_map_permohonan')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '1';
                //$urutan
                $NAMA           = 'Edit';
                $link           = str_replace(' ', '_', $NAMA.' '.$DESKRIPSI);  
                $deskripsi     = ' '.$DESKRIPSI.' '.str_replace('_', ' ', $DMHA->nama);
                //$has_sub
                $icon           = '71';
                $css_js         = '4';
                //$ui
                $tipe_data      = '2';
                $form           = '1';
                $kategori       = '2';
                $content        = '4';
                $custom_css_js  = '5';
            }
            elseif($NAMA == 'Delete_single_map_permohonan')
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '1';
                //$urutan
                $NAMA           = 'Delete';
                $link           = str_replace(' ', '_', $NAMA.' '.$DESKRIPSI); 
                $deskripsi     = ' '.$DESKRIPSI.' '.str_replace('_', ' ', $DMHA->nama);
                //$has_sub
                $icon           = '72';
                $css_js         = '4';
                //$ui
                $tipe_data      = '4';
                $form           = '1';
                $kategori       = '2';
                $content        = '4';
                $custom_css_js  = '5';
            }
            elseif($NAMA == 'Edit Profile') // confrim
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '1';
                //$urutan
                //$NAMA
                //$link
                //$deskripsi
                //$has_sub
                $icon           = '71';
                $css_js         = '4';
                //$ui
                $tipe_data      = '2';
                $form           = '1';
                $kategori       = '11';
                $content        = '4';
                $custom_css_js  = '2';
            }
            elseif($NAMA == 'Logout') // confrim
            {
                //status_id
                //dmha_id
                //PARENT_ID
                $tipe           = '0';
                //$urutan
                //$NAMA
                //$link
                //$deskripsi
                //$has_sub
                $icon           = '94';
                $css_js         = '4';
                //$ui
                $tipe_data      = '2';
                $form           = '1';
                $kategori       = '11';
                $content        = '4';
                $custom_css_js  = '2';
            }



            if(!is_null($DMHA->parent_id))
            {
                $PARENT           = data_002914::what_is_my_dmha_id($DMHA->parent_id); 

                $link               = str_replace(' ', '_', $NAMA.' '.$DESKRIPSI.' '.$PARENT->nama);  
                $deskripsi          = $DESKRIPSI.' '.$PARENT->nama;
            }else{
                $deskripsi          = $DMHA->nama;                        
            }

            

        // ------------------------------------------------------------------------- ACTION
            // delete dmha yang sama
                data_002914::double_dmha_checking($dmha_id);
            // delete dmha yang sama
                app_list::double_app_list_checking($dmha_id);

            // insert dmha terbaru            
            //full_insert($STATUS_ID,$DMHA_ID,$PARENT_ID,$TIPE,$URUTAN,$NAMA,$LINK,$DESKRIPSI,$HAS_SUB,$ICON,$CSS_JS,$UI,$TIPE_DATA,$FORM,$KATEGORI)
                //data_002914::full_insert($status_id,$dmha_id,$PARENT_ID,$tipe,$URUTAN,$NAMA,$link,$deskripsi,$has_sub,$icon,$css_js,$ui,$tipe_data,$form,$kategori,$content,$custom_css_js,$SUMBER_DATA_PENGISIAN_ID);
                data_002914::full_insert_new($status_id,$dmha_id,$PARENT_ID,$tipe,$URUTAN,$NAMA,$link,$deskripsi,$has_sub,$bg_color,$icon,$content,$css_js,$custom_css_js,$ui,$tipe_data,$form,$kategori,$SUMBER_DATA_PENGISIAN_ID);
        ////////////////////////////////////////////////////////////////////////////        
    }
