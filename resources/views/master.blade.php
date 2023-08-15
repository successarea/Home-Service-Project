<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .nav-bar{
        margin-right:500px;
    }

    .login-reg{
        margin-left:230px;
        
    }
    .login-reg>li{
        list-style:none;
        margin-left: -50px;
    }

    .user-dropdown.show{
        /* margin-left: -60px; */
    }
    .img-item{
        height: 500px; !important
        
    }
    .slide-bg{
        background-color:darkgray;
    }

    .logout-ui {
        margin-right:50px;
        display: inline-flex;
    }

    .add-new-style {
        height:550px;
    }
    .service-form {
        margin-top:40px;
    }
    .detail-img{
        
        height:300px;
        width:500px;
    }

    .service-divider{
        border-bottom:2px solid #ccc;
        margin-bottom:20px;
        padding-bottom:20px;
        margin-top:20px;
    }
</style>
</head>
<body>
    
    {{ View::make('header') }}
    @yield('content')
    {{ View::make('footer') }}


    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</body>
</html>