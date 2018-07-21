/*!
 * Chart.js
 * http://chartjs.org/
 * Version: 2.7.2
 *
 * Copyright 2018 Chart.js Contributors
 * Released under the MIT license
 * https://github.com/chartjs/Chart.js/blob/master/LICENSE.md
 */
!function(t){if("object"==typeof exports&&"undefined"!=typeof module)module.exports=t();else if("function"==typeof define&&define.amd)define([],t);else{("undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self?self:this).Chart=t()}}(function(){return function t(e,i,n){function a(r,s){if(!i[r]){if(!e[r]){var l="function"==typeof require&&require;if(!s&&l)return l(r,!0);if(o)return o(r,!0);var u=new Error("Cannot find module '"+r+"'");throw u.code="MODULE_NOT_FOUND",u}var d=i[r]={exports:{}};e[r][0].call(d.exports,function(t){var i=e[r][1][t];return a(i||t)},d,d.exports,t,e,i,n)}return i[r].exports}for(var o="function"==typeof require&&require,r=0;r<n.length;r++)a(n[r]);return a}({1:[function(t,e,i){},{}],2:[function(t,e,i){var n=t(6);function a(t){if(t){var e=[0,0,0],i=1,a=t.match(/^#([a-fA-F0-9]{3})$/i);if(a){a=a[1];for(var o=0;o<e.length;o++)e[o]=parseInt(a[o]+a[o],16)}else if(a=t.match(/^#([a-fA-F0-9]{6})$/i)){a=a[1];for(o=0;o<e.length;o++)e[o]=parseInt(a.slice(2*o,2*o+2),16)}else if(a=t.match(/^rgba?\(\s*([+-]?\d+)\s*,\s*([+-]?\d+)\s*,\s*([+-]?\d+)\s*(?:,\s*([+-]?[\d\.]+)\s*)?\)$/i)){for(o=0;o<e.length;o++)e[o]=parseInt(a[o+1]);i=parseFloat(a[4])}else if(a=t.match(/^rgba?\(\s*([+-]?[\d\.]+)\%\s*,\s*([+-]?[\d\.]+)\%\s*,\s*([+-]?[\d\.]+)\%\s*(?:,\s*([+-]?[\d\.]+)\s*)?\)$/i)){for(o=0;o<e.length;o++)e[o]=Math.round(2.55*parseFloat(a[o+1]));i=parseFloat(a[4])}else if(a=t.match(/(\w+)/)){if("transparent"==a[1])return[0,0,0,0];if(!(e=n[a[1]]))return}for(o=0;o<e.length;o++)e[o]=d(e[o],0,255);return i=i||0==i?d(i,0,1):1,e[3]=i,e}}function o(t){if(t){var e=t.match(/^hsla?\(\s*([+-]?\d+)(?:deg)?\s*,\s*([+-]?[\d\.]+)%\s*,\s*([+-]?[\d\.]+)%\s*(?:,\s*([+-]?[\d\.]+)\s*)?\)/);if(e){var i=parseFloat(e[4]);return[d(parseInt(e[1]),0,360),d(parseFloat(e[2]),0,100),d(parseFloat(e[3]),0,100),d(isNaN(i)?1:i,0,1)]}}}function r(t){if(t){var e=t.match(/^hwb\(\s*([+-]?\d+)(?:deg)?\s*,\s*([+-]?[\d\.]+)%\s*,\s*([+-]?[\d\.]+)%\s*(?:,\s*([+-]?[\d\.]+)\s*)?\)/);if(e){var i=parseFloat(e[4]);return[d(parseInt(e[1]),0,360),d(parseFloat(e[2]),0,100),d(parseFloat(e[3]),0,100),d(isNaN(i)?1:i,0,1)]}}}function s(t,e){return void 0===e&&(e=void 0!==t[3]?t[3]:1),"rgba("+t[0]+", "+t[1]+", "+t[2]+", "+e+")"}function l(t,e){return"rgba("+Math.round(t[0]/255*100)+"%, "+Math.round(t[1]/255*100)+"%, "+Math.round(t[2]/255*100)+"%, "+(e||t[3]||1)+")"}function u(t,e){return void 0===e&&(e=void 0!==t[3]?t[3]:1),"hsla("+t[0]+", "+t[1]+"%, "+t[2]+"%, "+e+")"}function d(t,e,i){return Math.min(Math.max(e,t),i)}function c(t){var e=t.toString(16).toUpperCase();return e.length<2?"0"+e:e}e.exports={getRgba:a,getHsla:o,getRgb:function(t){var e=a(t);return e&&e.slice(0,3)},getHsl:function(t){var e=o(t);return e&&e.slice(0,3)},getHwb:r,getAlpha:function(t){var e=a(t);{if(e)return e[3];if(e=o(t))return e[3];if(e=r(t))return e[3]}},hexString:function(t){return"#"+c(t[0])+c(t[1])+c(t[2])},rgbString:function(t,e){if(e<1||t[3]&&t[3]<1)return s(t,e);return"rgb("+t[0]+", "+t[1]+", "+t[2]+")"},rgbaString:s,percentString:function(t,e){if(e<1||t[3]&&t[3]<1)return l(t,e);var i=Math.round(t[0]/255*100),n=Math.round(t[1]/255*100),a=Math.round(t[2]/255*100);return"rgb("+i+"%, "+n+"%, "+a+"%)"},percentaString:l,hslString:function(t,e){if(e<1||t[3]&&t[3]<1)return u(t,e);return"hsl("+t[0]+", "+t[1]+"%, "+t[2]+"%)"},hslaString:u,hwbString:function(t,e){void 0===e&&(e=void 0!==t[3]?t[3]:1);return"hwb("+t[0]+", "+t[1]+"%, "+t[2]+"%"+(void 0!==e&&1!==e?", "+e:"")+")"},keyword:function(t){return h[t.slice(0,3)]}};var h={};for(var f in n)h[n[f]]=f},{6:6}],3:[function(t,e,i){var n=t(5),a=t(2),o=function(t){return t instanceof o?t:this instanceof o?(this.valid=!1,this.values={rgb:[0,0,0],hsl:[0,0,0],hsv:[0,0,0],hwb:[0,0,0],cmyk:[0,0,0,0],alpha:1},void("string"==typeof t?(e=a.getRgba(t))?this.setValues("rgb",e):(e=a.getHsla(t))?this.setValues("hsl",e):(e=a.getHwb(t))&&this.setValues("hwb",e):"object"==typeof t&&(void 0!==(e=t).r||void 0!==e.red?this.setValues("rgb",e):void 0!==e.l||void 0!==e.lightness?this.setValues("hsl",e):void 0!==e.v||void 0!==e.value?this.setValues("hsv",e):void 0!==e.w||void 0!==e.whiteness?this.setValues("hwb",e):void 0===e.c&&void 0===e.cyan||this.setValues("cmyk",e)))):new o(t);var e};o.prototype={isValid:function(){return this.valid},rgb:function(){return this.setSpace("rgb",arguments)},hsl:function(){return this.setSpace("hsl",arguments)},hsv:function(){return this.setSpace("hsv",arguments)},hwb:function(){return this.setSpace("hwb",arguments)},cmyk:function(){return this.setSpace("cmyk",arguments)},rgbArray:function(){return this.values.rgb},hslArray:function(){return this.values.hsl},hsvArray:function(){return this.values.hsv},hwbArray:function(){var t=this.values;return 1!==t.alpha?t.hwb.concat([t.alpha]):t.hwb},cmykArray:function(){return this.values.cmyk},rgbaArray:function(){var t=this.values;return t.rgb.concat([t.alpha])},hslaArray:function(){var t=this.values;return t.hsl.concat([t.alpha])},alpha:function(t){return void 0===t?this.values.alpha:(this.setValues("alpha",t),this)},red:function(t){return this.setChannel("rgb",0,t)},green:function(t){return this.setChannel("rgb",1,t)},blue:function(t){return this.setChannel("rgb",2,t)},hue:function(t){return t&&(t=(t%=360)<0?360+t:t),this.setChannel("hsl",0,t)},saturation:function(t){return this.setChannel("hsl",1,t)},lightness:function(t){return this.setChannel("hsl",2,t)},saturationv:function(t){return this.setChannel("hsv",1,t)},whiteness:function(t){return this.setChannel("hwb",1,t)},blackness:function(t){return this.setChannel("hwb",2,t)},value:function(t){return this.setChannel("hsv",2,t)},cyan:function(t){return this.setChannel("cmyk",0,t)},magenta:function(t){return this.setChannel("cmyk",1,t)},yellow:function(t){return this.setChannel("cmyk",2,t)},black:function(t){return this.setChannel("cmyk",3,t)},hexString:function(){return a.hexString(this.values.rgb)},rgbString:function(){return a.rgbString(this.values.rgb,this.values.alpha)},rgbaString:function(){return a.rgbaString(this.values.rgb,this.values.alpha)},percentString:function(){return a.percentString(this.values.rgb,this.values.alpha)},hslString:function(){return a.hslString(this.values.hsl,this.values.alpha)},hslaString:function(){return a.hslaString(this.values.hsl,this.values.alpha)},hwbString:function(){return a.hwbString(this.values.hwb,this.values.alpha)},keyword:function(){return a.keyword(this.values.rgb,this.values.alpha)},rgbNumber:function(){var t=this.values.rgb;return t[0]<<16|t[1]<<8|t[2]},luminosity:function(){for(var t=this.values.rgb,e=[],i=0;i<t.length;i++){var n=t[i]/255;e[i]=n<=.03928?n/12.92:Math.pow((n+.055)/1.055,2.4)}return.2126*e[0]+.7152*e[1]+.0722*e[2]},contrast:function(t){var e=this.luminosity(),i=t.luminosity();return e>i?(e+.05)/(i+.05):(i+.05)/(e+.05)},level:function(t){var e=this.contrast(t);return e>=7.1?"AAA":e>=4.5?"AA":""},dark:function(){var t=this.values.rgb;return(299*t[0]+587*t[1]+114*t[2])/1e3<128},light:function(){return!this.dark()},negate:function(){for(var t=[],e=0;e<3;e++)t[e]=255-this.values.rgb[e];return this.setValues("rgb",t),this},lighten:function(t){var e=this.values.hsl;return e[2]+=e[2]*t,this.setValues("hsl",e),this},darken:function(t){var e=this.values.hsl;return e[2]-=e[2]*t,this.setValues("hsl",e),this},saturate:function(t){var e=this.values.hsl;return e[1]+=e[1]*t,this.setValues("hsl",e),this},desaturate:function(t){var e=this.values.hsl;return e[1]-=e[1]*t,this.setValues("hsl",e),this},whiten:function(t){var e=this.values.hwb;return e[1]+=e[1]*t,this.setValues("hwb",e),this},blacken:function(t){var e=this.values.hwb;return e[2]+=e[2]*t,this.setValues("hwb",e),this},greyscale:function(){var t=this.values.rgb,e=.3*t[0]+.59*t[1]+.11*t[2];return this.setValues("rgb",[e,e,e]),this},clearer:function(t){var e=this.values.alpha;return this.setValues("alpha",e-e*t),this},opaquer:function(t){var e=this.values.alpha;return this.setValues("alpha",e+e*t),this},rotate:function(t){var e=this.values.hsl,i=(e[0]+t)%360;return e[0]=i<0?360+i:i,this.setValues("hsl",e),this},mix:function(t,e){var i=this,n=t,a=void 0===e?.5:e,o=2*a-1,r=i.alpha()-n.alpha(),s=((o*r==-1?o:(o+r)/(1+o*r))+1)/2,l=1-s;return this.rgb(s*i.red()+l*n.red(),s*i.green()+l*n.green(),s*i.blue()+l*n.blue()).alpha(i.alpha()*a+n.alpha()*(1-a))},toJSON:function(){return this.rgb()},clone:function(){var t,e,i=new o,n=this.values,a=i.values;for(var r in n)n.hasOwnProperty(r)&&(t=n[r],"[object Array]"===(e={}.toString.call(t))?a[r]=t.slice(0):"[object Number]"===e?a[r]=t:console.error("unexpected color value:",t));return i}},o.prototype.spaces={rgb:["red","green","blue"],hsl:["hue","saturation","lightness"],hsv:["hue","saturation","value"],hwb:["hue","whiteness","blackness"],cmyk:["cyan","magenta","yellow","black"]},o.prototype.maxes={rgb:[255,255,255],hsl:[360,100,100],hsv:[360,100,100],hwb:[360,100,100],cmyk:[100,100,100,100]},o.prototype.getValues=function(t){for(var e=this.values,i={},n=0;n<t.length;n++)i[t.charAt(n)]=e[t][n];return 1!==e.alpha&&(i.a=e.alpha),i},o.prototype.setValues=function(t,e){var i,a,o=this.values,r=this.spaces,s=this.maxes,l=1;if(this.valid=!0,"alpha"===t)l=e;else if(e.length)o[t]=e.slice(0,t.length),l=e[t.length];else if(void 0!==e[t.charAt(0)]){for(i=0;i<t.length;i++)o[t][i]=e[t.charAt(i)];l=e.a}else if(void 0!==e[r[t][0]]){var u=r[t];for(i=0;i<t.length;i++)o[t][i]=e[u[i]];l=e.alpha}if(o.alpha=Math.max(0,Math.min(1,void 0===l?o.alpha:l)),"alpha"===t)return!1;for(i=0;i<t.length;i++)a=Math.max(0,Math.min(s[t][i],o[t][i])),o[t][i]=Math.round(a);for(var d in r)d!==t&&(o[d]=n[t][d](o[t]));return!0},o.prototype.setSpace=function(t,e){var i=e[0];return void 0===i?this.getValues(t):("number"==typeof i&&(i=Array.prototype.slice.call(e)),this.setValues(t,i),this)},o.prototype.setChannel=function(t,e,i){var n=this.values[t];return void 0===i?n[e]:i===n[e]?this:(n[e]=i,this.setValues(t,n),this)},"undefined"!=typeof window&&(window.Color=o),e.exports=o},{2:2,5:5}],4:[function(t,e,i){function n(t){var e,i,n=t[0]/255,a=t[1]/255,o=t[2]/255,r=Math.min(n,a,o),s=Math.max(n,a,o),l=s-r;return s==r?e=0:n==s?e=(a-o)/l:a==s?e=2+(o-n)/l:o==s&&(e=4+(n-a)/l),(e=Math.min(60*e,360))<0&&(e+=360),i=(r+s)/2,[e,100*(s==r?0:i<=.5?l/(s+r):l/(2-s-r)),100*i]}function a(t){var e,i,n=t[0],a=t[1],o=t[2],r=Math.min(n,a,o),s=Math.max(n,a,o),l=s-r;return i=0==s?0:l/s*1e3/10,s==r?e=0:n==s?e=(a-o)/l:a==s?e=2+(o-n)/l:o==s&&(e=4+(n-a)/l),(e=Math.min(60*e,360))<0&&(e+=360),[e,i,s/255*1e3/10]}function o(t){var e=t[0],i=t[1],a=t[2];return[n(t)[0],100*(1/255*Math.min(e,Math.min(i,a))),100*(a=1-1/255*Math.max(e,Math.max(i,a)))]}function s(t){var e,i=t[0]/255,n=t[1]/255,a=t[2]/255;return[100*((1-i-(e=Math.min(1-i,1-n,1-a)))/(1-e)||0),100*((1-n-e)/(1-e)||0),100*((1-a-e)/(1-e)||0),100*e]}function l(t){return C[JSON.stringify(t)]}function u(t){var e=t[0]/255,i=t[1]/255,n=t[2]/255;return[100*(.4124*(e=e>.04045?Math.pow((e+.055)/1.055,2.4):e/12.92)+.3576*(i=i>.04045?Math.pow((i+.055)/1.055,2.4):i/12.92)+.1805*(n=n>.04045?Math.pow((n+.055)/1.055,2.4):n/12.92)),100*(.2126*e+.7152*i+.0722*n),100*(.0193*e+.1192*i+.9505*n)]}function d(t){var e=u(t),i=e[0],n=e[1],a=e[2];return n/=100,a/=108.883,i=(i/=95.047)>.008856?Math.pow(i,1/3):7.787*i+16/116,[116*(n=n>.008856?Math.pow(n,1/3):7.787*n+16/116)-16,500*(i-n),200*(n-(a=a>.008856?Math.pow(a,1/3):7.787*a+16/116))]}function c(t){var e,i,n,a,o,r=t[0]/360,s=t[1]/100,l=t[2]/100;if(0==s)return[o=255*l,o,o];e=2*l-(i=l<.5?l*(1+s):l+s-l*s),a=[0,0,0];for(var u=0;u<3;u++)(n=r+1/3*-(u-1))<0&&n++,n>1&&n--,o=6*n<1?e+6*(i-e)*n:2*n<1?i:3*n<2?e+(i-e)*(2/3-n)*6:e,a[u]=255*o;return a}function h(t){var e=t[0]/60,i=t[1]/100,n=t[2]/100,a=Math.floor(e)%6,o=e-Math.floor(e),r=255*n*(1-i),s=255*n*(1-i*o),l=255*n*(1-i*(1-o));n*=255;switch(a){case 0:return[n,l,r];case 1:return[s,n,r];case 2:return[r,n,l];case 3:return[r,s,n];case 4:return[l,r,n];case 5:return[n,r,s]}}function f(t){var e,i,n,a,o=t[0]/360,s=t[1]/100,l=t[2]/100,u=s+l;switch(u>1&&(s/=u,l/=u),n=6*o-(e=Math.floor(6*o)),0!=(1&e)&&(n=1-n),a=s+n*((i=1-l)-s),e){default:case 6:case 0:r=i,g=a,b=s;break;case 1:r=a,g=i,b=s;break;case 2:r=s,g=i,b=a;break;case 3:r=s,g=a,b=i;break;case 4:r=a,g=s,b=i;break;case 5:r=i,g=s,b=a}return[255*r,255*g,255*b]}function p(t){var e=t[0]/100,i=t[1]/100,n=t[2]/100,a=t[3]/100;return[255*(1-Math.min(1,e*(1-a)+a)),255*(1-Math.min(1,i*(1-a)+a)),255*(1-Math.min(1,n*(1-a)+a))]}function m(t){var e,i,n,a=t[0]/100,o=t[1]/100,r=t[2]/100;return i=-.9689*a+1.8758*o+.0415*r,n=.0557*a+-.204*o+1.057*r,e=(e=3.2406*a+-1.5372*o+-.4986*r)>.0031308?1.055*Math.pow(e,1/2.4)-.055:e*=12.92,i=i>.0031308?1.055*Math.pow(i,1/2.4)-.055:i*=12.92,n=n>.0031308?1.055*Math.pow(n,1/2.4)-.055:n*=12.92,[255*(e=Math.min(Math.max(0,e),1)),255*(i=Math.min(Math.max(0,i),1)),255*(n=Math.min(Math.max(0,n),1))]}function v(t){var e=t[0],i=t[1],n=t[2];return i/=100,n/=108.883,e=(e/=95.047)>.008856?Math.pow(e,1/3):7.787*e+16/116,[116*(i=i>.008856?Math.pow(i,1/3):7.787*i+16/116)-16,500*(e-i),200*(i-(n=n>.008856?Math.pow(n,1/3):7.787*n+16/116))]}function x(t){var e,i,n,a,o=t[0],r=t[1],s=t[2];return o<=8?a=(i=100*o/903.3)/100*7.787+16/116:(i=100*Math.pow((o+16)/116,3),a=Math.pow(i/100,1/3)),[e=e/95.047<=.008856?e=95.047*(r/500+a-16/116)/7.787:95.047*Math.pow(r/500+a,3),i,n=n/108.883<=.008859?n=108.883*(a-s/200-16/116)/7.787:108.883*Math.pow(a-s/200,3)]}function y(t){var e,i=t[0],n=t[1],a=t[2];return(e=360*Math.atan2(a,n)/2/Math.PI)<0&&(e+=360),[i,Math.sqrt(n*n+a*a),e]}function k(t){return m(x(t))}function M(t){var e,i=t[0],n=t[1];return e=t[2]/360*2*Math.PI,[i,n*Math.cos(e),n*Math.sin(e)]}function w(t){return S[t]}e.exports={rgb2hsl:n,rgb2hsv:a,rgb2hwb:o,rgb2cmyk:s,rgb2keyword:l,rgb2xyz:u,rgb2lab:d,rgb2lch:function(t){return y(d(t))},hsl2rgb:c,hsl2hsv:function(t){var e=t[0],i=t[1]/100,n=t[2]/100;if(0===n)return[0,0,0];return[e,100*(2*(i*=(n*=2)<=1?n:2-n)/(n+i)),100*((n+i)/2)]},hsl2hwb:function(t){return o(c(t))},hsl2cmyk:function(t){return s(c(t))},hsl2keyword:function(t){return l(c(t))},hsv2rgb:h,hsv2hsl:function(t){var e,i,n=t[0],a=t[1]/100,o=t[2]/100;return e=a*o,[n,100*(e=(e/=(i=(2-a)*o)<=1?i:2-i)||0),100*(i/=2)]},hsv2hwb:function(t){return o(h(t))},hsv2cmyk:function(t){return s(h(t))},hsv2keyword:function(t){return l(h(t))},hwb2rgb:f,hwb2hsl:function(t){return n(f(t))},hwb2hsv:function(t){return a(f(t))},hwb2cmyk:function(t){return s(f(t))},hwb2keyword:function(t){return l(f(t))},cmyk2rgb:p,cmyk2hsl:function(t){return n(p(t))},cmyk2hsv:function(t){return a(p(t))},cmyk2hwb:function(t){return o(p(t))},cmyk2keyword:function(t){return l(p(t))},keyword2rgb:w,keyword2hsl:function(t){return n(w(t))},keyword2hsv:function(t){return a(w(t))},keyword2hwb:function(t){return o(w(t))},keyword2cmyk:function(t){return s(w(t))},keyword2lab:function(t){return d(w(t))},keyword2xyz:function(t){return u(w(t))},xyz2rgb:m,xyz2lab:v,xyz2lch:function(t){return y(v(t))},lab2xyz:x,lab2rgb:k,lab2lch:y,lch2lab:M,lch2xyz:function(t){return x(M(t))},lch2rgb:function(t){return k(M(t))}};var S={aliceblue:[240,248,255],antiquewhite:[250,235,215],aqua:[0,255,255],aquamarine:[127,255,212],azure:[240,255,255],beige:[245,245,220],bisque:[255,228,196],black:[0,0,0],blanchedalmond:[255,235,205],blue:[0,0,255],blueviolet:[138,43,226],brown:[165,42,42],burlywood:[222,184,135],cadetblue:[95,158,160],chartreuse:[127,255,0],chocolate:[210,105,30],coral:[255,127,80],cornflowerblue:[100,149,237],cornsilk:[255,248,220],crimson:[220,20,60],cyan:[0,255,255],darkblue:[0,0,139],darkcyan:[0,139,139],darkgoldenrod:[184,134,11],darkgray:[169,169,169],darkgreen:[0,100,0],darkgrey:[169,169,169],darkkhaki:[189,183,107],darkmagenta:[139,0,139],darkolivegreen:[85,107,47],darkorange:[255,140,0],darkorchid:[153,50,204],darkred:[139,0,0],darksalmon:[233,150,122],darkseagreen:[143,188,143],darkslateblue:[72,61,139],darkslategray:[47,79,79],darkslategrey:[47,79,79],darkturquoise:[0,206,209],darkviolet:[148,0,211],deeppink:[255,20,147],deepskyblue:[0,191,255],dimgray:[105,105,105],dimgrey:[105,105,105],dodgerblue:[30,144,255],firebrick:[178,34,34],floralwhite:[255,250,240],forestgreen:[34,139,34],fuchsia:[255,0,255],gainsboro:[220,220,220],ghostwhite:[248,248,255],gold:[255,215,0],goldenrod:[218,165,32],gray:[128,128,128],green:[0,128,0],greenyellow:[173,255,47],grey:[128,128,128],honeydew:[240,255,240],hotpink:[255,105,180],indianred:[205,92,92],indigo:[75,0,130],ivory:[255,255,240],khaki:[240,230,140],lavender:[230,230,250],lavenderblush:[255,240,245],lawngreen:[124,252,0],lemonchiffon:[255,250,205],lightblue:[173,216,230],lightcoral:[240,128,128],lightcyan:[224,255,255],lightgoldenrodyellow:[250,250,210],lightgray:[211,211,211],lightgreen:[144,238,144],lightgrey:[211,211,211],lightpink:[255,182,193],lightsalmon:[255,160,122],lightseagreen:[32,178,170],lightskyblue:[135,206,250],lightslategray:[119,136,153],lightslategrey:[119,136,153],lightsteelblue:[176,196,222],lightyellow:[255,255,224],lime:[0,255,0],limegreen:[50,205,50],linen:[250,240,230],magenta:[255,0,255],maroon:[128,0,0],mediumaquamarine:[102,205,170],mediumblue:[0,0,205],mediumorchid:[186,85,211],mediumpurple:[147,112,219],mediumseagreen:[60,179,113],mediumslateblue:[123,104,238],mediumspringgreen:[0,250,154],mediumturquoise:[72,209,204],mediumvioletred:[199,21,133],midnightblue:[25,25,112],mintcream:[245,255,250],mistyrose:[255,228,225],moccasin:[255,228,181],navajowhite:[255,222,173],navy:[0,0,128],oldlace:[253,245,230],olive:[128,128,0],olivedrab:[107,142,35],orange:[255,165,0],orangered:[255,69,0],orchid:[218,112,214],palegoldenrod:[238,232,170],palegreen:[152,251,152],paleturquoise:[175,238,238],palevioletred:[219,112,147],papayawhip:[255,239,213],peachpuff:[255,218,185],peru:[205,133,63],pink:[255,192,203],plum:[221,160,221],powderblue:[176,224,230],purple:[128,0,128],rebeccapurple:[102,51,153],red:[255,0,0],rosybrown:[188,143,143],royalblue:[65,105,225],saddlebrown:[139,69,19],salmon:[250,128,114],sandybrown:[244,164,96],seagreen:[46,139,87],seashell:[255,245,238],sienna:[160,82,45],silver:[192,192,192],skyblue:[135,206,235],slateblue:[106,90,205],slategray:[112,128,144],slategrey:[112,128,144],snow:[255,250,250],springgreen:[0,255,127],steelblue:[70,130,180],tan:[210,180,140],teal:[0,128,128],thistle:[216,191,216],tomato:[255,99,71],turquoise:[64,224,208],violet:[238,130,238],wheat:[245,222,179],white:[255,255,255],whitesmoke:[245,245,245],yellow:[255,255,0],yellowgreen:[154,205,50]},C={};for(var _ in S)C[JSON.stringify(S[_])]=_},{}],5:[function(t,e,i){var n=t(4),a=function(){return new u};for(var o in n){a[o+"Raw"]=function(t){return function(e){return"number"==typeof e&&(e=Array.prototype.slice.call(arguments)),n[t](e)}}(o);var r=/(\w+)2(\w+)/.exec(o),s=r[1],l=r[2];(a[s]=a[s]||{})[l]=a[o]=function(t){return function(e){"number"==typeof e&&(e=Array.prototype.slice.call(arguments));var i=n[t](e);if("string"==typeof i||void 0===i)return i;for(var a=0;a<i.length;a++)i[a]=Math.round(i[a]);return i}}(o)}var u=function(){this.convs={}};u.prototype.routeSpace=function(t,e){var i=e[0];return void 0===i?this.getValues(t):("number"==typeof i&&(i=Array.prototype.slice.call(e)),this.setValues(t,i))},u.prototype.setValues=function(t,e){return this.space=t,this.convs={},this.convs[t]=e,this},u.prototype.getValues=function(t){var e=this.convs[t];if(!e){var i=this.space,n=this.convs[i];e=a[i][t](n),this.convs[t]=e}return e},["rgb","hsl","hsv","cmyk","keyword"].forEach(function(t){u.prototype[t]=function(e){return this.routeSpace(t,arguments)}}),e.exports=a},{4:4}],6:[function(t,e,i){"use strict";e.exports={aliceblue:[240,248,255],antiquewhite:[250,235,215],aqua:[0,255,255],aquamarine:[127,255,212],azure:[240,255,255],beige:[245,245,220],bisque:[255,228,196],black:[0,0,0],blanchedalmond:[255,235,205],blue:[0,0,255],blueviolet:[138,43,226],brown:[165,42,42],burlywood:[222,184,135],cadetblue:[95,158,160],chartreuse:[127,255,0],chocolate:[210,105,30],coral:[255,127,80],cornflowerblue:[100,149,237],cornsilk:[255,248,220],crimson:[220,20,60],cyan:[0,255,255],darkblue:[0,0,139],darkcyan:[0,139,139],darkgoldenrod:[184,134,11],darkgray:[169,169,169],darkgreen:[0,100,0],darkgrey:[169,169,169],darkkhaki:[189,183,107],darkmagenta:[139,0,139],darkolivegreen:[85,107,47],darkorange:[255,140,0],darkorchid:[153,50,204],darkred:[139,0,0],darksalmon:[233,150,122],darkseagreen:[143,188,143],darkslateblue:[72,61,139],darkslategray:[47,79,79],darkslategrey:[47,79,79],darkturquoise:[0,206,209],darkviolet:[148,0,211],deeppink:[255,20,147],deepskyblue:[0,191,255],dimgray:[105,105,105],dimgrey:[105,105,105],dodgerblue:[30,144,255],firebrick:[178,34,34],floralwhite:[255,250,240],forestgreen:[34,139,34],fuchsia:[255,0,255],gainsboro:[220,220,220],ghostwhite:[248,248,255],gold:[255,215,0],goldenrod:[218,165,32],gray:[128,128,128],green:[0,128,0],greenyellow:[173,255,47],grey:[128,128,128],honeydew:[240,255,240],hotpink:[255,105,180],indianred:[205,92,92],indigo:[75,0,130],ivory:[255,255,240],khaki:[240,230,140],lavender:[230,230,250],lavenderblush:[255,240,245],lawngreen:[124,252,0],lemonchiffon:[255,250,205],lightblue:[173,216,230],lightcoral:[240,128,128],lightcyan:[224,255,255],lightgoldenrodyellow:[250,250,210],lightgray:[211,211,211],lightgreen:[144,238,144],lightgrey:[211,211,211],lightpink:[255,182,193],lightsalmon:[255,160,122],lightseagreen:[32,178,170],lightskyblue:[135,206,250],lightslategray:[119,136,153],lightslategrey:[119,136,153],lightsteelblue:[176,196,222],lightyellow:[255,255,224],lime:[0,255,0],limegreen:[50,205,50],linen:[250,240,230],magenta:[255,0,255],maroon:[128,0,0],mediumaquamarine:[102,205,170],mediumblue:[0,0,205],mediumorchid:[186,85,211],mediumpurple:[147,112,219],mediumseagreen:[60,179,113],mediumslateblue:[123,104,238],mediumspringgreen:[0,250,154],mediumturquoise:[72,209,204],mediumvioletred:[199,21,133],midnightblue:[25,25,112],mintcream:[245,255,250],mistyrose:[255,228,225],moccasin:[255,228,181],navajowhite:[255,222,173],navy:[0,0,128],oldlace:[253,245,230],olive:[128,128,0],olivedrab:[107,142,35],orange:[255,165,0],orangered:[255,69,0],orchid:[218,112,214],palegoldenrod:[238,232,170],palegreen:[152,251,152],paleturquoise:[175,238,238],palevioletred:[219,112,147],papayawhip:[255,239,213],peachpuff:[255,218,185],peru:[205,133,63],pink:[255,192,203],plum:[221,160,221],powderblue:[176,224,230],purple:[128,0,128],rebeccapurple:[102,51,153],red:[255,0,0],rosybrown:[188,143,143],royalblue:[65,105,225],saddlebrown:[139,69,19],salmon:[250,128,114],sandybrown:[244,164,96],seagreen:[46,139,87],seashell:[255,245,238],sienna:[160,82,45],silver:[192,192,192],skyblue:[135,206,235],slateblue:[106,90,205],slategray:[112,128,144],slategrey:[112,128,144],snow:[255,250,250],springgreen:[0,255,127],steelblue:[70,130,180],tan:[210,180,140],teal:[0,128,128],thistle:[216,191,216],tomato:[255,99,71],turquoise:[64,224,208],violet:[238,130,238],wheat:[245,222,179],white:[255,255,255],whitesmoke:[245,245,245],yellow:[255,255,0],yellowgreen:[154,205,50]}},{}],7:[function(t,e,i){var n=t(29)();n.helpers=t(45),t(27)(n),n.defaults=t(25),n.Element=t(26),n.elements=t(40),n.Interaction=t(28),n.layouts=t(30),n.platform=t(48),n.plugins=t(31),n.Ticks=t(34),t(22)(n),t(23)(n),t(24)(n),t(33)(n),t(32)(n),t(35)(n),t(55)(n),t(53)(n),t(54)(n),t(56)(n),t(57)(n),t(58)(n),t(15)(n),t(16)(n),t(17)(n),t(18)(n),t(19)(n),t(20)(n),t(21)(n),t(8)(n),t(9)(n),t(10)(n),t(11)(n),t(12)(n),t(13)(n),t(14)(n);var a=t(49);for(var o in a)a.hasOwnProperty(o)&&n.plugins.register(a[o]);n.platform.initialize(),e.exports=n,"undefined"!=typeof window&&(window.Chart=n),n.Legend=a.legend._element,n.Title=a.title._element,n.pluginService=n.plugins,n.PluginBase=n.Element.extend({}),n.canvasHelpers=n.helpers.canvas,n.layoutService=n.layouts},{10:10,11:11,12:12,13:13,14:14,15:15,16:16,17:17,18:18,19:19,20:20,21:21,22:22,23:23,24:24,25:25,26:26,27:27,28:28,29:29,30:30,31:31,32:32,33:33,34:34,35:35,40:40,45:45,48:48,49:49,53:53,54:54,55:55,56:56,57:57,58:58,8:8,9:9}],8:[function(t,e,i){"use strict";e.exports=function(t){t.Bar=function(e,i){return i.type="bar",new t(e,i)}}},{}],9:[function(t,e,i){"use strict";e.exports=function(t){t.Bubble=function(e,i){return i.type="bubble",new t(e,i)}}},{}],10:[function(t,e,i){"use strict";e.exports=function(t){t.Doughnut=function(e,i){return i.type="doughnut",new t(e,i)}}},{}],11:[function(t,e,i){"use strict";e.exports=function(t){t.Line=function(e,i){return i.type="line",new t(e,i)}}},{}],12:[function(t,e,i){"use strict";e.exports=function(t){t.PolarArea=function(e,i){return i.type="polarArea",new t(e,i)}}},{}],13:[function(t,e,i){"use strict";e.exports=function(t){t.Radar=function(e,i){return i.type="radar",new t(e,i)}}},{}],14:[function(t,e,i){"use strict";e.exports=function(t){t.Scatter=function(e,i){return i.type="scatter",new t(e,i)}}},{}],15:[function(t,e,i){"use strict";var n=t(25),a=t(40),o=t(45);n._set("bar",{hover:{mode:"label"},scales:{xAxes:[{type:"category",categoryPercentage:.8,barPercentage:.9,offset:!0,gridLines:{offsetGridLines:!0}}],yAxes:[{type:"linear"}]}}),n._set("horizontalBar",{hover:{mode:"index",axis:"y"},scales:{xAxes:[{type:"linear",position:"bottom"}],yAxes:[{position:"left",type:"category",categoryPercentage:.8,barPercentage:.9,offset:!0,gridLines:{offsetGridLines:!0}}]},elements:{rectangle:{borderSkipped:"left"}},tooltips:{callbacks:{title:function(t,e){var i="";return t.length>0&&(t[0].yLabel?i=t[0].yLabel:e.labels.length>0&&t[0].index<e.labels.length&&(i=e.labels[t[0].index])),i},label:function(t,e){return(e.datasets[t.datasetIndex].label||"")+": "+t.xLabel}},mode:"index",axis:"y"}}),e.exports=function(t){t.controllers.bar=t.DatasetController.extend({dataElementType:a.Rectangle,initialize:function(){var e;t.DatasetController.prototype.initialize.apply(this,arguments),(e=this.getMeta()).stack=this.getDataset().stack,e.bar=!0},update:function(t){var e,i,n=this.getMeta().data;for(this._ruler=this.getRuler(),e=0,i=n.length;e<i;++e)this.updateElement(n[e],e,t)},updateElement:function(t,e,i){var n=this,a=n.chart,r=n.getMeta(),s=n.getDataset(),l=t.custom||{},u=a.options.elements.rectangle;t._xScale=n.getScaleForId(r.xAxisID),t._yScale=n.getScaleForId(r.yAxisID),t._datasetIndex=n.index,t._index=e,t._model={datasetLabel:s.label,label:a.data.labels[e],borderSkipped:l.borderSkipped?l.borderSkipped:u.borderSkipped,backgroundColor:l.backgroundColor?l.backgroundColor:o.valueAtIndexOrDefault(s.backgroundColor,e,u.backgroundColor),borderColor:l.borderColor?l.borderColor:o.valueAtIndexOrDefault(s.borderColor,e,u.borderColor),borderWidth:l.borderWidth?l.borderWidth:o.valueAtIndexOrDefault(s.borderWidth,e,u.borderWidth)},n.updateElementGeometry(t,e,i),t.pivot()},updateElementGeometry:function(t,e,i){var n=this,a=t._model,o=n.getValueScale(),r=o.getBasePixel(),s=o.isHorizontal(),l=n._ruler||n.getRuler(),u=n.calculateBarValuePixels(n.index,e),d=n.calculateBarIndexPixels(n.index,e,l);a.horizontal=s,a.base=i?r:u.base,a.x=s?i?r:u.head:d.center,a.y=s?d.center:i?r:u.head,a.height=s?d.size:void 0,a.width=s?void 0:d.size},getValueScaleId:function(){return this.getMeta().yAxisID},getIndexScaleId:function(){return this.getMeta().xAxisID},getValueScale:function(){return this.getScaleForId(this.getValueScaleId())},getIndexScale:function(){return this.getScaleForId(this.getIndexScaleId())},_getStacks:function(t){var e,i,n=this.chart,a=this.getIndexScale().options.stacked,o=void 0===t?n.data.datasets.length:t+1,r=[];for(e=0;e<o;++e)(i=n.getDatasetMeta(e)).bar&&n.isDatasetVisible(e)&&(!1===a||!0===a&&-1===r.indexOf(i.stack)||void 0===a&&(void 0===i.stack||-1===r.indexOf(i.stack)))&&r.push(i.stack);return r},getStackCount:function(){return this._getStacks().length},getStackIndex:function(t,e){var i=this._getStacks(t),n=void 0!==e?i.indexOf(e):-1;return-1===n?i.length-1:n},getRuler:function(){var t,e,i=this.getIndexScale(),n=this.getStackCount(),a=this.index,r=i.isHorizontal(),s=r?i.left:i.top,l=s+(r?i.width:i.height),u=[];for(t=0,e=this.getMeta().data.length;t<e;++t)u.push(i.getPixelForValue(null,t,a));return{min:o.isNullOrUndef(i.options.barThickness)?function(t,e){var i,n,a,o,r=t.isHorizontal()?t.width:t.height,s=t.getTicks();for(a=1,o=e.length;a<o;++a)r=Math.min(r,e[a]-e[a-1]);for(a=0,o=s.length;a<o;++a)n=t.getPixelForTick(a),r=a>0?Math.min(r,n-i):r,i=n;return r}(i,u):-1,pixels:u,start:s,end:l,stackCount:n,scale:i}},calculateBarValuePixels:function(t,e){var i,n,a,o,r,s,l=this.chart,u=this.getMeta(),d=this.getValueScale(),c=l.data.datasets,h=d.getRightValue(c[t].data[e]),f=d.options.stacked,g=u.stack,p=0;if(f||void 0===f&&void 0!==g)for(i=0;i<t;++i)(n=l.getDatasetMeta(i)).bar&&n.stack===g&&n.controller.getValueScaleId()===d.id&&l.isDatasetVisible(i)&&(a=d.getRightValue(c[i].data[e]),(h<0&&a<0||h>=0&&a>0)&&(p+=a));return o=d.getPixelForValue(p),{size:s=((r=d.getPixelForValue(p+h))-o)/2,base:o,head:r,center:r+s/2}},calculateBarIndexPixels:function(t,e,i){var n,a,r,s,l,u,d,c,h,f,g,p,m,v,b,x,y,k=i.scale.options,M="flex"===k.barThickness?(h=e,g=k,m=(f=i).pixels,v=m[h],b=h>0?m[h-1]:null,x=h<m.length-1?m[h+1]:null,y=g.categoryPercentage,null===b&&(b=v-(null===x?f.end-v:x-v)),null===x&&(x=v+v-b),p=v-(v-b)/2*y,{chunk:(x-b)/2*y/f.stackCount,ratio:g.barPercentage,start:p}):(n=e,a=i,u=(r=k).barThickness,d=a.stackCount,c=a.pixels[n],o.isNullOrUndef(u)?(s=a.min*r.categoryPercentage,l=r.barPercentage):(s=u*d,l=1),{chunk:s/d,ratio:l,start:c-s/2}),w=this.getStackIndex(t,this.getMeta().stack),S=M.start+M.chunk*w+M.chunk/2,C=Math.min(o.valueOrDefault(k.maxBarThickness,1/0),M.chunk*M.ratio);return{base:S-C/2,head:S+C/2,center:S,size:C}},draw:function(){var t=this.chart,e=this.getValueScale(),i=this.getMeta().data,n=this.getDataset(),a=i.length,r=0;for(o.canvas.clipArea(t.ctx,t.chartArea);r<a;++r)isNaN(e.getRightValue(n.data[r]))||i[r].draw();o.canvas.unclipArea(t.ctx)},setHoverStyle:function(t){var e=this.chart.data.datasets[t._datasetIndex],i=t._index,n=t.custom||{},a=t._model;a.backgroundColor=n.hoverBackgroundColor?n.hoverBackgroundColor:o.valueAtIndexOrDefault(e.hoverBackgroundColor,i,o.getHoverColor(a.backgroundColor)),a.borderColor=n.hoverBorderColor?n.hoverBorderColor:o.valueAtIndexOrDefault(e.hoverBorderColor,i,o.getHoverColor(a.borderColor)),a.borderWidth=n.hoverBorderWidth?n.hoverBorderWidth:o.valueAtIndexOrDefault(e.hoverBorderWidth,i,a.borderWidth)},removeHoverStyle:function(t){var e=this.chart.data.datasets[t._datasetIndex],i=t._index,n=t.custom||{},a=t._model,r=this.chart.options.elements.rectangle;a.backgroundColor=n.backgroundColor?n.backgroundColor:o.valueAtIndexOrDefault(e.backgroundColor,i,r.backgroundColor),a.borderColor=n.borderColor?n.borderColor:o.valueAtIndexOrDefault(e.borderColor,i,r.borderColor),a.borderWidth=n.borderWidth?n.borderWidth:o.valueAtIndexOrDefault(e.borderWidth,i,r.borderWidth)}}),t.controllers.horizontalBar=t.controllers.bar.extend({getValueScaleId:function(){return this.getMeta().xAxisID},getIndexScaleId:function(){return this.getMeta().yAxisID}})}},{25:25,40:40,45:45}],16:[function(t,e,i){"use strict";var n=t(25),a=t(40),o=t(45);n._set("bubble",{hover:{mode:"single"},scales:{xAxes:[{type:"linear",position:"bottom",id:"x-axis-0"}],yAxes:[{type:"linear",position:"left",id:"y-axis-0"}]},tooltips:{callbacks:{title:function(){return""},label:function(t,e){var i=e.datasets[t.datasetIndex].label||"",n=e.datasets[t.datasetIndex].data[t.index];return i+": ("+t.xLabel+", "+t.yLabel+", "+n.r+")"}}}}),e.exports=function(t){t.controllers.bubble=t.DatasetController.extend({dataElementType:a.Point,update:function(t){var e=this,i=e.getMeta().data;o.each(i,function(i,n){e.updateElement(i,n,t)})},updateElement:function(t,e,i){var n=this,a=n.getMeta(),o=t.custom||{},r=n.getScaleForId(a.xAxisID),s=n.getScaleForId(a.yAxisID),l=n._resolveElementOptions(t,e),u=n.getDataset().data[e],d=n.index,c=i?r.getPixelForDecimal(.5):r.getPixelForValue("object"==typeof u?u:NaN,e,d),h=i?s.getBasePixel():s.getPixelForValue(u,e,d);t._xScale=r,t._yScale=s,t._options=l,t._datasetIndex=d,t._index=e,t._model={backgroundColor:l.backgroundColor,borderColor:l.borderColor,borderWidth:l.borderWidth,hitRadius:l.hitRadius,pointStyle:l.pointStyle,radius:i?0:l.radius,skip:o.skip||isNaN(c)||isNaN(h),x:c,y:h},t.pivot()},setHoverStyle:function(t){var e=t._model,i=t._options;e.backgroundColor=o.valueOrDefault(i.hoverBackgroundColor,o.getHoverColor(i.backgroundColor)),e.borderColor=o.valueOrDefault(i.hoverBorderColor,o.getHoverColor(i.borderColor)),e.borderWidth=o.valueOrDefault(i.hoverBorderWidth,i.borderWidth),e.radius=i.radius+i.hoverRadius},removeHoverStyle:function(t){var e=t._model,i=t._options;e.backgroundColor=i.backgroundColor,e.borderColor=i.borderColor,e.borderWidth=i.borderWidth,e.radius=i.radius},_resolveElementOptions:function(t,e){var i,n,a,r=this.chart,s=r.data.datasets[this.index],l=t.custom||{},u=r.options.elements.point,d=o.options.resolve,c=s.data[e],h={},f={chart:r,dataIndex:e,dataset:s,datasetIndex:this.index},g=["backgroundColor","borderColor","borderWidth","hoverBackgroundColor","hoverBorderColor","hoverBorderWidth","hoverRadius","hitRadius","pointStyle"];for(i=0,n=g.length;i<n;++i)h[a=g[i]]=d([l[a],s[a],u[a]],f,e);return h.radius=d([l.radius,c?c.r:void 0,s.radius,u.radius],f,e),h}})}},{25:25,40:40,45:45}],17:[function(t,e,i){"use strict";var n=t(25),a=t(40),o=t(45);n._set("doughnut",{animation:{animateRotate:!0,animateScale:!1},hover:{mode:"single"},legendCallback:function(t){var e=[];e.push('<ul class="'+t.id+'-legend">');var i=t.data,n=i.datasets,a=i.labels;if(n.length)for(var o=0;o<n[0].data.length;++o)e.push('<li><span style="background-color:'+n[0].backgroundColor[o]+'"></span>'),a[o]&&e.push(a[o]),e.push("</li>");return e.push("</ul>"),e.join("")},legend:{labels:{generateLabels:function(t){var e=t.data;return e.labels.length&&e.datasets.length?e.labels.map(function(i,n){var a=t.getDatasetMeta(0),r=e.datasets[0],s=a.data[n],l=s&&s.custom||{},u=o.valueAtIndexOrDefault,d=t.options.elements.arc;return{text:i,fillStyle:l.backgroundColor?l.backgroundColor:u(r.backgroundColor,n,d.backgroundColor),strokeStyle:l.borderColor?l.borderColor:u(r.borderColor,n,d.borderColor),lineWidth:l.borderWidth?l.borderWidth:u(r.borderWidth,n,d.borderWidth),hidden:isNaN(r.data[n])||a.data[n].hidden,index:n}}):[]}},onClick:function(t,e){var i,n,a,o=e.index,r=this.chart;for(i=0,n=(r.data.datasets||[]).length;i<n;++i)(a=r.getDatasetMeta(i)).data[o]&&(a.data[o].hidden=!a.data[o].hidden);r.update()}},cutoutPercentage:50,rotation:-.5*Math.PI,circumference:2*Math.PI,tooltips:{callbacks:{title:function(){return""},label:function(t,e){var i=e.labels[t.index],n=": "+e.datasets[t.datasetIndex].data[t.index];return o.isArray(i)?(i=i.slice())[0]+=n:i+=n,i}}}}),n._set("pie",o.clone(n.doughnut)),n._set("pie",{cutoutPercentage:0}),e.exports=function(t){t.controllers.doughnut=t.controllers.pie=t.DatasetController.extend({dataElementType:a.Arc,linkScales:o.noop,getRingIndex:function(t){for(var e=0,i=0;i<t;++i)this.chart.isDatasetVisible(i)&&++e;return e},update:function(t){var e=this,i=e.chart,n=i.chartArea,a=i.options,r=a.elements.arc,s=n.right-n.left-r.borderWidth,l=n.bottom-n.top-r.borderWidth,u=Math.min(s,l),d={x:0,y:0},c=e.getMeta(),h=a.cutoutPercentage,f=a.circumference;if(f<2*Math.PI){var g=a.rotation%(2*Math.PI),p=(g+=2*Math.PI*(g>=Math.PI?-1:g<-Math.PI?1:0))+f,m=Math.cos(g),v=Math.sin(g),b=Math.cos(p),x=Math.sin(p),y=g<=0&&p>=0||g<=2*Math.PI&&2*Math.PI<=p,k=g<=.5*Math.PI&&.5*Math.PI<=p||g<=2.5*Math.PI&&2.5*Math.PI<=p,M=g<=-Math.PI&&-Math.PI<=p||g<=Math.PI&&Math.PI<=p,w=g<=.5*-Math.PI&&.5*-Math.PI<=p||g<=1.5*Math.PI&&1.5*Math.PI<=p,S=h/100,C=M?-1:Math.min(m*(m<0?1:S),b*(b<0?1:S)),_=w?-1:Math.min(v*(v<0?1:S),x*(x<0?1:S)),D=y?1:Math.max(m*(m>0?1:S),b*(b>0?1:S)),I=k?1:Math.max(v*(v>0?1:S),x*(x>0?1:S)),P=.5*(D-C),A=.5*(I-_);u=Math.min(s/P,l/A),d={x:-.5*(D+C),y:-.5*(I+_)}}i.borderWidth=e.getMaxBorderWidth(c.data),i.outerRadius=Math.max((u-i.borderWidth)/2,0),i.innerRadius=Math.max(h?i.outerRadius/100*h:0,0),i.radiusLength=(i.outerRadius-i.innerRadius)/i.getVisibleDatasetCount(),i.offsetX=d.x*i.outerRadius,i.offsetY=d.y*i.outerRadius,c.total=e.calculateTotal(),e.outerRadius=i.outerRadius-i.radiusLength*e.getRingIndex(e.index),e.innerRadius=Math.max(e.outerRadius-i.radiusLength,0),o.each(c.data,function(i,n){e.updateElement(i,n,t)})},updateElement:function(t,e,i){var n=this,a=n.chart,r=a.chartArea,s=a.options,l=s.animation,u=(r.left+r.right)/2,d=(r.top+r.bottom)/2,c=s.rotation,h=s.rotation,f=n.getDataset(),g=i&&l.animateRotate?0:t.hidden?0:n.calculateCircumference(f.data[e])*(s.circumference/(2*Math.PI)),p=i&&l.animateScale?0:n.innerRadius,m=i&&l.animateScale?0:n.outerRadius,v=o.valueAtIndexOrDefault;o.extend(t,{_datasetIndex:n.index,_index:e,_model:{x:u+a.offsetX,y:d+a.offsetY,startAngle:c,endAngle:h,circumference:g,outerRadius:m,innerRadius:p,label:v(f.label,e,a.data.labels[e])}});var b=t._model;this.removeHoverStyle(t),i&&l.animateRotate||(b.startAngle=0===e?s.rotation:n.getMeta().data[e-1]._model.endAngle,b.endAngle=b.startAngle+b.circumference),t.pivot()},removeHoverStyle:function(e){t.DatasetController.prototype.removeHoverStyle.call(this,e,this.chart.options.elements.arc)},calculateTotal:function(){var t,e=this.getDataset(),i=this.getMeta(),n=0;return o.each(i.data,function(i,a){t=e.data[a],isNaN(t)||i.hidden||(n+=Math.abs(t))}),n},calculateCircumference:function(t){var e=this.getMeta().total;return e>0&&!isNaN(t)?2*Math.PI*(Math.abs(t)/e):0},getMaxBorderWidth:function(t){for(var e,i,n=0,a=this.index,o=t.length,r=0;r<o;r++)e=t[r]._model?t[r]._model.borderWidth:0,n=(i=t[r]._chart?t[r]._chart.config.data.datasets[a].hoverBorderWidth:0)>(n=e>n?e:n)?i:n;return n}})}},{25:25,40:40,45:45}],18:[function(t,e,i){"use strict";var n=t(25),a=t(40),o=t(45);n._set("line",{showLines:!0,spanGaps:!1,hover:{mode:"label"},scales:{xAxes:[{type:"category",id:"x-axis-0"}],yAxes:[{type:"linear",id:"y-axis-0"}]}}),e.exports=function(t){function e(t,e){return o.valueOrDefault(t.showLine,e.showLines)}t.controllers.line=t.DatasetController.extend({datasetElementType:a.Line,dataElementType:a.Point,update:function(t){var i,n,a,r=this,s=r.getMeta(),l=s.dataset,u=s.data||[],d=r.chart.options,c=d.elements.line,h=r.getScaleForId(s.yAxisID),f=r.getDataset(),g=e(f,d);for(g&&(a=l.custom||{},void 0!==f.tension&&void 0===f.lineTension&&(f.lineTension=f.tension),l._scale=h,l._datasetIndex=r.index,l._children=u,l._model={spanGaps:f.spanGaps?f.spanGaps:d.spanGaps,tension:a.tension?a.tension:o.valueOrDefault(f.lineTension,c.tension),backgroundColor:a.backgroundColor?a.backgroundColor:f.backgroundColor||c.backgroundColor,borderWidth:a.borderWidth?a.borderWidth:f.borderWidth||c.borderWidth,borderColor:a.borderColor?a.borderColor:f.borderColor||c.borderColor,borderCapStyle:a.borderCapStyle?a.borderCapStyle:f.borderCapStyle||c.borderCapStyle,borderDash:a.borderDash?a.borderDash:f.borderDash||c.borderDash,borderDashOffset:a.borderDashOffset?a.borderDashOffset:f.borderDashOffset||c.borderDashOffset,borderJoinStyle:a.borderJoinStyle?a.borderJoinStyle:f.borderJoinStyle||c.borderJoinStyle,fill:a.fill?a.fill:void 0!==f.fill?f.fill:c.fill,steppedLine:a.steppedLine?a.steppedLine:o.valueOrDefault(f.steppedLine,c.stepped),cubicInterpolationMode:a.cubicInterpolationMode?a.cubicInterpolationMode:o.valueOrDefault(f.cubicInterpolationMode,c.cubicInterpolationMode)},l.pivot()),i=0,n=u.length;i<n;++i)r.updateElement(u[i],i,t);for(g&&0!==l._model.tension&&r.updateBezierControlPoints(),i=0,n=u.length;i<n;++i)u[i].pivot()},getPointBackgroundColor:function(t,e){var i=this.chart.options.elements.point.backgroundColor,n=this.getDataset(),a=t.custom||{};return a.backgroundColor?i=a.backgroundColor:n.pointBackgroundColor?i=o.valueAtIndexOrDefault(n.pointBackgroundColor,e,i):n.backgroundColor&&(i=n.backgroundColor),i},getPointBorderColor:function(t,e){var i=this.chart.options.elements.point.borderColor,n=this.getDataset(),a=t.custom||{};return a.borderColor?i=a.borderColor:n.pointBorderColor?i=o.valueAtIndexOrDefault(n.pointBorderColor,e,i):n.borderColor&&(i=n.borderColor),i},getPointBorderWidth:function(t,e){var i=this.chart.options.elements.point.borderWidth,n=this.getDataset(),a=t.custom||{};return isNaN(a.borderWidth)?!isNaN(n.pointBorderWidth)||o.isArray(n.pointBorderWidth)?i=o.valueAtIndexOrDefault(n.pointBorderWidth,e,i):isNaN(n.borderWidth)||(i=n.borderWidth):i=a.borderWidth,i},updateElement:function(t,e,i){var n,a,r=this,s=r.getMeta(),l=t.custom||{},u=r.getDataset(),d=r.index,c=u.data[e],h=r.getScaleForId(s.yAxisID),f=r.getScaleForId(s.xAxisID),g=r.chart.options.elements.point;void 0!==u.radius&&void 0===u.pointRadius&&(u.pointRadius=u.radius),void 0!==u.hitRadius&&void 0===u.pointHitRadius&&(u.pointHitRadius=u.hitRadius),n=f.getPixelForValue("object"==typeof c?c:NaN,e,d),a=i?h.getBasePixel():r.calculatePointY(c,e,d),t._xScale=f,t._yScale=h,t._datasetIndex=d,t._index=e,t._model={x:n,y:a,skip:l.skip||isNaN(n)||isNaN(a),radius:l.radius||o.valueAtIndexOrDefault(u.pointRadius,e,g.radius),pointStyle:l.pointStyle||o.valueAtIndexOrDefault(u.pointStyle,e,g.pointStyle),backgroundColor:r.getPointBackgroundColor(t,e),borderColor:r.getPointBorderColor(t,e),borderWidth:r.getPointBorderWidth(t,e),tension:s.dataset._model?s.dataset._model.tension:0,steppedLine:!!s.dataset._model&&s.dataset._model.steppedLine,hitRadius:l.hitRadius||o.valueAtIndexOrDefault(u.pointHitRadius,e,g.hitRadius)}},calculatePointY:function(t,e,i){var n,a,o,r=this.chart,s=this.getMeta(),l=this.getScaleForId(s.yAxisID),u=0,d=0;if(l.options.stacked){for(n=0;n<i;n++)if(a=r.data.datasets[n],"line"===(o=r.getDatasetMeta(n)).type&&o.yAxisID===l.id&&r.isDatasetVisible(n)){var c=Number(l.getRightValue(a.data[e]));c<0?d+=c||0:u+=c||0}var h=Number(l.getRightValue(t));return h<0?l.getPixelForValue(d+h):l.getPixelForValue(u+h)}return l.getPixelForValue(t)},updateBezierControlPoints:function(){var t,e,i,n,a=this.getMeta(),r=this.chart.chartArea,s=a.data||[];function l(t,e,i){return Math.max(Math.min(t,i),e)}if(a.dataset._model.spanGaps&&(s=s.filter(function(t){return!t._model.skip})),"monotone"===a.dataset._model.cubicInterpolationMode)o.splineCurveMonotone(s);else for(t=0,e=s.length;t<e;++t)i=s[t]._model,n=o.splineCurve(o.previousItem(s,t)._model,i,o.nextItem(s,t)._model,a.dataset._model.tension),i.controlPointPreviousX=n.previous.x,i.controlPointPreviousY=n.previous.y,i.controlPointNextX=n.next.x,i.controlPointNextY=n.next.y;if(this.chart.options.elements.line.capBezierPoints)for(t=0,e=s.length;t<e;++t)(i=s[t]._model).controlPointPreviousX=l(i.controlPointPreviousX,r.left,r.right),i.controlPointPreviousY=l(i.controlPointPreviousY,r.top,r.bottom),i.controlPointNextX=l(i.controlPointNextX,r.left,r.right),i.controlPointNextY=l(i.controlPointNextY,r.top,r.bottom)},draw:function(){var t=this.chart,i=this.getMeta(),n=i.data||[],a=t.chartArea,r=n.length,s=0;for(o.canvas.clipArea(t.ctx,a),e(this.getDataset(),t.options)&&i.dataset.draw(),o.canvas.unclipArea(t.ctx);s<r;++s)n[s].draw(a)},setHoverStyle:function(t){var e=this.chart.data.datasets[t._datasetIndex],i=t._index,n=t.custom||{},a=t._model;a.radius=n.hoverRadius||o.valueAtIndexOrDefault(e.pointHoverRadius,i,this.chart.options.elements.point.hoverRadius),a.backgroundColor=n.hoverBackgroundColor||o.valueAtIndexOrDefault(e.pointHoverBackgroundColor,i,o.getHoverColor(a.backgroundColor)),a.borderColor=n.hoverBorderColor||o.valueAtIndexOrDefault(e.pointHoverBorderColor,i,o.getHoverColor(a.borderColor)),a.borderWidth=n.hoverBorderWidth||o.valueAtIndexOrDefault(e.pointHoverBorderWidth,i,a.borderWidth)},removeHoverStyle:function(t){var e=this,i=e.chart.data.datasets[t._datasetIndex],n=t._index,a=t.custom||{},r=t._model;void 0!==i.radius&&void 0===i.pointRadius&&(i.pointRadius=i.radius),r.radius=a.radius||o.valueAtIndexOrDefault(i.pointRadius,n,e.chart.options.elements.point.radius),r.backgroundColor=e.getPointBackgroundColor(t,n),r.borderColor=e.getPointBorderColor(t,n),r.borderWidth=e.getPointBorderWidth(t,n)}})}},{25:25,40:40,45:45}],19:[function(t,e,i){"use strict";var n=t(25),a=t(40),o=t(45);n._set("polarArea",{scale:{type:"radialLinear",angleLines:{display:!1},gridLines:{circular:!0},pointLabels:{display:!1},ticks:{beginAtZero:!0}},animation:{animateRotate:!0,animateScale:!0},startAngle:-.5*Math.PI,legendCallback:function(t){var e=[];e.push('<ul class="'+t.id+'-legend">');var i=t.data,n=i.datasets,a=i.labels;if(n.length)for(var o=0;o<n[0].data.length;++o)e.push('<li><span style="background-color:'+n[0].backgroundColor[o]+'"></span>'),a[o]&&e.push(a[o]),e.push("</li>");return e.push("</ul>"),e.join("")},legend:{labels:{generateLabels:function(t){var e=t.data;return e.labels.length&&e.datasets.length?e.labels.map(function(i,n){var a=t.getDatasetMeta(0),r=e.datasets[0],s=a.data[n].custom||{},l=o.valueAtIndexOrDefault,u=t.options.elements.arc;return{text:i,fillStyle:s.backgroundColor?s.backgroundColor:l(r.backgroundColor,n,u.backgroundColor),strokeStyle:s.borderColor?s.borderColor:l(r.borderColor,n,u.borderColor),lineWidth:s.borderWidth?s.borderWidth:l(r.borderWidth,n,u.borderWidth),hidden:isNaN(r.data[n])||a.data[n].hidden,index:n}}):[]}},onClick:function(t,e){var i,n,a,o=e.index,r=this.chart;for(i=0,n=(r.data.datasets||[]).length;i<n;++i)(a=r.getDatasetMeta(i)).data[o].hidden=!a.data[o].hidden;r.update()}},tooltips:{callbacks:{title:function(){return""},label:function(t,e){return e.labels[t.index]+": "+t.yLabel}}}}),e.exports=function(t){t.controllers.polarArea=t.DatasetController.extend({dataElementType:a.Arc,linkScales:o.noop,update:function(t){var e=this,i=e.chart,n=i.chartArea,a=e.getMeta(),r=i.options,s=r.elements.arc,l=Math.min(n.right-n.left,n.bottom-n.top);i.outerRadius=Math.max((l-s.borderWidth/2)/2,0),i.innerRadius=Math.max(r.cutoutPercentage?i.outerRadius/100*r.cutoutPercentage:1,0),i.radiusLength=(i.outerRadius-i.innerRadius)/i.getVisibleDatasetCount(),e.outerRadius=i.outerRadius-i.radiusLength*e.index,e.innerRadius=e.outerRadius-i.radiusLength,a.count=e.countVisibleElements(),o.each(a.data,function(i,n){e.updateElement(i,n,t)})},updateElement:function(t,e,i){for(var n=this,a=n.chart,r=n.getDataset(),s=a.options,l=s.animation,u=a.scale,d=a.data.labels,c=n.calculateCircumference(r.data[e]),h=u.xCenter,f=u.yCenter,g=0,p=n.getMeta(),m=0;m<e;++m)isNaN(r.data[m])||p.data[m].hidden||++g;var v=s.startAngle,b=t.hidden?0:u.getDistanceFromCenterForValue(r.data[e]),x=v+c*g,y=x+(t.hidden?0:c),k=l.animateScale?0:u.getDistanceFromCenterForValue(r.data[e]);o.extend(t,{_datasetIndex:n.index,_index:e,_scale:u,_model:{x:h,y:f,innerRadius:0,outerRadius:i?k:b,startAngle:i&&l.animateRotate?v:x,endAngle:i&&l.animateRotate?v:y,label:o.valueAtIndexOrDefault(d,e,d[e])}}),n.removeHoverStyle(t),t.pivot()},removeHoverStyle:function(e){t.DatasetController.prototype.removeHoverStyle.call(this,e,this.chart.options.elements.arc)},countVisibleElements:function(){var t=this.getDataset(),e=this.getMeta(),i=0;return o.each(e.data,function(e,n){isNaN(t.data[n])||e.hidden||i++}),i},calculateCircumference:function(t){var e=this.getMeta().count;return e>0&&!isNaN(t)?2*Math.PI/e:0}})}},{25:25,40:40,45:45}],20:[function(t,e,i){"use strict";var n=t(25),a=t(40),o=t(45);n._set("radar",{scale:{type:"radialLinear"},elements:{line:{tension:0}}}),e.exports=function(t){t.controllers.radar=t.DatasetController.extend({datasetElementType:a.Line,dataElementType:a.Point,linkScales:o.noop,update:function(t){var e=this,i=e.getMeta(),n=i.dataset,a=i.data,r=n.custom||{},s=e.getDataset(),l=e.chart.options.elements.line,u=e.chart.scale;void 0!==s.tension&&void 0===s.lineTension&&(s.lineTension=s.tension),o.extend(i.dataset,{_datasetIndex:e.index,_scale:u,_children:a,_loop:!0,_model:{tension:r.tension?r.tension:o.valueOrDefault(s.lineTension,l.tension),backgroundColor:r.backgroundColor?r.backgroundColor:s.backgroundColor||l.backgroundColor,borderWidth:r.borderWidth?r.borderWidth:s.borderWidth||l.borderWidth,borderColor:r.borderColor?r.borderColor:s.borderColor||l.borderColor,fill:r.fill?r.fill:void 0!==s.fill?s.fill:l.fill,borderCapStyle:r.borderCapStyle?r.borderCapStyle:s.borderCapStyle||l.borderCapStyle,borderDash:r.borderDash?r.borderDash:s.borderDash||l.borderDash,borderDashOffset:r.borderDashOffset?r.borderDashOffset:s.borderDashOffset||l.borderDashOffset,borderJoinStyle:r.borderJoinStyle?r.borderJoinStyle:s.borderJoinStyle||l.borderJoinStyle}}),i.dataset.pivot(),o.each(a,function(i,n){e.updateElement(i,n,t)},e),e.updateBezierControlPoints()},updateElement:function(t,e,i){var n=this,a=t.custom||{},r=n.getDataset(),s=n.chart.scale,l=n.chart.options.elements.point,u=s.getPointPositionForValue(e,r.data[e]);void 0!==r.radius&&void 0===r.pointRadius&&(r.pointRadius=r.radius),void 0!==r.hitRadius&&void 0===r.pointHitRadius&&(r.pointHitRadius=r.hitRadius),o.extend(t,{_datasetIndex:n.index,_index:e,_scale:s,_model:{x:i?s.xCenter:u.x,y:i?s.yCenter:u.y,tension:a.tension?a.tension:o.valueOrDefault(r.lineTension,n.chart.options.elements.line.tension),radius:a.radius?a.radius:o.valueAtIndexOrDefault(r.pointRadius,e,l.radius),backgroundColor:a.backgroundColor?a.backgroundColor:o.valueAtIndexOrDefault(r.pointBackgroundColor,e,l.backgroundColor),borderColor:a.borderColor?a.borderColor:o.valueAtIndexOrDefault(r.pointBorderColor,e,l.borderColor),borderWidth:a.borderWidth?a.borderWidth:o.valueAtIndexOrDefault(r.pointBorderWidth,e,l.borderWidth),pointStyle:a.pointStyle?a.pointStyle:o.valueAtIndexOrDefault(r.pointStyle,e,l.pointStyle),hitRadius:a.hitRadius?a.hitRadius:o.valueAtIndexOrDefault(r.pointHitRadius,e,l.hitRadius)}}),t._model.skip=a.skip?a.skip:isNaN(t._model.x)||isNaN(t._model.y)},updateBezierControlPoints:function(){var t=this.chart.chartArea,e=this.getMeta();o.each(e.data,function(i,n){var a=i._model,r=o.splineCurve(o.previousItem(e.data,n,!0)._model,a,o.nextItem(e.data,n,!0)._model,a.tension);a.controlPointPreviousX=Math.max(Math.min(r.previous.x,t.right),t.left),a.controlPointPreviousY=Math.max(Math.min(r.previous.y,t.bottom),t.top),a.controlPointNextX=Math.max(Math.min(r.next.x,t.right),t.left),a.controlPointNextY=Math.max(Math.min(r.next.y,t.bottom),t.top),i.pivot()})},setHoverStyle:function(t){var e=this.chart.data.datasets[t._datasetIndex],i=t.custom||{},n=t._index,a=t._model;a.radius=i.hoverRadius?i.hoverRadius:o.valueAtIndexOrDefault(e.pointHoverRadius,n,this.chart.options.elements.point.hoverRadius),a.backgroundColor=i.hoverBackgroundColor?i.hoverBackgroundColor:o.valueAtIndexOrDefault(e.pointHoverBackgroundColor,n,o.getHoverColor(a.backgroundColor)),a.borderColor=i.hoverBorderColor?i.hoverBorderColor:o.valueAtIndexOrDefault(e.pointHoverBorderColor,n,o.getHoverColor(a.borderColor)),a.borderWidth=i.hoverBorderWidth?i.hoverBorderWidth:o.valueAtIndexOrDefault(e.pointHoverBorderWidth,n,a.borderWidth)},removeHoverStyle:function(t){var e=this.chart.data.datasets[t._datasetIndex],i=t.custom||{},n=t._index,a=t._model,r=this.chart.options.elements.point;a.radius=i.radius?i.radius:o.valueAtIndexOrDefault(e.pointRadius,n,r.radius),a.backgroundColor=i.backgroundColor?i.backgroundColor:o.valueAtIndexOrDefault(e.pointBackgroundColor,n,r.backgroundColor),a.borderColor=i.borderColor?i.borderColor:o.valueAtIndexOrDefault(e.pointBorderColor,n,r.borderColor),a.borderWidth=i.borderWidth?i.borderWidth:o.valueAtIndexOrDefault(e.pointBorderWidth,n,r.borderWidth)}})}},{25:25,40:40,45:45}],21:[function(t,e,i){"use strict";t(25)._set("scatter",{hover:{mode:"single"},scales:{xAxes:[{id:"x-axis-1",type:"linear",position:"bottom"}],yAxes:[{id:"y-axis-1",type:"linear",position:"left"}]},showLines:!1,tooltips:{callbacks:{title:function(){return""},label:function(t){return"("+t.xLabel+", "+t.yLabel+")"}}}}),e.exports=function(t){t.controllers.scatter=t.controllers.line}},{25:25}],22:[function(t,e,i){"use strict";var n=t(25),a=t(26),o=t(45);n._set("global",{animation:{duration:1e3,easing:"easeOutQuart",onProgress:o.noop,onComplete:o.noop}}),e.exports=function(t){t.Animation=a.extend({chart:null,currentStep:0,numSteps:60,easing:"",render:null,onAnimationProgress:null,onAnimationComplete:null}),t.animationService={frameDuration:17,animations:[],dropFrames:0,request:null,addAnimation:function(t,e,i,n){var a,o,r=this.animations;for(e.chart=t,n||(t.animating=!0),a=0,o=r.length;a<o;++a)if(r[a].chart===t)return void(r[a]=e);r.push(e),1===r.length&&this.requestAnimationFrame()},cancelAnimation:function(t){var e=o.findIndex(this.animations,function(e){return e.chart===t});-1!==e&&(this.animations.splice(e,1),t.animating=!1)},requestAnimationFrame:function(){var t=this;null===t.request&&(t.request=o.requestAnimFrame.call(window,function(){t.request=null,t.startDigest()}))},startDigest:function(){var t=this,e=Date.now(),i=0;t.dropFrames>1&&(i=Math.floor(t.dropFrames),t.dropFrames=t.dropFrames%1),t.advance(1+i);var n=Date.now();t.dropFrames+=(n-e)/t.frameDuration,t.animations.length>0&&t.requestAnimationFrame()},advance:function(t){for(var e,i,n=this.animations,a=0;a<n.length;)i=(e=n[a]).chart,e.currentStep=(e.currentStep||0)+t,e.currentStep=Math.min(e.currentStep,e.numSteps),o.callback(e.render,[i,e],i),o.callback(e.onAnimationProgress,[e],i),e.currentStep>=e.numSteps?(o.callback(e.onAnimationComplete,[e],i),i.animating=!1,n.splice(a,1)):++a}},Object.defineProperty(t.Animation.prototype,"animationObject",{get:function(){return this}}),Object.defineProperty(t.Animation.prototype,"chartInstance",{get:function(){return this.chart},set:function(t){this.chart=t}})}},{25:25,26:26,45:45}],23:[function(t,e,i){"use strict";var n=t(25),a=t(45),o=t(28),r=t(30),s=t(48),l=t(31);e.exports=function(t){function e(t){return"top"===t||"bottom"===t}t.types={},t.instances={},t.controllers={},a.extend(t.prototype,{construct:function(e,i){var o,r,l=this;(r=(o=(o=i)||{}).data=o.data||{}).datasets=r.datasets||[],r.labels=r.labels||[],o.options=a.configMerge(n.global,n[o.type],o.options||{}),i=o;var u=s.acquireContext(e,i),d=u&&u.canvas,c=d&&d.height,h=d&&d.width;l.id=a.uid(),l.ctx=u,l.canvas=d,l.config=i,l.width=h,l.height=c,l.aspectRatio=c?h/c:null,l.options=i.options,l._bufferedRender=!1,l.chart=l,l.controller=l,t.instances[l.id]=l,Object.defineProperty(l,"data",{get:function(){return l.config.data},set:function(t){l.config.data=t}}),u&&d?(l.initialize(),l.update()):console.error("Failed to create chart: can't acquire context from the given item")},initialize:function(){var t=this;return l.notify(t,"beforeInit"),a.retinaScale(t,t.options.devicePixelRatio),t.bindEvents(),t.options.responsive&&t.resize(!0),t.ensureScalesHaveIDs(),t.buildOrUpdateScales(),t.initToolTip(),l.notify(t,"afterInit"),t},clear:function(){return a.canvas.clear(this),this},stop:function(){return t.animationService.cancelAnimation(this),this},resize:function(t){var e=this,i=e.options,n=e.canvas,o=i.maintainAspectRatio&&e.aspectRatio||null,r=Math.max(0,Math.floor(a.getMaximumWidth(n))),s=Math.max(0,Math.floor(o?r/o:a.getMaximumHeight(n)));if((e.width!==r||e.height!==s)&&(n.width=e.width=r,n.height=e.height=s,n.style.width=r+"px",n.style.height=s+"px",a.retinaScale(e,i.devicePixelRatio),!t)){var u={width:r,height:s};l.notify(e,"resize",[u]),e.options.onResize&&e.options.onResize(e,u),e.stop(),e.update(e.options.responsiveAnimationDuration)}},ensureScalesHaveIDs:function(){var t=this.options,e=t.scales||{},i=t.scale;a.each(e.xAxes,function(t,e){t.id=t.id||"x-axis-"+e}),a.each(e.yAxes,function(t,e){t.id=t.id||"y-axis-"+e}),i&&(i.id=i.id||"scale")},buildOrUpdateScales:function(){var i=this,n=i.options,o=i.scales||{},r=[],s=Object.keys(o).reduce(function(t,e){return t[e]=!1,t},{});n.scales&&(r=r.concat((n.scales.xAxes||[]).map(function(t){return{options:t,dtype:"category",dposition:"bottom"}}),(n.scales.yAxes||[]).map(function(t){return{options:t,dtype:"linear",dposition:"left"}}))),n.scale&&r.push({options:n.scale,dtype:"radialLinear",isDefault:!0,dposition:"chartArea"}),a.each(r,function(n){var r=n.options,l=r.id,u=a.valueOrDefault(r.type,n.dtype);e(r.position)!==e(n.dposition)&&(r.position=n.dposition),s[l]=!0;var d=null;if(l in o&&o[l].type===u)(d=o[l]).options=r,d.ctx=i.ctx,d.chart=i;else{var c=t.scaleService.getScaleConstructor(u);if(!c)return;d=new c({id:l,type:u,options:r,ctx:i.ctx,chart:i}),o[d.id]=d}d.mergeTicksOptions(),n.isDefault&&(i.scale=d)}),a.each(s,function(t,e){t||delete o[e]}),i.scales=o,t.scaleService.addScalesToLayout(this)},buildOrUpdateControllers:function(){var e=this,i=[],n=[];return a.each(e.data.datasets,function(a,o){var r=e.getDatasetMeta(o),s=a.type||e.config.type;if(r.type&&r.type!==s&&(e.destroyDatasetMeta(o),r=e.getDatasetMeta(o)),r.type=s,i.push(r.type),r.controller)r.controller.updateIndex(o),r.controller.linkScales();else{var l=t.controllers[r.type];if(void 0===l)throw new Error('"'+r.type+'" is not a chart type.');r.controller=new l(e,o),n.push(r.controller)}},e),n},resetElements:function(){var t=this;a.each(t.data.datasets,function(e,i){t.getDatasetMeta(i).controller.reset()},t)},reset:function(){this.resetElements(),this.tooltip.initialize()},update:function(e){var i,n,o=this;if(e&&"object"==typeof e||(e={duration:e,lazy:arguments[1]}),n=(i=o).options,a.each(i.scales,function(t){r.removeBox(i,t)}),n=a.configMerge(t.defaults.global,t.defaults[i.config.type],n),i.options=i.config.options=n,i.ensureScalesHaveIDs(),i.buildOrUpdateScales(),i.tooltip._options=n.tooltips,i.tooltip.initialize(),l._invalidate(o),!1!==l.notify(o,"beforeUpdate")){o.tooltip._data=o.data;var s=o.buildOrUpdateControllers();a.each(o.data.datasets,function(t,e){o.getDatasetMeta(e).controller.buildOrUpdateElements()},o),o.updateLayout(),o.options.animation&&o.options.animation.duration&&a.each(s,function(t){t.reset()}),o.updateDatasets(),o.tooltip.initialize(),o.lastActive=[],l.notify(o,"afterUpdate"),o._bufferedRender?o._bufferedRequest={duration:e.duration,easing:e.easing,lazy:e.lazy}:o.render(e)}},updateLayout:function(){!1!==l.notify(this,"beforeLayout")&&(r.update(this,this.width,this.height),l.notify(this,"afterScaleUpdate"),l.notify(this,"afterLayout"))},updateDatasets:function(){if(!1!==l.notify(this,"beforeDatasetsUpdate")){for(var t=0,e=this.data.datasets.length;t<e;++t)this.updateDataset(t);l.notify(this,"afterDatasetsUpdate")}},updateDataset:function(t){var e=this.getDatasetMeta(t),i={meta:e,index:t};!1!==l.notify(this,"beforeDatasetUpdate",[i])&&(e.controller.update(),l.notify(this,"afterDatasetUpdate",[i]))},render:function(e){var i=this;e&&"object"==typeof e||(e={duration:e,lazy:arguments[1]});var n=e.duration,o=e.lazy;if(!1!==l.notify(i,"beforeRender")){var r=i.options.animation,s=function(t){l.notify(i,"afterRender"),a.callback(r&&r.onComplete,[t],i)};if(r&&(void 0!==n&&0!==n||void 0===n&&0!==r.duration)){var u=new t.Animation({numSteps:(n||r.duration)/16.66,easing:e.easing||r.easing,render:function(t,e){var i=a.easing.effects[e.easing],n=e.currentStep,o=n/e.numSteps;t.draw(i(o),o,n)},onAnimationProgress:r.onProgress,onAnimationComplete:s});t.animationService.addAnimation(i,u,n,o)}else i.draw(),s(new t.Animation({numSteps:0,chart:i}));return i}},draw:function(t){var e=this;e.clear(),a.isNullOrUndef(t)&&(t=1),e.transition(t),!1!==l.notify(e,"beforeDraw",[t])&&(a.each(e.boxes,function(t){t.draw(e.chartArea)},e),e.scale&&e.scale.draw(),e.drawDatasets(t),e._drawTooltip(t),l.notify(e,"afterDraw",[t]))},transition:function(t){for(var e=0,i=(this.data.datasets||[]).length;e<i;++e)this.isDatasetVisible(e)&&this.getDatasetMeta(e).controller.transition(t);this.tooltip.transition(t)},drawDatasets:function(t){var e=this;if(!1!==l.notify(e,"beforeDatasetsDraw",[t])){for(var i=(e.data.datasets||[]).length-1;i>=0;--i)e.isDatasetVisible(i)&&e.drawDataset(i,t);l.notify(e,"afterDatasetsDraw",[t])}},drawDataset:function(t,e){var i=this.getDatasetMeta(t),n={meta:i,index:t,easingValue:e};!1!==l.notify(this,"beforeDatasetDraw",[n])&&(i.controller.draw(e),l.notify(this,"afterDatasetDraw",[n]))},_drawTooltip:function(t){var e=this.tooltip,i={tooltip:e,easingValue:t};!1!==l.notify(this,"beforeTooltipDraw",[i])&&(e.draw(),l.notify(this,"afterTooltipDraw",[i]))},getElementAtEvent:function(t){return o.modes.single(this,t)},getElementsAtEvent:function(t){return o.modes.label(this,t,{intersect:!0})},getElementsAtXAxis:function(t){return o.modes["x-axis"](this,t,{intersect:!0})},getElementsAtEventForMode:function(t,e,i){var n=o.modes[e];return"function"==typeof n?n(this,t,i):[]},getDatasetAtEvent:function(t){return o.modes.dataset(this,t,{intersect:!0})},getDatasetMeta:function(t){var e=this.data.datasets[t];e._meta||(e._meta={});var i=e._meta[this.id];return i||(i=e._meta[this.id]={type:null,data:[],dataset:null,controller:null,hidden:null,xAxisID:null,yAxisID:null}),i},getVisibleDatasetCount:function(){for(var t=0,e=0,i=this.data.datasets.length;e<i;++e)this.isDatasetVisible(e)&&t++;return t},isDatasetVisible:function(t){var e=this.getDatasetMeta(t);return"boolean"==typeof e.hidden?!e.hidden:!this.data.datasets[t].hidden},generateLegend:function(){return this.options.legendCallback(this)},destroyDatasetMeta:function(t){var e=this.id,i=this.data.datasets[t],n=i._meta&&i._meta[e];n&&(n.controller.destroy(),delete i._meta[e])},destroy:function(){var e,i,n=this,o=n.canvas;for(n.stop(),e=0,i=n.data.datasets.length;e<i;++e)n.destroyDatasetMeta(e);o&&(n.unbindEvents(),a.canvas.clear(n),s.releaseContext(n.ctx),n.canvas=null,n.ctx=null),l.notify(n,"destroy"),delete t.instances[n.id]},toBase64Image:function(){return this.canvas.toDataURL.apply(this.canvas,arguments)},initToolTip:function(){var e=this;e.tooltip=new t.Tooltip({_chart:e,_chartInstance:e,_data:e.data,_options:e.options.tooltips},e)},bindEvents:function(){var t=this,e=t._listeners={},i=function(){t.eventHandler.apply(t,arguments)};a.each(t.options.events,function(n){s.addEventListener(t,n,i),e[n]=i}),t.options.responsive&&(i=function(){t.resize()},s.addEventListener(t,"resize",i),e.resize=i)},unbindEvents:function(){var t=this,e=t._listeners;e&&(delete t._listeners,a.each(e,function(e,i){s.removeEventListener(t,i,e)}))},updateHoverStyle:function(t,e,i){var n,a,o,r=i?"setHoverStyle":"removeHoverStyle";for(a=0,o=t.length;a<o;++a)(n=t[a])&&this.getDatasetMeta(n._datasetIndex).controller[r](n)},eventHandler:function(t){var e=this,i=e.tooltip;if(!1!==l.notify(e,"beforeEvent",[t])){e._bufferedRender=!0,e._bufferedRequest=null;var n=e.handleEvent(t);i&&(n=i._start?i.handleEvent(t):n|i.handleEvent(t)),l.notify(e,"afterEvent",[t]);var a=e._bufferedRequest;return a?e.render(a):n&&!e.animating&&(e.stop(),e.render(e.options.hover.animationDuration,!0)),e._bufferedRender=!1,e._bufferedRequest=null,e}},handleEvent:function(t){var e,i=this,n=i.options||{},o=n.hover;return i.lastActive=i.lastActive||[],"mouseout"===t.type?i.active=[]:i.active=i.getElementsAtEventForMode(t,o.mode,o),a.callback(n.onHover||n.hover.onHover,[t.native,i.active],i),"mouseup"!==t.type&&"click"!==t.type||n.onClick&&n.onClick.call(i,t.native,i.active),i.lastActive.length&&i.updateHoverStyle(i.lastActive,o.mode,!1),i.active.length&&o.mode&&i.updateHoverStyle(i.active,o.mode,!0),e=!a.arrayEquals(i.active,i.lastActive),i.lastActive=i.active,e}}),t.Controller=t}},{25:25,28:28,30:30,31:31,45:45,48:48}],24:[function(t,e,i){"use strict";var n=t(45);e.exports=function(t){var e=["push","pop","shift","splice","unshift"];function i(t,i){var n=t._chartjs;if(n){var a=n.listeners,o=a.indexOf(i);-1!==o&&a.splice(o,1),a.length>0||(e.forEach(function(e){delete t[e]}),delete t._chartjs)}}t.DatasetController=function(t,e){this.initialize(t,e)},n.extend(t.DatasetController.prototype,{datasetElementType:null,dataElementType:null,initialize:function(t,e){this.chart=t,this.index=e,this.linkScales(),this.addElements()},updateIndex:function(t){this.index=t},linkScales:function(){var t=this,e=t.getMeta(),i=t.getDataset();null!==e.xAxisID&&e.xAxisID in t.chart.scales||(e.xAxisID=i.xAxisID||t.chart.options.scales.xAxes[0].id),null!==e.yAxisID&&e.yAxisID in t.chart.scales||(e.yAxisID=i.yAxisID||t.chart.options.scales.yAxes[0].id)},getDataset:function(){return this.chart.data.datasets[this.index]},getMeta:function(){return this.chart.getDatasetMeta(this.index)},getScaleForId:function(t){return this.chart.scales[t]},reset:function(){this.update(!0)},destroy:function(){this._data&&i(this._data,this)},createMetaDataset:function(){var t=this.datasetElementType;return t&&new t({_chart:this.chart,_datasetIndex:this.index})},createMetaData:function(t){var e=this.dataElementType;return e&&new e({_chart:this.chart,_datasetIndex:this.index,_index:t})},addElements:function(){var t,e,i=this.getMeta(),n=this.getDataset().data||[],a=i.data;for(t=0,e=n.length;t<e;++t)a[t]=a[t]||this.createMetaData(t);i.dataset=i.dataset||this.createMetaDataset()},addElementAndReset:function(t){var e=this.createMetaData(t);this.getMeta().data.splice(t,0,e),this.updateElement(e,t,!0)},buildOrUpdateElements:function(){var t,a,o=this,r=o.getDataset(),s=r.data||(r.data=[]);o._data!==s&&(o._data&&i(o._data,o),a=o,(t=s)._chartjs?t._chartjs.listeners.push(a):(Object.defineProperty(t,"_chartjs",{configurable:!0,enumerable:!1,value:{listeners:[a]}}),e.forEach(function(e){var i="onData"+e.charAt(0).toUpperCase()+e.slice(1),a=t[e];Object.defineProperty(t,e,{configurable:!0,enumerable:!1,value:function(){var e=Array.prototype.slice.call(arguments),o=a.apply(this,e);return n.each(t._chartjs.listeners,function(t){"function"==typeof t[i]&&t[i].apply(t,e)}),o}})})),o._data=s),o.resyncElements()},update:n.noop,transition:function(t){for(var e=this.getMeta(),i=e.data||[],n=i.length,a=0;a<n;++a)i[a].transition(t);e.dataset&&e.dataset.transition(t)},draw:function(){var t=this.getMeta(),e=t.data||[],i=e.length,n=0;for(t.dataset&&t.dataset.draw();n<i;++n)e[n].draw()},removeHoverStyle:function(t,e){var i=this.chart.data.datasets[t._datasetIndex],a=t._index,o=t.custom||{},r=n.valueAtIndexOrDefault,s=t._model;s.backgroundColor=o.backgroundColor?o.backgroundColor:r(i.backgroundColor,a,e.backgroundColor),s.borderColor=o.borderColor?o.borderColor:r(i.borderColor,a,e.borderColor),s.borderWidth=o.borderWidth?o.borderWidth:r(i.borderWidth,a,e.borderWidth)},setHoverStyle:function(t){var e=this.chart.data.datasets[t._datasetIndex],i=t._index,a=t.custom||{},o=n.valueAtIndexOrDefault,r=n.getHoverColor,s=t._model;s.backgroundColor=a.hoverBackgroundColor?a.hoverBackgroundColor:o(e.hoverBackgroundColor,i,r(s.backgroundColor)),s.borderColor=a.hoverBorderColor?a.hoverBorderColor:o(e.hoverBorderColor,i,r(s.borderColor)),s.borderWidth=a.hoverBorderWidth?a.hoverBorderWidth:o(e.hoverBorderWidth,i,s.borderWidth)},resyncElements:function(){var t=this.getMeta(),e=this.getDataset().data,i=t.data.length,n=e.length;n<i?t.data.splice(n,i-n):n>i&&this.insertElements(i,n-i)},insertElements:function(t,e){for(var i=0;i<e;++i)this.addElementAndReset(t+i)},onDataPush:function(){this.insertElements(this.getDataset().data.length-1,arguments.length)},onDataPop:function(){this.getMeta().data.pop()},onDataShift:function(){this.getMeta().data.shift()},onDataSplice:function(t,e){this.getMeta().data.splice(t,e),this.insertElements(t,arguments.length-2)},onDataUnshift:function(){this.insertElements(0,arguments.length)}}),t.DatasetController.extend=n.inherits}},{45:45}],25:[function(t,e,i){"use strict";var n=t(45);e.exports={_set:function(t,e){return n.merge(this[t]||(this[t]={}),e)}}},{45:45}],26:[function(t,e,i){"use strict";var n=t(3),a=t(45);var o=function(t){a.extend(this,t),this.initialize.apply(this,arguments)};a.extend(o.prototype,{initialize:function(){this.hidden=!1},pivot:function(){var t=this;return t._view||(t._view=a.clone(t._model)),t._start={},t},transition:function(t){var e=this,i=e._model,a=e._start,o=e._view;return i&&1!==t?(o||(o=e._view={}),a||(a=e._start={}),function(t,e,i,a){var o,r,s,l,u,d,c,h,f,g=Object.keys(i);for(o=0,r=g.length;o<r;++o)if(d=i[s=g[o]],e.hasOwnProperty(s)||(e[s]=d),(l=e[s])!==d&&"_"!==s[0]){if(t.hasOwnProperty(s)||(t[s]=l),(c=typeof d)==typeof(u=t[s]))if("string"===c){if((h=n(u)).valid&&(f=n(d)).valid){e[s]=f.mix(h,a).rgbString();continue}}else if("number"===c&&isFinite(u)&&isFinite(d)){e[s]=u+(d-u)*a;continue}e[s]=d}}(a,o,i,t),e):(e._view=i,e._start=null,e)},tooltipPosition:function(){return{x:this._model.x,y:this._model.y}},hasValue:function(){return a.isNumber(this._model.x)&&a.isNumber(this._model.y)}}),o.extend=a.inherits,e.exports=o},{3:3,45:45}],27:[function(t,e,i){"use strict";var n=t(3),a=t(25),o=t(45);e.exports=function(t){function e(t,e,i){var n;return"string"==typeof t?(n=parseInt(t,10),-1!==t.indexOf("%")&&(n=n/100*e.parentNode[i])):n=t,n}function i(t){return null!=t&&"none"!==t}function r(t,n,a){var o=document.defaultView,r=t.parentNode,s=o.getComputedStyle(t)[n],l=o.getComputedStyle(r)[n],u=i(s),d=i(l),c=Number.POSITIVE_INFINITY;return u||d?Math.min(u?e(s,t,a):c,d?e(l,r,a):c):"none"}o.configMerge=function(){return o.merge(o.clone(arguments[0]),[].slice.call(arguments,1),{merger:function(e,i,n,a){var r=i[e]||{},s=n[e];"scales"===e?i[e]=o.scaleMerge(r,s):"scale"===e?i[e]=o.merge(r,[t.scaleService.getScaleDefaults(s.type),s]):o._merger(e,i,n,a)}})},o.scaleMerge=function(){return o.merge(o.clone(arguments[0]),[].slice.call(arguments,1),{merger:function(e,i,n,a){if("xAxes"===e||"yAxes"===e){var r,s,l,u=n[e].length;for(i[e]||(i[e]=[]),r=0;r<u;++r)l=n[e][r],s=o.valueOrDefault(l.type,"xAxes"===e?"category":"linear"),r>=i[e].length&&i[e].push({}),!i[e][r].type||l.type&&l.type!==i[e][r].type?o.merge(i[e][r],[t.scaleService.getScaleDefaults(s),l]):o.merge(i[e][r],l)}else o._merger(e,i,n,a)}})},o.where=function(t,e){if(o.isArray(t)&&Array.prototype.filter)return t.filter(e);var i=[];return o.each(t,function(t){e(t)&&i.push(t)}),i},o.findIndex=Array.prototype.findIndex?function(t,e,i){return t.findIndex(e,i)}:function(t,e,i){i=void 0===i?t:i;for(var n=0,a=t.length;n<a;++n)if(e.call(i,t[n],n,t))return n;return-1},o.findNextWhere=function(t,e,i){o.isNullOrUndef(i)&&(i=-1);for(var n=i+1;n<t.length;n++){var a=t[n];if(e(a))return a}},o.findPreviousWhere=function(t,e,i){o.isNullOrUndef(i)&&(i=t.length);for(var n=i-1;n>=0;n--){var a=t[n];if(e(a))return a}},o.isNumber=function(t){return!isNaN(parseFloat(t))&&isFinite(t)},o.almostEquals=function(t,e,i){return Math.abs(t-e)<i},o.almostWhole=function(t,e){var i=Math.round(t);return i-e<t&&i+e>t},o.max=function(t){return t.reduce(function(t,e){return isNaN(e)?t:Math.max(t,e)},Number.NEGATIVE_INFINITY)},o.min=function(t){return t.reduce(function(t,e){return isNaN(e)?t:Math.min(t,e)},Number.POSITIVE_INFINITY)},o.sign=Math.sign?function(t){return Math.sign(t)}:function(t){return 0===(t=+t)||isNaN(t)?t:t>0?1:-1},o.log10=Math.log10?function(t){return Math.log10(t)}:function(t){var e=Math.log(t)*Math.LOG10E,i=Math.round(e);return t===Math.pow(10,i)?i:e},o.toRadians=function(t){return t*(Math.PI/180)},o.toDegrees=function(t){return t*(180/Math.PI)},o.getAngleFromPoint=function(t,e){var i=e.x-t.x,n=e.y-t.y,a=Math.sqrt(i*i+n*n),o=Math.atan2(n,i);return o<-.5*Math.PI&&(o+=2*Math.PI),{angle:o,distance:a}},o.distanceBetweenPoints=function(t,e){return Math.sqrt(Math.pow(e.x-t.x,2)+Math.pow(e.y-t.y,2))},o.aliasPixel=function(t){return t%2==0?0:.5},o.splineCurve=function(t,e,i,n){var a=t.skip?e:t,o=e,r=i.skip?e:i,s=Math.sqrt(Math.pow(o.x-a.x,2)+Math.pow(o.y-a.y,2)),l=Math.sqrt(Math.pow(r.x-o.x,2)+Math.pow(r.y-o.y,2)),u=s/(s+l),d=l/(s+l),c=n*(u=isNaN(u)?0:u),h=n*(d=isNaN(d)?0:d);return{previous:{x:o.x-c*(r.x-a.x),y:o.y-c*(r.y-a.y)},next:{x:o.x+h*(r.x-a.x),y:o.y+h*(r.y-a.y)}}},o.EPSILON=Number.EPSILON||1e-14,o.splineCurveMonotone=function(t){var e,i,n,a,r,s,l,u,d,c=(t||[]).map(function(t){return{model:t._model,deltaK:0,mK:0}}),h=c.length;for(e=0;e<h;++e)if(!(n=c[e]).model.skip){if(i=e>0?c[e-1]:null,(a=e<h-1?c[e+1]:null)&&!a.model.skip){var f=a.model.x-n.model.x;n.deltaK=0!==f?(a.model.y-n.model.y)/f:0}!i||i.model.skip?n.mK=n.deltaK:!a||a.model.skip?n.mK=i.deltaK:this.sign(i.deltaK)!==this.sign(n.deltaK)?n.mK=0:n.mK=(i.deltaK+n.deltaK)/2}for(e=0;e<h-1;++e)n=c[e],a=c[e+1],n.model.skip||a.model.skip||(o.almostEquals(n.deltaK,0,this.EPSILON)?n.mK=a.mK=0:(r=n.mK/n.deltaK,s=a.mK/n.deltaK,(u=Math.pow(r,2)+Math.pow(s,2))<=9||(l=3/Math.sqrt(u),n.mK=r*l*n.deltaK,a.mK=s*l*n.deltaK)));for(e=0;e<h;++e)(n=c[e]).model.skip||(i=e>0?c[e-1]:null,a=e<h-1?c[e+1]:null,i&&!i.model.skip&&(d=(n.model.x-i.model.x)/3,n.model.controlPointPreviousX=n.model.x-d,n.model.controlPointPreviousY=n.model.y-d*n.mK),a&&!a.model.skip&&(d=(a.model.x-n.model.x)/3,n.model.controlPointNextX=n.model.x+d,n.model.controlPointNextY=n.model.y+d*n.mK))},o.nextItem=function(t,e,i){return i?e>=t.length-1?t[0]:t[e+1]:e>=t.length-1?t[t.length-1]:t[e+1]},o.previousItem=function(t,e,i){return i?e<=0?t[t.length-1]:t[e-1]:e<=0?t[0]:t[e-1]},o.niceNum=function(t,e){var i=Math.floor(o.log10(t)),n=t/Math.pow(10,i);return(e?n<1.5?1:n<3?2:n<7?5:10:n<=1?1:n<=2?2:n<=5?5:10)*Math.pow(10,i)},o.requestAnimFrame="undefined"==typeof window?function(t){t()}:window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(t){return window.setTimeout(t,1e3/60)},o.getRelativePosition=function(t,e){var i,n,a=t.originalEvent||t,r=t.currentTarget||t.srcElement,s=r.getBoundingClientRect(),l=a.touches;l&&l.length>0?(i=l[0].clientX,n=l[0].clientY):(i=a.clientX,n=a.clientY);var u=parseFloat(o.getStyle(r,"padding-left")),d=parseFloat(o.getStyle(r,"padding-top")),c=parseFloat(o.getStyle(r,"padding-right")),h=parseFloat(o.getStyle(r,"padding-bottom")),f=s.right-s.left-u-c,g=s.bottom-s.top-d-h;return{x:i=Math.round((i-s.left-u)/f*r.width/e.currentDevicePixelRatio),y:n=Math.round((n-s.top-d)/g*r.height/e.currentDevicePixelRatio)}},o.getConstraintWidth=function(t){return r(t,"max-width","clientWidth")},o.getConstraintHeight=function(t){return r(t,"max-height","clientHeight")},o.getMaximumWidth=function(t){var e=t.parentNode;if(!e)return t.clientWidth;var i=parseInt(o.getStyle(e,"padding-left"),10),n=parseInt(o.getStyle(e,"padding-right"),10),a=e.clientWidth-i-n,r=o.getConstraintWidth(t);return isNaN(r)?a:Math.min(a,r)},o.getMaximumHeight=function(t){var e=t.parentNode;if(!e)return t.clientHeight;var i=parseInt(o.getStyle(e,"padding-top"),10),n=parseInt(o.getStyle(e,"padding-bottom"),10),a=e.clientHeight-i-n,r=o.getConstraintHeight(t);return isNaN(r)?a:Math.min(a,r)},o.getStyle=function(t,e){return t.currentStyle?t.currentStyle[e]:document.defaultView.getComputedStyle(t,null).getPropertyValue(e)},o.retinaScale=function(t,e){var i=t.currentDevicePixelRatio=e||window.devicePixelRatio||1;if(1!==i){var n=t.canvas,a=t.height,o=t.width;n.height=a*i,n.width=o*i,t.ctx.scale(i,i),n.style.height||n.style.width||(n.style.height=a+"px",n.style.width=o+"px")}},o.fontString=function(t,e,i){return e+" "+t+"px "+i},o.longestText=function(t,e,i,n){var a=(n=n||{}).data=n.data||{},r=n.garbageCollect=n.garbageCollect||[];n.font!==e&&(a=n.data={},r=n.garbageCollect=[],n.font=e),t.font=e;var s=0;o.each(i,function(e){null!=e&&!0!==o.isArray(e)?s=o.measureText(t,a,r,s,e):o.isArray(e)&&o.each(e,function(e){null==e||o.isArray(e)||(s=o.measureText(t,a,r,s,e))})});var l=r.length/2;if(l>i.length){for(var u=0;u<l;u++)delete a[r[u]];r.splice(0,l)}return s},o.measureText=function(t,e,i,n,a){var o=e[a];return o||(o=e[a]=t.measureText(a).width,i.push(a)),o>n&&(n=o),n},o.numberOfLabelLines=function(t){var e=1;return o.each(t,function(t){o.isArray(t)&&t.length>e&&(e=t.length)}),e},o.color=n?function(t){return t instanceof CanvasGradient&&(t=a.global.defaultColor),n(t)}:function(t){return console.error("Color.js not found!"),t},o.getHoverColor=function(t){return t instanceof CanvasPattern?t:o.color(t).saturate(.5).darken(.1).rgbString()}}},{25:25,3:3,45:45}],28:[function(t,e,i){"use strict";var n=t(45);function a(t,e){return t.native?{x:t.x,y:t.y}:n.getRelativePosition(t,e)}function o(t,e){var i,n,a,o,r;for(n=0,o=t.data.datasets.length;n<o;++n)if(t.isDatasetVisible(n))for(a=0,r=(i=t.getDatasetMeta(n)).data.length;a<r;++a){var s=i.data[a];s._view.skip||e(s)}}function r(t,e){var i=[];return o(t,function(t){t.inRange(e.x,e.y)&&i.push(t)}),i}function s(t,e,i,n){var a=Number.POSITIVE_INFINITY,r=[];return o(t,function(t){if(!i||t.inRange(e.x,e.y)){var o=t.getCenterPoint(),s=n(e,o);s<a?(r=[t],a=s):s===a&&r.push(t)}}),r}function l(t){var e=-1!==t.indexOf("x"),i=-1!==t.indexOf("y");return function(t,n){var a=e?Math.abs(t.x-n.x):0,o=i?Math.abs(t.y-n.y):0;return Math.sqrt(Math.pow(a,2)+Math.pow(o,2))}}function u(t,e,i){var n=a(e,t);i.axis=i.axis||"x";var o=l(i.axis),u=i.intersect?r(t,n):s(t,n,!1,o),d=[];return u.length?(t.data.datasets.forEach(function(e,i){if(t.isDatasetVisible(i)){var n=t.getDatasetMeta(i).data[u[0]._index];n&&!n._view.skip&&d.push(n)}}),d):[]}e.exports={modes:{single:function(t,e){var i=a(e,t),n=[];return o(t,function(t){if(t.inRange(i.x,i.y))return n.push(t),n}),n.slice(0,1)},label:u,index:u,dataset:function(t,e,i){var n=a(e,t);i.axis=i.axis||"xy";var o=l(i.axis),u=i.intersect?r(t,n):s(t,n,!1,o);return u.length>0&&(u=t.getDatasetMeta(u[0]._datasetIndex).data),u},"x-axis":function(t,e){return u(t,e,{intersect:!1})},point:function(t,e){return r(t,a(e,t))},nearest:function(t,e,i){var n=a(e,t);i.axis=i.axis||"xy";var o=l(i.axis),r=s(t,n,i.intersect,o);return r.length>1&&r.sort(function(t,e){var i=t.getArea()-e.getArea();return 0===i&&(i=t._datasetIndex-e._datasetIndex),i}),r.slice(0,1)},x:function(t,e,i){var n=a(e,t),r=[],s=!1;return o(t,function(t){t.inXRange(n.x)&&r.push(t),t.inRange(n.x,n.y)&&(s=!0)}),i.intersect&&!s&&(r=[]),r},y:function(t,e,i){var n=a(e,t),r=[],s=!1;return o(t,function(t){t.inYRange(n.y)&&r.push(t),t.inRange(n.x,n.y)&&(s=!0)}),i.intersect&&!s&&(r=[]),r}}}},{45:45}],29:[function(t,e,i){"use strict";t(25)._set("global",{responsive:!0,responsiveAnimationDuration:0,maintainAspectRatio:!0,events:["mousemove","mouseout","click","touchstart","touchmove"],hover:{onHover:null,mode:"nearest",intersect:!0,animationDuration:400},onClick:null,defaultColor:"rgba(0,0,0,0.1)",defaultFontColor:"#666",defaultFontFamily:"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",defaultFontSize:12,defaultFontStyle:"normal",showLines:!0,elements:{},layout:{padding:{top:0,right:0,bottom:0,left:0}}}),e.exports=function(){var t=function(t,e){return this.construct(t,e),this};return t.Chart=t,t}},{25:25}],30:[function(t,e,i){"use strict";var n=t(45);function a(t,e){return n.where(t,function(t){return t.position===e})}function o(t,e){t.forEach(function(t,e){return t._tmpIndex_=e,t}),t.sort(function(t,i){var n=e?i:t,a=e?t:i;return n.weight===a.weight?n._tmpIndex_-a._tmpIndex_:n.weight-a.weight}),t.forEach(function(t){delete t._tmpIndex_})}e.exports={defaults:{},addBox:function(t,e){t.boxes||(t.boxes=[]),e.fullWidth=e.fullWidth||!1,e.position=e.position||"top",e.weight=e.weight||0,t.boxes.push(e)},removeBox:function(t,e){var i=t.boxes?t.boxes.indexOf(e):-1;-1!==i&&t.boxes.splice(i,1)},configure:function(t,e,i){for(var n,a=["fullWidth","position","weight"],o=a.length,r=0;r<o;++r)n=a[r],i.hasOwnProperty(n)&&(e[n]=i[n])},update:function(t,e,i){if(t){var r=t.options.layout||{},s=n.options.toPadding(r.padding),l=s.left,u=s.right,d=s.top,c=s.bottom,h=a(t.boxes,"left"),f=a(t.boxes,"right"),g=a(t.boxes,"top"),p=a(t.boxes,"bottom"),m=a(t.boxes,"chartArea");o(h,!0),o(f,!1),o(g,!0),o(p,!1);var v=e-l-u,b=i-d-c,x=b/2,y=(e-v/2)/(h.length+f.length),k=(i-x)/(g.length+p.length),M=v,w=b,S=[];n.each(h.concat(f,g,p),function(t){var e,i=t.isHorizontal();i?(e=t.update(t.fullWidth?v:M,k),w-=e.height):(e=t.update(y,w),M-=e.width),S.push({horizontal:i,minSize:e,box:t})});var C=0,_=0,D=0,I=0;n.each(g.concat(p),function(t){if(t.getPadding){var e=t.getPadding();C=Math.max(C,e.left),_=Math.max(_,e.right)}}),n.each(h.concat(f),function(t){if(t.getPadding){var e=t.getPadding();D=Math.max(D,e.top),I=Math.max(I,e.bottom)}});var P=l,A=u,T=d,F=c;n.each(h.concat(f),N),n.each(h,function(t){P+=t.width}),n.each(f,function(t){A+=t.width}),n.each(g.concat(p),N),n.each(g,function(t){T+=t.height}),n.each(p,function(t){F+=t.height}),n.each(h.concat(f),function(t){var e=n.findNextWhere(S,function(e){return e.box===t}),i={left:0,right:0,top:T,bottom:F};e&&t.update(e.minSize.width,w,i)}),P=l,A=u,T=d,F=c,n.each(h,function(t){P+=t.width}),n.each(f,function(t){A+=t.width}),n.each(g,function(t){T+=t.height}),n.each(p,function(t){F+=t.height});var O=Math.max(C-P,0);P+=O,A+=Math.max(_-A,0);var R=Math.max(D-T,0);T+=R,F+=Math.max(I-F,0);var L=i-T-F,z=e-P-A;z===M&&L===w||(n.each(h,function(t){t.height=L}),n.each(f,function(t){t.height=L}),n.each(g,function(t){t.fullWidth||(t.width=z)}),n.each(p,function(t){t.fullWidth||(t.width=z)}),w=L,M=z);var B=l+O,W=d+R;n.each(h.concat(g),V),B+=M,W+=w,n.each(f,V),n.each(p,V),t.chartArea={left:P,top:T,right:P+M,bottom:T+w},n.each(m,function(e){e.left=t.chartArea.left,e.top=t.chartArea.top,e.right=t.chartArea.right,e.bottom=t.chartArea.bottom,e.update(M,w)})}function N(t){var e=n.findNextWhere(S,function(e){return e.box===t});if(e)if(t.isHorizontal()){var i={left:Math.max(P,C),right:Math.max(A,_),top:0,bottom:0};t.update(t.fullWidth?v:M,b/2,i)}else t.update(e.minSize.width,w)}function V(t){t.isHorizontal()?(t.left=t.fullWidth?l:P,t.right=t.fullWidth?e-u:P+M,t.top=W,t.bottom=W+t.height,W=t.bottom):(t.left=B,t.right=B+t.width,t.top=T,t.bottom=T+w,B=t.right)}}}},{45:45}],31:[function(t,e,i){"use strict";var n=t(25),a=t(45);n._set("global",{plugins:{}}),e.exports={_plugins:[],_cacheId:0,register:function(t){var e=this._plugins;[].concat(t).forEach(function(t){-1===e.indexOf(t)&&e.push(t)}),this._cacheId++},unregister:function(t){var e=this._plugins;[].concat(t).forEach(function(t){var i=e.indexOf(t);-1!==i&&e.splice(i,1)}),this._cacheId++},clear:function(){this._plugins=[],this._cacheId++},count:function(){return this._plugins.length},getAll:function(){return this._plugins},notify:function(t,e,i){var n,a,o,r,s,l=this.descriptors(t),u=l.length;for(n=0;n<u;++n)if("function"==typeof(s=(o=(a=l[n]).plugin)[e])&&((r=[t].concat(i||[])).push(a.options),!1===s.apply(o,r)))return!1;return!0},descriptors:function(t){var e=t.$plugins||(t.$plugins={});if(e.id===this._cacheId)return e.descriptors;var i=[],o=[],r=t&&t.config||{},s=r.options&&r.options.plugins||{};return this._plugins.concat(r.plugins||[]).forEach(function(t){if(-1===i.indexOf(t)){var e=t.id,r=s[e];!1!==r&&(!0===r&&(r=a.clone(n.global.plugins[e])),i.push(t),o.push({plugin:t,options:r||{}}))}}),e.descriptors=o,e.id=this._cacheId,o},_invalidate:function(t){delete t.$plugins}}},{25:25,45:45}],32:[function(t,e,i){"use strict";var n=t(25),a=t(26),o=t(45),r=t(34);function s(t){var e,i,n=[];for(e=0,i=t.length;e<i;++e)n.push(t[e].label);return n}function l(t,e,i){var n=t.getPixelForTick(e);return i&&(n-=0===e?(t.getPixelForTick(1)-n)/2:(n-t.getPixelForTick(e-1))/2),n}n._set("scale",{display:!0,position:"left",offset:!1,gridLines:{display:!0,color:"rgba(0, 0, 0, 0.1)",lineWidth:1,drawBorder:!0,drawOnChartArea:!0,drawTicks:!0,tickMarkLength:10,zeroLineWidth:1,zeroLineColor:"rgba(0,0,0,0.25)",zeroLineBorderDash:[],zeroLineBorderDashOffset:0,offsetGridLines:!1,borderDash:[],borderDashOffset:0},scaleLabel:{display:!1,labelString:"",lineHeight:1.2,padding:{top:4,bottom:4}},ticks:{beginAtZero:!1,minRotation:0,maxRotation:50,mirror:!1,padding:0,reverse:!1,display:!0,autoSkip:!0,autoSkipPadding:0,labelOffset:0,callback:r.formatters.values,minor:{},major:{}}}),e.exports=function(t){function e(t,e,i){return o.isArray(e)?o.longestText(t,i,e):t.measureText(e).width}function i(t){var e=o.valueOrDefault,i=n.global,a=e(t.fontSize,i.defaultFontSize),r=e(t.fontStyle,i.defaultFontStyle),s=e(t.fontFamily,i.defaultFontFamily);return{size:a,style:r,family:s,font:o.fontString(a,r,s)}}function r(t){return o.options.toLineHeight(o.valueOrDefault(t.lineHeight,1.2),o.valueOrDefault(t.fontSize,n.global.defaultFontSize))}t.Scale=a.extend({getPadding:function(){return{left:this.paddingLeft||0,top:this.paddingTop||0,right:this.paddingRight||0,bottom:this.paddingBottom||0}},getTicks:function(){return this._ticks},mergeTicksOptions:function(){var t=this.options.ticks;for(var e in!1===t.minor&&(t.minor={display:!1}),!1===t.major&&(t.major={display:!1}),t)"major"!==e&&"minor"!==e&&(void 0===t.minor[e]&&(t.minor[e]=t[e]),void 0===t.major[e]&&(t.major[e]=t[e]))},beforeUpdate:function(){o.callback(this.options.beforeUpdate,[this])},update:function(t,e,i){var n,a,r,s,l,u,d=this;for(d.beforeUpdate(),d.maxWidth=t,d.maxHeight=e,d.margins=o.extend({left:0,right:0,top:0,bottom:0},i),d.longestTextCache=d.longestTextCache||{},d.beforeSetDimensions(),d.setDimensions(),d.afterSetDimensions(),d.beforeDataLimits(),d.determineDataLimits(),d.afterDataLimits(),d.beforeBuildTicks(),l=d.buildTicks()||[],d.afterBuildTicks(),d.beforeTickToLabelConversion(),r=d.convertTicksToLabels(l)||d.ticks,d.afterTickToLabelConversion(),d.ticks=r,n=0,a=r.length;n<a;++n)s=r[n],(u=l[n])?u.label=s:l.push(u={label:s,major:!1});return d._ticks=l,d.beforeCalculateTickRotation(),d.calculateTickRotation(),d.afterCalculateTickRotation(),d.beforeFit(),d.fit(),d.afterFit(),d.afterUpdate(),d.minSize},afterUpdate:function(){o.callback(this.options.afterUpdate,[this])},beforeSetDimensions:function(){o.callback(this.options.beforeSetDimensions,[this])},setDimensions:function(){var t=this;t.isHorizontal()?(t.width=t.maxWidth,t.left=0,t.right=t.width):(t.height=t.maxHeight,t.top=0,t.bottom=t.height),t.paddingLeft=0,t.paddingTop=0,t.paddingRight=0,t.paddingBottom=0},afterSetDimensions:function(){o.callback(this.options.afterSetDimensions,[this])},beforeDataLimits:function(){o.callback(this.options.beforeDataLimits,[this])},determineDataLimits:o.noop,afterDataLimits:function(){o.callback(this.options.afterDataLimits,[this])},beforeBuildTicks:function(){o.callback(this.options.beforeBuildTicks,[this])},buildTicks:o.noop,afterBuildTicks:function(){o.callback(this.options.afterBuildTicks,[this])},beforeTickToLabelConversion:function(){o.callback(this.options.beforeTickToLabelConversion,[this])},convertTicksToLabels:function(){var t=this.options.ticks;this.ticks=this.ticks.map(t.userCallback||t.callback,this)},afterTickToLabelConversion:function(){o.callback(this.options.afterTickToLabelConversion,[this])},beforeCalculateTickRotation:function(){o.callback(this.options.beforeCalculateTickRotation,[this])},calculateTickRotation:function(){var t=this,e=t.ctx,n=t.options.ticks,a=s(t._ticks),r=i(n);e.font=r.font;var l=n.minRotation||0;if(a.length&&t.options.display&&t.isHorizontal())for(var u,d=o.longestText(e,r.font,a,t.longestTextCache),c=d,h=t.getPixelForTick(1)-t.getPixelForTick(0)-6;c>h&&l<n.maxRotation;){var f=o.toRadians(l);if(u=Math.cos(f),Math.sin(f)*d>t.maxHeight){l--;break}l++,c=u*d}t.labelRotation=l},afterCalculateTickRotation:function(){o.callback(this.options.afterCalculateTickRotation,[this])},beforeFit:function(){o.callback(this.options.beforeFit,[this])},fit:function(){var t=this,n=t.minSize={width:0,height:0},a=s(t._ticks),l=t.options,u=l.ticks,d=l.scaleLabel,c=l.gridLines,h=l.display,f=t.isHorizontal(),g=i(u),p=l.gridLines.tickMarkLength;if(n.width=f?t.isFullWidth()?t.maxWidth-t.margins.left-t.margins.right:t.maxWidth:h&&c.drawTicks?p:0,n.height=f?h&&c.drawTicks?p:0:t.maxHeight,d.display&&h){var m=r(d)+o.options.toPadding(d.padding).height;f?n.height+=m:n.width+=m}if(u.display&&h){var v=o.longestText(t.ctx,g.font,a,t.longestTextCache),b=o.numberOfLabelLines(a),x=.5*g.size,y=t.options.ticks.padding;if(f){t.longestLabelWidth=v;var k=o.toRadians(t.labelRotation),M=Math.cos(k),w=Math.sin(k)*v+g.size*b+x*(b-1)+x;n.height=Math.min(t.maxHeight,n.height+w+y),t.ctx.font=g.font;var S=e(t.ctx,a[0],g.font),C=e(t.ctx,a[a.length-1],g.font);0!==t.labelRotation?(t.paddingLeft="bottom"===l.position?M*S+3:M*x+3,t.paddingRight="bottom"===l.position?M*x+3:M*C+3):(t.paddingLeft=S/2+3,t.paddingRight=C/2+3)}else u.mirror?v=0:v+=y+x,n.width=Math.min(t.maxWidth,n.width+v),t.paddingTop=g.size/2,t.paddingBottom=g.size/2}t.handleMargins(),t.width=n.width,t.height=n.height},handleMargins:function(){var t=this;t.margins&&(t.paddingLeft=Math.max(t.paddingLeft-t.margins.left,0),t.paddingTop=Math.max(t.paddingTop-t.margins.top,0),t.paddingRight=Math.max(t.paddingRight-t.margins.right,0),t.paddingBottom=Math.max(t.paddingBottom-t.margins.bottom,0))},afterFit:function(){o.callback(this.options.afterFit,[this])},isHorizontal:function(){return"top"===this.options.position||"bottom"===this.options.position},isFullWidth:function(){return this.options.fullWidth},getRightValue:function(t){if(o.isNullOrUndef(t))return NaN;if("number"==typeof t&&!isFinite(t))return NaN;if(t)if(this.isHorizontal()){if(void 0!==t.x)return this.getRightValue(t.x)}else if(void 0!==t.y)return this.getRightValue(t.y);return t},getLabelForIndex:o.noop,getPixelForValue:o.noop,getValueForPixel:o.noop,getPixelForTick:function(t){var e=this,i=e.options.offset;if(e.isHorizontal()){var n=(e.width-(e.paddingLeft+e.paddingRight))/Math.max(e._ticks.length-(i?0:1),1),a=n*t+e.paddingLeft;i&&(a+=n/2);var o=e.left+Math.round(a);return o+=e.isFullWidth()?e.margins.left:0}var r=e.height-(e.paddingTop+e.paddingBottom);return e.top+t*(r/(e._ticks.length-1))},getPixelForDecimal:function(t){var e=this;if(e.isHorizontal()){var i=(e.width-(e.paddingLeft+e.paddingRight))*t+e.paddingLeft,n=e.left+Math.round(i);return n+=e.isFullWidth()?e.margins.left:0}return e.top+t*e.height},getBasePixel:function(){return this.getPixelForValue(this.getBaseValue())},getBaseValue:function(){var t=this.min,e=this.max;return this.beginAtZero?0:t<0&&e<0?e:t>0&&e>0?t:0},_autoSkip:function(t){var e,i,n,a,r=this,s=r.isHorizontal(),l=r.options.ticks.minor,u=t.length,d=o.toRadians(r.labelRotation),c=Math.cos(d),h=r.longestLabelWidth*c,f=[];for(l.maxTicksLimit&&(a=l.maxTicksLimit),s&&(e=!1,(h+l.autoSkipPadding)*u>r.width-(r.paddingLeft+r.paddingRight)&&(e=1+Math.floor((h+l.autoSkipPadding)*u/(r.width-(r.paddingLeft+r.paddingRight)))),a&&u>a&&(e=Math.max(e,Math.floor(u/a)))),i=0;i<u;i++)n=t[i],(e>1&&i%e>0||i%e==0&&i+e>=u)&&i!==u-1&&delete n.label,f.push(n);return f},draw:function(t){var e=this,a=e.options;if(a.display){var s=e.ctx,u=n.global,d=a.ticks.minor,c=a.ticks.major||d,h=a.gridLines,f=a.scaleLabel,g=0!==e.labelRotation,p=e.isHorizontal(),m=d.autoSkip?e._autoSkip(e.getTicks()):e.getTicks(),v=o.valueOrDefault(d.fontColor,u.defaultFontColor),b=i(d),x=o.valueOrDefault(c.fontColor,u.defaultFontColor),y=i(c),k=h.drawTicks?h.tickMarkLength:0,M=o.valueOrDefault(f.fontColor,u.defaultFontColor),w=i(f),S=o.options.toPadding(f.padding),C=o.toRadians(e.labelRotation),_=[],D=e.options.gridLines.lineWidth,I="right"===a.position?e.right:e.right-D-k,P="right"===a.position?e.right+k:e.right,A="bottom"===a.position?e.top+D:e.bottom-k-D,T="bottom"===a.position?e.top+D+k:e.bottom+D;if(o.each(m,function(i,n){if(!o.isNullOrUndef(i.label)){var r,s,c,f,v,b,x,y,M,w,S,F,O,R,L=i.label;n===e.zeroLineIndex&&a.offset===h.offsetGridLines?(r=h.zeroLineWidth,s=h.zeroLineColor,c=h.zeroLineBorderDash,f=h.zeroLineBorderDashOffset):(r=o.valueAtIndexOrDefault(h.lineWidth,n),s=o.valueAtIndexOrDefault(h.color,n),c=o.valueOrDefault(h.borderDash,u.borderDash),f=o.valueOrDefault(h.borderDashOffset,u.borderDashOffset));var z="middle",B="middle",W=d.padding;if(p){var N=k+W;"bottom"===a.position?(B=g?"middle":"top",z=g?"right":"center",R=e.top+N):(B=g?"middle":"bottom",z=g?"left":"center",R=e.bottom-N);var V=l(e,n,h.offsetGridLines&&m.length>1);V<e.left&&(s="rgba(0,0,0,0)"),V+=o.aliasPixel(r),O=e.getPixelForTick(n)+d.labelOffset,v=x=M=S=V,b=A,y=T,w=t.top,F=t.bottom+D}else{var E,H="left"===a.position;d.mirror?(z=H?"left":"right",E=W):(z=H?"right":"left",E=k+W),O=H?e.right-E:e.left+E;var j=l(e,n,h.offsetGridLines&&m.length>1);j<e.top&&(s="rgba(0,0,0,0)"),j+=o.aliasPixel(r),R=e.getPixelForTick(n)+d.labelOffset,v=I,x=P,M=t.left,S=t.right+D,b=y=w=F=j}_.push({tx1:v,ty1:b,tx2:x,ty2:y,x1:M,y1:w,x2:S,y2:F,labelX:O,labelY:R,glWidth:r,glColor:s,glBorderDash:c,glBorderDashOffset:f,rotation:-1*C,label:L,major:i.major,textBaseline:B,textAlign:z})}}),o.each(_,function(t){if(h.display&&(s.save(),s.lineWidth=t.glWidth,s.strokeStyle=t.glColor,s.setLineDash&&(s.setLineDash(t.glBorderDash),s.lineDashOffset=t.glBorderDashOffset),s.beginPath(),h.drawTicks&&(s.moveTo(t.tx1,t.ty1),s.lineTo(t.tx2,t.ty2)),h.drawOnChartArea&&(s.moveTo(t.x1,t.y1),s.lineTo(t.x2,t.y2)),s.stroke(),s.restore()),d.display){s.save(),s.translate(t.labelX,t.labelY),s.rotate(t.rotation),s.font=t.major?y.font:b.font,s.fillStyle=t.major?x:v,s.textBaseline=t.textBaseline,s.textAlign=t.textAlign;var i=t.label;if(o.isArray(i))for(var n=i.length,a=1.5*b.size,r=e.isHorizontal()?0:-a*(n-1)/2,l=0;l<n;++l)s.fillText(""+i[l],0,r),r+=a;else s.fillText(i,0,0);s.restore()}}),f.display){var F,O,R=0,L=r(f)/2;if(p)F=e.left+(e.right-e.left)/2,O="bottom"===a.position?e.bottom-L-S.bottom:e.top+L+S.top;else{var z="left"===a.position;F=z?e.left+L+S.top:e.right-L-S.top,O=e.top+(e.bottom-e.top)/2,R=z?-.5*Math.PI:.5*Math.PI}s.save(),s.translate(F,O),s.rotate(R),s.textAlign="center",s.textBaseline="middle",s.fillStyle=M,s.font=w.font,s.fillText(f.labelString,0,0),s.restore()}if(h.drawBorder){s.lineWidth=o.valueAtIndexOrDefault(h.lineWidth,0),s.strokeStyle=o.valueAtIndexOrDefault(h.color,0);var B=e.left,W=e.right+D,N=e.top,V=e.bottom+D,E=o.aliasPixel(s.lineWidth);p?(N=V="top"===a.position?e.bottom:e.top,N+=E,V+=E):(B=W="left"===a.position?e.right:e.left,B+=E,W+=E),s.beginPath(),s.moveTo(B,N),s.lineTo(W,V),s.stroke()}}}})}},{25:25,26:26,34:34,45:45}],33:[function(t,e,i){"use strict";var n=t(25),a=t(45),o=t(30);e.exports=function(t){t.scaleService={constructors:{},defaults:{},registerScaleType:function(t,e,i){this.constructors[t]=e,this.defaults[t]=a.clone(i)},getScaleConstructor:function(t){return this.constructors.hasOwnProperty(t)?this.constructors[t]:void 0},getScaleDefaults:function(t){return this.defaults.hasOwnProperty(t)?a.merge({},[n.scale,this.defaults[t]]):{}},updateScaleDefaults:function(t,e){this.defaults.hasOwnProperty(t)&&(this.defaults[t]=a.extend(this.defaults[t],e))},addScalesToLayout:function(t){a.each(t.scales,function(e){e.fullWidth=e.options.fullWidth,e.position=e.options.position,e.weight=e.options.weight,o.addBox(t,e)})}}}},{25:25,30:30,45:45}],34:[function(t,e,i){"use strict";var n=t(45);e.exports={formatters:{values:function(t){return n.isArray(t)?t:""+t},linear:function(t,e,i){var a=i.length>3?i[2]-i[1]:i[1]-i[0];Math.abs(a)>1&&t!==Math.floor(t)&&(a=t-Math.floor(t));var o=n.log10(Math.abs(a)),r="";if(0!==t){var s=-1*Math.floor(o);s=Math.max(Math.min(s,20),0),r=t.toFixed(s)}else r="0";return r},logarithmic:function(t,e,i){var a=t/Math.pow(10,Math.floor(n.log10(t)));return 0===t?"0":1===a||2===a||5===a||0===e||e===i.length-1?t.toExponential():""}}}},{45:45}],35:[function(t,e,i){"use strict";var n=t(25),a=t(26),o=t(45);n._set("global",{tooltips:{enabled:!0,custom:null,mode:"nearest",position:"average",intersect:!0,backgroundColor:"rgba(0,0,0,0.8)",titleFontStyle:"bold",titleSpacing:2,titleMarginBottom:6,titleFontColor:"#fff",titleAlign:"left",bodySpacing:2,bodyFontColor:"#fff",bodyAlign:"left",footerFontStyle:"bold",footerSpacing:2,footerMarginTop:6,footerFontColor:"#fff",footerAlign:"left",yPadding:6,xPadding:6,caretPadding:2,caretSize:5,cornerRadius:6,multiKeyBackground:"#fff",displayColors:!0,borderColor:"rgba(0,0,0,0)",borderWidth:0,callbacks:{beforeTitle:o.noop,title:function(t,e){var i="",n=e.labels,a=n?n.length:0;if(t.length>0){var o=t[0];o.xLabel?i=o.xLabel:a>0&&o.index<a&&(i=n[o.index])}return i},afterTitle:o.noop,beforeBody:o.noop,beforeLabel:o.noop,label:function(t,e){var i=e.datasets[t.datasetIndex].label||"";return i&&(i+=": "),i+=t.yLabel},labelColor:function(t,e){var i=e.getDatasetMeta(t.datasetIndex).data[t.index]._view;return{borderColor:i.borderColor,backgroundColor:i.backgroundColor}},labelTextColor:function(){return this._options.bodyFontColor},afterLabel:o.noop,afterBody:o.noop,beforeFooter:o.noop,footer:o.noop,afterFooter:o.noop}}}),e.exports=function(t){function e(t,e){var i=o.color(t);return i.alpha(e*i.alpha()).rgbaString()}function i(t,e){return e&&(o.isArray(e)?Array.prototype.push.apply(t,e):t.push(e)),t}function r(t){var e=n.global,i=o.valueOrDefault;return{xPadding:t.xPadding,yPadding:t.yPadding,xAlign:t.xAlign,yAlign:t.yAlign,bodyFontColor:t.bodyFontColor,_bodyFontFamily:i(t.bodyFontFamily,e.defaultFontFamily),_bodyFontStyle:i(t.bodyFontStyle,e.defaultFontStyle),_bodyAlign:t.bodyAlign,bodyFontSize:i(t.bodyFontSize,e.defaultFontSize),bodySpacing:t.bodySpacing,titleFontColor:t.titleFontColor,_titleFontFamily:i(t.titleFontFamily,e.defaultFontFamily),_titleFontStyle:i(t.titleFontStyle,e.defaultFontStyle),titleFontSize:i(t.titleFontSize,e.defaultFontSize),_titleAlign:t.titleAlign,titleSpacing:t.titleSpacing,titleMarginBottom:t.titleMarginBottom,footerFontColor:t.footerFontColor,_footerFontFamily:i(t.footerFontFamily,e.defaultFontFamily),_footerFontStyle:i(t.footerFontStyle,e.defaultFontStyle),footerFontSize:i(t.footerFontSize,e.defaultFontSize),_footerAlign:t.footerAlign,footerSpacing:t.footerSpacing,footerMarginTop:t.footerMarginTop,caretSize:t.caretSize,cornerRadius:t.cornerRadius,backgroundColor:t.backgroundColor,opacity:0,legendColorBackground:t.multiKeyBackground,displayColors:t.displayColors,borderColor:t.borderColor,borderWidth:t.borderWidth}}t.Tooltip=a.extend({initialize:function(){this._model=r(this._options),this._lastActive=[]},getTitle:function(){var t=this._options.callbacks,e=t.beforeTitle.apply(this,arguments),n=t.title.apply(this,arguments),a=t.afterTitle.apply(this,arguments),o=[];return o=i(o=i(o=i(o,e),n),a)},getBeforeBody:function(){var t=this._options.callbacks.beforeBody.apply(this,arguments);return o.isArray(t)?t:void 0!==t?[t]:[]},getBody:function(t,e){var n=this,a=n._options.callbacks,r=[];return o.each(t,function(t){var o={before:[],lines:[],after:[]};i(o.before,a.beforeLabel.call(n,t,e)),i(o.lines,a.label.call(n,t,e)),i(o.after,a.afterLabel.call(n,t,e)),r.push(o)}),r},getAfterBody:function(){var t=this._options.callbacks.afterBody.apply(this,arguments);return o.isArray(t)?t:void 0!==t?[t]:[]},getFooter:function(){var t=this._options.callbacks,e=t.beforeFooter.apply(this,arguments),n=t.footer.apply(this,arguments),a=t.afterFooter.apply(this,arguments),o=[];return o=i(o=i(o=i(o,e),n),a)},update:function(e){var i,n,a,s,l,u,d,c,h,f,g,p,m,v,b,x,y,k,M,w,S=this,C=S._options,_=S._model,D=S._model=r(C),I=S._active,P=S._data,A={xAlign:_.xAlign,yAlign:_.yAlign},T={x:_.x,y:_.y},F={width:_.width,height:_.height},O={x:_.caretX,y:_.caretY};if(I.length){D.opacity=1;var R=[],L=[];O=t.Tooltip.positioners[C.position].call(S,I,S._eventPosition);var z=[];for(i=0,n=I.length;i<n;++i)z.push((x=I[i],y=void 0,k=void 0,void 0,void 0,y=x._xScale,k=x._yScale||x._scale,M=x._index,w=x._datasetIndex,{xLabel:y?y.getLabelForIndex(M,w):"",yLabel:k?k.getLabelForIndex(M,w):"",index:M,datasetIndex:w,x:x._model.x,y:x._model.y}));C.filter&&(z=z.filter(function(t){return C.filter(t,P)})),C.itemSort&&(z=z.sort(function(t,e){return C.itemSort(t,e,P)})),o.each(z,function(t){R.push(C.callbacks.labelColor.call(S,t,S._chart)),L.push(C.callbacks.labelTextColor.call(S,t,S._chart))}),D.title=S.getTitle(z,P),D.beforeBody=S.getBeforeBody(z,P),D.body=S.getBody(z,P),D.afterBody=S.getAfterBody(z,P),D.footer=S.getFooter(z,P),D.x=Math.round(O.x),D.y=Math.round(O.y),D.caretPadding=C.caretPadding,D.labelColors=R,D.labelTextColors=L,D.dataPoints=z,A=function(t,e){var i,n,a,o,r,s=t._model,l=t._chart,u=t._chart.chartArea,d="center",c="center";s.y<e.height?c="top":s.y>l.height-e.height&&(c="bottom");var h=(u.left+u.right)/2,f=(u.top+u.bottom)/2;"center"===c?(i=function(t){return t<=h},n=function(t){return t>h}):(i=function(t){return t<=e.width/2},n=function(t){return t>=l.width-e.width/2}),a=function(t){return t+e.width+s.caretSize+s.caretPadding>l.width},o=function(t){return t-e.width-s.caretSize-s.caretPadding<0},r=function(t){return t<=f?"top":"bottom"},i(s.x)?(d="left",a(s.x)&&(d="center",c=r(s.y))):n(s.x)&&(d="right",o(s.x)&&(d="center",c=r(s.y)));var g=t._options;return{xAlign:g.xAlign?g.xAlign:d,yAlign:g.yAlign?g.yAlign:c}}(this,F=function(t,e){var i=t._chart.ctx,n=2*e.yPadding,a=0,r=e.body,s=r.reduce(function(t,e){return t+e.before.length+e.lines.length+e.after.length},0);s+=e.beforeBody.length+e.afterBody.length;var l=e.title.length,u=e.footer.length,d=e.titleFontSize,c=e.bodyFontSize,h=e.footerFontSize;n+=l*d,n+=l?(l-1)*e.titleSpacing:0,n+=l?e.titleMarginBottom:0,n+=s*c,n+=s?(s-1)*e.bodySpacing:0,n+=u?e.footerMarginTop:0,n+=u*h,n+=u?(u-1)*e.footerSpacing:0;var f=0,g=function(t){a=Math.max(a,i.measureText(t).width+f)};return i.font=o.fontString(d,e._titleFontStyle,e._titleFontFamily),o.each(e.title,g),i.font=o.fontString(c,e._bodyFontStyle,e._bodyFontFamily),o.each(e.beforeBody.concat(e.afterBody),g),f=e.displayColors?c+2:0,o.each(r,function(t){o.each(t.before,g),o.each(t.lines,g),o.each(t.after,g)}),f=0,i.font=o.fontString(h,e._footerFontStyle,e._footerFontFamily),o.each(e.footer,g),{width:a+=2*e.xPadding,height:n}}(this,D)),a=D,s=F,l=A,u=S._chart,d=a.x,c=a.y,h=a.caretSize,f=a.caretPadding,g=a.cornerRadius,p=l.xAlign,m=l.yAlign,v=h+f,b=g+f,"right"===p?d-=s.width:"center"===p&&((d-=s.width/2)+s.width>u.width&&(d=u.width-s.width),d<0&&(d=0)),"top"===m?c+=v:c-="bottom"===m?s.height+v:s.height/2,"center"===m?"left"===p?d+=v:"right"===p&&(d-=v):"left"===p?d-=b:"right"===p&&(d+=b),T={x:d,y:c}}else D.opacity=0;return D.xAlign=A.xAlign,D.yAlign=A.yAlign,D.x=T.x,D.y=T.y,D.width=F.width,D.height=F.height,D.caretX=O.x,D.caretY=O.y,S._model=D,e&&C.custom&&C.custom.call(S,D),S},drawCaret:function(t,e){var i=this._chart.ctx,n=this._view,a=this.getCaretPosition(t,e,n);i.lineTo(a.x1,a.y1),i.lineTo(a.x2,a.y2),i.lineTo(a.x3,a.y3)},getCaretPosition:function(t,e,i){var n,a,o,r,s,l,u=i.caretSize,d=i.cornerRadius,c=i.xAlign,h=i.yAlign,f=t.x,g=t.y,p=e.width,m=e.height;if("center"===h)s=g+m/2,"left"===c?(a=(n=f)-u,o=n,r=s+u,l=s-u):(a=(n=f+p)+u,o=n,r=s-u,l=s+u);else if("left"===c?(n=(a=f+d+u)-u,o=a+u):"right"===c?(n=(a=f+p-d-u)-u,o=a+u):(n=(a=i.caretX)-u,o=a+u),"top"===h)s=(r=g)-u,l=r;else{s=(r=g+m)+u,l=r;var v=o;o=n,n=v}return{x1:n,x2:a,x3:o,y1:r,y2:s,y3:l}},drawTitle:function(t,i,n,a){var r=i.title;if(r.length){n.textAlign=i._titleAlign,n.textBaseline="top";var s,l,u=i.titleFontSize,d=i.titleSpacing;for(n.fillStyle=e(i.titleFontColor,a),n.font=o.fontString(u,i._titleFontStyle,i._titleFontFamily),s=0,l=r.length;s<l;++s)n.fillText(r[s],t.x,t.y),t.y+=u+d,s+1===r.length&&(t.y+=i.titleMarginBottom-d)}},drawBody:function(t,i,n,a){var r=i.bodyFontSize,s=i.bodySpacing,l=i.body;n.textAlign=i._bodyAlign,n.textBaseline="top",n.font=o.fontString(r,i._bodyFontStyle,i._bodyFontFamily);var u=0,d=function(e){n.fillText(e,t.x+u,t.y),t.y+=r+s};n.fillStyle=e(i.bodyFontColor,a),o.each(i.beforeBody,d);var c=i.displayColors;u=c?r+2:0,o.each(l,function(s,l){var u=e(i.labelTextColors[l],a);n.fillStyle=u,o.each(s.before,d),o.each(s.lines,function(o){c&&(n.fillStyle=e(i.legendColorBackground,a),n.fillRect(t.x,t.y,r,r),n.lineWidth=1,n.strokeStyle=e(i.labelColors[l].borderColor,a),n.strokeRect(t.x,t.y,r,r),n.fillStyle=e(i.labelColors[l].backgroundColor,a),n.fillRect(t.x+1,t.y+1,r-2,r-2),n.fillStyle=u),d(o)}),o.each(s.after,d)}),u=0,o.each(i.afterBody,d),t.y-=s},drawFooter:function(t,i,n,a){var r=i.footer;r.length&&(t.y+=i.footerMarginTop,n.textAlign=i._footerAlign,n.textBaseline="top",n.fillStyle=e(i.footerFontColor,a),n.font=o.fontString(i.footerFontSize,i._footerFontStyle,i._footerFontFamily),o.each(r,function(e){n.fillText(e,t.x,t.y),t.y+=i.footerFontSize+i.footerSpacing}))},drawBackground:function(t,i,n,a,o){n.fillStyle=e(i.backgroundColor,o),n.strokeStyle=e(i.borderColor,o),n.lineWidth=i.borderWidth;var r=i.xAlign,s=i.yAlign,l=t.x,u=t.y,d=a.width,c=a.height,h=i.cornerRadius;n.beginPath(),n.moveTo(l+h,u),"top"===s&&this.drawCaret(t,a),n.lineTo(l+d-h,u),n.quadraticCurveTo(l+d,u,l+d,u+h),"center"===s&&"right"===r&&this.drawCaret(t,a),n.lineTo(l+d,u+c-h),n.quadraticCurveTo(l+d,u+c,l+d-h,u+c),"bottom"===s&&this.drawCaret(t,a),n.lineTo(l+h,u+c),n.quadraticCurveTo(l,u+c,l,u+c-h),"center"===s&&"left"===r&&this.drawCaret(t,a),n.lineTo(l,u+h),n.quadraticCurveTo(l,u,l+h,u),n.closePath(),n.fill(),i.borderWidth>0&&n.stroke()},draw:function(){var t=this._chart.ctx,e=this._view;if(0!==e.opacity){var i={width:e.width,height:e.height},n={x:e.x,y:e.y},a=Math.abs(e.opacity<.001)?0:e.opacity,o=e.title.length||e.beforeBody.length||e.body.length||e.afterBody.length||e.footer.length;this._options.enabled&&o&&(this.drawBackground(n,e,t,i,a),n.x+=e.xPadding,n.y+=e.yPadding,this.drawTitle(n,e,t,a),this.drawBody(n,e,t,a),this.drawFooter(n,e,t,a))}},handleEvent:function(t){var e,i=this,n=i._options;return i._lastActive=i._lastActive||[],"mouseout"===t.type?i._active=[]:i._active=i._chart.getElementsAtEventForMode(t,n.mode,n),(e=!o.arrayEquals(i._active,i._lastActive))&&(i._lastActive=i._active,(n.enabled||n.custom)&&(i._eventPosition={x:t.x,y:t.y},i.update(!0),i.pivot())),e}}),t.Tooltip.positioners={average:function(t){if(!t.length)return!1;var e,i,n=0,a=0,o=0;for(e=0,i=t.length;e<i;++e){var r=t[e];if(r&&r.hasValue()){var s=r.tooltipPosition();n+=s.x,a+=s.y,++o}}return{x:Math.round(n/o),y:Math.round(a/o)}},nearest:function(t,e){var i,n,a,r=e.x,s=e.y,l=Number.POSITIVE_INFINITY;for(i=0,n=t.length;i<n;++i){var u=t[i];if(u&&u.hasValue()){var d=u.getCenterPoint(),c=o.distanceBetweenPoints(e,d);c<l&&(l=c,a=u)}}if(a){var h=a.tooltipPosition();r=h.x,s=h.y}return{x:r,y:s}}}}},{25:25,26:26,45:45}],36:[function(t,e,i){"use strict";var n=t(25),a=t(26),o=t(45);n._set("global",{elements:{arc:{backgroundColor:n.global.defaultColor,borderColor:"#fff",borderWidth:2}}}),e.exports=a.extend({inLabelRange:function(t){var e=this._view;return!!e&&Math.pow(t-e.x,2)<Math.pow(e.radius+e.hoverRadius,2)},inRange:function(t,e){var i=this._view;if(i){for(var n=o.getAngleFromPoint(i,{x:t,y:e}),a=n.angle,r=n.distance,s=i.startAngle,l=i.endAngle;l<s;)l+=2*Math.PI;for(;a>l;)a-=2*Math.PI;for(;a<s;)a+=2*Math.PI;var u=a>=s&&a<=l,d=r>=i.innerRadius&&r<=i.outerRadius;return u&&d}return!1},getCenterPoint:function(){var t=this._view,e=(t.startAngle+t.endAngle)/2,i=(t.innerRadius+t.outerRadius)/2;return{x:t.x+Math.cos(e)*i,y:t.y+Math.sin(e)*i}},getArea:function(){var t=this._view;return Math.PI*((t.endAngle-t.startAngle)/(2*Math.PI))*(Math.pow(t.outerRadius,2)-Math.pow(t.innerRadius,2))},tooltipPosition:function(){var t=this._view,e=t.startAngle+(t.endAngle-t.startAngle)/2,i=(t.outerRadius-t.innerRadius)/2+t.innerRadius;return{x:t.x+Math.cos(e)*i,y:t.y+Math.sin(e)*i}},draw:function(){var t=this._chart.ctx,e=this._view,i=e.startAngle,n=e.endAngle;t.beginPath(),t.arc(e.x,e.y,e.outerRadius,i,n),t.arc(e.x,e.y,e.innerRadius,n,i,!0),t.closePath(),t.strokeStyle=e.borderColor,t.lineWidth=e.borderWidth,t.fillStyle=e.backgroundColor,t.fill(),t.lineJoin="bevel",e.borderWidth&&t.stroke()}})},{25:25,26:26,45:45}],37:[function(t,e,i){"use strict";var n=t(25),a=t(26),o=t(45),r=n.global;n._set("global",{elements:{line:{tension:.4,backgroundColor:r.defaultColor,borderWidth:3,borderColor:r.defaultColor,borderCapStyle:"butt",borderDash:[],borderDashOffset:0,borderJoinStyle:"miter",capBezierPoints:!0,fill:!0}}}),e.exports=a.extend({draw:function(){var t,e,i,n,a=this._view,s=this._chart.ctx,l=a.spanGaps,u=this._children.slice(),d=r.elements.line,c=-1;for(this._loop&&u.length&&u.push(u[0]),s.save(),s.lineCap=a.borderCapStyle||d.borderCapStyle,s.setLineDash&&s.setLineDash(a.borderDash||d.borderDash),s.lineDashOffset=a.borderDashOffset||d.borderDashOffset,s.lineJoin=a.borderJoinStyle||d.borderJoinStyle,s.lineWidth=a.borderWidth||d.borderWidth,s.strokeStyle=a.borderColor||r.defaultColor,s.beginPath(),c=-1,t=0;t<u.length;++t)e=u[t],i=o.previousItem(u,t),n=e._view,0===t?n.skip||(s.moveTo(n.x,n.y),c=t):(i=-1===c?i:u[c],n.skip||(c!==t-1&&!l||-1===c?s.moveTo(n.x,n.y):o.canvas.lineTo(s,i._view,e._view),c=t));s.stroke(),s.restore()}})},{25:25,26:26,45:45}],38:[function(t,e,i){"use strict";var n=t(25),a=t(26),o=t(45),r=n.global.defaultColor;function s(t){var e=this._view;return!!e&&Math.abs(t-e.x)<e.radius+e.hitRadius}n._set("global",{elements:{point:{radius:3,pointStyle:"circle",backgroundColor:r,borderColor:r,borderWidth:1,hitRadius:1,hoverRadius:4,hoverBorderWidth:1}}}),e.exports=a.extend({inRange:function(t,e){var i=this._view;return!!i&&Math.pow(t-i.x,2)+Math.pow(e-i.y,2)<Math.pow(i.hitRadius+i.radius,2)},inLabelRange:s,inXRange:s,inYRange:function(t){var e=this._view;return!!e&&Math.abs(t-e.y)<e.radius+e.hitRadius},getCenterPoint:function(){var t=this._view;return{x:t.x,y:t.y}},getArea:function(){return Math.PI*Math.pow(this._view.radius,2)},tooltipPosition:function(){var t=this._view;return{x:t.x,y:t.y,padding:t.radius+t.borderWidth}},draw:function(t){var e=this._view,i=this._model,a=this._chart.ctx,s=e.pointStyle,l=e.radius,u=e.x,d=e.y,c=o.color,h=0;e.skip||(a.strokeStyle=e.borderColor||r,a.lineWidth=o.valueOrDefault(e.borderWidth,n.global.elements.point.borderWidth),a.fillStyle=e.backgroundColor||r,void 0!==t&&(i.x<t.left||1.01*t.right<i.x||i.y<t.top||1.01*t.bottom<i.y)&&(i.x<t.left?h=(u-i.x)/(t.left-i.x):1.01*t.right<i.x?h=(i.x-u)/(i.x-t.right):i.y<t.top?h=(d-i.y)/(t.top-i.y):1.01*t.bottom<i.y&&(h=(i.y-d)/(i.y-t.bottom)),h=Math.round(100*h)/100,a.strokeStyle=c(a.strokeStyle).alpha(h).rgbString(),a.fillStyle=c(a.fillStyle).alpha(h).rgbString()),o.canvas.drawPoint(a,s,l,u,d))}})},{25:25,26:26,45:45}],39:[function(t,e,i){"use strict";var n=t(25),a=t(26);function o(t){return void 0!==t._view.width}function r(t){var e,i,n,a,r=t._view;if(o(t)){var s=r.width/2;e=r.x-s,i=r.x+s,n=Math.min(r.y,r.base),a=Math.max(r.y,r.base)}else{var l=r.height/2;e=Math.min(r.x,r.base),i=Math.max(r.x,r.base),n=r.y-l,a=r.y+l}return{left:e,top:n,right:i,bottom:a}}n._set("global",{elements:{rectangle:{backgroundColor:n.global.defaultColor,borderColor:n.global.defaultColor,borderSkipped:"bottom",borderWidth:0}}}),e.exports=a.extend({draw:function(){var t,e,i,n,a,o,r,s=this._chart.ctx,l=this._view,u=l.borderWidth;if(l.horizontal?(t=l.base,e=l.x,i=l.y-l.height/2,n=l.y+l.height/2,a=e>t?1:-1,o=1,r=l.borderSkipped||"left"):(t=l.x-l.width/2,e=l.x+l.width/2,i=l.y,a=1,o=(n=l.base)>i?1:-1,r=l.borderSkipped||"bottom"),u){var d=Math.min(Math.abs(t-e),Math.abs(i-n)),c=(u=u>d?d:u)/2,h=t+("left"!==r?c*a:0),f=e+("right"!==r?-c*a:0),g=i+("top"!==r?c*o:0),p=n+("bottom"!==r?-c*o:0);h!==f&&(i=g,n=p),g!==p&&(t=h,e=f)}s.beginPath(),s.fillStyle=l.backgroundColor,s.strokeStyle=l.borderColor,s.lineWidth=u;var m=[[t,n],[t,i],[e,i],[e,n]],v=["bottom","left","top","right"].indexOf(r,0);function b(t){return m[(v+t)%4]}-1===v&&(v=0);var x=b(0);s.moveTo(x[0],x[1]);for(var y=1;y<4;y++)x=b(y),s.lineTo(x[0],x[1]);s.fill(),u&&s.stroke()},height:function(){var t=this._view;return t.base-t.y},inRange:function(t,e){var i=!1;if(this._view){var n=r(this);i=t>=n.left&&t<=n.right&&e>=n.top&&e<=n.bottom}return i},inLabelRange:function(t,e){if(!this._view)return!1;var i=r(this);return o(this)?t>=i.left&&t<=i.right:e>=i.top&&e<=i.bottom},inXRange:function(t){var e=r(this);return t>=e.left&&t<=e.right},inYRange:function(t){var e=r(this);return t>=e.top&&t<=e.bottom},getCenterPoint:function(){var t,e,i=this._view;return o(this)?(t=i.x,e=(i.y+i.base)/2):(t=(i.x+i.base)/2,e=i.y),{x:t,y:e}},getArea:function(){var t=this._view;return t.width*Math.abs(t.y-t.base)},tooltipPosition:function(){var t=this._view;return{x:t.x,y:t.y}}})},{25:25,26:26}],40:[function(t,e,i){"use strict";e.exports={},e.exports.Arc=t(36),e.exports.Line=t(37),e.exports.Point=t(38),e.exports.Rectangle=t(39)},{36:36,37:37,38:38,39:39}],41:[function(t,e,i){"use strict";var n=t(42);i=e.exports={clear:function(t){t.ctx.clearRect(0,0,t.width,t.height)},roundedRect:function(t,e,i,n,a,o){if(o){var r=Math.min(o,n/2),s=Math.min(o,a/2);t.moveTo(e+r,i),t.lineTo(e+n-r,i),t.quadraticCurveTo(e+n,i,e+n,i+s),t.lineTo(e+n,i+a-s),t.quadraticCurveTo(e+n,i+a,e+n-r,i+a),t.lineTo(e+r,i+a),t.quadraticCurveTo(e,i+a,e,i+a-s),t.lineTo(e,i+s),t.quadraticCurveTo(e,i,e+r,i)}else t.rect(e,i,n,a)},drawPoint:function(t,e,i,n,a){var o,r,s,l,u,d;if(!e||"object"!=typeof e||"[object HTMLImageElement]"!==(o=e.toString())&&"[object HTMLCanvasElement]"!==o){if(!(isNaN(i)||i<=0)){switch(e){default:t.beginPath(),t.arc(n,a,i,0,2*Math.PI),t.closePath(),t.fill();break;case"triangle":t.beginPath(),u=(r=3*i/Math.sqrt(3))*Math.sqrt(3)/2,t.moveTo(n-r/2,a+u/3),t.lineTo(n+r/2,a+u/3),t.lineTo(n,a-2*u/3),t.closePath(),t.fill();break;case"rect":d=1/Math.SQRT2*i,t.beginPath(),t.fillRect(n-d,a-d,2*d,2*d),t.strokeRect(n-d,a-d,2*d,2*d);break;case"rectRounded":var c=i/Math.SQRT2,h=n-c,f=a-c,g=Math.SQRT2*i;t.beginPath(),this.roundedRect(t,h,f,g,g,i/2),t.closePath(),t.fill();break;case"rectRot":d=1/Math.SQRT2*i,t.beginPath(),t.moveTo(n-d,a),t.lineTo(n,a+d),t.lineTo(n+d,a),t.lineTo(n,a-d),t.closePath(),t.fill();break;case"cross":t.beginPath(),t.moveTo(n,a+i),t.lineTo(n,a-i),t.moveTo(n-i,a),t.lineTo(n+i,a),t.closePath();break;case"crossRot":t.beginPath(),s=Math.cos(Math.PI/4)*i,l=Math.sin(Math.PI/4)*i,t.moveTo(n-s,a-l),t.lineTo(n+s,a+l),t.moveTo(n-s,a+l),t.lineTo(n+s,a-l),t.closePath();break;case"star":t.beginPath(),t.moveTo(n,a+i),t.lineTo(n,a-i),t.moveTo(n-i,a),t.lineTo(n+i,a),s=Math.cos(Math.PI/4)*i,l=Math.sin(Math.PI/4)*i,t.moveTo(n-s,a-l),t.lineTo(n+s,a+l),t.moveTo(n-s,a+l),t.lineTo(n+s,a-l),t.closePath();break;case"line":t.beginPath(),t.moveTo(n-i,a),t.lineTo(n+i,a),t.closePath();break;case"dash":t.beginPath(),t.moveTo(n,a),t.lineTo(n+i,a),t.closePath()}t.stroke()}}else t.drawImage(e,n-e.width/2,a-e.height/2,e.width,e.height)},clipArea:function(t,e){t.save(),t.beginPath(),t.rect(e.left,e.top,e.right-e.left,e.bottom-e.top),t.clip()},unclipArea:function(t){t.restore()},lineTo:function(t,e,i,n){if(i.steppedLine)return"after"===i.steppedLine&&!n||"after"!==i.steppedLine&&n?t.lineTo(e.x,i.y):t.lineTo(i.x,e.y),void t.lineTo(i.x,i.y);i.tension?t.bezierCurveTo(n?e.controlPointPreviousX:e.controlPointNextX,n?e.controlPointPreviousY:e.controlPointNextY,n?i.controlPointNextX:i.controlPointPreviousX,n?i.controlPointNextY:i.controlPointPreviousY,i.x,i.y):t.lineTo(i.x,i.y)}};n.clear=i.clear,n.drawRoundedRectangle=function(t){t.beginPath(),i.roundedRect.apply(i,arguments),t.closePath()}},{42:42}],42:[function(t,e,i){"use strict";var n,a={noop:function(){},uid:(n=0,function(){return n++}),isNullOrUndef:function(t){return null==t},isArray:Array.isArray?Array.isArray:function(t){return"[object Array]"===Object.prototype.toString.call(t)},isObject:function(t){return null!==t&&"[object Object]"===Object.prototype.toString.call(t)},valueOrDefault:function(t,e){return void 0===t?e:t},valueAtIndexOrDefault:function(t,e,i){return a.valueOrDefault(a.isArray(t)?t[e]:t,i)},callback:function(t,e,i){if(t&&"function"==typeof t.call)return t.apply(i,e)},each:function(t,e,i,n){var o,r,s;if(a.isArray(t))if(r=t.length,n)for(o=r-1;o>=0;o--)e.call(i,t[o],o);else for(o=0;o<r;o++)e.call(i,t[o],o);else if(a.isObject(t))for(r=(s=Object.keys(t)).length,o=0;o<r;o++)e.call(i,t[s[o]],s[o])},arrayEquals:function(t,e){var i,n,o,r;if(!t||!e||t.length!==e.length)return!1;for(i=0,n=t.length;i<n;++i)if(o=t[i],r=e[i],o instanceof Array&&r instanceof Array){if(!a.arrayEquals(o,r))return!1}else if(o!==r)return!1;return!0},clone:function(t){if(a.isArray(t))return t.map(a.clone);if(a.isObject(t)){for(var e={},i=Object.keys(t),n=i.length,o=0;o<n;++o)e[i[o]]=a.clone(t[i[o]]);return e}return t},_merger:function(t,e,i,n){var o=e[t],r=i[t];a.isObject(o)&&a.isObject(r)?a.merge(o,r,n):e[t]=a.clone(r)},_mergerIf:function(t,e,i){var n=e[t],o=i[t];a.isObject(n)&&a.isObject(o)?a.mergeIf(n,o):e.hasOwnProperty(t)||(e[t]=a.clone(o))},merge:function(t,e,i){var n,o,r,s,l,u=a.isArray(e)?e:[e],d=u.length;if(!a.isObject(t))return t;for(n=(i=i||{}).merger||a._merger,o=0;o<d;++o)if(e=u[o],a.isObject(e))for(l=0,s=(r=Object.keys(e)).length;l<s;++l)n(r[l],t,e,i);return t},mergeIf:function(t,e){return a.merge(t,e,{merger:a._mergerIf})},extend:function(t){for(var e=function(e,i){t[i]=e},i=1,n=arguments.length;i<n;++i)a.each(arguments[i],e);return t},inherits:function(t){var e=this,i=t&&t.hasOwnProperty("constructor")?t.constructor:function(){return e.apply(this,arguments)},n=function(){this.constructor=i};return n.prototype=e.prototype,i.prototype=new n,i.extend=a.inherits,t&&a.extend(i.prototype,t),i.__super__=e.prototype,i}};e.exports=a,a.callCallback=a.callback,a.indexOf=function(t,e,i){return Array.prototype.indexOf.call(t,e,i)},a.getValueOrDefault=a.valueOrDefault,a.getValueAtIndexOrDefault=a.valueAtIndexOrDefault},{}],43:[function(t,e,i){"use strict";var n=t(42),a={linear:function(t){return t},easeInQuad:function(t){return t*t},easeOutQuad:function(t){return-t*(t-2)},easeInOutQuad:function(t){return(t/=.5)<1?.5*t*t:-.5*(--t*(t-2)-1)},easeInCubic:function(t){return t*t*t},easeOutCubic:function(t){return(t-=1)*t*t+1},easeInOutCubic:function(t){return(t/=.5)<1?.5*t*t*t:.5*((t-=2)*t*t+2)},easeInQuart:function(t){return t*t*t*t},easeOutQuart:function(t){return-((t-=1)*t*t*t-1)},easeInOutQuart:function(t){return(t/=.5)<1?.5*t*t*t*t:-.5*((t-=2)*t*t*t-2)},easeInQuint:function(t){return t*t*t*t*t},easeOutQuint:function(t){return(t-=1)*t*t*t*t+1},easeInOutQuint:function(t){return(t/=.5)<1?.5*t*t*t*t*t:.5*((t-=2)*t*t*t*t+2)},easeInSine:function(t){return 1-Math.cos(t*(Math.PI/2))},easeOutSine:function(t){return Math.sin(t*(Math.PI/2))},easeInOutSine:function(t){return-.5*(Math.cos(Math.PI*t)-1)},easeInExpo:function(t){return 0===t?0:Math.pow(2,10*(t-1))},easeOutExpo:function(t){return 1===t?1:1-Math.pow(2,-10*t)},easeInOutExpo:function(t){return 0===t?0:1===t?1:(t/=.5)<1?.5*Math.pow(2,10*(t-1)):.5*(2-Math.pow(2,-10*--t))},easeInCirc:function(t){return t>=1?t:-(Math.sqrt(1-t*t)-1)},easeOutCirc:function(t){return Math.sqrt(1-(t-=1)*t)},easeInOutCirc:function(t){return(t/=.5)<1?-.5*(Math.sqrt(1-t*t)-1):.5*(Math.sqrt(1-(t-=2)*t)+1)},easeInElastic:function(t){var e=1.70158,i=0,n=1;return 0===t?0:1===t?1:(i||(i=.3),n<1?(n=1,e=i/4):e=i/(2*Math.PI)*Math.asin(1/n),-n*Math.pow(2,10*(t-=1))*Math.sin((t-e)*(2*Math.PI)/i))},easeOutElastic:function(t){var e=1.70158,i=0,n=1;return 0===t?0:1===t?1:(i||(i=.3),n<1?(n=1,e=i/4):e=i/(2*Math.PI)*Math.asin(1/n),n*Math.pow(2,-10*t)*Math.sin((t-e)*(2*Math.PI)/i)+1)},easeInOutElastic:function(t){var e=1.70158,i=0,n=1;return 0===t?0:2==(t/=.5)?1:(i||(i=.45),n<1?(n=1,e=i/4):e=i/(2*Math.PI)*Math.asin(1/n),t<1?n*Math.pow(2,10*(t-=1))*Math.sin((t-e)*(2*Math.PI)/i)*-.5:n*Math.pow(2,-10*(t-=1))*Math.sin((t-e)*(2*Math.PI)/i)*.5+1)},easeInBack:function(t){return t*t*(2.70158*t-1.70158)},easeOutBack:function(t){return(t-=1)*t*(2.70158*t+1.70158)+1},easeInOutBack:function(t){var e=1.70158;return(t/=.5)<1?t*t*((1+(e*=1.525))*t-e)*.5:.5*((t-=2)*t*((1+(e*=1.525))*t+e)+2)},easeInBounce:function(t){return 1-a.easeOutBounce(1-t)},easeOutBounce:function(t){return t<1/2.75?7.5625*t*t:t<2/2.75?7.5625*(t-=1.5/2.75)*t+.75:t<2.5/2.75?7.5625*(t-=2.25/2.75)*t+.9375:7.5625*(t-=2.625/2.75)*t+.984375},easeInOutBounce:function(t){return t<.5?.5*a.easeInBounce(2*t):.5*a.easeOutBounce(2*t-1)+.5}};e.exports={effects:a},n.easingEffects=a},{42:42}],44:[function(t,e,i){"use strict";var n=t(42);e.exports={toLineHeight:function(t,e){var i=(""+t).match(/^(normal|(\d+(?:\.\d+)?)(px|em|%)?)$/);if(!i||"normal"===i[1])return 1.2*e;switch(t=+i[2],i[3]){case"px":return t;case"%":t/=100}return e*t},toPadding:function(t){var e,i,a,o;return n.isObject(t)?(e=+t.top||0,i=+t.right||0,a=+t.bottom||0,o=+t.left||0):e=i=a=o=+t||0,{top:e,right:i,bottom:a,left:o,height:e+a,width:o+i}},resolve:function(t,e,i){var a,o,r;for(a=0,o=t.length;a<o;++a)if(void 0!==(r=t[a])&&(void 0!==e&&"function"==typeof r&&(r=r(e)),void 0!==i&&n.isArray(r)&&(r=r[i]),void 0!==r))return r}}},{42:42}],45:[function(t,e,i){"use strict";e.exports=t(42),e.exports.easing=t(43),e.exports.canvas=t(41),e.exports.options=t(44)},{41:41,42:42,43:43,44:44}],46:[function(t,e,i){e.exports={acquireContext:function(t){return t&&t.canvas&&(t=t.canvas),t&&t.getContext("2d")||null}}},{}],47:[function(t,e,i){"use strict";var n=t(45),a="$chartjs",o="chartjs-",r=o+"render-monitor",s=o+"render-animation",l=["animationstart","webkitAnimationStart"],u={touchstart:"mousedown",touchmove:"mousemove",touchend:"mouseup",pointerenter:"mouseenter",pointerdown:"mousedown",pointermove:"mousemove",pointerup:"mouseup",pointerleave:"mouseout",pointerout:"mouseout"};function d(t,e){var i=n.getStyle(t,e),a=i&&i.match(/^(\d+)(\.\d+)?px$/);return a?Number(a[1]):void 0}var c=!!function(){var t=!1;try{var e=Object.defineProperty({},"passive",{get:function(){t=!0}});window.addEventListener("e",null,e)}catch(t){}return t}()&&{passive:!0};function h(t,e,i){t.addEventListener(e,i,c)}function f(t,e,i){t.removeEventListener(e,i,c)}function g(t,e,i,n,a){return{type:t,chart:e,native:a||null,x:void 0!==i?i:null,y:void 0!==n?n:null}}function p(t,e,i){var u,d,c,f,p,m,v,b,x=t[a]||(t[a]={}),y=x.resizer=function(t){var e=document.createElement("div"),i=o+"size-monitor",n="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;";e.style.cssText=n,e.className=i,e.innerHTML='<div class="'+i+'-expand" style="'+n+'"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="'+i+'-shrink" style="'+n+'"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div>';var a=e.childNodes[0],r=e.childNodes[1];e._reset=function(){a.scrollLeft=1e6,a.scrollTop=1e6,r.scrollLeft=1e6,r.scrollTop=1e6};var s=function(){e._reset(),t()};return h(a,"scroll",s.bind(a,"expand")),h(r,"scroll",s.bind(r,"shrink")),e}((u=function(){if(x.resizer)return e(g("resize",i))},c=!1,f=[],function(){f=Array.prototype.slice.call(arguments),d=d||this,c||(c=!0,n.requestAnimFrame.call(window,function(){c=!1,u.apply(d,f)}))}));m=function(){if(x.resizer){var e=t.parentNode;e&&e!==y.parentNode&&e.insertBefore(y,e.firstChild),y._reset()}},v=(p=t)[a]||(p[a]={}),b=v.renderProxy=function(t){t.animationName===s&&m()},n.each(l,function(t){h(p,t,b)}),v.reflow=!!p.offsetParent,p.classList.add(r)}function m(t){var e,i,o,s=t[a]||{},u=s.resizer;delete s.resizer,i=(e=t)[a]||{},(o=i.renderProxy)&&(n.each(l,function(t){f(e,t,o)}),delete i.renderProxy),e.classList.remove(r),u&&u.parentNode&&u.parentNode.removeChild(u)}e.exports={_enabled:"undefined"!=typeof window&&"undefined"!=typeof document,initialize:function(){var t,e,i,n="from{opacity:0.99}to{opacity:1}";e="@-webkit-keyframes "+s+"{"+n+"}@keyframes "+s+"{"+n+"}."+r+"{-webkit-animation:"+s+" 0.001s;animation:"+s+" 0.001s;}",i=(t=this)._style||document.createElement("style"),t._style||(t._style=i,e="/* Chart.js */\n"+e,i.setAttribute("type","text/css"),document.getElementsByTagName("head")[0].appendChild(i)),i.appendChild(document.createTextNode(e))},acquireContext:function(t,e){"string"==typeof t?t=document.getElementById(t):t.length&&(t=t[0]),t&&t.canvas&&(t=t.canvas);var i=t&&t.getContext&&t.getContext("2d");return i&&i.canvas===t?(function(t,e){var i=t.style,n=t.getAttribute("height"),o=t.getAttribute("width");if(t[a]={initial:{height:n,width:o,style:{display:i.display,height:i.height,width:i.width}}},i.display=i.display||"block",null===o||""===o){var r=d(t,"width");void 0!==r&&(t.width=r)}if(null===n||""===n)if(""===t.style.height)t.height=t.width/(e.options.aspectRatio||2);else{var s=d(t,"height");void 0!==r&&(t.height=s)}}(t,e),i):null},releaseContext:function(t){var e=t.canvas;if(e[a]){var i=e[a].initial;["height","width"].forEach(function(t){var a=i[t];n.isNullOrUndef(a)?e.removeAttribute(t):e.setAttribute(t,a)}),n.each(i.style||{},function(t,i){e.style[i]=t}),e.width=e.width,delete e[a]}},addEventListener:function(t,e,i){var o=t.canvas;if("resize"!==e){var r=i[a]||(i[a]={});h(o,e,(r.proxies||(r.proxies={}))[t.id+"_"+e]=function(e){var a,o,r,s;i((o=t,r=u[(a=e).type]||a.type,s=n.getRelativePosition(a,o),g(r,o,s.x,s.y,a)))})}else p(o,i,t)},removeEventListener:function(t,e,i){var n=t.canvas;if("resize"!==e){var o=((i[a]||{}).proxies||{})[t.id+"_"+e];o&&f(n,e,o)}else m(n)}},n.addEvent=h,n.removeEvent=f},{45:45}],48:[function(t,e,i){"use strict";var n=t(45),a=t(46),o=t(47),r=o._enabled?o:a;e.exports=n.extend({initialize:function(){},acquireContext:function(){},releaseContext:function(){},addEventListener:function(){},removeEventListener:function(){}},r)},{45:45,46:46,47:47}],49:[function(t,e,i){"use strict";e.exports={},e.exports.filler=t(50),e.exports.legend=t(51),e.exports.title=t(52)},{50:50,51:51,52:52}],50:[function(t,e,i){"use strict";var n=t(25),a=t(40),o=t(45);n._set("global",{plugins:{filler:{propagate:!0}}});var r={dataset:function(t){var e=t.fill,i=t.chart,n=i.getDatasetMeta(e),a=n&&i.isDatasetVisible(e)&&n.dataset._children||[],o=a.length||0;return o?function(t,e){return e<o&&a[e]._view||null}:null},boundary:function(t){var e=t.boundary,i=e?e.x:null,n=e?e.y:null;return function(t){return{x:null===i?t.x:i,y:null===n?t.y:n}}}};function s(t,e,i){var n,a=t._model||{},o=a.fill;if(void 0===o&&(o=!!a.backgroundColor),!1===o||null===o)return!1;if(!0===o)return"origin";if(n=parseFloat(o,10),isFinite(n)&&Math.floor(n)===n)return"-"!==o[0]&&"+"!==o[0]||(n=e+n),!(n===e||n<0||n>=i)&&n;switch(o){case"bottom":return"start";case"top":return"end";case"zero":return"origin";case"origin":case"start":case"end":return o;default:return!1}}function l(t){var e,i=t.el._model||{},n=t.el._scale||{},a=t.fill,o=null;if(isFinite(a))return null;if("start"===a?o=void 0===i.scaleBottom?n.bottom:i.scaleBottom:"end"===a?o=void 0===i.scaleTop?n.top:i.scaleTop:void 0!==i.scaleZero?o=i.scaleZero:n.getBasePosition?o=n.getBasePosition():n.getBasePixel&&(o=n.getBasePixel()),null!=o){if(void 0!==o.x&&void 0!==o.y)return o;if("number"==typeof o&&isFinite(o))return{x:(e=n.isHorizontal())?o:null,y:e?null:o}}return null}function u(t,e,i){var n,a=t[e].fill,o=[e];if(!i)return a;for(;!1!==a&&-1===o.indexOf(a);){if(!isFinite(a))return a;if(!(n=t[a]))return!1;if(n.visible)return a;o.push(a),a=n.fill}return!1}function d(t){return t&&!t.skip}function c(t,e,i,n,a){var r;if(n&&a){for(t.moveTo(e[0].x,e[0].y),r=1;r<n;++r)o.canvas.lineTo(t,e[r-1],e[r]);for(t.lineTo(i[a-1].x,i[a-1].y),r=a-1;r>0;--r)o.canvas.lineTo(t,i[r],i[r-1],!0)}}e.exports={id:"filler",afterDatasetsUpdate:function(t,e){var i,n,o,d,c,h,f,g=(t.data.datasets||[]).length,p=e.propagate,m=[];for(n=0;n<g;++n)d=null,(o=(i=t.getDatasetMeta(n)).dataset)&&o._model&&o instanceof a.Line&&(d={visible:t.isDatasetVisible(n),fill:s(o,n,g),chart:t,el:o}),i.$filler=d,m.push(d);for(n=0;n<g;++n)(d=m[n])&&(d.fill=u(m,n,p),d.boundary=l(d),d.mapper=(void 0,f=void 0,h=(c=d).fill,f="dataset",!1===h?null:(isFinite(h)||(f="boundary"),r[f](c))))},beforeDatasetDraw:function(t,e){var i=e.meta.$filler;if(i){var a=t.ctx,r=i.el,s=r._view,l=r._children||[],u=i.mapper,h=s.backgroundColor||n.global.defaultColor;u&&h&&l.length&&(o.canvas.clipArea(a,t.chartArea),function(t,e,i,n,a,o){var r,s,l,u,h,f,g,p=e.length,m=n.spanGaps,v=[],b=[],x=0,y=0;for(t.beginPath(),r=0,s=p+!!o;r<s;++r)h=i(u=e[l=r%p]._view,l,n),f=d(u),g=d(h),f&&g?(x=v.push(u),y=b.push(h)):x&&y&&(m?(f&&v.push(u),g&&b.push(h)):(c(t,v,b,x,y),x=y=0,v=[],b=[]));c(t,v,b,x,y),t.closePath(),t.fillStyle=a,t.fill()}(a,l,u,s,h,r._loop),o.canvas.unclipArea(a))}}}},{25:25,40:40,45:45}],51:[function(t,e,i){"use strict";var n=t(25),a=t(26),o=t(45),r=t(30),s=o.noop;function l(t,e){return t.usePointStyle?e*Math.SQRT2:t.boxWidth}n._set("global",{legend:{display:!0,position:"top",fullWidth:!0,reverse:!1,weight:1e3,onClick:function(t,e){var i=e.datasetIndex,n=this.chart,a=n.getDatasetMeta(i);a.hidden=null===a.hidden?!n.data.datasets[i].hidden:null,n.update()},onHover:null,labels:{boxWidth:40,padding:10,generateLabels:function(t){var e=t.data;return o.isArray(e.datasets)?e.datasets.map(function(e,i){return{text:e.label,fillStyle:o.isArray(e.backgroundColor)?e.backgroundColor[0]:e.backgroundColor,hidden:!t.isDatasetVisible(i),lineCap:e.borderCapStyle,lineDash:e.borderDash,lineDashOffset:e.borderDashOffset,lineJoin:e.borderJoinStyle,lineWidth:e.borderWidth,strokeStyle:e.borderColor,pointStyle:e.pointStyle,datasetIndex:i}},this):[]}}},legendCallback:function(t){var e=[];e.push('<ul class="'+t.id+'-legend">');for(var i=0;i<t.data.datasets.length;i++)e.push('<li><span style="background-color:'+t.data.datasets[i].backgroundColor+'"></span>'),t.data.datasets[i].label&&e.push(t.data.datasets[i].label),e.push("</li>");return e.push("</ul>"),e.join("")}});var u=a.extend({initialize:function(t){o.extend(this,t),this.legendHitBoxes=[],this.doughnutMode=!1},beforeUpdate:s,update:function(t,e,i){var n=this;return n.beforeUpdate(),n.maxWidth=t,n.maxHeight=e,n.margins=i,n.beforeSetDimensions(),n.setDimensions(),n.afterSetDimensions(),n.beforeBuildLabels(),n.buildLabels(),n.afterBuildLabels(),n.beforeFit(),n.fit(),n.afterFit(),n.afterUpdate(),n.minSize},afterUpdate:s,beforeSetDimensions:s,setDimensions:function(){var t=this;t.isHorizontal()?(t.width=t.maxWidth,t.left=0,t.right=t.width):(t.height=t.maxHeight,t.top=0,t.bottom=t.height),t.paddingLeft=0,t.paddingTop=0,t.paddingRight=0,t.paddingBottom=0,t.minSize={width:0,height:0}},afterSetDimensions:s,beforeBuildLabels:s,buildLabels:function(){var t=this,e=t.options.labels||{},i=o.callback(e.generateLabels,[t.chart],t)||[];e.filter&&(i=i.filter(function(i){return e.filter(i,t.chart.data)})),t.options.reverse&&i.reverse(),t.legendItems=i},afterBuildLabels:s,beforeFit:s,fit:function(){var t=this,e=t.options,i=e.labels,a=e.display,r=t.ctx,s=n.global,u=o.valueOrDefault,d=u(i.fontSize,s.defaultFontSize),c=u(i.fontStyle,s.defaultFontStyle),h=u(i.fontFamily,s.defaultFontFamily),f=o.fontString(d,c,h),g=t.legendHitBoxes=[],p=t.minSize,m=t.isHorizontal();if(m?(p.width=t.maxWidth,p.height=a?10:0):(p.width=a?10:0,p.height=t.maxHeight),a)if(r.font=f,m){var v=t.lineWidths=[0],b=t.legendItems.length?d+i.padding:0;r.textAlign="left",r.textBaseline="top",o.each(t.legendItems,function(e,n){var a=l(i,d)+d/2+r.measureText(e.text).width;v[v.length-1]+a+i.padding>=t.width&&(b+=d+i.padding,v[v.length]=t.left),g[n]={left:0,top:0,width:a,height:d},v[v.length-1]+=a+i.padding}),p.height+=b}else{var x=i.padding,y=t.columnWidths=[],k=i.padding,M=0,w=0,S=d+x;o.each(t.legendItems,function(t,e){var n=l(i,d)+d/2+r.measureText(t.text).width;w+S>p.height&&(k+=M+i.padding,y.push(M),M=0,w=0),M=Math.max(M,n),w+=S,g[e]={left:0,top:0,width:n,height:d}}),k+=M,y.push(M),p.width+=k}t.width=p.width,t.height=p.height},afterFit:s,isHorizontal:function(){return"top"===this.options.position||"bottom"===this.options.position},draw:function(){var t=this,e=t.options,i=e.labels,a=n.global,r=a.elements.line,s=t.width,u=t.lineWidths;if(e.display){var d,c=t.ctx,h=o.valueOrDefault,f=h(i.fontColor,a.defaultFontColor),g=h(i.fontSize,a.defaultFontSize),p=h(i.fontStyle,a.defaultFontStyle),m=h(i.fontFamily,a.defaultFontFamily),v=o.fontString(g,p,m);c.textAlign="left",c.textBaseline="middle",c.lineWidth=.5,c.strokeStyle=f,c.fillStyle=f,c.font=v;var b=l(i,g),x=t.legendHitBoxes,y=t.isHorizontal();d=y?{x:t.left+(s-u[0])/2,y:t.top+i.padding,line:0}:{x:t.left+i.padding,y:t.top+i.padding,line:0};var k=g+i.padding;o.each(t.legendItems,function(n,l){var f,p,m,v,M,w=c.measureText(n.text).width,S=b+g/2+w,C=d.x,_=d.y;y?C+S>=s&&(_=d.y+=k,d.line++,C=d.x=t.left+(s-u[d.line])/2):_+k>t.bottom&&(C=d.x=C+t.columnWidths[d.line]+i.padding,_=d.y=t.top+i.padding,d.line++),function(t,i,n){if(!(isNaN(b)||b<=0)){c.save(),c.fillStyle=h(n.fillStyle,a.defaultColor),c.lineCap=h(n.lineCap,r.borderCapStyle),c.lineDashOffset=h(n.lineDashOffset,r.borderDashOffset),c.lineJoin=h(n.lineJoin,r.borderJoinStyle),c.lineWidth=h(n.lineWidth,r.borderWidth),c.strokeStyle=h(n.strokeStyle,a.defaultColor);var s=0===h(n.lineWidth,r.borderWidth);if(c.setLineDash&&c.setLineDash(h(n.lineDash,r.borderDash)),e.labels&&e.labels.usePointStyle){var l=g*Math.SQRT2/2,u=l/Math.SQRT2,d=t+u,f=i+u;o.canvas.drawPoint(c,n.pointStyle,l,d,f)}else s||c.strokeRect(t,i,b,g),c.fillRect(t,i,b,g);c.restore()}}(C,_,n),x[l].left=C,x[l].top=_,f=n,p=w,v=b+(m=g/2)+C,M=_+m,c.fillText(f.text,v,M),f.hidden&&(c.beginPath(),c.lineWidth=2,c.moveTo(v,M),c.lineTo(v+p,M),c.stroke()),y?d.x+=S+i.padding:d.y+=k})}},handleEvent:function(t){var e=this,i=e.options,n="mouseup"===t.type?"click":t.type,a=!1;if("mousemove"===n){if(!i.onHover)return}else{if("click"!==n)return;if(!i.onClick)return}var o=t.x,r=t.y;if(o>=e.left&&o<=e.right&&r>=e.top&&r<=e.bottom)for(var s=e.legendHitBoxes,l=0;l<s.length;++l){var u=s[l];if(o>=u.left&&o<=u.left+u.width&&r>=u.top&&r<=u.top+u.height){if("click"===n){i.onClick.call(e,t.native,e.legendItems[l]),a=!0;break}if("mousemove"===n){i.onHover.call(e,t.native,e.legendItems[l]),a=!0;break}}}return a}});function d(t,e){var i=new u({ctx:t.ctx,options:e,chart:t});r.configure(t,i,e),r.addBox(t,i),t.legend=i}e.exports={id:"legend",_element:u,beforeInit:function(t){var e=t.options.legend;e&&d(t,e)},beforeUpdate:function(t){var e=t.options.legend,i=t.legend;e?(o.mergeIf(e,n.global.legend),i?(r.configure(t,i,e),i.options=e):d(t,e)):i&&(r.removeBox(t,i),delete t.legend)},afterEvent:function(t,e){var i=t.legend;i&&i.handleEvent(e)}}},{25:25,26:26,30:30,45:45}],52:[function(t,e,i){"use strict";var n=t(25),a=t(26),o=t(45),r=t(30),s=o.noop;n._set("global",{title:{display:!1,fontStyle:"bold",fullWidth:!0,lineHeight:1.2,padding:10,position:"top",text:"",weight:2e3}});var l=a.extend({initialize:function(t){o.extend(this,t),this.legendHitBoxes=[]},beforeUpdate:s,update:function(t,e,i){var n=this;return n.beforeUpdate(),n.maxWidth=t,n.maxHeight=e,n.margins=i,n.beforeSetDimensions(),n.setDimensions(),n.afterSetDimensions(),n.beforeBuildLabels(),n.buildLabels(),n.afterBuildLabels(),n.beforeFit(),n.fit(),n.afterFit(),n.afterUpdate(),n.minSize},afterUpdate:s,beforeSetDimensions:s,setDimensions:function(){var t=this;t.isHorizontal()?(t.width=t.maxWidth,t.left=0,t.right=t.width):(t.height=t.maxHeight,t.top=0,t.bottom=t.height),t.paddingLeft=0,t.paddingTop=0,t.paddingRight=0,t.paddingBottom=0,t.minSize={width:0,height:0}},afterSetDimensions:s,beforeBuildLabels:s,buildLabels:s,afterBuildLabels:s,beforeFit:s,fit:function(){var t=this,e=o.valueOrDefault,i=t.options,a=i.display,r=e(i.fontSize,n.global.defaultFontSize),s=t.minSize,l=o.isArray(i.text)?i.text.length:1,u=o.options.toLineHeight(i.lineHeight,r),d=a?l*u+2*i.padding:0;t.isHorizontal()?(s.width=t.maxWidth,s.height=d):(s.width=d,s.height=t.maxHeight),t.width=s.width,t.height=s.height},afterFit:s,isHorizontal:function(){var t=this.options.position;return"top"===t||"bottom"===t},draw:function(){var t=this,e=t.ctx,i=o.valueOrDefault,a=t.options,r=n.global;if(a.display){var s,l,u,d=i(a.fontSize,r.defaultFontSize),c=i(a.fontStyle,r.defaultFontStyle),h=i(a.fontFamily,r.defaultFontFamily),f=o.fontString(d,c,h),g=o.options.toLineHeight(a.lineHeight,d),p=g/2+a.padding,m=0,v=t.top,b=t.left,x=t.bottom,y=t.right;e.fillStyle=i(a.fontColor,r.defaultFontColor),e.font=f,t.isHorizontal()?(l=b+(y-b)/2,u=v+p,s=y-b):(l="left"===a.position?b+p:y-p,u=v+(x-v)/2,s=x-v,m=Math.PI*("left"===a.position?-.5:.5)),e.save(),e.translate(l,u),e.rotate(m),e.textAlign="center",e.textBaseline="middle";var k=a.text;if(o.isArray(k))for(var M=0,w=0;w<k.length;++w)e.fillText(k[w],0,M,s),M+=g;else e.fillText(k,0,0,s);e.restore()}}});function u(t,e){var i=new l({ctx:t.ctx,options:e,chart:t});r.configure(t,i,e),r.addBox(t,i),t.titleBlock=i}e.exports={id:"title",_element:l,beforeInit:function(t){var e=t.options.title;e&&u(t,e)},beforeUpdate:function(t){var e=t.options.title,i=t.titleBlock;e?(o.mergeIf(e,n.global.title),i?(r.configure(t,i,e),i.options=e):u(t,e)):i&&(r.removeBox(t,i),delete t.titleBlock)}}},{25:25,26:26,30:30,45:45}],53:[function(t,e,i){"use strict";e.exports=function(t){var e=t.Scale.extend({getLabels:function(){var t=this.chart.data;return this.options.labels||(this.isHorizontal()?t.xLabels:t.yLabels)||t.labels},determineDataLimits:function(){var t,e=this,i=e.getLabels();e.minIndex=0,e.maxIndex=i.length-1,void 0!==e.options.ticks.min&&(t=i.indexOf(e.options.ticks.min),e.minIndex=-1!==t?t:e.minIndex),void 0!==e.options.ticks.max&&(t=i.indexOf(e.options.ticks.max),e.maxIndex=-1!==t?t:e.maxIndex),e.min=i[e.minIndex],e.max=i[e.maxIndex]},buildTicks:function(){var t=this,e=t.getLabels();t.ticks=0===t.minIndex&&t.maxIndex===e.length-1?e:e.slice(t.minIndex,t.maxIndex+1)},getLabelForIndex:function(t,e){var i=this,n=i.chart.data,a=i.isHorizontal();return n.yLabels&&!a?i.getRightValue(n.datasets[e].data[t]):i.ticks[t-i.minIndex]},getPixelForValue:function(t,e){var i,n=this,a=n.options.offset,o=Math.max(n.maxIndex+1-n.minIndex-(a?0:1),1);if(null!=t&&(i=n.isHorizontal()?t.x:t.y),void 0!==i||void 0!==t&&isNaN(e)){t=i||t;var r=n.getLabels().indexOf(t);e=-1!==r?r:e}if(n.isHorizontal()){var s=n.width/o,l=s*(e-n.minIndex);return a&&(l+=s/2),n.left+Math.round(l)}var u=n.height/o,d=u*(e-n.minIndex);return a&&(d+=u/2),n.top+Math.round(d)},getPixelForTick:function(t){return this.getPixelForValue(this.ticks[t],t+this.minIndex,null)},getValueForPixel:function(t){var e=this,i=e.options.offset,n=Math.max(e._ticks.length-(i?0:1),1),a=e.isHorizontal(),o=(a?e.width:e.height)/n;return t-=a?e.left:e.top,i&&(t-=o/2),(t<=0?0:Math.round(t/o))+e.minIndex},getBasePixel:function(){return this.bottom}});t.scaleService.registerScaleType("category",e,{position:"bottom"})}},{}],54:[function(t,e,i){"use strict";var n=t(25),a=t(45),o=t(34);e.exports=function(t){var e={position:"left",ticks:{callback:o.formatters.linear}},i=t.LinearScaleBase.extend({determineDataLimits:function(){var t=this,e=t.options,i=t.chart,n=i.data.datasets,o=t.isHorizontal();function r(e){return o?e.xAxisID===t.id:e.yAxisID===t.id}t.min=null,t.max=null;var s=e.stacked;if(void 0===s&&a.each(n,function(t,e){if(!s){var n=i.getDatasetMeta(e);i.isDatasetVisible(e)&&r(n)&&void 0!==n.stack&&(s=!0)}}),e.stacked||s){var l={};a.each(n,function(n,o){var s=i.getDatasetMeta(o),u=[s.type,void 0===e.stacked&&void 0===s.stack?o:"",s.stack].join(".");void 0===l[u]&&(l[u]={positiveValues:[],negativeValues:[]});var d=l[u].positiveValues,c=l[u].negativeValues;i.isDatasetVisible(o)&&r(s)&&a.each(n.data,function(i,n){var a=+t.getRightValue(i);isNaN(a)||s.data[n].hidden||(d[n]=d[n]||0,c[n]=c[n]||0,e.relativePoints?d[n]=100:a<0?c[n]+=a:d[n]+=a)})}),a.each(l,function(e){var i=e.positiveValues.concat(e.negativeValues),n=a.min(i),o=a.max(i);t.min=null===t.min?n:Math.min(t.min,n),t.max=null===t.max?o:Math.max(t.max,o)})}else a.each(n,function(e,n){var o=i.getDatasetMeta(n);i.isDatasetVisible(n)&&r(o)&&a.each(e.data,function(e,i){var n=+t.getRightValue(e);isNaN(n)||o.data[i].hidden||(null===t.min?t.min=n:n<t.min&&(t.min=n),null===t.max?t.max=n:n>t.max&&(t.max=n))})});t.min=isFinite(t.min)&&!isNaN(t.min)?t.min:0,t.max=isFinite(t.max)&&!isNaN(t.max)?t.max:1,this.handleTickRangeOptions()},getTickLimit:function(){var t,e=this.options.ticks;if(this.isHorizontal())t=Math.min(e.maxTicksLimit?e.maxTicksLimit:11,Math.ceil(this.width/50));else{var i=a.valueOrDefault(e.fontSize,n.global.defaultFontSize);t=Math.min(e.maxTicksLimit?e.maxTicksLimit:11,Math.ceil(this.height/(2*i)))}return t},handleDirectionalChanges:function(){this.isHorizontal()||this.ticks.reverse()},getLabelForIndex:function(t,e){return+this.getRightValue(this.chart.data.datasets[e].data[t])},getPixelForValue:function(t){var e=this,i=e.start,n=+e.getRightValue(t),a=e.end-i;return e.isHorizontal()?e.left+e.width/a*(n-i):e.bottom-e.height/a*(n-i)},getValueForPixel:function(t){var e=this,i=e.isHorizontal(),n=i?e.width:e.height,a=(i?t-e.left:e.bottom-t)/n;return e.start+(e.end-e.start)*a},getPixelForTick:function(t){return this.getPixelForValue(this.ticksAsNumbers[t])}});t.scaleService.registerScaleType("linear",i,e)}},{25:25,34:34,45:45}],55:[function(t,e,i){"use strict";var n=t(45);e.exports=function(t){var e=n.noop;t.LinearScaleBase=t.Scale.extend({getRightValue:function(e){return"string"==typeof e?+e:t.Scale.prototype.getRightValue.call(this,e)},handleTickRangeOptions:function(){var t=this,e=t.options.ticks;if(e.beginAtZero){var i=n.sign(t.min),a=n.sign(t.max);i<0&&a<0?t.max=0:i>0&&a>0&&(t.min=0)}var o=void 0!==e.min||void 0!==e.suggestedMin,r=void 0!==e.max||void 0!==e.suggestedMax;void 0!==e.min?t.min=e.min:void 0!==e.suggestedMin&&(null===t.min?t.min=e.suggestedMin:t.min=Math.min(t.min,e.suggestedMin)),void 0!==e.max?t.max=e.max:void 0!==e.suggestedMax&&(null===t.max?t.max=e.suggestedMax:t.max=Math.max(t.max,e.suggestedMax)),o!==r&&t.min>=t.max&&(o?t.max=t.min+1:t.min=t.max-1),t.min===t.max&&(t.max++,e.beginAtZero||t.min--)},getTickLimit:e,handleDirectionalChanges:e,buildTicks:function(){var t=this,e=t.options.ticks,i=t.getTickLimit(),a={maxTicks:i=Math.max(2,i),min:e.min,max:e.max,stepSize:n.valueOrDefault(e.fixedStepSize,e.stepSize)},o=t.ticks=function(t,e){var i,a=[];if(t.stepSize&&t.stepSize>0)i=t.stepSize;else{var o=n.niceNum(e.max-e.min,!1);i=n.niceNum(o/(t.maxTicks-1),!0)}var r=Math.floor(e.min/i)*i,s=Math.ceil(e.max/i)*i;t.min&&t.max&&t.stepSize&&n.almostWhole((t.max-t.min)/t.stepSize,i/1e3)&&(r=t.min,s=t.max);var l=(s-r)/i;l=n.almostEquals(l,Math.round(l),i/1e3)?Math.round(l):Math.ceil(l);var u=1;i<1&&(u=Math.pow(10,i.toString().length-2),r=Math.round(r*u)/u,s=Math.round(s*u)/u),a.push(void 0!==t.min?t.min:r);for(var d=1;d<l;++d)a.push(Math.round((r+d*i)*u)/u);return a.push(void 0!==t.max?t.max:s),a}(a,t);t.handleDirectionalChanges(),t.max=n.max(o),t.min=n.min(o),e.reverse?(o.reverse(),t.start=t.max,t.end=t.min):(t.start=t.min,t.end=t.max)},convertTicksToLabels:function(){var e=this;e.ticksAsNumbers=e.ticks.slice(),e.zeroLineIndex=e.ticks.indexOf(0),t.Scale.prototype.convertTicksToLabels.call(e)}})}},{45:45}],56:[function(t,e,i){"use strict";var n=t(45),a=t(34);e.exports=function(t){var e={position:"left",ticks:{callback:a.formatters.logarithmic}},i=t.Scale.extend({determineDataLimits:function(){var t=this,e=t.options,i=t.chart,a=i.data.datasets,o=t.isHorizontal();function r(e){return o?e.xAxisID===t.id:e.yAxisID===t.id}t.min=null,t.max=null,t.minNotZero=null;var s=e.stacked;if(void 0===s&&n.each(a,function(t,e){if(!s){var n=i.getDatasetMeta(e);i.isDatasetVisible(e)&&r(n)&&void 0!==n.stack&&(s=!0)}}),e.stacked||s){var l={};n.each(a,function(a,o){var s=i.getDatasetMeta(o),u=[s.type,void 0===e.stacked&&void 0===s.stack?o:"",s.stack].join(".");i.isDatasetVisible(o)&&r(s)&&(void 0===l[u]&&(l[u]=[]),n.each(a.data,function(e,i){var n=l[u],a=+t.getRightValue(e);isNaN(a)||s.data[i].hidden||a<0||(n[i]=n[i]||0,n[i]+=a)}))}),n.each(l,function(e){if(e.length>0){var i=n.min(e),a=n.max(e);t.min=null===t.min?i:Math.min(t.min,i),t.max=null===t.max?a:Math.max(t.max,a)}})}else n.each(a,function(e,a){var o=i.getDatasetMeta(a);i.isDatasetVisible(a)&&r(o)&&n.each(e.data,function(e,i){var n=+t.getRightValue(e);isNaN(n)||o.data[i].hidden||n<0||(null===t.min?t.min=n:n<t.min&&(t.min=n),null===t.max?t.max=n:n>t.max&&(t.max=n),0!==n&&(null===t.minNotZero||n<t.minNotZero)&&(t.minNotZero=n))})});this.handleTickRangeOptions()},handleTickRangeOptions:function(){var t=this,e=t.options.ticks,i=n.valueOrDefault;t.min=i(e.min,t.min),t.max=i(e.max,t.max),t.min===t.max&&(0!==t.min&&null!==t.min?(t.min=Math.pow(10,Math.floor(n.log10(t.min))-1),t.max=Math.pow(10,Math.floor(n.log10(t.max))+1)):(t.min=1,t.max=10)),null===t.min&&(t.min=Math.pow(10,Math.floor(n.log10(t.max))-1)),null===t.max&&(t.max=0!==t.min?Math.pow(10,Math.floor(n.log10(t.min))+1):10),null===t.minNotZero&&(t.min>0?t.minNotZero=t.min:t.max<1?t.minNotZero=Math.pow(10,Math.floor(n.log10(t.max))):t.minNotZero=1)},buildTicks:function(){var t=this,e=t.options.ticks,i=!t.isHorizontal(),a={min:e.min,max:e.max},o=t.ticks=function(t,e){var i,a,o=[],r=n.valueOrDefault,s=r(t.min,Math.pow(10,Math.floor(n.log10(e.min)))),l=Math.floor(n.log10(e.max)),u=Math.ceil(e.max/Math.pow(10,l));0===s?(i=Math.floor(n.log10(e.minNotZero)),a=Math.floor(e.minNotZero/Math.pow(10,i)),o.push(s),s=a*Math.pow(10,i)):(i=Math.floor(n.log10(s)),a=Math.floor(s/Math.pow(10,i)));for(var d=i<0?Math.pow(10,Math.abs(i)):1;o.push(s),10==++a&&(a=1,d=++i>=0?1:d),s=Math.round(a*Math.pow(10,i)*d)/d,i<l||i===l&&a<u;);var c=r(t.max,s);return o.push(c),o}(a,t);t.max=n.max(o),t.min=n.min(o),e.reverse?(i=!i,t.start=t.max,t.end=t.min):(t.start=t.min,t.end=t.max),i&&o.reverse()},convertTicksToLabels:function(){this.tickValues=this.ticks.slice(),t.Scale.prototype.convertTicksToLabels.call(this)},getLabelForIndex:function(t,e){return+this.getRightValue(this.chart.data.datasets[e].data[t])},getPixelForTick:function(t){return this.getPixelForValue(this.tickValues[t])},_getFirstTickValue:function(t){var e=Math.floor(n.log10(t));return Math.floor(t/Math.pow(10,e))*Math.pow(10,e)},getPixelForValue:function(e){var i,a,o,r,s,l=this,u=l.options.ticks.reverse,d=n.log10,c=l._getFirstTickValue(l.minNotZero),h=0;return e=+l.getRightValue(e),u?(o=l.end,r=l.start,s=-1):(o=l.start,r=l.end,s=1),l.isHorizontal()?(i=l.width,a=u?l.right:l.left):(i=l.height,s*=-1,a=u?l.top:l.bottom),e!==o&&(0===o&&(i-=h=n.getValueOrDefault(l.options.ticks.fontSize,t.defaults.global.defaultFontSize),o=c),0!==e&&(h+=i/(d(r)-d(o))*(d(e)-d(o))),a+=s*h),a},getValueForPixel:function(e){var i,a,o,r,s=this,l=s.options.ticks.reverse,u=n.log10,d=s._getFirstTickValue(s.minNotZero);if(l?(a=s.end,o=s.start):(a=s.start,o=s.end),s.isHorizontal()?(i=s.width,r=l?s.right-e:e-s.left):(i=s.height,r=l?e-s.top:s.bottom-e),r!==a){if(0===a){var c=n.getValueOrDefault(s.options.ticks.fontSize,t.defaults.global.defaultFontSize);r-=c,i-=c,a=d}r*=u(o)-u(a),r/=i,r=Math.pow(10,u(a)+r)}return r}});t.scaleService.registerScaleType("logarithmic",i,e)}},{34:34,45:45}],57:[function(t,e,i){"use strict";var n=t(25),a=t(45),o=t(34);e.exports=function(t){var e=n.global,i={display:!0,animate:!0,position:"chartArea",angleLines:{display:!0,color:"rgba(0, 0, 0, 0.1)",lineWidth:1},gridLines:{circular:!1},ticks:{showLabelBackdrop:!0,backdropColor:"rgba(255,255,255,0.75)",backdropPaddingY:2,backdropPaddingX:2,callback:o.formatters.linear},pointLabels:{display:!0,fontSize:10,callback:function(t){return t}}};function r(t){var e=t.options;return e.angleLines.display||e.pointLabels.display?t.chart.data.labels.length:0}function s(t){var i=t.options.pointLabels,n=a.valueOrDefault(i.fontSize,e.defaultFontSize),o=a.valueOrDefault(i.fontStyle,e.defaultFontStyle),r=a.valueOrDefault(i.fontFamily,e.defaultFontFamily);return{size:n,style:o,family:r,font:a.fontString(n,o,r)}}function l(t,e,i,n,a){return t===n||t===a?{start:e-i/2,end:e+i/2}:t<n||t>a?{start:e-i-5,end:e}:{start:e,end:e+i+5}}function u(t,e,i,n){if(a.isArray(e))for(var o=i.y,r=1.5*n,s=0;s<e.length;++s)t.fillText(e[s],i.x,o),o+=r;else t.fillText(e,i.x,i.y)}function d(t){return a.isNumber(t)?t:0}var c=t.LinearScaleBase.extend({setDimensions:function(){var t=this,i=t.options,n=i.ticks;t.width=t.maxWidth,t.height=t.maxHeight,t.xCenter=Math.round(t.width/2),t.yCenter=Math.round(t.height/2);var o=a.min([t.height,t.width]),r=a.valueOrDefault(n.fontSize,e.defaultFontSize);t.drawingArea=i.display?o/2-(r/2+n.backdropPaddingY):o/2},determineDataLimits:function(){var t=this,e=t.chart,i=Number.POSITIVE_INFINITY,n=Number.NEGATIVE_INFINITY;a.each(e.data.datasets,function(o,r){if(e.isDatasetVisible(r)){var s=e.getDatasetMeta(r);a.each(o.data,function(e,a){var o=+t.getRightValue(e);isNaN(o)||s.data[a].hidden||(i=Math.min(o,i),n=Math.max(o,n))})}}),t.min=i===Number.POSITIVE_INFINITY?0:i,t.max=n===Number.NEGATIVE_INFINITY?0:n,t.handleTickRangeOptions()},getTickLimit:function(){var t=this.options.ticks,i=a.valueOrDefault(t.fontSize,e.defaultFontSize);return Math.min(t.maxTicksLimit?t.maxTicksLimit:11,Math.ceil(this.drawingArea/(1.5*i)))},convertTicksToLabels:function(){var e=this;t.LinearScaleBase.prototype.convertTicksToLabels.call(e),e.pointLabels=e.chart.data.labels.map(e.options.pointLabels.callback,e)},getLabelForIndex:function(t,e){return+this.getRightValue(this.chart.data.datasets[e].data[t])},fit:function(){var t,e;this.options.pointLabels.display?function(t){var e,i,n,o=s(t),u=Math.min(t.height/2,t.width/2),d={r:t.width,l:0,t:t.height,b:0},c={};t.ctx.font=o.font,t._pointLabelSizes=[];var h,f,g,p=r(t);for(e=0;e<p;e++){n=t.getPointPosition(e,u),h=t.ctx,f=o.size,g=t.pointLabels[e]||"",i=a.isArray(g)?{w:a.longestText(h,h.font,g),h:g.length*f+1.5*(g.length-1)*f}:{w:h.measureText(g).width,h:f},t._pointLabelSizes[e]=i;var m=t.getIndexAngle(e),v=a.toDegrees(m)%360,b=l(v,n.x,i.w,0,180),x=l(v,n.y,i.h,90,270);b.start<d.l&&(d.l=b.start,c.l=m),b.end>d.r&&(d.r=b.end,c.r=m),x.start<d.t&&(d.t=x.start,c.t=m),x.end>d.b&&(d.b=x.end,c.b=m)}t.setReductions(u,d,c)}(this):(t=this,e=Math.min(t.height/2,t.width/2),t.drawingArea=Math.round(e),t.setCenterPoint(0,0,0,0))},setReductions:function(t,e,i){var n=e.l/Math.sin(i.l),a=Math.max(e.r-this.width,0)/Math.sin(i.r),o=-e.t/Math.cos(i.t),r=-Math.max(e.b-this.height,0)/Math.cos(i.b);n=d(n),a=d(a),o=d(o),r=d(r),this.drawingArea=Math.min(Math.round(t-(n+a)/2),Math.round(t-(o+r)/2)),this.setCenterPoint(n,a,o,r)},setCenterPoint:function(t,e,i,n){var a=this,o=a.width-e-a.drawingArea,r=t+a.drawingArea,s=i+a.drawingArea,l=a.height-n-a.drawingArea;a.xCenter=Math.round((r+o)/2+a.left),a.yCenter=Math.round((s+l)/2+a.top)},getIndexAngle:function(t){return t*(2*Math.PI/r(this))+(this.chart.options&&this.chart.options.startAngle?this.chart.options.startAngle:0)*Math.PI*2/360},getDistanceFromCenterForValue:function(t){var e=this;if(null===t)return 0;var i=e.drawingArea/(e.max-e.min);return e.options.ticks.reverse?(e.max-t)*i:(t-e.min)*i},getPointPosition:function(t,e){var i=this.getIndexAngle(t)-Math.PI/2;return{x:Math.round(Math.cos(i)*e)+this.xCenter,y:Math.round(Math.sin(i)*e)+this.yCenter}},getPointPositionForValue:function(t,e){return this.getPointPosition(t,this.getDistanceFromCenterForValue(e))},getBasePosition:function(){var t=this.min,e=this.max;return this.getPointPositionForValue(0,this.beginAtZero?0:t<0&&e<0?e:t>0&&e>0?t:0)},draw:function(){var t=this,i=t.options,n=i.gridLines,o=i.ticks,l=a.valueOrDefault;if(i.display){var d=t.ctx,c=this.getIndexAngle(0),h=l(o.fontSize,e.defaultFontSize),f=l(o.fontStyle,e.defaultFontStyle),g=l(o.fontFamily,e.defaultFontFamily),p=a.fontString(h,f,g);a.each(t.ticks,function(i,s){if(s>0||o.reverse){var u=t.getDistanceFromCenterForValue(t.ticksAsNumbers[s]);if(n.display&&0!==s&&function(t,e,i,n){var o=t.ctx;if(o.strokeStyle=a.valueAtIndexOrDefault(e.color,n-1),o.lineWidth=a.valueAtIndexOrDefault(e.lineWidth,n-1),t.options.gridLines.circular)o.beginPath(),o.arc(t.xCenter,t.yCenter,i,0,2*Math.PI),o.closePath(),o.stroke();else{var s=r(t);if(0===s)return;o.beginPath();var l=t.getPointPosition(0,i);o.moveTo(l.x,l.y);for(var u=1;u<s;u++)l=t.getPointPosition(u,i),o.lineTo(l.x,l.y);o.closePath(),o.stroke()}}(t,n,u,s),o.display){var f=l(o.fontColor,e.defaultFontColor);if(d.font=p,d.save(),d.translate(t.xCenter,t.yCenter),d.rotate(c),o.showLabelBackdrop){var g=d.measureText(i).width;d.fillStyle=o.backdropColor,d.fillRect(-g/2-o.backdropPaddingX,-u-h/2-o.backdropPaddingY,g+2*o.backdropPaddingX,h+2*o.backdropPaddingY)}d.textAlign="center",d.textBaseline="middle",d.fillStyle=f,d.fillText(i,0,-u),d.restore()}}}),(i.angleLines.display||i.pointLabels.display)&&function(t){var i=t.ctx,n=t.options,o=n.angleLines,l=n.pointLabels;i.lineWidth=o.lineWidth,i.strokeStyle=o.color;var d,c,h,f,g=t.getDistanceFromCenterForValue(n.ticks.reverse?t.min:t.max),p=s(t);i.textBaseline="top";for(var m=r(t)-1;m>=0;m--){if(o.display){var v=t.getPointPosition(m,g);i.beginPath(),i.moveTo(t.xCenter,t.yCenter),i.lineTo(v.x,v.y),i.stroke(),i.closePath()}if(l.display){var b=t.getPointPosition(m,g+5),x=a.valueAtIndexOrDefault(l.fontColor,m,e.defaultFontColor);i.font=p.font,i.fillStyle=x;var y=t.getIndexAngle(m),k=a.toDegrees(y);i.textAlign=0===(f=k)||180===f?"center":f<180?"left":"right",d=k,c=t._pointLabelSizes[m],h=b,90===d||270===d?h.y-=c.h/2:(d>270||d<90)&&(h.y-=c.h),u(i,t.pointLabels[m]||"",b,p.size)}}}(t)}}});t.scaleService.registerScaleType("radialLinear",c,i)}},{25:25,34:34,45:45}],58:[function(t,e,i){"use strict";var n=t(1);n="function"==typeof n?n:window.moment;var a=t(25),o=t(45),r=Number.MIN_SAFE_INTEGER||-9007199254740991,s=Number.MAX_SAFE_INTEGER||9007199254740991,l={millisecond:{common:!0,size:1,steps:[1,2,5,10,20,50,100,250,500]},second:{common:!0,size:1e3,steps:[1,2,5,10,30]},minute:{common:!0,size:6e4,steps:[1,2,5,10,30]},hour:{common:!0,size:36e5,steps:[1,2,3,6,12]},day:{common:!0,size:864e5,steps:[1,2,5]},week:{common:!1,size:6048e5,steps:[1,2,3,4]},month:{common:!0,size:2628e6,steps:[1,2,3]},quarter:{common:!1,size:7884e6,steps:[1,2,3,4]},year:{common:!0,size:3154e7}},u=Object.keys(l);function d(t,e){return t-e}function c(t){var e,i,n,a={},o=[];for(e=0,i=t.length;e<i;++e)a[n=t[e]]||(a[n]=!0,o.push(n));return o}function h(t,e,i,n){var a=function(t,e,i){for(var n,a,o,r=0,s=t.length-1;r>=0&&r<=s;){if(a=t[(n=r+s>>1)-1]||null,o=t[n],!a)return{lo:null,hi:o};if(o[e]<i)r=n+1;else{if(!(a[e]>i))return{lo:a,hi:o};s=n-1}}return{lo:o,hi:null}}(t,e,i),o=a.lo?a.hi?a.lo:t[t.length-2]:t[0],r=a.lo?a.hi?a.hi:t[t.length-1]:t[1],s=r[e]-o[e],l=s?(i-o[e])/s:0,u=(r[n]-o[n])*l;return o[n]+u}function f(t,e){var i=e.parser,a=e.parser||e.format;return"function"==typeof i?i(t):"string"==typeof t&&"string"==typeof a?n(t,a):(t instanceof n||(t=n(t)),t.isValid()?t:"function"==typeof a?a(t):t)}function g(t,e){if(o.isNullOrUndef(t))return null;var i=e.options.time,n=f(e.getRightValue(t),i);return n.isValid()?(i.round&&n.startOf(i.round),n.valueOf()):null}function p(t){for(var e=u.indexOf(t)+1,i=u.length;e<i;++e)if(l[u[e]].common)return u[e]}function m(t,e,i,a){var r,d=a.time,c=d.unit||function(t,e,i,n){var a,o,r,d=u.length;for(a=u.indexOf(t);a<d-1;++a)if(r=(o=l[u[a]]).steps?o.steps[o.steps.length-1]:s,o.common&&Math.ceil((i-e)/(r*o.size))<=n)return u[a];return u[d-1]}(d.minUnit,t,e,i),h=p(c),f=o.valueOrDefault(d.stepSize,d.unitStepSize),g="week"===c&&d.isoWeekday,m=a.ticks.major.enabled,v=l[c],b=n(t),x=n(e),y=[];for(f||(f=function(t,e,i,n){var a,o,r,s=e-t,u=l[i],d=u.size,c=u.steps;if(!c)return Math.ceil(s/(n*d));for(a=0,o=c.length;a<o&&(r=c[a],!(Math.ceil(s/(d*r))<=n));++a);return r}(t,e,c,i)),g&&(b=b.isoWeekday(g),x=x.isoWeekday(g)),b=b.startOf(g?"day":c),(x=x.startOf(g?"day":c))<e&&x.add(1,c),r=n(b),m&&h&&!g&&!d.round&&(r.startOf(h),r.add(~~((b-r)/(v.size*f))*f,c));r<x;r.add(f,c))y.push(+r);return y.push(+r),y}e.exports=function(t){var e=t.Scale.extend({initialize:function(){if(!n)throw new Error("Chart.js - Moment.js could not be found! You must include it before Chart.js to use the time scale. Download at https://momentjs.com");this.mergeTicksOptions(),t.Scale.prototype.initialize.call(this)},update:function(){var e=this.options;return e.time&&e.time.format&&console.warn("options.time.format is deprecated and replaced by options.time.parser."),t.Scale.prototype.update.apply(this,arguments)},getRightValue:function(e){return e&&void 0!==e.t&&(e=e.t),t.Scale.prototype.getRightValue.call(this,e)},determineDataLimits:function(){var t,e,i,a,l,u,h=this,f=h.chart,p=h.options.time,m=p.unit||"day",v=s,b=r,x=[],y=[],k=[];for(t=0,i=f.data.labels.length;t<i;++t)k.push(g(f.data.labels[t],h));for(t=0,i=(f.data.datasets||[]).length;t<i;++t)if(f.isDatasetVisible(t))if(l=f.data.datasets[t].data,o.isObject(l[0]))for(y[t]=[],e=0,a=l.length;e<a;++e)u=g(l[e],h),x.push(u),y[t][e]=u;else x.push.apply(x,k),y[t]=k.slice(0);else y[t]=[];k.length&&(k=c(k).sort(d),v=Math.min(v,k[0]),b=Math.max(b,k[k.length-1])),x.length&&(x=c(x).sort(d),v=Math.min(v,x[0]),b=Math.max(b,x[x.length-1])),v=g(p.min,h)||v,b=g(p.max,h)||b,v=v===s?+n().startOf(m):v,b=b===r?+n().endOf(m)+1:b,h.min=Math.min(v,b),h.max=Math.max(v+1,b),h._horizontal=h.isHorizontal(),h._table=[],h._timestamps={data:x,datasets:y,labels:k}},buildTicks:function(){var t,e,i,a,o,r,s,d,c,v,b,x,y=this,k=y.min,M=y.max,w=y.options,S=w.time,C=[],_=[];switch(w.ticks.source){case"data":C=y._timestamps.data;break;case"labels":C=y._timestamps.labels;break;case"auto":default:C=m(k,M,y.getLabelCapacity(k),w)}for("ticks"===w.bounds&&C.length&&(k=C[0],M=C[C.length-1]),k=g(S.min,y)||k,M=g(S.max,y)||M,t=0,e=C.length;t<e;++t)(i=C[t])>=k&&i<=M&&_.push(i);return y.min=k,y.max=M,y._unit=S.unit||function(t,e,i,a){var o,r,s=n.duration(n(a).diff(n(i)));for(o=u.length-1;o>=u.indexOf(e);o--)if(r=u[o],l[r].common&&s.as(r)>=t.length)return r;return u[e?u.indexOf(e):0]}(_,S.minUnit,y.min,y.max),y._majorUnit=p(y._unit),y._table=function(t,e,i,n){if("linear"===n||!t.length)return[{time:e,pos:0},{time:i,pos:1}];var a,o,r,s,l,u=[],d=[e];for(a=0,o=t.length;a<o;++a)(s=t[a])>e&&s<i&&d.push(s);for(d.push(i),a=0,o=d.length;a<o;++a)l=d[a+1],r=d[a-1],s=d[a],void 0!==r&&void 0!==l&&Math.round((l+r)/2)===s||u.push({time:s,pos:a/(o-1)});return u}(y._timestamps.data,k,M,w.distribution),y._offsets=(a=y._table,o=_,r=k,s=M,b=0,x=0,(d=w).offset&&o.length&&(d.time.min||(c=o.length>1?o[1]:s,v=o[0],b=(h(a,"time",c,"pos")-h(a,"time",v,"pos"))/2),d.time.max||(c=o[o.length-1],v=o.length>1?o[o.length-2]:r,x=(h(a,"time",c,"pos")-h(a,"time",v,"pos"))/2)),{left:b,right:x}),y._labelFormat=function(t,e){var i,n,a,o=t.length;for(i=0;i<o;i++){if(0!==(n=f(t[i],e)).millisecond())return"MMM D, YYYY h:mm:ss.SSS a";0===n.second()&&0===n.minute()&&0===n.hour()||(a=!0)}return a?"MMM D, YYYY h:mm:ss a":"MMM D, YYYY"}(y._timestamps.data,S),function(t,e){var i,a,o,r,s=[];for(i=0,a=t.length;i<a;++i)o=t[i],r=!!e&&o===+n(o).startOf(e),s.push({value:o,major:r});return s}(_,y._majorUnit)},getLabelForIndex:function(t,e){var i=this.chart.data,n=this.options.time,a=i.labels&&t<i.labels.length?i.labels[t]:"",r=i.datasets[e].data[t];return o.isObject(r)&&(a=this.getRightValue(r)),n.tooltipFormat?f(a,n).format(n.tooltipFormat):"string"==typeof a?a:f(a,n).format(this._labelFormat)},tickFormatFunction:function(t,e,i,n){var a=this.options,r=t.valueOf(),s=a.time.displayFormats,l=s[this._unit],u=this._majorUnit,d=s[u],c=t.clone().startOf(u).valueOf(),h=a.ticks.major,f=h.enabled&&u&&d&&r===c,g=t.format(n||(f?d:l)),p=f?h:a.ticks.minor,m=o.valueOrDefault(p.callback,p.userCallback);return m?m(g,e,i):g},convertTicksToLabels:function(t){var e,i,a=[];for(e=0,i=t.length;e<i;++e)a.push(this.tickFormatFunction(n(t[e].value),e,t));return a},getPixelForOffset:function(t){var e=this,i=e._horizontal?e.width:e.height,n=e._horizontal?e.left:e.top,a=h(e._table,"time",t,"pos");return n+i*(e._offsets.left+a)/(e._offsets.left+1+e._offsets.right)},getPixelForValue:function(t,e,i){var n=null;if(void 0!==e&&void 0!==i&&(n=this._timestamps.datasets[i][e]),null===n&&(n=g(t,this)),null!==n)return this.getPixelForOffset(n)},getPixelForTick:function(t){var e=this.getTicks();return t>=0&&t<e.length?this.getPixelForOffset(e[t].value):null},getValueForPixel:function(t){var e=this,i=e._horizontal?e.width:e.height,a=e._horizontal?e.left:e.top,o=(i?(t-a)/i:0)*(e._offsets.left+1+e._offsets.left)-e._offsets.right,r=h(e._table,"pos",o,"time");return n(r)},getLabelWidth:function(t){var e=this.options.ticks,i=this.ctx.measureText(t).width,n=o.toRadians(e.maxRotation),r=Math.cos(n),s=Math.sin(n);return i*r+o.valueOrDefault(e.fontSize,a.global.defaultFontSize)*s},getLabelCapacity:function(t){var e=this,i=e.options.time.displayFormats.millisecond,a=e.tickFormatFunction(n(t),0,[],i),o=e.getLabelWidth(a),r=e.isHorizontal()?e.width:e.height,s=Math.floor(r/o);return s>0?s:1}});t.scaleService.registerScaleType("time",e,{position:"bottom",distribution:"linear",bounds:"data",time:{parser:!1,format:!1,unit:!1,round:!1,displayFormat:!1,isoWeekday:!1,minUnit:"millisecond",displayFormats:{millisecond:"h:mm:ss.SSS a",second:"h:mm:ss a",minute:"h:mm a",hour:"hA",day:"MMM D",week:"ll",month:"MMM YYYY",quarter:"[Q]Q - YYYY",year:"YYYY"}},ticks:{autoSkip:!1,source:"auto",major:{enabled:!1}}})}},{1:1,25:25,45:45}]},{},[7])(7)});
/*
     _ _      _       _
 ___| (_) ___| | __  (_)___
/ __| | |/ __| |/ /  | / __|
\__ \ | | (__|   < _ | \__ \
|___/_|_|\___|_|\_(_)/ |___/
                   |__/

 Version: 1.8.0
  Author: Ken Wheeler
 Website: http://kenwheeler.github.io
    Docs: http://kenwheeler.github.io/slick
    Repo: http://github.com/kenwheeler/slick
  Issues: http://github.com/kenwheeler/slick/issues

 */
/* global window, document, define, jQuery, setInterval, clearInterval */
;(function(factory) {
    'use strict';
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else if (typeof exports !== 'undefined') {
        module.exports = factory(require('jquery'));
    } else {
        factory(jQuery);
    }

}(function($) {
    'use strict';
    var Slick = window.Slick || {};

    Slick = (function() {

        var instanceUid = 0;

        function Slick(element, settings) {

            var _ = this, dataSettings;

            _.defaults = {
                accessibility: true,
                adaptiveHeight: false,
                appendArrows: $(element),
                appendDots: $(element),
                arrows: true,
                asNavFor: null,
                prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
                nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
                autoplay: false,
                autoplaySpeed: 3000,
                centerMode: false,
                centerPadding: '50px',
                cssEase: 'ease',
                customPaging: function(slider, i) {
                    return $('<button type="button" />').text(i + 1);
                },
                dots: false,
                dotsClass: 'slick-dots',
                draggable: true,
                easing: 'linear',
                edgeFriction: 0.35,
                fade: false,
                focusOnSelect: false,
                focusOnChange: false,
                infinite: true,
                initialSlide: 0,
                lazyLoad: 'ondemand',
                mobileFirst: false,
                pauseOnHover: true,
                pauseOnFocus: true,
                pauseOnDotsHover: false,
                respondTo: 'window',
                responsive: null,
                rows: 1,
                rtl: false,
                slide: '',
                slidesPerRow: 1,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 500,
                swipe: true,
                swipeToSlide: false,
                touchMove: true,
                touchThreshold: 5,
                useCSS: true,
                useTransform: true,
                variableWidth: false,
                vertical: false,
                verticalSwiping: false,
                waitForAnimate: true,
                zIndex: 1000
            };

            _.initials = {
                animating: false,
                dragging: false,
                autoPlayTimer: null,
                currentDirection: 0,
                currentLeft: null,
                currentSlide: 0,
                direction: 1,
                $dots: null,
                listWidth: null,
                listHeight: null,
                loadIndex: 0,
                $nextArrow: null,
                $prevArrow: null,
                scrolling: false,
                slideCount: null,
                slideWidth: null,
                $slideTrack: null,
                $slides: null,
                sliding: false,
                slideOffset: 0,
                swipeLeft: null,
                swiping: false,
                $list: null,
                touchObject: {},
                transformsEnabled: false,
                unslicked: false
            };

            $.extend(_, _.initials);

            _.activeBreakpoint = null;
            _.animType = null;
            _.animProp = null;
            _.breakpoints = [];
            _.breakpointSettings = [];
            _.cssTransitions = false;
            _.focussed = false;
            _.interrupted = false;
            _.hidden = 'hidden';
            _.paused = true;
            _.positionProp = null;
            _.respondTo = null;
            _.rowCount = 1;
            _.shouldClick = true;
            _.$slider = $(element);
            _.$slidesCache = null;
            _.transformType = null;
            _.transitionType = null;
            _.visibilityChange = 'visibilitychange';
            _.windowWidth = 0;
            _.windowTimer = null;

            dataSettings = $(element).data('slick') || {};

            _.options = $.extend({}, _.defaults, settings, dataSettings);

            _.currentSlide = _.options.initialSlide;

            _.originalSettings = _.options;

            if (typeof document.mozHidden !== 'undefined') {
                _.hidden = 'mozHidden';
                _.visibilityChange = 'mozvisibilitychange';
            } else if (typeof document.webkitHidden !== 'undefined') {
                _.hidden = 'webkitHidden';
                _.visibilityChange = 'webkitvisibilitychange';
            }

            _.autoPlay = $.proxy(_.autoPlay, _);
            _.autoPlayClear = $.proxy(_.autoPlayClear, _);
            _.autoPlayIterator = $.proxy(_.autoPlayIterator, _);
            _.changeSlide = $.proxy(_.changeSlide, _);
            _.clickHandler = $.proxy(_.clickHandler, _);
            _.selectHandler = $.proxy(_.selectHandler, _);
            _.setPosition = $.proxy(_.setPosition, _);
            _.swipeHandler = $.proxy(_.swipeHandler, _);
            _.dragHandler = $.proxy(_.dragHandler, _);
            _.keyHandler = $.proxy(_.keyHandler, _);

            _.instanceUid = instanceUid++;

            // A simple way to check for HTML strings
            // Strict HTML recognition (must start with <)
            // Extracted from jQuery v1.11 source
            _.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/;


            _.registerBreakpoints();
            _.init(true);

        }

        return Slick;

    }());

    Slick.prototype.activateADA = function() {
        var _ = this;

        _.$slideTrack.find('.slick-active').attr({
            'aria-hidden': 'false'
        }).find('a, input, button, select').attr({
            'tabindex': '0'
        });

    };

    Slick.prototype.addSlide = Slick.prototype.slickAdd = function(markup, index, addBefore) {

        var _ = this;

        if (typeof(index) === 'boolean') {
            addBefore = index;
            index = null;
        } else if (index < 0 || (index >= _.slideCount)) {
            return false;
        }

        _.unload();

        if (typeof(index) === 'number') {
            if (index === 0 && _.$slides.length === 0) {
                $(markup).appendTo(_.$slideTrack);
            } else if (addBefore) {
                $(markup).insertBefore(_.$slides.eq(index));
            } else {
                $(markup).insertAfter(_.$slides.eq(index));
            }
        } else {
            if (addBefore === true) {
                $(markup).prependTo(_.$slideTrack);
            } else {
                $(markup).appendTo(_.$slideTrack);
            }
        }

        _.$slides = _.$slideTrack.children(this.options.slide);

        _.$slideTrack.children(this.options.slide).detach();

        _.$slideTrack.append(_.$slides);

        _.$slides.each(function(index, element) {
            $(element).attr('data-slick-index', index);
        });

        _.$slidesCache = _.$slides;

        _.reinit();

    };

    Slick.prototype.animateHeight = function() {
        var _ = this;
        if (_.options.slidesToShow === 1 && _.options.adaptiveHeight === true && _.options.vertical === false) {
            var targetHeight = _.$slides.eq(_.currentSlide).outerHeight(true);
            _.$list.animate({
                height: targetHeight
            }, _.options.speed);
        }
    };

    Slick.prototype.animateSlide = function(targetLeft, callback) {

        var animProps = {},
            _ = this;

        _.animateHeight();

        if (_.options.rtl === true && _.options.vertical === false) {
            targetLeft = -targetLeft;
        }
        if (_.transformsEnabled === false) {
            if (_.options.vertical === false) {
                _.$slideTrack.animate({
                    left: targetLeft
                }, _.options.speed, _.options.easing, callback);
            } else {
                _.$slideTrack.animate({
                    top: targetLeft
                }, _.options.speed, _.options.easing, callback);
            }

        } else {

            if (_.cssTransitions === false) {
                if (_.options.rtl === true) {
                    _.currentLeft = -(_.currentLeft);
                }
                $({
                    animStart: _.currentLeft
                }).animate({
                    animStart: targetLeft
                }, {
                    duration: _.options.speed,
                    easing: _.options.easing,
                    step: function(now) {
                        now = Math.ceil(now);
                        if (_.options.vertical === false) {
                            animProps[_.animType] = 'translate(' +
                                now + 'px, 0px)';
                            _.$slideTrack.css(animProps);
                        } else {
                            animProps[_.animType] = 'translate(0px,' +
                                now + 'px)';
                            _.$slideTrack.css(animProps);
                        }
                    },
                    complete: function() {
                        if (callback) {
                            callback.call();
                        }
                    }
                });

            } else {

                _.applyTransition();
                targetLeft = Math.ceil(targetLeft);

                if (_.options.vertical === false) {
                    animProps[_.animType] = 'translate3d(' + targetLeft + 'px, 0px, 0px)';
                } else {
                    animProps[_.animType] = 'translate3d(0px,' + targetLeft + 'px, 0px)';
                }
                _.$slideTrack.css(animProps);

                if (callback) {
                    setTimeout(function() {

                        _.disableTransition();

                        callback.call();
                    }, _.options.speed);
                }

            }

        }

    };

    Slick.prototype.getNavTarget = function() {

        var _ = this,
            asNavFor = _.options.asNavFor;

        if ( asNavFor && asNavFor !== null ) {
            asNavFor = $(asNavFor).not(_.$slider);
        }

        return asNavFor;

    };

    Slick.prototype.asNavFor = function(index) {

        var _ = this,
            asNavFor = _.getNavTarget();

        if ( asNavFor !== null && typeof asNavFor === 'object' ) {
            asNavFor.each(function() {
                var target = $(this).slick('getSlick');
                if(!target.unslicked) {
                    target.slideHandler(index, true);
                }
            });
        }

    };

    Slick.prototype.applyTransition = function(slide) {

        var _ = this,
            transition = {};

        if (_.options.fade === false) {
            transition[_.transitionType] = _.transformType + ' ' + _.options.speed + 'ms ' + _.options.cssEase;
        } else {
            transition[_.transitionType] = 'opacity ' + _.options.speed + 'ms ' + _.options.cssEase;
        }

        if (_.options.fade === false) {
            _.$slideTrack.css(transition);
        } else {
            _.$slides.eq(slide).css(transition);
        }

    };

    Slick.prototype.autoPlay = function() {

        var _ = this;

        _.autoPlayClear();

        if ( _.slideCount > _.options.slidesToShow ) {
            _.autoPlayTimer = setInterval( _.autoPlayIterator, _.options.autoplaySpeed );
        }

    };

    Slick.prototype.autoPlayClear = function() {

        var _ = this;

        if (_.autoPlayTimer) {
            clearInterval(_.autoPlayTimer);
        }

    };

    Slick.prototype.autoPlayIterator = function() {

        var _ = this,
            slideTo = _.currentSlide + _.options.slidesToScroll;

        if ( !_.paused && !_.interrupted && !_.focussed ) {

            if ( _.options.infinite === false ) {

                if ( _.direction === 1 && ( _.currentSlide + 1 ) === ( _.slideCount - 1 )) {
                    _.direction = 0;
                }

                else if ( _.direction === 0 ) {

                    slideTo = _.currentSlide - _.options.slidesToScroll;

                    if ( _.currentSlide - 1 === 0 ) {
                        _.direction = 1;
                    }

                }

            }

            _.slideHandler( slideTo );

        }

    };

    Slick.prototype.buildArrows = function() {

        var _ = this;

        if (_.options.arrows === true ) {

            _.$prevArrow = $(_.options.prevArrow).addClass('slick-arrow');
            _.$nextArrow = $(_.options.nextArrow).addClass('slick-arrow');

            if( _.slideCount > _.options.slidesToShow ) {

                _.$prevArrow.removeClass('slick-hidden').removeAttr('aria-hidden tabindex');
                _.$nextArrow.removeClass('slick-hidden').removeAttr('aria-hidden tabindex');

                if (_.htmlExpr.test(_.options.prevArrow)) {
                    _.$prevArrow.prependTo(_.options.appendArrows);
                }

                if (_.htmlExpr.test(_.options.nextArrow)) {
                    _.$nextArrow.appendTo(_.options.appendArrows);
                }

                if (_.options.infinite !== true) {
                    _.$prevArrow
                        .addClass('slick-disabled')
                        .attr('aria-disabled', 'true');
                }

            } else {

                _.$prevArrow.add( _.$nextArrow )

                    .addClass('slick-hidden')
                    .attr({
                        'aria-disabled': 'true',
                        'tabindex': '-1'
                    });

            }

        }

    };

    Slick.prototype.buildDots = function() {

        var _ = this,
            i, dot;

        if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {

            _.$slider.addClass('slick-dotted');

            dot = $('<ul />').addClass(_.options.dotsClass);

            for (i = 0; i <= _.getDotCount(); i += 1) {
                dot.append($('<li />').append(_.options.customPaging.call(this, _, i)));
            }

            _.$dots = dot.appendTo(_.options.appendDots);

            _.$dots.find('li').first().addClass('slick-active');

        }

    };

    Slick.prototype.buildOut = function() {

        var _ = this;

        _.$slides =
            _.$slider
                .children( _.options.slide + ':not(.slick-cloned)')
                .addClass('slick-slide');

        _.slideCount = _.$slides.length;

        _.$slides.each(function(index, element) {
            $(element)
                .attr('data-slick-index', index)
                .data('originalStyling', $(element).attr('style') || '');
        });

        _.$slider.addClass('slick-slider');

        _.$slideTrack = (_.slideCount === 0) ?
            $('<div class="slick-track"/>').appendTo(_.$slider) :
            _.$slides.wrapAll('<div class="slick-track"/>').parent();

        _.$list = _.$slideTrack.wrap(
            '<div class="slick-list"/>').parent();
        _.$slideTrack.css('opacity', 0);

        if (_.options.centerMode === true || _.options.swipeToSlide === true) {
            _.options.slidesToScroll = 1;
        }

        $('img[data-lazy]', _.$slider).not('[src]').addClass('slick-loading');

        _.setupInfinite();

        _.buildArrows();

        _.buildDots();

        _.updateDots();


        _.setSlideClasses(typeof _.currentSlide === 'number' ? _.currentSlide : 0);

        if (_.options.draggable === true) {
            _.$list.addClass('draggable');
        }

    };

    Slick.prototype.buildRows = function() {

        var _ = this, a, b, c, newSlides, numOfSlides, originalSlides,slidesPerSection;

        newSlides = document.createDocumentFragment();
        originalSlides = _.$slider.children();

        if(_.options.rows > 0) {

            slidesPerSection = _.options.slidesPerRow * _.options.rows;
            numOfSlides = Math.ceil(
                originalSlides.length / slidesPerSection
            );

            for(a = 0; a < numOfSlides; a++){
                var slide = document.createElement('div');
                for(b = 0; b < _.options.rows; b++) {
                    var row = document.createElement('div');
                    for(c = 0; c < _.options.slidesPerRow; c++) {
                        var target = (a * slidesPerSection + ((b * _.options.slidesPerRow) + c));
                        if (originalSlides.get(target)) {
                            row.appendChild(originalSlides.get(target));
                        }
                    }
                    slide.appendChild(row);
                }
                newSlides.appendChild(slide);
            }

            _.$slider.empty().append(newSlides);
            _.$slider.children().children().children()
                .css({
                    'width':(100 / _.options.slidesPerRow) + '%',
                    'display': 'inline-block'
                });

        }

    };

    Slick.prototype.checkResponsive = function(initial, forceUpdate) {

        var _ = this,
            breakpoint, targetBreakpoint, respondToWidth, triggerBreakpoint = false;
        var sliderWidth = _.$slider.width();
        var windowWidth = window.innerWidth || $(window).width();

        if (_.respondTo === 'window') {
            respondToWidth = windowWidth;
        } else if (_.respondTo === 'slider') {
            respondToWidth = sliderWidth;
        } else if (_.respondTo === 'min') {
            respondToWidth = Math.min(windowWidth, sliderWidth);
        }

        if ( _.options.responsive &&
            _.options.responsive.length &&
            _.options.responsive !== null) {

            targetBreakpoint = null;

            for (breakpoint in _.breakpoints) {
                if (_.breakpoints.hasOwnProperty(breakpoint)) {
                    if (_.originalSettings.mobileFirst === false) {
                        if (respondToWidth < _.breakpoints[breakpoint]) {
                            targetBreakpoint = _.breakpoints[breakpoint];
                        }
                    } else {
                        if (respondToWidth > _.breakpoints[breakpoint]) {
                            targetBreakpoint = _.breakpoints[breakpoint];
                        }
                    }
                }
            }

            if (targetBreakpoint !== null) {
                if (_.activeBreakpoint !== null) {
                    if (targetBreakpoint !== _.activeBreakpoint || forceUpdate) {
                        _.activeBreakpoint =
                            targetBreakpoint;
                        if (_.breakpointSettings[targetBreakpoint] === 'unslick') {
                            _.unslick(targetBreakpoint);
                        } else {
                            _.options = $.extend({}, _.originalSettings,
                                _.breakpointSettings[
                                    targetBreakpoint]);
                            if (initial === true) {
                                _.currentSlide = _.options.initialSlide;
                            }
                            _.refresh(initial);
                        }
                        triggerBreakpoint = targetBreakpoint;
                    }
                } else {
                    _.activeBreakpoint = targetBreakpoint;
                    if (_.breakpointSettings[targetBreakpoint] === 'unslick') {
                        _.unslick(targetBreakpoint);
                    } else {
                        _.options = $.extend({}, _.originalSettings,
                            _.breakpointSettings[
                                targetBreakpoint]);
                        if (initial === true) {
                            _.currentSlide = _.options.initialSlide;
                        }
                        _.refresh(initial);
                    }
                    triggerBreakpoint = targetBreakpoint;
                }
            } else {
                if (_.activeBreakpoint !== null) {
                    _.activeBreakpoint = null;
                    _.options = _.originalSettings;
                    if (initial === true) {
                        _.currentSlide = _.options.initialSlide;
                    }
                    _.refresh(initial);
                    triggerBreakpoint = targetBreakpoint;
                }
            }

            // only trigger breakpoints during an actual break. not on initialize.
            if( !initial && triggerBreakpoint !== false ) {
                _.$slider.trigger('breakpoint', [_, triggerBreakpoint]);
            }
        }

    };

    Slick.prototype.changeSlide = function(event, dontAnimate) {

        var _ = this,
            $target = $(event.currentTarget),
            indexOffset, slideOffset, unevenOffset;

        // If target is a link, prevent default action.
        if($target.is('a')) {
            event.preventDefault();
        }

        // If target is not the <li> element (ie: a child), find the <li>.
        if(!$target.is('li')) {
            $target = $target.closest('li');
        }

        unevenOffset = (_.slideCount % _.options.slidesToScroll !== 0);
        indexOffset = unevenOffset ? 0 : (_.slideCount - _.currentSlide) % _.options.slidesToScroll;

        switch (event.data.message) {

            case 'previous':
                slideOffset = indexOffset === 0 ? _.options.slidesToScroll : _.options.slidesToShow - indexOffset;
                if (_.slideCount > _.options.slidesToShow) {
                    _.slideHandler(_.currentSlide - slideOffset, false, dontAnimate);
                }
                break;

            case 'next':
                slideOffset = indexOffset === 0 ? _.options.slidesToScroll : indexOffset;
                if (_.slideCount > _.options.slidesToShow) {
                    _.slideHandler(_.currentSlide + slideOffset, false, dontAnimate);
                }
                break;

            case 'index':
                var index = event.data.index === 0 ? 0 :
                    event.data.index || $target.index() * _.options.slidesToScroll;

                _.slideHandler(_.checkNavigable(index), false, dontAnimate);
                $target.children().trigger('focus');
                break;

            default:
                return;
        }

    };

    Slick.prototype.checkNavigable = function(index) {

        var _ = this,
            navigables, prevNavigable;

        navigables = _.getNavigableIndexes();
        prevNavigable = 0;
        if (index > navigables[navigables.length - 1]) {
            index = navigables[navigables.length - 1];
        } else {
            for (var n in navigables) {
                if (index < navigables[n]) {
                    index = prevNavigable;
                    break;
                }
                prevNavigable = navigables[n];
            }
        }

        return index;
    };

    Slick.prototype.cleanUpEvents = function() {

        var _ = this;

        if (_.options.dots && _.$dots !== null) {

            $('li', _.$dots)
                .off('click.slick', _.changeSlide)
                .off('mouseenter.slick', $.proxy(_.interrupt, _, true))
                .off('mouseleave.slick', $.proxy(_.interrupt, _, false));

            if (_.options.accessibility === true) {
                _.$dots.off('keydown.slick', _.keyHandler);
            }
        }

        _.$slider.off('focus.slick blur.slick');

        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {
            _.$prevArrow && _.$prevArrow.off('click.slick', _.changeSlide);
            _.$nextArrow && _.$nextArrow.off('click.slick', _.changeSlide);

            if (_.options.accessibility === true) {
                _.$prevArrow && _.$prevArrow.off('keydown.slick', _.keyHandler);
                _.$nextArrow && _.$nextArrow.off('keydown.slick', _.keyHandler);
            }
        }

        _.$list.off('touchstart.slick mousedown.slick', _.swipeHandler);
        _.$list.off('touchmove.slick mousemove.slick', _.swipeHandler);
        _.$list.off('touchend.slick mouseup.slick', _.swipeHandler);
        _.$list.off('touchcancel.slick mouseleave.slick', _.swipeHandler);

        _.$list.off('click.slick', _.clickHandler);

        $(document).off(_.visibilityChange, _.visibility);

        _.cleanUpSlideEvents();

        if (_.options.accessibility === true) {
            _.$list.off('keydown.slick', _.keyHandler);
        }

        if (_.options.focusOnSelect === true) {
            $(_.$slideTrack).children().off('click.slick', _.selectHandler);
        }

        $(window).off('orientationchange.slick.slick-' + _.instanceUid, _.orientationChange);

        $(window).off('resize.slick.slick-' + _.instanceUid, _.resize);

        $('[draggable!=true]', _.$slideTrack).off('dragstart', _.preventDefault);

        $(window).off('load.slick.slick-' + _.instanceUid, _.setPosition);

    };

    Slick.prototype.cleanUpSlideEvents = function() {

        var _ = this;

        _.$list.off('mouseenter.slick', $.proxy(_.interrupt, _, true));
        _.$list.off('mouseleave.slick', $.proxy(_.interrupt, _, false));

    };

    Slick.prototype.cleanUpRows = function() {

        var _ = this, originalSlides;

        if(_.options.rows > 0) {
            originalSlides = _.$slides.children().children();
            originalSlides.removeAttr('style');
            _.$slider.empty().append(originalSlides);
        }

    };

    Slick.prototype.clickHandler = function(event) {

        var _ = this;

        if (_.shouldClick === false) {
            event.stopImmediatePropagation();
            event.stopPropagation();
            event.preventDefault();
        }

    };

    Slick.prototype.destroy = function(refresh) {

        var _ = this;

        _.autoPlayClear();

        _.touchObject = {};

        _.cleanUpEvents();

        $('.slick-cloned', _.$slider).detach();

        if (_.$dots) {
            _.$dots.remove();
        }

        if ( _.$prevArrow && _.$prevArrow.length ) {

            _.$prevArrow
                .removeClass('slick-disabled slick-arrow slick-hidden')
                .removeAttr('aria-hidden aria-disabled tabindex')
                .css('display','');

            if ( _.htmlExpr.test( _.options.prevArrow )) {
                _.$prevArrow.remove();
            }
        }

        if ( _.$nextArrow && _.$nextArrow.length ) {

            _.$nextArrow
                .removeClass('slick-disabled slick-arrow slick-hidden')
                .removeAttr('aria-hidden aria-disabled tabindex')
                .css('display','');

            if ( _.htmlExpr.test( _.options.nextArrow )) {
                _.$nextArrow.remove();
            }
        }


        if (_.$slides) {

            _.$slides
                .removeClass('slick-slide slick-active slick-center slick-visible slick-current')
                .removeAttr('aria-hidden')
                .removeAttr('data-slick-index')
                .each(function(){
                    $(this).attr('style', $(this).data('originalStyling'));
                });

            _.$slideTrack.children(this.options.slide).detach();

            _.$slideTrack.detach();

            _.$list.detach();

            _.$slider.append(_.$slides);
        }

        _.cleanUpRows();

        _.$slider.removeClass('slick-slider');
        _.$slider.removeClass('slick-initialized');
        _.$slider.removeClass('slick-dotted');

        _.unslicked = true;

        if(!refresh) {
            _.$slider.trigger('destroy', [_]);
        }

    };

    Slick.prototype.disableTransition = function(slide) {

        var _ = this,
            transition = {};

        transition[_.transitionType] = '';

        if (_.options.fade === false) {
            _.$slideTrack.css(transition);
        } else {
            _.$slides.eq(slide).css(transition);
        }

    };

    Slick.prototype.fadeSlide = function(slideIndex, callback) {

        var _ = this;

        if (_.cssTransitions === false) {

            _.$slides.eq(slideIndex).css({
                zIndex: _.options.zIndex
            });

            _.$slides.eq(slideIndex).animate({
                opacity: 1
            }, _.options.speed, _.options.easing, callback);

        } else {

            _.applyTransition(slideIndex);

            _.$slides.eq(slideIndex).css({
                opacity: 1,
                zIndex: _.options.zIndex
            });

            if (callback) {
                setTimeout(function() {

                    _.disableTransition(slideIndex);

                    callback.call();
                }, _.options.speed);
            }

        }

    };

    Slick.prototype.fadeSlideOut = function(slideIndex) {

        var _ = this;

        if (_.cssTransitions === false) {

            _.$slides.eq(slideIndex).animate({
                opacity: 0,
                zIndex: _.options.zIndex - 2
            }, _.options.speed, _.options.easing);

        } else {

            _.applyTransition(slideIndex);

            _.$slides.eq(slideIndex).css({
                opacity: 0,
                zIndex: _.options.zIndex - 2
            });

        }

    };

    Slick.prototype.filterSlides = Slick.prototype.slickFilter = function(filter) {

        var _ = this;

        if (filter !== null) {

            _.$slidesCache = _.$slides;

            _.unload();

            _.$slideTrack.children(this.options.slide).detach();

            _.$slidesCache.filter(filter).appendTo(_.$slideTrack);

            _.reinit();

        }

    };

    Slick.prototype.focusHandler = function() {

        var _ = this;

        _.$slider
            .off('focus.slick blur.slick')
            .on('focus.slick blur.slick', '*', function(event) {

            event.stopImmediatePropagation();
            var $sf = $(this);

            setTimeout(function() {

                if( _.options.pauseOnFocus ) {
                    _.focussed = $sf.is(':focus');
                    _.autoPlay();
                }

            }, 0);

        });
    };

    Slick.prototype.getCurrent = Slick.prototype.slickCurrentSlide = function() {

        var _ = this;
        return _.currentSlide;

    };

    Slick.prototype.getDotCount = function() {

        var _ = this;

        var breakPoint = 0;
        var counter = 0;
        var pagerQty = 0;

        if (_.options.infinite === true) {
            if (_.slideCount <= _.options.slidesToShow) {
                 ++pagerQty;
            } else {
                while (breakPoint < _.slideCount) {
                    ++pagerQty;
                    breakPoint = counter + _.options.slidesToScroll;
                    counter += _.options.slidesToScroll <= _.options.slidesToShow ? _.options.slidesToScroll : _.options.slidesToShow;
                }
            }
        } else if (_.options.centerMode === true) {
            pagerQty = _.slideCount;
        } else if(!_.options.asNavFor) {
            pagerQty = 1 + Math.ceil((_.slideCount - _.options.slidesToShow) / _.options.slidesToScroll);
        }else {
            while (breakPoint < _.slideCount) {
                ++pagerQty;
                breakPoint = counter + _.options.slidesToScroll;
                counter += _.options.slidesToScroll <= _.options.slidesToShow ? _.options.slidesToScroll : _.options.slidesToShow;
            }
        }

        return pagerQty - 1;

    };

    Slick.prototype.getLeft = function(slideIndex) {

        var _ = this,
            targetLeft,
            verticalHeight,
            verticalOffset = 0,
            targetSlide,
            coef;

        _.slideOffset = 0;
        verticalHeight = _.$slides.first().outerHeight(true);

        if (_.options.infinite === true) {
            if (_.slideCount > _.options.slidesToShow) {
                _.slideOffset = (_.slideWidth * _.options.slidesToShow) * -1;
                coef = -1

                if (_.options.vertical === true && _.options.centerMode === true) {
                    if (_.options.slidesToShow === 2) {
                        coef = -1.5;
                    } else if (_.options.slidesToShow === 1) {
                        coef = -2
                    }
                }
                verticalOffset = (verticalHeight * _.options.slidesToShow) * coef;
            }
            if (_.slideCount % _.options.slidesToScroll !== 0) {
                if (slideIndex + _.options.slidesToScroll > _.slideCount && _.slideCount > _.options.slidesToShow) {
                    if (slideIndex > _.slideCount) {
                        _.slideOffset = ((_.options.slidesToShow - (slideIndex - _.slideCount)) * _.slideWidth) * -1;
                        verticalOffset = ((_.options.slidesToShow - (slideIndex - _.slideCount)) * verticalHeight) * -1;
                    } else {
                        _.slideOffset = ((_.slideCount % _.options.slidesToScroll) * _.slideWidth) * -1;
                        verticalOffset = ((_.slideCount % _.options.slidesToScroll) * verticalHeight) * -1;
                    }
                }
            }
        } else {
            if (slideIndex + _.options.slidesToShow > _.slideCount) {
                _.slideOffset = ((slideIndex + _.options.slidesToShow) - _.slideCount) * _.slideWidth;
                verticalOffset = ((slideIndex + _.options.slidesToShow) - _.slideCount) * verticalHeight;
            }
        }

        if (_.slideCount <= _.options.slidesToShow) {
            _.slideOffset = 0;
            verticalOffset = 0;
        }

        if (_.options.centerMode === true && _.slideCount <= _.options.slidesToShow) {
            _.slideOffset = ((_.slideWidth * Math.floor(_.options.slidesToShow)) / 2) - ((_.slideWidth * _.slideCount) / 2);
        } else if (_.options.centerMode === true && _.options.infinite === true) {
            _.slideOffset += _.slideWidth * Math.floor(_.options.slidesToShow / 2) - _.slideWidth;
        } else if (_.options.centerMode === true) {
            _.slideOffset = 0;
            _.slideOffset += _.slideWidth * Math.floor(_.options.slidesToShow / 2);
        }

        if (_.options.vertical === false) {
            targetLeft = ((slideIndex * _.slideWidth) * -1) + _.slideOffset;
        } else {
            targetLeft = ((slideIndex * verticalHeight) * -1) + verticalOffset;
        }

        if (_.options.variableWidth === true) {

            if (_.slideCount <= _.options.slidesToShow || _.options.infinite === false) {
                targetSlide = _.$slideTrack.children('.slick-slide').eq(slideIndex);
            } else {
                targetSlide = _.$slideTrack.children('.slick-slide').eq(slideIndex + _.options.slidesToShow);
            }

            if (_.options.rtl === true) {
                if (targetSlide[0]) {
                    targetLeft = (_.$slideTrack.width() - targetSlide[0].offsetLeft - targetSlide.width()) * -1;
                } else {
                    targetLeft =  0;
                }
            } else {
                targetLeft = targetSlide[0] ? targetSlide[0].offsetLeft * -1 : 0;
            }

            if (_.options.centerMode === true) {
                if (_.slideCount <= _.options.slidesToShow || _.options.infinite === false) {
                    targetSlide = _.$slideTrack.children('.slick-slide').eq(slideIndex);
                } else {
                    targetSlide = _.$slideTrack.children('.slick-slide').eq(slideIndex + _.options.slidesToShow + 1);
                }

                if (_.options.rtl === true) {
                    if (targetSlide[0]) {
                        targetLeft = (_.$slideTrack.width() - targetSlide[0].offsetLeft - targetSlide.width()) * -1;
                    } else {
                        targetLeft =  0;
                    }
                } else {
                    targetLeft = targetSlide[0] ? targetSlide[0].offsetLeft * -1 : 0;
                }

                targetLeft += (_.$list.width() - targetSlide.outerWidth()) / 2;
            }
        }

        return targetLeft;

    };

    Slick.prototype.getOption = Slick.prototype.slickGetOption = function(option) {

        var _ = this;

        return _.options[option];

    };

    Slick.prototype.getNavigableIndexes = function() {

        var _ = this,
            breakPoint = 0,
            counter = 0,
            indexes = [],
            max;

        if (_.options.infinite === false) {
            max = _.slideCount;
        } else {
            breakPoint = _.options.slidesToScroll * -1;
            counter = _.options.slidesToScroll * -1;
            max = _.slideCount * 2;
        }

        while (breakPoint < max) {
            indexes.push(breakPoint);
            breakPoint = counter + _.options.slidesToScroll;
            counter += _.options.slidesToScroll <= _.options.slidesToShow ? _.options.slidesToScroll : _.options.slidesToShow;
        }

        return indexes;

    };

    Slick.prototype.getSlick = function() {

        return this;

    };

    Slick.prototype.getSlideCount = function() {

        var _ = this,
            slidesTraversed, swipedSlide, centerOffset;

        centerOffset = _.options.centerMode === true ? _.slideWidth * Math.floor(_.options.slidesToShow / 2) : 0;

        if (_.options.swipeToSlide === true) {
            _.$slideTrack.find('.slick-slide').each(function(index, slide) {
                if (slide.offsetLeft - centerOffset + ($(slide).outerWidth() / 2) > (_.swipeLeft * -1)) {
                    swipedSlide = slide;
                    return false;
                }
            });

            slidesTraversed = Math.abs($(swipedSlide).attr('data-slick-index') - _.currentSlide) || 1;

            return slidesTraversed;

        } else {
            return _.options.slidesToScroll;
        }

    };

    Slick.prototype.goTo = Slick.prototype.slickGoTo = function(slide, dontAnimate) {

        var _ = this;

        _.changeSlide({
            data: {
                message: 'index',
                index: parseInt(slide)
            }
        }, dontAnimate);

    };

    Slick.prototype.init = function(creation) {

        var _ = this;

        if (!$(_.$slider).hasClass('slick-initialized')) {

            $(_.$slider).addClass('slick-initialized');

            _.buildRows();
            _.buildOut();
            _.setProps();
            _.startLoad();
            _.loadSlider();
            _.initializeEvents();
            _.updateArrows();
            _.updateDots();
            _.checkResponsive(true);
            _.focusHandler();

        }

        if (creation) {
            _.$slider.trigger('init', [_]);
        }

        if (_.options.accessibility === true) {
            _.initADA();
        }

        if ( _.options.autoplay ) {

            _.paused = false;
            _.autoPlay();

        }

    };

    Slick.prototype.initADA = function() {
        var _ = this,
                numDotGroups = Math.ceil(_.slideCount / _.options.slidesToShow),
                tabControlIndexes = _.getNavigableIndexes().filter(function(val) {
                    return (val >= 0) && (val < _.slideCount);
                });

        _.$slides.add(_.$slideTrack.find('.slick-cloned')).attr({
            'aria-hidden': 'true',
            'tabindex': '-1'
        }).find('a, input, button, select').attr({
            'tabindex': '-1'
        });

        if (_.$dots !== null) {
            _.$slides.not(_.$slideTrack.find('.slick-cloned')).each(function(i) {
                var slideControlIndex = tabControlIndexes.indexOf(i);

                $(this).attr({
                    'role': 'tabpanel',
                    'id': 'slick-slide' + _.instanceUid + i,
                    'tabindex': -1
                });

                if (slideControlIndex !== -1) {
                   var ariaButtonControl = 'slick-slide-control' + _.instanceUid + slideControlIndex
                   if ($('#' + ariaButtonControl).length) {
                     $(this).attr({
                         'aria-describedby': ariaButtonControl
                     });
                   }
                }
            });

            _.$dots.attr('role', 'tablist').find('li').each(function(i) {
                var mappedSlideIndex = tabControlIndexes[i];

                $(this).attr({
                    'role': 'presentation'
                });

                $(this).find('button').first().attr({
                    'role': 'tab',
                    'id': 'slick-slide-control' + _.instanceUid + i,
                    'aria-controls': 'slick-slide' + _.instanceUid + mappedSlideIndex,
                    'aria-label': (i + 1) + ' of ' + numDotGroups,
                    'aria-selected': null,
                    'tabindex': '-1'
                });

            }).eq(_.currentSlide).find('button').attr({
                'aria-selected': 'true',
                'tabindex': '0'
            }).end();
        }

        for (var i=_.currentSlide, max=i+_.options.slidesToShow; i < max; i++) {
          if (_.options.focusOnChange) {
            _.$slides.eq(i).attr({'tabindex': '0'});
          } else {
            _.$slides.eq(i).removeAttr('tabindex');
          }
        }

        _.activateADA();

    };

    Slick.prototype.initArrowEvents = function() {

        var _ = this;

        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {
            _.$prevArrow
               .off('click.slick')
               .on('click.slick', {
                    message: 'previous'
               }, _.changeSlide);
            _.$nextArrow
               .off('click.slick')
               .on('click.slick', {
                    message: 'next'
               }, _.changeSlide);

            if (_.options.accessibility === true) {
                _.$prevArrow.on('keydown.slick', _.keyHandler);
                _.$nextArrow.on('keydown.slick', _.keyHandler);
            }
        }

    };

    Slick.prototype.initDotEvents = function() {

        var _ = this;

        if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {
            $('li', _.$dots).on('click.slick', {
                message: 'index'
            }, _.changeSlide);

            if (_.options.accessibility === true) {
                _.$dots.on('keydown.slick', _.keyHandler);
            }
        }

        if (_.options.dots === true && _.options.pauseOnDotsHover === true && _.slideCount > _.options.slidesToShow) {

            $('li', _.$dots)
                .on('mouseenter.slick', $.proxy(_.interrupt, _, true))
                .on('mouseleave.slick', $.proxy(_.interrupt, _, false));

        }

    };

    Slick.prototype.initSlideEvents = function() {

        var _ = this;

        if ( _.options.pauseOnHover ) {

            _.$list.on('mouseenter.slick', $.proxy(_.interrupt, _, true));
            _.$list.on('mouseleave.slick', $.proxy(_.interrupt, _, false));

        }

    };

    Slick.prototype.initializeEvents = function() {

        var _ = this;

        _.initArrowEvents();

        _.initDotEvents();
        _.initSlideEvents();

        _.$list.on('touchstart.slick mousedown.slick', {
            action: 'start'
        }, _.swipeHandler);
        _.$list.on('touchmove.slick mousemove.slick', {
            action: 'move'
        }, _.swipeHandler);
        _.$list.on('touchend.slick mouseup.slick', {
            action: 'end'
        }, _.swipeHandler);
        _.$list.on('touchcancel.slick mouseleave.slick', {
            action: 'end'
        }, _.swipeHandler);

        _.$list.on('click.slick', _.clickHandler);

        $(document).on(_.visibilityChange, $.proxy(_.visibility, _));

        if (_.options.accessibility === true) {
            _.$list.on('keydown.slick', _.keyHandler);
        }

        if (_.options.focusOnSelect === true) {
            $(_.$slideTrack).children().on('click.slick', _.selectHandler);
        }

        $(window).on('orientationchange.slick.slick-' + _.instanceUid, $.proxy(_.orientationChange, _));

        $(window).on('resize.slick.slick-' + _.instanceUid, $.proxy(_.resize, _));

        $('[draggable!=true]', _.$slideTrack).on('dragstart', _.preventDefault);

        $(window).on('load.slick.slick-' + _.instanceUid, _.setPosition);
        $(_.setPosition);

    };

    Slick.prototype.initUI = function() {

        var _ = this;

        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {

            _.$prevArrow.show();
            _.$nextArrow.show();

        }

        if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {

            _.$dots.show();

        }

    };

    Slick.prototype.keyHandler = function(event) {

        var _ = this;
         //Dont slide if the cursor is inside the form fields and arrow keys are pressed
        if(!event.target.tagName.match('TEXTAREA|INPUT|SELECT')) {
            if (event.keyCode === 37 && _.options.accessibility === true) {
                _.changeSlide({
                    data: {
                        message: _.options.rtl === true ? 'next' :  'previous'
                    }
                });
            } else if (event.keyCode === 39 && _.options.accessibility === true) {
                _.changeSlide({
                    data: {
                        message: _.options.rtl === true ? 'previous' : 'next'
                    }
                });
            }
        }

    };

    Slick.prototype.lazyLoad = function() {

        var _ = this,
            loadRange, cloneRange, rangeStart, rangeEnd;

        function loadImages(imagesScope) {

            $('img[data-lazy]', imagesScope).each(function() {

                var image = $(this),
                    imageSource = $(this).attr('data-lazy'),
                    imageSrcSet = $(this).attr('data-srcset'),
                    imageSizes  = $(this).attr('data-sizes') || _.$slider.attr('data-sizes'),
                    imageToLoad = document.createElement('img');

                imageToLoad.onload = function() {

                    image
                        .animate({ opacity: 0 }, 100, function() {

                            if (imageSrcSet) {
                                image
                                    .attr('srcset', imageSrcSet );

                                if (imageSizes) {
                                    image
                                        .attr('sizes', imageSizes );
                                }
                            }

                            image
                                .attr('src', imageSource)
                                .animate({ opacity: 1 }, 200, function() {
                                    image
                                        .removeAttr('data-lazy data-srcset data-sizes')
                                        .removeClass('slick-loading');
                                });
                            _.$slider.trigger('lazyLoaded', [_, image, imageSource]);
                        });

                };

                imageToLoad.onerror = function() {

                    image
                        .removeAttr( 'data-lazy' )
                        .removeClass( 'slick-loading' )
                        .addClass( 'slick-lazyload-error' );

                    _.$slider.trigger('lazyLoadError', [ _, image, imageSource ]);

                };

                imageToLoad.src = imageSource;

            });

        }

        if (_.options.centerMode === true) {
            if (_.options.infinite === true) {
                rangeStart = _.currentSlide + (_.options.slidesToShow / 2 + 1);
                rangeEnd = rangeStart + _.options.slidesToShow + 2;
            } else {
                rangeStart = Math.max(0, _.currentSlide - (_.options.slidesToShow / 2 + 1));
                rangeEnd = 2 + (_.options.slidesToShow / 2 + 1) + _.currentSlide;
            }
        } else {
            rangeStart = _.options.infinite ? _.options.slidesToShow + _.currentSlide : _.currentSlide;
            rangeEnd = Math.ceil(rangeStart + _.options.slidesToShow);
            if (_.options.fade === true) {
                if (rangeStart > 0) rangeStart--;
                if (rangeEnd <= _.slideCount) rangeEnd++;
            }
        }

        loadRange = _.$slider.find('.slick-slide').slice(rangeStart, rangeEnd);

        if (_.options.lazyLoad === 'anticipated') {
            var prevSlide = rangeStart - 1,
                nextSlide = rangeEnd,
                $slides = _.$slider.find('.slick-slide');

            for (var i = 0; i < _.options.slidesToScroll; i++) {
                if (prevSlide < 0) prevSlide = _.slideCount - 1;
                loadRange = loadRange.add($slides.eq(prevSlide));
                loadRange = loadRange.add($slides.eq(nextSlide));
                prevSlide--;
                nextSlide++;
            }
        }

        loadImages(loadRange);

        if (_.slideCount <= _.options.slidesToShow) {
            cloneRange = _.$slider.find('.slick-slide');
            loadImages(cloneRange);
        } else
        if (_.currentSlide >= _.slideCount - _.options.slidesToShow) {
            cloneRange = _.$slider.find('.slick-cloned').slice(0, _.options.slidesToShow);
            loadImages(cloneRange);
        } else if (_.currentSlide === 0) {
            cloneRange = _.$slider.find('.slick-cloned').slice(_.options.slidesToShow * -1);
            loadImages(cloneRange);
        }

    };

    Slick.prototype.loadSlider = function() {

        var _ = this;

        _.setPosition();

        _.$slideTrack.css({
            opacity: 1
        });

        _.$slider.removeClass('slick-loading');

        _.initUI();

        if (_.options.lazyLoad === 'progressive') {
            _.progressiveLazyLoad();
        }

    };

    Slick.prototype.next = Slick.prototype.slickNext = function() {

        var _ = this;

        _.changeSlide({
            data: {
                message: 'next'
            }
        });

    };

    Slick.prototype.orientationChange = function() {

        var _ = this;

        _.checkResponsive();
        _.setPosition();

    };

    Slick.prototype.pause = Slick.prototype.slickPause = function() {

        var _ = this;

        _.autoPlayClear();
        _.paused = true;

    };

    Slick.prototype.play = Slick.prototype.slickPlay = function() {

        var _ = this;

        _.autoPlay();
        _.options.autoplay = true;
        _.paused = false;
        _.focussed = false;
        _.interrupted = false;

    };

    Slick.prototype.postSlide = function(index) {

        var _ = this;

        if( !_.unslicked ) {

            _.$slider.trigger('afterChange', [_, index]);

            _.animating = false;

            if (_.slideCount > _.options.slidesToShow) {
                _.setPosition();
            }

            _.swipeLeft = null;

            if ( _.options.autoplay ) {
                _.autoPlay();
            }

            if (_.options.accessibility === true) {
                _.initADA();

                if (_.options.focusOnChange) {
                    var $currentSlide = $(_.$slides.get(_.currentSlide));
                    $currentSlide.attr('tabindex', 0).focus();
                }
            }

        }

    };

    Slick.prototype.prev = Slick.prototype.slickPrev = function() {

        var _ = this;

        _.changeSlide({
            data: {
                message: 'previous'
            }
        });

    };

    Slick.prototype.preventDefault = function(event) {

        event.preventDefault();

    };

    Slick.prototype.progressiveLazyLoad = function( tryCount ) {

        tryCount = tryCount || 1;

        var _ = this,
            $imgsToLoad = $( 'img[data-lazy]', _.$slider ),
            image,
            imageSource,
            imageSrcSet,
            imageSizes,
            imageToLoad;

        if ( $imgsToLoad.length ) {

            image = $imgsToLoad.first();
            imageSource = image.attr('data-lazy');
            imageSrcSet = image.attr('data-srcset');
            imageSizes  = image.attr('data-sizes') || _.$slider.attr('data-sizes');
            imageToLoad = document.createElement('img');

            imageToLoad.onload = function() {

                if (imageSrcSet) {
                    image
                        .attr('srcset', imageSrcSet );

                    if (imageSizes) {
                        image
                            .attr('sizes', imageSizes );
                    }
                }

                image
                    .attr( 'src', imageSource )
                    .removeAttr('data-lazy data-srcset data-sizes')
                    .removeClass('slick-loading');

                if ( _.options.adaptiveHeight === true ) {
                    _.setPosition();
                }

                _.$slider.trigger('lazyLoaded', [ _, image, imageSource ]);
                _.progressiveLazyLoad();

            };

            imageToLoad.onerror = function() {

                if ( tryCount < 3 ) {

                    /**
                     * try to load the image 3 times,
                     * leave a slight delay so we don't get
                     * servers blocking the request.
                     */
                    setTimeout( function() {
                        _.progressiveLazyLoad( tryCount + 1 );
                    }, 500 );

                } else {

                    image
                        .removeAttr( 'data-lazy' )
                        .removeClass( 'slick-loading' )
                        .addClass( 'slick-lazyload-error' );

                    _.$slider.trigger('lazyLoadError', [ _, image, imageSource ]);

                    _.progressiveLazyLoad();

                }

            };

            imageToLoad.src = imageSource;

        } else {

            _.$slider.trigger('allImagesLoaded', [ _ ]);

        }

    };

    Slick.prototype.refresh = function( initializing ) {

        var _ = this, currentSlide, lastVisibleIndex;

        lastVisibleIndex = _.slideCount - _.options.slidesToShow;

        // in non-infinite sliders, we don't want to go past the
        // last visible index.
        if( !_.options.infinite && ( _.currentSlide > lastVisibleIndex )) {
            _.currentSlide = lastVisibleIndex;
        }

        // if less slides than to show, go to start.
        if ( _.slideCount <= _.options.slidesToShow ) {
            _.currentSlide = 0;

        }

        currentSlide = _.currentSlide;

        _.destroy(true);

        $.extend(_, _.initials, { currentSlide: currentSlide });

        _.init();

        if( !initializing ) {

            _.changeSlide({
                data: {
                    message: 'index',
                    index: currentSlide
                }
            }, false);

        }

    };

    Slick.prototype.registerBreakpoints = function() {

        var _ = this, breakpoint, currentBreakpoint, l,
            responsiveSettings = _.options.responsive || null;

        if ( $.type(responsiveSettings) === 'array' && responsiveSettings.length ) {

            _.respondTo = _.options.respondTo || 'window';

            for ( breakpoint in responsiveSettings ) {

                l = _.breakpoints.length-1;

                if (responsiveSettings.hasOwnProperty(breakpoint)) {
                    currentBreakpoint = responsiveSettings[breakpoint].breakpoint;

                    // loop through the breakpoints and cut out any existing
                    // ones with the same breakpoint number, we don't want dupes.
                    while( l >= 0 ) {
                        if( _.breakpoints[l] && _.breakpoints[l] === currentBreakpoint ) {
                            _.breakpoints.splice(l,1);
                        }
                        l--;
                    }

                    _.breakpoints.push(currentBreakpoint);
                    _.breakpointSettings[currentBreakpoint] = responsiveSettings[breakpoint].settings;

                }

            }

            _.breakpoints.sort(function(a, b) {
                return ( _.options.mobileFirst ) ? a-b : b-a;
            });

        }

    };

    Slick.prototype.reinit = function() {

        var _ = this;

        _.$slides =
            _.$slideTrack
                .children(_.options.slide)
                .addClass('slick-slide');

        _.slideCount = _.$slides.length;

        if (_.currentSlide >= _.slideCount && _.currentSlide !== 0) {
            _.currentSlide = _.currentSlide - _.options.slidesToScroll;
        }

        if (_.slideCount <= _.options.slidesToShow) {
            _.currentSlide = 0;
        }

        _.registerBreakpoints();

        _.setProps();
        _.setupInfinite();
        _.buildArrows();
        _.updateArrows();
        _.initArrowEvents();
        _.buildDots();
        _.updateDots();
        _.initDotEvents();
        _.cleanUpSlideEvents();
        _.initSlideEvents();

        _.checkResponsive(false, true);

        if (_.options.focusOnSelect === true) {
            $(_.$slideTrack).children().on('click.slick', _.selectHandler);
        }

        _.setSlideClasses(typeof _.currentSlide === 'number' ? _.currentSlide : 0);

        _.setPosition();
        _.focusHandler();

        _.paused = !_.options.autoplay;
        _.autoPlay();

        _.$slider.trigger('reInit', [_]);

    };

    Slick.prototype.resize = function() {

        var _ = this;

        if ($(window).width() !== _.windowWidth) {
            clearTimeout(_.windowDelay);
            _.windowDelay = window.setTimeout(function() {
                _.windowWidth = $(window).width();
                _.checkResponsive();
                if( !_.unslicked ) { _.setPosition(); }
            }, 50);
        }
    };

    Slick.prototype.removeSlide = Slick.prototype.slickRemove = function(index, removeBefore, removeAll) {

        var _ = this;

        if (typeof(index) === 'boolean') {
            removeBefore = index;
            index = removeBefore === true ? 0 : _.slideCount - 1;
        } else {
            index = removeBefore === true ? --index : index;
        }

        if (_.slideCount < 1 || index < 0 || index > _.slideCount - 1) {
            return false;
        }

        _.unload();

        if (removeAll === true) {
            _.$slideTrack.children().remove();
        } else {
            _.$slideTrack.children(this.options.slide).eq(index).remove();
        }

        _.$slides = _.$slideTrack.children(this.options.slide);

        _.$slideTrack.children(this.options.slide).detach();

        _.$slideTrack.append(_.$slides);

        _.$slidesCache = _.$slides;

        _.reinit();

    };

    Slick.prototype.setCSS = function(position) {

        var _ = this,
            positionProps = {},
            x, y;

        if (_.options.rtl === true) {
            position = -position;
        }
        x = _.positionProp == 'left' ? Math.ceil(position) + 'px' : '0px';
        y = _.positionProp == 'top' ? Math.ceil(position) + 'px' : '0px';

        positionProps[_.positionProp] = position;

        if (_.transformsEnabled === false) {
            _.$slideTrack.css(positionProps);
        } else {
            positionProps = {};
            if (_.cssTransitions === false) {
                positionProps[_.animType] = 'translate(' + x + ', ' + y + ')';
                _.$slideTrack.css(positionProps);
            } else {
                positionProps[_.animType] = 'translate3d(' + x + ', ' + y + ', 0px)';
                _.$slideTrack.css(positionProps);
            }
        }

    };

    Slick.prototype.setDimensions = function() {

        var _ = this;

        if (_.options.vertical === false) {
            if (_.options.centerMode === true) {
                _.$list.css({
                    padding: ('0px ' + _.options.centerPadding)
                });
            }
        } else {
            _.$list.height(_.$slides.first().outerHeight(true) * _.options.slidesToShow);
            if (_.options.centerMode === true) {
                _.$list.css({
                    padding: (_.options.centerPadding + ' 0px')
                });
            }
        }

        _.listWidth = _.$list.width();
        _.listHeight = _.$list.height();


        if (_.options.vertical === false && _.options.variableWidth === false) {
            _.slideWidth = Math.ceil(_.listWidth / _.options.slidesToShow);
            _.$slideTrack.width(Math.ceil((_.slideWidth * _.$slideTrack.children('.slick-slide').length)));

        } else if (_.options.variableWidth === true) {
            _.$slideTrack.width(5000 * _.slideCount);
        } else {
            _.slideWidth = Math.ceil(_.listWidth);
            _.$slideTrack.height(Math.ceil((_.$slides.first().outerHeight(true) * _.$slideTrack.children('.slick-slide').length)));
        }

        var offset = _.$slides.first().outerWidth(true) - _.$slides.first().width();
        if (_.options.variableWidth === false) _.$slideTrack.children('.slick-slide').width(_.slideWidth - offset);

    };

    Slick.prototype.setFade = function() {

        var _ = this,
            targetLeft;

        _.$slides.each(function(index, element) {
            targetLeft = (_.slideWidth * index) * -1;
            if (_.options.rtl === true) {
                $(element).css({
                    position: 'relative',
                    right: targetLeft,
                    top: 0,
                    zIndex: _.options.zIndex - 2,
                    opacity: 0
                });
            } else {
                $(element).css({
                    position: 'relative',
                    left: targetLeft,
                    top: 0,
                    zIndex: _.options.zIndex - 2,
                    opacity: 0
                });
            }
        });

        _.$slides.eq(_.currentSlide).css({
            zIndex: _.options.zIndex - 1,
            opacity: 1
        });

    };

    Slick.prototype.setHeight = function() {

        var _ = this;

        if (_.options.slidesToShow === 1 && _.options.adaptiveHeight === true && _.options.vertical === false) {
            var targetHeight = _.$slides.eq(_.currentSlide).outerHeight(true);
            _.$list.css('height', targetHeight);
        }

    };

    Slick.prototype.setOption =
    Slick.prototype.slickSetOption = function() {

        /**
         * accepts arguments in format of:
         *
         *  - for changing a single option's value:
         *     .slick("setOption", option, value, refresh )
         *
         *  - for changing a set of responsive options:
         *     .slick("setOption", 'responsive', [{}, ...], refresh )
         *
         *  - for updating multiple values at once (not responsive)
         *     .slick("setOption", { 'option': value, ... }, refresh )
         */

        var _ = this, l, item, option, value, refresh = false, type;

        if( $.type( arguments[0] ) === 'object' ) {

            option =  arguments[0];
            refresh = arguments[1];
            type = 'multiple';

        } else if ( $.type( arguments[0] ) === 'string' ) {

            option =  arguments[0];
            value = arguments[1];
            refresh = arguments[2];

            if ( arguments[0] === 'responsive' && $.type( arguments[1] ) === 'array' ) {

                type = 'responsive';

            } else if ( typeof arguments[1] !== 'undefined' ) {

                type = 'single';

            }

        }

        if ( type === 'single' ) {

            _.options[option] = value;


        } else if ( type === 'multiple' ) {

            $.each( option , function( opt, val ) {

                _.options[opt] = val;

            });


        } else if ( type === 'responsive' ) {

            for ( item in value ) {

                if( $.type( _.options.responsive ) !== 'array' ) {

                    _.options.responsive = [ value[item] ];

                } else {

                    l = _.options.responsive.length-1;

                    // loop through the responsive object and splice out duplicates.
                    while( l >= 0 ) {

                        if( _.options.responsive[l].breakpoint === value[item].breakpoint ) {

                            _.options.responsive.splice(l,1);

                        }

                        l--;

                    }

                    _.options.responsive.push( value[item] );

                }

            }

        }

        if ( refresh ) {

            _.unload();
            _.reinit();

        }

    };

    Slick.prototype.setPosition = function() {

        var _ = this;

        _.setDimensions();

        _.setHeight();

        if (_.options.fade === false) {
            _.setCSS(_.getLeft(_.currentSlide));
        } else {
            _.setFade();
        }

        _.$slider.trigger('setPosition', [_]);

    };

    Slick.prototype.setProps = function() {

        var _ = this,
            bodyStyle = document.body.style;

        _.positionProp = _.options.vertical === true ? 'top' : 'left';

        if (_.positionProp === 'top') {
            _.$slider.addClass('slick-vertical');
        } else {
            _.$slider.removeClass('slick-vertical');
        }

        if (bodyStyle.WebkitTransition !== undefined ||
            bodyStyle.MozTransition !== undefined ||
            bodyStyle.msTransition !== undefined) {
            if (_.options.useCSS === true) {
                _.cssTransitions = true;
            }
        }

        if ( _.options.fade ) {
            if ( typeof _.options.zIndex === 'number' ) {
                if( _.options.zIndex < 3 ) {
                    _.options.zIndex = 3;
                }
            } else {
                _.options.zIndex = _.defaults.zIndex;
            }
        }

        if (bodyStyle.OTransform !== undefined) {
            _.animType = 'OTransform';
            _.transformType = '-o-transform';
            _.transitionType = 'OTransition';
            if (bodyStyle.perspectiveProperty === undefined && bodyStyle.webkitPerspective === undefined) _.animType = false;
        }
        if (bodyStyle.MozTransform !== undefined) {
            _.animType = 'MozTransform';
            _.transformType = '-moz-transform';
            _.transitionType = 'MozTransition';
            if (bodyStyle.perspectiveProperty === undefined && bodyStyle.MozPerspective === undefined) _.animType = false;
        }
        if (bodyStyle.webkitTransform !== undefined) {
            _.animType = 'webkitTransform';
            _.transformType = '-webkit-transform';
            _.transitionType = 'webkitTransition';
            if (bodyStyle.perspectiveProperty === undefined && bodyStyle.webkitPerspective === undefined) _.animType = false;
        }
        if (bodyStyle.msTransform !== undefined) {
            _.animType = 'msTransform';
            _.transformType = '-ms-transform';
            _.transitionType = 'msTransition';
            if (bodyStyle.msTransform === undefined) _.animType = false;
        }
        if (bodyStyle.transform !== undefined && _.animType !== false) {
            _.animType = 'transform';
            _.transformType = 'transform';
            _.transitionType = 'transition';
        }
        _.transformsEnabled = _.options.useTransform && (_.animType !== null && _.animType !== false);
    };


    Slick.prototype.setSlideClasses = function(index) {

        var _ = this,
            centerOffset, allSlides, indexOffset, remainder;

        allSlides = _.$slider
            .find('.slick-slide')
            .removeClass('slick-active slick-center slick-current')
            .attr('aria-hidden', 'true');

        _.$slides
            .eq(index)
            .addClass('slick-current');

        if (_.options.centerMode === true) {

            var evenCoef = _.options.slidesToShow % 2 === 0 ? 1 : 0;

            centerOffset = Math.floor(_.options.slidesToShow / 2);

            if (_.options.infinite === true) {

                if (index >= centerOffset && index <= (_.slideCount - 1) - centerOffset) {
                    _.$slides
                        .slice(index - centerOffset + evenCoef, index + centerOffset + 1)
                        .addClass('slick-active')
                        .attr('aria-hidden', 'false');

                } else {

                    indexOffset = _.options.slidesToShow + index;
                    allSlides
                        .slice(indexOffset - centerOffset + 1 + evenCoef, indexOffset + centerOffset + 2)
                        .addClass('slick-active')
                        .attr('aria-hidden', 'false');

                }

                if (index === 0) {

                    allSlides
                        .eq(allSlides.length - 1 - _.options.slidesToShow)
                        .addClass('slick-center');

                } else if (index === _.slideCount - 1) {

                    allSlides
                        .eq(_.options.slidesToShow)
                        .addClass('slick-center');

                }

            }

            _.$slides
                .eq(index)
                .addClass('slick-center');

        } else {

            if (index >= 0 && index <= (_.slideCount - _.options.slidesToShow)) {

                _.$slides
                    .slice(index, index + _.options.slidesToShow)
                    .addClass('slick-active')
                    .attr('aria-hidden', 'false');

            } else if (allSlides.length <= _.options.slidesToShow) {

                allSlides
                    .addClass('slick-active')
                    .attr('aria-hidden', 'false');

            } else {

                remainder = _.slideCount % _.options.slidesToShow;
                indexOffset = _.options.infinite === true ? _.options.slidesToShow + index : index;

                if (_.options.slidesToShow == _.options.slidesToScroll && (_.slideCount - index) < _.options.slidesToShow) {

                    allSlides
                        .slice(indexOffset - (_.options.slidesToShow - remainder), indexOffset + remainder)
                        .addClass('slick-active')
                        .attr('aria-hidden', 'false');

                } else {

                    allSlides
                        .slice(indexOffset, indexOffset + _.options.slidesToShow)
                        .addClass('slick-active')
                        .attr('aria-hidden', 'false');

                }

            }

        }

        if (_.options.lazyLoad === 'ondemand' || _.options.lazyLoad === 'anticipated') {
            _.lazyLoad();
        }
    };

    Slick.prototype.setupInfinite = function() {

        var _ = this,
            i, slideIndex, infiniteCount;

        if (_.options.fade === true) {
            _.options.centerMode = false;
        }

        if (_.options.infinite === true && _.options.fade === false) {

            slideIndex = null;

            if (_.slideCount > _.options.slidesToShow) {

                if (_.options.centerMode === true) {
                    infiniteCount = _.options.slidesToShow + 1;
                } else {
                    infiniteCount = _.options.slidesToShow;
                }

                for (i = _.slideCount; i > (_.slideCount -
                        infiniteCount); i -= 1) {
                    slideIndex = i - 1;
                    $(_.$slides[slideIndex]).clone(true).attr('id', '')
                        .attr('data-slick-index', slideIndex - _.slideCount)
                        .prependTo(_.$slideTrack).addClass('slick-cloned');
                }
                for (i = 0; i < infiniteCount  + _.slideCount; i += 1) {
                    slideIndex = i;
                    $(_.$slides[slideIndex]).clone(true).attr('id', '')
                        .attr('data-slick-index', slideIndex + _.slideCount)
                        .appendTo(_.$slideTrack).addClass('slick-cloned');
                }
                _.$slideTrack.find('.slick-cloned').find('[id]').each(function() {
                    $(this).attr('id', '');
                });

            }

        }

    };

    Slick.prototype.interrupt = function( toggle ) {

        var _ = this;

        if( !toggle ) {
            _.autoPlay();
        }
        _.interrupted = toggle;

    };

    Slick.prototype.selectHandler = function(event) {

        var _ = this;

        var targetElement =
            $(event.target).is('.slick-slide') ?
                $(event.target) :
                $(event.target).parents('.slick-slide');

        var index = parseInt(targetElement.attr('data-slick-index'));

        if (!index) index = 0;

        if (_.slideCount <= _.options.slidesToShow) {

            _.slideHandler(index, false, true);
            return;

        }

        _.slideHandler(index);

    };

    Slick.prototype.slideHandler = function(index, sync, dontAnimate) {

        var targetSlide, animSlide, oldSlide, slideLeft, targetLeft = null,
            _ = this, navTarget;

        sync = sync || false;

        if (_.animating === true && _.options.waitForAnimate === true) {
            return;
        }

        if (_.options.fade === true && _.currentSlide === index) {
            return;
        }

        if (sync === false) {
            _.asNavFor(index);
        }

        targetSlide = index;
        targetLeft = _.getLeft(targetSlide);
        slideLeft = _.getLeft(_.currentSlide);

        _.currentLeft = _.swipeLeft === null ? slideLeft : _.swipeLeft;

        if (_.options.infinite === false && _.options.centerMode === false && (index < 0 || index > _.getDotCount() * _.options.slidesToScroll)) {
            if (_.options.fade === false) {
                targetSlide = _.currentSlide;
                if (dontAnimate !== true && _.slideCount > _.options.slidesToShow) {
                    _.animateSlide(slideLeft, function() {
                        _.postSlide(targetSlide);
                    });
                } else {
                    _.postSlide(targetSlide);
                }
            }
            return;
        } else if (_.options.infinite === false && _.options.centerMode === true && (index < 0 || index > (_.slideCount - _.options.slidesToScroll))) {
            if (_.options.fade === false) {
                targetSlide = _.currentSlide;
                if (dontAnimate !== true && _.slideCount > _.options.slidesToShow) {
                    _.animateSlide(slideLeft, function() {
                        _.postSlide(targetSlide);
                    });
                } else {
                    _.postSlide(targetSlide);
                }
            }
            return;
        }

        if ( _.options.autoplay ) {
            clearInterval(_.autoPlayTimer);
        }

        if (targetSlide < 0) {
            if (_.slideCount % _.options.slidesToScroll !== 0) {
                animSlide = _.slideCount - (_.slideCount % _.options.slidesToScroll);
            } else {
                animSlide = _.slideCount + targetSlide;
            }
        } else if (targetSlide >= _.slideCount) {
            if (_.slideCount % _.options.slidesToScroll !== 0) {
                animSlide = 0;
            } else {
                animSlide = targetSlide - _.slideCount;
            }
        } else {
            animSlide = targetSlide;
        }

        _.animating = true;

        _.$slider.trigger('beforeChange', [_, _.currentSlide, animSlide]);

        oldSlide = _.currentSlide;
        _.currentSlide = animSlide;

        _.setSlideClasses(_.currentSlide);

        if ( _.options.asNavFor ) {

            navTarget = _.getNavTarget();
            navTarget = navTarget.slick('getSlick');

            if ( navTarget.slideCount <= navTarget.options.slidesToShow ) {
                navTarget.setSlideClasses(_.currentSlide);
            }

        }

        _.updateDots();
        _.updateArrows();

        if (_.options.fade === true) {
            if (dontAnimate !== true) {

                _.fadeSlideOut(oldSlide);

                _.fadeSlide(animSlide, function() {
                    _.postSlide(animSlide);
                });

            } else {
                _.postSlide(animSlide);
            }
            _.animateHeight();
            return;
        }

        if (dontAnimate !== true && _.slideCount > _.options.slidesToShow) {
            _.animateSlide(targetLeft, function() {
                _.postSlide(animSlide);
            });
        } else {
            _.postSlide(animSlide);
        }

    };

    Slick.prototype.startLoad = function() {

        var _ = this;

        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {

            _.$prevArrow.hide();
            _.$nextArrow.hide();

        }

        if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {

            _.$dots.hide();

        }

        _.$slider.addClass('slick-loading');

    };

    Slick.prototype.swipeDirection = function() {

        var xDist, yDist, r, swipeAngle, _ = this;

        xDist = _.touchObject.startX - _.touchObject.curX;
        yDist = _.touchObject.startY - _.touchObject.curY;
        r = Math.atan2(yDist, xDist);

        swipeAngle = Math.round(r * 180 / Math.PI);
        if (swipeAngle < 0) {
            swipeAngle = 360 - Math.abs(swipeAngle);
        }

        if ((swipeAngle <= 45) && (swipeAngle >= 0)) {
            return (_.options.rtl === false ? 'left' : 'right');
        }
        if ((swipeAngle <= 360) && (swipeAngle >= 315)) {
            return (_.options.rtl === false ? 'left' : 'right');
        }
        if ((swipeAngle >= 135) && (swipeAngle <= 225)) {
            return (_.options.rtl === false ? 'right' : 'left');
        }
        if (_.options.verticalSwiping === true) {
            if ((swipeAngle >= 35) && (swipeAngle <= 135)) {
                return 'down';
            } else {
                return 'up';
            }
        }

        return 'vertical';

    };

    Slick.prototype.swipeEnd = function(event) {

        var _ = this,
            slideCount,
            direction;

        _.dragging = false;
        _.swiping = false;

        if (_.scrolling) {
            _.scrolling = false;
            return false;
        }

        _.interrupted = false;
        _.shouldClick = ( _.touchObject.swipeLength > 10 ) ? false : true;

        if ( _.touchObject.curX === undefined ) {
            return false;
        }

        if ( _.touchObject.edgeHit === true ) {
            _.$slider.trigger('edge', [_, _.swipeDirection() ]);
        }

        if ( _.touchObject.swipeLength >= _.touchObject.minSwipe ) {

            direction = _.swipeDirection();

            switch ( direction ) {

                case 'left':
                case 'down':

                    slideCount =
                        _.options.swipeToSlide ?
                            _.checkNavigable( _.currentSlide + _.getSlideCount() ) :
                            _.currentSlide + _.getSlideCount();

                    _.currentDirection = 0;

                    break;

                case 'right':
                case 'up':

                    slideCount =
                        _.options.swipeToSlide ?
                            _.checkNavigable( _.currentSlide - _.getSlideCount() ) :
                            _.currentSlide - _.getSlideCount();

                    _.currentDirection = 1;

                    break;

                default:


            }

            if( direction != 'vertical' ) {

                _.slideHandler( slideCount );
                _.touchObject = {};
                _.$slider.trigger('swipe', [_, direction ]);

            }

        } else {

            if ( _.touchObject.startX !== _.touchObject.curX ) {

                _.slideHandler( _.currentSlide );
                _.touchObject = {};

            }

        }

    };

    Slick.prototype.swipeHandler = function(event) {

        var _ = this;

        if ((_.options.swipe === false) || ('ontouchend' in document && _.options.swipe === false)) {
            return;
        } else if (_.options.draggable === false && event.type.indexOf('mouse') !== -1) {
            return;
        }

        _.touchObject.fingerCount = event.originalEvent && event.originalEvent.touches !== undefined ?
            event.originalEvent.touches.length : 1;

        _.touchObject.minSwipe = _.listWidth / _.options
            .touchThreshold;

        if (_.options.verticalSwiping === true) {
            _.touchObject.minSwipe = _.listHeight / _.options
                .touchThreshold;
        }

        switch (event.data.action) {

            case 'start':
                _.swipeStart(event);
                break;

            case 'move':
                _.swipeMove(event);
                break;

            case 'end':
                _.swipeEnd(event);
                break;

        }

    };

    Slick.prototype.swipeMove = function(event) {

        var _ = this,
            edgeWasHit = false,
            curLeft, swipeDirection, swipeLength, positionOffset, touches, verticalSwipeLength;

        touches = event.originalEvent !== undefined ? event.originalEvent.touches : null;

        if (!_.dragging || _.scrolling || touches && touches.length !== 1) {
            return false;
        }

        curLeft = _.getLeft(_.currentSlide);

        _.touchObject.curX = touches !== undefined ? touches[0].pageX : event.clientX;
        _.touchObject.curY = touches !== undefined ? touches[0].pageY : event.clientY;

        _.touchObject.swipeLength = Math.round(Math.sqrt(
            Math.pow(_.touchObject.curX - _.touchObject.startX, 2)));

        verticalSwipeLength = Math.round(Math.sqrt(
            Math.pow(_.touchObject.curY - _.touchObject.startY, 2)));

        if (!_.options.verticalSwiping && !_.swiping && verticalSwipeLength > 4) {
            _.scrolling = true;
            return false;
        }

        if (_.options.verticalSwiping === true) {
            _.touchObject.swipeLength = verticalSwipeLength;
        }

        swipeDirection = _.swipeDirection();

        if (event.originalEvent !== undefined && _.touchObject.swipeLength > 4) {
            _.swiping = true;
            event.preventDefault();
        }

        positionOffset = (_.options.rtl === false ? 1 : -1) * (_.touchObject.curX > _.touchObject.startX ? 1 : -1);
        if (_.options.verticalSwiping === true) {
            positionOffset = _.touchObject.curY > _.touchObject.startY ? 1 : -1;
        }


        swipeLength = _.touchObject.swipeLength;

        _.touchObject.edgeHit = false;

        if (_.options.infinite === false) {
            if ((_.currentSlide === 0 && swipeDirection === 'right') || (_.currentSlide >= _.getDotCount() && swipeDirection === 'left')) {
                swipeLength = _.touchObject.swipeLength * _.options.edgeFriction;
                _.touchObject.edgeHit = true;
            }
        }

        if (_.options.vertical === false) {
            _.swipeLeft = curLeft + swipeLength * positionOffset;
        } else {
            _.swipeLeft = curLeft + (swipeLength * (_.$list.height() / _.listWidth)) * positionOffset;
        }
        if (_.options.verticalSwiping === true) {
            _.swipeLeft = curLeft + swipeLength * positionOffset;
        }

        if (_.options.fade === true || _.options.touchMove === false) {
            return false;
        }

        if (_.animating === true) {
            _.swipeLeft = null;
            return false;
        }

        _.setCSS(_.swipeLeft);

    };

    Slick.prototype.swipeStart = function(event) {

        var _ = this,
            touches;

        _.interrupted = true;

        if (_.touchObject.fingerCount !== 1 || _.slideCount <= _.options.slidesToShow) {
            _.touchObject = {};
            return false;
        }

        if (event.originalEvent !== undefined && event.originalEvent.touches !== undefined) {
            touches = event.originalEvent.touches[0];
        }

        _.touchObject.startX = _.touchObject.curX = touches !== undefined ? touches.pageX : event.clientX;
        _.touchObject.startY = _.touchObject.curY = touches !== undefined ? touches.pageY : event.clientY;

        _.dragging = true;

    };

    Slick.prototype.unfilterSlides = Slick.prototype.slickUnfilter = function() {

        var _ = this;

        if (_.$slidesCache !== null) {

            _.unload();

            _.$slideTrack.children(this.options.slide).detach();

            _.$slidesCache.appendTo(_.$slideTrack);

            _.reinit();

        }

    };

    Slick.prototype.unload = function() {

        var _ = this;

        $('.slick-cloned', _.$slider).remove();

        if (_.$dots) {
            _.$dots.remove();
        }

        if (_.$prevArrow && _.htmlExpr.test(_.options.prevArrow)) {
            _.$prevArrow.remove();
        }

        if (_.$nextArrow && _.htmlExpr.test(_.options.nextArrow)) {
            _.$nextArrow.remove();
        }

        _.$slides
            .removeClass('slick-slide slick-active slick-visible slick-current')
            .attr('aria-hidden', 'true')
            .css('width', '');

    };

    Slick.prototype.unslick = function(fromBreakpoint) {

        var _ = this;
        _.$slider.trigger('unslick', [_, fromBreakpoint]);
        _.destroy();

    };

    Slick.prototype.updateArrows = function() {

        var _ = this,
            centerOffset;

        centerOffset = Math.floor(_.options.slidesToShow / 2);

        if ( _.options.arrows === true &&
            _.slideCount > _.options.slidesToShow &&
            !_.options.infinite ) {

            _.$prevArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');
            _.$nextArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');

            if (_.currentSlide === 0) {

                _.$prevArrow.addClass('slick-disabled').attr('aria-disabled', 'true');
                _.$nextArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');

            } else if (_.currentSlide >= _.slideCount - _.options.slidesToShow && _.options.centerMode === false) {

                _.$nextArrow.addClass('slick-disabled').attr('aria-disabled', 'true');
                _.$prevArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');

            } else if (_.currentSlide >= _.slideCount - 1 && _.options.centerMode === true) {

                _.$nextArrow.addClass('slick-disabled').attr('aria-disabled', 'true');
                _.$prevArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');

            }

        }

    };

    Slick.prototype.updateDots = function() {

        var _ = this;

        if (_.$dots !== null) {

            _.$dots
                .find('li')
                    .removeClass('slick-active')
                    .end();

            _.$dots
                .find('li')
                .eq(Math.floor(_.currentSlide / _.options.slidesToScroll))
                .addClass('slick-active');

        }

    };

    Slick.prototype.visibility = function() {

        var _ = this;

        if ( _.options.autoplay ) {

            if ( document[_.hidden] ) {

                _.interrupted = true;

            } else {

                _.interrupted = false;

            }

        }

    };

    $.fn.slick = function() {
        var _ = this,
            opt = arguments[0],
            args = Array.prototype.slice.call(arguments, 1),
            l = _.length,
            i,
            ret;
        for (i = 0; i < l; i++) {
            if (typeof opt == 'object' || typeof opt == 'undefined')
                _[i].slick = new Slick(_[i], opt);
            else
                ret = _[i].slick[opt].apply(_[i].slick, args);
            if (typeof ret != 'undefined') return ret;
        }
        return _;
    };

}));

/*!
  * Bootstrap v4.1.0 (https://getbootstrap.com/)
  * Copyright 2011-2018 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
  */
!function(t,e){"object"==typeof exports&&"undefined"!=typeof module?e(exports,require("jquery"),require("popper.js")):"function"==typeof define&&define.amd?define(["exports","jquery","popper.js"],e):e(t.bootstrap={},t.jQuery,t.Popper)}(this,function(t,e,c){"use strict";function i(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}function o(t,e,n){return e&&i(t.prototype,e),n&&i(t,n),t}function h(r){for(var t=1;t<arguments.length;t++){var s=null!=arguments[t]?arguments[t]:{},e=Object.keys(s);"function"==typeof Object.getOwnPropertySymbols&&(e=e.concat(Object.getOwnPropertySymbols(s).filter(function(t){return Object.getOwnPropertyDescriptor(s,t).enumerable}))),e.forEach(function(t){var e,n,i;e=r,i=s[n=t],n in e?Object.defineProperty(e,n,{value:i,enumerable:!0,configurable:!0,writable:!0}):e[n]=i})}return r}e=e&&e.hasOwnProperty("default")?e.default:e,c=c&&c.hasOwnProperty("default")?c.default:c;var r,n,s,a,l,u,f,d,_,g,m,p,v,E,y,T,C,I,A,D,b,S,w,N,O,k,P,L,j,R,H,W,M,x,U,K,F,V,Q,B,Y,G,q,z,X,J,Z,$,tt,et,nt,it,rt,st,ot,at,lt,ht,ct,ut,ft,dt,_t,gt,mt,pt,vt,Et,yt,Tt,Ct,It,At,Dt,bt,St,wt,Nt,Ot,kt,Pt,Lt,jt,Rt,Ht,Wt,Mt,xt,Ut,Kt,Ft,Vt,Qt,Bt,Yt,Gt,qt,zt,Xt,Jt,Zt,$t,te,ee,ne,ie,re,se,oe,ae,le,he,ce,ue,fe,de,_e,ge,me,pe,ve,Ee,ye,Te,Ce,Ie,Ae,De,be,Se,we,Ne,Oe,ke,Pe,Le,je,Re,He,We,Me,xe,Ue,Ke,Fe,Ve,Qe,Be,Ye,Ge,qe,ze,Xe,Je,Ze,$e,tn,en,nn,rn,sn,on,an,ln,hn,cn,un,fn,dn,_n,gn,mn,pn,vn,En,yn,Tn,Cn=function(i){var e="transitionend";function t(t){var e=this,n=!1;return i(this).one(l.TRANSITION_END,function(){n=!0}),setTimeout(function(){n||l.triggerTransitionEnd(e)},t),this}var l={TRANSITION_END:"bsTransitionEnd",getUID:function(t){for(;t+=~~(1e6*Math.random()),document.getElementById(t););return t},getSelectorFromElement:function(t){var e=t.getAttribute("data-target");e&&"#"!==e||(e=t.getAttribute("href")||"");try{return 0<i(document).find(e).length?e:null}catch(t){return null}},getTransitionDurationFromElement:function(t){if(!t)return 0;var e=i(t).css("transition-duration");return parseFloat(e)?(e=e.split(",")[0],1e3*parseFloat(e)):0},reflow:function(t){return t.offsetHeight},triggerTransitionEnd:function(t){i(t).trigger(e)},supportsTransitionEnd:function(){return Boolean(e)},isElement:function(t){return(t[0]||t).nodeType},typeCheckConfig:function(t,e,n){for(var i in n)if(Object.prototype.hasOwnProperty.call(n,i)){var r=n[i],s=e[i],o=s&&l.isElement(s)?"element":(a=s,{}.toString.call(a).match(/\s([a-z]+)/i)[1].toLowerCase());if(!new RegExp(r).test(o))throw new Error(t.toUpperCase()+': Option "'+i+'" provided type "'+o+'" but expected type "'+r+'".')}var a}};return i.fn.emulateTransitionEnd=t,i.event.special[l.TRANSITION_END]={bindType:e,delegateType:e,handle:function(t){if(i(t.target).is(this))return t.handleObj.handler.apply(this,arguments)}},l}(e),In=(n="alert",a="."+(s="bs.alert"),l=(r=e).fn[n],u={CLOSE:"close"+a,CLOSED:"closed"+a,CLICK_DATA_API:"click"+a+".data-api"},f="alert",d="fade",_="show",g=function(){function i(t){this._element=t}var t=i.prototype;return t.close=function(t){t=t||this._element;var e=this._getRootElement(t);this._triggerCloseEvent(e).isDefaultPrevented()||this._removeElement(e)},t.dispose=function(){r.removeData(this._element,s),this._element=null},t._getRootElement=function(t){var e=Cn.getSelectorFromElement(t),n=!1;return e&&(n=r(e)[0]),n||(n=r(t).closest("."+f)[0]),n},t._triggerCloseEvent=function(t){var e=r.Event(u.CLOSE);return r(t).trigger(e),e},t._removeElement=function(e){var n=this;if(r(e).removeClass(_),r(e).hasClass(d)){var t=Cn.getTransitionDurationFromElement(e);r(e).one(Cn.TRANSITION_END,function(t){return n._destroyElement(e,t)}).emulateTransitionEnd(t)}else this._destroyElement(e)},t._destroyElement=function(t){r(t).detach().trigger(u.CLOSED).remove()},i._jQueryInterface=function(n){return this.each(function(){var t=r(this),e=t.data(s);e||(e=new i(this),t.data(s,e)),"close"===n&&e[n](this)})},i._handleDismiss=function(e){return function(t){t&&t.preventDefault(),e.close(this)}},o(i,null,[{key:"VERSION",get:function(){return"4.1.0"}}]),i}(),r(document).on(u.CLICK_DATA_API,'[data-dismiss="alert"]',g._handleDismiss(new g)),r.fn[n]=g._jQueryInterface,r.fn[n].Constructor=g,r.fn[n].noConflict=function(){return r.fn[n]=l,g._jQueryInterface},g),An=(p="button",E="."+(v="bs.button"),y=".data-api",T=(m=e).fn[p],C="active",I="btn",D='[data-toggle^="button"]',b='[data-toggle="buttons"]',S="input",w=".active",N=".btn",O={CLICK_DATA_API:"click"+E+y,FOCUS_BLUR_DATA_API:(A="focus")+E+y+" blur"+E+y},k=function(){function n(t){this._element=t}var t=n.prototype;return t.toggle=function(){var t=!0,e=!0,n=m(this._element).closest(b)[0];if(n){var i=m(this._element).find(S)[0];if(i){if("radio"===i.type)if(i.checked&&m(this._element).hasClass(C))t=!1;else{var r=m(n).find(w)[0];r&&m(r).removeClass(C)}if(t){if(i.hasAttribute("disabled")||n.hasAttribute("disabled")||i.classList.contains("disabled")||n.classList.contains("disabled"))return;i.checked=!m(this._element).hasClass(C),m(i).trigger("change")}i.focus(),e=!1}}e&&this._element.setAttribute("aria-pressed",!m(this._element).hasClass(C)),t&&m(this._element).toggleClass(C)},t.dispose=function(){m.removeData(this._element,v),this._element=null},n._jQueryInterface=function(e){return this.each(function(){var t=m(this).data(v);t||(t=new n(this),m(this).data(v,t)),"toggle"===e&&t[e]()})},o(n,null,[{key:"VERSION",get:function(){return"4.1.0"}}]),n}(),m(document).on(O.CLICK_DATA_API,D,function(t){t.preventDefault();var e=t.target;m(e).hasClass(I)||(e=m(e).closest(N)),k._jQueryInterface.call(m(e),"toggle")}).on(O.FOCUS_BLUR_DATA_API,D,function(t){var e=m(t.target).closest(N)[0];m(e).toggleClass(A,/^focus(in)?$/.test(t.type))}),m.fn[p]=k._jQueryInterface,m.fn[p].Constructor=k,m.fn[p].noConflict=function(){return m.fn[p]=T,k._jQueryInterface},k),Dn=(L="carousel",R="."+(j="bs.carousel"),H=".data-api",W=(P=e).fn[L],M={interval:5e3,keyboard:!0,slide:!1,pause:"hover",wrap:!0},x={interval:"(number|boolean)",keyboard:"boolean",slide:"(boolean|string)",pause:"(string|boolean)",wrap:"boolean"},U="next",K="prev",F="left",V="right",Q={SLIDE:"slide"+R,SLID:"slid"+R,KEYDOWN:"keydown"+R,MOUSEENTER:"mouseenter"+R,MOUSELEAVE:"mouseleave"+R,TOUCHEND:"touchend"+R,LOAD_DATA_API:"load"+R+H,CLICK_DATA_API:"click"+R+H},B="carousel",Y="active",G="slide",q="carousel-item-right",z="carousel-item-left",X="carousel-item-next",J="carousel-item-prev",Z={ACTIVE:".active",ACTIVE_ITEM:".active.carousel-item",ITEM:".carousel-item",NEXT_PREV:".carousel-item-next, .carousel-item-prev",INDICATORS:".carousel-indicators",DATA_SLIDE:"[data-slide], [data-slide-to]",DATA_RIDE:'[data-ride="carousel"]'},$=function(){function s(t,e){this._items=null,this._interval=null,this._activeElement=null,this._isPaused=!1,this._isSliding=!1,this.touchTimeout=null,this._config=this._getConfig(e),this._element=P(t)[0],this._indicatorsElement=P(this._element).find(Z.INDICATORS)[0],this._addEventListeners()}var t=s.prototype;return t.next=function(){this._isSliding||this._slide(U)},t.nextWhenVisible=function(){!document.hidden&&P(this._element).is(":visible")&&"hidden"!==P(this._element).css("visibility")&&this.next()},t.prev=function(){this._isSliding||this._slide(K)},t.pause=function(t){t||(this._isPaused=!0),P(this._element).find(Z.NEXT_PREV)[0]&&(Cn.triggerTransitionEnd(this._element),this.cycle(!0)),clearInterval(this._interval),this._interval=null},t.cycle=function(t){t||(this._isPaused=!1),this._interval&&(clearInterval(this._interval),this._interval=null),this._config.interval&&!this._isPaused&&(this._interval=setInterval((document.visibilityState?this.nextWhenVisible:this.next).bind(this),this._config.interval))},t.to=function(t){var e=this;this._activeElement=P(this._element).find(Z.ACTIVE_ITEM)[0];var n=this._getItemIndex(this._activeElement);if(!(t>this._items.length-1||t<0))if(this._isSliding)P(this._element).one(Q.SLID,function(){return e.to(t)});else{if(n===t)return this.pause(),void this.cycle();var i=n<t?U:K;this._slide(i,this._items[t])}},t.dispose=function(){P(this._element).off(R),P.removeData(this._element,j),this._items=null,this._config=null,this._element=null,this._interval=null,this._isPaused=null,this._isSliding=null,this._activeElement=null,this._indicatorsElement=null},t._getConfig=function(t){return t=h({},M,t),Cn.typeCheckConfig(L,t,x),t},t._addEventListeners=function(){var e=this;this._config.keyboard&&P(this._element).on(Q.KEYDOWN,function(t){return e._keydown(t)}),"hover"===this._config.pause&&(P(this._element).on(Q.MOUSEENTER,function(t){return e.pause(t)}).on(Q.MOUSELEAVE,function(t){return e.cycle(t)}),"ontouchstart"in document.documentElement&&P(this._element).on(Q.TOUCHEND,function(){e.pause(),e.touchTimeout&&clearTimeout(e.touchTimeout),e.touchTimeout=setTimeout(function(t){return e.cycle(t)},500+e._config.interval)}))},t._keydown=function(t){if(!/input|textarea/i.test(t.target.tagName))switch(t.which){case 37:t.preventDefault(),this.prev();break;case 39:t.preventDefault(),this.next()}},t._getItemIndex=function(t){return this._items=P.makeArray(P(t).parent().find(Z.ITEM)),this._items.indexOf(t)},t._getItemByDirection=function(t,e){var n=t===U,i=t===K,r=this._getItemIndex(e),s=this._items.length-1;if((i&&0===r||n&&r===s)&&!this._config.wrap)return e;var o=(r+(t===K?-1:1))%this._items.length;return-1===o?this._items[this._items.length-1]:this._items[o]},t._triggerSlideEvent=function(t,e){var n=this._getItemIndex(t),i=this._getItemIndex(P(this._element).find(Z.ACTIVE_ITEM)[0]),r=P.Event(Q.SLIDE,{relatedTarget:t,direction:e,from:i,to:n});return P(this._element).trigger(r),r},t._setActiveIndicatorElement=function(t){if(this._indicatorsElement){P(this._indicatorsElement).find(Z.ACTIVE).removeClass(Y);var e=this._indicatorsElement.children[this._getItemIndex(t)];e&&P(e).addClass(Y)}},t._slide=function(t,e){var n,i,r,s=this,o=P(this._element).find(Z.ACTIVE_ITEM)[0],a=this._getItemIndex(o),l=e||o&&this._getItemByDirection(t,o),h=this._getItemIndex(l),c=Boolean(this._interval);if(t===U?(n=z,i=X,r=F):(n=q,i=J,r=V),l&&P(l).hasClass(Y))this._isSliding=!1;else if(!this._triggerSlideEvent(l,r).isDefaultPrevented()&&o&&l){this._isSliding=!0,c&&this.pause(),this._setActiveIndicatorElement(l);var u=P.Event(Q.SLID,{relatedTarget:l,direction:r,from:a,to:h});if(P(this._element).hasClass(G)){P(l).addClass(i),Cn.reflow(l),P(o).addClass(n),P(l).addClass(n);var f=Cn.getTransitionDurationFromElement(o);P(o).one(Cn.TRANSITION_END,function(){P(l).removeClass(n+" "+i).addClass(Y),P(o).removeClass(Y+" "+i+" "+n),s._isSliding=!1,setTimeout(function(){return P(s._element).trigger(u)},0)}).emulateTransitionEnd(f)}else P(o).removeClass(Y),P(l).addClass(Y),this._isSliding=!1,P(this._element).trigger(u);c&&this.cycle()}},s._jQueryInterface=function(i){return this.each(function(){var t=P(this).data(j),e=h({},M,P(this).data());"object"==typeof i&&(e=h({},e,i));var n="string"==typeof i?i:e.slide;if(t||(t=new s(this,e),P(this).data(j,t)),"number"==typeof i)t.to(i);else if("string"==typeof n){if("undefined"==typeof t[n])throw new TypeError('No method named "'+n+'"');t[n]()}else e.interval&&(t.pause(),t.cycle())})},s._dataApiClickHandler=function(t){var e=Cn.getSelectorFromElement(this);if(e){var n=P(e)[0];if(n&&P(n).hasClass(B)){var i=h({},P(n).data(),P(this).data()),r=this.getAttribute("data-slide-to");r&&(i.interval=!1),s._jQueryInterface.call(P(n),i),r&&P(n).data(j).to(r),t.preventDefault()}}},o(s,null,[{key:"VERSION",get:function(){return"4.1.0"}},{key:"Default",get:function(){return M}}]),s}(),P(document).on(Q.CLICK_DATA_API,Z.DATA_SLIDE,$._dataApiClickHandler),P(window).on(Q.LOAD_DATA_API,function(){P(Z.DATA_RIDE).each(function(){var t=P(this);$._jQueryInterface.call(t,t.data())})}),P.fn[L]=$._jQueryInterface,P.fn[L].Constructor=$,P.fn[L].noConflict=function(){return P.fn[L]=W,$._jQueryInterface},$),bn=(et="collapse",it="."+(nt="bs.collapse"),rt=(tt=e).fn[et],st={toggle:!0,parent:""},ot={toggle:"boolean",parent:"(string|element)"},at={SHOW:"show"+it,SHOWN:"shown"+it,HIDE:"hide"+it,HIDDEN:"hidden"+it,CLICK_DATA_API:"click"+it+".data-api"},lt="show",ht="collapse",ct="collapsing",ut="collapsed",ft="width",dt="height",_t={ACTIVES:".show, .collapsing",DATA_TOGGLE:'[data-toggle="collapse"]'},gt=function(){function a(t,e){this._isTransitioning=!1,this._element=t,this._config=this._getConfig(e),this._triggerArray=tt.makeArray(tt('[data-toggle="collapse"][href="#'+t.id+'"],[data-toggle="collapse"][data-target="#'+t.id+'"]'));for(var n=tt(_t.DATA_TOGGLE),i=0;i<n.length;i++){var r=n[i],s=Cn.getSelectorFromElement(r);null!==s&&0<tt(s).filter(t).length&&(this._selector=s,this._triggerArray.push(r))}this._parent=this._config.parent?this._getParent():null,this._config.parent||this._addAriaAndCollapsedClass(this._element,this._triggerArray),this._config.toggle&&this.toggle()}var t=a.prototype;return t.toggle=function(){tt(this._element).hasClass(lt)?this.hide():this.show()},t.show=function(){var t,e,n=this;if(!this._isTransitioning&&!tt(this._element).hasClass(lt)&&(this._parent&&0===(t=tt.makeArray(tt(this._parent).find(_t.ACTIVES).filter('[data-parent="'+this._config.parent+'"]'))).length&&(t=null),!(t&&(e=tt(t).not(this._selector).data(nt))&&e._isTransitioning))){var i=tt.Event(at.SHOW);if(tt(this._element).trigger(i),!i.isDefaultPrevented()){t&&(a._jQueryInterface.call(tt(t).not(this._selector),"hide"),e||tt(t).data(nt,null));var r=this._getDimension();tt(this._element).removeClass(ht).addClass(ct),(this._element.style[r]=0)<this._triggerArray.length&&tt(this._triggerArray).removeClass(ut).attr("aria-expanded",!0),this.setTransitioning(!0);var s="scroll"+(r[0].toUpperCase()+r.slice(1)),o=Cn.getTransitionDurationFromElement(this._element);tt(this._element).one(Cn.TRANSITION_END,function(){tt(n._element).removeClass(ct).addClass(ht).addClass(lt),n._element.style[r]="",n.setTransitioning(!1),tt(n._element).trigger(at.SHOWN)}).emulateTransitionEnd(o),this._element.style[r]=this._element[s]+"px"}}},t.hide=function(){var t=this;if(!this._isTransitioning&&tt(this._element).hasClass(lt)){var e=tt.Event(at.HIDE);if(tt(this._element).trigger(e),!e.isDefaultPrevented()){var n=this._getDimension();if(this._element.style[n]=this._element.getBoundingClientRect()[n]+"px",Cn.reflow(this._element),tt(this._element).addClass(ct).removeClass(ht).removeClass(lt),0<this._triggerArray.length)for(var i=0;i<this._triggerArray.length;i++){var r=this._triggerArray[i],s=Cn.getSelectorFromElement(r);if(null!==s)tt(s).hasClass(lt)||tt(r).addClass(ut).attr("aria-expanded",!1)}this.setTransitioning(!0);this._element.style[n]="";var o=Cn.getTransitionDurationFromElement(this._element);tt(this._element).one(Cn.TRANSITION_END,function(){t.setTransitioning(!1),tt(t._element).removeClass(ct).addClass(ht).trigger(at.HIDDEN)}).emulateTransitionEnd(o)}}},t.setTransitioning=function(t){this._isTransitioning=t},t.dispose=function(){tt.removeData(this._element,nt),this._config=null,this._parent=null,this._element=null,this._triggerArray=null,this._isTransitioning=null},t._getConfig=function(t){return(t=h({},st,t)).toggle=Boolean(t.toggle),Cn.typeCheckConfig(et,t,ot),t},t._getDimension=function(){return tt(this._element).hasClass(ft)?ft:dt},t._getParent=function(){var n=this,t=null;Cn.isElement(this._config.parent)?(t=this._config.parent,"undefined"!=typeof this._config.parent.jquery&&(t=this._config.parent[0])):t=tt(this._config.parent)[0];var e='[data-toggle="collapse"][data-parent="'+this._config.parent+'"]';return tt(t).find(e).each(function(t,e){n._addAriaAndCollapsedClass(a._getTargetFromElement(e),[e])}),t},t._addAriaAndCollapsedClass=function(t,e){if(t){var n=tt(t).hasClass(lt);0<e.length&&tt(e).toggleClass(ut,!n).attr("aria-expanded",n)}},a._getTargetFromElement=function(t){var e=Cn.getSelectorFromElement(t);return e?tt(e)[0]:null},a._jQueryInterface=function(i){return this.each(function(){var t=tt(this),e=t.data(nt),n=h({},st,t.data(),"object"==typeof i&&i);if(!e&&n.toggle&&/show|hide/.test(i)&&(n.toggle=!1),e||(e=new a(this,n),t.data(nt,e)),"string"==typeof i){if("undefined"==typeof e[i])throw new TypeError('No method named "'+i+'"');e[i]()}})},o(a,null,[{key:"VERSION",get:function(){return"4.1.0"}},{key:"Default",get:function(){return st}}]),a}(),tt(document).on(at.CLICK_DATA_API,_t.DATA_TOGGLE,function(t){"A"===t.currentTarget.tagName&&t.preventDefault();var n=tt(this),e=Cn.getSelectorFromElement(this);tt(e).each(function(){var t=tt(this),e=t.data(nt)?"toggle":n.data();gt._jQueryInterface.call(t,e)})}),tt.fn[et]=gt._jQueryInterface,tt.fn[et].Constructor=gt,tt.fn[et].noConflict=function(){return tt.fn[et]=rt,gt._jQueryInterface},gt),Sn=(pt="dropdown",Et="."+(vt="bs.dropdown"),yt=".data-api",Tt=(mt=e).fn[pt],Ct=new RegExp("38|40|27"),It={HIDE:"hide"+Et,HIDDEN:"hidden"+Et,SHOW:"show"+Et,SHOWN:"shown"+Et,CLICK:"click"+Et,CLICK_DATA_API:"click"+Et+yt,KEYDOWN_DATA_API:"keydown"+Et+yt,KEYUP_DATA_API:"keyup"+Et+yt},At="disabled",Dt="show",bt="dropup",St="dropright",wt="dropleft",Nt="dropdown-menu-right",Ot="position-static",kt='[data-toggle="dropdown"]',Pt=".dropdown form",Lt=".dropdown-menu",jt=".navbar-nav",Rt=".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)",Ht="top-start",Wt="top-end",Mt="bottom-start",xt="bottom-end",Ut="right-start",Kt="left-start",Ft={offset:0,flip:!0,boundary:"scrollParent",reference:"toggle",display:"dynamic"},Vt={offset:"(number|string|function)",flip:"boolean",boundary:"(string|element)",reference:"(string|element)",display:"string"},Qt=function(){function l(t,e){this._element=t,this._popper=null,this._config=this._getConfig(e),this._menu=this._getMenuElement(),this._inNavbar=this._detectNavbar(),this._addEventListeners()}var t=l.prototype;return t.toggle=function(){if(!this._element.disabled&&!mt(this._element).hasClass(At)){var t=l._getParentFromElement(this._element),e=mt(this._menu).hasClass(Dt);if(l._clearMenus(),!e){var n={relatedTarget:this._element},i=mt.Event(It.SHOW,n);if(mt(t).trigger(i),!i.isDefaultPrevented()){if(!this._inNavbar){if("undefined"==typeof c)throw new TypeError("Bootstrap dropdown require Popper.js (https://popper.js.org)");var r=this._element;"parent"===this._config.reference?r=t:Cn.isElement(this._config.reference)&&(r=this._config.reference,"undefined"!=typeof this._config.reference.jquery&&(r=this._config.reference[0])),"scrollParent"!==this._config.boundary&&mt(t).addClass(Ot),this._popper=new c(r,this._menu,this._getPopperConfig())}"ontouchstart"in document.documentElement&&0===mt(t).closest(jt).length&&mt(document.body).children().on("mouseover",null,mt.noop),this._element.focus(),this._element.setAttribute("aria-expanded",!0),mt(this._menu).toggleClass(Dt),mt(t).toggleClass(Dt).trigger(mt.Event(It.SHOWN,n))}}}},t.dispose=function(){mt.removeData(this._element,vt),mt(this._element).off(Et),this._element=null,(this._menu=null)!==this._popper&&(this._popper.destroy(),this._popper=null)},t.update=function(){this._inNavbar=this._detectNavbar(),null!==this._popper&&this._popper.scheduleUpdate()},t._addEventListeners=function(){var e=this;mt(this._element).on(It.CLICK,function(t){t.preventDefault(),t.stopPropagation(),e.toggle()})},t._getConfig=function(t){return t=h({},this.constructor.Default,mt(this._element).data(),t),Cn.typeCheckConfig(pt,t,this.constructor.DefaultType),t},t._getMenuElement=function(){if(!this._menu){var t=l._getParentFromElement(this._element);this._menu=mt(t).find(Lt)[0]}return this._menu},t._getPlacement=function(){var t=mt(this._element).parent(),e=Mt;return t.hasClass(bt)?(e=Ht,mt(this._menu).hasClass(Nt)&&(e=Wt)):t.hasClass(St)?e=Ut:t.hasClass(wt)?e=Kt:mt(this._menu).hasClass(Nt)&&(e=xt),e},t._detectNavbar=function(){return 0<mt(this._element).closest(".navbar").length},t._getPopperConfig=function(){var e=this,t={};"function"==typeof this._config.offset?t.fn=function(t){return t.offsets=h({},t.offsets,e._config.offset(t.offsets)||{}),t}:t.offset=this._config.offset;var n={placement:this._getPlacement(),modifiers:{offset:t,flip:{enabled:this._config.flip},preventOverflow:{boundariesElement:this._config.boundary}}};return"static"===this._config.display&&(n.modifiers.applyStyle={enabled:!1}),n},l._jQueryInterface=function(e){return this.each(function(){var t=mt(this).data(vt);if(t||(t=new l(this,"object"==typeof e?e:null),mt(this).data(vt,t)),"string"==typeof e){if("undefined"==typeof t[e])throw new TypeError('No method named "'+e+'"');t[e]()}})},l._clearMenus=function(t){if(!t||3!==t.which&&("keyup"!==t.type||9===t.which))for(var e=mt.makeArray(mt(kt)),n=0;n<e.length;n++){var i=l._getParentFromElement(e[n]),r=mt(e[n]).data(vt),s={relatedTarget:e[n]};if(r){var o=r._menu;if(mt(i).hasClass(Dt)&&!(t&&("click"===t.type&&/input|textarea/i.test(t.target.tagName)||"keyup"===t.type&&9===t.which)&&mt.contains(i,t.target))){var a=mt.Event(It.HIDE,s);mt(i).trigger(a),a.isDefaultPrevented()||("ontouchstart"in document.documentElement&&mt(document.body).children().off("mouseover",null,mt.noop),e[n].setAttribute("aria-expanded","false"),mt(o).removeClass(Dt),mt(i).removeClass(Dt).trigger(mt.Event(It.HIDDEN,s)))}}}},l._getParentFromElement=function(t){var e,n=Cn.getSelectorFromElement(t);return n&&(e=mt(n)[0]),e||t.parentNode},l._dataApiKeydownHandler=function(t){if((/input|textarea/i.test(t.target.tagName)?!(32===t.which||27!==t.which&&(40!==t.which&&38!==t.which||mt(t.target).closest(Lt).length)):Ct.test(t.which))&&(t.preventDefault(),t.stopPropagation(),!this.disabled&&!mt(this).hasClass(At))){var e=l._getParentFromElement(this),n=mt(e).hasClass(Dt);if((n||27===t.which&&32===t.which)&&(!n||27!==t.which&&32!==t.which)){var i=mt(e).find(Rt).get();if(0!==i.length){var r=i.indexOf(t.target);38===t.which&&0<r&&r--,40===t.which&&r<i.length-1&&r++,r<0&&(r=0),i[r].focus()}}else{if(27===t.which){var s=mt(e).find(kt)[0];mt(s).trigger("focus")}mt(this).trigger("click")}}},o(l,null,[{key:"VERSION",get:function(){return"4.1.0"}},{key:"Default",get:function(){return Ft}},{key:"DefaultType",get:function(){return Vt}}]),l}(),mt(document).on(It.KEYDOWN_DATA_API,kt,Qt._dataApiKeydownHandler).on(It.KEYDOWN_DATA_API,Lt,Qt._dataApiKeydownHandler).on(It.CLICK_DATA_API+" "+It.KEYUP_DATA_API,Qt._clearMenus).on(It.CLICK_DATA_API,kt,function(t){t.preventDefault(),t.stopPropagation(),Qt._jQueryInterface.call(mt(this),"toggle")}).on(It.CLICK_DATA_API,Pt,function(t){t.stopPropagation()}),mt.fn[pt]=Qt._jQueryInterface,mt.fn[pt].Constructor=Qt,mt.fn[pt].noConflict=function(){return mt.fn[pt]=Tt,Qt._jQueryInterface},Qt),wn=(Yt="modal",qt="."+(Gt="bs.modal"),zt=(Bt=e).fn[Yt],Xt={backdrop:!0,keyboard:!0,focus:!0,show:!0},Jt={backdrop:"(boolean|string)",keyboard:"boolean",focus:"boolean",show:"boolean"},Zt={HIDE:"hide"+qt,HIDDEN:"hidden"+qt,SHOW:"show"+qt,SHOWN:"shown"+qt,FOCUSIN:"focusin"+qt,RESIZE:"resize"+qt,CLICK_DISMISS:"click.dismiss"+qt,KEYDOWN_DISMISS:"keydown.dismiss"+qt,MOUSEUP_DISMISS:"mouseup.dismiss"+qt,MOUSEDOWN_DISMISS:"mousedown.dismiss"+qt,CLICK_DATA_API:"click"+qt+".data-api"},$t="modal-scrollbar-measure",te="modal-backdrop",ee="modal-open",ne="fade",ie="show",re={DIALOG:".modal-dialog",DATA_TOGGLE:'[data-toggle="modal"]',DATA_DISMISS:'[data-dismiss="modal"]',FIXED_CONTENT:".fixed-top, .fixed-bottom, .is-fixed, .sticky-top",STICKY_CONTENT:".sticky-top",NAVBAR_TOGGLER:".navbar-toggler"},se=function(){function r(t,e){this._config=this._getConfig(e),this._element=t,this._dialog=Bt(t).find(re.DIALOG)[0],this._backdrop=null,this._isShown=!1,this._isBodyOverflowing=!1,this._ignoreBackdropClick=!1,this._scrollbarWidth=0}var t=r.prototype;return t.toggle=function(t){return this._isShown?this.hide():this.show(t)},t.show=function(t){var e=this;if(!this._isTransitioning&&!this._isShown){Bt(this._element).hasClass(ne)&&(this._isTransitioning=!0);var n=Bt.Event(Zt.SHOW,{relatedTarget:t});Bt(this._element).trigger(n),this._isShown||n.isDefaultPrevented()||(this._isShown=!0,this._checkScrollbar(),this._setScrollbar(),this._adjustDialog(),Bt(document.body).addClass(ee),this._setEscapeEvent(),this._setResizeEvent(),Bt(this._element).on(Zt.CLICK_DISMISS,re.DATA_DISMISS,function(t){return e.hide(t)}),Bt(this._dialog).on(Zt.MOUSEDOWN_DISMISS,function(){Bt(e._element).one(Zt.MOUSEUP_DISMISS,function(t){Bt(t.target).is(e._element)&&(e._ignoreBackdropClick=!0)})}),this._showBackdrop(function(){return e._showElement(t)}))}},t.hide=function(t){var e=this;if(t&&t.preventDefault(),!this._isTransitioning&&this._isShown){var n=Bt.Event(Zt.HIDE);if(Bt(this._element).trigger(n),this._isShown&&!n.isDefaultPrevented()){this._isShown=!1;var i=Bt(this._element).hasClass(ne);if(i&&(this._isTransitioning=!0),this._setEscapeEvent(),this._setResizeEvent(),Bt(document).off(Zt.FOCUSIN),Bt(this._element).removeClass(ie),Bt(this._element).off(Zt.CLICK_DISMISS),Bt(this._dialog).off(Zt.MOUSEDOWN_DISMISS),i){var r=Cn.getTransitionDurationFromElement(this._element);Bt(this._element).one(Cn.TRANSITION_END,function(t){return e._hideModal(t)}).emulateTransitionEnd(r)}else this._hideModal()}}},t.dispose=function(){Bt.removeData(this._element,Gt),Bt(window,document,this._element,this._backdrop).off(qt),this._config=null,this._element=null,this._dialog=null,this._backdrop=null,this._isShown=null,this._isBodyOverflowing=null,this._ignoreBackdropClick=null,this._scrollbarWidth=null},t.handleUpdate=function(){this._adjustDialog()},t._getConfig=function(t){return t=h({},Xt,t),Cn.typeCheckConfig(Yt,t,Jt),t},t._showElement=function(t){var e=this,n=Bt(this._element).hasClass(ne);this._element.parentNode&&this._element.parentNode.nodeType===Node.ELEMENT_NODE||document.body.appendChild(this._element),this._element.style.display="block",this._element.removeAttribute("aria-hidden"),this._element.scrollTop=0,n&&Cn.reflow(this._element),Bt(this._element).addClass(ie),this._config.focus&&this._enforceFocus();var i=Bt.Event(Zt.SHOWN,{relatedTarget:t}),r=function(){e._config.focus&&e._element.focus(),e._isTransitioning=!1,Bt(e._element).trigger(i)};if(n){var s=Cn.getTransitionDurationFromElement(this._element);Bt(this._dialog).one(Cn.TRANSITION_END,r).emulateTransitionEnd(s)}else r()},t._enforceFocus=function(){var e=this;Bt(document).off(Zt.FOCUSIN).on(Zt.FOCUSIN,function(t){document!==t.target&&e._element!==t.target&&0===Bt(e._element).has(t.target).length&&e._element.focus()})},t._setEscapeEvent=function(){var e=this;this._isShown&&this._config.keyboard?Bt(this._element).on(Zt.KEYDOWN_DISMISS,function(t){27===t.which&&(t.preventDefault(),e.hide())}):this._isShown||Bt(this._element).off(Zt.KEYDOWN_DISMISS)},t._setResizeEvent=function(){var e=this;this._isShown?Bt(window).on(Zt.RESIZE,function(t){return e.handleUpdate(t)}):Bt(window).off(Zt.RESIZE)},t._hideModal=function(){var t=this;this._element.style.display="none",this._element.setAttribute("aria-hidden",!0),this._isTransitioning=!1,this._showBackdrop(function(){Bt(document.body).removeClass(ee),t._resetAdjustments(),t._resetScrollbar(),Bt(t._element).trigger(Zt.HIDDEN)})},t._removeBackdrop=function(){this._backdrop&&(Bt(this._backdrop).remove(),this._backdrop=null)},t._showBackdrop=function(t){var e=this,n=Bt(this._element).hasClass(ne)?ne:"";if(this._isShown&&this._config.backdrop){if(this._backdrop=document.createElement("div"),this._backdrop.className=te,n&&Bt(this._backdrop).addClass(n),Bt(this._backdrop).appendTo(document.body),Bt(this._element).on(Zt.CLICK_DISMISS,function(t){e._ignoreBackdropClick?e._ignoreBackdropClick=!1:t.target===t.currentTarget&&("static"===e._config.backdrop?e._element.focus():e.hide())}),n&&Cn.reflow(this._backdrop),Bt(this._backdrop).addClass(ie),!t)return;if(!n)return void t();var i=Cn.getTransitionDurationFromElement(this._backdrop);Bt(this._backdrop).one(Cn.TRANSITION_END,t).emulateTransitionEnd(i)}else if(!this._isShown&&this._backdrop){Bt(this._backdrop).removeClass(ie);var r=function(){e._removeBackdrop(),t&&t()};if(Bt(this._element).hasClass(ne)){var s=Cn.getTransitionDurationFromElement(this._backdrop);Bt(this._backdrop).one(Cn.TRANSITION_END,r).emulateTransitionEnd(s)}else r()}else t&&t()},t._adjustDialog=function(){var t=this._element.scrollHeight>document.documentElement.clientHeight;!this._isBodyOverflowing&&t&&(this._element.style.paddingLeft=this._scrollbarWidth+"px"),this._isBodyOverflowing&&!t&&(this._element.style.paddingRight=this._scrollbarWidth+"px")},t._resetAdjustments=function(){this._element.style.paddingLeft="",this._element.style.paddingRight=""},t._checkScrollbar=function(){var t=document.body.getBoundingClientRect();this._isBodyOverflowing=t.left+t.right<window.innerWidth,this._scrollbarWidth=this._getScrollbarWidth()},t._setScrollbar=function(){var r=this;if(this._isBodyOverflowing){Bt(re.FIXED_CONTENT).each(function(t,e){var n=Bt(e)[0].style.paddingRight,i=Bt(e).css("padding-right");Bt(e).data("padding-right",n).css("padding-right",parseFloat(i)+r._scrollbarWidth+"px")}),Bt(re.STICKY_CONTENT).each(function(t,e){var n=Bt(e)[0].style.marginRight,i=Bt(e).css("margin-right");Bt(e).data("margin-right",n).css("margin-right",parseFloat(i)-r._scrollbarWidth+"px")}),Bt(re.NAVBAR_TOGGLER).each(function(t,e){var n=Bt(e)[0].style.marginRight,i=Bt(e).css("margin-right");Bt(e).data("margin-right",n).css("margin-right",parseFloat(i)+r._scrollbarWidth+"px")});var t=document.body.style.paddingRight,e=Bt(document.body).css("padding-right");Bt(document.body).data("padding-right",t).css("padding-right",parseFloat(e)+this._scrollbarWidth+"px")}},t._resetScrollbar=function(){Bt(re.FIXED_CONTENT).each(function(t,e){var n=Bt(e).data("padding-right");"undefined"!=typeof n&&Bt(e).css("padding-right",n).removeData("padding-right")}),Bt(re.STICKY_CONTENT+", "+re.NAVBAR_TOGGLER).each(function(t,e){var n=Bt(e).data("margin-right");"undefined"!=typeof n&&Bt(e).css("margin-right",n).removeData("margin-right")});var t=Bt(document.body).data("padding-right");"undefined"!=typeof t&&Bt(document.body).css("padding-right",t).removeData("padding-right")},t._getScrollbarWidth=function(){var t=document.createElement("div");t.className=$t,document.body.appendChild(t);var e=t.getBoundingClientRect().width-t.clientWidth;return document.body.removeChild(t),e},r._jQueryInterface=function(n,i){return this.each(function(){var t=Bt(this).data(Gt),e=h({},r.Default,Bt(this).data(),"object"==typeof n&&n);if(t||(t=new r(this,e),Bt(this).data(Gt,t)),"string"==typeof n){if("undefined"==typeof t[n])throw new TypeError('No method named "'+n+'"');t[n](i)}else e.show&&t.show(i)})},o(r,null,[{key:"VERSION",get:function(){return"4.1.0"}},{key:"Default",get:function(){return Xt}}]),r}(),Bt(document).on(Zt.CLICK_DATA_API,re.DATA_TOGGLE,function(t){var e,n=this,i=Cn.getSelectorFromElement(this);i&&(e=Bt(i)[0]);var r=Bt(e).data(Gt)?"toggle":h({},Bt(e).data(),Bt(this).data());"A"!==this.tagName&&"AREA"!==this.tagName||t.preventDefault();var s=Bt(e).one(Zt.SHOW,function(t){t.isDefaultPrevented()||s.one(Zt.HIDDEN,function(){Bt(n).is(":visible")&&n.focus()})});se._jQueryInterface.call(Bt(e),r,this)}),Bt.fn[Yt]=se._jQueryInterface,Bt.fn[Yt].Constructor=se,Bt.fn[Yt].noConflict=function(){return Bt.fn[Yt]=zt,se._jQueryInterface},se),Nn=(ae="tooltip",he="."+(le="bs.tooltip"),ce=(oe=e).fn[ae],ue="bs-tooltip",fe=new RegExp("(^|\\s)"+ue+"\\S+","g"),ge={animation:!0,template:'<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover focus",title:"",delay:0,html:!(_e={AUTO:"auto",TOP:"top",RIGHT:"right",BOTTOM:"bottom",LEFT:"left"}),selector:!(de={animation:"boolean",template:"string",title:"(string|element|function)",trigger:"string",delay:"(number|object)",html:"boolean",selector:"(string|boolean)",placement:"(string|function)",offset:"(number|string)",container:"(string|element|boolean)",fallbackPlacement:"(string|array)",boundary:"(string|element)"}),placement:"top",offset:0,container:!1,fallbackPlacement:"flip",boundary:"scrollParent"},pe="out",ve={HIDE:"hide"+he,HIDDEN:"hidden"+he,SHOW:(me="show")+he,SHOWN:"shown"+he,INSERTED:"inserted"+he,CLICK:"click"+he,FOCUSIN:"focusin"+he,FOCUSOUT:"focusout"+he,MOUSEENTER:"mouseenter"+he,MOUSELEAVE:"mouseleave"+he},Ee="fade",ye="show",Te=".tooltip-inner",Ce=".arrow",Ie="hover",Ae="focus",De="click",be="manual",Se=function(){function i(t,e){if("undefined"==typeof c)throw new TypeError("Bootstrap tooltips require Popper.js (https://popper.js.org)");this._isEnabled=!0,this._timeout=0,this._hoverState="",this._activeTrigger={},this._popper=null,this.element=t,this.config=this._getConfig(e),this.tip=null,this._setListeners()}var t=i.prototype;return t.enable=function(){this._isEnabled=!0},t.disable=function(){this._isEnabled=!1},t.toggleEnabled=function(){this._isEnabled=!this._isEnabled},t.toggle=function(t){if(this._isEnabled)if(t){var e=this.constructor.DATA_KEY,n=oe(t.currentTarget).data(e);n||(n=new this.constructor(t.currentTarget,this._getDelegateConfig()),oe(t.currentTarget).data(e,n)),n._activeTrigger.click=!n._activeTrigger.click,n._isWithActiveTrigger()?n._enter(null,n):n._leave(null,n)}else{if(oe(this.getTipElement()).hasClass(ye))return void this._leave(null,this);this._enter(null,this)}},t.dispose=function(){clearTimeout(this._timeout),oe.removeData(this.element,this.constructor.DATA_KEY),oe(this.element).off(this.constructor.EVENT_KEY),oe(this.element).closest(".modal").off("hide.bs.modal"),this.tip&&oe(this.tip).remove(),this._isEnabled=null,this._timeout=null,this._hoverState=null,(this._activeTrigger=null)!==this._popper&&this._popper.destroy(),this._popper=null,this.element=null,this.config=null,this.tip=null},t.show=function(){var e=this;if("none"===oe(this.element).css("display"))throw new Error("Please use show on visible elements");var t=oe.Event(this.constructor.Event.SHOW);if(this.isWithContent()&&this._isEnabled){oe(this.element).trigger(t);var n=oe.contains(this.element.ownerDocument.documentElement,this.element);if(t.isDefaultPrevented()||!n)return;var i=this.getTipElement(),r=Cn.getUID(this.constructor.NAME);i.setAttribute("id",r),this.element.setAttribute("aria-describedby",r),this.setContent(),this.config.animation&&oe(i).addClass(Ee);var s="function"==typeof this.config.placement?this.config.placement.call(this,i,this.element):this.config.placement,o=this._getAttachment(s);this.addAttachmentClass(o);var a=!1===this.config.container?document.body:oe(this.config.container);oe(i).data(this.constructor.DATA_KEY,this),oe.contains(this.element.ownerDocument.documentElement,this.tip)||oe(i).appendTo(a),oe(this.element).trigger(this.constructor.Event.INSERTED),this._popper=new c(this.element,i,{placement:o,modifiers:{offset:{offset:this.config.offset},flip:{behavior:this.config.fallbackPlacement},arrow:{element:Ce},preventOverflow:{boundariesElement:this.config.boundary}},onCreate:function(t){t.originalPlacement!==t.placement&&e._handlePopperPlacementChange(t)},onUpdate:function(t){e._handlePopperPlacementChange(t)}}),oe(i).addClass(ye),"ontouchstart"in document.documentElement&&oe(document.body).children().on("mouseover",null,oe.noop);var l=function(){e.config.animation&&e._fixTransition();var t=e._hoverState;e._hoverState=null,oe(e.element).trigger(e.constructor.Event.SHOWN),t===pe&&e._leave(null,e)};if(oe(this.tip).hasClass(Ee)){var h=Cn.getTransitionDurationFromElement(this.tip);oe(this.tip).one(Cn.TRANSITION_END,l).emulateTransitionEnd(h)}else l()}},t.hide=function(t){var e=this,n=this.getTipElement(),i=oe.Event(this.constructor.Event.HIDE),r=function(){e._hoverState!==me&&n.parentNode&&n.parentNode.removeChild(n),e._cleanTipClass(),e.element.removeAttribute("aria-describedby"),oe(e.element).trigger(e.constructor.Event.HIDDEN),null!==e._popper&&e._popper.destroy(),t&&t()};if(oe(this.element).trigger(i),!i.isDefaultPrevented()){if(oe(n).removeClass(ye),"ontouchstart"in document.documentElement&&oe(document.body).children().off("mouseover",null,oe.noop),this._activeTrigger[De]=!1,this._activeTrigger[Ae]=!1,this._activeTrigger[Ie]=!1,oe(this.tip).hasClass(Ee)){var s=Cn.getTransitionDurationFromElement(n);oe(n).one(Cn.TRANSITION_END,r).emulateTransitionEnd(s)}else r();this._hoverState=""}},t.update=function(){null!==this._popper&&this._popper.scheduleUpdate()},t.isWithContent=function(){return Boolean(this.getTitle())},t.addAttachmentClass=function(t){oe(this.getTipElement()).addClass(ue+"-"+t)},t.getTipElement=function(){return this.tip=this.tip||oe(this.config.template)[0],this.tip},t.setContent=function(){var t=oe(this.getTipElement());this.setElementContent(t.find(Te),this.getTitle()),t.removeClass(Ee+" "+ye)},t.setElementContent=function(t,e){var n=this.config.html;"object"==typeof e&&(e.nodeType||e.jquery)?n?oe(e).parent().is(t)||t.empty().append(e):t.text(oe(e).text()):t[n?"html":"text"](e)},t.getTitle=function(){var t=this.element.getAttribute("data-original-title");return t||(t="function"==typeof this.config.title?this.config.title.call(this.element):this.config.title),t},t._getAttachment=function(t){return _e[t.toUpperCase()]},t._setListeners=function(){var i=this;this.config.trigger.split(" ").forEach(function(t){if("click"===t)oe(i.element).on(i.constructor.Event.CLICK,i.config.selector,function(t){return i.toggle(t)});else if(t!==be){var e=t===Ie?i.constructor.Event.MOUSEENTER:i.constructor.Event.FOCUSIN,n=t===Ie?i.constructor.Event.MOUSELEAVE:i.constructor.Event.FOCUSOUT;oe(i.element).on(e,i.config.selector,function(t){return i._enter(t)}).on(n,i.config.selector,function(t){return i._leave(t)})}oe(i.element).closest(".modal").on("hide.bs.modal",function(){return i.hide()})}),this.config.selector?this.config=h({},this.config,{trigger:"manual",selector:""}):this._fixTitle()},t._fixTitle=function(){var t=typeof this.element.getAttribute("data-original-title");(this.element.getAttribute("title")||"string"!==t)&&(this.element.setAttribute("data-original-title",this.element.getAttribute("title")||""),this.element.setAttribute("title",""))},t._enter=function(t,e){var n=this.constructor.DATA_KEY;(e=e||oe(t.currentTarget).data(n))||(e=new this.constructor(t.currentTarget,this._getDelegateConfig()),oe(t.currentTarget).data(n,e)),t&&(e._activeTrigger["focusin"===t.type?Ae:Ie]=!0),oe(e.getTipElement()).hasClass(ye)||e._hoverState===me?e._hoverState=me:(clearTimeout(e._timeout),e._hoverState=me,e.config.delay&&e.config.delay.show?e._timeout=setTimeout(function(){e._hoverState===me&&e.show()},e.config.delay.show):e.show())},t._leave=function(t,e){var n=this.constructor.DATA_KEY;(e=e||oe(t.currentTarget).data(n))||(e=new this.constructor(t.currentTarget,this._getDelegateConfig()),oe(t.currentTarget).data(n,e)),t&&(e._activeTrigger["focusout"===t.type?Ae:Ie]=!1),e._isWithActiveTrigger()||(clearTimeout(e._timeout),e._hoverState=pe,e.config.delay&&e.config.delay.hide?e._timeout=setTimeout(function(){e._hoverState===pe&&e.hide()},e.config.delay.hide):e.hide())},t._isWithActiveTrigger=function(){for(var t in this._activeTrigger)if(this._activeTrigger[t])return!0;return!1},t._getConfig=function(t){return"number"==typeof(t=h({},this.constructor.Default,oe(this.element).data(),t)).delay&&(t.delay={show:t.delay,hide:t.delay}),"number"==typeof t.title&&(t.title=t.title.toString()),"number"==typeof t.content&&(t.content=t.content.toString()),Cn.typeCheckConfig(ae,t,this.constructor.DefaultType),t},t._getDelegateConfig=function(){var t={};if(this.config)for(var e in this.config)this.constructor.Default[e]!==this.config[e]&&(t[e]=this.config[e]);return t},t._cleanTipClass=function(){var t=oe(this.getTipElement()),e=t.attr("class").match(fe);null!==e&&0<e.length&&t.removeClass(e.join(""))},t._handlePopperPlacementChange=function(t){this._cleanTipClass(),this.addAttachmentClass(this._getAttachment(t.placement))},t._fixTransition=function(){var t=this.getTipElement(),e=this.config.animation;null===t.getAttribute("x-placement")&&(oe(t).removeClass(Ee),this.config.animation=!1,this.hide(),this.show(),this.config.animation=e)},i._jQueryInterface=function(n){return this.each(function(){var t=oe(this).data(le),e="object"==typeof n&&n;if((t||!/dispose|hide/.test(n))&&(t||(t=new i(this,e),oe(this).data(le,t)),"string"==typeof n)){if("undefined"==typeof t[n])throw new TypeError('No method named "'+n+'"');t[n]()}})},o(i,null,[{key:"VERSION",get:function(){return"4.1.0"}},{key:"Default",get:function(){return ge}},{key:"NAME",get:function(){return ae}},{key:"DATA_KEY",get:function(){return le}},{key:"Event",get:function(){return ve}},{key:"EVENT_KEY",get:function(){return he}},{key:"DefaultType",get:function(){return de}}]),i}(),oe.fn[ae]=Se._jQueryInterface,oe.fn[ae].Constructor=Se,oe.fn[ae].noConflict=function(){return oe.fn[ae]=ce,Se._jQueryInterface},Se),On=(Ne="popover",ke="."+(Oe="bs.popover"),Pe=(we=e).fn[Ne],Le="bs-popover",je=new RegExp("(^|\\s)"+Le+"\\S+","g"),Re=h({},Nn.Default,{placement:"right",trigger:"click",content:"",template:'<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'}),He=h({},Nn.DefaultType,{content:"(string|element|function)"}),We="fade",xe=".popover-header",Ue=".popover-body",Ke={HIDE:"hide"+ke,HIDDEN:"hidden"+ke,SHOW:(Me="show")+ke,SHOWN:"shown"+ke,INSERTED:"inserted"+ke,CLICK:"click"+ke,FOCUSIN:"focusin"+ke,FOCUSOUT:"focusout"+ke,MOUSEENTER:"mouseenter"+ke,MOUSELEAVE:"mouseleave"+ke},Fe=function(t){var e,n;function i(){return t.apply(this,arguments)||this}n=t,(e=i).prototype=Object.create(n.prototype),(e.prototype.constructor=e).__proto__=n;var r=i.prototype;return r.isWithContent=function(){return this.getTitle()||this._getContent()},r.addAttachmentClass=function(t){we(this.getTipElement()).addClass(Le+"-"+t)},r.getTipElement=function(){return this.tip=this.tip||we(this.config.template)[0],this.tip},r.setContent=function(){var t=we(this.getTipElement());this.setElementContent(t.find(xe),this.getTitle());var e=this._getContent();"function"==typeof e&&(e=e.call(this.element)),this.setElementContent(t.find(Ue),e),t.removeClass(We+" "+Me)},r._getContent=function(){return this.element.getAttribute("data-content")||this.config.content},r._cleanTipClass=function(){var t=we(this.getTipElement()),e=t.attr("class").match(je);null!==e&&0<e.length&&t.removeClass(e.join(""))},i._jQueryInterface=function(n){return this.each(function(){var t=we(this).data(Oe),e="object"==typeof n?n:null;if((t||!/destroy|hide/.test(n))&&(t||(t=new i(this,e),we(this).data(Oe,t)),"string"==typeof n)){if("undefined"==typeof t[n])throw new TypeError('No method named "'+n+'"');t[n]()}})},o(i,null,[{key:"VERSION",get:function(){return"4.1.0"}},{key:"Default",get:function(){return Re}},{key:"NAME",get:function(){return Ne}},{key:"DATA_KEY",get:function(){return Oe}},{key:"Event",get:function(){return Ke}},{key:"EVENT_KEY",get:function(){return ke}},{key:"DefaultType",get:function(){return He}}]),i}(Nn),we.fn[Ne]=Fe._jQueryInterface,we.fn[Ne].Constructor=Fe,we.fn[Ne].noConflict=function(){return we.fn[Ne]=Pe,Fe._jQueryInterface},Fe),kn=(Qe="scrollspy",Ye="."+(Be="bs.scrollspy"),Ge=(Ve=e).fn[Qe],qe={offset:10,method:"auto",target:""},ze={offset:"number",method:"string",target:"(string|element)"},Xe={ACTIVATE:"activate"+Ye,SCROLL:"scroll"+Ye,LOAD_DATA_API:"load"+Ye+".data-api"},Je="dropdown-item",Ze="active",$e={DATA_SPY:'[data-spy="scroll"]',ACTIVE:".active",NAV_LIST_GROUP:".nav, .list-group",NAV_LINKS:".nav-link",NAV_ITEMS:".nav-item",LIST_ITEMS:".list-group-item",DROPDOWN:".dropdown",DROPDOWN_ITEMS:".dropdown-item",DROPDOWN_TOGGLE:".dropdown-toggle"},tn="offset",en="position",nn=function(){function n(t,e){var n=this;this._element=t,this._scrollElement="BODY"===t.tagName?window:t,this._config=this._getConfig(e),this._selector=this._config.target+" "+$e.NAV_LINKS+","+this._config.target+" "+$e.LIST_ITEMS+","+this._config.target+" "+$e.DROPDOWN_ITEMS,this._offsets=[],this._targets=[],this._activeTarget=null,this._scrollHeight=0,Ve(this._scrollElement).on(Xe.SCROLL,function(t){return n._process(t)}),this.refresh(),this._process()}var t=n.prototype;return t.refresh=function(){var e=this,t=this._scrollElement===this._scrollElement.window?tn:en,r="auto"===this._config.method?t:this._config.method,s=r===en?this._getScrollTop():0;this._offsets=[],this._targets=[],this._scrollHeight=this._getScrollHeight(),Ve.makeArray(Ve(this._selector)).map(function(t){var e,n=Cn.getSelectorFromElement(t);if(n&&(e=Ve(n)[0]),e){var i=e.getBoundingClientRect();if(i.width||i.height)return[Ve(e)[r]().top+s,n]}return null}).filter(function(t){return t}).sort(function(t,e){return t[0]-e[0]}).forEach(function(t){e._offsets.push(t[0]),e._targets.push(t[1])})},t.dispose=function(){Ve.removeData(this._element,Be),Ve(this._scrollElement).off(Ye),this._element=null,this._scrollElement=null,this._config=null,this._selector=null,this._offsets=null,this._targets=null,this._activeTarget=null,this._scrollHeight=null},t._getConfig=function(t){if("string"!=typeof(t=h({},qe,t)).target){var e=Ve(t.target).attr("id");e||(e=Cn.getUID(Qe),Ve(t.target).attr("id",e)),t.target="#"+e}return Cn.typeCheckConfig(Qe,t,ze),t},t._getScrollTop=function(){return this._scrollElement===window?this._scrollElement.pageYOffset:this._scrollElement.scrollTop},t._getScrollHeight=function(){return this._scrollElement.scrollHeight||Math.max(document.body.scrollHeight,document.documentElement.scrollHeight)},t._getOffsetHeight=function(){return this._scrollElement===window?window.innerHeight:this._scrollElement.getBoundingClientRect().height},t._process=function(){var t=this._getScrollTop()+this._config.offset,e=this._getScrollHeight(),n=this._config.offset+e-this._getOffsetHeight();if(this._scrollHeight!==e&&this.refresh(),n<=t){var i=this._targets[this._targets.length-1];this._activeTarget!==i&&this._activate(i)}else{if(this._activeTarget&&t<this._offsets[0]&&0<this._offsets[0])return this._activeTarget=null,void this._clear();for(var r=this._offsets.length;r--;){this._activeTarget!==this._targets[r]&&t>=this._offsets[r]&&("undefined"==typeof this._offsets[r+1]||t<this._offsets[r+1])&&this._activate(this._targets[r])}}},t._activate=function(e){this._activeTarget=e,this._clear();var t=this._selector.split(",");t=t.map(function(t){return t+'[data-target="'+e+'"],'+t+'[href="'+e+'"]'});var n=Ve(t.join(","));n.hasClass(Je)?(n.closest($e.DROPDOWN).find($e.DROPDOWN_TOGGLE).addClass(Ze),n.addClass(Ze)):(n.addClass(Ze),n.parents($e.NAV_LIST_GROUP).prev($e.NAV_LINKS+", "+$e.LIST_ITEMS).addClass(Ze),n.parents($e.NAV_LIST_GROUP).prev($e.NAV_ITEMS).children($e.NAV_LINKS).addClass(Ze)),Ve(this._scrollElement).trigger(Xe.ACTIVATE,{relatedTarget:e})},t._clear=function(){Ve(this._selector).filter($e.ACTIVE).removeClass(Ze)},n._jQueryInterface=function(e){return this.each(function(){var t=Ve(this).data(Be);if(t||(t=new n(this,"object"==typeof e&&e),Ve(this).data(Be,t)),"string"==typeof e){if("undefined"==typeof t[e])throw new TypeError('No method named "'+e+'"');t[e]()}})},o(n,null,[{key:"VERSION",get:function(){return"4.1.0"}},{key:"Default",get:function(){return qe}}]),n}(),Ve(window).on(Xe.LOAD_DATA_API,function(){for(var t=Ve.makeArray(Ve($e.DATA_SPY)),e=t.length;e--;){var n=Ve(t[e]);nn._jQueryInterface.call(n,n.data())}}),Ve.fn[Qe]=nn._jQueryInterface,Ve.fn[Qe].Constructor=nn,Ve.fn[Qe].noConflict=function(){return Ve.fn[Qe]=Ge,nn._jQueryInterface},nn),Pn=(on="."+(sn="bs.tab"),an=(rn=e).fn.tab,ln={HIDE:"hide"+on,HIDDEN:"hidden"+on,SHOW:"show"+on,SHOWN:"shown"+on,CLICK_DATA_API:"click"+on+".data-api"},hn="dropdown-menu",cn="active",un="disabled",fn="fade",dn="show",_n=".dropdown",gn=".nav, .list-group",mn=".active",pn="> li > .active",vn='[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]',En=".dropdown-toggle",yn="> .dropdown-menu .active",Tn=function(){function i(t){this._element=t}var t=i.prototype;return t.show=function(){var n=this;if(!(this._element.parentNode&&this._element.parentNode.nodeType===Node.ELEMENT_NODE&&rn(this._element).hasClass(cn)||rn(this._element).hasClass(un))){var t,i,e=rn(this._element).closest(gn)[0],r=Cn.getSelectorFromElement(this._element);if(e){var s="UL"===e.nodeName?pn:mn;i=(i=rn.makeArray(rn(e).find(s)))[i.length-1]}var o=rn.Event(ln.HIDE,{relatedTarget:this._element}),a=rn.Event(ln.SHOW,{relatedTarget:i});if(i&&rn(i).trigger(o),rn(this._element).trigger(a),!a.isDefaultPrevented()&&!o.isDefaultPrevented()){r&&(t=rn(r)[0]),this._activate(this._element,e);var l=function(){var t=rn.Event(ln.HIDDEN,{relatedTarget:n._element}),e=rn.Event(ln.SHOWN,{relatedTarget:i});rn(i).trigger(t),rn(n._element).trigger(e)};t?this._activate(t,t.parentNode,l):l()}}},t.dispose=function(){rn.removeData(this._element,sn),this._element=null},t._activate=function(t,e,n){var i=this,r=("UL"===e.nodeName?rn(e).find(pn):rn(e).children(mn))[0],s=n&&r&&rn(r).hasClass(fn),o=function(){return i._transitionComplete(t,r,n)};if(r&&s){var a=Cn.getTransitionDurationFromElement(r);rn(r).one(Cn.TRANSITION_END,o).emulateTransitionEnd(a)}else o()},t._transitionComplete=function(t,e,n){if(e){rn(e).removeClass(dn+" "+cn);var i=rn(e.parentNode).find(yn)[0];i&&rn(i).removeClass(cn),"tab"===e.getAttribute("role")&&e.setAttribute("aria-selected",!1)}if(rn(t).addClass(cn),"tab"===t.getAttribute("role")&&t.setAttribute("aria-selected",!0),Cn.reflow(t),rn(t).addClass(dn),t.parentNode&&rn(t.parentNode).hasClass(hn)){var r=rn(t).closest(_n)[0];r&&rn(r).find(En).addClass(cn),t.setAttribute("aria-expanded",!0)}n&&n()},i._jQueryInterface=function(n){return this.each(function(){var t=rn(this),e=t.data(sn);if(e||(e=new i(this),t.data(sn,e)),"string"==typeof n){if("undefined"==typeof e[n])throw new TypeError('No method named "'+n+'"');e[n]()}})},o(i,null,[{key:"VERSION",get:function(){return"4.1.0"}}]),i}(),rn(document).on(ln.CLICK_DATA_API,vn,function(t){t.preventDefault(),Tn._jQueryInterface.call(rn(this),"show")}),rn.fn.tab=Tn._jQueryInterface,rn.fn.tab.Constructor=Tn,rn.fn.tab.noConflict=function(){return rn.fn.tab=an,Tn._jQueryInterface},Tn);!function(t){if("undefined"==typeof t)throw new TypeError("Bootstrap's JavaScript requires jQuery. jQuery must be included before Bootstrap's JavaScript.");var e=t.fn.jquery.split(" ")[0].split(".");if(e[0]<2&&e[1]<9||1===e[0]&&9===e[1]&&e[2]<1||4<=e[0])throw new Error("Bootstrap's JavaScript requires at least jQuery v1.9.1 but less than v4.0.0")}(e),t.Util=Cn,t.Alert=In,t.Button=An,t.Carousel=Dn,t.Collapse=bn,t.Dropdown=Sn,t.Modal=wn,t.Popover=On,t.Scrollspy=kn,t.Tab=Pn,t.Tooltip=Nn,Object.defineProperty(t,"__esModule",{value:!0})});
//# sourceMappingURL=bootstrap.min.js.map