<!doctype html>
            <html lang="en">
            <head>
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <!-- Bootstrap CSS -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

                <title>Class Add</title>
            </head>
            <body>
                <div class="row">
                    <div class="col-lg-3"></div>
                        <div class="card col-lg-6 ml-4">
                            
                            <div class="card-body">
                                <!-- for combind validation -->
                                    <a href="{{Route('student.index')}}">
                                        <button class="btn btn-outline-secondary" style="float:right;">
                                            All Student
                                        </button>
                                    </a>
                                    <h2 style="color:#15DCE6 "> Add Student</h2>

                                    @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                <form action="{{ Route('student.store') }}" method="POST">
                                    @csrf
                                    <div class="">
                                        <label for="floatingInputValue" class="form-label">&nbsp;&nbsp;&nbsp;Class name</label>
                                        <select name="class_id" class="form-control">
                                            @foreach($classes as $row)
                                            <option value="{{$row->id}}">{{$row->class_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('class_name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div><br>
                                    <div class="">
                                        <label for="floatingInputValue" class="form-label">&nbsp;&nbsp;&nbsp;Student name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInputValue" placeholder="name" value="{{old('name')}}" >
                                        @error('name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div><br>
                                    <div class="">
                                        <label for="floatingInputValue" class="form-label">&nbsp;&nbsp;&nbsp;Student roll</label>
                                        <input type="text" name="roll" class="form-control @error('roll') is-invalid @enderror" id="floatingInputValue" placeholder="Student roll" value="{{old('roll')}}" >
                                        @error('roll')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div><br>
                                    <div class="">
                                        <label for="floatingInputValue" class="form-label">&nbsp;&nbsp;&nbsp;Student phone</label>
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="floatingInputValue" placeholder="Student Phone" value="{{old('phone')}}" >
                                        @error('phone')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                                </form>
                            </div>
                        </div>

                    
                </div>






                <!-- Option 1: Bootstrap Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

                
            </body>
            </html>