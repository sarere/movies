$(document).ready(function(){
    
    adjustment();
    
    $('#search').keyup(function() {
        var input  = $('#search').val();
        if(input != ""){
            $.ajax({
                url:'ajaxfilter.php',
                type:'POST',
                data:'request='+input,
                beforeSend:function(){
                    $(".category").html('Working on...');
                },
                success:function(data){
                    $(".category").html(data);
                    adjustment();
                }
            });
        }
        else{
            $.ajax({
                url:'ajaxfilter.php',
                type:'POST',
                data:'request=',
                beforeSend:function(){
                    $(".category").html('Working on...');
                },
                success:function(data){
                    $(".category").html(data);
                    adjustment();
                }
            });
        }
    });
});

function adjustment (){
    var itemCount = $('.item').length;
    var bottomStart = Math.ceil(itemCount/5) * 5 - 5;
  
    if (itemCount>=10){
        for (i = bottomStart ; i < itemCount; i++) {
            $(".detail").eq(i).addClass("bottom");
        }
    }

    var detailTypeCount = $('.detail-type').length;
    var quality = ""
    for (i = 0 ; i < detailTypeCount; i++) {
        quality = $('.detail-type').eq(i).text().toLowerCase();
        $('.detail-type').eq(i).addClass(quality);
    }
}