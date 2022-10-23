@extends('backend.master')
@section('dashboard_content')
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Role Add</h4>
                    @include('backend.includes.__message')
                    <form action="{{route('role.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1">  
                        </div>
                        <br>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="check_all"  value="all">
                            <label class="form-check-label" for="check_all">All</label>
                        </div>   
                        <hr>

                        @foreach ($permissionGroups as $key => $permissionGroup)
                        @php
                            $key -= 1;
                        @endphp
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check mt-4">
                                        <input type="checkbox" class="form-check-input" onclick="checkedPermission(this.id, 'checkedGroupClass{{$key}}')" id="exampleCheck{{$key}}">
                                        <label class="form-check-label" for="exampleCheck{{$key}}">{{$permissionGroup->group_name}}</label>
                                    </div>
                                   
                                </div>
                                <div class="col-md-9 checkedGroupClass{{$key}}">
                                    @php
                                        $permissions = App\Models\User::getPermissionByGroupName($permissionGroup->group_name);
                                    @endphp
                                    @foreach ($permissions as $permission)                                      
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="permission[]" value="{{$permission->name}}" id="exampleCheck{{$permission->id}}">
                                            <label class="form-check-label" for="exampleCheck{{$permission->id}}">{{$permission->name}}</label>
                                        </div>       
                                    @endforeach
                                </div>
                            </div>
                            <hr>                          
                        @endforeach
                       
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('backend.partials.script')