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
                          Electronics
                        </h3>
                      </div>
                      <a type="button" onclick="toggleModal('modal-id')" class="inline-flex items-center m-4 px-4 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Create electronic
                      </a>
                      
                      <div class="bg-white shadow overflow-hidden sm:rounded-md">

                        <table class='mx-auto max-w-6xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
            <thead class="bg-gray-50">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Name
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Description
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Action
                    </th>
                    
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($electronics as $electronic)
                <tr>
                    <td class="px-6 py-4">
                        <p class="">
                            {{ $electronic->name }}
                        </p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="">
                            {{ $electronic->desc }}
                        </p>
                        
                    </td>
                    <td class="px-6 py-4 text-center">
                            <a class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a>
                            <a  class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Remove</a>
                        
                    </td>
                   
                </tr>
                @empty
           
                   
        <tr>
    <td colspan="3">
                  <a class="block hover:bg-gray-50">
                    <div class="px-4 py-4 sm:px-6">
                      <div class="flex items-center justify-between">
                        <p class="text-sm font-thin text-gray-700 truncate">
                          No Electronics Found
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
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
        <div class="relative w-auto my-6 mx-auto max-w-3xl">
          <!--content-->
          <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-start justify-between p-3 border-b border-solid border-blueGray-200 rounded-t">
              <h3 class="text-3xl font-semibold">
                Create an Electronics
              </h3>
              <button class="p-1 ml-auto  border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                <span style="background: red" class="text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                  ×
                </span>
              </button>
            </div>
            <!--body-->
            <div class="relative p-6 flex-auto">
                <form class="w-full" action="/addstudent" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="w-full px-4 py-6 ">
                    <div class="mb-1"> <span class="text-sm">Name</span> <input type="text" name="name" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600"> </div>
                    
                    <div class="mb-1"> <span class="text-sm">Description</span> <input type="text" name="desc" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600"> </div>
                    <div class="mt-3 text-right"><button class="ml-2 h-10 w-32 bg-red-600 rounded text-white hover:bg-red-700" type="button" onclick="toggleModal('modal-id')">Close</button>  <button type="submit" class="ml-2 h-10 w-32 bg-blue-600 rounded text-white hover:bg-blue-700">Create</button> </div>
                </div>
            </form>
            </div>
            <!--footer-->
           
          </div>
        </div>
      </div>
      <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
      <script type="text/javascript">
        function toggleModal(modalID){
          document.getElementById(modalID).classList.toggle("hidden");
          document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
          document.getElementById(modalID).classList.toggle("flex");
          document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }
      </script>
</x-app-layout>

