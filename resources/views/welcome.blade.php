<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        {{-- DataTable CSS --}}
        <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    </head>
    <body>

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <table id="example" class="table table-bordered" width="100%" cellspacing="0" class="display">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Fecha de nacimiento</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <hr>

            <div class="row">

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Editar</h5>
                        </div>
                        <div class="card-body">
                            <form id="edit-person">
                                <label>Name:</label>
                                <input id="name" class="form-control" type="text">
                                <label>Last Name:</label>
                                <input id="last-name" class="form-control" type="text">
                                <label>Email:</label>
                                <input id="email" class="form-control" type="text">
                                <button id="btn-guardar" type="button" class="btn btn-sm btn-primary mt-2">guardar</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Fecha de nacimiento</th>
                                <th>Email</th>
                                <th rowspan="2">opciones</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tPerson"></tbody>
                    </table>
                </div>

            </div>

        </div>
        
        <script type="text/javascript">
            window.CSRF_TOKEN = '{{ csrf_token() }}'
        </script>

        <script src="{{asset('assets/js/people.js')}}" type="module"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        
        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    serverSide: true,
                    pageLength: 5,
                    ajax: { 
                        url: '{!! route('people.index') !!}',
                        type: 'GET'
                    },
                    columns: [
                        { data: 'name', name: 'name' },
                        { data: 'last_name', name: 'last_name' },
                        { data: 'email', name: 'email'  },
                        { data: 'born_day', name: 'born_day' }
                    ],
                    "language":{
                        "info": "_TOTAL_ registros",
                        "search": "Buscar:",
                        "paginate": {
                            "next": ">>",
                            "previous": "<<"
                        },
                        "lengthMenu": 'Mostrar <select>'+
                                    '<option value="5">5</option>'+
                                    '<option value="10">10</option>'+
                                    '<option value="20">20</option>'+
                                    '<option value="40">40</option>'+
                                    '<option value="-1">Todos</option>'+
                                    '</select> registros',
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "emptyTable": "No hay datos",
                        "zeroRecords": "No hay coincidencias",
                        "infoEmpty": "",
                        "infoFiltered": ""
                    }
                });
            } );
        </script>
    </body>
</html>
