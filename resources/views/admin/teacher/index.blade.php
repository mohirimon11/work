<!doctype html>
            <html lang="en">
            <head>
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <!-- Bootstrap CSS -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

                <title>Class Page</title>
            </head>
            <body>
                <div class="row">
                    <div class="col-lg-3"></div>
                        <div class="card col-lg-6 ml-4">
                            <h1 style="color: #254CE9 ">This is Student Home page</h1>
                            <div class="card-headere">
                                {{__('All student List') }}
                            </div>
                            
                            <div class="card-body">
                                @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                <a href="{{Route('home.home')}}" class="btn tbn-sm btn-primary" style="float:left;">Class & Student</a>
                                <a href="{{Route('teacher.create')}}" class="btn tbn-sm btn-primary" style="float:right;">Add New</a>
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <td>SL</td>
                                            <td>Id</td>                                            
                                            <td>Name</td>
                                            <td>Email</td>
                                            <td>Address</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($teacher as $key=>$row)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$row->id}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->email}}</td>
                                                <td>{{$row->address}}</td>
                                                <td>
                                                    <div>
                                                    <a href="{{Route('teacher.edit',$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                                                    <a href="{{Route('teacher.show',$row->id)}}" class="btn btn-sm btn-success">view</a>
                                                    <form action="{{Route('teacher.destroy',$row->id)}}" method="POST">
                                                        @csrf 
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $teacher->links() }}
                            </div>
                        </div>

                    
                </div>






                <!-- Option 1: Bootstrap Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

                
            </body>
            </html>