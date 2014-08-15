<?php
$LL = array();
@include 'locales/'.$_GET['lang'].'.php';
function L($s)
{
	global $LL;
	return (isset($LL[$s]) ? $LL[$s] : str_replace('_',' ',$s));
}
?>

function secToTimeframe (sec, name, show)
{
	var years = Math.floor(sec / 31556926);
	sec %= 31556926;
	var months = Math.round(sec / 2629743);
	sec %= 2629743;
	var days = Math.floor(sec / 86400);
	sec %= 86400;
	var hours = Math.floor(sec / 3600);
	sec %= 3600;
	var minutes = Math.floor(sec / 60);
	sec %= 60;
	var  str = '<span>', c = 'style="padding:5px;margin:2px 5px" class="ui-button ui-widget ui-state-default ui-corner-all"';
	if(/year/.test(show)) str += '<span '+c+' data-mult="31556926" data-field="'+name+'"> <?php echo L('Years')?>: <em>' + years.toString() + '</em></span>';
	if(/month/.test(show)) str += '<span '+c+' data-mult="2629743" data-field="'+name+'"><?php echo L('Months')?>: <em>' + months.toString()  + '</em></span>';
	if(/day/.test(show)) str += '<span '+c+' data-mult="86400" data-field="'+name+'"><?php echo L('Days')?>: <em>' + days.toString()  + '</em></span>';
	if(/hour/.test(show)) str += '<span '+c+' data-mult="3600" data-field="'+name+'"><?php echo L('Hours')?>: <em>' + hours.toString()  + '</em></span>';
	if(/minute/.test(show)) str += '<span '+c+' data-mult="60" data-field="'+name+'"><?php echo L('Minutes')?>: <em>' + minutes.toString()  + '</em></span>';
	if(/second/.test(show)) str += '<span '+c+' data-mult="1" data-field="'+name+'"><?php echo L('Seconds')?>: <em>' + sec.toString()  + '</em></span>';
	str += '</span>';
	return str;
};

(function( $ ) {
	
	$.fn.duration = function() {
		
		var t = $( secToTimeframe(this.val(), this.attr('name'), this.data('show')) );
		this.attr('id','tf_'+this.attr('name')).after(t).css({'position':'absolute','left':'-5000px','width':'10px'});
		t.find('span').on('click', function()
		{
			var val = parseInt($(this).find('em').text()),
			main = $('#tf_'+$(this).data('field')),
			mult = parseInt($(this).data('mult'));
			var c = prompt('<?php echo L('change')?> '+$(this).text(), val);
			if(c)
			{
				$(this).find('em').text(c);
				var o = val * mult,
					n = c * mult;
					main.val(parseInt(main.val()) + n - o);
					hasCanged = true;
			}
		});
	};
})( jQuery );
