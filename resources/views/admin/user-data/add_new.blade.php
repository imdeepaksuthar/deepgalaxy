@extends('layouts.app')
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Master Data</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item"><a href="{{ url('user-data') }}">User-data</a></li>
               <li class="breadcrumb-item"><a href="{{ url('user-data') }}">master-data</a></li>
            </ol>
         </div>
      </div>
   </div>
</section>
<section class="content">
   <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
         <div class="card-header">
            <h3 class="card-title">Master Data Form</h3>
            <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse">
               <i class="fas fa-minus"></i>
               </button>
               <button type="button" class="btn btn-tool" data-card-widget="remove">
               <i class="fas fa-times"></i>
               </button>
            </div>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Name</label>
                     <input type="text" tabindex=1 class="form-control" placeholder="Enter ...">
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label>Disabled Result</label>
                     <select class="form-control select2" style="width: 100%;" tabindex=3>
                        <option selected="selected">Alabama</option>
                        <option>Alaska</option>
                        <option disabled="disabled">California (disabled)</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                     </select>
                  </div>
                  <!-- /.form-group -->
               </div>
               <!-- /.col -->
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Name</label>
                     <input type="text" class="form-control" placeholder="Enter ..." tabindex=2>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label>Disabled Result</label>
                     <select class="form-control select2" style="width: 100%;" tabindex=4>
                        <option selected="selected">Alabama</option>
                        <option>Alaska</option>
                        <option disabled="disabled">California (disabled)</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                     </select>
                  </div>
                  <!-- /.form-group -->
               </div>
               <!-- /.col -->
            </div>
            <!-- /.row -->
         </div>
         <!-- /.card-body -->
         <div class="card-footer">
            
         </div>
      </div>
      <!-- /.card -->
   </div>
   <!-- /.container-fluid -->
</section>
<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://1000hz.github.io/bootstrap-validator/dist/validator.min.js'></script>
<script id="rendered-js" >
   function numberOnly(input) {
     var regex = /[^0-9]/gi;
     input.value = input.value.replace(regex, "");
   }
   
   $(document).ready(function () {
     var navListItems = $('div.setup-panel div a'),
     allWells = $('.setup-content'),
     allNextBtn = $('.nextBtn');
   
     console.log(allWells);
   
     allWells.hide();
   
     navListItems.click(function (e) {
       e.preventDefault();
       var $target = $($(this).attr('href')),
       $item = $(this);
       if (!$item.hasClass('disabled')) {
         navListItems.removeClass('btn-primary').addClass('btn-default');
         $item.addClass('btn-primary');
         allWells.hide();
         $target.show();
         $target.find('input:eq(0)').focus();
       }
     });
   
     allNextBtn.click(function () {
       var curStep = $(this).closest(".setup-content"),
       curStepBtn = curStep.attr("id"),
       nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
       curInputs = curStep.find("input[type='text'],input[type='url'],textarea[textarea]"),
       isValid = true;
       console.log(curStepBtn);
       $(".form-group").removeClass("has-error");
       for (var i = 0; i < curInputs.length; i++) {if (window.CP.shouldStopExecution(0)) break;
         console.log(curInputs);
         if (!curInputs[i].validity.valid) {
           isValid = false;
           $(curInputs[i]).closest(".form-group").addClass("has-error");
         }
       }window.CP.exitedLoop(0);
   
       if (isValid)
       nextStepWizard.removeAttr('disabled').trigger('click');
     });
   
     $('div.setup-panel div a.btn-primary').trigger('click');
   });
   //# sourceURL=pen.js
       
</script>
@section('third_party_scripts')
@show
@endsection