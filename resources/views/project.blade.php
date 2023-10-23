@extends('layout')
@section('content')
   <div class="container py-16 md:py-20" id="portfolio">
      <h2 class="text-center font-header text-4xl font-semibold uppercase text-primary sm:text-5xl lg:text-6xl">
         Project Details
      </h2>
      
      <div class="w-full mx-auto wbg-gray-100 border border-gray-300 rounded-md overflow-hidden shadow-md mt-14" style="max-width: 600px">
         <img
            class="w-full h-[200px] md:h-[300px] object-cover"
            alt="portfolio image"
            src="{{$project->websitePhoto}}"
         />

         <div class="p-5">
            <h6 class="text-xl font-semibold">{{$project->name}}</h6>
            <p class="mt-3 text-gray-600">{{$project->shortDescription}}</p>
         </div>
      </div>
   </div>
@endsection