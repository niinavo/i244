window.onload=function(){
    var parl = document.getElementsByClassName("bead");
    for(var i=0; i< parl.length; i++){	
		parl[i].onclick = function(){
			var floatvalue = getComputedStyle(this,null).getPropertyValue("float");
			if(floatvalue=="left"){
				this.style.cssFloat="right";
			}else if(floatvalue=="right"){
				this.style.cssFloat="left"}
				
			}
		}
    }