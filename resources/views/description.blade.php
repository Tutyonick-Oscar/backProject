@extends('layourts.base')
@section('container')
{{-- @dd($answer) --}}
<div
class="container px-4 sm:w-full sm:ml-64 sm:pl-28 sm:flex sm:flex-col sm:justify-center"
>
<div
  class="question-header w-full sm:w-11/12 h-auto flex flex-col mt-6 gap-4"
>
  <a
    href="{{route('questions')}}"
    class="bg-blue_f p-2 w-full sm:w-2/6 flex gap-4 items-center text-blue rounded-md"
  >
    <i class="fa-solid fa-arrow-left"></i>
    Back to all questions
  </a>
  <p class="title text-blue text-xl capitalize">
    {{$question->title}}
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
  <div
    class="categories border border-grey rounded flex items-center w-full"
  >
    <a
      href=""
      class="px-4 py-2 text-blue border-r border-blue w-1/3 flex gap-4 items-center justify-center"
      ><i class="fa-solid fa-book-open"></i>Details</a
    >
    <a
      href=""
      class="px-4 py-2 text-blue border-r border-blue w-1/3 flex gap-4 items-center justify-center"
      ><i class="fa-solid fa-user-group"></i>Views</a
    >
    <a
      href=""
      class="px-4 py-2 text-blue w-1/3 flex gap-4 items-center justify-center"
      ><i class="fa-solid fa-check-double"></i>Answers</a
    >
  </div>
</div>
<div
  class="q-descriptions mt-4 w-full sm:w-11/12 bg-blue_f rounded-md p-5 flex flex-col gap-4"
>
  <div class="relative">
    <h1
      class="text-blue border-white border-b pb-3 font-bold text-4xl w-full"
    >
      Problem decriptions
    </h1>
    <div class="add-answer absolute right-1 top-1 translate-x-6">
      <p class="text-blue text-3xl rotate-90">...</p>
    </div>
    <div class="add-answer absolute right-5 top-3 hidden">
      <a href="" class="text-white border border-blue p-1 rounded"
        >Add Answer</a
      >
    </div>
  </div>
  <div class="details text-white py-2 text-base">
    {{$question->descriptions}}
  </div>
  @if ($question->image)
      <h1 class="text-blue border-white border-b pb-3 font-bold text-4xl">
       Code ullistrations
      </h1>
      <div class="ullistrations w-full ">
      <img src="{{$urlImage}}" alt="" height="50" class=" object-cover " />
      </div>
  @endif
  @if ($question->tech_details)
      <h1 class="text-blue border-white border-b pb-3 font-bold text-4xl">
        Technical Details
      </h1>
      <p class="text-blue">
        {{$question->tech_details}}
      </p>
  @endif
  <div class="relative">
    <h1 class="text-blue border-white border-b pb-3 font-bold text-4xl">
      Answers
    </h1>
    <div class="add-answer absolute right-1 top-1 translate-x-6">
      <p class="text-blue text-3xl rotate-90">...</p>
    </div>
    <div class="add-answer absolute right-5 top-3">
      <a
        href=""
        class="text-white border border-blue p-1 rounded hidden"
        >Add Answer</a
      >
    </div>
  </div>
  @forelse ($question->answers as $answer)
  <div class="answer flex flex-col border-b border-white pb-3 gap-2">
    <div>
      <p class="text-white">
        {{$answer->content}}
      </p>
    </div>
    <div class="user flex gap-4 items-center">
      <img
        src="../photos/Amicus.jpg"
        width="50"
        height="50"
        alt=""
        class="rounded-full"
      />
      <p class="name text-blue">Dev.Charles Basilwango</p>
      <p class="time-out">51 min ago</p>
      <p class="text-blue text-lg">
        <i class="fa-solid fa-thumbs-up"></i> 15
      </p>
      <p class="text-lg"><i class="fa-solid fa-thumbs-down"></i> 3</p>
    </div>
    <form action="" method="post">
      @csrf
      <div class="reactions flex justify-between">
        <button class="bg-blue text-white px-4 py-2 w-2/6 rounded-md">
          Userful <i class="fa-solid fa-check-double text-white"></i>
        </button>
        <div
          class="input flex border border-white w-3/5 rounded-md items-center justify-between"
        >
          <input
            type="text"
            name="comment"
            id=""
            placeholder="Relpy"
            class="outline-none placeholder:text-blue placeholder:pl-4 text-blue pl-4 bg-blue_f w-full bg-opacity-0"
          />
          @error('comment')
            {{$message}}
          @enderror
          <button type="submit">
            <i class="fa-solid fa-paper-plane text-blue text-2xl pr-4"></i>
          </button>        
        </div>
      </div>
      @forelse ($answer->comments as $reply)
      <div class="reply_to_reply">
        <div class="user flex gap-4 items-center">
          <img
            src="../photos/Amicus.jpg"
            width="50"
            height="50"
            alt=""
            class="rounded-full"
          />
          <p class="name text-blue">Dev.Charles Basilwango :</p>
        </div>
        <div class="text-white flex flex-col w-full">
          <p>
            {{$reply->comment}}
          </p>          
          <div
            class="input flex border border-white w-full py-2 rounded-md items-center justify-between"
          >
            <input
              type="text"
              name="reply_to_reply"
              id=""
              placeholder="Relpy"
              class="outline-none placeholder:text-blue placeholder:pl-4 text-blue pl-4 bg-blue_f w-full opacity-0"
            />
            @error('reply_to_reply')
                {{$message}}
            @enderror
            <button type="submit">
              <i class="fa-solid fa-paper-plane text-blue text-2xl w-1/12"></i>
            </button>          
          </div>
        </div>
      </div>
      @empty
          <p class=" text-blue mt-2 text-center">reply to this answer</p>
      @endforelse
    </form>
  </div>
  @empty
      <p class="text-blue">
        not yet answers for this question
      </p>
  @endforelse
</div>
</div>
@endsection