


const loginForDoc = document.getElementById('test');


// loginForDoc.addEventListener('click', () => {
//     alert("has clickeado");
//     console.log("miiiamsidas");
// });


function mostrarDocLogin() {
    var doc_inicio = document.getElementById("doc_inicio");
    var doc_login = document.getElementById("doc_login");

    doc_inicio.style.opacity = '0';
    window.setTimeout(
        function removethis() {
            doc_inicio.style.display = 'none';
            doc_login.style.display = 'block';

        }, 300);
}



function mostrarFarmaciaLogin() {
    var doc_inicio = document.getElementById("doc_inicio");
    var farmacia_login = document.getElementById("farmacia_login");

    doc_inicio.style.opacity = '0';
    window.setTimeout(
        function removethis() {
            doc_inicio.style.display = 'none';
            farmacia_login.style.display = 'block';

        }, 300);
}



function regresarFarmacia() {
    var doc_inicio = document.getElementById("doc_inicio");
    var farmacia_login = document.getElementById("farmacia_login");

    doc_inicio.style.opacity = '1';
    window.setTimeout(
        function removethis() {
            doc_inicio.style.display = 'block';
            farmacia_login.style.display = 'none';

        }, 300);
}

function regresarDoctor() {
    var doc_inicio = document.getElementById("doc_inicio");
    var doc_login = document.getElementById("doc_login");

    doc_inicio.style.opacity = '1';
    window.setTimeout(
        function removethis() {
            doc_inicio.style.display = 'block';
            doc_login.style.display = 'none';

        }, 300);
}



function ingresarDoctorT() {
    //window.location.href = "http://localhost/admin"

    var first_message = document.getElementById("first_message");
    var doc_login = document.getElementById("doc_login");
    window.setTimeout(
        function removethis() {
            first_message.style.display = 'block';
            doc_login.style.display = 'none';

        }, 300);
}

const textToType = "Hola, Buenos dias Yahir, en que puedo ayudarte hoy?";
const outputText = document.getElementById("output-text");

function typeText(index) {
    if (index < textToType.length) {
        outputText.innerHTML += textToType.charAt(index);
        setTimeout(() => typeText(index + 1), 100);
    }
}

document.getElementById("ingresarDoctor").addEventListener("click", () => {
    //outputText.innerHTML = ""; // Clear the text
    //typeText(0); // Start typing animation

    window.location = "http://localhost/admin"
});



function regresarAInicio() {

    window.location = "http://localhost/admin"

}


function mostrarListaRecetas() {
    var inicio = document.getElementById("contenido");
    var recetas = document.getElementById("recetas");

    inicio.style.opacity = '0';
    window.setTimeout(
        function removethis() {
            inicio.style.display = 'none';
            recetas.style.display = 'block';

        }, 300);
}

function listapaciente() {
    var inicio = document.getElementById("contenido");
    var listapacientes = document.getElementById("listapacientes");

    inicio.style.opacity = '0';
    window.setTimeout(
        function removethis() {
            inicio.style.display = 'none';
            listapacientes.style.display = 'block';

        }, 300);
}




function buscarPaciente() {
    const paragraph = document.getElementById("noResults");
    paragraph.textContent = "";

    const tableBody = document.querySelector("#resultadoPacientes tbody");


    tableBody.innerHTML = "";

    var busqueda = document.getElementById("busqueda").value;

    console.log(busqueda);


    let formData = new FormData();
    formData.append('busqueda', busqueda);
    //formData.append('password', 'John123');

    fetch('/SearchController/search', {
        method: 'POST',
        body: formData,
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);

            if (data.length != 0) {


                const tableData = [];

                const p = {
                    col1: 'Nombre',
                    col2: 'Apellidos',
                    col3: 'Edad',
                    col4: 'CURP',
                    col5: '', // Create a button inside the data
                };

                tableData.push(p);


                data.forEach(function (paciente) {
                    const p = {
                        col1: paciente['nombre'],
                        col2: paciente['primer_apellido'] + ' ' + paciente['segundo_apellido'],
                        col3: paciente['edad'],
                        col4: paciente['curp'],
                        col5: '<button type="button" onclick="getRecetas(event)" value="' + paciente['id'] + '" class="btn" style="background-color:transparent;color:black;">Seleccionar</button>', // Create a button inside the data
                    };
                    tableData.push(p);
                });

                tableBody.innerHTML = "";

                // Loop through the data and append rows to the table
                tableData.forEach(data => {
                    const row = document.createElement("tr");
                    for (const key in data) {
                        const cell = document.createElement("td");
                        // Use innerHTML to insert the button
                        cell.innerHTML = data[key];
                        row.appendChild(cell);
                    }
                    tableBody.appendChild(row);
                });

            } else {

                // Create the text you want to append
                const newText = document.createTextNode("No hay resultados para ese paciente");

                // Append the text to the paragraph
                paragraph.appendChild(newText);

            }


            // Handle the response from the controller
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });


}



function getRecetas(event) {

    const divElement = document.getElementById("regresar");

    const paragraph = document.getElementById("noResults");
    paragraph.textContent = "";

    const tableBody = document.querySelector("#resultadoPacientes tbody");


    tableBody.innerHTML = "";

    var busqueda = event.target.value;

    console.log(busqueda);


    let formData = new FormData();
    formData.append('busqueda', busqueda);
    //formData.append('password', 'John123');

    fetch('/SearchController/recetas', {
        method: 'POST',
        body: formData,
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {

            console.log(data);

            if (data.length != 0) {


                const tableData = [];

                const p = {
                    col1: 'Folio',
                    col2: 'Fecha',
                    col3: 'Status',

                };

                tableData.push(p);


                data.forEach(function (paciente) {

                    const today = new Date();

                    var status = '';



                    // Create the target date (2023-04-15)
                    const targetDate = new Date(paciente['fecha_expiracion']);



                    // Compare the target date with today's date
                    if (targetDate > today) {

                        //status = 'greater';
                        status = '<p style="text-align: left">&#128308;</p>';




                    } else if (targetDate < today) {

                        status = '<p style="text-align: left">&#128994;</p>';

                    } else {
                        status = '<p style="text-align: left">&#128993;</p>';


                    }


                    const p = {
                        col1: paciente['numero_receta'],
                        col2: paciente['fecha_expiracion'],
                        col3: status,
                    };
                    tableData.push(p);
                });

                tableBody.innerHTML = "";

                // Loop through the data and append rows to the table
                tableData.forEach(data => {
                    const row = document.createElement("tr");
                    for (const key in data) {
                        const cell = document.createElement("td");
                        // Use innerHTML to insert the button
                        cell.innerHTML = data[key];
                        row.appendChild(cell);
                    }
                    tableBody.appendChild(row);
                });



            } else {

                // Create the text you want to append
                const newText = document.createTextNode("No hay recetas para este paciente");

                // Append the text to the paragraph
                paragraph.appendChild(newText);



            }

            const volver = '<button type="button" class="btn btn-default btn-sm" style="font-size: 20px" onclick="regresarAInicio()" ><span class="glyphicon glyphicon-arrow-left"></span>Regresar</button>';
            divElement.innerHTML = volver;

            // Handle the response from the controller
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
}




function buscarPacienteB() {
    const paragraph = document.getElementById("noResults");
    paragraph.textContent = "";

    const tableBody = document.querySelector("#resultadoPacientes tbody");


    tableBody.innerHTML = "";

    var busqueda = document.getElementById("busquedab").value;

    console.log(busqueda);


    let formData = new FormData();
    formData.append('busqueda', busqueda);
    //formData.append('password', 'John123');

    fetch('/SearchController/search', {
        method: 'POST',
        body: formData,
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);

            if (data.length != 0) {


                const tableData = [];

                const p = {
                    col1: 'Nombre',
                    col2: 'Apellidos',
                    col3: 'Edad',
                    col4: 'CURP',
                    col5: '', // Create a button inside the data
                };

                tableData.push(p);


                data.forEach(function (paciente) {
                    const p = {
                        col1: paciente['nombre'],
                        col2: paciente['primer_apellido'] + ' ' + paciente['segundo_apellido'],
                        col3: paciente['edad'],
                        col4: paciente['curp'],
                        col5: '<button type="button" onclick="generarReceta(event)" value="' + paciente['id'] + '" class="btn" style="background-color:transparent;color:black;">Generar receta</button>', // Create a button inside the data
                    };
                    tableData.push(p);
                });

                tableBody.innerHTML = "";

                // Loop through the data and append rows to the table
                tableData.forEach(data => {
                    const row = document.createElement("tr");
                    for (const key in data) {
                        const cell = document.createElement("td");
                        // Use innerHTML to insert the button
                        cell.innerHTML = data[key];
                        row.appendChild(cell);
                    }
                    tableBody.appendChild(row);
                });

            } else {

                // Create the text you want to append
                const newText = document.createTextNode("No hay resultados para ese paciente");

                // Append the text to the paragraph
                paragraph.appendChild(newText);

            }


            // Handle the response from the controller
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });


}



function generarReceta(event) {

    var listapacientes = document.getElementById("listapacientes");
    var resultadoPacientes = document.getElementById("resultadoPacientes");
    var gr = document.getElementById("gr");


    listapacientes.style.opacity = '0';
    resultadoPacientes.style.opacity = '0';

    window.setTimeout(
        function removethis() {
            listapacientes.style.display = 'none';
            resultadoPacientes.style.display = 'none';
            gr.style.display = 'block';


        }, 300);




    var id_paciente = event.target.value;

    console.log(id_paciente);

    let formData = new FormData();
    formData.append('busqueda', id_paciente);

    fetch('/SearchController/buscarPacientePorId', {
        method: 'POST',
        body: formData,
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
 


            // Add content to the cells (you can change this content)

            var paragraph = document.getElementById("paciente");

            // Add text to the paragraph
            paragraph.innerHTML = data[0]['nombre'] + ' ' + data[0]['primer_apellido'] + ' ' + data[0]['segundo_apellido'] ;

            var paragraph = document.getElementById("edadpaciente");

            // Add text to the paragraph
            paragraph.innerHTML = data[0]['edad'] ;


            var paragraph = document.getElementById("idpaciente");

            // Add text to the paragraph
            paragraph.innerHTML = data[0]['id'] ;



            
          

        })
        .catch(error => {
            console.error('Fetch error:', error);
        });



}



function buscarMedicamento() {
    const paragraph = document.getElementById("noResults");
    paragraph.textContent = "";

    const tableBody = document.querySelector("#resultadoMedicamentos tbody");


    tableBody.innerHTML = "";

    var busqueda = document.getElementById("busquedaC").value;

    console.log(busqueda);


    let formData = new FormData();
    formData.append('busqueda', busqueda);
    //formData.append('password', 'John123');

    fetch('/SearchController/buscarMedicamento', {
        method: 'POST',
        body: formData,
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);

            if (data.length != 0) {


                const tableData = [];

                const p = {
                    col1: 'Nombre',
                    col2: 'Tipo',
                    col3: 'Dosis',
                    col5: 'Opcion'

                };

                tableData.push(p);


                data.forEach(function (medicamento) {
                    const p = {
                        col1: medicamento['nombre'],
                        col2: medicamento['tipo'],
                        col3: medicamento['dosis'],
                        col5: '<button type="button" onclick="addMedicamento(event)" value="' + medicamento['id'] + '" class="btn" style="background-color:transparent;color:black;">Agregar</button>', // Create a button inside the data
                    };
                    tableData.push(p);
                });

                tableBody.innerHTML = "";

                // Loop through the data and append rows to the table
                tableData.forEach(data => {
                    const row = document.createElement("tr");
                    for (const key in data) {
                        const cell = document.createElement("td");
                        // Use innerHTML to insert the button
                        cell.innerHTML = data[key];
                        row.appendChild(cell);
                    }
                    tableBody.appendChild(row);
                });

            } else {

                // Create the text you want to append
                const newText = document.createTextNode("No hay resultados para ese paciente");

                // Append the text to the paragraph
                paragraph.appendChild(newText);

            }


            // Handle the response from the controller
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });


}

function generarRecetaPDF() {



    var tabla = document.getElementById("medicamentosReceta");

    // Crear un arreglo para almacenar los datos
    var datos = [];

    // Recorrer todas las filas de la tabla
    for (var i = 1; i < tabla.rows.length; i++) { // Comenzamos desde 1 para evitar el encabezado
        var fila = tabla.rows[i];
        var filaDatos = [];

        // Recorrer las celdas de la fila actual
        for (var j = 0; j < fila.cells.length; j++) {
            var celda = fila.cells[j];
            filaDatos.push(celda.textContent);
        }

        datos.push(filaDatos);
    }

    // Mostrar los datos en la consola (puedes hacer lo que quieras con ellos)
    console.log(datos);


    let formData = new FormData();
    var datos = JSON.stringify(datos);
    const diagnostico = document.getElementById("diagnostico").value;


    var span = document.getElementById("idpaciente");

    // Get the value from the span
    var idpaciente = span.innerHTML;

    formData.append('datos', datos);
    formData.append('idpaciente', idpaciente);
    formData.append('diagnostico', diagnostico);





    fetch('/SearchController/guardarDatosReceta', {
        method: 'POST',
        body: formData,
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {

            console.log(data);

            window.location = "http://localhost/generatePDF"


        })
        .catch(error => {
            console.error('Fetch error:', error);
        });




}

function addMedicamento(event) {

    var id_medicamento = event.target.value;

    var tablafinal = document.getElementById("medicamentosReceta");

    console.log(id_medicamento);

    let formData = new FormData();
    formData.append('busqueda', id_medicamento);


    fetch('/SearchController/buscarMedicamentoPorId', {
        method: 'POST',
        body: formData,
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);



            var newRow = tablafinal.insertRow();

            // Create cells for the new row
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);


            // Add content to the cells (you can change this content)
            cell1.innerHTML = data[0]['nombre'];
            cell2.innerHTML = data[0]['tipo'];
            cell3.innerHTML = data[0]['dosis'];
            cell4.innerHTML = '<td><button onclick="deleteRow(this)">Eliminar</button></td';

            // if (data.length != 0) {


            //     const tableData = [];

            //     const p = {
            //         col1: 'Nombre',
            //         col2: 'Tipo',
            //         col3: 'Dosis'
            //     };

            //     tableData.push(p);


            //     data.forEach(function (medicamento) {
            //         const p = {
            //             col1: medicamento['nombre'],
            //             col2: medicamento['tipo'] ,
            //             col3: medicamento['dosis'],
            //             col5: '<button type="button" onclick="addMedicamento(event)" value="' + medicamento['id'] + '" class="btn" style="background-color:transparent;color:black;">Agregar</button>', // Create a button inside the data
            //         };
            //         tableData.push(p);
            //     });

            //     tableBody.innerHTML = "";

            //     // Loop through the data and append rows to the table
            //     tableData.forEach(data => {
            //         const row = document.createElement("tr");
            //         for (const key in data) {
            //             const cell = document.createElement("td");
            //             // Use innerHTML to insert the button
            //             cell.innerHTML = data[key];
            //             row.appendChild(cell);
            //         }
            //         tableBody.appendChild(row);
            //     });

            // } 


            // Handle the response from the controller
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });

}



function deleteRow(row) {
    var i = row.parentNode.parentNode.rowIndex;
    document.getElementById("medicamentosReceta").deleteRow(i);
}