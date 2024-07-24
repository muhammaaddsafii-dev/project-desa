var map = L.map('map', {
	zoomControl:false, maxZoom:30, minZoom:1
}).setView([-7.8548859309698535, 110.16515021263504], 8);
		
var zoomBar = L.easyBar([
	L.easyButton( '<big>+</big>',  function(control, map){map.setZoom(map.getZoom()+1);}),
	L.easyButton( 'fa-home fa-lg', function(control, map){map.fitBounds(layer_admin_kabupaten_poly.getBounds());}),
	L.easyButton( '<big>-</big>',  function(control, map){map.setZoom(map.getZoom()-1);}),
]);			  
zoomBar.addTo(map);

L.control.locate({locateOptions: {maxZoom: 20}}).addTo(map);		
var geocoder = L.Control.Geocoder.nominatim({
	geocodingQueryParams: {
		countrycodes: 'id'
	}
}),
control = L.Control.geocoder({
	geocoder: geocoder, 
	collapsed: true,
	position: 'topleft',
	text: 'Cari Lokasi...',
	title: 'Cari'
}).addTo(map);

L.control.browserPrint({
	closePopupsOnPrint: false,
	printModes: [
		L.control.browserPrint.mode.landscape("Tabloid", "Tabloid"),
		L.control.browserPrint.mode.landscape(),
		L.control.browserPrint.mode.portrait(),
		L.control.browserPrint.mode.auto("Auto", "A4"),
		L.control.browserPrint.mode.custom("Pilih Area", "A4")
	]
}).addTo(map);

if ((rx ==  "Administrator") || (rx ==  "Editor")) {
	L.easyButton('fa fa-pencil-square-o', function(){
		map.closePopup();
		div_formTambahSumberAirBakuHide();
		// div_formPengaduanHide();
		$( ".slideshow-container_m" ).append( "<div class='m_mySlides'><img src='data/foto/no-image-icon.png' style='width:100%'></div>" );
		//$( "#slideshow-container_m" ).load(window.location.href + " #slideshow-container_m" );			
		var tgl = new Date();
		var tglStr = (String(tgl.getFullYear()) + "-" + String((tgl.getMonth()+1)) + "-" + (String(tgl.getDate()+1).replace('Z', '').replace('T', '')));
		var fotoDirectoryStr = (String(tgl.getFullYear()) + String((tgl.getMonth()+1)) + (String(tgl.getDate()+1).replace('Z', '').replace('T', '')) + String(tgl.getHours()) + String(tgl.getMinutes()) + String(tgl.getSeconds()) + String(tgl.getMilliseconds()));
		document.getElementById("m_foto").value = fotoDirectoryStr;
		// document.getElementById("m_tanggal_l").value = tglStr;
		document.getElementById("m_tanggal_p").value = tglStr;
		document.getElementById("m_operator").value = ux;
		document.getElementById("formTambahSumberAirBaku").style.display = "block";
		currentTab = 0;
		//plusSlides(1, 0);
		//plusSlides(-1, 0);
		plusSlides(-1, 0);
		nextPrev(1, 7, 'tab m', 'step m', 'm_prevBtn', 'm_nextBtn');
		nextPrev(-1, 7, 'tab m', 'step m', 'm_prevBtn', 'm_nextBtn');
		//var prev = document.getElementById('prevImg_m');	
		//prev.click();			
	}, 'Tambah Data Sumber Air Baku').addTo(map);
}

var myScale = L.control.scale({maxWidth: 225}).addTo(map);

map.createPane('pane_admin_kabupaten_poly');
map.getPane('pane_admin_kabupaten_poly').style.zIndex = 400;
map.getPane('pane_admin_kabupaten_poly').style['mix-blend-mode'] = 'normal';

map.createPane('pane_admin_kecamatan_poly');
map.getPane('pane_admin_kecamatan_poly').style.zIndex = 400;
map.getPane('pane_admin_kecamatan_poly').style['mix-blend-mode'] = 'normal';

map.createPane('pane_admin_desa_poly');
map.getPane('pane_admin_desa_poly').style.zIndex = 400;
map.getPane('pane_admin_desa_poly').style['mix-blend-mode'] = 'normal';

map.createPane('pane_jalan_line');
map.getPane('pane_jalan_line').style.zIndex = 400;
map.getPane('pane_jalan_line').style['mix-blend-mode'] = 'normal';

map.createPane('pane_admin_line');
map.getPane('pane_admin_line').style.zIndex = 400;
map.getPane('pane_admin_line').style['mix-blend-mode'] = 'normal';

map.createPane('pane_das_poly');
map.getPane('pane_das_poly').style.zIndex = 400;
map.getPane('pane_das_poly').style['mix-blend-mode'] = 'normal';

map.createPane('pane_kerawanan_banjir_poly');
map.getPane('pane_kerawanan_banjir_poly').style.zIndex = 400;
map.getPane('pane_kerawanan_banjir_poly').style['mix-blend-mode'] = 'normal';

map.createPane('pane_sungai_line');
map.getPane('pane_sungai_line').style.zIndex = 400;
map.getPane('pane_sungai_line').style['mix-blend-mode'] = 'normal';

map.createPane('pane_spam_pdam_unit_wates_iv');
map.getPane('pane_spam_pdam_unit_wates_iv').style.zIndex = 400;
map.getPane('pane_spam_pdam_unit_wates_iv').style['mix-blend-mode'] = 'normal';

map.createPane('pane_spam_pdam_unit_wates_iii');
map.getPane('pane_spam_pdam_unit_wates_iii').style.zIndex = 400;
map.getPane('pane_spam_pdam_unit_wates_iii').style['mix-blend-mode'] = 'normal';

map.createPane('pane_spam_pdam_unit_wates_ii');
map.getPane('pane_spam_pdam_unit_wates_ii').style.zIndex = 400;
map.getPane('pane_spam_pdam_unit_wates_ii').style['mix-blend-mode'] = 'normal';

map.createPane('pane_spam_pdam_unit_wates_i');
map.getPane('pane_spam_pdam_unit_wates_i').style.zIndex = 400;
map.getPane('pane_spam_pdam_unit_wates_i').style['mix-blend-mode'] = 'normal';

map.createPane('pane_spam_pdam_unit_temon_ii');
map.getPane('pane_spam_pdam_unit_temon_ii').style.zIndex = 400;
map.getPane('pane_spam_pdam_unit_temon_ii').style['mix-blend-mode'] = 'normal';

map.createPane('pane_spam_pdam_unit_temon_i');
map.getPane('pane_spam_pdam_unit_temon_i').style.zIndex = 400;
map.getPane('pane_spam_pdam_unit_temon_i').style['mix-blend-mode'] = 'normal';

map.createPane('pane_spam_pdam_unit_sermo');
map.getPane('pane_spam_pdam_unit_sermo').style.zIndex = 400;
map.getPane('pane_spam_pdam_unit_sermo').style['mix-blend-mode'] = 'normal';

map.createPane('pane_spam_pdam_unit_sentolo_ii');
map.getPane('pane_spam_pdam_unit_sentolo_ii').style.zIndex = 400;
map.getPane('pane_spam_pdam_unit_sentolo_ii').style['mix-blend-mode'] = 'normal';

map.createPane('pane_spam_pdam_unit_sentolo_i');
map.getPane('pane_spam_pdam_unit_sentolo_i').style.zIndex = 400;
map.getPane('pane_spam_pdam_unit_sentolo_i').style['mix-blend-mode'] = 'normal';

map.createPane('pane_spam_pdam_unit_sendangsari');
map.getPane('pane_spam_pdam_unit_sendangsari').style.zIndex = 400;
map.getPane('pane_spam_pdam_unit_sendangsari').style['mix-blend-mode'] = 'normal';

map.createPane('pane_spam_pdam_unit_lendah');
map.getPane('pane_spam_pdam_unit_lendah').style.zIndex = 400;
map.getPane('pane_spam_pdam_unit_lendah').style['mix-blend-mode'] = 'normal';

map.createPane('pane_spam_pdam_unit_kalibawang');
map.getPane('pane_spam_pdam_unit_kalibawang').style.zIndex = 400;
map.getPane('pane_spam_pdam_unit_kalibawang').style['mix-blend-mode'] = 'normal';

map.createPane('pane_spam_pdam_unit_girimulyo');
map.getPane('pane_spam_pdam_unit_girimulyo').style.zIndex = 400;
map.getPane('pane_spam_pdam_unit_girimulyo').style['mix-blend-mode'] = 'normal';

map.createPane('pane_spam_pdam_unit_galur');
map.getPane('pane_spam_pdam_unit_galur').style.zIndex = 400;
map.getPane('pane_spam_pdam_unit_galur').style['mix-blend-mode'] = 'normal';

map.createPane('pane_spam_pdam_unit_bend_panjt_ii');
map.getPane('pane_spam_pdam_unit_bend_panjt_ii').style.zIndex = 400;
map.getPane('pane_spam_pdam_unit_bend_panjt_ii').style['mix-blend-mode'] = 'normal';

map.createPane('pane_spam_pdam_unit_bend_panjt_i');
map.getPane('pane_spam_pdam_unit_bend_panjt_i').style.zIndex = 400;
map.getPane('pane_spam_pdam_unit_bend_panjt_i').style['mix-blend-mode'] = 'normal';

map.createPane('pane_air_baku_jaringan_line');
map.getPane('pane_air_baku_jaringan_line').style.zIndex = 400;
map.getPane('pane_air_baku_jaringan_line').style['mix-blend-mode'] = 'normal';

map.createPane('pane_air_baku_sarana_pendukung_line');
map.getPane('pane_air_baku_sarana_pendukung_line').style.zIndex = 400;
map.getPane('pane_air_baku_sarana_pendukung_line').style['mix-blend-mode'] = 'normal';

map.createPane('pane_air_baku_sumber_point');
map.getPane('pane_air_baku_sumber_point').style.zIndex = 400;
map.getPane('pane_air_baku_sumber_point').style['mix-blend-mode'] = 'normal';

var myKecamatan = new L.featureGroup([]);
var myAirBaku = new L.featureGroup([]);
var pulsingIcon = L.icon.pulse({iconSize:[20,20],color:'red'});

var selectorKecamatan = L.control({
	position: 'bottomleft'
});

selectorKecamatan.onAdd = function(map) {
	var div = L.DomUtil.create('div', 'mySelectorKecamatan');
	div.innerHTML = '<select id="kecamatan_select" style="width: 150px;"><option value="init">Cari Kecamatan...</option></select>';
	return div;
};

selectorKecamatan.addTo(map);

var kecamatan_select = L.DomUtil.get("kecamatan_select");
L.DomEvent.addListener(kecamatan_select, 'click', function(e) {
	L.DomEvent.stopPropagation(e);
});
L.DomEvent.addListener(kecamatan_select, 'change', changeHandlerKecamatan);

function changeHandlerKecamatan(e) {
	map.closePopup();
	$("#air_baku_select").empty();
	var optionElementInit1 = document.createElement("option");
	optionElementInit1.innerHTML = "Cari Sumber Air Baku..."; 
	L.DomUtil.get("air_baku_select").appendChild(optionElementInit1);
	
	// var myUrl = ""
	// if ((layer.feature.properties['jenis_s'] !== null ? Autolinker.link(String(layer.feature.properties['jenis_s'])) : '') == "IPAL Komunal"){
	// 	myUrl= 'images/icons/pin-yellow.png'
	// }else if((layer.feature.properties['jenis_s'] !== null ? Autolinker.link(String(layer.feature.properties['jenis_s'])) : '') == "MCK Plus") {
	// 	myUrl= 'images/icons/pin-green.png'
	// }else{
	// 	myUrl= 'images/icons/pin-red.png'
	// };
	// var smallIcon = L.icon({
	// 	iconSize: [27, 27],
	// 	iconAnchor: [13, 27],
	// 	popupAnchor:  [1, -24],
	// 	iconUrl: myUrl								
	// });
	// layer.setIcon(smallIcon);

	if (e.target.value == "init") {  
	} else {					
		myKecamatan = [];
		//layer_air_baku_sumber_marker.resetStyle();
		layer_air_baku_sumber_marker.eachLayer(function(layer) {
			if (layer.feature.properties.kapanewon == e.target.value) {
				myKecamatan.push(layer);
				var optionElement = document.createElement("option");
				optionElement.innerHTML = layer.feature.properties.nama.toString();  
				L.DomUtil.get("air_baku_select").appendChild(optionElement);
			}		
		});			

		layer_admin_kecamatan_poly.eachLayer(function(featureInstancelayer) {
			var propertyValue = featureInstancelayer.feature.properties['kecamatan'];				
			if (propertyValue == e.target.value) {
			$("#control_admin_kecamatan_poly").prop('checked', true);
			if (map.hasLayer(layer_admin_kabupaten_poly)) {map.removeLayer(layer_admin_kabupaten_poly);}
			if (!map.hasLayer(layer_admin_kecamatan_poly)) {map.addLayer(layer_admin_kecamatan_poly);}
			if (map.hasLayer(layer_admin_desa_poly)) {map.removeLayer(layer_admin_desa_poly);}
			featureInstancelayer.setStyle(
				{
					weight : 2,
					color : 'black',
					fillColor : 'red',
					fillOpacity : 0.2
				}
			);
			if(!L.Browser.ie && !L.Browser.opera){
				featureInstancelayer.bringToFront();
			}
			map.fitBounds(featureInstancelayer.getBounds());
			//map.setView(featureInstancelayer.feature.getBounds());
			} else {
				layer_admin_kecamatan_poly.resetStyle(featureInstancelayer);
			}
		});

		const opt = [];
		document.querySelectorAll('#air_baku_select > option').forEach((option) => {
			if (opt.includes(option.value)) option.remove()
			else opt.push(option.value)
		});

		//map.setView(myKecamatan.getBounds().getCenter(), 10);

		if (myKecamatan.length > 0) {
			alert("Ditemukan " + myKecamatan.length + " sumber air baku yang ada di Kecamatan " + e.target.value + ".");
		} else {
			alert("Tidak ditemukan sumber air baku di Kecamatan " + e.target.value + ".");
		}	
	}
}
			  
var selectorAirBaku = L.control({
	position: 'bottomleft'
});

selectorAirBaku.onAdd = function(map) {
	var div = L.DomUtil.create('div', 'mySelectorAirBaku');
	//div.innerHTML = '<select id="air_baku_select" size="4.5" style="width: 200px;"><option value="init">Cari Sumber Air Baku...</option></select>';
	div.innerHTML = '<select id="air_baku_select" style="width: 150px;"><option value="init">Cari Sumber Air Baku...</option></select>';
	return div;
};
selectorAirBaku.addTo(map);

var air_baku_select = L.DomUtil.get("air_baku_select");
L.DomEvent.addListener(air_baku_select, 'click', function(e) {
	L.DomEvent.stopPropagation(e);
});
L.DomEvent.addListener(air_baku_select, 'change', changeHandlerAirBaku);

function changeHandlerAirBaku(e) {
	map.closePopup();				
	if (e.target.value == "init") {
	} else {
		
		myAirBaku = [];

		myKecamatan.forEach(function(layer) {
			//alert(layer.feature.properties.nama);
			if (layer.feature.properties.nama == e.target.value) {
				myAirBaku.push(layer);		
				//alert(layer.feature.properties.nama);					
			} 
		});

		// layer_air_baku_sumber_marker.eachLayer(function(featureInstancelayer) {
		// 	var propertyValue = featureInstancelayer.feature.properties['nama'];				
		// 	if (propertyValue == e.target.value) {
		// 		myAirBaku.push(featureInstancelayer);
		// 		featureInstancelayer.setIcon(pulsingIcon);	
		// 		// featureInstancelayer.setStyle(
		// 		// 	{
		// 		// 		weight : 4,
		// 		// 		color : 'red'
		// 		// 		//fillOpacity : 0.2
		// 		// 	}
		// 		// );
		// 	if(!L.Browser.ie && !L.Browser.opera){
		// 		featureInstancelayer.bringToFront();
		// 	}
		// 	map.fitBounds(featureInstancelayer.getBounds());
		// 	map.setView(featureInstancelayer.feature.getBounds());
		// 	} else {
		// 		layer_air_baku_jaringan_line.resetStyle(featureInstancelayer);
		// 	}
		// });

		
		layer_air_baku_sumber_marker.eachLayer(function(layer) {
			var namaKecamatan = document.getElementById('kecamatan_select').value;	
			if (layer.feature.properties.nama == e.target.value && layer.feature.properties.kapanewon == namaKecamatan) {
				layer.setIcon(pulsingIcon);
			} else {						
				var myUrl = ""
				if ((layer.feature.properties['jenis_s'] !== null ? Autolinker.link(String(layer.feature.properties['jenis_s'])) : '') == "IPAL Komunal"){
					myUrl= 'images/icons/pin-yellow.png'
				}else if((layer.feature.properties['jenis_s'] !== null ? Autolinker.link(String(layer.feature.properties['jenis_s'])) : '') == "MCK Plus") {
					myUrl= 'images/icons/pin-green.png'
				}else{
					myUrl= 'images/icons/pin-red.png'
				};
				var smallIcon = L.icon({
					iconSize: [27, 27],
					iconAnchor: [13, 27],
					popupAnchor:  [1, -24],
					iconUrl: myUrl								
				});
				layer.setIcon(smallIcon);		
			}
		});	

		//alert("Ditemukan " + myAirBaku.length);
		var myAirBakuGroup = L.featureGroup(myAirBaku);
		map.setView(myAirBakuGroup.getBounds().getCenter(), 17);
		//myMarkerGroup.openPopup();
		//alert("Ditemukan " + myAirBakuGroup.length);										
	}
}

var zoomToCoordinate = L.control({
	position: 'bottomleft'
});

var locationMarker = L.marker([-8.0948, 111.1528]).addTo(map);
var markerPopup = L.popup().setContent("Bidang Cipta Karya, Dinas Pekerjaan Umum, Perumahan dan Kawasan Permukiman Kabupaten Kulon Progo");
locationMarker.bindPopup(markerPopup).openPopup();

zoomToCoordinate.onAdd = function(map) {
	var div = L.DomUtil.create('div', 'myZoomToCoordinate');
	div.innerHTML = '<input type="text" name="lat" id="inputLat" style="width: 67px;" placeholder="Latitude..." />';
	div.innerHTML += '<input type="text" name="long" id="inputLong" style="width: 67px;" placeholder="Longitude..." />';
	div.innerHTML += '<input type="button" id="zoomTo" onclick="zoomTo()" value="Zoom To"/>';
	if (map.hasLayer(locationMarker)) {map.removeLayer(locationMarker);}
	return div;
};

function zoomTo() {
	var lat = document.getElementById("inputLat").value;
	var long = document.getElementById("inputLong").value;
	var newLatLng = new L.LatLng(lat, long);
	if (!lat == "" && !long == "") {
		if (map.hasLayer(locationMarker)) {map.removeLayer(locationMarker);}
		locationMarker = L.marker([lat, long]).addTo(map);
		markerPopup.setContent("Latitude:" + lat + " , Longitude:" + long);
		locationMarker.bindPopup(markerPopup).openPopup();
		map.setView(newLatLng, 15);
		$("#locationMarker").fadeIn('slow');
	}
}

zoomToCoordinate.addTo(map);
zoomToCoordinate.enable = true;

var showHideQueryButton = L.easyButton({
    states: [{
            stateName: 'hide-query',
            icon:      'fa fa-square-o',
            title:     'Sembunyikan fasilitas pencarian..',
            onClick: function(btn) {
                selectorKecamatan.enable = false;
				selectorKecamatan.remove();
				// selectorDesa.enable = false;
				// selectorDesa.remove();
				selectorAirBaku.enable = false;
				selectorAirBaku.remove();
				zoomToCoordinate.enable = false;
				zoomToCoordinate.remove();
                btn.state('show-query');
            }
        }, {
            stateName: 'show-query',
            icon:      'fa fa-tasks',
            title:     'Tampilkan fasilitas pencarian..',
            onClick: function(btn) {
                selectorKecamatan.addTo(map);
				selectorKecamatan.enable = true;
				// selectorDesa.addTo(map);
				// selectorDesa.enable = true;
				selectorAirBaku.addTo(map);
				selectorAirBaku.enable = true;
				zoomToCoordinate.addTo(map);
				zoomToCoordinate.enable = true;
                btn.state('hide-query');
            }
    }]
});

showHideQueryButton.addTo(map);

var basemapLayers = {
	//Basemap: OpenStreetMap
	layer_OSM : L.tileLayer( 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
		subdomains: ['a','b','c'], minZoom: 0, maxZoom: 30
	}),				
	//Basemap: OpenTopoMap
	layer_OTM : L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
		minZoom: 0,	maxZoom: 30,
		attribution: 'Map data: &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>,' + 
		' <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; ' + 
		'<a href="https://opentopomap.org">OpenTopoMap</a> ' + 
		'(<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
	}),
	//Basemap: StamenTerrainMap
	layer_ST : L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/terrain/{z}/{x}/{y}{r}.{ext}', {
		attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, ' + 
		'<a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; ' + 
		'Map data &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
		subdomains: 'abcd', minZoom: 0, maxZoom: 30,
		ext: 'png'
	}),
	//Basemap: StamenWaterColorMap
	layer_SWC : L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
		attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, ' + 
		'<a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; ' + 
		'Map data &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
		subdomains: 'abcd', minZoom: 0, maxZoom: 30,
		ext: 'png'
	}), 
	//ESRI Basemap
	layer_ESRI_Imagery: L.esri.basemapLayer('Imagery'), 
	layer_ESRI_Topographic: L.esri.basemapLayer('Topographic'), 
	layer_ESRI_Streets: L.esri.basemapLayer('Streets'), 
	//RBI Basemap
	layer_RBI : L.tileLayer('https://portal.ina-sdi.or.id/arcgis/rest/services/RBI/INDONESIA/MapServer/tile/{z}/{y}/{x}', {
    maxZoom: 30,
    attribution: 'RBI 2019 BIG',
	bounds: [[8, 144], [-15, 90]]})
};

var basemapLayersCopy = {
	//Basemap: OpenStreetMap
	layer_OSM : L.tileLayer( 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		subdomains: ['a','b','c'],
		minZoom: 0,
		maxZoom: 13
	}), 
				
	//Basemap: OpenTopoMap
	layer_OTM : L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
		minZoom: 0,	
		maxZoom: 13,
	}),

	//Basemap: StamenTerrainMap
		layer_ST : L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/terrain/{z}/{x}/{y}{r}.{ext}', {
		subdomains: 'abcd',
		minZoom: 0,
		maxZoom: 13,
		ext: 'png'
	}),

	//Basemap: StamenWaterColorMap
		layer_SWC : L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
		subdomains: 'abcd',
		minZoom: 0,
		maxZoom: 13,
		ext: 'png'
	}), 

	//ESRI Basemap
	layer_ESRI_Imagery: L.esri.basemapLayer('Imagery'), 
	layer_ESRI_Topographic: L.esri.basemapLayer('Topographic'), 
	layer_ESRI_Streets: L.esri.basemapLayer('Streets'),
	
	//RBI Basemap
	layer_RBI : L.tileLayer('https://portal.ina-sdi.or.id/arcgis/rest/services/RBI/INDONESIA/MapServer/tile/{z}/{y}/{x}', {
    maxZoom: 13,
	bounds: [[8, 144], [-15, 90]]})

};

//===============================================
// LAYER EVENT 
//===============================================
function highlightFeature(e){
	var layer = e.target;
	layer.setStyle(
		{
			weight : 2,
			color : 'red',
			fillColor : 'white',
			fillOpacity : 0.2
		}
	);
	if(!L.Browser.ie && !L.Browser.opera){
		layer.bringToFront();
	}
}
					
function resetHighlightKabupaten(e){
	//if (map.hasLayer(layer_admin_kabupaten_poly)) {layer_admin_kabupaten_poly.resetStyle(e.target);}
	layer_admin_kabupaten_poly.resetStyle(e.target);
}

function resetHighlightKecamatan(e){
	//if (map.hasLayer(layer_admin_kecamatan_poly)) {layer_admin_kecamatan_poly.resetStyle(e.target);}
	layer_admin_kecamatan_poly.resetStyle(e.target);
}

function resetHighlightDesa(e){
	//if (map.hasLayer(layer_admin_desa_poly)) {layer_admin_desa_poly.resetStyle(e.target);}
	layer_admin_desa_poly.resetStyle(e.target);
}

function resetHighlightSungai(e){
	//if (map.hasLayer(layer_sungai_line)) {layer_sungai_line.resetStyle(e.target);}
	layer_sungai_line.resetStyle(e.target);
}

function resetHighlightJalan(e){
	//if (map.hasLayer(layer_sungai_line)) {layer_sungai_line.resetStyle(e.target);}
	layer_jalan_line.resetStyle(e.target);
}

function resetHighlightJaringanAirBaku(e){
	// if (map.hasLayer(layer_air_baku_jaringan_line)) {layer_air_baku_jaringan_line.resetStyle(e.target);}
	layer_air_baku_jaringan_line.resetStyle(e.target);
}

function zoomToFeature(e){
	map.fitBounds(e.target.getBounds());
	//e.target.bindPopup(
	//'<h1>'+e.target.feature.properties.KECAMATAN+'</h1><p>Area :'+e.target.feature.properties.SHAPE_AREA.toString()+'</p><div><img style="width:100%" src="data/kis_IMG_0130_cut.jpg" alt="image" /></div>',
	//{minWidth : 256}
	//);
}

function regionsOnEachFeatureKabupaten(feature, layer){
	layer.bindTooltip(feature.properties.kabupaten.toString(), {noHide : true});
	//if (map.hasLayer(layer_admin_kabupaten_poly)) {layer.bindTooltip(feature.properties.kabupaten.toString(), {noHide : true});} 							
	layer.on(
		{
			mouseover : highlightFeature,
			mouseout : resetHighlightKabupaten,
			click : zoomToFeature
		}
	);
}

function regionsOnEachFeatureKecamatan(feature, layer){
	layer.bindTooltip(feature.properties.kecamatan.toString(), {noHide : true});
	//if (map.hasLayer(layer_admin_kecamatan_poly)) {layer.bindTooltip(feature.properties.kecamatan.toString(), {noHide : true});} 							
				
	var optionElement = document.createElement("option");
	optionElement.innerHTML = feature.properties.kecamatan.toString();
	L.DomUtil.get("kecamatan_select").appendChild(optionElement);			
						
	const opt = [];
	document.querySelectorAll('#kecamatan_select > option').forEach((option) => {
		if (opt.includes(option.value)) option.remove()
		else opt.push(option.value)
	});  
	
	layer.on(
		{
			mouseover : highlightFeature,
			mouseout : resetHighlightKecamatan,
			click : zoomToFeature
		}
	);
}

function regionsOnEachFeatureDesa(feature, layer){
	layer.bindTooltip(feature.properties.desa.toString(), {noHide : true});
	// if (map.hasLayer(layer_admin_desa_poly)) {layer.bindTooltip(feature.properties.desa_kel.toString(), {noHide : true});} 							
				
	// var optionElement = document.createElement("option");
	// optionElement.innerHTML = feature.properties.desa_kel.toString();
	// L.DomUtil.get("desa_select").appendChild(optionElement);			
				
	layer.on(
		{
			mouseover : highlightFeature,
			mouseout : resetHighlightDesa,
			click : zoomToFeature
		}
	);
}

//===============================================
// STYLE 
//===============================================
function style_admin_kabupaten_poly() {
	return {
		pane: 'pane_admin_kabupaten_poly',
		opacity: 0.5,
		color: 'rgba(35,35,35,0.0)',
		dashArray: '',
		lineCap: 'butt',
		lineJoin: 'miter',
		weight: 1.0, 
		fill: true,
		fillopacity: 0.5,
		fillColor: 'rgba(200,200,200,0.35)',
		interactive: true,
	}
}

function style_admin_kecamatan_poly() {
	return {
		pane: 'pane_admin_kecamatan_poly',
		opacity: 0.5,
		color: 'rgba(35,35,35,0.0)',
		dashArray: '',
		lineCap: 'butt',
		lineJoin: 'miter',
		weight: 1.0, 
		fill: true,
		fillopacity: 0.5,
		fillColor: 'rgba(200,200,200,0.35)',
		interactive: true,
	}
}

function style_admin_desa_poly() {
	return {
		pane: 'pane_admin_desa_poly',
		opacity: 0.5,
		color: 'rgba(35,35,35,0.0)',
		dashArray: '',
		lineCap: 'butt',
		lineJoin: 'miter',
		weight: 1.0, 
		fill: true,
		fillopacity: 0.5,
		fillColor: 'rgba(200,200,200,0.35)',
		interactive: true,
	}
}

function style_admin_line(feature) {
	switch(String(feature.properties['batas'])) {
		case 'PROVINSI':
			return {
				pane: 'pane_admin_line',
				opacity: 0.5,
				color: 'rgba(0,0,0,1.0)',
				dashArray: '10,5,1,5',
				lineCap: 'square',
				lineJoin: 'bevel',
				weight: 2.0,
				fillOpacity: 0,
				interactive: true,
			}
			break;
		case 'KABUPATEN':
			return {
				pane: 'pane_admin_line',
				opacity: 0.5,
				color: 'rgba(0,0,0,1.0)',
				dashArray: '10,5,1,5,1,5',
				lineCap: 'square',
				lineJoin: 'bevel',
				weight: 2.0,
				fillOpacity: 0,
				interactive: true,
			}
			break;
		case 'KECAMATAN':
			return {
				pane: 'pane_admin_line',
				opacity: 0.5,
				color: 'rgba(35,35,35,1.0)',
				dashArray: '10,5',
				lineCap: 'square',
				lineJoin: 'bevel',
				weight: 1.0,
				fillOpacity: 0,
				interactive: true,
			}
			break;
		case 'DESA':
			return {
				pane: 'pane_admin_line',
				opacity: 0.5,
				color: 'rgba(0,0,0,1.0)',
				dashArray: '1,5',
				lineCap: 'square',
				lineJoin: 'bevel',
				weight: 1.0,
				fillOpacity: 0,
				interactive: true,
			}
			break;
		case 'GARIS PANTAI':
			return {
				pane: 'pane_admin_line',
				opacity: 0.5,
				color: 'rgba(0,255,255,1.0)',
				dashArray: '',
				lineCap: 'square',
				lineJoin: 'bevel',
				weight: 1.0,
				fillOpacity: 0,
				interactive: true,
			}
			break;
	}
}

function style_jalan_line(feature) {
	switch(String(feature.properties['keterangan'])) {
		case 'Jalan Arteri':
			return {
				pane: 'pane_jalan_line',
				opacity: 1,
				color: 'rgba(255,128,255,1.0)',
				dashArray: '',
				lineCap: 'square',
				lineJoin: 'bevel',
				weight: 2.0,
				fillOpacity: 0,
				interactive: true,
			}
			break;
		case 'Jalan Kolektor':
			return {
				pane: 'pane_jalan_line',
				opacity: 1,
				color: 'rgba(255,178,0,1.0)',
				dashArray: '',
				lineCap: 'square',
				lineJoin: 'bevel',
				weight: 2.0,
				fillOpacity: 0,
				interactive: true,
			}
			break;
		case 'Jalan Lokal':
			return {
				pane: 'pane_jalan_line',
				opacity: 1,
				color: 'rgba(255,135,102,1.0)',
				dashArray: '',
				lineCap: 'square',
				lineJoin: 'bevel',
				weight: 2.0,
				fillOpacity: 0,
				interactive: true,
			}
			break;
		case 'Jalan Lain':
			return {
				pane: 'pane_jalan_line',
				opacity: 1,
				color: 'rgba(255,173,102,1.0)',
				dashArray: '',
				lineCap: 'square',
				lineJoin: 'bevel',
				weight: 1.0,
				fillOpacity: 0,
				interactive: true,
			}
			break;
		case 'Jalan Setapak':
			return {
				pane: 'pane_jalan_line',
				opacity: 1,
				color: 'rgba(255,153,255,1.0)',
				dashArray: '1,5',
				lineCap: 'square',
				lineJoin: 'bevel',
				weight: 1.0,
				fillOpacity: 0,
				interactive: true,
			}
			break;
		case 'Jembatan':
			return {
				pane: 'pane_jalan_line',
				opacity: 1,
				color: 'rgba(0,0,0,1.0)',
				dashArray: '',
				lineCap: 'square',
				lineJoin: 'bevel',
				weight: 1.0,
				fillOpacity: 0,
				interactive: true,
			}
			break;
		case 'Jalan Kereta Api':
			return {
				pane: 'pane_jalan_line',
				opacity: 1,
				color: 'rgba(0,0,0,1.0)',
				dashArray: '',
				lineCap: 'round',
				lineJoin: 'round',
				weight: 1.0,
				fillOpacity: 0,
				interactive: true,
			}
			break;
		case 'Jalan titian':
			return {
				pane: 'pane_jalan_line',
				opacity: 1,
				color: 'rgba(255,125,255,1.0)',
				dashArray: '',
				lineCap: 'round',
				lineJoin: 'round',
				weight: 1.0,
				fillOpacity: 0,
				interactive: true,
		}
				break;
	}
}

function style_sungai_line(feature) {
	switch(String(feature.properties['orde'])) {
		case '1':
			return {
		pane: 'pane_sungai_line',
		opacity: 1,
		color: 'rgba(28,108,235,1.0)',
		dashArray: '',
		lineCap: 'square',
		lineJoin: 'bevel',
		weight: 2.0,
		fillOpacity: 0,
		interactive: true,
	}
			break;
		case '2':
			return {
		pane: 'pane_sungai_line',
		opacity: 1,
		color: 'rgba(82,157,215,1.0)',
		dashArray: '',
		lineCap: 'square',
		lineJoin: 'bevel',
		weight: 2.0,
		fillOpacity: 0,
		interactive: true,
	}
			break;
		case '3':
			return {
		pane: 'pane_sungai_line',
		opacity: 1,
		color: 'rgba(125,200,200,1.0)',
		dashArray: '',
		lineCap: 'square',
		lineJoin: 'bevel',
		weight: 2.0,
		fillOpacity: 0,
		interactive: true,
	}
			break;
		case '4':
			return {
		pane: 'pane_sungai_line',
		opacity: 1,
		color: 'rgba(175,227,243,1.0)',
		dashArray: '',
		lineCap: 'square',
		lineJoin: 'bevel',
		weight: 1.0,
		fillOpacity: 0,
		interactive: true,
	}
			break;
		case '5':
			return {
		pane: 'pane_sungai_line',
		opacity: 1,
		color: 'rgba(235,251,255,1.0)',
		dashArray: '',
		lineCap: 'square',
		lineJoin: 'bevel',
		weight: 1.0,
		fillOpacity: 0,
		interactive: true,
	}
			break;
	}
}

function style_air_baku_jaringan_line(feature) {
	return {
		pane: 'pane_air_baku_jaringan_line',
		opacity: 1,
		color: 'rgba(93,0,255,1.0)',
		dashArray: '',
		lineCap: 'square',
		lineJoin: 'bevel',
		weight: 1.0,
		fillOpacity: 0,
		interactive: true,
	}
}

function style_spam_pdam_line(pane) {
	return {
		pane: pane,
		opacity: 1,
		color: 'rgba(0,255,255,1.0)',
		dashArray: '',
		lineCap: 'square',
		lineJoin: 'bevel',
		weight: 2.0,
		fillOpacity: 0,
		interactive: true,
	}		
}

//===============================================
// LOAD WFS FROM GEOSERVER 
//===============================================
var layer_air_baku_sumber_marker = new L.markerClusterGroup({ chunkedLoading: true });
var layer_air_baku_sarana_pendukung_marker = new L.markerClusterGroup({ chunkedLoading: true });

function load_GeoJSON_admin_kabupaten_poly(){
	var promisePolygon = $.ajax({
		url: "./dataservice/read_polygon_admin_kabupaten.php",
		method: "GET",
		dataType: "json",
		data: {command:"POLYGON"},
		username: null,
		password: null
	});
	
	layer_admin_kabupaten_poly = L.geoJson(null, {
		pane: 'pane_admin_kabupaten_poly', 
		style: style_admin_kabupaten_poly,
		onEachFeature: function (feature, layer) {
			if (feature.properties) {
				layer.bindTooltip(feature.properties.kabupaten.toString(), {noHide : true});
				layer.on({
					mouseover : highlightFeature,
					mouseout : resetHighlightKabupaten,
					click : zoomToFeature
				});
			}
		}
	});

	promisePolygon.then(function (data) {
		layer_admin_kabupaten_poly.addData(data);
		// map.addLayer(layer_admin_kabupaten_poly);
	});
}

function load_GeoJSON_admin_kecamatan_poly(){
	var promisePolygon = $.ajax({
		url: "./dataservice/read_polygon_admin_kecamatan.php",
		method: "GET",
		dataType: "json",
		data: {command:"POLYGON"},
		username: null,
		password: null
	});
	
	layer_admin_kecamatan_poly = L.geoJson(null, {
		pane: 'pane_admin_kecamatan_poly',
		style: style_admin_kecamatan_poly,
		onEachFeature: function (feature, layer) {
			if (feature.properties) {
				layer.bindTooltip(feature.properties.kecamatan.toString(), {noHide : true});
							
				var optionElement = document.createElement("option");
				optionElement.innerHTML = feature.properties.kecamatan.toString();
				L.DomUtil.get("kecamatan_select").appendChild(optionElement);			
									
				const opt = [];
				document.querySelectorAll('#kecamatan_select > option').forEach((option) => {
					if (opt.includes(option.value)) option.remove()
					else opt.push(option.value)
				});  
				
				layer.on(
					{
						mouseover : highlightFeature,
						mouseout : resetHighlightKecamatan,
						click : zoomToFeature
					}
				);
			}
		}
	});

	promisePolygon.then(function (data) {
		layer_admin_kecamatan_poly.addData(data);
		map.addLayer(layer_admin_kecamatan_poly);
		map.fitBounds(layer_admin_kecamatan_poly.getBounds());
	});
}

function load_GeoJSON_admin_desa_poly(){
	var promisePolygon = $.ajax({
		url: "./dataservice/read_polygon_admin_desa.php",
		method: "GET",
		dataType: "json",
		data: {command:"POLYGON"},
		username: null,
		password: null
	});
	
	layer_admin_desa_poly = L.geoJson(null, {
		pane: 'pane_admin_desa_poly',
		style: style_admin_desa_poly,
		onEachFeature: function (feature, layer) {
			if (feature.properties) {
				layer.bindTooltip(feature.properties.desa.toString(), {noHide : true});			
				layer.on(
					{
						mouseover : highlightFeature,
						mouseout : resetHighlightDesa,
						click : zoomToFeature
					}
				);
			}
		}
	});

	promisePolygon.then(function (data) {
		layer_admin_desa_poly.addData(data);
		// map.addLayer(layer_admin_desa_poly);
	});
}

function load_GeoJSON_admin_line(){
	var promiseLinestring = $.ajax({
		url: "./dataservice/read_linestring_admin.php",
		method: "GET",
		dataType: "json",
		data: {command:"LINESTRING"},
		username: null,
		password: null
	});
	
	layer_admin_line = L.geoJson(null, {
		pane: 'pane_admin_line',
		style: style_admin_line,
		onEachFeature: function (feature, layer) {
			if (feature.properties) {
				layer.bindPopup("KETERANGAN: BATAS " + feature.properties.batas);
			}
		}
	});

	promiseLinestring.then(function (data) {
		layer_admin_line.addData(data);
		map.addLayer(layer_admin_line);
	});
}

function load_GeoJSON_jalan_line(){
	var promiseLinestring = $.ajax({
		url: "./dataservice/read_linestring_jalan.php",
		method: "GET",
		dataType: "json",
		data: {command:"LINESTRING"},
		username: null,
		password: null
	});
	
	layer_jalan_line = L.geoJson(null, {
		pane: 'pane_jalan_line',
		style: style_jalan_line,
		onEachFeature: function (feature, layer) {
			if (feature.properties) {
				layer.bindTooltip(feature.properties['keterangan'], {noHide : true});
				layer.on(
					{
						mouseover : highlightFeature,
						mouseout : resetHighlightJalan
					}
				);	
			}
		}
	});

	promiseLinestring.then(function (data) {
		layer_jalan_line.addData(data);
		// map.addLayer(layer_jalan_line);
	});
}

function load_GeoJSON_sungai_line(){
	var promiseLinestring = $.ajax({
		url: "./dataservice/read_linestring_sungai.php",
		method: "GET",
		dataType: "json",
		data: {command:"LINESTRING"},
		username: null,
		password: null
	});
	
	layer_sungai_line = L.geoJson(null, {
		pane: 'pane_sungai_line',
		style: style_sungai_line,
		onEachFeature: function (feature, layer) {
			if (feature.properties) {
				var popupContent =  
				'<form id="regForm" action="">'
				+ '<h4 style="text-align: center;"> Sungai </h4>'	
					+ '<table>'
						+ '<tr><th>Nama </th><td> : '+(feature.properties['nama'] !== null ? Autolinker.link(String(feature.properties['nama'])) : '') + '</td></tr>' 
						+ '<tr><th>Jenis </th><td> : '+(feature.properties['jenis'] !== null ? Autolinker.link(String(feature.properties['jenis'])) : '') + '</td></tr>' 
						+ '<tr><th>Orde </th><td> : '+(feature.properties['orde'] !== null ? Autolinker.link(String(feature.properties['orde'])) : '') + '</td></tr>' 
						+ '<tr><th>Panjang </th><td> : '+(feature.properties['panjang'] !== null ? Autolinker.link(String(feature.properties['panjang'])) : '') + '</td></tr>' 
						+ '<tr><th>Kewenangan </th><td> : '+(feature.properties['kewenangan'] !== null ? Autolinker.link(String(feature.properties['kewenangan'])) : '') + '</td></tr>' 
					+ '</table>'				
				+ '</form>'; 
				layer.bindPopup(popupContent, {minWidth : 300});				 
				layer.bindTooltip(feature.properties['nama'], {noHide : true});

				layer.on(
					{
						mouseover : highlightFeature,
						mouseout : resetHighlightSungai
					}
				);
			}
		}
	});

	promiseLinestring.then(function (data) {
		layer_sungai_line.addData(data);
		// map.addLayer(layer_sungai_line);
	});
}

function load_GeoJSON_spam_pdam_line(panePDAM) {

	var urlPHP;
	if (panePDAM == "pane_spam_pdam_unit_bend_panjt_i") { urlPHP = "./dataservice/read_linestring_spam_pdam_unit_bend_panjt_i.php";}
	else if (panePDAM == "pane_spam_pdam_unit_bend_panjt_ii") { urlPHP = "./dataservice/read_linestring_spam_pdam_unit_bend_panjt_ii.php";}
	else if (panePDAM == "pane_spam_pdam_unit_galur") { urlPHP = "./dataservice/read_linestring_spam_pdam_unit_galur.php"}
	else if (panePDAM == "pane_spam_pdam_unit_girimulyo") { urlPHP = "./dataservice/read_linestring_spam_pdam_unit_girimulyo.php"}
	else if (panePDAM == "pane_spam_pdam_unit_kalibawang") { urlPHP = "./dataservice/read_linestring_spam_pdam_unit_kalibawang.php"}
	else if (panePDAM == "pane_spam_pdam_unit_lendah") { urlPHP = "./dataservice/read_linestring_spam_pdam_unit_lendah.php"}
	else if (panePDAM == "pane_spam_pdam_unit_sendangsari") { urlPHP = "./dataservice/read_linestring_spam_pdam_unit_sendangsari.php"}
	else if (panePDAM == "pane_spam_pdam_unit_sentolo_i") { urlPHP = "./dataservice/read_linestring_spam_pdam_unit_sentolo_i.php"}
	else if (panePDAM == "pane_spam_pdam_unit_sentolo_ii") { urlPHP = "./dataservice/read_linestring_spam_pdam_unit_sentolo_ii.php"}
	else if (panePDAM == "pane_spam_pdam_unit_sermo") { urlPHP = "./dataservice/read_linestring_spam_pdam_unit_sermo.php"}
	else if (panePDAM == "pane_spam_pdam_unit_temon_i") { urlPHP = "./dataservice/read_linestring_spam_pdam_unit_temon_i.php"}
	else if (panePDAM == "pane_spam_pdam_unit_temon_ii") { urlPHP = "./dataservice/read_linestring_spam_pdam_unit_temon_ii.php"}
	else if (panePDAM == "pane_spam_pdam_unit_wates_i") { urlPHP = "./dataservice/read_linestring_spam_pdam_unit_wates_i.php"}
	else if (panePDAM == "pane_spam_pdam_unit_wates_ii") { urlPHP = "./dataservice/read_linestring_spam_pdam_unit_wates_ii.php"}
	else if (panePDAM == "pane_spam_pdam_unit_wates_iii") { urlPHP = "./dataservice/read_linestring_spam_pdam_unit_wates_iii.php"}
	else { urlPHP = "./dataservice/read_linestring_spam_pdam_unit_wates_iv.php"}

	var promiseLinestring = $.ajax({
		url: urlPHP, //"./dataservice/read_linestring.php",
		method: "GET",
		dataType: "json",
		data: {command:"LINESTRING"},
		username: null,
		password: null
	});
	
	var layerPDAM = L.geoJson(null, {
		pane: panePDAM,
		style: function () {
			return {
				//pane: panePDAM,
				opacity: 1,
				color: 'rgba(0,255,255,1.0)',
				dashArray: '',
				lineCap: 'square',
				lineJoin: 'bevel',
				weight: 1.0,
				fillOpacity: 0,
				interactive: true,
			}
		},
		onEachFeature: function (feature, layer) {
			if (feature.properties) {				
				
				var popupContent =  
				'<form id="regForm" action="">'
				+ '<h4 style="text-align: center;"> Jaringan Pipa PDAM </h4>'	
					+ '<table width="296">'					
						// + '<tr><th width="50%">ID </th><td> <input type="text" width="80" height="5" id="n_gid" value="'+(feature.properties['ID'] !== null ? Autolinker.link(String(feature.properties['ID'])) : '') + '" ></td></tr>' 
						+ '<tr><th width="50%">Sistem </th><td> <input type="text" width="80" height="5" id="n_sistem" value="'+(feature.properties['sistem'] !== null ? Autolinker.link(String(feature.properties['sistem'])) : '') + '" ></td></tr>' 
						+ '<tr><th width="50%">Diameter </th><td> <input type="text" width="80" height="5" id="n_diameter" value="'+(feature.properties['diameter'] !== null ? Autolinker.link(String(feature.properties['diameter'])) : '') + '" ></td></tr>' 
						+ '<tr><th width="50%">Reservoir </th><td> <input type="text" width="80" height="5" id="n_reservoir" value="'+(feature.properties['reservoir'] !== null ? Autolinker.link(String(feature.properties['reservoir'])) : '') + '" ></td></tr>' 
						+ '<tr><th width="50%">Existing </th><td> <input type="text" width="80" height="5" id="n_existing" value="'+(feature.properties['existing'] !== null ? Autolinker.link(String(feature.properties['existing'])) : '') + '" ></td></tr>' 
						+ '<tr><th width="50%">Unit </th><td> <input type="text" width="80" height="5" id="n_unit" value="'+(feature.properties['unit'] !== null ? Autolinker.link(String(feature.properties['unit'])) : '') + '" ></td></tr>' 
						+ '<tr><th width="50%">Jenis </th><td> <input type="text" width="80" height="5" id="n_jenis" value="'+(feature.properties['jenis'] !== null ? Autolinker.link(String(feature.properties['jenis'])) : '') + '" ></td></tr>' 
						+ '<tr><th width="50%">Transdist </th><td> <input type="text" width="80" height="5" id="n_transdist" value="'+(feature.properties['transdist'] !== null ? Autolinker.link(String(feature.properties['transdist'])) : '') + '" ></td></tr>' 
						+ '<tr><th width="50%">Panjang </th><td> <input type="text" width="80" height="5" id="n_panjang" value="'+(feature.properties['panjang'] !== null ? Autolinker.link(String(feature.properties['panjang'])) : '') + '" ></td></tr>' 
						+ '<tr><th width="50%">Keterangan </th><td> <input type="text" width="80" height="5" id="n_keterangan" value="'+(feature.properties['keterangan'] !== null ? Autolinker.link(String(feature.properties['keterangan'])) : '') + '" ></td></tr>' 						
					+ '</table>'				
				+ '</form>'; 

				layer.bindPopup(popupContent, {minWidth : 300});	
				layer.bindTooltip("Jaringan Pipa PDAM Unit " + feature.properties['unit'], {noHide : true});

				layer.on(
					{
						mouseover : highlightFeature,
						mouseout : function (e) {
							layerPDAM.resetStyle(e.target);
						}
						//click : zoomToFeature
					}
				);

			}
		}
	});

	promiseLinestring.then(function (data) {
		layerPDAM.addData(data);
		if (panePDAM == "pane_spam_pdam_unit_bend_panjt_i") { layer_spam_pdam_unit_bend_panjt_i = layerPDAM;} //.addTo(map);}
		if (panePDAM == "pane_spam_pdam_unit_bend_panjt_ii") { layer_spam_pdam_unit_bend_panjt_ii = layerPDAM;} //.addTo(map);}
		if (panePDAM == "pane_spam_pdam_unit_galur") { layer_spam_pdam_unit_galur = layerPDAM;} //.addTo(map);}
		if (panePDAM == "pane_spam_pdam_unit_girimulyo") { layer_spam_pdam_unit_girimulyo = layerPDAM;} //.addTo(map);}
		if (panePDAM == "pane_spam_pdam_unit_kalibawang") { layer_spam_pdam_unit_kalibawang = layerPDAM;} //.addTo(map);}
		if (panePDAM == "pane_spam_pdam_unit_lendah") { layer_spam_pdam_unit_lendah = layerPDAM;} //.addTo(map);}
		if (panePDAM == "pane_spam_pdam_unit_sendangsari") { layer_spam_pdam_unit_sendangsari = layerPDAM;} //.addTo(map);}
		if (panePDAM == "pane_spam_pdam_unit_sentolo_i") { layer_spam_pdam_unit_sentolo_i = layerPDAM;} //.addTo(map);}
		if (panePDAM == "pane_spam_pdam_unit_sentolo_ii") { layer_spam_pdam_unit_sentolo_ii = layerPDAM;} //.addTo(map);}
		if (panePDAM == "pane_spam_pdam_unit_sermo") { layer_spam_pdam_unit_sermo = layerPDAM;} //.addTo(map);}
		if (panePDAM == "pane_spam_pdam_unit_temon_i") { layer_spam_pdam_unit_temon_i = layerPDAM;} //.addTo(map);}
		if (panePDAM == "pane_spam_pdam_unit_temon_ii") { layer_spam_pdam_unit_temon_ii = layerPDAM;} //.addTo(map);}
		if (panePDAM == "pane_spam_pdam_unit_wates_i") { layer_spam_pdam_unit_wates_i = layerPDAM;} //.addTo(map);}
		if (panePDAM == "pane_spam_pdam_unit_wates_ii") { layer_spam_pdam_unit_wates_ii = layerPDAM;} //.addTo(map);}
		if (panePDAM == "pane_spam_pdam_unit_wates_iii") { layer_spam_pdam_unit_wates_iii = layerPDAM;} //.addTo(map);}
		if (panePDAM == "pane_spam_pdam_unit_wates_iv") { layer_spam_pdam_unit_wates_iv = layerPDAM;} //.addTo(map);}
	});
}

function load_GeoJSON_air_baku_jaringan_line(){
	var promiseLinestring = $.ajax({
		url: "./dataservice/read_linestring_air_baku_jaringan.php",
		method: "GET",
		dataType: "json",
		data: {command:"LINESTRING"},
		username: null,
		password: null
	});
	
	layer_air_baku_jaringan_line = L.geoJson(null, {
		pane: 'pane_air_baku_jaringan_line',
		style: style_air_baku_jaringan_line,
		onEachFeature: function (feature, layer) {
			if (feature.properties) {				
				var popupContent =  
				'<form id="regForm" action="">'
				+ '<h4 style="text-align: center;"> Jaringan Air Baku </h4>'	
					+ '<table width="296">'
						+ '<tr><th width="50%">ID </th><td> <input type="text" width="80" height="5" id="n_gid" value="'+ (feature.properties['gid'] !== null ? Autolinker.link(String(feature.properties['gid'])) : '') +'" readonly></td></tr>' 
						+ '<tr><th width="50%">Nama </th><td> <input type="text" width="80" height="5" id="n_nama" nama="'+(feature.properties['nama'] !== null ? Autolinker.link(String(feature.properties['nama'])) : '') + '" ></td></tr>' 
						+ '<tr><th width="50%">Keterangan </th><td> <input type="text" width="80" height="5" id="n_keterangan" value="'+(feature.properties['keterangan'] !== null ? Autolinker.link(String(feature.properties['keterangan'])) : '') + '" ></td></tr>' 
						+ '<tr><th width="50%">Kondisi </th><td> <input type="text" width="80" height="5" id="n_kondisi" value="'+(feature.properties['kondisi'] !== null ? Autolinker.link(String(feature.properties['kondisi'])) : '') + '" ></td></tr>' 				
					+ '</table>'				
				+ '</form>'; 
				layer.bindPopup(popupContent, {minWidth : 300});	
				layer.bindTooltip(feature.properties['nama'], {noHide : true});

				layer.on(
					{
						mouseover : highlightFeature,
						mouseout : resetHighlightJaringanAirBaku
					}
				);
			}
		}
	});

	promiseLinestring.then(function (data) {
		layer_air_baku_jaringan_line.addData(data);
		map.addLayer(layer_air_baku_jaringan_line);
	});
}

function load_GeoJSON_air_baku_sarana_pendukung_point(){
	
	var promisePoint = $.ajax({
		url: "./dataservice/read_point_air_baku_sarana_pendukung.php",
		method: "GET",
		dataType: "json",
		data: {command:"POINT"},
		username: null,
		password: null
	});
	
	layer_air_baku_sarana_pendukung_point = L.geoJson(null, {
		pane: 'pane_air_baku_sarana_pendukung_line',
		pointToLayer: function (feature, latlng) {			
			var context = {
				feature: feature,
				variables: {}
			};
			
			var smallIcon = L.icon({
				iconSize: [27, 27],
				iconAnchor: [13, 27],
				popupAnchor:  [1, -24],
				iconUrl: 'images/icons/pin-cyan.png'								
			});
			
			var myMarker = L.marker(latlng, {icon: smallIcon});
			myMarker.properties = {};
			myMarker.properties.id = (feature.properties['gid'] !== null ? Autolinker.link(String(feature.properties['gid'])) : '');
			
			var popupContent =  
			'<form id="regForm" action="">'
			+ '<h4 style="text-align: center;"> Sarana Pendukung Air Baku </h4>'	
				+ '<table width="296">'
					+ '<tr><th width="50%">ID </th><td> <input type="text" width="80" height="5" id="n_gid" value="'+ (feature.properties['gid'] !== null ? Autolinker.link(String(feature.properties['gid'])) : '') +'" readonly></td></tr>' 
					+ '<tr><th width="50%">Nama </th><td> <input type="text" width="80" height="5" id="n_nama" value="'+(feature.properties['nama'] !== null ? Autolinker.link(String(feature.properties['nama'])) : '') + '" ></td></tr>' 
					+ '<tr><th width="50%">Keterangan </th><td> <input type="text" width="80" height="5" id="n_keterangan" value="'+(feature.properties['keterangan'] !== null ? Autolinker.link(String(feature.properties['keterangan'])) : '') + '" ></td></tr>' 
					+ '<tr><th width="50%">Kondisi </th><td> <input type="text" width="80" height="5" id="n_kondisi" value="'+(feature.properties['kondisi'] !== null ? Autolinker.link(String(feature.properties['kondisi'])) : '') + '" ></td></tr>' 				
				+ '</table>'				
			+ '</form>'; 
					
			myMarker.bindPopup(popupContent,
				{minWidth : 300}

			);		
			return myMarker;
		},	 
		// onEachFeature: function (feature, layer) {
		// 	if (feature.properties) {
		// 		layer.on({
		// 			click: function (e) {
		// 				var htmlformcomponent = "" +
		// 						"<table id='feature_data' class='table table-condensed table-bordered table-striped'>" +
		// 							"<thead>" +
		// 								"<tr>" +
		// 									"<th colspan='2' class='text-center'>Feature Data</th>" +
		// 								"</tr>" +
		// 							"</thead>" +
		// 							"<tbody>" +
		// 								"<tr>" +
		// 									"<td class=''>Notes</td>" +
		// 									"<td class=''><strong>"+feature.properties.notes+"</strong></td>" +
		// 								"</tr>" +
		// 							"</tbody>" +
		// 						"</table>" +
		// 					"";
		// 				$("#app_modal_body").empty();
		// 				$("#app_modal_body").removeClass().addClass('modal-body');
		// 				$("#app_modal_size").removeClass().addClass('modal-dialog');
		// 				$("#app_modal_body").html(htmlformcomponent);
		// 				$("#app_modal_label").html("POINT");
						
		// 				$("#modalbox").modal('show');
		// 			}
		// 		});
		// 	}
		// }
	});
	promisePoint.then(function (data) {
		layer_air_baku_sarana_pendukung_point.addData(data).addTo(layer_air_baku_sarana_pendukung_marker.addTo(map));
		// map.addLayer(layer_air_baku_sarana_pendukung_point);
	});
	
}

function TambahPhoto(strImgManager, strLoadImage, strDirectory, strPhotoDirectory, strSlideshowContainer, strSlides, idxSlides){

	var myInput = document.getElementById(strLoadImage);	
	myInput.value = null;
	myInput.click();
	myInput.addEventListener("change", function(evt) {
		console.log(evt);
		var myImg = document.getElementById(strLoadImage).files;
		var myImgUpdated = [];
		var y = document.getElementsByClassName(strSlides);
		for (var h = 0; h < y.length; h++) {
			if (!myImgUpdated.includes((y[h].children[0].src))) {
				myImgUpdated.push(y[h].children[0].src);
			}
		}

		if(myImg.length > 0 ){
			var notUploaded = 0;
			for (var i = 0; i < myImg.length; i++)
			{			
				if (myImg[i].size > 1048576) 
                {
					console.log("File not loaded: " + myImg[i]);
                    alert("Mohon maaf, '" + myImg[i] + "' gagal diunggah ke dalam database. Ukuran file harus di bawah " + (1048576/1024/1024) + " MB!");                                   
                } else {
					var formData = new FormData();
					formData.append("file", myImg[i]);
					formData.append("dir", JSON.stringify(strDirectory));
					var json_photo = JSON.stringify((document.getElementById(strPhotoDirectory).value));
					formData.append("photodir", json_photo);
					var file_photo = strDirectory + (document.getElementById(strPhotoDirectory).value) + "/" + String(myImg[i].name);
					console.log(file_photo);
					var xhttp = new XMLHttpRequest();
					xhttp.open("POST", "/airbersihku/gis/dataservice/upload_file.php", true);
					xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							var response = this.responseText;
							if(response == 1){
								//console.log("File loaded succesfully: " + file_photo);
								console.log(response);
							}else{
								//console.log("File not loaded: " + file_photo);
								console.log(response);
								notUploaded += 1;
							}
						}
					};
					xhttp.send(formData);
					xhttp.onload = function() {
						if (xhttp.status != 200) { 
							console.log(`Error ${xhttp.status}: ${xhttp.statusText}`); 
						} else { 
							console.log(`Done, got ${xhttp.response.length} bytes`); 							
							for (var ii = 0; ii < myImg.length; ii++)
							{			
								if (myImg[ii].size > 1048576) 
								{
									//alert("Mohon maaf, '" + myImg[i] + "' gagal diunggah ke dalam database. Ukuran file harus di bawah " + (1048576/1024/1024) + " MB!");                                   
								} else {
									var img_slideshow = strDirectory + (document.getElementById(strPhotoDirectory).value) + "/" + String(myImg[ii].name);
									if (!myImgUpdated.includes(img_slideshow)) {
										$( String("." + strSlideshowContainer) ).append( "<div class=\'" + strSlides + "\'><img src='" + img_slideshow + "' style='width:100%'></div>" );								
										myImgUpdated.push(img_slideshow);
										console.log("Load to slideshow: " + file_photo);
										plusSlides(-1, idxSlides);																								
									}										
								}					
							}							
						}
					};					  
					xhttp.onprogress = function(event) {
						if (event.lengthComputable) {
							console.log(`Received ${event.loaded} of ${event.total} bytes`);
						} else {
							console.log(`Received ${event.loaded} bytes`); 
						}
					};					  
					xhttp.onerror = function() {
						console.log("Request failed");
					};
					//$( String("." + strSlideshowContainer) ).append( "<div class=\'" + strSlides + "\'><img src='" + file_photo + "' style='width:100%'></div>" );								
					//plusSlides(-1, idxSlides);	
				}					
			}
			
			var x = document.getElementsByClassName(strSlides);
			for (var j = 0; j < x.length; j++) {
				var imgSource = x[j].children[0].src;				
				var startIndex = (imgSource.indexOf('\\') >= 0 ? imgSource.lastIndexOf('\\') : imgSource.lastIndexOf('/'));
				var filename = imgSource.substring(startIndex);
				if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
					filename = filename.substring(1);
				}							
				if (filename == "no-image-icon.png") {
					$(x[j]).remove();
				}
				var y = document.getElementsByClassName(strSlides);
				if (j == y.length) { break; }
				plusSlides(-1, idxSlides);
			}	

			$( "#" + strLoadImage ).remove();
			$( "#" + strImgManager ).append( "<input id=\'" + strLoadImage + "\' style='visibility:hidden;' type='file' multiple='multiple' accept='.jpg, .jpeg, .png, .gif, .tif, .tiff, .bmp|image/*' >" );
		
		}else{
			alert('Anda belum memilih berkas foto yang akan diunggah..');
		}
  	}, false);
}

function HapusPhoto(strSlideshowContainer, strSlides, idxSlides, strDirectory){
	var x = document.getElementsByClassName(strSlides);
	for (var i = 0; i < x.length; i++) {
		if (x[i].style.display == "block") {
			var imgSource = x[i].children[0].src;
			var startIndex = (imgSource.indexOf('\\') >= 0 ? imgSource.lastIndexOf('\\') : imgSource.lastIndexOf('/'));
			var filename = imgSource.substring(startIndex);
			if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
				filename = filename.substring(1);
			}
			if (filename == "no-image-icon.png") {
				{ break; }
			}
			var pathElements = imgSource.replace(/\/$/, '').split('/');
			var lastFolder = pathElements[pathElements.length - 2];

			var deleteConfirmation = confirm('Apakah Anda yakin akan menghapus foto ini dari database? Data akan terhapus dari database dan tidak dapat dikembalikan!');
			if(deleteConfirmation == true)
			{
				$.ajax({
					url: '/airbersihku/gis/dataservice/delete_file.php',
					type: 'post',
					data: {path: '../' + strDirectory + lastFolder + '/' + filename },
					success: function(response){
					  if(response == 1){
						plusSlides(-1, idxSlides);
						$(x[i]).remove();
						var y = document.getElementsByClassName(strSlides);
						if (y.length == 0) {
							$( String("." + strSlideshowContainer) ).append( "<div class=\'" + strSlides + "\'><img src='data/foto/no-image-icon.png' style='width:100%'></div>" );								
							plusSlides(1, idxSlides);
						}
					  } else {
						alert('Mohon maaf, foto gagal dihapus..');
					  }
					}
				});
			}
			{ break; }
		}  
	}
}

function TambahSumberAirBaku(){
	// var gid = document.getElementById("m_gid").value;
	// var nomor = document.getElementById("m_nomor").value;
	var nama = document.getElementById("m_nama").value;
	var jenis_s = document.getElementById("m_jenis_s").value;
	var latitude = document.getElementById("m_latitude").value;
	var longitude = document.getElementById("m_longitude").value;
	var altitude = document.getElementById("m_altitude").value;
	var dusun = document.getElementById("m_dusun").value;
	var kalurahan = document.getElementById("m_kalurahan").value;
	var kapanewon = document.getElementById("m_kapanewon").value;
	var sistem = document.getElementById("m_sistem").value;
	var kpsts_p = document.getElementById("m_kpsts_p").value;
	var kpsts_t = document.getElementById("m_kpsts_t").value;
	var data_idle = document.getElementById("m_data_idle").value;
	var p_jenis = document.getElementById("m_p_jenis").value;
	var p_panjang = document.getElementById("m_p_panjang").value;
	var p_diameter = document.getElementById("m_p_diameter").value;
	var layanan = document.getElementById("m_layanan").value;
	var sr = document.getElementById("m_sr").value;
	var hu = document.getElementById("m_hu").value;
	var pddk_kk = document.getElementById("m_pddk_kk").value;
	var pddk_jiwa = document.getElementById("m_pddk_jiwa").value;
	var plgn_kk = document.getElementById("m_plgn_kk").value;
	var plgn_jiwa = document.getElementById("m_plgn_jiwa").value;
	var tarif = document.getElementById("m_tarif").value;
	var t_dibangun = document.getElementById("m_t_dibangun").value;
	var t_direnov = document.getElementById("m_t_direnov").value;
	var sbr_dana = document.getElementById("m_sbr_dana").value;
	var t_anggaran = document.getElementById("m_t_anggaran").value;
	var apbn = document.getElementById("m_apbn").value;
	var apbd = document.getElementById("m_apbd").value;
	var pengelola = document.getElementById("m_pengelola").value;
	var cp = document.getElementById("m_cp").value;
	var keterangan = document.getElementById("m_keterangan").value;
	var foto = document.getElementById("m_foto").value;
	var laporan = document.getElementById("m_laporan").value;
	var tanggal_l = document.getElementById("m_tanggal_l").value;
	var pelapor = document.getElementById("m_pelapor").value;
	// var phone = document.getElementById("m_phone").value;
	// var email = document.getElementById("m_email").value;
	var penanganan = document.getElementById("m_penanganan").value;
	var tanggal_p = document.getElementById("m_tanggal_p").value;
	var status_p = document.getElementById("m_status_p").value;
	var operator = document.getElementById("m_operator").value;
	// var acc = document.getElementById("m_acc").value;
	var geometry = 'POINT(' + longitude + ' ' + latitude + ')';
	
	$.ajax({
		url: "/airbersihku/gis/dataservice/create_point_sumber_air_baku.php",
		method: "GET",
		dataType: "json",
		data: {command:"POINT", nama:nama, jenis_s:jenis_s, latitude:latitude, longitude:longitude, altitude:altitude, dusun:dusun, kalurahan:kalurahan, kapanewon:kapanewon, 
		sistem:sistem , kpsts_p:kpsts_p, kpsts_t:kpsts_t, data_idle:data_idle, p_jenis:p_jenis, p_panjang:p_panjang, p_diameter:p_diameter, 
		layanan:layanan, sr:sr, hu:hu, pddk_kk:pddk_kk, pddk_jiwa:pddk_jiwa, plgn_kk:plgn_kk, plgn_jiwa:plgn_jiwa, tarif:tarif, 
		t_dibangun:t_dibangun, t_direnov:t_direnov, sbr_dana:sbr_dana, t_anggaran:t_anggaran, apbn:apbn, apbd:apbd, pengelola:pengelola, cp:cp, 
		keterangan:keterangan, foto:foto,
		laporan:laporan, tanggal_l:tanggal_l, pelapor:pelapor,
		penanganan:penanganan, tanggal_p:tanggal_p, status_p:status_p, operator:operator, 
		geometry:geometry},
				
		success: function (data) {
			if (data.response=="200") {
				console.log(data.response);
				console.log('Data saved.');
				div_formTambahSumberAirBakuHide();
				var reloadConfirmation = confirm('Data berhasil disimpan dalam database. Muat ulang (reload) halaman WebGIS untuk sinkronisasi data dan melihat hasilnya?');
				if (reloadConfirmation == true) {
					window.location.reload(); 
				}				
			} else {
				console.log(data.message);
				console.log('Failed to save.');
				alert('Mohon maaf, data gagal disimpan dalam database.. Error:' + data.message + '.');
			}
		},
		username: null,
		password: null
	});	

}

function UpdateSumberAirBaku(){
	var tgl = new Date();
	var tglStr = (String(tgl.getFullYear()) + "-" + String((tgl.getMonth()+1)) + "-" + (String(tgl.getDate()+1).replace('Z', '').replace('T', '')));
	
	var gid = document.getElementById("n_gid").value;
	// var nomor = document.getElementById("n_nomor").value;
	var nama = document.getElementById("n_nama").value;
	var jenis_s = document.getElementById("n_jenis_s").value;
	var latitude = document.getElementById("n_latitude").value;
	var longitude = document.getElementById("n_longitude").value;
	var altitude = document.getElementById("n_altitude").value;
	var dusun = document.getElementById("n_dusun").value;
	var kalurahan = document.getElementById("n_kalurahan").value;
	var kapanewon = document.getElementById("n_kapanewon").value;
	var sistem = document.getElementById("n_sistem").value;
	var kpsts_p = document.getElementById("n_kpsts_p").value;
	var kpsts_t = document.getElementById("n_kpsts_t").value;
	var data_idle = document.getElementById("n_data_idle").value;
	var p_jenis = document.getElementById("n_p_jenis").value;
	var p_panjang = document.getElementById("n_p_panjang").value;
	var p_diameter = document.getElementById("n_p_diameter").value;
	var layanan = document.getElementById("n_layanan").value;
	var sr = document.getElementById("n_sr").value;
	var hu = document.getElementById("n_hu").value;
	var pddk_kk = document.getElementById("n_pddk_kk").value;
	var pddk_jiwa = document.getElementById("n_pddk_jiwa").value;
	var plgn_kk = document.getElementById("n_plgn_kk").value;
	var plgn_jiwa = document.getElementById("n_plgn_jiwa").value;
	var tarif = document.getElementById("n_tarif").value;
	var t_dibangun = document.getElementById("n_t_dibangun").value;
	var t_direnov = document.getElementById("n_t_direnov").value;
	var sbr_dana = document.getElementById("n_sbr_dana").value;
	var t_anggaran = document.getElementById("n_t_anggaran").value;
	var apbn = document.getElementById("n_apbn").value;
	var apbd = document.getElementById("n_apbd").value;
	var pengelola = document.getElementById("n_pengelola").value;
	var cp = document.getElementById("n_cp").value;
	var keterangan = document.getElementById("n_keterangan").value;
	//var foto = document.getElementById("n_foto").value;
	var laporan = document.getElementById("n_laporan").value;
	var tanggal_l = document.getElementById("n_tanggal_l").value;
	var pelapor = document.getElementById("n_pelapor").value;
	//var phone = document.getElementById("n_phone").value;
	//var email = document.getElementById("n_email").value;
	var penanganan = document.getElementById("n_penanganan").value;
	var tanggal_p = document.getElementById("n_tanggal_p").value;
	var status_p = document.getElementById("n_status_p").value;
	var operator = ux; //document.getElementById("n_operator").value;
	var geometry = 'POINT (' + longitude + ' ' + latitude + ')';

	$.ajax({
		url: "/airbersihku/gis/dataservice/update_point_sumber_air_baku.php",
		method: "GET",
		dataType: "json",
		data: {command:"UPDATE", gid:gid, nama:nama, jenis_s:jenis_s, latitude:latitude, longitude:longitude, altitude:altitude, dusun:dusun, kalurahan:kalurahan, kapanewon:kapanewon, 
		sistem:sistem, kpsts_p:kpsts_p, kpsts_t:kpsts_t, data_idle:data_idle, p_jenis:p_jenis, p_panjang:p_panjang, p_diameter:p_diameter, 
		layanan:layanan, sr:sr, hu:hu, pddk_kk:pddk_kk, pddk_jiwa:pddk_jiwa, plgn_kk:plgn_kk, plgn_jiwa:plgn_jiwa, tarif:tarif, 
		t_dibangun:t_dibangun, t_direnov:t_direnov, sbr_dana:sbr_dana, t_anggaran:t_anggaran, apbn:apbn, apbd:apbd, pengelola:pengelola, cp:cp, 
		keterangan:keterangan, 
		laporan:laporan, tanggal_l:tanggal_l, pelapor:pelapor,
		penanganan:penanganan, tanggal_p:tanggal_p, status_p:status_p, operator:operator,
		geometry:geometry},
		success: function (data) {
			if (data.response=="200") {
				console.log(data.response);
				console.log('Data updated.');
				map.closePopup();
				currentTab = 0;
				var reloadConfirmation = confirm('Pembaruan data berhasil disimpan dalam database. Muat ulang (reload) halaman WebGIS untuk sinkronisasi data dan melihat hasilnya?');
				if (reloadConfirmation == true) {
					window.location.reload(); 
				}
			} else {
				console.log(data.message);
				console.log('Failed to update.');
				alert('Mohon maaf, pembaruan data gagal disimpan dalam database.. Error:' + data.message + '.');
			}
		},
		username: null,
		password: null
	});	
}

function LaporSumberAirBaku(){
	var tgl = new Date();
	var tglStr = (String(tgl.getFullYear()) + "-" + String((tgl.getMonth()+1)) + "-" + (String(tgl.getDate()+1).replace('Z', '').replace('T', '')));
	
	var gid = document.getElementById("n_gid").value;
	var laporan = document.getElementById("n_laporan").value;
	var tanggal_l = tglStr;
	var pelapor = ux;
	var status_p = 'Dilaporkan';
	
	$.ajax({
		url: "/airbersihku/gis/dataservice/lapor_point_sumber_air_baku.php",
		method: "GET",
		dataType: "json",
		data: {command:"UPDATE", gid:gid,  
		laporan:laporan, tanggal_l:tanggal_l, pelapor:pelapor,
		status_p:status_p},
		success: function (data) {
			if (data.response=="200") {
				console.log(data.response);
				console.log('Data updated.');
				map.closePopup();
				currentTab = 0;
				var reloadConfirmation = confirm('Terima kasih atas partisipasi yang diberikan. Laporan pengaduan Anda telah disampaikan kepada Administrator untuk dapat ditindak-lanjuti. ');
				if (reloadConfirmation == true) {
					window.location.reload(); 
				}
			} else {
				console.log(data.message);
				console.log('Failed to update.');
				alert('Mohon maaf, laporan pengaduan gagal dikirim.. Error:' + data.message + '.');
			}
		},
		username: null,
		password: null
	});	
}

function HapusSumberAirBaku(){
	var gid = document.getElementById("n_gid").value;
	var deleteConfirmation = confirm('Apakah Anda yakin akan menghapus data ini? Data akan terhapus dari database dan tidak dapat dikembalikan!');
	if (deleteConfirmation == true) {
		$.ajax({
			url: "/airbersihku/gis/dataservice/delete_point_sumber_air_baku.php",
			method: "GET",
			dataType: "json",
			data: {command:"DELETE",gid:gid},
			success: function (data) {
				if (data.response=="200") {
					console.log(data.response);
					console.log('Data deleted.');
					map.closePopup();
					currentTab = 0;
					var reloadConfirmation = confirm('Data berhasil dihapus dari database. Muat ulang (reload) halaman WebGIS untuk sinkronisasi data dan melihat hasilnya?');
					if (reloadConfirmation == true) {
						window.location.reload(); 
					}
				} else {
					console.log(data.message);
					console.log('Failed to delete.');
					alert('Mohon maaf, data gagal dihapus dari database.. Error:' + data.message + '.');
				}
			},
			username: null,
			password: null
		});	
	}
}

function load_GeoJSON_air_baku_sumber_point(){
	
	var promisePoint = $.ajax({
		url: "./dataservice/read_point_air_baku_sumber.php",
		method: "GET",
		dataType: "json",
		data: {command:"POINT"},
		username: null,
		password: null
	});
	
	layer_air_baku_sumber_point = L.geoJson(null, {
		pane: 'pane_air_baku_sumber_point',
		pointToLayer: function (feature, latlng) {			
			var context = {
				feature: feature,
				variables: {}
			};
			
			var myMarker; 
						
			var myUrl = ""
			if ((feature.properties['jenis_s'] !== null ? Autolinker.link(String(feature.properties['jenis_s'])) : '') == "Mata Air"){
				myUrl= 'images/icons/pin-blue.png'
			}else if((feature.properties['jenis_s'] !== null ? Autolinker.link(String(feature.properties['jenis_s'])) : '') == "Sumur Bor") {
				myUrl= 'images/icons/pin-green.png'
			}else if((feature.properties['jenis_s'] !== null ? Autolinker.link(String(feature.properties['jenis_s'])) : '') == "Sumur Gali") {
				myUrl= 'images/icons/pin-yellow.png'
			}else if((feature.properties['jenis_s'] !== null ? Autolinker.link(String(feature.properties['jenis_s'])) : '') == "Air Permukaan") {
				myUrl= 'images/icons/pin-orange.png'
			}else if((feature.properties['jenis_s'] !== null ? Autolinker.link(String(feature.properties['jenis_s'])) : '') == "Penampungan Air Hujan") {
				myUrl= 'images/icons/pin-red.png'
			}else{
				myUrl= 'images/icons/pin-black.png'
			};

			var smallIcon = L.icon({
				iconSize: [27, 27],
				iconAnchor: [13, 27],
				popupAnchor:  [1, -24],
				iconUrl: myUrl								
			});
			
			var pulsingIcon1 = L.icon.pulse({iconSize:[15,15],fillColor:'red',color:'red'});
			var pulsingIcon2 = L.icon.pulse({iconSize:[15,15],fillColor:'orange',color:'orange'});
			var pulsingIcon3 = L.icon.pulse({iconSize:[15,15],fillColor:'yellow',color:'yellow'});
			// var pulsingIcon4 = L.icon.pulse({iconSize:[15,15],fillColor:'green',color:'green'});
			// var pulsingIcon5 = L.icon.pulse({iconSize:[15,15],fillColor:'white',color:'white'});

			if ((feature.properties['status_p'] !== null ? Autolinker.link(String(feature.properties['status_p'])) : '') == 'Dilaporkan'){
				myMarker = L.marker(latlng, {icon: pulsingIcon1});
			}else if((feature.properties['status_p'] !== null ? Autolinker.link(String(feature.properties['status_p'])) : '') == 'Sedang Ditinjau'){
				myMarker = L.marker(latlng, {icon: pulsingIcon2});
			}else if((feature.properties['status_p'] !== null ? Autolinker.link(String(feature.properties['status_p'])) : '') == 'Proses Penanganan'){
				myMarker = L.marker(latlng, {icon: pulsingIcon3});
			}else if((feature.properties['status_p'] !== null ? Autolinker.link(String(feature.properties['status_p'])) : '') == 'Selesai Penanganan'){
				myMarker = L.marker(latlng, {icon: smallIcon});
			}else{
				myMarker = L.marker(latlng, {icon: smallIcon});
			}

			myMarker.properties = {};
			myMarker.properties.id = (feature.properties['gid'] !== null ? Autolinker.link(String(feature.properties['gid'])) : '');
			myMarker.properties.id = (feature.properties['nama'] !== null ? Autolinker.link(String(feature.properties['nama'])) : '');
							
			const folder = "data/foto/survei/" +(feature.properties['foto'] !== null ? Autolinker.link(String(feature.properties['foto'])) : '') +'/';
			var mySS = '';
			
			$.ajax({
				url : folder,
				success: function (data) {						
					$(data).find("a").attr("href", function (i, val) {
						if( val.match(/\.(jpe?g|png|tif|gif)$/) ) { 								
							var str = folder + val; //(val.replace("/airbersihku/gis/", ""));
							mySS = mySS + '<div class="n_mySlides">'
								+ '<img src="' + str + '" style="width:100%">'
								+ ' </div>';								
						} 
					});
				},
				error: function() { 
					mySS = ''; 
				},
				complete: function () {
					
					if (mySS == '') {mySS = '<div class="n_mySlides"><img src="data/foto/no-image-icon.png" style="width:100%"></div>'}

					var currentTab = 0;
					
					var popupContent =  
						'<form id="regForm" action="" method="post">'
						+ '<h4 style="text-align: center;">'+(feature.properties['nama'] !== null ? Autolinker.link(String(feature.properties['nama'])) : '') +'</h4>'
							+ '<div class="slideshow-container_n" id="slideshow-container_n" >'
								+ mySS
								+ '<a id="prevImg_n" class="prev" onclick="plusSlides(-1, 1)">&#10094;</a>'
								+ '<a id="nextImg_n" class="next" onclick="plusSlides(1, 1)">&#10095;</a>'
							+ '</div>';
						
					if ((rx ==  "Administrator") || (rx ==  "Editor")) {
 
						popupContent +=	'<div style="overflow:auto;">'
								+ '<div id="imgManager_n" style="float:left;">'
									+ '<button type="button" id="addPhotoBtn_n" onclick="TambahPhoto(\'' + strImgManager_n + '\',\'' + strLoadImage_n + '\',\'' + strDirSurvei + '\',\'' + n_foto + '\',\'' + strSlideshowContainer_n + '\',\'' + slideId[1] + '\',\'' + slideIndex[1] + '\')"> + </button> <input id="loadImage_n" style="visibility:hidden;" type="file" multiple="multiple" accept=".jpg, .jpeg, .png, .gif, .tif, .tiff, .bmp" >'
								+ '</div>'
								+ '<div style="float:right;">'
									+ '<button type="button" id="removePhotoBtn_n" onclick="HapusPhoto(\'' + strSlideshowContainer_n + '\',\'' + slideId[1] + '\',\'' + slideIndex[1] + '\',\'' + strDirSurvei + '\')"> - </button>'
								+ '</div>'
							+ '</div>'

						//+ '<br>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">' 
								+ '<tr><th width="50%">Nomor ID</th><td> <input  [type="text"] style="width: 150px;" id="n_gid" value="'+ (feature.properties['gid'] !== null ? Autolinker.link(String(feature.properties['gid'])) : '') +'" readonly></td></tr>' 
								+ '<tr><th width="50%">Nama Sumber Air Baku </th><td> <input  [type="text"] style="width: 150px;" id="n_nama" value="'+(feature.properties['nama'] !== null ? Autolinker.link(String(feature.properties['nama'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Latitude </th><td> <input  [type="text"] style="width: 150px;" id="n_latitude" value="'+(feature.properties['latitude'] !== null ? Autolinker.link(String(feature.properties['latitude'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Longitude </th><td> <input  [type="text"] style="width: 150px;" id="n_longitude" value="'+(feature.properties['longitude'] !== null ? Autolinker.link(String(feature.properties['longitude'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Altitude </th><td> <input  [type="text"] style="width: 150px;" id="n_altitude" value="'+(feature.properties['altitude'] !== null ? Autolinker.link(String(feature.properties['altitude'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Dusun </th><td> <input  [type="text"] style="width: 150px;" id="n_dusun" value="'+(feature.properties['dusun'] !== null ? Autolinker.link(String(feature.properties['dusun'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Kalurahan </th><td> <input  [type="text"] style="width: 150px;" id="n_kalurahan" value="'+(feature.properties['kalurahan'] !== null ? Autolinker.link(String(feature.properties['kalurahan'])) : '') + '" ></td></tr>'
								+ '<tr><th width="50%">Kapanewon </th><td> <select style="width: 150px; height: 21px;" id="n_kapanewon"><option value="'+(feature.properties['kapanewon'] !== null ? Autolinker.link(String(feature.properties['kapanewon'])) : '') + '" selected disabled hidden>'+(feature.properties['kapanewon'] !== null ? Autolinker.link(String(feature.properties['kapanewon'])) : '') + '</option><option value="Samigaluh">Samigaluh</option><option value="Wates">Wates</option><option value="Pengasih">Pengasih</option><option value="Kalibawang">Kalibawang</option><option value="Girimulyo">Girimulyo</option><option value="Panjatan">Panjatan</option><option value="Temon">Temon</option><option value="Nanggulan">Nanggulan</option><option value="Lendah">Lendah</option><option value="Sentolo">Sentolo</option><option value="Galur">Galur</option><option value="Kokap">Kokap</option></select></td></tr>'
							+ '</table>'
						+ '</div>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">'
								+ '<tr><th width="50%">Jenis Sumber Air </th><td> <select style="width: 150px; height: 21px;" id="n_jenis_s"><option value="'+(feature.properties['jenis_s'] !== null ? Autolinker.link(String(feature.properties['jenis_s'])) : '') + '" selected disabled hidden>'+(feature.properties['jenis_s'] !== null ? Autolinker.link(String(feature.properties['jenis_s'])) : '') + '</option><option value="Mata Air">Mata Air</option><option value="Sumur Bor">Sumur Bor</option><option value="Sumur Gali">Sumur Gali</option><option value="Air Permukaan">Air Permukaan</option><option value="Penampungan Air Hujan">Penampungan Air Hujan</option></select></td></tr>'
								+ '<tr><th width="50%">Sistem </th><td> <input  [type="text"] style="width: 150px;" id="n_sistem" value="'+(feature.properties['sistem'] !== null ? Autolinker.link(String(feature.properties['sistem'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Kpsts Produksi (l/det) </th><td> <input  [type="text"] style="width: 150px;" id="n_kpsts_p" value="'+(feature.properties['kpsts_p'] !== null ? Autolinker.link(String(feature.properties['kpsts_p'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Kpsts Terpasang (l/det) </th><td> <input  [type="text"] style="width: 150px;" id="n_kpsts_t" value="'+(feature.properties['kpsts_t'] !== null ? Autolinker.link(String(feature.properties['kpsts_t'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Data Idle </th><td> <input  [type="text"] style="width: 150px;" id="n_data_idle" value="'+(feature.properties['data_idle'] !== null ? Autolinker.link(String(feature.properties['data_idle'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Jenis Pipa </th><td> <input  [type="text"] style="width: 150px;" id="n_p_jenis" value="'+(feature.properties['p_jenis'] !== null ? Autolinker.link(String(feature.properties['p_jenis'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Panjang Pipa </th><td> <input  [type="text"] style="width: 150px;" id="n_p_panjang" value="'+(feature.properties['p_panjang'] !== null ? Autolinker.link(String(feature.properties['p_panjang'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Diameter Pipa </th><td> <input  [type="text"] style="width: 150px;" id="n_p_diameter" value="'+(feature.properties['p_diameter'] !== null ? Autolinker.link(String(feature.properties['p_diameter'])) : '') + '" ></td></tr>' 
							+ '</table>'
						+ '</div>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">'
								+ '<tr><th width="50%">Daerah Layanan </th><td> <input  [type="text"] style="width: 150px;" id="n_layanan" value="'+(feature.properties['layanan'] !== null ? Autolinker.link(String(feature.properties['layanan'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Jumlah Infrastruktur SR </th><td> <input  [type="text"] style="width: 150px;" id="n_sr" value="'+(feature.properties['sr'] !== null ? Autolinker.link(String(feature.properties['sr'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Jumlah Infrastruktur HU </th><td> <input  [type="text"] style="width: 150px;" id="n_hu" value="'+(feature.properties['hu'] !== null ? Autolinker.link(String(feature.properties['hu'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Jumlah Penduduk (KK) </th><td> <input  [type="text"] style="width: 150px;" id="n_pddk_kk" value="'+(feature.properties['pddk_kk'] !== null ? Autolinker.link(String(feature.properties['pddk_kk'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Jumlah Penduduk (Jiwa) </th><td> <input  [type="text"] style="width: 150px;" id="n_pddk_jiwa" value="'+(feature.properties['pddk_jiwa'] !== null ? Autolinker.link(String(feature.properties['pddk_jiwa'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Jumlah Pelanggan (KK) </th><td> <input  [type="text"] style="width: 150px;" id="n_plgn_kk" value="'+(feature.properties['plgn_kk'] !== null ? Autolinker.link(String(feature.properties['plgn_kk'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Jumlah Pelanggan (Jiwa) </th><td> <input  [type="text"] style="width: 150px;" id="n_plgn_jiwa" value="'+(feature.properties['plgn_jiwa'] !== null ? Autolinker.link(String(feature.properties['plgn_jiwa'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Tarif Air (Rp/m3) </th><td> <input  [type="text"] style="width: 150px;" id="n_tarif" value="'+(feature.properties['tarif'] !== null ? Autolinker.link(String(feature.properties['tarif'])) : '') + '" ></td></tr>' 
							+ '</table>'
						+ '</div>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">'
								+ '<tr><th width="50%">Tahun Pembangunan </th><td> <input  [type="text"] style="width: 150px;" id="n_t_dibangun" value="'+(feature.properties['t_dibangun'] !== null ? Autolinker.link(String(feature.properties['t_dibangun'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Tahun Renovasi </th><td> <input  [type="text"] style="width: 150px;" id="n_t_direnov" value="'+(feature.properties['t_direnov'] !== null ? Autolinker.link(String(feature.properties['t_direnov'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Sumber Dana </th><td> <input  [type="text"] style="width: 150px;" id="n_sbr_dana" value="'+(feature.properties['sbr_dana'] !== null ? Autolinker.link(String(feature.properties['sbr_dana'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Tahun Anggaran </th><td> <input  [type="text"] style="width: 150px;" id="n_t_anggaran" value="'+(feature.properties['t_anggaran'] !== null ? Autolinker.link(String(feature.properties['t_anggaran'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Dana APBN </th><td> <select style="width: 150px; height: 21px;" id="n_apbn"><option value="'+(feature.properties['apbn'] !== null ? Autolinker.link(String(feature.properties['apbn'])) : '') + '" selected disabled hidden>'+(feature.properties['apbn'] !== null ? Autolinker.link(String(feature.properties['apbn'])) : '') + '</option><option value="Ya">Ya</option><option value="Tidak">Tidak</option></select></td></tr>'
								+ '<tr><th width="50%">Dana APBD </th><td> <select style="width: 150px; height: 21px;" id="n_apbd"><option value="'+(feature.properties['apbd'] !== null ? Autolinker.link(String(feature.properties['apbd'])) : '') + '" selected disabled hidden>'+(feature.properties['apbd'] !== null ? Autolinker.link(String(feature.properties['apbd'])) : '') + '</option><option value="Ya">Ya</option><option value="Tidak">Tidak</option></select></td></tr>'
								+ '<tr><th width="50%">Ketua Pengelola </th><td> <input  [type="text"] style="width: 150px;" id="n_pengelola" value="'+(feature.properties['pengelola'] !== null ? Autolinker.link(String(feature.properties['pengelola'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Contact Person </th><td> <input  [type="text"] style="width: 150px;" id="n_cp" value="'+(feature.properties['cp'] !== null ? Autolinker.link(String(feature.properties['cp'])) : '') + '" ></td></tr>' 
							+ '</table>'
						+ '</div>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">'
								+ '<tr><th width="50%">Keterangan </th><td> <textarea name="Text1" style="width: 150px;" id="n_keterangan" >'+(feature.properties['keterangan'] !== null ? Autolinker.link(String(feature.properties['keterangan'])) : '') + '</textarea></td></tr>' 
								+ '<tr><th width="50%">Folder Foto </th><td> <input  [type="text"] style="width: 150px;" id="n_foto" value="'+(feature.properties['foto'] !== null ? Autolinker.link(String(feature.properties['foto'])) : '') + '" ></td></tr>' 
							+ '</table>'
						+ '</div>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">'
								+ '<tr><th width="50%">Laporan </th><td> <textarea name="Text1" style="width: 150px;" id="n_laporan" >'+(feature.properties['laporan'] !== null ? Autolinker.link(String(feature.properties['laporan'])) : '') + '</textarea></td></tr>' 
								+ '<tr><th width="50%">Tanggal Laporan </th><td> <input type="date" placeholder="dd-mm-yyyy" style="width: 150px;" id="n_tanggal_l" value="'+(feature.properties['tanggal_l'] !== null ? Autolinker.link(String(feature.properties['tanggal_l'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Pelapor </th><td> <input  [type="text"] style="width: 150px;" id="n_pelapor" value="'+(feature.properties['pelapor'] !== null ? Autolinker.link(String(feature.properties['pelapor'])) : '') + '" ></td></tr>' 
							+ '</table>'
						+ '</div>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">'
								+ '<tr><th width="50%">Penanganan </th><td> <textarea name="Text2" style="width: 150px;" id="n_penanganan" >'+(feature.properties['penanganan'] !== null ? Autolinker.link(String(feature.properties['penanganan'])) : '') + '</textarea></td></tr>' 
								+ '<tr><th width="50%">Tanggal Penanganan </th><td> <input type="date" placeholder="yyyy-mm-dd" style="width: 150px;" id="n_tanggal_p" value="'+(feature.properties['tanggal_p'] !== null ? Autolinker.link(String(feature.properties['tanggal_p'])) : '') + '" ></td></tr>' 
								+ '<tr><th width="50%">Status </th><td> <select style="width: 150px; height: 21px;" id="n_status_p"><option value="'+(feature.properties['status_p'] !== null ? Autolinker.link(String(feature.properties['status_p'])) : '') + '" selected disabled hidden>'+(feature.properties['status_p'] !== null ? Autolinker.link(String(feature.properties['status_p'])) : '') + '</option><option value="Dilaporkan">Dilaporkan</option><option value="Sedang Ditinjau">Sedang Ditinjau</option><option value="Proses Penanganan">Proses Penanganan</option><option value="Selesai Penanganan">Selesai Penanganan</option></select></td></tr>' 
								+ '<tr><th width="50%">Operator </th><td> <input  [type="text"] style="width: 150px;" id="n_operator" value="'+(feature.properties['operator'] !== null ? Autolinker.link(String(feature.properties['operator'])) : '') + '" ></td></tr>' 
							+ '</table>'
						+ '</div>'	
						+ '<div style="text-align:center;margin-top:5px;">'
						+ '<button type="button" id="n_prevBtn" onclick="nextPrev(-1, 7, \'' + tab_n + '\',\'' + step_n + '\',\'' + n_prevBtn + '\',\'' + n_nextBtn + '\')"> ‹ </button>'
							+ '<span class="step n"></span>'
							+ '<span class="step n"></span>'
							+ '<span class="step n"></span>'
							+ '<span class="step n"></span>'
							+ '<span class="step n"></span>'
							+ '<span class="step n"></span>'
							+ '<span class="step n"></span>'
						+ '<button type="button" id="n_nextBtn" onclick="nextPrev(1, 7, \'' + tab_n + '\',\'' + step_n + '\',\'' + n_prevBtn + '\',\'' + n_nextBtn + '\')"> › </button>'
						+ '</div>'
						+ '<br>'

						+ '<div style="overflow:auto;">'
							+ '<div style="float:left;">'
								+ '<button type="button" id="saveBtn" onclick="UpdateSumberAirBaku()"> Simpan </button>'
							+ '</div>'
							+ '<div style="float:right;">'
								+ '<button type="button" id="removeBtn" onclick="HapusSumberAirBaku()"> Hapus </button>'
							+ '</div>'								
						+ '</div>'

						+ '</form>'; 


					} else if (rx ==  "Viewer") {
					
			
						popupContent +=	'<br>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">'  
								+ '<tr><th width="50%">Nomor ID</th><td> <input  [type="text"] style="width: 150px;" id="n_gid" value="'+ (feature.properties['gid'] !== null ? Autolinker.link(String(feature.properties['gid'])) : '') +'" readonly></td></tr>' 
								+ '<tr><th width="50%">Nama Sumber Air Baku </th><td> <input  [type="text"] style="width: 150px;" id="n_nama" value="'+(feature.properties['nama'] !== null ? Autolinker.link(String(feature.properties['nama'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Latitude </th><td> <input  [type="text"] style="width: 150px;" id="n_latitude" value="'+(feature.properties['latitude'] !== null ? Autolinker.link(String(feature.properties['latitude'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Longitude </th><td> <input  [type="text"] style="width: 150px;" id="n_longitude" value="'+(feature.properties['longitude'] !== null ? Autolinker.link(String(feature.properties['longitude'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Altitude </th><td> <input  [type="text"] style="width: 150px;" id="n_altitude" value="'+(feature.properties['altitude'] !== null ? Autolinker.link(String(feature.properties['altitude'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Dusun </th><td> <input  [type="text"] style="width: 150px;" id="n_dusun" value="'+(feature.properties['dusun'] !== null ? Autolinker.link(String(feature.properties['dusun'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Kalurahan </th><td> <input  [type="text"] style="width: 150px;" id="n_kalurahan" value="'+(feature.properties['kalurahan'] !== null ? Autolinker.link(String(feature.properties['kalurahan'])) : '') + '" readonly></td></tr>'
								+ '<tr><th width="50%">Kapanewon </th><td> <input  [type="text"] style="width: 150px;" id="n_kapanewon" value="'+(feature.properties['kapanewon'] !== null ? Autolinker.link(String(feature.properties['kapanewon'])) : '') + '" readonly></td></tr>'
							+ '</table>'
						+ '</div>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">'
								+ '<tr><th width="50%">Jenis Sumber Air </th><td> <input  [type="text"] style="width: 150px;" id="n_jenis_s" value="'+(feature.properties['jenis_s'] !== null ? Autolinker.link(String(feature.properties['jenis_s'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Sistem </th><td> <input  [type="text"] style="width: 150px;" id="n_sistem" value="'+(feature.properties['sistem'] !== null ? Autolinker.link(String(feature.properties['sistem'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Kpsts Produksi (l/det) </th><td> <input  [type="text"] style="width: 150px;" id="n_kpsts_p" value="'+(feature.properties['kpsts_p'] !== null ? Autolinker.link(String(feature.properties['kpsts_p'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Kpsts Terpasang (l/det) </th><td> <input  [type="text"] style="width: 150px;" id="n_kpsts_t" value="'+(feature.properties['kpsts_t'] !== null ? Autolinker.link(String(feature.properties['kpsts_t'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Data Idle </th><td> <input  [type="text"] style="width: 150px;" id="n_data_idle" value="'+(feature.properties['data_idle'] !== null ? Autolinker.link(String(feature.properties['data_idle'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Jenis Pipa </th><td> <input  [type="text"] style="width: 150px;" id="n_p_jenis" value="'+(feature.properties['p_jenis'] !== null ? Autolinker.link(String(feature.properties['p_jenis'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Panjang Pipa </th><td> <input  [type="text"] style="width: 150px;" id="n_p_panjang" value="'+(feature.properties['p_panjang'] !== null ? Autolinker.link(String(feature.properties['p_panjang'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Diameter Pipa </th><td> <input  [type="text"] style="width: 150px;" id="n_p_diameter" value="'+(feature.properties['p_diameter'] !== null ? Autolinker.link(String(feature.properties['p_diameter'])) : '') + '" readonly></td></tr>' 
							+ '</table>'
						+ '</div>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">'
								+ '<tr><th width="50%">Daerah Layanan </th><td> <input  [type="text"] style="width: 150px;" id="n_layanan" value="'+(feature.properties['layanan'] !== null ? Autolinker.link(String(feature.properties['layanan'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Jumlah Infrastruktur SR </th><td> <input  [type="text"] style="width: 150px;" id="n_sr" value="'+(feature.properties['sr'] !== null ? Autolinker.link(String(feature.properties['sr'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Jumlah Infrastruktur HU </th><td> <input  [type="text"] style="width: 150px;" id="n_hu" value="'+(feature.properties['hu'] !== null ? Autolinker.link(String(feature.properties['hu'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Jumlah Penduduk (KK) </th><td> <input  [type="text"] style="width: 150px;" id="n_pddk_kk" value="'+(feature.properties['pddk_kk'] !== null ? Autolinker.link(String(feature.properties['pddk_kk'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Jumlah Penduduk (Jiwa) </th><td> <input  [type="text"] style="width: 150px;" id="n_pddk_jiwa" value="'+(feature.properties['pddk_jiwa'] !== null ? Autolinker.link(String(feature.properties['pddk_jiwa'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Jumlah Pelanggan (KK) </th><td> <input  [type="text"] style="width: 150px;" id="n_plgn_kk" value="'+(feature.properties['plgn_kk'] !== null ? Autolinker.link(String(feature.properties['plgn_kk'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Jumlah Pelanggan (Jiwa) </th><td> <input  [type="text"] style="width: 150px;" id="n_plgn_jiwa" value="'+(feature.properties['plgn_jiwa'] !== null ? Autolinker.link(String(feature.properties['plgn_jiwa'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Tarif Air (Rp/m3) </th><td> <input  [type="text"] style="width: 150px;" id="n_tarif" value="'+(feature.properties['tarif'] !== null ? Autolinker.link(String(feature.properties['tarif'])) : '') + '" readonly></td></tr>' 
							+ '</table>'
						+ '</div>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">'
								+ '<tr><th width="50%">Tahun Pembangunan </th><td> <input  [type="text"] style="width: 150px;" id="n_t_dibangun" value="'+(feature.properties['t_dibangun'] !== null ? Autolinker.link(String(feature.properties['t_dibangun'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Tahun Renovasi </th><td> <input  [type="text"] style="width: 150px;" id="n_t_direnov" value="'+(feature.properties['t_direnov'] !== null ? Autolinker.link(String(feature.properties['t_direnov'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Sumber Dana </th><td> <input  [type="text"] style="width: 150px;" id="n_sbr_dana" value="'+(feature.properties['sbr_dana'] !== null ? Autolinker.link(String(feature.properties['sbr_dana'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Tahun Anggaran </th><td> <input  [type="text"] style="width: 150px;" id="n_t_anggaran" value="'+(feature.properties['t_anggaran'] !== null ? Autolinker.link(String(feature.properties['t_anggaran'])) : '') + '" readonly></td></tr>'
								+ '<tr><th width="50%">Dana APBN </th><td> <input  [type="text"] style="width: 150px;" id="n_apbn" value="'+(feature.properties['apbn'] !== null ? Autolinker.link(String(feature.properties['apbn'])) : '') + '" readonly></td></tr>'
								+ '<tr><th width="50%">Dana APBD </th><td> <input  [type="text"] style="width: 150px;" id="n_apbd" value="'+(feature.properties['apbd'] !== null ? Autolinker.link(String(feature.properties['apbd'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Ketua Pengelola </th><td> <input  [type="text"] style="width: 150px;" id="n_pengelola" value="'+(feature.properties['pengelola'] !== null ? Autolinker.link(String(feature.properties['pengelola'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Contact Person </th><td> <input  [type="text"] style="width: 150px;" id="n_cp" value="'+(feature.properties['cp'] !== null ? Autolinker.link(String(feature.properties['cp'])) : '') + '" readonly></td></tr>' 
							+ '</table>'
						+ '</div>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">'
								+ '<tr><th width="50%">Keterangan </th><td> <textarea name="Text1" style="width: 150px;" id="n_keterangan" readonly>'+(feature.properties['keterangan'] !== null ? Autolinker.link(String(feature.properties['keterangan'])) : '') + '</textarea></td></tr>' 
								+ '<tr><th width="50%">Folder Foto </th><td> <input  [type="text"] style="width: 150px;" id="n_foto" value="'+(feature.properties['foto'] !== null ? Autolinker.link(String(feature.properties['foto'])) : '') + '" readonly></td></tr>' 
							+ '</table>'
						+ '</div>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">'
								+ '<tr><th width="50%">Laporan </th><td> <textarea name="Text1" style="width: 150px;" id="n_laporan">'+(feature.properties['laporan'] !== null ? Autolinker.link(String(feature.properties['laporan'])) : '') + '</textarea></td></tr>' 
								+ '<tr><th width="50%">Tanggal Laporan </th><td> <input  [type="text"] style="width: 150px;" id="n_tanggal_l" value="'+(feature.properties['tanggal_l'] !== null ? Autolinker.link(String(feature.properties['tanggal_l'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Pelapor </th><td> <input  [type="text"] style="width: 150px;" id="n_pelapor" value="'+(feature.properties['pelapor'] !== null ? Autolinker.link(String(feature.properties['pelapor'])) : '') + '" readonly></td></tr>' 
							+ '</table>'
							
							+ '<div style="overflow:auto;">'
								+ '<div style="float:right;">'
									+ '<button type="button" id="pengaduanBtn" onclick="LaporSumberAirBaku()">Laporkan Pengaduan</button>'
								+ '</div>'								
							+ '</div>'

						+ '</div>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">'
								+ '<tr><th width="50%">Penanganan </th><td> <textarea name="Text2" style="width: 150px;" id="n_penanganan" readonly>'+(feature.properties['penanganan'] !== null ? Autolinker.link(String(feature.properties['penanganan'])) : '') + '</textarea></td></tr>' 
								+ '<tr><th width="50%">Tanggal Penanganan </th><td> <input  [type="text"] style="width: 150px;" id="n_tanggal_p" value="'+(feature.properties['tanggal_p'] !== null ? Autolinker.link(String(feature.properties['tanggal_p'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Status </th><td> <input  [type="text"] style="width: 150px;" id="n_status_p" value="'+(feature.properties['status_p'] !== null ? Autolinker.link(String(feature.properties['status_p'])) : '') + '" readonly></td></tr>'
								+ '<tr><th width="50%">Operator </th><td> <input  [type="text"] style="width: 150px;" id="n_operator" value="'+(feature.properties['operator'] !== null ? Autolinker.link(String(feature.properties['operator'])) : '') + '" readonly></td></tr>' 
							+ '</table>'
						+ '</div>'
						+ '<div style="text-align:center;margin-top:5px;">'
						+ '<button type="button" id="n_prevBtn" onclick="nextPrev(-1, 7, \'' + tab_n + '\',\'' + step_n + '\',\'' + n_prevBtn + '\',\'' + n_nextBtn + '\')"> ‹ </button>'
							+ '<span class="step n"></span>'
							+ '<span class="step n"></span>'
							+ '<span class="step n"></span>'
							+ '<span class="step n"></span>'
							+ '<span class="step n"></span>'
							+ '<span class="step n"></span>'
							+ '<span class="step n"></span>'
						+ '<button type="button" id="n_nextBtn" onclick="nextPrev(1, 7, \'' + tab_n + '\',\'' + step_n + '\',\'' + n_prevBtn + '\',\'' + n_nextBtn + '\')"> › </button>'
						+ '</div>'
						+ '<br>'

						+ '</form>'; 


					} else {

						
						popupContent +=	'<br>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">' 
								+ '<tr><th width="50%">Nomor ID</th><td> <input  [type="text"] style="width: 150px;" id="n_gid" value="'+ (feature.properties['gid'] !== null ? Autolinker.link(String(feature.properties['gid'])) : '') +'" readonly></td></tr>' 
								+ '<tr><th width="50%">Nama Sumber Air Baku </th><td> <input  [type="text"] style="width: 150px;" id="n_nama" value="'+(feature.properties['nama'] !== null ? Autolinker.link(String(feature.properties['nama'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Latitude </th><td> <input  [type="text"] style="width: 150px;" id="n_latitude" value="'+(feature.properties['latitude'] !== null ? Autolinker.link(String(feature.properties['latitude'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Longitude </th><td> <input  [type="text"] style="width: 150px;" id="n_longitude" value="'+(feature.properties['longitude'] !== null ? Autolinker.link(String(feature.properties['longitude'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Altitude </th><td> <input  [type="text"] style="width: 150px;" id="n_altitude" value="'+(feature.properties['altitude'] !== null ? Autolinker.link(String(feature.properties['altitude'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Dusun </th><td> <input  [type="text"] style="width: 150px;" id="n_dusun" value="'+(feature.properties['dusun'] !== null ? Autolinker.link(String(feature.properties['dusun'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Kalurahan </th><td> <input  [type="text"] style="width: 150px;" id="n_kalurahan" value="'+(feature.properties['kalurahan'] !== null ? Autolinker.link(String(feature.properties['kalurahan'])) : '') + '" readonly></td></tr>'
								+ '<tr><th width="50%">Kapanewon </th><td> <input  [type="text"] style="width: 150px;" id="n_kapanewon" value="'+(feature.properties['kapanewon'] !== null ? Autolinker.link(String(feature.properties['kapanewon'])) : '') + '" readonly></td></tr>'
							+ '</table>'
						+ '</div>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">'
								+ '<tr><th width="50%">Jenis Sumber Air </th><td> <input  [type="text"] style="width: 150px;" id="n_jenis_s" value="'+(feature.properties['jenis_s'] !== null ? Autolinker.link(String(feature.properties['jenis_s'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Sistem </th><td> <input  [type="text"] style="width: 150px;" id="n_sistem" value="'+(feature.properties['sistem'] !== null ? Autolinker.link(String(feature.properties['sistem'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Kpsts Produksi (l/det) </th><td> <input  [type="text"] style="width: 150px;" id="n_kpsts_p" value="'+(feature.properties['kpsts_p'] !== null ? Autolinker.link(String(feature.properties['kpsts_p'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Kpsts Terpasang (l/det) </th><td> <input  [type="text"] style="width: 150px;" id="n_kpsts_t" value="'+(feature.properties['kpsts_t'] !== null ? Autolinker.link(String(feature.properties['kpsts_t'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Data Idle </th><td> <input  [type="text"] style="width: 150px;" id="n_data_idle" value="'+(feature.properties['data_idle'] !== null ? Autolinker.link(String(feature.properties['data_idle'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Jenis Pipa </th><td> <input  [type="text"] style="width: 150px;" id="n_p_jenis" value="'+(feature.properties['p_jenis'] !== null ? Autolinker.link(String(feature.properties['p_jenis'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Panjang Pipa </th><td> <input  [type="text"] style="width: 150px;" id="n_p_panjang" value="'+(feature.properties['p_panjang'] !== null ? Autolinker.link(String(feature.properties['p_panjang'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Diameter Pipa </th><td> <input  [type="text"] style="width: 150px;" id="n_p_diameter" value="'+(feature.properties['p_diameter'] !== null ? Autolinker.link(String(feature.properties['p_diameter'])) : '') + '" readonly></td></tr>' 
							+ '</table>'
						+ '</div>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">'
								+ '<tr><th width="50%">Daerah Layanan </th><td> <input  [type="text"] style="width: 150px;" id="n_layanan" value="'+(feature.properties['layanan'] !== null ? Autolinker.link(String(feature.properties['layanan'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Jumlah Infrastruktur SR </th><td> <input  [type="text"] style="width: 150px;" id="n_sr" value="'+(feature.properties['sr'] !== null ? Autolinker.link(String(feature.properties['sr'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Jumlah Infrastruktur HU </th><td> <input  [type="text"] style="width: 150px;" id="n_hu" value="'+(feature.properties['hu'] !== null ? Autolinker.link(String(feature.properties['hu'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Jumlah Penduduk (KK) </th><td> <input  [type="text"] style="width: 150px;" id="n_pddk_kk" value="'+(feature.properties['pddk_kk'] !== null ? Autolinker.link(String(feature.properties['pddk_kk'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Jumlah Penduduk (Jiwa) </th><td> <input  [type="text"] style="width: 150px;" id="n_pddk_jiwa" value="'+(feature.properties['pddk_jiwa'] !== null ? Autolinker.link(String(feature.properties['pddk_jiwa'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Jumlah Pelanggan (KK) </th><td> <input  [type="text"] style="width: 150px;" id="n_plgn_kk" value="'+(feature.properties['plgn_kk'] !== null ? Autolinker.link(String(feature.properties['plgn_kk'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Jumlah Pelanggan (Jiwa) </th><td> <input  [type="text"] style="width: 150px;" id="n_plgn_jiwa" value="'+(feature.properties['plgn_jiwa'] !== null ? Autolinker.link(String(feature.properties['plgn_jiwa'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Tarif Air (Rp/m3) </th><td> <input  [type="text"] style="width: 150px;" id="n_tarif" value="'+(feature.properties['tarif'] !== null ? Autolinker.link(String(feature.properties['tarif'])) : '') + '" readonly></td></tr>' 
							+ '</table>'
						+ '</div>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">'
								+ '<tr><th width="50%">Tahun Pembangunan </th><td> <input  [type="text"] style="width: 150px;" id="n_t_dibangun" value="'+(feature.properties['t_dibangun'] !== null ? Autolinker.link(String(feature.properties['t_dibangun'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Tahun Renovasi </th><td> <input  [type="text"] style="width: 150px;" id="n_t_direnov" value="'+(feature.properties['t_direnov'] !== null ? Autolinker.link(String(feature.properties['t_direnov'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Sumber Dana </th><td> <input  [type="text"] style="width: 150px;" id="n_sbr_dana" value="'+(feature.properties['sbr_dana'] !== null ? Autolinker.link(String(feature.properties['sbr_dana'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Tahun Anggaran </th><td> <input  [type="text"] style="width: 150px;" id="n_t_anggaran" value="'+(feature.properties['t_anggaran'] !== null ? Autolinker.link(String(feature.properties['t_anggaran'])) : '') + '" readonly></td></tr>'
								+ '<tr><th width="50%">Dana APBN </th><td> <input  [type="text"] style="width: 150px;" id="n_apbn" value="'+(feature.properties['apbn'] !== null ? Autolinker.link(String(feature.properties['apbn'])) : '') + '" readonly></td></tr>'
								+ '<tr><th width="50%">Dana APBD </th><td> <input  [type="text"] style="width: 150px;" id="n_apbd" value="'+(feature.properties['apbd'] !== null ? Autolinker.link(String(feature.properties['apbd'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Ketua Pengelola </th><td> <input  [type="text"] style="width: 150px;" id="n_pengelola" value="'+(feature.properties['pengelola'] !== null ? Autolinker.link(String(feature.properties['pengelola'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Contact Person </th><td> <input  [type="text"] style="width: 150px;" id="n_cp" value="'+(feature.properties['cp'] !== null ? Autolinker.link(String(feature.properties['cp'])) : '') + '" readonly></td></tr>' 
							+ '</table>'
						+ '</div>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">'
								+ '<tr><th width="50%">Keterangan </th><td> <textarea name="Text1" style="width: 150px;" id="n_keterangan" readonly>'+(feature.properties['keterangan'] !== null ? Autolinker.link(String(feature.properties['keterangan'])) : '') + '</textarea></td></tr>' 
								+ '<tr><th width="50%">Folder Foto </th><td> <input  [type="text"] style="width: 150px;" id="n_foto" value="'+(feature.properties['foto'] !== null ? Autolinker.link(String(feature.properties['foto'])) : '') + '" readonly></td></tr>' 
							+ '</table>'
						+ '</div>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">'
								+ '<tr><th width="50%">Laporan </th><td> <textarea name="Text1" style="width: 150px;" id="n_laporan" readonly>'+(feature.properties['laporan'] !== null ? Autolinker.link(String(feature.properties['laporan'])) : '') + '</textarea></td></tr>' 
								+ '<tr><th width="50%">Tanggal Laporan </th><td> <input  [type="text"] style="width: 150px;" id="n_tanggal_l" value="'+(feature.properties['tanggal_l'] !== null ? Autolinker.link(String(feature.properties['tanggal_l'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Pelapor </th><td> <input  [type="text"] style="width: 150px;" id="n_pelapor" value="'+(feature.properties['pelapor'] !== null ? Autolinker.link(String(feature.properties['pelapor'])) : '') + '" readonly></td></tr>' 
							+ '</table>'
						+ '</div>'
						+ '<div class="tab n">'
							+ '<table border="0" width="296">'
								+ '<tr><th width="50%">Penanganan </th><td> <textarea name="Text2" style="width: 150px;" id="n_penanganan" readonly>'+(feature.properties['penanganan'] !== null ? Autolinker.link(String(feature.properties['penanganan'])) : '') + '</textarea></td></tr>' 
								+ '<tr><th width="50%">Tanggal Penanganan </th><td> <input  [type="text"] style="width: 150px;" id="n_tanggal_p" value="'+(feature.properties['tanggal_p'] !== null ? Autolinker.link(String(feature.properties['tanggal_p'])) : '') + '" readonly></td></tr>' 
								+ '<tr><th width="50%">Status </th><td> <input  [type="text"] style="width: 150px;" id="n_status_p" value="'+(feature.properties['status_p'] !== null ? Autolinker.link(String(feature.properties['status_p'])) : '') + '" readonly></td></tr>'
								+ '<tr><th width="50%">Operator </th><td> <input  [type="text"] style="width: 150px;" id="n_operator" value="'+(feature.properties['operator'] !== null ? Autolinker.link(String(feature.properties['operator'])) : '') + '" readonly></td></tr>' 
							+ '</table>'
						+ '</div>'
						+ '<div style="text-align:center;margin-top:5px;">'
							+ '<button type="button" id="n_prevBtn" onclick="nextPrev(-1, 7, \'' + tab_n + '\',\'' + step_n + '\',\'' + n_prevBtn + '\',\'' + n_nextBtn + '\')"> ‹ </button>'
								+ '<span class="step n"></span>'
								+ '<span class="step n"></span>'
								+ '<span class="step n"></span>'
								+ '<span class="step n"></span>'
								+ '<span class="step n"></span>'
								+ '<span class="step n"></span>'
								+ '<span class="step n"></span>'
							+ '<button type="button" id="n_nextBtn" onclick="nextPrev(1, 7, \'' + tab_n + '\',\'' + step_n + '\',\'' + n_prevBtn + '\',\'' + n_nextBtn + '\')"> › </button>'
							+ '</div>'
							+ '<br>'

							+ '</form>'; 

					} 
							
					myMarker.bindPopup(popupContent,
						{minWidth : 300}
					);

				}
			});
							
			var optionElement = document.createElement("option");
			optionElement.innerHTML = (feature.properties['nama'] !== null ? Autolinker.link(String(feature.properties['nama'])) : ''); // myMarker.properties.nama;
			L.DomUtil.get("air_baku_select").appendChild(optionElement);							
						
			return myMarker;
		},		 
		// onEachFeature: function (feature, layer) {
		// 	if (feature.properties) {
		// 		layer.on({
		// 			click: function (e) {
		// 				var htmlformcomponent = "" +
		// 						"<table id='feature_data' class='table table-condensed table-bordered table-striped'>" +
		// 							"<thead>" +
		// 								"<tr>" +
		// 									"<th colspan='2' class='text-center'>Feature Data</th>" +
		// 								"</tr>" +
		// 							"</thead>" +
		// 							"<tbody>" +
		// 								"<tr>" +
		// 									"<td class=''>Notes</td>" +
		// 									"<td class=''><strong>"+feature.properties.notes+"</strong></td>" +
		// 								"</tr>" +
		// 							"</tbody>" +
		// 						"</table>" +
		// 					"";
		// 				$("#app_modal_body").empty();
		// 				$("#app_modal_body").removeClass().addClass('modal-body');
		// 				$("#app_modal_size").removeClass().addClass('modal-dialog');
		// 				$("#app_modal_body").html(htmlformcomponent);
		// 				$("#app_modal_label").html("POINT");
						
		// 				$("#modalbox").modal('show');
		// 			}
		// 		});
		// 	}
		// }
	});
	promisePoint.then(function (data) {
		layer_air_baku_sumber_point.addData(data).addTo(layer_air_baku_sumber_marker.addTo(map));
		// map.addLayer(layer_air_baku_sumber_point);
	});
	
}

function setInputFilter(textbox, inputFilter) {
	["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
	  textbox.addEventListener(event, function() {
		if (inputFilter(this.value)) {
		  this.oldValue = this.value;
		  this.oldSelectionStart = this.selectionStart;
		  this.oldSelectionEnd = this.selectionEnd;
		} else if (this.hasOwnProperty("oldValue")) {
		  this.value = this.oldValue;
		  this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
		} else {
		  this.value = "";
		}
	  });
	});
}

setInputFilter(document.getElementById("m_latitude"), function(value) {
	return /^-?\d*[.]?\d*$/.test(value); });

setInputFilter(document.getElementById("m_longitude"), function(value) {
	return /^-?\d*[.]?\d*$/.test(value); });

setInputFilter(document.getElementById("m_altitude"), function(value) {
	return /^-?\d*[.]?\d*$/.test(value); });

setInputFilter(document.getElementById("m_sr"), function(value) {
	return /^-?\d*[.]?\d*$/.test(value); });
	
setInputFilter(document.getElementById("m_hu"), function(value) {
	return /^-?\d*[.]?\d*$/.test(value); });
	
setInputFilter(document.getElementById("m_pddk_kk"), function(value) {
	return /^-?\d*[.]?\d*$/.test(value); });

setInputFilter(document.getElementById("m_pddk_jiwa"), function(value) {
	return /^-?\d*[.]?\d*$/.test(value); });
		
setInputFilter(document.getElementById("m_plgn_kk"), function(value) {
	return /^-?\d*[.]?\d*$/.test(value); });
		
setInputFilter(document.getElementById("m_plgn_jiwa"), function(value) {
	return /^-?\d*[.]?\d*$/.test(value); });

setInputFilter(document.getElementById("m_t_dibangun"), function(value) {
	return /^-?\d*[.]?\d*$/.test(value); });
			
setInputFilter(document.getElementById("m_t_direnov"), function(value) {
	return /^-?\d*[.]?\d*$/.test(value); });
			
setInputFilter(document.getElementById("m_t_anggaran"), function(value) {
	return /^-?\d*[.]?\d*$/.test(value); });
		
map.on('popupopen', function(e){
	//document.getElementById("formTambahSumberAirBaku").style.display = "none";
	//document.getElementById("formPengaduan").style.display = "none";
	div_formTambahSumberAirBakuHide();
	// div_formPengaduanHide();
	currentTab = 0;
	map.invalidateSize();
	map._onResize();
	plusSlides(-1, 1);
	//plusSlides(-1, 2);
	plusSlides(-1, 3);
});

map.on('popupclose', function(e){
	map.closePopup();
	currentTab = 0;
	map.closePopup();
	div_formTambahSumberAirBakuHide();
	// div_formPengaduanHide();
	//plusSlides(1, 1);
});

// map.on('click', function(e){
// 	//e.preventDefault();
//     $("#sidebar-wrapper").toggleClass("active");
// });


//===============================================
// ADD LAYERS
//===============================================
map.addLayer(basemapLayers.layer_OSM);
L.control.layers(basemapLayers).addTo(map);
var lc = document.getElementsByClassName('leaflet-control-layers');
lc[0].style.visibility = 'hidden';

load_GeoJSON_admin_kabupaten_poly();
load_GeoJSON_admin_kecamatan_poly();
load_GeoJSON_admin_desa_poly();
load_GeoJSON_admin_line();
load_GeoJSON_jalan_line();
load_GeoJSON_sungai_line();
load_GeoJSON_spam_pdam_line("pane_spam_pdam_unit_wates_iv")
load_GeoJSON_spam_pdam_line("pane_spam_pdam_unit_wates_iii")
load_GeoJSON_spam_pdam_line("pane_spam_pdam_unit_wates_ii")
load_GeoJSON_spam_pdam_line("pane_spam_pdam_unit_wates_i")
load_GeoJSON_spam_pdam_line("pane_spam_pdam_unit_temon_ii")
load_GeoJSON_spam_pdam_line("pane_spam_pdam_unit_temon_i")
load_GeoJSON_spam_pdam_line("pane_spam_pdam_unit_sermo")
load_GeoJSON_spam_pdam_line("pane_spam_pdam_unit_sentolo_ii")
load_GeoJSON_spam_pdam_line("pane_spam_pdam_unit_sentolo_i")
load_GeoJSON_spam_pdam_line("pane_spam_pdam_unit_sendangsari")
load_GeoJSON_spam_pdam_line("pane_spam_pdam_unit_lendah")
load_GeoJSON_spam_pdam_line("pane_spam_pdam_unit_kalibawang")
load_GeoJSON_spam_pdam_line("pane_spam_pdam_unit_girimulyo")
load_GeoJSON_spam_pdam_line("pane_spam_pdam_unit_galur")
load_GeoJSON_spam_pdam_line("pane_spam_pdam_unit_bend_panjt_ii")
load_GeoJSON_spam_pdam_line("pane_spam_pdam_unit_bend_panjt_i")
load_GeoJSON_air_baku_jaringan_line();
load_GeoJSON_air_baku_sarana_pendukung_point();
load_GeoJSON_air_baku_sumber_point();

var rect1 = {color: "#ff1100", weight: 2};
var rect2 = {color: "#0000AA", weight: 1, opacity:0, fillOpacity:0};
var miniMap = new L.Control.MiniMap(basemapLayersCopy.layer_OSM, {width: 150, height: 150, toggleDisplay: true, aimingRectOptions : rect1, shadowRectOptions: rect2}).addTo(map);

map.on('baselayerchange', function (e) {
	miniMap.changeLayer(basemapLayersCopy[e.name]);
});