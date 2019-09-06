/**
* jquery.Jcrop.min.js v0.9.12 (build:20140524)
* jQuery Image Cropping Plugin - released under MIT License
* Copyright (c) 2008-2013 Tapmodo Interactive LLC
* https://github.com/tapmodo/Jcrop
*/
!function($){$.Jcrop=function(obj,opt){function px(n){return Math.round(n)+"px"}function cssClass(cl){return options.baseClass+"-"+cl}function supportsColorFade(){return $.fx.step.hasOwnProperty("backgroundColor")}function getPos(obj){var pos=$(obj).offset();return[pos.left,pos.top]}function mouseAbs(e){return[e.pageX-docOffset[0],e.pageY-docOffset[1]]}function setOptions(opt){"object"!=typeof opt&&(opt={}),options=$.extend(options,opt),$.each(["onChange","onSelect","onRelease","onDblClick"],function(i,e){"function"!=typeof options[e]&&(options[e]=function(){})})}function startDragMode(mode,pos,touch){if(docOffset=getPos($img),Tracker.setCursor("move"===mode?mode:mode+"-resize"),"move"===mode)return Tracker.activateHandlers(createMover(pos),doneSelect,touch);var fc=Coords.getFixed(),opp=oppLockCorner(mode),opc=Coords.getCorner(oppLockCorner(opp));Coords.setPressed(Coords.getCorner(opp)),Coords.setCurrent(opc),Tracker.activateHandlers(dragmodeHandler(mode,fc),doneSelect,touch)}function dragmodeHandler(mode,f){return function(pos){if(options.aspectRatio)switch(mode){case"e":pos[1]=f.y+1;break;case"w":pos[1]=f.y+1;break;case"n":pos[0]=f.x+1;break;case"s":pos[0]=f.x+1}else switch(mode){case"e":pos[1]=f.y2;break;case"w":pos[1]=f.y2;break;case"n":pos[0]=f.x2;break;case"s":pos[0]=f.x2}Coords.setCurrent(pos),Selection.update()}}function createMover(pos){var lloc=pos;return KeyManager.watchKeys(),function(pos){Coords.moveOffset([pos[0]-lloc[0],pos[1]-lloc[1]]),lloc=pos,Selection.update()}}function oppLockCorner(ord){switch(ord){case"n":return"sw";case"s":return"nw";case"e":return"nw";case"w":return"ne";case"ne":return"sw";case"nw":return"se";case"se":return"nw";case"sw":return"ne"}}function createDragger(ord){return function(e){return options.disabled?!1:"move"!==ord||options.allowMove?(docOffset=getPos($img),btndown=!0,startDragMode(ord,mouseAbs(e)),e.stopPropagation(),e.preventDefault(),!1):!1}}function presize($obj,w,h){var nw=$obj.width(),nh=$obj.height();nw>w&&w>0&&(nw=w,nh=w/$obj.width()*$obj.height()),nh>h&&h>0&&(nh=h,nw=h/$obj.height()*$obj.width()),xscale=$obj.width()/nw,yscale=$obj.height()/nh,$obj.width(nw).height(nh)}function unscale(c){return{x:c.x*xscale,y:c.y*yscale,x2:c.x2*xscale,y2:c.y2*yscale,w:c.w*xscale,h:c.h*yscale}}function doneSelect(){var c=Coords.getFixed();c.w>options.minSelect[0]&&c.h>options.minSelect[1]?(Selection.enableHandles(),Selection.done()):Selection.release(),Tracker.setCursor(options.allowSelect?"crosshair":"default")}function newSelection(e){if(!options.disabled&&options.allowSelect){btndown=!0,docOffset=getPos($img),Selection.disableHandles(),Tracker.setCursor("crosshair");var pos=mouseAbs(e);return Coords.setPressed(pos),Selection.update(),Tracker.activateHandlers(selectDrag,doneSelect,"touch"===e.type.substring(0,5)),KeyManager.watchKeys(),e.stopPropagation(),e.preventDefault(),!1}}function selectDrag(pos){Coords.setCurrent(pos),Selection.update()}function newTracker(){var trk=$("<div></div>").addClass(cssClass("tracker"));return is_msie&&trk.css({opacity:0,backgroundColor:"white"}),trk}function setClass(cname){$div.removeClass().addClass(cssClass("holder")).addClass(cname)}function animateTo(a,callback){function queueAnimator(){window.setTimeout(animator,interv)}var x1=a[0]/xscale,y1=a[1]/yscale,x2=a[2]/xscale,y2=a[3]/yscale;if(!animating){var animto=Coords.flipCoords(x1,y1,x2,y2),c=Coords.getFixed(),initcr=[c.x,c.y,c.x2,c.y2],animat=initcr,interv=options.animationDelay,ix1=animto[0]-initcr[0],iy1=animto[1]-initcr[1],ix2=animto[2]-initcr[2],iy2=animto[3]-initcr[3],pcent=0,velocity=options.swingSpeed;x1=animat[0],y1=animat[1],x2=animat[2],y2=animat[3],Selection.animMode(!0);var animator=function(){return function(){pcent+=(100-pcent)/velocity,animat[0]=Math.round(x1+pcent/100*ix1),animat[1]=Math.round(y1+pcent/100*iy1),animat[2]=Math.round(x2+pcent/100*ix2),animat[3]=Math.round(y2+pcent/100*iy2),pcent>=99.8&&(pcent=100),100>pcent?(setSelectRaw(animat),queueAnimator()):(Selection.done(),Selection.animMode(!1),"function"==typeof callback&&callback.call(api))}}();queueAnimator()}}function setSelect(rect){setSelectRaw([rect[0]/xscale,rect[1]/yscale,rect[2]/xscale,rect[3]/yscale]),options.onSelect.call(api,unscale(Coords.getFixed())),Selection.enableHandles()}function setSelectRaw(l){Coords.setPressed([l[0],l[1]]),Coords.setCurrent([l[2],l[3]]),Selection.update()}function tellSelect(){return unscale(Coords.getFixed())}function tellScaled(){return Coords.getFixed()}function setOptionsNew(opt){setOptions(opt),interfaceUpdate()}function disableCrop(){options.disabled=!0,Selection.disableHandles(),Selection.setCursor("default"),Tracker.setCursor("default")}function enableCrop(){options.disabled=!1,interfaceUpdate()}function cancelCrop(){Selection.done(),Tracker.activateHandlers(null,null)}function destroy(){$div.remove(),$origimg.show(),$origimg.css("visibility","visible"),$(obj).removeData("Jcrop")}function setImage(src,callback){Selection.release(),disableCrop();var img=new Image;img.onload=function(){var iw=img.width,ih=img.height,bw=options.boxWidth,bh=options.boxHeight;$img.width(iw).height(ih),$img.attr("src",src),$img2.attr("src",src),presize($img,bw,bh),boundx=$img.width(),boundy=$img.height(),$img2.width(boundx).height(boundy),$trk.width(boundx+2*bound).height(boundy+2*bound),$div.width(boundx).height(boundy),Shade.resize(boundx,boundy),enableCrop(),"function"==typeof callback&&callback.call(api)},img.src=src}function colorChangeMacro($obj,color,now){var mycolor=color||options.bgColor;options.bgFade&&supportsColorFade()&&options.fadeTime&&!now?$obj.animate({backgroundColor:mycolor},{queue:!1,duration:options.fadeTime}):$obj.css("backgroundColor",mycolor)}function interfaceUpdate(alt){options.allowResize?alt?Selection.enableOnly():Selection.enableHandles():Selection.disableHandles(),Tracker.setCursor(options.allowSelect?"crosshair":"default"),Selection.setCursor(options.allowMove?"move":"default"),options.hasOwnProperty("trueSize")&&(xscale=options.trueSize[0]/boundx,yscale=options.trueSize[1]/boundy),options.hasOwnProperty("setSelect")&&(setSelect(options.setSelect),Selection.done(),delete options.setSelect),Shade.refresh(),options.bgColor!=bgcolor&&(colorChangeMacro(options.shade?Shade.getShades():$div,options.shade?options.shadeColor||options.bgColor:options.bgColor),bgcolor=options.bgColor),bgopacity!=options.bgOpacity&&(bgopacity=options.bgOpacity,options.shade?Shade.refresh():Selection.setBgOpacity(bgopacity)),xlimit=options.maxSize[0]||0,ylimit=options.maxSize[1]||0,xmin=options.minSize[0]||0,ymin=options.minSize[1]||0,options.hasOwnProperty("outerImage")&&($img.attr("src",options.outerImage),delete options.outerImage),Selection.refresh()}var docOffset,options=$.extend({},$.Jcrop.defaults),_ua=navigator.userAgent.toLowerCase(),is_msie=/msie/.test(_ua),ie6mode=/msie [1-6]\./.test(_ua);"object"!=typeof obj&&(obj=$(obj)[0]),"object"!=typeof opt&&(opt={}),setOptions(opt);var img_css={border:"none",visibility:"visible",margin:0,padding:0,position:"absolute",top:0,left:0},$origimg=$(obj),img_mode=!0;if("IMG"==obj.tagName){if(0!=$origimg[0].width&&0!=$origimg[0].height)$origimg.width($origimg[0].width),$origimg.height($origimg[0].height);else{var tempImage=new Image;tempImage.src=$origimg[0].src,$origimg.width(tempImage.width),$origimg.height(tempImage.height)}var $img=$origimg.clone().removeAttr("id").css(img_css).show();$img.width($origimg.width()),$img.height($origimg.height()),$origimg.after($img).hide()}else $img=$origimg.css(img_css).show(),img_mode=!1,null===options.shade&&(options.shade=!0);presize($img,options.boxWidth,options.boxHeight);var boundx=$img.width(),boundy=$img.height(),$div=$("<div />").width(boundx).height(boundy).addClass(cssClass("holder")).css({position:"relative",backgroundColor:options.bgColor}).insertAfter($origimg).append($img);options.addClass&&$div.addClass(options.addClass);var $img2=$("<div />"),$img_holder=$("<div />").width("100%").height("100%").css({zIndex:310,position:"absolute",overflow:"hidden"}),$hdl_holder=$("<div />").width("100%").height("100%").css("zIndex",320),$sel=$("<div />").css({position:"absolute",zIndex:600}).dblclick(function(){var c=Coords.getFixed();options.onDblClick.call(api,c)}).insertBefore($img).append($img_holder,$hdl_holder);img_mode&&($img2=$("<img />").attr("src",$img.attr("src")).css(img_css).width(boundx).height(boundy),$img_holder.append($img2)),ie6mode&&$sel.css({overflowY:"hidden"});var xlimit,ylimit,xmin,ymin,xscale,yscale,btndown,animating,shift_down,bound=options.boundary,$trk=newTracker().width(boundx+2*bound).height(boundy+2*bound).css({position:"absolute",top:px(-bound),left:px(-bound),zIndex:290}).mousedown(newSelection),bgcolor=options.bgColor,bgopacity=options.bgOpacity;docOffset=getPos($img);var Touch=function(){function hasTouchSupport(){var i,support={},events=["touchstart","touchmove","touchend"],el=document.createElement("div");try{for(i=0;i<events.length;i++){var eventName=events[i];eventName="on"+eventName;var isSupported=eventName in el;isSupported||(el.setAttribute(eventName,"return;"),isSupported="function"==typeof el[eventName]),support[events[i]]=isSupported}return support.touchstart&&support.touchend&&support.touchmove}catch(err){return!1}}function detectSupport(){return options.touchSupport===!0||options.touchSupport===!1?options.touchSupport:hasTouchSupport()}return{createDragger:function(ord){return function(e){return options.disabled?!1:"move"!==ord||options.allowMove?(docOffset=getPos($img),btndown=!0,startDragMode(ord,mouseAbs(Touch.cfilter(e)),!0),e.stopPropagation(),e.preventDefault(),!1):!1}},newSelection:function(e){return newSelection(Touch.cfilter(e))},cfilter:function(e){return e.pageX=e.originalEvent.changedTouches[0].pageX,e.pageY=e.originalEvent.changedTouches[0].pageY,e},isSupported:hasTouchSupport,support:detectSupport()}}(),Coords=function(){function setPressed(pos){pos=rebound(pos),x2=x1=pos[0],y2=y1=pos[1]}function setCurrent(pos){pos=rebound(pos),ox=pos[0]-x2,oy=pos[1]-y2,x2=pos[0],y2=pos[1]}function getOffset(){return[ox,oy]}function moveOffset(offset){var ox=offset[0],oy=offset[1];0>x1+ox&&(ox-=ox+x1),0>y1+oy&&(oy-=oy+y1),y2+oy>boundy&&(oy+=boundy-(y2+oy)),x2+ox>boundx&&(ox+=boundx-(x2+ox)),x1+=ox,x2+=ox,y1+=oy,y2+=oy}function getCorner(ord){var c=getFixed();switch(ord){case"ne":return[c.x2,c.y];case"nw":return[c.x,c.y];case"se":return[c.x2,c.y2];case"sw":return[c.x,c.y2]}}function getFixed(){if(!options.aspectRatio)return getRect();var xx,yy,w,h,aspect=options.aspectRatio,min_x=options.minSize[0]/xscale,max_x=options.maxSize[0]/xscale,max_y=options.maxSize[1]/yscale,rw=x2-x1,rh=y2-y1,rwa=Math.abs(rw),rha=Math.abs(rh),real_ratio=rwa/rha;return 0===max_x&&(max_x=10*boundx),0===max_y&&(max_y=10*boundy),aspect>real_ratio?(yy=y2,w=rha*aspect,xx=0>rw?x1-w:w+x1,0>xx?(xx=0,h=Math.abs((xx-x1)/aspect),yy=0>rh?y1-h:h+y1):xx>boundx&&(xx=boundx,h=Math.abs((xx-x1)/aspect),yy=0>rh?y1-h:h+y1)):(xx=x2,h=rwa/aspect,yy=0>rh?y1-h:y1+h,0>yy?(yy=0,w=Math.abs((yy-y1)*aspect),xx=0>rw?x1-w:w+x1):yy>boundy&&(yy=boundy,w=Math.abs(yy-y1)*aspect,xx=0>rw?x1-w:w+x1)),xx>x1?(min_x>xx-x1?xx=x1+min_x:xx-x1>max_x&&(xx=x1+max_x),yy=yy>y1?y1+(xx-x1)/aspect:y1-(xx-x1)/aspect):x1>xx&&(min_x>x1-xx?xx=x1-min_x:x1-xx>max_x&&(xx=x1-max_x),yy=yy>y1?y1+(x1-xx)/aspect:y1-(x1-xx)/aspect),0>xx?(x1-=xx,xx=0):xx>boundx&&(x1-=xx-boundx,xx=boundx),0>yy?(y1-=yy,yy=0):yy>boundy&&(y1-=yy-boundy,yy=boundy),makeObj(flipCoords(x1,y1,xx,yy))}function rebound(p){return p[0]<0&&(p[0]=0),p[1]<0&&(p[1]=0),p[0]>boundx&&(p[0]=boundx),p[1]>boundy&&(p[1]=boundy),[Math.round(p[0]),Math.round(p[1])]}function flipCoords(x1,y1,x2,y2){var xa=x1,xb=x2,ya=y1,yb=y2;return x1>x2&&(xa=x2,xb=x1),y1>y2&&(ya=y2,yb=y1),[xa,ya,xb,yb]}function getRect(){var delta,xsize=x2-x1,ysize=y2-y1;return xlimit&&Math.abs(xsize)>xlimit&&(x2=xsize>0?x1+xlimit:x1-xlimit),ylimit&&Math.abs(ysize)>ylimit&&(y2=ysize>0?y1+ylimit:y1-ylimit),ymin/yscale&&Math.abs(ysize)<ymin/yscale&&(y2=ysize>0?y1+ymin/yscale:y1-ymin/yscale),xmin/xscale&&Math.abs(xsize)<xmin/xscale&&(x2=xsize>0?x1+xmin/xscale:x1-xmin/xscale),0>x1&&(x2-=x1,x1-=x1),0>y1&&(y2-=y1,y1-=y1),0>x2&&(x1-=x2,x2-=x2),0>y2&&(y1-=y2,y2-=y2),x2>boundx&&(delta=x2-boundx,x1-=delta,x2-=delta),y2>boundy&&(delta=y2-boundy,y1-=delta,y2-=delta),x1>boundx&&(delta=x1-boundy,y2-=delta,y1-=delta),y1>boundy&&(delta=y1-boundy,y2-=delta,y1-=delta),makeObj(flipCoords(x1,y1,x2,y2))}function makeObj(a){return{x:a[0],y:a[1],x2:a[2],y2:a[3],w:a[2]-a[0],h:a[3]-a[1]}}var ox,oy,x1=0,y1=0,x2=0,y2=0;return{flipCoords:flipCoords,setPressed:setPressed,setCurrent:setCurrent,getOffset:getOffset,moveOffset:moveOffset,getCorner:getCorner,getFixed:getFixed}}(),Shade=function(){function resizeShades(w,h){shades.left.css({height:px(h)}),shades.right.css({height:px(h)})}function updateAuto(){return updateShade(Coords.getFixed())}function updateShade(c){shades.top.css({left:px(c.x),width:px(c.w),height:px(c.y)}),shades.bottom.css({top:px(c.y2),left:px(c.x),width:px(c.w),height:px(boundy-c.y2)}),shades.right.css({left:px(c.x2),width:px(boundx-c.x2)}),shades.left.css({width:px(c.x)})}function createShade(){return $("<div />").css({position:"absolute",backgroundColor:options.shadeColor||options.bgColor}).appendTo(holder)}function enableShade(){enabled||(enabled=!0,holder.insertBefore($img),updateAuto(),Selection.setBgOpacity(1,0,1),$img2.hide(),setBgColor(options.shadeColor||options.bgColor,1),Selection.isAwake()?setOpacity(options.bgOpacity,1):setOpacity(1,1))}function setBgColor(color,now){colorChangeMacro(getShades(),color,now)}function disableShade(){enabled&&(holder.remove(),$img2.show(),enabled=!1,Selection.isAwake()?Selection.setBgOpacity(options.bgOpacity,1,1):(Selection.setBgOpacity(1,1,1),Selection.disableHandles()),colorChangeMacro($div,0,1))}function setOpacity(opacity,now){enabled&&(options.bgFade&&!now?holder.animate({opacity:1-opacity},{queue:!1,duration:options.fadeTime}):holder.css({opacity:1-opacity}))}function refreshAll(){options.shade?enableShade():disableShade(),Selection.isAwake()&&setOpacity(options.bgOpacity)}function getShades(){return holder.children()}var enabled=!1,holder=$("<div />").css({position:"absolute",zIndex:240,opacity:0}),shades={top:createShade(),left:createShade().height(boundy),right:createShade().height(boundy),bottom:createShade()};return{update:updateAuto,updateRaw:updateShade,getShades:getShades,setBgColor:setBgColor,enable:enableShade,disable:disableShade,resize:resizeShades,refresh:refreshAll,opacity:setOpacity}}(),Selection=function(){function insertBorder(type){var jq=$("<div />").css({position:"absolute",opacity:options.borderOpacity}).addClass(cssClass(type));return $img_holder.append(jq),jq}function dragDiv(ord,zi){var jq=$("<div />").mousedown(createDragger(ord)).css({cursor:ord+"-resize",position:"absolute",zIndex:zi}).addClass("ord-"+ord);return Touch.support&&jq.bind("touchstart.jcrop",Touch.createDragger(ord)),$hdl_holder.append(jq),jq}function insertHandle(ord){var hs=options.handleSize,div=dragDiv(ord,hdep++).css({opacity:options.handleOpacity}).addClass(cssClass("handle"));return hs&&div.width(hs).height(hs),div}function insertDragbar(ord){return dragDiv(ord,hdep++).addClass("jcrop-dragbar")}function createDragbars(li){var i;for(i=0;i<li.length;i++)dragbar[li[i]]=insertDragbar(li[i])}function createBorders(li){var cl,i;for(i=0;i<li.length;i++){switch(li[i]){case"n":cl="hline";break;case"s":cl="hline bottom";break;case"e":cl="vline right";break;case"w":cl="vline"}borders[li[i]]=insertBorder(cl)}}function createHandles(li){var i;for(i=0;i<li.length;i++)handle[li[i]]=insertHandle(li[i])}function moveto(x,y){options.shade||$img2.css({top:px(-y),left:px(-x)}),$sel.css({top:px(y),left:px(x)})}function resize(w,h){$sel.width(Math.round(w)).height(Math.round(h))}function refresh(){var c=Coords.getFixed();Coords.setPressed([c.x,c.y]),Coords.setCurrent([c.x2,c.y2]),updateVisible()}function updateVisible(select){return awake?update(select):void 0}function update(select){var c=Coords.getFixed();resize(c.w,c.h),moveto(c.x,c.y),options.shade&&Shade.updateRaw(c),awake||show(),select?options.onSelect.call(api,unscale(c)):options.onChange.call(api,unscale(c))}function setBgOpacity(opacity,force,now){(awake||force)&&(options.bgFade&&!now?$img.animate({opacity:opacity},{queue:!1,duration:options.fadeTime}):$img.css("opacity",opacity))}function show(){$sel.show(),options.shade?Shade.opacity(bgopacity):setBgOpacity(bgopacity,!0),awake=!0}function release(){disableHandles(),$sel.hide(),options.shade?Shade.opacity(1):setBgOpacity(1),awake=!1,options.onRelease.call(api)}function showHandles(){seehandles&&$hdl_holder.show()}function enableHandles(){return seehandles=!0,options.allowResize?($hdl_holder.show(),!0):void 0}function disableHandles(){seehandles=!1,$hdl_holder.hide()}function animMode(v){v?(animating=!0,disableHandles()):(animating=!1,enableHandles())}function done(){animMode(!1),refresh()}var awake,hdep=370,borders={},handle={},dragbar={},seehandles=!1;options.dragEdges&&$.isArray(options.createDragbars)&&createDragbars(options.createDragbars),$.isArray(options.createHandles)&&createHandles(options.createHandles),options.drawBorders&&$.isArray(options.createBorders)&&createBorders(options.createBorders),$(document).bind("touchstart.jcrop-ios",function(e){$(e.currentTarget).hasClass("jcrop-tracker")&&e.stopPropagation()});var $track=newTracker().mousedown(createDragger("move")).css({cursor:"move",position:"absolute",zIndex:360});return Touch.support&&$track.bind("touchstart.jcrop",Touch.createDragger("move")),$img_holder.append($track),disableHandles(),{updateVisible:updateVisible,update:update,release:release,refresh:refresh,isAwake:function(){return awake},setCursor:function(cursor){$track.css("cursor",cursor)},enableHandles:enableHandles,enableOnly:function(){seehandles=!0},showHandles:showHandles,disableHandles:disableHandles,animMode:animMode,setBgOpacity:setBgOpacity,done:done}}(),Tracker=function(){function toFront(touch){$trk.css({zIndex:450}),touch?$(document).bind("touchmove.jcrop",trackTouchMove).bind("touchend.jcrop",trackTouchEnd):trackDoc&&$(document).bind("mousemove.jcrop",trackMove).bind("mouseup.jcrop",trackUp)}function toBack(){$trk.css({zIndex:290}),$(document).unbind(".jcrop")}function trackMove(e){return onMove(mouseAbs(e)),!1}function trackUp(e){return e.preventDefault(),e.stopPropagation(),btndown&&(btndown=!1,onDone(mouseAbs(e)),Selection.isAwake()&&options.onSelect.call(api,unscale(Coords.getFixed())),toBack(),onMove=function(){},onDone=function(){}),!1}function activateHandlers(move,done,touch){return btndown=!0,onMove=move,onDone=done,toFront(touch),!1}function trackTouchMove(e){return onMove(mouseAbs(Touch.cfilter(e))),!1}function trackTouchEnd(e){return trackUp(Touch.cfilter(e))}function setCursor(t){$trk.css("cursor",t)}var onMove=function(){},onDone=function(){},trackDoc=options.trackDocument;return trackDoc||$trk.mousemove(trackMove).mouseup(trackUp).mouseout(trackUp),$img.before($trk),{activateHandlers:activateHandlers,setCursor:setCursor}}(),KeyManager=function(){function watchKeys(){options.keySupport&&($keymgr.show(),$keymgr.focus())}function onBlur(){$keymgr.hide()}function doNudge(e,x,y){options.allowMove&&(Coords.moveOffset([x,y]),Selection.updateVisible(!0)),e.preventDefault(),e.stopPropagation()}function parseKey(e){if(e.ctrlKey||e.metaKey)return!0;shift_down=e.shiftKey?!0:!1;var nudge=shift_down?10:1;switch(e.keyCode){case 37:doNudge(e,-nudge,0);break;case 39:doNudge(e,nudge,0);break;case 38:doNudge(e,0,-nudge);break;case 40:doNudge(e,0,nudge);break;case 27:options.allowSelect&&Selection.release();break;case 9:return!0}return!1}var $keymgr=$('<input type="radio" />').css({position:"fixed",left:"-120px",width:"12px"}).addClass("jcrop-keymgr"),$keywrap=$("<div />").css({position:"absolute",overflow:"hidden"}).append($keymgr);return options.keySupport&&($keymgr.keydown(parseKey).blur(onBlur),ie6mode||!options.fixedSupport?($keymgr.css({position:"absolute",left:"-20px"}),$keywrap.append($keymgr).insertBefore($img)):$keymgr.insertBefore($img)),{watchKeys:watchKeys}}();Touch.support&&$trk.bind("touchstart.jcrop",Touch.newSelection),$hdl_holder.hide(),interfaceUpdate(!0);var api={setImage:setImage,animateTo:animateTo,setSelect:setSelect,setOptions:setOptionsNew,tellSelect:tellSelect,tellScaled:tellScaled,setClass:setClass,disable:disableCrop,enable:enableCrop,cancel:cancelCrop,release:Selection.release,destroy:destroy,focus:KeyManager.watchKeys,getBounds:function(){return[boundx*xscale,boundy*yscale]},getWidgetSize:function(){return[boundx,boundy]},getScaleFactor:function(){return[xscale,yscale]},getOptions:function(){return options},ui:{holder:$div,selection:$sel}};return is_msie&&$div.bind("selectstart",function(){return!1}),$origimg.data("Jcrop",api),api},$.fn.Jcrop=function(options,callback){var api;return this.each(function(){if($(this).data("Jcrop")){if("api"===options)return $(this).data("Jcrop");$(this).data("Jcrop").setOptions(options)}else"IMG"==this.tagName?$.Jcrop.Loader(this,function(){$(this).css({display:"block",visibility:"hidden"}),api=$.Jcrop(this,options),$.isFunction(callback)&&callback.call(api)}):($(this).css({display:"block",visibility:"hidden"}),api=$.Jcrop(this,options),$.isFunction(callback)&&callback.call(api))}),this},$.Jcrop.Loader=function(imgobj,success,error){function completeCheck(){img.complete?($img.unbind(".jcloader"),$.isFunction(success)&&success.call(img)):window.setTimeout(completeCheck,50)}var $img=$(imgobj),img=$img[0];$img.bind("load.jcloader",completeCheck).bind("error.jcloader",function(){$img.unbind(".jcloader"),$.isFunction(error)&&error.call(img)}),img.complete&&$.isFunction(success)&&($img.unbind(".jcloader"),success.call(img))},$.Jcrop.defaults={allowSelect:!0,allowMove:!0,allowResize:!0,trackDocument:!0,baseClass:"jcrop",addClass:null,bgColor:"black",bgOpacity:.6,bgFade:!1,borderOpacity:.4,handleOpacity:.5,handleSize:null,aspectRatio:0,keySupport:!0,createHandles:["n","s","e","w","nw","ne","se","sw"],createDragbars:["n","s","e","w"],createBorders:["n","s","e","w"],drawBorders:!0,dragEdges:!0,fixedSupport:!0,touchSupport:null,shade:null,boxWidth:0,boxHeight:0,boundary:2,fadeTime:400,animationDelay:20,swingSpeed:3,minSelect:[0,0],maxSize:[0,0],minSize:[0,0],onChange:function(){},onSelect:function(){},onDblClick:function(){},onRelease:function(){}}}(jQuery);