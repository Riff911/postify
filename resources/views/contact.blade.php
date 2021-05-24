<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>
    @if(Session::has('status'))
    <div class="bg-green-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ Session::pull('status') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          </span>
      </div>  
    @endif
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" bg-white border-b border-gray-200">
                    <div class="bg-indigo-700 px-4 py-5 border-b rounded-t sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-white">
                          Contact Us
                        </h3>
                      </div>
                      <div class="bg-white shadow overflow-hidden sm:rounded-md">
                        <div class="py-2 bg-whiteg px-2">
                            <div class="max-w-md mx-auto bg-gray-300 rounded-lg overflow-hidden md:max-w-lg">
                                <div class="md:flex">
                                   
                                    <form action="/addstudent" method="post" class="w-full px-4 py-6 " enctype="multipart/form-data">
                                        @csrf
                                    <div class="w-full px-4 py-6 ">
                                        <div class="mb-1"> <span class="text-sm">Full name</span> <input type="text" name="name" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600"> </div>
                                        @error('name')
                                        <div style="color:red">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-1"> <span class="text-sm">Email</span> <input type="email" name="name" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600"> </div>
                                        @error('email')
                                        <div style="color:red">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-1"> <span class="text-sm">Phone</span> <input type="number" name="name" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600"> </div>
                                        @error('phone')
                                        <div style="color:red">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-1"> <span class="text-sm">Message</span> <textarea name="msg" rows="10" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600"> </textarea></div>
                                        @error('name')
                                        <div style="color:red">{{ $message }}</div>
                                        @enderror
                                        <div class="mt-3 text-right"> <button type="submit" class="ml-2 h-10 w-32 bg-blue-600 rounded text-white hover:bg-blue-700">Create</button> </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                      </div>
                   </div>
            </div>
        </div>
    </div>
</x-app-layout>

