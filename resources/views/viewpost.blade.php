<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Post') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="/posts" type="button" class="inline-flex items-center m-4 px-4 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    back
                  </a> 
                  Owned by: {{ $post->user->name }}
                <div class="p-6 bg-white border-b border-gray-200">
                    
                   <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Title</label>
                        <input type="text" name="title" value="{{ $post->title }}" class="form-control" id="formGroupExampleInput" placeholder="Post Title">
                        
                        </div>
                      
                      <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Body</label>
                        <input type="text" name="body" value="{{ $post->body }}" class="form-control" id="formGroupExampleInput2" placeholder="Post Body">
                         
                    </div></div>
            </div>
        </div>
    </div>
</x-app-layout>
