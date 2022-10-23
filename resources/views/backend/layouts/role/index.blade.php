@extends('backend.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection
@section('dashboard_content')
<div class="row">
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Data Table Default</h4>
                @include('backend.includes.__message')
                <div class="data-tables">
                    <table id="dataTable" class="text-center">
                        <thead class="bg-light text-capitalize">
                             <tr>
                                <th>Sl.</th>
                                <th width="30%">Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)                               
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>
                                        <span style="font-size: 16px; font-weight:800">{{$role->name}}</span>
                                        @foreach ($role->permissions as $permission)
                                            <div class="badge badge-success">
                                                {{$permission->name}}
                                            </div>
                                        @endforeach                                          
                                    </td>
                                    <td> 
                                        <a href="" onclick="
                                                event.preventDefault();
                                                if(confirm()){
                                                    document.getElementById('role_delete-{{$role->id}}').submit()
                                                }                                               
                                            ">delete</a>    
                                        <a href="{{route('role.edit', $role->id)}}">edit</a>    
                                    </td>
                                    <form style="display: none;" id="role_delete-{{$role->id}}" method="POST" action="{{route('role.destroy', $role->id)}}">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </tr>             
                            @endforeach                      
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script>

    /*================================
    datatable active
    ==================================*/
    
    $(document).ready(function() {
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                searchPanes: {
                    controls: false
                },
                dom: 'Plfrtip'
            });
        }
    });

    </script>
@endsection