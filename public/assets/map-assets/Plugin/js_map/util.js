$(function(){
	$("#clearAll").click(function(e){
		clearAll();
	});
});

function clearAll(){
	markerLayer.removeAllFeatures();
	var _vectorLayer = map.getLayersByName("Marker");
	if(_vectorLayer[0]){
		map.removeLayer(markerLayer);
	}
		
//		drawLayer.removeAllFeatures();
//		var _drawLayer = map.getLayersByName("Draw Layer");
//		if(_drawLayer[0]){
//			map.removeLayer(drawLayer);
//		}
		
	map.removeAllPopup();
}
