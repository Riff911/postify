<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <form action="/posts" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Title</label>
                        <input type="text" style="@error('title') border:1px solid red @enderror" name="title" value="{{ old('title') }}" class="form-control" id="formGroupExampleInput" placeholder="Post Title">
                        @error('title')
                        <p style="color: red">{{ $message }}</p> 
                        @enderror
                        </div>
                      
                      <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Body</label>
                        <input type="text" style="@error('body') border:1px solid red @enderror" name="body" value="{{ old('title') }}" class="form-control" id="formGroupExampleInput2" placeholder="Post Body">
                        @error('body')
                        <p style="color: red">{{ $message }}</p> 
                        @enderror  
                    </div>
                      <button class="btn btn-success" type="submit">Create</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
