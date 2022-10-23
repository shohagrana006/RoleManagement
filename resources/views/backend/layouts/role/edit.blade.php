@extends('backend.master')
@section('dashboard_content')
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Role Edit</h4>
                    @include('backend.includes.__message')
                    <form action="{{route('role.update',$role->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" value="{{$role->name}}" class="form-control" id="exampleInputEmail1">  
                        </div>
                        <br>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="check_all"  value="all">
                            <label class="form-check-label" for="check_all">All</label>
                        </div>   
                        <hr>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($permissionGroups as $permissionGroup)
                        @php                          
                            $permissions = App\Models\User::getPermissionByGroupName($permissionGroup->group_name);
                            $j = 1;
                        @endphp
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check mt-4">
                                        <input type="checkbox" class="form-check-input" onclick="checkedPermission(this.id, 'checkedGroupClass{{$i}}')" id="groupPermission{{$i}}" {{ App\Models\User::checkSinglePermission($role,$permissions) ? 'checked' : ''}}>
                                        <label class="form-check-label" for="groupPermission{{$i}}">{{$permissionGroup->group_name}}</label>
                                    </div>                       
                                </div>
                                <div class="col-md-9 checkedGroupClass{{$i}}">
                                    @foreach ($permissions as $permission)
                                        <div class="form-check">
                                            <input type="checkbox" onclick="clickSingleToGroupPermission('checkedGroupClass{{$i}}','groupPermission{{$i}}', {{count($permissions)}})" class="form-check-input" name="permission[]" value="{{$permission->name}}"  id="singlePermission{{$permission->id}}" {{$role->hasPermissionTo($permission->name) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="singlePermission{{$permission->id}}">{{$permission->name}}</label>
                                        </div>       
                                        @php $j++; @endphp     
                                    @endforeach  
                                </div>                            
                            </div>
                            <hr>
                            @php $i++; @endphp                          
                        @endforeach
                       
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('backend.partials.script')