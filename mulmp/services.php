<!DOCTYPE html>
<html>
    <head>
        <?php 
            $servername = "localhost";
            $username = "id1841175_micasacielo";
            $password = "micasa123";
            $databasename = "id1841175_micasacielodb";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $databasename) or die("Cannot connect to database");
        ?>

        <title>MiCasa Cielo</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!--Style Link-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">

        <!--Javascript & Jquery Link-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top navcolor">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">MiCasa Cielo</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about-us.html">About Us</a></li>
                        <li class="active"><a href="services.php">Services</a></li>
                        <li><a href="projects.html">Projects</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>   
                </div>
            </div>
        </nav>
        <section>
            <div class="container" style="margin-top: 100px;">
                <div class="row featurette">
                    <div class="col-md-5">
                        <h2 class="featurette-heading">Jumbo Package. <span class="text-muted">It'll blow your mind.</span></h2>
                        <p class="lead">
                            Jumbo package is where all the electronic devices in and outside your house can be controlled by a single touch.
                            This package is the most recommended by our experts! Worry no more when you forgot to switch OFF or switch ON
                            the lights or any other electronic devices inside or outside your house.
                        </p>
                    </div>
                    <div class="col-md-7">
                        <img class="featurette-image img-responsive center-block" src="s1.jpg" alt="Generic placeholder image" style="height: 400px; width: 800px;">
                    </div>
                </div> <!-- end of div for 1st features -->
                <hr>
                <br><br>
                <div class="row featurette">
                    <div class="col-md-5 col-md-push-7">
                        <h2 class="featurette-heading">Medium Package. <span class="text-muted">See for yourself.</span></h2>
                        <p class="lead">
                            In Medium package you'll feel the excitement to control all the devices inside
                            your house using your tab or smart phone with a single touch. I know it's hard to
                            believe right? But, that is invention! See for yourself at our stores!
                        </p>
                    </div>
                    <div class="col-md-7 col-md-pull-5">
                        <img class="featurette-image img-responsive center-block" src="s2.jpg" alt="Generic placeholder image">
                    </div>
                </div> <!-- end of div for 2nd features -->
                <hr>
                <br><br>
                <div class="row featurette">
                    <div class="col-md-5">
                        <h2 class="featurette-heading">Basic Package. <span class="text-muted">A package for idealist!</span></h2>
                        <p class="lead">
                            Basic package are for those who's looking for an economic modern house. The price is GREAT! It won't
                            covered the whole house but, hey! Your bedrooms would be really awesome with this modern facilities!
                        </p>
                    </div>
                    <div class="col-md-7">
                        <img class="featurette-image img-responsive center-block" src="s3.jpg" alt="Generic placeholder image" style="height: 400px; width: 800px;">
                    </div>
                </div> <!-- end of div for 3rd features -->

            </div> <!-- end of div for features container -->
            <div class="s-commentsec">
                <div class="container">
                    <div>
                        <p><h2>Leave a comment about our services</h2></p>
                        <br><br>
                        <div>
                            <?php

                                $sql = "SELECT * FROM comment_data";
                                $result = mysqli_query($conn, $sql);
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $date = date('d-m-Y', strtotime($row["date"])); //date format
                                        $name = $row["user_name"];
                                        $text = $row["text_input"];
                                        echo"
                                            <p><strong>".$name."</strong> &bull; ".$date."</p>
                                            <p><br>".$text."</p>
                                            <hr>
                                            <br><br>
                                        ";
                                    }
                                        
                                }
                            
                            ?>
                        </div>
                    </div>
                    <div style="margin-top: 50px;">
                        <p><h4>If you have something to say don't feel shy to leave a comment!</h4></p>
                        <br>
                        <form method="POST">
                            <input type="name" name="name-input" class="form-control" placeholder="Your Name">
                            <br>
                            <textarea name="text-input" class="form-control" cols="30" rows="10" placeholder="Write your comment here!"></textarea>
                            <br>
                            <button type="submit" name="comment-submit" class="btn btn-primary" style="float: right;">Comment</button>
                        </form>

                        <?php 
                            if(isset($_POST["comment-submit"])){
                                if(isset($_POST["name-input"])){
                                    if(isset($_POST["text-input"])){
                                        $u_name = $_POST["name-input"];
                                        $u_text = $_POST["text-input"];
                                        $u_date = date("Y-m-d");
                                        $sql1 = "INSERT INTO comment_data (user_name, text_input, date)
                                                 VALUES ('".$u_name."', '".$u_text."', '".$u_date."')";
                                        if(mysqli_query($conn,$sql1)){
                                            mysqli_close($conn);
                                            echo "<script language='javascript'>";
                                            echo "alert('Your comment has been posted!'); window.location='services.php';";
                                            echo "</script>";
                                        }
                                        else{
                                            echo "<script language='javascript'>";
                                            echo "alert('Failed to post your comment. Please try again.'); window.location='services.php';";
                                            echo "</script>";
                        
                                        }
                                    }
                                }
                                else{
                                    echo "<script language='javascript'>";
                                    echo "alert('Please Refill All The Forms'); window.location='services.php';";
                                    echo "</script>";
                                }
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
            
            
            
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>&reg; MiCasa Cielo.Co</strong></p>
                            <p>
                                If you have any problem, do not hesitate to <a href="contact.html">contact</a> us! Our teams are always
                                prepared for you!
                            </p>
                            <p>
                                <strong>Follow Us!</strong><br>
                                <a href="https://www.facebook.com/MiCasa-Cielo-257227188090412/"><img class="logo" src="fb-logo.png" alt="logo"></a>
                                <a href="https://www.instagram.com/micasacielo/?hl=en"><img class="logo" src="insta-logo.png" alt="logo"></a>
                                <a href="https://mobile.twitter.com/Micasacielo1"><img class="logo" src="twitter-logo.png" alt="logo"></a>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Important! Please Take Note!</strong></p>
                            <p>
                                This website was created only for academic purpose. All the information that are shown inside the website
                                is NOT REAL and NON-PURCHASEABLE. We will not take any responsibility for any misinformation from 
                                any users. Thank you for your time to take a survey on our website. Any inconvenient from our teams are fully regretted.
                            </p>
                            <p><strong>&copy; 2017, ECE241E6B, Multimedia System and Application Project 3: Website.</strong></p>
                        </div>
                    </div>
                </div>
            </footer>
        </section>
    </body>
</html>