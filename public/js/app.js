/*! jQuery v3.3.1 | (c) JS Foundation and other contributors | jquery.org/license */
!function(e,t){"use strict";"object"==typeof module&&"object"==typeof module.exports?module.exports=e.document?t(e,!0):function(e){if(!e.document)throw new Error("jQuery requires a window with a document");return t(e)}:t(e)}("undefined"!=typeof window?window:this,function(e,t){"use strict";var n=[],r=e.document,i=Object.getPrototypeOf,o=n.slice,a=n.concat,s=n.push,u=n.indexOf,l={},c=l.toString,f=l.hasOwnProperty,p=f.toString,d=p.call(Object),h={},g=function e(t){return"function"==typeof t&&"number"!=typeof t.nodeType},y=function e(t){return null!=t&&t===t.window},v={type:!0,src:!0,noModule:!0};function m(e,t,n){var i,o=(t=t||r).createElement("script");if(o.text=e,n)for(i in v)n[i]&&(o[i]=n[i]);t.head.appendChild(o).parentNode.removeChild(o)}function x(e){return null==e?e+"":"object"==typeof e||"function"==typeof e?l[c.call(e)]||"object":typeof e}var b="3.3.1",w=function(e,t){return new w.fn.init(e,t)},T=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;w.fn=w.prototype={jquery:"3.3.1",constructor:w,length:0,toArray:function(){return o.call(this)},get:function(e){return null==e?o.call(this):e<0?this[e+this.length]:this[e]},pushStack:function(e){var t=w.merge(this.constructor(),e);return t.prevObject=this,t},each:function(e){return w.each(this,e)},map:function(e){return this.pushStack(w.map(this,function(t,n){return e.call(t,n,t)}))},slice:function(){return this.pushStack(o.apply(this,arguments))},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},eq:function(e){var t=this.length,n=+e+(e<0?t:0);return this.pushStack(n>=0&&n<t?[this[n]]:[])},end:function(){return this.prevObject||this.constructor()},push:s,sort:n.sort,splice:n.splice},w.extend=w.fn.extend=function(){var e,t,n,r,i,o,a=arguments[0]||{},s=1,u=arguments.length,l=!1;for("boolean"==typeof a&&(l=a,a=arguments[s]||{},s++),"object"==typeof a||g(a)||(a={}),s===u&&(a=this,s--);s<u;s++)if(null!=(e=arguments[s]))for(t in e)n=a[t],a!==(r=e[t])&&(l&&r&&(w.isPlainObject(r)||(i=Array.isArray(r)))?(i?(i=!1,o=n&&Array.isArray(n)?n:[]):o=n&&w.isPlainObject(n)?n:{},a[t]=w.extend(l,o,r)):void 0!==r&&(a[t]=r));return a},w.extend({expando:"jQuery"+("3.3.1"+Math.random()).replace(/\D/g,""),isReady:!0,error:function(e){throw new Error(e)},noop:function(){},isPlainObject:function(e){var t,n;return!(!e||"[object Object]"!==c.call(e))&&(!(t=i(e))||"function"==typeof(n=f.call(t,"constructor")&&t.constructor)&&p.call(n)===d)},isEmptyObject:function(e){var t;for(t in e)return!1;return!0},globalEval:function(e){m(e)},each:function(e,t){var n,r=0;if(C(e)){for(n=e.length;r<n;r++)if(!1===t.call(e[r],r,e[r]))break}else for(r in e)if(!1===t.call(e[r],r,e[r]))break;return e},trim:function(e){return null==e?"":(e+"").replace(T,"")},makeArray:function(e,t){var n=t||[];return null!=e&&(C(Object(e))?w.merge(n,"string"==typeof e?[e]:e):s.call(n,e)),n},inArray:function(e,t,n){return null==t?-1:u.call(t,e,n)},merge:function(e,t){for(var n=+t.length,r=0,i=e.length;r<n;r++)e[i++]=t[r];return e.length=i,e},grep:function(e,t,n){for(var r,i=[],o=0,a=e.length,s=!n;o<a;o++)(r=!t(e[o],o))!==s&&i.push(e[o]);return i},map:function(e,t,n){var r,i,o=0,s=[];if(C(e))for(r=e.length;o<r;o++)null!=(i=t(e[o],o,n))&&s.push(i);else for(o in e)null!=(i=t(e[o],o,n))&&s.push(i);return a.apply([],s)},guid:1,support:h}),"function"==typeof Symbol&&(w.fn[Symbol.iterator]=n[Symbol.iterator]),w.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "),function(e,t){l["[object "+t+"]"]=t.toLowerCase()});function C(e){var t=!!e&&"length"in e&&e.length,n=x(e);return!g(e)&&!y(e)&&("array"===n||0===t||"number"==typeof t&&t>0&&t-1 in e)}var E=function(e){var t,n,r,i,o,a,s,u,l,c,f,p,d,h,g,y,v,m,x,b="sizzle"+1*new Date,w=e.document,T=0,C=0,E=ae(),k=ae(),S=ae(),D=function(e,t){return e===t&&(f=!0),0},N={}.hasOwnProperty,A=[],j=A.pop,q=A.push,L=A.push,H=A.slice,O=function(e,t){for(var n=0,r=e.length;n<r;n++)if(e[n]===t)return n;return-1},P="checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",M="[\\x20\\t\\r\\n\\f]",R="(?:\\\\.|[\\w-]|[^\0-\\xa0])+",I="\\["+M+"*("+R+")(?:"+M+"*([*^$|!~]?=)"+M+"*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|("+R+"))|)"+M+"*\\]",W=":("+R+")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|"+I+")*)|.*)\\)|)",$=new RegExp(M+"+","g"),B=new RegExp("^"+M+"+|((?:^|[^\\\\])(?:\\\\.)*)"+M+"+$","g"),F=new RegExp("^"+M+"*,"+M+"*"),_=new RegExp("^"+M+"*([>+~]|"+M+")"+M+"*"),z=new RegExp("="+M+"*([^\\]'\"]*?)"+M+"*\\]","g"),X=new RegExp(W),U=new RegExp("^"+R+"$"),V={ID:new RegExp("^#("+R+")"),CLASS:new RegExp("^\\.("+R+")"),TAG:new RegExp("^("+R+"|[*])"),ATTR:new RegExp("^"+I),PSEUDO:new RegExp("^"+W),CHILD:new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\("+M+"*(even|odd|(([+-]|)(\\d*)n|)"+M+"*(?:([+-]|)"+M+"*(\\d+)|))"+M+"*\\)|)","i"),bool:new RegExp("^(?:"+P+")$","i"),needsContext:new RegExp("^"+M+"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\("+M+"*((?:-\\d)?\\d*)"+M+"*\\)|)(?=[^-]|$)","i")},G=/^(?:input|select|textarea|button)$/i,Y=/^h\d$/i,Q=/^[^{]+\{\s*\[native \w/,J=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,K=/[+~]/,Z=new RegExp("\\\\([\\da-f]{1,6}"+M+"?|("+M+")|.)","ig"),ee=function(e,t,n){var r="0x"+t-65536;return r!==r||n?t:r<0?String.fromCharCode(r+65536):String.fromCharCode(r>>10|55296,1023&r|56320)},te=/([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,ne=function(e,t){return t?"\0"===e?"\ufffd":e.slice(0,-1)+"\\"+e.charCodeAt(e.length-1).toString(16)+" ":"\\"+e},re=function(){p()},ie=me(function(e){return!0===e.disabled&&("form"in e||"label"in e)},{dir:"parentNode",next:"legend"});try{L.apply(A=H.call(w.childNodes),w.childNodes),A[w.childNodes.length].nodeType}catch(e){L={apply:A.length?function(e,t){q.apply(e,H.call(t))}:function(e,t){var n=e.length,r=0;while(e[n++]=t[r++]);e.length=n-1}}}function oe(e,t,r,i){var o,s,l,c,f,h,v,m=t&&t.ownerDocument,T=t?t.nodeType:9;if(r=r||[],"string"!=typeof e||!e||1!==T&&9!==T&&11!==T)return r;if(!i&&((t?t.ownerDocument||t:w)!==d&&p(t),t=t||d,g)){if(11!==T&&(f=J.exec(e)))if(o=f[1]){if(9===T){if(!(l=t.getElementById(o)))return r;if(l.id===o)return r.push(l),r}else if(m&&(l=m.getElementById(o))&&x(t,l)&&l.id===o)return r.push(l),r}else{if(f[2])return L.apply(r,t.getElementsByTagName(e)),r;if((o=f[3])&&n.getElementsByClassName&&t.getElementsByClassName)return L.apply(r,t.getElementsByClassName(o)),r}if(n.qsa&&!S[e+" "]&&(!y||!y.test(e))){if(1!==T)m=t,v=e;else if("object"!==t.nodeName.toLowerCase()){(c=t.getAttribute("id"))?c=c.replace(te,ne):t.setAttribute("id",c=b),s=(h=a(e)).length;while(s--)h[s]="#"+c+" "+ve(h[s]);v=h.join(","),m=K.test(e)&&ge(t.parentNode)||t}if(v)try{return L.apply(r,m.querySelectorAll(v)),r}catch(e){}finally{c===b&&t.removeAttribute("id")}}}return u(e.replace(B,"$1"),t,r,i)}function ae(){var e=[];function t(n,i){return e.push(n+" ")>r.cacheLength&&delete t[e.shift()],t[n+" "]=i}return t}function se(e){return e[b]=!0,e}function ue(e){var t=d.createElement("fieldset");try{return!!e(t)}catch(e){return!1}finally{t.parentNode&&t.parentNode.removeChild(t),t=null}}function le(e,t){var n=e.split("|"),i=n.length;while(i--)r.attrHandle[n[i]]=t}function ce(e,t){var n=t&&e,r=n&&1===e.nodeType&&1===t.nodeType&&e.sourceIndex-t.sourceIndex;if(r)return r;if(n)while(n=n.nextSibling)if(n===t)return-1;return e?1:-1}function fe(e){return function(t){return"input"===t.nodeName.toLowerCase()&&t.type===e}}function pe(e){return function(t){var n=t.nodeName.toLowerCase();return("input"===n||"button"===n)&&t.type===e}}function de(e){return function(t){return"form"in t?t.parentNode&&!1===t.disabled?"label"in t?"label"in t.parentNode?t.parentNode.disabled===e:t.disabled===e:t.isDisabled===e||t.isDisabled!==!e&&ie(t)===e:t.disabled===e:"label"in t&&t.disabled===e}}function he(e){return se(function(t){return t=+t,se(function(n,r){var i,o=e([],n.length,t),a=o.length;while(a--)n[i=o[a]]&&(n[i]=!(r[i]=n[i]))})})}function ge(e){return e&&"undefined"!=typeof e.getElementsByTagName&&e}n=oe.support={},o=oe.isXML=function(e){var t=e&&(e.ownerDocument||e).documentElement;return!!t&&"HTML"!==t.nodeName},p=oe.setDocument=function(e){var t,i,a=e?e.ownerDocument||e:w;return a!==d&&9===a.nodeType&&a.documentElement?(d=a,h=d.documentElement,g=!o(d),w!==d&&(i=d.defaultView)&&i.top!==i&&(i.addEventListener?i.addEventListener("unload",re,!1):i.attachEvent&&i.attachEvent("onunload",re)),n.attributes=ue(function(e){return e.className="i",!e.getAttribute("className")}),n.getElementsByTagName=ue(function(e){return e.appendChild(d.createComment("")),!e.getElementsByTagName("*").length}),n.getElementsByClassName=Q.test(d.getElementsByClassName),n.getById=ue(function(e){return h.appendChild(e).id=b,!d.getElementsByName||!d.getElementsByName(b).length}),n.getById?(r.filter.ID=function(e){var t=e.replace(Z,ee);return function(e){return e.getAttribute("id")===t}},r.find.ID=function(e,t){if("undefined"!=typeof t.getElementById&&g){var n=t.getElementById(e);return n?[n]:[]}}):(r.filter.ID=function(e){var t=e.replace(Z,ee);return function(e){var n="undefined"!=typeof e.getAttributeNode&&e.getAttributeNode("id");return n&&n.value===t}},r.find.ID=function(e,t){if("undefined"!=typeof t.getElementById&&g){var n,r,i,o=t.getElementById(e);if(o){if((n=o.getAttributeNode("id"))&&n.value===e)return[o];i=t.getElementsByName(e),r=0;while(o=i[r++])if((n=o.getAttributeNode("id"))&&n.value===e)return[o]}return[]}}),r.find.TAG=n.getElementsByTagName?function(e,t){return"undefined"!=typeof t.getElementsByTagName?t.getElementsByTagName(e):n.qsa?t.querySelectorAll(e):void 0}:function(e,t){var n,r=[],i=0,o=t.getElementsByTagName(e);if("*"===e){while(n=o[i++])1===n.nodeType&&r.push(n);return r}return o},r.find.CLASS=n.getElementsByClassName&&function(e,t){if("undefined"!=typeof t.getElementsByClassName&&g)return t.getElementsByClassName(e)},v=[],y=[],(n.qsa=Q.test(d.querySelectorAll))&&(ue(function(e){h.appendChild(e).innerHTML="<a id='"+b+"'></a><select id='"+b+"-\r\\' msallowcapture=''><option selected=''></option></select>",e.querySelectorAll("[msallowcapture^='']").length&&y.push("[*^$]="+M+"*(?:''|\"\")"),e.querySelectorAll("[selected]").length||y.push("\\["+M+"*(?:value|"+P+")"),e.querySelectorAll("[id~="+b+"-]").length||y.push("~="),e.querySelectorAll(":checked").length||y.push(":checked"),e.querySelectorAll("a#"+b+"+*").length||y.push(".#.+[+~]")}),ue(function(e){e.innerHTML="<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";var t=d.createElement("input");t.setAttribute("type","hidden"),e.appendChild(t).setAttribute("name","D"),e.querySelectorAll("[name=d]").length&&y.push("name"+M+"*[*^$|!~]?="),2!==e.querySelectorAll(":enabled").length&&y.push(":enabled",":disabled"),h.appendChild(e).disabled=!0,2!==e.querySelectorAll(":disabled").length&&y.push(":enabled",":disabled"),e.querySelectorAll("*,:x"),y.push(",.*:")})),(n.matchesSelector=Q.test(m=h.matches||h.webkitMatchesSelector||h.mozMatchesSelector||h.oMatchesSelector||h.msMatchesSelector))&&ue(function(e){n.disconnectedMatch=m.call(e,"*"),m.call(e,"[s!='']:x"),v.push("!=",W)}),y=y.length&&new RegExp(y.join("|")),v=v.length&&new RegExp(v.join("|")),t=Q.test(h.compareDocumentPosition),x=t||Q.test(h.contains)?function(e,t){var n=9===e.nodeType?e.documentElement:e,r=t&&t.parentNode;return e===r||!(!r||1!==r.nodeType||!(n.contains?n.contains(r):e.compareDocumentPosition&&16&e.compareDocumentPosition(r)))}:function(e,t){if(t)while(t=t.parentNode)if(t===e)return!0;return!1},D=t?function(e,t){if(e===t)return f=!0,0;var r=!e.compareDocumentPosition-!t.compareDocumentPosition;return r||(1&(r=(e.ownerDocument||e)===(t.ownerDocument||t)?e.compareDocumentPosition(t):1)||!n.sortDetached&&t.compareDocumentPosition(e)===r?e===d||e.ownerDocument===w&&x(w,e)?-1:t===d||t.ownerDocument===w&&x(w,t)?1:c?O(c,e)-O(c,t):0:4&r?-1:1)}:function(e,t){if(e===t)return f=!0,0;var n,r=0,i=e.parentNode,o=t.parentNode,a=[e],s=[t];if(!i||!o)return e===d?-1:t===d?1:i?-1:o?1:c?O(c,e)-O(c,t):0;if(i===o)return ce(e,t);n=e;while(n=n.parentNode)a.unshift(n);n=t;while(n=n.parentNode)s.unshift(n);while(a[r]===s[r])r++;return r?ce(a[r],s[r]):a[r]===w?-1:s[r]===w?1:0},d):d},oe.matches=function(e,t){return oe(e,null,null,t)},oe.matchesSelector=function(e,t){if((e.ownerDocument||e)!==d&&p(e),t=t.replace(z,"='$1']"),n.matchesSelector&&g&&!S[t+" "]&&(!v||!v.test(t))&&(!y||!y.test(t)))try{var r=m.call(e,t);if(r||n.disconnectedMatch||e.document&&11!==e.document.nodeType)return r}catch(e){}return oe(t,d,null,[e]).length>0},oe.contains=function(e,t){return(e.ownerDocument||e)!==d&&p(e),x(e,t)},oe.attr=function(e,t){(e.ownerDocument||e)!==d&&p(e);var i=r.attrHandle[t.toLowerCase()],o=i&&N.call(r.attrHandle,t.toLowerCase())?i(e,t,!g):void 0;return void 0!==o?o:n.attributes||!g?e.getAttribute(t):(o=e.getAttributeNode(t))&&o.specified?o.value:null},oe.escape=function(e){return(e+"").replace(te,ne)},oe.error=function(e){throw new Error("Syntax error, unrecognized expression: "+e)},oe.uniqueSort=function(e){var t,r=[],i=0,o=0;if(f=!n.detectDuplicates,c=!n.sortStable&&e.slice(0),e.sort(D),f){while(t=e[o++])t===e[o]&&(i=r.push(o));while(i--)e.splice(r[i],1)}return c=null,e},i=oe.getText=function(e){var t,n="",r=0,o=e.nodeType;if(o){if(1===o||9===o||11===o){if("string"==typeof e.textContent)return e.textContent;for(e=e.firstChild;e;e=e.nextSibling)n+=i(e)}else if(3===o||4===o)return e.nodeValue}else while(t=e[r++])n+=i(t);return n},(r=oe.selectors={cacheLength:50,createPseudo:se,match:V,attrHandle:{},find:{},relative:{">":{dir:"parentNode",first:!0}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:!0},"~":{dir:"previousSibling"}},preFilter:{ATTR:function(e){return e[1]=e[1].replace(Z,ee),e[3]=(e[3]||e[4]||e[5]||"").replace(Z,ee),"~="===e[2]&&(e[3]=" "+e[3]+" "),e.slice(0,4)},CHILD:function(e){return e[1]=e[1].toLowerCase(),"nth"===e[1].slice(0,3)?(e[3]||oe.error(e[0]),e[4]=+(e[4]?e[5]+(e[6]||1):2*("even"===e[3]||"odd"===e[3])),e[5]=+(e[7]+e[8]||"odd"===e[3])):e[3]&&oe.error(e[0]),e},PSEUDO:function(e){var t,n=!e[6]&&e[2];return V.CHILD.test(e[0])?null:(e[3]?e[2]=e[4]||e[5]||"":n&&X.test(n)&&(t=a(n,!0))&&(t=n.indexOf(")",n.length-t)-n.length)&&(e[0]=e[0].slice(0,t),e[2]=n.slice(0,t)),e.slice(0,3))}},filter:{TAG:function(e){var t=e.replace(Z,ee).toLowerCase();return"*"===e?function(){return!0}:function(e){return e.nodeName&&e.nodeName.toLowerCase()===t}},CLASS:function(e){var t=E[e+" "];return t||(t=new RegExp("(^|"+M+")"+e+"("+M+"|$)"))&&E(e,function(e){return t.test("string"==typeof e.className&&e.className||"undefined"!=typeof e.getAttribute&&e.getAttribute("class")||"")})},ATTR:function(e,t,n){return function(r){var i=oe.attr(r,e);return null==i?"!="===t:!t||(i+="","="===t?i===n:"!="===t?i!==n:"^="===t?n&&0===i.indexOf(n):"*="===t?n&&i.indexOf(n)>-1:"$="===t?n&&i.slice(-n.length)===n:"~="===t?(" "+i.replace($," ")+" ").indexOf(n)>-1:"|="===t&&(i===n||i.slice(0,n.length+1)===n+"-"))}},CHILD:function(e,t,n,r,i){var o="nth"!==e.slice(0,3),a="last"!==e.slice(-4),s="of-type"===t;return 1===r&&0===i?function(e){return!!e.parentNode}:function(t,n,u){var l,c,f,p,d,h,g=o!==a?"nextSibling":"previousSibling",y=t.parentNode,v=s&&t.nodeName.toLowerCase(),m=!u&&!s,x=!1;if(y){if(o){while(g){p=t;while(p=p[g])if(s?p.nodeName.toLowerCase()===v:1===p.nodeType)return!1;h=g="only"===e&&!h&&"nextSibling"}return!0}if(h=[a?y.firstChild:y.lastChild],a&&m){x=(d=(l=(c=(f=(p=y)[b]||(p[b]={}))[p.uniqueID]||(f[p.uniqueID]={}))[e]||[])[0]===T&&l[1])&&l[2],p=d&&y.childNodes[d];while(p=++d&&p&&p[g]||(x=d=0)||h.pop())if(1===p.nodeType&&++x&&p===t){c[e]=[T,d,x];break}}else if(m&&(x=d=(l=(c=(f=(p=t)[b]||(p[b]={}))[p.uniqueID]||(f[p.uniqueID]={}))[e]||[])[0]===T&&l[1]),!1===x)while(p=++d&&p&&p[g]||(x=d=0)||h.pop())if((s?p.nodeName.toLowerCase()===v:1===p.nodeType)&&++x&&(m&&((c=(f=p[b]||(p[b]={}))[p.uniqueID]||(f[p.uniqueID]={}))[e]=[T,x]),p===t))break;return(x-=i)===r||x%r==0&&x/r>=0}}},PSEUDO:function(e,t){var n,i=r.pseudos[e]||r.setFilters[e.toLowerCase()]||oe.error("unsupported pseudo: "+e);return i[b]?i(t):i.length>1?(n=[e,e,"",t],r.setFilters.hasOwnProperty(e.toLowerCase())?se(function(e,n){var r,o=i(e,t),a=o.length;while(a--)e[r=O(e,o[a])]=!(n[r]=o[a])}):function(e){return i(e,0,n)}):i}},pseudos:{not:se(function(e){var t=[],n=[],r=s(e.replace(B,"$1"));return r[b]?se(function(e,t,n,i){var o,a=r(e,null,i,[]),s=e.length;while(s--)(o=a[s])&&(e[s]=!(t[s]=o))}):function(e,i,o){return t[0]=e,r(t,null,o,n),t[0]=null,!n.pop()}}),has:se(function(e){return function(t){return oe(e,t).length>0}}),contains:se(function(e){return e=e.replace(Z,ee),function(t){return(t.textContent||t.innerText||i(t)).indexOf(e)>-1}}),lang:se(function(e){return U.test(e||"")||oe.error("unsupported lang: "+e),e=e.replace(Z,ee).toLowerCase(),function(t){var n;do{if(n=g?t.lang:t.getAttribute("xml:lang")||t.getAttribute("lang"))return(n=n.toLowerCase())===e||0===n.indexOf(e+"-")}while((t=t.parentNode)&&1===t.nodeType);return!1}}),target:function(t){var n=e.location&&e.location.hash;return n&&n.slice(1)===t.id},root:function(e){return e===h},focus:function(e){return e===d.activeElement&&(!d.hasFocus||d.hasFocus())&&!!(e.type||e.href||~e.tabIndex)},enabled:de(!1),disabled:de(!0),checked:function(e){var t=e.nodeName.toLowerCase();return"input"===t&&!!e.checked||"option"===t&&!!e.selected},selected:function(e){return e.parentNode&&e.parentNode.selectedIndex,!0===e.selected},empty:function(e){for(e=e.firstChild;e;e=e.nextSibling)if(e.nodeType<6)return!1;return!0},parent:function(e){return!r.pseudos.empty(e)},header:function(e){return Y.test(e.nodeName)},input:function(e){return G.test(e.nodeName)},button:function(e){var t=e.nodeName.toLowerCase();return"input"===t&&"button"===e.type||"button"===t},text:function(e){var t;return"input"===e.nodeName.toLowerCase()&&"text"===e.type&&(null==(t=e.getAttribute("type"))||"text"===t.toLowerCase())},first:he(function(){return[0]}),last:he(function(e,t){return[t-1]}),eq:he(function(e,t,n){return[n<0?n+t:n]}),even:he(function(e,t){for(var n=0;n<t;n+=2)e.push(n);return e}),odd:he(function(e,t){for(var n=1;n<t;n+=2)e.push(n);return e}),lt:he(function(e,t,n){for(var r=n<0?n+t:n;--r>=0;)e.push(r);return e}),gt:he(function(e,t,n){for(var r=n<0?n+t:n;++r<t;)e.push(r);return e})}}).pseudos.nth=r.pseudos.eq;for(t in{radio:!0,checkbox:!0,file:!0,password:!0,image:!0})r.pseudos[t]=fe(t);for(t in{submit:!0,reset:!0})r.pseudos[t]=pe(t);function ye(){}ye.prototype=r.filters=r.pseudos,r.setFilters=new ye,a=oe.tokenize=function(e,t){var n,i,o,a,s,u,l,c=k[e+" "];if(c)return t?0:c.slice(0);s=e,u=[],l=r.preFilter;while(s){n&&!(i=F.exec(s))||(i&&(s=s.slice(i[0].length)||s),u.push(o=[])),n=!1,(i=_.exec(s))&&(n=i.shift(),o.push({value:n,type:i[0].replace(B," ")}),s=s.slice(n.length));for(a in r.filter)!(i=V[a].exec(s))||l[a]&&!(i=l[a](i))||(n=i.shift(),o.push({value:n,type:a,matches:i}),s=s.slice(n.length));if(!n)break}return t?s.length:s?oe.error(e):k(e,u).slice(0)};function ve(e){for(var t=0,n=e.length,r="";t<n;t++)r+=e[t].value;return r}function me(e,t,n){var r=t.dir,i=t.next,o=i||r,a=n&&"parentNode"===o,s=C++;return t.first?function(t,n,i){while(t=t[r])if(1===t.nodeType||a)return e(t,n,i);return!1}:function(t,n,u){var l,c,f,p=[T,s];if(u){while(t=t[r])if((1===t.nodeType||a)&&e(t,n,u))return!0}else while(t=t[r])if(1===t.nodeType||a)if(f=t[b]||(t[b]={}),c=f[t.uniqueID]||(f[t.uniqueID]={}),i&&i===t.nodeName.toLowerCase())t=t[r]||t;else{if((l=c[o])&&l[0]===T&&l[1]===s)return p[2]=l[2];if(c[o]=p,p[2]=e(t,n,u))return!0}return!1}}function xe(e){return e.length>1?function(t,n,r){var i=e.length;while(i--)if(!e[i](t,n,r))return!1;return!0}:e[0]}function be(e,t,n){for(var r=0,i=t.length;r<i;r++)oe(e,t[r],n);return n}function we(e,t,n,r,i){for(var o,a=[],s=0,u=e.length,l=null!=t;s<u;s++)(o=e[s])&&(n&&!n(o,r,i)||(a.push(o),l&&t.push(s)));return a}function Te(e,t,n,r,i,o){return r&&!r[b]&&(r=Te(r)),i&&!i[b]&&(i=Te(i,o)),se(function(o,a,s,u){var l,c,f,p=[],d=[],h=a.length,g=o||be(t||"*",s.nodeType?[s]:s,[]),y=!e||!o&&t?g:we(g,p,e,s,u),v=n?i||(o?e:h||r)?[]:a:y;if(n&&n(y,v,s,u),r){l=we(v,d),r(l,[],s,u),c=l.length;while(c--)(f=l[c])&&(v[d[c]]=!(y[d[c]]=f))}if(o){if(i||e){if(i){l=[],c=v.length;while(c--)(f=v[c])&&l.push(y[c]=f);i(null,v=[],l,u)}c=v.length;while(c--)(f=v[c])&&(l=i?O(o,f):p[c])>-1&&(o[l]=!(a[l]=f))}}else v=we(v===a?v.splice(h,v.length):v),i?i(null,a,v,u):L.apply(a,v)})}function Ce(e){for(var t,n,i,o=e.length,a=r.relative[e[0].type],s=a||r.relative[" "],u=a?1:0,c=me(function(e){return e===t},s,!0),f=me(function(e){return O(t,e)>-1},s,!0),p=[function(e,n,r){var i=!a&&(r||n!==l)||((t=n).nodeType?c(e,n,r):f(e,n,r));return t=null,i}];u<o;u++)if(n=r.relative[e[u].type])p=[me(xe(p),n)];else{if((n=r.filter[e[u].type].apply(null,e[u].matches))[b]){for(i=++u;i<o;i++)if(r.relative[e[i].type])break;return Te(u>1&&xe(p),u>1&&ve(e.slice(0,u-1).concat({value:" "===e[u-2].type?"*":""})).replace(B,"$1"),n,u<i&&Ce(e.slice(u,i)),i<o&&Ce(e=e.slice(i)),i<o&&ve(e))}p.push(n)}return xe(p)}function Ee(e,t){var n=t.length>0,i=e.length>0,o=function(o,a,s,u,c){var f,h,y,v=0,m="0",x=o&&[],b=[],w=l,C=o||i&&r.find.TAG("*",c),E=T+=null==w?1:Math.random()||.1,k=C.length;for(c&&(l=a===d||a||c);m!==k&&null!=(f=C[m]);m++){if(i&&f){h=0,a||f.ownerDocument===d||(p(f),s=!g);while(y=e[h++])if(y(f,a||d,s)){u.push(f);break}c&&(T=E)}n&&((f=!y&&f)&&v--,o&&x.push(f))}if(v+=m,n&&m!==v){h=0;while(y=t[h++])y(x,b,a,s);if(o){if(v>0)while(m--)x[m]||b[m]||(b[m]=j.call(u));b=we(b)}L.apply(u,b),c&&!o&&b.length>0&&v+t.length>1&&oe.uniqueSort(u)}return c&&(T=E,l=w),x};return n?se(o):o}return s=oe.compile=function(e,t){var n,r=[],i=[],o=S[e+" "];if(!o){t||(t=a(e)),n=t.length;while(n--)(o=Ce(t[n]))[b]?r.push(o):i.push(o);(o=S(e,Ee(i,r))).selector=e}return o},u=oe.select=function(e,t,n,i){var o,u,l,c,f,p="function"==typeof e&&e,d=!i&&a(e=p.selector||e);if(n=n||[],1===d.length){if((u=d[0]=d[0].slice(0)).length>2&&"ID"===(l=u[0]).type&&9===t.nodeType&&g&&r.relative[u[1].type]){if(!(t=(r.find.ID(l.matches[0].replace(Z,ee),t)||[])[0]))return n;p&&(t=t.parentNode),e=e.slice(u.shift().value.length)}o=V.needsContext.test(e)?0:u.length;while(o--){if(l=u[o],r.relative[c=l.type])break;if((f=r.find[c])&&(i=f(l.matches[0].replace(Z,ee),K.test(u[0].type)&&ge(t.parentNode)||t))){if(u.splice(o,1),!(e=i.length&&ve(u)))return L.apply(n,i),n;break}}}return(p||s(e,d))(i,t,!g,n,!t||K.test(e)&&ge(t.parentNode)||t),n},n.sortStable=b.split("").sort(D).join("")===b,n.detectDuplicates=!!f,p(),n.sortDetached=ue(function(e){return 1&e.compareDocumentPosition(d.createElement("fieldset"))}),ue(function(e){return e.innerHTML="<a href='#'></a>","#"===e.firstChild.getAttribute("href")})||le("type|href|height|width",function(e,t,n){if(!n)return e.getAttribute(t,"type"===t.toLowerCase()?1:2)}),n.attributes&&ue(function(e){return e.innerHTML="<input/>",e.firstChild.setAttribute("value",""),""===e.firstChild.getAttribute("value")})||le("value",function(e,t,n){if(!n&&"input"===e.nodeName.toLowerCase())return e.defaultValue}),ue(function(e){return null==e.getAttribute("disabled")})||le(P,function(e,t,n){var r;if(!n)return!0===e[t]?t.toLowerCase():(r=e.getAttributeNode(t))&&r.specified?r.value:null}),oe}(e);w.find=E,w.expr=E.selectors,w.expr[":"]=w.expr.pseudos,w.uniqueSort=w.unique=E.uniqueSort,w.text=E.getText,w.isXMLDoc=E.isXML,w.contains=E.contains,w.escapeSelector=E.escape;var k=function(e,t,n){var r=[],i=void 0!==n;while((e=e[t])&&9!==e.nodeType)if(1===e.nodeType){if(i&&w(e).is(n))break;r.push(e)}return r},S=function(e,t){for(var n=[];e;e=e.nextSibling)1===e.nodeType&&e!==t&&n.push(e);return n},D=w.expr.match.needsContext;function N(e,t){return e.nodeName&&e.nodeName.toLowerCase()===t.toLowerCase()}var A=/^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;function j(e,t,n){return g(t)?w.grep(e,function(e,r){return!!t.call(e,r,e)!==n}):t.nodeType?w.grep(e,function(e){return e===t!==n}):"string"!=typeof t?w.grep(e,function(e){return u.call(t,e)>-1!==n}):w.filter(t,e,n)}w.filter=function(e,t,n){var r=t[0];return n&&(e=":not("+e+")"),1===t.length&&1===r.nodeType?w.find.matchesSelector(r,e)?[r]:[]:w.find.matches(e,w.grep(t,function(e){return 1===e.nodeType}))},w.fn.extend({find:function(e){var t,n,r=this.length,i=this;if("string"!=typeof e)return this.pushStack(w(e).filter(function(){for(t=0;t<r;t++)if(w.contains(i[t],this))return!0}));for(n=this.pushStack([]),t=0;t<r;t++)w.find(e,i[t],n);return r>1?w.uniqueSort(n):n},filter:function(e){return this.pushStack(j(this,e||[],!1))},not:function(e){return this.pushStack(j(this,e||[],!0))},is:function(e){return!!j(this,"string"==typeof e&&D.test(e)?w(e):e||[],!1).length}});var q,L=/^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;(w.fn.init=function(e,t,n){var i,o;if(!e)return this;if(n=n||q,"string"==typeof e){if(!(i="<"===e[0]&&">"===e[e.length-1]&&e.length>=3?[null,e,null]:L.exec(e))||!i[1]&&t)return!t||t.jquery?(t||n).find(e):this.constructor(t).find(e);if(i[1]){if(t=t instanceof w?t[0]:t,w.merge(this,w.parseHTML(i[1],t&&t.nodeType?t.ownerDocument||t:r,!0)),A.test(i[1])&&w.isPlainObject(t))for(i in t)g(this[i])?this[i](t[i]):this.attr(i,t[i]);return this}return(o=r.getElementById(i[2]))&&(this[0]=o,this.length=1),this}return e.nodeType?(this[0]=e,this.length=1,this):g(e)?void 0!==n.ready?n.ready(e):e(w):w.makeArray(e,this)}).prototype=w.fn,q=w(r);var H=/^(?:parents|prev(?:Until|All))/,O={children:!0,contents:!0,next:!0,prev:!0};w.fn.extend({has:function(e){var t=w(e,this),n=t.length;return this.filter(function(){for(var e=0;e<n;e++)if(w.contains(this,t[e]))return!0})},closest:function(e,t){var n,r=0,i=this.length,o=[],a="string"!=typeof e&&w(e);if(!D.test(e))for(;r<i;r++)for(n=this[r];n&&n!==t;n=n.parentNode)if(n.nodeType<11&&(a?a.index(n)>-1:1===n.nodeType&&w.find.matchesSelector(n,e))){o.push(n);break}return this.pushStack(o.length>1?w.uniqueSort(o):o)},index:function(e){return e?"string"==typeof e?u.call(w(e),this[0]):u.call(this,e.jquery?e[0]:e):this[0]&&this[0].parentNode?this.first().prevAll().length:-1},add:function(e,t){return this.pushStack(w.uniqueSort(w.merge(this.get(),w(e,t))))},addBack:function(e){return this.add(null==e?this.prevObject:this.prevObject.filter(e))}});function P(e,t){while((e=e[t])&&1!==e.nodeType);return e}w.each({parent:function(e){var t=e.parentNode;return t&&11!==t.nodeType?t:null},parents:function(e){return k(e,"parentNode")},parentsUntil:function(e,t,n){return k(e,"parentNode",n)},next:function(e){return P(e,"nextSibling")},prev:function(e){return P(e,"previousSibling")},nextAll:function(e){return k(e,"nextSibling")},prevAll:function(e){return k(e,"previousSibling")},nextUntil:function(e,t,n){return k(e,"nextSibling",n)},prevUntil:function(e,t,n){return k(e,"previousSibling",n)},siblings:function(e){return S((e.parentNode||{}).firstChild,e)},children:function(e){return S(e.firstChild)},contents:function(e){return N(e,"iframe")?e.contentDocument:(N(e,"template")&&(e=e.content||e),w.merge([],e.childNodes))}},function(e,t){w.fn[e]=function(n,r){var i=w.map(this,t,n);return"Until"!==e.slice(-5)&&(r=n),r&&"string"==typeof r&&(i=w.filter(r,i)),this.length>1&&(O[e]||w.uniqueSort(i),H.test(e)&&i.reverse()),this.pushStack(i)}});var M=/[^\x20\t\r\n\f]+/g;function R(e){var t={};return w.each(e.match(M)||[],function(e,n){t[n]=!0}),t}w.Callbacks=function(e){e="string"==typeof e?R(e):w.extend({},e);var t,n,r,i,o=[],a=[],s=-1,u=function(){for(i=i||e.once,r=t=!0;a.length;s=-1){n=a.shift();while(++s<o.length)!1===o[s].apply(n[0],n[1])&&e.stopOnFalse&&(s=o.length,n=!1)}e.memory||(n=!1),t=!1,i&&(o=n?[]:"")},l={add:function(){return o&&(n&&!t&&(s=o.length-1,a.push(n)),function t(n){w.each(n,function(n,r){g(r)?e.unique&&l.has(r)||o.push(r):r&&r.length&&"string"!==x(r)&&t(r)})}(arguments),n&&!t&&u()),this},remove:function(){return w.each(arguments,function(e,t){var n;while((n=w.inArray(t,o,n))>-1)o.splice(n,1),n<=s&&s--}),this},has:function(e){return e?w.inArray(e,o)>-1:o.length>0},empty:function(){return o&&(o=[]),this},disable:function(){return i=a=[],o=n="",this},disabled:function(){return!o},lock:function(){return i=a=[],n||t||(o=n=""),this},locked:function(){return!!i},fireWith:function(e,n){return i||(n=[e,(n=n||[]).slice?n.slice():n],a.push(n),t||u()),this},fire:function(){return l.fireWith(this,arguments),this},fired:function(){return!!r}};return l};function I(e){return e}function W(e){throw e}function $(e,t,n,r){var i;try{e&&g(i=e.promise)?i.call(e).done(t).fail(n):e&&g(i=e.then)?i.call(e,t,n):t.apply(void 0,[e].slice(r))}catch(e){n.apply(void 0,[e])}}w.extend({Deferred:function(t){var n=[["notify","progress",w.Callbacks("memory"),w.Callbacks("memory"),2],["resolve","done",w.Callbacks("once memory"),w.Callbacks("once memory"),0,"resolved"],["reject","fail",w.Callbacks("once memory"),w.Callbacks("once memory"),1,"rejected"]],r="pending",i={state:function(){return r},always:function(){return o.done(arguments).fail(arguments),this},"catch":function(e){return i.then(null,e)},pipe:function(){var e=arguments;return w.Deferred(function(t){w.each(n,function(n,r){var i=g(e[r[4]])&&e[r[4]];o[r[1]](function(){var e=i&&i.apply(this,arguments);e&&g(e.promise)?e.promise().progress(t.notify).done(t.resolve).fail(t.reject):t[r[0]+"With"](this,i?[e]:arguments)})}),e=null}).promise()},then:function(t,r,i){var o=0;function a(t,n,r,i){return function(){var s=this,u=arguments,l=function(){var e,l;if(!(t<o)){if((e=r.apply(s,u))===n.promise())throw new TypeError("Thenable self-resolution");l=e&&("object"==typeof e||"function"==typeof e)&&e.then,g(l)?i?l.call(e,a(o,n,I,i),a(o,n,W,i)):(o++,l.call(e,a(o,n,I,i),a(o,n,W,i),a(o,n,I,n.notifyWith))):(r!==I&&(s=void 0,u=[e]),(i||n.resolveWith)(s,u))}},c=i?l:function(){try{l()}catch(e){w.Deferred.exceptionHook&&w.Deferred.exceptionHook(e,c.stackTrace),t+1>=o&&(r!==W&&(s=void 0,u=[e]),n.rejectWith(s,u))}};t?c():(w.Deferred.getStackHook&&(c.stackTrace=w.Deferred.getStackHook()),e.setTimeout(c))}}return w.Deferred(function(e){n[0][3].add(a(0,e,g(i)?i:I,e.notifyWith)),n[1][3].add(a(0,e,g(t)?t:I)),n[2][3].add(a(0,e,g(r)?r:W))}).promise()},promise:function(e){return null!=e?w.extend(e,i):i}},o={};return w.each(n,function(e,t){var a=t[2],s=t[5];i[t[1]]=a.add,s&&a.add(function(){r=s},n[3-e][2].disable,n[3-e][3].disable,n[0][2].lock,n[0][3].lock),a.add(t[3].fire),o[t[0]]=function(){return o[t[0]+"With"](this===o?void 0:this,arguments),this},o[t[0]+"With"]=a.fireWith}),i.promise(o),t&&t.call(o,o),o},when:function(e){var t=arguments.length,n=t,r=Array(n),i=o.call(arguments),a=w.Deferred(),s=function(e){return function(n){r[e]=this,i[e]=arguments.length>1?o.call(arguments):n,--t||a.resolveWith(r,i)}};if(t<=1&&($(e,a.done(s(n)).resolve,a.reject,!t),"pending"===a.state()||g(i[n]&&i[n].then)))return a.then();while(n--)$(i[n],s(n),a.reject);return a.promise()}});var B=/^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;w.Deferred.exceptionHook=function(t,n){e.console&&e.console.warn&&t&&B.test(t.name)&&e.console.warn("jQuery.Deferred exception: "+t.message,t.stack,n)},w.readyException=function(t){e.setTimeout(function(){throw t})};var F=w.Deferred();w.fn.ready=function(e){return F.then(e)["catch"](function(e){w.readyException(e)}),this},w.extend({isReady:!1,readyWait:1,ready:function(e){(!0===e?--w.readyWait:w.isReady)||(w.isReady=!0,!0!==e&&--w.readyWait>0||F.resolveWith(r,[w]))}}),w.ready.then=F.then;function _(){r.removeEventListener("DOMContentLoaded",_),e.removeEventListener("load",_),w.ready()}"complete"===r.readyState||"loading"!==r.readyState&&!r.documentElement.doScroll?e.setTimeout(w.ready):(r.addEventListener("DOMContentLoaded",_),e.addEventListener("load",_));var z=function(e,t,n,r,i,o,a){var s=0,u=e.length,l=null==n;if("object"===x(n)){i=!0;for(s in n)z(e,t,s,n[s],!0,o,a)}else if(void 0!==r&&(i=!0,g(r)||(a=!0),l&&(a?(t.call(e,r),t=null):(l=t,t=function(e,t,n){return l.call(w(e),n)})),t))for(;s<u;s++)t(e[s],n,a?r:r.call(e[s],s,t(e[s],n)));return i?e:l?t.call(e):u?t(e[0],n):o},X=/^-ms-/,U=/-([a-z])/g;function V(e,t){return t.toUpperCase()}function G(e){return e.replace(X,"ms-").replace(U,V)}var Y=function(e){return 1===e.nodeType||9===e.nodeType||!+e.nodeType};function Q(){this.expando=w.expando+Q.uid++}Q.uid=1,Q.prototype={cache:function(e){var t=e[this.expando];return t||(t={},Y(e)&&(e.nodeType?e[this.expando]=t:Object.defineProperty(e,this.expando,{value:t,configurable:!0}))),t},set:function(e,t,n){var r,i=this.cache(e);if("string"==typeof t)i[G(t)]=n;else for(r in t)i[G(r)]=t[r];return i},get:function(e,t){return void 0===t?this.cache(e):e[this.expando]&&e[this.expando][G(t)]},access:function(e,t,n){return void 0===t||t&&"string"==typeof t&&void 0===n?this.get(e,t):(this.set(e,t,n),void 0!==n?n:t)},remove:function(e,t){var n,r=e[this.expando];if(void 0!==r){if(void 0!==t){n=(t=Array.isArray(t)?t.map(G):(t=G(t))in r?[t]:t.match(M)||[]).length;while(n--)delete r[t[n]]}(void 0===t||w.isEmptyObject(r))&&(e.nodeType?e[this.expando]=void 0:delete e[this.expando])}},hasData:function(e){var t=e[this.expando];return void 0!==t&&!w.isEmptyObject(t)}};var J=new Q,K=new Q,Z=/^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,ee=/[A-Z]/g;function te(e){return"true"===e||"false"!==e&&("null"===e?null:e===+e+""?+e:Z.test(e)?JSON.parse(e):e)}function ne(e,t,n){var r;if(void 0===n&&1===e.nodeType)if(r="data-"+t.replace(ee,"-$&").toLowerCase(),"string"==typeof(n=e.getAttribute(r))){try{n=te(n)}catch(e){}K.set(e,t,n)}else n=void 0;return n}w.extend({hasData:function(e){return K.hasData(e)||J.hasData(e)},data:function(e,t,n){return K.access(e,t,n)},removeData:function(e,t){K.remove(e,t)},_data:function(e,t,n){return J.access(e,t,n)},_removeData:function(e,t){J.remove(e,t)}}),w.fn.extend({data:function(e,t){var n,r,i,o=this[0],a=o&&o.attributes;if(void 0===e){if(this.length&&(i=K.get(o),1===o.nodeType&&!J.get(o,"hasDataAttrs"))){n=a.length;while(n--)a[n]&&0===(r=a[n].name).indexOf("data-")&&(r=G(r.slice(5)),ne(o,r,i[r]));J.set(o,"hasDataAttrs",!0)}return i}return"object"==typeof e?this.each(function(){K.set(this,e)}):z(this,function(t){var n;if(o&&void 0===t){if(void 0!==(n=K.get(o,e)))return n;if(void 0!==(n=ne(o,e)))return n}else this.each(function(){K.set(this,e,t)})},null,t,arguments.length>1,null,!0)},removeData:function(e){return this.each(function(){K.remove(this,e)})}}),w.extend({queue:function(e,t,n){var r;if(e)return t=(t||"fx")+"queue",r=J.get(e,t),n&&(!r||Array.isArray(n)?r=J.access(e,t,w.makeArray(n)):r.push(n)),r||[]},dequeue:function(e,t){t=t||"fx";var n=w.queue(e,t),r=n.length,i=n.shift(),o=w._queueHooks(e,t),a=function(){w.dequeue(e,t)};"inprogress"===i&&(i=n.shift(),r--),i&&("fx"===t&&n.unshift("inprogress"),delete o.stop,i.call(e,a,o)),!r&&o&&o.empty.fire()},_queueHooks:function(e,t){var n=t+"queueHooks";return J.get(e,n)||J.access(e,n,{empty:w.Callbacks("once memory").add(function(){J.remove(e,[t+"queue",n])})})}}),w.fn.extend({queue:function(e,t){var n=2;return"string"!=typeof e&&(t=e,e="fx",n--),arguments.length<n?w.queue(this[0],e):void 0===t?this:this.each(function(){var n=w.queue(this,e,t);w._queueHooks(this,e),"fx"===e&&"inprogress"!==n[0]&&w.dequeue(this,e)})},dequeue:function(e){return this.each(function(){w.dequeue(this,e)})},clearQueue:function(e){return this.queue(e||"fx",[])},promise:function(e,t){var n,r=1,i=w.Deferred(),o=this,a=this.length,s=function(){--r||i.resolveWith(o,[o])};"string"!=typeof e&&(t=e,e=void 0),e=e||"fx";while(a--)(n=J.get(o[a],e+"queueHooks"))&&n.empty&&(r++,n.empty.add(s));return s(),i.promise(t)}});var re=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,ie=new RegExp("^(?:([+-])=|)("+re+")([a-z%]*)$","i"),oe=["Top","Right","Bottom","Left"],ae=function(e,t){return"none"===(e=t||e).style.display||""===e.style.display&&w.contains(e.ownerDocument,e)&&"none"===w.css(e,"display")},se=function(e,t,n,r){var i,o,a={};for(o in t)a[o]=e.style[o],e.style[o]=t[o];i=n.apply(e,r||[]);for(o in t)e.style[o]=a[o];return i};function ue(e,t,n,r){var i,o,a=20,s=r?function(){return r.cur()}:function(){return w.css(e,t,"")},u=s(),l=n&&n[3]||(w.cssNumber[t]?"":"px"),c=(w.cssNumber[t]||"px"!==l&&+u)&&ie.exec(w.css(e,t));if(c&&c[3]!==l){u/=2,l=l||c[3],c=+u||1;while(a--)w.style(e,t,c+l),(1-o)*(1-(o=s()/u||.5))<=0&&(a=0),c/=o;c*=2,w.style(e,t,c+l),n=n||[]}return n&&(c=+c||+u||0,i=n[1]?c+(n[1]+1)*n[2]:+n[2],r&&(r.unit=l,r.start=c,r.end=i)),i}var le={};function ce(e){var t,n=e.ownerDocument,r=e.nodeName,i=le[r];return i||(t=n.body.appendChild(n.createElement(r)),i=w.css(t,"display"),t.parentNode.removeChild(t),"none"===i&&(i="block"),le[r]=i,i)}function fe(e,t){for(var n,r,i=[],o=0,a=e.length;o<a;o++)(r=e[o]).style&&(n=r.style.display,t?("none"===n&&(i[o]=J.get(r,"display")||null,i[o]||(r.style.display="")),""===r.style.display&&ae(r)&&(i[o]=ce(r))):"none"!==n&&(i[o]="none",J.set(r,"display",n)));for(o=0;o<a;o++)null!=i[o]&&(e[o].style.display=i[o]);return e}w.fn.extend({show:function(){return fe(this,!0)},hide:function(){return fe(this)},toggle:function(e){return"boolean"==typeof e?e?this.show():this.hide():this.each(function(){ae(this)?w(this).show():w(this).hide()})}});var pe=/^(?:checkbox|radio)$/i,de=/<([a-z][^\/\0>\x20\t\r\n\f]+)/i,he=/^$|^module$|\/(?:java|ecma)script/i,ge={option:[1,"<select multiple='multiple'>","</select>"],thead:[1,"<table>","</table>"],col:[2,"<table><colgroup>","</colgroup></table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:[0,"",""]};ge.optgroup=ge.option,ge.tbody=ge.tfoot=ge.colgroup=ge.caption=ge.thead,ge.th=ge.td;function ye(e,t){var n;return n="undefined"!=typeof e.getElementsByTagName?e.getElementsByTagName(t||"*"):"undefined"!=typeof e.querySelectorAll?e.querySelectorAll(t||"*"):[],void 0===t||t&&N(e,t)?w.merge([e],n):n}function ve(e,t){for(var n=0,r=e.length;n<r;n++)J.set(e[n],"globalEval",!t||J.get(t[n],"globalEval"))}var me=/<|&#?\w+;/;function xe(e,t,n,r,i){for(var o,a,s,u,l,c,f=t.createDocumentFragment(),p=[],d=0,h=e.length;d<h;d++)if((o=e[d])||0===o)if("object"===x(o))w.merge(p,o.nodeType?[o]:o);else if(me.test(o)){a=a||f.appendChild(t.createElement("div")),s=(de.exec(o)||["",""])[1].toLowerCase(),u=ge[s]||ge._default,a.innerHTML=u[1]+w.htmlPrefilter(o)+u[2],c=u[0];while(c--)a=a.lastChild;w.merge(p,a.childNodes),(a=f.firstChild).textContent=""}else p.push(t.createTextNode(o));f.textContent="",d=0;while(o=p[d++])if(r&&w.inArray(o,r)>-1)i&&i.push(o);else if(l=w.contains(o.ownerDocument,o),a=ye(f.appendChild(o),"script"),l&&ve(a),n){c=0;while(o=a[c++])he.test(o.type||"")&&n.push(o)}return f}!function(){var e=r.createDocumentFragment().appendChild(r.createElement("div")),t=r.createElement("input");t.setAttribute("type","radio"),t.setAttribute("checked","checked"),t.setAttribute("name","t"),e.appendChild(t),h.checkClone=e.cloneNode(!0).cloneNode(!0).lastChild.checked,e.innerHTML="<textarea>x</textarea>",h.noCloneChecked=!!e.cloneNode(!0).lastChild.defaultValue}();var be=r.documentElement,we=/^key/,Te=/^(?:mouse|pointer|contextmenu|drag|drop)|click/,Ce=/^([^.]*)(?:\.(.+)|)/;function Ee(){return!0}function ke(){return!1}function Se(){try{return r.activeElement}catch(e){}}function De(e,t,n,r,i,o){var a,s;if("object"==typeof t){"string"!=typeof n&&(r=r||n,n=void 0);for(s in t)De(e,s,n,r,t[s],o);return e}if(null==r&&null==i?(i=n,r=n=void 0):null==i&&("string"==typeof n?(i=r,r=void 0):(i=r,r=n,n=void 0)),!1===i)i=ke;else if(!i)return e;return 1===o&&(a=i,(i=function(e){return w().off(e),a.apply(this,arguments)}).guid=a.guid||(a.guid=w.guid++)),e.each(function(){w.event.add(this,t,i,r,n)})}w.event={global:{},add:function(e,t,n,r,i){var o,a,s,u,l,c,f,p,d,h,g,y=J.get(e);if(y){n.handler&&(n=(o=n).handler,i=o.selector),i&&w.find.matchesSelector(be,i),n.guid||(n.guid=w.guid++),(u=y.events)||(u=y.events={}),(a=y.handle)||(a=y.handle=function(t){return"undefined"!=typeof w&&w.event.triggered!==t.type?w.event.dispatch.apply(e,arguments):void 0}),l=(t=(t||"").match(M)||[""]).length;while(l--)d=g=(s=Ce.exec(t[l])||[])[1],h=(s[2]||"").split(".").sort(),d&&(f=w.event.special[d]||{},d=(i?f.delegateType:f.bindType)||d,f=w.event.special[d]||{},c=w.extend({type:d,origType:g,data:r,handler:n,guid:n.guid,selector:i,needsContext:i&&w.expr.match.needsContext.test(i),namespace:h.join(".")},o),(p=u[d])||((p=u[d]=[]).delegateCount=0,f.setup&&!1!==f.setup.call(e,r,h,a)||e.addEventListener&&e.addEventListener(d,a)),f.add&&(f.add.call(e,c),c.handler.guid||(c.handler.guid=n.guid)),i?p.splice(p.delegateCount++,0,c):p.push(c),w.event.global[d]=!0)}},remove:function(e,t,n,r,i){var o,a,s,u,l,c,f,p,d,h,g,y=J.hasData(e)&&J.get(e);if(y&&(u=y.events)){l=(t=(t||"").match(M)||[""]).length;while(l--)if(s=Ce.exec(t[l])||[],d=g=s[1],h=(s[2]||"").split(".").sort(),d){f=w.event.special[d]||{},p=u[d=(r?f.delegateType:f.bindType)||d]||[],s=s[2]&&new RegExp("(^|\\.)"+h.join("\\.(?:.*\\.|)")+"(\\.|$)"),a=o=p.length;while(o--)c=p[o],!i&&g!==c.origType||n&&n.guid!==c.guid||s&&!s.test(c.namespace)||r&&r!==c.selector&&("**"!==r||!c.selector)||(p.splice(o,1),c.selector&&p.delegateCount--,f.remove&&f.remove.call(e,c));a&&!p.length&&(f.teardown&&!1!==f.teardown.call(e,h,y.handle)||w.removeEvent(e,d,y.handle),delete u[d])}else for(d in u)w.event.remove(e,d+t[l],n,r,!0);w.isEmptyObject(u)&&J.remove(e,"handle events")}},dispatch:function(e){var t=w.event.fix(e),n,r,i,o,a,s,u=new Array(arguments.length),l=(J.get(this,"events")||{})[t.type]||[],c=w.event.special[t.type]||{};for(u[0]=t,n=1;n<arguments.length;n++)u[n]=arguments[n];if(t.delegateTarget=this,!c.preDispatch||!1!==c.preDispatch.call(this,t)){s=w.event.handlers.call(this,t,l),n=0;while((o=s[n++])&&!t.isPropagationStopped()){t.currentTarget=o.elem,r=0;while((a=o.handlers[r++])&&!t.isImmediatePropagationStopped())t.rnamespace&&!t.rnamespace.test(a.namespace)||(t.handleObj=a,t.data=a.data,void 0!==(i=((w.event.special[a.origType]||{}).handle||a.handler).apply(o.elem,u))&&!1===(t.result=i)&&(t.preventDefault(),t.stopPropagation()))}return c.postDispatch&&c.postDispatch.call(this,t),t.result}},handlers:function(e,t){var n,r,i,o,a,s=[],u=t.delegateCount,l=e.target;if(u&&l.nodeType&&!("click"===e.type&&e.button>=1))for(;l!==this;l=l.parentNode||this)if(1===l.nodeType&&("click"!==e.type||!0!==l.disabled)){for(o=[],a={},n=0;n<u;n++)void 0===a[i=(r=t[n]).selector+" "]&&(a[i]=r.needsContext?w(i,this).index(l)>-1:w.find(i,this,null,[l]).length),a[i]&&o.push(r);o.length&&s.push({elem:l,handlers:o})}return l=this,u<t.length&&s.push({elem:l,handlers:t.slice(u)}),s},addProp:function(e,t){Object.defineProperty(w.Event.prototype,e,{enumerable:!0,configurable:!0,get:g(t)?function(){if(this.originalEvent)return t(this.originalEvent)}:function(){if(this.originalEvent)return this.originalEvent[e]},set:function(t){Object.defineProperty(this,e,{enumerable:!0,configurable:!0,writable:!0,value:t})}})},fix:function(e){return e[w.expando]?e:new w.Event(e)},special:{load:{noBubble:!0},focus:{trigger:function(){if(this!==Se()&&this.focus)return this.focus(),!1},delegateType:"focusin"},blur:{trigger:function(){if(this===Se()&&this.blur)return this.blur(),!1},delegateType:"focusout"},click:{trigger:function(){if("checkbox"===this.type&&this.click&&N(this,"input"))return this.click(),!1},_default:function(e){return N(e.target,"a")}},beforeunload:{postDispatch:function(e){void 0!==e.result&&e.originalEvent&&(e.originalEvent.returnValue=e.result)}}}},w.removeEvent=function(e,t,n){e.removeEventListener&&e.removeEventListener(t,n)},w.Event=function(e,t){if(!(this instanceof w.Event))return new w.Event(e,t);e&&e.type?(this.originalEvent=e,this.type=e.type,this.isDefaultPrevented=e.defaultPrevented||void 0===e.defaultPrevented&&!1===e.returnValue?Ee:ke,this.target=e.target&&3===e.target.nodeType?e.target.parentNode:e.target,this.currentTarget=e.currentTarget,this.relatedTarget=e.relatedTarget):this.type=e,t&&w.extend(this,t),this.timeStamp=e&&e.timeStamp||Date.now(),this[w.expando]=!0},w.Event.prototype={constructor:w.Event,isDefaultPrevented:ke,isPropagationStopped:ke,isImmediatePropagationStopped:ke,isSimulated:!1,preventDefault:function(){var e=this.originalEvent;this.isDefaultPrevented=Ee,e&&!this.isSimulated&&e.preventDefault()},stopPropagation:function(){var e=this.originalEvent;this.isPropagationStopped=Ee,e&&!this.isSimulated&&e.stopPropagation()},stopImmediatePropagation:function(){var e=this.originalEvent;this.isImmediatePropagationStopped=Ee,e&&!this.isSimulated&&e.stopImmediatePropagation(),this.stopPropagation()}},w.each({altKey:!0,bubbles:!0,cancelable:!0,changedTouches:!0,ctrlKey:!0,detail:!0,eventPhase:!0,metaKey:!0,pageX:!0,pageY:!0,shiftKey:!0,view:!0,"char":!0,charCode:!0,key:!0,keyCode:!0,button:!0,buttons:!0,clientX:!0,clientY:!0,offsetX:!0,offsetY:!0,pointerId:!0,pointerType:!0,screenX:!0,screenY:!0,targetTouches:!0,toElement:!0,touches:!0,which:function(e){var t=e.button;return null==e.which&&we.test(e.type)?null!=e.charCode?e.charCode:e.keyCode:!e.which&&void 0!==t&&Te.test(e.type)?1&t?1:2&t?3:4&t?2:0:e.which}},w.event.addProp),w.each({mouseenter:"mouseover",mouseleave:"mouseout",pointerenter:"pointerover",pointerleave:"pointerout"},function(e,t){w.event.special[e]={delegateType:t,bindType:t,handle:function(e){var n,r=this,i=e.relatedTarget,o=e.handleObj;return i&&(i===r||w.contains(r,i))||(e.type=o.origType,n=o.handler.apply(this,arguments),e.type=t),n}}}),w.fn.extend({on:function(e,t,n,r){return De(this,e,t,n,r)},one:function(e,t,n,r){return De(this,e,t,n,r,1)},off:function(e,t,n){var r,i;if(e&&e.preventDefault&&e.handleObj)return r=e.handleObj,w(e.delegateTarget).off(r.namespace?r.origType+"."+r.namespace:r.origType,r.selector,r.handler),this;if("object"==typeof e){for(i in e)this.off(i,t,e[i]);return this}return!1!==t&&"function"!=typeof t||(n=t,t=void 0),!1===n&&(n=ke),this.each(function(){w.event.remove(this,e,n,t)})}});var Ne=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,Ae=/<script|<style|<link/i,je=/checked\s*(?:[^=]|=\s*.checked.)/i,qe=/^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;function Le(e,t){return N(e,"table")&&N(11!==t.nodeType?t:t.firstChild,"tr")?w(e).children("tbody")[0]||e:e}function He(e){return e.type=(null!==e.getAttribute("type"))+"/"+e.type,e}function Oe(e){return"true/"===(e.type||"").slice(0,5)?e.type=e.type.slice(5):e.removeAttribute("type"),e}function Pe(e,t){var n,r,i,o,a,s,u,l;if(1===t.nodeType){if(J.hasData(e)&&(o=J.access(e),a=J.set(t,o),l=o.events)){delete a.handle,a.events={};for(i in l)for(n=0,r=l[i].length;n<r;n++)w.event.add(t,i,l[i][n])}K.hasData(e)&&(s=K.access(e),u=w.extend({},s),K.set(t,u))}}function Me(e,t){var n=t.nodeName.toLowerCase();"input"===n&&pe.test(e.type)?t.checked=e.checked:"input"!==n&&"textarea"!==n||(t.defaultValue=e.defaultValue)}function Re(e,t,n,r){t=a.apply([],t);var i,o,s,u,l,c,f=0,p=e.length,d=p-1,y=t[0],v=g(y);if(v||p>1&&"string"==typeof y&&!h.checkClone&&je.test(y))return e.each(function(i){var o=e.eq(i);v&&(t[0]=y.call(this,i,o.html())),Re(o,t,n,r)});if(p&&(i=xe(t,e[0].ownerDocument,!1,e,r),o=i.firstChild,1===i.childNodes.length&&(i=o),o||r)){for(u=(s=w.map(ye(i,"script"),He)).length;f<p;f++)l=i,f!==d&&(l=w.clone(l,!0,!0),u&&w.merge(s,ye(l,"script"))),n.call(e[f],l,f);if(u)for(c=s[s.length-1].ownerDocument,w.map(s,Oe),f=0;f<u;f++)l=s[f],he.test(l.type||"")&&!J.access(l,"globalEval")&&w.contains(c,l)&&(l.src&&"module"!==(l.type||"").toLowerCase()?w._evalUrl&&w._evalUrl(l.src):m(l.textContent.replace(qe,""),c,l))}return e}function Ie(e,t,n){for(var r,i=t?w.filter(t,e):e,o=0;null!=(r=i[o]);o++)n||1!==r.nodeType||w.cleanData(ye(r)),r.parentNode&&(n&&w.contains(r.ownerDocument,r)&&ve(ye(r,"script")),r.parentNode.removeChild(r));return e}w.extend({htmlPrefilter:function(e){return e.replace(Ne,"<$1></$2>")},clone:function(e,t,n){var r,i,o,a,s=e.cloneNode(!0),u=w.contains(e.ownerDocument,e);if(!(h.noCloneChecked||1!==e.nodeType&&11!==e.nodeType||w.isXMLDoc(e)))for(a=ye(s),r=0,i=(o=ye(e)).length;r<i;r++)Me(o[r],a[r]);if(t)if(n)for(o=o||ye(e),a=a||ye(s),r=0,i=o.length;r<i;r++)Pe(o[r],a[r]);else Pe(e,s);return(a=ye(s,"script")).length>0&&ve(a,!u&&ye(e,"script")),s},cleanData:function(e){for(var t,n,r,i=w.event.special,o=0;void 0!==(n=e[o]);o++)if(Y(n)){if(t=n[J.expando]){if(t.events)for(r in t.events)i[r]?w.event.remove(n,r):w.removeEvent(n,r,t.handle);n[J.expando]=void 0}n[K.expando]&&(n[K.expando]=void 0)}}}),w.fn.extend({detach:function(e){return Ie(this,e,!0)},remove:function(e){return Ie(this,e)},text:function(e){return z(this,function(e){return void 0===e?w.text(this):this.empty().each(function(){1!==this.nodeType&&11!==this.nodeType&&9!==this.nodeType||(this.textContent=e)})},null,e,arguments.length)},append:function(){return Re(this,arguments,function(e){1!==this.nodeType&&11!==this.nodeType&&9!==this.nodeType||Le(this,e).appendChild(e)})},prepend:function(){return Re(this,arguments,function(e){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var t=Le(this,e);t.insertBefore(e,t.firstChild)}})},before:function(){return Re(this,arguments,function(e){this.parentNode&&this.parentNode.insertBefore(e,this)})},after:function(){return Re(this,arguments,function(e){this.parentNode&&this.parentNode.insertBefore(e,this.nextSibling)})},empty:function(){for(var e,t=0;null!=(e=this[t]);t++)1===e.nodeType&&(w.cleanData(ye(e,!1)),e.textContent="");return this},clone:function(e,t){return e=null!=e&&e,t=null==t?e:t,this.map(function(){return w.clone(this,e,t)})},html:function(e){return z(this,function(e){var t=this[0]||{},n=0,r=this.length;if(void 0===e&&1===t.nodeType)return t.innerHTML;if("string"==typeof e&&!Ae.test(e)&&!ge[(de.exec(e)||["",""])[1].toLowerCase()]){e=w.htmlPrefilter(e);try{for(;n<r;n++)1===(t=this[n]||{}).nodeType&&(w.cleanData(ye(t,!1)),t.innerHTML=e);t=0}catch(e){}}t&&this.empty().append(e)},null,e,arguments.length)},replaceWith:function(){var e=[];return Re(this,arguments,function(t){var n=this.parentNode;w.inArray(this,e)<0&&(w.cleanData(ye(this)),n&&n.replaceChild(t,this))},e)}}),w.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(e,t){w.fn[e]=function(e){for(var n,r=[],i=w(e),o=i.length-1,a=0;a<=o;a++)n=a===o?this:this.clone(!0),w(i[a])[t](n),s.apply(r,n.get());return this.pushStack(r)}});var We=new RegExp("^("+re+")(?!px)[a-z%]+$","i"),$e=function(t){var n=t.ownerDocument.defaultView;return n&&n.opener||(n=e),n.getComputedStyle(t)},Be=new RegExp(oe.join("|"),"i");!function(){function t(){if(c){l.style.cssText="position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0",c.style.cssText="position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%",be.appendChild(l).appendChild(c);var t=e.getComputedStyle(c);i="1%"!==t.top,u=12===n(t.marginLeft),c.style.right="60%",s=36===n(t.right),o=36===n(t.width),c.style.position="absolute",a=36===c.offsetWidth||"absolute",be.removeChild(l),c=null}}function n(e){return Math.round(parseFloat(e))}var i,o,a,s,u,l=r.createElement("div"),c=r.createElement("div");c.style&&(c.style.backgroundClip="content-box",c.cloneNode(!0).style.backgroundClip="",h.clearCloneStyle="content-box"===c.style.backgroundClip,w.extend(h,{boxSizingReliable:function(){return t(),o},pixelBoxStyles:function(){return t(),s},pixelPosition:function(){return t(),i},reliableMarginLeft:function(){return t(),u},scrollboxSize:function(){return t(),a}}))}();function Fe(e,t,n){var r,i,o,a,s=e.style;return(n=n||$e(e))&&(""!==(a=n.getPropertyValue(t)||n[t])||w.contains(e.ownerDocument,e)||(a=w.style(e,t)),!h.pixelBoxStyles()&&We.test(a)&&Be.test(t)&&(r=s.width,i=s.minWidth,o=s.maxWidth,s.minWidth=s.maxWidth=s.width=a,a=n.width,s.width=r,s.minWidth=i,s.maxWidth=o)),void 0!==a?a+"":a}function _e(e,t){return{get:function(){if(!e())return(this.get=t).apply(this,arguments);delete this.get}}}var ze=/^(none|table(?!-c[ea]).+)/,Xe=/^--/,Ue={position:"absolute",visibility:"hidden",display:"block"},Ve={letterSpacing:"0",fontWeight:"400"},Ge=["Webkit","Moz","ms"],Ye=r.createElement("div").style;function Qe(e){if(e in Ye)return e;var t=e[0].toUpperCase()+e.slice(1),n=Ge.length;while(n--)if((e=Ge[n]+t)in Ye)return e}function Je(e){var t=w.cssProps[e];return t||(t=w.cssProps[e]=Qe(e)||e),t}function Ke(e,t,n){var r=ie.exec(t);return r?Math.max(0,r[2]-(n||0))+(r[3]||"px"):t}function Ze(e,t,n,r,i,o){var a="width"===t?1:0,s=0,u=0;if(n===(r?"border":"content"))return 0;for(;a<4;a+=2)"margin"===n&&(u+=w.css(e,n+oe[a],!0,i)),r?("content"===n&&(u-=w.css(e,"padding"+oe[a],!0,i)),"margin"!==n&&(u-=w.css(e,"border"+oe[a]+"Width",!0,i))):(u+=w.css(e,"padding"+oe[a],!0,i),"padding"!==n?u+=w.css(e,"border"+oe[a]+"Width",!0,i):s+=w.css(e,"border"+oe[a]+"Width",!0,i));return!r&&o>=0&&(u+=Math.max(0,Math.ceil(e["offset"+t[0].toUpperCase()+t.slice(1)]-o-u-s-.5))),u}function et(e,t,n){var r=$e(e),i=Fe(e,t,r),o="border-box"===w.css(e,"boxSizing",!1,r),a=o;if(We.test(i)){if(!n)return i;i="auto"}return a=a&&(h.boxSizingReliable()||i===e.style[t]),("auto"===i||!parseFloat(i)&&"inline"===w.css(e,"display",!1,r))&&(i=e["offset"+t[0].toUpperCase()+t.slice(1)],a=!0),(i=parseFloat(i)||0)+Ze(e,t,n||(o?"border":"content"),a,r,i)+"px"}w.extend({cssHooks:{opacity:{get:function(e,t){if(t){var n=Fe(e,"opacity");return""===n?"1":n}}}},cssNumber:{animationIterationCount:!0,columnCount:!0,fillOpacity:!0,flexGrow:!0,flexShrink:!0,fontWeight:!0,lineHeight:!0,opacity:!0,order:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{},style:function(e,t,n,r){if(e&&3!==e.nodeType&&8!==e.nodeType&&e.style){var i,o,a,s=G(t),u=Xe.test(t),l=e.style;if(u||(t=Je(s)),a=w.cssHooks[t]||w.cssHooks[s],void 0===n)return a&&"get"in a&&void 0!==(i=a.get(e,!1,r))?i:l[t];"string"==(o=typeof n)&&(i=ie.exec(n))&&i[1]&&(n=ue(e,t,i),o="number"),null!=n&&n===n&&("number"===o&&(n+=i&&i[3]||(w.cssNumber[s]?"":"px")),h.clearCloneStyle||""!==n||0!==t.indexOf("background")||(l[t]="inherit"),a&&"set"in a&&void 0===(n=a.set(e,n,r))||(u?l.setProperty(t,n):l[t]=n))}},css:function(e,t,n,r){var i,o,a,s=G(t);return Xe.test(t)||(t=Je(s)),(a=w.cssHooks[t]||w.cssHooks[s])&&"get"in a&&(i=a.get(e,!0,n)),void 0===i&&(i=Fe(e,t,r)),"normal"===i&&t in Ve&&(i=Ve[t]),""===n||n?(o=parseFloat(i),!0===n||isFinite(o)?o||0:i):i}}),w.each(["height","width"],function(e,t){w.cssHooks[t]={get:function(e,n,r){if(n)return!ze.test(w.css(e,"display"))||e.getClientRects().length&&e.getBoundingClientRect().width?et(e,t,r):se(e,Ue,function(){return et(e,t,r)})},set:function(e,n,r){var i,o=$e(e),a="border-box"===w.css(e,"boxSizing",!1,o),s=r&&Ze(e,t,r,a,o);return a&&h.scrollboxSize()===o.position&&(s-=Math.ceil(e["offset"+t[0].toUpperCase()+t.slice(1)]-parseFloat(o[t])-Ze(e,t,"border",!1,o)-.5)),s&&(i=ie.exec(n))&&"px"!==(i[3]||"px")&&(e.style[t]=n,n=w.css(e,t)),Ke(e,n,s)}}}),w.cssHooks.marginLeft=_e(h.reliableMarginLeft,function(e,t){if(t)return(parseFloat(Fe(e,"marginLeft"))||e.getBoundingClientRect().left-se(e,{marginLeft:0},function(){return e.getBoundingClientRect().left}))+"px"}),w.each({margin:"",padding:"",border:"Width"},function(e,t){w.cssHooks[e+t]={expand:function(n){for(var r=0,i={},o="string"==typeof n?n.split(" "):[n];r<4;r++)i[e+oe[r]+t]=o[r]||o[r-2]||o[0];return i}},"margin"!==e&&(w.cssHooks[e+t].set=Ke)}),w.fn.extend({css:function(e,t){return z(this,function(e,t,n){var r,i,o={},a=0;if(Array.isArray(t)){for(r=$e(e),i=t.length;a<i;a++)o[t[a]]=w.css(e,t[a],!1,r);return o}return void 0!==n?w.style(e,t,n):w.css(e,t)},e,t,arguments.length>1)}});function tt(e,t,n,r,i){return new tt.prototype.init(e,t,n,r,i)}w.Tween=tt,tt.prototype={constructor:tt,init:function(e,t,n,r,i,o){this.elem=e,this.prop=n,this.easing=i||w.easing._default,this.options=t,this.start=this.now=this.cur(),this.end=r,this.unit=o||(w.cssNumber[n]?"":"px")},cur:function(){var e=tt.propHooks[this.prop];return e&&e.get?e.get(this):tt.propHooks._default.get(this)},run:function(e){var t,n=tt.propHooks[this.prop];return this.options.duration?this.pos=t=w.easing[this.easing](e,this.options.duration*e,0,1,this.options.duration):this.pos=t=e,this.now=(this.end-this.start)*t+this.start,this.options.step&&this.options.step.call(this.elem,this.now,this),n&&n.set?n.set(this):tt.propHooks._default.set(this),this}},tt.prototype.init.prototype=tt.prototype,tt.propHooks={_default:{get:function(e){var t;return 1!==e.elem.nodeType||null!=e.elem[e.prop]&&null==e.elem.style[e.prop]?e.elem[e.prop]:(t=w.css(e.elem,e.prop,""))&&"auto"!==t?t:0},set:function(e){w.fx.step[e.prop]?w.fx.step[e.prop](e):1!==e.elem.nodeType||null==e.elem.style[w.cssProps[e.prop]]&&!w.cssHooks[e.prop]?e.elem[e.prop]=e.now:w.style(e.elem,e.prop,e.now+e.unit)}}},tt.propHooks.scrollTop=tt.propHooks.scrollLeft={set:function(e){e.elem.nodeType&&e.elem.parentNode&&(e.elem[e.prop]=e.now)}},w.easing={linear:function(e){return e},swing:function(e){return.5-Math.cos(e*Math.PI)/2},_default:"swing"},w.fx=tt.prototype.init,w.fx.step={};var nt,rt,it=/^(?:toggle|show|hide)$/,ot=/queueHooks$/;function at(){rt&&(!1===r.hidden&&e.requestAnimationFrame?e.requestAnimationFrame(at):e.setTimeout(at,w.fx.interval),w.fx.tick())}function st(){return e.setTimeout(function(){nt=void 0}),nt=Date.now()}function ut(e,t){var n,r=0,i={height:e};for(t=t?1:0;r<4;r+=2-t)i["margin"+(n=oe[r])]=i["padding"+n]=e;return t&&(i.opacity=i.width=e),i}function lt(e,t,n){for(var r,i=(pt.tweeners[t]||[]).concat(pt.tweeners["*"]),o=0,a=i.length;o<a;o++)if(r=i[o].call(n,t,e))return r}function ct(e,t,n){var r,i,o,a,s,u,l,c,f="width"in t||"height"in t,p=this,d={},h=e.style,g=e.nodeType&&ae(e),y=J.get(e,"fxshow");n.queue||(null==(a=w._queueHooks(e,"fx")).unqueued&&(a.unqueued=0,s=a.empty.fire,a.empty.fire=function(){a.unqueued||s()}),a.unqueued++,p.always(function(){p.always(function(){a.unqueued--,w.queue(e,"fx").length||a.empty.fire()})}));for(r in t)if(i=t[r],it.test(i)){if(delete t[r],o=o||"toggle"===i,i===(g?"hide":"show")){if("show"!==i||!y||void 0===y[r])continue;g=!0}d[r]=y&&y[r]||w.style(e,r)}if((u=!w.isEmptyObject(t))||!w.isEmptyObject(d)){f&&1===e.nodeType&&(n.overflow=[h.overflow,h.overflowX,h.overflowY],null==(l=y&&y.display)&&(l=J.get(e,"display")),"none"===(c=w.css(e,"display"))&&(l?c=l:(fe([e],!0),l=e.style.display||l,c=w.css(e,"display"),fe([e]))),("inline"===c||"inline-block"===c&&null!=l)&&"none"===w.css(e,"float")&&(u||(p.done(function(){h.display=l}),null==l&&(c=h.display,l="none"===c?"":c)),h.display="inline-block")),n.overflow&&(h.overflow="hidden",p.always(function(){h.overflow=n.overflow[0],h.overflowX=n.overflow[1],h.overflowY=n.overflow[2]})),u=!1;for(r in d)u||(y?"hidden"in y&&(g=y.hidden):y=J.access(e,"fxshow",{display:l}),o&&(y.hidden=!g),g&&fe([e],!0),p.done(function(){g||fe([e]),J.remove(e,"fxshow");for(r in d)w.style(e,r,d[r])})),u=lt(g?y[r]:0,r,p),r in y||(y[r]=u.start,g&&(u.end=u.start,u.start=0))}}function ft(e,t){var n,r,i,o,a;for(n in e)if(r=G(n),i=t[r],o=e[n],Array.isArray(o)&&(i=o[1],o=e[n]=o[0]),n!==r&&(e[r]=o,delete e[n]),(a=w.cssHooks[r])&&"expand"in a){o=a.expand(o),delete e[r];for(n in o)n in e||(e[n]=o[n],t[n]=i)}else t[r]=i}function pt(e,t,n){var r,i,o=0,a=pt.prefilters.length,s=w.Deferred().always(function(){delete u.elem}),u=function(){if(i)return!1;for(var t=nt||st(),n=Math.max(0,l.startTime+l.duration-t),r=1-(n/l.duration||0),o=0,a=l.tweens.length;o<a;o++)l.tweens[o].run(r);return s.notifyWith(e,[l,r,n]),r<1&&a?n:(a||s.notifyWith(e,[l,1,0]),s.resolveWith(e,[l]),!1)},l=s.promise({elem:e,props:w.extend({},t),opts:w.extend(!0,{specialEasing:{},easing:w.easing._default},n),originalProperties:t,originalOptions:n,startTime:nt||st(),duration:n.duration,tweens:[],createTween:function(t,n){var r=w.Tween(e,l.opts,t,n,l.opts.specialEasing[t]||l.opts.easing);return l.tweens.push(r),r},stop:function(t){var n=0,r=t?l.tweens.length:0;if(i)return this;for(i=!0;n<r;n++)l.tweens[n].run(1);return t?(s.notifyWith(e,[l,1,0]),s.resolveWith(e,[l,t])):s.rejectWith(e,[l,t]),this}}),c=l.props;for(ft(c,l.opts.specialEasing);o<a;o++)if(r=pt.prefilters[o].call(l,e,c,l.opts))return g(r.stop)&&(w._queueHooks(l.elem,l.opts.queue).stop=r.stop.bind(r)),r;return w.map(c,lt,l),g(l.opts.start)&&l.opts.start.call(e,l),l.progress(l.opts.progress).done(l.opts.done,l.opts.complete).fail(l.opts.fail).always(l.opts.always),w.fx.timer(w.extend(u,{elem:e,anim:l,queue:l.opts.queue})),l}w.Animation=w.extend(pt,{tweeners:{"*":[function(e,t){var n=this.createTween(e,t);return ue(n.elem,e,ie.exec(t),n),n}]},tweener:function(e,t){g(e)?(t=e,e=["*"]):e=e.match(M);for(var n,r=0,i=e.length;r<i;r++)n=e[r],pt.tweeners[n]=pt.tweeners[n]||[],pt.tweeners[n].unshift(t)},prefilters:[ct],prefilter:function(e,t){t?pt.prefilters.unshift(e):pt.prefilters.push(e)}}),w.speed=function(e,t,n){var r=e&&"object"==typeof e?w.extend({},e):{complete:n||!n&&t||g(e)&&e,duration:e,easing:n&&t||t&&!g(t)&&t};return w.fx.off?r.duration=0:"number"!=typeof r.duration&&(r.duration in w.fx.speeds?r.duration=w.fx.speeds[r.duration]:r.duration=w.fx.speeds._default),null!=r.queue&&!0!==r.queue||(r.queue="fx"),r.old=r.complete,r.complete=function(){g(r.old)&&r.old.call(this),r.queue&&w.dequeue(this,r.queue)},r},w.fn.extend({fadeTo:function(e,t,n,r){return this.filter(ae).css("opacity",0).show().end().animate({opacity:t},e,n,r)},animate:function(e,t,n,r){var i=w.isEmptyObject(e),o=w.speed(t,n,r),a=function(){var t=pt(this,w.extend({},e),o);(i||J.get(this,"finish"))&&t.stop(!0)};return a.finish=a,i||!1===o.queue?this.each(a):this.queue(o.queue,a)},stop:function(e,t,n){var r=function(e){var t=e.stop;delete e.stop,t(n)};return"string"!=typeof e&&(n=t,t=e,e=void 0),t&&!1!==e&&this.queue(e||"fx",[]),this.each(function(){var t=!0,i=null!=e&&e+"queueHooks",o=w.timers,a=J.get(this);if(i)a[i]&&a[i].stop&&r(a[i]);else for(i in a)a[i]&&a[i].stop&&ot.test(i)&&r(a[i]);for(i=o.length;i--;)o[i].elem!==this||null!=e&&o[i].queue!==e||(o[i].anim.stop(n),t=!1,o.splice(i,1));!t&&n||w.dequeue(this,e)})},finish:function(e){return!1!==e&&(e=e||"fx"),this.each(function(){var t,n=J.get(this),r=n[e+"queue"],i=n[e+"queueHooks"],o=w.timers,a=r?r.length:0;for(n.finish=!0,w.queue(this,e,[]),i&&i.stop&&i.stop.call(this,!0),t=o.length;t--;)o[t].elem===this&&o[t].queue===e&&(o[t].anim.stop(!0),o.splice(t,1));for(t=0;t<a;t++)r[t]&&r[t].finish&&r[t].finish.call(this);delete n.finish})}}),w.each(["toggle","show","hide"],function(e,t){var n=w.fn[t];w.fn[t]=function(e,r,i){return null==e||"boolean"==typeof e?n.apply(this,arguments):this.animate(ut(t,!0),e,r,i)}}),w.each({slideDown:ut("show"),slideUp:ut("hide"),slideToggle:ut("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(e,t){w.fn[e]=function(e,n,r){return this.animate(t,e,n,r)}}),w.timers=[],w.fx.tick=function(){var e,t=0,n=w.timers;for(nt=Date.now();t<n.length;t++)(e=n[t])()||n[t]!==e||n.splice(t--,1);n.length||w.fx.stop(),nt=void 0},w.fx.timer=function(e){w.timers.push(e),w.fx.start()},w.fx.interval=13,w.fx.start=function(){rt||(rt=!0,at())},w.fx.stop=function(){rt=null},w.fx.speeds={slow:600,fast:200,_default:400},w.fn.delay=function(t,n){return t=w.fx?w.fx.speeds[t]||t:t,n=n||"fx",this.queue(n,function(n,r){var i=e.setTimeout(n,t);r.stop=function(){e.clearTimeout(i)}})},function(){var e=r.createElement("input"),t=r.createElement("select").appendChild(r.createElement("option"));e.type="checkbox",h.checkOn=""!==e.value,h.optSelected=t.selected,(e=r.createElement("input")).value="t",e.type="radio",h.radioValue="t"===e.value}();var dt,ht=w.expr.attrHandle;w.fn.extend({attr:function(e,t){return z(this,w.attr,e,t,arguments.length>1)},removeAttr:function(e){return this.each(function(){w.removeAttr(this,e)})}}),w.extend({attr:function(e,t,n){var r,i,o=e.nodeType;if(3!==o&&8!==o&&2!==o)return"undefined"==typeof e.getAttribute?w.prop(e,t,n):(1===o&&w.isXMLDoc(e)||(i=w.attrHooks[t.toLowerCase()]||(w.expr.match.bool.test(t)?dt:void 0)),void 0!==n?null===n?void w.removeAttr(e,t):i&&"set"in i&&void 0!==(r=i.set(e,n,t))?r:(e.setAttribute(t,n+""),n):i&&"get"in i&&null!==(r=i.get(e,t))?r:null==(r=w.find.attr(e,t))?void 0:r)},attrHooks:{type:{set:function(e,t){if(!h.radioValue&&"radio"===t&&N(e,"input")){var n=e.value;return e.setAttribute("type",t),n&&(e.value=n),t}}}},removeAttr:function(e,t){var n,r=0,i=t&&t.match(M);if(i&&1===e.nodeType)while(n=i[r++])e.removeAttribute(n)}}),dt={set:function(e,t,n){return!1===t?w.removeAttr(e,n):e.setAttribute(n,n),n}},w.each(w.expr.match.bool.source.match(/\w+/g),function(e,t){var n=ht[t]||w.find.attr;ht[t]=function(e,t,r){var i,o,a=t.toLowerCase();return r||(o=ht[a],ht[a]=i,i=null!=n(e,t,r)?a:null,ht[a]=o),i}});var gt=/^(?:input|select|textarea|button)$/i,yt=/^(?:a|area)$/i;w.fn.extend({prop:function(e,t){return z(this,w.prop,e,t,arguments.length>1)},removeProp:function(e){return this.each(function(){delete this[w.propFix[e]||e]})}}),w.extend({prop:function(e,t,n){var r,i,o=e.nodeType;if(3!==o&&8!==o&&2!==o)return 1===o&&w.isXMLDoc(e)||(t=w.propFix[t]||t,i=w.propHooks[t]),void 0!==n?i&&"set"in i&&void 0!==(r=i.set(e,n,t))?r:e[t]=n:i&&"get"in i&&null!==(r=i.get(e,t))?r:e[t]},propHooks:{tabIndex:{get:function(e){var t=w.find.attr(e,"tabindex");return t?parseInt(t,10):gt.test(e.nodeName)||yt.test(e.nodeName)&&e.href?0:-1}}},propFix:{"for":"htmlFor","class":"className"}}),h.optSelected||(w.propHooks.selected={get:function(e){var t=e.parentNode;return t&&t.parentNode&&t.parentNode.selectedIndex,null},set:function(e){var t=e.parentNode;t&&(t.selectedIndex,t.parentNode&&t.parentNode.selectedIndex)}}),w.each(["tabIndex","readOnly","maxLength","cellSpacing","cellPadding","rowSpan","colSpan","useMap","frameBorder","contentEditable"],function(){w.propFix[this.toLowerCase()]=this});function vt(e){return(e.match(M)||[]).join(" ")}function mt(e){return e.getAttribute&&e.getAttribute("class")||""}function xt(e){return Array.isArray(e)?e:"string"==typeof e?e.match(M)||[]:[]}w.fn.extend({addClass:function(e){var t,n,r,i,o,a,s,u=0;if(g(e))return this.each(function(t){w(this).addClass(e.call(this,t,mt(this)))});if((t=xt(e)).length)while(n=this[u++])if(i=mt(n),r=1===n.nodeType&&" "+vt(i)+" "){a=0;while(o=t[a++])r.indexOf(" "+o+" ")<0&&(r+=o+" ");i!==(s=vt(r))&&n.setAttribute("class",s)}return this},removeClass:function(e){var t,n,r,i,o,a,s,u=0;if(g(e))return this.each(function(t){w(this).removeClass(e.call(this,t,mt(this)))});if(!arguments.length)return this.attr("class","");if((t=xt(e)).length)while(n=this[u++])if(i=mt(n),r=1===n.nodeType&&" "+vt(i)+" "){a=0;while(o=t[a++])while(r.indexOf(" "+o+" ")>-1)r=r.replace(" "+o+" "," ");i!==(s=vt(r))&&n.setAttribute("class",s)}return this},toggleClass:function(e,t){var n=typeof e,r="string"===n||Array.isArray(e);return"boolean"==typeof t&&r?t?this.addClass(e):this.removeClass(e):g(e)?this.each(function(n){w(this).toggleClass(e.call(this,n,mt(this),t),t)}):this.each(function(){var t,i,o,a;if(r){i=0,o=w(this),a=xt(e);while(t=a[i++])o.hasClass(t)?o.removeClass(t):o.addClass(t)}else void 0!==e&&"boolean"!==n||((t=mt(this))&&J.set(this,"__className__",t),this.setAttribute&&this.setAttribute("class",t||!1===e?"":J.get(this,"__className__")||""))})},hasClass:function(e){var t,n,r=0;t=" "+e+" ";while(n=this[r++])if(1===n.nodeType&&(" "+vt(mt(n))+" ").indexOf(t)>-1)return!0;return!1}});var bt=/\r/g;w.fn.extend({val:function(e){var t,n,r,i=this[0];{if(arguments.length)return r=g(e),this.each(function(n){var i;1===this.nodeType&&(null==(i=r?e.call(this,n,w(this).val()):e)?i="":"number"==typeof i?i+="":Array.isArray(i)&&(i=w.map(i,function(e){return null==e?"":e+""})),(t=w.valHooks[this.type]||w.valHooks[this.nodeName.toLowerCase()])&&"set"in t&&void 0!==t.set(this,i,"value")||(this.value=i))});if(i)return(t=w.valHooks[i.type]||w.valHooks[i.nodeName.toLowerCase()])&&"get"in t&&void 0!==(n=t.get(i,"value"))?n:"string"==typeof(n=i.value)?n.replace(bt,""):null==n?"":n}}}),w.extend({valHooks:{option:{get:function(e){var t=w.find.attr(e,"value");return null!=t?t:vt(w.text(e))}},select:{get:function(e){var t,n,r,i=e.options,o=e.selectedIndex,a="select-one"===e.type,s=a?null:[],u=a?o+1:i.length;for(r=o<0?u:a?o:0;r<u;r++)if(((n=i[r]).selected||r===o)&&!n.disabled&&(!n.parentNode.disabled||!N(n.parentNode,"optgroup"))){if(t=w(n).val(),a)return t;s.push(t)}return s},set:function(e,t){var n,r,i=e.options,o=w.makeArray(t),a=i.length;while(a--)((r=i[a]).selected=w.inArray(w.valHooks.option.get(r),o)>-1)&&(n=!0);return n||(e.selectedIndex=-1),o}}}}),w.each(["radio","checkbox"],function(){w.valHooks[this]={set:function(e,t){if(Array.isArray(t))return e.checked=w.inArray(w(e).val(),t)>-1}},h.checkOn||(w.valHooks[this].get=function(e){return null===e.getAttribute("value")?"on":e.value})}),h.focusin="onfocusin"in e;var wt=/^(?:focusinfocus|focusoutblur)$/,Tt=function(e){e.stopPropagation()};w.extend(w.event,{trigger:function(t,n,i,o){var a,s,u,l,c,p,d,h,v=[i||r],m=f.call(t,"type")?t.type:t,x=f.call(t,"namespace")?t.namespace.split("."):[];if(s=h=u=i=i||r,3!==i.nodeType&&8!==i.nodeType&&!wt.test(m+w.event.triggered)&&(m.indexOf(".")>-1&&(m=(x=m.split(".")).shift(),x.sort()),c=m.indexOf(":")<0&&"on"+m,t=t[w.expando]?t:new w.Event(m,"object"==typeof t&&t),t.isTrigger=o?2:3,t.namespace=x.join("."),t.rnamespace=t.namespace?new RegExp("(^|\\.)"+x.join("\\.(?:.*\\.|)")+"(\\.|$)"):null,t.result=void 0,t.target||(t.target=i),n=null==n?[t]:w.makeArray(n,[t]),d=w.event.special[m]||{},o||!d.trigger||!1!==d.trigger.apply(i,n))){if(!o&&!d.noBubble&&!y(i)){for(l=d.delegateType||m,wt.test(l+m)||(s=s.parentNode);s;s=s.parentNode)v.push(s),u=s;u===(i.ownerDocument||r)&&v.push(u.defaultView||u.parentWindow||e)}a=0;while((s=v[a++])&&!t.isPropagationStopped())h=s,t.type=a>1?l:d.bindType||m,(p=(J.get(s,"events")||{})[t.type]&&J.get(s,"handle"))&&p.apply(s,n),(p=c&&s[c])&&p.apply&&Y(s)&&(t.result=p.apply(s,n),!1===t.result&&t.preventDefault());return t.type=m,o||t.isDefaultPrevented()||d._default&&!1!==d._default.apply(v.pop(),n)||!Y(i)||c&&g(i[m])&&!y(i)&&((u=i[c])&&(i[c]=null),w.event.triggered=m,t.isPropagationStopped()&&h.addEventListener(m,Tt),i[m](),t.isPropagationStopped()&&h.removeEventListener(m,Tt),w.event.triggered=void 0,u&&(i[c]=u)),t.result}},simulate:function(e,t,n){var r=w.extend(new w.Event,n,{type:e,isSimulated:!0});w.event.trigger(r,null,t)}}),w.fn.extend({trigger:function(e,t){return this.each(function(){w.event.trigger(e,t,this)})},triggerHandler:function(e,t){var n=this[0];if(n)return w.event.trigger(e,t,n,!0)}}),h.focusin||w.each({focus:"focusin",blur:"focusout"},function(e,t){var n=function(e){w.event.simulate(t,e.target,w.event.fix(e))};w.event.special[t]={setup:function(){var r=this.ownerDocument||this,i=J.access(r,t);i||r.addEventListener(e,n,!0),J.access(r,t,(i||0)+1)},teardown:function(){var r=this.ownerDocument||this,i=J.access(r,t)-1;i?J.access(r,t,i):(r.removeEventListener(e,n,!0),J.remove(r,t))}}});var Ct=e.location,Et=Date.now(),kt=/\?/;w.parseXML=function(t){var n;if(!t||"string"!=typeof t)return null;try{n=(new e.DOMParser).parseFromString(t,"text/xml")}catch(e){n=void 0}return n&&!n.getElementsByTagName("parsererror").length||w.error("Invalid XML: "+t),n};var St=/\[\]$/,Dt=/\r?\n/g,Nt=/^(?:submit|button|image|reset|file)$/i,At=/^(?:input|select|textarea|keygen)/i;function jt(e,t,n,r){var i;if(Array.isArray(t))w.each(t,function(t,i){n||St.test(e)?r(e,i):jt(e+"["+("object"==typeof i&&null!=i?t:"")+"]",i,n,r)});else if(n||"object"!==x(t))r(e,t);else for(i in t)jt(e+"["+i+"]",t[i],n,r)}w.param=function(e,t){var n,r=[],i=function(e,t){var n=g(t)?t():t;r[r.length]=encodeURIComponent(e)+"="+encodeURIComponent(null==n?"":n)};if(Array.isArray(e)||e.jquery&&!w.isPlainObject(e))w.each(e,function(){i(this.name,this.value)});else for(n in e)jt(n,e[n],t,i);return r.join("&")},w.fn.extend({serialize:function(){return w.param(this.serializeArray())},serializeArray:function(){return this.map(function(){var e=w.prop(this,"elements");return e?w.makeArray(e):this}).filter(function(){var e=this.type;return this.name&&!w(this).is(":disabled")&&At.test(this.nodeName)&&!Nt.test(e)&&(this.checked||!pe.test(e))}).map(function(e,t){var n=w(this).val();return null==n?null:Array.isArray(n)?w.map(n,function(e){return{name:t.name,value:e.replace(Dt,"\r\n")}}):{name:t.name,value:n.replace(Dt,"\r\n")}}).get()}});var qt=/%20/g,Lt=/#.*$/,Ht=/([?&])_=[^&]*/,Ot=/^(.*?):[ \t]*([^\r\n]*)$/gm,Pt=/^(?:about|app|app-storage|.+-extension|file|res|widget):$/,Mt=/^(?:GET|HEAD)$/,Rt=/^\/\//,It={},Wt={},$t="*/".concat("*"),Bt=r.createElement("a");Bt.href=Ct.href;function Ft(e){return function(t,n){"string"!=typeof t&&(n=t,t="*");var r,i=0,o=t.toLowerCase().match(M)||[];if(g(n))while(r=o[i++])"+"===r[0]?(r=r.slice(1)||"*",(e[r]=e[r]||[]).unshift(n)):(e[r]=e[r]||[]).push(n)}}function _t(e,t,n,r){var i={},o=e===Wt;function a(s){var u;return i[s]=!0,w.each(e[s]||[],function(e,s){var l=s(t,n,r);return"string"!=typeof l||o||i[l]?o?!(u=l):void 0:(t.dataTypes.unshift(l),a(l),!1)}),u}return a(t.dataTypes[0])||!i["*"]&&a("*")}function zt(e,t){var n,r,i=w.ajaxSettings.flatOptions||{};for(n in t)void 0!==t[n]&&((i[n]?e:r||(r={}))[n]=t[n]);return r&&w.extend(!0,e,r),e}function Xt(e,t,n){var r,i,o,a,s=e.contents,u=e.dataTypes;while("*"===u[0])u.shift(),void 0===r&&(r=e.mimeType||t.getResponseHeader("Content-Type"));if(r)for(i in s)if(s[i]&&s[i].test(r)){u.unshift(i);break}if(u[0]in n)o=u[0];else{for(i in n){if(!u[0]||e.converters[i+" "+u[0]]){o=i;break}a||(a=i)}o=o||a}if(o)return o!==u[0]&&u.unshift(o),n[o]}function Ut(e,t,n,r){var i,o,a,s,u,l={},c=e.dataTypes.slice();if(c[1])for(a in e.converters)l[a.toLowerCase()]=e.converters[a];o=c.shift();while(o)if(e.responseFields[o]&&(n[e.responseFields[o]]=t),!u&&r&&e.dataFilter&&(t=e.dataFilter(t,e.dataType)),u=o,o=c.shift())if("*"===o)o=u;else if("*"!==u&&u!==o){if(!(a=l[u+" "+o]||l["* "+o]))for(i in l)if((s=i.split(" "))[1]===o&&(a=l[u+" "+s[0]]||l["* "+s[0]])){!0===a?a=l[i]:!0!==l[i]&&(o=s[0],c.unshift(s[1]));break}if(!0!==a)if(a&&e["throws"])t=a(t);else try{t=a(t)}catch(e){return{state:"parsererror",error:a?e:"No conversion from "+u+" to "+o}}}return{state:"success",data:t}}w.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:Ct.href,type:"GET",isLocal:Pt.test(Ct.protocol),global:!0,processData:!0,async:!0,contentType:"application/x-www-form-urlencoded; charset=UTF-8",accepts:{"*":$t,text:"text/plain",html:"text/html",xml:"application/xml, text/xml",json:"application/json, text/javascript"},contents:{xml:/\bxml\b/,html:/\bhtml/,json:/\bjson\b/},responseFields:{xml:"responseXML",text:"responseText",json:"responseJSON"},converters:{"* text":String,"text html":!0,"text json":JSON.parse,"text xml":w.parseXML},flatOptions:{url:!0,context:!0}},ajaxSetup:function(e,t){return t?zt(zt(e,w.ajaxSettings),t):zt(w.ajaxSettings,e)},ajaxPrefilter:Ft(It),ajaxTransport:Ft(Wt),ajax:function(t,n){"object"==typeof t&&(n=t,t=void 0),n=n||{};var i,o,a,s,u,l,c,f,p,d,h=w.ajaxSetup({},n),g=h.context||h,y=h.context&&(g.nodeType||g.jquery)?w(g):w.event,v=w.Deferred(),m=w.Callbacks("once memory"),x=h.statusCode||{},b={},T={},C="canceled",E={readyState:0,getResponseHeader:function(e){var t;if(c){if(!s){s={};while(t=Ot.exec(a))s[t[1].toLowerCase()]=t[2]}t=s[e.toLowerCase()]}return null==t?null:t},getAllResponseHeaders:function(){return c?a:null},setRequestHeader:function(e,t){return null==c&&(e=T[e.toLowerCase()]=T[e.toLowerCase()]||e,b[e]=t),this},overrideMimeType:function(e){return null==c&&(h.mimeType=e),this},statusCode:function(e){var t;if(e)if(c)E.always(e[E.status]);else for(t in e)x[t]=[x[t],e[t]];return this},abort:function(e){var t=e||C;return i&&i.abort(t),k(0,t),this}};if(v.promise(E),h.url=((t||h.url||Ct.href)+"").replace(Rt,Ct.protocol+"//"),h.type=n.method||n.type||h.method||h.type,h.dataTypes=(h.dataType||"*").toLowerCase().match(M)||[""],null==h.crossDomain){l=r.createElement("a");try{l.href=h.url,l.href=l.href,h.crossDomain=Bt.protocol+"//"+Bt.host!=l.protocol+"//"+l.host}catch(e){h.crossDomain=!0}}if(h.data&&h.processData&&"string"!=typeof h.data&&(h.data=w.param(h.data,h.traditional)),_t(It,h,n,E),c)return E;(f=w.event&&h.global)&&0==w.active++&&w.event.trigger("ajaxStart"),h.type=h.type.toUpperCase(),h.hasContent=!Mt.test(h.type),o=h.url.replace(Lt,""),h.hasContent?h.data&&h.processData&&0===(h.contentType||"").indexOf("application/x-www-form-urlencoded")&&(h.data=h.data.replace(qt,"+")):(d=h.url.slice(o.length),h.data&&(h.processData||"string"==typeof h.data)&&(o+=(kt.test(o)?"&":"?")+h.data,delete h.data),!1===h.cache&&(o=o.replace(Ht,"$1"),d=(kt.test(o)?"&":"?")+"_="+Et+++d),h.url=o+d),h.ifModified&&(w.lastModified[o]&&E.setRequestHeader("If-Modified-Since",w.lastModified[o]),w.etag[o]&&E.setRequestHeader("If-None-Match",w.etag[o])),(h.data&&h.hasContent&&!1!==h.contentType||n.contentType)&&E.setRequestHeader("Content-Type",h.contentType),E.setRequestHeader("Accept",h.dataTypes[0]&&h.accepts[h.dataTypes[0]]?h.accepts[h.dataTypes[0]]+("*"!==h.dataTypes[0]?", "+$t+"; q=0.01":""):h.accepts["*"]);for(p in h.headers)E.setRequestHeader(p,h.headers[p]);if(h.beforeSend&&(!1===h.beforeSend.call(g,E,h)||c))return E.abort();if(C="abort",m.add(h.complete),E.done(h.success),E.fail(h.error),i=_t(Wt,h,n,E)){if(E.readyState=1,f&&y.trigger("ajaxSend",[E,h]),c)return E;h.async&&h.timeout>0&&(u=e.setTimeout(function(){E.abort("timeout")},h.timeout));try{c=!1,i.send(b,k)}catch(e){if(c)throw e;k(-1,e)}}else k(-1,"No Transport");function k(t,n,r,s){var l,p,d,b,T,C=n;c||(c=!0,u&&e.clearTimeout(u),i=void 0,a=s||"",E.readyState=t>0?4:0,l=t>=200&&t<300||304===t,r&&(b=Xt(h,E,r)),b=Ut(h,b,E,l),l?(h.ifModified&&((T=E.getResponseHeader("Last-Modified"))&&(w.lastModified[o]=T),(T=E.getResponseHeader("etag"))&&(w.etag[o]=T)),204===t||"HEAD"===h.type?C="nocontent":304===t?C="notmodified":(C=b.state,p=b.data,l=!(d=b.error))):(d=C,!t&&C||(C="error",t<0&&(t=0))),E.status=t,E.statusText=(n||C)+"",l?v.resolveWith(g,[p,C,E]):v.rejectWith(g,[E,C,d]),E.statusCode(x),x=void 0,f&&y.trigger(l?"ajaxSuccess":"ajaxError",[E,h,l?p:d]),m.fireWith(g,[E,C]),f&&(y.trigger("ajaxComplete",[E,h]),--w.active||w.event.trigger("ajaxStop")))}return E},getJSON:function(e,t,n){return w.get(e,t,n,"json")},getScript:function(e,t){return w.get(e,void 0,t,"script")}}),w.each(["get","post"],function(e,t){w[t]=function(e,n,r,i){return g(n)&&(i=i||r,r=n,n=void 0),w.ajax(w.extend({url:e,type:t,dataType:i,data:n,success:r},w.isPlainObject(e)&&e))}}),w._evalUrl=function(e){return w.ajax({url:e,type:"GET",dataType:"script",cache:!0,async:!1,global:!1,"throws":!0})},w.fn.extend({wrapAll:function(e){var t;return this[0]&&(g(e)&&(e=e.call(this[0])),t=w(e,this[0].ownerDocument).eq(0).clone(!0),this[0].parentNode&&t.insertBefore(this[0]),t.map(function(){var e=this;while(e.firstElementChild)e=e.firstElementChild;return e}).append(this)),this},wrapInner:function(e){return g(e)?this.each(function(t){w(this).wrapInner(e.call(this,t))}):this.each(function(){var t=w(this),n=t.contents();n.length?n.wrapAll(e):t.append(e)})},wrap:function(e){var t=g(e);return this.each(function(n){w(this).wrapAll(t?e.call(this,n):e)})},unwrap:function(e){return this.parent(e).not("body").each(function(){w(this).replaceWith(this.childNodes)}),this}}),w.expr.pseudos.hidden=function(e){return!w.expr.pseudos.visible(e)},w.expr.pseudos.visible=function(e){return!!(e.offsetWidth||e.offsetHeight||e.getClientRects().length)},w.ajaxSettings.xhr=function(){try{return new e.XMLHttpRequest}catch(e){}};var Vt={0:200,1223:204},Gt=w.ajaxSettings.xhr();h.cors=!!Gt&&"withCredentials"in Gt,h.ajax=Gt=!!Gt,w.ajaxTransport(function(t){var n,r;if(h.cors||Gt&&!t.crossDomain)return{send:function(i,o){var a,s=t.xhr();if(s.open(t.type,t.url,t.async,t.username,t.password),t.xhrFields)for(a in t.xhrFields)s[a]=t.xhrFields[a];t.mimeType&&s.overrideMimeType&&s.overrideMimeType(t.mimeType),t.crossDomain||i["X-Requested-With"]||(i["X-Requested-With"]="XMLHttpRequest");for(a in i)s.setRequestHeader(a,i[a]);n=function(e){return function(){n&&(n=r=s.onload=s.onerror=s.onabort=s.ontimeout=s.onreadystatechange=null,"abort"===e?s.abort():"error"===e?"number"!=typeof s.status?o(0,"error"):o(s.status,s.statusText):o(Vt[s.status]||s.status,s.statusText,"text"!==(s.responseType||"text")||"string"!=typeof s.responseText?{binary:s.response}:{text:s.responseText},s.getAllResponseHeaders()))}},s.onload=n(),r=s.onerror=s.ontimeout=n("error"),void 0!==s.onabort?s.onabort=r:s.onreadystatechange=function(){4===s.readyState&&e.setTimeout(function(){n&&r()})},n=n("abort");try{s.send(t.hasContent&&t.data||null)}catch(e){if(n)throw e}},abort:function(){n&&n()}}}),w.ajaxPrefilter(function(e){e.crossDomain&&(e.contents.script=!1)}),w.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/\b(?:java|ecma)script\b/},converters:{"text script":function(e){return w.globalEval(e),e}}}),w.ajaxPrefilter("script",function(e){void 0===e.cache&&(e.cache=!1),e.crossDomain&&(e.type="GET")}),w.ajaxTransport("script",function(e){if(e.crossDomain){var t,n;return{send:function(i,o){t=w("<script>").prop({charset:e.scriptCharset,src:e.url}).on("load error",n=function(e){t.remove(),n=null,e&&o("error"===e.type?404:200,e.type)}),r.head.appendChild(t[0])},abort:function(){n&&n()}}}});var Yt=[],Qt=/(=)\?(?=&|$)|\?\?/;w.ajaxSetup({jsonp:"callback",jsonpCallback:function(){var e=Yt.pop()||w.expando+"_"+Et++;return this[e]=!0,e}}),w.ajaxPrefilter("json jsonp",function(t,n,r){var i,o,a,s=!1!==t.jsonp&&(Qt.test(t.url)?"url":"string"==typeof t.data&&0===(t.contentType||"").indexOf("application/x-www-form-urlencoded")&&Qt.test(t.data)&&"data");if(s||"jsonp"===t.dataTypes[0])return i=t.jsonpCallback=g(t.jsonpCallback)?t.jsonpCallback():t.jsonpCallback,s?t[s]=t[s].replace(Qt,"$1"+i):!1!==t.jsonp&&(t.url+=(kt.test(t.url)?"&":"?")+t.jsonp+"="+i),t.converters["script json"]=function(){return a||w.error(i+" was not called"),a[0]},t.dataTypes[0]="json",o=e[i],e[i]=function(){a=arguments},r.always(function(){void 0===o?w(e).removeProp(i):e[i]=o,t[i]&&(t.jsonpCallback=n.jsonpCallback,Yt.push(i)),a&&g(o)&&o(a[0]),a=o=void 0}),"script"}),h.createHTMLDocument=function(){var e=r.implementation.createHTMLDocument("").body;return e.innerHTML="<form></form><form></form>",2===e.childNodes.length}(),w.parseHTML=function(e,t,n){if("string"!=typeof e)return[];"boolean"==typeof t&&(n=t,t=!1);var i,o,a;return t||(h.createHTMLDocument?((i=(t=r.implementation.createHTMLDocument("")).createElement("base")).href=r.location.href,t.head.appendChild(i)):t=r),o=A.exec(e),a=!n&&[],o?[t.createElement(o[1])]:(o=xe([e],t,a),a&&a.length&&w(a).remove(),w.merge([],o.childNodes))},w.fn.load=function(e,t,n){var r,i,o,a=this,s=e.indexOf(" ");return s>-1&&(r=vt(e.slice(s)),e=e.slice(0,s)),g(t)?(n=t,t=void 0):t&&"object"==typeof t&&(i="POST"),a.length>0&&w.ajax({url:e,type:i||"GET",dataType:"html",data:t}).done(function(e){o=arguments,a.html(r?w("<div>").append(w.parseHTML(e)).find(r):e)}).always(n&&function(e,t){a.each(function(){n.apply(this,o||[e.responseText,t,e])})}),this},w.each(["ajaxStart","ajaxStop","ajaxComplete","ajaxError","ajaxSuccess","ajaxSend"],function(e,t){w.fn[t]=function(e){return this.on(t,e)}}),w.expr.pseudos.animated=function(e){return w.grep(w.timers,function(t){return e===t.elem}).length},w.offset={setOffset:function(e,t,n){var r,i,o,a,s,u,l,c=w.css(e,"position"),f=w(e),p={};"static"===c&&(e.style.position="relative"),s=f.offset(),o=w.css(e,"top"),u=w.css(e,"left"),(l=("absolute"===c||"fixed"===c)&&(o+u).indexOf("auto")>-1)?(a=(r=f.position()).top,i=r.left):(a=parseFloat(o)||0,i=parseFloat(u)||0),g(t)&&(t=t.call(e,n,w.extend({},s))),null!=t.top&&(p.top=t.top-s.top+a),null!=t.left&&(p.left=t.left-s.left+i),"using"in t?t.using.call(e,p):f.css(p)}},w.fn.extend({offset:function(e){if(arguments.length)return void 0===e?this:this.each(function(t){w.offset.setOffset(this,e,t)});var t,n,r=this[0];if(r)return r.getClientRects().length?(t=r.getBoundingClientRect(),n=r.ownerDocument.defaultView,{top:t.top+n.pageYOffset,left:t.left+n.pageXOffset}):{top:0,left:0}},position:function(){if(this[0]){var e,t,n,r=this[0],i={top:0,left:0};if("fixed"===w.css(r,"position"))t=r.getBoundingClientRect();else{t=this.offset(),n=r.ownerDocument,e=r.offsetParent||n.documentElement;while(e&&(e===n.body||e===n.documentElement)&&"static"===w.css(e,"position"))e=e.parentNode;e&&e!==r&&1===e.nodeType&&((i=w(e).offset()).top+=w.css(e,"borderTopWidth",!0),i.left+=w.css(e,"borderLeftWidth",!0))}return{top:t.top-i.top-w.css(r,"marginTop",!0),left:t.left-i.left-w.css(r,"marginLeft",!0)}}},offsetParent:function(){return this.map(function(){var e=this.offsetParent;while(e&&"static"===w.css(e,"position"))e=e.offsetParent;return e||be})}}),w.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(e,t){var n="pageYOffset"===t;w.fn[e]=function(r){return z(this,function(e,r,i){var o;if(y(e)?o=e:9===e.nodeType&&(o=e.defaultView),void 0===i)return o?o[t]:e[r];o?o.scrollTo(n?o.pageXOffset:i,n?i:o.pageYOffset):e[r]=i},e,r,arguments.length)}}),w.each(["top","left"],function(e,t){w.cssHooks[t]=_e(h.pixelPosition,function(e,n){if(n)return n=Fe(e,t),We.test(n)?w(e).position()[t]+"px":n})}),w.each({Height:"height",Width:"width"},function(e,t){w.each({padding:"inner"+e,content:t,"":"outer"+e},function(n,r){w.fn[r]=function(i,o){var a=arguments.length&&(n||"boolean"!=typeof i),s=n||(!0===i||!0===o?"margin":"border");return z(this,function(t,n,i){var o;return y(t)?0===r.indexOf("outer")?t["inner"+e]:t.document.documentElement["client"+e]:9===t.nodeType?(o=t.documentElement,Math.max(t.body["scroll"+e],o["scroll"+e],t.body["offset"+e],o["offset"+e],o["client"+e])):void 0===i?w.css(t,n,s):w.style(t,n,i,s)},t,a?i:void 0,a)}})}),w.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "),function(e,t){w.fn[t]=function(e,n){return arguments.length>0?this.on(t,null,e,n):this.trigger(t)}}),w.fn.extend({hover:function(e,t){return this.mouseenter(e).mouseleave(t||e)}}),w.fn.extend({bind:function(e,t,n){return this.on(e,null,t,n)},unbind:function(e,t){return this.off(e,null,t)},delegate:function(e,t,n,r){return this.on(t,e,n,r)},undelegate:function(e,t,n){return 1===arguments.length?this.off(e,"**"):this.off(t,e||"**",n)}}),w.proxy=function(e,t){var n,r,i;if("string"==typeof t&&(n=e[t],t=e,e=n),g(e))return r=o.call(arguments,2),i=function(){return e.apply(t||this,r.concat(o.call(arguments)))},i.guid=e.guid=e.guid||w.guid++,i},w.holdReady=function(e){e?w.readyWait++:w.ready(!0)},w.isArray=Array.isArray,w.parseJSON=JSON.parse,w.nodeName=N,w.isFunction=g,w.isWindow=y,w.camelCase=G,w.type=x,w.now=Date.now,w.isNumeric=function(e){var t=w.type(e);return("number"===t||"string"===t)&&!isNaN(e-parseFloat(e))},"function"==typeof define&&define.amd&&define("jquery",[],function(){return w});var Jt=e.jQuery,Kt=e.$;return w.noConflict=function(t){return e.$===w&&(e.$=Kt),t&&e.jQuery===w&&(e.jQuery=Jt),w},t||(e.jQuery=e.$=w),w});

(function(factory) {
	if (typeof define === 'function' && define.amd) {
		define(['jquery'], factory);
	} else if (typeof module === 'object' && typeof module.exports === 'object') {
		module.exports = factory(require('jquery'));
	} else {
		factory(jQuery);
	}
}(function(jQuery) {

/*! TableSorter (FORK) v2.29.5 *//*
* Client-side table sorting with ease!
* @requires jQuery v1.2.6+
*
* Copyright (c) 2007 Christian Bach
* fork maintained by Rob Garrison
*
* Examples and original docs at: http://tablesorter.com
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*
* @type jQuery
* @name tablesorter (FORK)
* @cat Plugins/Tablesorter
* @author Christian Bach - christian.bach@polyester.se
* @contributor Rob Garrison - https://github.com/Mottie/tablesorter
* @docs (fork) - https://mottie.github.io/tablesorter/docs/
*/
/*jshint browser:true, jquery:true, unused:false, expr: true */
;( function( $ ) {
	'use strict';
	var ts = $.tablesorter = {

		version : '2.29.5',

		parsers : [],
		widgets : [],
		defaults : {

			// *** appearance
			theme            : 'default',  // adds tablesorter-{theme} to the table for styling
			widthFixed       : false,      // adds colgroup to fix widths of columns
			showProcessing   : false,      // show an indeterminate timer icon in the header when the table is sorted or filtered.

			headerTemplate   : '{content}',// header layout template (HTML ok); {content} = innerHTML, {icon} = <i/> // class from cssIcon
			onRenderTemplate : null,       // function( index, template ){ return template; }, // template is a string
			onRenderHeader   : null,       // function( index ){}, // nothing to return

			// *** functionality
			cancelSelection  : true,       // prevent text selection in the header
			tabIndex         : true,       // add tabindex to header for keyboard accessibility
			dateFormat       : 'mmddyyyy', // other options: 'ddmmyyy' or 'yyyymmdd'
			sortMultiSortKey : 'shiftKey', // key used to select additional columns
			sortResetKey     : 'ctrlKey',  // key used to remove sorting on a column
			usNumberFormat   : true,       // false for German '1.234.567,89' or French '1 234 567,89'
			delayInit        : false,      // if false, the parsed table contents will not update until the first sort
			serverSideSorting: false,      // if true, server-side sorting should be performed because client-side sorting will be disabled, but the ui and events will still be used.
			resort           : true,       // default setting to trigger a resort after an 'update', 'addRows', 'updateCell', etc has completed

			// *** sort options
			headers          : {},         // set sorter, string, empty, locked order, sortInitialOrder, filter, etc.
			ignoreCase       : true,       // ignore case while sorting
			sortForce        : null,       // column(s) first sorted; always applied
			sortList         : [],         // Initial sort order; applied initially; updated when manually sorted
			sortAppend       : null,       // column(s) sorted last; always applied
			sortStable       : false,      // when sorting two rows with exactly the same content, the original sort order is maintained

			sortInitialOrder : 'asc',      // sort direction on first click
			sortLocaleCompare: false,      // replace equivalent character (accented characters)
			sortReset        : false,      // third click on the header will reset column to default - unsorted
			sortRestart      : false,      // restart sort to 'sortInitialOrder' when clicking on previously unsorted columns

			emptyTo          : 'bottom',   // sort empty cell to bottom, top, none, zero, emptyMax, emptyMin
			stringTo         : 'max',      // sort strings in numerical column as max, min, top, bottom, zero
			duplicateSpan    : true,       // colspan cells in the tbody will have duplicated content in the cache for each spanned column
			textExtraction   : 'basic',    // text extraction method/function - function( node, table, cellIndex ){}
			textAttribute    : 'data-text',// data-attribute that contains alternate cell text (used in default textExtraction function)
			textSorter       : null,       // choose overall or specific column sorter function( a, b, direction, table, columnIndex ) [alt: ts.sortText]
			numberSorter     : null,       // choose overall numeric sorter function( a, b, direction, maxColumnValue )

			// *** widget options
			initWidgets      : true,       // apply widgets on tablesorter initialization
			widgetClass      : 'widget-{name}', // table class name template to match to include a widget
			widgets          : [],         // method to add widgets, e.g. widgets: ['zebra']
			widgetOptions    : {
				zebra : [ 'even', 'odd' ]  // zebra widget alternating row class names
			},

			// *** callbacks
			initialized      : null,       // function( table ){},

			// *** extra css class names
			tableClass       : '',
			cssAsc           : '',
			cssDesc          : '',
			cssNone          : '',
			cssHeader        : '',
			cssHeaderRow     : '',
			cssProcessing    : '', // processing icon applied to header during sort/filter

			cssChildRow      : 'tablesorter-childRow', // class name indiciating that a row is to be attached to its parent
			cssInfoBlock     : 'tablesorter-infoOnly', // don't sort tbody with this class name (only one class name allowed here!)
			cssNoSort        : 'tablesorter-noSort',   // class name added to element inside header; clicking on it won't cause a sort
			cssIgnoreRow     : 'tablesorter-ignoreRow',// header row to ignore; cells within this row will not be added to c.$headers

			cssIcon          : 'tablesorter-icon', // if this class does not exist, the {icon} will not be added from the headerTemplate
			cssIconNone      : '', // class name added to the icon when there is no column sort
			cssIconAsc       : '', // class name added to the icon when the column has an ascending sort
			cssIconDesc      : '', // class name added to the icon when the column has a descending sort
			cssIconDisabled  : '', // class name added to the icon when the column has a disabled sort

			// *** events
			pointerClick     : 'click',
			pointerDown      : 'mousedown',
			pointerUp        : 'mouseup',

			// *** selectors
			selectorHeaders  : '> thead th, > thead td',
			selectorSort     : 'th, td', // jQuery selector of content within selectorHeaders that is clickable to trigger a sort
			selectorRemove   : '.remove-me',

			// *** advanced
			debug            : false,

			// *** Internal variables
			headerList: [],
			empties: {},
			strings: {},
			parsers: [],

			// *** parser options for validator; values must be falsy!
			globalize: 0,
			imgAttr: 0

			// removed: widgetZebra: { css: ['even', 'odd'] }

		},

		// internal css classes - these will ALWAYS be added to
		// the table and MUST only contain one class name - fixes #381
		css : {
			table      : 'tablesorter',
			cssHasChild: 'tablesorter-hasChildRow',
			childRow   : 'tablesorter-childRow',
			colgroup   : 'tablesorter-colgroup',
			header     : 'tablesorter-header',
			headerRow  : 'tablesorter-headerRow',
			headerIn   : 'tablesorter-header-inner',
			icon       : 'tablesorter-icon',
			processing : 'tablesorter-processing',
			sortAsc    : 'tablesorter-headerAsc',
			sortDesc   : 'tablesorter-headerDesc',
			sortNone   : 'tablesorter-headerUnSorted'
		},

		// labels applied to sortable headers for accessibility (aria) support
		language : {
			sortAsc      : 'Ascending sort applied, ',
			sortDesc     : 'Descending sort applied, ',
			sortNone     : 'No sort applied, ',
			sortDisabled : 'sorting is disabled',
			nextAsc      : 'activate to apply an ascending sort',
			nextDesc     : 'activate to apply a descending sort',
			nextNone     : 'activate to remove the sort'
		},

		regex : {
			templateContent : /\{content\}/g,
			templateIcon    : /\{icon\}/g,
			templateName    : /\{name\}/i,
			spaces          : /\s+/g,
			nonWord         : /\W/g,
			formElements    : /(input|select|button|textarea)/i,

			// *** sort functions ***
			// regex used in natural sort
			// chunk/tokenize numbers & letters
			chunk  : /(^([+\-]?(?:\d*)(?:\.\d*)?(?:[eE][+\-]?\d+)?)?$|^0x[0-9a-f]+$|\d+)/gi,
			// replace chunks @ ends
			chunks : /(^\\0|\\0$)/,
			hex    : /^0x[0-9a-f]+$/i,

			// *** formatFloat ***
			comma                : /,/g,
			digitNonUS           : /[\s|\.]/g,
			digitNegativeTest    : /^\s*\([.\d]+\)/,
			digitNegativeReplace : /^\s*\(([.\d]+)\)/,

			// *** isDigit ***
			digitTest    : /^[\-+(]?\d+[)]?$/,
			digitReplace : /[,.'"\s]/g

		},

		// digit sort, text location
		string : {
			max      : 1,
			min      : -1,
			emptymin : 1,
			emptymax : -1,
			zero     : 0,
			none     : 0,
			'null'   : 0,
			top      : true,
			bottom   : false
		},

		keyCodes : {
			enter : 13
		},

		// placeholder date parser data (globalize)
		dates : {},

		// These methods can be applied on table.config instance
		instanceMethods : {},

		/*
		▄█████ ██████ ██████ ██  ██ █████▄
		▀█▄    ██▄▄     ██   ██  ██ ██▄▄██
		   ▀█▄ ██▀▀     ██   ██  ██ ██▀▀▀
		█████▀ ██████   ██   ▀████▀ ██
		*/

		setup : function( table, c ) {
			// if no thead or tbody, or tablesorter is already present, quit
			if ( !table || !table.tHead || table.tBodies.length === 0 || table.hasInitialized === true ) {
				if ( c.debug ) {
					if ( table.hasInitialized ) {
						console.warn( 'Stopping initialization. Tablesorter has already been initialized' );
					} else {
						console.error( 'Stopping initialization! No table, thead or tbody', table );
					}
				}
				return;
			}

			var tmp = '',
				$table = $( table ),
				meta = $.metadata;
			// initialization flag
			table.hasInitialized = false;
			// table is being processed flag
			table.isProcessing = true;
			// make sure to store the config object
			table.config = c;
			// save the settings where they read
			$.data( table, 'tablesorter', c );
			if ( c.debug ) {
				console[ console.group ? 'group' : 'log' ]( 'Initializing tablesorter v' + ts.version );
				$.data( table, 'startoveralltimer', new Date() );
			}

			// removing this in version 3 (only supports jQuery 1.7+)
			c.supportsDataObject = ( function( version ) {
				version[ 0 ] = parseInt( version[ 0 ], 10 );
				return ( version[ 0 ] > 1 ) || ( version[ 0 ] === 1 && parseInt( version[ 1 ], 10 ) >= 4 );
			})( $.fn.jquery.split( '.' ) );
			// ensure case insensitivity
			c.emptyTo = c.emptyTo.toLowerCase();
			c.stringTo = c.stringTo.toLowerCase();
			c.last = { sortList : [], clickedIndex : -1 };
			// add table theme class only if there isn't already one there
			if ( !/tablesorter\-/.test( $table.attr( 'class' ) ) ) {
				tmp = ( c.theme !== '' ? ' tablesorter-' + c.theme : '' );
			}

			// give the table a unique id, which will be used in namespace binding
			if ( !c.namespace ) {
				c.namespace = '.tablesorter' + Math.random().toString( 16 ).slice( 2 );
			} else {
				// make sure namespace starts with a period & doesn't have weird characters
				c.namespace = '.' + c.namespace.replace( ts.regex.nonWord, '' );
			}

			c.table = table;
			c.$table = $table
				// add namespace to table to allow bindings on extra elements to target
				// the parent table (e.g. parser-input-select)
				.addClass( ts.css.table + ' ' + c.tableClass + tmp + ' ' + c.namespace.slice(1) )
				.attr( 'role', 'grid' );
			c.$headers = $table.find( c.selectorHeaders );

			c.$table.children().children( 'tr' ).attr( 'role', 'row' );
			c.$tbodies = $table.children( 'tbody:not(.' + c.cssInfoBlock + ')' ).attr({
				'aria-live' : 'polite',
				'aria-relevant' : 'all'
			});
			if ( c.$table.children( 'caption' ).length ) {
				tmp = c.$table.children( 'caption' )[ 0 ];
				if ( !tmp.id ) { tmp.id = c.namespace.slice( 1 ) + 'caption'; }
				c.$table.attr( 'aria-labelledby', tmp.id );
			}
			c.widgetInit = {}; // keep a list of initialized widgets
			// change textExtraction via data-attribute
			c.textExtraction = c.$table.attr( 'data-text-extraction' ) || c.textExtraction || 'basic';
			// build headers
			ts.buildHeaders( c );
			// fixate columns if the users supplies the fixedWidth option
			// do this after theme has been applied
			ts.fixColumnWidth( table );
			// add widgets from class name
			ts.addWidgetFromClass( table );
			// add widget options before parsing (e.g. grouping widget has parser settings)
			ts.applyWidgetOptions( table );
			// try to auto detect column type, and store in tables config
			ts.setupParsers( c );
			// start total row count at zero
			c.totalRows = 0;
			ts.validateOptions( c );
			// build the cache for the tbody cells
			// delayInit will delay building the cache until the user starts a sort
			if ( !c.delayInit ) { ts.buildCache( c ); }
			// bind all header events and methods
			ts.bindEvents( table, c.$headers, true );
			ts.bindMethods( c );
			// get sort list from jQuery data or metadata
			// in jQuery < 1.4, an error occurs when calling $table.data()
			if ( c.supportsDataObject && typeof $table.data().sortlist !== 'undefined' ) {
				c.sortList = $table.data().sortlist;
			} else if ( meta && ( $table.metadata() && $table.metadata().sortlist ) ) {
				c.sortList = $table.metadata().sortlist;
			}
			// apply widget init code
			ts.applyWidget( table, true );
			// if user has supplied a sort list to constructor
			if ( c.sortList.length > 0 ) {
				ts.sortOn( c, c.sortList, {}, !c.initWidgets );
			} else {
				ts.setHeadersCss( c );
				if ( c.initWidgets ) {
					// apply widget format
					ts.applyWidget( table, false );
				}
			}

			// show processesing icon
			if ( c.showProcessing ) {
				$table
				.unbind( 'sortBegin' + c.namespace + ' sortEnd' + c.namespace )
				.bind( 'sortBegin' + c.namespace + ' sortEnd' + c.namespace, function( e ) {
					clearTimeout( c.timerProcessing );
					ts.isProcessing( table );
					if ( e.type === 'sortBegin' ) {
						c.timerProcessing = setTimeout( function() {
							ts.isProcessing( table, true );
						}, 500 );
					}
				});
			}

			// initialized
			table.hasInitialized = true;
			table.isProcessing = false;
			if ( c.debug ) {
				console.log( 'Overall initialization time:' + ts.benchmark( $.data( table, 'startoveralltimer' ) ) );
				if ( c.debug && console.groupEnd ) { console.groupEnd(); }
			}
			$table.triggerHandler( 'tablesorter-initialized', table );
			if ( typeof c.initialized === 'function' ) {
				c.initialized( table );
			}
		},

		bindMethods : function( c ) {
			var $table = c.$table,
				namespace = c.namespace,
				events = ( 'sortReset update updateRows updateAll updateHeaders addRows updateCell updateComplete ' +
					'sorton appendCache updateCache applyWidgetId applyWidgets refreshWidgets destroy mouseup ' +
					'mouseleave ' ).split( ' ' )
					.join( namespace + ' ' );
			// apply easy methods that trigger bound events
			$table
			.unbind( events.replace( ts.regex.spaces, ' ' ) )
			.bind( 'sortReset' + namespace, function( e, callback ) {
				e.stopPropagation();
				// using this.config to ensure functions are getting a non-cached version of the config
				ts.sortReset( this.config, function( table ) {
					if (table.isApplyingWidgets) {
						// multiple triggers in a row... filterReset, then sortReset - see #1361
						// wait to update widgets
						setTimeout( function() {
							ts.applyWidget( table, '', callback );
						}, 100 );
					} else {
						ts.applyWidget( table, '', callback );
					}
				});
			})
			.bind( 'updateAll' + namespace, function( e, resort, callback ) {
				e.stopPropagation();
				ts.updateAll( this.config, resort, callback );
			})
			.bind( 'update' + namespace + ' updateRows' + namespace, function( e, resort, callback ) {
				e.stopPropagation();
				ts.update( this.config, resort, callback );
			})
			.bind( 'updateHeaders' + namespace, function( e, callback ) {
				e.stopPropagation();
				ts.updateHeaders( this.config, callback );
			})
			.bind( 'updateCell' + namespace, function( e, cell, resort, callback ) {
				e.stopPropagation();
				ts.updateCell( this.config, cell, resort, callback );
			})
			.bind( 'addRows' + namespace, function( e, $row, resort, callback ) {
				e.stopPropagation();
				ts.addRows( this.config, $row, resort, callback );
			})
			.bind( 'updateComplete' + namespace, function() {
				this.isUpdating = false;
			})
			.bind( 'sorton' + namespace, function( e, list, callback, init ) {
				e.stopPropagation();
				ts.sortOn( this.config, list, callback, init );
			})
			.bind( 'appendCache' + namespace, function( e, callback, init ) {
				e.stopPropagation();
				ts.appendCache( this.config, init );
				if ( $.isFunction( callback ) ) {
					callback( this );
				}
			})
			// $tbodies variable is used by the tbody sorting widget
			.bind( 'updateCache' + namespace, function( e, callback, $tbodies ) {
				e.stopPropagation();
				ts.updateCache( this.config, callback, $tbodies );
			})
			.bind( 'applyWidgetId' + namespace, function( e, id ) {
				e.stopPropagation();
				ts.applyWidgetId( this, id );
			})
			.bind( 'applyWidgets' + namespace, function( e, callback ) {
				e.stopPropagation();
				// apply widgets (false = not initializing)
				ts.applyWidget( this, false, callback );
			})
			.bind( 'refreshWidgets' + namespace, function( e, all, dontapply ) {
				e.stopPropagation();
				ts.refreshWidgets( this, all, dontapply );
			})
			.bind( 'removeWidget' + namespace, function( e, name, refreshing ) {
				e.stopPropagation();
				ts.removeWidget( this, name, refreshing );
			})
			.bind( 'destroy' + namespace, function( e, removeClasses, callback ) {
				e.stopPropagation();
				ts.destroy( this, removeClasses, callback );
			})
			.bind( 'resetToLoadState' + namespace, function( e ) {
				e.stopPropagation();
				// remove all widgets
				ts.removeWidget( this, true, false );
				var tmp = $.extend( true, {}, c.originalSettings );
				// restore original settings; this clears out current settings, but does not clear
				// values saved to storage.
				c = $.extend( true, {}, ts.defaults, tmp );
				c.originalSettings = tmp;
				this.hasInitialized = false;
				// setup the entire table again
				ts.setup( this, c );
			});
		},

		bindEvents : function( table, $headers, core ) {
			table = $( table )[ 0 ];
			var tmp,
				c = table.config,
				namespace = c.namespace,
				downTarget = null;
			if ( core !== true ) {
				$headers.addClass( namespace.slice( 1 ) + '_extra_headers' );
				tmp = ts.getClosest( $headers, 'table' );
				if ( tmp.length && tmp[ 0 ].nodeName === 'TABLE' && tmp[ 0 ] !== table ) {
					$( tmp[ 0 ] ).addClass( namespace.slice( 1 ) + '_extra_table' );
				}
			}
			tmp = ( c.pointerDown + ' ' + c.pointerUp + ' ' + c.pointerClick + ' sort keyup ' )
				.replace( ts.regex.spaces, ' ' )
				.split( ' ' )
				.join( namespace + ' ' );
			// apply event handling to headers and/or additional headers (stickyheaders, scroller, etc)
			$headers
			// http://stackoverflow.com/questions/5312849/jquery-find-self;
			.find( c.selectorSort )
			.add( $headers.filter( c.selectorSort ) )
			.unbind( tmp )
			.bind( tmp, function( e, external ) {
				var $cell, cell, temp,
					$target = $( e.target ),
					// wrap event type in spaces, so the match doesn't trigger on inner words
					type = ' ' + e.type + ' ';
				// only recognize left clicks
				if ( ( ( e.which || e.button ) !== 1 && !type.match( ' ' + c.pointerClick + ' | sort | keyup ' ) ) ||
					// allow pressing enter
					( type === ' keyup ' && e.which !== ts.keyCodes.enter ) ||
					// allow triggering a click event (e.which is undefined) & ignore physical clicks
					( type.match( ' ' + c.pointerClick + ' ' ) && typeof e.which !== 'undefined' ) ) {
					return;
				}
				// ignore mouseup if mousedown wasn't on the same target
				if ( type.match( ' ' + c.pointerUp + ' ' ) && downTarget !== e.target && external !== true ) {
					return;
				}
				// set target on mousedown
				if ( type.match( ' ' + c.pointerDown + ' ' ) ) {
					downTarget = e.target;
					// preventDefault needed or jQuery v1.3.2 and older throws an
					// "Uncaught TypeError: handler.apply is not a function" error
					temp = $target.jquery.split( '.' );
					if ( temp[ 0 ] === '1' && temp[ 1 ] < 4 ) { e.preventDefault(); }
					return;
				}
				downTarget = null;
				// prevent sort being triggered on form elements
				if ( ts.regex.formElements.test( e.target.nodeName ) ||
					// nosort class name, or elements within a nosort container
					$target.hasClass( c.cssNoSort ) || $target.parents( '.' + c.cssNoSort ).length > 0 ||
					// elements within a button
					$target.parents( 'button' ).length > 0 ) {
					return !c.cancelSelection;
				}
				if ( c.delayInit && ts.isEmptyObject( c.cache ) ) {
					ts.buildCache( c );
				}
				$cell = ts.getClosest( $( this ), '.' + ts.css.header );
				// reference original table headers and find the same cell
				// don't use $headers or IE8 throws an error - see #987
				temp = $headers.index( $cell );
				c.last.clickedIndex = ( temp < 0 ) ? $cell.attr( 'data-column' ) : temp;
				// use column index if $headers is undefined
				cell = c.$headers[ c.last.clickedIndex ];
				if ( cell && !cell.sortDisabled ) {
					ts.initSort( c, cell, e );
				}
			});
			if ( c.cancelSelection ) {
				// cancel selection
				$headers
					.attr( 'unselectable', 'on' )
					.bind( 'selectstart', false )
					.css({
						'user-select' : 'none',
						'MozUserSelect' : 'none' // not needed for jQuery 1.8+
					});
			}
		},

		buildHeaders : function( c ) {
			var $temp, icon, timer, indx;
			c.headerList = [];
			c.headerContent = [];
			c.sortVars = [];
			if ( c.debug ) {
				timer = new Date();
			}
			// children tr in tfoot - see issue #196 & #547
			// don't pass table.config to computeColumnIndex here - widgets (math) pass it to "quickly" index tbody cells
			c.columns = ts.computeColumnIndex( c.$table.children( 'thead, tfoot' ).children( 'tr' ) );
			// add icon if cssIcon option exists
			icon = c.cssIcon ?
				'<i class="' + ( c.cssIcon === ts.css.icon ? ts.css.icon : c.cssIcon + ' ' + ts.css.icon ) + '"></i>' :
				'';
			// redefine c.$headers here in case of an updateAll that replaces or adds an entire header cell - see #683
			c.$headers = $( $.map( c.$table.find( c.selectorHeaders ), function( elem, index ) {
				var configHeaders, header, column, template, tmp,
					$elem = $( elem );
				// ignore cell (don't add it to c.$headers) if row has ignoreRow class
				if ( ts.getClosest( $elem, 'tr' ).hasClass( c.cssIgnoreRow ) ) { return; }
				// transfer data-column to element if not th/td - #1459
				if ( !/(th|td)/i.test( elem.nodeName ) ) {
					tmp = ts.getClosest( $elem, 'th, td' );
					$elem.attr( 'data-column', tmp.attr( 'data-column' ) );
				}
				// make sure to get header cell & not column indexed cell
				configHeaders = ts.getColumnData( c.table, c.headers, index, true );
				// save original header content
				c.headerContent[ index ] = $elem.html();
				// if headerTemplate is empty, don't reformat the header cell
				if ( c.headerTemplate !== '' && !$elem.find( '.' + ts.css.headerIn ).length ) {
					// set up header template
					template = c.headerTemplate
						.replace( ts.regex.templateContent, $elem.html() )
						.replace( ts.regex.templateIcon, $elem.find( '.' + ts.css.icon ).length ? '' : icon );
					if ( c.onRenderTemplate ) {
						header = c.onRenderTemplate.apply( $elem, [ index, template ] );
						// only change t if something is returned
						if ( header && typeof header === 'string' ) {
							template = header;
						}
					}
					$elem.html( '<div class="' + ts.css.headerIn + '">' + template + '</div>' ); // faster than wrapInner
				}
				if ( c.onRenderHeader ) {
					c.onRenderHeader.apply( $elem, [ index, c, c.$table ] );
				}
				column = parseInt( $elem.attr( 'data-column' ), 10 );
				elem.column = column;
				tmp = ts.getOrder( ts.getData( $elem, configHeaders, 'sortInitialOrder' ) || c.sortInitialOrder );
				// this may get updated numerous times if there are multiple rows
				c.sortVars[ column ] = {
					count : -1, // set to -1 because clicking on the header automatically adds one
					order:  tmp ?
						( c.sortReset ? [ 1, 0, 2 ] : [ 1, 0 ] ) : // desc, asc, unsorted
						( c.sortReset ? [ 0, 1, 2 ] : [ 0, 1 ] ),  // asc, desc, unsorted
					lockedOrder : false
				};
				tmp = ts.getData( $elem, configHeaders, 'lockedOrder' ) || false;
				if ( typeof tmp !== 'undefined' && tmp !== false ) {
					c.sortVars[ column ].lockedOrder = true;
					c.sortVars[ column ].order = ts.getOrder( tmp ) ? [ 1, 1 ] : [ 0, 0 ];
				}
				// add cell to headerList
				c.headerList[ index ] = elem;
				$elem.addClass( ts.css.header + ' ' + c.cssHeader );
				// add to parent in case there are multiple rows
				ts.getClosest( $elem, 'tr' )
					.addClass( ts.css.headerRow + ' ' + c.cssHeaderRow )
					.attr( 'role', 'row' );
				// allow keyboard cursor to focus on element
				if ( c.tabIndex ) {
					$elem.attr( 'tabindex', 0 );
				}
				return elem;
			}) );
			// cache headers per column
			c.$headerIndexed = [];
			for ( indx = 0; indx < c.columns; indx++ ) {
				// colspan in header making a column undefined
				if ( ts.isEmptyObject( c.sortVars[ indx ] ) ) {
					c.sortVars[ indx ] = {};
				}
				// Use c.$headers.parent() in case selectorHeaders doesn't point to the th/td
				$temp = c.$headers.filter( '[data-column="' + indx + '"]' );
				// target sortable column cells, unless there are none, then use non-sortable cells
				// .last() added in jQuery 1.4; use .filter(':last') to maintain compatibility with jQuery v1.2.6
				c.$headerIndexed[ indx ] = $temp.length ?
					$temp.not( '.sorter-false' ).length ?
						$temp.not( '.sorter-false' ).filter( ':last' ) :
						$temp.filter( ':last' ) :
					$();
			}
			c.$table.find( c.selectorHeaders ).attr({
				scope: 'col',
				role : 'columnheader'
			});
			// enable/disable sorting
			ts.updateHeader( c );
			if ( c.debug ) {
				console.log( 'Built headers:' + ts.benchmark( timer ) );
				console.log( c.$headers );
			}
		},

		// Use it to add a set of methods to table.config which will be available for all tables.
		// This should be done before table initialization
		addInstanceMethods : function( methods ) {
			$.extend( ts.instanceMethods, methods );
		},

		/*
		█████▄ ▄████▄ █████▄ ▄█████ ██████ █████▄ ▄█████
		██▄▄██ ██▄▄██ ██▄▄██ ▀█▄    ██▄▄   ██▄▄██ ▀█▄
		██▀▀▀  ██▀▀██ ██▀██     ▀█▄ ██▀▀   ██▀██     ▀█▄
		██     ██  ██ ██  ██ █████▀ ██████ ██  ██ █████▀
		*/
		setupParsers : function( c, $tbodies ) {
			var rows, list, span, max, colIndex, indx, header, configHeaders,
				noParser, parser, extractor, time, tbody, len,
				table = c.table,
				tbodyIndex = 0,
				debug = {};
			// update table bodies in case we start with an empty table
			c.$tbodies = c.$table.children( 'tbody:not(.' + c.cssInfoBlock + ')' );
			tbody = typeof $tbodies === 'undefined' ? c.$tbodies : $tbodies;
			len = tbody.length;
			if ( len === 0 ) {
				return c.debug ? console.warn( 'Warning: *Empty table!* Not building a parser cache' ) : '';
			} else if ( c.debug ) {
				time = new Date();
				console[ console.group ? 'group' : 'log' ]( 'Detecting parsers for each column' );
			}
			list = {
				extractors: [],
				parsers: []
			};
			while ( tbodyIndex < len ) {
				rows = tbody[ tbodyIndex ].rows;
				if ( rows.length ) {
					colIndex = 0;
					max = c.columns;
					for ( indx = 0; indx < max; indx++ ) {
						header = c.$headerIndexed[ colIndex ];
						if ( header && header.length ) {
							// get column indexed table cell; adding true parameter fixes #1362 but
							// it would break backwards compatibility...
							configHeaders = ts.getColumnData( table, c.headers, colIndex ); // , true );
							// get column parser/extractor
							extractor = ts.getParserById( ts.getData( header, configHeaders, 'extractor' ) );
							parser = ts.getParserById( ts.getData( header, configHeaders, 'sorter' ) );
							noParser = ts.getData( header, configHeaders, 'parser' ) === 'false';
							// empty cells behaviour - keeping emptyToBottom for backwards compatibility
							c.empties[colIndex] = (
								ts.getData( header, configHeaders, 'empty' ) ||
								c.emptyTo || ( c.emptyToBottom ? 'bottom' : 'top' ) ).toLowerCase();
							// text strings behaviour in numerical sorts
							c.strings[colIndex] = (
								ts.getData( header, configHeaders, 'string' ) ||
								c.stringTo ||
								'max' ).toLowerCase();
							if ( noParser ) {
								parser = ts.getParserById( 'no-parser' );
							}
							if ( !extractor ) {
								// For now, maybe detect someday
								extractor = false;
							}
							if ( !parser ) {
								parser = ts.detectParserForColumn( c, rows, -1, colIndex );
							}
							if ( c.debug ) {
								debug[ '(' + colIndex + ') ' + header.text() ] = {
									parser : parser.id,
									extractor : extractor ? extractor.id : 'none',
									string : c.strings[ colIndex ],
									empty  : c.empties[ colIndex ]
								};
							}
							list.parsers[ colIndex ] = parser;
							list.extractors[ colIndex ] = extractor;
							span = header[ 0 ].colSpan - 1;
							if ( span > 0 ) {
								colIndex += span;
								max += span;
								while ( span + 1 > 0 ) {
									// set colspan columns to use the same parsers & extractors
									list.parsers[ colIndex - span ] = parser;
									list.extractors[ colIndex - span ] = extractor;
									span--;
								}
							}
						}
						colIndex++;
					}
				}
				tbodyIndex += ( list.parsers.length ) ? len : 1;
			}
			if ( c.debug ) {
				if ( !ts.isEmptyObject( debug ) ) {
					console[ console.table ? 'table' : 'log' ]( debug );
				} else {
					console.warn( '  No parsers detected!' );
				}
				console.log( 'Completed detecting parsers' + ts.benchmark( time ) );
				if ( console.groupEnd ) { console.groupEnd(); }
			}
			c.parsers = list.parsers;
			c.extractors = list.extractors;
		},

		addParser : function( parser ) {
			var indx,
				len = ts.parsers.length,
				add = true;
			for ( indx = 0; indx < len; indx++ ) {
				if ( ts.parsers[ indx ].id.toLowerCase() === parser.id.toLowerCase() ) {
					add = false;
				}
			}
			if ( add ) {
				ts.parsers[ ts.parsers.length ] = parser;
			}
		},

		getParserById : function( name ) {
			/*jshint eqeqeq:false */
			if ( name == 'false' ) { return false; }
			var indx,
				len = ts.parsers.length;
			for ( indx = 0; indx < len; indx++ ) {
				if ( ts.parsers[ indx ].id.toLowerCase() === ( name.toString() ).toLowerCase() ) {
					return ts.parsers[ indx ];
				}
			}
			return false;
		},

		detectParserForColumn : function( c, rows, rowIndex, cellIndex ) {
			var cur, $node, row,
				indx = ts.parsers.length,
				node = false,
				nodeValue = '',
				keepLooking = true;
			while ( nodeValue === '' && keepLooking ) {
				rowIndex++;
				row = rows[ rowIndex ];
				// stop looking after 50 empty rows
				if ( row && rowIndex < 50 ) {
					if ( row.className.indexOf( ts.cssIgnoreRow ) < 0 ) {
						node = rows[ rowIndex ].cells[ cellIndex ];
						nodeValue = ts.getElementText( c, node, cellIndex );
						$node = $( node );
						if ( c.debug ) {
							console.log( 'Checking if value was empty on row ' + rowIndex + ', column: ' +
								cellIndex + ': "' + nodeValue + '"' );
						}
					}
				} else {
					keepLooking = false;
				}
			}
			while ( --indx >= 0 ) {
				cur = ts.parsers[ indx ];
				// ignore the default text parser because it will always be true
				if ( cur && cur.id !== 'text' && cur.is && cur.is( nodeValue, c.table, node, $node ) ) {
					return cur;
				}
			}
			// nothing found, return the generic parser (text)
			return ts.getParserById( 'text' );
		},

		getElementText : function( c, node, cellIndex ) {
			if ( !node ) { return ''; }
			var tmp,
				extract = c.textExtraction || '',
				// node could be a jquery object
				// http://jsperf.com/jquery-vs-instanceof-jquery/2
				$node = node.jquery ? node : $( node );
			if ( typeof extract === 'string' ) {
				// check data-attribute first when set to 'basic'; don't use node.innerText - it's really slow!
				// http://www.kellegous.com/j/2013/02/27/innertext-vs-textcontent/
				if ( extract === 'basic' && typeof ( tmp = $node.attr( c.textAttribute ) ) !== 'undefined' ) {
					return $.trim( tmp );
				}
				return $.trim( node.textContent || $node.text() );
			} else {
				if ( typeof extract === 'function' ) {
					return $.trim( extract( $node[ 0 ], c.table, cellIndex ) );
				} else if ( typeof ( tmp = ts.getColumnData( c.table, extract, cellIndex ) ) === 'function' ) {
					return $.trim( tmp( $node[ 0 ], c.table, cellIndex ) );
				}
			}
			// fallback
			return $.trim( $node[ 0 ].textContent || $node.text() );
		},

		// centralized function to extract/parse cell contents
		getParsedText : function( c, cell, colIndex, txt ) {
			if ( typeof txt === 'undefined' ) {
				txt = ts.getElementText( c, cell, colIndex );
			}
			// if no parser, make sure to return the txt
			var val = '' + txt,
				parser = c.parsers[ colIndex ],
				extractor = c.extractors[ colIndex ];
			if ( parser ) {
				// do extract before parsing, if there is one
				if ( extractor && typeof extractor.format === 'function' ) {
					txt = extractor.format( txt, c.table, cell, colIndex );
				}
				// allow parsing if the string is empty, previously parsing would change it to zero,
				// in case the parser needs to extract data from the table cell attributes
				val = parser.id === 'no-parser' ? '' :
					// make sure txt is a string (extractor may have converted it)
					parser.format( '' + txt, c.table, cell, colIndex );
				if ( c.ignoreCase && typeof val === 'string' ) {
					val = val.toLowerCase();
				}
			}
			return val;
		},

		/*
		▄████▄ ▄████▄ ▄████▄ ██  ██ ██████
		██  ▀▀ ██▄▄██ ██  ▀▀ ██▄▄██ ██▄▄
		██  ▄▄ ██▀▀██ ██  ▄▄ ██▀▀██ ██▀▀
		▀████▀ ██  ██ ▀████▀ ██  ██ ██████
		*/
		buildCache : function( c, callback, $tbodies ) {
			var cache, val, txt, rowIndex, colIndex, tbodyIndex, $tbody, $row,
				cols, $cells, cell, cacheTime, totalRows, rowData, prevRowData,
				colMax, span, cacheIndex, hasParser, max, len, index,
				table = c.table,
				parsers = c.parsers;
			// update tbody variable
			c.$tbodies = c.$table.children( 'tbody:not(.' + c.cssInfoBlock + ')' );
			$tbody = typeof $tbodies === 'undefined' ? c.$tbodies : $tbodies,
			c.cache = {};
			c.totalRows = 0;
			// if no parsers found, return - it's an empty table.
			if ( !parsers ) {
				return c.debug ? console.warn( 'Warning: *Empty table!* Not building a cache' ) : '';
			}
			if ( c.debug ) {
				cacheTime = new Date();
			}
			// processing icon
			if ( c.showProcessing ) {
				ts.isProcessing( table, true );
			}
			for ( tbodyIndex = 0; tbodyIndex < $tbody.length; tbodyIndex++ ) {
				colMax = []; // column max value per tbody
				cache = c.cache[ tbodyIndex ] = {
					normalized: [] // array of normalized row data; last entry contains 'rowData' above
					// colMax: #   // added at the end
				};

				totalRows = ( $tbody[ tbodyIndex ] && $tbody[ tbodyIndex ].rows.length ) || 0;
				for ( rowIndex = 0; rowIndex < totalRows; ++rowIndex ) {
					rowData = {
						// order: original row order #
						// $row : jQuery Object[]
						child: [], // child row text (filter widget)
						raw: []    // original row text
					};
					/** Add the table data to main data array */
					$row = $( $tbody[ tbodyIndex ].rows[ rowIndex ] );
					cols = [];
					// ignore "remove-me" rows
					if ( $row.hasClass( c.selectorRemove.slice(1) ) ) {
						continue;
					}
					// if this is a child row, add it to the last row's children and continue to the next row
					// ignore child row class, if it is the first row
					if ( $row.hasClass( c.cssChildRow ) && rowIndex !== 0 ) {
						len = cache.normalized.length - 1;
						prevRowData = cache.normalized[ len ][ c.columns ];
						prevRowData.$row = prevRowData.$row.add( $row );
						// add 'hasChild' class name to parent row
						if ( !$row.prev().hasClass( c.cssChildRow ) ) {
							$row.prev().addClass( ts.css.cssHasChild );
						}
						// save child row content (un-parsed!)
						$cells = $row.children( 'th, td' );
						len = prevRowData.child.length;
						prevRowData.child[ len ] = [];
						// child row content does not account for colspans/rowspans; so indexing may be off
						cacheIndex = 0;
						max = c.columns;
						for ( colIndex = 0; colIndex < max; colIndex++ ) {
							cell = $cells[ colIndex ];
							if ( cell ) {
								prevRowData.child[ len ][ colIndex ] = ts.getParsedText( c, cell, colIndex );
								span = $cells[ colIndex ].colSpan - 1;
								if ( span > 0 ) {
									cacheIndex += span;
									max += span;
								}
							}
							cacheIndex++;
						}
						// go to the next for loop
						continue;
					}
					rowData.$row = $row;
					rowData.order = rowIndex; // add original row position to rowCache
					cacheIndex = 0;
					max = c.columns;
					for ( colIndex = 0; colIndex < max; ++colIndex ) {
						cell = $row[ 0 ].cells[ colIndex ];
						if ( cell && cacheIndex < c.columns ) {
							hasParser = typeof parsers[ cacheIndex ] !== 'undefined';
							if ( !hasParser && c.debug ) {
								console.warn( 'No parser found for row: ' + rowIndex + ', column: ' + colIndex +
									'; cell containing: "' + $(cell).text() + '"; does it have a header?' );
							}
							val = ts.getElementText( c, cell, cacheIndex );
							rowData.raw[ cacheIndex ] = val; // save original row text
							// save raw column text even if there is no parser set
							txt = ts.getParsedText( c, cell, cacheIndex, val );
							cols[ cacheIndex ] = txt;
							if ( hasParser && ( parsers[ cacheIndex ].type || '' ).toLowerCase() === 'numeric' ) {
								// determine column max value (ignore sign)
								colMax[ cacheIndex ] = Math.max( Math.abs( txt ) || 0, colMax[ cacheIndex ] || 0 );
							}
							// allow colSpan in tbody
							span = cell.colSpan - 1;
							if ( span > 0 ) {
								index = 0;
								while ( index <= span ) {
									// duplicate text (or not) to spanned columns
									// instead of setting duplicate span to empty string, use textExtraction to try to get a value
									// see http://stackoverflow.com/q/36449711/145346
									txt = c.duplicateSpan || index === 0 ?
										val :
										typeof c.textExtraction !== 'string' ?
											ts.getElementText( c, cell, cacheIndex + index ) || '' :
											'';
									rowData.raw[ cacheIndex + index ] = txt;
									cols[ cacheIndex + index ] = txt;
									index++;
								}
								cacheIndex += span;
								max += span;
							}
						}
						cacheIndex++;
					}
					// ensure rowData is always in the same location (after the last column)
					cols[ c.columns ] = rowData;
					cache.normalized[ cache.normalized.length ] = cols;
				}
				cache.colMax = colMax;
				// total up rows, not including child rows
				c.totalRows += cache.normalized.length;

			}
			if ( c.showProcessing ) {
				ts.isProcessing( table ); // remove processing icon
			}
			if ( c.debug ) {
				len = Math.min( 5, c.cache[ 0 ].normalized.length );
				console[ console.group ? 'group' : 'log' ]( 'Building cache for ' + c.totalRows +
					' rows (showing ' + len + ' rows in log) and ' + c.columns + ' columns' +
					ts.benchmark( cacheTime ) );
				val = {};
				for ( colIndex = 0; colIndex < c.columns; colIndex++ ) {
					for ( cacheIndex = 0; cacheIndex < len; cacheIndex++ ) {
						if ( !val[ 'row: ' + cacheIndex ] ) {
							val[ 'row: ' + cacheIndex ] = {};
						}
						val[ 'row: ' + cacheIndex ][ c.$headerIndexed[ colIndex ].text() ] =
							c.cache[ 0 ].normalized[ cacheIndex ][ colIndex ];
					}
				}
				console[ console.table ? 'table' : 'log' ]( val );
				if ( console.groupEnd ) { console.groupEnd(); }
			}
			if ( $.isFunction( callback ) ) {
				callback( table );
			}
		},

		getColumnText : function( table, column, callback, rowFilter ) {
			table = $( table )[0];
			var tbodyIndex, rowIndex, cache, row, tbodyLen, rowLen, raw, parsed, $cell, result,
				hasCallback = typeof callback === 'function',
				allColumns = column === 'all',
				data = { raw : [], parsed: [], $cell: [] },
				c = table.config;
			if ( ts.isEmptyObject( c ) ) {
				if ( c.debug ) {
					console.warn( 'No cache found - aborting getColumnText function!' );
				}
			} else {
				tbodyLen = c.$tbodies.length;
				for ( tbodyIndex = 0; tbodyIndex < tbodyLen; tbodyIndex++ ) {
					cache = c.cache[ tbodyIndex ].normalized;
					rowLen = cache.length;
					for ( rowIndex = 0; rowIndex < rowLen; rowIndex++ ) {
						row = cache[ rowIndex ];
						if ( rowFilter && !row[ c.columns ].$row.is( rowFilter ) ) {
							continue;
						}
						result = true;
						parsed = ( allColumns ) ? row.slice( 0, c.columns ) : row[ column ];
						row = row[ c.columns ];
						raw = ( allColumns ) ? row.raw : row.raw[ column ];
						$cell = ( allColumns ) ? row.$row.children() : row.$row.children().eq( column );
						if ( hasCallback ) {
							result = callback({
								tbodyIndex : tbodyIndex,
								rowIndex : rowIndex,
								parsed : parsed,
								raw : raw,
								$row : row.$row,
								$cell : $cell
							});
						}
						if ( result !== false ) {
							data.parsed[ data.parsed.length ] = parsed;
							data.raw[ data.raw.length ] = raw;
							data.$cell[ data.$cell.length ] = $cell;
						}
					}
				}
				// return everything
				return data;
			}
		},

		/*
		██  ██ █████▄ █████▄ ▄████▄ ██████ ██████
		██  ██ ██▄▄██ ██  ██ ██▄▄██   ██   ██▄▄
		██  ██ ██▀▀▀  ██  ██ ██▀▀██   ██   ██▀▀
		▀████▀ ██     █████▀ ██  ██   ██   ██████
		*/
		setHeadersCss : function( c ) {
			var indx, column,
				list = c.sortList,
				len = list.length,
				none = ts.css.sortNone + ' ' + c.cssNone,
				css = [ ts.css.sortAsc + ' ' + c.cssAsc, ts.css.sortDesc + ' ' + c.cssDesc ],
				cssIcon = [ c.cssIconAsc, c.cssIconDesc, c.cssIconNone ],
				aria = [ 'ascending', 'descending' ],
				updateColumnSort = function($el, index) {
					$el
						.removeClass( none )
						.addClass( css[ index ] )
						.attr( 'aria-sort', aria[ index ] )
						.find( '.' + ts.css.icon )
						.removeClass( cssIcon[ 2 ] )
						.addClass( cssIcon[ index ] );
				},
				// find the footer
				$extras = c.$table
					.find( 'tfoot tr' )
					.children( 'td, th' )
					.add( $( c.namespace + '_extra_headers' ) )
					.removeClass( css.join( ' ' ) ),
				// remove all header information
				$sorted = c.$headers
					.add( $( 'thead ' + c.namespace + '_extra_headers' ) )
					.removeClass( css.join( ' ' ) )
					.addClass( none )
					.attr( 'aria-sort', 'none' )
					.find( '.' + ts.css.icon )
					.removeClass( cssIcon.join( ' ' ) )
					.end();
			// add css none to all sortable headers
			$sorted
				.not( '.sorter-false' )
				.find( '.' + ts.css.icon )
				.addClass( cssIcon[ 2 ] );
			// add disabled css icon class
			if ( c.cssIconDisabled ) {
				$sorted
					.filter( '.sorter-false' )
					.find( '.' + ts.css.icon )
					.addClass( c.cssIconDisabled );
			}
			for ( indx = 0; indx < len; indx++ ) {
				// direction = 2 means reset!
				if ( list[ indx ][ 1 ] !== 2 ) {
					// multicolumn sorting updating - see #1005
					// .not(function(){}) needs jQuery 1.4
					// filter(function(i, el){}) <- el is undefined in jQuery v1.2.6
					$sorted = c.$headers.filter( function( i ) {
						// only include headers that are in the sortList (this includes colspans)
						var include = true,
							$el = c.$headers.eq( i ),
							col = parseInt( $el.attr( 'data-column' ), 10 ),
							end = col + ts.getClosest( $el, 'th, td' )[0].colSpan;
						for ( ; col < end; col++ ) {
							include = include ? include || ts.isValueInArray( col, c.sortList ) > -1 : false;
						}
						return include;
					});

					// choose the :last in case there are nested columns
					$sorted = $sorted
						.not( '.sorter-false' )
						.filter( '[data-column="' + list[ indx ][ 0 ] + '"]' + ( len === 1 ? ':last' : '' ) );
					if ( $sorted.length ) {
						for ( column = 0; column < $sorted.length; column++ ) {
							if ( !$sorted[ column ].sortDisabled ) {
								updateColumnSort( $sorted.eq( column ), list[ indx ][ 1 ] );
							}
						}
					}
					// add sorted class to footer & extra headers, if they exist
					if ( $extras.length ) {
						updateColumnSort( $extras.filter( '[data-column="' + list[ indx ][ 0 ] + '"]' ), list[ indx ][ 1 ] );
					}
				}
			}
			// add verbose aria labels
			len = c.$headers.length;
			for ( indx = 0; indx < len; indx++ ) {
				ts.setColumnAriaLabel( c, c.$headers.eq( indx ) );
			}
		},

		getClosest : function( $el, selector ) {
			// jQuery v1.2.6 doesn't have closest()
			if ( $.fn.closest ) {
				return $el.closest( selector );
			}
			return $el.is( selector ) ?
				$el :
				$el.parents( selector ).filter( ':first' );
		},

		// nextSort (optional), lets you disable next sort text
		setColumnAriaLabel : function( c, $header, nextSort ) {
			if ( $header.length ) {
				var column = parseInt( $header.attr( 'data-column' ), 10 ),
					vars = c.sortVars[ column ],
					tmp = $header.hasClass( ts.css.sortAsc ) ?
						'sortAsc' :
						$header.hasClass( ts.css.sortDesc ) ? 'sortDesc' : 'sortNone',
					txt = $.trim( $header.text() ) + ': ' + ts.language[ tmp ];
				if ( $header.hasClass( 'sorter-false' ) || nextSort === false ) {
					txt += ts.language.sortDisabled;
				} else {
					tmp = ( vars.count + 1 ) % vars.order.length;
					nextSort = vars.order[ tmp ];
					// if nextSort
					txt += ts.language[ nextSort === 0 ? 'nextAsc' : nextSort === 1 ? 'nextDesc' : 'nextNone' ];
				}
				$header.attr( 'aria-label', txt );
			}
		},

		updateHeader : function( c ) {
			var index, isDisabled, $header, col,
				table = c.table,
				len = c.$headers.length;
			for ( index = 0; index < len; index++ ) {
				$header = c.$headers.eq( index );
				col = ts.getColumnData( table, c.headers, index, true );
				// add 'sorter-false' class if 'parser-false' is set
				isDisabled = ts.getData( $header, col, 'sorter' ) === 'false' || ts.getData( $header, col, 'parser' ) === 'false';
				ts.setColumnSort( c, $header, isDisabled );
			}
		},

		setColumnSort : function( c, $header, isDisabled ) {
			var id = c.table.id;
			$header[ 0 ].sortDisabled = isDisabled;
			$header[ isDisabled ? 'addClass' : 'removeClass' ]( 'sorter-false' )
				.attr( 'aria-disabled', '' + isDisabled );
			// disable tab index on disabled cells
			if ( c.tabIndex ) {
				if ( isDisabled ) {
					$header.removeAttr( 'tabindex' );
				} else {
					$header.attr( 'tabindex', '0' );
				}
			}
			// aria-controls - requires table ID
			if ( id ) {
				if ( isDisabled ) {
					$header.removeAttr( 'aria-controls' );
				} else {
					$header.attr( 'aria-controls', id );
				}
			}
		},

		updateHeaderSortCount : function( c, list ) {
			var col, dir, group, indx, primary, temp, val, order,
				sortList = list || c.sortList,
				len = sortList.length;
			c.sortList = [];
			for ( indx = 0; indx < len; indx++ ) {
				val = sortList[ indx ];
				// ensure all sortList values are numeric - fixes #127
				col = parseInt( val[ 0 ], 10 );
				// prevents error if sorton array is wrong
				if ( col < c.columns ) {

					// set order if not already defined - due to colspan header without associated header cell
					// adding this check prevents a javascript error
					if ( !c.sortVars[ col ].order ) {
						if ( ts.getOrder( c.sortInitialOrder ) ) {
							order = c.sortReset ? [ 1, 0, 2 ] : [ 1, 0 ];
						} else {
							order = c.sortReset ? [ 0, 1, 2 ] : [ 0, 1 ];
						}
						c.sortVars[ col ].order = order;
						c.sortVars[ col ].count = 0;
					}

					order = c.sortVars[ col ].order;
					dir = ( '' + val[ 1 ] ).match( /^(1|d|s|o|n)/ );
					dir = dir ? dir[ 0 ] : '';
					// 0/(a)sc (default), 1/(d)esc, (s)ame, (o)pposite, (n)ext
					switch ( dir ) {
						case '1' : case 'd' : // descending
							dir = 1;
							break;
						case 's' : // same direction (as primary column)
							// if primary sort is set to 's', make it ascending
							dir = primary || 0;
							break;
						case 'o' :
							temp = order[ ( primary || 0 ) % order.length ];
							// opposite of primary column; but resets if primary resets
							dir = temp === 0 ? 1 : temp === 1 ? 0 : 2;
							break;
						case 'n' :
							dir = order[ ( ++c.sortVars[ col ].count ) % order.length ];
							break;
						default : // ascending
							dir = 0;
							break;
					}
					primary = indx === 0 ? dir : primary;
					group = [ col, parseInt( dir, 10 ) || 0 ];
					c.sortList[ c.sortList.length ] = group;
					dir = $.inArray( group[ 1 ], order ); // fixes issue #167
					c.sortVars[ col ].count = dir >= 0 ? dir : group[ 1 ] % order.length;
				}
			}
		},

		updateAll : function( c, resort, callback ) {
			var table = c.table;
			table.isUpdating = true;
			ts.refreshWidgets( table, true, true );
			ts.buildHeaders( c );
			ts.bindEvents( table, c.$headers, true );
			ts.bindMethods( c );
			ts.commonUpdate( c, resort, callback );
		},

		update : function( c, resort, callback ) {
			var table = c.table;
			table.isUpdating = true;
			// update sorting (if enabled/disabled)
			ts.updateHeader( c );
			ts.commonUpdate( c, resort, callback );
		},

		// simple header update - see #989
		updateHeaders : function( c, callback ) {
			c.table.isUpdating = true;
			ts.buildHeaders( c );
			ts.bindEvents( c.table, c.$headers, true );
			ts.resortComplete( c, callback );
		},

		updateCell : function( c, cell, resort, callback ) {
			// updateCell for child rows is a mess - we'll ignore them for now
			// eventually I'll break out the "update" row cache code to make everything consistent
			if ( $( cell ).closest( 'tr' ).hasClass( c.cssChildRow ) ) {
				console.warn('Tablesorter Warning! "updateCell" for child row content has been disabled, use "update" instead');
				return;
			}
			if ( ts.isEmptyObject( c.cache ) ) {
				// empty table, do an update instead - fixes #1099
				ts.updateHeader( c );
				ts.commonUpdate( c, resort, callback );
				return;
			}
			c.table.isUpdating = true;
			c.$table.find( c.selectorRemove ).remove();
			// get position from the dom
			var tmp, indx, row, icell, cache, len,
				$tbodies = c.$tbodies,
				$cell = $( cell ),
				// update cache - format: function( s, table, cell, cellIndex )
				// no closest in jQuery v1.2.6
				tbodyIndex = $tbodies.index( ts.getClosest( $cell, 'tbody' ) ),
				tbcache = c.cache[ tbodyIndex ],
				$row = ts.getClosest( $cell, 'tr' );
			cell = $cell[ 0 ]; // in case cell is a jQuery object
			// tbody may not exist if update is initialized while tbody is removed for processing
			if ( $tbodies.length && tbodyIndex >= 0 ) {
				row = $tbodies.eq( tbodyIndex ).find( 'tr' ).not( '.' + c.cssChildRow ).index( $row );
				cache = tbcache.normalized[ row ];
				len = $row[ 0 ].cells.length;
				if ( len !== c.columns ) {
					// colspan in here somewhere!
					icell = 0;
					tmp = false;
					for ( indx = 0; indx < len; indx++ ) {
						if ( !tmp && $row[ 0 ].cells[ indx ] !== cell ) {
							icell += $row[ 0 ].cells[ indx ].colSpan;
						} else {
							tmp = true;
						}
					}
				} else {
					icell = $cell.index();
				}
				tmp = ts.getElementText( c, cell, icell ); // raw
				cache[ c.columns ].raw[ icell ] = tmp;
				tmp = ts.getParsedText( c, cell, icell, tmp );
				cache[ icell ] = tmp; // parsed
				if ( ( c.parsers[ icell ].type || '' ).toLowerCase() === 'numeric' ) {
					// update column max value (ignore sign)
					tbcache.colMax[ icell ] = Math.max( Math.abs( tmp ) || 0, tbcache.colMax[ icell ] || 0 );
				}
				tmp = resort !== 'undefined' ? resort : c.resort;
				if ( tmp !== false ) {
					// widgets will be reapplied
					ts.checkResort( c, tmp, callback );
				} else {
					// don't reapply widgets is resort is false, just in case it causes
					// problems with element focus
					ts.resortComplete( c, callback );
				}
			} else {
				if ( c.debug ) {
					console.error( 'updateCell aborted, tbody missing or not within the indicated table' );
				}
				c.table.isUpdating = false;
			}
		},

		addRows : function( c, $row, resort, callback ) {
			var txt, val, tbodyIndex, rowIndex, rows, cellIndex, len, order,
				cacheIndex, rowData, cells, cell, span,
				// allow passing a row string if only one non-info tbody exists in the table
				valid = typeof $row === 'string' && c.$tbodies.length === 1 && /<tr/.test( $row || '' ),
				table = c.table;
			if ( valid ) {
				$row = $( $row );
				c.$tbodies.append( $row );
			} else if (
				!$row ||
				// row is a jQuery object?
				!( $row instanceof jQuery ) ||
				// row contained in the table?
				( ts.getClosest( $row, 'table' )[ 0 ] !== c.table )
			) {
				if ( c.debug ) {
					console.error( 'addRows method requires (1) a jQuery selector reference to rows that have already ' +
						'been added to the table, or (2) row HTML string to be added to a table with only one tbody' );
				}
				return false;
			}
			table.isUpdating = true;
			if ( ts.isEmptyObject( c.cache ) ) {
				// empty table, do an update instead - fixes #450
				ts.updateHeader( c );
				ts.commonUpdate( c, resort, callback );
			} else {
				rows = $row.filter( 'tr' ).attr( 'role', 'row' ).length;
				tbodyIndex = c.$tbodies.index( $row.parents( 'tbody' ).filter( ':first' ) );
				// fixes adding rows to an empty table - see issue #179
				if ( !( c.parsers && c.parsers.length ) ) {
					ts.setupParsers( c );
				}
				// add each row
				for ( rowIndex = 0; rowIndex < rows; rowIndex++ ) {
					cacheIndex = 0;
					len = $row[ rowIndex ].cells.length;
					order = c.cache[ tbodyIndex ].normalized.length;
					cells = [];
					rowData = {
						child : [],
						raw : [],
						$row : $row.eq( rowIndex ),
						order : order
					};
					// add each cell
					for ( cellIndex = 0; cellIndex < len; cellIndex++ ) {
						cell = $row[ rowIndex ].cells[ cellIndex ];
						txt = ts.getElementText( c, cell, cacheIndex );
						rowData.raw[ cacheIndex ] = txt;
						val = ts.getParsedText( c, cell, cacheIndex, txt );
						cells[ cacheIndex ] = val;
						if ( ( c.parsers[ cacheIndex ].type || '' ).toLowerCase() === 'numeric' ) {
							// update column max value (ignore sign)
							c.cache[ tbodyIndex ].colMax[ cacheIndex ] =
								Math.max( Math.abs( val ) || 0, c.cache[ tbodyIndex ].colMax[ cacheIndex ] || 0 );
						}
						span = cell.colSpan - 1;
						if ( span > 0 ) {
							cacheIndex += span;
						}
						cacheIndex++;
					}
					// add the row data to the end
					cells[ c.columns ] = rowData;
					// update cache
					c.cache[ tbodyIndex ].normalized[ order ] = cells;
				}
				// resort using current settings
				ts.checkResort( c, resort, callback );
			}
		},

		updateCache : function( c, callback, $tbodies ) {
			// rebuild parsers
			if ( !( c.parsers && c.parsers.length ) ) {
				ts.setupParsers( c, $tbodies );
			}
			// rebuild the cache map
			ts.buildCache( c, callback, $tbodies );
		},

		// init flag (true) used by pager plugin to prevent widget application
		// renamed from appendToTable
		appendCache : function( c, init ) {
			var parsed, totalRows, $tbody, $curTbody, rowIndex, tbodyIndex, appendTime,
				table = c.table,
				wo = c.widgetOptions,
				$tbodies = c.$tbodies,
				rows = [],
				cache = c.cache;
			// empty table - fixes #206/#346
			if ( ts.isEmptyObject( cache ) ) {
				// run pager appender in case the table was just emptied
				return c.appender ? c.appender( table, rows ) :
					table.isUpdating ? c.$table.triggerHandler( 'updateComplete', table ) : ''; // Fixes #532
			}
			if ( c.debug ) {
				appendTime = new Date();
			}
			for ( tbodyIndex = 0; tbodyIndex < $tbodies.length; tbodyIndex++ ) {
				$tbody = $tbodies.eq( tbodyIndex );
				if ( $tbody.length ) {
					// detach tbody for manipulation
					$curTbody = ts.processTbody( table, $tbody, true );
					parsed = cache[ tbodyIndex ].normalized;
					totalRows = parsed.length;
					for ( rowIndex = 0; rowIndex < totalRows; rowIndex++ ) {
						rows[rows.length] = parsed[ rowIndex ][ c.columns ].$row;
						// removeRows used by the pager plugin; don't render if using ajax - fixes #411
						if ( !c.appender || ( c.pager && ( !c.pager.removeRows || !wo.pager_removeRows ) && !c.pager.ajax ) ) {
							$curTbody.append( parsed[ rowIndex ][ c.columns ].$row );
						}
					}
					// restore tbody
					ts.processTbody( table, $curTbody, false );
				}
			}
			if ( c.appender ) {
				c.appender( table, rows );
			}
			if ( c.debug ) {
				console.log( 'Rebuilt table' + ts.benchmark( appendTime ) );
			}
			// apply table widgets; but not before ajax completes
			if ( !init && !c.appender ) {
				ts.applyWidget( table );
			}
			if ( table.isUpdating ) {
				c.$table.triggerHandler( 'updateComplete', table );
			}
		},

		commonUpdate : function( c, resort, callback ) {
			// remove rows/elements before update
			c.$table.find( c.selectorRemove ).remove();
			// rebuild parsers
			ts.setupParsers( c );
			// rebuild the cache map
			ts.buildCache( c );
			ts.checkResort( c, resort, callback );
		},

		/*
		▄█████ ▄████▄ █████▄ ██████ ██ █████▄ ▄████▄
		▀█▄    ██  ██ ██▄▄██   ██   ██ ██  ██ ██ ▄▄▄
		   ▀█▄ ██  ██ ██▀██    ██   ██ ██  ██ ██ ▀██
		█████▀ ▀████▀ ██  ██   ██   ██ ██  ██ ▀████▀
		*/
		initSort : function( c, cell, event ) {
			if ( c.table.isUpdating ) {
				// let any updates complete before initializing a sort
				return setTimeout( function(){
					ts.initSort( c, cell, event );
				}, 50 );
			}

			var arry, indx, headerIndx, dir, temp, tmp, $header,
				notMultiSort = !event[ c.sortMultiSortKey ],
				table = c.table,
				len = c.$headers.length,
				th = ts.getClosest( $( cell ), 'th, td' ),
				col = parseInt( th.attr( 'data-column' ), 10 ),
				order = c.sortVars[ col ].order;
			th = th[0];
			// Only call sortStart if sorting is enabled
			c.$table.triggerHandler( 'sortStart', table );
			// get current column sort order
			tmp = ( c.sortVars[ col ].count + 1 ) % order.length;
			c.sortVars[ col ].count = event[ c.sortResetKey ] ? 2 : tmp;
			// reset all sorts on non-current column - issue #30
			if ( c.sortRestart ) {
				for ( headerIndx = 0; headerIndx < len; headerIndx++ ) {
					$header = c.$headers.eq( headerIndx );
					tmp = parseInt( $header.attr( 'data-column' ), 10 );
					// only reset counts on columns that weren't just clicked on and if not included in a multisort
					if ( col !== tmp && ( notMultiSort || $header.hasClass( ts.css.sortNone ) ) ) {
						c.sortVars[ tmp ].count = -1;
					}
				}
			}
			// user only wants to sort on one column
			if ( notMultiSort ) {
				// flush the sort list
				c.sortList = [];
				c.last.sortList = [];
				if ( c.sortForce !== null ) {
					arry = c.sortForce;
					for ( indx = 0; indx < arry.length; indx++ ) {
						if ( arry[ indx ][ 0 ] !== col ) {
							c.sortList[ c.sortList.length ] = arry[ indx ];
						}
					}
				}
				// add column to sort list
				dir = order[ c.sortVars[ col ].count ];
				if ( dir < 2 ) {
					c.sortList[ c.sortList.length ] = [ col, dir ];
					// add other columns if header spans across multiple
					if ( th.colSpan > 1 ) {
						for ( indx = 1; indx < th.colSpan; indx++ ) {
							c.sortList[ c.sortList.length ] = [ col + indx, dir ];
							// update count on columns in colSpan
							c.sortVars[ col + indx ].count = $.inArray( dir, order );
						}
					}
				}
				// multi column sorting
			} else {
				// get rid of the sortAppend before adding more - fixes issue #115 & #523
				c.sortList = $.extend( [], c.last.sortList );

				// the user has clicked on an already sorted column
				if ( ts.isValueInArray( col, c.sortList ) >= 0 ) {
					// reverse the sorting direction
					for ( indx = 0; indx < c.sortList.length; indx++ ) {
						tmp = c.sortList[ indx ];
						if ( tmp[ 0 ] === col ) {
							// order.count seems to be incorrect when compared to cell.count
							tmp[ 1 ] = order[ c.sortVars[ col ].count ];
							if ( tmp[1] === 2 ) {
								c.sortList.splice( indx, 1 );
								c.sortVars[ col ].count = -1;
							}
						}
					}
				} else {
					// add column to sort list array
					dir = order[ c.sortVars[ col ].count ];
					if ( dir < 2 ) {
						c.sortList[ c.sortList.length ] = [ col, dir ];
						// add other columns if header spans across multiple
						if ( th.colSpan > 1 ) {
							for ( indx = 1; indx < th.colSpan; indx++ ) {
								c.sortList[ c.sortList.length ] = [ col + indx, dir ];
								// update count on columns in colSpan
								c.sortVars[ col + indx ].count = $.inArray( dir, order );
							}
						}
					}
				}
			}
			// save sort before applying sortAppend
			c.last.sortList = $.extend( [], c.sortList );
			if ( c.sortList.length && c.sortAppend ) {
				arry = $.isArray( c.sortAppend ) ? c.sortAppend : c.sortAppend[ c.sortList[ 0 ][ 0 ] ];
				if ( !ts.isEmptyObject( arry ) ) {
					for ( indx = 0; indx < arry.length; indx++ ) {
						if ( arry[ indx ][ 0 ] !== col && ts.isValueInArray( arry[ indx ][ 0 ], c.sortList ) < 0 ) {
							dir = arry[ indx ][ 1 ];
							temp = ( '' + dir ).match( /^(a|d|s|o|n)/ );
							if ( temp ) {
								tmp = c.sortList[ 0 ][ 1 ];
								switch ( temp[ 0 ] ) {
									case 'd' :
										dir = 1;
										break;
									case 's' :
										dir = tmp;
										break;
									case 'o' :
										dir = tmp === 0 ? 1 : 0;
										break;
									case 'n' :
										dir = ( tmp + 1 ) % order.length;
										break;
									default:
										dir = 0;
										break;
								}
							}
							c.sortList[ c.sortList.length ] = [ arry[ indx ][ 0 ], dir ];
						}
					}
				}
			}
			// sortBegin event triggered immediately before the sort
			c.$table.triggerHandler( 'sortBegin', table );
			// setTimeout needed so the processing icon shows up
			setTimeout( function() {
				// set css for headers
				ts.setHeadersCss( c );
				ts.multisort( c );
				ts.appendCache( c );
				c.$table.triggerHandler( 'sortBeforeEnd', table );
				c.$table.triggerHandler( 'sortEnd', table );
			}, 1 );
		},

		// sort multiple columns
		multisort : function( c ) { /*jshint loopfunc:true */
			var tbodyIndex, sortTime, colMax, rows, tmp,
				table = c.table,
				sorter = [],
				dir = 0,
				textSorter = c.textSorter || '',
				sortList = c.sortList,
				sortLen = sortList.length,
				len = c.$tbodies.length;
			if ( c.serverSideSorting || ts.isEmptyObject( c.cache ) ) {
				// empty table - fixes #206/#346
				return;
			}
			if ( c.debug ) { sortTime = new Date(); }
			// cache textSorter to optimize speed
			if ( typeof textSorter === 'object' ) {
				colMax = c.columns;
				while ( colMax-- ) {
					tmp = ts.getColumnData( table, textSorter, colMax );
					if ( typeof tmp === 'function' ) {
						sorter[ colMax ] = tmp;
					}
				}
			}
			for ( tbodyIndex = 0; tbodyIndex < len; tbodyIndex++ ) {
				colMax = c.cache[ tbodyIndex ].colMax;
				rows = c.cache[ tbodyIndex ].normalized;

				rows.sort( function( a, b ) {
					var sortIndex, num, col, order, sort, x, y;
					// rows is undefined here in IE, so don't use it!
					for ( sortIndex = 0; sortIndex < sortLen; sortIndex++ ) {
						col = sortList[ sortIndex ][ 0 ];
						order = sortList[ sortIndex ][ 1 ];
						// sort direction, true = asc, false = desc
						dir = order === 0;

						if ( c.sortStable && a[ col ] === b[ col ] && sortLen === 1 ) {
							return a[ c.columns ].order - b[ c.columns ].order;
						}

						// fallback to natural sort since it is more robust
						num = /n/i.test( ts.getSortType( c.parsers, col ) );
						if ( num && c.strings[ col ] ) {
							// sort strings in numerical columns
							if ( typeof ( ts.string[ c.strings[ col ] ] ) === 'boolean' ) {
								num = ( dir ? 1 : -1 ) * ( ts.string[ c.strings[ col ] ] ? -1 : 1 );
							} else {
								num = ( c.strings[ col ] ) ? ts.string[ c.strings[ col ] ] || 0 : 0;
							}
							// fall back to built-in numeric sort
							// var sort = $.tablesorter['sort' + s]( a[col], b[col], dir, colMax[col], table );
							sort = c.numberSorter ? c.numberSorter( a[ col ], b[ col ], dir, colMax[ col ], table ) :
								ts[ 'sortNumeric' + ( dir ? 'Asc' : 'Desc' ) ]( a[ col ], b[ col ], num, colMax[ col ], col, c );
						} else {
							// set a & b depending on sort direction
							x = dir ? a : b;
							y = dir ? b : a;
							// text sort function
							if ( typeof textSorter === 'function' ) {
								// custom OVERALL text sorter
								sort = textSorter( x[ col ], y[ col ], dir, col, table );
							} else if ( typeof sorter[ col ] === 'function' ) {
								// custom text sorter for a SPECIFIC COLUMN
								sort = sorter[ col ]( x[ col ], y[ col ], dir, col, table );
							} else {
								// fall back to natural sort
								sort = ts[ 'sortNatural' + ( dir ? 'Asc' : 'Desc' ) ]( a[ col ], b[ col ], col, c );
							}
						}
						if ( sort ) { return sort; }
					}
					return a[ c.columns ].order - b[ c.columns ].order;
				});
			}
			if ( c.debug ) {
				console.log( 'Applying sort ' + sortList.toString() + ts.benchmark( sortTime ) );
			}
		},

		resortComplete : function( c, callback ) {
			if ( c.table.isUpdating ) {
				c.$table.triggerHandler( 'updateComplete', c.table );
			}
			if ( $.isFunction( callback ) ) {
				callback( c.table );
			}
		},

		checkResort : function( c, resort, callback ) {
			var sortList = $.isArray( resort ) ? resort : c.sortList,
				// if no resort parameter is passed, fallback to config.resort (true by default)
				resrt = typeof resort === 'undefined' ? c.resort : resort;
			// don't try to resort if the table is still processing
			// this will catch spamming of the updateCell method
			if ( resrt !== false && !c.serverSideSorting && !c.table.isProcessing ) {
				if ( sortList.length ) {
					ts.sortOn( c, sortList, function() {
						ts.resortComplete( c, callback );
					}, true );
				} else {
					ts.sortReset( c, function() {
						ts.resortComplete( c, callback );
						ts.applyWidget( c.table, false );
					} );
				}
			} else {
				ts.resortComplete( c, callback );
				ts.applyWidget( c.table, false );
			}
		},

		sortOn : function( c, list, callback, init ) {
			var table = c.table;
			c.$table.triggerHandler( 'sortStart', table );
			// update header count index
			ts.updateHeaderSortCount( c, list );
			// set css for headers
			ts.setHeadersCss( c );
			// fixes #346
			if ( c.delayInit && ts.isEmptyObject( c.cache ) ) {
				ts.buildCache( c );
			}
			c.$table.triggerHandler( 'sortBegin', table );
			// sort the table and append it to the dom
			ts.multisort( c );
			ts.appendCache( c, init );
			c.$table.triggerHandler( 'sortBeforeEnd', table );
			c.$table.triggerHandler( 'sortEnd', table );
			ts.applyWidget( table );
			if ( $.isFunction( callback ) ) {
				callback( table );
			}
		},

		sortReset : function( c, callback ) {
			c.sortList = [];
			ts.setHeadersCss( c );
			ts.multisort( c );
			ts.appendCache( c );
			var indx;
			for (indx = 0; indx < c.columns; indx++) {
				c.sortVars[ indx ].count = -1;
			}
			if ( $.isFunction( callback ) ) {
				callback( c.table );
			}
		},

		getSortType : function( parsers, column ) {
			return ( parsers && parsers[ column ] ) ? parsers[ column ].type || '' : '';
		},

		getOrder : function( val ) {
			// look for 'd' in 'desc' order; return true
			return ( /^d/i.test( val ) || val === 1 );
		},

		// Natural sort - https://github.com/overset/javascript-natural-sort (date sorting removed)
		sortNatural : function( a, b ) {
			if ( a === b ) { return 0; }
			a = a.toString();
			b = b.toString();
			var aNum, bNum, aFloat, bFloat, indx, max,
				regex = ts.regex;
			// first try and sort Hex codes
			if ( regex.hex.test( b ) ) {
				aNum = parseInt( ( a || '' ).match( regex.hex ), 16 );
				bNum = parseInt( ( b || '' ).match( regex.hex ), 16 );
				if ( aNum < bNum ) { return -1; }
				if ( aNum > bNum ) { return 1; }
			}
			// chunk/tokenize
			aNum = ( a || '' ).replace( regex.chunk, '\\0$1\\0' ).replace( regex.chunks, '' ).split( '\\0' );
			bNum = ( b || '' ).replace( regex.chunk, '\\0$1\\0' ).replace( regex.chunks, '' ).split( '\\0' );
			max = Math.max( aNum.length, bNum.length );
			// natural sorting through split numeric strings and default strings
			for ( indx = 0; indx < max; indx++ ) {
				// find floats not starting with '0', string or 0 if not defined
				aFloat = isNaN( aNum[ indx ] ) ? aNum[ indx ] || 0 : parseFloat( aNum[ indx ] ) || 0;
				bFloat = isNaN( bNum[ indx ] ) ? bNum[ indx ] || 0 : parseFloat( bNum[ indx ] ) || 0;
				// handle numeric vs string comparison - number < string - (Kyle Adams)
				if ( isNaN( aFloat ) !== isNaN( bFloat ) ) { return isNaN( aFloat ) ? 1 : -1; }
				// rely on string comparison if different types - i.e. '02' < 2 != '02' < '2'
				if ( typeof aFloat !== typeof bFloat ) {
					aFloat += '';
					bFloat += '';
				}
				if ( aFloat < bFloat ) { return -1; }
				if ( aFloat > bFloat ) { return 1; }
			}
			return 0;
		},

		sortNaturalAsc : function( a, b, col, c ) {
			if ( a === b ) { return 0; }
			var empty = ts.string[ ( c.empties[ col ] || c.emptyTo ) ];
			if ( a === '' && empty !== 0 ) { return typeof empty === 'boolean' ? ( empty ? -1 : 1 ) : -empty || -1; }
			if ( b === '' && empty !== 0 ) { return typeof empty === 'boolean' ? ( empty ? 1 : -1 ) : empty || 1; }
			return ts.sortNatural( a, b );
		},

		sortNaturalDesc : function( a, b, col, c ) {
			if ( a === b ) { return 0; }
			var empty = ts.string[ ( c.empties[ col ] || c.emptyTo ) ];
			if ( a === '' && empty !== 0 ) { return typeof empty === 'boolean' ? ( empty ? -1 : 1 ) : empty || 1; }
			if ( b === '' && empty !== 0 ) { return typeof empty === 'boolean' ? ( empty ? 1 : -1 ) : -empty || -1; }
			return ts.sortNatural( b, a );
		},

		// basic alphabetical sort
		sortText : function( a, b ) {
			return a > b ? 1 : ( a < b ? -1 : 0 );
		},

		// return text string value by adding up ascii value
		// so the text is somewhat sorted when using a digital sort
		// this is NOT an alphanumeric sort
		getTextValue : function( val, num, max ) {
			if ( max ) {
				// make sure the text value is greater than the max numerical value (max)
				var indx,
					len = val ? val.length : 0,
					n = max + num;
				for ( indx = 0; indx < len; indx++ ) {
					n += val.charCodeAt( indx );
				}
				return num * n;
			}
			return 0;
		},

		sortNumericAsc : function( a, b, num, max, col, c ) {
			if ( a === b ) { return 0; }
			var empty = ts.string[ ( c.empties[ col ] || c.emptyTo ) ];
			if ( a === '' && empty !== 0 ) { return typeof empty === 'boolean' ? ( empty ? -1 : 1 ) : -empty || -1; }
			if ( b === '' && empty !== 0 ) { return typeof empty === 'boolean' ? ( empty ? 1 : -1 ) : empty || 1; }
			if ( isNaN( a ) ) { a = ts.getTextValue( a, num, max ); }
			if ( isNaN( b ) ) { b = ts.getTextValue( b, num, max ); }
			return a - b;
		},

		sortNumericDesc : function( a, b, num, max, col, c ) {
			if ( a === b ) { return 0; }
			var empty = ts.string[ ( c.empties[ col ] || c.emptyTo ) ];
			if ( a === '' && empty !== 0 ) { return typeof empty === 'boolean' ? ( empty ? -1 : 1 ) : empty || 1; }
			if ( b === '' && empty !== 0 ) { return typeof empty === 'boolean' ? ( empty ? 1 : -1 ) : -empty || -1; }
			if ( isNaN( a ) ) { a = ts.getTextValue( a, num, max ); }
			if ( isNaN( b ) ) { b = ts.getTextValue( b, num, max ); }
			return b - a;
		},

		sortNumeric : function( a, b ) {
			return a - b;
		},

		/*
		██ ██ ██ ██ █████▄ ▄████▄ ██████ ██████ ▄█████
		██ ██ ██ ██ ██  ██ ██ ▄▄▄ ██▄▄     ██   ▀█▄
		██ ██ ██ ██ ██  ██ ██ ▀██ ██▀▀     ██      ▀█▄
		███████▀ ██ █████▀ ▀████▀ ██████   ██   █████▀
		*/
		addWidget : function( widget ) {
			if ( widget.id && !ts.isEmptyObject( ts.getWidgetById( widget.id ) ) ) {
				console.warn( '"' + widget.id + '" widget was loaded more than once!' );
			}
			ts.widgets[ ts.widgets.length ] = widget;
		},

		hasWidget : function( $table, name ) {
			$table = $( $table );
			return $table.length && $table[ 0 ].config && $table[ 0 ].config.widgetInit[ name ] || false;
		},

		getWidgetById : function( name ) {
			var indx, widget,
				len = ts.widgets.length;
			for ( indx = 0; indx < len; indx++ ) {
				widget = ts.widgets[ indx ];
				if ( widget && widget.id && widget.id.toLowerCase() === name.toLowerCase() ) {
					return widget;
				}
			}
		},

		applyWidgetOptions : function( table ) {
			var indx, widget, wo,
				c = table.config,
				len = c.widgets.length;
			if ( len ) {
				for ( indx = 0; indx < len; indx++ ) {
					widget = ts.getWidgetById( c.widgets[ indx ] );
					if ( widget && widget.options ) {
						wo = $.extend( true, {}, widget.options );
						c.widgetOptions = $.extend( true, wo, c.widgetOptions );
						// add widgetOptions to defaults for option validator
						$.extend( true, ts.defaults.widgetOptions, widget.options );
					}
				}
			}
		},

		addWidgetFromClass : function( table ) {
			var len, indx,
				c = table.config,
				// look for widgets to apply from table class
				// don't match from 'ui-widget-content'; use \S instead of \w to include widgets
				// with dashes in the name, e.g. "widget-test-2" extracts out "test-2"
				regex = '^' + c.widgetClass.replace( ts.regex.templateName, '(\\S+)+' ) + '$',
				widgetClass = new RegExp( regex, 'g' ),
				// split up table class (widget id's can include dashes) - stop using match
				// otherwise only one widget gets extracted, see #1109
				widgets = ( table.className || '' ).split( ts.regex.spaces );
			if ( widgets.length ) {
				len = widgets.length;
				for ( indx = 0; indx < len; indx++ ) {
					if ( widgets[ indx ].match( widgetClass ) ) {
						c.widgets[ c.widgets.length ] = widgets[ indx ].replace( widgetClass, '$1' );
					}
				}
			}
		},

		applyWidgetId : function( table, id, init ) {
			table = $(table)[0];
			var applied, time, name,
				c = table.config,
				wo = c.widgetOptions,
				widget = ts.getWidgetById( id );
			if ( widget ) {
				name = widget.id;
				applied = false;
				// add widget name to option list so it gets reapplied after sorting, filtering, etc
				if ( $.inArray( name, c.widgets ) < 0 ) {
					c.widgets[ c.widgets.length ] = name;
				}
				if ( c.debug ) { time = new Date(); }

				if ( init || !( c.widgetInit[ name ] ) ) {
					// set init flag first to prevent calling init more than once (e.g. pager)
					c.widgetInit[ name ] = true;
					if ( table.hasInitialized ) {
						// don't reapply widget options on tablesorter init
						ts.applyWidgetOptions( table );
					}
					if ( typeof widget.init === 'function' ) {
						applied = true;
						if ( c.debug ) {
							console[ console.group ? 'group' : 'log' ]( 'Initializing ' + name + ' widget' );
						}
						widget.init( table, widget, c, wo );
					}
				}
				if ( !init && typeof widget.format === 'function' ) {
					applied = true;
					if ( c.debug ) {
						console[ console.group ? 'group' : 'log' ]( 'Updating ' + name + ' widget' );
					}
					widget.format( table, c, wo, false );
				}
				if ( c.debug ) {
					if ( applied ) {
						console.log( 'Completed ' + ( init ? 'initializing ' : 'applying ' ) + name + ' widget' + ts.benchmark( time ) );
						if ( console.groupEnd ) { console.groupEnd(); }
					}
				}
			}
		},

		applyWidget : function( table, init, callback ) {
			table = $( table )[ 0 ]; // in case this is called externally
			var indx, len, names, widget, time,
				c = table.config,
				widgets = [];
			// prevent numerous consecutive widget applications
			if ( init !== false && table.hasInitialized && ( table.isApplyingWidgets || table.isUpdating ) ) {
				return;
			}
			if ( c.debug ) { time = new Date(); }
			ts.addWidgetFromClass( table );
			// prevent "tablesorter-ready" from firing multiple times in a row
			clearTimeout( c.timerReady );
			if ( c.widgets.length ) {
				table.isApplyingWidgets = true;
				// ensure unique widget ids
				c.widgets = $.grep( c.widgets, function( val, index ) {
					return $.inArray( val, c.widgets ) === index;
				});
				names = c.widgets || [];
				len = names.length;
				// build widget array & add priority as needed
				for ( indx = 0; indx < len; indx++ ) {
					widget = ts.getWidgetById( names[ indx ] );
					if ( widget && widget.id ) {
						// set priority to 10 if not defined
						if ( !widget.priority ) { widget.priority = 10; }
						widgets[ indx ] = widget;
					} else if ( c.debug ) {
						console.warn( '"' + names[ indx ] + '" was enabled, but the widget code has not been loaded!' );
					}
				}
				// sort widgets by priority
				widgets.sort( function( a, b ) {
					return a.priority < b.priority ? -1 : a.priority === b.priority ? 0 : 1;
				});
				// add/update selected widgets
				len = widgets.length;
				if ( c.debug ) {
					console[ console.group ? 'group' : 'log' ]( 'Start ' + ( init ? 'initializing' : 'applying' ) + ' widgets' );
				}
				for ( indx = 0; indx < len; indx++ ) {
					widget = widgets[ indx ];
					if ( widget && widget.id ) {
						ts.applyWidgetId( table, widget.id, init );
					}
				}
				if ( c.debug && console.groupEnd ) { console.groupEnd(); }
			}
			c.timerReady = setTimeout( function() {
				table.isApplyingWidgets = false;
				$.data( table, 'lastWidgetApplication', new Date() );
				c.$table.triggerHandler( 'tablesorter-ready' );
				// callback executed on init only
				if ( !init && typeof callback === 'function' ) {
					callback( table );
				}
				if ( c.debug ) {
					widget = c.widgets.length;
					console.log( 'Completed ' +
						( init === true ? 'initializing ' : 'applying ' ) + widget +
						' widget' + ( widget !== 1 ? 's' : '' ) + ts.benchmark( time ) );
				}
			}, 10 );
		},

		removeWidget : function( table, name, refreshing ) {
			table = $( table )[ 0 ];
			var index, widget, indx, len,
				c = table.config;
			// if name === true, add all widgets from $.tablesorter.widgets
			if ( name === true ) {
				name = [];
				len = ts.widgets.length;
				for ( indx = 0; indx < len; indx++ ) {
					widget = ts.widgets[ indx ];
					if ( widget && widget.id ) {
						name[ name.length ] = widget.id;
					}
				}
			} else {
				// name can be either an array of widgets names,
				// or a space/comma separated list of widget names
				name = ( $.isArray( name ) ? name.join( ',' ) : name || '' ).toLowerCase().split( /[\s,]+/ );
			}
			len = name.length;
			for ( index = 0; index < len; index++ ) {
				widget = ts.getWidgetById( name[ index ] );
				indx = $.inArray( name[ index ], c.widgets );
				// don't remove the widget from config.widget if refreshing
				if ( indx >= 0 && refreshing !== true ) {
					c.widgets.splice( indx, 1 );
				}
				if ( widget && widget.remove ) {
					if ( c.debug ) {
						console.log( ( refreshing ? 'Refreshing' : 'Removing' ) + ' "' + name[ index ] + '" widget' );
					}
					widget.remove( table, c, c.widgetOptions, refreshing );
					c.widgetInit[ name[ index ] ] = false;
				}
			}
			c.$table.triggerHandler( 'widgetRemoveEnd', table );
		},

		refreshWidgets : function( table, doAll, dontapply ) {
			table = $( table )[ 0 ]; // see issue #243
			var indx, widget,
				c = table.config,
				curWidgets = c.widgets,
				widgets = ts.widgets,
				len = widgets.length,
				list = [],
				callback = function( table ) {
					$( table ).triggerHandler( 'refreshComplete' );
				};
			// remove widgets not defined in config.widgets, unless doAll is true
			for ( indx = 0; indx < len; indx++ ) {
				widget = widgets[ indx ];
				if ( widget && widget.id && ( doAll || $.inArray( widget.id, curWidgets ) < 0 ) ) {
					list[ list.length ] = widget.id;
				}
			}
			ts.removeWidget( table, list.join( ',' ), true );
			if ( dontapply !== true ) {
				// call widget init if
				ts.applyWidget( table, doAll || false, callback );
				if ( doAll ) {
					// apply widget format
					ts.applyWidget( table, false, callback );
				}
			} else {
				callback( table );
			}
		},

		/*
		██  ██ ██████ ██ ██     ██ ██████ ██ ██████ ▄█████
		██  ██   ██   ██ ██     ██   ██   ██ ██▄▄   ▀█▄
		██  ██   ██   ██ ██     ██   ██   ██ ██▀▀      ▀█▄
		▀████▀   ██   ██ ██████ ██   ██   ██ ██████ █████▀
		*/
		benchmark : function( diff ) {
			return ( ' (' + ( new Date().getTime() - diff.getTime() ) + ' ms)' );
		},
		// deprecated ts.log
		log : function() {
			console.log( arguments );
		},

		// $.isEmptyObject from jQuery v1.4
		isEmptyObject : function( obj ) {
			/*jshint forin: false */
			for ( var name in obj ) {
				return false;
			}
			return true;
		},

		isValueInArray : function( column, arry ) {
			var indx,
				len = arry && arry.length || 0;
			for ( indx = 0; indx < len; indx++ ) {
				if ( arry[ indx ][ 0 ] === column ) {
					return indx;
				}
			}
			return -1;
		},

		formatFloat : function( str, table ) {
			if ( typeof str !== 'string' || str === '' ) { return str; }
			// allow using formatFloat without a table; defaults to US number format
			var num,
				usFormat = table && table.config ? table.config.usNumberFormat !== false :
					typeof table !== 'undefined' ? table : true;
			if ( usFormat ) {
				// US Format - 1,234,567.89 -> 1234567.89
				str = str.replace( ts.regex.comma, '' );
			} else {
				// German Format = 1.234.567,89 -> 1234567.89
				// French Format = 1 234 567,89 -> 1234567.89
				str = str.replace( ts.regex.digitNonUS, '' ).replace( ts.regex.comma, '.' );
			}
			if ( ts.regex.digitNegativeTest.test( str ) ) {
				// make (#) into a negative number -> (10) = -10
				str = str.replace( ts.regex.digitNegativeReplace, '-$1' );
			}
			num = parseFloat( str );
			// return the text instead of zero
			return isNaN( num ) ? $.trim( str ) : num;
		},

		isDigit : function( str ) {
			// replace all unwanted chars and match
			return isNaN( str ) ?
				ts.regex.digitTest.test( str.toString().replace( ts.regex.digitReplace, '' ) ) :
				str !== '';
		},

		// computeTableHeaderCellIndexes from:
		// http://www.javascripttoolbox.com/lib/table/examples.php
		// http://www.javascripttoolbox.com/temp/table_cellindex.html
		computeColumnIndex : function( $rows, c ) {
			var i, j, k, l, cell, cells, rowIndex, rowSpan, colSpan, firstAvailCol,
				// total columns has been calculated, use it to set the matrixrow
				columns = c && c.columns || 0,
				matrix = [],
				matrixrow = new Array( columns );
			for ( i = 0; i < $rows.length; i++ ) {
				cells = $rows[ i ].cells;
				for ( j = 0; j < cells.length; j++ ) {
					cell = cells[ j ];
					rowIndex = i;
					rowSpan = cell.rowSpan || 1;
					colSpan = cell.colSpan || 1;
					if ( typeof matrix[ rowIndex ] === 'undefined' ) {
						matrix[ rowIndex ] = [];
					}
					// Find first available column in the first row
					for ( k = 0; k < matrix[ rowIndex ].length + 1; k++ ) {
						if ( typeof matrix[ rowIndex ][ k ] === 'undefined' ) {
							firstAvailCol = k;
							break;
						}
					}
					// jscs:disable disallowEmptyBlocks
					if ( columns && cell.cellIndex === firstAvailCol ) {
						// don't to anything
					} else if ( cell.setAttribute ) {
						// jscs:enable disallowEmptyBlocks
						// add data-column (setAttribute = IE8+)
						cell.setAttribute( 'data-column', firstAvailCol );
					} else {
						// remove once we drop support for IE7 - 1/12/2016
						$( cell ).attr( 'data-column', firstAvailCol );
					}
					for ( k = rowIndex; k < rowIndex + rowSpan; k++ ) {
						if ( typeof matrix[ k ] === 'undefined' ) {
							matrix[ k ] = [];
						}
						matrixrow = matrix[ k ];
						for ( l = firstAvailCol; l < firstAvailCol + colSpan; l++ ) {
							matrixrow[ l ] = 'x';
						}
					}
				}
			}
			ts.checkColumnCount($rows, matrix, matrixrow.length);
			return matrixrow.length;
		},

		checkColumnCount : function($rows, matrix, columns) {
			// this DOES NOT report any tbody column issues, except for the math and
			// and column selector widgets
			var i, len,
				valid = true,
				cells = [];
			for ( i = 0; i < matrix.length; i++ ) {
				// some matrix entries are undefined when testing the footer because
				// it is using the rowIndex property
				if ( matrix[i] ) {
					len = matrix[i].length;
					if ( matrix[i].length !== columns ) {
						valid = false;
						break;
					}
				}
			}
			if ( !valid ) {
				$rows.each( function( indx, el ) {
					var cell = el.parentElement.nodeName;
					if ( cells.indexOf( cell ) < 0 ) {
						cells.push( cell );
					}
				});
				console.error(
					'Invalid or incorrect number of columns in the ' +
					cells.join( ' or ' ) + '; expected ' + columns +
					', but found ' + len + ' columns'
				);
			}
		},

		// automatically add a colgroup with col elements set to a percentage width
		fixColumnWidth : function( table ) {
			table = $( table )[ 0 ];
			var overallWidth, percent, $tbodies, len, index,
				c = table.config,
				$colgroup = c.$table.children( 'colgroup' );
			// remove plugin-added colgroup, in case we need to refresh the widths
			if ( $colgroup.length && $colgroup.hasClass( ts.css.colgroup ) ) {
				$colgroup.remove();
			}
			if ( c.widthFixed && c.$table.children( 'colgroup' ).length === 0 ) {
				$colgroup = $( '<colgroup class="' + ts.css.colgroup + '">' );
				overallWidth = c.$table.width();
				// only add col for visible columns - fixes #371
				$tbodies = c.$tbodies.find( 'tr:first' ).children( ':visible' );
				len = $tbodies.length;
				for ( index = 0; index < len; index++ ) {
					percent = parseInt( ( $tbodies.eq( index ).width() / overallWidth ) * 1000, 10 ) / 10 + '%';
					$colgroup.append( $( '<col>' ).css( 'width', percent ) );
				}
				c.$table.prepend( $colgroup );
			}
		},

		// get sorter, string, empty, etc options for each column from
		// jQuery data, metadata, header option or header class name ('sorter-false')
		// priority = jQuery data > meta > headers option > header class name
		getData : function( header, configHeader, key ) {
			var meta, cl4ss,
				val = '',
				$header = $( header );
			if ( !$header.length ) { return ''; }
			meta = $.metadata ? $header.metadata() : false;
			cl4ss = ' ' + ( $header.attr( 'class' ) || '' );
			if ( typeof $header.data( key ) !== 'undefined' ||
				typeof $header.data( key.toLowerCase() ) !== 'undefined' ) {
				// 'data-lockedOrder' is assigned to 'lockedorder'; but 'data-locked-order' is assigned to 'lockedOrder'
				// 'data-sort-initial-order' is assigned to 'sortInitialOrder'
				val += $header.data( key ) || $header.data( key.toLowerCase() );
			} else if ( meta && typeof meta[ key ] !== 'undefined' ) {
				val += meta[ key ];
			} else if ( configHeader && typeof configHeader[ key ] !== 'undefined' ) {
				val += configHeader[ key ];
			} else if ( cl4ss !== ' ' && cl4ss.match( ' ' + key + '-' ) ) {
				// include sorter class name 'sorter-text', etc; now works with 'sorter-my-custom-parser'
				val = cl4ss.match( new RegExp( '\\s' + key + '-([\\w-]+)' ) )[ 1 ] || '';
			}
			return $.trim( val );
		},

		getColumnData : function( table, obj, indx, getCell, $headers ) {
			if ( typeof obj !== 'object' || obj === null ) {
				return obj;
			}
			table = $( table )[ 0 ];
			var $header, key,
				c = table.config,
				$cells = ( $headers || c.$headers ),
				// c.$headerIndexed is not defined initially
				$cell = c.$headerIndexed && c.$headerIndexed[ indx ] ||
					$cells.find( '[data-column="' + indx + '"]:last' );
			if ( typeof obj[ indx ] !== 'undefined' ) {
				return getCell ? obj[ indx ] : obj[ $cells.index( $cell ) ];
			}
			for ( key in obj ) {
				if ( typeof key === 'string' ) {
					$header = $cell
						// header cell with class/id
						.filter( key )
						// find elements within the header cell with cell/id
						.add( $cell.find( key ) );
					if ( $header.length ) {
						return obj[ key ];
					}
				}
			}
			return;
		},

		// *** Process table ***
		// add processing indicator
		isProcessing : function( $table, toggle, $headers ) {
			$table = $( $table );
			var c = $table[ 0 ].config,
				// default to all headers
				$header = $headers || $table.find( '.' + ts.css.header );
			if ( toggle ) {
				// don't use sortList if custom $headers used
				if ( typeof $headers !== 'undefined' && c.sortList.length > 0 ) {
					// get headers from the sortList
					$header = $header.filter( function() {
						// get data-column from attr to keep compatibility with jQuery 1.2.6
						return this.sortDisabled ?
							false :
							ts.isValueInArray( parseFloat( $( this ).attr( 'data-column' ) ), c.sortList ) >= 0;
					});
				}
				$table.add( $header ).addClass( ts.css.processing + ' ' + c.cssProcessing );
			} else {
				$table.add( $header ).removeClass( ts.css.processing + ' ' + c.cssProcessing );
			}
		},

		// detach tbody but save the position
		// don't use tbody because there are portions that look for a tbody index (updateCell)
		processTbody : function( table, $tb, getIt ) {
			table = $( table )[ 0 ];
			if ( getIt ) {
				table.isProcessing = true;
				$tb.before( '<colgroup class="tablesorter-savemyplace"/>' );
				return $.fn.detach ? $tb.detach() : $tb.remove();
			}
			var holdr = $( table ).find( 'colgroup.tablesorter-savemyplace' );
			$tb.insertAfter( holdr );
			holdr.remove();
			table.isProcessing = false;
		},

		clearTableBody : function( table ) {
			$( table )[ 0 ].config.$tbodies.children().detach();
		},

		// used when replacing accented characters during sorting
		characterEquivalents : {
			'a' : '\u00e1\u00e0\u00e2\u00e3\u00e4\u0105\u00e5', // áàâãäąå
			'A' : '\u00c1\u00c0\u00c2\u00c3\u00c4\u0104\u00c5', // ÁÀÂÃÄĄÅ
			'c' : '\u00e7\u0107\u010d', // çćč
			'C' : '\u00c7\u0106\u010c', // ÇĆČ
			'e' : '\u00e9\u00e8\u00ea\u00eb\u011b\u0119', // éèêëěę
			'E' : '\u00c9\u00c8\u00ca\u00cb\u011a\u0118', // ÉÈÊËĚĘ
			'i' : '\u00ed\u00ec\u0130\u00ee\u00ef\u0131', // íìİîïı
			'I' : '\u00cd\u00cc\u0130\u00ce\u00cf', // ÍÌİÎÏ
			'o' : '\u00f3\u00f2\u00f4\u00f5\u00f6\u014d', // óòôõöō
			'O' : '\u00d3\u00d2\u00d4\u00d5\u00d6\u014c', // ÓÒÔÕÖŌ
			'ss': '\u00df', // ß (s sharp)
			'SS': '\u1e9e', // ẞ (Capital sharp s)
			'u' : '\u00fa\u00f9\u00fb\u00fc\u016f', // úùûüů
			'U' : '\u00da\u00d9\u00db\u00dc\u016e' // ÚÙÛÜŮ
		},

		replaceAccents : function( str ) {
			var chr,
				acc = '[',
				eq = ts.characterEquivalents;
			if ( !ts.characterRegex ) {
				ts.characterRegexArray = {};
				for ( chr in eq ) {
					if ( typeof chr === 'string' ) {
						acc += eq[ chr ];
						ts.characterRegexArray[ chr ] = new RegExp( '[' + eq[ chr ] + ']', 'g' );
					}
				}
				ts.characterRegex = new RegExp( acc + ']' );
			}
			if ( ts.characterRegex.test( str ) ) {
				for ( chr in eq ) {
					if ( typeof chr === 'string' ) {
						str = str.replace( ts.characterRegexArray[ chr ], chr );
					}
				}
			}
			return str;
		},

		validateOptions : function( c ) {
			var setting, setting2, typ, timer,
				// ignore options containing an array
				ignore = 'headers sortForce sortList sortAppend widgets'.split( ' ' ),
				orig = c.originalSettings;
			if ( orig ) {
				if ( c.debug ) {
					timer = new Date();
				}
				for ( setting in orig ) {
					typ = typeof ts.defaults[setting];
					if ( typ === 'undefined' ) {
						console.warn( 'Tablesorter Warning! "table.config.' + setting + '" option not recognized' );
					} else if ( typ === 'object' ) {
						for ( setting2 in orig[setting] ) {
							typ = ts.defaults[setting] && typeof ts.defaults[setting][setting2];
							if ( $.inArray( setting, ignore ) < 0 && typ === 'undefined' ) {
								console.warn( 'Tablesorter Warning! "table.config.' + setting + '.' + setting2 + '" option not recognized' );
							}
						}
					}
				}
				if ( c.debug ) {
					console.log( 'validate options time:' + ts.benchmark( timer ) );
				}
			}
		},

		// restore headers
		restoreHeaders : function( table ) {
			var index, $cell,
				c = $( table )[ 0 ].config,
				$headers = c.$table.find( c.selectorHeaders ),
				len = $headers.length;
			// don't use c.$headers here in case header cells were swapped
			for ( index = 0; index < len; index++ ) {
				$cell = $headers.eq( index );
				// only restore header cells if it is wrapped
				// because this is also used by the updateAll method
				if ( $cell.find( '.' + ts.css.headerIn ).length ) {
					$cell.html( c.headerContent[ index ] );
				}
			}
		},

		destroy : function( table, removeClasses, callback ) {
			table = $( table )[ 0 ];
			if ( !table.hasInitialized ) { return; }
			// remove all widgets
			ts.removeWidget( table, true, false );
			var events,
				$t = $( table ),
				c = table.config,
				debug = c.debug,
				$h = $t.find( 'thead:first' ),
				$r = $h.find( 'tr.' + ts.css.headerRow ).removeClass( ts.css.headerRow + ' ' + c.cssHeaderRow ),
				$f = $t.find( 'tfoot:first > tr' ).children( 'th, td' );
			if ( removeClasses === false && $.inArray( 'uitheme', c.widgets ) >= 0 ) {
				// reapply uitheme classes, in case we want to maintain appearance
				$t.triggerHandler( 'applyWidgetId', [ 'uitheme' ] );
				$t.triggerHandler( 'applyWidgetId', [ 'zebra' ] );
			}
			// remove widget added rows, just in case
			$h.find( 'tr' ).not( $r ).remove();
			// disable tablesorter - not using .unbind( namespace ) because namespacing was
			// added in jQuery v1.4.3 - see http://api.jquery.com/event.namespace/
			events = 'sortReset update updateRows updateAll updateHeaders updateCell addRows updateComplete sorton ' +
				'appendCache updateCache applyWidgetId applyWidgets refreshWidgets removeWidget destroy mouseup mouseleave ' +
				'keypress sortBegin sortEnd resetToLoadState '.split( ' ' )
				.join( c.namespace + ' ' );
			$t
				.removeData( 'tablesorter' )
				.unbind( events.replace( ts.regex.spaces, ' ' ) );
			c.$headers
				.add( $f )
				.removeClass( [ ts.css.header, c.cssHeader, c.cssAsc, c.cssDesc, ts.css.sortAsc, ts.css.sortDesc, ts.css.sortNone ].join( ' ' ) )
				.removeAttr( 'data-column' )
				.removeAttr( 'aria-label' )
				.attr( 'aria-disabled', 'true' );
			$r
				.find( c.selectorSort )
				.unbind( ( 'mousedown mouseup keypress '.split( ' ' ).join( c.namespace + ' ' ) ).replace( ts.regex.spaces, ' ' ) );
			ts.restoreHeaders( table );
			$t.toggleClass( ts.css.table + ' ' + c.tableClass + ' tablesorter-' + c.theme, removeClasses === false );
			$t.removeClass(c.namespace.slice(1));
			// clear flag in case the plugin is initialized again
			table.hasInitialized = false;
			delete table.config.cache;
			if ( typeof callback === 'function' ) {
				callback( table );
			}
			if ( debug ) {
				console.log( 'tablesorter has been removed' );
			}
		}

	};

	$.fn.tablesorter = function( settings ) {
		return this.each( function() {
			var table = this,
			// merge & extend config options
			c = $.extend( true, {}, ts.defaults, settings, ts.instanceMethods );
			// save initial settings
			c.originalSettings = settings;
			// create a table from data (build table widget)
			if ( !table.hasInitialized && ts.buildTable && this.nodeName !== 'TABLE' ) {
				// return the table (in case the original target is the table's container)
				ts.buildTable( table, c );
			} else {
				ts.setup( table, c );
			}
		});
	};

	// set up debug logs
	if ( !( window.console && window.console.log ) ) {
		// access $.tablesorter.logs for browsers that don't have a console...
		ts.logs = [];
		/*jshint -W020 */
		console = {};
		console.log = console.warn = console.error = console.table = function() {
			var arg = arguments.length > 1 ? arguments : arguments[0];
			ts.logs[ ts.logs.length ] = { date: Date.now(), log: arg };
		};
	}

	// add default parsers
	ts.addParser({
		id : 'no-parser',
		is : function() {
			return false;
		},
		format : function() {
			return '';
		},
		type : 'text'
	});

	ts.addParser({
		id : 'text',
		is : function() {
			return true;
		},
		format : function( str, table ) {
			var c = table.config;
			if ( str ) {
				str = $.trim( c.ignoreCase ? str.toLocaleLowerCase() : str );
				str = c.sortLocaleCompare ? ts.replaceAccents( str ) : str;
			}
			return str;
		},
		type : 'text'
	});

	ts.regex.nondigit = /[^\w,. \-()]/g;
	ts.addParser({
		id : 'digit',
		is : function( str ) {
			return ts.isDigit( str );
		},
		format : function( str, table ) {
			var num = ts.formatFloat( ( str || '' ).replace( ts.regex.nondigit, '' ), table );
			return str && typeof num === 'number' ? num :
				str ? $.trim( str && table.config.ignoreCase ? str.toLocaleLowerCase() : str ) : str;
		},
		type : 'numeric'
	});

	ts.regex.currencyReplace = /[+\-,. ]/g;
	ts.regex.currencyTest = /^\(?\d+[\u00a3$\u20ac\u00a4\u00a5\u00a2?.]|[\u00a3$\u20ac\u00a4\u00a5\u00a2?.]\d+\)?$/;
	ts.addParser({
		id : 'currency',
		is : function( str ) {
			str = ( str || '' ).replace( ts.regex.currencyReplace, '' );
			// test for £$€¤¥¢
			return ts.regex.currencyTest.test( str );
		},
		format : function( str, table ) {
			var num = ts.formatFloat( ( str || '' ).replace( ts.regex.nondigit, '' ), table );
			return str && typeof num === 'number' ? num :
				str ? $.trim( str && table.config.ignoreCase ? str.toLocaleLowerCase() : str ) : str;
		},
		type : 'numeric'
	});

	// too many protocols to add them all https://en.wikipedia.org/wiki/URI_scheme
	// now, this regex can be updated before initialization
	ts.regex.urlProtocolTest = /^(https?|ftp|file):\/\//;
	ts.regex.urlProtocolReplace = /(https?|ftp|file):\/\/(www\.)?/;
	ts.addParser({
		id : 'url',
		is : function( str ) {
			return ts.regex.urlProtocolTest.test( str );
		},
		format : function( str ) {
			return str ? $.trim( str.replace( ts.regex.urlProtocolReplace, '' ) ) : str;
		},
		type : 'text'
	});

	ts.regex.dash = /-/g;
	ts.regex.isoDate = /^\d{4}[\/\-]\d{1,2}[\/\-]\d{1,2}/;
	ts.addParser({
		id : 'isoDate',
		is : function( str ) {
			return ts.regex.isoDate.test( str );
		},
		format : function( str, table ) {
			var date = str ? new Date( str.replace( ts.regex.dash, '/' ) ) : str;
			return date instanceof Date && isFinite( date ) ? date.getTime() : str;
		},
		type : 'numeric'
	});

	ts.regex.percent = /%/g;
	ts.regex.percentTest = /(\d\s*?%|%\s*?\d)/;
	ts.addParser({
		id : 'percent',
		is : function( str ) {
			return ts.regex.percentTest.test( str ) && str.length < 15;
		},
		format : function( str, table ) {
			return str ? ts.formatFloat( str.replace( ts.regex.percent, '' ), table ) : str;
		},
		type : 'numeric'
	});

	// added image parser to core v2.17.9
	ts.addParser({
		id : 'image',
		is : function( str, table, node, $node ) {
			return $node.find( 'img' ).length > 0;
		},
		format : function( str, table, cell ) {
			return $( cell ).find( 'img' ).attr( table.config.imgAttr || 'alt' ) || str;
		},
		parsed : true, // filter widget flag
		type : 'text'
	});

	ts.regex.dateReplace = /(\S)([AP]M)$/i; // used by usLongDate & time parser
	ts.regex.usLongDateTest1 = /^[A-Z]{3,10}\.?\s+\d{1,2},?\s+(\d{4})(\s+\d{1,2}:\d{2}(:\d{2})?(\s+[AP]M)?)?$/i;
	ts.regex.usLongDateTest2 = /^\d{1,2}\s+[A-Z]{3,10}\s+\d{4}/i;
	ts.addParser({
		id : 'usLongDate',
		is : function( str ) {
			// two digit years are not allowed cross-browser
			// Jan 01, 2013 12:34:56 PM or 01 Jan 2013
			return ts.regex.usLongDateTest1.test( str ) || ts.regex.usLongDateTest2.test( str );
		},
		format : function( str, table ) {
			var date = str ? new Date( str.replace( ts.regex.dateReplace, '$1 $2' ) ) : str;
			return date instanceof Date && isFinite( date ) ? date.getTime() : str;
		},
		type : 'numeric'
	});

	// testing for ##-##-#### or ####-##-##, so it's not perfect; time can be included
	ts.regex.shortDateTest = /(^\d{1,2}[\/\s]\d{1,2}[\/\s]\d{4})|(^\d{4}[\/\s]\d{1,2}[\/\s]\d{1,2})/;
	// escaped "-" because JSHint in Firefox was showing it as an error
	ts.regex.shortDateReplace = /[\-.,]/g;
	// XXY covers MDY & DMY formats
	ts.regex.shortDateXXY = /(\d{1,2})[\/\s](\d{1,2})[\/\s](\d{4})/;
	ts.regex.shortDateYMD = /(\d{4})[\/\s](\d{1,2})[\/\s](\d{1,2})/;
	ts.convertFormat = function( dateString, format ) {
		dateString = ( dateString || '' )
			.replace( ts.regex.spaces, ' ' )
			.replace( ts.regex.shortDateReplace, '/' );
		if ( format === 'mmddyyyy' ) {
			dateString = dateString.replace( ts.regex.shortDateXXY, '$3/$1/$2' );
		} else if ( format === 'ddmmyyyy' ) {
			dateString = dateString.replace( ts.regex.shortDateXXY, '$3/$2/$1' );
		} else if ( format === 'yyyymmdd' ) {
			dateString = dateString.replace( ts.regex.shortDateYMD, '$1/$2/$3' );
		}
		var date = new Date( dateString );
		return date instanceof Date && isFinite( date ) ? date.getTime() : '';
	};

	ts.addParser({
		id : 'shortDate', // 'mmddyyyy', 'ddmmyyyy' or 'yyyymmdd'
		is : function( str ) {
			str = ( str || '' ).replace( ts.regex.spaces, ' ' ).replace( ts.regex.shortDateReplace, '/' );
			return ts.regex.shortDateTest.test( str );
		},
		format : function( str, table, cell, cellIndex ) {
			if ( str ) {
				var c = table.config,
					$header = c.$headerIndexed[ cellIndex ],
					format = $header.length && $header.data( 'dateFormat' ) ||
						ts.getData( $header, ts.getColumnData( table, c.headers, cellIndex ), 'dateFormat' ) ||
						c.dateFormat;
				// save format because getData can be slow...
				if ( $header.length ) {
					$header.data( 'dateFormat', format );
				}
				return ts.convertFormat( str, format ) || str;
			}
			return str;
		},
		type : 'numeric'
	});

	// match 24 hour time & 12 hours time + am/pm - see http://regexr.com/3c3tk
	ts.regex.timeTest = /^(0?[1-9]|1[0-2]):([0-5]\d)(\s[AP]M)$|^((?:[01]\d|[2][0-4]):[0-5]\d)$/i;
	ts.regex.timeMatch = /(0?[1-9]|1[0-2]):([0-5]\d)(\s[AP]M)|((?:[01]\d|[2][0-4]):[0-5]\d)/i;
	ts.addParser({
		id : 'time',
		is : function( str ) {
			return ts.regex.timeTest.test( str );
		},
		format : function( str, table ) {
			// isolate time... ignore month, day and year
			var temp,
				timePart = ( str || '' ).match( ts.regex.timeMatch ),
				orig = new Date( str ),
				// no time component? default to 00:00 by leaving it out, but only if str is defined
				time = str && ( timePart !== null ? timePart[ 0 ] : '00:00 AM' ),
				date = time ? new Date( '2000/01/01 ' + time.replace( ts.regex.dateReplace, '$1 $2' ) ) : time;
			if ( date instanceof Date && isFinite( date ) ) {
				temp = orig instanceof Date && isFinite( orig ) ? orig.getTime() : 0;
				// if original string was a valid date, add it to the decimal so the column sorts in some kind of order
				// luckily new Date() ignores the decimals
				return temp ? parseFloat( date.getTime() + '.' + orig.getTime() ) : date.getTime();
			}
			return str;
		},
		type : 'numeric'
	});

	ts.addParser({
		id : 'metadata',
		is : function() {
			return false;
		},
		format : function( str, table, cell ) {
			var c = table.config,
			p = ( !c.parserMetadataName ) ? 'sortValue' : c.parserMetadataName;
			return $( cell ).metadata()[ p ];
		},
		type : 'numeric'
	});

	/*
		██████ ██████ █████▄ █████▄ ▄████▄
		  ▄█▀  ██▄▄   ██▄▄██ ██▄▄██ ██▄▄██
		▄█▀    ██▀▀   ██▀▀██ ██▀▀█  ██▀▀██
		██████ ██████ █████▀ ██  ██ ██  ██
		*/
	// add default widgets
	ts.addWidget({
		id : 'zebra',
		priority : 90,
		format : function( table, c, wo ) {
			var $visibleRows, $row, count, isEven, tbodyIndex, rowIndex, len,
				child = new RegExp( c.cssChildRow, 'i' ),
				$tbodies = c.$tbodies.add( $( c.namespace + '_extra_table' ).children( 'tbody:not(.' + c.cssInfoBlock + ')' ) );
			for ( tbodyIndex = 0; tbodyIndex < $tbodies.length; tbodyIndex++ ) {
				// loop through the visible rows
				count = 0;
				$visibleRows = $tbodies.eq( tbodyIndex ).children( 'tr:visible' ).not( c.selectorRemove );
				len = $visibleRows.length;
				for ( rowIndex = 0; rowIndex < len; rowIndex++ ) {
					$row = $visibleRows.eq( rowIndex );
					// style child rows the same way the parent row was styled
					if ( !child.test( $row[ 0 ].className ) ) { count++; }
					isEven = ( count % 2 === 0 );
					$row
						.removeClass( wo.zebra[ isEven ? 1 : 0 ] )
						.addClass( wo.zebra[ isEven ? 0 : 1 ] );
				}
			}
		},
		remove : function( table, c, wo, refreshing ) {
			if ( refreshing ) { return; }
			var tbodyIndex, $tbody,
				$tbodies = c.$tbodies,
				toRemove = ( wo.zebra || [ 'even', 'odd' ] ).join( ' ' );
			for ( tbodyIndex = 0; tbodyIndex < $tbodies.length; tbodyIndex++ ){
				$tbody = ts.processTbody( table, $tbodies.eq( tbodyIndex ), true ); // remove tbody
				$tbody.children().removeClass( toRemove );
				ts.processTbody( table, $tbody, false ); // restore tbody
			}
		}
	});

})( jQuery );

return jQuery.tablesorter;
}));


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

