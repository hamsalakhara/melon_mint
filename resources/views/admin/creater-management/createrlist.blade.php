<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css">
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

    

    <title>CreaterList</title>
</head>
<body>
    <div class="container">
        <h1 class="md-4 text-center text-success">CREATOR LIST</h1>
        <h2></h2>
        <table id="CreaterDataTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Store Name</th>
                    <th>Meta Address</th>
                    <th>Phone No</th>
                    <th>Profile</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $Creaters  as $Creater)
                <tr>
                    <td>{{ $Creater->id }}</td>
                    <td>{{ $Creater->name }}</td>
                    <td>{{ $Creater->email }}</td>
                    <td>{{ $Creater->password }}</td>
                    <td>{{ $Creater->storename }}</td>
                    <td>{{ $Creater->metaaddress }}</td>
                    <td>{{ $Creater->phoneno }}</td>
                    <td>{{ $Creater->profile }}</td>
                    <td>
                        <input type="checkbox" data-id="{{ $Creater->id }}" class="toggle-class" data-toggle="toggle" data-size="lg" {{ $Creater->status ? 'checked' : '' }}>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>






    <!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src=" https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   -->
   <script type="text/javascript"  src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript"  src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript"  src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
  <script type="text/javascript"  src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

   <script>
   $('#CreaterDataTable').DataTable();
   </script>

<script>
    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') ? 1 : 0; 
            var user_id = $(this).data('id'); 
            
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/changeStatus',
                data: {'status': status, 'user_id': user_id},
                success: function(data){
                console.log(data.success)
                }
            });
        })
    })
    </script>
</body>
</html>