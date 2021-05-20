<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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
                          Add Student
                        </h3>
                      </div>
                      <div class="bg-white shadow overflow-hidden sm:rounded-md">
                        <div class="py-2 h-screen bg-gray-300 px-2">
                            <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
                                <div class="md:flex">
                                   
                                    <form class="w-full px-4 py-6 " action="/addstudent" method="post" enctype="multipart/form-data">
                                        @csrf
                                    <div class="w-full px-4 py-6 ">
                                        <div class="mb-1"> <span class="text-sm">Full name</span> <input type="text" name="name" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600"> </div>
                                        @error('name')
                                        <div style="color:red">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-1"> <span>Choose Profile Image</span>
                                            <div class="relative border-dotted h-32 rounded-lg border-dashed border-2 border-blue-700 bg-gray-100 flex justify-center items-center">
                                                <div class="absolute">
                                                    <div class="flex flex-col items-center"> <i class="fa fa-folder-open fa-3x text-blue-700"></i> <span class="block text-gray-400 font-normal"></span> </div>
                                                </div> <input type="file" onchange="previewFile(this)" name="file">
                                            </div>
                                            <div style="align-content:center">
                                            <img alt="Profile Image" id="previewImg" style="max-width: 150px;" class="mt-2" /></div>
                                            @error('file')
                                        <div style="color:red">{{ $message }}</div>
                                        @enderror
                                        </div>
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

