function AreaViewModel(){  
	var self = this;
	self.area = ko.observableArray();
	self.id         = ko.observable(0);
	self.folio       = ko.observable(); 
    self.tipoarea       = ko.observable(); 
	self.nombre     = ko.observable('');
	self.fecha_i  = ko.observable('');
    self.observacion  = ko.observable('');
    self.estado  = ko.observable('');
    self.estadoa  = ko.observableArray();
    self.tipoareaa  = ko.observableArray();
    
	self.get = function(){
		var url = base_url_api+'area/read';
		$.getJSON(url, function(data){
			self.area(data.response);
		});
	}

    self.getestadoa = function(){
        var url = base_url_api+'area/estados';
        $.getJSON(url, function(data){
            self.estadoa(data.response);
        });
    }
    self.gettipoareaa = function(){
        var url = base_url_api+'area/tipoareas';
        $.getJSON(url, function(data){
            self.tipoareaa(data.response);
        });
    }

	self.save = function(){
    	// si existe se actualiza (PUT)
    	if(self.id() > 0){
    		var params = { 
    			area: {
    				id      : self.id(),
    				nombre    : self.nombre(),
    				estado    : self.estado(),
    				folio   : self.folio(),
                    fecha_i  : self.fecha_i(),
                    observacion    : self.observacion(),
                    tipoarea    : self.tipoarea()
                }
    		};
    		$.ajax({
    			type: "PUT",
    			url: base_url_api+'area',
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
    			area: {
                    folio   : self.folio(),
    				nombre    : self.nombre(),
                    tipoarea   : self.tipoarea(),
                    fecha_i  : self.fecha_i(),
                    observacion    : self.observacion(),
                    estado    : self.estado()
                }
    		};
    		$.ajax({
    			type: "POST",
    			url: base_url_api+'area', 
    			headers : {
    				'Content-Type' : 'application/json'
    			},
    			data: JSON.stringify(params),
    			dataType: 'json',
    			success: function (data, status, xhr) {
	                //console.log(data.response);
	                self.area.push(data.response);
	            },
	            error: function (request, status, error) {
	            	console.log(request.responseText);
	            }
	        });
    	}
    	self.clean();
    }
    self.edit = function(area){
    	self.id(area.id_area);
    	self.folio(area.folio_area);
        self.nombre(area.nombre_area);
        self.fecha_i(area.fecha_inicio);
        self.observacion(area.observacion);
        self.estado(area.id_estado_fk);
        self.tipoarea(area.id_tipo_area_fk);
    }
    self.delete = function(area){
    	$.ajax({
    		type: "DELETE",
    		url: base_url_api+'area/'+area.id_area,
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
    	self.area.remove(area);
    }
    self.clean = function(){
    	self.id(0);
    	self.nombre('');
        self.estado('');
        self.folio('');
        self.fecha_i('');
        self.tipoarea('');
        self.observacion('');
    }
}
$(document).ready(function(){
	AreaVM = new AreaViewModel();
	AreaVM.get();
    AreaVM.getestadoa();
    AreaVM.gettipoareaa();
	ko.attach("AreaViewModel", AreaVM);
});