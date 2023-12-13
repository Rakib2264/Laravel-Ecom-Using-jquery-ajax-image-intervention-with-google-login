jQuery(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    jQuery(document).on("click", ".cat_add", function () {

        var name = jQuery(".cat_name").val();
        var des = jQuery(".des").val();
        var status = jQuery(".cat_status").val();



        jQuery.ajax({
            url: '/addcategory',
            type: "POST",
            data: {
                name: name,
                des: des,
                status: status,
            },
            success: function (res) {
                jQuery("#exampleModal").modal('hide');
                alert(res.msg)
                show();
            }

        });
    });
    show();
    function show(){

        jQuery.ajax({
            url:'/showcategory',
            type:'GET',
            dataType:'json',
            success:function(res){
                if(res.status == '200'){
                    var allData = '';
                    var sl = 1;
                  jQuery.each(res.allData,function(key , val){
                    var status;
                    if(val.status == 1){
                        status='<button value="'+val.id+'" class="btn btn-sm btn-success btn_cat_active">Active</button>'
                    }else{
                        status='<button value="'+val.id+'" class="btn btn-sm btn-danger btn_cat_inactive">Inactive</button>'
                    }
                       allData+='<tr>\
                       <td>'+sl+'</td>\
                       <td>'+val.name+'</td>\
                       <td>'+val.des+'</td>\
                       <td>'+status+'</td>\
                       <td>\
                       <button value="'+val.id+'" class="btn btn-sm btn-info btn_cat_edit">Edit</button>\
                       <button value="'+val.id+'" class="btn btn-sm btn-warning btn_cat_delete">Delete</button>\
                       </td>\
                       </tr>';
                       sl++;
                  })
                  jQuery(".allData").html(allData);
                }

            }
        });
    }

    jQuery(document).on("click",".btn_cat_delete",function(){

        var id = jQuery(this).val();
        jQuery("#delete").modal('show');
        var id=jQuery(".cat_delete").val(id);

    });

    jQuery(document).on("click",".cat_delete",function(){

        var id = jQuery(this).val();

        jQuery.ajax({
            url:"/destroycategory/"+id,
            type:'GET',
            success:function(res){
                alert(res.msg)
                jQuery("#delete").modal('hide');
                show();
            }
        });
    });

    jQuery(document).on("click",".btn_cat_active",function(){

        var id = jQuery(this).val();
        jQuery.ajax({
            url:"/activecat/"+id,
            type:'GET',
            success:function(res){
                alert(res.msg)
                show();
            }
        });
    });

    jQuery(document).on("click",".btn_cat_inactive",function(){

        var id = jQuery(this).val();
        jQuery.ajax({
            url:"/inactivecat/"+id,
            type:'GET',
            success:function(res){
                alert(res.msg)
                show();
            }
        });
    });

    jQuery(document).on("click",".btn_cat_edit",function(){
        jQuery("#exampleModal").modal('show');
        jQuery(".cat_update").show();
        jQuery(".cat_add").hide();

        var id = jQuery(this).val();

        jQuery.ajax({
            url:"/editcategory/"+id,
            type:"get",
            success:function(res){
                jQuery(".cat_name").val(res.allData.name);
                jQuery(".des").val(res.allData.des);
                jQuery(".cat_status").val(res.allData.status);
                jQuery(".cat_update").val(res.allData.id);
            }
        });

    });
    jQuery(document).on("click",".cat_update",function(){
        var id = jQuery(this).val();

        var name = jQuery(".cat_name").val();
        var des = jQuery(".des").val();
        var status = jQuery(".cat_status").val();
        jQuery.ajax({
            url:"/updatecategory/"+id,
            type:"post",
            data:{
                name:name,
                des:des,
                status:status,
            },
            success:function(res){
                alert(res.msg)
                jQuery("#exampleModal").modal('hide');
                show();
            }
        });
    });
    // image curd
    jQuery(document).on('submit','#brandData',function(e){
        e.preventDefault()
        var allData = new FormData(jQuery("#brandData")[0]);
        jQuery.ajax({
            url:"/insertbrand",
            type:"POST",
            dataType:"JSON",
            data:allData,
            contentType:false,
            processData:false,
            success:function(res){

                if(res.status == "failed"){
                    $(".spn_name").html(res.errors.name)
                    $(".spn_cat").html(res.errors.cat_id)
                    $(".img").html(res.errors.image)
                    $(".imgs").html(res.errors.images)
                }else{
                    alert(res.msg)
                }

            }
        })

    })
});
