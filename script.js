$(function() { 
   $('.container-card').odd().addClass('second');

        $(".menu-tel").click(function(){
            $(".menu-matieres-tel").slideToggle().css("display" , "flex");
        });
       


    
$('.wrap-tag').on('click', function() {
	var tag = $(this).data('tag'),
       $area = $('#contenu');
    var start = $area[0].selectionStart,
       end = $area[0].selectionEnd,
       content = $area.val();
   $area.val(content.substring(0, start)
            + '<' + tag + '>'
            + content.substring(start, end)
            + '</' + tag + '>'
            + content.substring(end) );
   $area.focus();
   $area[0].selectionStart = $area[0].selectionEnd = end + 2 * tag.length + 5;
})

$('.wrap-tag2').on('click', function() {
	var tag = $(this).data('tag'),
       $area = $('#contenu');
    var start = $area[0].selectionStart,
       end = $area[0].selectionEnd,
       content = $area.val();
       
        if(tag == 'br'){
        $area.val(content.substring(0, start)
        + '<' + tag + '>'
       );
       }
 
   $area.focus();
   $area[0].selectionStart = $area[0].selectionEnd = end + 2 * tag.length + 5;

   console.log(tag);
})

$('.wrap-tag3').on('click', function() {
	var tag = $(this).data('tag'),
       $area = $('#contenu');
    var start = $area[0].selectionStart,
       end = $area[0].selectionEnd,
       content = $area.val();

        $area.val(content.substring(0, start)
        + '<img src="admin/photo/' + tag + '"  alt="">'
       );
      
 
   $area.focus();
   $area[0].selectionStart = $area[0].selectionEnd = end + 2 * tag.length + 5;
  

   console.log(tag);
})
$('.img').on('click', function(){
   $('#3').show();
})  
$('.close').on('click', function(){
   $('#3').hide();
})
});





