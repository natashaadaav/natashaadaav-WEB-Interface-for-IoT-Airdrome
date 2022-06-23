$(document).ready(function(){
	dynamicBlock('ena');
	dynamicBlock('coord');
	dynamicBlock('bord');
	dynamicBlock('passStat');
	dynamicBlock('passCnt');
	dynamicBlock('light');
	setInterval('upd()', 10000);
})

function upd()
{
	updateBlock('ena');
	updateIcon('ena');
	updateBlock('coord');
	updateBlock('bord');
	updateIcon('bord');
	updateBlock('passStat');
	updateIcon('passStat');
	updateBlock('passCnt');
	updateBlock('light');
	updateIcon('light');
}

function updateIcon(name){

	var urlIcon = 'ajax/'+ name + 'Icon.php';
	var idIcon = '#' + name + 'Icon';

	$.ajax({
		url: urlIcon,
		cache: false,
		success: function(html){
			$(idIcon).html(html);
		}
	})
}

function updateBlock(name){
	var urlReq = 'ajax/'+ name + 'Req.php';
	var urlShReq = 'ajax/' + name + 'ShReq.php';
	var idReq = '#' + name + 'Req';
	var idShReq = '#' + name + 'ShReq';

	$.ajax({
		url: urlReq,
		cache: false,
		success: function(html){
			$(idReq).html(html);
		}
	})

	$.ajax({
		url: urlShReq,
		cache: false,
		success: function(html){
			$(idShReq).html(html)
		}
	})
}

function dynamicBlock(name){

	var name = '#' + name;
	var nameIcon = name + 'Icon';
	var nameShow = name + 'Show';

	$(nameIcon).click(function(){
		$(name).hide();
		$(nameShow).show();
	})

	$(nameShow).click(function(){
		$(nameShow).hide();
		$(name).show();
	})
}

function rangeResult(name){

	$('#renger').html($('input[type="range"]').val());
	$(document).on('input change', 'input[type="range"]', function(){
		$('#renger').html($(this).val());
	});
}