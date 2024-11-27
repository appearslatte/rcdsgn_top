$(function() {
	
	function setInview(clsname) {
		$('.inview' + clsname).on('inview', function (event, isInView, visiblePartX, visiblePartY) {
			if (isInView) {
				    $(this).stop().addClass(clsname);
			}
		});
	}
    setInview('fadeInUp');
	setInview('fadeInRight');
	setInview('fadeInDown');
	setInview('fadeInLeft');
	setInview('fadeIn');
	setInview('fadeInUpLeft');
    setInview('fadeInUpRight');
    setInview('fadeInDownLeft');
    setInview('fadeInDownRight');
    setInview('fadeInLine');

});