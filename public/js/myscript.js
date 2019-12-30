$(document).ready(function(){
    resetButtonRegister();
    AddUser();
    LoadData();
    EditUser();
    RemoveUser();
});

function resetButtonRegister()
{
    $(document).on('click','#btn_Register',function(){
        ResetForm();
    });
}

function ResetForm()
{
    $('#add_message').text('');
    $('#txt_name').val('');
    $('#txt_email').val('');
}

function AddUser()
{
    $(document).on('click','#btn_add_user',function(){
        var username=$('#txt_name').val();
        var useremail=$('#txt_email').val();

        //check username && useremail
        if( username=="" || useremail=="" )
        {
            $('#add_message').text('Please input text box !!');
        }
        else
        {
            $.ajax({
                url:"./php/add.php",
                method:"POST",
                dataType:"json",
                data:{
                    UserName:username,
                    UserEmail:useremail
                },
                success:function(result){
                    if(result > 0)
                    {
                        ResetForm();
                        $('#add_message').text('Insert database success !!!');
                    }
                    else
                    {
                        ResetForm();
                        $('#add_message').text('Insert database faile!!!');
                    }
                }
            });
        }
    });

    $(document).on('click','#btn_add_close',function(){
        $('#form_add').trigger('reset');
        LoadData();
    });
}

function LoadData()
{
    $.ajax({
        url:"./php/list.php",
        method:"POST",
        dataType:"JSON",
        success:function(result){
            if(result.status=="success")
            {
                $('#table').html(result.value);
            }
        }   
    });
}

function RemoveUser()
{
    $(document).on('click','#btn_user_delete',function(){
        var id=$(this).data('id');
        $.ajax({
            url:"./php/delete.php",
            method:"POST",
            dataType:"JSON",
            data:{
                ID:id
            },
            success:function(result)
            {
                if(result)
                {
                    LoadData();
                }
            }
        });
    });
}


function EditUser()
{
    $(document).on('click','#btn_user_edit',function(){
        $('#edit_message').text('');
        var id=$(this).data('id');
        $.ajax({
            url:"./php/getinfo.php",
            method:"POST",
            dataType:"JSON",
            data:{
                ID:id
            },
            success:function(result)
            {
                if(result.status=="success")
                {
                    resetButtonRegister();
                    $('#txt_edit_name').val(result.value[0]['Name']);
                    $('#txt_edit_email').val(result.value[0]['Email']);
                    $('#txt_edit_id').val(result.value[0]['ID']);
                    $(document).on('click','#btn_edit_user',function(){
                        var id=$('#txt_edit_id').val();
                        $.ajax({
                            url:"./php/edit.php",
                            method:"POST",
                            dataType:"JSON",
                            data:{
                                ID:id,
                                Name:$('#txt_edit_name').val(),
                                Email:$('#txt_edit_email').val()
                            },
                            success:function(result){
                                if(result)
                                {
                                    $('#edit_message').text('Congratulatios you edit success !!');
                                    $('#form_edit').trigger('reset');
                                    $('#btn_edit_close').on('click',function(){
                                        LoadData();
                                    });
                                }
                            }
                        });
                    });
                }
            }
        });
    });
}
