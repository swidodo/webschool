<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
<script src="<?= base_url('assets/js/sweetalert.all.js');?>"></script>
<script>
    $(document).ready(function(){
      
        var table = $('#TblDataTitiMangsa').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            "ordering": true,
            "order": [
                [1, 'asc']
            ], 
            ajax : {
                    "url" : 'data-titi-mangsa',
                    "type" : 'POST',
                    },
            "columns": [
                    {   data: 'id_guru',"sortable": false, render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        className : "dt-center"
                    },
                    {
                        data : 'tahun_pelajaran',
                        name : 'tahun_pelajaran',
                    },              
                    {
                        data : 'tgl_raport_uts_ganjil',
                        name : 'tgl_raport_uts_ganjil',
                        className : "dt-center",
                    },
                                
                    {
                        data : 'tgl_raport_uas_ganjil',
                        name : 'tgl_raport_uas_ganjil',
                        className : "dt-center",
                    },
                    {
                        data : 'tgl_raport_uts_genap',
                        name : 'tgl_raport_uts_genap',
                    },
                    {
                        data : 'tgl_raport_uas_genap',
                        name : 'tgl_raport_uas_genap',
                    },
                    
                    {   
                        data : 'id', 
                        sortable: false,
                        render :function( data, type, row, meta ) {
                                    return '<div class="d-flex justify-content-center"><a href="javascript:void(0);" class="btn btn-success me-1 btn-sm edit-tm" data-id="'+data+'"><i class="fa-solid fa-pen-to-square"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-sm delete-tm" data-id="'+data+'"><div class="d-flex justify-content-center"><i class="fa fa-import me-1"></i> <i class="fa fa-trash"></i></div></a></div>';
                                },
                        className : "dt-center",
                        },           
                ],
        })
        $('#TambahTitiMangsa').on('click', function(){
            $.ajax({
                url : 'create-titi-mangsa',
                type : 'post',
                dataType : 'json',
                success : function(respon){
                    $('#TitiMangsaModalAdd').modal('show');
                    var html ='<option value="">-- Pilih --</option>';
                    $.each(respon.tahun,function(key,val){
                        html += `<option value="`+val.tahun_pelajaran+`">`+val.tahun_pelajaran+`</option>`;
                    })
                    $('#tahun_pelajaran').html(html)
                    $('#addAuthGroup').html(group)
                }
            })
        })
        $('#TitiMangsaFormAdd').on('submit', function(e){
            e.preventDefault()
            var data = $('#TitiMangsaFormAdd').serialize();

            $.ajax({
                url : 'save-titi-mangsa',
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
                    if (respon.status == "success"){
                        $('#TitiMangsaModalAdd').modal('hide');
                        $('#TitiMangsaFormAdd')[0].reset();
                        table.ajax.reload();
                    }
                    
                },
                error : function(){
                    alert('Terjadi kelasalahan !')
                }
            })
        })
        $(document).on('click','.edit-tm',function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.ajax({
                url : 'edit-titi-mangsa',
                type : 'post',
                data : {id:id},
                dataType : 'json',
                beforeSend :function(){

                },
                success :function(respon){
                    var tahun ='';
                    $.each(respon.tahun,function(key,val){
                        if (val.tahun_pelajaran == respon.tm.tahun_pelajaran){
                            tahun += `<option value="`+val.tahun_pelajaran+`" selected>`+val.tahun_pelajaran+`</option>`;
                        }else{
                            tahun += `<option value="`+val.tahun_pelajaran+`">`+val.tahun_pelajaran+`</option>`;
                        }
                    })
                    $('#edit_tahun_pelajaran').html(tahun)
                    $('#id').val(respon.tm.id);
                    $('#tm_uts_ganjil').val(respon.tm.tgl_raport_uts_ganjil);
                    $('#tm_pas_ganjil').val(respon.tm.tgl_raport_uas_ganjil);
                    $('#tm_uts_genap').val(respon.tm.tgl_raport_uts_genap);
                    $('#tm_pas_genap').val(respon.tm.tgl_raport_uas_genap);
                    $('#TitiMangsaModalEdit').modal('show');
                },
                error:function(){
                    alert('Terjadi Kesalahan !');
                }
            })
        })
        $('#TitiMangsaFormEdit').on('submit',function(e){
            e.preventDefault()
            var data = $('#TitiMangsaFormEdit').serialize();
            $.ajax({
                url : 'update-titi-mangsa',
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
                        $('#TitiMangsaModalEdit').modal('hide');
                        $('#TitiMangsaFormEdit')[0].reset();
                        table.ajax.reload();
                    }
                    
                },
                error : function(){
                    alert('Terjadi Kesalahan !');
                }
            })
        })
        $(document).on('click','.delete-tm',function(e){
            e.preventDefault()
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Ingin Menghapus Data !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url : 'delete-titi-mangsa',
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