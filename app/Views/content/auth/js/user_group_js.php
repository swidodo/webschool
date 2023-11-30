<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
<script src="<?= base_url('assets/js/sweetalert.all.js');?>"></script>
<script>
    $(document).ready(function(){
      
        var table = $('#TblDataUserGroup').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            "ordering": true,
            "order": [
                [1, 'asc']
            ], 
            ajax : {
                    "url" : 'data-group-user',
                    "type" : 'POST',
                    },
                    "columns": [
                    {   data: 'user_id',"sortable": false, render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        className : "dt-center"
                    },
                    {
                        data : 'nama',
                        name : 'nama',
                    },              
                    {
                        data : 'role',
                        name : 'role',
                    },
                    {   
                        data : 'user_id', 
                        sortable: false,
                        render :function( data, type, row, meta ) {
                                    return '<div class="d-flex justify-content-center"><a href="javascript:void(0);" class="btn btn-success me-1 btn-sm edit-user-group" data-id="'+data+'"><i class="fa-solid fa-pen-to-square"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-sm delete-group-user" data-id="'+data+'"><div class="d-flex justify-content-center"><i class="fa fa-import me-1"></i> <i class="fa fa-trash"></i></div></a></div>';
                                },
                        className : "dt-center",
                        },           
                ],
        })
        $('#TambahUserGroup').on('click', function(){
            $('#UserGroupModalAdd').modal('show');
        })
    $('#sekolahId').on('change',function(){
        var sekolah_id = $(this).val();
        $.ajax({
            url : 'get_user_bySekolah',
            type : 'post',
            data : {sekolah_id : sekolah_id},
            dataType : 'json',
            beforeSend : function(){

            },
            success : function(respon){
                var user = '<option value="">-- pilih --</option>'
                $.each(respon.user, function(key,val){
                    user +=`<option value="`+val.user_id+`">`+val.nama_guru+`</option>`;
                })
                $('#userId').html(user)
                var group = '<option value="">-- pilih --</option>'
                $.each(respon.group, function(key,val){
                    group +=`<option value="`+val.id+`">`+val.name+`</option>`;
                })
                $('#groupId').html(group)
                
            }
        })
    })
    $('#UserGroupFormAdd').on('submit', function(e){
        e.preventDefault()
        var data = $('#UserGroupFormAdd').serialize();
        $.ajax({
            url : 'save-group-user',
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
                    $('#UserGroupModalAdd').modal('hide');
                    $('#UserGroupFormAdd')[0].reset();
                    table.ajax.reload();
                }
            },
            error : function(){
                alert('Terjadi kelasalahan !')
            }
        })
    })
    
    $(document).on('click','.edit-user-group',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url : 'edit-group-user',
            type : 'post',
            data : {id:id},
            dataType : 'json',
            beforeSend :function(){

            },
            success :function(respon){
                $('#sekolah_id_edit').html(`<option value="`+respon.id+`">`+respon.nama_sekolah+`</option>`)
                $('#user_id_edit').html(`<option value="`+respon.user_id+`">`+respon.nama_guru+`</option>`)

                var group = '<option value="">-- pilih --</option>'
                $.each(respon.group, function(key,val){
                    if (val.id == respon.group_id){
                        group +=`<option value="`+val.id+`" selected>`+val.name+`</option>`;
                    }else{
                        group +=`<option value="`+val.id+`">`+val.name+`</option>`;
                    }
                })
                $('#group_id_edit').html(group)
                
                $('#UserGroupModalEdit').modal('show');
            },
            error:function(){
                alert('Terjadi Kesalahan !');
            }
        })
        
    })
    $('#UserGroupFormEdit').on('submit',function(e){
        e.preventDefault()
        var data = $('#UserGroupFormEdit').serialize();
        $.ajax({
            url : 'update-group-user',
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
                    $('#UserGroupModalEdit').modal('hide');
                }
            },
            error : function(){
                alert('Terjadi Kesalahan !');
            }
        })
    })
    $(document).on('click','.delete-group-user',function(e){
        e.preventDefault()
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Ingin menghapus data group user !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).attr('data-id');
                $.ajax({
                    url : 'delete-group-user',
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