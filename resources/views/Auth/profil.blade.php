@extends('layourts.base') 
@section('title','profil')
@section('container')
<div class="container w-full mt-3 sm:w-4/5 sm:ml-64 sm:flex sm:flex-col">
    <div class="sm:w-full sm:bg-blue sm:h-14">
      <div class="w-full h-32 items-center flex justify-between bg-blue px-4">
        .
        <i class="fa fa-camera -mt-16 text-lg"></i>
      </div>
    </div>
    <div class="sm:flex">
      <div class="bg-blue_f sm:bg-white sm:mt-16 sm:h-screen sm:sticky">
      
        <div class="flex flex-col gap-1 sm:flex-col">
          <div class="flex justify-between my-4 px-4 flex-col">
            <div class="flex justify-between my-2 px-2 sm:flex-col">
              <img src="../photos/avat.png" class="w-32 rounded-full -mt-16">
            <div class="flex gap-1 items-center sm:mt-16">
              <a href="" class="bg-blue items-center px-4 rounded text-grey py-2 sm:px-3 sm:w-52"><i class="fa fa-link"></i> Copy profil link</a>
              <a href="" class="bg-blue items-center px-3 text-grey py-2 rounded  sm:w-1/2"><i class="fa fa-pencil"></i> Edit</a>
            </div>
            </div>
            <div class="w-full px-4 sm:-mt-32">
              <p class="text-blue">Homere Baraka</p>
              <p class="text-grey text-sm">@homere</p>
            </div>
            <div class="flex flex-col gap-2 sm:mt-20">
              <div class="flex gap-3 my-2">
                <p class="text-blue">0 followers</p>
                <p class="text-blue">0 following</p>
              </div>
              <p class="text-grey bg-blue w-14 p-1 rounded">Online</p>
            </div>
          </div>
        </div>
      </div>  
      <div class="w-full flex flex-col h-auto bg-blue_f py-4 sm:mt-16">
        <div class="border-2 m-4  border-grey py-4">
          <div class="flex justify-between px-4">
            <p class="text-white">Repels</p>
            <p class="text-blue">Community</p>
            <p class="text-blue">Status</p>
          </div>
          <div class="flex justify-between px-4 my-4 items-center">
            <p class="text-white">All/</p>
            <button class="text-white px-4 py-1 cursor-pointer bg-blue rounded">
              Publish a Rapel
            </button>
          </div>
          <div class="flex justify-between px-4">
            <input type="file" name="" id="" class=" text-blue rounded">
            <i class="fa-regular fa-star text-blue hover:bg-blue hover:text-white items-center rounded-full">
              <div class="flex flex-col gap-2 bg-blue p-2 rounded absolute right-5 hidden">
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
            <a href="" class="rounded text-blue bg-blue_f px-4 py-2 mx-4 w-11/12"> Bousted Repels</a>
            <a href="" class="rounded text-blue bg-blue_f px-4 py-2 mx-4 w-11/12"><i class="fa-regular fa-sun-bright"></i> Always On Repels</a>
            <a href="" class="rounded text-blue bg-blue_f px-4 py-2 mx-4 w-11/12"><i class="fa-thin fa-user-group"></i> Shared whith name</a>
          </div>
        </div>
        <div class="border-2 mx-4 my-2  border-grey py-4">
          <div class="flex w-full h-auto flex-col px-4 text-blue border-b py-3 border-grey">
            <div class="flex justify-between">
              <p>Yudil.sarl</p>
              <div class="gap-2 flex">
                <i class="fa-regular fa-star"></i>
                <i class="fa-solid fa-ellipsis">
                  <div class="flex flex-col gap-2 bg-blue p-2 rounded absolute right-5 hidden">
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
            <div class="flex flex-col gap-2">
              <p class="text-blue_f text-sm">27 days ago</p>
              <div class="flex items-center gap-2">
                <i class="fa-sharp fa-light fa-globe"></i>
                <p class="text-xs text-blue_f">Public</p>
              </div>
            </div>
          </div>
          <div class="flex w-full h-auto flex-col px-4 text-blue border-b py-3 border-grey">
            <div class="flex justify-between">
              <p>Yudil.sarl</p>
              <div class="gap-2 flex">
                <i class="fa-regular fa-star"></i>
                <i class="fa-solid fa-ellipsis">
                  <div class="flex flex-col gap-2 bg-blue p-2 rounded absolute right-5 hidden">
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
            <div class="flex flex-col gap-2">
              <p class="text-blue_f text-sm">27 days ago</p>
              <div class="flex items-center gap-2">
                <i class="fa-sharp fa-light fa-globe"></i>
                <p class="text-xs text-blue_f">Public</p>
              </div>
            </div>
          </div>
          <div class="flex w-full h-auto flex-col px-4 text-blue my-4">
            <div class="flex justify-between">
              <p>Yudil.sarl</p>
              <div class="gap-2 flex">
                <i class="fa-regular fa-star"></i>
                <i class="fa-solid fa-ellipsis">
                  <div class="flex flex-col gap-2 bg-blue p-2 rounded absolute right-5 hidden">
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
            <div class="flex flex-col gap-2">
              <p class="text-blue_f text-sm">27 days ago</p>
              <div class="flex items-center gap-2">
                <i class="fa-sharp fa-light fa-globe"></i>
                <p class="text-xs text-blue_f">Public</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection