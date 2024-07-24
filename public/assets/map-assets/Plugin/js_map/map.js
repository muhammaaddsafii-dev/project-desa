var rx, ux;
var myImagesArrayyy = [];
var mySlideShowww = '';
var layer_spam_pdam_unit_bend_panjt_i, layer_spam_pdam_unit_bend_panjt_ii, layer_spam_pdam_unit_galur, layer_spam_pdam_unit_girimulyo, layer_spam_pdam_unit_kalibawang, layer_spam_pdam_unit_lendah, layer_spam_pdam_unit_sendangsari, layer_spam_pdam_unit_sentolo_i, layer_spam_pdam_unit_sentolo_ii, layer_spam_pdam_unit_sermo, layer_spam_pdam_unit_temon_i, layer_spam_pdam_unit_temon_ii, layer_spam_pdam_unit_wates_i, layer_spam_pdam_unit_wates_ii, layer_spam_pdam_unit_wates_iii, layer_spam_pdam_unit_wates_iv;
var layer_air_baku_sumber_point, layer_air_baku_sarana_pendukung_point, layer_air_baku_jaringan_line, layer_sungai_line, layer_jalan_line;
var layer_admin_kabupaten_poly, layer_admin_kecamatan_poly, layer_admin_desa_poly, layer_admin_line;
var layer_OSM, layer_OTM, layer_ST, layer_SWC, layer_ESRI_Imagery, layer_ESRI_Topographic, layer_ESRI_Streets, layer_GoogleMaps_Map, layer_GoogleMaps_Imagery, layer_RBI;
	
	function LoadMap(){
		//--------JS Method for layers------
		
		//#BATAS ADMIN DOM
		$("#control_admin_line").prop('checked', true);
		function check_admin_line () {
			if ($("#control_admin_line").prop('checked')==true) {
				if (!map.hasLayer(layer_admin_line)) {map.addLayer(layer_admin_line);}
			} else {
				if (map.hasLayer(layer_admin_line)) {map.removeLayer(layer_admin_line);}
			}
		}
		$("#control_admin_line").change(function event(){check_admin_line()});

		//#JALAN DOM 
		$("#control_jalan_line").prop('checked', true);
		function check_jalan_line () {
			if ($("#control_jalan_line").prop('checked')==true) {
				if (!map.hasLayer(layer_jalan_line)) {map.addLayer(layer_jalan_line);}
			} else {	
				if (map.hasLayer(layer_jalan_line)) {map.removeLayer(layer_jalan_line);}
			}
		}
		$("#control_jalan_line").change(function event(){check_jalan_line()});
		
		//#SUNGAI DOM 
		$("#control_sungai_line").prop('checked', true);
		function check_sungai_line () {
			if ($("#control_sungai_line").prop('checked')==true) {
				if (!map.hasLayer(layer_sungai_line)) {map.addLayer(layer_sungai_line);}
			} else {
				if (map.hasLayer(layer_sungai_line)) {map.removeLayer(layer_sungai_line);}
			}
		}
		$("#control_sungai_line").change(function event(){check_sungai_line()});
		
		//#JARINGAN SPAM PDAM spam_pdam_unit_bend_panjt_i
		$("#control_spam_pdam_unit_bend_panjt_i").prop('checked', true);
		function check_spam_pdam_unit_bend_panjt_i () {
			if ($("#control_spam_pdam_unit_bend_panjt_i").prop('checked')==true) {
				if (!map.hasLayer(layer_spam_pdam_unit_bend_panjt_i)) {map.addLayer(layer_spam_pdam_unit_bend_panjt_i);}
			} else {
				if (map.hasLayer(layer_spam_pdam_unit_bend_panjt_i)) {map.removeLayer(layer_spam_pdam_unit_bend_panjt_i);}
			}
		}
		$("#control_spam_pdam_unit_bend_panjt_i").change(function event(){check_spam_pdam_unit_bend_panjt_i()});
		
		//#JARINGAN SPAM PDAM spam_pdam_unit_bend_panjt_ii
		$("#control_spam_pdam_unit_bend_panjt_ii").prop('checked', true);
		function check_spam_pdam_unit_bend_panjt_ii () {
			if ($("#control_spam_pdam_unit_bend_panjt_ii").prop('checked')==true) {
				if (!map.hasLayer(layer_spam_pdam_unit_bend_panjt_ii)) {map.addLayer(layer_spam_pdam_unit_bend_panjt_ii);}
			} else {
				if (map.hasLayer(layer_spam_pdam_unit_bend_panjt_ii)) {map.removeLayer(layer_spam_pdam_unit_bend_panjt_ii);}
			}
		}
		$("#control_spam_pdam_unit_bend_panjt_ii").change(function event(){check_spam_pdam_unit_bend_panjt_ii()});

		//#JARINGAN SPAM PDAM spam_pdam_unit_galur
		$("#control_spam_pdam_unit_galur").prop('checked', true);
		function check_spam_pdam_unit_galur () {
			if ($("#control_spam_pdam_unit_galur").prop('checked')==true) {
				if (!map.hasLayer(layer_spam_pdam_unit_galur)) {map.addLayer(layer_spam_pdam_unit_galur);}
			} else {
				if (map.hasLayer(layer_spam_pdam_unit_galur)) {map.removeLayer(layer_spam_pdam_unit_galur);}
			}
		}
		$("#control_spam_pdam_unit_galur").change(function event(){check_spam_pdam_unit_galur()});

		//#JARINGAN SPAM PDAM spam_pdam_unit_girimulyo
		$("#control_spam_pdam_unit_girimulyo").prop('checked', true);
		function check_spam_pdam_unit_girimulyo () {
			if ($("#control_spam_pdam_unit_girimulyo").prop('checked')==true) {
				if (!map.hasLayer(layer_spam_pdam_unit_girimulyo)) {map.addLayer(layer_spam_pdam_unit_girimulyo);}
			} else {
				if (map.hasLayer(layer_spam_pdam_unit_girimulyo)) {map.removeLayer(layer_spam_pdam_unit_girimulyo);}
			}
		}
		$("#control_spam_pdam_unit_girimulyo").change(function event(){check_spam_pdam_unit_girimulyo()});

		//#JARINGAN SPAM PDAM spam_pdam_unit_kalibawang
		$("#control_spam_pdam_unit_kalibawang").prop('checked', true);
		function check_spam_pdam_unit_kalibawang () {
			if ($("#control_spam_pdam_unit_kalibawang").prop('checked')==true) {
				if (!map.hasLayer(layer_spam_pdam_unit_kalibawang)) {map.addLayer(layer_spam_pdam_unit_kalibawang);}
			} else {
				if (map.hasLayer(layer_spam_pdam_unit_kalibawang)) {map.removeLayer(layer_spam_pdam_unit_kalibawang);}
			}
		}
		$("#control_spam_pdam_unit_kalibawang").change(function event(){check_spam_pdam_unit_kalibawang()});

		//#JARINGAN SPAM PDAM spam_pdam_unit_lendah
		$("#control_spam_pdam_unit_lendah").prop('checked', true);
		function check_spam_pdam_unit_lendah () {
			if ($("#control_spam_pdam_unit_lendah").prop('checked')==true) {
				if (!map.hasLayer(layer_spam_pdam_unit_lendah)) {map.addLayer(layer_spam_pdam_unit_lendah);}
			} else {
				if (map.hasLayer(layer_spam_pdam_unit_lendah)) {map.removeLayer(layer_spam_pdam_unit_lendah);}
			}
		}
		$("#control_spam_pdam_unit_lendah").change(function event(){check_spam_pdam_unit_lendah()});

		//#JARINGAN SPAM PDAM spam_pdam_unit_sendangsari
		$("#control_spam_pdam_unit_sendangsari").prop('checked', true);
		function check_spam_pdam_unit_sendangsari () {
			if ($("#control_spam_pdam_unit_sendangsari").prop('checked')==true) {
				if (!map.hasLayer(layer_spam_pdam_unit_sendangsari)) {map.addLayer(layer_spam_pdam_unit_sendangsari);}
			} else {
				if (map.hasLayer(layer_spam_pdam_unit_sendangsari)) {map.removeLayer(layer_spam_pdam_unit_sendangsari);}
			}
		}
		$("#control_spam_pdam_unit_sendangsari").change(function event(){check_spam_pdam_unit_sendangsari()});

		//#JARINGAN SPAM PDAM spam_pdam_unit_sentolo_i
		$("#control_spam_pdam_unit_sentolo_i").prop('checked', true);
		function check_spam_pdam_unit_sentolo_i () {
			if ($("#control_spam_pdam_unit_sentolo_i").prop('checked')==true) {
				if (!map.hasLayer(layer_spam_pdam_unit_sentolo_i)) {map.addLayer(layer_spam_pdam_unit_sentolo_i);}
			} else {
				if (map.hasLayer(layer_spam_pdam_unit_sentolo_i)) {map.removeLayer(layer_spam_pdam_unit_sentolo_i);}
			}
		}
		$("#control_spam_pdam_unit_sentolo_i").change(function event(){check_spam_pdam_unit_sentolo_i()});

		//#JARINGAN SPAM PDAM spam_pdam_unit_sentolo_ii
		$("#control_spam_pdam_unit_sentolo_ii").prop('checked', true);
		function check_spam_pdam_unit_sentolo_ii () {
			if ($("#control_spam_pdam_unit_sentolo_ii").prop('checked')==true) {
				if (!map.hasLayer(layer_spam_pdam_unit_sentolo_ii)) {map.addLayer(layer_spam_pdam_unit_sentolo_ii);}
			} else {
				if (map.hasLayer(layer_spam_pdam_unit_sentolo_ii)) {map.removeLayer(layer_spam_pdam_unit_sentolo_ii);}
			}
		}
		$("#control_spam_pdam_unit_sentolo_ii").change(function event(){check_spam_pdam_unit_sentolo_ii()});

		//#JARINGAN SPAM PDAM spam_pdam_unit_sermo
		$("#control_spam_pdam_unit_sermo").prop('checked', true);
		function check_spam_pdam_unit_sermo () {
			if ($("#control_spam_pdam_unit_sermo").prop('checked')==true) {
				if (!map.hasLayer(layer_spam_pdam_unit_sermo)) {map.addLayer(layer_spam_pdam_unit_sermo);}
			} else {
				if (map.hasLayer(layer_spam_pdam_unit_sermo)) {map.removeLayer(layer_spam_pdam_unit_sermo);}
			}
		}
		$("#control_spam_pdam_unit_sermo").change(function event(){check_spam_pdam_unit_sermo()});

		//#JARINGAN SPAM PDAM spam_pdam_unit_temon_i
		$("#control_spam_pdam_unit_temon_i").prop('checked', true);
		function check_spam_pdam_unit_temon_i () {
			if ($("#control_spam_pdam_unit_temon_i").prop('checked')==true) {
				if (!map.hasLayer(layer_spam_pdam_unit_temon_i)) {map.addLayer(layer_spam_pdam_unit_temon_i);}
			} else {
				if (map.hasLayer(layer_spam_pdam_unit_temon_i)) {map.removeLayer(layer_spam_pdam_unit_temon_i);}
			}
		}
		$("#control_spam_pdam_unit_temon_i").change(function event(){check_spam_pdam_unit_temon_i()});

		//#JARINGAN SPAM PDAM spam_pdam_unit_temon_ii
		$("#control_spam_pdam_unit_temon_ii").prop('checked', true);
		function check_spam_pdam_unit_temon_ii () {
			if ($("#control_spam_pdam_unit_temon_ii").prop('checked')==true) {
				if (!map.hasLayer(layer_spam_pdam_unit_temon_ii)) {map.addLayer(layer_spam_pdam_unit_temon_ii);}
			} else {
				if (map.hasLayer(layer_spam_pdam_unit_temon_ii)) {map.removeLayer(layer_spam_pdam_unit_temon_ii);}
			}
		}
		$("#control_spam_pdam_unit_temon_ii").change(function event(){check_spam_pdam_unit_temon_ii()});

		//#JARINGAN SPAM PDAM spam_pdam_unit_wates_i
		$("#control_spam_pdam_unit_wates_i").prop('checked', true);
		function check_spam_pdam_unit_wates_i () {
			if ($("#control_spam_pdam_unit_wates_i").prop('checked')==true) {
				if (!map.hasLayer(layer_spam_pdam_unit_wates_i)) {map.addLayer(layer_spam_pdam_unit_wates_i);}
			} else {
				if (map.hasLayer(layer_spam_pdam_unit_wates_i)) {map.removeLayer(layer_spam_pdam_unit_wates_i);}
			}
		}
		$("#control_spam_pdam_unit_wates_i").change(function event(){check_spam_pdam_unit_wates_i()});

		//#JARINGAN SPAM PDAM spam_pdam_unit_wates_ii
		$("#control_spam_pdam_unit_wates_ii").prop('checked', true);
		function check_spam_pdam_unit_wates_ii () {
			if ($("#control_spam_pdam_unit_wates_ii").prop('checked')==true) {
				if (!map.hasLayer(layer_spam_pdam_unit_wates_ii)) {map.addLayer(layer_spam_pdam_unit_wates_ii);}
			} else {
				if (map.hasLayer(layer_spam_pdam_unit_wates_ii)) {map.removeLayer(layer_spam_pdam_unit_wates_ii);}
			}
		}
		$("#control_spam_pdam_unit_wates_ii").change(function event(){check_spam_pdam_unit_wates_ii()});

		//#JARINGAN SPAM PDAM spam_pdam_unit_wates_iii
		$("#control_spam_pdam_unit_wates_iii").prop('checked', true);
		function check_spam_pdam_unit_wates_iii () {
			if ($("#control_spam_pdam_unit_wates_iii").prop('checked')==true) {
				if (!map.hasLayer(layer_spam_pdam_unit_wates_iii)) {map.addLayer(layer_spam_pdam_unit_wates_iii);}
			} else {
				if (map.hasLayer(layer_spam_pdam_unit_wates_iii)) {map.removeLayer(layer_spam_pdam_unit_wates_iii);}
			}
		}
		$("#control_spam_pdam_unit_wates_iii").change(function event(){check_spam_pdam_unit_wates_iii()});

		//#JARINGAN SPAM PDAM spam_pdam_unit_wates_iv
		$("#control_spam_pdam_unit_wates_iv").prop('checked', true);
		function check_spam_pdam_unit_wates_iv () {
			if ($("#control_spam_pdam_unit_wates_iv").prop('checked')==true) {
				if (!map.hasLayer(layer_spam_pdam_unit_wates_iv)) {map.addLayer(layer_spam_pdam_unit_wates_iv);}
			} else {
				if (map.hasLayer(layer_spam_pdam_unit_wates_iv)) {map.removeLayer(layer_spam_pdam_unit_wates_iv);}
			}
		}
		$("#control_spam_pdam_unit_wates_iv").change(function event(){check_spam_pdam_unit_wates_iv()});
				
		//#JARINGAN air_baku_jaringan_line DOM 
		$("#control_air_baku_jaringan_line").prop('checked', true);
		function check_air_baku_jaringan_line () {
			if ($("#control_air_baku_jaringan_line").prop('checked')==true) {
				if (!map.hasLayer(layer_air_baku_jaringan_line)) {map.addLayer(layer_air_baku_jaringan_line);}
			} else {
				if (map.hasLayer(layer_air_baku_jaringan_line)) {map.removeLayer(layer_air_baku_jaringan_line);}
			}
		}
		$("#control_air_baku_jaringan_line").change(function event(){check_air_baku_jaringan_line()});
	
		//#LOKASI air_baku_sarana_pendukung DOM 
		$("#control_air_baku_sarana_pendukung_marker").prop('checked', true);
		function check_air_baku_sarana_pendukung_marker () {
			if ($("#control_air_baku_sarana_pendukung_marker").prop('checked')==true) {
				if (!map.hasLayer(layer_air_baku_sarana_pendukung_marker)) {map.addLayer(layer_air_baku_sarana_pendukung_marker);}
			} else {	
				if (map.hasLayer(layer_air_baku_sarana_pendukung_marker)) {map.removeLayer(layer_air_baku_sarana_pendukung_marker);}
			}
		}
		$("#control_air_baku_sarana_pendukung_marker").change(function event(){check_air_baku_sarana_pendukung_marker()});

		//#LOKASI air_baku_sumber DOM 
		$("#control_air_baku_sumber_marker").prop('checked', true);
		function check_air_baku_sumber_marker () {
			if ($("#control_air_baku_sumber_marker").prop('checked')==true) {
				if (!map.hasLayer(layer_air_baku_sumber_marker)) {map.addLayer(layer_air_baku_sumber_marker);}
			} else {	
				if (map.hasLayer(layer_air_baku_sumber_marker)) {map.removeLayer(layer_air_baku_sumber_marker);}
			}
		}
		$("#control_air_baku_sumber_marker").change(function event(){check_air_baku_sumber_marker()});


		function check_batas_admin () {
			if (map.hasLayer(layer_admin_kabupaten_poly)) {map.removeLayer(layer_admin_kabupaten_poly);}
			if (map.hasLayer(layer_admin_kecamatan_poly)) {map.removeLayer(layer_admin_kecamatan_poly);}
			if (map.hasLayer(layer_admin_desa_poly)) {map.removeLayer(layer_admin_desa_poly);}
			if ($("#control_admin_kabupaten_poly").prop('checked')==true) {
				if (!map.hasLayer(layer_admin_kabupaten_poly)) {map.addLayer(layer_admin_kabupaten_poly);}
			}else if($("#control_admin_kecamatan_poly").prop('checked')==true) {
				if (!map.hasLayer(layer_admin_kecamatan_poly)) {map.addLayer(layer_admin_kecamatan_poly);}
			}else if($("#control_admin_desa_poly").prop('checked')==true) {
				if (!map.hasLayer(layer_admin_desa_poly)) {map.addLayer(layer_admin_desa_poly);}
			} else {
				if (map.hasLayer(layer_admin_kabupaten_poly)) {map.removeLayer(layer_admin_kabupaten_poly);}
				if (map.hasLayer(layer_admin_kecamatan_poly)) {map.removeLayer(layer_admin_kecamatan_poly);}
				if (map.hasLayer(layer_admin_desa_poly)) {map.removeLayer(layer_admin_desa_poly);}
			}
		}

		//#Admin Kabupaten DOM 
		$("#control_admin_kabupaten_poly").change(function event(){check_batas_admin()});
		
		//#Admin Kecamatan DOM 
		$("#control_admin_kecamatan_poly").change(function event(){check_batas_admin()});
		
		//#Admin Desa DOM 
		$("#control_admin_desa_poly").change(function event(){check_batas_admin()});

		//#None Basemap DOM 
		$("#control_admin_none").change(function event(){check_batas_admin()});

		
		function check_basemap () {
			if (map.hasLayer(basemapLayers.layer_ST)) {map.removeLayer(basemapLayers.layer_ST);}
			if (map.hasLayer(basemapLayers.layer_OSM)) {map.removeLayer(basemapLayers.layer_OSM);}
			if (map.hasLayer(basemapLayers.layer_OTM)) {map.removeLayer(basemapLayers.layer_OTM);}
			if (map.hasLayer(basemapLayers.layer_SWC)) {map.removeLayer(basemapLayers.layer_SWC);}
			if (map.hasLayer(basemapLayers.layer_ESRI_Imagery)) {map.removeLayer(basemapLayers.layer_ESRI_Imagery);}
			if (map.hasLayer(basemapLayers.layer_ESRI_Topographic)) {map.removeLayer(basemapLayers.layer_ESRI_Topographic);}
			if (map.hasLayer(basemapLayers.layer_ESRI_Streets)) {map.removeLayer(basemapLayers.layer_ESRI_Streets);}
			if (map.hasLayer(basemapLayers.layer_RBI)) {map.removeLayer(basemapLayers.layer_RBI);}
			if ($("#control_OpenStreetMap").prop('checked')==true) {
				if (!map.hasLayer(basemapLayers.layer_OSM)) {map.addLayer(basemapLayers.layer_OSM);}
			}else if($("#control_OpenTopoMap").prop('checked')==true) {
				if (!map.hasLayer(basemapLayers.layer_OTM)) {map.addLayer(basemapLayers.layer_OTM);}
			}else if($("#control_StamenTerrain").prop('checked')==true) {
				if (!map.hasLayer(basemapLayers.layer_ST)) {map.addLayer(basemapLayers.layer_ST);}
			}else if($("#control_StamenWatercolor").prop('checked')==true) {
				if (!map.hasLayer(basemapLayers.layer_SWC)) {map.addLayer(basemapLayers.layer_SWC);}
			}else if($("#control_ESRI_Imagery").prop('checked')==true) {
				if (!map.hasLayer(basemapLayers.layer_ESRI_Imagery)) {map.addLayer(basemapLayers.layer_ESRI_Imagery);}
			}else if($("#control_ESRI_Topographic").prop('checked')==true) {
				if (!map.hasLayer(basemapLayers.layer_ESRI_Topographic)) {map.addLayer(basemapLayers.layer_ESRI_Topographic);}
			}else if($("#control_ESRI_Streets").prop('checked')==true) {
				if (!map.hasLayer(basemapLayers.layer_ESRI_Streets)) {map.addLayer(basemapLayers.layer_ESRI_Streets);}
			}else if($("#control_RBI").prop('checked')==true) {
				if (!map.hasLayer(basemapLayers.layer_RBI)) {map.addLayer(basemapLayers.layer_RBI);}
			} else {
				if (map.hasLayer(basemapLayers.layer_SWC)) {map.removeLayer(basemapLayers.layer_SWC);}
				if (map.hasLayer(basemapLayers.layer_OSM)) {map.removeLayer(basemapLayers.layer_OSM);}
				if (map.hasLayer(basemapLayers.layer_OTM)) {map.removeLayer(basemapLayers.layer_OTM);}
				if (map.hasLayer(basemapLayers.layer_ST)) {map.removeLayer(basemapLayers.layer_ST);}
				if (map.hasLayer(basemapLayers.layer_ESRI_Imagery)) {map.removeLayer(basemapLayers.layer_ESRI_Imagery);}
				if (map.hasLayer(basemapLayers.layer_ESRI_Topographic)) {map.removeLayer(basemapLayers.layer_ESRI_Topographic);}
				if (map.hasLayer(basemapLayers.layer_ESRI_Streets)) {map.removeLayer(basemapLayers.layer_ESRI_Streets);}
				if (map.hasLayer(basemapLayers.layer_RBI)) {map.removeLayer(basemapLayers.layer_RBI);}
			}
		}

			
		//#OpenStreetMap DOM 
		$("#control_OpenStreetMap").prop('checked', true);
		$("#control_OpenStreetMap").change(function event(){check_basemap()});
				
		//#OpenTopoMap DOM 
		$("#control_OpenTopoMap").change(function event(){check_basemap()});
	
		//#StamenTerrain DOM 
		$("#control_StamenTerrain").change(function event(){check_basemap()});
		
		//#StamenWatercolor DOM 
		$("#control_StamenWatercolor").change(function event(){check_basemap()});
		
		//#NoneBasemap DOM 
		$("#control_NoneBasemap").change(function event(){check_basemap()});
	
		//#ESRI_Imagery DOM 
		$("#control_ESRI_Imagery").change(function event(){check_basemap()});
	
		//#ESRI_Topographic DOM 
		$("#control_ESRI_Topographic").change(function event(){check_basemap()});
			
		//#ESRI_Streets DOM 
		$("#control_ESRI_Streets").change(function event(){check_basemap()});
	
		//#RBI DOM 
		$("#control_RBI").change(function event(){check_basemap()});
	
		$('.leaflet-control-layers').hide;

		$("#control_admin_none").prop('checked', false);
		$("#control_admin_kabupaten_poly").prop('checked', false);
		$("#control_admin_kecamatan_poly").prop('checked', false);
		$("#control_admin_desa_poly").prop('checked', true);
		$("#control_admin_line").prop('checked', true);
		$("#control_jalan_line").prop('checked', false);
		$("#control_sungai_line").prop('checked', false);
		$("#control_spam_pdam_unit_bend_panjt_i").prop('checked', false);
		$("#control_spam_pdam_unit_bend_panjt_ii").prop('checked', false);
		$("#control_spam_pdam_unit_galur").prop('checked', false);
		$("#control_spam_pdam_unit_girimulyo").prop('checked', false);
		$("#control_spam_pdam_unit_kalibawang").prop('checked', false);
		$("#control_spam_pdam_unit_lendah").prop('checked', false);
		$("#control_spam_pdam_unit_sendangsari").prop('checked', false);
		$("#control_spam_pdam_unit_sentolo_i").prop('checked', false);
		$("#control_spam_pdam_unit_sentolo_ii").prop('checked', false);
		$("#control_spam_pdam_unit_sermo").prop('checked', false);
		$("#control_spam_pdam_unit_temon_i").prop('checked', false);
		$("#control_spam_pdam_unit_temon_ii").prop('checked', false);
		$("#control_spam_pdam_unit_wates_i").prop('checked', false);
		$("#control_spam_pdam_unit_wates_ii").prop('checked', false);
		$("#control_spam_pdam_unit_wates_iii").prop('checked', false);
		$("#control_spam_pdam_unit_wates_iv").prop('checked', false);
		$("#control_air_baku_jaringan_line").prop('checked', true);
		$("#control_air_baku_sarana_pendukung_marker").prop('checked', true);
		$("#control_air_baku_sumber_marker").prop('checked', true);

		map.fitBounds(layer_admin_kabupaten_poly.getBounds());
		
		setHeaderFooter()
	}

function setHeaderFooter(){
	if (document.body.clientWidth <= 1150) {
		document.getElementById('menu-close').style.display = "none";
		document.getElementById('menu-close2').style.display = "block";
		//var aaa = document.getElementById("accordion");
		//aaa.style.top = 50 + 'px';
		document.getElementById("x_navbar").innerHTML = "AIR BERSIHKU";  
		document.getElementById("x_footer").innerHTML = '<img src="images/logo/logo-kulon-progo.png" style="width:2%; display: inline-block;"> Copyright &copy; 2021 BCK DPUPKP KP.';  
	} else {
		document.getElementById('menu-close2').style.display = "none";
		document.getElementById('menu-close').style.display = "block";
		
		document.getElementById("x_navbar").innerHTML = "AIR BERSIHKU: Sistem Informasi Air Baku Kabupaten Kulon Progo";
		document.getElementById("x_footer").innerHTML = '<img src="images/logo/logo-kulon-progo.png" style="width:2%; display: inline-block;"> Copyright &copy; 2021 Bidang Cipta Karya, Dinas Pekerjaan Umum, Perumahan dan Kawasan Permukiman Kabupaten Kulon Progo.'; 
	}
	setMenuClose()
}

function setMenuClose(){
	if (document.body.clientWidth <= 768) {
		document.getElementById('menu-close').style.display = "none";
		document.getElementById('menu-close2').style.display = "block";
		} else {
		document.getElementById('menu-close2').style.display = "none";
		document.getElementById('menu-close').style.display = "block";
	}
}
