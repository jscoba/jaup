
/* programado por Herson Salinas 2011 */

hMenu = {
	menus: {},
	hover: {},
	init: function(menuId){
		hMenu.menus[menuId] = [];
		var obj, objId, padre, n = 0;
		var menuDom = document.getElementById(menuId);
		if (menuDom == null) {
			return;
		}
		var links = menuDom.getElementsByTagName('a');
		for (var i in links){
			obj = links[i];
			objId = obj.id;
			padre = obj.parentNode;
			if(padre){
				padre.onmouseover = function(e){ 
					hMenu.killBubbling(e); 
					hMenu.hover(this); 
				}
				padre.onmouseout = function(){ 
					if (this.id){
						hMenu.hover[this.id] = false;
					}
				}
			}
		}
		document.onclick = function(){ hMenu.unregAll(); }
	},
	hover: function(obj){
		var objId  = obj.id;
		var partes = obj.id.split('_');
		var menuId = partes[1];
		var nivel  = partes[2];
		hMenu.unreg(menuId);
		if (nivel == 0){
			hMenu.hover[objId] = true; 
			setTimeout("hMenu.wait('"+objId+"','"+menuId+"');", 500);
		}else{
			hMenu.reg(obj, menuId, 0);
		}
		
	},
	wait: function(objId, menuId){
		if(hMenu.hover[objId] == true){
			var obj = document.getElementById(objId);
			hMenu.reg(obj, menuId, 0);
		}
	},
	reg: function(obj, menuId, n){
		if (obj.id == menuId) { return;}
		if (obj.className == ''){
			obj.className = "showed";
			hMenu.menus[menuId].push(obj);
			hMenu.setChildUL(obj, 'ulsubmenu', 'ulsubmenu showed');
		}
		hMenu.reg(obj.parentNode, menuId, n+1);
	},
	unreg: function(menuId){
		var activos = hMenu.menus[menuId];
		var cant = hMenu.menus[menuId].length;
		for (var n = 0; n < cant; n++){
			if(activos[n].className == "showed"){
				activos[n].className = "";
				hMenu.setChildUL(activos[n], 'ulsubmenu showed', 'ulsubmenu');
			}
		}
		hMenu.menus[menuId] = [];
	}, 
	unregAll: function(){
		for(var menu in hMenu.menus){
			hMenu.unreg(menu);
		}
	},
	setChildUL: function(oPadre, cClaseFrom, cClaseTo){
		var obj;
		for(var n = 0; n < oPadre.childNodes.length; n++){
			obj = oPadre.childNodes[n];
			if (obj.className == cClaseFrom){
				obj.className =  cClaseTo;
			}
		}
	},
	killBubbling: function(e){
		if (!e) var e = window.event;
		e.cancelBubble = true;
		if (e.stopPropagation) e.stopPropagation();
	}
};

