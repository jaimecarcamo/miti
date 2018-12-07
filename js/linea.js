function LineaViewModel(){     
	var self = this;
	self.linea = ko.observableArray();
	self.id         = ko.observable(0);
	self.folio       = ko.observable('');
	self.nombre     = ko.observable('');
    self.cantidad     = ko.observable('');
    self.stock       = ko.observable('');
    self.crear     = ko.observable('');
    self.saldo     = ko.observable('');
	self.fecha_i       = ko.observable('');
	self.observacion     = ko.observable('');
    self.estado       = ko.observable('');
    self.cuadrante  = ko.observable('');
    self.centro  = ko.observable('');
    self.estadoa = ko.observableArray();
    self.cuadrantea = ko.observableArray(); 
    self.centroa = ko.observableArray();



    self.get = function(){
		var url = base_url_api+'linea/read';
		$.getJSON(url, function(data){
			self.linea(data.response);
		});
	}
    self.getcuadrantea = function(){
        var url = base_url_api+'linea/cuadrantes/'+self.centro();
        $.getJSON(url, function(data){
            self.cuadrantea(data.response);
        });
    }
    self.getestadoa = function(){
        var url = base_url_api+'linea/estados';
        $.getJSON(url, function(data){
            self.estadoa(data.response);
        });
    }
    self.getstock = function(){
        var url = base_url_api+'linea/stock/'+self.cuadrante();
        $.getJSON(url, function(data){
            self.stock(data.response.cantidad_linea);
        });
    }
    
    self.getsaldo = function(){
        self.saldo(self.stock()-self.crear());
    }

    self.getcentroa = function(){
        var url = base_url_api+'linea/centros';
        $.getJSON(url, function(data){
            self.centroa(data.response);
        });
    }
	self.save = function(){
    	
        var par = { 
        cuadrante: {
            cuadrante: self.cuadrante(),
            saldo   : self.saldo()
            }
        };
        $.ajax({
            type: "PUT",
            url: base_url_api+'cuadrante/update2',
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
    			linea: {
    				id      : self.id(),
                    nombre    : self.nombre(),
                    cantidad  : self.cantidad(),
                    crear  : self.crear(),
                    estado    : self.estado(),
                    folio   : self.folio(),
                    fecha_i  : self.fecha_i(),
                    observacion    : self.observacion(),
                    cuadrante    : self.cuadrante()
    			}
    		};
    		$.ajax({
    			type: "PUT",
    			url: base_url_api+'linea',
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
    			linea: {
    				nombre    : self.nombre(),
                    cantidad  : self.cantidad(),
                    crear  : self.crear(),
                    estado    : self.estado(),
                    folio   : self.folio(),
                    fecha_i  : self.fecha_i(),
                    observacion    : self.observacion(),
                    cuadrante    : self.cuadrante()
    			}
    		};
    		$.ajax({
    			type: "POST",
    			url: base_url_api+'linea', 
    			headers : {
    				'Content-Type' : 'application/json'
    			},
    			data: JSON.stringify(params),
    			dataType: 'json',
    			success: function (data, status, xhr) {
	                //console.log(data.response);
	                self.linea.push(data.response);
	            },
	            error: function (request, status, error) {
	            	console.log(request.responseText);
	            }
	        });
    	}
    	self.clean();
    }
    self.edit = function(linea){
    	self.id(linea.id_linea);
        self.centro(linea.id_c_cultivo_fk);
    	self.cuadrante(linea.id_cuadrante_fk);
        self.crear(linea.unidad_linea);
        self.fecha_i(linea.fecha_inicio);
        self.nombre(linea.nombre_linea);
        self.folio(linea.folio_linea);
        self.estado(linea.id_estado_fk);
        self.cantidad(linea.cantidad_cuelga);
        self.observacion(linea.observacion);
    }
    self.delete = function(linea){
    	$.ajax({
    		type: "DELETE",
    		url: base_url_api+'linea/'+linea.id_linea,
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
    	self.linea.remove(linea);
    }
    self.clean = function(){
    	self.id(0);
        self.centro('');
        self.saldo('');
        self.fecha_i('');
        self.stock('');
        self.nombre('');
        self.cantidad('');
        self.crear('');
        self.estado('');
        self.observacion('');
        self.folio('');
        self.cuadrante('');
    }
}
$(document).ready(function(){
	LineaVM = new LineaViewModel();
	LineaVM.get();
    LineaVM.getestadoa();
    LineaVM.getcentroa();
	ko.attach("LineaViewModel", LineaVM);
});