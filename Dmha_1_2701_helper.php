<?php

    use App\daftar_multi_hak_akses;
    use App\app_list;

    use App\data_2701;
    use App\data_2702;
    use App\data_2703;

    use App\karirdotcom;
    use App\hasisscraping;

    // Lowongan Jurusanku
    // data_1_2701();
    function data_1_2701_order_by_nama_asc(){
        // ------------------------------------------------------------------------- INITIALIZE
            $isi = '';
            $isi_model = data_2701::read_data_order_by_nama_asc();
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
            if(count($isi_model) > 0){
                foreach ($isi_model as $row) {
                    $counter++;
                    $isi .= '<tr>';
                        $isi .= '<td class="text-right">';
                        $isi .= $counter;
                        $isi .= '</td>';
                        $isi .= '<td>';
                        $isi .=  $row->nama;
                        $isi .= '</td>';
                        $isi .= '<td class="text-center">';
                        $isi .= generate_dropdown_button('2701',$row->id);
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

    function migrate_2701_karirdotcom()
    {
        // ------------------------------------------------------------------------- INITIALIZE
            $isi_model = karirdotcom::all();

        // ------------------------------------------------------------------------- ACTION
            foreach ($isi_model as $row) 
            {
                $pekerjaan = trim($row->job);
                $edit_pekerjaan = ucwords(strtolower(trim($row->job)));
                // store pekerjaan
                    $pekerjaan_id = data_2702::conditional_insert($edit_pekerjaan);

                $explode_jurusan = explode(', ', $row->jurusan);
                $explode_lulusan = explode(', ', $row->lulusan);

                $x = 1; 
                $y = 1; 

                while($x <= count($explode_jurusan)) {
                    while($y <= count($explode_lulusan)) {
                        $jurusan = data_2703::conditional_insert($explode_jurusan[$x-1],$explode_lulusan[$y-1]);

                        data_2701::full_insert($row->url,$pekerjaan_id,$jurusan);
                        $y++;
                    }
                    $x++;
                } 

                //data_2701::full_insert($NAMA);
            }
            
        ////////////////////////////////////////////////////////////////////////////
    }

    function migrate_2701_hasisscraping()
    {
        // ------------------------------------------------------------------------- INITIALIZE
            $isi_model = hasisscraping::all();

        // ------------------------------------------------------------------------- ACTION
            foreach ($isi_model as $row) 
            {
                $edit_pekerjaan = ucwords(strtolower(trim($row->pekerjaan)));

                    $pekerjaan_id = data_2702::conditional_insert($edit_pekerjaan);

                $x = 1; 
                while($x <= $row->sma_smk) {
                    data_2701::full_insert(NULL,$pekerjaan_id,1);
                    $x++;
                } 
                $x = 1; 
                while($x <= $row->diploma) {
                    data_2701::full_insert(NULL,$pekerjaan_id,2);
                    $x++;
                } 
                $x = 1; 
                while($x <= $row->sarjana) {
                    data_2701::full_insert(NULL,$pekerjaan_id,3);
                    $x++;
                } 
                $x = 1; 
                while($x <= $row->master) {
                    data_2701::full_insert(NULL,$pekerjaan_id,29);
                    $x++;
                } 
                $x = 1; 
                while($x <= $row->doctor) {
                    data_2701::full_insert(NULL,$pekerjaan_id,75);
                    $x++;
                } 
            }
            
        ////////////////////////////////////////////////////////////////////////////
    }

    function topfive($DMHA_ID,$STATUS)
    {
        // ------------------------------------------------------------------------- INITIALIZE
            $pembagi = data_2701::count_all();

            if($DMHA_ID == '2703'){
                $isi_model = data_2701::topfive_2703();

            }elseif($DMHA_ID == '2702'){
                $isi_model = data_2701::topfive_2702();
            }

            $isi = '';
            $counter = 1;
            $count_data = count($isi_model);
            $color1 = array("05668D", "028090", "00A896", "02C39A", "F0F3BD"); 
        // ------------------------------------------------------------------------- ACTION
            foreach ($isi_model as $row) 
            {
                if($STATUS == 'nama')
                {
                    
                    if($DMHA_ID == '2702')
                    {
                        $isi .= '"'.$row->nama.'" ';
                    }else{
                        $isi .= '"'.$row->nama.' '.$row->strata.'" ';
                    }
                }
                elseif($STATUS == 'hitung')
                {
                    $isi .= $row->hitung;
                }
                elseif($STATUS == 'complete')
                {
                    $isi .= '
                    {
                        label: "'.$row->nama.'",
                        data: ['.$row->hitung.'],
                        backgroundColor: "#'.$color1[$counter-1].'",
                    }
                    ';
                }

                if($counter != $count_data)
                {
                    $isi .= ', ';
                }
                $counter++;
            }

        // ------------------------------------------------------------------------- SEND
            $words = $isi;
            return $words;

        ////////////////////////////////////////////////////////////////////////////
    }
