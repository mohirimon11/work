    <!DOCTYPE html>
    <!-- Created By CodingNepal - www.codingnepalweb.com -->
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!------<title> Website Layout | CodingLab</title>------>
        <!-- <link rel="stylesheet" href="style.css"> -->


        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins',sans-serif;
    }
    ::selection{
    color: #000;
    background: #fff;
    }
    nav{
    position: fixed;
    background: #1b1b1b;
    width: 100%;
    padding: 10px 0;
    z-index: 12;
    }
    nav .menu{
    max-width: 1250px;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    }
    .menu .logo a{
    text-decoration: none;
    color: #fff;
    font-size: 35px;
    font-weight: 600;
    }
    .menu ul{
    display: inline-flex;
    }
    .menu ul li{
    list-style: none;
    margin-left: 7px;
    }
    .menu ul li:first-child{
    margin-left: 0px;
    }
    .menu ul li a{
    text-decoration: none;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    padding: 8px 15px;
    border-radius: 5px;
    transition: all 0.3s ease;
    }
    .menu ul li a:hover{
    background: #fff;
    color: black;
    }
    .img{
    background: url('img3.jpg')no-repeat;
    width: 100%;
    height: 100vh;
    background-size: cover;
    background-position: center;
    position: relative;
    }
    .img::before{
    content: '';
    position: absolute;
    height: 100%;
    width: 100%;
    background: rgba(0, 0, 0, 0.4);
    }
    .center{
    position: absolute;
    top: 52%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    padding: 0 20px;
    text-align: center;
    }
    .center .title{
    color: #fff;
    font-size: 55px;
    font-weight: 600;
    }
    .center .sub_title{
    color: #fff;
    font-size: 52px;
    font-weight: 600;
    }
    .center .btns{
    margin-top: 20px;
    }
    .center .btns button{
    height: 55px;
    width: 170px;
    border-radius: 5px;
    border: none;
    margin: 0 10px;
    border: 2px solid white;
    font-size: 20px;
    font-weight: 500;
    padding: 0 10px;
    cursor: pointer;
    outline: none;
    transition: all 0.3s ease;
    }
    .center .btns button:first-child{
    color: #fff;
    background: none;
    }
    .btns button:first-child:hover{
    background: white;
    color: black;
    }
    .center .btns button:last-child{
    background: white;
    color: black;
    }

        </style>



        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    </head>
    <body>
    <nav>
        <div class="menu">
        <div class="logo">
            <a href="{{url('/')}}">My Project</a>
        </div>
        
        @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                        <ul>
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @else
                            
                             <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>&nbsp;&nbsp;&nbsp;&nbsp;
                            
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                            
                            </ul>
                        @endauth
                    </div>
                @endif
        </div>
    </nav>
    <div class="img"></div>
    <div class="center">
    <!-- <h1><a href="{{url('/')}}"> This is Home page</a></h1>
    <h1><a href="{{url('/')}}"> This is Home page</a></h1> -->

            <div style="text-align: center;">
            <ul style="display: inline-block; text-align: left;" class="list">
                    <li class="list-item"><a href="{{ Route('home.home') }}">Class & Student</a></li>
                    <li class="list-item"><a href="{{ Route('about.us') }}">About</a> </li>
                    <!-- <li class="list-item"><a href="{{ url('rimon') }}">rimon</a></li> -->
                    <li class="list-item"><a href="{{Route('rimon.us')}}">Rimon</a></li>
                    <li class="list-item"><a href="{{ Route('contact.us') }}">Contact</a></li>
                    <li class="list-item"><a href="{{ Route('username.us') }}">User Name</a></li>
                    <li class="list-item"><a href="{{ Route('form.us') }}">Form</a></li>
                    <li class="list-item"><a href="{{Route('view.detail',Crypt::encryptString('5'))}}">Rimon details</a></li>
                    <li class="list-item"><a href="{{ Route('number.us',Crypt::encryptString('2022')) }}">Year Count</a></li>
                </ul>  
                @if(Auth::check())
                <h2>You are logged in</h2>
                @else
                <h2>You are not logged in</h2>
                @endif
            </div>
               
        <!-- <div class="title">Create Amazing Website</div>
        <div class="sub_title">Pure HTML & CSS Only</div>
        <div class="btns">
        <button>Learn More</button>
        <button>Subscribe</button>
        </div> -->
    </div>
    </body>
    </html>
