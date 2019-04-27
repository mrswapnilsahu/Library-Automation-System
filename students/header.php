<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>ADMIN PANEL</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="../image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="../plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">ADMIN PANEL</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="../images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name">Administrator</div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="">
                        <a href="../">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="../book">
                            <i class="material-icons">book</i>
                            <span>Book</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            <i class="material-icons">school</i>
                            <span>Students</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="../issueRecords">
                            <i class="material-icons">list</i>
                            <span>Issue Records</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <div class="col-lg-12 col-sm-12">
                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="image-area">
                            <h3 style="color: #fff;">Major Project</h3>
                        </div>
                        <div class="content-area">
                            <br>
                            <p>Team members</p>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <ul>
                            <li>
                                <span>Rupendra Singh</span>
                                <span class="label bg-green">Designer</span>
                            </li>
                            <li>
                                <span>Anuj Rajak</span>
                                <span class="label bg-teal">Backend, Database</span>
                            </li>
                            <li>
                                <span>Swapnil Sahu</span>
                                <span class="label bg-blue">Backend, Frontend</span>
                            </li>
                            <li>
                                <span>Shubhan Choudhary</span>
                                <span class="label bg-red">Hardware</span>
                            </li>
                        </ul>
                        <a type="button" href="https://github.com/anujrajak/Library-Automation-Using-RFID" target="_blank" class="btn btn-info btn-block waves-effect">
                            <i class="material-icons">file_download</i>
                            <span>DOWNLOAD PROJECT</span>
                        </a>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>