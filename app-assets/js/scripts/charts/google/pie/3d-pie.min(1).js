/*!
 * stack-admin-theme (https://pixinvent.com/bootstrap-admin-template/stack)
 * Copyright 2018 PIXINVENT
 * Licensed under the Themeforest Standard Licenses
 */
function drawPie3d(){var data=google.visualization.arrayToDataTable([["Task","Hours per Day"],["Work",11],["Eat",2],["Commute",2],["Watch TV",2],["Sleep",7]]),options_pie3d={title:"My Daily Activities",is3D:!0,height:400,fontSize:12,colors:["#99B898","#FECEA8","#FF847C","#E84A5F","#474747"],chartArea:{left:"5%",width:"90%",height:350}},pie3d=new google.visualization.PieChart(document.getElementById("pie-3d"));pie3d.draw(data,options_pie3d)}google.load("visualization","1.0",{packages:["corechart"]}),google.setOnLoadCallback(drawPie3d),$(function(){function resize(){drawPie3d()}$(window).on("resize",resize),$(".menu-toggle").on("click",resize)});