{{-- @extends('layourts.base')
@section('title','{{$exception->getName()}}')
@section('container')

@endsection --}}
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    />
    <title>Error</title>
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
      .sider-bar {
        height: 100vh;
        /* width: 20%; */
        background: linear-gradient(#2c3e50f9, #2d3a3a, #2c3e50);
      }
      .profile {
        border-radius: 50%;
      }
    </style>
  </head>
  <body class="flex flex-col w-full">
    <header>
      <nav
        class="navigation sm:flex w-full sm:h-14 sm:items-center sm:pl-5 bg-white fixed shadow-md z-10"
      >
        <div
          class="hidden logo sm:flex items-center bg-blue p-1.5 rounded w-52"
        >
          <h1 class="text-white text-lg font-medium">FongOverFlow</h1>
          <img
            src="../photos/logoWhite.png"
            width="30"
            height="30"
            alt=""
            class=""
          />
        </div>
        <div class="search p-2 relative sm:w-1/2 flex w-full h-14 bg-white">
          <div
            class="icns-menu w-6 border border-grey flex justify-center px-4 items-center bg-blue rounded-tl-md rounded-bl-md sm:hidden"
          >
            <i class="fa-solid fa-bars text-white text-lg"></i>
          </div>
          <div
            class="log-image bg-blue rounded-tr-md rounded-br-md w-6 flex justify-center sm:hidden"
          >
            <img
              src="../photos/logoWhite.png"
              alt=""
              width="40"
              height="40"
              srcset=""
            />
          </div>
          {{-- <form class="sm:w-11/12 relative w-4/5">
            <input
            aria-autocomplete="both" enterkeyhint="search" spellcheck="false" autofocus="true"
            type="search"
            name="search"
            placeholder="Search..."
            value="{{request()->get('search')}}"
            class="pl-10  pr-8 text-blue w-11/12 sm:w-full ml-5 sm:ml-10 border border-solid border-blue rounded outline-none  placeholder:-mr-16 hover:shadow-lg py-2 focus:border-2"
          />
          <i class="fa-solid fa-x text-grey absolute right-5 sm:-right-8 top-3 hover:text-blue cursor-pointer"></i>
          </form>
          
          @if ($found)
          <div class="found bg-white absolute top-14  left-12 sm:w-11/12 w-4/5 shadow-xl overflow-y-scroll">
            @forelse($found as $question)        
            <div class="border-b border-grey">
              <p class=" text-gray rounded-md px-5 py-1">
                <a href="{{route('descriptions',$question->id)}}">
                  {{$question->title}}
                </a> 
              </p>
              <p class=" text-blue rounded-md px-5 py-1">
                <a href="{{route('descriptions',$question->id)}}">
                  {{$question->descriptions}} 
                </a>
              </p>
            </div>         
          @empty
          <p class=" text-blue rounded-md px-5 py-1">
            No results found
          </p>
          @endforelse
          </div>  
          @endif
          
          <i
            class="fa-solid fa-magnifying-glass text-blue font-medium absolute left-24 top-5 sm:top-5 sm:left-16"
          ></i> --}}
        </div>
        <div
          class="connect hidden sm:flex items-center justify-between w-2/5 gap-10 pr-8"
        >
          <div class="history">
            <h1 class="text-blue font-medium underline">History</h1>
          </div>
          <i
            class="fa-solid fa-question text-white bg-blue rounded-full p-2 cursor-pointer"
          ></i>
         @auth
              <form action="{{route('logout')}}" method="post" class="w-1/2 ">
                @method('delete')
                @csrf
                <button
                class="logout cursor-pointer text-blue font-bold bg-grey w-full rounded px-4 py-2 hover:bg-gray"
                >
                  Log Out
                </button>
              </form>
              <div
                  class="profil flex gap-2 border-blue border-solid bg-blue_f border w-52 rounded-3xl px-2 items-center"
                 >
                   <img @if (Auth::user()->photo)
                       src="/storage/{{Auth::user()->photo->photo}}"
                       @else 
                       src =""
                   @endif
                   src =" "
                    alt=""
                    width="40"
                    height="40"
                    class=" profile"
                  />
                  <p class="text-blue font-bold"><a href="{{route('profil',Auth::user()->name)}}">
                    {{Auth::user()->name}}</a></p>
            </div>
         @endauth
         @guest
                <a class="cursor-pointer text-blue font-bold bg-grey w-full rounded px-4 py-2 hover:bg-gray" href="{{route('login')}}">Login...</a>
                <div
                class="profil flex gap-2 border-blue border-solid bg-blue_f border w-52 rounded-3xl px-2 items-center"
               >
                 <img
                  src="../photos/Amicus.jpg"
                  alt=""
                  width="40"
                  height="40"
                  class="rounded-full loger"
                />
                <p class="text-blue font-bold">unkwon</p>
            </div>
         @endguest
        </div>
      </nav>
    </header>
    <br />
    <br />
    <main class="flex w-full relative sm:justify-center m-0 p-0">
      <div
        class="hidden sider-bar fixed overflow-y-scroll p-8 pb-20 border-r border-grey top-16 w-3/4 sm:w-1/5 border-solid h-screen sm:flex flex-col left-0"
      >
        <div class="sider-bar-connect">
          <div class="user flex gap-2">
            @auth
                <img
                src="../photos/me.jpg"
                alt=""
                width="30"
                height="30"
                class="rounded-full border border-grey"
              />
              <p class="user-name text-center text-white">{{Auth::user()->name}}</p>
            @endauth

            <i class="fa-solid fa-chevron-down text-white text-sm mt-2"></i>
            <div
              class="hidden log w-32 h-32 bg-grey rounded-md sm:flex flex-col items-center gap-5 absolute top-20 right-4"
            >
              <a href="" class="text-blue border-b border-blue pb-1">Profil</a>
              <a href="" class="text-blue border-b border-blue pb-1">History</a>
              <a href="" class="text-blue border-b border-blue pb-1">Logout</a>
            </div>
          </div>
        </div>
        <a
          href="{{route('questions')}}"
          class="transition-all py-4 hover:bg-gray hover:text-white rounded-sm focus:border-r-2 border-grey border-solid font-medium text-grey"
          ><i class="fa-solid fa-house px-3 text-white"></i>Home</a
        >
        <a
          href="{{route('questions')}}"
          class="py-4 hover:bg-gray hover:text-white rounded-sm focus:border-r-2 border-grey border-solid font-medium text-grey"
          ><i class="fa-solid fa-question px-3 text-white"></i>Questions</a
        >
        <a
          href="{{route('members')}}"
          class="py-4 hover:bg-gray hover:text-white rounded-sm focus:border-r-2 border-grey border-solid font-medium text-grey"
          ><i class="fa-solid fa-users px-3 text-white"></i>Members</a
        >
        <a
          href="#"
          class="py-4 hover:bg-gray hover:text-white rounded-sm focus:border-r-2 border-grey border-solid font-medium text-grey"
          ><i class="fa-regular fa-message px-3 text-white"></i>Messages</a
        >
        <a
          href="#"
          class="py-4 hover:bg-gray hover:text-white rounded-sm focus:border-r-2 border-grey border-solid font-medium text-grey"
          ><i class="fa-solid fa-inbox px-3 text-white"></i>privite Contact</a
        >
        <br />
        <h1 class="text-white font-medium ml-2">TAGS</h1>
        <div class="py-4 px-2 flex flex-col gap-2">
          <div class="flex gap-1">
            <a
              href=""
              class="px-6 py-2 border border-grey rounded text-grey hover:bg-gray hover:text-white"
              >html</a
            >
            <a
              href=""
              class="px-4 py-2 border border-grey rounded text-grey hover:bg-gray hover:text-white"
              >css</a
            >
          </div>
          <div class="flex gap-2">
            <a
              href=""
              class="px-4 py-2 border border-grey rounded text-grey hover:bg-gray hover:text-white"
              >Java</a
            >
            <a
              href=""
              class="px-8 py-2 border border-grey rounded text-grey hover:bg-gray hover:text-white"
              >JavaScript</a
            >
          </div>
          <div class="flex gap-2">
            <a
              href="{{route('tags_php')}}"
              class="px-2 py-2 border border-grey rounded text-grey hover:bg-gray hover:text-white"
              >php</a
            >
            <a
              href=""
              class="px-6 py-2 border border-grey rounded text-grey hover:bg-gray hover:text-white"
              >Taiwindcss</a
            >
          </div>
          <div class="flex gap-2">
            <a
              href=""
              class="px-4 py-2 border border-grey rounded text-grey hover:bg-gray hover:text-white"
              >Boostrap</a
            >
            <a
              href=""
              class="px-2 py-2 border border-grey rounded text-grey hover:bg-gray hover:text-white"
              >nodeJs</a
            >
          </div>
          <div class="flex gap-2">
            <a
              href=""
              class="px-4 py-2 border border-grey rounded text-grey hover:bg-gray hover:text-white"
              >Jquery</a
            >
            <a
              href=""
              class="px-4 py-2 border border-grey rounded text-grey hover:bg-gray hover:text-white"
              >Laravelphp</a
            >
          </div>
        </div>
      </div>
      <div class="text-blue w-full h-screen items-center justify-center sm:ml-72">
         <h2 class="text-center self-center mt-64 text-2xl">
             {{$exception->getMessage()}}
             </h2>
        </div>
    </main>
  </body>
</html>


