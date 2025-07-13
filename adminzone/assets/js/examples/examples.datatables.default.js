/*
Name: 			Tables / Advanced - Examples
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version: 	4.2.0
*/

(function($) {

	'use strict';

	var datatableInit = function() {

		$('#datatable-default').dataTable({
			dom: '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			language: {
				searchPlaceholder: "Enter Last Name",
	            "lengthMenu": "_MENU_ sayfada gösterilecek kayıt sayısı",
	            "zeroRecords": "Kayıt Bulunamadı",
	            "info": "Toplam",
	            "infoEmpty": "Kullanılabilir Kayıt bulunamadı",
	            "infoFiltered": "(filtered from _MAX_ total records)",
	            paginate: {
		            previous: 'Önceki Sayfa',
		            next: 'Sonraki Sayfa'
		        }
	        }
		});

	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);