$(document).ready(function(){
	$('div.alert').not('.alert-important').delay(5000).slideUp(300);

	$("#form-pencarian").submit(function(){
		$("#id_kelas option[value='']").attr("disabled","disabled")
		$("#jenis_kelamin option[value='']").attr("disabled","disabled")

		return true;
	});
});