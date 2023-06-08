<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    @vite('resources/css/app.css')
    <style>
         @import url("https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600&family=Playfair+Display:wght@400;500;600;700&display=swap");
         body{
            width: 100%;
            height: auto;
            font-family: "Oswald", sans-serif;
            font-weight: 700;
         }
    </style>
  </head>
  <body class="p-0 m-0 box-border">
    <div class="container flex w-full h-screen sm:px-5 sm:py-4 justify-center">
      <div
        class="left hidden sm:flex w-1/2 bg-blue flex-col justify-center items-center relative
        rounded-l-md "
      >
        <div
          class="logo rounded-tl-md w-2/5 flex gap-1 items-center border-b border-grey bg-blue_f absolute top-0 left-0"
        >
          <img
            src="../photos/logoWhite.png"
            alt=""
            class="logo"
            width="50"
            height="60"
          />
          <p class="text-white text-xl">FongOverFlow</p>
        </div>
        <div class="img w-full flex items-center justify-between px-5">
          <h1 class="text-white text-5xl font-black">
            Welcome <br />
            Back !
          </h1>
          <img
            src="../photos/Programmer-bro.png"
            alt=""
            width="400"
            height="600"
          />
        </div>
      </div>
      <div class="form w-full bg-blue sm:w-1/2 sm:bg-white sm:px-5 sm:py-4 sm:rounded-r-md">
        <div
          class="w-2/5 flex gap-1 items-center border-b border-grey bg-blue_f sm:hidden"
        >
          <img src="../photos/logoWhite.png" alt="" width="50" height="60" />
          <p class="text-white text-xl">FongOverFlow</p>
        </div>
        <form action="" class="w-full px-5 py-2 flex flex-col gap-3 sm:gap-6 sm:shadow-lg">
          <h3 class="text-white text-2xl sm:text-blue">Login</h3>
          <p class="text-grey font-medium">
            welcome back Please login to your account
          </p>
          <label for="user-name" class="text-white text-lg sm:text-blue">User-name</label>
          <input
            type="text"
            name="user-name"
            id="user-name"
            class="outline-none bg-blue border border-grey py-2 rounded-md px-5 text-white
             focus:border-2 focus:shadow-sm sm:text-blue sm:bg-white"
          />
          <label for="password" class="text-white text-lg sm:text-blue">Password</label>
          <input
            type="password"
            name="password"
            id="password"
            class="outline-none bg-blue border border-grey py-2 rounded-md px-5 text-white 
            focus:border-2 focus:shadow-sm sm:text-blue sm:bg-white"
          />
          <div class="flex justify-between">
            <div class="flex gap-2 items-center">
              <input type="checkbox" name="remember" id="remember" />
              <label for="remember" class="text-white sm:text-blue">Remember me</label>
            </div>
            <p class="text-grey"><a href="#">forget password !</a></p>
          </div>
          <button
            type="submit"
            class="w-full text-white bg-grey rounded-md py-2 text-xl sm:bg-blue"
          >
            Login
          </button>
          <p class="text-grey">
            New User ? <a href="#" class="text-white sm:text-blue">Sign Up</a>
          </p>
        </form>
      </div>
    </div>
  </body>
</html>
