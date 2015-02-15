<?php the_content(); ?>
<div id="owl-demo" class="owl-carousel">

</div>
<style>
	#owl-demo .item {
	  background: #a1def8;
	  padding: 30px 0px;
	  display: block;
	  margin: 5px;
	  color: #FFF;
	  -webkit-border-radius: 3px;
	  -moz-border-radius: 3px;
	  border-radius: 3px;
	  text-align: center;
	}
</style>
<script type="text/javascript">
	$(document).ready(function() {
	 
	  $("#owl-demo").owlCarousel({
		jsonPath : 'json/customData.json',
		jsonSuccess : customDataSuccess
	  });
	 
	  function customDataSuccess(data){
		var content = "";
		for( var i in data["items"] ){
		   
		   	var name = data["items"][i].name;
		   	var title = data["items"][i].title;
			var img = data["items"][i].img;
			var desc = data["items"][i].desc;
	 
		   content += "<img src=\"" +img+ "\" alt=\"" +name+" "+title+"\">"
		}
		$("#owl-demo").html(content);
	  }
	 
	});
</script>
<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>