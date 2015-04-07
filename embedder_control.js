function embed_setSize(id, width, height){
	var element = document.getElementById(id);
	if(element != null){
		element.style.width = width;
		element.style.height = height;
	}
}
function embed_setSize(width, height){
	var element = document.getElementById('embed_video');
	if(element != null){
		element.style.width = width;
		element.style.height = height;
	}
}

function embed_setSizeByAspect(id, width, aspect){
	var height;
	var element = document.getElementById(id);
	if(element != null){
		if(aspect.indexOf(':') > -1){
			height = aspect.split(':')[1] / aspect.split(':')[0] * width; 
		}
		else if(aspect.indexOf('/') > -1){
			height = aspect.split('/')[1] / aspect.split('/')[0] * width; 
		}
		else return;

		element.style.width = width;
		element.style.height = height;
	}
}
function embed_setSizeByAspect(width, aspect){
	var height;
	var element = document.getElementById('embed_video');
	if(element != null){
		if(aspect.indexOf(':') > -1){
			height = aspect.split(':')[1] / aspect.split(':')[0] * width; 
		}
		else if(aspect.indexOf('/') > -1){
			height = aspect.split('/')[1] / aspect.split('/')[0] * width; 
		}
		else return;

		element.style.width = width;
		element.style.height = height;
	}
}

function embed_setOpacity(id, opacity){
	while(opacity > 1) opacity /= 100;
	var element = document.getElementById(id);
	if(element != null)
		element.style.opacity = opacity;
}
function embed_setOpacity(opacity){
	while(opacity > 1) opacity /= 100;
	var element = document.getElementById('embed_video');
	if(element != null)
		element.style.opacity = opacity;
}
function embed_setZ(index){
	var element = document.getElementById('embed_video');
	if(element != null)
		element.style.zIndex = index;
}
function embed_setZ(id, index){
	var element = document.getElementById(id);
	if(element != null)
		element.style.zIndex = index;
}
