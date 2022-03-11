        <!doctype html>
            <html lang="en">
            <head>
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <!-- Bootstrap CSS -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

                <title>About Page</title>
            </head>
            <body>
                <div class="row">
                    <div class="col-lg-3"></div>
                        <div class="card col-lg-6 ml-4">
                        <div class="card-header">
                                    <!-- {{__('Change your password')}}<br> -->
                                    <h2 style="color: #254CE9 ">Password Change</h2>
                                    <a href="{{url('/')}}">
                                        <button class="btn btn-outline-secondary">
                                            HOME
                                        </button>
                                    </a>
                                </div>

                            <!-- For Validitation -->
                            @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <!-- for combind validation -->
                                @if(session()->has('success'))
                                <strong class="text-success">{{session()->get('success')}}</strong>
                                @endif
                                @if(session()->has('error'))
                                <strong class="text-success">{{session()->get('error')}}</strong>
                                @endif
                            <div class="card-body">
                                    <!-- <h2 style="color:green "> Change your password</h2> -->

                                    <form action="{{Route('update.password')}}" method="POST" >
                                        @csrf
                                        <div>
                                            <label>Current Password</label>
                                            <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" require value="{{old('current_password')}}">
                                                @error('current_password')
                                                <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                        </div><br>
                                        <div>
                                            <label>New Password</label>
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" require>
                                                @error('password')
                                                <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                        </div><br>
                                        <div>
                                            <label>Confirm Password</label>
                                            <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" require>
                                                @error('confirm_password')
                                                <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                        </div><br>
                                        <button type="submit" class="btn btn-outline-primary">Submit</button>                                        
                                    </form>
                            </div>
                        </div>

                    
                </div>






                <!-- Option 1: Bootstrap Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

                
            </body>
            </html>