$(document).ready(function(){
var car = 'Your car insurance policy is the most important document in your vehicle. Millions of car owners across India trust Bajaj Allianz to insure their car...<a href="http://www.bajajallianz.com/Corp/motor-insurance/car-insurance.jsp" target="_blank">know more</a><br><a href="https://general.bajajallianz.com/MotorInsurance/MotorInsurance.jsp?p_type=BCI" target="_blank"><img src="images/buy-online.png" height="38px" width="117px" /></a>';

var inditravel = 'Travelling abroad to a foreign land entails a lot of risk. Medical expenses in foreign currency and hospitalization can be prohibitively expensive...<a href="http://www.bajajallianz.com/Corp/travel-insurance/individual-travel-insurance.jsp" target="_blank">know more</a><br><a href="https://general.bajajallianz.com/Insurance/travel/basicinfo.jsp" target="_blank"><img src="images/buy-online.png" height="38px" width="117px" /></a>';

var ihg = 'Bajaj Allianz Health Guard Individual option plan is designed to suit all your health care needs. It takes care of the expensive medical treatment ...<a href="http://www.bajajallianz.com/Corp/health-insurance/health-guard.jsp" target="_blank">know more</a><br><a href="https://general.bajajallianz.com/Insurance/health/getBasicInfo.do?pid=8401" target="_blank"><img src="images/buy-online.png" height="38px" width="117px" /></a>';

var ffhg = 'In these times of rising medical costs, Bajaj Allianz Health Guard Family Floater Option is the perfect health protection for you and your family. It takes care of the expensive medical treatment ...<a href="http://www.bajajallianz.com/Corp/health-insurance/health-guard.jsp" target="_blank">know more</a><br><a href="https://general.bajajallianz.com/Insurance/health/getBasicInfo.do?pid=6001" target="_blank"><img src="images/buy-online.png" height="38px" width="117px" /></a>';

var ec = 'In these times of rising medical costs, Bajaj Allianz Health Guard- Family Floater Option is the perfect health protection for you and your family. It takes care of the expensive medical treatment ...<a href="http://www.bajajallianz.com/Corp/health-insurance/health-extra-care.jsp" target="_blank">know more</a><br><a href="https://general.bajajallianz.com/Insurance/health/getBasicInfo.do?pid=8416" target="_blank"><img src="images/buy-online.png" height="38px" width="117px" /></a>';

$(".car").popover({placement : 'top',title: 'Car Insurance <span class="closebtn" onclick="closepopover();"></span>', content: car, html:true});
$(".inditravel").popover({placement : 'top',title: 'Individual Travel Insurance  <span class="closebtn" onclick="closepopover();"></span>', content: inditravel, html:true});
$(".ihg").popover({placement : 'top',title: 'Health Guard Individual Policy <span class="closebtn" onclick="closepopover();"></span>', content: ihg, html:true});
$(".ffhg").popover({placement : 'top',title: 'Health Guard Family Floater Option <span class="closebtn" onclick="closepopover();"></span>', content: ffhg, html:true});
$(".ec").popover({placement : 'top',title: 'Extend Your Health Insurance <span class="closebtn" onclick="closepopover();"></span>', content: ec, html:true});
});
function closepopover() {
	 $('.ihg, .car, .inditravel, .ffhg, .ec').not(this).popover('hide');
	}
var originalLeave = $.fn.popover.Constructor.prototype.leave;
$.fn.popover.Constructor.prototype.leave = function(obj){
  var self = obj instanceof this.constructor ?
    obj : $(obj.currentTarget)[this.type](this.getDelegateOptions()).data('bs.' + this.type)
  var container, timeout;
  originalLeave.call(this, obj);
  if(obj.currentTarget) {
    container = $(obj.currentTarget).siblings('.popover')
    timeout = self.timeout;
    container.one('mouseenter', function(){
      //We entered the actual popover – call off the dogs
      clearTimeout(timeout);
      //Let's monitor popover content instead
      container.one('mouseleave', function(){
        $.fn.popover.Constructor.prototype.leave.call(self, self);
      });
    })
  }
};
$('body').popover({ selector: '[data-popover]', trigger: 'click hover', placement: 'auto', delay: {show: 50, hide: 400}});