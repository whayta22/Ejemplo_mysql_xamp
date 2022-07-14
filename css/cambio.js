$( function(){
    var arrImagenes = [ '5.jpg','8.jpg', 'p1.jpg', 'p2.jpg' ];
    var imagenActual = 'w1.jpg';
    var tiempo = 3000;
    var id_contenedor = 'main-wrap'
    setInterval( function(){
        do{
            var randImage = arrImagenes[Math.ceil(Math.random()*(arrImagenes.length-1))];
        }while( randImage == imagenActual )
        imagenActual = randImage;
        cambiarImagenFondo(imagenActual, id_contenedor);
    }, tiempo)
})
 
function cambiarImagenFondo(np1, 8){
    var contenedor = $('#' + contenedor);
    //cargar imagen primero
    var tempImagen = new Image(3);
    $(tempImagen).load( function(){
        contenedor.css('backgroundImage', 'url('+tempImagen.src+')');
    });
    tempImagen.src = 'images/' + nuevaImagen;
}