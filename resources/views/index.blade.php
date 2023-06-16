@extends('layourts.base')
@section('title','Questions')
@section('container')
<div
class="container sm:ml-64 flexe flex-col sm:px-8 sm:py-4 font-light w-full p-2"
>
<div
  class="itro sm:py-2 w-full flex sm:flex-row flex-col sm:gap-20 sm:justify-between border-b border-grey pb-4"
>
  <p
    class="text-blue font-normal sm:font-extrabold sm:text-2xl pb-3 mt-5"
  >
    25 Questions asked to day
  </p>
  <div class="flex sm:gap-8 justify-between">
    <div
      class="categories hidden border border-grey rounded sm:flex items-center sm:w-full"
    >
      <a
        href=""
        class="px-4 sm:px-8 py-2 text-blue border-r border-blue"
        >more asked</a
      >
      <a
        href=""
        class="px-4 sm:px-8 py-2 text-blue border-r border-blue"
        >recent asked</a
      >
      <a
        href=""
        class="px-4 sm:px-8 py-2 text-blue border-r border-blue"
        >answered</a
      >
      <a href="" class="px-4 sm:px-8 py-2 text-blue">unanswered</a>
    </div>
    <div
      class="phone-categories border border-grey rounded items-center w-4/5 sm:hidden"
    >
      <a href="" class="px-2 sm:px-8 text-blue border-r border-blue"
        >more asked</a
      >
      <a href="" class="px-2 sm:px-8 text-blue border-r border-blue"
        >recents</a
      >
      <a href="" class="px-2 sm:px-8 text-blue border-r border-blue"
        >answered</a
      >
      <a href="" class="sm:px-8 text-blue px-0"> unanswered </a>
    </div>
    <a href="{{route('ask-question')}}"
      class="text-white flex items-center bg-blue px-4 sm:px-8 font-bold text-2xl rounded-xl"
    >
      +
  </a>
  </div>
</div>
<div class="questions mt-2 w-full">
  <p class="text-blue font-medium text-base sm:text-2xl">Questions</p>
  <div
    class="mt-2 w-full h-auto flex  flex-wrap gap-y-10 justify-between"
  > 
    @foreach ($questions as $question)
    <div class="bg-blue_f w-full sm:w-80 sm:h-44 h-48 px-3 rounded-md">
      <p class="title text-white text-start text-lg capitalize">
       {{$question->title}}
      </p>
      <p class="litle-descript text-blue">
        {{$question->descriptions}}
        <a href="{{route('descriptions',$question->id)}}" class="text-white">more...</a>
      </p>
      <div class="flex mt-2 gap-2 items-center">
        <img
          src="../photos/kstion.png"
          alt=""
          class="rounded-full border border-grey"
          width="30"
          height="30"
        />
        @if ($question->user)
        <p class="name text-blue">Dev.{{$question->user->name}}</p>
        @else
        <p class="name text-blue">Dev.Charles Basilwango</p>
        @endif
        <p class="date">17 days ago</p>
        <p class="view text-xs">
          <i class="fa-solid fa-user-group"></i> 15
        </p>
      </div>
      <div class="descrpt-link mt-2 w-full">
        <a href="{{route('answer',$question->id)}}"
          class="w-full bg-grey text-white mt-4 px-10 py-1 text-center rounded-md hover:bg-blue ease-in-out duration-700"
        >
          give an answer
      </a>
      </div>
    </div>
    @endforeach
    </div>
  </div>
</div>
@endsection