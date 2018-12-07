function OrdensViewModel(){     
	var self = this;
	self.ordens = ko.observableArray(); 
	self.id         = ko.observable(0); 
	self.folio       = ko.observable(); 
	self.fecha_i  = ko.observable('');
    self.autorizado  = ko.observable('');
    self.emitido  = ko.observable('');
    self.transporte  = ko.observable('');
    self.stock  = ko.observable('');
    self.crear  = ko.observable('');
    self.saldo  = ko.observable('');
    self.colector  = ko.observable('');
    self.bodega  = ko.observable('');
    self.tcentro  = ko.observable('');
    self.colectora  = ko.observableArray();
    self.tcentroa = ko.observableArray();
    self.bodegas = ko.observableArray();
    self.colectororden  = ko.observable('');

	self.get = function(){
		var url = base_url_api+'ordens/read';
		$.getJSON(url, function(data){
			self.ordens(data.response);
		});
	}

    self.getdatoscolector =function(){
        self.getstock();
        self.getcolector();
    }

    self.getstock = function(){
        var url = base_url_api+'ordens/stock/'+self.colector();
        $.getJSON(url, function(data){
            self.stock(data.response.peso_colector);
        });
    }

    self.getsaldo = function(){
        self.saldo(self.stock()-self.crear());
    } 

    self.getcolectora = function(){
        var url = base_url_api+'ordens/colectores/'+self.bodega();
        $.getJSON(url, function(data){
            self.colectora(data.response);
        });
    }
    self.gettcentroa = function(){
        var url = base_url_api+'ordens/tcentros';
        $.getJSON(url, function(data){
            self.tcentroa(data.response);
        });
    }
     self.getbodegas = function(){
        var url = base_url_api+'ordens/bodegas';
        $.getJSON(url, function(data){
            self.bodegas(data.response);
        });
    }

    self.getcolector = function(){
        var url = base_url_api+'ordens/colectororden/'+self.colector();
        $.getJSON(url, function(data){
            self.colectororden(data.response.nombre_colector);
        });
    }

	self.save = function(){
    	
        var par = { 
        colector: {
            colector: self.colector(),
            saldo   : self.saldo()
            }
        };
        $.ajax({
            type: "PUT",
            url: base_url_api+'colector/update2',
            headers : {
            'Content-Type' : 'application/json'
            },
            data: JSON.stringify(par),
            dataType: 'json',
            success: function (data, status, xhr) {
            //console.log(data.response);
            self.get();
            },
            error: function (request, status, error) {
            console.log(request.responseText);
            }
        });

        // si existe se actualiza (PUT)
    	if(self.id() > 0){
           var params = { 
    			ordens: {
    				id      : self.id(),
    				folio    : self.folio(),
    				fecha_i  : self.fecha_i(),
                    autorizado    : self.autorizado(),
                    emitido   : self.emitido(),
                    transporte   : self.transporte(),
                    crear   : self.crear(),
                    colector   : self.colectororden(),
                    bodega   : self.bodega(),
                    tcentro   : self.tcentro()
    			}
    		};
    		$.ajax({
    			type: "PUT",
    			url: base_url_api+'ordens',
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
    			ordens: {
                    folio    : self.folio(),
                    fecha_i  : self.fecha_i(),
                    autorizado    : self.autorizado(),
                    emitido   : self.emitido(),
                    transporte   : self.transporte(),
                    crear   : self.crear(),
                    colector   : self.colectororden(),
                    bodega   : self.bodega(),
                    tcentro   : self.tcentro()
                }
    		};
    		$.ajax({
    			type: "POST",
    			url: base_url_api+'ordens', 
    			headers : {
    				'Content-Type' : 'application/json'
    			},
    			data: JSON.stringify(params),
    			dataType: 'json',
    			success: function (data, status, xhr) {
	                //console.log(data.response);
	                self.ordens.push(data.response);
	            },
	            error: function (request, status, error) {
	            	console.log(request.responseText);
	            }
	        });
    	}
    	self.clean();
    }
    self.edit = function(ordens){
    	self.id(ordens.id_o_siembra);
    	self.folio(ordens.folio_o_siembra);
        self.fecha_i(ordens.fecha_inicio);
        self.autorizado(ordens.autorizado);
        self.emitido(ordens.emitido);
        self.transporte(ordens.transporte);
        self.crear(ordens.cantidad);
        self.colectororden(ordens.colector);
        self.bodega(ordens.id_b_producto_fk);
        self.tcentro(ordens.id_tipo_centro_fk);
    }
    self.delete = function(ordens){
    	$.ajax({
    		type: "DELETE",
    		url: base_url_api+'ordens/'+ordens.id_o_siembra,
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
    	self.ordens.remove(ordens);
    }
    self.clean = function(){
    	self.id(0);
    	self.folio('');
        self.fecha_i('');
        self.autorizado('');
        self.emitido('');
        self.transporte('');
        self.crear('');
        self.saldo('');
        self.colector('');
        self.bodega('');
        self.tcentro('');
    }
}

$(document).ready(function(){
	OrdensVM = new OrdensViewModel();
	OrdensVM.get();
    OrdensVM.gettcentroa();
    OrdensVM.getbodegas();
	ko.attach("OrdensViewModel", OrdensVM);
});