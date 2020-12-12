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
$('.productTable').on("click" ,'.deleteProduct',function() {
    var id= $(this).data('id');
    $.ajax({
        type: "POST",
        url: "request.php",
        data:{ id:id, action :'deleteProduct' },
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

$('.productTable').on("click" ,'.deleteProduct',function() {
    if(confirm("Are you sure you want to delete this Product?")) {
        var id= $(this).data('id');
        $.ajax({
            type: "POST",
            url: "request.php",
            data:{ id:id, action :'deleteProduct' },
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

$('#formProduct').on("click" ,'.saveProduct',function() {
    var id= $(this).data('id');
    var name = $('.name').val();
    var link = $('.url').val();
    var mplan = $('.mplan').val();
    var aplan = $('.aplan').val();
    var sku = $('.sku').val();
    var web = $('.web').val();
    var bandwidth = $('.bandwidth').val();
    var domain = $('.domain').val();
    var language = $('.language').val();
    var mailbox = $('.mailbox').val();
    $.ajax({
        type: "POST",
        url: "request.php",
        data:{ id:id,
            name:name,
            mplan:mplan,
            aplan:aplan,
            sku:sku,
            web:web,
            bandwidth:bandwidth ,
            domain:domain,
            language:language,
            mailbox:mailbox,
            link:link, 
            action :'saveProduct' },
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

$('.productTable').on("click" ,'.editProduct',function() {
    if(confirm("Are you sure you want to edit this Product?")) {
        var id= $(this).data('id');
        var html="";
        $.ajax({
            type: "POST",
            url: "request.php",
            data:{ id:id , action :'editProduct' },
            dataType: "JSON",
            success:function( msg ) {
               // console.log(msg);
                //debugger;
                    //console.log(msg['description']['webspace']);
                    html = '<form id="formProduct" role="form" method="POST"><div class="form-group">'+
                    '<div class="pb-5">'+
                        '<h1 id="header_1" class="form-header" data-component="header">Create New Product</h1>'+
                        '<div id="subHeader_1" class="form-subHeader ">Enter Product Details</div>'+
                    '</div>'+
                    '<li class="form-line" data-type="control_dropdown" id="id_3">'+
                       '<label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">Enter Product Name<span class="error form-required">*</span>'+
                        '</label>'+
                        '<div class="form-group">'+
                            '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                            '<input class="name form-control" value="'+msg['prod_name']+'"  placeholder="Name" name="name" type="text">'+
                            '</div>'+
                        '</div>'+
                    '</li>'+
                    '<li class="form-line" data-type="control_dropdown" id="id_3">'+
                        '<label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">Page Url</label>'+
                        '<div class="form-group">'+
                            '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                            '<input class="url form-control" value="'+msg['link']+'"   placeholder="url" name="url" type="url">'+
                            '</div>'+
                        '</div>'+
                    '</li>'+
                    '<div class="pb-5">'+
                        '<h1 id="header_1" class="form-header" data-component="header">Product Description</h1>'+
                        '<div id="subHeader_1" class="form-subHeader ">Enter Product Description Below</div>'+
                    '</div>'+
                    '<li class="form-line" data-type="control_dropdown" id="id_3">'+
                        '<label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">Enter Monthly Price <span class="form-required">*</span>'+
                        '</label>'+
                       '<div class="error form-group">'+
                            '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                            '<input class="mplan form-control" value="'+msg['mon_price']+'"  placeholder="This would be Monthly Plan" name="name" type="text">'+
                            '</div>'+
                        '</div>'+
                    '</li>'+
                    '<li class="form-line" data-type="control_dropdown" id="id_3">'+
                        '<label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">Enter Annual Price <span class="error form-required">*</span></label>'+
                        '<div class="form-group">'+
                            '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                            '<input class="aplan form-control" value="'+msg['annual_price']+'"  placeholder="This would be Annual Price" name="name" type="text">'+
                            '</div>'+
                        '</div>'+
                    '</li>'+
                    '<li class="form-line" data-type="control_dropdown" id="id_3">'+
                        '<label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">SKU<span class="error form-required">*</span></label>'+
                        '<div class="form-group">'+
                            '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                           '<input class="sku form-control" value="'+msg['sku']+'"   placeholder="Name" name="name" type="url">'+
                            '</div>'+
                        '</div>'+
                    '</li>'+
                    '<div class="pb-5">'+
                        '<h1 id="header_1" class="form-header" data-component="header">Features</h1>'+
                    '</div>'+
                    '<li class="form-line" data-type="control_dropdown" id="id_3">'+
                        '<label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">Web Space(in GB)<span class="error form-required">*</span></label>'+
                        '<div class="form-group">'+
                            '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                            '<input class="web form-control" value="'+msg['description']['webspace']+'"   placeholder="Enter 0.5 for 512 MB" name="name" type="text">'+
                            '</div>'+
                        '</div>'+
                    '</li>'+
                    '<li class="form-line" data-type="control_dropdown" id="id_3">'+
                        '<label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">Bandwidth (in GB)<span class="error form-required">*</span>'+
                        '</label>'+
                        '<div class="form-group">'+
                            '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                            '<input class="bandwidth form-control" value="'+msg['description']['bandwidth']+'"   placeholder="Enter 0.5 for 512 MB" name="name" type="text">'+
                            '</div>'+
                        '</div>'+
                    '</li>'+
                    '<li class="form-line" data-type="control_dropdown" id="id_3">'+
                        '<label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">Free Domain<span class="form-required">*</span></label>'+
                        '<div class="form-group">'+
                            '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                            '<input class="domain form-control" value="'+msg['description']['free_domain']+'"  placeholder="Enter 0 if no domain available in this service" name="name" type="url">'+
                            '</div>'+
                        '</div>'+
                    '</li>'+
                    '<li class="form-line" data-type="control_dropdown" id="id_3">'+
                        '<label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">Language / Technology Support<span class="form-required">*</span>'+
                        '</label>'+
                        '<div class="form-group">'+
                            '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                            '<input class="language form-control" value="'+msg['description']['language']+'"   placeholder="Separate by (,) Ex: PHP, MySQL, MongoDB" name="name" type="url">'+
                            '</div>'+
                        '</div>'+
                    '</li>'+
                    '<li class="form-line" data-type="control_dropdown" id="id_3">'+
                        '<label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">Mailbox <span class="error form-required">*</span>'+
                        '</label>'+
                        '<div class="form-group">'+
                            '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                            '<input class="mailbox form-control" value="'+msg['description']['mailbox']+'"   placeholder="Enter Number of mailbox will be provided, enter 0 if none" name="name" type="url">'+
                            '</div>'+
                        '</div>'+
                    '</li>'+
                  '<div class="text-center">'+
                    '<button type="button" data-id="'+msg['prod_id']+'" name="saveProduct" class="saveProduct btn btn-primary mt-4">Update Product</button>'+
                  '</div>'+
                  '</form>';

                $("#formProduct").html(html);
            },
            error:function() {
                alert("error");
            }
        }); 
    }   
});
function validation() {
    var name = $('.name').val();
    var mplan = $('.mplan').val();
    var aplan = $('.aplan').val();
    var sku = $('.sku').val();
    var web = $('.web').val();
    var bandwidth = $('.bandwidth').val();
    var domain = $('.domain').val();
    var language = $('.language').val();
    var mailbox = $('.mailbox').val();
    if(name != "" && mplan !="" && aplan !="" && sku!="" && web!="" && bandwidth!="" && domain !="" && language !="" && mailbox !="") {
        $(".addProduct").prop( "disabled", false );
    }
}
$(document).ready(function() {
    $(".name").focusout(function(event) {
        var val = $(this).val();
        if(val != "") {
            var letters = /^([a-zA-Z0-9])*$/;
            if(name.match(letters)) {
                validation();
                $(".name").removeClass('is-invalid');
            }
            else {
                $('.error').html("Onlu alphanumric Character and - are allowed");
            }
        }
        else {
            $(".name").addClass('is-invalid');
            $(".addProduct").attr('disabled', 'disabled');
        }
    });
    $(".mplan").focusout(function(event) {
        var val = $(this).val();
        if(val != "") {
            validation();
            $(".mplan").removeClass('is-invalid');
        }
        else {
            $(".mplan").addClass('is-invalid');
            $(".addProduct").attr('disabled', 'disabled');
        }
    });
    $(".aplan").focusout(function(event) {
        var val = $(this).val();
        if(val != "") {
            validation();
            $(".aplan").removeClass('is-invalid');
        }
        else {
            $(".aplan").addClass('is-invalid');
            $(".addProduct").attr('disabled', 'disabled');
        }
    });
    $(".sku").focusout(function(event) {
        var val = $(this).val();
        if(val != "") {
            validation();
            $(".sku").removeClass('is-invalid');
        }
        else {
            $(".sku").addClass('is-invalid');
            $(".addProduct").attr('disabled', 'disabled');
        }
    });
    $(".web").focusout(function(event) {
        var val = $(this).val();
        if(val != "") {
            validation();
            $(".web").removeClass('is-invalid');
        }
        else {
            $(".web").addClass('is-invalid');
            $(".addProduct").attr('disabled', 'disabled');
        }
    });
    $(".bandwidth").focusout(function(event) {
        var val = $(this).val();
        if(val != "") {
            validation();
            $(".bandwidth").removeClass('is-invalid');
        }
        else {
            $(".bandwidth").addClass('is-invalid');
            $(".addProduct").attr('disabled', 'disabled');
        }
    });
    $(".domain").focusout(function(event) {
        var val = $(this).val();
        if(val != "") {
            validation();
            $(".domain").removeClass('is-invalid');
        }
        else {
            $(".domain").addClass('is-invalid');
            $(".addProduct").attr('disabled', 'disabled');
        }
    });
    $(".language").focusout(function(event) {
        var val = $(this).val();
        if(val != "") {
            validation();
            $(".language").removeClass('is-invalid');
        }
        else {
            $(".language").addClass('is-invalid');
            $(".addProduct").attr('disabled', 'disabled');
        }
    });
    $(".mailbox").focusout(function(event) {
        var val = $(this).val();
        if(val != "") {
            validation();
            $(".mailbox").removeClass('is-invalid');
        }
        else {
            $(".mailbox").addClass('is-invalid');
            $(".addProduct").attr('disabled', 'disabled');
        }
    });
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