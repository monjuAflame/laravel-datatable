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
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control filter-input" placeholder="Search First Name" data-column="0">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control filter-input" placeholder="Search Last Name" data-column="1">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control filter-input" placeholder="Search email" data-column="2">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select data-column="0" class="form-control filter-select">
                                                <option value="">Select First Name</option>
                                                @foreach ($first_names as $f_name)
                                                    <option value="{{ $f_name }}">{{ $f_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select data-column="1" class="form-control filter-select">
                                                <option value="">Select Last Name</option>
                                                @foreach ($last_names as $f_name)
                                                    <option value="{{ $f_name }}">{{ $f_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                </tfoot>
                              </table> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    
        <script>
            $(document).ready( function () {
                var table = $('#datatable').DataTable({
                    "processing": true,
                    "serviceSide": true,
                    "ajax": "{{ route('api.customers.index') }}",
                    "columns": [
                        {"data": "first_name"},
                        {"data": "last_name"},
                        {"data": "email"},
                    ]
                });

                $('.filter-input').keyup(function(){
                    table.column( $(this).data('column'))
                        .search( $(this).val() )
                        .draw();
                });

                $('.filter-select').change(function(){
                    table.column( $(this).data('column'))
                        .search( $(this).val() )
                        .draw();
                });
            } );
        </script>

    </body>
</html>
