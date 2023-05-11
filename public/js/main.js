$(document).ready(()=>{
  $('.image').change(function(){
    const file = this.files[0];
    if (file){
      let reader = new FileReader();
      reader.onload = function(event){
        console.log(event.target.result);
        $('.employeePreviewImg img').attr('src',event.target.result);
      }
      reader.readAsDataURL(file);
    }
  });
});

$(document).ready(()=>{
  $('.emupimage').change(function(){
    const file = this.files[0];
    if (file){
      let reader = new FileReader();
      reader.onload = function(event){
        console.log(event.target.result);
        $('.UpEmPreviewImg').attr('src',event.target.result);
      }
      reader.readAsDataURL(file);
    }
  });
});




$(document).ready(function() {
	$( ".datePicar" ).datepicker({
	    altField: ".datePicar",
	    altFormat: "d MM, yy",
       numberOfMonths: 3,
      showButtonPanel: true
	 });
	$( "#updepartdate" ).datepicker({
	    altField: "#updepartdate",
	    altFormat: "d MM, yy",
       numberOfMonths: 3,
      showButtonPanel: true
	 });

	  toastr.options.extendedTimeOut = 3000; //1000;
      toastr.options.timeOut = 3000;
      toastr.options.fadeOut = 3000;
      toastr.options.fadeIn = 3000;

})


