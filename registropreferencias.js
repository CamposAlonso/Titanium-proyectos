
var tabGroup = Titanium.UI.createTabGroup();
var win1 = Titanium.UI.createWindow({  
    title:'Evento',
    backgroundColor:'#c5ccd4'
});
var tab1 = Titanium.UI.createTab({  
    icon:'KS_nav_views.png',
    title:'Eventos',
    window:win1
});

              var sendit = Ti.Network.createHTTPClient({ 
                     onerror: function(e){ 
                           Ti.API.debug(e.error); 
                           alert('There was an error during the connection'); 
                     }, 
                  timeout:3000, 
              });                      
              //Here you have to change it for your local ip 
              sendit.open('GET', 'http://alonsocampos.net46.net/preferencia.php'); 
              sendit.send(); 
              //Function to be called upon a successful response 
              sendit.onload = function(){ 
                     var json = JSON.parse(this.responseText); 
                     //json.nombre viene de un array de php en el servidor
                     var json = json.nombre; 
                     //if the database is empty show an alert 
                     if(json.length == 0){ 
                            tableView.headerTitle = "The database row is empty"; 
                     }                      
                     //Emptying the data to refresh the view 
                     dataArray = [];
                     dataArray2 = [];
                     dataArray3 =[];
                     var scrollView = Ti.UI.createScrollView({
						  //contentWidth: 'auto',
						  contentHeight: 'auto',
						  showVerticalScrollIndicator: true,
						  //showHorizontalScrollIndicator: true,
						  height: '90%',
						  width: 500
						});
                     var view = Ti.UI.createView({
						  backgroundColor:'c5ccd4',
						  borderRadius: 10,
						  top: 0,
						  height:1000,
						  width: 500
					});
					
					scrollView.add(view);
                     //Insert the JSON data to the table view 
                     for( var i=0; i<json.length; i++){ 
                     	
                     	var tableViewAcademica = Titanium.UI.createTableView({
                     		borderRadios:10,
                     		backgroundColor:'white',
                     		top:2,
                     		width:"auto", height:442
                     	});
                     	
                     	var row = Ti.UI.createTableViewRow({    					
	    					selectedBackgroundColor:'yellow',
	    					height:40
							});
					  //La variable valor se crea para poder capturar si el boton esta marcado o no
					   var valor =0;	
					   //La variable id se utiliza para identificar el numero de la fila en que esta posicionado
					   	
							
						  	if(json[i].tipo=="Academica" && json[i].detalles==""){
						  		var basicSwitch = Ti.UI.createSwitch({
								  value:true,
								  right:0
								});
								row.add(basicSwitch);
								var labelUserName = Ti.UI.createLabel({
							    color:'black',
							    font:{fontFamily:'Arial', fontSize:16, fontWeight:'bold'},
							    text:'  ' + json[i].tipo,
							    objName: 'nombre',
							    left:0, top: 6,
							    width:360, height: 30
							  	});
							  	row.add(labelUserName);
						  	}else{
						  		var labelUserName = Ti.UI.createLabel({
							    color:'black',
							    font:{fontFamily:'Arial', fontSize:16, fontWeight:'bold'},
							    text:'*' + json[i].detalles,
							    objName: 'nombre',
							    left:0, top: 6,
							    width:360, height: 30
							  	});
							  	row.add(labelUserName);
							  	
							  	var button = Ti.UI.createButton({
								    backgroundImage: 'off.png',
								    //backgroundSelectedImage:'on.png',
								    //title: 'Click me!',
								    top: 3,
								    width: 37,
								    height: 35,
								    right:0
								});
							  	button.on = function() {
								    this.backgroundColor = '#159902';
								    this.value = true;
								    this.backgroundImage ="on.png";
								    valor =1;
								};
							 
								button.off = function() {
								    this.backgroundColor = '#aaa';
								    this.value = false;
								    this.backgroundImage ="off.png";
								    valor =0;
								};
							 
								button.addEventListener('click', function(e) {
								    if(false == e.source.value) {
								        e.source.on();
								        alert(valor+"/");
								    } else {
								        e.source.off();
								         alert(valor+"/");
								    }
								});
							  	row.add(button);
						  	}
						  	
						  	
								if (json[i].tipo=="Academica" || json[i].tipo =="Area de Estudio") {
                     				dataArray.push(row);     	
                     			};
                     	
                     	
						        
                     };
                     tableViewAcademica.setData(dataArray);
                     view.add(tableViewAcademica);
                     
                     
                     win1.add(scrollView);                            
               }; 
 var IMG_BASE = 'http://alonsocampos.net46.net/';
 //Array to store the data from the todo list 
var dataArray = [];
var dataArray2 = [];
var dataArray3 =[];    




tabGroup.addTab(tab1);  
tabGroup.open();
