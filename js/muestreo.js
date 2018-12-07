    
function MuestreoViewModel(){   
	var self = this; 
	self.muestreo = ko.observableArray();
    self.id         = ko.observable(0);
	self.folio       = ko.observable();
	self.hora     = ko.observable('');
	self.fecha_i  = ko.observable('');
    self.persona  = ko.observable('');
    self.embarcacion  = ko.observable('');
    self.descripcion  = ko.observable('');
    self.embarcaciona = ko.observableArray();
    self.personaa = ko.observableArray();
    
    self.get = function(){
		var url = base_url_api+'muestreo/read'; 
		$.getJSON(url, function(data){
			self.muestreo(data.response);
		});
	}

    self.getembarcaciona = function(){
        var url = base_url_api+'muestreo/embarcaciones';
        $.getJSON(url, function(data){
            self.embarcaciona(data.response);
        });
    }
    self.getpersonaa = function(){
        var url = base_url_api+'muestreo/personas';
        $.getJSON(url, function(data){
            self.personaa(data.response);
        });
    }

    
    self.save = function(){
    	// si existe se actualiza (PUT)
    	if(self.id() > 0){
    		var params = { 
    			muestreo: {
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
    			url: base_url_api+'muestreo',
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
    			muestreo: {
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
    			url: base_url_api+'muestreo', 
    			headers : {
    				'Content-Type' : 'application/json'
    			},
    			data: JSON.stringify(params),
    			dataType: 'json',
    			success: function (data, status, xhr) {
	                //console.log(data.response);
	                self.muestreo.push(data.response);
	            },
	            error: function (request, status, error) {
	            	console.log(request.responseText);
	            }
	        });
    	}
    }


    self.edit = function(muestreo){
    	self.id(muestreo.id_muestreo);
    	self.folio(muestreo.folio_muestreo);
        self.fecha_i(muestreo.fecha);
        self.hora(muestreo.hora);
        self.descripcion(muestreo.observacion);
        self.embarcacion(muestreo.id_embarcacion);
        self.persona(muestreo.id_persona);
    }
        

    self.delete = function(muestreo){
    	$.ajax({
    		type: "DELETE",
    		url: base_url_api+'muestreo/'+muestreo.id_c_cultivo,
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
    	self.muestreo.remove(muestreo);
    }

    self.clean = function(){
    	self.id(0);
    	self.nombre('');
        self.folio('');
        self.descripcion('');
    }
}

$(document).ready(function(){
	MuestreoVM = new MuestreoViewModel();
	MuestreoVM.get();
    MuestreoVM.getembarcaciona();
    MuestreoVM.getpersonaa();
    ko.attach("MuestreoViewModel", MuestreoVM);
});