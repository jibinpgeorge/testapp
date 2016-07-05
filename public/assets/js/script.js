$(document).ready(function(){
	
});
function ajaxSave(id){

	var _token = $("input[name=_token]").val();
	data = {post_id:id,_token:_token};
	$.post(siteUrl + "/ajax", data, function(data, status){
        if(data.message == 'favorited'){
            $('.post-love[data-bikeid='+data.post_id+'] .fa-heart-o').css('display','none');
            $('.post-love[data-bikeid='+data.post_id+'] .fa-heart').css('display','block');
        } else {
        	$('.post-love[data-bikeid='+data.post_id+'] .fa-heart-o').css('display','block');
            $('.post-love[data-bikeid='+data.post_id+'] .fa-heart').css('display','none');
        }
    });
}
function deletePosts(id){
    var _token = $("input[name=_token]").val();
    data = {post_id:id,_token:_token};
    var r = confirm("Are you sure you want to delete this bookmark?");
    if (r == true) {
        $.post(siteUrl + "/ajaxdelete", data, function(data, status){
            if(data.message == 'deleted'){
                $('.col-data-panel[data-bikeid='+data.post_id+']').css('display','none');
            }
        });
    } else {
       return;
    }
    
}

