<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/output.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
  />
  @vite('resources/css/app.css')
    <title>Sign-Up</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600&family=Playfair+Display:wght@400;500;600;700&display=swap");
        body {
          width: 100%;
          height: auto;
          font-family: "Oswald", sans-serif;
          font-weight: 700;
          padding: 0;
          margin: 0;
          box-sizing: border-box;
        }
      </style>
</head>
<body class="w-full h-screen bg-white p-10">
    <div class="container w-full h-screen+ flex">
        <div class="avatar sm:w-3/6 h-screen sm:flex-col sm:flex sm:bg-blue sm:rounded-t-xl sm:rounded-b-xl hidden">
            <div class="logo mx-5 flex">
                <img src="../photos/logoWhite.png" alt="" class="w-10 h-10">
                <h3 class="text-white">FONGOverflow</h3>
            </div>
            <div class="img">
                <img src="../photos/codingMachine.png" alt="">
            </div>
        </div>

        <div class="form w-full min-h-screen relative rounded-t-xl rounded-b-xl border sm:w-1/2 sm:border-0">
            <div class="sig-in absolute top-3.5 right-3 duration-75 sm:flex sm:absolute sm:top-3.5 sm:right-3 text-sm">
                <p class="text-grey">Already have an account ? <a href="" class="duration-75 no-underline text-grey border-solid-w-px-text-grey py-2 px-4 rounded-3xl hover:bg-linear hover:text-white hover:py-2 hover:px-4 sm:border">SIGN IN</a></p>
            </div>
            <div class="formulary flex flex-col leading-10 my-7 mx-14">
                <form action="" class="sm:my-7 my-7 sm:w-10/12 line" method="POST">
                    @csrf
                    <h3 class="text-sm sm:text-left sm:text-sm">Welcome to FONGOverFlow</h3>
                    <p class="register text-sm sm:text-sm my-4">Register your account now !</p>
                    <div>
                        <label for="name" class="my-4 text-sm">Name</label><br />
                        <input type="text" name="name" class="px-10 my-3 outline-none border-stone-950 border rounded-lg w-full" id="name" />
                        @error('name')
                            {{$message}}
                        @enderror
                    </div>
                    <br />
                    <div>
                        <label for="email" class="my-4 text-sm">E-mail</label><br />
                        <input type="email" name="email" class="px-10 my-3 outline-none border-stone-950 border rounded-lg w-full" id="email" />
                        @error('email')
                            {{$message}}
                        @enderror
                    </div>
                    <br />
                    <div>
                        <label for="password" class="my-4 text-sm">password</label><br />
                        <input type="password" name="password" class="px-10 my-3 outline-none border-stone-950 border rounded-lg w-full" id="password" />
                        @error('password')
                            {{$message}}
                        @enderror
                    </div>
                    <br />
                    <input class="submit sm:w-full w-full bg-blue rounded-xl py-1 px-10 my-2 text-white tracking-wider cursor-pointer" type="submit" value="SIGN UP" />
                   <br />
                    <div class="account flex gap-2">
                        <p class="text-grey">Create account whit</p>
                        <a href=""><i class="fa-brands fa-facebook-f text-blue_f p-1 rounded-full"></i></a>
                        <a href=""><i class="fa-brands fa-google text-blue_f p-1 rounded-full"></i></a>
                        <a href=""><i class="fa-brands fa-github text-blue_f p-1 rounded-full"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>