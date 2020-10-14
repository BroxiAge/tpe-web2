document.addEventListener("DOMContentLoaded",iniciarPagina);
function iniciarPagina(){

  "use strict";

  let botonEliminarTodo = document.getElementById("boton-eliminar-todo");
  botonEliminarTodo.addEventListener("click", eliminarTodo);

  function eliminarTodo(){
    productos.splice(0,productos.length);
    generarTablaProductos(productos);
  }

  let inputCantidadProductos = document.getElementById('cantidad-productos');
  inputCantidadProductos.addEventListener("keypress" , function (e) {
    if (e.keyCode === 13) {
 // Cancel the default action, if needed
    e.preventDefault();}

  });


  let inputEliminarProducto = document.getElementById("input-eliminar-producto");
  inputEliminarProducto.addEventListener("keypress" , function (e) {
    if (e.keyCode === 13) {
 // Cancel the default action, if needed
    e.preventDefault();}

  });

  let botonEliminarProducto = document.getElementById('boton-eliminar-producto');
  botonEliminarProducto.addEventListener("click" , eliminarProducto);
  

  function eliminarProducto() {
    let arregloProductos = productos;
    let productoAeliminar = document.getElementById("input-eliminar-producto").value;
    for (let i = 0; i < arregloProductos.length; i++) {
      if (arregloProductos[i].codigo == productoAeliminar) {
        arregloProductos.splice(i,1);
      }
    }
    generarTablaProductos(arregloProductos);
  }

  

  let botonCantidadProductos = document.getElementById('boton-cantidad-productos');
  botonCantidadProductos.addEventListener("click", generarFormAgregarProductos);

  let productos = [
          {
            "codigo": "2332",
            "vehiculo" : "Ford focus",
            "pieza" : "extremo",
            "precio" : 3000
          },
          {
            "codigo": "3232",
            "vehiculo" : "Chevrolet corsa",
            "pieza" : "rotula",
            "precio" : 4500
          },
          {
            "codigo": "4001",
            "vehiculo":"Renault clio",
            "pieza": "cremallera",
            "precio":18000,
          },
          {
            "codigo": "5590",
            "vehiculo":"Toyota corolla",
            "pieza": "axial izquierdo",
            "precio":4500,
          },
          {
            "codigo": "5591",
            "vehiculo":"Toyota corolla",
            "pieza": "axial derecho",
            "precio":4500,
          },
          {
            "codigo": "6001",
            "vehiculo":"Fiat uno",
            "pieza": "cremallera",
            "precio":14000,
          },
          {
            "codigo": "6432",
            "vehiculo":"Fiat uno",
            "pieza": "rotula izq",
            "precio":1000,
          },


    ];

    generarTablaProductos(productos);

    function generarFormAgregarProductos() {
      let inputCantidadProductos = document.getElementById("cantidad-productos").value;
      let contenedorForm = document.getElementById('contenedor-form-agregar-productos');
      let form = document.createElement("form");


          for (let i = 0; i < inputCantidadProductos; i++) {
            let labelCodigo = document.createElement("label");
               labelCodigo.setAttribute("for" , "input-codigo-"+i);
            labelCodigo.innerText = "Codigo: ";
            let inputCodigo = document.createElement("input");
            inputCodigo.setAttribute("id", "input-codigo-"+i);
            let labelVehiculo = document.createElement("label");
                labelVehiculo.setAttribute("for" , "input-vehiculo-"+i);
            labelVehiculo.innerText = "Vehiculo: ";
            let inputVehiculo = document.createElement("input");
            inputVehiculo.setAttribute("id", "input-vehiculo-"+i);
            let labelPieza = document.createElement("label");
                labelPieza.setAttribute("for" , "input-pieza-"+i);
            labelPieza.innerText = "Pieza: ";
            let inputPieza = document.createElement("input");
            inputPieza.setAttribute("id", "input-pieza-"+i);
            let labelPrecio = document.createElement("label");
                labelPrecio.setAttribute("for" , "input-precio-"+i);
            labelPrecio.innerText = "Precio: ";
            let inputPrecio = document.createElement("input");
            inputPrecio.setAttribute("id", "input-precio-"+i);
            inputPrecio.setAttribute("type", "number");
            form.appendChild(labelCodigo);
            form.appendChild(inputCodigo);
            form.appendChild(labelVehiculo);
            form.appendChild(inputVehiculo);
            form.appendChild(labelPieza);
            form.appendChild(inputPieza);
            form.appendChild(labelPrecio);
            form.appendChild(inputPrecio);
          }

          let botonAgregarProductos = document.createElement("button");
          botonAgregarProductos.innerText = "Agregar productos";
          botonAgregarProductos.value = inputCantidadProductos;
          botonAgregarProductos.addEventListener("click",function (e) {
            e.preventDefault();
            for (let i = 0; i < inputCantidadProductos; i++) {
              let inputCodigoNuevo = document.getElementById('input-codigo-'+i).value;
              let inputVehiculoNuevo = document.getElementById("input-vehiculo-"+i).value;
              let inputPiezaNueva = document.getElementById('input-pieza-'+i).value;
              let inputPrecioNuevo = document.getElementById("input-precio-"+i).value;
              agregarProducto(productos,inputCodigoNuevo,inputVehiculoNuevo, inputPiezaNueva,inputPrecioNuevo);
            }
          })
          form.appendChild(botonAgregarProductos);
          contenedorForm.innerHTML = "";
          contenedorForm.appendChild(form);
    }

    function generarTablaProductos(productos) {
      let contenedorTabla = document.getElementById('contenedor-tabla-productos');
          let tabla = document.createElement("table");

              let thead = document.createElement("thead");
                  let filaThead = document.createElement("tr");
                      let celdaCodigoThead = document.createElement("td");
                      celdaCodigoThead.innerText = "Código";
                      let celdaVehiculoThead = document.createElement("td");
                          celdaVehiculoThead.innerText = "Vehiculo";
                      let celdaPiezaThead = document.createElement("td");
                          celdaPiezaThead.innerText = "Pieza";
                      let celdaPrecioThead = document.createElement("td");
                          celdaPrecioThead.innerText = "Precio";
                  filaThead.appendChild(celdaCodigoThead);
                  filaThead.appendChild(celdaVehiculoThead);
                  filaThead.appendChild(celdaPiezaThead);
                  filaThead.appendChild(celdaPrecioThead);
              thead.appendChild(filaThead);

              let tBody = document.createElement("tbody");
              for (var i = 0; i < productos.length; i++) {
                  let tr = document.createElement("tr");
                      let celdaCodigo = document.createElement("td");
                          celdaCodigo.innerText = productos[i].codigo;
                      let celdaVehiculo = document.createElement("td");
                          celdaVehiculo.innerText = productos[i].vehiculo;
                       let celdaPieza = document.createElement("td");
                          celdaPieza.innerText = productos[i].pieza;
                      let celdaPrecio = document.createElement("td");
                          celdaPrecio.innerText = productos[i].precio;

                  tr.appendChild(celdaCodigo)
                  tr.appendChild(celdaVehiculo);
                  tr.appendChild(celdaPieza);
                  tr.appendChild(celdaPrecio);
              tBody.appendChild(tr);
              }

          tabla.appendChild(thead);
          tabla.appendChild(tBody);

      contenedorTabla.innerHTML = "";
      contenedorTabla.appendChild(tabla);


    }

    function agregarProducto(arregloProductos, codigo, vehiculo, pieza, precio){
      let productoNuevo =  {
                            "codigo" : codigo,
                            "vehiculo" : vehiculo,
                            "pieza" : pieza,
                            "precio" : precio
                            }
      arregloProductos.push(productoNuevo);
      generarTablaProductos(arregloProductos);
    }

}
