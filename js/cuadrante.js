function CuadranteViewModel(){    
	var self = this; 
	self.cuadrante = ko.observableArray();
	self.id         = ko.observable(0);
	self.folio       = ko.observable('');
	self.nombre     = ko.observable('');
	self.cantidad       = ko.observable('');
	self.fecha_i  = ko.observable('');
  self.stock     = ko.observable('');
  self.crear       = ko.observable('');
  self.saldo  = ko.observable('');
  self.observacion  = ko.observable('');
  self.estado  = ko.observable('');
  self.centro  = ko.observable('');
  self.estadoa = ko.observableArray();
  self.centroa = ko.observableArray();

  self.get = function(){
    var url = base_url_api+'cuadrante/read'; 
    $.getJSON(url, function(data){
     self.cuadrante(data.response);
   });
  }

  self.getstock = function(){
    var url = base_url_api+'cuadrante/stock/'+self.centro();
    $.getJSON(url, function(data){
      self.stock(data.response.cantidad_cuadrante);
    });
  }

  self.getsaldo = function(){
    self.saldo(self.stock()-self.crear());
  }

  self.getestadoa = function(){
    var url = base_url_api+'cuadrante/estados';
    $.getJSON(url, function(data){
      self.estadoa(data.response);
    });
  }

  self.getcentroa = function(){
    var url = base_url_api+'cuadrante/centros';
    $.getJSON(url, function(data){
      self.centroa(data.response);
    });
  }

  self.save = function(){

    var par = { 
      centro: {
        centro: self.centro(),
        saldo   : self.saldo()
      }
    };
    $.ajax({
     type: "PUT",
     url: base_url_api+'centro/update2',
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
           cuadrante: {
            id      : self.id(),
            nombre    : self.nombre(),
            cantidad  : self.cantidad(),
            crear  : self.crear(),
            estado    : self.estado(),
            centro    : self.centro(),
            folio   : self.folio(),
            fecha_i  : self.fecha_i(),
            observacion    : self.observacion()
          }
        };
        $.ajax({
         type: "PUT",
         url: base_url_api+'cuadrante',
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
    			cuadrante: {
           nombre    : self.nombre(),
           cantidad  : self.cantidad(),
           crear  : self.crear(),
           estado    : self.estado(),
           centro    : self.centro(),
           folio   : self.folio(),
           fecha_i  : self.fecha_i(),
           observacion    : self.observacion()
         }
       };
       $.ajax({
         type: "POST",
         url: base_url_api+'cuadrante', 
         headers : {
          'Content-Type' : 'application/json'
        },
        data: JSON.stringify(params),
        dataType: 'json',
        success: function (data, status, xhr) {
	                //console.log(data.response);
	                self.cuadrante.push(data.response);
               },
               error: function (request, status, error) {
                console.log(request.responseText);
              }
            });
     }
     self.clean();
   }
   self.edit = function(cuadrante){
     self.id(cuadrante.id_cuadrante);
     self.folio(cuadrante.folio_cuadrante);
     self.nombre(cuadrante.nombre_cuadrante);
     self.cantidad(cuadrante.cantidad_linea);
     self.fecha_i(cuadrante.fecha_inicio);
     self.observacion(cuadrante.observacion);
     self.estado(cuadrante.id_estado_fk);
     self.crear(cuadrante.unidad_cuadrante);
     self.centro(cuadrante.id_c_cultivo_fk);
   }
   self.delete = function(cuadrante){
     $.ajax({
      type: "DELETE",
      url: base_url_api+'cuadrante/'+cuadrante.id_cuadrante,
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
     self.cuadrante.remove(cuadrante);
   }
   self.clean = function(){
     self.id(0);
     self.fecha_i('');
     self.centro();
     self.stock();
     self.crear();
     self.saldo();
     self.nombre('');
     self.folio('');
     self.estado();
     self.cantidad('');
     self.observacion(''); 
   }
 }
 $(document).ready(function(){
   CuadranteVM = new CuadranteViewModel();
   CuadranteVM.get();
   CuadranteVM.getestadoa();
   CuadranteVM.getcentroa();
   ko.attach("CuadranteViewModel", CuadranteVM);
 });