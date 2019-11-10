<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal('show');
    $('.navbar-collapse a').each(function(){
if($(this.attr("href") == window.location.href)){
$(this).css("background-color","darkseagreen");
    alert("v");
}
else{
$(this).css("background-color","transparent");
    alert("ff");
}
});
	});
   
</script>