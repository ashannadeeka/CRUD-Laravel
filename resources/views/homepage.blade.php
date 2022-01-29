@extends('layouts.base')

@section('content')

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(51, 51, 51)">
    <div class="container">
        <a class="navbar-brand" href="#">CRUD App Laravel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex-flow: row-reverse;">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">New User</a></li>
                <li class="nav-item"><a class="nav-link ml-4" href="#!">View Users</a></li>
            </ul>
        </div>
    </div>
</nav>
<header class="py-3 bg-image-full" style="background-image: url('https://image.freepik.com/free-vector/blue-wall-with-spot-lights-background_52683-42963.jpg')">
    <div class="text-center my-5 pt-4">
    </div>
</header>
<section class="py-3">
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <h2>User Registration</h2>
                <hr>
                <form action="{{url('save-new-user')}}" method="POST" id="user_form">
                    @csrf
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="first_name" class="form-label">First name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                            </div>
                            <div class="col">
                                <label for="last_name" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>
                        </div>
                        <span id="name_err" class="form-text text-danger text-sm"></span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                        <span id="email_err" class="form-text text-danger text-sm"></span>
                    </div>
                    <div class="mb-3">
                        <label for="contact_number" class="form-label">Contact number</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="0711234567" required>
                        <span id="phone_err" class="form-text text-danger text-sm"></span>
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control col-6" id="dob" name="dob" required>
                        <span id="dob_err" class="form-text text-danger text-sm"></span>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label><br>
                        <select class="form-select col-2" name="gender">
                            <option value="male" selected>Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="con_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="con_password">
                        <span id="password_err" class="form-text text-danger text-sm"></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Role</label><br>
                        <select class="form-select col-2" name="role">
                            <option value="1" selected>User</option>
                            <option value="0">Admin</option>
                        </select>
                    </div>
                    <span id="overall_err" class="form-text text-danger text-sm"></span>
                    <hr>
                    <div class="mb-3">
                        <input type="button" class="btn btn-primary shadow px-2 col-3" value="Save" onclick="submitForm()">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
@section('additional-scripts')
<script>
function submitForm(){

    if( !$('#first_name').val() || !$('#last_name').val() ) {

        $('#name_err').text("Please enter your First name & Last name !");
        $('html, body').animate({
            scrollTop: $("#first_name").offset().top
        }, 500);

    }else if(!$('#email').val()){

        $('#name_err').text("");
        $('#email_err').text("Please enter the email !");
        $('html, body').animate({
            scrollTop: $("#first_name").offset().top
        }, 500);

    }else if(!$('#contact_number').val()){

        $('#name_err').text("");
        $('#email_err').text("");
        $('#phone_err').text("Please enter the contact number !");
        $('html, body').animate({
            scrollTop: $("#first_name").offset().top
        }, 500);

    }else if(!$('#dob').val()){

        $('#name_err').text("");
        $('#email_err').text("");
        $('#phone_err').text("");
        $('#dob_err').text("Please provide your date of birth !");
        $('html, body').animate({
            scrollTop: $("#first_name").offset().top
        }, 500);

    }else if(!$('#password').val()){

        $('#name_err').text("");
        $('#email_err').text("");
        $('#phone_err').text("");
        $('#dob_err').text("");
        $('#password_err').text("Please enter the password !");
        $('html, body').animate({
            scrollTop: $("#first_name").offset().top
        }, 500);

    }else if(!$('#con_password').val()){

        $('#name_err').text("");
        $('#email_err').text("");
        $('#phone_err').text("");
        $('#dob_err').text("");
        $('#password_err').text("Please enter the confirm password !");
        $('html, body').animate({
            scrollTop: $("#first_name").offset().top
        }, 500);

    }else if($('#password').val() !== $('#con_password').val()){

        $('#name_err').text("");
        $('#email_err').text("");
        $('#phone_err').text("");
        $('#dob_err').text("");
        $('#password_err').text("Passwords does not match !");
        $('html, body').animate({
            scrollTop: $("#first_name").offset().top
        }, 500);

    }else {
        $('#name_err').text("");
        $('#email_err').text("");
        $('#phone_err').text("");
        $('#dob_err').text("");
        $('#password_err').text("");

        var email = $('#email').val();

        $.ajax({
        url: "/check-email/"+email,
        type: 'GET',
        success: function(res) {
            console.log(res);

            if(res.count > 0){

                $('#overall_err').text("Entered email is already exists !!");

            }else {

                $('#overall_err').text("");
                $('#user_form').submit();
            }

        }
        });

    }
}
</script>
@endsection

