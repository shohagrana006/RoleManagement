@section('script')
    <script>
        $(function(){
            "use strict"
            $(document).ready(function(){
                // checked all permission
                $('#check_all').click(function(){
                    if($('#check_all').is(":checked")){
                       $("input[type='checkbox']").prop('checked',true)
                    } else {
                        $("input[type='checkbox']").prop('checked',false)
                    }
                })                                          
            })        
        });

        // checked permission by group name
        function checkedPermission(id, className){
            let groupId = $('#'+id);
            let permissionGroup = $('.'+className+' input');
            if($(groupId).is(":checked")){
                $(permissionGroup).prop('checked', true);
            } else{
                $(permissionGroup).prop('checked', false);
            }
            allpermissionSelectDeselectSingle()
        }

        function clickSingleToGroupPermission(singleClassName, groupIdName, permissionCount)
        {
            let className   = $('.'+singleClassName + ' input:checked');
            let idGroupName = $('#'+groupIdName)       
            if(className.length == permissionCount){
                idGroupName.prop("checked", true)
            } else{
                idGroupName.prop('checked', false)
            };
            allpermissionSelectDeselectSingle()
        }
        function allpermissionSelectDeselectSingle()
        {
            let inputLenght = $('input[type="checkbox"]:checked').length
            let permissionCount = {{count($permissios)}};
            let permissionGroups = {{count($permissionGroups)}};
           if((permissionGroups + permissionCount) <= inputLenght){
            $('#check_all').prop('checked', true);
           }else {
            $('#check_all').prop('checked', false);
           }        
        }
        allpermissionSelectDeselectSingle()
       
    </script>
@endsection