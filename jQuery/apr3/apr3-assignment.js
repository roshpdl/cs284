$(document).ready(function(){
    $('.color').click(function(){
        let col = $(this).attr('value');
        $('#box').css("background-color", col);
    });
});
