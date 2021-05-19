<?php /* include("includes/header.php");  */ ?>

<?php
//absolute path
/* include("C:/xampp/htdocs/workshop 2/coursegator-design/includes/header.php");*/
?>



<?php

include("global.php");

//absolute path
include("$root/includes/header.php");
?>




<!-- slider_area_start -->
<div class="slider_area ">
    <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-6 col-md-6">
                    <div class="illastrator_png">
                        <img src="assets/img/banner/edu_ilastration.png" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="slider_info">
                        <h3>Learn your <br>
                            Favorite Course <br>
                            From Online</h3>
                        <a href="all-courses.php" class="boxed_btn">Browse Our Courses</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider_area_end -->

<!-- about_area_start -->
<div class="about_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="single_about_info">
                    <h3>Over 7000 Tutorials <br>
                        from 20 Courses</h3>
                    <p>Our set he for firmament morning sixth subdue darkness creeping gathered divide our let god
                        moving. Moving in fourth air night bring upon you’re it beast let you dominion likeness open
                        place day great wherein heaven sixth lesser subdue fowl </p>
                    <a href="#" class="boxed_btn">Enroll a Course</a>
                </div>
            </div>

            <?php
            //courses count
            /* $sql = "select count(id) from courses";
            $result = mysqli_query($conn, $sql);
            $coursesCount = mysqli_fetch_row($result)[0]; */

            //Db class and makeuse of OOP connection
            $row = $db->selectOne("count(id) as coursesCount", "courses");
            $coursesCount = $row['coursesCount'];

            //tracks(categories) count
            /*  $sql = "select count(id) from cats";
            $result = mysqli_query($conn, $sql);
            $catsCount = mysqli_fetch_row($result)[0]; */

            //Db class and makeuse of OOP connection
            $row = $db->selectOne("count(id) as catsCount", "cats");
            $catsCount = $row['catsCount'];

            //enrollments(reservations) count
            /*  $sql = "select count(id) from reservations";
            $result = mysqli_query($conn, $sql);
            $reservesCount = mysqli_fetch_row($result)[0]; */

            //Db class and makeuse of OOP connection
            $row = $db->selectOne("count(id) as reservesCount", "reservations");
            $reservesCount = $row['reservesCount'];

            ?>


            <div class="col-xl-6 offset-xl-1 col-lg-6">
                <div class="about_tutorials">
                    <div class="courses">
                        <div class="inner_courses">
                            <div class="text_info">
                                <span><?= $coursesCount; ?>+</span>
                                <p> Courses</p>
                            </div>
                        </div>
                    </div>
                    <div class="courses-blue">
                        <div class="inner_courses">
                            <div class="text_info">
                                <span><?= $catsCount; ?></span>
                                <p> Tracks</p>
                            </div>

                        </div>
                    </div>
                    <div class="courses-sky">
                        <div class="inner_courses">
                            <div class="text_info">
                                <span><?= $reservesCount; ?>+</span>
                                <p> Enrollments</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about_area_end -->

<!-- popular_courses_start -->
<div class="popular_courses">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-100">
                    <h3>Latest Courses</h3>
                </div>
            </div>
        </div>
    </div>


    <?php

    /* $sql = "select courses.id as coursesId , courses.name as courseName, img, cats.name as catName from courses JOIN cats
                    on courses.cat_id = cats.id
                    ORDER by courses.id DESC
                    limit 3";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $latestCourses = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $latestCourses = [];
    } */


    //Db class and makeuse of OOP connection
    $latestCourses = $db->selectJoin(
        "courses.id as coursesId , courses.name as courseName, img, cats.name as catName",
        "courses JOIN cats",
        "courses.cat_id = cats.id",
        "ORDER by courses.id DESC limit 3"
    );

    ?>

    <div class="all_courses">
        <div class="container">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">

                        <?php foreach ($latestCourses as $course) { ?>

                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single_courses">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="uploads/courses/<?= $course['img']; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="courses_info">
                                        <span><?= $course['catName']; ?></span>
                                        <h3><a href="#"><?= $course['courseName']; ?></a></h3>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="col-xl-12">
                            <div class="more_courses text-center">
                                <a href="all-courses.php" class="boxed_btn_rev">More Courses</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popular_courses_end-->


<?php include("$root/includes/footer.php") ?>