(()=>{"use strict";var e={n:t=>{var a=t&&t.__esModule?()=>t.default:()=>t;return e.d(a,{a}),a},d:(t,a)=>{for(var l in a)e.o(a,l)&&!e.o(t,l)&&Object.defineProperty(t,l,{enumerable:!0,get:a[l]})},o:(e,t)=>Object.prototype.hasOwnProperty.call(e,t)};const t=window.wp.blocks,a=window.React,l=window.wp.i18n,r=window.wp.serverSideRender;var o=e.n(r);const n=window.wp.blockEditor,u=window.wp.components,s=(e,t,a)=>()=>{e({[a]:!t[a]})},p=(e,t)=>a=>{["number","offset","daily_range","hour_range"].includes(t)&&(a=""===a?0:parseInt(a,10)),e({[t]:a})},i=({attributes:e,setAttributes:t})=>{const{number:r,offset:o,showOptionCount:n}=e;return(0,a.createElement)(a.Fragment,null,(0,a.createElement)(u.PanelRow,null,(0,a.createElement)(u.TextControl,{type:"number",label:(0,l.__)("Max authors to display","popular-authors"),value:r,onChange:p(t,"number"),help:(0,l.__)("Value -1 (all authors) is supported, but should be used with caution on larger sites.","popular-authors"),min:-1})),(0,a.createElement)(u.PanelRow,null,(0,a.createElement)(u.TextControl,{type:"number",label:(0,l.__)("Offset","popular-authors"),value:o,onChange:p(t,"offset"),help:(0,l.__)("Number of authors to offset in retrieved results. Only applies if number of authors set above is >0","popular-authors"),min:0})),(0,a.createElement)(u.PanelRow,null,(0,a.createElement)(u.ToggleControl,{label:(0,l.__)("Show count","popular-authors"),help:n?(0,l.__)("Count displayed","popular-authors"):(0,l.__)("No count displayed","popular-authors"),checked:n,onChange:s(t,e,"showOptionCount")})))},h=({attributes:e,setAttributes:t})=>{const{daily:r,daily_range:o,hour_range:n}=e;return(0,a.createElement)(a.Fragment,null,(0,a.createElement)(u.PanelRow,null,(0,a.createElement)(u.ToggleControl,{label:(0,l.__)("Custom period?","top-10"),help:r?(0,l.__)("Set range below","top-10"):(0,l.__)("Overall popular posts will be shown","top-10"),checked:r,onChange:s(t,e,"daily")})),r&&(0,a.createElement)(a.Fragment,null,(0,a.createElement)(u.PanelRow,null,(0,a.createElement)(u.TextControl,{type:"number",label:(0,l.__)("Daily range","top-10"),value:o,onChange:p(t,"daily_range"),help:(0,l.__)("Number of days","top-10"),min:0})),(0,a.createElement)(u.PanelRow,null,(0,a.createElement)(u.TextControl,{type:"number",label:(0,l.__)("Hour range","top-10"),value:n,onChange:p(t,"hour_range"),help:(0,l.__)("Number of hours","top-10"),min:0}))))},c=({attributes:e,setAttributes:t})=>{const{showFullName:r,showAvatar:o,excludeAdmin:n,hideEmptyAuthors:i,include:h,exclude:c}=e;return(0,a.createElement)(a.Fragment,null,(0,a.createElement)(u.PanelRow,null,(0,a.createElement)(u.ToggleControl,{label:(0,l.__)("Show Full Name","popular-authors"),help:r?(0,l.__)("Full Name is displayed","popular-authors"):(0,l.__)("Display Name is displayed","popular-authors"),checked:r,onChange:s(t,e,"showFullName")})),(0,a.createElement)(u.PanelRow,null,(0,a.createElement)(u.ToggleControl,{label:(0,l.__)("Show Avatar","popular-authors"),help:o?(0,l.__)("Avatar displayed","popular-authors"):(0,l.__)("No avatar displayed","popular-authors"),checked:o,onChange:s(t,e,"showAvatar")})),(0,a.createElement)(u.PanelRow,null,(0,a.createElement)(u.ToggleControl,{label:(0,l.__)("Exclude admin","popular-authors"),help:n?(0,l.__)("'admin' account is excluded","popular-authors"):(0,l.__)("'admin' account is included","popular-authors"),checked:n,onChange:s(t,e,"excludeAdmin")})),(0,a.createElement)(u.PanelRow,null,(0,a.createElement)(u.ToggleControl,{label:(0,l.__)("Hide authors with no posts","popular-authors"),help:i?(0,l.__)("Authors with no posts are excluded","popular-authors"):(0,l.__)("Authors with no posts are included","popular-authors"),checked:i,onChange:s(t,e,"hideEmptyAuthors")})),(0,a.createElement)(u.PanelRow,null,(0,a.createElement)(u.TextControl,{label:(0,l.__)("Author IDs to include","popular-authors"),value:h,onChange:p(t,"include"),help:(0,l.__)("Comma-separated list of author IDs to include. This has priority over exclude.","popular-authors")})),(0,a.createElement)(u.PanelRow,null,(0,a.createElement)(u.TextControl,{label:(0,l.__)("Author IDs to exclude","popular-authors"),value:c,onChange:p(t,"exclude"),help:(0,l.__)("Comma-separated list of author IDs to exclude","popular-authors")})))},d=({attributes:e,setAttributes:t})=>{const{other_attributes:r}=e;return(0,a.createElement)(n.InspectorControls,{group:"advanced"},(0,a.createElement)(u.PanelRow,null,(0,a.createElement)(u.TextareaControl,{label:(0,l.__)("Other attributes","popular-authors"),value:r,onChange:p(t,"other_attributes"),help:(0,l.__)("Enter other attributes in a URL-style string-query.","popular-authors")})))},m=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"popular-authors/popular-authors","version":"1.0.0","title":"Popular Authors","category":"design","icon":"admin-users","keywords":["popular authors","author","top 10"],"description":"Show the list of popular authors","supports":{"html":false},"example":{},"attributes":{"className":{"type":"string","default":""},"number":{"type":"number","default":0},"daily":{"type":"boolean","default":false},"daily_range":{"type":"number","default":1},"hour_range":{"type":"number","default":0},"offset":{"type":"number","default":0},"showOptionCount":{"type":"boolean","default":false},"showFullName":{"type":"boolean","default":false},"showAvatar":{"type":"boolean","default":false},"excludeAdmin":{"type":"boolean","default":false},"hideEmptyAuthors":{"type":"boolean","default":true},"include":{"type":"string","default":""},"exclude":{"type":"string","default":""},"other_attributes":{"type":"string","default":""}},"textdomain":"popular-authors","editorScript":"file:./index.js"}'),_=(0,a.createElement)("svg",{fill:"#0a0a0a",height:200,width:200,xmlns:"http://www.w3.org/2000/svg",viewBox:"-19.81 -19.81 237.77 237.77",xmlSpace:"preserve"},(0,a.createElement)("rect",{x:-19.81,y:-19.81,width:237.77,height:237.77,rx:0,fill:"#FFBD59"}),(0,a.createElement)("g",{strokeLinecap:"round",strokeLinejoin:"round"}),(0,a.createElement)("path",{d:"M195.536 68.18a10 10 0 0 0-7.392-3.265H10A10 10 0 0 0 .043 75.842l9.505 102.099a10 10 0 0 0 9.957 9.073h159.134a10 10 0 0 0 9.957-9.073l9.505-102.099a10 10 0 0 0-2.565-7.662m-63.11 97.893H65.739c-5.523 0-10-4.478-10-10 0-13.58 11.048-24.628 24.628-24.628h7.177c-7.381-4.078-12.393-11.94-12.393-20.952 0-13.19 10.731-23.922 23.922-23.922s23.922 10.731 23.922 23.922c0 9.012-5.012 16.874-12.393 20.952h7.177c13.303 0 24.176 10.603 24.614 23.802q.033.409.034.826c-.001 5.523-4.478 10-10.001 10m46.48-119.775a7.5 7.5 0 0 1-7.5 7.5H26.739c-4.142 0-7.5-3.357-7.5-7.5s3.358-7.5 7.5-7.5h144.667a7.5 7.5 0 0 1 7.5 7.5m-19.8-27.667a7.5 7.5 0 0 1-7.5 7.5H46.539c-4.142 0-7.5-3.357-7.5-7.5s3.358-7.5 7.5-7.5h105.066a7.5 7.5 0 0 1 7.501 7.5"}));(0,t.registerBlockType)(m.name,{...m,icon:_,edit:function({attributes:e,setAttributes:t}){const r=(0,n.useBlockProps)();return(0,a.createElement)(a.Fragment,null,(0,a.createElement)(n.InspectorControls,null,(0,a.createElement)(u.PanelBody,{title:(0,l.__)("Popular Authors Settings","popular-authors"),initialOpen:!0},(0,a.createElement)(i,{attributes:e,setAttributes:t}),(0,a.createElement)(h,{attributes:e,setAttributes:t}),(0,a.createElement)(c,{attributes:e,setAttributes:t}))),(0,a.createElement)(d,{attributes:e,setAttributes:t}),(0,a.createElement)("div",{...r},(0,a.createElement)(u.Disabled,null,(0,a.createElement)(o(),{block:"popular-authors/popular-authors",attributes:e}))))}})})();