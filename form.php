<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="semantic.yeti.min.css" text="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title></title>

  </head>
  <body>
    <div class=" ui container align-center">
      <h2>Create your account as vendor</h2>
      <p>All the given fields are mandatory</p>
      <form class="ui form align-center" id="vendorform" name="vendorform" method="POST">
      <div class="row content-justify-center">

        <div class="col-md-6 mt-3 align-center">
              <input type="text" class="form-control" id="firstname" placeholder="First Name *" name="firstname">
              <div class="text-danger firstname"></div>
        </div>

        <div class="col-md-6 mt-3 align-center">
              <input type="text" class="form-control" id="lastname" placeholder="Last name *" name="lastname" >
              <div class="text-danger lastname"></div>
        </div>

        <div class="col-md-12 mt-3 align-center">
              <input type="text" class="form-control" id="companytitle" placeholder="Company Title *" name="companytitle">
              <div class="text-danger companytitle"></div>
        </div>

        <div class="col-md-12 mt-3 align-center">
             <select class="form-control" id="companytype" name="companytype">
               <option selected="" value="">Company Type *</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
             </select>
             <div class="clearfix"></div>
             <div class="text-danger companytype"></div>
           
           <div class="clearfix"></div>
         </div>

        <div class="col-md-12 mt-3 align-center">
              <input type="text" class="form-control" id="location" placeholder="Location *" name="location">
               <div class="text-danger location"></div>
        </div>

        <div class="col-md-12 mt-3 align-center">
              <input type="text" class="form-control" id="mobilenumber" placeholder="Mobile Number *" name="mobilenumber">
              <div class="text-danger mobilenumber"></div>
        </div>

        <div class="col-md-12 mt-3 align-center">
             <input type="text" class="form-control" id="email" placeholder="Business email *" name="email">
             <div class="text-danger email"></div>
           </div>

           <div class="col-md-12 mt-3 align-center">
             <input type="password" class="form-control" id="password" placeholder="Create your password *" name="password">
             <div class="text-danger password
             "></div>
           </div>

           <div class="g-recaptcha m-2"
           data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR">
         </div>

         <p style="text-align: center; m-2">By Clicking "CREATE ACCOUNT" , you agree to the terms of use and privacy policies</p>

         <button type="submit" class="ui submit button  m-2 align-center">CREATE ACCOUNT</button>

        </div>
      </form>
    </div>
  </body>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <script>
 $(function () {

        $('#vendorform').on('submit', function (e) {

          e.preventDefault();
var error = 0;
var firstname = $("#firstname").val();
if(firstname==""){
  error = 1;
  $(".firstname").show();
  $(".firstname").html("Please enter Firstname");
} else {
  $(".firstname").hide();
}

var lastname = $("#lastname").val();
if(lastname==""){
  error = 1;
  $(".lastname").show();
  $(".lastname").html("Please enter Lastname");
} else {
  $(".lastname").hide();
}

var companytitle = $("#companytitle").val();
if(companytitle==""){
  error = 1;
  $(".companytitle").show();
  $(".companytitle").html("Please enter Companytitle");
} else {
  $(".companytitle").hide();
}

var companytype = $("#companytype").val();
if(companytype==""){
  error = 1;
  $(".companytype").show();
  $(".companytype").html("Please select companytype");
} else {
  $(".companytype").hide();
}

var location = $("#location").val();
if(companytype==""){
  error = 1;
  $(".location").show();
  $(".location").html("Please enter location");
} else {
  $(".location").hide();
}

var mobilenumber = $("#mobilenumber").val();
if(mobilenumber==""){
  error = 1;
  $(".mobilenumber").show();
  $(".mobilenumber").html("Please enter location");
}else if(mobilenumber.length<10){
  $(".mobilenumber").show();
  $(".mobilenumber").html("Please enter atlest 10 character long");
} else {
  $(".mobilenumber").hide();
}

var email = $("#email").val();
if(email==""){
  error = 1;
  $(".email").show();
  $(".email").html("Please enter email");
} else if(IsEmail(email)==false){
  error = 1;
  $(".email").show();
  $(".email").html("invalid email");
            }else {
  $(".email").hide();
}

var password = $("#password").val();
if(password==""){
  error = 1;
  $(".password").show();
  $(".password").html("Please enter password");
}else if(mobilenumber.length<10){
  $(".password").show();
  $(".password").html("Please enter atlest 6 character long");
} else {
  $(".password").hide();
}
var formData = new FormData(this);
console.log(formData);
if(error==0){
            $.ajax({
              type: 'post',
            url: 'ajax/post.php',
            data: $('form').serialize(),
            success: function (data) {
              if(data==1){
                alert('form was submitted');
                $('#vendorform')[0].reset();
              }else{
                alert('error');
              }
              
            }
          });
}
        });

      });
      function IsEmail(email) {
       var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
       if(!regex.test(email)) {
          return false;
       }else{
          return true;
       }
     }
 </script>
</html>
