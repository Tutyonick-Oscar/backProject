@extends('layourts.base')
@section('title','tags.php')
@section('container')
<div class="container w-full mt-6 sm:w-4/5 sm:ml-64 sm:flex">
  <div class="flex flex-col pl-2 pr-5 gap-4 sm:ml-6 sm:w-full">
      <a href="" class=" px-2 text-blue border border-grey rounded-md text-lg w-32">all categories</a>
      <div class="header flex justify-between items-center border-t border-grey">
      <p class="text-blue">Questions</p>
      <div class="flex gap-1 items-center sm:gap-3 ">
          <p class="text-blue border-r border-grey pr-1">Replies</p>
          <p class="hidden border-r border-grey pr-1 sm:flex text-blue">Views</p>
          <p class="text-blue">Activity</p>
      </div>
      </div>
    <div class="topics_container flex flex-col gap-3">
      @foreach ($questions as $question)
      <div class="flex justify-between border-b border-grey pr-4 ">
        <div class="kstion flex flex-col">
        <p class="text-grey">{{$question->title}} <br>
       {{$question->descriptions}}.</p> 
        <a href="" class="text-blue text-sm">view more</a>
        </div>
        <div class="flex">
        <a href="">
            <img src="../photos/me.jpg" alt="" width="32" height="32" class="rounded-full">
            </a>
            <a href="" class="-ml-2 hidden sm:block">
            <img src="../photos/Code review-bro.png" alt="" width="32" height="32" class="rounded-full">
            </a>
            <a href="" class="-ml-2 hidden sm:block">
            <img src="../photos/Amicus.jpg" alt="" width="32" height="32" class="rounded-full">
            </a>
            <p class="w-8 h-8 rounded-full text-white bg-blue text-center sm:-ml-2 mt-2
            flex justify-center items-center -ml-4">+10</p>
       </div>
        <p class="nombre text-blue mt-2 sm:hidden">123</p>
        <p class=" text-blue mt-2 sm:hidden">18h</p>
        <div class="hidden sm:flex sm:gap-8 sm:items-center">
          <p class="nombre text-blue ">123</p>
          <p class="views text-blue">212 v</p>
          <p class=" text-blue ">18h</p>
        </div>    
    </div>
      @endforeach
    </div>
  </div>
</div>
@endsection