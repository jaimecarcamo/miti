function CompanyViewModel(){
	var self = this;
    self.companies  = ko.observableArray();
    self.countries  = ko.observableArray();
    self.areas      = ko.observableArray();
    self.cities     = ko.observableArray();
    self.holdings   = ko.observableArray();
    self.id         = ko.observable(0);
    self.name       = ko.observable('');
    self.country_id = ko.observable(0);
    self.area_id    = ko.observable(0);
    self.city_id    = ko.observable(0);
    self.holding_id = ko.observable(0);
    self.rut        = ko.observable('');
    self.activity   = ko.observable('');
    self.address    = ko.observable('');

    self.get = function(){
        var url = base_url_api+'companies';
        $.getJSON(url, function(data){
            self.companies(data.response);
        });
    }
    self.getCountries = function(){
        var url = base_url_api+'companies/countries';
        $.getJSON(url, function(data){
            self.countries(data.response);
        });
    }
    self.getAreas = function(){
        self.areas([]);
        self.holdings([]);
        if(self.country_id() > 0){
            var url = base_url_api+'companies/areas/'+self.country_id();
            $.getJSON(url, function(data){
                self.areas(data.response);
            });
            var url = base_url_api+'companies/holdings/'+self.country_id();
            $.getJSON(url, function(data){
                self.holdings(data.response);
            });
        }
    }
    self.getCities = function(){
        self.cities([]);
        if(self.area_id() > 0){
            var url = base_url_api+'companies/cities/'+self.area_id();
            $.getJSON(url, function(data){
                self.cities(data.response);
            });
        }
    }
    self.save = function(){
    	// si existe se actualiza (PUT)
    	if(self.id() > 0){
    		var params = {
	            company: {
	                id      : self.id(),
	                name    : self.name(),
                    country_id : self.country_id(),
                    holding_id : self.holding_id(),
                    rut : self.rut(),
                    activity : self.activity(),
                    address : self.address()
	            }
	        };
	        $.ajax({
	            type: "PUT",
	            url: base_url_api+'companies',
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
	            company: {
                    name    : self.name(),
                    country_id : self.country_id(),
                    holding_id : self.holding_id(),
                    rut : self.rut(),
                    activity : self.activity(),
                    address : self.address()
                }
	        };
	        $.ajax({
	            type: "POST",
	            url: base_url_api+'companies',
	            headers : {
	                'Content-Type' : 'application/json'
	            },
	            data: JSON.stringify(params),
	            dataType: 'json',
	            success: function (data, status, xhr) {
                    console.log(data.response);
	                self.companies.push(data.response);
	            },
	            error: function (request, status, error) {
	                console.log(request.responseText);
	            }
	        });
    	}
        self.clean();
    }
    self.edit = function(c){
        self.id(c.id);
        self.country_id(c.country_id);
        self.getAreas();
        self.holding_id(c.holding_id);
        self.area_id(c.holding_id);
        self.city_id(c.holding_id);
        self.name(c.name);
        self.rut(c.rut);
        self.activity(c.activity);
        self.address(c.address);
    }
    self.delete = function(){
        
    }
    self.clean = function(){
        self.id(0);
        self.name('');
        self.country_id(0);
        self.holding_id(0);
        self.rut('');
        self.activity('');
        self.address('');
    }
}

$(document).ready(function(){
	CompanyVM = new CompanyViewModel();
    CompanyVM.get();
    CompanyVM.getCountries();
    ko.attach("CompanyViewModel", CompanyVM);
});