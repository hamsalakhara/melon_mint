<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
 </head>
<body>


    <div class="container">
        <h2></h2>
        <h1 class="md-6 text-center text-success">ASSETS LIST</h1>
        <a class="md-12 btn btn-success btn-lg" href="" role="button">CREATE NEW ASSETES</a>
        <h2></h2>
        <table id="AssetsDataTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Assets Name</th>
                    <th>File Upload</th>
                    <th>price</th>
                    <th>Creater Name</th>
                    <th>Cover Image</th>
                    <th>Is Zip File</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $Assetss  as $assets)
                <tr>
                    <td>{{ $assets->id }}</td>
                    <td>{{ $assets->name }}</td>
                    <td><img src="{{ asset(str_replace('public', 'storage', $assets->fileupload)) }}" alt="Image" class="img-fluid" style="height: 50px; width: 60px"></td>
                    <td>{{ $assets->price}}</td>
                    <td>{{ $assets->creatername }}</td>
                    <td>{{ $assets->coverimage }}</td>
                    <td>
                      @if($assets->is_zip == 1)
                      <a href="" >YES</a>
                    @else
                        NO
                    @endif </td>
                    <td>
                        <input type="checkbox" data-id="{{ $assets->id}}" class="toggle-class" data-toggle="toggle" data-size="lg" {{ $assets->status ? 'checked' : '' }}>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>


  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<script>
    $('#AssetsDataTable').DataTable();
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
        });
    });
    </script>

</html>