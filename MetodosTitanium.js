var win1 = Titanium.UI.createWindow({  
    title:'Evento',
    backgroundColor:'#c5ccd4'
});
/*Este metodo permite obtener las propiedades de un objeto deseado
 * e se refire a el objeto y sus propiedades externas ubicacion y tipo de objeto
 * .source se refiere al objeto completo
 * .title es una propiedad a la que se accede debido a que source ya tiene acceso 
 * a las propiedades de todo el objeto por ejemplo el color de fondo seria
 * e.source.backgroundColor
 */
function Obtener(e) {
  alert(e.source.title);
   alert(e.source.backgroundColor);
}
/*
 * De igual forma que el metodo de obtener se e permite obtener el objeto deseado
 * depues e.source.title obtienen el contenido actual pero si se asigna otro valor 
 * este es modificado por uno nuevo
 */
function Fijar(e) {
  e.source.title ="OK";
  alert(e.source.title);
}

							  	
							  	var button = Ti.UI.createButton({
							  		backgroundColor:"yellow",
								    //backgroundImage: 'off.png',
								    title:"off",
								    top: 3,
								    width: 37,
								    height: 35,
								    right:0
								});
							  	
							  	button.on = function() {
								    this.backgroundColor = '#159902';
								    this.value = true;
								    //this.backgroundImage ="on.png";
								    this.title ="on";
								    
								};
							 
								button.off = function() {
								    this.backgroundColor = '#aaa';
								    this.value = false;
								    //this.backgroundImage ="off.png";
								    this.title ="off";
								    
								};
							 	
								button.addEventListener('click', function(e) {
								    if(false == e.source.value) {
								        e.source.on();
								       alert(this.title);
								       Obtener(e);
								       Fijar(e);
								    } else {
								        e.source.off();
								       alert(this.value);
								       Obtener(e);
								       Fijar(e);
								    }
								});
								
							  	win1.add(button);
win1.open();

