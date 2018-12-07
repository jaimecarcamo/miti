 
function CentroViewModel(){   
	var self = this; 
	self.centro = ko.observableArray();
	self.id         = ko.observable(0);
	self.folio       = ko.observable();
	self.nombre     = ko.observable('');
	self.fecha_i  = ko.observable('');
    self.descripcion  = ko.observable('');
    self.cantidad  = ko.observable('');
    self.estado  = ko.observable('');
    self.area  = ko.observable('');
    self.t_centro  = ko.observable('');
    self.concesion  = ko.observable('');
    self.decreto  = ko.observable('');
    self.concesiona = ko.observableArray();
    self.decretoa = ko.observableArray();
    self.t_centroa = ko.observableArray();
    self.areaa = ko.observableArray();
    self.estadoa = ko.observableArray();
    

	self.get = function(){
		var url = base_url_api+'centro/read'; 
		$.getJSON(url, function(data){
			self.centro(data.response);
		});
	}

    //le entrego un valor a concesiona para que haga una peticion y pregunte por concesion
    self.getconcesiona = function(){
        var url = base_url_api+'centro/concesiones';
        $.getJSON(url, function(data){
            self.concesiona(data.response);
        });
    }
    self.getdecretoa = function(){
        var url = base_url_api+'centro/decretos';
        $.getJSON(url, function(data){
            self.decretoa(data.response);
        });
    }
    self.gett_centroa = function(){
        var url = base_url_api+'centro/tcentros';
        $.getJSON(url, function(data){
            self.t_centroa(data.response);
        });
    }
    self.getareaa = function(){
        var url = base_url_api+'centro/areas';
        $.getJSON(url, function(data){
            self.areaa(data.response);
        });
    }
    
    self.getestadoa = function(){
        var url = base_url_api+'centro/estados';
        $.getJSON(url, function(data){
            self.estadoa(data.response);
        });
    }
    

	self.save = function(){
    	// si existe se actualiza (PUT)
    	if(self.id() > 0){
    		var params = { 
    			centro: {
    				id      : self.id(),
    				folio    : self.folio(),
    				nombre  : self.nombre(),
    				descripcion   : self.descripcion(),
                    concesion      : self.concesion(),
                    cantidad      : self.cantidad(),
                    decreto    : self.decreto(),
                    t_centro  : self.t_centro(),
                    area  : self.area(),
                    estado   : self.estado(),
                    fecha_i    : self.fecha_i()
    			}
    		};
    		$.ajax({
    			type: "PUT",
    			url: base_url_api+'centro',
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
    			centro: {
    				folio   : self.folio(),
                    nombre  : self.nombre(),
                    descripcion   : self.descripcion(),
                    fecha_i   : self.fecha_i(),
                    area  : self.area(),
                    cantidad      : self.cantidad(),
                    concesion      : self.concesion(),
                    decreto    : self.decreto(),
                    t_centro  : self.t_centro(),
                    estado   : self.estado()
                }
    		};
    		$.ajax({
    			type: "POST",
    			url: base_url_api+'centro', 
    			headers : {
    				'Content-Type' : 'application/json'
    			},
    			data: JSON.stringify(params),
    			dataType: 'json',
    			success: function (data, status, xhr) {
	                //console.log(data.response);
	                self.centro.push(data.response);
	            },
	            error: function (request, status, error) {
	            	console.log(request.responseText);
	            }
	        });
    	}
    	self.clean();
    }


    self.edit = function(centro){
    	self.id(centro.id_c_cultivo);
    	self.folio(centro.folio_centro);
        self.nombre(centro.nombre_centro);
        self.fecha_i(centro.fecha_inicio);
        self.descripcion(centro.descripcion);
        self.cantidad(centro.cantidad_cuadrante);
        self.estado(centro.id_estado_fk);
        self.t_centro(centro.id_tipo_centro_fk);
        self.concesion(centro.id_concesion_fk);
        self.decreto(centro.id_decreto_fk);
        self.area(centro.id_area_fk);
    }

    self.delete = function(centro){
    	$.ajax({
    		type: "DELETE",
    		url: base_url_api+'centro/'+centro.id_c_cultivo,
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
    	self.centro.remove(centro);
    }

    self.clean = function(){
    	self.id(0);
        self.fecha_i('');
    	self.nombre('');
        self.folio('');
        self.descripcion('');
        self.concesion('');
        self.cantidad('');
        self.decreto('');
        self.t_centro('');
        self.estado('');
        self.area('');
    }
}
$(document).ready(function(){
	CentroVM = new CentroViewModel();
	CentroVM.get();
    CentroVM.getconcesiona();
    CentroVM.getareaa();
    CentroVM.getdecretoa();
    CentroVM.gett_centroa();
    CentroVM.getestadoa();
    ko.attach("CentroViewModel", CentroVM);
});