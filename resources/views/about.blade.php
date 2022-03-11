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
                            <h1 style="color: #254CE9 ">This is about page</h1>

                            <!-- for combind validation -->
                                @if (session('status'))
                                    <div class="alert alert-success" style="color:Green">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            <div class="card-body">
                                    <a href="{{url('/')}}">
                                        <button class="btn btn-outline-secondary">
                                            HOME
                                        </button>
                                    </a>
                                    <h2 style="color:#15DCE6 "> Store Your About Information</h2>

                                <form action="{{ Route('about.store') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="write your name" value="{{old('name')}}" >
                                        @error('name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Emali</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  placeholder="write your email" value="{{old('email')}}">
                                        @error('email')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="write your password" value="{{old('password')}}">
                                        @error('password')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    
                                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                                </form>
                            </div>
                        </div>

                    
                </div>






                <!-- Option 1: Bootstrap Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

                
            </body>
            </html>