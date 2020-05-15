<!DOCTYPE html>
<html lang="en">
<head>
  <title>LaraCaller</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  
</head>
<body>

<div class="container ">
 
   <div class="row">
     
      <div class="col-12">
         <br>
         <h2>Phone Numbers
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          +
        </button>
        </h2>
         @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
         @endif

         @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="table-responsive">
        <table id="numberTable" class="table table-striped table-bordered " >
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Tests as $value)
                    <tr>
                        <td>{{$value->name}}</td>
                        <td><a href="tel:{{$value->number}}">{{$value->number}}</a></td>
                        <td><a href="mailto:{{$value->email}}">{{$value->email}}</a></td>
                        <td>
                        <form onsubmit="return confirm('Are Your Sure?');" action="{{ route('test.destroy',$value->id) }}" method="POST">  
                            <div class="btn-group" role="group" >
                        
                                <a class="btn btn-sm btn-primary btn-block" href="{{ route('test.edit',$value->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                
                                <button type="submit" class="btn btn-sm btn-danger btn-block">Delete</button>
                                </div>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                    
                
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
       </div>





        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('test.store') }}" method="POST">
                <div class="modal-body">
               
                    @csrf
                    
            
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name"  class="form-control" placeholder="Name" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="email" name="email"  class="form-control" placeholder="Email" >
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Phone:</strong>
                                <input type="text" name="number" class="form-control" placeholder="Number" required>
                            </div>
                        </div>
                    
                       
                    </div>
            
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" type="button" class="btn btn-primary">Save changes</button>
                </div>
                </form>
                </div>
            </div>
        </div>

        </div>
       
    </div>
</div>

</body>
<script type="text/javascript">
  
$(document).ready(function() {
    $('#numberTable').DataTable();
} );



</script>
</html>
