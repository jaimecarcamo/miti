function CosechaViewModel(){     
	var self = this;
	self.cosecha = ko.observableArray(); 
    self.id         = ko.observable(0);
    self.folio       = ko.observable(); 
    self.fecha_i       = ko.observable(); 
    self.cuadrante  = ko.observable('');
    self.centro  = ko.observable('');
    self.siembra  = ko.observable('');
    self.linea     = ko.observable('');
    self.proyecto  = ko.observable('');
    self.stock     = ko.observable('');
    self.crear  = ko.observable('');
    self.saldo  = ko.observable();
    self.peso  = ko.observable('');
    self.bin  = ko.observable('');
    self.patente     = ko.observable('');
    self.embarcacion  = ko.observable('');
    self.res1  = ko.observable('');
    self.res2  = ko.observable('');
    self.res3  = ko.observable('');
    self.res4  = ko.observable('');
    self.cuadrantea = ko.observableArray();
    self.centroa = ko.observableArray();
    self.lineaa = ko.observableArray();
    self.siembras = ko.observableArray();
    self.proyectoa = ko.observableArray();
    self.embarcaciones  = ko.observableArray();
    self.responsables  = ko.observableArray();
    
    
	self.get = function(){
		var url = base_url_api+'cosecha/read';
		$.getJSON(url, function(data){
			self.cosecha(data.response);
		});
	}

    self.getcentroa = function(){
        var url = base_url_api+'cosecha/centros';
        $.getJSON(url, function(data){
            self.centroa(data.response);
        });
    }

    self.getembarcacion = function(){
        var url = base_url_api+'cosecha/embarcaciones';
        $.getJSON(url, function(data){
            self.embarcaciones(data.response);
        });
    }

    self.getstock = function(){
        var url = base_url_api+'cosecha/stock/'+self.siembra();
        $.getJSON(url, function(data){
            self.stock(data.response.unidad_cuelga);
        });
    }

    self.getpatente = function(){
        var url = base_url_api+'cosecha/patente/'+self.embarcacion();
        $.getJSON(url, function(data){
            self.patente(data.response.patente);
        });
    }

    self.getproyectoa = function(){
        var url = base_url_api+'cosecha/proyecto';
        $.getJSON(url, function(data){
            self.proyectoa(data.response);
        });
    }

    self.getpersonas = function(){
        var url = base_url_api+'cosecha/personas';
        $.getJSON(url, function(data){
            self.responsables(data.response);
        });
    }

    self.getsiembra = function(){
        var url = base_url_api+'cosecha/siembras/'+self.linea()+'/'+self.proyecto();
        $.getJSON(url, function(data){
            self.siembras(data.response);
        });
    }

    self.getsaldo = function(){
        self.saldo(self.stock()-self.crear());
    }

    self.getlineaa = function(){
    var url = base_url_api+'cosecha/lineas/'+self.cuadrante();
    $.getJSON(url, function(data){
        self.lineaa(data.response);
    });
    }
    
    self.getcuadrantea = function(){
    var url = base_url_api+'cosecha/cuadrantes/'+self.centro();
    $.getJSON(url, function(data){
        self.cuadrantea(data.response);
    });
    }

    self.save = function(){

        var par = { 
            siembra: {
                siembra: self.siembra(),
                saldo   : self.saldo()
            }
        };
        $.ajax({
        type: "PUT",
        url: base_url_api+'siembra/update2',
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
    			cosecha: {
    				id      : self.id(),
                    folio   : self.folio(),
                    fecha_i  : self.fecha_i(),
                    saldo      : self.saldo(),
                    peso  : self.peso(),
                    bin      : self.bin(),
                    embarcacion  : self.embarcacion(),
                    siembra  : self.siembra(),
                    res1      : self.res1(),
                    res2   : self.res2(),
                    res3  : self.res3(),
                    res4  : self.res4()
    			}
    		};
    		$.ajax({
    			type: "PUT",
    			url: base_url_api+'cosecha',
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
    			cosecha: {
    			    folio   : self.folio(),
                    fecha_i  : self.fecha_i(),
                    saldo      : self.saldo(),
                    peso  : self.peso(),
                    bin      : self.bin(),
                    embarcacion  : self.embarcacion(),
                    siembra  : self.siembra(),
                    res1      : self.res1(),
                    res2   : self.res2(),
                    res3  : self.res3(),
                    res4  : self.res4()
    			}
    		};
    		$.ajax({
    			type: "POST",
    			url: base_url_api+'cosecha', 
    			headers : {
    				'Content-Type' : 'application/json'
    			},
    			data: JSON.stringify(params),
    			dataType: 'json',
    			success: function (data, status, xhr) {
	                //console.log(data.response);
	                self.cosecha.push(data.response);
	            },
	            error: function (request, status, error) {
	            	console.log(request.responseText);
	            }
	        });
    	}
    	self.clean();
    }
    self.edit = function(cosecha){
    	self.id(cosecha.id_cosecha);
    	self.folio(cosecha.folio_cosecha);
        self.fecha_i(cosecha.fecha_inicio);
        self.crear(cosecha.unidad_cuelga);
        self.peso(cosecha.peso_prom);
        self.bin(cosecha.cantidad_bins);
        self.embarcacion(cosecha.id_embarcacion); 
        self.patente(cosecha.patente);
        self.res1(cosecha.responsable_1);
        self.res2(cosecha.responsable_2);
        self.res3(cosecha.responsable_3);
        self.res4(cosecha.responsable_4);
    }
    self.delete = function(cosecha){
    	$.ajax({
    		type: "DELETE",
    		url: base_url_api+'cosecha/'+cosecha.id_cosecha,
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
    	self.cosecha.remove(cosecha);
    }
    self.clean = function(){
    	self.id(0);
    	self.folio('');
        self.bin('');
        self.peso('');
        self.embarcacion('');
        self.patente('');
        self.saldo('');
        self.fecha_i('');
        self.proyecto('');
        self.res1();
        self.res2();
        self.res3();
        self.res4();
    }
}
$(document).ready(function(){
	CosechaVM = new CosechaViewModel();
	CosechaVM.get();
    CosechaVM.getcentroa();
    CosechaVM.getproyectoa();
    CosechaVM.getembarcacion();
	CosechaVM.getpersonas();
    ko.attach("CosechaViewModel", CosechaVM);
});