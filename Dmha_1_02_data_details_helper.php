<?php

	use App\data_02;
	use App\data_details_02;
	use App\pertanyaans;


	function isi_data_details(
		$DMHA_ID,
		$kode_unik,
		$berkas_id,
		$sumber_data_pengisian_id,
		$berkas_data_id,
		$pertanyaan_id,
		$helper1,
		$helper2,
		$highlight,
		$keterangan,
		$jika_isian_kosong)
	{
		// Untuk Sementara ini, function ini hanya untuk dmha 02
		// --------------------------------------------------------------------------- initialize
			//$isi 	= 	' 1.DMHA_ID:'.$DMHA_ID.' 2.kode_unik:'.$kode_unik.' 3.berkas_id:'.$berkas_id.' 4.sumber_data_pengisian_id:'.$sumber_data_pengisian_id.' 5.berkas_data_id:'.$berkas_data_id.' 6.pertanyaan_id:'.$pertanyaan_id.' 7.helper1:'.$helper1.' 8.helper2:'.$helper2.' 9.highlight:'.$highlight.' 10.keterangan:'.$keterangan.' 11.jika_isian_kosong:'.$jika_isian_kosong;
			$isi 	= '';
			//$isi = $berkas_data_id;
			//$isi 	= $helper1;
		// --------------------------------------------------------------------- generating words
			///*
			//dd($DMHA_ID); 0201
			$pengecekan_kuasa = 0;
			$pengecekan_lurah = 0;
			$pengecekan_saksi = 0;
			$pengecekan_tanggal_surat = 0;
			$status_overriding_data = FALSE;
			
			// OVERRIDE
				if($helper1 == 2)
				{
					$pengecekan_kuasa = read_row_all_database('pengaturan_02',$DMHA_ID,'optimisasi_data_kuasa');
				}
				elseif($helper1 == 3)
				{
					$pengecekan_lurah = read_row_all_database('pengaturan_02',$DMHA_ID,'optimisasi_data_lurah');
				}
				elseif($helper1 == 4)
				{
					$pengecekan_saksi = read_row_all_database('pengaturan_02',$DMHA_ID,'optimisasi_data_saksi');
				}
				elseif($helper1 == 'tanggal')
				{
					$pengecekan_tanggal_surat = read_row_all_database('pengaturan_02',$DMHA_ID,'optimisasi_tanggal_surat');

					// check sumber data pengisian DOUBLE
						if(is_null($sumber_data_pengisian_id))
						{
							$temp_data 	= pertanyaans::find($pertanyaan_id);
								$sumber_data_pengisian_id 	= $temp_data->sumber_data_pengisian_id;

							$temp_data = sumber_data_pengisians::find($sumber_data_pengisian_id);
								if($temp_data->multi_data == 0 || $temp_data->multi_data == 5 || $temp_data->multi_data == 3)
								{
									$sumber_data_pengisian_id 			= 0;
								}
						}

					// check kode unik DOUBLE
						if(is_null($kode_unik))
						{
							$temp_data = data_02::where('dmha_id','like',$DMHA_ID)
												->where('berkas_id','=',$berkas_id)
												->first();
								$kode_unik 			= $temp_data->kode_unik;							
						}
				}
				else
				{
					// Pengecekan $DMHA_ID
						$pengecekan_dmha_id = data_02::where('dmha_id','like',$DMHA_ID)->get();

					if($berkas_id == 'NUL')
					{
						$berkas_id = NULL;
					}

					if(count($pengecekan_dmha_id) > 0)
					{
						// helper
							if($helper1 == 'NUL')
							{	
								$helper1 = '';
							}

							if($helper2 == 'NUL')
							{
								$helper2 = '';
							}

						// check sumber data pengisian
							if(is_null($sumber_data_pengisian_id))
							{
								$temp_data 	= pertanyaans::find($pertanyaan_id);
									$sumber_data_pengisian_id 	= $temp_data->sumber_data_pengisian_id;

								$temp_data = sumber_data_pengisians::find($sumber_data_pengisian_id);
									if($temp_data->multi_data == 0 || $temp_data->multi_data == 5 || $temp_data->multi_data == 3)
									{
										$sumber_data_pengisian_id 			= 0;
									}
							}

						// check berkas_id
							if(is_null($berkas_id))
							{
								$temp_data = data_02::where('dmha_id','like',$DMHA_ID)
													->where('kode_unik','like',$kode_unik)
													->first();
									$berkas_id 			= $temp_data->berkas_id;							
							}

						// check kode unik
							if(is_null($kode_unik))
							{
								$temp_data = data_02::where('dmha_id','like',$DMHA_ID)
													->where('berkas_id','=',$berkas_id)
													->first();
									$kode_unik 			= $temp_data->kode_unik;							
							}
					}
				}
			//generating query
				if($pengecekan_kuasa == 1)
				{
					$kode_wilayah = isi_data_details($DMHA_ID,NULL,$berkas_id,NULL,NULL,24,'','',FALSE,'isi',NULL);

					$data = data_02::join('02_data_details','02_data_details.berkas_data_id','02_data.berkas_data_id')
						->where('02_data.dmha_id','like','13')
						->where('02_data.kode_unik','like',$kode_wilayah)
						->where('02_data.helper1','=',2)
						->where('02_data.sumber_data_pengisian_id','=',1)		
						->whereIn('02_data_details.pertanyaan_id', [$pertanyaan_id])
						->orderBy('02_data.created_at','ASC')
						->get();
				}
				elseif($pengecekan_lurah == 1)
				{
					$kode_wilayah = isi_data_details($DMHA_ID,NULL,$berkas_id,NULL,NULL,24,'','',FALSE,'isi',NULL);

					$data = data_02::join('02_data_details','02_data_details.berkas_data_id','02_data.berkas_data_id')
						->where('02_data.dmha_id','like','0303')
						->where('02_data.kode_unik','like',$kode_wilayah)
						->where('02_data.helper1','=',3)
						->where('02_data.sumber_data_pengisian_id','=',1)		
						->whereIn('02_data_details.pertanyaan_id', [$pertanyaan_id])
						->orderBy('02_data.created_at','ASC')
						->get();
				}
				elseif($pengecekan_saksi == 1)
				{
					$kode_wilayah = isi_data_details($DMHA_ID,NULL,$berkas_id,NULL,NULL,24,'','',FALSE,'isi',NULL);

					$data = data_02::join('02_data_details','02_data_details.berkas_data_id','02_data.berkas_data_id')
						->where('02_data.dmha_id','like','0303')
						->where('02_data.kode_unik','like',$kode_wilayah)
						->where('02_data.helper1','=',4)
						->where('02_data.sumber_data_pengisian_id','=',1)		
						->whereIn('02_data_details.pertanyaan_id', [$pertanyaan_id])
						->orderBy('02_data.created_at','ASC')
						->get();
				}
				elseif($pengecekan_tanggal_surat == 1)
				{
					//dd($berkas_id);
					$status_overriding_data 	= TRUE;
					$tambahan_tanggal 			= read_row_all_database('daftar_multi_hak_akses',$helper2,'helper1');
						if(is_null($tambahan_tanggal))
						{	
							$tambahan_tanggal = 0;
						}

					$temp_data = data_02::where('dmha_id','like',$DMHA_ID)
									->where('berkas_id','=',$berkas_id)
									->orderBy('02_data.created_at','ASC')
									->value('created_at');


					if(date("N", strtotime($temp_data)) == 6)
					{
						$tambahan_tanggal += 2;
					}
					elseif(date("N", strtotime($temp_data)) == 7)
					{
						$tambahan_tanggal += 1;
					}

					$temp_date = strtotime(date("Y-m-d", strtotime($temp_data)) . " +".$tambahan_tanggal."days");
					$temp_date2 = date("Y-m-d", $temp_date);

					$explode_temp_date = explode('-', $temp_date2);

					$data  = angka_dua_digit_to_angka($explode_temp_date[2]).' '.angka_to_bulan($explode_temp_date[1]).' '.$explode_temp_date[0];

				}
				elseif(!is_null($berkas_data_id) && $helper1 == 'tanggal')
				{
					$data = data_02::join('02_data_details','02_data_details.berkas_data_id','02_data.berkas_data_id')
						->where('02_data.dmha_id','=',$DMHA_ID)
						->where('02_data.kode_unik','like',$kode_unik)
						->where('02_data.berkas_id','=',$berkas_id)
						->where('02_data.sumber_data_pengisian_id','=',$sumber_data_pengisian_id)					
						->where('02_data.berkas_data_id','=',$berkas_data_id)			
						->whereIn('02_data_details.pertanyaan_id', [$pertanyaan_id])
						->where('02_data_details.helper','=',$helper2)	
						->orderBy('02_data.created_at','ASC')
						->get();	

						dd('imhere');						
				}
				elseif(!is_null($berkas_data_id))
				{
					if($sumber_data_pengisian_id == 1 && is_null($helper1) && is_null($helper2))
					{
						$data = data_02::join('02_data_details','02_data_details.berkas_data_id','02_data.berkas_data_id')
							->where('02_data.dmha_id','=',$DMHA_ID)
							->where('02_data.kode_unik','like',$kode_unik)
							->where('02_data.berkas_id','=',$berkas_id)
							->where('02_data.sumber_data_pengisian_id','=',$sumber_data_pengisian_id)					
							->where('02_data.berkas_data_id','=',$berkas_data_id)
							->whereIn('02_data_details.pertanyaan_id', [$pertanyaan_id])
							->orderBy('02_data.created_at','ASC')
							->get();
					}
					else
					{
						$data = data_02::join('02_data_details','02_data_details.berkas_data_id','02_data.berkas_data_id')
							->where('02_data.dmha_id','=',$DMHA_ID)
							->where('02_data.kode_unik','like',$kode_unik)
							->where('02_data.berkas_id','=',$berkas_id)
							->where('02_data.sumber_data_pengisian_id','=',$sumber_data_pengisian_id)					
							->where('02_data.berkas_data_id','=',$berkas_data_id)
							->whereIn('02_data_details.pertanyaan_id', [$pertanyaan_id])	
							->orderBy('02_data.created_at','ASC')
							->get();

							//dd('imhere');
							//dd($data);
					}
				}
				elseif(is_null($berkas_data_id) && $helper1 == 'tanggal') // tanggal
				{
					$data = data_02::join('02_data_details','02_data_details.berkas_data_id','02_data.berkas_data_id')
						->where('02_data.dmha_id','=',$DMHA_ID)
						->where('02_data.kode_unik','like',$kode_unik)
						->where('02_data.berkas_id','=',$berkas_id)
						->where('02_data.sumber_data_pengisian_id','=',$sumber_data_pengisian_id)
						->whereIn('02_data_details.pertanyaan_id', [$pertanyaan_id])
						->where('02_data_details.helper','like',$helper2)	
						->orderBy('02_data.created_at','ASC')
						->get();

						//dd('imhere');
						//dd($sumber_data_pengisian_id);
						//dd($berkas_data_id);
						//dd($pengecekan_dmha_id);
						//dd($sumber_data_pengisian_id);
						//dd($pengecekan_tanggal_surat);
				}
				elseif(is_null($berkas_data_id))
				{
					$data = data_02::join('02_data_details','02_data_details.berkas_data_id','02_data.berkas_data_id')
						->where('02_data.dmha_id','=',$DMHA_ID)
						->where('02_data.kode_unik','like',$kode_unik)
						->where('02_data.berkas_id','=',$berkas_id)
						->where('02_data.sumber_data_pengisian_id','=',$sumber_data_pengisian_id)
						->whereIn('02_data_details.pertanyaan_id', [$pertanyaan_id])
						->where('02_data.helper1','=',$helper1)	
						->where('02_data.helper2','=',$helper2)
						->orderBy('02_data.created_at','ASC')
						->get();
				}			

			$pertanyaans = pertanyaans::find($pertanyaan_id);
			$status_pemenggalan = FALSE;
				
			if($status_overriding_data == TRUE)
			{
				$isi = $data;
			}
			elseif($status_overriding_data == FALSE)
			{
				if(!is_null($data))
				{
					foreach ($data as $row) 
					{

						if($status_pemenggalan == TRUE)
						{
							$isi .= $pertanyaans->kata_hubung;
						}
						elseif($status_pemenggalan == FALSE)
						{
							$status_pemenggalan = TRUE;
						}
						
						if($keterangan == 'isi')
						{
							$isi .= $row->isi;
						}
						elseif($keterangan == 'helper')
						{
							$isi .= $row->helper;
						}
						elseif($keterangan == 'umur')
						{
							$isi .= whats_my_age($row->isi);
						}
						elseif($keterangan == 'tahun_umur')
						{
							$isi .= whats_my_age($row->isi).' tahun ';
						}
						elseif($keterangan == 'tanggal_surat')
						{	
							if($row->isi != '')
							{
								$temp_isi = explode(' ', $row->isi);

								$isi .= $temp_isi[1].' '.$temp_isi[2].' '.$temp_isi[3];
							}
						}
						elseif($keterangan == 'batas_pengecualian')
						{
							$temp_isi = batas_pengecualian::where('nama','like',$row->isi)->first();

							if(count($temp_isi) != 0)
							{
								$isi .= $row->isi;
							}
						}
						elseif($keterangan == 'alamat_lengkap_sdp_1')
						{
							$isi .= isi_data_details($DMHA_ID,$kode_unik,$berkas_id,$sumber_data_pengisian_id,$row->berkas_data_id,5,$helper1,$helper2,$highlight,'isi',$jika_isian_kosong);
							$isi .= ', ';	
							$isi .= isi_data_details($DMHA_ID,$kode_unik,$berkas_id,$sumber_data_pengisian_id,$row->berkas_data_id,6,$helper1,$helper2,$highlight,'isi',$jika_isian_kosong);
							$isi .= ' / ';
							$isi .= isi_data_details($DMHA_ID,$kode_unik,$berkas_id,$sumber_data_pengisian_id,$row->berkas_data_id,7,$helper1,$helper2,$highlight,'isi',$jika_isian_kosong);
							$isi .= ', ';	
							$isi .= isi_data_details($DMHA_ID,$kode_unik,$berkas_id,$sumber_data_pengisian_id,$row->berkas_data_id,10,$helper1,$helper2,$highlight,'helper',$jika_isian_kosong);
							$isi .= ', ';
							$isi .= isi_data_details($DMHA_ID,$kode_unik,$berkas_id,$sumber_data_pengisian_id,$row->berkas_data_id,9,$helper1,$helper2,$highlight,'helper',$jika_isian_kosong);
							$isi .= ', ';
							$isi .= isi_data_details($DMHA_ID,$kode_unik,$berkas_id,$sumber_data_pengisian_id,$row->berkas_data_id,8,$helper1,$helper2,$highlight,'helper',$jika_isian_kosong);
						}
						elseif($keterangan == 'tempat_tanggal_lahir')
						{
							$isi .= isi_data_details($DMHA_ID,$kode_unik,$berkas_id,$sumber_data_pengisian_id,$row->berkas_data_id,3,$helper1,$helper2,$highlight,'isi',$jika_isian_kosong);
							$isi .= ', ';	
							$isi .= isi_data_details($DMHA_ID,$kode_unik,$berkas_id,$sumber_data_pengisian_id,$row->berkas_data_id,4,$helper1,$helper2,$highlight,'isi',$jika_isian_kosong);
						}
						elseif($keterangan == 'status_wilayah')
						{
							$isi .= whats_my_keterangan_wilayah($row->isi);
						}
						elseif($keterangan == 'terbilang')
						{
							$isi .= to_word($row->isi);
						}
						elseif($keterangan == 'sket_utara')
						{
							$temp_isi = batas_pengecualian::where('nama','like',$row->isi)->whereNull('deleted_at')->first();

							if(count($temp_isi) != 0 && $pertanyaan_id = 30)
							{
								$isi .= 'border-top border-bottom '; // tested
							}
						}
						elseif($keterangan == 'sket_timur')
						{
							$temp_isi = batas_pengecualian::where('nama','like',$row->isi)->whereNull('deleted_at')->first();

							if(count($temp_isi) != 0 && $pertanyaan_id = 31)
							{
								$isi .= 'border-left border-right '; // tested
							}
						}
						elseif($keterangan == 'sket_selatan')
						{
							$temp_isi = batas_pengecualian::where('nama','like',$row->isi)->whereNull('deleted_at')->first();

							if(count($temp_isi) != 0 && $pertanyaan_id == 32)
							{
								$isi .= 'border-bottom border-top '; // tested
							}
						}
						elseif($keterangan == 'sket_barat')
						{
							$temp_isi = batas_pengecualian::where('nama','like',$row->isi)->whereNull('deleted_at')->first();

							if(count($temp_isi) != 0 && $pertanyaan_id == 33)
							{
								$isi .= 'border-left border-right '; // tested
							}
						}
						elseif($keterangan == 'persimpangan_33_30')
						{
							$temp_persimpangan1 = $row->isi;
							$temp_persimpangan2 = isi_data_details($DMHA_ID,$kode_unik,$berkas_id,$sumber_data_pengisian_id,$row->berkas_data_id,30,$helper1,$helper2,$highlight,'isi',$jika_isian_kosong);

							$temp_isi1 = batas_pengecualian::where('nama','like',$temp_persimpangan1)->whereNull('deleted_at')->first();

							$temp_isi2 = batas_pengecualian::where('nama','like',$temp_persimpangan2)->whereNull('deleted_at')->first();

							if(is_null($temp_isi1))
							{
								$status_level_batas1 = 0;
							}
							else
							{
								$status_level_batas1 = $temp_isi1->status_level_batas;
							}

							if(is_null($temp_isi2))
							{
								$status_level_batas2 = 0;
							}
							else
							{
								$status_level_batas2 = $temp_isi2->status_level_batas;
							}


							if($status_level_batas1 == 1 			&& $status_level_batas2 == 2)
							{
			                    $isi .= ' border-bottom border-top border-left-dashed border-right-dashed ';
			                }
			                elseif($status_level_batas1	== 2 		&& $status_level_batas2 == 1)
			                {  
			                    $isi .= ' border-left border-right border-bottom-dashed border-top-dashed '; 
			                }
			                elseif($status_level_batas1 == 1 		&& $status_level_batas2 == 0)
			                {
			                    $isi .= ' border-left border-right ';
			                }
			                elseif($status_level_batas1 == 0 		&& $status_level_batas2 == 1)
			                {
			                    $isi .= ' border-bottom border-top '; // tested
			                }
			                elseif($status_level_batas1	== 2 		&& $status_level_batas2 == 0)
			                {
			                    $isi .= ' border-left border-right ';  // tested
			                }
			                elseif($status_level_batas1 == 0 		&& $status_level_batas2 == 2)
			                {
			                    $isi .= ' border-bottom border-top ';
			                }
						}
						elseif($keterangan == 'persimpangan_30_31')
						{
							$temp_persimpangan1 = $row->isi;
							$temp_persimpangan2 = isi_data_details($DMHA_ID,$kode_unik,$berkas_id,$sumber_data_pengisian_id,$row->berkas_data_id,31,$helper1,$helper2,$highlight,'isi',$jika_isian_kosong);

							$temp_isi1 = batas_pengecualian::where('nama','like',$temp_persimpangan1)->whereNull('deleted_at')->first();

							$temp_isi2 = batas_pengecualian::where('nama','like',$temp_persimpangan2)->whereNull('deleted_at')->first();

							if(is_null($temp_isi1))
							{
								$status_level_batas1 = 0;
							}
							else
							{
								$status_level_batas1 = $temp_isi1->status_level_batas;
							}

							if(is_null($temp_isi2))
							{
								$status_level_batas2 = 0;
							}
							else
							{
								$status_level_batas2 = $temp_isi2->status_level_batas;
							}


							if($status_level_batas1 == 1 			&& $status_level_batas2 == 2)
							{
			                    $isi .= ' border-left border-right border-bottom-dashed border-top-dashed '; 
			                }
			                elseif($status_level_batas1	== 2 		&& $status_level_batas2 == 1)
			                {  
			                    $isi .= ' border-bottom border-top border-left-dashed border-right-dashed ';
			                }
			                elseif($status_level_batas1 == 1 		&& $status_level_batas2 == 0)
			                {
			                    $isi .= ' border-bottom border-top ';
			                }
			                elseif($status_level_batas1 == 0 		&& $status_level_batas2 == 1)
			                {
			                    $isi .= ' border-left border-right ';  
			                }
			                elseif($status_level_batas1	== 2 		&& $status_level_batas2 == 0)
			                {
			                    $isi .= ' border-bottom border-top '; 
			                }
			                elseif($status_level_batas1 == 0 		&& $status_level_batas2 == 2)
			                {				                    
			                    $isi .= ' border-left border-right '; // tested
			                }
						}
						elseif($keterangan == 'persimpangan_31_32')
						{
							$temp_persimpangan1 = $row->isi;
							$temp_persimpangan2 = isi_data_details($DMHA_ID,$kode_unik,$berkas_id,$sumber_data_pengisian_id,$row->berkas_data_id,32,$helper1,$helper2,$highlight,'isi',$jika_isian_kosong);

							$temp_isi1 = batas_pengecualian::where('nama','like',$temp_persimpangan1)->whereNull('deleted_at')->first();

							$temp_isi2 = batas_pengecualian::where('nama','like',$temp_persimpangan2)->whereNull('deleted_at')->first();

							if(is_null($temp_isi1))
							{
								$status_level_batas1 = 0;
							}
							else
							{
								$status_level_batas1 = $temp_isi1->status_level_batas;
							}

							if(is_null($temp_isi2))
							{
								$status_level_batas2 = 0;
							}
							else
							{
								$status_level_batas2 = $temp_isi2->status_level_batas;
							}


							if($status_level_batas1 == 1 			&& $status_level_batas2 == 2)
							{
			                    $isi .= ' border-bottom border-top border-left-dashed border-right-dashed ';
			                }
			                elseif($status_level_batas1	== 2 		&& $status_level_batas2 == 1)
			                {  
			                    $isi .= ' border-left border-right border-bottom-dashed border-top-dashed '; 
			                }
			                elseif($status_level_batas1 == 1 		&& $status_level_batas2 == 0)
			                {
			                    $isi .= ' border-left border-right ';  
			                }
			                elseif($status_level_batas1 == 0 		&& $status_level_batas2 == 1)
			                {
			                    $isi .= ' border-bottom border-top ';
			                }
			                elseif($status_level_batas1	== 2 		&& $status_level_batas2 == 0)
			                {
			                    $isi .= ' border-left border-right ';  
			                }
			                elseif($status_level_batas1 == 0 		&& $status_level_batas2 == 2)
			                {
			                    $isi .= ' border-bottom border-top '; // tested
			                }
						}
						elseif($keterangan == 'persimpangan_32_33')
						{
							$temp_persimpangan1 = $row->isi;
							$temp_persimpangan2 = isi_data_details($DMHA_ID,$kode_unik,$berkas_id,$sumber_data_pengisian_id,$row->berkas_data_id,33,$helper1,$helper2,$highlight,'isi',$jika_isian_kosong);

							$temp_isi1 = batas_pengecualian::where('nama','like',$temp_persimpangan1)->whereNull('deleted_at')->first();

							$temp_isi2 = batas_pengecualian::where('nama','like',$temp_persimpangan2)->whereNull('deleted_at')->first();

							if(is_null($temp_isi1))
							{
								$status_level_batas1 = 0;
							}
							else
							{
								$status_level_batas1 = $temp_isi1->status_level_batas;
							}

							if(is_null($temp_isi2))
							{
								$status_level_batas2 = 0;
							}
							else
							{
								$status_level_batas2 = $temp_isi2->status_level_batas;
							}


							if($status_level_batas1 == 1 			&& $status_level_batas2 == 2)
							{
			                    $isi .= ' border-left border-right border-bottom-dashed border-top-dashed '; 
			                }
			                elseif($status_level_batas1	== 2 		&& $status_level_batas2 == 1)
			                {  
			                    $isi .= ' border-bottom border-top border-left-dashed border-right-dashed ';
			                }
			                elseif($status_level_batas1 == 1 		&& $status_level_batas2 == 0)
			                {
			                    $isi .= ' border-bottom border-top ';
			                }
			                elseif($status_level_batas1 == 0 		&& $status_level_batas2 == 1)
			                {
			                    $isi .= ' border-left border-right ';  
			                }
			                elseif($status_level_batas1	== 2 		&& $status_level_batas2 == 0)
			                {
			                    $isi .= ' border-bottom border-top ';
			                }
			                elseif($status_level_batas1 == 0 		&& $status_level_batas2 == 2)
			                {
			                    $isi .= ' border-left border-right ';  // tested
			                }
						}
					}				
				}
			}


			// kata akhir
				//$isi .= '.';

			//hightlight
				if($highlight == TRUE)
				{
					//$isi .= '<span class="'.show_me_dmha_pengaturan(substr($DMHA_ID, 0, 4),'highlight').'">'.$isi.'</span>';
					$isi = '<span class="bg-yellow">'.$isi.'</span>';
				}
				

			//*/

				
			//$words = $berkas_id;
			//$words = $kode_unik;
			$words = $isi;
			return $words;
		/////////////////////////////////////////////////////////////////////////////////////////
	}


	function isi_form_new($dmha_id,$PARAMETER_ID,$pertanyaan_id)
	{

		//dd($dmha_id.'-'.$PARAMETER_ID.'-'.$pertanyaan_id);

		$pertanyaans_model = pertanyaans::where('id','=',$pertanyaan_id)->first();
		//dd($pertanyaans_model);

		$isi = '';
		$select = $pertanyaans_model->name;
		//dd($pertanyaans_model);

		if(substr($dmha_id, 0, 2)  == '00')
		{
			if($dmha_id == '000106')
			{

			}
			elseif(substr($dmha_id, 0, 4) == '0019')
			{
				if($pertanyaan_id == 200)
				{

				}
				elseif($pertanyaan_id == 201)
				{
					$isi = app_list::where('app_mode','like', $PARAMETER_ID)
									->where('dmha_id','like', $PARAMETER_ID)
									->value($select);
				}
				
			}
			else
			{
				//$isi = daftar_multi_hak_akses::where('dmha_id','like', $PARAMETER_ID)->value($select);
			}
		}
		elseif($dmha_id  == '0305')
		{
			$isi = wilayah_kelurahans::where('id','like', $PARAMETER_ID)
			->value($select);
		}
		elseif(substr($dmha_id, 0, 2)  == '06')
		{
			$isi = data_06::where('prim','like', $PARAMETER_ID)
			->value($select);
		}
		elseif(substr($dmha_id, 0, 2)  == '05')
		{
			$isi = pertanyaans_n_dmhas::where('dmha_id','like', substr($dmha_id, 0, 8))
			->where('pertanyaan_id','=', $pertanyaan_id)
			->first();

			if(!empty($isi))
			{
				$isi = 'checked';
			}
		}
		elseif(substr($dmha_id, 0, 2)  == '07')
		{
			$isi = data_07::where('prim','like', $PARAMETER_ID)
			->value($select);
		}
		elseif(substr($dmha_id, 0, 2)  == '08')
		{
			$isi = data_08::where('prim','like', $PARAMETER_ID)
			->value($select);
		}
		elseif($dmha_id == '100504')
		{
			$isi = tarot_decks::where('id','like', $PARAMETER_ID)->value($select);

			//$isi = $select;

			//$isi = $pertanyaan_id;
		}
		elseif(substr($dmha_id, 0, 2)  == '17')
		{	
			if($pertanyaan_id == 211)
			{
				$data = data_relationship_17::select('17_data_support.isi')
					->join('17_data_support','17_data_relationship.data_support_id','17_data_support.id')
					->where('17_data_relationship.data_id','=', $PARAMETER_ID)
					->where('17_data_support.pertanyaan_id','=', '211')
					->get();

				$counter = 0;
				//dd($data);
				//dd(count($data));
				foreach ($data as $row) {
					$counter++;
					$isi .= $row->isi;

					if( count($data) > 1 && count($data) != $counter )
					{
						$isi .= ', ';
					}
				}
			}
			else
			{
				$isi = data_17::where('id','like', $PARAMETER_ID)
				->value($select);
			}
		}
		elseif(substr($dmha_id, 0, 2)  == '21')
		{
			$isi = data_21::where('id','like', $PARAMETER_ID)->value($select);

			//$isi = $select;

			//$isi = $pertanyaan_id;
		}

		$words =  $isi;
		return $words;
	}

	function isi_form_checkboxes_new($dmha_id,$PARAMETER_ID,$pertanyaan_id,$value)
	{	

		$isi = '';
		$isi = $dmha_id.'-'.$PARAMETER_ID.'-'.$pertanyaan_id.'-'.$value;

		// if(strval(substr($dmha_id, 0, 4)) == '0019')
		// {
		// 	$temp_isi = app_list::where('app_mode','like',$PARAMETER_ID)
		// 						->where('dmha_id','like',$value)
		// 						->first();


		// 	if(!empty($temp_isi))
		// 	{
		// 		$isi = 'checked';
		// 	}
		// }

		$words =  $isi;
		return $words;
	}

	function isi_form($dmha_id,$answer,$PARAMETER_ID)
	{
		dd($dmha_id.'-'.$answer.'-'.$PARAMETER_ID);

		$isi = '';

		if($dmha_id == '020107') // Map Permohonan PTSL
		{
			$isi = dmha_n_dmhas::where([['dmha_id','like',$dmha_id],['dmha_ids','like',$answer]])->first();

			if(!empty($isi))
			{
				$isi = 'checked';
			}
		}
		elseif(substr($dmha_id, 0, 2)  == '05')
		{
			if(!is_null($answer)){
				$isi = pertanyaans_n_dmhas::where([['dmha_id','like',$dmha_id],['pertanyaan_id','like',$answer]])->first();

				if(!empty($isi))
				{
					$isi = 'checked';
				}
			}
		}
		elseif(substr($dmha_id, 0, 2)  == '07')
		{
			if(!is_null($answer)){
				$isi = data_07::where([['dmha_id','like',$dmha_id],['pertanyaan_id','like',$answer]])->first();

				if(!empty($isi))
				{
					$isi = 'selected';
				}
			}
		}

		$words = $isi;
		return $words;
	}





	function isi_old($dmha_id,$PARAMETER_ID,$pertanyaan_id)
	{
		if($dmha_id == '000103')
		{
			$model = daftar_multi_hak_akses::where('dmha_id','like', $PARAMETER_ID)->first();
			$model_2 = pertanyaan::find($pertanyaan_id);
			$isi = $model_2->name;
			$isi_2 = $model->$isi;
		}

		$words = $isi_2;
		return $words;
	}
	
	function isi_CUSTOM_02_old($tipe_isi,
				$tipe_data,
				$parent_id,
				$kode_unik,
				$berkas_data_id,
				$sumber_data_pengisian_id,
				$sebagai,
				$ke,
				$pertanyaan_id,
				$pemenggalan_isi,
				$CUSTOM_REQ,
				$if_isi_is_empty){
	// ------------------------------------------------------------------------- INITIALIZE
		$words = '';
		$isi = '';
		$counter = 0;

		//highlight rules
			$ROW_P4 = pengaturan::find(4);
			if($tipe_data == 'print'){
				$highlight_start = '<span class="'.$ROW_P4->action_2.'">';
				$highlight_end = '</span>';
			}else{
				$highlight_start = '';
				$highlight_end = '';
			}
		//override highlight rules
			if($tipe_isi == 'tanpa_highlight'){
				$highlight_start = '';
				$highlight_end = '';
			}

		// We Generate model for you

			// from tipe_isi nama
			if($tipe_isi == 'nama'){

				// generating model
				$model = berkas::select('berkas_datas.isi')
	                  ->join('berkas_datas', 'berkas_datas.berkas_data_id', '=', 'berkas.berkas_data_id')
	                  ->where([
	                  ['berkas.dmha_id','like',$parent_id],
	                  ['berkas.kode_unik','like',$kode_unik],
	                  ['berkas.sumber_data_pengisian_id','like',$sumber_data_pengisian_id],
	                  ['berkas.sebagai','like',$sebagai],
	                  ['berkas.ke','like',$ke],
	                  ['berkas_datas.sumber_data_pengisian_id','like',$sumber_data_pengisian_id],
	                  ['berkas_datas.pertanyaan_id','like',$pertanyaan_id],
	                  ])
	                ->get();

	            //check if model is not empty
	            if(!empty($model)){

	            	//compile isi to words
	            	foreach ($model as $row) {
	            		$words .= $row->isi;
	            		$words .= $pemenggalan_isi;
	            	}

	            }else{ // only 2 values
	            	$words = $if_isi_is_empty;
	            }
	            
	            // final : yeah you got it
	            return $words;


	        // what about from tipe_isi gabungan  
			}elseif($tipe_isi == 'gabungan'){

				// generating model
				$model = berkas::where([
								['dmha_id','like',$parent_id],
								['kode_unik','like',$kode_unik],
								['sumber_data_pengisian_id','like',$sumber_data_pengisian_id]
								])
							->get();

				// we check from $CUSTOM_REQ			
	            if($CUSTOM_REQ == 'tempat_tanggal_lahir'){

	          		// looping data model berkas 
	            	foreach ($model as $row) {

	            		// counter start
	            		$counter++;

	            		// tempat lahir
		            	$isi .= isi('id',$tipe_data,$parent_id,$kode_unik,$row->berkas_data_id,$sumber_data_pengisian_id,$sebagai,$ke,3,$pemenggalan_isi,'isi');

		            	// pemenggalan override
		            	$isi .= ', ';

		            	// tanggal lahir
		            	$isi .= isi('id',$tipe_data,$parent_id,$kode_unik,$row->berkas_data_id,$sumber_data_pengisian_id,$sebagai,$ke,4,$pemenggalan_isi,'isi') ;

		            	// redaksional
		            	if(count($model) > 1 ){
		            		if($counter != count($model)){
			            		$isi .= $pemenggalan_isi;
			            	}
		            	}elseif(count($model) == 1){
		            		$isi .= '.';
		            	}

		            	// akhiran data
		            	if($counter == count($model)){
		            		$isi .= '.';
		            	}
		            	
		            }

		        // we check from $CUSTOM_REQ
	            }elseif($CUSTOM_REQ == 'alamat'){
	            	foreach ($model as $row) {

	            		// counter start
	            		$counter++;

	            		// alamat
		            	$isi .= isi('id',$tipe_data,$parent_id,$kode_unik,$row->berkas_data_id,$sumber_data_pengisian_id,$sebagai,$ke,5,$pemenggalan_isi,'isi') ;

		            	// pemenggalan override
		            	$isi .= ', ';

		            	// RT
		            	$isi .= isi('id',$tipe_data,$parent_id,$kode_unik,$row->berkas_data_id,$sumber_data_pengisian_id,$sebagai,$ke,6,$pemenggalan_isi,'isi') ;

		            	// pemenggalan override
		            	$isi .= ' / ';

		            	// RW
		            	$isi .= isi('id',$tipe_data,$parent_id,$kode_unik,$row->berkas_data_id,$sumber_data_pengisian_id,$sebagai,$ke,7,$pemenggalan_isi,'isi') ;

		            	// pemenggalan override
		            	$isi .= ', ';

		            	// Desa / Kelurahan
		            	$isi .= isi('id',$tipe_data,$parent_id,$kode_unik,$row->berkas_data_id,$sumber_data_pengisian_id,$sebagai,$ke,10,$pemenggalan_isi,'isi') ;

		            	// pemenggalan override
		            	$isi .= ', ';

		            	// Kecamatan
		            	$isi .= isi('id',$tipe_data,$parent_id,$kode_unik,$row->berkas_data_id,$sumber_data_pengisian_id,$sebagai,$ke,9,$pemenggalan_isi,'isi') ;

		            	// pemenggalan override
		            	$isi .= ', ';

		            	// Kota / Kabupaten
		            	$isi .= isi('id',$tipe_data,$parent_id,$kode_unik,$row->berkas_data_id,$sumber_data_pengisian_id,$sebagai,$ke,8,$pemenggalan_isi,'isi') ;

		            	// redaksional
		            	if(count($model_berkas) > 1 ){
		            		if($counter != count($model_berkas)){
			            		$isi .= $pemenggalan_isi;
			            	}
		            	}elseif(count($model_berkas) == 1){
		            		$isi .= '.';
		            	}

		            	// akhiran data
		            	if($counter == count($model_berkas)){
		            		$isi .= '.';
		            	}
		            	
		            }

		        // we check from $CUSTOM_REQ
	            }elseif($CUSTOM_REQ == 'alas_hak_tanpa_luas'){
	            	foreach ($model as $row) {
	            		
	            		$counter++;

		            	$alas_hak = isi('tanpa_highlight',$tipe_data,$parent_id,$kode_unik,$row->berkas_data_id,$sumber_data_pengisian_id,$sebagai,$ke,55,$pemenggalan_isi,'isi');

		            	if($alas_hak == 'Letter C'){

		            		$isi .= $alas_hak;

		            		$isi .= ' Nomor ';

		            		// nomor alas hak
		            		$isi .= isi('id',$tipe_data,$parent_id,$kode_unik,$row->berkas_data_id,$sumber_data_pengisian_id,$sebagai,$ke,56,$pemenggalan_isi,'isi');

		            		$isi .= ' Persil ';

		            		// persil alas hak
		            		$isi .= isi('id',$tipe_data,$parent_id,$kode_unik,$row->berkas_data_id,$sumber_data_pengisian_id,$sebagai,$ke,53,$pemenggalan_isi,'isi');

		            		$isi .= ' Klas ';

		            		// persil klas
		            		$isi .= isi('id',$tipe_data,$parent_id,$kode_unik,$row->berkas_data_id,$sumber_data_pengisian_id,$sebagai,$ke,52,$pemenggalan_isi,'isi');
		            	}
		            	
		            }
	            }elseif($CUSTOM_REQ == 'alas_hak_lengkap'){
	          		$counter = 0;
	            	foreach ($model as $row) {
	            		$counter++;

		            	$alas_hak = isi('tanpa_highlight',$tipe_data,$parent_id,$kode_unik,$row->berkas_data_id,$sumber_data_pengisian_id,$sebagai,$ke,55,$pemenggalan_isi,'isi');

		            	if($alas_hak == 'Letter C'){
		            		$isi .= isi('id',$tipe_data,$parent_id,$kode_unik,$row->berkas_data_id,$sumber_data_pengisian_id,$sebagai,$ke,55,$pemenggalan_isi,'isi');

		            		$isi .= ' Nomor ';
		            		$isi .= isi('id',$tipe_data,$parent_id,$kode_unik,$row->berkas_data_id,$sumber_data_pengisian_id,$sebagai,$ke,56,$pemenggalan_isi,'isi');

		            		$isi .= ' Persil ';
		            		$isi .= isi('id',$tipe_data,$parent_id,$kode_unik,$row->berkas_data_id,$sumber_data_pengisian_id,$sebagai,$ke,53,$pemenggalan_isi,'isi');

		            		$isi .= ' Klas ';
		            		$isi .= isi('id',$tipe_data,$parent_id,$kode_unik,$row->berkas_data_id,$sumber_data_pengisian_id,$sebagai,$ke,52,$pemenggalan_isi,'isi');

		            		$isi .= ' Seluas &plusmn; ';
		            		$isi .= isi('id',$tipe_data,$parent_id,$kode_unik,$row->berkas_data_id,$sumber_data_pengisian_id,$sebagai,$ke,57,$pemenggalan_isi,'isi');
		            		$isi .= ' m&sup2; ';

		            	}
		            	
		            }
	            }

	            // isi to words
		        $words = $isi;

		        // final : yeah you got it
		        return $words;

			}else{

				// tipe_data == "id" || $tipe_data = tanpa_highlight
				if($tipe_data == 'data' || $tipe_data == 'tambah' || $tipe_data == 'print'  || $tipe_data == 'ubah'){

					// we generate model for you
					if(!is_null($berkas_data_id)){
			         	if($sumber_data_pengisian_id == 1){
			         		$model = berkas::select('berkas_datas.isi')

				                  ->join('berkas_datas', 'berkas_datas.berkas_data_id', '=', 'berkas.berkas_data_id')

				                  ->where([
				                  ['berkas.dmha_id','like',$parent_id],
				                  ['berkas.kode_unik','like',$kode_unik],
				                  ['berkas.sumber_data_pengisian_id','like',$sumber_data_pengisian_id],
				                  ['berkas.sebagai','like',$sebagai],
				                  ['berkas.ke','like',$ke],

				                  ['berkas_datas.sumber_data_pengisian_id','like',$sumber_data_pengisian_id],
				                  ['berkas_datas.pertanyaan_id','like',$pertanyaan_id],
				                  ['berkas_datas.berkas_data_id','like',$berkas_data_id],
				                  ])
			                	->get();
			         	}else{
			         		$model = berkas::select('berkas_datas.isi')

				                  ->join('berkas_datas', 'berkas_datas.berkas_data_id', '=', 'berkas.berkas_data_id')

				                  ->where([
				                  ['berkas.dmha_id','like',$parent_id],
				                  ['berkas.kode_unik','like',$kode_unik],
				                  ['berkas.sumber_data_pengisian_id','like',$sumber_data_pengisian_id],

				                  ['berkas_datas.sumber_data_pengisian_id','like',$sumber_data_pengisian_id],
				                  ['berkas_datas.pertanyaan_id','like',$pertanyaan_id],
				                  ['berkas_datas.berkas_data_id','like',$berkas_data_id],
				                  ])
			                	->get();
			         	}		            
					}else{
						if($sumber_data_pengisian_id == 1){
							$model = berkas::select('berkas_datas.isi')

				                  ->join('berkas_datas', 'berkas_datas.berkas_data_id', '=', 'berkas.berkas_data_id')

				                  ->where([
				                  ['berkas.dmha_id','like',$parent_id],
				                  ['berkas.kode_unik','like',$kode_unik],
				                  ['berkas.sumber_data_pengisian_id','like',$sumber_data_pengisian_id],
				                  ['berkas.sebagai','like',$sebagai],
				                  ['berkas.ke','like',$ke],

				                  ['berkas_datas.sumber_data_pengisian_id','like',$sumber_data_pengisian_id],
				                  ['berkas_datas.pertanyaan_id','like',$pertanyaan_id],

				                  ])
				                ->get();
				        }else{
				        	$model = berkas::select('berkas_datas.isi')

				                  ->join('berkas_datas', 'berkas_datas.berkas_data_id', '=', 'berkas.berkas_data_id')

				                  ->where([
				                  ['berkas.dmha_id','like',$parent_id],
				                  ['berkas.kode_unik','like',$kode_unik],
				                  ['berkas.sumber_data_pengisian_id','like',$sumber_data_pengisian_id],

				                  ['berkas_datas.sumber_data_pengisian_id','like',$sumber_data_pengisian_id],
				                  ['berkas_datas.pertanyaan_id','like',$pertanyaan_id],

				                  ])
				                ->get();
				        }
			        }

			    // we compile that model
			        if(!empty($model)){
				        foreach ($model as $row) {
				        	if($CUSTOM_REQ == 'isi'){
			            		$words .= $highlight_start.$row->isi.$highlight_end;
				        	}elseif($CUSTOM_REQ == 'umur'){
				        		$birthDate = $row->isi;

							  	$birthDate = explode("-", $birthDate);

							  	$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
							    ? ((date("Y") - $birthDate[2]) - 1)
							    : (date("Y") - $birthDate[2]));

							  	$umur =  $age.' Tahun';

			            		$words .= $highlight_start.$umur.$highlight_end;
				        	}

			            	if(count($model) != $counter){
			            		$words .= $pemenggalan_isi;
			            		$counter++;
			            	}
			            }
			        }else{
			        	$words = 'halo';
			        }		            
			        return $words;
				}
			}
	}


