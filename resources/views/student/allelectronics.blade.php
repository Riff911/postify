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
                      <a href="#" style="display: none" id="deleteSelected" class="inline-flex items-center m-4 px-4 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Delete Selected
                      </a>
                        <input style="width: 100%;border: 2px solid blue" name="search" id="search" placeholder="Search Electronics..." type="text" class="typeahead">
                      
                      <div class="bg-white shadow overflow-hidden sm:rounded-md">

                        <table id="electable" class='mx-auto max-w-6xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
            <thead class="bg-gray-50">
                
                <tr class="text-gray-600 text-left">
                    <th><input onchange="displayer()" type="checkbox" id="checkAll"> </th>
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
                <tr id="eid{{ $electronic->id }}">
                    <td><input type="checkbox" onchange="displayer()" name="ids" class="checker" value="{{ $electronic->id }}"> </td>
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
                            <a type="button" onclick="editelectronic({{ $electronic->id }})" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a>
                            <a type="button" onclick="deleteelectronic({{ $electronic->id }})"  class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Remove</a>
                        
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
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id2">
        <div class="relative w-auto my-6 mx-auto max-w-3xl">
          <!--content-->
          <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-start justify-between p-3 border-b border-solid border-blueGray-200 rounded-t">
              <h3 class="text-3xl font-semibold">
                Edit Electronic
              </h3>
              <button class="p-1 ml-auto  border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id2')">
                <span style="background: red" class="text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                  ×
                </span>
              </button>
            </div>
            <!--body-->
            <div class="relative p-6 flex-auto">
                <form class="w-full" id="electroniceditform"  enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                <div class="w-full px-4 py-6 ">
                    <div class="mb-1"> <span class="text-sm">Name</span> <input required type="text" name="name" id="name2" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600"> </div>
                    
                    <div class="mb-1"> <span class="text-sm">Description</span> <input required type="text" name="desc" id="desc2" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600"> </div>
                    <div class="mt-3 text-right"><button class="ml-2 h-10 w-32 bg-red-600 rounded text-white hover:bg-red-700" type="button" onclick="toggleModal('modal-id2')">Close</button>  <button type="submit" class="ml-2 h-10 w-32 bg-blue-600 rounded text-white hover:bg-blue-700">Update</button> </div>
                </div>
            </form>
            </div>
            <!--footer-->
           
          </div>
        </div>
      </div>

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
                <form class="w-full" id="electronicform"  enctype="multipart/form-data">
                    @csrf
                <div class="w-full px-4 py-6 ">
                    <div class="mb-1"> <span class="text-sm">Name</span> <input required type="text" name="name" id="name" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600"> </div>
                    
                    <div class="mb-1"> <span class="text-sm">Description</span> <input required type="text" name="desc" id="desc" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600"> </div>
                    <div class="mt-3 text-right"><button class="ml-2 h-10 w-32 bg-red-600 rounded text-white hover:bg-red-700" type="button" onclick="toggleModal('modal-id')">Close</button>  <button type="submit" class="ml-2 h-10 w-32 bg-blue-600 rounded text-white hover:bg-blue-700">Create</button> </div>
                </div>
            </form>
            </div>
            <!--footer-->
           
          </div>
        </div>
      </div>
      <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
      <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id2-backdrop"></div>
      <script type="text/javascript">
        function toggleModal(modalID){
          document.getElementById(modalID).classList.toggle("hidden");
          document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
          document.getElementById(modalID).classList.toggle("flex");
          document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }
      </script>
      <script>
          function editelectronic(id){
            $.get('/electronic/'+id,function(electronic){
                $('#id').val(electronic.id);
                $('#name2').val(electronic.name);
                $('#desc2').val(electronic.desc);
                toggleModal('modal-id2');
            });
          }
      </script>
      <script>
        function deleteelectronic(id){
            if(confirm('Do you want to delete this electronic?')){
          $.ajax({
              url: '/delelectronic/'+id,
              type: 'DELETE',
              data: {
                _token : $("input[name=_token]").val()
              },
              success: function(response){
                $("#eid"+id).remove();
          }});
            }
        }
    </script>
      <script>
          $("#electronicform").submit(function(e){
              e.preventDefault();
              let name = $("#name").val();
              let desc = $("#desc").val();
              let _token = $("input[name=_token]").val();
            $.ajax({
              url: "{{ route('addelectronic') }}",
              type: "POST",
              data: {
                  name: name,
                  desc: desc,
                  _token: _token
              },
              success: function(response){
                  
                  if(response){
                      $("#electable tbody").prepend("<tr id='eid"+response.id+"'><td><input type='checkbox' name='ids' class='checker' value='"+response.id+"'> </td><td class='px-6 py-4'><p>"+response.name+"</p></td><td class='px-6 py-4'><p>"+ response.desc+"</p></td><td class='px-6 py-4 text-center'> <a type='button' onclick='editelectronic("+response.id+")' class='bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin'>Edit</a> <a  class='bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin'>Remove</a></td></tr>");
                      $("#electronicform")[0].reset();
                      toggleModal('modal-id')
                  }
              }
          });

          });
                </script>
                <script>
                    function displayer(){
                        $('#deleteSelected').toggle(!!$('input:checkbox:checked').length);
                    }
                </script>
                <script>
                    $('#checkAll').click(function(){
                        $('.checker').prop('checked',$(this).prop('checked'));
                    });
                </script>
                
        <script>
            $("#electroniceditform").submit(function(e){
                e.preventDefault();
                let id = $("#id").val();
                let name = $("#name2").val();
                let desc = $("#desc2").val();
                let _token = $("input[name=_token]").val();
              $.ajax({
                url: "{{ route('updateelectronic') }}",
                type: "PUT",
                data: {
                    id: id,
                    name: name,
                    desc: desc,
                    _token: _token
                },
                success: function(response){
                    
                    if(response){
                        $("#eid"+response.id).html("<td><input type='checkbox' name='ids' class='checker' value='"+response.id+"'> </td><td class='px-6 py-4'><p>"+response.name+"</p></td><td class='px-6 py-4'><p>"+ response.desc+"</p></td><td class='px-6 py-4 text-center'> <a type='button' onclick='editelectronic("+response.id+")' class='bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin'>Edit</a> <a  class='bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin'>Remove</a></td>");
                      $("#electroniceditform")[0].reset();
                        toggleModal('modal-id2')
                    }
                }
            });
  
            });
                  </script>
                  <script>
                    $("#deleteSelected").click(function(e){
                        if(confirm('Do you want to delete the selected electronics?')){
                        e.preventDefault();
                        var allids = [];
                        $("input:checkbox[name=ids]:checked").each(function(){
                            allids.push($(this).val());
                        });
                        $.ajax({
                    url: "{{ route('delelectronics') }}",
                    type: 'DELETE',
                    data: {
                        _token : $("input[name=_token]").val(),
                        ids: allids
                    },
                    success: function(response){
                        $.each(allids,function(key,val){
                        $("#eid"+val).remove();
                        $('#checkAll').prop('checked',false);
                        })
                }});
                        }
                    });
                    
                </script>
                <script>
                  function fetchelec(query = ''){
                    $.ajax({
                      url: "{{ route('getelectronics') }}",
                      method: "GET",
                      data: {
                        query: query
                      },
                      success: function(data){
                        $('tbody').html(data.tabledata);
                      }
                    });
                  }
              </script>
              <script>
                $(document).on('keyup','#search',function(){
                  var query = $(this).val();
                  fetchelec(query);
                })
              </script>
</x-app-layout>

