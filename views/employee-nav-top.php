<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">           
            <ul class="navbar-nav mr-auto">
            </ul>

            <ul class="navbar-nav ml-auto">
            <?php
                $date = new DATETIME('now', new DATETIMEZONE('Asia/Kathmandu'));

                if (isset($_SESSION['logged_emp_id'])){?>
                    <li class="nav-item nav-link text-muted"><span><i class="fas fa fa-calendar"></i> </span><?php echo date('D, dS-M-Y'); ?></li>
                    <!-- <li class="nav-item nav-link text-muted"><span><i class="fas fa fa-clock"></i> </span><?php echo $date->format('H:i:s A'); ?></li> -->
                    <li class="nav-item nav-link text-muted"><i class="fas fa fa-clock"></i> <span id="date_time"></span></li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa fa-user"></i>
                            <?php echo $_SESSION['logged_emp_email'] ?><span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <!-- <a class="dropdown-item" href="profile"> Profile </a> -->
                            <a class="dropdown-item" href="change_password"> Change Password </a>
                            <a class="dropdown-item" href="logout"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                               Logout
                            </a>

                            <form id="logout-form" name="logout" action="logout" method="POST" style="display: none;">
                            </form>
                        </div>
                    </li>
                <?php } 
                else{ 
                    echo '<a class="nav-item nav-link" href="login"> Login </a>';
                }
            ?>
            </ul>
        </div>
    </div>
</nav>

<script type="text/javascript"> 
    function display_c(){
        var refresh=1000;
        mytime=setTimeout('display_ct()',refresh)
    }

    function display_ct() {
        var x = new Date()

        var hour=x.getHours();
        var minute=x.getMinutes();
        var second=x.getSeconds();
        var AmPm = hour >= 12 ? 'PM' : 'AM';

        if(hour <10 ){
            hour='0'+hour;
        }
        if (minute <10 ){
            minute='0' + minute;
        }
        if(second<10){
            second='0' + second; 
        }

        var x1 = hour+':'+minute+':'+second;
        document.getElementById('date_time').innerHTML = x1;
        display_c();
    }
</script>

<body onload=display_ct();></body>
