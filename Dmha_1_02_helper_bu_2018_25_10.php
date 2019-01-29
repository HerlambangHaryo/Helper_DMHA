<?php

    use App\daftar_multi_hak_akses;
    use App\daftar_multi_hak_akses_05;

    // External
    use App\surat;
    use App\app_list;
    use App\data_02;
    use App\data_details_02;
    use App\biaya_proses_02;
    use App\biaya_02;
    use App\proses_02;
    use App\riwayat_pembayaran_02;
    use App\pertanyaans;




    use App\wilayahs;
    use App\wilayah_kotas;
    use App\wilayah_kecamatans;
    use App\wilayah_kelurahans;



    // Pengurusan
    // create_menu_1_02($APP_MODE);
    function create_menu_1_02($APP_MODE){
        // ------------------------------------------------------------------------- INITIALIZE
            $dmha_id            = '02';
            $status_id          = 1;   

        // ------------------------------------------------------------------------- ACTION
            daftar_multi_hak_akses::double_dmha_checking($dmha_id);
            app_list::double_app_list_checking($dmha_id);

            daftar_multi_hak_akses::insert(
                [
                    'status_id' =>  $status_id,
                    'dmha_id'   =>  $dmha_id,
                    'parent_id' =>  NULL,
                    'urutan'    => '1',
                    'nama'      => 'Pengurusan',
                    'link'      => 'javascript:;',
                    'has_sub'   => 'has-sub',
                    'bg_color'  => '5',
                    'icon'      => '16',
                    'css_js'    => '1',
                    'content'   => '1',
                    'kategori'  => '3'
                ]
            );

            app_list::insert(
                [
                    'app_mode'  => $APP_MODE,
                    'dmha_id'   => $dmha_id
                ]
            );
        ////////////////////////////////////////////////////////////////////////////        
    }

    // Pengurusan sub menu by default
    // create_sub_menu_by_default_1_02();
    function create_sub_menu_by_default_1_02($SUB_APP_NAME,$STATUS){ 
        // ------------------------------------------------------------------------- MAIN INITIALIZE

            $sub_grand_parent_id    = '02'; 
            $nama_parent            = 'Pengurusan';  
            $status_id              = 1;   
            $sub_app_name           = str_replace('_', ' ', $SUB_APP_NAME);
            $urutan                 = 0;

        // ------------------------------------------------------------------------- INITIALIZE        
            //full_insert($STATUS_ID,$DMHA_ID,$PARENT_ID,$TIPE,$URUTAN,$NAMA,$LINK,$DESKRIPSI,$HAS_SUB,$ICON,$CSS_JS,$UI,$TIPE_DATA,$FORM,$KATEGORI)
            // Sub

                if($STATUS == 'new'){
                    $dmha_id    = $sub_grand_parent_id.count_sub_dmha($sub_grand_parent_id);
                }else{
                    daftar_multi_hak_akses::double_dmha_checking($STATUS.'%');
                    $dmha_id    = $STATUS;
                }
                $PARENT_ID  = $sub_grand_parent_id;
                daftar_multi_hak_akses::full_insert($status_id,$dmha_id,$PARENT_ID,1,0,$sub_app_name,'javascript:;',NULL,NULL,NULL,NULL,NULL,6,NULL,3);


                $PARENT_ID  = $dmha_id;
                $DESKRIPSI  = $nama_parent.' '.$sub_app_name;

        // ------------------------------------------------------------------------- ACTION
                //sub-sub
                    $DMHA_ID    = $dmha_id.count_sub_dmha($dmha_id);
                    $urutan++;            
                    $nama       = 'Data'; 
                    $LINK       = str_replace(' ', '_', $nama.' '.$nama_parent.' '.$sub_app_name);
                        daftar_multi_hak_akses::full_insert($status_id,$DMHA_ID,$PARENT_ID,4,$urutan,$nama,$LINK,$DESKRIPSI,NULL,40,5,1,7,NULL,1);

                //sub-sub
                    $DMHA_ID    = $dmha_id.count_sub_dmha($dmha_id);
                    $urutan++;            
                    $nama       = 'Tambah'; 
                    $LINK       = str_replace(' ', '_', $nama.' '.$nama_parent.' '.$sub_app_name);
                        daftar_multi_hak_akses::full_insert($status_id,$DMHA_ID,$PARENT_ID,4,$urutan,$nama,$LINK,$DESKRIPSI,NULL,76,4,1,1,NULL,1);

                //sub-sub
                    $DMHA_ID    = $dmha_id.count_sub_dmha($dmha_id);
                    $urutan++;            
                    $nama       = 'Ubah'; 
                    $LINK       = str_replace(' ', '_', $nama.' '.$nama_parent.' '.$sub_app_name);
                        daftar_multi_hak_akses::full_insert($status_id,$DMHA_ID,$PARENT_ID,4,$urutan,$nama,$LINK,$DESKRIPSI,NULL,71,4,1,2,NULL,2);

                //sub-sub
                    $DMHA_ID    = $dmha_id.count_sub_dmha($dmha_id);
                    $urutan++;            
                    $nama       = 'Salin'; 
                    $LINK       = str_replace(' ', '_', $nama.' '.$nama_parent.' '.$sub_app_name);
                        daftar_multi_hak_akses::full_insert($status_id,$DMHA_ID,$PARENT_ID,4,$urutan,$nama,$LINK,$DESKRIPSI,NULL,74,4,1,4,NULL,2);

                //sub-sub
                    $DMHA_ID    = $dmha_id.count_sub_dmha($dmha_id);
                    $urutan++;            
                    $nama       = 'Hapus'; 
                    $LINK       = str_replace(' ', '_', $nama.' '.$nama_parent.' '.$sub_app_name);
                        daftar_multi_hak_akses::full_insert($status_id,$DMHA_ID,$PARENT_ID,4,$urutan,$nama,$LINK,$DESKRIPSI,NULL,72,4,1,4,NULL,2);

                //sub-sub
                    $DMHA_ID    = $dmha_id.count_sub_dmha($dmha_id);                    
                    $dmha_id    = $DMHA_ID;
                    $urutan++;            
                    $nama       = 'Biaya Proses'; 
                    $LINK       = str_replace(' ', '_', $nama.' '.$nama_parent.' '.$sub_app_name);
                        daftar_multi_hak_akses::full_insert($status_id,$DMHA_ID,$PARENT_ID,4,$urutan,$nama,$LINK,$DESKRIPSI,NULL,85,5,1,7,NULL,1);

                    $TEMP_PARENT    = $PARENT_ID;
                    $PARENT_ID      = $DMHA_ID;
                    $dmha_id        = $DMHA_ID;

                    //sub-sub
                        $DMHA_ID    = $dmha_id.count_sub_dmha($dmha_id);
                        $nama_1     = 'Laporan'; 
                        $LINK       = str_replace(' ', '_', $nama_1.' '.$nama.' '.$nama_parent.' '.$sub_app_name);
                            daftar_multi_hak_akses::full_insert(3,$DMHA_ID,$PARENT_ID,5,0,$nama_1,$LINK,$DESKRIPSI,NULL,19,5,7,4,NULL,6);

                $PARENT_ID  = $TEMP_PARENT;
                $dmha_id    = $PARENT_ID;

                //sub-sub
                    $DMHA_ID    = $dmha_id.count_sub_dmha($dmha_id);
                    $urutan++;            
                    $nama       = 'Migrasi Data'; 
                    $LINK       = str_replace(' ', '_', $nama.' '.$nama_parent.' '.$sub_app_name);
                        daftar_multi_hak_akses::full_insert($status_id,$DMHA_ID,$PARENT_ID,4,$urutan,$nama,$LINK,$DESKRIPSI,NULL,86,5,1,7,NULL,1);

                //sub-sub
                    $DMHA_ID    = $dmha_id.count_sub_dmha($dmha_id);
                    $urutan++;            
                    $nama       = 'Set Print'; 
                    $LINK       = str_replace(' ', '_', $nama.' '.$nama_parent.' '.$sub_app_name);
                        daftar_multi_hak_akses::full_insert($status_id,$DMHA_ID,$PARENT_ID,4,$urutan,$nama,$LINK,$DESKRIPSI,NULL,19,3,1,7,NULL,2);

                    $TEMP_PARENT    = $PARENT_ID;
                    $PARENT_ID      = $DMHA_ID;
                    $dmha_id        = $DMHA_ID;

                    //sub-sub
                        $DMHA_ID    = $dmha_id.count_sub_dmha($dmha_id);
                        $nama       = 'Print'; 
                        $LINK       = str_replace(' ', '_', $nama.' '.$nama_parent.' '.$sub_app_name);
                            daftar_multi_hak_akses::full_insert(3,$DMHA_ID,$PARENT_ID,4,0,$nama,$LINK,$DESKRIPSI,NULL,19,3,6,4,NULL,4);

                $PARENT_ID  = $TEMP_PARENT;
                $dmha_id    = $PARENT_ID;

                //sub-sub
                    $DMHA_ID    = $dmha_id.count_sub_dmha($dmha_id);
                    $dmha_id    = $DMHA_ID;
                    $urutan++;            
                    $nama       = 'Pengaturan'; 
                    $LINK       = 'javascript:;';
                        daftar_multi_hak_akses::full_insert($status_id,$DMHA_ID,$PARENT_ID,1,$urutan,$nama,$LINK,$DESKRIPSI,NULL,64,NULL,NULL,6,NULL,4);

                    $PARENT_ID  = $dmha_id;

                    //sub-sub
                        $DMHA_ID    = $dmha_id.count_sub_dmha($dmha_id);
                        $nama_1     = 'Map Permohonan'; 
                        $LINK       = str_replace(' ', '_', $nama.' '.$nama_1.' '.$nama_parent.' '.$sub_app_name);
                            daftar_multi_hak_akses::full_insert($status_id,$DMHA_ID,$PARENT_ID,5,0,$nama_1,$LINK,$DESKRIPSI,NULL,4,3,1,4,NULL,1);

                    //sub-sub
                        $DMHA_ID    = $dmha_id.count_sub_dmha($dmha_id);
                        $nama_1     = 'Desa Kelurahan'; 
                        $LINK       = str_replace(' ', '_', $nama.' '.$nama_1.' '.$nama_parent.' '.$sub_app_name);
                            daftar_multi_hak_akses::full_insert($status_id,$DMHA_ID,$PARENT_ID,5,0,$nama_1,$LINK,$DESKRIPSI,NULL,52,3,1,4,NULL,1);

                    //sub-sub
                        $DMHA_ID    = $dmha_id.count_sub_dmha($dmha_id);
                        $nama_1     = 'Tanggal Surat'; 
                        $LINK       = str_replace(' ', '_', $nama.' '.$nama_1.' '.$nama_parent.' '.$sub_app_name);
                            daftar_multi_hak_akses::full_insert($status_id,$DMHA_ID,$PARENT_ID,5,0,$nama_1,$LINK,$DESKRIPSI,NULL,15,4,1,4,NULL,1);

                    //sub-sub
                        $DMHA_ID    = $dmha_id.count_sub_dmha($dmha_id);
                        $nama_1     = 'Tinjauan Cetak'; 
                        $LINK       = str_replace(' ', '_', $nama.' '.$nama_1.' '.$nama_parent.' '.$sub_app_name);
                            daftar_multi_hak_akses::full_insert($status_id,$DMHA_ID,$PARENT_ID,5,0,$nama_1,$LINK,$DESKRIPSI,NULL,19,4,1,4,NULL,1);

                    //sub-sub
                        $DMHA_ID    = $dmha_id.count_sub_dmha($dmha_id);
                        $nama_1     = 'Umum'; 
                        $LINK       = str_replace(' ', '_', $nama.' '.$nama_1.' '.$nama_parent.' '.$sub_app_name);
                            daftar_multi_hak_akses::full_insert($status_id,$DMHA_ID,$PARENT_ID,5,0,$nama_1,$LINK,$DESKRIPSI,NULL,46,4,1,4,NULL,1);

                    //sub-sub
                        $DMHA_ID    = $dmha_id.count_sub_dmha($dmha_id);
                        $nama_1     = 'Form'; 
                        $LINK       = str_replace(' ', '_', $nama.' '.$nama_1.' '.$nama_parent.' '.$sub_app_name);
                            daftar_multi_hak_akses::full_insert($status_id,$DMHA_ID,$PARENT_ID,5,0,$nama_1,$LINK,$DESKRIPSI,NULL,87,4,1,4,NULL,1);


                    //sub-sub
                        $DMHA_ID    = $dmha_id.count_sub_dmha($dmha_id);
                        $nama_1     = 'Biaya Proses'; 
                        $LINK       = str_replace(' ', '_', $nama.' '.$nama_1.' '.$nama_parent.' '.$sub_app_name);
                            daftar_multi_hak_akses::full_insert($status_id,$DMHA_ID,$PARENT_ID,5,0,$nama_1,$LINK,$DESKRIPSI,NULL,85,4,1,4,NULL,1);

        ////////////////////////////////////////////////////////////////////////////    
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function kode_unik(){
        do {
            $kode_unik = str_random(20);
            $jumlah = data_02::where('kode_unik','like',$kode_unik)->count();
         } while ($jumlah  != 0);   

         return $kode_unik;
    }


    function other_data($PARENT_DMHA_ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

        // ------------------------------------------------------------------------- ACTION
            $isi_model = surat::selectRaw('02_data.kode_unik,
                02_data.berkas_id,
                02_data.berkas_data_id,
                02_data.kode_unik,
                surats.luas_hasil_ukur,
                surats.luas
                ')->join('02_data','02_data.berkas_id','surats.id')
                            ->where('02_data.sumber_data_pengisian_id', '=','1')
                            ->get();


            $counter = 1;
                
            foreach ($isi_model as $row) {

                $KODE_UNIK                  = $row->kode_unik;
                $BERKAS_ID                  = $row->berkas_id;
                $SUMBER_DATA_PENGISIAN_ID   = 7;
                $BERKAS_DATA_ID             = $row->berkas_data_id;
                $HELPER1                    = '';
                $HELPER2                    = '';
                $HELPER3                    = '';
                $HELPER4                    = '';
                $HELPER                     = '';

                //
                $PERTANYAAN_ID              = 36;
                $ISI                        = $row->luas_hasil_ukur;

                data_02::insert_02_data_from_migrate($PARENT_DMHA_ID,$KODE_UNIK,$BERKAS_ID,$SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$HELPER1,$HELPER2,$HELPER3,$HELPER4);

                data_details_02::insert_02_data_details_from_migrate($SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$PERTANYAAN_ID,$ISI,$HELPER);
            }

            foreach ($isi_model as $row) {

                $KODE_UNIK                  = $row->kode_unik;
                $BERKAS_ID                  = $row->berkas_id;
                $SUMBER_DATA_PENGISIAN_ID   = 10;
                $BERKAS_DATA_ID             = $row->berkas_data_id;
                $HELPER1                    = '';
                $HELPER2                    = '';
                $HELPER3                    = '';
                $HELPER4                    = '';
                $HELPER                     = '';

                //
                $PERTANYAAN_ID              = 34;
                $ISI                        = $row->luas;

                data_02::insert_02_data_from_migrate($PARENT_DMHA_ID,$KODE_UNIK,$BERKAS_ID,$SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$HELPER1,$HELPER2,$HELPER3,$HELPER4);

                data_details_02::insert_02_data_details_from_migrate($SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$PERTANYAAN_ID,$ISI,$HELPER);
            }


        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function new_select_data_details($KODE_UNIK,$SUMBER_DATA_PENGISIAN_ID,$PERTANYAAN_ID,$VALUE){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

        // ------------------------------------------------------------------------- ACTION
           
            $isi_model = data_02::selectRaw('02_data_details.isi')
                                ->join('02_data_details','02_data_details.berkas_data_id','02_data.berkas_data_id')
                            ->where('02_data.kode_unik','like',$KODE_UNIK)
                            ->where('02_data.sumber_data_pengisian_id','=',$SUMBER_DATA_PENGISIAN_ID)
                            ->where('02_data_details.sumber_data_pengisian_id','=',$SUMBER_DATA_PENGISIAN_ID)
                            ->where('02_data_details.pertanyaan_id','=',$PERTANYAAN_ID)
                            ->get();

            foreach ($isi_model as $row) {
                if($VALUE == 'isi'){
                    $isi .= $row->isi;
                }elseif($VALUE == 'helper'){
                    $isi .= $row->helper;
                }
            }

                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
            
    }

    function helping_1_02_updating_02_data_helper_as_biaya($PRIM,$VALUE,$VALUE_STATUS){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

        // ------------------------------------------------------------------------- ACTION
            $isi_model = data_02::where('prim', $PRIM)->first();

            $KODE_UNIK                  = $isi_model->kode_unik;
            $BERKAS_ID                  = $isi_model->berkas_id;
            $SUMBER_DATA_PENGISIAN_ID   = 23;
            $BERKAS_DATA_ID             = $isi_model->berkas_data_id;
            $HELPER1                    = '';
            $HELPER2                    = '';
            $HELPER3                    = '';
            $HELPER4                    = $VALUE_STATUS;
            $HELPER                     = NULL;

            //
            $PERTANYAAN_ID              = 43;
            $ISI                        = $VALUE;

            data_02::insert_02_data_from_migrate($isi_model->dmha_id,$KODE_UNIK,$BERKAS_ID,$SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$HELPER1,$HELPER2,$HELPER3,$HELPER4);

            data_details_02::insert_02_data_details_from_migrate($SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$PERTANYAAN_ID,$ISI,$HELPER);


        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function helping_1_02_updating_02_data_helper_as_biaya_2($PRIM,$VALUE_KET,$VALUE_DESA){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

        // ------------------------------------------------------------------------- ACTION
            $isi_model = data_02::where('prim', $PRIM)->first();

            $KODE_UNIK                  = $isi_model->kode_unik;

            data_02::where('kode_unik','like',$KODE_UNIK)
                ->where('sumber_data_pengisian_id','=',1)
                ->where('helper1','=',1)
                ->where('helper2','=',2)
                ->update([
                    'helper4'     => $VALUE_KET
                    ]);

            

            if(!is_null($VALUE_DESA))
            {
                $isi_model_2 = data_02::where('kode_unik','like',$KODE_UNIK)
                        ->where('sumber_data_pengisian_id','=',3)->first();
                $isi_model_3 = wilayah_kelurahans::where('nama','like',$VALUE_DESA)->first();

                data_details_02::where('sumber_data_pengisian_id','=',3)
                    ->where('berkas_data_id','=',$isi_model_2->berkas_data_id)
                    ->where('pertanyaan_id','=',24)
                    ->update([
                        'isi'     => $isi_model_3->id,
                        'helper'     => $isi_model_3->nama
                        ]);

                $isi_model_4 = wilayah_kecamatans::where('id','like',$isi_model_3->kecamatan_id)->first();

                data_details_02::where('sumber_data_pengisian_id','=',3)
                    ->where('berkas_data_id','=',$isi_model_2->berkas_data_id)
                    ->where('pertanyaan_id','=',23)
                    ->update([
                        'isi'     => $isi_model_4->id,
                        'helper'     => $isi_model_4->nama
                        ]);

                $isi_model_5 = wilayah_kotas::where('id','like',$isi_model_4->kota_id)->first();

                data_details_02::where('sumber_data_pengisian_id','=',3)
                    ->where('berkas_data_id','=',$isi_model_2->berkas_data_id)
                    ->where('pertanyaan_id','=',22)
                    ->update([
                        'isi'     => $isi_model_5->id,
                        'helper'     => $isi_model_5->nama
                        ]);
            }


        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function ktp($PARENT_DMHA_ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

        // ------------------------------------------------------------------------- ACTION
            $isi_model = surat::selectRaw('02_data.kode_unik,
                02_data.berkas_id,
                02_data.berkas_data_id,
                02_data.kode_unik,
                surats.ktp,
                surats.tempat_lahir,
                surats.tanggal_lahir,
                surats.alamat,
                surats.rt,
                surats.rw,
                surats.pekerjaan,
                surats.kwn,
                surats.jenis_kelamin,
                surats.agama,
                surats.ket_nama
                ')->join('02_data','02_data.berkas_id','surats.id')
                            ->where('02_data.sumber_data_pengisian_id', '=','1')
                            ->get();


            $counter = 1;
             
            /*   
            foreach ($isi_model as $row) {

                $KODE_UNIK                  = $row->kode_unik;
                $BERKAS_ID                  = $row->berkas_id;
                $SUMBER_DATA_PENGISIAN_ID   = 1;
                $BERKAS_DATA_ID             = $row->berkas_data_id;
                $HELPER1                    = '';
                $HELPER2                    = '';
                $HELPER3                    = '';
                $HELPER4                    = '';
                $HELPER                     = '';

                //
                $PERTANYAAN_ID              = 1;
                $ISI                        = $row->ktp;

                data_details_02::insert_02_data_details_from_migrate($SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$PERTANYAAN_ID,$ISI,$HELPER);
            }

            foreach ($isi_model as $row) {

                $KODE_UNIK                  = $row->kode_unik;
                $BERKAS_ID                  = $row->berkas_id;
                $SUMBER_DATA_PENGISIAN_ID   = 1;
                $BERKAS_DATA_ID             = $row->berkas_data_id;
                $HELPER1                    = '';
                $HELPER2                    = '';
                $HELPER3                    = '';
                $HELPER4                    = '';
                $HELPER                     = '';

                //
                $PERTANYAAN_ID              = 3;
                $ISI                        = $row->tempat_lahir;

                data_details_02::insert_02_data_details_from_migrate($SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$PERTANYAAN_ID,$ISI,$HELPER);
            }
            */

            foreach ($isi_model as $row) {

                $KODE_UNIK                  = $row->kode_unik;
                $BERKAS_ID                  = $row->berkas_id;
                $SUMBER_DATA_PENGISIAN_ID   = 1;
                $BERKAS_DATA_ID             = $row->berkas_data_id;
                $HELPER1                    = '';
                $HELPER2                    = '';
                $HELPER3                    = '';
                $HELPER4                    = '';
                $HELPER                     = '';

                //

                $temp                       = explode(' ', $row->tanggal_lahir);
                $temp2                      = explode('-', $temp[0]);
                $temp3                      = date( "d-m-Y", strtotime( $row->tanggal_lahir ) );;

                $PERTANYAAN_ID              = 4;
                $ISI                        = $temp3;

                data_details_02::insert_02_data_details_from_migrate($SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$PERTANYAAN_ID,$ISI,$HELPER);
            }

            /*

            foreach ($isi_model as $row) {

                $KODE_UNIK                  = $row->kode_unik;
                $BERKAS_ID                  = $row->berkas_id;
                $SUMBER_DATA_PENGISIAN_ID   = 1;
                $BERKAS_DATA_ID             = $row->berkas_data_id;
                $HELPER1                    = '';
                $HELPER2                    = '';
                $HELPER3                    = '';
                $HELPER4                    = '';
                $HELPER                     = '';

                //
                $PERTANYAAN_ID              = 5;
                $ISI                        = $row->alamat;

                data_details_02::insert_02_data_details_from_migrate($SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$PERTANYAAN_ID,$ISI,$HELPER);
            }

            foreach ($isi_model as $row) {

                $KODE_UNIK                  = $row->kode_unik;
                $BERKAS_ID                  = $row->berkas_id;
                $SUMBER_DATA_PENGISIAN_ID   = 1;
                $BERKAS_DATA_ID             = $row->berkas_data_id;
                $HELPER1                    = '';
                $HELPER2                    = '';
                $HELPER3                    = '';
                $HELPER4                    = '';
                $HELPER                     = '';

                //
                $PERTANYAAN_ID              = 6;
                $ISI                        = $row->rt;

                data_details_02::insert_02_data_details_from_migrate($SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$PERTANYAAN_ID,$ISI,$HELPER);
            }

            foreach ($isi_model as $row) {

                $KODE_UNIK                  = $row->kode_unik;
                $BERKAS_ID                  = $row->berkas_id;
                $SUMBER_DATA_PENGISIAN_ID   = 1;
                $BERKAS_DATA_ID             = $row->berkas_data_id;
                $HELPER1                    = '';
                $HELPER2                    = '';
                $HELPER3                    = '';
                $HELPER4                    = '';
                $HELPER                     = '';

                //
                $PERTANYAAN_ID              = 7;
                $ISI                        = $row->rw;

                data_details_02::insert_02_data_details_from_migrate($SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$PERTANYAAN_ID,$ISI,$HELPER);
            }

            foreach ($isi_model as $row) {

                $KODE_UNIK                  = $row->kode_unik;
                $BERKAS_ID                  = $row->berkas_id;
                $SUMBER_DATA_PENGISIAN_ID   = 1;
                $BERKAS_DATA_ID             = $row->berkas_data_id;
                $HELPER1                    = '';
                $HELPER2                    = '';
                $HELPER3                    = '';
                $HELPER4                    = '';
                $HELPER                     = '';

                //
                $PERTANYAAN_ID              = 11;
                $ISI                        = $row->pekerjaan;

                data_details_02::insert_02_data_details_from_migrate($SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$PERTANYAAN_ID,$ISI,$HELPER);
            }

            foreach ($isi_model as $row) {

                $KODE_UNIK                  = $row->kode_unik;
                $BERKAS_ID                  = $row->berkas_id;
                $SUMBER_DATA_PENGISIAN_ID   = 1;
                $BERKAS_DATA_ID             = $row->berkas_data_id;
                $HELPER1                    = '';
                $HELPER2                    = '';
                $HELPER3                    = '';
                $HELPER4                    = '';
                $HELPER                     = '';

                //
                $PERTANYAAN_ID              = 12;
                $ISI                        = $row->kwn;

                data_details_02::insert_02_data_details_from_migrate($SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$PERTANYAAN_ID,$ISI,$HELPER);
            }

            foreach ($isi_model as $row) {

                $KODE_UNIK                  = $row->kode_unik;
                $BERKAS_ID                  = $row->berkas_id;
                $SUMBER_DATA_PENGISIAN_ID   = 1;
                $BERKAS_DATA_ID             = $row->berkas_data_id;
                $HELPER1                    = '';
                $HELPER2                    = '';
                $HELPER3                    = '';
                $HELPER4                    = '';
                $HELPER                     = '';

                //
                $PERTANYAAN_ID              = 13;
                $ISI                        = $row->jenis_kelamin;

                data_details_02::insert_02_data_details_from_migrate($SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$PERTANYAAN_ID,$ISI,$HELPER);
            }

            foreach ($isi_model as $row) {

                $KODE_UNIK                  = $row->kode_unik;
                $BERKAS_ID                  = $row->berkas_id;
                $SUMBER_DATA_PENGISIAN_ID   = 1;
                $BERKAS_DATA_ID             = $row->berkas_data_id;
                $HELPER1                    = '';
                $HELPER2                    = '';
                $HELPER3                    = '';
                $HELPER4                    = '';
                $HELPER                     = '';

                //
                $PERTANYAAN_ID              = 14;
                $ISI                        = $row->agama;

                data_details_02::insert_02_data_details_from_migrate($SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$PERTANYAAN_ID,$ISI,$HELPER);
            }

            foreach ($isi_model as $row) {

                $KODE_UNIK                  = $row->kode_unik;
                $BERKAS_ID                  = $row->berkas_id;
                $SUMBER_DATA_PENGISIAN_ID   = 1;
                $BERKAS_DATA_ID             = $row->berkas_data_id;
                $HELPER1                    = '';
                $HELPER2                    = '';
                $HELPER3                    = '';
                $HELPER4                    = '';
                $HELPER                     = '';

                //
                $PERTANYAAN_ID              = 15;
                $ISI                        = $row->ket_nama;

                data_details_02::insert_02_data_details_from_migrate($SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$PERTANYAAN_ID,$ISI,$HELPER);
            }
            */


        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function wilayah_ktp($PARENT_DMHA_ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

        // ------------------------------------------------------------------------- ACTION
            $isi_model = surat::selectRaw('02_data.kode_unik,
                02_data.berkas_id,
                02_data.berkas_data_id,
                02_data.kode_unik,
                surats.wilayah_pemohon
                ')->join('02_data','02_data.berkas_id','surats.id')
                            ->where('02_data.sumber_data_pengisian_id', '=','1')
                            ->get();


            $counter = 1;           


            foreach ($isi_model as $row) {

                $KODE_UNIK                  = $row->kode_unik;
                $BERKAS_ID                  = $row->berkas_id;
                $SUMBER_DATA_PENGISIAN_ID   = 1;
                $BERKAS_DATA_ID             = $row->berkas_data_id;
                $HELPER1                    = '';
                $HELPER2                    = '';
                $HELPER3                    = '';
                $HELPER4                    = '';

                //

                $cari_wilayah = wilayahs::where('id','=',$row->wilayah_pemohon)->first();

                if(count($cari_wilayah) > 0)
                {
                    $cari_wil_kot = wilayah_kotas::where('nama','like',$cari_wilayah['kota'])->first();
                }else
                {
                    $cari_wil_kot = 0;
                }

                $PERTANYAAN_ID              = 8;
                if(count($cari_wil_kot) > 0)
                {
                    $ISI                        = $cari_wil_kot['id'];
                    $HELPER                     = $cari_wil_kot['nama'];
                }else{
                    $ISI                        = '';
                    $HELPER                     = '';
                }

                data_details_02::insert_02_data_details_from_migrate($SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$PERTANYAAN_ID,$ISI,$HELPER);

                //////////////////////////////////////////////////////////////////

                if(count($cari_wilayah) > 0 && count($cari_wil_kot) > 0)
                {
                    $cari_wil_kec = wilayah_kecamatans::where('kota_id','like',$cari_wil_kot['id'])
                            ->where('nama','like',$cari_wilayah['kecamatan'])
                            ->first();
                }
                    else
                {
                    $cari_wil_kec = 0;
                }

                $PERTANYAAN_ID              = 9;
                if(count($cari_wil_kec) > 0 && count($cari_wil_kot) > 0 && count($cari_wil_kec) > 0)
                {
                    $ISI                        = $cari_wil_kec['id'];
                    $HELPER                     = $cari_wil_kec['nama'];
                }else{
                    $ISI                        = '';
                    $HELPER                     = '';
                }

                data_details_02::insert_02_data_details_from_migrate($SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$PERTANYAAN_ID,$ISI,$HELPER);

                //////////////////////////////////////

                if(count($cari_wilayah) > 0)
                {
                    $cari_wil_kot = wilayah_kelurahans::where('nama','like',$cari_wilayah['desa'])->first();
                }else
                {
                    $cari_wil_kot = 0;
                }

                $PERTANYAAN_ID              = 10;
                if(count($cari_wil_kot) > 0)
                {
                    $ISI                        = $cari_wil_kot['id'];
                    $HELPER                     = $cari_wil_kot['nama'];
                }else{
                    $ISI                        = '';
                    $HELPER                     = '';
                }

                data_details_02::insert_02_data_details_from_migrate($SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$PERTANYAAN_ID,$ISI,$HELPER);
            }


        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function wilayah_sppt($PARENT_DMHA_ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

        // ------------------------------------------------------------------------- ACTION
            $isi_model = surat::selectRaw('02_data.kode_unik,
                02_data.berkas_id,
                02_data.berkas_data_id,
                02_data.kode_unik,
                surats.wilayah_tanah
                ')->join('02_data','02_data.berkas_id','surats.id')
                            ->where('02_data.sumber_data_pengisian_id', '=','1')
                            ->get();


            $counter = 1;           


            foreach ($isi_model as $row) {

                $KODE_UNIK                  = $row->kode_unik;
                $BERKAS_ID                  = $row->berkas_id;
                $SUMBER_DATA_PENGISIAN_ID   = 3;
                $BERKAS_DATA_ID             = $row->berkas_data_id;
                $HELPER1                    = '';
                $HELPER2                    = '';
                $HELPER3                    = '';
                $HELPER4                    = '';

                //

                $cari_wilayah = wilayahs::where('id','=',$row->wilayah_tanah)->first();

                if(count($cari_wilayah) > 0)
                {
                    $cari_wil_kot = wilayah_kotas::where('nama','like',$cari_wilayah['kota'])->first();
                }else
                {
                    $cari_wil_kot = 0;
                }

                $PERTANYAAN_ID              = 22;
                if(count($cari_wil_kot) > 0)
                {
                    $ISI                        = $cari_wil_kot['id'];
                    $HELPER                     = $cari_wil_kot['nama'];
                }else{
                    $ISI                        = '';
                    $HELPER                     = '';
                }

                data_02::insert_02_data_from_migrate($PARENT_DMHA_ID,$KODE_UNIK,$BERKAS_ID,$SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$HELPER1,$HELPER2,$HELPER3,$HELPER4);

                data_details_02::insert_02_data_details_from_migrate($SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$PERTANYAAN_ID,$ISI,$HELPER);

                //////////////////////////////////////////////////////////////////

                if(count($cari_wilayah) > 0 && count($cari_wil_kot) > 0)
                {
                    $cari_wil_kec = wilayah_kecamatans::where('kota_id','like',$cari_wil_kot['id'])
                            ->where('nama','like',$cari_wilayah['kecamatan'])
                            ->first();
                }
                    else
                {
                    $cari_wil_kec = 0;
                }

                $PERTANYAAN_ID              = 23;
                if(count($cari_wil_kec) > 0 && count($cari_wil_kot) > 0 && count($cari_wil_kec) > 0)
                {
                    $ISI                        = $cari_wil_kec['id'];
                    $HELPER                     = $cari_wil_kec['nama'];
                }else{
                    $ISI                        = '';
                    $HELPER                     = '';
                }

                data_details_02::insert_02_data_details_from_migrate($SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$PERTANYAAN_ID,$ISI,$HELPER);

                //////////////////////////////////////

                if(count($cari_wilayah) > 0)
                {
                    $cari_wil_kot = wilayah_kelurahans::where('nama','like',$cari_wilayah['desa'])->first();
                }else
                {
                    $cari_wil_kot = 0;
                }

                $PERTANYAAN_ID              = 24;
                if(count($cari_wil_kot) > 0)
                {
                    $ISI                        = $cari_wil_kot['id'];
                    $HELPER                     = $cari_wil_kot['nama'];
                }else{
                    $ISI                        = '';
                    $HELPER                     = '';
                }

                data_details_02::insert_02_data_details_from_migrate($SUMBER_DATA_PENGISIAN_ID,$BERKAS_DATA_ID,$PERTANYAAN_ID,$ISI,$HELPER);
            }


        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function check_bukti_perolehan($TANGGAL_LAHIR_PEMOHON){        
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $tanggal            = '1976-10-31';
            $explode_tanggal    = explode('-', $TANGGAL_LAHIR_PEMOHON);

        // ------------------------------------------------------------------------- ACTION
            /*
            if($tanggal <= $explode_tanggal[2].'-'.$explode_tanggal[1].'-'.$explode_tanggal[0])
            {
                $isi = 'text-danger';
            }
            */
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function dashboard_biaya($PARENT_DMHA_ID,$DMHA_ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

        // ------------------------------------------------------------------------- ACTION
            $isi .= '
                <!-- begin col-4 -->
                <div class="col-lg-4 col-md-4">
                    <div class="widget widget-stats bg-red">
                        <div class="stats-icon"><i class="far fa-money-bill-alt"></i></div>
                        <div class="stats-info">
                            <h4>Yang harus dibayar</h4>
                            <p id="total_biaya_proses">
                                Rp. '.number_format(yang_harus_dibayar($PARENT_DMHA_ID), 0, ',', '.').'
                            </p>    
                        </div>
                    </div>

                    <div class="panel panel-inverse">
                        <div class="panel-body">                            
                                '.yang_harus_dibayar_per_desa($PARENT_DMHA_ID,$DMHA_ID).'
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="widget widget-stats bg-green">
                        <div class="stats-icon"><i class="far fa-money-bill-alt"></i></div>
                        <div class="stats-info">
                            <h4>Piutang</h4>
                            <p id="yang_sudah_dibayar">
                                Rp. '.number_format(sisa_pembayaran($PARENT_DMHA_ID), 0, ',', '.').'
                            </p>    
                        </div>
                    </div>

                    <div class="panel panel-inverse">
                        <div class="panel-body">                            
                                '.sisa_pembayaran_per_desa($PARENT_DMHA_ID).'
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="widget widget-stats bg-blue">
                        <div class="stats-icon"><i class="far fa-money-bill-alt"></i></div>
                        <div class="stats-info">
                            <h4>Sisa</h4>
                            <p id="yang_sudah_dibayar">
                                Rp. '.number_format((yang_harus_dibayar($PARENT_DMHA_ID) - sisa_pembayaran($PARENT_DMHA_ID)), 0, ',', '.').'
                            </p>    
                        </div>
                    </div>

                </div>
                <!-- end col-4-->
            '; 
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function yang_harus_dibayar($PARENT_DMHA_ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            // total jumlah biaya
            $isi_model = biaya_02::hitung_total_biaya($PARENT_DMHA_ID);
            $isi_model_2 = riwayat_pembayaran_02::where('dmha_id','like',$PARENT_DMHA_ID)->sum('jumlah');
            $isi_model_3 = data_02::join_3_7_10_23_24_25_26_27_n_02_proses($PARENT_DMHA_ID,'desa','')->count();
        // ------------------------------------------------------------------------- ACTION

        // ------------------------------------------------------------------------- SEND
            $words = ($isi_model * $isi_model_3) - $isi_model_2;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function sisa_pembayaran($PARENT_DMHA_ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            $isi_model = data_02::where('dmha_id','like',$PARENT_DMHA_ID)
                            ->where('sumber_data_pengisian_id','=',23)
                            ->sum('helper5');
        // ------------------------------------------------------------------------- ACTION

        // ------------------------------------------------------------------------- SEND
            $words = $isi_model;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function yang_harus_dibayar_per_desa($PARENT_ID,$DMHA_ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = ''; 

            $isi_model = data_02::selectRaw('b.helper3')
                            ->selectRaw('b.helper4')
                            ->selectRaw('sum(jumlah) as jumlah')
                            ->join('02_data as b','b.kode_unik','02_data.kode_unik')
                            ->join('02_riwayat_pembayaran as c','c.kode_unik','02_data.kode_unik')
                            ->where('02_data.dmha_id','like',$PARENT_ID)
                            ->where('b.dmha_id','like',$PARENT_ID)
                            ->where('c.dmha_id','like',$PARENT_ID)
                            ->where('02_data.sumber_data_pengisian_id','=',23)
                            ->where('b.sumber_data_pengisian_id','=',3)
                            ->groupBy('b.helper4')
                            ->groupBy('b.helper3')
                            ->orderBy('b.helper4','asc')
                            ->get();

            $total_biaya_per_berkas = biaya_02::hitung_total_biaya($PARENT_ID);
        // ------------------------------------------------------------------------- ACTION
            $isi .= '<table class="table table-striped">';
            foreach ($isi_model as $row) {
                $isi .= '<tr>';
                $isi .= '<td>';
                $isi .= $row->helper4;
                $isi .= '</td>';
                $isi .= '<td class="text-right">';

                $hitung_total_desa =  data_02::join('02_data as b','b.kode_unik','02_data.kode_unik')
                                        ->where('02_data.dmha_id','like','0201')
                                        ->where('b.dmha_id','like','0201')
                                        ->where('02_data.sumber_data_pengisian_id','=',3)
                                        ->where('b.sumber_data_pengisian_id','=',23)
                                        ->where('02_data.helper3','like',$row->helper3)
                                        ->where('b.helper1','!=',9)
                                        ->count();

                $isi .= 'Rp. '.number_format( (($hitung_total_desa * $total_biaya_per_berkas) -   $row->jumlah), 0, ',', '.');
                $isi .= '</td>';

                $isi .= '</tr>';
            }
            $isi .= '</table>';
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }


    function sisa_pembayaran_per_desa($PARENT_DMHA_ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            $isi_model = data_02::selectRaw('b.helper4')
                            ->selectRaw('sum(02_data.helper5) as helper5')
                            ->join('02_data as b','b.kode_unik','02_data.kode_unik')
                            ->where('02_data.dmha_id','like',$PARENT_DMHA_ID)
                            ->where('b.dmha_id','like',$PARENT_DMHA_ID)
                            ->where('02_data.sumber_data_pengisian_id','=',23)
                            ->where('b.sumber_data_pengisian_id','=',3)
                            ->groupBy('b.helper4')
                            ->orderBy('b.helper4','asc')
                            ->get();
        // ------------------------------------------------------------------------- ACTION
            $isi .= '<table class="table table-striped">';
            foreach ($isi_model as $row) {
                $isi .= '<tr>';
                $isi .= '<td>';
                $isi .= $row->helper4;
                $isi .= '</td>';

                $isi .= '<td class="text-right">';
                $isi .= 'Rp. '.number_format($row->helper5, 0, ',', '.');
                $isi .= '</td>';

                $isi .= '</tr>';
            }
            $isi .= '</table>';
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function riwayat_pembayaran($PARENT_DMHA_ID,$TIPE){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            $isi_model = riwayat_pembayaran_02::where('dmha_id','like',$PARENT_DMHA_ID)
                            ->where('tipe','=',$TIPE)
                            ->sum('jumlah');
        // ------------------------------------------------------------------------- ACTION

        // ------------------------------------------------------------------------- SEND
            $words = $isi_model;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function total_biaya_proses(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $total_biaya = 0;

            $isi_model = data_02::selectRaw('helper1, count(*) as counter')->where('sumber_data_pengisian_id','like',23)->groupBy('helper1')->get();

        // ------------------------------------------------------------------------- ACTION
            foreach ($isi_model as $row) {
                $total_biaya += $row->counter * count_biaya_total($row->helper1);
            }   
                
        // ------------------------------------------------------------------------- SEND
            $words = $total_biaya;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function count_biaya_total($ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            $isi_model = biaya_02::find($ID);
            $isi_model_2 = biaya_02::where('urutan','>=',$isi_model->urutan)->sum('biaya');

        // ------------------------------------------------------------------------- ACTION
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi_model_2;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function select_form_biaya_proses($PARENT_DMHA_ID,$DETAIL_TEMPLATE){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            $isi_model = biaya_proses_02::orderBy('urutan')->get();

        // ------------------------------------------------------------------------- ACTION

            $isi .= '
                <button type="button" class="btn btn-block btn-default text-left clickme" id_spec="0">Semua</button> ';
            foreach ($isi_model as $row) {                    
                $isi .= '
                <button type="button" value="'.$row->id.'" class="btn btn-block btn-default text-left clickme" id_spec="'.$row->id.'">'.$row->nama.' '.count_proses_biaya($row->id,$PARENT_DMHA_ID).'</button> ';
            }
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function count_proses_biaya($ID,$PARENT_DMHA_ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            $isi_model = data_02::hitung_data_pemohon_per_proses($ID,$PARENT_DMHA_ID);

        // ------------------------------------------------------------------------- ACTION
            if($isi_model > 0)
            {
                $isi .= '<span class="label label-info pull-right" id="span_count_data_'.$ID.'">';
                $isi .= $isi_model;
                $isi .= '</span>';
            }
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }


    function update_sdp_3(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            $isi_model = data_02::where('sumber_data_pengisian_id','=',3)
                            ->where('helper4','=','')
                            ->whereNull('updated_at')
                            ->get();

        // ------------------------------------------------------------------------- ACTION
            foreach ($isi_model as $row) {

                $kota = data_details_02::where('sumber_data_pengisian_id','=',3)
                            ->where('pertanyaan_id','=',22)
                            ->where('berkas_data_id','=',$row->berkas_data_id)
                            ->first();

                $kec = data_details_02::where('sumber_data_pengisian_id','=',3)
                            ->where('pertanyaan_id','=',23)
                            ->where('berkas_data_id','=',$row->berkas_data_id)
                            ->first();

                $kel = data_details_02::where('sumber_data_pengisian_id','=',3)
                            ->where('pertanyaan_id','=',24)
                            ->where('berkas_data_id','=',$row->berkas_data_id)
                            ->first();

                $helper1 = $kota->isi;
                $helper2 = $kec->isi;
                $helper3 = $kel->isi;
                $helper4 = $kel->helper;

                data_02::where('kode_unik','like',$row->kode_unik)
                    ->where('sumber_data_pengisian_id','=',3)
                    ->where('berkas_data_id','=',$row->berkas_data_id)
                    ->update([
                        'helper1'     => $helper1,
                        'helper2'     => $helper2,
                        'helper3'     => $helper3,
                        'helper4'     => $helper4
                        ]);

            }
                
        ////////////////////////////////////////////////////////////////////////////
    }

    function update_dmha_id(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            $isi_model = data_02::whereIn('kode_unik', function($query){
                            $query->select('kode_unik')
                            ->from(with(new data_02)->getTable())
                            ->where('dmha_id','like','0202');
                        })
                        ->get();

        // ------------------------------------------------------------------------- ACTION
            foreach ($isi_model as $row) {
                data_02::where('prim','like',$row->prim)
                    ->update([
                        'dmha_id'     => '0202'
                        ]);
            }

            $isi_model = data_02::whereIn('kode_unik', function($query){
                            $query->select('kode_unik')
                            ->from(with(new data_02)->getTable())
                            ->where('dmha_id','like','0204');
                        })
                        ->get();

        // ------------------------------------------------------------------------- ACTION
            foreach ($isi_model as $row) {
                data_02::where('prim','like',$row->prim)
                    ->update([
                        'dmha_id'     => '0204'
                        ]);
            }

                
        ////////////////////////////////////////////////////////////////////////////
    }

    function update_sdp_1(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            $isi_model = data_02::where('sumber_data_pengisian_id','=',1)
                            ->where('helper4','=','')
                            ->whereNull('updated_at')
                            ->get();

        // ------------------------------------------------------------------------- ACTION
            foreach ($isi_model as $row) {

                $nama = data_details_02::where('sumber_data_pengisian_id','=',1)
                            ->where('pertanyaan_id','=',2)
                            ->where('berkas_data_id','=',$row->berkas_data_id)
                            ->first();

                $tgl = data_details_02::where('sumber_data_pengisian_id','=',1)
                            ->where('pertanyaan_id','=',4)
                            ->where('berkas_data_id','=',$row->berkas_data_id)
                            ->first();

                $helper3 = $nama->isi;
                $helper4 = $tgl->isi;

                data_02::where('kode_unik','like',$row->kode_unik)
                    ->where('sumber_data_pengisian_id','=',1)
                    ->where('berkas_data_id','=',$row->berkas_data_id)
                    ->update([
                        'helper3'     => $helper3,
                        'helper4'     => $helper4
                        ]);

            }
                
        ////////////////////////////////////////////////////////////////////////////
    }

    function update_sdp_1_helper(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            $isi_model = data_02::where('sumber_data_pengisian_id','=',1)
                            ->where('helper3','=','')
                            ->get();

        // ------------------------------------------------------------------------- ACTION
            foreach ($isi_model as $row) {

                $nama = data_details_02::where('sumber_data_pengisian_id','=',1)
                            ->where('pertanyaan_id','=',2)
                            ->where('berkas_data_id','=',$row->berkas_data_id)
                            ->first();

                $helper5 = $row->helper4;

                $tgl = data_details_02::where('sumber_data_pengisian_id','=',1)
                            ->where('pertanyaan_id','=',4)
                            ->where('berkas_data_id','=',$row->berkas_data_id)
                            ->first();

                $helper3 = $nama->isi;
                $helper4 = $tgl->isi;

                data_02::where('kode_unik','like',$row->kode_unik)
                    ->where('sumber_data_pengisian_id','=',1)
                    ->where('berkas_data_id','=',$row->berkas_data_id)
                    ->update([
                        'helper3'     => $helper3,
                        'helper4'     => $helper4,
                        'helper5'     => $helper5
                        ]);

            }
                
        ////////////////////////////////////////////////////////////////////////////
    }

    function move_to_dmha_id(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            $isi_model = data_02::whereNotIn('kode_unik', function($query){

                            $query->select('kode_unik')
                            ->from(with(new data_02)->getTable())
                            ->where('sumber_data_pengisian_id','=',23);
                        })
                        ->whereNull('apdet')
                        ->get();

        // ------------------------------------------------------------------------- ACTION
            foreach ($isi_model as $row) {

                data_02::where('kode_unik','like',$row->kode_unik)
                    ->update([
                        'dmha_id'     => '0202',                        
                        'apdet'     => now()
                        ]);

            }
                
        ////////////////////////////////////////////////////////////////////////////
    }

    function move_to_dmha_id_part_2(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            $isi_model = data_02::where('sumber_data_pengisian_id','=',3)
                        ->where('helper4','like','Jumputrejo')
                        ->get();

        // ------------------------------------------------------------------------- ACTION
            foreach ($isi_model as $row) {

                data_02::where('kode_unik','like',$row->kode_unik)
                    ->update([
                        'dmha_id'     => '0201',                        
                        'apdet'     => now()
                        ]);

            }
                
        ////////////////////////////////////////////////////////////////////////////
    }


    function update_sdp_23(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            $isi_model = data_02::where('dmha_id','like','0201')
                        ->where('sumber_data_pengisian_id','=', 23)
                        ->get();

        // ------------------------------------------------------------------------- ACTION
            foreach ($isi_model as $row) {

                data_02::where('kode_unik','like',$row->kode_unik)
                    ->update([
                        'dmha_id'     => '0202',                        
                        'apdet'     => now()
                        ]);

            }
                
        ////////////////////////////////////////////////////////////////////////////
    }

    function update_sdp_23_new(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            /*
                $isi_model = data_02::where('dmha_id','like','0201')
                        ->where('sumber_data_pengisian_id','=', 23)
                        ->get();
            */

        // ------------------------------------------------------------------------- ACTION
            /*
                foreach ($isi_model as $row) {

                    $isi_model_2 = data_details_02::where('berkas_data_id','=', $row->berkas_data_id)
                            ->where('sumber_data_pengisian_id','=', 23)
                            ->where('pertanyaan_id','=', 43)
                            ->first();

                    data_02::where('kode_unik','like',$row->kode_unik)
                        ->where('sumber_data_pengisian_id','=',23)
                        ->where('berkas_data_id','=',$row->berkas_data_id)
                        ->update([
                            'helper2'     => $isi_model_2->isi
                            ]);
                }
            */

                $isi_model = data_02::where('dmha_id','like','0201')
                        ->where('sumber_data_pengisian_id','=', 23)
                        ->where('helper1','=', 2)
                        ->get();

                foreach ($isi_model as $row) {

                    data_02::where('kode_unik','like',$row->kode_unik)
                        ->where('sumber_data_pengisian_id','=',23)
                        ->update([
                            'helper1'     => 3
                            ]);
                }
                
        ////////////////////////////////////////////////////////////////////////////
    }

    function distinct_deskel($PARENT_ID,$DMHA_ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            $isi_model = data_02::selectRaw('02_data.helper4, 02_data.helper3, count(02_data.helper4) as count')
                        ->join('02_data as b','b.kode_unik','02_data.kode_unik')
                        ->where('02_data.dmha_id','like',$PARENT_ID)
                        ->where('02_data.sumber_data_pengisian_id','=',3)
                        ->where('b.sumber_data_pengisian_id','=',23)
                        ->where('b.helper1','!=',9)
                        ->groupBy('02_data.helper3')
                        ->groupBy('02_data.helper4')
                        ->orderBy('02_data.helper4')
                        ->get();

        // ------------------------------------------------------------------------- ACTION
            foreach ($isi_model as $row) {
                $isi .= '<div class="btn-group m-4">';
                $isi .= make_buttons($PARENT_ID,$DMHA_ID,$row->helper4,$row->helper3,$row->count,' btn-deskel btn-sm');
                $isi .= make_ahref($PARENT_ID,$DMHA_ID,$row->helper4,$row->helper3,$row->count,' btn-sm');
                $isi .= '</div>';
            }
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
                
        ////////////////////////////////////////////////////////////////////////////
    }

    function distinct_deskel_proses($PARENT_ID,$DMHA_ID,$KELURAHAN_ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            if($KELURAHAN_ID == 0){
                $isi_model = data_02::selectRaw('count(c.id) as count, c.nama, c.id, c.urutan ')
                            ->join('02_data as b','b.kode_unik','02_data.kode_unik')
                            ->join('02_proses as c','c.id','b.helper1')
                            ->where('b.sumber_data_pengisian_id','=',23)
                            ->where('02_data.sumber_data_pengisian_id','=',3)
                            ->where('02_data.dmha_id','like',$PARENT_ID)
                            ->where('b.dmha_id','like',$PARENT_ID)
                            ->where('c.selesai','=',0)
                            ->where('02_data.helper4','!=','')
                            ->groupBy('c.urutan')
                            ->groupBy('c.nama')
                            ->groupBy('c.id')
                            ->orderBy('c.urutan', 'asc')
                        ->get();
            }else{
                $isi_model = data_02::selectRaw('count(b.helper4) as count, c.nama, c.id, c.urutan ')
                            ->join('02_data as b','b.kode_unik','02_data.kode_unik')
                            ->join('02_proses as c','c.id','b.helper1')
                            ->where('b.sumber_data_pengisian_id','=',23)
                            ->where('02_data.sumber_data_pengisian_id','=',3)
                            ->where('02_data.dmha_id','like',$PARENT_ID)
                            ->where('b.dmha_id','like',$PARENT_ID)
                            ->where('02_data.helper3','like',$KELURAHAN_ID)
                            ->where('02_data.helper4','!=','')
                            ->where('c.selesai','=',0)
                            ->groupBy('b.helper4')
                            ->groupBy('c.urutan')
                            ->groupBy('c.nama')
                            ->groupBy('c.id')
                            ->orderBy('c.urutan', 'asc')
                        ->get();
            }

        // ------------------------------------------------------------------------- ACTION
            $count = 0;
            foreach ($isi_model as $row) {                
                $isi .= '<div class="btn-group m-4">';
                $isi .= make_buttons($PARENT_ID,$DMHA_ID,$row->nama,$row->id,$row->count,' btn-proses btn-sm ');                
                $isi .= make_ahref($PARENT_ID,$DMHA_ID,'proses',$row->id,$row->count,' btn-sm');
                $isi .= '</div>';
                $count += $row->count;
            }
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
                
        ////////////////////////////////////////////////////////////////////////////
    }

    function make_buttons($PARENT_ID,$DMHA_ID,$NAMA,$CUSTOM_ID,$COUNT,$CLASS){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

        // ------------------------------------------------------------------------- ACTION
            $isi .= '
                <button type="button" class="btn btn-default '.$CLASS.'" id="'.$CUSTOM_ID.'" value="'.$CUSTOM_ID.'">
                    '.$NAMA;

                if($COUNT != ''){
                    $isi .= '
                    <span class="badge badge-inverse">
                        '.$COUNT.'
                    </span>';
                }
                    $isi .= '
                </button>';
                
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function make_ahref($PARENT_ID,$DMHA_ID,$NAMA,$CUSTOM_ID,$COUNT,$CLASS){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            $isi_model = daftar_multi_hak_akses::what_is_my_parent_id($DMHA_ID);

        // ------------------------------------------------------------------------- ACTION

            if($NAMA == 'proses'){
                $isi_model_2 = proses_02::what_is_my_proses($CUSTOM_ID,$PARENT_ID);
            }elseif(!is_null($CUSTOM_ID)){                
                $isi_model_2 = wilayah_kelurahans::what_is_my_kelurahan_id($CUSTOM_ID);
            }

            foreach ($isi_model as $row) {                
                $isi .= '
                <a href="'.$row->link.'/';

                    if($NAMA == 'proses'){
                        $isi .= 'Proses/'.str_replace(' ', '_', $isi_model_2);
                    }elseif(!is_null($CUSTOM_ID)){                
                        $isi .= 'Desa/'.str_replace(' ', '_', $isi_model_2->nama);
                    }                   

                $isi .= '" class="btn btn-default '.$CLASS.'">';
                    $isi .= show_me_dmha_icon($row->icon);
                $isi .= '
                </a>';
            }
                    
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function update_sdp_3_helper(){
        // ------------------------------------------------------------------------- INITIALIZE
            $nama = 'Sidomulyo';
            $kecamatan_id = '3515170';

            $isi_model = wilayah_kelurahans::where('nama','like',$nama)
                        ->where('kecamatan_id','like', $kecamatan_id.'%')
                        ->first();

            data_02::where('sumber_data_pengisian_id', '=', 3)
                        ->where('helper4','like', $nama)
                        ->where('helper2','like', $kecamatan_id.'%')
                        ->update([
                            'helper3'     => $isi_model->id
                        ]);

            data_details_02::where('sumber_data_pengisian_id', '=', 3)
                        ->where('pertanyaan_id', '=', 24)
                        ->where('helper','like', $nama)
                        ->update([
                            'isi'     => $isi_model->id
                        ]);
                
        ////////////////////////////////////////////////////////////////////////////
    }

    function update_sdp_10(){
        // ------------------------------------------------------------------------- INITIALIZE

            // $isi_model = data_details_02::where('sumber_data_pengisian_id','=',10)
            //             ->where('pertanyaan_id','=', 36)
            //             ->get();

            $isi_model = data_02::where('sumber_data_pengisian_id','=',7)
                        ->where('helper1','=','')
                        ->get();

            foreach ($isi_model as $row) {      

                $isi_model_2 = data_details_02::where('sumber_data_pengisian_id','=',7)
                        ->where('pertanyaan_id','=', 34)
                        ->where('berkas_data_id','=', $row->berkas_data_id)
                        ->first();

                if($isi_model_2->isi == 0)
                {
                    $isi = '';
                }else{
                    $isi = $isi_model_2->isi;
                }

                data_02::where('sumber_data_pengisian_id', '=', 7)
                        ->where('berkas_data_id','=', $row->berkas_data_id)
                        ->update([
                            'helper1'     => $isi
                        ]);
            }
                
        ////////////////////////////////////////////////////////////////////////////
    }
    //SELECT kode_unik FROM `02_data` WHERE `kode_unik` NOT IN (SELECT kode_unik FROM `02_data` WHERE `dmha_id` LIKE '0201' AND `sumber_data_pengisian_id` = 23) and dmha_id like '0201' group by kode_unik

    function insert_sdp_23(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi_model = data_02::select('kode_unik')
                        ->whereIn('kode_unik', function($query){
                            $query->select('kode_unik')
                            ->from(with(new data_02)->getTable())
                            ->where('dmha_id','like','0201')
                            ->where('sumber_data_pengisian_id','=','23');
                        })
                        ->where('dmha_id','like','0201')
                        ->groupBy('kode_unik')
                        ->get();

            foreach ($isi_model as $row) {      

                data_02::insert_02_data_from_migrate(
                        $row->dmha_id,
                        $row->kode_unik,
                        $row->berkas_id,
                        23,
                        $BERKAS_DATA_ID,
                        $HELPER1,
                        $HELPER2,
                        $HELPER3,
                        $HELPER4);
            }
                
        ////////////////////////////////////////////////////////////////////////////
    }

    function migrasi_kedua(){

        // ------------------------------------------------------------------------- INITIALIZE
            $isi_model = data_02::selectRaw('02_data.kode_unik')
                        ->selectRaw('02_data.prim')
                        ->selectRaw('02_data.berkas_id')
                        ->selectRaw('02_data.helper3 as nama_pemohon')
                        ->selectRaw('02_data.helper4 as tanggal_lahir')
                        ->selectRaw('02_data.helper5 as ket')
                        ->selectRaw('c.nama as nama_proses')
                        ->selectRaw('b.helper2 as pembayaran')
                        ->selectRaw('d.helper4 as deskel')
                        ->selectRaw('e.helper1 as lp')
                        ->selectRaw('f.helper1 as lu')

                            ->join('02_data as b','b.kode_unik','02_data.kode_unik')
                            ->join('02_proses as c','c.id','b.helper1')
                            ->join('02_data as d','d.kode_unik','b.kode_unik')
                            ->join('02_data as e','e.kode_unik','02_data.kode_unik')
                            ->join('02_data as f','f.kode_unik','02_data.kode_unik')

                                ->where('b.sumber_data_pengisian_id','=',23)
                                ->where('d.sumber_data_pengisian_id','=',3)
                                ->where('e.sumber_data_pengisian_id','=',7)
                                ->where('f.sumber_data_pengisian_id','=',10)
                                ->where('02_data.sumber_data_pengisian_id','=',1)                           
                                ->where('02_data.dmha_id','like','0201')
                                ->where('b.dmha_id','like','0201')
                                ->where('d.dmha_id','like','0201')
                                ->where('e.dmha_id','like','0201')
                                ->where('f.dmha_id','like','0201')

                                ->whereNull('b.apdet')

                                    ->orderBy('c.urutan','desc')
                                    ->orderBy('deskel','asc')
                                    ->orderBy('02_data.helper3','asc')
                            ->get();

            $isi = '';
            $counter = 0;

            foreach ($isi_model as $row) {
                $counter++;
                $isi .= '  
                    <tr  id="tr_'.$row->prim.'" 
                        class="';
                        if($counter == 1){
                            $proses = $row->nama_proses;
                        }else{                          
                            if($proses != $row->nama_proses){
                                $isi .= ' border-top-2px ';
                            }
                            $proses = $row->nama_proses;
                        }
                        $isi .= '"
                        >
                        <td class="text-right">
                            '.$counter.'
                        </td>
                        <td class="text-right">
                            '.$row->berkas_id.'
                        </td>
                        <td class="'; 
                        $isi .= check_bukti_perolehan($row->tanggal_lahir);
                        $isi .='">';
                        $isi .= $row->nama_pemohon;   

                        $ket = $row->ket;

                        if($ket != '')
                        {
                            $isi .= ' (';
                            $isi .= $ket; 
                            $isi .= ')'; 
                        }

                $isi .= '
                    </td>';
                    $temp = $row->pembayaran; 

                    if($temp == 'Kredit')
                        {$isi .= '<td class="text-danger text-center">'.$temp;}
                    else
                        {$isi .= '<td class=" text-center">'.$temp;}
                            
                $isi .= '
                    </td>
                    <td class=" text-center">';
                    $isi .= $row->deskel; 

                $isi .= '
                    </td>
                    <td class="text-right">';
                    if($row->lu == ''){
                        $isi .= '&plusmn;'.$row->lp;
                    }else{
                        $isi .= $row->lu;
                    }

                    $isi .= 'm&sup2; ';

                $isi .= '</td>';

                $isi .= '<td class="text-center">';            
                    $isi .= $row->nama_proses; 
                $isi .= ' </td>';

                $isi .= '<td class="text-center">';      
                    $isi .= '<input type="text" class="form-control" value="'.$row->prim.'"   name="prim"/>'; 
                $isi .= ' </td>';

                $isi .= '<td class="text-center">';           
                    $isi .= '<input type="text" class="form-control" id="nu_'.$row->prim.'"  name="nomer_ukur" />'; 
                $isi .= ' </td>';


                $isi .= '<td class="text-center">';           
                    $isi .= '<input type="text" class="form-control" id="tu_'.$row->prim.'"  name="tahun_ukur" />'; 
                $isi .= ' </td>';


                $isi .= '<td class="text-center">';           
                    $isi .= '<input type="text" class="form-control" id="ns_'.$row->prim.'"  name="nomer_srtpkt" />'; 
                $isi .= ' </td>';


                $isi .= '<td class="text-center">';            
                    $isi .= '<input type="text" class="form-control" id="ts_'.$row->prim.'"  name="tahun_srtpkt" />'; 
                $isi .= ' </td>';

                $isi .= '<td class="text-center">';   
                    $isi .= '<input type="text" class="form-control datepicker-autoClose" id="tgl_umum_'.$row->prim.'"  name="tanggal_umum" />'; 
                $isi .= ' </td>';

                $isi .= '<td class="text-center">';   
                    $isi .= '<input type="text" class="form-control " id="shm_'.$row->prim.'"  name="shm" />'; 
                $isi .= ' </td>';


                $isi .= '<td class="text-center">';   
                    $isi .= ' <button class="btn btn-lg btn-block btn-primary btn-nomer" value="'.$row->prim.'" >kuy</button>'; 
                $isi .= ' </td>';

                $isi .= '
                    </tr>
                ';
            }

            $words = $isi;
            return $words;
                
        ////////////////////////////////////////////////////////////////////////////
    }

    function migrasi_biaya(){

        // ------------------------------------------------------------------------- INITIALIZE
            $isi_model = data_02::selectRaw('02_data.kode_unik')
                        ->selectRaw('02_data.prim')
                        ->selectRaw('02_data.berkas_id')
                        ->selectRaw('02_data.helper3 as nama_pemohon')
                        ->selectRaw('02_data.helper4 as tanggal_lahir')
                        ->selectRaw('02_data.helper5 as ket')
                        ->selectRaw('c.nama as nama_proses')
                        ->selectRaw('b.helper2 as pembayaran')
                        ->selectRaw('d.helper4 as deskel')
                        ->selectRaw('e.helper1 as lp')
                        ->selectRaw('f.helper1 as lu')

                            ->join('02_data as b','b.kode_unik','02_data.kode_unik')
                            ->join('02_proses as c','c.id','b.helper1')
                            ->join('02_data as d','d.kode_unik','b.kode_unik')
                            ->join('02_data as e','e.kode_unik','02_data.kode_unik')
                            ->join('02_data as f','f.kode_unik','02_data.kode_unik')

                                ->where('b.sumber_data_pengisian_id','=',23)
                                ->where('d.sumber_data_pengisian_id','=',3)
                                ->where('e.sumber_data_pengisian_id','=',7)
                                ->where('f.sumber_data_pengisian_id','=',10)
                                ->where('02_data.sumber_data_pengisian_id','=',1)                           
                                ->where('02_data.dmha_id','like','0201')
                                ->where('b.dmha_id','like','0201')
                                ->where('d.dmha_id','like','0201')
                                ->where('e.dmha_id','like','0201')
                                ->where('f.dmha_id','like','0201')

                                ->where('d.helper4','like','Jatikalang')

                                ->whereNull('b.apdet')

                                    ->orderBy('c.urutan','desc')
                                    ->orderBy('deskel','asc')
                                    ->orderBy('02_data.helper3','asc')

                            ->get();

            $isi = '';
            $counter = 0;

            foreach ($isi_model as $row) {
                $counter++;
                $isi .= '  
                    <tr  id="tr_'.$row->prim.'" 
                        class="';
                        if($counter == 1){
                            $proses = $row->nama_proses;
                        }else{                          
                            if($proses != $row->nama_proses){
                                $isi .= ' border-top-2px ';
                            }
                            $proses = $row->nama_proses;
                        }
                        $isi .= '"
                        >
                        <td class="text-right">
                            '.$counter.'
                        </td>
                        <td class="text-right">
                            '.$row->berkas_id.'
                        </td>
                        <td class="'; 
                        $isi .= check_bukti_perolehan($row->tanggal_lahir);
                        $isi .='">';
                        $isi .= $row->nama_pemohon;   

                        $ket = $row->ket;

                        if($ket != '')
                        {
                            $isi .= ' (';
                            $isi .= $ket; 
                            $isi .= ')'; 
                        }

                $isi .= '
                    </td>';
                    $temp = $row->pembayaran; 

                    if($temp == 'Kredit')
                        {$isi .= '<td class="text-danger text-center">'.$temp;}
                    else
                        {$isi .= '<td class=" text-center">'.$temp;}
                            
                $isi .= '
                    </td>
                    <td class=" text-center">';
                    $isi .= $row->deskel; 

                $isi .= '
                    </td>
                    <td class="text-right">';
                    if($row->lu == ''){
                        $isi .= '&plusmn;'.$row->lp;
                    }else{
                        $isi .= $row->lu;
                    }

                    $isi .= 'm&sup2; ';

                $isi .= '</td>';

                $isi .= '<td class="text-center">';            
                    $isi .= $row->nama_proses; 
                $isi .= ' </td>';

                $isi .= '<td class="text-center">';      
                    $isi .= '<input type="text" class="form-control" value="'.$row->prim.'"   name="prim"/>'; 
                $isi .= ' </td>';

                $isi .= '<td class="text-center">';           
                    $isi .= '<input type="text" class="form-control" id="biaya_'.$row->prim.'"  name="biaya" />'; 
                $isi .= ' </td>';


                $isi .= '<td class="text-center">';           
                    $isi .= '<input type="text" class="form-control" id="uang_muka_'.$row->prim.'"  name="uang_muka" />'; 
                $isi .= ' </td>';


                $isi .= '<td class="text-center">';   
                    $isi .= '<input type="text" class="form-control datepicker-autoClose" id="tanggal_um_'.$row->prim.'"  name="tanggal_um" />'; 
                $isi .= ' </td>';

                $isi .= '<td class="text-center">';   
                    $isi .= '<input type="text" class="form-control " id="sisa_'.$row->prim.'"  name="sisa" />'; 
                $isi .= ' </td>';


                $isi .= '<td class="text-center">';   
                    $isi .= ' <button class="btn btn-lg btn-block btn-primary btn-nomer" value="'.$row->prim.'" >kuy</button>'; 
                $isi .= ' </td>';

                $isi .= '
                    </tr>
                ';
            }

            $words = $isi;
            return $words;
                
        ////////////////////////////////////////////////////////////////////////////
    }

    function insert_riwayat_pembayaran(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi_model = data_02::where('sumber_data_pengisian_id','=','23')
                        ->where('dmha_id','like','0201')
                        ->whereIn('helper1',[8])
                        ->get();

            foreach ($isi_model as $row) {  
                // 8
                //riwayat_pembayaran_02::insert_02_riwayat_pembayaran_from_migrate($row->kode_unik,$row->dmha_id,$row->berkas_id,6,75000,2);
                riwayat_pembayaran_02::insert_02_riwayat_pembayaran_from_migrate($row->kode_unik,$row->dmha_id,$row->berkas_id,7,30000,2);

                // 8
                //riwayat_pembayaran_02::insert_02_riwayat_pembayaran_from_migrate($row->kode_unik,$row->dmha_id,$row->berkas_id,5,0,2);

                // 7
                //riwayat_pembayaran_02::insert_02_riwayat_pembayaran_from_migrate($row->kode_unik,$row->dmha_id,$row->berkas_id,16,150000,2);

                // 6
                //riwayat_pembayaran_02::insert_02_riwayat_pembayaran_from_migrate($row->kode_unik,$row->dmha_id,$row->berkas_id,4,300000,2);

                // 5
                //riwayat_pembayaran_02::insert_02_riwayat_pembayaran_from_migrate($row->kode_unik,$row->dmha_id,$row->berkas_id,3,450000,2);
                //riwayat_pembayaran_02::insert_02_riwayat_pembayaran_from_migrate($row->kode_unik,$row->dmha_id,$row->berkas_id,2,100000,2);

                // 3
                //riwayat_pembayaran_02::insert_02_riwayat_pembayaran_from_migrate($row->kode_unik,$row->dmha_id,$row->berkas_id,15,380000,2);
                //riwayat_pembayaran_02::insert_02_riwayat_pembayaran_from_migrate($row->kode_unik,$row->dmha_id,$row->berkas_id,1,500000,2);
            }
                
        ////////////////////////////////////////////////////////////////////////////
    }

    function update_berkas_data_id($sdp_id){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $dmha_id = '0201';

            $isi_model = data_02::where('sumber_data_pengisian_id','=', $sdp_id)
                        ->where('berkas_id','>=','837')
                        ->where('berkas_id','<=','1790')
                        ->whereNull('apdet')
                        ->orderBy('berkas_id','desc')
                        ->get();


        // ------------------------------------------------------------------------- ACTION
            foreach ($isi_model as $row) {

                data_details_02::where('berkas_data_id','=',$row->berkas_data_id)
                    ->whereIn('sumber_data_pengisian_id',[1,3,7,10,23])
                    ->update([
                        'berkas_data_id'     => $row->berkas_id,
                        ]);    


                data_02::where('berkas_data_id','=',$row->berkas_data_id)
                    ->whereIn('sumber_data_pengisian_id',[1,3,7,10,23])
                    ->where('kode_unik','like',$row->kode_unik)
                    ->update([
                        'berkas_data_id'     => $row->berkas_id,
                        'apdet'     => now()
                        ]);      

            }
                
        ////////////////////////////////////////////////////////////////////////////
    }

    function button_biaya($PARENT_DMHA_ID,$KODE_UNIK,$PROSES_ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            $isi_model = biaya_02::join_proses_n_biaya_proses($PARENT_DMHA_ID,$PROSES_ID);

            if(count($isi_model) == 1)
            {
                foreach ($isi_model as $row) {   
                    $isi = '<button class="btn btn-sm btn-default clickmybutton" kode_unik="'.$KODE_UNIK.'" biaya_id="'.$row->id.'" proses_id="'.$PROSES_ID.'">'.$row->button.'</button>';
                }
            }else{

                $isi .= '
                <div class="btn-group">
                    <a href="#" class="btn btn-default btn-sm">Bayar</a>
                    <a href="#" class="btn btn-default btn-sm dropdown-toggle"
                        data-toggle="dropdown"></a>
                    <ul class="dropdown-menu pull-right">';
                    foreach ($isi_model as $row) {        

                        $isi_model_3 = riwayat_pembayaran_02::check_yang_sudah_dibayar($KODE_UNIK,$row->id);

                        $isi .= '<li><a href="javascript:;" ';

                        if($isi_model_3 == 0 ){
                            $isi .= ' class="clickmybutton" ';
                        }

                        $isi .= ' kode_unik="'.$KODE_UNIK.'" biaya_id="'.$row->id.'" proses_id="'.$PROSES_ID.'" >';

                        if($isi_model_3 != 0 ){
                            $isi .= '<strike>'.$row->nama.'--'.$row->id.'--'.$isi_model_3.'</strike>';
                        }else{                            
                            $isi .= $row->nama.'--'.$row->id.'--'.$isi_model_3;
                        }

                        $isi .= '</a></li>';
                    }
                    $isi .= '
                    </ul>
                </div>
                ';

            }

        // ------------------------------------------------------------------------- ACTION

        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function check_pengumuman($PROSES_ID,$TANGGAL_PENGUMUMAN){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = $TANGGAL_PENGUMUMAN;

            $date1=date_create($TANGGAL_PENGUMUMAN);
            $date2=date_create(now());
            $diff=date_diff($date1,$date2);
        // ------------------------------------------------------------------------- ACTION
            if($PROSES_ID == 7){
                if($diff->format("%R%a") >= 60){
                    $isi = $TANGGAL_PENGUMUMAN;
                }elseif($diff->format("%R%a") >= 45){                    
                    $isi = $TANGGAL_PENGUMUMAN.'<br/><span class="badge badge-warning">'.$diff->format("%R%a days").'</span>';
                }else{
                    $isi = $TANGGAL_PENGUMUMAN.'<br/><span class="badge badge-pink">'.$diff->format("%R%a days").'</span>';
                }
            }

        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function check_informasi_berkas(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
        // ------------------------------------------------------------------------- ACTION
            $isi .= '<i class="fas fa-caret-up text-green-lighter"></i>';
            $isi .= '<br/>';
            $isi .= '<i class="fas fa-minus"></i>';

        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function tabel_sdp_data($PARENT_ID,$PARAM_2,$SUMBER_DATA_PENGISIAN_ID,$HELPER1,$HELPER2){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            $isi_model = data_02::what_is_my_sdp_data($PARENT_ID,$PARAM_2,$SUMBER_DATA_PENGISIAN_ID,$HELPER1,$HELPER2);

        // ------------------------------------------------------------------------- ACTION
            
            if($SUMBER_DATA_PENGISIAN_ID == 1){
                foreach ($isi_model as $row) {
                    $isi .= '<tr>';
                        $isi .= '<td>';
                            $isi .= data_02::join_to_data_details($PARENT_ID,$row->kode_unik,$PARAM_2,$SUMBER_DATA_PENGISIAN_ID,$row->berkas_data_id,1,$HELPER1,$HELPER2,'isi');
                        $isi .= '</td>';
                        $isi .= '<td>';
                            $isi .= data_02::join_to_data_details($PARENT_ID,$row->kode_unik,$PARAM_2,$SUMBER_DATA_PENGISIAN_ID,$row->berkas_data_id,2,$HELPER1,$HELPER2,'isi');
                        $isi .= '</td>';
                        $isi .= '<td>';
                            $isi .= data_02::join_to_data_details($PARENT_ID,$row->kode_unik,$PARAM_2,$SUMBER_DATA_PENGISIAN_ID,$row->berkas_data_id,3,$HELPER1,$HELPER2,'isi');
                        $isi .= '</td>';
                        $isi .= '<td>';
                            $isi .= data_02::join_to_data_details($PARENT_ID,$row->kode_unik,$PARAM_2,$SUMBER_DATA_PENGISIAN_ID,$row->berkas_data_id,4,$HELPER1,$HELPER2,'isi');
                        $isi .= '</td>';
                        $isi .= '<td class="text-center">';
                            $isi .= '                            
                            <div class="btn-group">
                                <a href="javascript:;" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle"></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:;">Ubah</a></li>
                                    <li><a href="javascript:;">Hapus</a></li>
                                </ul>
                            </div>
                            ';
                        $isi .= '</td>';

                    $isi .= '</tr>';
                }
            }elseif($SUMBER_DATA_PENGISIAN_ID == 3){
                foreach ($isi_model as $row) {
                    $isi .= '<tr>';
                        $isi .= '<td>';
                            $isi .= data_02::join_to_data_details($PARENT_ID,$row->kode_unik,$PARAM_2,$SUMBER_DATA_PENGISIAN_ID,$row->berkas_data_id,18,$HELPER1,$HELPER2,'isi');
                        $isi .= '</td>';
                        $isi .= '<td>';
                            $isi .= data_02::join_to_data_details($PARENT_ID,$row->kode_unik,$PARAM_2,$SUMBER_DATA_PENGISIAN_ID,$row->berkas_data_id,19,$HELPER1,$HELPER2,'isi');
                            $isi .= data_02::join_to_data_details($PARENT_ID,$row->kode_unik,$PARAM_2,$SUMBER_DATA_PENGISIAN_ID,$row->berkas_data_id,20,$HELPER1,$HELPER2,'isi');
                            $isi .= data_02::join_to_data_details($PARENT_ID,$row->kode_unik,$PARAM_2,$SUMBER_DATA_PENGISIAN_ID,$row->berkas_data_id,21,$HELPER1,$HELPER2,'isi');
                        $isi .= '</td>';
                        $isi .= '<td>';
                            $isi .= data_02::join_to_data_details($PARENT_ID,$row->kode_unik,$PARAM_2,$SUMBER_DATA_PENGISIAN_ID,$row->berkas_data_id,24,$HELPER1,$HELPER2,'helper');
                        $isi .= '</td>';

                    $isi .= '</tr>';
                }
            }
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function sisa_biaya_bpn_yang_dibutuhkan($KODE_UNIK,$PARENT_ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $isi_model = biaya_02::hitung_total_biaya($PARENT_ID);
            $isi_model_2 = riwayat_pembayaran_02::total_biaya_yang_sudah_dikeluarkan($KODE_UNIK);
        // ------------------------------------------------------------------------- ACTION

            $isi = $isi_model - $isi_model_2;

        // ------------------------------------------------------------------------- SEND
            $words = 'Rp. '.number_format($isi, 0, ',', '.');
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function hitung_total_berkas($PARENT_ID){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            $isi_model = data_02::join_3_7_10_23_24_25_26_27_n_02_proses($PARENT_ID,'semua',NULL);
        // ------------------------------------------------------------------------- ACTION

            $isi = count($isi_model);

        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function update_all_helper($DMHA_ID){
        // ------------------------------------------------------------------------- INITIALIZE

            $isi_model = data_02::where('sumber_data_pengisian_id','=',1)
                        ->where('dmha_id','like',$DMHA_ID)
                        ->whereNull('apdet')
                        ->get();

            foreach ($isi_model as $row) {      
                data_02::insert_02_data_from_migrate($DMHA_ID,$row->kode_unik,$row->berkas_id,23,$row->berkas_data_id,'','','','');
                data_02::insert_02_data_from_migrate($DMHA_ID,$row->kode_unik,$row->berkas_id,24,$row->berkas_data_id,'','','','');
                data_02::insert_02_data_from_migrate($DMHA_ID,$row->kode_unik,$row->berkas_id,25,$row->berkas_data_id,'','','','');
                data_02::insert_02_data_from_migrate($DMHA_ID,$row->kode_unik,$row->berkas_id,26,$row->berkas_data_id,'','','','');
                data_02::insert_02_data_from_migrate($DMHA_ID,$row->kode_unik,$row->berkas_id,27,$row->berkas_data_id,'','','','');

                data_02::where('sumber_data_pengisian_id','=',1)
                    ->where('dmha_id','like',$DMHA_ID)
                    ->update([                     
                        'apdet'     => now()
                    ]);
            }
                
        ////////////////////////////////////////////////////////////////////////////
    }

    function update_sdp_3_kosong(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $sumber_data_pengisian_id = 3;

            $isi_model = data_02::where('sumber_data_pengisian_id','=',$sumber_data_pengisian_id)
                        ->where('helper3','=','')
                        ->where('helper4','=','')
                        ->get();
        // ------------------------------------------------------------------------- ACTION

            foreach ($isi_model as $row) {

                if($row->helper5 == 6){
                    data_02::update_helper_kosong($row->kode_unik,$sumber_data_pengisian_id,'3515170008','Terung Kulon');
                }elseif($row->helper5 == 73){
                    data_02::update_helper_kosong($row->kode_unik,$sumber_data_pengisian_id,'3515170009','Terung Wetan');
                }elseif($row->helper5 == 346){
                    data_02::update_helper_kosong($row->kode_unik,$sumber_data_pengisian_id,'3515100017','Masangan Kulon');
                }
            }
        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function update_0204(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $sumber_data_pengisian_id = 3;

            $isi_model = data_02::where('sumber_data_pengisian_id','=',$sumber_data_pengisian_id)
                        ->where('helper4','like','Sidorejo')
                        ->get();
        // ------------------------------------------------------------------------- ACTION

            foreach ($isi_model as $row) {                
                data_02::where('kode_unik','like',$row->kode_unik)
                    ->update([             
                        'dmha_id'   => '0204',        
                        'apdet'     => now()
                    ]);
            }

        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }

    function update_map_permohonan(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';

            $isi_model = daftar_multi_hak_akses_05::all();
        // ------------------------------------------------------------------------- ACTION

            foreach ($isi_model as $row) {                
                daftar_multi_hak_akses::full_insert(1,$row->dmha_id,$row->parent_id,1,$row->urutan,$row->nama,$row->link,$row->deskripsi,NULL,40,5,1,$row->tipe_data,$row->form,$row->kategori);
            }

        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;
        ////////////////////////////////////////////////////////////////////////////
    }




