<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
<script src="<?= base_url('assets/js/sweetalert.all.js');?>"></script>
<script>
      function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }
    $(document).ready(function(){
    var table = $('#TblDataSiswa').DataTable({
                    processing: true,
                    serverSide: true,
                    destroy: true,
                    "ordering": true,
                    "order": [
                        [1, 'asc']
                    ], 
                    ajax : {
                            "url" : 'get_siswa',
                            "type" : 'POST',
                            },
                    "columns": [
                            {   data: 'id_siswa',"sortable": false, render: function (data, type, row, meta) {
                                    return meta.row + meta.settings._iDisplayStart + 1;
                                },
                                className : "dt-center"
                            },                
                            { data: "nis" }, 
                            { data: "nisn" }, 
                            { data: "nama" }, 
                            { data: "jk",
                                render: function ( data, type, row ) {
                                    var jk ='';
                                    if (data == 'L'){
                                        jk = 'Laki-laki';
                                    }
                                    else if (data == 'P'){
                                        jk = 'Perempuan';
                                    }else{
                                        jk = '';
                                    }
                                    return jk;
                                },
                            }, 
                            { data: "kelas",className : "dt-center", }, 
                            { data: "fase",className : "dt-center", }, 
                            { data: "id_siswa", 
                            "render": 
                                function( data, type, row, meta ) {
                                    return '<div class="d-flex justify-content-center"><a href="javascript:void(0);" class="btn btn-success me-1 btn-sm edit-siswa" data-id="'+data+'"><i class="fa-solid fa-pen-to-square"></i></a><a href="javascript:void(0);" class="btn btn-primary btn-sm cetak-data-siswa me-1" data-id="'+data+'"><i class="fa fa-print"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-sm delete-siswa" data-id="'+data+'"><div class="d-flex justify-content-center"><i class="fa fa-import me-1"></i> <i class="fa fa-trash"></i></div></a></div>';
                                },
                                className : "dt-center",
                            },
                        ],
                })
    $('#TambahSiswa').on('click', function(){
        $.ajax({
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            url : 'create_siswa',
            type : 'post',
            dataType : 'json',
            success : function(respon){
                console.log(respon);
                var kelas = '<option value="" disabled selected>--Pilih Kelas--</option>';
                $.each(respon.kelas,function(key,val){
                    kelas += `<option value="`+val.id_kelas+`">`+val.kelas+`</option>`;
                })
                $('#kelasId').html(kelas);
                $('#SiswaModalAdd').modal('show');
            },
            error : function(){
                alert('Terjadi Kesalahan !');
            }
        })
    })
    $('#SiswaFormAdd').on('submit', function(e){
        e.preventDefault()
        var data = $('#SiswaFormAdd').serialize();

        $.ajax({
            url : 'save_siswa',
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
                    $('#SiswaModalAdd').modal('hide');
                    $('#SiswaFormAdd')[0].reset();
                    table.ajax.reload();
                }
            },
            error : function(){
                alert('Terjadi kelasalahan !')
            }
        })
    })
    $(document).on('click','.edit-siswa',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url : 'edit_siswa',
            type : 'post',
            data : {id:id},
            dataType : 'json',
            beforeSend :function(){

            },
            success :function(respon){
                $('#id').val('id')
                $('#nis').val(respon.data.nis)
                $('#nisn').val(respon.data.nisn)
                $('#nama_siswa').val(respon.data.nama)
                $('#tmpt_lahir').val(respon.data.tempat_lahir)
                $('#tgl_lahir').val(respon.data.tgl_lahir)
                $('#tgl_diterima').val(respon.data.tanggal_diterima)
                // $('#tingkat_diterima').val(respon.data.tingkat_diterima)
                $('#anak_ke').val(respon.data.anak_ke)
                $('#status_dlm_kel').val(respon.data.status_dlm_kel)
                $('#agama').val(respon.data.agama)
                $('#alamat_siswa').val(respon.data.alamat)
                $('#no_hp_siswa').val(respon.data.hp)
                $('#nama_ayah').val(respon.data.nama_ayah)
                $('#kerja_ayah').val(respon.data.kerja_ayah)
                $('#nama_ibu').val(respon.data.nama_ibu)
                $('#kerja_ibu').val(respon.data.kerja_ibu)
                $('#no_hp_orang_tua').val(respon.data.hp_ortu)
                $('#alamat_orang_tua').val(respon.data.alamat_ortu)
                $('#sekolah_asal').val(respon.data.nama_sekolah)
                $('#nama_wali').val(respon.data.nama_wali)
                $('#alamat_wali').val(respon.data.alamat_wali)
                $('#no_hp_wali').val(respon.data.hp_wali)
                $('#kerja_wali').val(respon.data.kerja_wali)
                
                var selected1 = '';
                var selected2 = '';
                var selected3 = '';
                if (respon.data.status = '1'){
                    selected1 = 'selected';
                }
                else if (respon.data.status = '2'){
                    selected2 = 'selected';
                }
                else if(respon.data.status = '3'){
                    selected3 = 'selected';
                }
                var kelas ='';
                $.each(respon.kelas,function(key,val){
                    if (respon.data.id_kelas == val.id_kelas){
                        kelas += `<option value="`+val.id_kelas+`" selected>`+val.kelas+`</option>`;
                    }
                    kelas += `<option value="`+val.id_kelas+`">`+val.kelas+`</option>`;
                })
                $('#kelas').html(kelas)
                $('#status').html(`
                <option value="1" `+selected1+`>Aktif</option>
                <option value="2" `+selected2+`>Keluar</option>
                <option value="3" `+selected3+`>Alumni</option>`)
                if (respon.data.jk == 'P'){
                    $('.jkp').attr('checked',true)
                }else if(respon.data.jk == 'L'){
                    $('.jkl').attr('checked',true)
                }
                $('#SiswaModalEdit').modal('show');
            },
            error:function(){
                alert('Terjadi Kesalahan !');
            }
        })
        
    })
    $(document).on('click','.delete-siswa',function(e){
        e.preventDefault()
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Ingin ingin hapus data siswa !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).attr('data-id');
                $.ajax({
                    url : 'delete-siswa',
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
    $('#SiswaFormUpdate').on('submit',function(e){
        e.preventDefault()
        var data = $('#SiswaFormUpdate').serialize();
        $.ajax({
            url : 'update_siswa',
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
                    $('#SiswaModalEdit').modal('hide');
                    table.ajax.reload();
                }
            },
            error : function(){
                alert('Terjadi Kesalahan !');
            }
        })
    })
    $(document).on('click','.cetak-data-siswa', function(e){
        e.preventDefault()
        var id = $(this).attr('data-id');
        var url ='<?= base_url();?>'+` cetak-data-siswa?id=`+id;
        window.open(url,'_blank'); 
    })
})


</script>