<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
<script src="<?= base_url('assets/js/sweetalert.all.js');?>"></script>
<script>
    $(document).ready(function(){
     var table = $('#TblDataUser').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            "ordering": true,
            "order": [
                [1, 'asc']
            ], 
            ajax : {
                    "url" : 'get-user',
                    "type" : 'POST',
                    },
                    "columns": [
                    {   data: 'user_id',"sortable": false, render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        className : "dt-center"
                    },
                    {
                        data : 'nama_lengkap',
                        name : 'nama_lengkap',
                    },              
                    {
                        data : 'email',
                        name : 'email',
                    },              
                    {
                        data : 'username',
                        name : 'username',
                    },
                    {
                        data : 'active',
                       render : function(data, row,type){
                        if(data == '1'){
                            var status = '<i class="badge text-success">aktif</i>';
                        }else{
                            var status = '<i class="badge text-danger">non aktif</i>';
                        }
                        return status;
                       }
                    },
                    {
                        data : 'initial',
                        name : 'initial',
                    },
                    {
                        data : 'nama_sekolah',
                        name : 'nama_sekolah',
                    },
                    {   
                        data : 'id', 
                        sortable: false,
                        render :function( data, type, row, meta ) {
                                    return '<div class="d-flex justify-content-center"><a href="javascript:void(0);" class="btn btn-success me-1 btn-sm edit-user" data-id="'+data+'"><i class="fa-solid fa-pen-to-square"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-sm delete-user" data-id="'+data+'"><div class="d-flex justify-content-center"><i class="fa fa-import me-1"></i> <i class="fa fa-trash"></i></div></a></div>';
                                },
                        className : "dt-center",
                        },           
                ],
            })
            $(document).on('click','.delete-user',function(e){
        e.preventDefault()
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Ingin menghapus data user !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).attr('data-id');
                $.ajax({
                    url : 'delete-user',
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