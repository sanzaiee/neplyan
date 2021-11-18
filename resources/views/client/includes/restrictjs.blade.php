 <script>
        $( window ).on( "load", function() {
		document.onkeydown = function(e) {
			if(e.keyCode == 123) {
			 return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
			 return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
			 return false;
			}
			if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
			 return false;
			}
		
			if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
			 return false;
			}
		 };
		
		$("html").on("contextmenu",function(){
			return false;
		});
	});
    </script>

    <script type="text/javascript">
       function killCopy(e){
        return false
       }
       function reEnable(){
        return true
       }
       document.onselectstart=new Function ("return false")
       if (window.sidebar){
       document.onmousedown=killCopy
       document.onclick=reEnable
       }
    </script>