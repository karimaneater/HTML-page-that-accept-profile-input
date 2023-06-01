$(document).ready(function(){
    
    $('#myForm').on('submit', function(e){
        e.preventDefault();
        $('#submit').attr('disabled', true);

          
            var name = $('#name').val();
            var email = $('#email').val();
            var contact = $('#contact').val();
            var birthday = $('#birthday').val();
            var age = $('#age').val();
            var gender = $('#gender').val();

            $(".error").text("");

            // Validate Name
            if (name === "") {
              $("#nameError").text("Name cannot be empty.").css('color', 'red');
              $("#name").css('border-color','red');
              
            }
            else{
              $("#name").css('border-color','green');
            }
    
            // Validate Email
            if (email === "") {
              $("#emailError").text("Email cannot be empty.").css('color','red');
              $("#email").css('border-color','red');
              
            }
            else if (!email.match((/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/))){
              $("#emailError").text("Please enter a valid email.").css('color','red');
              $("#email").css('border-color','red');
            }
            else{
              $("#email").css('border-color','green');
            }
    
            // Validate Phone Number
            if (contact.length !== 11) {
              $("#phoneError").text("Phone number should be 11 digits long.").css('color','red');
              $("#contact").css('border-color','red');
              
            }
            else {
              $("#contact").css('border-color','green');
            }
    
            // Validate Birthday
            if (birthday === "") {
              $("#birthdayError").text("Birthday cannot be empty.").css('color','red');
              $("#birthday").css('border-color','red');
              
            }
            else{
              $("#birthday").css('border-color','green');
            }
    
            // Validate Age
            if (age === "") {
              $("#ageError").text("Age cannot be empty.").css('color','red');
              $("#age").css('border-color','red');
             
            }
            else{
              $("#age").css('border-color','green');
            }
    
            // Validate Gender
            if (gender === "") {
              $("#genderError").text("Gender cannot be empty.").css('color','red');
              $("#gender").css('border-color','red');
              return; // Abort form submission
            }
            else{
              $("#gender").css('border-color','green');
            }
    
                
           
          // Proceed with AJAX request
          $.ajax({
            url: 'submit.php',
            type: 'POST',
            dataType : 'json',
            data:{
              name: name,
              email: email,
              contact: contact,
              birthday: birthday,
              age: age,
              gender: gender
          },

          
            success: function(response) {
                $('#submit').attr('disabled', false);
              // Handle successful response
              if (response.success === true){
                $('#submitted').text('Submitted successfully!').css('color','green');
              }
              else{
                $('#submitted').text('Submitted unsuccessfully!' + response.message).css('color','red');
                $("#gender").css('border-color','red');
                $("#age").css('border-color','red');
                $("#birthday").css('border-color','red');
                $("#email").css('border-color','red');
                $("#name").css('border-color','red');
                $("#contact").css('border-color','red');
              }
              
              
            },
            error: function(error) {
              // Handle error
              console.error(error);
            }
          });
    });
});


