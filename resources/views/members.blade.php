@extends('layourts.base')
@section('container')
<div class="container w-full mt-6 sm:w-4/5 sm:ml-64 sm:flex">
    <div
      class="w-full h-auto flex px-10 justify-center sm:justify-between flex-wrap gap-y-10 sm:pl-10"
    >
      @foreach ($users as $user)
      <div class="sm:w-80 w-full border border-grey h-48 bg-grey rounded-md px-4 py-2">
        <div class="flex justify-between items-center">
          <div class="rounded-full border border-blue p-1">
            <img
              @if ($user->photo)
              src="/storage/{{$user->photo->photo}}"
              @endif
              src="../photos/bc6buja.JPG"
              alt=""
              width="30"
              height="30"
              class="rounded-full"
            />
          </div>
          <p class="text-blue border border-blue_f px-2 rounded-md">
            BackEnd Developer
          </p>
        </div>
        <div class="flex justify-between items-center">
          <p class="text-white text-xl font-medium mt-2">
            Dev.{{$user->name}}
          </p>
          <button
            class="px-2 rounded-md text-white border border-blue mt-3"
          >
            Follow
          </button>
        </div>
        <div>
          <p class="text-blue text-sm mt-2">
            Learner at fongolaboratory club <br />
            1 year of code experience <br />
            join the club on 12 feb 2023
          </p>
        </div>
        <div class="flex items-center justify-between">
          <div class=" -mt-6 flex items-center gap-2">
            <p class="text-blue text-5xl rounded-full">
              .
            </p> 
            <p class="mt-8 text-white">Online </p>
          </div>
          <div class="flex gap-2 text-sm">
            <i
              class="fa-solid fa-question text-white bg-blue rounded-full p-2 text-xs"
            ></i> 25
            <p><i class="fa-solid fa-check-double text-white bg-blue rounded-full p-2 text-xs"></i> 12</p>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
@endsection