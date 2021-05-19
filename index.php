<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta API-REST PHP</title>
    <style>
        .title{
            padding: 10px 10px;
            text-align: center;
        }
        table{
            width: 70%;
            margin: auto;
        }
        td{
            border: thin dotted black;
            padding: 5px 10px;
        }
        th{
            border: thin solid blue;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <div class="title">
        <h2>Consulta API-REST PHP</h2>
    </div>
    <span>Press Button : </span>
    <input type="text" id="datos">
    <button type="submit" id="boton">Mostrar</button>
    <p>Resultado :</p>
    <div>
        <table>
            <thead>
                <tr>
                    <th colspan="5">LISTADO</th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>CODIGO</th>
                    <th>MARCA</th>
                    <th>MODELO</th>
                    <th>MEDIDA</th>
                </tr>
            </thead>
            <tbody id="contenido"></tbody>
        </table>
    </div>
    <script>
        let boton = document.querySelector('#boton');
        let grilla = document.createElement('p');
        var contenido = document.getElementById('contenido');

        boton.addEventListener( 'click', function() {
            let datos = document.getElementById('datos').value;
            if( datos != null && datos != "" ){
                fetch("http://localhost/www/api_gestion_slim3/public/productos/neumaticos/"+datos)
                    .then(res => res.json())
                    .then(data => {
                         data.forEach( Element => {
                            listado(Element);
                            contenido.innerHTML = grilla.textContent;
                        });
                    })
                    .catch(function(err) {
                        console.log(err);
                        contenido.innerHTML = err;
                    });
            }else{
                fetch("http://localhost/www/api_gestion_slim3/public/productos/neumaticos")
                    .then(res => res.json())
                    .then(data => {
                        data.forEach( Element => {
                            listado(Element);
                            contenido.innerHTML = grilla.textContent;
                        });
                     })
                    .catch(function(err) {
                        console.log(err);
                        contenido.innerHTML = err;
                    });
            }
        })

        function listado(Element){
            grilla.append(
                `<tr>
                    <td>${Element.id}</td>
                    <td>${Element.cod_Articulo}</td>
                    <td>${Element.marca}</td>
                    <td>${Element.modelo}</td>
                    <td>${Element.medida}</td>
                </tr>`
            );
        }
    </script>
</body>
</html>