$('#file-upload').change(function() {
var i = $(this).prev('label').clone();
var file = $('#file-upload')[0].files[0].name;
$(this).prev('label').text(file);
});











// search 
	var searchvisible = 0;            
	    $(".site_sub_header .menu-item a").click(function(e){ 
	        //This stops the page scrolling to the top on a # link.
	        e.preventDefault();
	        if (searchvisible ===0) {
	            //Search is currently hidden. Slide down and show it.
	            $(".site_search").slideDown(200);
	            $(".site_search").focus(); //Set focus on the search input field.
	            searchvisible = 1; //Set search visible flag to visible.
	        } else {
	            //Search is currently showing. Slide it back up and hide it.
	            $(".site_search").slideUp(200);
	            searchvisible = 0;
	        }
	    });
	    
    	var searchvisible = 0;            
    	    $(".container .menu-item a").click(function(e){ 
    	        //This stops the page scrolling to the top on a # link.
    	        e.preventDefault();
    	        if (searchvisible ===0) {
    	            //Search is currently hidden. Slide down and show it.
    	            $(".site_search").slideDown(200);
    	            $(".site_search").focus(); //Set focus on the search input field.
    	            searchvisible = 1; //Set search visible flag to visible.
    	        } else {
    	            //Search is currently showing. Slide it back up and hide it.
    	            $(".site_search").slideUp(200);
    	            searchvisible = 0;
    	        }
    	    });