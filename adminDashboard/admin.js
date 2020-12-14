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
                    html = '<form id="form" id="editFormCat" role="form" method="POST"><div class="form-group">'+
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
                          '<input class="url form-control" value="'+msg[i]['html']+'"  placeholder="link" name="link" type="url">'+
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
        $(".addProduct").prop( "disabled", false );
    }
}
function catvalidation() {
    var name = $('.name').val();
    var category = $('.category').val();
    if(name != "") {
        $(".addCategory").prop( "disabled", false );
    }
}
function cateditvalidation() {
    var name = $('.name').val();
    var category = $('.category').val();
    if(name != "") {
        $(".saveCategory").prop( "disabled", false );
    }
}
$(document).ready(function() {
    $('#editFormCat').on("focusout",".name",function() {
        var name = $(this).val();
        if(name != "") {
            //var letters = /^([a-zA-Z]+)([a-zA-Z0-9\-])+$/;
            var letters = /(^([a-zA-Z]+[a-zA-Z0-9]+)$)|(^([a-zA-Z]+[0-9]+\.[0-9]+$))|(^([a-zA-Z])+$)/;
            if(name.match(letters)) {
                cateditvalidation();
                $(".name").removeClass('is-invalid');
                $('.nameErr').html("");
            }
            else {
                $(".saveCategory").attr('disabled', 'disabled');
                $('.nameErr').html("Only alpha and alpha+numeric and alpha+numeric+.+numeric character are allowed").css("color","red");
            }
        }
        else {
            $(".name").addClass('is-invalid');
            $(".saveCategory").attr('disabled', 'disabled');
        }
    });
    $('#formCat').on("focusout",".name",function() {
        var name = $(this).val();
        if(name != "") {
            //var letters = /^([a-zA-Z]+)([a-zA-Z0-9\-])+$/;
            var letters = /(^([a-zA-Z]+[a-zA-Z0-9]+)$)|(^([a-zA-Z]+[0-9]+\.[0-9]+$))|(^([a-zA-Z])+$)/;
            if(name.match(letters)) {
                catvalidation();
                $(".name").removeClass('is-invalid');
                $('.nameErr').html("");
            }
            else {
                $(".addCategory").attr('disabled', 'disabled');
                $('.nameErr').html("Only alpha and alpha+numeric and alpha+numeric+.+numeric character are allowed").css("color","red");
            }
        }
        else {
            $(".name").addClass('is-invalid');
            $(".addCategory").attr('disabled', 'disabled');
        }
    });
    $(".name").focusout(function(event) {
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
                $(".addProduct").attr('disabled', 'disabled');
                $('.nameErr').html("Only alphanumeric character and - are allowed").css("color","red");
            }
        }
        else {
            $(".name").addClass('is-invalid');
            $(".addProduct").attr('disabled', 'disabled');
        }
    });
    $(".url").focusout(function(event) {
        validation();
    });
    $(".category").focusout(function(event) {
        var category = $(this).val();
        if(category != "") {
            validation();
            $(".category").removeClass('is-invalid');
        }
        else {
            $(".category").addClass('is-invalid');
            $(".addProduct").attr('disabled', 'disabled');
        }
    });
    $(".mplan").focusout(function(event) {
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
                    $(".addProduct").attr('disabled', 'disabled');
                    $('.mpriceErr').html("max length 15 are allowed").css("color","red");
                }
            }
            else {
                $(".addProduct").attr('disabled', 'disabled');
                $('.mpriceErr').html("only numeric and . are allowed").css("color","red");
            }
        }
        else {
            $(".mplan").addClass('is-invalid');
            $(".addProduct").attr('disabled', 'disabled');
        }
    });
    $(".aplan").focusout(function(event) {
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
                    $(".addProduct").attr('disabled', 'disabled');
                    $('.apriceErr').html("Max length 15 are allowed").css("color","red");
                }
            }
            else {
                $(".addProduct").attr('disabled', 'disabled');
                $('.apriceErr').html("Only numeric and . are allowed").css("color","red");
            }
        }
        else {
            $(".aplan").addClass('is-invalid');
            $(".addProduct").attr('disabled', 'disabled');
        }
    });
    $(".sku").focusout(function(event) {
        var val = $(this).val();
        if(val != "") {
           // /^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,16}$/
            var letters = (/^(([a-zA-Z0-9-#?]+)([a-zA-Z0-9]+))|(([a-zA-Z0-9-#?]+)([a-zA-Z0-9]+)([-#?]))+$/);
            if(val.match(letters)) {
                validation();
                $(".sku").removeClass('is-invalid');
                $('.skuErr').html("").css("color","red");
            }else {
                $(".addProduct").attr('disabled', 'disabled');
                $('.skuErr').html("only numeric and single . are allowed").css("color","red");
            }
        }
        else {
            $(".sku").addClass('is-invalid');
            $(".addProduct").attr('disabled', 'disabled');
        }
    });
    $(".web").focusout(function(event) {
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
                    $(".addProduct").attr('disabled', 'disabled');
                    $('.webErr').html("Max length 5 are allowed").css("color","red");
                }
            }
            else {
                $(".addProduct").attr('disabled', 'disabled');
                $('.webErr').html("Only numeric and . are allowed").css("color","red");
            }
        }
        else {
            $(".web").addClass('is-invalid');
            $(".addProduct").attr('disabled', 'disabled');
        }
    });
    $(".bandwidth").focusout(function(event) {
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
                    $(".addProduct").attr('disabled', 'disabled');
                    $('.bandwidthErr').html("Max length 5 are allowed").css("color","red");
                }
            }
            else {
                $(".addProduct").attr('disabled', 'disabled');
                $('.bandwidthErr').html("Only numeric and . are allowed").css("color","red");
            }
        }
        else {
            $(".bandwidth").addClass('is-invalid');
            $(".addProduct").attr('disabled', 'disabled');
        }
    });
    $(".domain").focusout(function(event) {
        var val = $(this).val();
        if(val != "") {
            var letters = /(^([a-zA-Z])+$)|(([0-9])+$)/;
            if(val.match(letters)) {
                validation();
                $(".domain").removeClass('is-invalid');
                $('.domainErr').html("");
            }
            else {
                $(".addProduct").attr('disabled', 'disabled');
                $('.domainErr').html("Only numeric and only alphabetic are allowed").css("color","red");
            }
        }
        else {
            $(".domain").addClass('is-invalid');
            $(".addProduct").attr('disabled', 'disabled');
        }
    });
    $(".language").focusout(function(event) {
        var val = $(this).val();
        if(val != "") {
            var letters = /(^([a-zA-Z]+[0-9]+\,[a-zA-Z]+[0-9]+$))|(^([a-zA-Z]+[0-9]+\,[a-zA-Z]+$))|(^([a-zA-Z]+\,[a-zA-Z]+[0-9]+$))|(^([a-zA-Z]+\,[a-zA-Z]+$))|(^([a-zA-Z])+$)/;
            if(val.match(letters)) {
                validation();
                $(".language").removeClass('is-invalid');
                $('.languageErr').html("");
            }
            else {
                $(".addProduct").attr('disabled', 'disabled');
                $('.languageErr').html("only alphabetic and only alphanumric character are allowed").css("color","red");
            }
        }
        else {
            $(".language").addClass('is-invalid');
            $(".addProduct").attr('disabled', 'disabled');
        }
    });
    $(".mailbox").focusout(function(event) {
        var val = $(this).val();
        if(val != "") {
            var letters = /(^([0-9])+$)/;
            if(val.match(letters)) {
                validation();
                $(".mailbox").removeClass('is-invalid');
                $('.mailboxErr').html("");
            }
            else {
                $(".addProduct").attr('disabled', 'disabled');
                $('.mailboxErr').html("Only numeric and Only alphabetic are allowed").css("color","red");
            }
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
    });
});