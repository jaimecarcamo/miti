function SiembraViewModel(){    
	var self = this;
	self.siembra = ko.observableArray(); 
	self.id         = ko.observable(0);
	self.folio       = ko.observable(); 
    self.fecha_i       = ko.observable(); 
    self.cuadrante  = ko.observable('');
    self.centro  = ko.observable('');
    self.linea     = ko.observable('');
    self.bodega  = ko.observable();
    self.stock     = ko.observable('');
    self.crear  = ko.observable('');
    self.saldo  = ko.observable();
    self.proyecto  = ko.observable('');
    self.orden  = ko.observable('');
    self.origen  = ko.observable('');
    self.ncolector  = ko.observable('');
    self.tcolector  = ko.observable('');
    self.nrotador  = ko.observable('');
    self.talla  = ko.observable('');
    self.peso  = ko.observable('');
    self.cuadrantea = ko.observableArray();
    self.centroa = ko.observableArray();
    self.lineaa = ko.observableArray();
    self.origena = ko.observableArray();
    self.proyectoa = ko.observableArray();
    self.ordena = ko.observableArray();
    self.bodegaa = ko.observableArray();


    self.getdatoscentro = function(){
        self.getcuadrantea();
        self.getbodegaa();
    }

    self.getdatosbodega = function(){
        self.getncolector();
        self.getnrotador();
        self.gettcolector();
        self.gettalla();
        self.getpeso();
    }
    
    self.getstock = function(){
        var url = base_url_api+'siembra/stock/'+self.linea();
        $.getJSON(url, function(data){
            self.stock(data.response.cantidad_cuelga);
        });
    }

    self.getsaldo = function(){
        self.saldo(self.stock()-self.crear());
    }

    self.get = function(){
      var url = base_url_api+'siembra/read';
      $.getJSON(url, function(data){
       self.siembra(data.response);
     });
    }
    
     self.getproyectoa = function(){
    var url = base_url_api+'siembra/proyectos';
    $.getJSON(url, function(data){
        self.proyectoa(data.response);
    });
    }
    self.gettcolector = function(){
    var url = base_url_api+'siembra/tcolector/'+self.bodega();
    $.getJSON(url, function(data){
        self.tcolector(data.response);
    });
    }

    self.getncolector = function(){
    var url = base_url_api+'siembra/ncolector/'+self.bodega();
    $.getJSON(url, function(data){
        self.ncolector(data.response);
    });
    }
    self.getnrotador = function(){
    var url = base_url_api+'siembra/nrotador/'+self.bodega();
    $.getJSON(url, function(data){
        self.nrotador(data.response);
    });
    }
    self.gettalla = function(){
    var url = base_url_api+'siembra/talla/'+self.bodega();
    $.getJSON(url, function(data){
        self.talla(data.response.talla_semilla);
    });
    }
    self.getpeso = function(){
    var url = base_url_api+'siembra/peso/'+self.bodega();
    $.getJSON(url, function(data){
        self.peso(data.response.peso_colector);
    });
    }
    self.getordena = function(){
    var url = base_url_api+'siembra/ordenes';
    $.getJSON(url, function(data){
        self.ordena(data.response);
    });
    }
    self.getcentroa = function(){
    var url = base_url_api+'siembra/centros';
    $.getJSON(url, function(data){
        self.centroa(data.response);
    });
    }


    self.getlineaa = function(){
    var url = base_url_api+'siembra/lineas/'+self.cuadrante();
    $.getJSON(url, function(data){
        self.lineaa(data.response);
    });
    }
    self.getcuadrantea = function(){
    var url = base_url_api+'siembra/cuadrantes/'+self.centro();
    $.getJSON(url, function(data){
        self.cuadrantea(data.response);
    });
    }

    self.getorigena = function(){
    var url = base_url_api+'siembra/origenes';
    $.getJSON(url, function(data){
        self.origena(data.response);
    });
    }
    self.getbodegaa = function(){
          var url = base_url_api+'siembra/bodegas/'+self.centro();
         $.getJSON(url, function(data){
        self.bodegaa(data.response);
         });
    }


    self.save = function(){
    	
        var par = { 
            linea: {
                linea: self.linea(),
                saldo   : self.saldo()
            }
        };
        $.ajax({
        type: "PUT",
        url: base_url_api+'linea/update2',
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
    			siembra: {
    				id      : self.id(),
    				folio    : self.folio(),
    				fecha_i   :self.fecha_i(),   
                    linea     :self.linea(),   
                    crear    :self.crear(), 
                    bodega    :self.bodega(),  
                    proyecto  :self.proyecto(), 
                    orden     :self.orden(), 
                    origen    :self.origen(),  
                    ncolector :self.ncolector(),  
                    tcolector :self.tcolector(), 
                    nrotador  :self.nrotador(), 
                    talla     :self.talla(), 
                    peso      :self.peso() 
                }
            };
            $.ajax({
               type: "PUT",
               url: base_url_api+'siembra',
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
    			siembra: {
                    folio    : self.folio(),
                    fecha_i   :self.fecha_i(),   
                    linea     :self.linea(),   
                    crear    :self.crear(), 
                    bodega    :self.bodega(),  
                    proyecto  :self.proyecto(), 
                    orden     :self.orden(), 
                    origen    :self.origen(),  
                    ncolector :self.ncolector(),  
                    tcolector :self.tcolector(), 
                    nrotador  :self.nrotador(), 
                    talla     :self.talla(), 
                    peso      :self.peso() 
                }
            };
            $.ajax({
               type: "POST",
               url: base_url_api+'siembra', 
               headers : {
                'Content-Type' : 'application/json'
            },
            data: JSON.stringify(params),
            dataType: 'json',
            success: function (data, status, xhr) {
	                //console.log(data.response);
	                self.siembra.push(data.response);
	            },
	            error: function (request, status, error) {
	            	console.log(request.responseText);
	            }
	        });
        }
        self.clean();
    }
    self.edit = function(siembra){
    	self.id(siembra.id_siembra);
        self.folio(siembra.folio_siembra);
        self.fecha_i(siembra.fecha_inicio);
        self.bodega(siembra.bodega_origen);
        self.proyecto(siembra.id_proyecto_fk);
        self.orden(siembra.id_o_siembra_fk);
        self.origen(siembra.origen);
        self.ncolector(siembra.num_colector);
        self.nrotador(siembra.num_rotador);
        self.tcolector(siembra.total_colector);
        self.talla(siembra.talla_semilla);
        self.peso(siembra.peso_prom);
        self.linea(siembra.id_linea_fk);
        self.crear(siembra.unidad_cuelga);
    }
    self.delete = function(siembra){
    	$.ajax({
    		type: "DELETE",
    		url: base_url_api+'siembra/'+siembra.id_siembra,
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
    	self.siembra.remove(siembra);
    }
    self.clean = function(){
    	self.id(0);
    	self.folio('');
        self.linea('');
        self.fecha_i('');
        self.crear('');
        self.saldo('');
        self.stock('');
        self.bodega('');
        self.proyecto('');
        self.orden('');
        self.origen('');
        self.ncolector('');
        self.nrotador('');
        self.tcolector('');
        self.talla('');
        self.peso('');
    }
}
$(document).ready(function(){
	SiembraVM = new SiembraViewModel();
	SiembraVM.get();
    SiembraVM.getproyectoa();
    SiembraVM.getordena();
    SiembraVM.getorigena();
    SiembraVM.getcentroa();
    SiembraVM.getbodegaa();
   /* $("#crear").keyup(function(){
     var saldo = parseInt($("#stock").val()) - parseInt($("#crear").val());
     console.log(saldo);
     SiembraVM.saldo(saldo);
 });*/
    ko.attach("SiembraViewModel", SiembraVM);
});