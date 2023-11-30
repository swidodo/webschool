<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
<script src="<?= base_url('assets/js/sweetalert.all.js');?>"></script>
<script>
    $(document).ready(function(){
      
    var table = $('#TblDataGroupAccess').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            "ordering": true,
            "order": [
                [1, 'asc']
            ], 
            ajax : {
                    "url" : 'data-group-access',
                    "type" : 'POST',
                    },
                    "columns": [
                    {   data: 'id',"sortable": false, render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        className : "dt-center"
                    },
                    {
                        data : 'name',
                        name : 'name',
                    },              
                    {
                        data : 'description',
                        name : 'description',
                    },
                    {   
                        data : 'id', 
                        sortable: false,
                        render :function( data, type, row, meta ) {
                                    return '<div class="d-flex justify-content-center"><a href="javascript:void(0);" class="btn btn-success me-1 btn-sm edit-group-access" data-id="'+data+'"><i class="fa-solid fa-pen-to-square"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-sm delete-group-access" data-id="'+data+'"><div class="d-flex justify-content-center"><i class="fa fa-import me-1"></i> <i class="fa fa-trash"></i></div></a></div>';
                                },
                        className : "dt-center",
                        },           
                ],
        })
    $('#TambahGroup').on('click', function(){
        $('#GroupAccessModalAdd').modal('show');
        $('#tblPermission').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            "ordering": true,
            "order": [
                [1, 'asc']
            ], 
            "lengthMenu": [100],
            ajax : {
                    "url" : 'data-permission',
                    "type" : 'POST',
                    },
                    "columns": [
                    {   data: 'id',"sortable": false, render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        className : "dt-center"
                    },
                    {
                        data : 'name',
                        name : 'name',
                    },              
                    {
                        data : 'id',
                        render : function(data,row,type){
                            var input = '<input type="checkbox" class="" name="permission[]" value="'+data+'">';
                            return input;
                        },
                        className : "dt-center"
                    },        
                ],
        })
    })
    $('#GroupAccessFormAdd').on('submit', function(e){
        e.preventDefault()
        var data = $('#GroupAccessFormAdd').serialize();
        $.ajax({
            url : 'save_grou_access',
            type : 'post',
            data : data,
            dataType : 'json',
            beforeSend : function(){

            },
            success : function(respon){
                swal.fire({
                    icon : respon.status,
                    text : respon.msg
                })
                if (respon.status == 'success'){
                    $('#GroupAccessModalAdd').modal('hide');
                    $('#GroupAccessFormAdd')[0].reset();
                    table.ajax.reload();
                }
            },
            error : function(){
                alert('Terjadi kelasalahan !')
            }
        })
    })
    
    $(document).on('click','.edit-group-access',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url : 'edit-group-access',
            type : 'post',
            data : {id:id},
            dataType : 'json',
            beforeSend :function(){

            },
            success :function(respon){
                $('#id').val(respon.id);
                $('#name').val(respon.name);
                $('#desc').val(respon.description)
                loadEdit(id)
                $('#GroupAccessModalEdit').modal('show');
            },
            error:function(){
                alert('Terjadi Kesalahan !');
            }
        })
        function loadEdit(id){
            $('#tblPermissionEdit').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                "ordering": true,
                "order": [
                    [1, 'asc']
                ], 
                ajax : {
                        "url" : 'data-permission-edit',
                        "type" : 'POST',
                        "data" : {id :id},
                        },
                        "columns": [
                        {   data: 'id',"sortable": false, render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            },
                            className : "dt-center"
                        },
                        {
                            data : 'name',
                            name : 'name',
                        },              
                        {
                            data : null,
                            render : function(data,row,type){
                                if (data.id == data.permission_id && data.group_id == id){
                                    var input = '<input type="checkbox" class="" name="permission[]" value="'+data.id+'" checked>';
                                }else{
                                    var input = '<input type="checkbox" class="" name="permission[]" value="'+data.id+'">';
                                }
                                return input;
                            },
                            className : "dt-center"
                        },        
                    ],
                    "lengthMenu": [100],
            })
        }
    })
    $('#GroupAccessFormEdit').on('submit',function(e){
        e.preventDefault()
        var data = $('#GroupAccessFormEdit').serialize();

        $.ajax({
            url : 'update-group-access',
            type : 'post',
            data : data,
            dataType :'json',
            beforeSend : function(){

            },
            success : function(respon){
                swal.fire({
                    icon : respon.status,
                    text : respon.msg
                })
                if (respon.status == 'success'){
                    table.ajax.reload();
                    $('#GroupAccessModalEdit').modal('hide');
                }
            },
            error : function(){
                alert('Terjadi Kesalahan !');
            }
        })
    })
    $(document).on('click','.delete-group-access',function(e){
        e.preventDefault()
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Ingin menghapus data group access !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).attr('data-id');
                $.ajax({
                    url : 'delete-group-access',
                    type : 'post',
                    data : {id:id},
                    dataType : 'json',
                    success : function(respon){
                        swal.fire({
                            icon : respon.status,
                            text : respon.msg
                        })
                        table.ajax.reload();
                    }
                })
            }
        })

       
    })
})

</script>