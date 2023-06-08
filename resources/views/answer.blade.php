@extends('layourts.base')
@section('title','answer')
@section('container')
<div class="container w-full px-2 h-auto mt-3  sm:w-4/5 sm:ml-64  
    flex flex-col -mr-5 py-4 sm:px-10 gap-3">
    <p class=" text-blue bg-white rounded-md px-4 py-2 absolute right-4 top-7  shadow-lg
        sm:right-6 cursor-pointer ease-in-out duration-500 hover:bg-blue hover:text-white">
          <a href="{{route('questions')}}">Go Back</a>
    </p>
    <div class="user flex gap-4 items-center">
        <img
          src="../photos/Amicus.jpg"
          width="50"
          height="50"
          alt=""
          class="rounded-full"
        />
        <p class="name text-blue">Dev.Charles Basilwango</p>
        <p class="time-out">Posted 51 min ago</p>
    </div>
    <div class="descriptions  p-2">
        <p class="text-blue text-center sm:text-start">
            {{$question->descriptions}}
        </p>
    </div>
    @if ($question->image)
       <div class="illustration">
           <img src="{{$urlImage}}"alt="" class=" object-cover w-full h-96">
       </div>
    @endif
    
    <form action="" class="w-full flex flex-col gap-3 " method="post">
        @csrf
        <div class=" w-full relative">
            <div class="answer w-full">
                <textarea name="answer" id=""  rows="5" class="
                text-blue text-center border border-blue rounded-md py-4 pl-2 pr-8 outline-none 
                hover:border-2 bg-white w-full">
                </textarea>
                @error('answer')
                    {{$message}}
                @enderror
            </div>
            <button type="submit" class="absolute top-2 right-2 text-blue bg-white shadow-lg">
                <i class="fa-solid fa-share-from-square "></i> 
            </button>
        </div>
  
    </form>
</div>
@endsection