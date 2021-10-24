@extends('layout.admin')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>


    <title>Document</title>
</head>
<body>

   <table id="dataTable">
       <thead class="thead-light">
           <tr>
               <th>Name</th>
               <th>Address</th>
               <th>Email</th>
               <th>Telephone</th>
               <th>Current Route</th>
               <th>View</th>
               <th>Edit</th>
               <th>Delete</th>
           </tr>
       </thead>
       <tbody>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Current Route</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
       </tbody>
   </table>


         <!-- Modal -->
         <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="leModalLongTitle">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="form-group row">
                            <label for="id"  class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-10">
                            <input  id="txt_id"  name="id" class="form-control" required readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name"  class="col-sm-2 col-form-label">Full Name</label>
                            <div class="col-sm-10">
                            <input name="name" id="txt_name" class="form-control" required readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email"  class="col-sm-2 col-form-label">Email Address</label>
                            <div class="col-sm-10">
                            <input name="email" id="txt_email" type="email" class="form-control" required readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address"  class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                            <textarea name="address" id="txt_address" class="form-control"  required readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group  row">
                            <label for="telephone"  class="col-sm-2 col-form-label">Telephone</label>
                            <div class="col-sm-10">
                            <input name="telephone" id="txt_telephone" type="number" class="form-control" required readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="join_date"  class="col-sm-2 col-form-label">Join Date</label>
                            <div class="col-sm-10">
                            <input name="join_date" id="txt_date" type="date" class="form-control" required readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="current_route"  class="col-sm-2 col-form-label">Current Routes</label>
                            <div class="col-sm-10">
                            <input name="current_route" id="txt_rooute" type="text" class="form-control" required readonly/>
                            </div>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>


<script>
    $('#dataTable').DataTable({
        ajax: '/api/v1/person/list',
        columns:[
            {data:'name'},
            {data:'address'},
            {data:'email'},
            {data:'telephone'},
            {data:'current_route'},
            {data:'id',
                render:function(data, type){
                    return '<a href="#"class="btn btn-success" onClick="openWindow('+ data +')" > View</a>'
                }},
            {data:'id',
                render:function(data,type){
                    return '<a href="/sales/person/edit/'+data+'" class="btn btn-warning" >Edit</a>'
                }},
            {data:'id',
                render:function(data,type){
                    return '<a href="#" onClick="deleteFunction('+data+')" class="btn btn-danger" > Delete</a>'
                }},
        ],
    });

    function openWindow(id){
        $.ajax({
            url:'/api/v1/person/'+id,
            type: 'get',
            success: function(response){
                // Add response in Modal body
                $('#leModalLongTitle').html(response.data.name)
                $('#txt_id').val(response.data.id)
                $('#txt_name').val(response.data.name)
                $('#txt_email').val(response.data.email)
                $('#txt_address').html(response.data.address)
                $('#txt_telephone').val(response.data.telephone)
                $('#txt_date').val(response.data.join_date)
                $('#txt_rooute').val(response.data.current_route)
                $('#txt_comment').val(response.data.commets)
                // Display Modal
                $('#exampleModalCenter').modal('show');
            }
        })
    }
</script>
<script>
    function deleteFunction(id){
        var r = confirm("Are you sure!");
        if(r == true){
            $.ajax({
                type:"DELETE",
                url: "/api/v1/person/"+id,
                dataType:"json",
                success:function(response){
                    alert(response.message)
                }
            })
        }
    }
</script>
</body>
</html>
@endsection();
