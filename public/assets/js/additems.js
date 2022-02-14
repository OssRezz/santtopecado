const formulario = document.querySelector("#frm-producto");
const producto = document.querySelector("#producto");
const cantidad = document.querySelector("#cantidad");
const tabla = document.querySelector("tbody");

formulario.addEventListener("submit", nuevaVenta);
eventListeners();
function eventListeners() {
    producto.addEventListener("change", datosVenta);
    cantidad.addEventListener("change", datosVenta);
}

const objVentas = {
    producto: "",
    productoNombre: "",
    cantidad: "",
};

function datosVenta(e) {
    objVentas[e.target.name] = e.target.value;
    objVentas["productoNombre"] = producto.options[producto.selectedIndex].text;
    console.log(objVentas);
}

class Ventas {
    constructor() {
        this.ventas = [];
    }

    agregarVenta(venta) {
        this.ventas = [...this.ventas, venta];
    }
    eliminarVenta(id) {
        this.ventas = this.ventas.filter((auxVenta) => auxVenta.id !== id);
    }
}

class userInterface {
    imprimirAlerta(msj, tipo) {
        const mensaje = document.createElement("div");
        mensaje.classList.add("text-center", "alert", "d-block", "col-12");
        const alertBootstrap = document.querySelector(".alert");

        if (typeof alertBootstrap != "undefined" && alertBootstrap != null) {
        } else {
            if (tipo == "error") {
                mensaje.classList.add("alert-danger");
            } else {
                mensaje.classList.add("alert-light");
            }

            mensaje.textContent = msj;
            document
                .querySelector("#respuestaAlert")
                .insertBefore(
                    mensaje,
                    document.querySelector(".agregar-receta")
                );
            setTimeout(() => {
                mensaje.remove();
            }, 3000);
        }
    }

    imprimirVentas({ ventas }) {
        this.limpiarHtml();
        ventas.forEach((venta) => {
            const { producto, productoNombre, cantidad } = venta;

            const ventaContent = document.createElement("tr");

            const productoVenta = document.createElement("td");
            productoVenta.innerHTML = `${productoNombre}`;

            const cantidadVenta = document.createElement("td");
            cantidadVenta.classList.add("text-center");
            cantidadVenta.innerHTML = `${cantidad}`;

            const buttonEdit = document.createElement("td");
            buttonEdit.classList.add("text-center");

            const button = document.createElement("button");
            button.onclick = () => elimiarVenta(producto);
            button.classList.add("btn", "btn-outline-light", "btn-sm");
            button.innerHTML = "<i class='fas fa-trash'></i>";
            button.value = `${producto}`;

            buttonEdit.appendChild(button);

            ventaContent.appendChild(productoVenta);
            ventaContent.appendChild(cantidadVenta);
            ventaContent.appendChild(buttonEdit);
            tabla.appendChild(ventaContent);
        });
    }

    limpiarHtml() {
        while (tabla.firstChild) {
            tabla.removeChild(tabla.firstChild);
        }
    }
}

const ui = new userInterface();
const administrarVentas = new Ventas();

function nuevaVenta(e) {
    e.preventDefault();
    const { producto, cantidad } = objVentas;
    if (producto === "" || cantidad === "") {
        ui.imprimirAlerta("Todos los campos son obligatorios", "error");
        return;
    }

    administrarVentas.agregarVenta({ ...objVentas });
    ui.imprimirAlerta("Producto agregado");
    ui.imprimirVentas(administrarVentas);
    reiniciarObjecto();
    formulario.reset();
    console.log(administrarVentas);
}

function elimiarVenta(id) {
    administrarVentas.eliminarVenta(id);
    ui.imprimirVentas(administrarVentas);
}

function reiniciarObjecto() {
    objVentas.producto = "";
    objVentas.cantidad = "";
}
