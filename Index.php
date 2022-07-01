<!DOCTYPEhtml>
< html  idioma = " es " >
< cabeza >
  < juego de caracteres meta  = " UTF-8 " >
  < meta  nombre = " ventana gráfica "  contenido = " ancho = ancho del dispositivo, escala inicial = 1.0 " >
  < título >Documento</ título >
  < enlace  rel = " hoja de estilo "  href = " bootstrap.min.css " >
    < guión  src = " https://code.jquery.com/jquery-3.6.0.min.js " ></ guión >  
    < secuencia de comandos  src = " https://unpkg.com/dropzone@5/dist/min/dropzone.min.js " ></ secuencia de comandos >
    < link  rel = " hoja de estilo "  href = " https://unpkg.com/dropzone@5/dist/min/dropzone.min.css "  type = " text/css " />
    < guión >
     $(documento).on("clic","#btn_publicar",()=> {
         const  usuario = $( " #pub_usuario " ) . valor ();
         const  desc = $( " #pub_descripcion " ) . valor ();
         const  estado = $( " #pub_estado " ) . valor ();
         $ . ajax ({
          url : ' acciones_publicaciones.php ' ,
          datos :{ usuario : usuario , desc : desc , estado : estado },
          escriba : ' POST ' ,
          tipo de datos : ' json ' ,
          exito :( datos ) => {
            consola _ registro ( datos );
                $( " #aux_id " ) . val ( datos [ 0 ] . pub_id );
                $( " #estado " ) . texto ( datos [ 0 ] . pub_estado );
                $( " #publicacion " ) . texto ( datos [ 0 ] . pub_descripcion );
                if ( dato [ 0 ] . pub_estado == ' Alegre ' ){
                   $( " .cont_publicacion " ) . removeClass ( " bg-primary " );
                   $( " .cont_publicacion " ) . removeClass ( " bg-advertencia " );
                   $( " .cont_publicacion " ) . addClass ( " bg-éxito " );
                }
                if ( datos [ 0 ] . pub_estado == ' Triste ' ){
                   $( " .cont_publicacion " ) . removeClass ( " bg-success " );
                   $( " .cont_publicacion " ) . removeClass ( " bg-advertencia " );
                   $( " .cont_publicacion " ) . addClass ( " bg-primario " );
                }
                if ( datos [ 0 ] . pub_estado == ' Molesto ' ){
                   $( " .cont_publicacion " ) . removeClass ( " bg-success " );
                   $( " .cont_publicacion " ) . removeClass ( " bg-primary " );
                   $( " .cont_publicacion " ) . addClass ( " bg-advertencia " );
                }
          }, error :( desc , estado ) => {
                // 500 401 404 200
                alert ( " Un error ha sucedido " + estado );
            },
         })
     } );
    </ guión >
</ cabeza >
< cuerpo >
  < h1  class = " bg-success " >Vida Nueva - Publicaciones para subir a git</ h1 >
    < h4 >Sistema de publicaciones de 2do Informática</ h4 >
  < div  clase = " contenedor " >
      < div  clase = " fila " >
        < clase div  = " col-md-6 " >
          < tipo de entrada  = " texto " id = " pub_usuario " placeholder = " Usuario " class = " form-control " >   
          < textarea   id = " pub_descripcion "  filas = " 2 "  class = " form-control " ></ textarea >
          < select  id = " pub_estado "  class = " form-control bg-dark " >
            < option  value = " " >Elija una opción</ option >
            < valor de opción  = " Alegre " >Alegre</ opción >
            < valor de opción  = " Triste " > Triste </ opción >
            < valor de opción  = " Molesto " >Molesto</ opción >
          </ seleccionar >
          < div  class = " d-grid gap-2 " >
            < button  class = " btn btn-primary "  id = " btn_publicar " >Publicar</ button >
          </ div >
        </ div >
        < clase div  = " col-md-6 " >
        < div  clase = " col-md-3 " >
          
          < div  id = " dropz "  class = " dropzone " ></ div >
        </ div >       
          < div  id = " pub_img "  class = " dropzone " ></ div >
          < tipo de entrada  = " oculto " id = " aux_id " > 
        </ div >
      </ div >
@@ -109,15 +106,20 @@
</ html >
< guión >
var myDropzone = new Dropzone("#dropz", {
    url : " acciones_publicaciones.php " ,
         dictDefaultMessage : ' Arrastre el archivo aquí o haga clic para cargar ' , // Establezca la declaración de solicitud preestablecida
         paramName : " file " , // El nombre del parámetro pasado al fondo
nueva zona de descenso("#pub_img", {
    url : ' acciones_publicaciones.php ' ,
    dictDefaultMessage : ' Arrastre el archivo aquí o haga clic para cargar ' , // Establezca la declaración de solicitud preestablecida
    paramName : " file " , // El nombre del parámetro pasado al fondo
    inicializar : función () {
        esto _ on ( " enviando " , función ( archivo , xhr , formData ){
            datos de formulario . agregar ( " aux_id " ,$( " #aux_id " ) . val () );
        } );
        this.on("éxito", función (archivo, datos) {
            consola _ registro ( datos );
            $( " #aux_img " ) . attr ( ' origen ' ,` img / ${ datos }`)
                         // Evento desencadenado por una carga exitosa
        } );
    }
});
</ guión >
