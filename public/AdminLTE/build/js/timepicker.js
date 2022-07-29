(function(n,t,i,r){"use strict";var u=function(t,i){this.widget="";this.$element=n(t);this.defaultTime=i.defaultTime;this.disableFocus=i.disableFocus;this.isOpen=i.isOpen;this.minuteStep=i.minuteStep;this.modalBackdrop=i.modalBackdrop;this.secondStep=i.secondStep;this.showInputs=i.showInputs;this.showMeridian=i.showMeridian;this.showSeconds=i.showSeconds;this.template=i.template;this.appendWidgetTo=i.appendWidgetTo;this.upArrowStyle=i.upArrowStyle;this.downArrowStyle=i.downArrowStyle;this.containerClass=i.containerClass;this._init()};u.prototype={constructor:u,_init:function(){var t=this;if(this.$element.parent().hasClass("input-append")||this.$element.parent().hasClass("input-prepend")){if(this.$element.parent(".input-append, .input-prepend").find(".add-on").length)this.$element.parent(".input-append, .input-prepend").find(".add-on").on({"click.timepicker":n.proxy(this.showWidget,this)});else this.$element.closest(this.containerClass).find(".add-on").on({"click.timepicker":n.proxy(this.showWidget,this)});this.$element.on({"focus.timepicker":n.proxy(this.highlightUnit,this),"click.timepicker":n.proxy(this.highlightUnit,this),"keydown.timepicker":n.proxy(this.elementKeydown,this),"blur.timepicker":n.proxy(this.blurElement,this)})}else if(this.template)this.$element.on({"focus.timepicker":n.proxy(this.showWidget,this),"click.timepicker":n.proxy(this.showWidget,this),"blur.timepicker":n.proxy(this.blurElement,this)});else this.$element.on({"focus.timepicker":n.proxy(this.highlightUnit,this),"click.timepicker":n.proxy(this.highlightUnit,this),"keydown.timepicker":n.proxy(this.elementKeydown,this),"blur.timepicker":n.proxy(this.blurElement,this)});this.$widget=this.template!==!1?n(this.getTemplate()).prependTo(this.$element.parents(this.appendWidgetTo)).on("click",n.proxy(this.widgetClick,this)):!1;this.showInputs&&this.$widget!==!1&&this.$widget.find("input").each(function(){n(this).on({"click.timepicker":function(){n(this).select()},"keydown.timepicker":n.proxy(t.widgetKeydown,t)})});this.setDefaultTime(this.defaultTime)},blurElement:function(){this.highlightedUnit=r;this.updateFromElementVal()},decrementHour:function(){if(this.showMeridian)if(this.hour===1)this.hour=12;else{if(this.hour===12)return this.hour--,this.toggleMeridian();if(this.hour===0)return this.hour=11,this.toggleMeridian();this.hour--}else this.hour===0?this.hour=23:this.hour--;this.update()},decrementMinute:function(n){var t;t=n?this.minute-n:this.minute-this.minuteStep;t<0?(this.decrementHour(),this.minute=t+60):this.minute=t;this.update()},decrementSecond:function(){var n=this.second-this.secondStep;n<0?(this.decrementMinute(!0),this.second=n+60):this.second=n;this.update()},elementKeydown:function(n){switch(n.keyCode){case 9:this.updateFromElementVal();switch(this.highlightedUnit){case"hour":n.preventDefault();this.highlightNextUnit();break;case"minute":(this.showMeridian||this.showSeconds)&&(n.preventDefault(),this.highlightNextUnit());break;case"second":this.showMeridian&&(n.preventDefault(),this.highlightNextUnit())}break;case 27:this.updateFromElementVal();break;case 37:n.preventDefault();this.highlightPrevUnit();this.updateFromElementVal();break;case 38:n.preventDefault();switch(this.highlightedUnit){case"hour":this.incrementHour();this.highlightHour();break;case"minute":this.incrementMinute();this.highlightMinute();break;case"second":this.incrementSecond();this.highlightSecond();break;case"meridian":this.toggleMeridian();this.highlightMeridian()}break;case 39:n.preventDefault();this.updateFromElementVal();this.highlightNextUnit();break;case 40:n.preventDefault();switch(this.highlightedUnit){case"hour":this.decrementHour();this.highlightHour();break;case"minute":this.decrementMinute();this.highlightMinute();break;case"second":this.decrementSecond();this.highlightSecond();break;case"meridian":this.toggleMeridian();this.highlightMeridian()}}},formatTime:function(n,t,i,r){return n=n<10?"0"+n:n,t=t<10?"0"+t:t,i=i<10?"0"+i:i,n+":"+t+(this.showSeconds?":"+i:"")+(this.showMeridian?" "+r:"")},getCursorPosition:function(){var n=this.$element.get(0),t,r;return"selectionStart"in n?n.selectionStart:i.selection?(n.focus(),t=i.selection.createRange(),r=i.selection.createRange().text.length,t.moveStart("character",-n.value.length),t.text.length-r):void 0},getTemplate:function(){var n,t,i,r,u,f;this.showInputs?(t='<input type="text" name="hour" class="bootstrap-timepicker-hour form-control" maxlength="2"/>',i='<input type="text" name="minute" class="bootstrap-timepicker-minute form-control" maxlength="2"/>',r='<input type="text" name="second" class="bootstrap-timepicker-second form-control" maxlength="2"/>',u='<input type="text" name="meridian" class="bootstrap-timepicker-meridian form-control" maxlength="2"/>'):(t='<span class="bootstrap-timepicker-hour"><\/span>',i='<span class="bootstrap-timepicker-minute"><\/span>',r='<span class="bootstrap-timepicker-second"><\/span>',u='<span class="bootstrap-timepicker-meridian"><\/span>');f='<table><tr><td><a href="#" data-action="incrementHour"><i class="'+this.upArrowStyle+'"><\/i><\/a><\/td><td class="separator">&nbsp;<\/td><td><a href="#" data-action="incrementMinute"><i class="'+this.upArrowStyle+'"><\/i><\/a><\/td>'+(this.showSeconds?'<td class="separator">&nbsp;<\/td><td><a href="#" data-action="incrementSecond"><i class="'+this.upArrowStyle+'"><\/i><\/a><\/td>':"")+(this.showMeridian?'<td class="separator">&nbsp;<\/td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="'+this.upArrowStyle+'"><\/i><\/a><\/td>':"")+"<\/tr><tr><td>"+t+'<\/td> <td class="separator">:<\/td><td>'+i+"<\/td> "+(this.showSeconds?'<td class="separator">:<\/td><td>'+r+"<\/td>":"")+(this.showMeridian?'<td class="separator">&nbsp;<\/td><td>'+u+"<\/td>":"")+'<\/tr><tr><td><a href="#" data-action="decrementHour"><i class="'+this.downArrowStyle+'"><\/i><\/a><\/td><td class="separator"><\/td><td><a href="#" data-action="decrementMinute"><i class="'+this.downArrowStyle+'"><\/i><\/a><\/td>'+(this.showSeconds?'<td class="separator">&nbsp;<\/td><td><a href="#" data-action="decrementSecond"><i class="'+this.downArrowStyle+'"><\/i><\/a><\/td>':"")+(this.showMeridian?'<td class="separator">&nbsp;<\/td><td><a href="#" data-action="toggleMeridian"><i class="'+this.downArrowStyle+'"><\/i><\/a><\/td>':"")+"<\/tr><\/table>";switch(this.template){case"modal":n='<div class="bootstrap-timepicker-widget modal hide fade in" data-backdrop="'+(this.modalBackdrop?"true":"false")+'"><div class="modal-header"><a href="#" class="close" data-dismiss="modal">×<\/a><h3>Pick a Time<\/h3><\/div><div class="modal-content">'+f+'<\/div><div class="modal-footer"><a href="#" class="btn btn-primary" data-dismiss="modal">OK<\/a><\/div><\/div>';break;case"dropdown":n='<div class="bootstrap-timepicker-widget dropdown-menu">'+f+"<\/div>"}return n},getTime:function(){return this.formatTime(this.hour,this.minute,this.second,this.meridian)},hideWidget:function(){this.isOpen!==!1&&(this.showInputs&&this.updateFromWidgetInputs(),this.$element.trigger({type:"hide.timepicker",time:{value:this.getTime(),hours:this.hour,minutes:this.minute,seconds:this.second,meridian:this.meridian}}),this.template==="modal"&&this.$widget.modal?this.$widget.modal("hide"):this.$widget.removeClass("open"),n(i).off("mousedown.timepicker"),this.isOpen=!1)},highlightUnit:function(){this.position=this.getCursorPosition();this.position>=0&&this.position<=2?this.highlightHour():this.position>=3&&this.position<=5?this.highlightMinute():this.position>=6&&this.position<=8?this.showSeconds?this.highlightSecond():this.highlightMeridian():this.position>=9&&this.position<=11&&this.highlightMeridian()},highlightNextUnit:function(){switch(this.highlightedUnit){case"hour":this.highlightMinute();break;case"minute":this.showSeconds?this.highlightSecond():this.showMeridian?this.highlightMeridian():this.highlightHour();break;case"second":this.showMeridian?this.highlightMeridian():this.highlightHour();break;case"meridian":this.highlightHour()}},highlightPrevUnit:function(){switch(this.highlightedUnit){case"hour":this.highlightMeridian();break;case"minute":this.highlightHour();break;case"second":this.highlightMinute();break;case"meridian":this.showSeconds?this.highlightSecond():this.highlightMinute()}},highlightHour:function(){var n=this.$element.get(0);this.highlightedUnit="hour";n.setSelectionRange&&setTimeout(function(){n.setSelectionRange(0,2)},0)},highlightMinute:function(){var n=this.$element.get(0);this.highlightedUnit="minute";n.setSelectionRange&&setTimeout(function(){n.setSelectionRange(3,5)},0)},highlightSecond:function(){var n=this.$element.get(0);this.highlightedUnit="second";n.setSelectionRange&&setTimeout(function(){n.setSelectionRange(6,8)},0)},highlightMeridian:function(){var n=this.$element.get(0);this.highlightedUnit="meridian";n.setSelectionRange&&(this.showSeconds?setTimeout(function(){n.setSelectionRange(9,11)},0):setTimeout(function(){n.setSelectionRange(6,8)},0))},incrementHour:function(){if(this.showMeridian){if(this.hour===11)return this.hour++,this.toggleMeridian();this.hour===12&&(this.hour=0)}if(this.hour===23){this.hour=0;return}this.hour++;this.update()},incrementMinute:function(n){var t;t=n?this.minute+n:this.minute+this.minuteStep-this.minute%this.minuteStep;t>59?(this.incrementHour(),this.minute=t-60):this.minute=t;this.update()},incrementSecond:function(){var n=this.second+this.secondStep-this.second%this.secondStep;n>59?(this.incrementMinute(!0),this.second=n-60):this.second=n;this.update()},remove:function(){n("document").off(".timepicker");this.$widget&&this.$widget.remove();delete this.$element.data().timepicker},setDefaultTime:function(n){if(this.$element.val())this.updateFromElementVal();else if(n==="current"){var i=new Date,t=i.getHours(),u=Math.floor(i.getMinutes()/this.minuteStep)*this.minuteStep,f=Math.floor(i.getSeconds()/this.secondStep)*this.secondStep,r="AM";this.showMeridian&&(t===0?t=12:t>=12?(t>12&&(t=t-12),r="PM"):r="AM");this.hour=t;this.minute=u;this.second=f;this.meridian=r;this.update()}else n===!1?(this.hour=0,this.minute=0,this.second=0,this.meridian="AM"):this.setTime(n)},setTime:function(n){var i,t;this.showMeridian?(i=n.split(" "),t=i[0].split(":"),this.meridian=i[1]):t=n.split(":");this.hour=parseInt(t[0],10);this.minute=parseInt(t[1],10);this.second=parseInt(t[2],10);isNaN(this.hour)&&(this.hour=0);isNaN(this.minute)&&(this.minute=0);this.showMeridian?(this.hour>12?this.hour=12:this.hour<1&&(this.hour=12),this.meridian==="am"||this.meridian==="a"?this.meridian="AM":(this.meridian==="pm"||this.meridian==="p")&&(this.meridian="PM"),this.meridian!=="AM"&&this.meridian!=="PM"&&(this.meridian="AM")):this.hour>=24?this.hour=23:this.hour<0&&(this.hour=0);this.minute<0?this.minute=0:this.minute>=60&&(this.minute=59);this.showSeconds&&(isNaN(this.second)?this.second=0:this.second<0?this.second=0:this.second>=60&&(this.second=59));this.update()},showWidget:function(){if(!this.isOpen&&!this.$element.is(":disabled")){var t=this;n(i).on("mousedown.timepicker",function(i){n(i.target).closest(".bootstrap-timepicker-widget").length===0&&t.hideWidget()});if(this.$element.trigger({type:"show.timepicker",time:{value:this.getTime(),hours:this.hour,minutes:this.minute,seconds:this.second,meridian:this.meridian}}),this.disableFocus&&this.$element.blur(),this.updateFromElementVal(),this.template==="modal"&&this.$widget.modal)this.$widget.modal("show").on("hidden",n.proxy(this.hideWidget,this));else this.isOpen===!1&&this.$widget.addClass("open");this.isOpen=!0}},toggleMeridian:function(){this.meridian=this.meridian==="AM"?"PM":"AM";this.update()},update:function(){this.$element.trigger({type:"changeTime.timepicker",time:{value:this.getTime(),hours:this.hour,minutes:this.minute,seconds:this.second,meridian:this.meridian}});this.updateElement();this.updateWidget()},updateElement:function(){this.$element.val(this.getTime()).change()},updateFromElementVal:function(){var n=this.$element.val();n&&this.setTime(n)},updateWidget:function(){if(this.$widget!==!1){var n=this.hour<10?"0"+this.hour:this.hour,t=this.minute<10?"0"+this.minute:this.minute,i=this.second<10?"0"+this.second:this.second;this.showInputs?(this.$widget.find("input.bootstrap-timepicker-hour").val(n),this.$widget.find("input.bootstrap-timepicker-minute").val(t),this.showSeconds&&this.$widget.find("input.bootstrap-timepicker-second").val(i),this.showMeridian&&this.$widget.find("input.bootstrap-timepicker-meridian").val(this.meridian)):(this.$widget.find("span.bootstrap-timepicker-hour").text(n),this.$widget.find("span.bootstrap-timepicker-minute").text(t),this.showSeconds&&this.$widget.find("span.bootstrap-timepicker-second").text(i),this.showMeridian&&this.$widget.find("span.bootstrap-timepicker-meridian").text(this.meridian))}},updateFromWidgetInputs:function(){if(this.$widget!==!1){var t=n("input.bootstrap-timepicker-hour",this.$widget).val()+":"+n("input.bootstrap-timepicker-minute",this.$widget).val()+(this.showSeconds?":"+n("input.bootstrap-timepicker-second",this.$widget).val():"")+(this.showMeridian?" "+n("input.bootstrap-timepicker-meridian",this.$widget).val():"");this.setTime(t)}},widgetClick:function(t){t.stopPropagation();t.preventDefault();var i=n(t.target).closest("a").data("action");i&&this[i]()},widgetKeydown:function(t){var r=n(t.target).closest("input"),i=r.attr("name");switch(t.keyCode){case 9:if(this.showMeridian){if(i==="meridian")return this.hideWidget()}else if(this.showSeconds){if(i==="second")return this.hideWidget()}else if(i==="minute")return this.hideWidget();this.updateFromWidgetInputs();break;case 27:this.hideWidget();break;case 38:t.preventDefault();switch(i){case"hour":this.incrementHour();break;case"minute":this.incrementMinute();break;case"second":this.incrementSecond();break;case"meridian":this.toggleMeridian()}break;case 40:t.preventDefault();switch(i){case"hour":this.decrementHour();break;case"minute":this.decrementMinute();break;case"second":this.decrementSecond();break;case"meridian":this.toggleMeridian()}}}};n.fn.timepicker=function(t){var i=Array.apply(null,arguments);return i.shift(),this.each(function(){var f=n(this),r=f.data("timepicker"),e=typeof t=="object"&&t;r||f.data("timepicker",r=new u(this,n.extend({},n.fn.timepicker.defaults,e,n(this).data())));typeof t=="string"&&r[t].apply(r,i)})};n.fn.timepicker.defaults={defaultTime:"current",disableFocus:!1,isOpen:!1,minuteStep:15,modalBackdrop:!1,secondStep:15,showSeconds:!1,showInputs:!0,showMeridian:!0,template:"dropdown",appendWidgetTo:".bootstrap-timepicker",upArrowStyle:"glyphicon glyphicon-chevron-up",downArrowStyle:"glyphicon glyphicon-chevron-down",containerClass:"bootstrap-timepicker"};n.fn.timepicker.Constructor=u})(jQuery,window,document)