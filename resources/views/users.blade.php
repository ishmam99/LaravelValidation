<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Users</title>
</head>
<body>
    <div class="container">
      
        <div class="col-sm-12">

                @if(session()->get('success'))
                  <div class="alert alert-success">
                    {{ session()->get('success') }}  
                  </div>
                @elseif(session()->get('delete'))
                <div class="alert alert-danger">
                        {{ session()->get('delete') }}  
                      </div>
                @endif
              </div>
    <h2>Users List</h2>
    
    <table class="table table-bordered" id="p-table">
        <thead class="thead-dark">
            <th>Name</th>
            <th>Email</th>
            <th>Salary</th>
            <th>Birthdate</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Export</th>
            <th>PDF</th>
        </thead>
        <tbody>
            @foreach ($peoples as $p)
            <tr>
            <td>{{$p->name}}</td>
            <td>{{$p->email}}</td>
            <td>{{$p->salary}}</td>
            <td>{{$p->birth_date}}</td>
            <td data-toggle="modal" data-target="# edit{{ $p->id }} "><button class="btn btn-primary">edit</button></td>
            
                <div class="modal fade" id=" edit{{ $p->id }} " tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header text-center">
                      <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form id="waterform" method="post" action="/update/{{ $p->id }}">

                            {{ csrf_field() }}
                                <div class="formgroup" id="name-form">
                                    <label for="name">Your name</label>
                                <input type="text" value="{{$p->name}}" id="name" name="name" />
                                <span style="color:red">{{$errors->first('name')}}</span>
                                </div>
                    
                                <div class="formgroup" id="email-form">
                                    <label for="email">Your e-mail</label>
                                    <input type="email" value="{{$p->email}}" id="email" name="email" />
                                    <span style="color:red">{{$errors->first('email')}}</span>
                                </div>
                    
                               
                    
                                <div class="formgroup" id="message-form">
                                    <label for="salary">Salary</label>
                                    <input type="number" value="{{$p->salary}}" id="salary" name="salary">
                                    <span style="color:red">{{$errors->first('salary')}}</span>
                                </div>
                    
                                <div class="formgroup" id="message-form">
                                    <label for="birth_date">Date of Birth</label>
                                    <input type="date" value="{{$p->birth_date}}" id="birth_date" name="birth_date">
                                    <span style="color:red">{{$errors->first('birth_date')}}</span>
                                </div>
                                
                                <div class="formgroup" id="message-form">
                                  <label for="Profession">Profession</label>
                                  <input type="date" value="{{$p->birth_date}}" id="Profession" name="birth_date">
                                  <span style="color:red">{{$errors->first('Profession')}}</span>
                              </div>
                  
                    
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                  </div>
                </div>
              </div>
              
              
            
          
              <td >
               

                  <button type="button" data-toggle="modal" data-target="#{{$p->id}}" class="btn btn-danger" >
                   Delete
                  </button> 
               
       <!-- Modal --> 
       <div class="modal fade" id="{{$p->id}}" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Are You Sure?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              This Will Delete <strong> {{ $p->name }} </strong> From The List!  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              
              <a class="btn btn-primary" href="delete/{{ $p->id }}">Delete</a>
                
         
            </div>
          </div>
        </div>
      </div> 
    </td>
        
          <td><a href="{{URL::to('export')}}"><button class="btn btn-info">Export</button></a></td>
          <td><a href="{{action('UserController@downloadPDF', $p->id)}}">PDF</a></td>
            </tr>
            @endforeach
            
        </tbody>
        <tfoot>
          <th>Name</th>
            <th>Email</th>
            <th>Salary</th>
            <th>Birthdate</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Export</th>
            <th>PDF</th>
        </tfoot>
    </table>
</div>


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-1.12.4.min.js"
 integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
 crossorigin="anonymous"></script>

 
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>$(document).ready( function () {
  $('#p-table tfoot th').each( function () {
        var title = $(this).text();
        if(title!='Edit'&&title!='Delete'&&title!='Export'&&title!='PDF'){
        $(this).html( '<span>'+title+'</span><input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm" placeholder="Search '+title+'" />' );}
    } );
    var table=$('#p-table').DataTable({
        "columnDefs":[
            {"orderable":false, "targets" : [4, 5]}
        ]
    });
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change clear', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );</script>
</body>
</html>