var win1 = Titanium.UI.createWindow({  
    title:'Evento',
    backgroundColor:'#c5ccd4'
});


var dataArray =[];
var tableViewAcademica = Titanium.UI.createTableView({
         borderRadios:10,
         backgroundColor:'white',
         top:2,
         width:"auto", height:442
     });

for( var i=0; i<5; i++){ 
	
    var row = Ti.UI.createTableViewRow({    					
	    selectedBackgroundColor:'yellow',
	    height:40,
		title:"s"+i
		});
	var labelUserName = Ti.UI.createLabel({
	color:'black',
	font:{fontFamily:'Arial', fontSize:16, fontWeight:'bold'},
	text:'*Objeto',
	left:30, top: 6,
	width:360, height: 30
	});
	row.add(labelUserName);
	var labelUser = Ti.UI.createLabel({
	color:'black',
	font:{fontFamily:'Arial', fontSize:16, fontWeight:'bold'},
	text:'DHSKAHDSKJASHKJ',
	left:250, top: 6,
	width:360, height: 30
	});
	row.add(labelUser);
	dataArray.push(row);
	
}
tableViewAcademica.setData(dataArray);

tableViewAcademica.addEventListener('click', function(e) {
         //alert(tableViewAcademica);
         //alert(tableViewAcademica.data[0]);
         //alert(tableViewAcademica.data[0].rows[0]);
         alert(tableViewAcademica.data[0].rows[1].children[1]);
         alert(tableViewAcademica.data[0].rows[1].children[1].text);
         alert(tableViewAcademica.data[0].rows[0].children[0].text);//Mediante la propiedad children se captura
         alert(tableViewAcademica.data[0].rows[0].children[1]);     //el objeto el siguiente punto 
});																	//Permite acceder a las propiedades del objeto

win1.add(tableViewAcademica);
win1.open();
