@extends('layourts.base') 
@section('title','profil')
@section('container')
<div class="container w-full mt-3 sm:w-4/5 sm:ml-64 sm:flex sm:flex-col">
    <div class="sm:w-full sm:bg-blue sm:h-14">
      <div class="w-full h-32 items-center flex justify-between bg-blue px-4">
        .
        <div>
            @if ($userInfos->name == Auth::user()->name)
            <form action="" enctype="multipart/form-data" method="post">
              @csrf
              <div>
                <label for="photo"><i class="fa fa-camera -mt-16 text-lg text-white cursor-pointer"></i></label>
                <input type="file" name="photo" id="photo" class="hidden">
                @error('photo')
                    {{$message}}
                @enderror
              </div>     
              <button type="submit" class="cursor-pointer text-white px-4 rounded border border-grey">send</button>
            </form>
            @endif
        </div>
     
      </div>
    </div>
    <div class="sm:flex">
      <div class="bg-blue_f sm:bg-white sm:mt-16 sm:h-screen sm:sticky">
      
        <div class="flex flex-col gap-1 sm:flex-col">
          <div class="flex justify-between my-4 px-4 flex-col">
            <div class="flex justify-between my-2 px-2 sm:flex-col">
               @if ($userInfos->photo)
                <img
                src="/storage/{{$userInfos->photo->photo}}"
                class="w-32 rounded-full profile -mt-16">
              @else
                <div class="w-32 h-32 rounded-full bg-gray -mt-16 flex justify-center items-center text-blue text-4xl">
                    {{$str::upper($str::substr($userInfos->name,0,1))}}
                </div>
              @endif  
              
            <div class="flex gap-1 items-center sm:mt-16">
              <a href="{{route('profil',$userInfos->name)}}" class="profil-link bg-blue items-center px-4 rounded text-grey py-2 sm:px-3 sm:w-52"><i class="fa fa-link"></i> Copy profil link</a>
              @if ($userInfos->name == Auth::user()->name)
              <a href="{{route('devInformations',Auth::user()->name)}}" class=" bg-blue items-center px-3 text-grey py-2 rounded  sm:w-1/2"><i class="fa fa-pencil"></i> Edit</a>
              @endif
            </div>
            </div>
            <div class="w-full px-4 sm:-mt-24 sm:-ml-2">
              <p class="text-blue text-2xl font-extrabold">Dev. {{$str::ucfirst($userInfos->name)}}</p>
            </div>
            <div class="flex flex-col gap-2 sm:mt-20">
              <div class="flex gap-3 my-2 sm:px-2">
                <p class="text-blue">0 followers</p>
                <p class="text-blue">0 following</p>
              </div>
              <p class="text-grey bg-blue w-14 p-1 sm:px-2 rounded ml-2">Online</p> 
            </div>  
            @if ($userInfos->devInfos)
                @if ($userInfos->devInfos->bio)
                <div class="bio w-full sm:w-80 h-auto py- px-2 ">
                  <div class="bio text-blue">
                    {{$userInfos->devInfos->bio}}
                  </div>
                </div> 
                @else
                <div class="bio w-full sm:w-80 h-auto py-2  px-2 ">
                  <div class="bio text-blue">
                    Dev.{{$userInfos->name}} a web developer and {{$userInfos->devInfos->post}} at fongolab club, Working as {{$userInfos->devInfos->kind}} developer 
                  </div>
                </div> 
                @endif
            @endif     
          </div>
        </div>
      </div>  
      <div class="w-full flex flex-col h-auto bg-blue_f py-4 sm:mt-16">
        <div class="border-2 m-4  border-grey py-4">
          <div class="flex justify-between px-4">
            <p class="text-white">Questions</p>
            @if ($userInfos->devInfos)
                 <p class="text-blue">{{$userInfos->devInfos->post}} at Fongolab</p>
            @else
                 <p class="text-blue">No function defined</p> <br>
            @endif
            
            @if ($userInfos->devInfos)
                <p class="text-blue">{{$userInfos->devInfos->kind}}</p>
            @else
                <p class="text-blue">No position defined</p>
            @endif
          </div>
          <div class="flex justify-between px-4 my-4 items-center ">
            <p class="text-white">All : {{$userInfos->questions_count}}</p>
            <a href="#" class="text-white px-4 py-1 cursor-pointer bg-blue rounded">
              Private Contact
            </a>
          </div>
          <div class="flex justify-between px-4">
            <i class="fa-regular fa-star text-blue hover:bg-blue hover:text-white items-center rounded-full">
              <div class=" flex-col gap-2 bg-blue p-2 rounded absolute right-5 hidden">
                <a href="" class="text-white text-left text-xs"><i class="fa-regular fa-star"></i> Edit</a>
                <a href="" class="text-white text-left text-xs"><i class="fa-regular fa-star"></i> Cuver page</a>
                <a href="" class="text-white text-left text-xs"><i class="fa-regular fa-star"></i> Fork</a>
                <a href="" class="text-white text-left text-xs"><i class="fa-regular fa-star"></i> Move</a>
                <a href="" class="text-white text-left text-xs"><i class="fa-regular fa-star"></i> Pin</a>
                <a href="" class="text-white text-left text-xs"><i class="fa-regular fa-star"></i> Delete</a>
              </div>
            </i>
          </div>
        </div>
        <div class="border-2 mx-4 my-2  border-grey ">
          <div class="flex flex-col gap-1 text-blue w-full my-4 relative">
            @if ($userInfos->devInfos)
            <a href="{{$userInfos->devInfos->twitter}}" class="rounded text-blue bg-blue_f px-4 py-2 mx-4 w-11/12">Twitter : {{$userInfos->devInfos->twitter}}</a>
            <a href="{{$userInfos->devInfos->linkedin}}" class="rounded text-blue bg-blue_f px-4 py-2 mx-4 w-11/12"><i class="fa-regular fa-sun-bright"></i>LinkedIn : {{$userInfos->devInfos->linkedin}}</a>
            <a href="{{$userInfos->devInfos->github}}" class="rounded text-blue bg-blue_f px-4 py-2 mx-4 w-11/12"><i class="fa-thin fa-user-group"></i>Github : {{$userInfos->devInfos->github}}</a>
            <a href="{{$userInfos->devInfos->portfolio}}" class="rounded text-blue bg-blue_f px-4 py-2 mx-4 w-11/12"><i class="fa-thin fa-user-group"></i>PortFolio : {{$userInfos->devInfos->portfolio}}</a>
            @else
            <a href="#" class="rounded text-blue bg-blue_f px-4 py-2 mx-4 w-11/12">Twitter : undefine for now</a> 
            <a href="#" class="rounded text-blue bg-blue_f px-4 py-2 mx-4 w-11/12">LinkedIn : undefine for now</a>
            <a href="#" class="rounded text-blue bg-blue_f px-4 py-2 mx-4 w-11/12">Github : undefine for now</a>
            <a href="#" class="rounded text-blue bg-blue_f px-4 py-2 mx-4 w-11/12">Portfolio : undefine for now</a>     
            @endif   
          </div>
        </div>
        @if ($userInfos->questions)
        <div class="border-2 mx-4 my-2  border-grey py-4">
          @foreach ($questions as $question)
          <div class="flex w-full h-auto flex-col px-4 text-blue border-b py-3 border-grey">
            <div class="flex justify-between">
              <p>{{$question->title}}</p>
              <div class="gap-2 flex">
                <i class="fa-regular fa-star"></i>
                <i class="fa-solid fa-ellipsis">
                  <div class=" flex-col gap-2 bg-blue p-2 rounded absolute right-5 hidden ">
                    <a href="{{route('descriptions',$question->id)}}" class="text-white text-left text-xs flex gap-1"><i class="fa-regular fa-star"></i>descriptions</a>
                    <a href="{{route('answer',$question->id)}}" class="text-white text-left text-xs flex gap-1"><i class="fa-regular fa-star"></i> answer</a>
                  </div>
                </i>
              </div>
            </div>
            <div class="flex flex-col gap-2">
              <p class="text-blue_f text-sm">post on {{$question->created_at->format('d M Y')}}</p>
              <div class="flex items-center gap-2">
                <i class="fa-sharp fa-light fa-globe"></i>
                <p class="text-xs text-blue_f">Public</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        @endif
      </div>
    </div>
  </div>
@endsection