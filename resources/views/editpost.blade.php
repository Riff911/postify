<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <form action="/posts/{{ $post->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Title</label>
                        <input type="text" style="@error('title') border:1px solid red @enderror" name="title" value="{{ $post->title }}" class="form-control" id="formGroupExampleInput" placeholder="Post Title">
                        @error('title')
                        <p>{{ $message }}</p> 
                        @enderror
                        </div>
                      
                      <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Body</label>
                        <input type="text" style="@error('body') border:1px solid red @enderror" name="body" value="{{ $post->body }}" class="form-control" id="formGroupExampleInput2" placeholder="Post Body">
                        @error('body')
                        <p>{{ $message }}</p> 
                        @enderror  
                    </div>
                      <button class="btn btn-success" type="submit">Update</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
