<!DOCTYPE html>
<html>
<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
            border:1px solid #ccc;
        }
        .has-error
        {
            border-color:#cc0000;
            background-color:#ffff99;
        }
    </style>
</head>
<body>
<br />
<br />
<br />
<div class="container box">


    <form action = "/create" method = "POST">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <input type = "hidden" name="id" value = "{{$id}}">

        <div class="form-group">
            <label>Enter Your Name</label>
            <input type="text" name="stud_name" class="form-control" value="{{$name}}" />
        </div>
        <div class="form-group">
            <label>Enter Your Email</label>
            <input type="email" name="email" class="form-control" value="{{$email}}" />
        </div>
        <div class="form-group">
            <label>Enter Your Password</label><br>
            <b style="color: red;">Valid password should be Minimum 8 character's long and should have one special character.</b>

            <input type='password'  name='password' class="form-control" />

        </div>
        <div class="form-group">
            <input type="submit" name="send" class="btn btn-info" value="Accept" />
        </div>
    </form>

</div>
</body>
</html>

