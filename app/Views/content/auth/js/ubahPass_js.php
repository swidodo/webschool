<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
<script src="<?= base_url('assets/js/sweetalert.all.js');?>"></script>
<script>
    $(document).ready(function(){
        $('#pass_baru').on('keyup',function(){
            var passBaru = $('#pass_baru').val();
            var passLama = $('#pass_confirm').val();
            if (passLama !=""){
                if (passBaru != passLama){
                    $('#errorpass').html('<small>Konfirmasi password tidak sama !</small>');
                }else{
                    $('#errorpass').html('');
                }
            }else{
                $('#errorpass').html('');
            }
        })
        $('#pass_confirm').on('keyup',function(){
            var passBaru = $('#pass_baru').val();
            var passLama = $('#pass_confirm').val();
            if (passLama != passBaru){
                $('#errorpass').html('<small>Konfirmasi password tidak sama !</small>');
            }else{
                $('#errorpass').html('');
            }
        })
        $('#formUbahPassword').on('submit',function(e){
            e.preventDefault();
            var data = $('#formUbahPassword').serialize();
            $.ajax({
                url : 'user-ubah-password',
                type : 'post',
                data : data,
                dataType :'json',
                beforeSend : function(){

                },
                success : function(respon){
                    swal.fire({
                        icon :respon.status,
                        text :respon.msg
                    })
                },
                error : function(){
                    alert('terjadi kesalahan !')
                }
            })
        })
    })
</script>