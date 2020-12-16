$(document).ready(function() {
    $('.addToCart').click(function(){
        var id = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "request.php",
            data:{ id:id, action :'addToCart'},
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