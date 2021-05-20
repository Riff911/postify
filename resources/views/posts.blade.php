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
                          Posts
                        </h3>
                      </div>
                      <a href="/posts/create" type="button" class="inline-flex items-center m-4 px-4 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Create Post
                      </a> 
                      <a href="/exportexcel" type="button" class="inline-flex items-center m-4 px-4 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Posts as Excel
                      </a>
                      <a href="/exportcsv" type="button" class="inline-flex items-center m-4 px-4 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Posts as CSV
                      </a>
                      <a href="/exportpdf" type="button" class="inline-flex items-center m-4 px-4 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Posts as PDF
                      </a> 
                      <form>
                      <input style="width: 100%;border: 2px solid blue" placeholder="Search post..." type="text" class="typeahead">
                    </form>
                      <div class="bg-white shadow overflow-hidden sm:rounded-md">
                        <ul class="divide-y divide-gray-200">
                            @forelse ($posts as $post)
                            <li>
                                
                                <a href="/posts/{{ $post->id }}" class="block hover:bg-gray-50">
                                  <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                      <p class="text-sm font-thin text-gray-700 truncate">
                                        {{ $post->title }}
                                      </p>
                                      <div class="ml-2 flex-shrink-0 flex">
                                        <a href="/posts/{{ $post->id }}/edit" class="px-2 mr-3 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                          Edit
                                        </a>
                                        
                                        <form action="/posts/{{ $post->id }}" method="POST">
                                            @csrf
                                            @method('Delete')
                                        <button type="submit" href="/posts/{{ $post->id }}" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-800">
                                            Delete
                                        </button>
                                        </form>
                                      </div>
                                    </div>
                                    <div class="mt-2 sm:flex sm:justify-between">
                                      <div class="sm:flex">
                                        <p class="flex items-center text-sm font-light text-gray-500">
                                            {{ $post->body }}
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                </a>
                              </li> 
                              @empty
                              <li>
                                <a class="block hover:bg-gray-50">
                                  <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                      <p class="text-sm font-thin text-gray-700 truncate">
                                        No Posts Found
                                      </p>
                                      
                                    </div>
                                  </div>
                                </a>
                              </li> 
                            
                            @endforelse
                        </ul>
                        
                   </div>
            </div>
        </div>
    </div>
</x-app-layout>

