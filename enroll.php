<?php include("global.php");
include("$root/includes/header.php") ?>


        <!-- bradcam_area_start -->
        <div class="bradcam_area breadcam_bg overlay2">
                <h3>Enroll</h3>
            </div>
            <!-- bradcam_area_end -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
    
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Enroll</h2>
                        <?php if(isset($_SESSION['success'])){?>

                            <div class="alert alert-success">
                                <?= $_SESSION['success']; ?>
                                <?php unset($_SESSION['success']) ?>
                            </div>
                        <?php } ?>


                        <?php if(isset($_SESSION['queryError'])){?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['queryError']; ?>
                            <?php unset($_SESSION['queryError']) ?>
                        </div>
                        <?php } ?>


                        <?php if(isset($_SESSION['errors'])){?>
                            <div class="alert alert-danger">
                            <?php foreach($_SESSION['errors'] as $error){ ?>
                                <p class="mb-0"><?= $error; ?></p>
                            <?php } ?>
                            <?php unset($_SESSION['errors']) ?>   
                        </div>
                        <?php } ?>


                    </div>

                    

                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="<?= $url; ?>handlers/handle-enroll.php" method="post" >
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text"  placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email"  placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="phone" id="phone" type="phone" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="spec" id="spec" type="spec" placeholder="Speciality">
                                    </div>
                                </div>

                                <?php 
                                
                                    $sql = "select id, name from courses";
                                    $result = mysqli_query($conn, $sql);
        
                                    if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    } else {
                                        $courses = [];
                                    }
                                
                                ?>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="spec">Courses:</label>
                                        <select class="form-control valid" name="course_id" id="course_id">

                                        <?php foreach($courses as $course){ ?>

                                            <option value="<?= $course['id']; ?>"><?= $course['name']; ?></option>
                                        
                                        <?php } ?>
                                            
                                        </select>
                
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" name="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Buttonwood, California.</h3>
                                <p>Rosemead, CA 91770</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+1 253 565 2365</h3>
                                <p>Mon to Fri 9am to 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>support@colorlib.com</h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->
    
    <?php include("$root/includes/footer.php") ?>