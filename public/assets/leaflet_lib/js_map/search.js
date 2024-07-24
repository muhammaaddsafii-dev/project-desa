$(function(){
	
	$("#searchInput").keyup(function(e){
		$("#searchSelect").hide();
	});
	
	$("#searchSubmit").click(function(e){
		clearAll();
		var inputVal = $("#searchInput").val();
	  	var queryParam, queryBySQLParams, queryBySQLService;               
		queryParam = new SuperMap.REST.FilterParameter({                   
			name: "STASIUN@KAI",
			attributeFilter: "Nama like '%"+inputVal+"%'"               
		});               
		queryBySQLParams = new SuperMap.REST.QueryBySQLParameters({                   
			queryParams: [queryParam]               
		});
		queryBySQLService = new SuperMap.REST.QueryBySQLService(url_STASIUN, {
			eventListeners: {
				"processCompleted": function(e){
					if($("#searchInput").val() == ""){
						$("#searchSelect").hide();
					}else{
						$("#searchSelect").show();
						$("#searchSelect").empty();
						for(var i=0;i<e.result.recordsets[0].features.length;i++){
							var result = e.result.recordsets[0].features[i].data.Nama;
							var newOption = "<option value="+result+">"+result+"</option>";
							$("#searchSelect").append(newOption);
						}
					}
				},
				"processFailed": function(e){
					console.log(e);
				}
			}
		});               
		queryBySQLService.processAsync(queryBySQLParams);
	});
	
	var time = null;
	$("#searchSelect").click(function(e){
	    clearTimeout(time);
	    
	    time = setTimeout(function(){
	        //console.log(e.target.innerText);
	        queryBySelect(e.target.innerText,0);
	        
	    },300);
	});
	
	$("#searchSelect").dblclick(function(e){
		clearTimeout(time);
		//console.log(e.target.innerText);
		queryBySelect(e.target.innerText,1);
	});
	
	function queryBySelect(_text,dbclick){
		if(dbclick==1){
			$("#searchSelect").hide();
		}
		//var _text = e.target.innerText;
	    var queryParam, queryBySQLParams, queryBySQLService;               
		queryParam = new SuperMap.REST.FilterParameter({                   
			name: "STASIUN@KAI",
			attributeFilter: "Nama like '%"+_text+"%'"               
		});
		//console.log(queryParam);
		queryBySQLParams = new SuperMap.REST.QueryBySQLParameters({                   
			queryParams: [queryParam]               
		});
		queryBySQLService = new SuperMap.REST.QueryBySQLService(url_STASIUN, {
			eventListeners: {
				"processCompleted": function(e){
					console.log(e);
					var _feature = e.result.recordsets[0].features[0];
					
					//alert(e.result.recordsets[0].features[0].geometry);
					_feature = new SuperMap.Feature.Vector(new SuperMap.Geometry.Point(+_feature.attributes.SmX, +_feature.attributes.SmY));
					
					map.addLayers([markerLayer]);
					markerLayer.removeAllFeatures();
					_feature.style = {
						fillColor:"#6C6C6C",
						strokeColor:"black",
						pointRadius:4,
						externalGraphic:"theme/images/marker-gold.png",
						graphicWidth:44,
						graphicHeight:40,
						graphicYOffset:-40
					};
					markerLayer.addFeatures([_feature]);
					if(dbclick == 1){				
						map.setCenter(new SuperMap.LonLat(_feature.geometry.x,_feature.geometry.y),2);
						//alert("zoom");
						//alert(_feature.geometry.x);
						//alert(_feature.geometry.y);
					}
				},
				"processFailed": function(e){
					console.log(e);
					alert("failed");
				}
			}
		});               
		queryBySQLService.processAsync(queryBySQLParams);
	}
	
});
