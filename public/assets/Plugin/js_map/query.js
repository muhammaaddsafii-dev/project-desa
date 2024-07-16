$(function(){
	alert("query")
	var drawBounds = new SuperMap.Control.DrawFeature(drawLayer, SuperMap.Handler.Box,{"handlerOptions":{"cursorCSS":"crosshair"}});
		drawBounds.events.on({"featureadded": function(e){
			drawBounds.deactivate();
			//map.removeLayer(drawLayer);
			map.removeControl(drawBounds);
			//console.log(e);
			var _feature = e.feature;
			var queryBounds = _feature.geometry.bounds;

			var queryParam, queryByBoundsParams, queryService;
			queryParam = new SuperMap.REST.FilterParameter({name: "STASIUN@KAI"});
			queryByBoundsParams = new SuperMap.REST.QueryByBoundsParameters({queryParams: [queryParam], bounds: queryBounds});
			queryService = new SuperMap.REST.QueryByBoundsService(url_STASIUN, {
				eventListeners: {
					"processCompleted": function(e){
						console.log(e);
						map.addLayers([markerLayer]);
						markerLayer.removeAllFeatures();
						for(var i=0;i<e.result.recordsets[0].features.length;i++){
							var _feature = e.result.recordsets[0].features[i];
							_feature.style = {
								fillColor:"#6C6C6C",
								strokeColor:"black",
								pointRadius:4,
								externalGraphic:"theme/images/marker.png",
								graphicWidth:44,
								graphicHeight:33,
								graphicYOffset:-33
							};
							markerLayer.addFeatures([_feature]);
						}
					},
					"processFailed": function(e){
						console.log(e);
					}
				}
			});
			console.log("111");
			queryService.processAsync(queryByBoundsParams);
		}});
	$("#query").click(function(e){
		map.addLayers([drawLayer]);
		map.addControl(drawBounds);
		drawBounds.activate();
	});
	
});
