@extends('layout')
@section('content')
   <div class="container py-16 md:py-20" id="portfolio">
      <h2 class="text-center font-header text-4xl font-semibold uppercase text-primary sm:text-5xl lg:text-6xl">
         Check out my Portfolio
      </h2>
      <h3 class="pt-6 text-center font-header text-xl font-medium text-black sm:text-2xl lg:text-3xl">
         Here's what I have done with the past
      </h3>
      
      <div class="mx-auto grid w-full grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-14">
         @foreach ($projects as $project)
            <div class="bg-gray-100 border border-gray-300 rounded-md overflow-hidden shadow-md">
               <a
                  href="/projects/{{$project->id}}"
                  class="mx-auto transform transition-all hover:scale-105 md:mx-0"
               >
                  <img
                     class="w-full h-[200px] md:h-[300px] object-cover"
                     alt="portfolio image"
                     src="{{$project->websitePhoto}}"
                  />
               </a>

               <div class="p-5">
                  <h6 class="text-xl font-semibold">{{$project->name}}</h6>
               </div>
            </div>
         @endforeach
      </div>
   </div>
@endsection