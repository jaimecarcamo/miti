function BiomasaViewModel(){  
	var self = this; 
	self.cuelga = ko.observableArray();
    self.cuelga2 = ko.observableArray();
    self.id =   ko.observable();
    self.fecha = ko.observable();
    self.fecha2 = ko.observable();
    self.fecha3 = ko.observable();
    self.centro  = ko.observable('');
    self.grafico  = ko.observableArray([]);
    self.grafico2  = ko.observableArray([]);
    self.factor  = ko.observableArray([]);


    self.get = function(){
        self.grafico([]);
        self.cuelga([]);
        var url = base_url_api+'biomasa/fecha/'+self.fecha()+'/'+self.fecha2(); 
        $.getJSON(url, function(data){
         self.cuelga(data.response);
         $.each(self.cuelga(), function(i,item){
            var elemento={fecha: item.fecha,peso:item.peso_inmersion,peso2:item.peso_emersion};
            self.grafico.push(elemento);

        });
         console.log(self.grafico());
         var chart = AmCharts.makeChart("chartdiv2", {
            "type": "serial",
            "theme": "patterns",
            "legend": {
                "useGraphSettings": true
            },
            "dataProvider": self.grafico(),
            "valueAxes": [{
                "integersOnly": true,
                "maximum": 140,
                "minimum": 0,
                "reversed": false,
                "axisAlpha": 0,
                "dashLength": 5,
                "gridCount": 10,
                "position": "left",
                "title": "peso"
            }],
            "startDuration": 0.5,
            "graphs": [{
                "balloonText": "peso: [[peso]] - fecha: [[fecha]]",
                "bullet": "round",
                "title": "peso inmersión",
                "valueField": "peso",
                "fillAlphas": 0
            },{
                "balloonText": "peso: [[peso2]] - fecha: [[fecha]]",
                "bullet": "round",
                "title": "peso emersión",
                "valueField": "peso2",
                "fillAlphas": 0
            }],
            "chartCursor": {
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "fecha",
            "categoryAxis": {
                "gridPosition": "start",
                "axisAlpha": 0,
                "fillAlpha": 0.05,
                "fillColor": "#000000",
                "gridAlpha": 0,
                "position": "bottom",
                "title": "fecha"
            },
            "export": {
                "enabled": true,
                "position": "bottom-right"
            }
        });
     });
    }

    self.getfecha2 = function(){
     var url = base_url_api+'biomasa/fecha2/'+self.fecha3(); 
     $.getJSON(url, function(data){
         self.cuelga2(data.response);
         $.each(self.cuelga2(), function(i,item){
            var elemento={peso:item.peso_inmersion,peso2:item.peso_emersion};
            self.grafico2.push(elemento);
        });
     });
 }

}
$(document).ready(function(){
	BiomasaVM = new BiomasaViewModel();
	ko.attach("BiomasaViewModel", BiomasaVM);
});