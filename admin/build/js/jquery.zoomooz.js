function Matrix(){}var Sylvester={version:"0.1.3",precision:1e-6};Matrix.prototype={dup:function(){return Matrix.create(this.elements)},canMultiplyFromLeft:function(e){var t=e.elements||e;return void 0===t[0][0]&&(t=Matrix.create(t).elements),this.elements[0].length==t.length},multiply:function(e){var t=!!e.modulus,n=e.elements||e;if(void 0===n[0][0]&&(n=Matrix.create(n).elements),!this.canMultiplyFromLeft(n))return null;var o,r,a,i,s,l,u=this.elements.length,c=u,f=n[0].length,m=this.elements[0].length,d=[];do{d[o=c-u]=[],r=f;do{a=f-r,i=0,s=m;do{l=m-s,i+=this.elements[o][l]*n[l][a]}while(--s);d[o][a]=i}while(--r)}while(--u);return n=Matrix.create(d),t?n.col(1):n},isSquare:function(){return this.elements.length==this.elements[0].length},toRightTriangular:function(){var e,t,n,o,r=this.dup(),a=this.elements.length,i=a,s=this.elements[0].length;do{if(t=i-a,0===r.elements[t][t])for(j=t+1;j<i;j++)if(0!==r.elements[j][t]){e=[],n=s;do{o=s-n,e.push(r.elements[t][o]+r.elements[j][o])}while(--n);r.elements[t]=e;break}if(0!==r.elements[t][t])for(j=t+1;j<i;j++){var l=r.elements[j][t]/r.elements[t][t];e=[],n=s;do{o=s-n,e.push(o<=t?0:r.elements[j][o]-r.elements[t][o]*l)}while(--n);r.elements[j]=e}}while(--a);return r},determinant:function(){if(!this.isSquare())return null;var e,t=this.toRightTriangular(),n=t.elements[0][0],o=t.elements.length-1,r=o;do{e=r-o+1,n*=t.elements[e][e]}while(--o);return n},isSingular:function(){return this.isSquare()&&0===this.determinant()},augment:function(e){var t=e.elements||e;void 0===t[0][0]&&(t=Matrix.create(t).elements);var n,o,r,a=this.dup(),i=a.elements[0].length,s=a.elements.length,l=s,u=t[0].length;if(s!=t.length)return null;do{n=l-s,o=u;do{r=u-o,a.elements[n][i+r]=t[n][r]}while(--o)}while(--s);return a},inverse:function(){if(!this.isSquare()||this.isSingular())return null;var e,t,n,o,r,a,i,s=this.elements.length,l=s,u=this.augment(Matrix.I(s)).toRightTriangular(),c=u.elements[0].length,f=[];do{r=[],n=c,f[e=s-1]=[],a=u.elements[e][e];do{o=c-n,i=u.elements[e][o]/a,r.push(i),o>=l&&f[e].push(i)}while(--n);for(u.elements[e]=r,t=0;t<e;t++){r=[],n=c;do{o=c-n,r.push(u.elements[t][o]-u.elements[e][o]*u.elements[t][e])}while(--n);u.elements[t]=r}}while(--s);return Matrix.create(f)},setElements:function(e){var t,n=e.elements||e;if(void 0!==n[0][0]){var o,r,a,i=n.length,s=i;this.elements=[];do{r=o=n[t=s-i].length,this.elements[t]=[];do{a=r-o,this.elements[t][a]=n[t][a]}while(--o)}while(--i);return this}var l=n.length,u=l;this.elements=[];do{t=u-l,this.elements.push([n[t]])}while(--l);return this}},Matrix.create=function(e){return(new Matrix).setElements(e)},Matrix.I=function(e){var t,n,o,r=[],a=e;do{r[t=a-e]=[],n=a;do{o=a-n,r[t][o]=t==o?1:0}while(--n)}while(--e);return Matrix.create(r)},PureCSSMatrix=function(){"use strict";function e(e){e&&null!==e&&"none"!=e?e instanceof Matrix?this.setMatrix(e):this.setMatrixValue(e):this.m=Matrix.I(3)}function t(e){var t=parseFloat(n(e));return e.match(r)&&(t=2*Math.PI*t/360),t}function n(e){return e.match(a)}function o(e){return Number(e).toFixed(6)}var r=/deg$/,a=/([0-9.\-e]+)/g,i=/([a-zA-Z]+)\(([^\)]+)\)/g;return e.prototype.setMatrix=function(e){this.m=e},e.prototype.setMatrixValue=function(e){for(var o,r=Matrix.I(3);null!==(o=i.exec(e));){var a,s=o[1].toLowerCase(),l=o[2].split(",");if("matrix"==s)a=Matrix.create([[parseFloat(l[0]),parseFloat(l[2]),parseFloat(n(l[4]))],[parseFloat(l[1]),parseFloat(l[3]),parseFloat(n(l[5]))],[0,0,1]]);else if("translate"==s)(a=Matrix.I(3)).elements[0][2]=parseFloat(n(l[0])),a.elements[1][2]=parseFloat(n(l[1]));else if("scale"==s){var u,c=parseFloat(l[0]);u=l.length>1?parseFloat(l[1]):c,a=Matrix.create([[c,0,0],[0,u,0],[0,0,1]])}else"rotate"==s?a=Matrix.RotationZ(t(l[0])):"skew"==s||"skewx"==s?(a=Matrix.I(3)).elements[0][1]=Math.tan(t(l[0])):"skewy"==s?(a=Matrix.I(3)).elements[1][0]=Math.tan(t(l[0])):console.log("Problem with setMatrixValue",s,l);r=r.multiply(a)}this.m=r},e.prototype.multiply=function(t){return new e(this.m.multiply(t.m))},e.prototype.inverse=function(){return Math.abs(this.m.elements[0][0])<1e-6&&(this.m.elements[0][0]=0),new e(this.m.inverse())},e.prototype.translate=function(t,n){var o=Matrix.I(3);return o.elements[0][2]=t,o.elements[1][2]=n,new e(this.m.multiply(o))},e.prototype.scale=function(t,n){var o=Matrix.create([[t,0,0],[0,n,0],[0,0,1]]);return new e(this.m.multiply(o))},e.prototype.rotate=function(t){var n=Matrix.RotationZ(t);return new e(this.m.multiply(n))},e.prototype.toString=function(){var e=this.m.elements,t="";return($.browser.mozilla||$.browser.opera)&&(t="px"),"matrix("+o(e[0][0])+", "+o(e[1][0])+", "+o(e[0][1])+", "+o(e[1][1])+", "+o(e[0][2])+t+", "+o(e[1][2])+t+")"},e.prototype.elements=function(){var e=this.m.elements;return{a:e[0][0],b:e[1][0],c:e[0][1],d:e[1][1],e:e[0][2],f:e[1][2]}},e}(),$.zoomooz||($.zoomooz={}),$.zoomooz.helpers=function(e,t){"use strict";var n=["-moz-","-webkit-","-o-","-ms-"];return t.forEachPrefix=function(e,t){for(var o=0;o<n.length;o++)e(n[o]);t&&e("")},t.getElementTransform=function(n){var o;return t.forEachPrefix(function(t){o=o||e(n).css(t+"transform")},!0),o},t}(jQuery,{}),function(e){"use strict";function t(e,t,n){var o={};if(z.forEachPrefix(function(t){o[t+"transform"]=e},!0),t){var r=d(t/1e3,6)+"s";o["-webkit-transition-duration"]=r,o["-o-transition-duration"]=r,o["-moz-transition-duration"]=r}if(n){var a=i(n);o["-webkit-transition-timing-function"]=a,o["-o-transition-timing-function"]=a,o["-moz-transition-timing-function"]=a}return o}function n(e,t,n,a,i,l){t||(t=r(new PureCSSMatrix)),p=(new Date).getTime(),v&&(clearInterval(v),v=null),a.easing&&(a.easingfunction=s(a.easing,a.duration)),o(e,t,n,a,i),l&&l(),v=setInterval(function(){o(e,t,n,a,i)},1)}function o(e,n,o,r,i){var s,l=(new Date).getTime()-p;s=r.easingfunction?r.easingfunction(l/r.duration):l/r.duration,e.css(t(a(m(n,o,s)))),l>r.duration&&(clearInterval(v),v=null,s=1,i&&i())}function r(e){var t=e.elements(),n=t.a,o=t.b,r=t.c,a=t.d,i=t.e,s=t.f;if(!(Math.abs(n*a-o*r)<.001)){var l=i,u=s,c=Math.sqrt(n*n+o*o),f=(n/=c)*r+(o/=c)*a;r-=n*f,a-=o*f;var m=Math.sqrt(r*r+a*a);return f/=m,n*(a/=m)-o*(r/=m)<0&&(n=-n,o=-o,r=-r,a=-a,c=-c,m=-m),{tx:l,ty:u,r:Math.atan2(o,n),k:Math.atan(f),sx:c,sy:m}}console.log("fail!")}function a(e){var t="";return t+="translate("+d(e.tx,6)+"px,"+d(e.ty,6)+"px) ",t+="rotate("+d(e.r,6)+"rad) skewX("+d(e.k,6)+"rad) ",t+="scale("+d(e.sx,6)+","+d(e.sy,6)+")"}function i(e){return e instanceof Array?"cubic-bezier("+d(e[0],6)+","+d(e[1],6)+","+d(e[2],6)+","+d(e[3],6)+")":e}function s(e,t){var n=[];if(e instanceof Array)n=e;else switch(e){case"linear":n=[0,0,1,1];break;case"ease":n=[.25,.1,.25,1];break;case"ease-in":n=[.42,0,1,1];break;case"ease-out":n=[0,0,.58,1];break;case"ease-in-out":n=[.42,0,.58,1]}return function(e){return l(e,n[0],n[1],n[2],n[3],t)}}function l(e,t,n,o,r,a){function i(e){return((c*e+f)*e+m)*e}function s(e){return((d*e+h)*e+p)*e}function l(e){return(3*c*e+2*f)*e+m}function u(e,t){function n(e){return e>=0?e:0-e}var o,r,a,s,u,c;for(a=e,c=0;c<8;c++){if(s=i(a)-e,n(s)<t)return a;if(u=l(a),n(u)<1e-6)break;a-=s/u}if(o=0,r=1,(a=e)<o)return o;if(a>r)return r;for(;o<r;){if(s=i(a),n(s-e)<t)return a;e>s?o=a:r=a,a=.5*(r-o)+o}return a}var c=0,f=0,m=0,d=0,h=0,p=0;return m=3*t,f=3*(o-t)-m,c=1-m-f,p=3*n,h=3*(r-n)-p,d=1-p-h,function(e,t){return s(u(e,t))}(e,1/(200*a))}function u(e,t){var n,o=z.getElementTransform(e);n=o?new PureCSSMatrix(o):new PureCSSMatrix,t&&(n=n.translate(t.x,t.y));var a=r(n);return a.r=c(o),a}function c(e){for(var t,n=0;null!==(t=y.exec(e));){var o=t[1].toLowerCase(),a=t[2].split(",");if("matrix"==o){var i=o+"("+t[2]+")";n+=r(new PureCSSMatrix(i)).r}else if("rotate"==o){var s=a[0],l=parseFloat(h(s));s.match(b)&&(l=2*Math.PI*l/360),n+=l}}return n}function f(e,t){if(Math.abs(e.r-t.r)>Math.PI)if(t.r<e.r)for(;Math.abs(e.r-t.r)>Math.PI;)t.r+=2*Math.PI;else for(;Math.abs(e.r-t.r)>Math.PI;)t.r-=2*Math.PI;return t}function m(e,t,n){var o={};for(var r in e)e.hasOwnProperty(r)&&(o[r]=e[r]+(t[r]-e[r])*n);return o}function d(e,t){t=Math.abs(parseInt(t,10))||0;var n=Math.pow(10,t);return Math.round(e*n)/n}function h(e){return e.match(x)}var p,v,g,x=/([0-9.\-e]+)/g,y=/([a-z]+)\(([^\)]+)\)/g,b=/deg$/,z=e.zoomooz.helpers,w={duration:450,easing:"ease",nativeanimation:!1};jQuery.cssHooks.MsTransform={set:function(e,t){e.style.msTransform=t}},jQuery.cssHooks.MsTransformOrigin={set:function(e,t){e.style.msTransformOrigin=t}},e.fn.animateTransformation=function(o,i,s,l,c){i=jQuery.extend({},w,i),g&&(clearTimeout(g),g=null),i.nativeanimation&&l&&(g=setTimeout(l,i.duration)),this.each(function(){var m=e(this);o||(o=new PureCSSMatrix);var d=u(m,s),h=f(d,r(o));i.nativeanimation?(m.css(t(a(h),i.duration,i.easing)),c&&c()):n(m,d,h,i,l,c)})},e.fn.setTransformation=function(n){this.each(function(){var o=e(this),i=f(u(o),r(n));o.css(t(a(i)))})}}(jQuery),function(e){"use strict";function t(t,n){var o=jQuery.extend({},n);e.zoomooz.defaultSettings||e.zoomooz.setup();var r,a=e.zoomooz.defaultSettings,i=jQuery.extend({},o);for(r in a)a.hasOwnProperty(r)&&!i[r]&&(i[r]=t.data(r));for(var s=0;s<p.length;s++)i[r=p[s]]||(i[r]=t.data(r));return jQuery.extend({},a,i)}function n(){var t={targetsize:.9,scalemode:"both",root:e(document.body),debug:!1,animationendcallback:null,closeclick:!1},n=void 0!==window.mozInnerScreenX;return t.scrollresetbeforezoom=n,t}function o(t,n){var o,l=n.scrollresetbeforezoom,u=null;!function(){var e=n.root,i=e.parent();t[0]===e[0]?u=r(e,i):e.data("original-scroll")?l||(u=r(e,i)):(o=!0,u=a(e,i,l))}();var c,m=null;i(n.root);var d=null;if(t[0]!==n.root[0]){var h=f(t,n.root).inverse();l||(d=u),c=s(t,h,d,n),n.animationendcallback&&(m=function(){n.animationendcallback.call(t[0])})}else l&&(c=(new PureCSSMatrix).translate(-u.x,-u.y)),m=function(){var o=e(n.root),r=u.elem;r.removeClass("noScroll"),o.setTransformation(new PureCSSMatrix),o.data("original-scroll",null),e(document).off("touchmove"),l&&(r[0]==document.body||r[0]==window?window.scrollTo(u.x,u.y):(r.scrollLeft(u.x),r.scrollTop(u.y))),n.animationendcallback&&n.animationendcallback.call(t[0])};var p=null;l&&u&&u.animationstartedcallback&&(p=u.animationstartedcallback),o||(d=!1),e(n.root).animateTransformation(c,n,d,m,p)}function r(e,t){var n=e.data("original-scroll");return n||(n={elem:t,x:0,"y:":0}),n}function a(t,n,o){var r=t.scrollTop(),a=t.scrollLeft(),i=t;r||(r=n.scrollTop(),a=n.scrollLeft(),i=n);var s={elem:i,x:a,y:r};t.data("original-scroll",s),e(document).on("touchmove",function(e){e.preventDefault()});var l="translate(-"+a+"px,-"+r+"px)";return h.forEachPrefix(function(e){t.css(e+"transform",l)}),i.addClass("noScroll"),o&&(s.animationstartedcallback=function(){i[0]==document.body||i[0]==document?window.scrollTo(0,0):(i.scrollLeft(0),i.scrollTop(0))}),s}function i(t){var n=e(t).parent(),o=n.width(),r=n.height()/2,a=m(o/2)+"px "+m(r)+"px";h.forEachPrefix(function(e){t.css(e+"transform-origin",a)})}function s(t,n,o,r){var a,i=r.targetsize,s=r.scalemode,l=r.root,u=e(l).parent(),c=u.width(),f=u.height(),m=c/t.outerWidth(),d=f/t.outerHeight();if("width"==s)a=i*m;else if("height"==s)a=i*d;else if("both"==s)a=i*Math.min(m,d);else{if("scale"!=s)return void console.log("wrong zoommode");a=i}var h=(c-t.outerWidth()*a)/2,p=(f-t.outerHeight()*a)/2,v=c/2,g=f/2,x=-parseFloat(l.css("margin-left"))||0,y=-parseFloat(l.css("margin-top"))||0,b=new PureCSSMatrix;return o&&(b=b.translate(o.x,o.y)),b.translate(x,y).translate(-v,-g).translate(h,p).scale(a,a).multiply(n).translate(v,g)}function l(e,t,n){return[e.a*t+e.c*n+e.e,e.b*t+e.d*n+e.f]}function u(e,t){var n=f(e,t.root).elements();c(l(n,0,0)),c(l(n,0,e.outerHeight())),c(l(n,e.outerWidth(),e.outerHeight())),c(l(n,e.outerWidth(),0))}function c(t){var n="width:4px;height:4px;background-color:red;position:absolute;margin-left:-2px;margin-top:-2px;",o='<div class="debuglabel" style="'+(n+="left:"+t[0]+"px;top:"+t[1]+"px;")+'"></div>';e("#debug").append(o)}function f(t,n){var o=t[0];if(!o||!o.ownerDocument)return null;var r,a=new PureCSSMatrix;if(o===o.ownerDocument.body){var i=jQuery.offset.bodyOffset(o);return r=new PureCSSMatrix,r=r.translate(i.left,i.top),a=a.multiply(r)}var s;jQuery.offset.initialize?(jQuery.offset.initialize(),s={fixedPosition:jQuery.offset.supportsFixedPosition,doesNotAddBorder:jQuery.offset.doesNotAddBorder,doesAddBorderForTableAndCells:jQuery.support.doesAddBorderForTableAndCells,subtractsBorderForOverflowNotVisible:jQuery.offset.subtractsBorderForOverflowNotVisible}):s=jQuery.support;var l,u,c=o.offsetParent,f=o.ownerDocument,m=f.documentElement,h=f.body,p=n[0],v=f.defaultView;u=v?v.getComputedStyle(o,null):o.currentStyle;var g=o.offsetTop,x=o.offsetLeft,y=d().translate(x,g);for(a=(y=y.multiply(d(o))).multiply(a);(o=o.parentNode)&&o!==p&&(g=0,x=0,!s.fixedPosition||"fixed"!==u.position);)l=v?v.getComputedStyle(o,null):o.currentStyle,g-=o.scrollTop,x-=o.scrollLeft,o===c&&(g+=o.offsetTop,x+=o.offsetLeft,!s.doesNotAddBorder||s.doesAddBorderForTableAndCells&&/^t(able|d|h)$/i.test(o.nodeName)||(g+=parseFloat(l.borderTopWidth)||0,x+=parseFloat(l.borderLeftWidth)||0),c=o.offsetParent),s.subtractsBorderForOverflowNotVisible&&"visible"!==l.overflow&&(g+=parseFloat(l.borderTopWidth)||0,x+=parseFloat(l.borderLeftWidth)||0),u=l,o.offsetParent==p&&(g-=parseFloat(e(o.offsetParent).css("margin-top"))||0,x-=parseFloat(e(o.offsetParent).css("margin-left"))||0),a=(y=(y=d().translate(x,g)).multiply(d(o))).multiply(a);g=0,x=0,"relative"!==u.position&&"static"!==u.position||(g+=h.offsetTop,x+=h.offsetLeft),s.fixedPosition&&"fixed"===u.position&&(g+=Math.max(m.scrollTop,h.scrollTop),x+=Math.max(m.scrollLeft,h.scrollLeft));var b=(new PureCSSMatrix).translate(x,g);return a=a.multiply(b)}function m(e){return Number(e).toFixed(6)}function d(e){var t=h.getElementTransform(e);return t?new PureCSSMatrix(t):new PureCSSMatrix}var h=e.zoomooz.helpers,p=["duration","easing","nativeanimation"];!function(){var t=document.createElement("style");t.type="text/css";var n="";h.forEachPrefix(function(e){n+=e+"transform-origin: 0 0;"},!0),t.innerHTML="html {height:100%;}.noScroll{overflow:hidden !important;}* {"+n+"}",document.getElementsByTagName("head")[0].appendChild(t),e(document).ready(function(){var n=window.innerWidth-e("body").width();t.innerHTML+="body.noScroll,html.noScroll body{margin-right:"+n+"px;}"})}(),e.zoomooz||(e.zoomooz={}),e.zoomooz.setup=function(t){e.zoomooz.defaultSettings=jQuery.extend(n(),t)},e.fn.zoomSettings=function(n){var o;return this.each(function(){var r=e(this);o=t(r,n)}),o},e.fn.zoomTo=function(t,n){return this.each(function(){var r=e(this);n||(t=r.zoomSettings(t)),o(r,t),t.debug?(0===e("#debug").length?e(t.root).append('<div id="debug"><div>'):e("#debug").html(""),u(r,t)):0!==e("#debug").length&&e("#debug").html("")}),this}}(jQuery),function(e){"use strict";function t(n,o,r){n.addClass("zoomTarget"),r.animationendcallback||(r.closeclick?r.animationendcallback=function(){e(".selectedZoomTarget").removeClass("selectedZoomTarget zoomNotClickable"),n.addClass("selectedZoomTarget")}:r.animationendcallback=function(){e(".selectedZoomTarget").removeClass("selectedZoomTarget zoomNotClickable"),n.addClass("selectedZoomTarget zoomNotClickable")});var a=o.closest(".zoomContainer");0!==a.length&&(r.root=a);var i=r.root;if(!i.hasClass("zoomTarget")){var s=i.zoomSettings({});s.animationendcallback=function(){var t=e(this);e(".selectedZoomTarget").removeClass("selectedZoomTarget zoomNotClickable"),t.addClass("selectedZoomTarget zoomNotClickable"),t.parent().addClass("selectedZoomTarget zoomNotClickable")},t(i,i,s),t(i.parent(),i,s),i.click()}n.on("click",function(e){r.closeclick&&o.hasClass("selectedZoomTarget")?r.root.click():o.zoomTo(r),e.stopPropagation()})}e.zoomooz||(e.zoomooz={});var n=e.zoomooz.helpers;e.fn.zoomTarget=function(n){this.each(function(){var o=e(this).zoomSettings(n);t(e(this),e(this),o)})},function(){function e(e){var t="-webkit-touch-callout: "+(e?"default":"none")+";";return n.forEachPrefix(function(n){t+=n+"user-select:"+(e?"text":"none")+";"},!0),t}var t=document.createElement("style");t.type="text/css",t.innerHTML=".zoomTarget{"+e(!1)+"}.zoomTarget:hover{cursor:pointer!important;}.zoomNotClickable{"+e(!0)+"}.zoomNotClickable:hover{cursor:auto!important;}.zoomContainer{position:relative;padding:1px;margin:-1px;}",document.getElementsByTagName("head")[0].appendChild(t)}(),e(document).ready(function(){e(".zoomTarget").zoomTarget()})}(jQuery),function(e){"use strict";e.zoomooz||(e.zoomooz={}),e.fn.zoomContainer=function(e){},e(document).ready(function(){e(".zoomContainer").zoomContainer()})}(jQuery),function(e){function t(t,o){var r=n(),a=jQuery.extend({},o);for(var i in r)r.hasOwnProperty(i)&&!a[i]&&(r[i]instanceof jQuery?a[i]=e(t.data(i)):a[i]=t.data(i));return jQuery.extend({},r,a)}function n(){return{type:"next",root:e(document.body),wrap:"true"}}function o(e,t){e.addClass("zoomButton");var n;n=t.root.hasClass("zoomContainer")?t.root:t.root.find(".zoomContainer");var o=function(){function e(e){return t.indexOf(e)}var t=jQuery.makeArray(n.find(".zoomTarget"));return{next:function(n){var o=e(n)+1;return o<t.length&&0!==o?t[o]:null},prev:function(n){var o=e(n)-1;return o<0?null:t[o]},last:function(){return t[t.length-1]},first:function(){return t[0]}}}();e.on("click",function(e){var r,a=!0,i=n.find(".selectedZoomTarget");switch(0===i.length&&(i=o.first()),t.type){case"close":r=n;break;case"prev":null===(r=o.prev(i[0]))&&(t.wrap?r=o.last():a=!1);break;case"next":default:null===(r=o.next(i[0]))&&(t.wrap?r=o.first():a=!1)}a&&r.click(),e.stopPropagation()})}e.zoomooz||(e.zoomooz={}),e.zoomooz.helpers,e.fn.zoomButton=function(n){this.each(function(){var r=t(e(this),n);o(e(this),r)})},e(document).ready(function(){e(".zoomButton").zoomButton()})}(jQuery);