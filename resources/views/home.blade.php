<!doctype html>
            <html lang="en">
            <head>
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <!-- Bootstrap CSS -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

                <title>DB Page</title>
            </head>
            <body>
                <div class="row">
                    <div class="col-lg-3"></div>
                        <div class="card col-lg-6 ml-4">
                            <h1 style="color: #254CE9 ">This is Db Home page</h1>
                            <div class="card-headere">
                                {{__('Dashboard') }}
                                <a href="{{url('/')}}" class="btn btn-outline-dark" style="float:right;">HOME</a>
                            </div>                            
                            <div class="card-body">
                                <a href="{{Route('class.index')}}" class="btn btn-outline-info">Class</a>
                                <a href="{{route('student.index')}}" class="btn btn-outline-info">Student</a>
                                <br>
                                @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{session('status')}}
                                </div>
                                @endif

                                <!-- <h4>{{__('You Are Logged in! ')}}<u><b>{{Auth::user()->name}}</b></u></h4>  -->
                            </div>
                        </div>

                    
                </div>






                <!-- Option 1: Bootstrap Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

                
            </body>
            </html>