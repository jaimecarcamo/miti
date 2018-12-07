     
function MuestraViewModel(){   
	var self = this; 
	self.muestra = ko.observableArray();
    self.id         = ko.observable(0);
    self.cuadrante       = ko.observable();
    self.centro       = ko.observable();
    self.fmuestreo       = ko.observable();
    self.muestreoa = ko.observableArray();
    self.cuadrantea = ko.observableArray();
    self.centroa = ko.observableArray();
    self.muestras=ko.observableArray([]);
    self.peso_inmersion=ko.observable();
    self.peso_emersion=ko.observable();
    self.lineaa = ko.observableArray();
    self.linea=ko.observable();
    
    var Muestra = function(){
        this.peso_inmersion=ko.observable();
        this.peso_emersion=ko.observable();
        this.lineaa = ko.observableArray();
        this.linea=ko.observable();
    }

    self.add = function(m){
        self.muestras.push(new Muestra());
    }  

    self.delete_form = function(m){
        self.muestras.remove(m);
        console.log(m);
    } 


    self.get = function(){
        var url = base_url_api+'muestra/read'; 
        $.getJSON(url, function(data){
            self.muestra(data.response);
        });
    }

    //le entrego un valor a concesiona para que haga una peticion y pregunte por concesion
    self.getmuestreo = function(){
        var url = base_url_api+'muestra/muestreos';
        $.getJSON(url, function(data){
            self.muestreoa(data.response);
        });
    }
    self.getembarcaciona = function(){
        var url = base_url_api+'muestra/embarcaciones';
        $.getJSON(url, function(data){
            self.embarcaciona(data.response);
        });
    }
    self.getpersonaa = function(){
        var url = base_url_api+'muestra/personas';
        $.getJSON(url, function(data){
            self.personaa(data.response);
        });
    }

    self.getcentroa = function(){
        var url = base_url_api+'muestra/centros';
        $.getJSON(url, function(data){
            self.centroa(data.response);
        });
    }

    self.getcuadrantea = function(){
        var url = base_url_api+'muestra/cuadrantes/'+self.centro();
        $.getJSON(url, function(data){
            self.cuadrantea(data.response);
        });
    }

    self.getlineaa = function(){
        var url = base_url_api+'muestra/lineas/'+self.cuadrante();
        $.getJSON(url, function(data){
            self.lineaa(data.response);
        });
    }
    

    self.save = function(){
    	// si existe se actualiza (PUT)
    	if(self.id() > 0){
    		var params = { 
    			muestra: {
    				id      : self.id(),
    				folio    : self.folio(),
    				fecha_i  : self.fecha_i(),
    				hora   : self.hora(),
                    embarcacion      : self.embarcacion(),
                    persona      : self.persona(),
                    descripcion    : self.descripcion()
                }
            };
            $.ajax({
               type: "PUT",
               url: base_url_api+'muestra',
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
    			muestra: {
    				folio    : self.folio(),
                    fecha_i  : self.fecha_i(),
                    hora   : self.hora(),
                    embarcacion      : self.embarcacion(),
                    persona      : self.persona(),
                    descripcion    : self.descripcion()
                }
            };
            $.ajax({
               type: "POST",
               url: base_url_api+'muestra', 
               headers : {
                'Content-Type' : 'application/json'
            },
            data: JSON.stringify(params),
            dataType: 'json',
            success: function (data, status, xhr) {
	                //console.log(data.response);
	                self.muestra.push(data.response);
	            },
	            error: function (request, status, error) {
	            	console.log(request.responseText);
	            }
	        });
        }
    }


    self.edit = function(muestra){
    	self.id(muestra.id_muestreo);
    	self.folio(muestra.folio_muestreo);
        self.fecha_i(muestra.fecha);
        self.hora(muestra.hora);
        self.descripcion(muestra.observacion);
        self.embarcacion(muestra.id_embarcacion);
        self.persona(muestra.id_persona);
    }


    self.delete = function(muestra){
    	$.ajax({
    		type: "DELETE",
    		url: base_url_api+'muestra/'+muestra.id_c_cultivo,
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
    	self.muestra.remove(muestra);
    }

    self.clean = function(){
    	self.id(0);
    	self.nombre('');
        self.folio('');
        self.descripcion('');
        self.concesion();
        self.cantidad();
        self.decreto();
        self.t_centro();
        self.estado();
        self.fecha_i();
        self.area();
    }
}

$(document).ready(function(){
	MuestraVM = new MuestraViewModel();
	MuestraVM.get();
    MuestraVM.getcentroa();
    MuestraVM.getmuestreo();
    ko.attach("MuestraViewModel", MuestraVM);
});