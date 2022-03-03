<h1>This is about page</h1>
<a href="{{ url('/')}}">back to home</a>


<h1> Store Your About Information</h1>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<form action="{{ Route('about.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="write your name"><br><br>
    <input type="email" name="email" placeholder="write your email"><br><br>
    <input type="text" name="phone" placeholder="write your phone"><br><br>

    <button type="submit">submit</button>
</form>
