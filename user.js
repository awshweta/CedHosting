
$('.cartTable').on("click" ,'.deleteCartProduct',function() {
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
$(document).ready(function() {
    $('.cartTable').DataTable({
        "ajax": 'request.php?getTable=1'
    });

    $('.addToCart').click(function(){
        var id = $(this).data("id");
        var price = $('.selectPrice'+id+'').val();
        console.log(price);
        $.ajax({
            type: "POST",
            url: "request.php",
            data:{ id:id,price:price, action :'addToCart'},
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