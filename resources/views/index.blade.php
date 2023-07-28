@extends('layourts.base')
@section('title','Questions')
@section('container')
{{-- @dd($carbon::parse($questions->first()->created_at)->diffInYears($carbon::now())) --}}
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
      <p class="litle-descript text-blue flex">
        <p class="text-blue text-sm">{{$question->descriptions}}</p>
        <form action="{{route('views',$question->id)}}" method="post">
          @csrf
          <input type="hidden" name="view" value="question viewed">
            <button type="submit"class="text-blue" >
              more...
            </button>
          </a>
        </form>
      </p>
      <div class="flex mt-2 gap-2 items-center">
        <img
        @if ($question->user)
            @if ($question->user->photo)
                src="/storage/{{$question->user->photo->photo}}"
            @endif       
        @else
            src = "../kstion.png"
        @endif     
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
        @if ($carbon::parse($question->created_at)->diffInSeconds($carbon::now())>0 && 
          $carbon::parse($question->created_at)->diffInSeconds($carbon::now())<60)
          <p class="date">
              {{$carbon::parse($question->created_at)->diffInSeconds($carbon::now())}} sec ago
          </p>    
          @elseif( $carbon::parse($question->created_at)->diffInSeconds($carbon::now())>59 && 
          $carbon::parse($question->created_at)->diffInMinutes($carbon::now())<60)
            <p class="date">
                {{$carbon::parse($question->created_at)->diffInMinutes($carbon::now())}} Min ago
            </p
          @elseif($carbon::parse($question->created_at)->diffInMinutes($carbon::now())>59 && 
          $carbon::parse($question->created_at)->diffInHours($carbon::now())<24)
            <p class="date">
              {{$carbon::parse($question->created_at)->diffInHours($carbon::now())}} Hours ago
            </p
            @elseif($carbon::parse($question->created_at)->diffInHours($carbon::now())>23 && 
            $carbon::parse($question->created_at)->diffInDays($carbon::now())<32)
              <p class="date">
                {{$carbon::parse($question->created_at)->diffInDays($carbon::now())}} Days ago
              </p
            @elseif($carbon::parse($question->created_at)->diffInDays($carbon::now())>32 &&
            $carbon::parse($question->created_at)->diffInMonths($carbon::now())<12) 
              <p class="date">
                {{$carbon::parse($question->created_at)->diffInMonths($carbon::now())}} Months ago
              </p
            @else
              <p class="date">
                {{$carbon::parse($question->created_at)->diffInYears($carbon::now())}} Years ago
              </p
         @endif
        <p class="view text-xs">
          <i class="fa-solid fa-user-group"></i> {{$question->views_count}}
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