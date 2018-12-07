function ProyectoViewModel(){ 
	var self = this; 
	self.proyecto = ko.observableArray();
    self.id =   ko.observable();
	self.folio = ko.observable();
    self.nombre  = ko.observable('');
    self.fecha_i  = ko.observable('');
   
	self.get = function(){
		var url = base_url_api+'proyecto/read'; 
		$.getJSON(url, function(data){
			self.proyecto(data.response);
		});
	}
   
   self.save = function(){
    	// si existe se actualiza (PUT)
    	if(self.id() > 0){
    		var params = { 
    			proyecto: {
    				id      : self.id(),
    				folio : self.folio(),
                    nombre : self.nombre(),
                    fecha_i : self.fecha_i()
    			}
    		};
    		$.ajax({
    			type: "PUT",
    			url: base_url_api+'proyecto',
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
    			proyecto: {
    				folio : self.folio(),
                    nombre : self.nombre(),
                    fecha_i : self.fecha_i()
    			}
    		};
    		$.ajax({
    			type: "POST",
    			url: base_url_api+'proyecto', 
    			headers : {
    				'Content-Type' : 'application/json'
    			},
    			data: JSON.stringify(params),
    			dataType: 'json',
    			success: function (data, status, xhr) {
	                //console.log(data.response);
	                self.proyecto.push(data.response);
	            },
	            error: function (request, status, error) {
	            	console.log(request.responseText);
	            }
	        });
    	}
    	self.clean();
    }
    self.edit = function(proyecto){
    	self.id(proyecto.id_proyecto);
    	self.folio(proyecto.folio_proyecto);
        self.nombre(proyecto.nombre_proyecto);
        self.fecha_i(proyecto.fecha_inicio);
    }
    self.delete = function(proyecto){
    	$.ajax({
    		type: "DELETE",
    		url: base_url_api+'proyecto/'+proyecto.id_proyecto,
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
    	self.proyecto.remove(proyecto);
    }
    self.clean = function(){
    	self.id(0);
    	self.nombre('');
        self.folio('');
        self.fecha_i('');
    }
}
$(document).ready(function(){
	ProyectoVM = new ProyectoViewModel();
	ProyectoVM.get();
    ko.attach("ProyectoViewModel", ProyectoVM);
});