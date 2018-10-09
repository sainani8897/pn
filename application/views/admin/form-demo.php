<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

    <form>
        <input type="text" name="email" data-validation="email" id='email'>
        <input type="submit" name="" value="submit">
    </form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    alert('Hi');
      $("#email").on('change',function() {
        var mob_or_email = $("#email").val(); 
        alert(mob_or_email);
         if (validateEmail(mob_or_email) || validatePhone(mob_or_email)) {
             alert(validateEmail(mob_or_email)+' '+validatePhone(mob_or_email));

          }
          else{
            alert('Not a valid Email/Phone');
          }
        //alert(validateEmail(mob_or_email)+' '+validatePhone(mob_or_email));
          function validateEmail(email) {
         var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
      return re.test(email);
  }
function validatePhone(phone) {
    var re = /^[6-9]\d{9}$/;
    return re.test(phone);
}

      });
      
   });


   
</script>

<form action="" method="post">
    <p>
      <input type="text" data-validation="even_number">
      <input type="submit" name="" value="submit">
    </p>
    ...
  </form>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
 
// Add custom validation rule
$.formUtils.addValidator({
  name : 'even_number',
  validatorFunction : function(value, $el, config, language, $form) {
   // return parseInt(value, 10) % 2 === 0;

   if (validateEmail(value) || validatePhone(value)) {
             return true;
          }
          else{
            return false;
          }
    function validateEmail(email) {
         var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
      return re.test(email);
  }
function validatePhone(phone) {
    var re = /^[6-9]\d{9}$/;
    return re.test(phone);
}
  },
  errorMessage : 'You have to answer with an even number',
  errorMessageKey: 'badEvenNumber'
});
 
// Setup form validation
$.validate();
 
</script>
</body>
</html>