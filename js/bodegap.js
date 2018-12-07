function BodegapViewModel(){   
	var self = this;
	self.bodegas = ko.observableArray(); 
	self.id         = ko.observable(0);
	self.folio       = ko.observable(); 
	self.nombre     = ko.observable('');
	self.fecha_i  = ko.observable('');
    self.observacion  = ko.observable('');
    self.centro  = ko.observable('');
    self.centroa = ko.observableArray();
    
	self.get = function(){
		var url = base_url_api+'bodegap/read';
		$.getJSON(url, function(data){
			self.bodegas(data.response);
		});
	}
   
    self.getcentroa = function(){
        var url = base_url_api+'bodegap/centros';
        $.getJSON(url, function(data){
            self.centroa(data.response);
        });
    }
    

	self.save = function(){
    	// si existe se actualiza (PUT)
    	if(self.id() > 0){
    		var params = { 
    			bodegas: {
    				id      : self.id(),
    				folio    : self.folio(),
    				nombre  : self.nombre(),
    				fecha_i  : self.fecha_i(),
                    observacion    : self.observacion(),
                    centro   : self.centro()
    			}
    		};
    		$.ajax({
    			type: "PUT",
    			url: base_url_api+'bodegap',
    			headers : {
    				'Content-Type' : 'application/json'
    			},
    			data: JSON.stringify(params),
    			dataType: 'json',
    			success: function (data, status, xhr) {
	                //console.log(data.response);
	                self.get();
	            },
	            error: function (request, status, error) {
	            	console.log(request.responseText);
	            }
	        });
    	}else{ // si no existe se crea (POST)
    		var params = {
    			bodegas: {
                    folio    : self.folio(),
                    nombre  : self.nombre(),
                    fecha_i  : self.fecha_i(),
                    observacion    : self.observacion(),
                    centro   : self.centro()
                }
    		};
    		$.ajax({
    			type: "POST",
    			url: base_url_api+'bodegap', 
    			headers : {
    				'Content-Type' : 'application/json'
    			},
    			data: JSON.stringify(params),
    			dataType: 'json',
    			success: function (data, status, xhr) {
	                //console.log(data.response);
	                self.bodegas.push(data.response);
	            },
	            error: function (request, status, error) {
	            	console.log(request.responseText);
	            }
	        });
    	}
    	self.clean();
    }
    self.edit = function(bodegas){
    	self.id(bodegas.id_b_producto);
    	self.folio(bodegas.folio_b_producto);
        self.nombre(bodegas.nombre_b_producto);
        self.fecha_i(bodegas.fecha_inicio);
        self.observacion(bodegas.observacion);
        self.centro(bodegas.id_c_cultivo_fk);
    }
    self.delete = function(bodegas){
    	$.ajax({
    		type: "DELETE",
    		url: base_url_api+'bodegap/'+bodegas.id_b_producto,
    		headers : {
    			'Content-Type' : 'application/json'
    		},
    		dataType: 'json',
    		success: function (data, status, xhr) {
    			console.log(data.response);
    		},
    		error: function (request, status, error) {
    			console.log(request.responseText);
    		}
    	});
    	self.bodegas.remove(bodegas);
    }
    self.clean = function(){
    	self.id(0);
    	self.nombre('');
        self.folio('');
        self.fecha_i('');
        self.centro('');
        self.observacion('');
    }
}
$(document).ready(function(){
	BodegapVM = new BodegapViewModel();
	BodegapVM.get();
    BodegapVM.getcentroa();
    ko.attach("BodegapViewModel", BodegapVM);
});