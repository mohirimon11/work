<a href="{{url('/')}}"></a>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      <div class="row">
          <div class="col-lg-3"></div>
              <div class="card col-lg-6 ml-4">
                  <!-- for combind validation -->
              <!-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif -->
                  <div class="card-body">
                    <form action="{{ Route('form.post') }}" method="post">
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
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="write your password" value="{{old('password')}}">
                            @error('password')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
              </div>
          
      </div>
    





    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>