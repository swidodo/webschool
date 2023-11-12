<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
<script src="<?= base_url('assets/js/sweetalert.all.js');?>"></script>
<script>
    $(document).ready(function(){
      
    var table = $('#TblDataBebanMengajar').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        "ordering": true,
        "order": [
            [1, 'asc']
        ], 
        ajax : {
                "url" : 'data-beban-mengajar',
                "type" : 'POST',
                },
                "columns": [
                {   data: 'id_jadwal',"sortable": false, render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    className : "dt-center"
                },
                {
                    data : 'nama_guru',
                    name : 'nama_guru',
                },              
                {
                    data : 'nama_pelajaran',
                    name : 'nama_pelajaran',
                },
                {
                    data : 'kelas',
                    name : 'kelas',
                },
                {
                    data : 'status_jadwal',
                    render : function(data, row, type){
                        var status ='';
                        if (data == 'Y'){
                            status = 'Aktif';
                        }
                        else{
                            status = "Non Aktif";
                        }
                        return status;
                    },
                    className : "dt-center",
                },
                {   
                    data : 'id_jadwal', 
                    sortable: false,
                    render :function( data, type, row, meta ) {
                                return '<div class="d-flex justify-content-center"><a href="javascript:void(0);" class="btn btn-success me-1 btn-sm edit-beban-mengajar" data-id="'+data+'"><i class="fa-solid fa-pen-to-square"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-sm delete-beban-mengajar" data-id="'+data+'"><div class="d-flex justify-content-center"><i class="fa fa-import me-1"></i> <i class="fa fa-trash"></i></div></a></div>';
                            },
                    className : "dt-center",
                    },           
            ],
    })
    $('#TambahBebanMengajar').on('click', function(){
        $.ajax({
            url : 'create-beban-mengajar',
            type : 'post',
            dataType : 'json',
            beforeSend : function(){

            },
            success : function(respon){
                var guru = '<option value="">-- Pilih -- </option>';
                $.each(respon.guru, function(key,val){
                    guru += `<option value="`+val.id_guru+`">`+val.nama_guru+`</option>`;
                })
                $('#addguru').html(guru)

                var mapel = '<option value="">-- Pilih -- </option>';
                $.each(respon.mapel, function(key,val){
                    mapel += `<option value="`+val.id_pelajaran+`">`+val.nama_pelajaran+`</option>`;
                })
                $('#addpelajaran').html(mapel)

                var kelas = '<option value="">-- Pilih -- </option>';
                $.each(respon.kelas, function(key,val){
                    kelas += `<option value="`+val.id_kelas+`">`+val.kelas+`</option>`;
                })
                $('#addkelas').html(kelas)
                $('#BebanMengajarModalAdd').modal('show');
            }
        })
    })
    $('#BebanMengajarFormAdd').on('submit', function(e){
        e.preventDefault()
        var data = $('#BebanMengajarFormAdd').serialize();
        $.ajax({
            url : 'save-beban-mengajar',
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
                    $('#BebanMengajarModalAdd').modal('hide');
                    $('#BebanMengajarFormAdd')[0].reset();
                    table.ajax.reload();
                }
            },
            error : function(){
                alert('Terjadi BebanMengajaralahan !')
            }
        })
    })
    
    $(document).on('click','.edit-beban-mengajar',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url : 'edit-beban-mengajar',
            type : 'post',
            data : {id:id},
            dataType : 'json',
            beforeSend :function(){

            },
            success :function(respon){
                $('#id').val(respon.beban.id_jadwal)
                var guru = '<option value="">-- Pilih -- </option>';
                $.each(respon.guru, function(key,val){
                    if (val.id_guru == respon.beban.id_guru){
                        guru += `<option value="`+val.id_guru+`" selected>`+val.nama_guru+`</option>`;
                    }else{
                        guru += `<option value="`+val.id_guru+`">`+val.nama_guru+`</option>`;
                    }
                })
                $('#editguru').html(guru)

                var mapel = '<option value="">-- Pilih -- </option>';
                $.each(respon.mapel, function(key,val){
                    if (val.id_pelajaran == respon.beban.id_pelajaran){
                        mapel += `<option value="`+val.id_pelajaran+`" selected>`+val.nama_pelajaran+`</option>`;
                    }else{
                        mapel += `<option value="`+val.id_pelajaran+`">`+val.nama_pelajaran+`</option>`;
                    }
                })
                $('#editpelajaran').html(mapel)

                var kelas = '<option value="">-- Pilih -- </option>';
                $.each(respon.kelas, function(key,val){
                    if (val.id_kelas == respon.beban.id_kelas){
                        kelas += `<option value="`+val.id_kelas+`" selected>`+val.kelas+`</option>`;
                    }else{
                        kelas += `<option value="`+val.id_kelas+`">`+val.kelas+`</option>`;
                    }
                })
                $('#editkelas').html(kelas)
                if(respon.beban.status_jadwal == 'Y'){
                    $('#editstatus').html( `<option value="Y" selected>Aktif</option><option value="N">Non Aktif</option>`)
                }else{
                    $('#editstatus').html( `<option value="Y">Aktif</option><option value="N" selected>Non Aktif</option>`)
                }
                $('#BebanMengajarModalEdit').modal('show');
            },
            error:function(){
                alert('Terjadi Kesalahan !');
            }
        })
        
    })
    $('#BebanMengajarFormEdit').on('submit',function(e){
        e.preventDefault()
        var data = $('#BebanMengajarFormEdit').serialize();
        $.ajax({
            url : 'update-beban-mengajar',
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
                    $('#BebanMengajarModalEdit').modal('hide');
                }
            },
            error : function(){
                alert('Terjadi Kesalahan !');
            }
        })
    })
    $(document).on('click','.delete-beban-mengajar',function(e){
        e.preventDefault()
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Ingin menghapus data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).attr('data-id');
                $.ajax({
                    url : 'delete-beban-mengajar',
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