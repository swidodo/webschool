<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
<script src="<?= base_url('assets/js/sweetalert.all.js');?>"></script>
<script>
    $(document).ready(function(){
      
    var table = $('#TblDataWalas').DataTable({
                    processing: true,
                    serverSide: true,
                    destroy: true,
                    "ordering": true,
                    "order": [
                        [1, 'asc']
                    ], 
                    ajax : {
                            "url" : 'data-wali-kelas',
                            "type" : 'POST',
                            },
                    "columns": [
                            {   data: 'id',"sortable": false, render: function (data, type, row, meta) {
                                    return meta.row + meta.settings._iDisplayStart + 1;
                                },
                                className : "dt-center"
                            },
                            {
                                data : 'kelas',
                                name : 'kelas',
                                className : "dt-center",
                            },
                            {
                                data : 'nama_guru',
                                name : 'nama_guru',
                            },              
                            {
                                data : 'tahun_pelajaran',
                                name : 'tahun_pelajaran',
                                className : "dt-center",
                            },
                            
                            {   
                                data : 'id', 
                                sortable: false,
                                render :function( data, type, row, meta ) {
                                            return '<div class="d-flex justify-content-center"><a href="javascript:void(0);" class="btn btn-success me-1 btn-sm fs-6 edit-walas" data-id="'+data+'"><i class="fa-solid fa-pen-to-square"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-sm fs-6 delete-walas" data-id="'+data+'"><div class="d-flex justify-content-center"><i class="fa fa-import me-1"></i> <i class="fa fa-trash"></i></div></a></div>';
                                        },
                                className : "dt-center",
                                },           
                        ],
                })
    $('#TambahWalas').on('click', function(){
        $.ajax({
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            url : 'create_walas',
            type : 'post',
            dataType : 'json',
            success : function(respon){
                var kelas = '<option value="">-- Pilih ---</option>';
                $.each(respon.kelas,function(key,val){
                    kelas += `<option value="`+val.id_kelas+`">`+val.kelas+`</option>`
                })
                $('#addKelas').html(kelas);

                var guru = '<option value="">-- Pilih ---</option>';
                $.each(respon.guru,function(key,val){
                    guru += `<option value="`+val.id_guru+`">`+val.nama_guru+`</option>`
                })
                $('#addGuru').html(guru);

                var tahun = '<option value="">-- Pilih ---</option>';
                $.each(respon.tahun,function(key,val){
                    tahun += `<option value="`+val.tahun_pelajaran+`">`+val.tahun_pelajaran+`</option>`
                })
                $('#addTahunMapel').html(tahun);
                $('#WalasModalAdd').modal('show');
            },
            error : function(){
                alert('Terjadi Kesalahan !');
            }
        })
    })
    $('#WalasFormAdd').on('submit', function(e){
        e.preventDefault()
        var data = $('#WalasFormAdd').serialize();

        $.ajax({
            url : 'save_walas',
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
                if(respon.status == "success"){
                    $('#WalasModalAdd').modal('hide');
                    $('#WalasFormAdd')[0].reset();
                    table.ajax.reload();
                }
            },
            error : function(){
                alert('Terjadi kelasalahan !')
            }
        })
    })
    $(document).on('click','.edit-walas',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            url : 'edit_walas',
            type : 'post',
            data : {id:id},
            dataType : 'json',
            beforeSend :function(){

            },
            success :function(respon){
                $('#id').val(respon.walas.id);
                var kelas ='';
                $.each(respon.kelas,function(key,val){
                    if(respon.walas.id_kelas == val.id_kelas){
                        kelas += `<option value="`+val.id_kelas+`" selected>`+val.kelas+`</option>`;
                    }
                })
                $('#editKelas').html(kelas);

                var guru ='';
                $.each(respon.guru,function(key,val){
                    if(respon.walas.id_guru == val.id_guru){
                        guru += `<option value="`+val.id_guru+`" selected>`+val.nama_guru+`</option>`;
                    }else{
                        guru += `<option value="`+val.id_guru+`">`+val.nama_guru+`</option>`;
                    }
                })
                $('#editGuru').html(guru);
                var tahun ='';
                $.each(respon.tahun,function(key,val){
                    if(respon.walas.id.id_pelajaran == val.id_pelajaran){
                        tahun += `<option value="`+val.tahun_pelajaran+`" selected>`+val.tahun_pelajaran+`</option>`
                    }else{
                        tahun += `<option value="`+val.tahun_pelajaran+`" selected>`+val.tahun_pelajaran+`</option>`
                    }
                })
                $('#editTahunMapel').html(tahun);
                $('#WalasModalEdit').modal('show');
            },
            error:function(){
                alert('Terjadi Kesalahan !');
            }
        })
    })
    $('#WalasFormEdit').on('submit',function(e){
        e.preventDefault()
        var data = $('#WalasFormEdit').serialize();
        $.ajax({
            url : 'update_walas',
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
                    $('#WalasModalEdit').modal('hide');
                    table.ajax.reload();
                }
            },
            error : function(){
                alert('Terjadi Kesalahan !');
            }
        })
    })
    $(document).on('click','.delete-walas',function(e){
        e.preventDefault()
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Ingin Menghapus Data Wali Kelas !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).attr('data-id');
                $.ajax({
                    url : 'delete-walas',
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