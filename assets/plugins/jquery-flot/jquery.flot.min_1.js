/* Javascript plotting library for jQuery, version 0.8.0-beta.

Copyright (c) 2007-2013 IOLA and Ole Laursen.
Licensed under the MIT license.

*/

// first an inline dependency, jquery.colorhelpers.js, we inline it here
// for convenience

/* Plugin for jQuery for working with colors.
 *
 * Version 1.1.
 *
 * Inspiration from jQuery color animation plugin by John Resig.
 *
 * Released under the MIT license by Ole Laursen, October 2009.
 *
 * Examples:
 *
 *   $.color.parse("#fff").scale('rgb', 0.25).add('a', -0.5).toString()
 *   var c = $.color.extract($("#mydiv"), 'background-color');
 *   console.log(c.r, c.g, c.b, c.a);
 *   $.color.make(100, 50, 25, 0.4).toString() // returns "rgba(100,50,25,0.4)"
 *
 * Note that .scale() and .add() return the same modified object
 * instead of making a new one.
 *
 * V. 1.1: Fix error handling so e.g. parsing an empty string does
 * produce a color rather than just crashing.
 */
(function(B){B.color={};B.color.make=function(F,E,C,D){var G={};G.r=F||0;G.g=E||0;G.b=C||0;G.a=D!=null?D:1;G.add=function(J,I){for(var H=0;H<J.length;++H){G[J.charAt(H)]+=I}return G.normalize()};G.scale=function(J,I){for(var H=0;H<J.length;++H){G[J.charAt(H)]*=I}return G.normalize()};G.toString=function(){if(G.a>=1){return"rgb("+[G.r,G.g,G.b].join(",")+")"}else{return"rgba("+[G.r,G.g,G.b,G.a].join(",")+")"}};G.normalize=function(){function H(J,K,I){return K<J?J:(K>I?I:K)}G.r=H(0,parseInt(G.r),255);G.g=H(0,parseInt(G.g),255);G.b=H(0,parseInt(G.b),255);G.a=H(0,G.a,1);return G};G.clone=function(){return B.color.make(G.r,G.b,G.g,G.a)};return G.normalize()};B.color.extract=function(D,C){var E;do{E=D.css(C).toLowerCase();if(E!=""&&E!="transparent"){break}D=D.parent()}while(!B.nodeName(D.get(0),"body"));if(E=="rgba(0, 0, 0, 0)"){E="transparent"}return B.color.parse(E)};B.color.parse=function(F){var E,C=B.color.make;if(E=/rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(F)){return C(parseInt(E[1],10),parseInt(E[2],10),parseInt(E[3],10))}if(E=/rgba\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]+(?:\.[0-9]+)?)\s*\)/.exec(F)){return C(parseInt(E[1],10),parseInt(E[2],10),parseInt(E[3],10),parseFloat(E[4]))}if(E=/rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(F)){return C(parseFloat(E[1])*2.55,parseFloat(E[2])*2.55,parseFloat(E[3])*2.55)}if(E=/rgba\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\s*\)/.exec(F)){return C(parseFloat(E[1])*2.55,parseFloat(E[2])*2.55,parseFloat(E[3])*2.55,parseFloat(E[4]))}if(E=/#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(F)){return C(parseInt(E[1],16),parseInt(E[2],16),parseInt(E[3],16))}if(E=/#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(F)){return C(parseInt(E[1]+E[1],16),parseInt(E[2]+E[2],16),parseInt(E[3]+E[3],16))}var D=B.trim(F).toLowerCase();if(D=="transparent"){return C(255,255,255,0)}else{E=A[D]||[0,0,0];return C(E[0],E[1],E[2])}};var A={aqua:[0,255,255],azure:[240,255,255],beige:[245,245,220],black:[0,0,0],blue:[0,0,255],brown:[165,42,42],cyan:[0,255,255],darkblue:[0,0,139],darkcyan:[0,139,139],darkgrey:[169,169,169],darkgreen:[0,100,0],darkkhaki:[189,183,107],darkmagenta:[139,0,139],darkolivegreen:[85,107,47],darkorange:[255,140,0],darkorchid:[153,50,204],darkred:[139,0,0],darksalmon:[233,150,122],darkviolet:[148,0,211],fuchsia:[255,0,255],gold:[255,215,0],green:[0,128,0],indigo:[75,0,130],khaki:[240,230,140],lightblue:[173,216,230],lightcyan:[224,255,255],lightgreen:[144,238,144],lightgrey:[211,211,211],lightpink:[255,182,193],lightyellow:[255,255,224],lime:[0,255,0],magenta:[255,0,255],maroon:[128,0,0],navy:[0,0,128],olive:[128,128,0],orange:[255,165,0],pink:[255,192,203],purple:[128,0,128],violet:[128,0,128],red:[255,0,0],silver:[192,192,192],white:[255,255,255],yellow:[255,255,0]}})(jQuery);
(function(a){function c(b,c){var d=c.children("."+b)[0];if(null==d&&(d=document.createElement("canvas"),d.className=b,a(d).css({direction:"ltr",position:"absolute",left:0,top:0}).appendTo(c),!d.getContext)){if(!window.G_vmlCanvasManager)throw Error("Canvas is not available. If you're using IE with a fall-back such as Excanvas, then there's either a mistake in your conditional include, or the page has no DOCTYPE and is rendering in Quirks Mode.");d=window.G_vmlCanvasManager.initElement(d)}this.element=d;var e=this.context=d.getContext("2d"),f=window.devicePixelRatio||1,g=e.webkitBackingStorePixelRatio||e.mozBackingStorePixelRatio||e.msBackingStorePixelRatio||e.oBackingStorePixelRatio||e.backingStorePixelRatio||1;this.pixelRatio=f/g,this.resize(c.width(),c.height()),this.text={},this._textCache={}}function d(b,d,f,g){function v(a,b){b=[u].concat(b);for(var c=0;a.length>c;++c)a[c].apply(this,b)}function w(){for(var b={Canvas:c},d=0;g.length>d;++d){var e=g[d];e.init(u,b),e.options&&a.extend(!0,i,e.options)}}function x(c){a.extend(!0,i,c),null==i.xaxis.color&&(i.xaxis.color=""+a.color.parse(i.grid.color).scale("a",.22)),null==i.yaxis.color&&(i.yaxis.color=""+a.color.parse(i.grid.color).scale("a",.22)),null==i.xaxis.tickColor&&(i.xaxis.tickColor=i.grid.tickColor||i.xaxis.color),null==i.yaxis.tickColor&&(i.yaxis.tickColor=i.grid.tickColor||i.yaxis.color),null==i.grid.borderColor&&(i.grid.borderColor=i.grid.color),null==i.grid.tickColor&&(i.grid.tickColor=""+a.color.parse(i.grid.color).scale("a",.22));var d,e,f,g={style:b.css("font-style"),size:Math.round(.8*(+b.css("font-size").replace("px","")||13)),variant:b.css("font-variant"),weight:b.css("font-weight"),family:b.css("font-family")};for(f=i.xaxes.length||1,d=0;f>d;++d)e=a.extend(!0,{},i.xaxis,i.xaxes[d]),i.xaxes[d]=e,e.font&&(e.font=a.extend({},g,e.font),e.font.color||(e.font.color=e.color));for(f=i.yaxes.length||1,d=0;f>d;++d)e=a.extend(!0,{},i.yaxis,i.yaxes[d]),i.yaxes[d]=e,e.font&&(e.font=a.extend({},g,e.font),e.font.color||(e.font.color=e.color));for(i.xaxis.noTicks&&null==i.xaxis.ticks&&(i.xaxis.ticks=i.xaxis.noTicks),i.yaxis.noTicks&&null==i.yaxis.ticks&&(i.yaxis.ticks=i.yaxis.noTicks),i.x2axis&&(i.xaxes[1]=a.extend(!0,{},i.xaxis,i.x2axis),i.xaxes[1].position="top"),i.y2axis&&(i.yaxes[1]=a.extend(!0,{},i.yaxis,i.y2axis),i.yaxes[1].position="right"),i.grid.coloredAreas&&(i.grid.markings=i.grid.coloredAreas),i.grid.coloredAreasColor&&(i.grid.markingsColor=i.grid.coloredAreasColor),i.lines&&a.extend(!0,i.series.lines,i.lines),i.points&&a.extend(!0,i.series.points,i.points),i.bars&&a.extend(!0,i.series.bars,i.bars),null!=i.shadowSize&&(i.series.shadowSize=i.shadowSize),null!=i.highlightColor&&(i.series.highlightColor=i.highlightColor),d=0;i.xaxes.length>d;++d)E(o,d+1).options=i.xaxes[d];for(d=0;i.yaxes.length>d;++d)E(p,d+1).options=i.yaxes[d];for(var h in t)i.hooks[h]&&i.hooks[h].length&&(t[h]=t[h].concat(i.hooks[h]));v(t.processOptions,[i])}function y(a){h=z(a),F(),G()}function z(b){for(var c=[],d=0;b.length>d;++d){var e=a.extend(!0,{},i.series);null!=b[d].data?(e.data=b[d].data,delete b[d].data,a.extend(!0,e,b[d]),b[d].data=e.data):e.data=b[d],c.push(e)}return c}function A(a,b){var c=a[b+"axis"];return"object"==typeof c&&(c=c.n),"number"!=typeof c&&(c=1),c}function B(){return a.grep(o.concat(p),function(a){return a})}function C(a){var c,d,b={};for(c=0;o.length>c;++c)d=o[c],d&&d.used&&(b["x"+d.n]=d.c2p(a.left));for(c=0;p.length>c;++c)d=p[c],d&&d.used&&(b["y"+d.n]=d.c2p(a.top));return void 0!==b.x1&&(b.x=b.x1),void 0!==b.y1&&(b.y=b.y1),b}function D(a){var c,d,e,b={};for(c=0;o.length>c;++c)if(d=o[c],d&&d.used&&(e="x"+d.n,null==a[e]&&1==d.n&&(e="x"),null!=a[e])){b.left=d.p2c(a[e]);break}for(c=0;p.length>c;++c)if(d=p[c],d&&d.used&&(e="y"+d.n,null==a[e]&&1==d.n&&(e="y"),null!=a[e])){b.top=d.p2c(a[e]);break}return b}function E(b,c){return b[c-1]||(b[c-1]={n:c,direction:b==o?"x":"y",options:a.extend(!0,{},b==o?i.xaxis:i.yaxis)}),b[c-1]}function F(){var d,b=h.length,c=-1;for(d=0;h.length>d;++d){var e=h[d].color;null!=e&&(b--,"number"==typeof e&&e>c&&(c=e))}c>=b&&(b=c+1);var f,g=[],j=i.colors,k=j.length,l=0;for(d=0;b>d;d++)f=a.color.parse(j[d%k]||"#666"),0==d%k&&d&&(l=l>=0?.5>l?-l-.2:0:-l),g[d]=f.scale("rgb",1+l);var n,m=0;for(d=0;h.length>d;++d){if(n=h[d],null==n.color?(n.color=""+g[m],++m):"number"==typeof n.color&&(n.color=""+g[n.color]),null==n.lines.show){var q,r=!0;for(q in n)if(n[q]&&n[q].show){r=!1;break}r&&(n.lines.show=!0)}null==n.lines.zero&&(n.lines.zero=!!n.lines.fill),n.xaxis=E(o,A(n,"x")),n.yaxis=E(p,A(n,"y"))}}function G(){function x(a,b,c){a.datamin>b&&b!=-d&&(a.datamin=b),c>a.datamax&&c!=d&&(a.datamax=c)}var e,f,g,i,k,l,m,q,r,s,u,w,b=Number.POSITIVE_INFINITY,c=Number.NEGATIVE_INFINITY,d=Number.MAX_VALUE;for(a.each(B(),function(a,d){d.datamin=b,d.datamax=c,d.used=!1}),e=0;h.length>e;++e)k=h[e],k.datapoints={points:[]},v(t.processRawData,[k,k.data,k.datapoints]);for(e=0;h.length>e;++e){if(k=h[e],u=k.data,w=k.datapoints.format,!w){if(w=[],w.push({x:!0,number:!0,required:!0}),w.push({y:!0,number:!0,required:!0}),k.bars.show||k.lines.show&&k.lines.fill){var y=!!(k.bars.show&&k.bars.zero||k.lines.show&&k.lines.zero);w.push({y:!0,number:!0,required:!1,defaultValue:0,autoscale:y}),k.bars.horizontal&&(delete w[w.length-1].y,w[w.length-1].x=!0)}k.datapoints.format=w}if(null==k.datapoints.pointsize){k.datapoints.pointsize=w.length,m=k.datapoints.pointsize,l=k.datapoints.points;var z=k.lines.show&&k.lines.steps;for(k.xaxis.used=k.yaxis.used=!0,f=g=0;u.length>f;++f,g+=m){s=u[f];var A=null==s;if(!A)for(i=0;m>i;++i)q=s[i],r=w[i],r&&(r.number&&null!=q&&(q=+q,isNaN(q)?q=null:1/0==q?q=d:q==-1/0&&(q=-d)),null==q&&(r.required&&(A=!0),null!=r.defaultValue&&(q=r.defaultValue))),l[g+i]=q;if(A)for(i=0;m>i;++i)q=l[g+i],null!=q&&(r=w[i],r.x&&x(k.xaxis,q,q),r.y&&x(k.yaxis,q,q)),l[g+i]=null;else if(z&&g>0&&null!=l[g-m]&&l[g-m]!=l[g]&&l[g-m+1]!=l[g+1]){for(i=0;m>i;++i)l[g+m+i]=l[g+i];l[g+1]=l[g-m+1],g+=m}}}}for(e=0;h.length>e;++e)k=h[e],v(t.processDatapoints,[k,k.datapoints]);for(e=0;h.length>e;++e){k=h[e],l=k.datapoints.points,m=k.datapoints.pointsize,w=k.datapoints.format;var C=b,D=b,E=c,F=c;for(f=0;l.length>f;f+=m)if(null!=l[f])for(i=0;m>i;++i)q=l[f+i],r=w[i],r&&r.autoscale!==!1&&q!=d&&q!=-d&&(r.x&&(C>q&&(C=q),q>E&&(E=q)),r.y&&(D>q&&(D=q),q>F&&(F=q)));if(k.bars.show){var G;switch(k.bars.align){case"left":G=0;break;case"right":G=-k.bars.barWidth;break;case"center":G=-k.bars.barWidth/2;break;default:throw Error("Invalid bar alignment: "+k.bars.align)}k.bars.horizontal?(D+=G,F+=G+k.bars.barWidth):(C+=G,E+=G+k.bars.barWidth)}x(k.xaxis,C,E),x(k.yaxis,D,F)}a.each(B(),function(a,d){d.datamin==b&&(d.datamin=null),d.datamax==c&&(d.datamax=null)})}function H(){b.css("padding",0).children(":not(.flot-base,.flot-overlay)").remove(),"static"==b.css("position")&&b.css("position","relative"),j=new c("flot-base",b),k=new c("flot-overlay",b),m=j.context,n=k.context,l=a(k.element).unbind();var d=b.data("plot");d&&(d.shutdown(),k.clear()),b.data("plot",u)}function I(){i.grid.hoverable&&(l.mousemove(hb),l.bind("mouseleave",ib)),i.grid.clickable&&l.click(jb),v(t.bindEvents,[l])}function J(){fb&&clearTimeout(fb),l.unbind("mousemove",hb),l.unbind("mouseleave",ib),l.unbind("click",jb),v(t.shutdown,[l])}function K(a){function b(a){return a}var c,d,e=a.options.transform||b,f=a.options.inverseTransform;"x"==a.direction?(c=a.scale=r/Math.abs(e(a.max)-e(a.min)),d=Math.min(e(a.max),e(a.min))):(c=a.scale=s/Math.abs(e(a.max)-e(a.min)),c=-c,d=Math.max(e(a.max),e(a.min))),a.p2c=e==b?function(a){return(a-d)*c}:function(a){return(e(a)-d)*c},a.c2p=f?function(a){return f(d+a/c)}:function(a){return d+a/c}}function L(a){for(var b=a.options,c=a.ticks||[],d=b.labelWidth||0,e=b.labelHeight||0,f=a.direction+"Axis "+a.direction+a.n+"Axis",g="flot-"+a.direction+"-axis flot-"+a.direction+a.n+"-axis "+f,h=b.font||"flot-tick-label tickLabel",i=0;c.length>i;++i){var k=c[i];if(k.label){var l=j.getTextInfo(g,k.label,h);null==b.labelWidth&&(d=Math.max(d,l.width)),null==b.labelHeight&&(e=Math.max(e,l.height))}}a.labelWidth=Math.ceil(d),a.labelHeight=Math.ceil(e)}function M(b){var m,c=b.labelWidth,d=b.labelHeight,e=b.options.position,f=b.options.tickLength,g=i.grid.axisMargin,h=i.grid.labelMargin,k="x"==b.direction?o:p,n=a.grep(k,function(a){return a&&a.options.position==e&&a.reserveSpace});if(a.inArray(b,n)==n.length-1&&(g=0),null==f){var r=a.grep(k,function(a){return a&&a.reserveSpace});m=0==a.inArray(b,r),f=m?"full":5}isNaN(+f)||(h+=+f),"x"==b.direction?(d+=h,"bottom"==e?(q.bottom+=d+g,b.box={top:j.height-q.bottom,height:d}):(b.box={top:q.top+g,height:d},q.top+=d+g)):(c+=h,"left"==e?(b.box={left:q.left+g,width:c},q.left+=c+g):(q.right+=c+g,b.box={left:j.width-q.right,width:c})),b.position=e,b.tickLength=f,b.box.padding=h,b.innermost=m}function N(a){"x"==a.direction?(a.box.left=q.left-a.labelWidth/2,a.box.width=j.width-q.left-q.right+a.labelWidth):(a.box.top=q.top-a.labelHeight/2,a.box.height=j.height-q.bottom-q.top+a.labelHeight)}function O(){var d,b=i.grid.minBorderMargin,c={x:0,y:0};if(null==b)for(b=0,d=0;h.length>d;++d)b=Math.max(b,2*(h[d].points.radius+h[d].points.lineWidth/2));c.x=c.y=Math.ceil(b),a.each(B(),function(a,b){var d=b.direction;b.reserveSpace&&(c[d]=Math.ceil(Math.max(c[d],("x"==d?b.labelWidth:b.labelHeight)/2)))}),q.left=Math.max(c.x,q.left),q.right=Math.max(c.x,q.right),q.top=Math.max(c.y,q.top),q.bottom=Math.max(c.y,q.bottom)}function P(){var b,c=B(),d=i.grid.show;for(var e in q){var f=i.grid.margin||0;q[e]="number"==typeof f?f:f[e]||0}v(t.processOffset,[q]);for(var e in q)q[e]+="object"==typeof i.grid.borderWidth?d?i.grid.borderWidth[e]:0:d?i.grid.borderWidth:0;if(a.each(c,function(a,b){b.show=b.options.show,null==b.show&&(b.show=b.used),b.reserveSpace=b.show||b.options.reserveSpace,Q(b)}),d){var g=a.grep(c,function(a){return a.reserveSpace});for(a.each(g,function(a,b){R(b),S(b),T(b,b.ticks),L(b)}),b=g.length-1;b>=0;--b)M(g[b]);O(),a.each(g,function(a,b){N(b)})}r=j.width-q.left-q.right,s=j.height-q.bottom-q.top,a.each(c,function(a,b){K(b)}),d&&Y(),db()}function Q(a){var b=a.options,c=+(null!=b.min?b.min:a.datamin),d=+(null!=b.max?b.max:a.datamax),e=d-c;if(0==e){var f=0==d?1:.01;null==b.min&&(c-=f),(null==b.max||null!=b.min)&&(d+=f)}else{var g=b.autoscaleMargin;null!=g&&(null==b.min&&(c-=e*g,0>c&&null!=a.datamin&&a.datamin>=0&&(c=0)),null==b.max&&(d+=e*g,d>0&&null!=a.datamax&&0>=a.datamax&&(d=0)))}a.min=c,a.max=d}function R(b){var d,c=b.options;if(d="number"==typeof c.ticks&&c.ticks>0?c.ticks:.3*Math.sqrt("x"==b.direction?j.width:j.height),b.delta=(b.max-b.min)/d,"time"==c.mode&&!b.tickGenerator)throw Error("Time mode requires the flot.time plugin.");if(b.tickGenerator||(b.tickGenerator=function(a){var b=c.tickDecimals,d=-Math.floor(Math.log(a.delta)/Math.LN10);null!=b&&d>b&&(d=b);var h,j,m,f=Math.pow(10,-d),g=a.delta/f,i=[],k=0,l=Number.NaN;1.5>g?h=1:3>g?(h=2,g>2.25&&(null==b||b>=d+1)&&(h=2.5,++d)):h=7.5>g?5:10,h*=f,null!=c.minTickSize&&c.minTickSize>h&&(h=c.minTickSize),a.tickDecimals=Math.max(0,null!=b?b:d),a.tickSize=c.tickSize||h,j=e(a.min,a.tickSize);do m=l,l=j+k*a.tickSize,i.push(l),++k;while(a.max>l&&l!=m);return i},b.tickFormatter=function(a,b){var c=b.tickDecimals?Math.pow(10,b.tickDecimals):1,d=""+Math.round(a*c)/c;if(null!=b.tickDecimals){var e=d.indexOf("."),f=-1==e?0:d.length-e-1;if(b.tickDecimals>f)return(f?d:d+".")+(""+c).substr(1,b.tickDecimals-f)}return d}),a.isFunction(c.tickFormatter)&&(b.tickFormatter=function(a,b){return""+c.tickFormatter(a,b)}),null!=c.alignTicksWithAxis){var f=("x"==b.direction?o:p)[c.alignTicksWithAxis-1];if(f&&f.used&&f!=b){var g=b.tickGenerator(b);if(g.length>0&&(null==c.min&&(b.min=Math.min(b.min,g[0])),null==c.max&&g.length>1&&(b.max=Math.max(b.max,g[g.length-1]))),b.tickGenerator=function(a){var c,d,b=[];for(d=0;f.ticks.length>d;++d)c=(f.ticks[d].v-f.min)/(f.max-f.min),c=a.min+c*(a.max-a.min),b.push(c);return b},!b.mode&&null==c.tickDecimals){var h=Math.max(0,-Math.floor(Math.log(b.delta)/Math.LN10)+1),i=b.tickGenerator(b);i.length>1&&/\..*0$/.test((i[1]-i[0]).toFixed(h))||(b.tickDecimals=h)}}}}function S(b){var c=b.options.ticks,d=[];null==c||"number"==typeof c&&c>0?d=b.tickGenerator(b):c&&(d=a.isFunction(c)?c(b):c);var e,f;for(b.ticks=[],e=0;d.length>e;++e){var g=null,h=d[e];"object"==typeof h?(f=+h[0],h.length>1&&(g=h[1])):f=+h,null==g&&(g=b.tickFormatter(f,b)),isNaN(f)||b.ticks.push({v:f,label:g})}}function T(a,b){a.options.autoscaleMargin&&b.length>0&&(null==a.options.min&&(a.min=Math.min(a.min,b[0].v)),null==a.options.max&&b.length>1&&(a.max=Math.max(a.max,b[b.length-1].v)))}function U(){j.clear(),v(t.drawBackground,[m]);var a=i.grid;a.show&&a.backgroundColor&&W(),a.show&&!a.aboveData&&X();for(var b=0;h.length>b;++b)v(t.drawSeries,[m,h[b]]),Z(h[b]);v(t.draw,[m]),a.show&&a.aboveData&&X(),j.render()}function V(a,b){for(var c,d,e,f,g=B(),h=0;g.length>h;++h)if(c=g[h],c.direction==b&&(f=b+c.n+"axis",a[f]||1!=c.n||(f=b+"axis"),a[f])){d=a[f].from,e=a[f].to;break}if(a[f]||(c="x"==b?o[0]:p[0],d=a[b+"1"],e=a[b+"2"]),null!=d&&null!=e&&d>e){var i=d;d=e,e=i}return{from:d,to:e,axis:c}}function W(){m.save(),m.translate(q.left,q.top),m.fillStyle=sb(i.grid.backgroundColor,s,0,"rgba(255, 255, 255, 0)"),m.fillRect(0,0,r,s),m.restore()}function X(){var b,c,d,e;m.save(),m.translate(q.left,q.top);var f=i.grid.markings;if(f)for(a.isFunction(f)&&(c=u.getAxes(),c.xmin=c.xaxis.min,c.xmax=c.xaxis.max,c.ymin=c.yaxis.min,c.ymax=c.yaxis.max,f=f(c)),b=0;f.length>b;++b){var g=f[b],h=V(g,"x"),j=V(g,"y");null==h.from&&(h.from=h.axis.min),null==h.to&&(h.to=h.axis.max),null==j.from&&(j.from=j.axis.min),null==j.to&&(j.to=j.axis.max),h.to<h.axis.min||h.from>h.axis.max||j.to<j.axis.min||j.from>j.axis.max||(h.from=Math.max(h.from,h.axis.min),h.to=Math.min(h.to,h.axis.max),j.from=Math.max(j.from,j.axis.min),j.to=Math.min(j.to,j.axis.max),(h.from!=h.to||j.from!=j.to)&&(h.from=h.axis.p2c(h.from),h.to=h.axis.p2c(h.to),j.from=j.axis.p2c(j.from),j.to=j.axis.p2c(j.to),h.from==h.to||j.from==j.to?(m.beginPath(),m.strokeStyle=g.color||i.grid.markingsColor,m.lineWidth=g.lineWidth||i.grid.markingsLineWidth,m.moveTo(h.from,j.from),m.lineTo(h.to,j.to),m.stroke()):(m.fillStyle=g.color||i.grid.markingsColor,m.fillRect(h.from,j.to,h.to-h.from,j.from-j.to))))}c=B(),d=i.grid.borderWidth;for(var k=0;c.length>k;++k){var p,t,v,w,l=c[k],n=l.box,o=l.tickLength;if(l.show&&0!=l.ticks.length){for(m.lineWidth=1,"x"==l.direction?(p=0,t="full"==o?"top"==l.position?0:s:n.top-q.top+("top"==l.position?n.height:0)):(t=0,p="full"==o?"left"==l.position?0:r:n.left-q.left+("left"==l.position?n.width:0)),l.innermost||(m.strokeStyle=l.options.color,m.beginPath(),v=w=0,"x"==l.direction?v=r+1:w=s+1,1==m.lineWidth&&("x"==l.direction?t=Math.floor(t)+.5:p=Math.floor(p)+.5),m.moveTo(p,t),m.lineTo(p+v,t+w),m.stroke()),m.strokeStyle=l.options.tickColor,m.beginPath(),b=0;l.ticks.length>b;++b){var x=l.ticks[b].v;v=w=0,isNaN(x)||l.min>x||x>l.max||"full"==o&&("object"==typeof d&&d[l.position]>0||d>0)&&(x==l.min||x==l.max)||("x"==l.direction?(p=l.p2c(x),w="full"==o?-s:o,"top"==l.position&&(w=-w)):(t=l.p2c(x),v="full"==o?-r:o,"left"==l.position&&(v=-v)),1==m.lineWidth&&("x"==l.direction?p=Math.floor(p)+.5:t=Math.floor(t)+.5),m.moveTo(p,t),m.lineTo(p+v,t+w))}m.stroke()}}d&&(e=i.grid.borderColor,"object"==typeof d||"object"==typeof e?("object"!=typeof d&&(d={top:d,right:d,bottom:d,left:d}),"object"!=typeof e&&(e={top:e,right:e,bottom:e,left:e}),d.top>0&&(m.strokeStyle=e.top,m.lineWidth=d.top,m.beginPath(),m.moveTo(0-d.left,0-d.top/2),m.lineTo(r,0-d.top/2),m.stroke()),d.right>0&&(m.strokeStyle=e.right,m.lineWidth=d.right,m.beginPath(),m.moveTo(r+d.right/2,0-d.top),m.lineTo(r+d.right/2,s),m.stroke()),d.bottom>0&&(m.strokeStyle=e.bottom,m.lineWidth=d.bottom,m.beginPath(),m.moveTo(r+d.right,s+d.bottom/2),m.lineTo(0,s+d.bottom/2),m.stroke()),d.left>0&&(m.strokeStyle=e.left,m.lineWidth=d.left,m.beginPath(),m.moveTo(0-d.left/2,s+d.bottom),m.lineTo(0-d.left/2,0),m.stroke())):(m.lineWidth=d,m.strokeStyle=i.grid.borderColor,m.strokeRect(-d/2,-d/2,r+d,s+d))),m.restore()}function Y(){a.each(B(),function(a,b){if(b.show&&0!=b.ticks.length){var g,h,i,k,l,c=b.box,d=b.direction+"Axis "+b.direction+b.n+"Axis",e="flot-"+b.direction+"-axis flot-"+b.direction+b.n+"-axis "+d,f=b.options.font||"flot-tick-label tickLabel";j.removeText(e);for(var m=0;b.ticks.length>m;++m)g=b.ticks[m],!g.label||g.v<b.min||g.v>b.max||("x"==b.direction?(k="center",h=q.left+b.p2c(g.v),"bottom"==b.position?i=c.top+c.padding:(i=c.top+c.height-c.padding,l="bottom")):(l="middle",i=q.top+b.p2c(g.v),"left"==b.position?(h=c.left+c.width-c.padding,k="right"):h=c.left+c.padding),j.addText(e,h,i,g.label,f,null,k,l))}})}function Z(a){a.lines.show&&$(a),a.bars.show&&bb(a),a.points.show&&_(a)}function $(a){function b(a,b,c,d,e){var f=a.points,g=a.pointsize,h=null,i=null;m.beginPath();for(var j=g;f.length>j;j+=g){var k=f[j-g],l=f[j-g+1],n=f[j],o=f[j+1];if(null!=k&&null!=n){if(o>=l&&e.min>l){if(e.min>o)continue;k=(e.min-l)/(o-l)*(n-k)+k,l=e.min}else if(l>=o&&e.min>o){if(e.min>l)continue;n=(e.min-l)/(o-l)*(n-k)+k,o=e.min}if(l>=o&&l>e.max){if(o>e.max)continue;k=(e.max-l)/(o-l)*(n-k)+k,l=e.max}else if(o>=l&&o>e.max){if(l>e.max)continue;n=(e.max-l)/(o-l)*(n-k)+k,o=e.max}if(n>=k&&d.min>k){if(d.min>n)continue;l=(d.min-k)/(n-k)*(o-l)+l,k=d.min}else if(k>=n&&d.min>n){if(d.min>k)continue;o=(d.min-k)/(n-k)*(o-l)+l,n=d.min}if(k>=n&&k>d.max){if(n>d.max)continue;l=(d.max-k)/(n-k)*(o-l)+l,k=d.max}else if(n>=k&&n>d.max){if(k>d.max)continue;o=(d.max-k)/(n-k)*(o-l)+l,n=d.max}(k!=h||l!=i)&&m.moveTo(d.p2c(k)+b,e.p2c(l)+c),h=n,i=o,m.lineTo(d.p2c(n)+b,e.p2c(o)+c)}}m.stroke()}function c(a,b,c){for(var d=a.points,e=a.pointsize,f=Math.min(Math.max(0,c.min),c.max),g=0,i=!1,j=1,k=0,l=0;;){if(e>0&&g>d.length+e)break;g+=e;var n=d[g-e],o=d[g-e+j],p=d[g],q=d[g+j];if(i){if(e>0&&null!=n&&null==p){l=g,e=-e,j=2;continue}if(0>e&&g==k+e){m.fill(),i=!1,e=-e,j=1,g=k=l+e;continue}}if(null!=n&&null!=p){if(p>=n&&b.min>n){if(b.min>p)continue;o=(b.min-n)/(p-n)*(q-o)+o,n=b.min}else if(n>=p&&b.min>p){if(b.min>n)continue;q=(b.min-n)/(p-n)*(q-o)+o,p=b.min}if(n>=p&&n>b.max){if(p>b.max)continue;o=(b.max-n)/(p-n)*(q-o)+o,n=b.max}else if(p>=n&&p>b.max){if(n>b.max)continue;q=(b.max-n)/(p-n)*(q-o)+o,p=b.max}if(i||(m.beginPath(),m.moveTo(b.p2c(n),c.p2c(f)),i=!0),o>=c.max&&q>=c.max)m.lineTo(b.p2c(n),c.p2c(c.max)),m.lineTo(b.p2c(p),c.p2c(c.max));else if(c.min>=o&&c.min>=q)m.lineTo(b.p2c(n),c.p2c(c.min)),m.lineTo(b.p2c(p),c.p2c(c.min));else{var r=n,s=p;q>=o&&c.min>o&&q>=c.min?(n=(c.min-o)/(q-o)*(p-n)+n,o=c.min):o>=q&&c.min>q&&o>=c.min&&(p=(c.min-o)/(q-o)*(p-n)+n,q=c.min),o>=q&&o>c.max&&c.max>=q?(n=(c.max-o)/(q-o)*(p-n)+n,o=c.max):q>=o&&q>c.max&&c.max>=o&&(p=(c.max-o)/(q-o)*(p-n)+n,q=c.max),n!=r&&m.lineTo(b.p2c(r),c.p2c(o)),m.lineTo(b.p2c(n),c.p2c(o)),m.lineTo(b.p2c(p),c.p2c(q)),p!=s&&(m.lineTo(b.p2c(p),c.p2c(q)),m.lineTo(b.p2c(s),c.p2c(q)))}}}}m.save(),m.translate(q.left,q.top),m.lineJoin="round";var d=a.lines.lineWidth,e=a.shadowSize;if(d>0&&e>0){m.lineWidth=e,m.strokeStyle="rgba(0,0,0,0.1)";var f=Math.PI/18;b(a.datapoints,Math.sin(f)*(d/2+e/2),Math.cos(f)*(d/2+e/2),a.xaxis,a.yaxis),m.lineWidth=e/2,b(a.datapoints,Math.sin(f)*(d/2+e/4),Math.cos(f)*(d/2+e/4),a.xaxis,a.yaxis)}m.lineWidth=d,m.strokeStyle=a.color;var g=cb(a.lines,a.color,0,s);g&&(m.fillStyle=g,c(a.datapoints,a.xaxis,a.yaxis)),d>0&&b(a.datapoints,0,0,a.xaxis,a.yaxis),m.restore()}function _(a){function b(a,b,c,d,e,f,g,h){for(var i=a.points,j=a.pointsize,k=0;i.length>k;k+=j){var l=i[k],n=i[k+1];null==l||f.min>l||l>f.max||g.min>n||n>g.max||(m.beginPath(),l=f.p2c(l),n=g.p2c(n)+d,"circle"==h?m.arc(l,n,b,0,e?Math.PI:2*Math.PI,!1):h(m,l,n,b,e),m.closePath(),c&&(m.fillStyle=c,m.fill()),m.stroke())}}m.save(),m.translate(q.left,q.top);var c=a.points.lineWidth,d=a.shadowSize,e=a.points.radius,f=a.points.symbol;if(0==c&&(c=1e-4),c>0&&d>0){var g=d/2;m.lineWidth=g,m.strokeStyle="rgba(0,0,0,0.1)",b(a.datapoints,e,null,g+g/2,!0,a.xaxis,a.yaxis,f),m.strokeStyle="rgba(0,0,0,0.2)",b(a.datapoints,e,null,g/2,!0,a.xaxis,a.yaxis,f)}m.lineWidth=c,m.strokeStyle=a.color,b(a.datapoints,e,cb(a.points,a.color),0,!1,a.xaxis,a.yaxis,f),m.restore()}function ab(a,b,c,d,e,f,g,h,i,j,k,l){var m,n,o,p,q,r,s,t,u;k?(t=r=s=!0,q=!1,m=c,n=a,p=b+d,o=b+e,m>n&&(u=n,n=m,m=u,q=!0,r=!1)):(q=r=s=!0,t=!1,m=a+d,n=a+e,o=c,p=b,o>p&&(u=p,p=o,o=u,t=!0,s=!1)),h.min>n||m>h.max||i.min>p||o>i.max||(h.min>m&&(m=h.min,q=!1),n>h.max&&(n=h.max,r=!1),i.min>o&&(o=i.min,t=!1),p>i.max&&(p=i.max,s=!1),m=h.p2c(m),o=i.p2c(o),n=h.p2c(n),p=i.p2c(p),g&&(j.beginPath(),j.moveTo(m,o),j.lineTo(m,p),j.lineTo(n,p),j.lineTo(n,o),j.fillStyle=g(o,p),j.fill()),l>0&&(q||r||s||t)&&(j.beginPath(),j.moveTo(m,o+f),q?j.lineTo(m,p+f):j.moveTo(m,p+f),s?j.lineTo(n,p+f):j.moveTo(n,p+f),r?j.lineTo(n,o+f):j.moveTo(n,o+f),t?j.lineTo(m,o+f):j.moveTo(m,o+f),j.stroke()))}function bb(a){function b(b,c,d,e,f,g,h){for(var i=b.points,j=b.pointsize,k=0;i.length>k;k+=j)null!=i[k]&&ab(i[k],i[k+1],i[k+2],c,d,e,f,g,h,m,a.bars.horizontal,a.bars.lineWidth)}m.save(),m.translate(q.left,q.top),m.lineWidth=a.bars.lineWidth,m.strokeStyle=a.color;var c;switch(a.bars.align){case"left":c=0;break;case"right":c=-a.bars.barWidth;break;case"center":c=-a.bars.barWidth/2;break;default:throw Error("Invalid bar alignment: "+a.bars.align)}var d=a.bars.fill?function(b,c){return cb(a.bars,a.color,b,c)}:null;b(a.datapoints,c,c+a.bars.barWidth,0,d,a.xaxis,a.yaxis),m.restore()}function cb(b,c,d,e){var f=b.fill;if(!f)return null;if(b.fillColor)return sb(b.fillColor,d,e,c);var g=a.color.parse(c);return g.a="number"==typeof f?f:.4,g.normalize(),""+g}function db(){if(b.find(".legend").remove(),i.legend.show){for(var g,j,c=[],d=[],e=!1,f=i.legend.labelFormatter,k=0;h.length>k;++k)g=h[k],g.label&&(j=f?f(g.label,g):g.label,j&&d.push({label:j,color:g.color}));if(i.legend.sorted)if(a.isFunction(i.legend.sorted))d.sort(i.legend.sorted);else if("reverse"==i.legend.sorted)d.reverse();else{var l="descending"!=i.legend.sorted;d.sort(function(a,b){return a.label==b.label?0:a.label<b.label!=l?1:-1})}for(var k=0;d.length>k;++k){var m=d[k];0==k%i.legend.noColumns&&(e&&c.push("</tr>"),c.push("<tr>"),e=!0),c.push('<td class="legendColorBox"><div style="border:1px solid '+i.legend.labelBoxBorderColor+';padding:1px"><div style="width:4px;height:0;border:5px solid '+m.color+';overflow:hidden"></div></div></td>'+'<td class="legendLabel">'+m.label+"</td>")}if(e&&c.push("</tr>"),0!=c.length){var n='<table style="font-size:smaller;color:'+i.grid.color+'">'+c.join("")+"</table>";if(null!=i.legend.container)a(i.legend.container).html(n);else{var o="",p=i.legend.position,r=i.legend.margin;null==r[0]&&(r=[r,r]),"n"==p.charAt(0)?o+="top:"+(r[1]+q.top)+"px;":"s"==p.charAt(0)&&(o+="bottom:"+(r[1]+q.bottom)+"px;"),"e"==p.charAt(1)?o+="right:"+(r[0]+q.right)+"px;":"w"==p.charAt(1)&&(o+="left:"+(r[0]+q.left)+"px;");var s=a('<div class="legend">'+n.replace('style="','style="position:absolute;'+o+";")+"</div>").appendTo(b);if(0!=i.legend.backgroundOpacity){var t=i.legend.backgroundColor;null==t&&(t=i.grid.backgroundColor,t=t&&"string"==typeof t?a.color.parse(t):a.color.extract(s,"background-color"),t.a=1,t=""+t);var u=s.children();a('<div style="position:absolute;width:'+u.width()+"px;height:"+u.height()+"px;"+o+"background-color:"+t+';"> </div>').prependTo(s).css("opacity",i.legend.backgroundOpacity)}}}}}function gb(a,b,c){var j,k,l,d=i.grid.mouseActiveRadius,e=d*d+1,f=null;for(j=h.length-1;j>=0;--j)if(c(h[j])){var m=h[j],n=m.xaxis,o=m.yaxis,p=m.datapoints.points,q=n.c2p(a),r=o.c2p(b),s=d/n.scale,t=d/o.scale;if(l=m.datapoints.pointsize,n.options.inverseTransform&&(s=Number.MAX_VALUE),o.options.inverseTransform&&(t=Number.MAX_VALUE),m.lines.show||m.points.show)for(k=0;p.length>k;k+=l){var u=p[k],v=p[k+1];if(null!=u&&!(u-q>s||-s>u-q||v-r>t||-t>v-r)){var w=Math.abs(n.p2c(u)-a),x=Math.abs(o.p2c(v)-b),y=w*w+x*x;e>y&&(e=y,f=[j,k/l])}}if(m.bars.show&&!f){var z="left"==m.bars.align?0:-m.bars.barWidth/2,A=z+m.bars.barWidth;for(k=0;p.length>k;k+=l){var u=p[k],v=p[k+1],B=p[k+2];null!=u&&(h[j].bars.horizontal?Math.max(B,u)>=q&&q>=Math.min(B,u)&&r>=v+z&&v+A>=r:q>=u+z&&u+A>=q&&r>=Math.min(B,v)&&Math.max(B,v)>=r)&&(f=[j,k/l])}}}return f?(j=f[0],k=f[1],l=h[j].datapoints.pointsize,{datapoint:h[j].datapoints.points.slice(k*l,(k+1)*l),dataIndex:k,series:h[j],seriesIndex:j}):null}function hb(a){i.grid.hoverable&&kb("plothover",a,function(a){return 0!=a.hoverable})}function ib(a){i.grid.hoverable&&kb("plothover",a,function(){return!1})}function jb(a){kb("plotclick",a,function(a){return 0!=a.clickable})}function kb(a,c,d){var e=l.offset(),f=c.pageX-e.left-q.left,g=c.pageY-e.top-q.top,h=C({left:f,top:g});h.pageX=c.pageX,h.pageY=c.pageY;var j=gb(f,g,d);if(j&&(j.pageX=parseInt(j.series.xaxis.p2c(j.datapoint[0])+e.left+q.left,10),j.pageY=parseInt(j.series.yaxis.p2c(j.datapoint[1])+e.top+q.top,10)),i.grid.autoHighlight){for(var k=0;eb.length>k;++k){var m=eb[k];m.auto!=a||j&&m.series==j.series&&m.point[0]==j.datapoint[0]&&m.point[1]==j.datapoint[1]||ob(m.series,m.point)}j&&nb(j.series,j.datapoint,a)}b.trigger(a,[h,j])}function lb(){var a=i.interaction.redrawOverlayInterval;return-1==a?(mb(),void 0):(fb||(fb=setTimeout(mb,a)),void 0)}function mb(){fb=null,n.save(),k.clear(),n.translate(q.left,q.top);var a,b;for(a=0;eb.length>a;++a)b=eb[a],b.series.bars.show?rb(b.series,b.point):qb(b.series,b.point);n.restore(),v(t.drawOverlay,[n])}function nb(a,b,c){if("number"==typeof a&&(a=h[a]),"number"==typeof b){var d=a.datapoints.pointsize;b=a.datapoints.points.slice(d*b,d*(b+1))}var e=pb(a,b);-1==e?(eb.push({series:a,point:b,auto:c}),lb()):c||(eb[e].auto=!1)}function ob(a,b){if(null==a&&null==b)return eb=[],lb(),void 0;if("number"==typeof a&&(a=h[a]),"number"==typeof b){var c=a.datapoints.pointsize;b=a.datapoints.points.slice(c*b,c*(b+1))}var d=pb(a,b);-1!=d&&(eb.splice(d,1),lb())}function pb(a,b){for(var c=0;eb.length>c;++c){var d=eb[c];if(d.series==a&&d.point[0]==b[0]&&d.point[1]==b[1])return c}return-1}function qb(b,c){var d=c[0],e=c[1],f=b.xaxis,g=b.yaxis,h="string"==typeof b.highlightColor?b.highlightColor:""+a.color.parse(b.color).scale("a",.5);if(!(f.min>d||d>f.max||g.min>e||e>g.max)){var i=b.points.radius+b.points.lineWidth/2;n.lineWidth=i,n.strokeStyle=h;var j=1.5*i;d=f.p2c(d),e=g.p2c(e),n.beginPath(),"circle"==b.points.symbol?n.arc(d,e,j,0,2*Math.PI,!1):b.points.symbol(n,d,e,j,!1),n.closePath(),n.stroke()}}function rb(b,c){var d="string"==typeof b.highlightColor?b.highlightColor:""+a.color.parse(b.color).scale("a",.5),e=d,f="left"==b.bars.align?0:-b.bars.barWidth/2;n.lineWidth=b.bars.lineWidth,n.strokeStyle=d,ab(c[0],c[1],c[2]||0,f,f+b.bars.barWidth,0,function(){return e},b.xaxis,b.yaxis,n,b.bars.horizontal,b.bars.lineWidth)}function sb(b,c,d,e){if("string"==typeof b)return b;for(var f=m.createLinearGradient(0,d,0,c),g=0,h=b.colors.length;h>g;++g){var i=b.colors[g];if("string"!=typeof i){var j=a.color.parse(e);null!=i.brightness&&(j=j.scale("rgb",i.brightness)),null!=i.opacity&&(j.a*=i.opacity),i=""+j}f.addColorStop(g/(h-1),i)}return f}var h=[],i={colors:["#edc240","#afd8f8","#cb4b4b","#4da74d","#9440ed"],legend:{show:!0,noColumns:1,labelFormatter:null,labelBoxBorderColor:"#ccc",container:null,position:"ne",margin:5,backgroundColor:null,backgroundOpacity:.85,sorted:null},xaxis:{show:null,position:"bottom",mode:null,timezone:null,font:null,color:null,tickColor:null,transform:null,inverseTransform:null,min:null,max:null,autoscaleMargin:null,ticks:null,tickFormatter:null,labelWidth:null,labelHeight:null,reserveSpace:null,tickLength:null,alignTicksWithAxis:null,tickDecimals:null,tickSize:null,minTickSize:null,monthNames:null,timeformat:null,twelveHourClock:!1},yaxis:{autoscaleMargin:.02,position:"left"},xaxes:[],yaxes:[],series:{points:{show:!1,radius:3,lineWidth:2,fill:!0,fillColor:"#ffffff",symbol:"circle"},lines:{lineWidth:2,fill:!1,fillColor:null,steps:!1},bars:{show:!1,lineWidth:2,barWidth:1,fill:!0,fillColor:null,align:"left",horizontal:!1,zero:!0},shadowSize:3,highlightColor:null},grid:{show:!0,aboveData:!1,color:"#545454",backgroundColor:null,borderColor:null,tickColor:null,margin:0,labelMargin:5,axisMargin:8,borderWidth:2,minBorderMargin:null,markings:null,markingsColor:"#f4f4f4",markingsLineWidth:2,clickable:!1,hoverable:!1,autoHighlight:!0,mouseActiveRadius:10},interaction:{redrawOverlayInterval:1e3/60},hooks:{}},j=null,k=null,l=null,m=null,n=null,o=[],p=[],q={left:0,right:0,top:0,bottom:0},r=0,s=0,t={processOptions:[],processRawData:[],processDatapoints:[],processOffset:[],drawBackground:[],drawSeries:[],draw:[],bindEvents:[],drawOverlay:[],shutdown:[]},u=this;u.setData=y,u.setupGrid=P,u.draw=U,u.getPlaceholder=function(){return b},u.getCanvas=function(){return j.element},u.getPlotOffset=function(){return q},u.width=function(){return r},u.height=function(){return s},u.offset=function(){var a=l.offset();return a.left+=q.left,a.top+=q.top,a},u.getData=function(){return h},u.getAxes=function(){var b={};return a.each(o.concat(p),function(a,c){c&&(b[c.direction+(1!=c.n?c.n:"")+"axis"]=c)}),b},u.getXAxes=function(){return o},u.getYAxes=function(){return p},u.c2p=C,u.p2c=D,u.getOptions=function(){return i},u.highlight=nb,u.unhighlight=ob,u.triggerRedrawOverlay=lb,u.pointOffset=function(a){return{left:parseInt(o[A(a,"x")-1].p2c(+a.x)+q.left,10),top:parseInt(p[A(a,"y")-1].p2c(+a.y)+q.top,10)}},u.shutdown=J,u.resize=function(){var a=b.width(),c=b.height();j.resize(a,c),k.resize(a,c)},u.hooks=t,w(u),x(f),H(),y(d),P(),U(),I();var eb=[],fb=null}function e(a,b){return b*Math.floor(a/b)}var b=Object.prototype.hasOwnProperty;a(function(){a("head").prepend(["<style id='flot-default-styles'>",".flot-tick-label {font-size:smaller;color:#545454;}","</style>"].join(""))}),c.prototype.resize=function(a,b){if(0>=a||0>=b)throw Error("Invalid dimensions for plot, width = "+a+", height = "+b);var c=this.element,d=this.context,e=this.pixelRatio;this.width!=a&&(c.width=a*e,c.style.width=a+"px",this.width=a),this.height!=b&&(c.height=b*e,c.style.height=b+"px",this.height=b),d.restore(),d.save(),d.scale(e,e)},c.prototype.clear=function(){this.context.clearRect(0,0,this.width,this.height)},c.prototype.render=function(){var a=this._textCache;for(var c in a)if(b.call(a,c)){var d=this.getTextLayer(c),e=a[c];d.hide();for(var f in e)if(b.call(e,f)){var g=e[f];for(var h in g)if(b.call(g,h)){var i=g[h];i.active?i.rendered||(d.append(i.element),i.rendered=!0):(delete g[h],i.rendered&&i.element.detach())}}d.show()}},c.prototype.getTextLayer=function(b){var c=this.text[b];return null==c&&(c=this.text[b]=a("<div></div>").addClass("flot-text "+b).css({position:"absolute",top:0,left:0,bottom:0,right:0}).insertAfter(this.element)),c},c.prototype.getTextInfo=function(b,c,d){var f,g,h,i;if(c=""+c,f="object"==typeof d?d.style+" "+d.variant+" "+d.weight+" "+d.size+"px "+d.family:d,g=this._textCache[b],null==g&&(g=this._textCache[b]={}),h=g[f],null==h&&(h=g[f]={}),i=h[c],null==i){var j=a("<div></div>").html(c).css({position:"absolute",top:-9999}).appendTo(this.getTextLayer(b));"object"==typeof d?j.css({font:f,color:d.color}):"string"==typeof d&&j.addClass(d),i=h[c]={active:!1,rendered:!1,element:j,width:j.outerWidth(!0),height:j.outerHeight(!0)},j.detach()}return i},c.prototype.addText=function(a,b,c,d,e,f,g,h){var i=this.getTextInfo(a,d,e,f);i.active=!0,"center"==g?b-=i.width/2:"right"==g&&(b-=i.width),"middle"==h?c-=i.height/2:"bottom"==h&&(c-=i.height),i.element.css({top:parseInt(c,10),left:parseInt(b,10)})},c.prototype.removeText=function(a,c,d,e){if(null==c){var f=this._textCache[a];if(null!=f)for(var g in f)if(b.call(f,g)){var h=f[g];for(var i in h)b.call(h,i)&&(h[i].active=!1)}}else this.getTextInfo(a,c,d,e).active=!1},a.plot=function(b,c,e){var f=new d(a(b),c,e,a.plot.plugins);return f},a.plot.version="0.8.0-beta",a.plot.plugins=[],a.fn.plot=function(b,c){return this.each(function(){a.plot(this,b,c)})}})(jQuery);