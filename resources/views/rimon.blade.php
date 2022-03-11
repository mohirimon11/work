<h1>This is contact page</h1>
<a href="{{ url('/')}}">back to home</a>
<form action="{{Route('data.password')}}" method="POST">
    @csrf
    <label >Password</label>
    <input type="password"name="password" require>
    <button type="submit" class="btn btn-primary">Password</button>
</form>