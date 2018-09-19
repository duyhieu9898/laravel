var ss= document.getElementById('time');
 		setInterval(function(){
 			var today=new Date();
	 		var h = today.getHours();
		    var m = today.getMinutes();
		    var s = today.getSeconds();
			ss.innerHTML=h + ":" + m + ":" + s;
		}, 1000);