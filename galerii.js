window.onload=function(){
	if( document.getElementById("hoidja") != null){
		pildidcontainer = document.getElementById("pildid");
		var pildid = pildidcontainer.getElementsByTagName('img');
			
		for (i=0; i < pildid.length; i++) {
			console.log(pildid[i]);
			pildid[i].onclick = function(){
				showDetails(this);
				return false;
			}
		}	
	}
}

function showDetails(el){
	if( document.getElementById("hoidja") != null){
		suur_pilt = document.getElementById("suurpilt");
		suur_pilt.src = el.parentNode.href;
		suur_pilt.onload = function(){ 
			suurus(this);
		}
		info = document.getElementById("inf");
		info.innerHTML = el.alt;
		document.getElementById("hoidja").style.display="initial";
	}
}

function suurus(el){
  el.removeAttribute("height"); // eemaldab suuruse
  el.removeAttribute("width");
  if (el.width>window.innerWidth || el.height>window.innerHeight){  // ainult liiga suure pildi korral
    if (window.innerWidth >= window.innerHeight){ // lai aken
      el.height=window.innerHeight*0.9; // 90% kõrgune
      if (el.width>window.innerWidth){ // kas element läheb ikka üle piiri?
        el.removeAttribute("height");
        el.width=window.innerWidth*0.9;
      }
    } else { // kitsas aken
      el.width=window.innerWidth*0.9;   // 90% laiune
      if (el.height>window.innerHeight){ // kas element läheb ikka üle piiri?
        el.removeAttribute("width");
        el.height=window.innerHeight*0.9;
      }
    }
  }
}

function hideDetails(el){
	if( document.getElementById("hoidja") != null){
		document.getElementById("hoidja").style.display="none";
	}
}

window.onresize=function() {
	if( document.getElementById("hoidja") != null){
	suurpilt=document.getElementById("suurpilt");
	suurus(suurpilt);
	}
}