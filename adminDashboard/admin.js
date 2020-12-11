$('.display').on("click" ,'.deleteCategory',function() {
    if(confirm("Are you sure you want to delete this Category?")) {
        var id= $(this).data('id');
        $.ajax({
            type: "POST",
            url: "request.php",
            data:{ id:id , action :'deleteCategory' },
            dataType: "JSON",
            success:function( msg ) {
               alert(msg.category);
               location.reload();
            },
            error:function() {
                alert("error");
            }
        }); 
    }   
});
$('.display').on("click" ,'.enableCategory',function() {
    if(confirm("Are you sure you want to enable this Category?")) {
        var id= $(this).data('id');
        $.ajax({
            type: "POST",
            url: "request.php",
            data:{ id:id , action :'enableCategory' },
            dataType: "JSON",
            success:function( msg ) {
               alert(msg);
               location.reload();
            },
            error:function() {
                alert("error");
            }
        }); 
    }   
});
$('.display').on("click" ,'.disableCategory',function() {
    if(confirm("Are you sure you want to enable this Category?")) {
        var id= $(this).data('id');
        $.ajax({
            type: "POST",
            url: "request.php",
            data:{ id:id , action :'disableCategory' },
            dataType: "JSON",
            success:function( msg ) {
               alert(msg);
               location.reload();
            },
            error:function() {
                alert("error");
            }
        }); 
    }   
});
$('#form').on("click" ,'.saveCategory',function() {
    var id= $(this).data('id');
    var name = $(".cat").val();
    var link = $('.url').val();
    console.log(name);
    $.ajax({
        type: "POST",
        url: "request.php",
        data:{ id:id, name:name, link:link , action :'saveCategory' },
        dataType: "JSON",
        success:function( msg ) {
            alert(msg);
            location.reload();
        },
        error:function() {
            alert("error");
        }
    }); 
});
$('.display').on("click" ,'.editCategory',function() {
    if(confirm("Are you sure you want to edit this Category?")) {
        var id= $(this).data('id');
        var html="";
        $.ajax({
            type: "POST",
            url: "request.php",
            data:{ id:id , action :'editCategory' },
            dataType: "JSON",
            success:function( msg ) {
                //console.log(msg.length);
                for (var i = 0; i < msg.length; i++) {
                    html = '<form id="form" role="form" method="POST"><div class="form-group">'+
                    '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                      '<div class="input-group-prepend">'+
                        '<span class="input-group-text"><i class="ni ni-hat-3"></i></span>'+
                      '</div>'+
                      '<input class="cat form-control"   placeholder="Name" value="'+msg[i]["prod_name"]+'" name="name" type="text">'+
                   '</div>'+
                   '<div class="form-group">'+
                        '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                          '<div class="input-group-prepend">'+
                            '<span class="input-group-text"><i class="ni ni-email-83"></i></span>'+
                          '</div>'+
                          '<input class="url form-control" value="'+msg[i]['link']+'"  placeholder="link" name="link" type="url">'+
                        '</div>'+
                      '</div>'+
                  '</div>'+
                  '<div class="text-center">'+
                 '<button type="button" name="saveCategory" data-id="'+msg[i]['id']+'" class="saveCategory btn btn-primary mt-4">Update Category</button>'+
                '</div>'+
                  '</form>';
                }
                $("#form").html(html);
            },
            error:function() {
                alert("error");
            }
        }); 
    }   
});
$(document).ready(function() {
    $('.display').DataTable({
        "ajax": 'request.php?getProduct=1'
    });
    $('.productTable').DataTable({
        "ajax": 'request.php?getProductTable=1'
    });
    $('.addCategory').click(function(){
        var name = $('.name').val();
        var link = $('.link').val();
        console.log(name);
        console.log(link);
        $.ajax({
            type: "POST",
            url: "request.php",
            data:{ name:name ,link:link, action :'addCategory' },
            dataType: "JSON",
            success:function( msg ) {
                alert(msg);
                location.reload();
            },
            error:function() {
                alert("error");
            }
        });	
    });
    $('.addProduct').click(function() {
        var name = $('.name').val();
        var category = $('.category').val();
        var link = $('.url').val();
        var mplan = $('.mplan').val();
        var aplan = $('.aplan').val();
        var sku = $('.sku').val();
        var web = $('.web').val();
        var bandwidth = $('.bandwidth').val();
        var domain = $('.domain').val();
        var language = $('.language').val();
        var mailbox = $('.mailbox').val();
        var r = false;
        console.log(name);
        var letters = /^([a-zA-Z]+\s?)*$/;
        if(name != "" && category != "" && mplan !="" && aplan !="" && sku !="" && web !="" && bandwidth!="" && domain !="" && language !="" && mailbox !="") {
            if(!name.match(letters)) {
                alert("please enter alphabet character only and more than one space are not allow between word");
                r=true;
            }
            if(r == false) {
                $.ajax({
                    type: "POST",
                    url: "request.php",
                    data:{ name:name,
                        category:category,
                        mplan:mplan,
                        aplan:aplan,
                        sku:sku,
                        web:web,
                        bandwidth:bandwidth ,
                        domain:domain,
                        language:language,
                        mailbox:mailbox,
                        link:link, 
                        action :'addProduct' },
                        dataType: "JSON",
                        success:function( msg ) {
                            alert(msg);
                    },
                    error:function() {
                        alert("error");
                    }
                });	
            }
        }
        else {
            alert("please fill all field");
        }
    });
});