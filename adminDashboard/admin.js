$(document).ready(function(){
    $('.addCategory').click(function(){
    html = ' <div class="container mt--8 pb-5">'+
        '<div class="row justify-content-center">'+
        '<div class="col-lg-6 col-md-8">'+
            '<div class="card bg-secondary border-0">'+
            '<div class="card-header bg-transparent pb-5">'+
                '<div class="text-muted text-center mt-2 mb-4"><small>Sign up with</small></div>'+
                '<div class="text-center">'+
                '<a href="#" class="btn btn-neutral btn-icon mr-4">'+
                    '<span class="btn-inner--icon"><img src="../assets/img/icons/common/github.svg"></span>'+
                    '<span class="btn-inner--text">Github</span>'+
                '</a>'+
                '<a href="#" class="btn btn-neutral btn-icon">'+
                    '<span class="btn-inner--icon"><img src="../assets/img/icons/common/google.svg"></span>'+
                    '<span class="btn-inner--text">Google</span>'+
                '</a>'+
                '</div>'+
            '</div>'+
            '<div class="card-body px-lg-5 py-lg-5">'+
                '<div class="text-center text-muted mb-4">'+
                '<small>Or sign up with credentials</small>'+
                '</div>'+
                '<form role="form">'+
                '<div class="form-group">'+
                    '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                    '<div class="input-group-prepend">'+
                        '<span class="input-group-text"><i class="ni ni-hat-3"></i></span>'+
                    '</div>'+
                    '<input class="form-control" placeholder="Name" type="text">'+
                    '</div>'+
                '</div>'+
                '<div class="form-group">'+
                    '<div class="input-group input-group-merge input-group-alternative mb-3">'+
                    '<div class="input-group-prepend">'+
                    '<span class="input-group-text"><i class="ni ni-email-83"></i></span>'+
                    '</div>'+
                    '<input class="form-control" placeholder="Email" type="email">'+
                    '</div>'+
                '</div>'+
                '<div class="form-group">'+
                    '<div class="input-group input-group-merge input-group-alternative">'+
                    '<div class="input-group-prepend">'+
                        '<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>'+
                    '</div>'+
                    '<input class="form-control" placeholder="Password" type="password">'+
                    '</div>'+
                '</div>'+
                '<div class="text-muted font-italic"><small>password strength: <span class="text-success font-weight-700">strong</span></small></div>'+
                '<div class="row my-4">'+
                    '<div class="col-12">'+
                    '<div class="custom-control custom-control-alternative custom-checkbox">'+
                        '<input class="custom-control-input" id="customCheckRegister" type="checkbox">'+
                        '<label class="custom-control-label" for="customCheckRegister">'+
                        '<span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>'+
                        '</label>'+
                    '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="text-center">'+
                    '<button type="button" class="btn btn-primary mt-4">Create account</button>'+
                '</div>'+
                '</form>'+
            '</div>'+
            '</div>'+
        '</div>'+
        '</div>'+
    '</div>'+
    '</div>';
    $(".detail").html(html);
    });
});
<div class="col-xl-3 col-md-6">
<div class="card card-stats">
  <div class="card-body">
    <div class="row">
      <div class="col">
       </div>
    </div>
  </div>
</div>
</div>