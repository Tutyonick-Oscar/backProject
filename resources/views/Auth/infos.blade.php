@extends('layourts.base')
@section ('title','devInfos')
@section('container')
          <div
        class="container w-full mt-6 sm:w-4/5 sm:ml-64 sm:flex items-center justify-center px-4"
      >
        <div
          class="pop-up w-full border border-blue sm:border-none sm:w-3/4 h-auto rounded-xl sm:bg-white sm:shadow-lg mt-5 sm:rounded-sm py-5"
        >
          <h1 class="pl-10 text-blue text-2xl">
            Edit your profil to help us know you
          </h1>
          <form
            action=""
            class="flex flex-col px-10 gap-4 mt-4 text-sm sm:text-base text-blue"
          >
            <label for="experience"
              >How many years of experience do you have</label
            >
            <input
            name="experience"
              type="number"
              id="experience"
              class="border border-grey py-2 rounded-sm pl-10 focus:border-2 focus::border-grey"
            />
            <label for="post">What function do you have at fongolab club</label>
            <select
              name="post"
              id="post"
              class="border border-grey text-blue py-2 rounded-sm pl-10"
            >
              <option value="" class="text-blue bg-white">Learner</option>
              <option value="">Cordinator</option>
              <option value="">Teacher</option>
              <option value="">Master</option>
              <option value="">Superviser</option>
            </select>
            <label for="kind"> What kind of developer you are !</label>
            <select
              name="kind"
              id="kind"
              class="border border-grey text-blue py-2 rounded-sm pl-10"
            >
              <option value="" class="text-blue bg-white">Front-End</option>
              <option value="">Back-End</option>
              <option value="">FullStack</option>
            </select>
            <label for="bio">Bio</label>
            <textarea
              name="bio"
              id="bio"
              cols="30"
              rows="2"
              class="border border-grey rounded-sm text-blue focus:border-grey focus:border-2 p-4"
            ></textarea>
            <div
              class=" justify-center items-center relative after:w-2/6 before:w-1/5 sm:after:w-1/2 after:h-1 after:bg-blue after:content-['']
               after:block w-full after:absolute after:top-2 sm:after:top-3 after:right-1
               sm:before:w-1/4  before:h-1 before:bg-blue before:content-['']
               before:block  before:absolute before:top-2 sm:before:top-3 before:left-1"
            >
              <p class="sm:ml-48 ml-16 pl-2 sm:pl-0">Social media links</p>
            </div>
            <label for="twitter">twitter</label>
            <input type="text" id="twitter" name="twitter" class="border border-grey py-2 rounded-sm pl-10 focus:border-2 focus::border-grey">
            <label for="linkedIn">LinkedIn</label>
            <input type="text" id="twitter" name="linkedIn" class="border border-grey py-2 rounded-sm pl-10 focus:border-2 focus::border-grey">
            <label for="github">Github</label>
            <input type="text" id="github" name="github" class="border border-grey py-2 rounded-sm pl-10 focus:border-2 focus::border-grey">
            <label for="portfolio">Portfolio</label>
            <input type="text" id="portfolio" name="portfolio" class="border border-grey py-2 rounded-sm pl-10 focus:border-2 focus::border-grey">
            
            <div class="btns flex gap-4 self-end">
              <button
                class="px-4 py-2 text-blue bg-grey rounded-md hover:bg-gray hover:shadow-lg"
              >
                Cancel
              </button>
              <button
                type="submit"
                class="px-4 py-2 text-white bg-blue rounded-md hover:shadow-lg"
              >
                Save
              </button>
            </div>
          </form>
        </div>
      </div>
@endsection