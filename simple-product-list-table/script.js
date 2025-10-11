$(document).ready(function(  ){

    $('#product-register').submit(function(e){
        e.preventDefault();
        
        $.ajax({
            method  : 'POST',
            data    : $(this).serialize(),
            url     : 'ajax-save.php',
            beforeSend: function(){

            },
            complete: function(){

            },
            error: function( result ){
                Swal.fire({
                    title: result.responseText,
                    icon: "error",
                  });
            },
            success: function( result ){
                Swal.fire({
                    title: result,
                    icon: "success",
                  });
            },
        });
        
    });
    
});