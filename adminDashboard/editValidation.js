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
    var name = $(".name").val().trim();
    var category = $(".category").val().trim();
    var link = $('.url').val().trim();
    var mplan = $('.mplan').val().trim();
    var aplan = $('.aplan').val().trim();
    var sku = $('.sku').val().trim();
    var web = $('.web').val().trim();
    var bandwidth = $('.bandwidth').val().trim();
    var domain = $('.domain').val().trim();
    var language = $('.language').val().trim();
    var mailbox = $('.mailbox').val().trim();
    $.ajax({
        type: "POST",
        url: "request.php",
        data:{ id:id,
            name:name,
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
                    //console.log(msg.category[0]['prod_name']);
                    html = '<form id="formProduct" role="form" method="POST"><div class="form-group">'+
                    '<div class="pb-5">'+
                        '<h1 id="header_1" class="form-header" data-component="header">Create New Product</h1>'+
                        '<div id="subHeader_1" class="form-subHeader ">Enter Product Details</div>'+
                    '</div>'+
                    '<li class="form-line" data-type="control_dropdown" id="id_3">'+
                    '<label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">Select Product Category<span class="error form-required">*</span></label>'+
                    '<div class="input-group mb-3">'+
                        '<select class="category custom-select" id="inputGroupSelect01">'+
                            '<option value="">Choose...</option>';
                            for(var i=0;i<msg.category.length;i++) {
                                if(msg.category[i]['id'] == msg.product['prod_parent_id'] ) {
                                    html += '<option value="'+msg.category[i]["prod_name"]+'" selected>'+msg.category[i]["prod_name"]+'</option>';
                                }
                                else {
                                    html += '<option value="'+msg.category[i]["prod_name"]+'">'+msg.category[i]["prod_name"]+'</option>';
                                }
                            }
                            html += '</select>'+
                        '<div class="invalid-feedback">This is required field</div>'+
                    '</div>'+
                '</li>'+
                    '<li class="form-line" data-type="control_dropdown" id="id_3">'+
                       '<label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">Enter Product Name<span class="error form-required">*</span>'+
                        '</label>'+
                        '<div class="form-group">'+
                            '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                            '<input class="name form-control" value="'+msg['product']['prod_name']+'"  placeholder="Name" name="name" type="text">'+
                            '<div class="invalid-feedback">This is required field</div>'+
                        '</div>'+
                        '<small class="nameErr"></small>'+
                            '</div>'+
                        '</div>'+
                    '</li>'+
                    '<li class="form-line" data-type="control_dropdown" id="id_3">'+
                        '<label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">Page Url</label>'+
                        '<div class="form-group">'+
                            '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                            '<input class="url form-control" value="'+msg['product']['html']+'"   placeholder="url" name="url" type="text">'+
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
                            '<input class="mplan form-control" value="'+msg['product']['mon_price']+'"  placeholder="This would be Monthly Plan" name="name" type="text">'+
                            '<div class="invalid-feedback">This is required field</div>'+
                            '</div>'+
                            '<small class="mpriceErr"></small>'+
                            '</div>'+
                        '</div>'+
                    '</li>'+
                    '<li class="form-line" data-type="control_dropdown" id="id_3">'+
                        '<label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">Enter Annual Price <span class="error form-required">*</span></label>'+
                        '<div class="form-group">'+
                            '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                            '<input class="aplan form-control" value="'+msg['product']['annual_price']+'"  placeholder="This would be Annual Price" name="name" type="text">'+
                            '<div class="invalid-feedback">This is required field</div>'+
                            '</div>'+
                            '<small class="apriceErr"></small>'+
                            '</div>'+
                        '</div>'+
                    '</li>'+
                    '<li class="form-line" data-type="control_dropdown" id="id_3">'+
                        '<label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">SKU<span class="error form-required">*</span></label>'+
                        '<div class="form-group">'+
                            '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                           '<input class="sku form-control" value="'+msg['product']['sku']+'"   placeholder="Name" name="name" type="url">'+
                           '<div class="invalid-feedback">This is required field</div>'+
                            '</div>'+
                            '<small class="skuErr"></small>'+
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
                            '<input class="web form-control" value="'+msg['product']['description']['webspace']+'"   placeholder="Enter 0.5 for 512 MB" name="name" type="text">'+
                            '<div class="invalid-feedback">This is required field</div>'+
                            '</div>'+
                            '<small class="webErr"></small>'+
                            '</div>'+
                        '</div>'+
                    '</li>'+
                    '<li class="form-line" data-type="control_dropdown" id="id_3">'+
                        '<label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">Bandwidth (in GB)<span class="error form-required">*</span>'+
                        '</label>'+
                        '<div class="form-group">'+
                            '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                            '<input class="bandwidth form-control" value="'+msg['product']['description']['bandwidth']+'"   placeholder="Enter 0.5 for 512 MB" name="name" type="text">'+
                            '<div class="invalid-feedback">This is required field</div>'+
                            '</div>'+
                            '<small class="bandwidthErr"></small>'+
                            '</div>'+
                        '</div>'+
                    '</li>'+
                    '<li class="form-line" data-type="control_dropdown" id="id_3">'+
                        '<label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">Free Domain<span class="form-required">*</span></label>'+
                        '<div class="form-group">'+
                            '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                            '<input class="domain form-control" value="'+msg['product']['description']['free_domain']+'"  placeholder="Enter 0 if no domain available in this service" name="name" type="url">'+
                            '<div class="invalid-feedback">This is required field</div>'+
                            '</div>'+
                            '<small class="domainErr"></small>'+
                            '</div>'+
                        '</div>'+
                    '</li>'+
                    '<li class="form-line" data-type="control_dropdown" id="id_3">'+
                        '<label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">Language / Technology Support<span class="form-required">*</span>'+
                        '</label>'+
                        '<div class="form-group">'+
                            '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                            '<input class="language form-control" value="'+msg['product']['description']['language']+'"   placeholder="Separate by (,) Ex: PHP, MySQL, MongoDB" name="name" type="url">'+
                            '<div class="invalid-feedback">This is required field</div>'+
                            '</div>'+
                            '<small class="languageErr"></small>'+
                            '</div>'+
                        '</div>'+
                    '</li>'+
                    '<li class="form-line" data-type="control_dropdown" id="id_3">'+
                        '<label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">Mailbox <span class="error form-required">*</span>'+
                        '</label>'+
                        '<div class="form-group">'+
                            '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                            '<input class="mailbox form-control" value="'+msg['product']['description']['mailbox']+'"   placeholder="Enter Number of mailbox will be provided, enter 0 if none" name="name" type="url">'+
                            '<div class="invalid-feedback">This is required field</div>'+
                            '</div>'+
                            '<small class="mailboxErr"></small>'+
                            '</div>'+
                        '</div>'+
                    '</li>'+
                  '<div class="text-center">'+
                    '<button type="button" data-id="'+msg['product']['prod_id']+'" name="saveProduct" class="saveProduct btn btn-primary mt-4" disabled>Update Product</button>'+
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
    var category = $('.category').val();
    var mplan = $('.mplan').val();
    var aplan = $('.aplan').val();
    var sku = $('.sku').val();
    var web = $('.web').val();
    var bandwidth = $('.bandwidth').val();
    var domain = $('.domain').val();
    var language = $('.language').val();
    var mailbox = $('.mailbox').val();
    if(name != "" && category !="" && mplan !="" && aplan !="" && sku!="" && web!="" && bandwidth!="" && domain !="" && language !="" && mailbox !="") {
        $(".saveProduct").prop( "disabled", false );
    }
}
$(document).ready(function() {
    $('#formProduct').on("focusout",".name",function() {
        var name = $(this).val();
        if(name != "") {
            //var letters = /^([a-zA-Z]+)([a-zA-Z0-9\-])+$/;
            var letters = /(^([a-zA-Z]+\-[0-9]+$))|(^([a-zA-Z])+$)/;
            if(name.match(letters)) {
                validation();
                $(".name").removeClass('is-invalid');
                $('.nameErr').html("");
            }
            else {
                $(".saveProduct").attr('disabled', 'disabled');
                $('.nameErr').html("Only alphanumeric character and - are allowed").css("color","red");
            }
        }
        else {
            $(".name").addClass('is-invalid');
            $(".saveProduct").attr('disabled', 'disabled');
        }
    });
    $('#formProduct').on("focusout",".url",function() {
        validation();
    });
    $('#formProduct').on("focusout",".category",function() {
        var category = $(this).val();
        if(category != "") {
            validation();
            $(".category").removeClass('is-invalid');
        }
        else {
            $(".category").addClass('is-invalid');
            $(".saveProduct").attr('disabled', 'disabled');
        }
    });
    $('#formProduct').on("focusout",".mplan",function() {
        var val = $(this).val();
        if(val != "") {
            var letters = (/^([0-9]+\.[0-9]+$)|(^([0-9])+$)/);
            if(val.match(letters)) {
                if(val.length <= 15) {
                    validation();
                    $(".mplan").removeClass('is-invalid');
                    $('.mpriceErr').html("");
                }
                else {
                    $(".saveProduct").attr('disabled', 'disabled');
                    $('.mpriceErr').html("max length 15 are allowed").css("color","red");
                }
            }
            else {
                $('.mpriceErr').html("only numeric and . are allowed").css("color","red");
            }
        }
        else {
            $(".mplan").addClass('is-invalid');
            $(".saveProduct").attr('disabled', 'disabled');
        }
    });
    $('#formProduct').on("focusout",".aplan",function() {
        var val = $(this).val();
        if(val != "") {
            var letters = (/^([0-9]+\.[0-9]+$)|(^([0-9])+$)/);
            if(val.match(letters)) {
                if(val.length <= 15) {
                    validation();
                    $(".aplan").removeClass('is-invalid');
                    $('.apriceErr').html("");
                }
                else {
                    $(".saveProduct").attr('disabled', 'disabled');
                    $('.apriceErr').html("Max length 15 are allowed").css("color","red");
                }
            }
            else {
                $(".saveProduct").attr('disabled', 'disabled');
                $('.apriceErr').html("Only numeric and . are allowed").css("color","red");
            }
        }
        else {
            $(".saveProduct").addClass('is-invalid');
            $(".addProduct").attr('disabled', 'disabled');
        }
    });
    $('#formProduct').on("focusout",".sku",function() {
        var val = $(this).val();
        if(val != "") {
           // /^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,16}$/
            var letters = (/^(([a-zA-Z0-9-#?]+)([a-zA-Z0-9]+))|(([a-zA-Z0-9-#?]+)([a-zA-Z0-9]+)([-#?]))+$/);
            if(val.match(letters)) {
                validation();
                $(".sku").removeClass('is-invalid');
                $('.skuErr').html("").css("color","red");
            }else {
                $(".saveProduct").attr('disabled', 'disabled');
                $('.skuErr').html("only numeric and single . are allowed").css("color","red");
            }
        }
        else {
            $(".sku").addClass('is-invalid');
            $(".saveProduct").attr('disabled', 'disabled');
        }
    });
    $('#formProduct').on("focusout",".web",function() {
        var val = $(this).val();
        if(val != "") {
            var letters = (/^([0-9]+\.[0-9]+$)|(^([0-9])+$)/);
            if(val.match(letters)) {
                if(val.length <= 5) {
                    validation();
                    $(".web").removeClass('is-invalid');
                    $('.webErr').html("");
                }
                else {
                    $(".saveProduct").attr('disabled', 'disabled');
                    $('.webErr').html("Max length 5 are allowed").css("color","red");
                }
            }
            else {
                $('.webErr').html("Only numeric and . are allowed").css("color","red");
            }
        }
        else {
            $(".web").addClass('is-invalid');
            $(".saveProduct").attr('disabled', 'disabled');
        }
    });
    $('#formProduct').on("focusout",".bandwidth",function() {
        var val = $(this).val();
        if(val != "") {
            var letters = (/^([0-9]+\.[0-9]+$)|(^([0-9])+$)/);
            if(val.match(letters)) {
                if(val.length <= 5) {
                    validation();
                    $(".bandwidth").removeClass('is-invalid');
                    $('.bandwidthErr').html("");
                }
                else {
                    $(".saveProduct").attr('disabled', 'disabled');
                    $('.bandwidthErr').html("Max length 5 are allowed").css("color","red");
                }
            }
            else {
                $('.bandwidthErr').html("Only numeric and . are allowed").css("color","red");
            }
        }
        else {
            $(".bandwidth").addClass('is-invalid');
            $(".saveProduct").attr('disabled', 'disabled');
        }
    });
    $('#formProduct').on("focusout",".domain",function() {
        var val = $(this).val();
        if(val != "") {
            var letters = /(^([a-zA-Z])+$)|(([0-9])+$)/;
            if(val.match(letters)) {
                validation();
                $(".domain").removeClass('is-invalid');
                $('.domainErr').html("");
            }
            else {
                $(".saveProduct").attr('disabled', 'disabled');
                $('.domainErr').html("Only numeric and only alphabetic are allowed").css("color","red");
            }
        }
        else {
            $(".domain").addClass('is-invalid');
            $(".saveProduct").attr('disabled', 'disabled');
        }
    });
    $('#formProduct').on("focusout",".language",function() {
        var val = $(this).val();
        if(val != "") {
            var letters = /(^([a-zA-Z]+[0-9]+\,[a-zA-Z]+[0-9]+$))|(^([a-zA-Z]+[0-9]+\,[a-zA-Z]+$))|(^([a-zA-Z]+\,[a-zA-Z]+[0-9]+$))|(^([a-zA-Z]+\,[a-zA-Z]+$))|(^([a-zA-Z])+$)/;
            if(val.match(letters)) {
                validation();
                $(".language").removeClass('is-invalid');
                $('.languageErr').html("");
            }
            else {
                $(".saveProduct").attr('disabled', 'disabled');
                $('.languageErr').html("only alphabetic and only alphanumric character are allowed").css("color","red");
            }
        }
        else {
            $(".language").addClass('is-invalid');
            $(".saveProduct").attr('disabled', 'disabled');
        }
    });
    $('#formProduct').on("focusout",".mailbox",function() {
        var val = $(this).val();
        if(val != "") {
            var letters = /(^([0-9])+$)/;
            if(val.match(letters)) {
                validation();
                $(".mailbox").removeClass('is-invalid');
                $('.mailboxErr').html("");
            }
            else {
                $(".saveProduct").attr('disabled', 'disabled');
                $('.mailboxErr').html("Only numeric and Only alphabetic are allowed").css("color","red");
            }
        }
        else {
            $(".mailbox").addClass('is-invalid');
            $(".saveProduct").attr('disabled', 'disabled');
        }
    });
    $('.productTable').DataTable({
        "ajax": 'request.php?getProductTable=1'
    });
});