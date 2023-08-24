@extends('layourts.base')
@section('title','asking')
@section('container')
<div class="container w-full mt-3 sm:w-4/5 sm:ml-64">
    <form action="" enctype="multipart/form-data" method="post">
      @csrf
      <div class="to-ask  w-full flex flex-col gap-3 px-4 ">
        <h1 class="text-blue font-bold text-2xl">Ask Question</h1>
        <p class=" text-blue bg-grey rounded-md px-4 py-2 absolute right-4 top-4 
        sm:right-6 cursor-pointer ease-in-out duration-500 hover:bg-blue hover:text-white">
          <a href="{{route('questions')}}">Go Back</a>
        </p>
        <div class="flex flex-col gap-2 mt-3 pb-4">
          <div class="title w-full flex flex-col p-4 rounded-md border border-grey gap-2">
            <p class="text-blue font-bold text-xl">Question Title</p>
            <p class="text-blue">
              Be specific and imagine you’re asking a question to another person.
            </p>
            <input type="text" name="title" value="" placeholder="Give a title to your question" class="
             border border-blue outline-none hover:border-2 w-full py-2 rounded-md pl-3 text-grey">
             @error('title')
                 {{$message}}
             @enderror
          </div>
       
           <div class="tags flex flex-col gap-2 rounded-md border border-grey p-4">
             <p class="text-blue font-bold text-2xl">Tags</p>
             <p class="text-blue">
              Add tags to describe what your question is about
             </p>
             <input type="text" name="tags" value="" placeholder="tags" class="
             border border-blue outline-none hover:border-2 w-full py-2 rounded-md pl-3 text-grey">
             @error('tags')
                 {{$message}}
             @enderror
           </div>
           <div class="descript flex flex-col gap-2 rounded-md border border-grey p-4">
            <p class="text-blue font-bold text-xl">
              Descriptions
            </p>
            <textarea name="descriptions" id="" cols="30" rows="5" class=" text-area
            text-grey border border-blue rounded-md p-4 outline-none hover:border-2">Describe what you tried, what you expected to happen, and what actually resulted. Minimum 20 characters.</textarea>
            @error('descriptions')
                {{$message}}
            @enderror
           </div>
           <div class="ullistration flex flex-col gap-2 rounded-md border border-grey p-4">
            <p class="text-blue">
              would you like to ullistrate your question with an image ?
            </p>
            <input type="file" name="image" placeholder="Select image in your file" class="
            outline-none py-2  border-blue">
            @error('image')
                {{$message}}
            @enderror
           </div>
           <div class="ullistration flex flex-col gap-2 rounded-md border border-grey p-4">
            <p class="text-blue font-bold text-xl">
              Technical Details
            </p>
            <textarea name="tech_details" id="" cols="30" rows="3" class="tech-details
            text-grey border border-blue rounded-md p-4 outline-none hover:border-2">Add some technicals details to specify your question</textarea>
            @error('tech_details')
                {{$message}}
            @enderror
           </div>
           <button type="submit" name="submit" class=" w-full py-2 bg-grey rounded-md text-blue
           sm:w-1/2 sm:self-center hover:bg-blue hover:text-white ease-out duration-700 font-bold">
            Send Question
           </button>
           </div>
        </div>
    </form>     
    </div>
@endsection