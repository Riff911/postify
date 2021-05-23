<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>
    @if(Session::has('student_added'))
    <div class="bg-green-100 border border-green-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ Session::pull('student_added') }}</span>
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
                          Students
                        </h3>
                      </div>
                      <a href="/addstudent" type="button" class="inline-flex items-center m-4 px-4 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Create Student
                      </a>
                      
                      <div class="bg-white shadow overflow-hidden sm:rounded-md">

                        <table class='mx-auto max-w-6xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
            <thead class="bg-gray-50">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Profile 
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Name
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Action
                    </th>
                    
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($students as $student)
                <tr>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="inline-flex w-20 h-20">
                                <img class='w-20 h-20 object-cover rounded-full' alt='User avatar' src="{{ asset('images') }}/{{ $student->profileimage }}">
                            </div>
                            <div>
                                
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="">
                            {{ $student->name }}
                        </p>
                        
                    </td>
                    <td class="px-6 py-4 text-center">
                            <a href="/editstudent/{{ $student->id }}" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a>
                            <a href="/deletestudent/{{ $student->id }}" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Remove</a>
                        
                    </td>
                   
                </tr>
                @empty
           
                   
        <tr>
    <td colspan="3">
                  <a class="block hover:bg-gray-50">
                    <div class="px-4 py-4 sm:px-6">
                      <div class="flex items-center justify-between">
                        <p class="text-sm font-thin text-gray-700 truncate">
                          No Students Found
                        </p>
                        
                      </div>
                    </div>
                  </a>
                </td>
                   
            </tr>
              @endforelse
            </tbody>
        </table>
                   </div>
            </div>
        </div>
    </div>
    <script>
       function loader(){
        $('#pas').text('hello.php'); 
       }
    </script>
</x-app-layout>

