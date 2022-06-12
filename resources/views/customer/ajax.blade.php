<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Styles -->
        

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" defer></script>


    </head>
    <body class="antialiased">
        
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Customer list</h2>
                            <br>
                            @include('customer.link')

                            
                        </div>
                        <div class="card-body">
                            <table class="table" id="datatable">
                                <thead>
                                  <tr>
                                    <th>Full Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                              </table> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    
        <script>
            $(document).ready( function () {
                $('#datatable').DataTable({
                    "processing": true,
                    "serviceSide": true,
                    "ajax": "{{ route('api.customers.index') }}",
                    "columns": [
                        {"data": "first_name"},
                        {"data": "last_name"},
                        {"data": "email"},
                        {"data": ""},
                    ],
                    "columnDefs": [{
                        targets: -1,
                        render: function (data, type, row){
                            return '<a href="/{{ Request::segment(1) }}/'+ row['id']+'/edit" class="btn btn-xs btn-info">Edit</a>' +
                            '<form action="/{{ Request::segment(1) }}/'+ row['id']+'/delete" ,ethod="POST" style="display: inline">'+
                            '<input type="hidden" name="_method" value="DELETE" />' +
                            '<input type="hidden" name="_token" value="{{ csrf_token() }}" />' +
                            '<input type="submit" class="btn btn-xs btn-danger" value="Delete" />'+
                            '</form>';
                        }
                    }]
                });
            } );
        </script>

    </body>
</html>
