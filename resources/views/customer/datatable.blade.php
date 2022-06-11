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
                                    <th scope="col">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($customers as $item)
                                  <tr>
                                    <th scope="row">No.{{ $loop->iteration }}</th>
                                    <td>{{ $item->first_name }}</td>
                                    <td>{{ $item->last_name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                  </tr>
                                  @endforeach
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
                    ordering: true
                });
            } );
        </script>

    </body>
</html>
