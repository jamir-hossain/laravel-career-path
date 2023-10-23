@extends('layout')
@section('content')
   <div
      class="relative bg-cover bg-center bg-no-repeat py-8"
      style="background-image: url(/assets/img/bg-hero.jpg)"
   >
      <div class="absolute inset-0 z-20 bg-gradient-to-r from-hero-gradient-from to-hero-gradient-to bg-cover bg-center bg-no-repeat"></div>

      <div class="container relative z-30 pt-20 pb-12 sm:pt-56 sm:pb-48 lg:pt-64 lg:pb-48">
         <div class="flex flex-col items-center justify-center lg:flex-row">
            <div class="rounded-full border-8 border-primary shadow-xl">
               <img
                  src="/assets/img/blog-author.jpg"
                  class="h-48 rounded-full sm:h-56"
                  alt="author"
               />
            </div>
            <div class="pt-8 sm:pt-10 lg:pl-8 lg:pt-0">
               <h1 class="text-center font-header text-4xl text-white sm:text-left sm:text-5xl md:text-6xl">
                  Hello I'm Christy Smith!
               </h1>
               <div class="flex flex-col justify-center pt-3 sm:flex-row sm:pt-5 lg:justify-start">
                  <div class="flex items-center justify-center pl-0 sm:justify-start md:pl-1">
                     <p class="font-body text-lg uppercase text-white">
                        Let's connect
                     </p>
                     <div class="hidden sm:block">
                        <i class="bx bx-chevron-right text-3xl text-yellow"></i>
                     </div>
                  </div>
                  <div class="flex items-center justify-center pt-5 pl-2 sm:justify-start sm:pt-0">
                     <a href="/">
                        <i class="bx bxl-facebook-square text-2xl text-white hover:text-yellow"></i>
                     </a>
                     <a href="/" class="pl-4">
                        <i class="bx bxl-twitter text-2xl text-white hover:text-yellow"></i>
                     </a>
                     <a href="/" class="pl-4">
                        <i class="bx bxl-dribbble text-2xl text-white hover:text-yellow"></i>
                     </a>
                     <a href="/" class="pl-4">
                        <i class="bx bxl-linkedin text-2xl text-white hover:text-yellow"></i>
                     </a>
                     <a href="/" class="pl-4">
                        <i class="bx bxl-instagram text-2xl text-white hover:text-yellow"></i>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="bg-gray-300" id="about">
      <div class="container flex flex-col items-center py-16 md:py-20 lg:flex-row">
         <div class="w-full text-center sm:w-3/4 lg:w-3/5 lg:text-left">
            <h2 class="font-header text-4xl font-semibold uppercase text-primary sm:text-5xl lg:text-6xl">
               Who am I?
            </h2>
            <h4 class="pt-6 font-header text-xl font-medium text-black sm:text-2xl lg:text-3xl">
               I'm Christy Smith, a Web Designer & Photographer
            </h4>
            <p class="pt-6 font-body leading-relaxed text-grey-20">
               Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
               eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
               enim ad minim veniam, quis nostrud exercitation ullamco laboris
               nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
               in reprehenderit in voluptate velit esse cillum dolore eu fugiat
               nulla pariatur. Excepteur sint occaecat cupidatat non proident,
               sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <div class="flex flex-col justify-center pt-6 sm:flex-row lg:justify-start">
               <div class="flex items-center justify-center sm:justify-start">
                  <p class="font-body text-lg font-semibold uppercase text-grey-20">
                     Connect with me
                  </p>
                  <div class="hidden sm:block">
                     <i class="bx bx-chevron-right text-2xl text-primary"></i>
                  </div>
               </div>
               <div class="flex items-center justify-center pt-5 pl-2 sm:justify-start sm:pt-0">
                  <a href="/">
                     <i class="bx bxl-facebook-square text-2xl text-primary hover:text-yellow"></i>
                  </a>
                  <a href="/" class="pl-4">
                     <i class="bx bxl-twitter text-2xl text-primary hover:text-yellow"></i>
                  </a>
                  <a href="/" class="pl-4">
                     <i class="bx bxl-dribbble text-2xl text-primary hover:text-yellow"></i>
                  </a>
                  <a href="/" class="pl-4">
                     <i class="bx bxl-linkedin text-2xl text-primary hover:text-yellow"></i>
                  </a>
                  <a href="/" class="pl-4">
                     <i class="bx bxl-instagram text-2xl text-primary hover:text-yellow"></i>
                  </a>
               </div>
            </div>
         </div>
         <div class="w-full pl-0 pt-10 sm:w-3/4 lg:w-2/5 lg:pl-12 lg:pt-0">
            <div>
               <div class="flex items-end justify-between">
                  <h4 class="font-body font-semibold uppercase text-black">
                     HTML & CSS
                  </h4>
                  <h3 class="font-body text-3xl font-bold text-primary">
                     85%
                  </h3>
               </div>
               <div class="mt-2 h-3 w-full rounded-full bg-lila">
                  <div
                     class="h-3 rounded-full bg-primary"
                     style="width: 85%"
                  ></div>
               </div>
            </div>
            <div class="pt-6">
               <div class="flex items-end justify-between">
                  <h4 class="font-body font-semibold uppercase text-black">
                     Python
                  </h4>
                  <h3 class="font-body text-3xl font-bold text-primary">
                     70%
                  </h3>
               </div>
               <div class="mt-2 h-3 w-full rounded-full bg-lila">
                  <div
                     class="h-3 rounded-full bg-primary"
                     style="width: 70%"
                  ></div>
               </div>
            </div>
            <div class="pt-6">
               <div class="flex items-end justify-between">
                  <h4 class="font-body font-semibold uppercase text-black">
                     Javascript
                  </h4>
                  <h3 class="font-body text-3xl font-bold text-primary">
                     98%
                  </h3>
               </div>
               <div class="mt-2 h-3 w-full rounded-full bg-lila">
                  <div
                     class="h-3 rounded-full bg-primary"
                     style="width: 98%"
                  ></div>
               </div>
            </div>
            <div class="pt-6">
               <div class="flex items-end justify-between">
                  <h4 class="font-body font-semibold uppercase text-black">
                     Figma
                  </h4>
                  <h3 class="font-body text-3xl font-bold text-primary">
                     91%
                  </h3>
               </div>
               <div class="mt-2 h-3 w-full rounded-full bg-lila">
                  <div
                     class="h-3 rounded-full bg-primary"
                     style="width: 91%"
                  ></div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="container py-16 md:py-20" id="services">
      <h2 class="text-center font-header text-4xl font-semibold uppercase text-primary sm:text-5xl lg:text-6xl">S
         Here's what I'm good at
      </h2>
      <h3 class="pt-6 text-center font-header text-xl font-medium text-black sm:text-2xl lg:text-3xl">
         These are the services Ioffer
      </h3>

      <div class="grid grid-cols-1 gap-6 pt-10 sm:grid-cols-2 md:gap-10 md:pt-12 lg:grid-cols-3">
         <div class="group rounded px-8 py-12 shadow hover:bg-primary">
            <div class="mx-auto h-24 w-24 text-center xl:h-28 xl:w-28">
               <div class="hidden group-hover:block">
                  <img
                     src="/assets/img/icon-development-white.svg"
                     alt="development icon"
                  />
               </div>
               <div class="block group-hover:hidden">
                  <img
                     src="/assets/img/icon-development-black.svg"
                     alt="development icon"
                  />
               </div>
            </div>
            <div class="text-center">
               <h3 class="pt-8 text-lg font-semibold uppercase text-primary group-hover:text-yellow lg:text-xl">
                  WEB DEVELOPMENT
               </h3>
               <p class="text-grey pt-4 text-sm group-hover:text-white md:text-base">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
               </p>
            </div>
         </div>
         <div class="group rounded px-8 py-12 shadow hover:bg-primary">
            <div class="mx-auto h-24 w-24 text-center xl:h-28 xl:w-28">
               <div class="hidden group-hover:block">
                  <img
                     src="/assets/img/icon-content-white.svg"
                     alt="content marketing icon"
                  />
               </div>
               <div class="block group-hover:hidden">
                  <img
                     src="/assets/img/icon-content-black.svg"
                     alt="content marketing icon"
                  />
               </div>
            </div>
            <div class="text-center">
               <h3 class="pt-8 text-lg font-semibold uppercase text-primary group-hover:text-yellow lg:text-xl">
                  Technical Writing
               </h3>
               <p class="text-grey pt-4 text-sm group-hover:text-white md:text-base">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
               </p>
            </div>
         </div>
         
         <div class="group rounded px-8 py-12 shadow hover:bg-primary">
            <div class="mx-auto h-24 w-24 text-center xl:h-28 xl:w-28">
               <div class="hidden group-hover:block">
                  <img
                     src="/assets/img/icon-mobile-white.svg"
                     alt="Mobile Application icon"
                  />
               </div>
               <div class="block group-hover:hidden">
                  <img
                     src="/assets/img/icon-mobile-black.svg"
                     alt="Mobile Application icon"
                  />
               </div>
            </div>
            <div class="text-center">
               <h3 class="pt-8 text-lg font-semibold uppercase text-primary group-hover:text-yellow lg:text-xl">
                  Mobile Development
               </h3>
               <p class="text-grey pt-4 text-sm group-hover:text-white md:text-base">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
               </p>
            </div>
         </div>
         <div class="group rounded px-8 py-12 shadow hover:bg-primary">
            <div class="mx-auto h-24 w-24 text-center xl:h-28 xl:w-28">
               <div class="hidden group-hover:block">
                  <img
                     src="/assets/img/icon-email-white.svg"
                     alt="Email Marketing icon"
                  />
               </div>
               <div class="block group-hover:hidden">
                  <img
                     src="/assets/img/icon-email-black.svg"
                     alt="Email Marketing icon"
                  />
               </div>
            </div>
            <div class="text-center">
               <h3 class="pt-8 text-lg font-semibold uppercase text-primary group-hover:text-yellow lg:text-xl">
                  Email Development
               </h3>
               <p class="text-grey pt-4 text-sm group-hover:text-white md:text-base">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
               </p>
            </div>
         </div>
         <div class="group rounded px-8 py-12 shadow hover:bg-primary">
            <div class="mx-auto h-24 w-24 text-center xl:h-28 xl:w-28">
               <div class="hidden group-hover:block">
                  <img
                     src="/assets/img/icon-design-white.svg"
                     alt="Theme Design icon"
                  />
               </div>
               <div class="block group-hover:hidden">
                  <img
                     src="/assets/img/icon-design-black.svg"
                     alt="Theme Design icon"
                  />
               </div>
            </div>
            <div class="text-center">
               <h3 class="pt-8 text-lg font-semibold uppercase text-primary group-hover:text-yellow lg:text-xl">
                  Graphic Design
               </h3>
               <p class="text-grey pt-4 text-sm group-hover:text-white md:text-base">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
               </p>
            </div>
         </div>
         <div class="group rounded px-8 py-12 shadow hover:bg-primary">
            <div class="mx-auto h-24 w-24 text-center xl:h-28 xl:w-28">
               <div class="hidden group-hover:block">
                  <img
                     src="/assets/img/icon-graphics-white.svg"
                     alt="Graphic Design icon"
                  />
               </div>
               <div class="block group-hover:hidden">
                  <img
                     src="/assets/img/icon-graphics-black.svg"
                     alt="Graphic Design icon"
                  />
               </div>
            </div>
            <div class="text-center">
               <h3 class="pt-8 text-lg font-semibold uppercase text-primary group-hover:text-yellow lg:text-xl">
                  Web Design
               </h3>
               <p class="text-grey pt-4 text-sm group-hover:text-white md:text-base">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
               </p>
            </div>
         </div>
      </div>
   </div>

   <div class="container py-16 md:py-20" id="contact">
      <h2 class="text-center font-header text-4xl font-semibold uppercase text-primary sm:text-5xl lg:text-6xl">
         Here's a contact form
      </h2>
      <h4 class="pt-6 text-center font-header text-xl font-medium text-black sm:text-2xl lg:text-3xl">
         Have Any Questions?
      </h4>
      <div class="mx-auto w-full pt-5 text-center sm:w-2/3 lg:pt-6">
         <p class="font-body text-grey-10">
            Lorem ipsum dolor sit amet consectetur adipiscing elit hendrerit
            condimentum turpis nisl sem, viverra habitasse urna ante lobortis
            fermentum accumsan. Viverra habitasse urna ante lobortis fermentum
            accumsan.
         </p>
      </div>
      <form class="mx-auto w-full pt-10 sm:w-3/4">
         <div class="flex flex-col md:flex-row">
            <input
               class="mr-3 w-full rounded outline outline-1 outline-gray-400 px-4 py-3 font-body text-black md:w-1/2 lg:mr-5"
               placeholder="Name"
               type="text"
               id="name"
            />
            <input
               class="mt-6 w-full rounded outline outline-1 outline-gray-400 px-4 py-3 font-body text-black md:mt-0 md:ml-3 md:w-1/2 lg:ml-5"
               placeholder="Email"
               type="text"
               id="email"
            />
         </div>
         <textarea
            class="mt-6 w-full rounded outline outline-1 outline-gray-400 px-4 py-3 font-body text-black md:mt-8"
            placeholder="Message"
            id="message"
            cols="30"
            rows="10"
         ></textarea>
         <button
            class="mt-6 flex items-center justify-center rounded bg-primary px-8 py-3 font-header text-lg font-bold uppercase text-white hover:bg-grey-20"
         >
            Send
            <i class="bx bx-chevron-right relative -right-2 text-3xl"></i>
         </button>
      </form>
   </div>
@endsection
