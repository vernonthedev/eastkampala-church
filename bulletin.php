<!DOCTYPE HTML>
<html class="no-js" lang="en">
<?php include "head.php";
include"config.php";?>
<body>

<div class="body">  
  <!-- Start Site Header -->
    <?php include "header.php";?>
  <!-- End Site Header -->
    <!-- Start Nav Backed Header -->
    <div class="nav-backed-header parallax" style="background-image:url(http://placehold.it/1280x635&amp;text=IMAGE+PLACEHOLDER);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Sabbath Bulletin</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Nav Backed Header -->
    <!-- Start Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Sabbath Bulletin</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Start Content -->
    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 posts-archive blog-full-width">
                        <article class="post">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <span class="post-meta meta-data"> <span><i class="fa fa-calendar"></i> This Sabbath</span><span><i class="fa fa-archive"></i> <a href="#">Uncategorized</a></span> <span><a href="#"><i class="fa fa-comment"></i> 12</a></span></span>
                                </div>
                                <div class="col-md-9 col-sm-9">
                                    <h2><a href="#">Order of Sabbath Worship</a></h2>
                                    <table class="table table-responsive">
                                        <thead>
                                        <tr>
                                            <th>Service Name</th>
                                            <th>Service Time</th>
                                            <th>About</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><strong>SONG SERVICE</strong></td>
                                            <td>8:00am - 9:00am</td>
                                            <td class="text-muted">Hymns to praise our God through Music</td>
                                        </tr>
                                        <tr>
                                            <td><strong>SABBATH SCHOOL</strong></td>
                                            <td>9:00am - 9:30am</td>
                                            <td class="text-muted">Reflecting on the work of the Gospel around the world</td>
                                        </tr>
                                        <tr>
                                            <td><strong>CHURCH AT STUDY</strong></td>
                                            <td>9:30am - 10:30am</td>
                                            <td class="text-muted">Weekly Lesson Study</td>
                                        </tr>
                                        <tr>
                                            <td><strong>SONG SERVICE AND PRAYER SESSION</strong></td>
                                            <td>10:30am - 10:50am</td>
                                            <td class="text-muted">Prayers, Hymns and praises in preparation for the divine worship. </td>
                                        </tr>
                                        <tr>
                                            <td><strong>DIVINE WORSHIP</strong></td>
                                            <td>10:50am - 12:30pm</td>
                                            <td class="text-muted">God is Present: Let us Worship Him</td>
                                        </tr>
                                        <tr>
                                            <td><strong>AFTERNOON PROGRAM</strong></td>
                                            <td>12:30pm - 6:00pm</td>
                                            <td class="text-muted">God is Present: Let us Worship Him</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <blockquote>Fellowship Lunch                                      12:30PM – 2:00 PM </blockquote>
                                    <blockquote>Caring and Sharing                                    2:00PM – 4:00 PM</blockquote>
                                    <blockquote>Outreach                                                 4:00PM – 5:00 PM</blockquote>
                                    <blockquote>Sundown, Tea and Departure                     5:00PM – 6:00 PM</blockquote>
                                </div>
                            </div>
                        </article>

                        <article class="post">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <span class="post-meta meta-data"> <span><i class="fa fa-calendar"></i> This Sabbath</span><span><i class="fa fa-archive"></i> <a href="#">Uncategorized</a></span> <span><a href="#"><i class="fa fa-comment"></i> 12</a></span></span>
                                </div>
                                <div class="col-md-9 col-sm-9">
                                    <h3><a href="#">DIVINE WORSHIP SERVICE LINEUP</a></h3>

                                    <?php
                                    $sql = "SELECT * FROM serving_team ORDER BY id DESC LIMIT 1";
                                    $run_query = $conn->prepare($sql);
                                    $run_query->execute();
                                    $rows = $run_query->fetchAll();
                                    foreach($rows as $row){
                                    ?>
                                    <table class="table table-responsive">
                                        <thead>
                                        <tr>
                                            <th>Service</th>
                                            <th>Service Theme</th>
                                            <th>Pulpit Team</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><strong>INTROIT</strong></td>
                                            <td>“Surely the Presence of the Lord Is in This Place” </td>
                                            <td class="text-muted"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#introit">Introit Song<i class="fa fa-long-arrow-right"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td><strong>CALL TO WORSHIP</strong></td>
                                            <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#call">Call to Worship<i class="fa fa-long-arrow-right"></i></a></td>
                                            <td class="text-muted"><?php echo $row->call_to_worship;?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>DOXOLOGY</strong></td>
                                            <td>Glory be to the Father</td>
                                            <td class="text-muted"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#dox">Doxology<i class="fa fa-long-arrow-right"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td><strong>INVOCATION</strong></td>
                                            <td></td>
                                            <td class="text-muted"><?php echo $row->invocation;?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>WELCOME AND INTRODUCTION</strong></td>
                                            <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#welcome">Welcome Song<i class="fa fa-long-arrow-right"></i></a></td>
                                            <td class="text-muted"><?php echo $row->welcome;?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>WELCOME SONG</strong></td>
                                            <td>Family of God</td>
                                            <td class="text-muted">Psalms: 34:3</td>
                                        </tr>
                                        <tr>
                                            <td><strong>OPENING SONG</strong></td>
                                            <td>Let's Praise and Worship the Lord</td>
                                            <td class="text-muted"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#opening">Opening Hymn<i class="fa fa-long-arrow-right"></i></a></td>
                                        </tr>

                                        <tr>
                                            <td><strong>PASTORAL PRAYER</strong></td>
                                            <td>Kneel Down and worship God</td>
                                            <td class="text-muted"><?php echo $row->pastoral;?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>PRAYER SONG</strong></td>
                                            <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#prayer">Prayer Song<i class="fa fa-long-arrow-right"></i></a></td>
                                            <td class="text-muted">Psalms:72:19</td>
                                        </tr>
                                        <tr>
                                            <td><strong>WORSHIP IN GIVING</strong></td>
                                            <td>Blessed be the name of the Lord</td>
                                            <td class="text-muted"><?php echo $row->worship;?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>SPECIAL MUSIC</strong></td>
                                            <td>SDAH 670(Congregation stands as Choristers bring in offerings)</td>
                                            <td class="text-muted"><?php echo $row->collection_music;?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>SCRIPTURE READING</strong></td>
                                            <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#mem">Memory Text<i class="fa fa-long-arrow-right"></i></a></td>
                                            <td class="text-muted"><?php echo $row->scripture;?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>SPECIAL MUSIC</strong></td>
                                            <td>SDAH 670(Congregation stands as Choristers bring in offerings)</td>
                                            <td class="text-muted"><?php echo $row->special_music;?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>SERMON</strong></td>
                                            <td>Sermon title</td>
                                            <td class="text-muted"><?php echo $row->sermon;?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>CLOSING SONG</strong></td>
                                            <td><?php echo $row->closing_song;?></td>
                                            <td class="text-muted"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#closing">Closing Hymn<i class="fa fa-long-arrow-right"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td><strong>BENEDICTION</strong></td>
                                            <td>Family of God</td>
                                            <td class="text-muted">Elder Jofram</td>
                                        </tr>
                                        <tr>
                                            <td><strong>SONG AFFIRMATION</strong></td>
                                            <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#affirm">Affirmation Song<i class="fa fa-long-arrow-right"></i></a></td>
                                            <td class="text-muted">Psalm 57:20-11</td>
                                        </tr>
                                        <tr>
                                            <td><strong>RECESSIONAL</strong></td>
                                            <td>Hymn Selected by Chorister</td>
                                            <td class="text-muted">Choristers</td>
                                        </tr>


                                        </tbody>
                                    </table>

                                    <?php
                                    }
                                    ?>


                                    <?php
                                    $sql = "SELECT * FROM songs ORDER BY id DESC LIMIT 1";
                                    $run_query = $conn->prepare($sql);
                                    $run_query->execute();
                                    $rows = $run_query->fetchAll();
                                    foreach($rows as $row){
                                    ?>
<!--INTROIT SECTION-->
                                            <div class="modal fade" id="introit" tabindex="-1" role="dialog" aria-labelledby="introit" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel">Introit</h4>
                                                        </div>
                                                        <div class="modal-body"><?php echo $row->introit; ?></div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default inverted" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
<!--                            CALL TO WORSHIP SECTION-->
                                <div class="modal fade" id="call" tabindex="-1" role="dialog" aria-labelledby="call" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Call To Worship</h4>
                                            </div>
                                            <div class="modal-body"><?php echo $row->call_to_worship; ?></div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default inverted" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!--DOXOLOGY-->
                            <div class="modal fade" id="dox" tabindex="-1" role="dialog" aria-labelledby="introit" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Doxology</h4>
                                        </div>
                                        <div class="modal-body"><?php echo $row->doxology; ?></div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default inverted" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
<!--                        WELCOME SONG-->
                    <div class="modal fade" id="welcome" tabindex="-1" role="dialog" aria-labelledby="introit" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Welcome Song</h4>
                                </div>
                                <div class="modal-body"><?php echo $row->welcome; ?></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default inverted" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--                OPENING HYMN-->
                <div class="modal fade" id="opening" tabindex="-1" role="dialog" aria-labelledby="introit" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Opening Hymn</h4>
                            </div>
                            <div class="modal-body"> <?php echo $row->opening; ?> </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default inverted" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--                PRAYER HYMN-->
            <div class="modal fade" id="prayer" tabindex="-1" role="dialog" aria-labelledby="introit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Prayer Song</h4>
                        </div>
                        <div class="modal-body"> <?php echo $row->prayer_song; ?></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default inverted" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--                MEM TEXT-->
        <div class="modal fade" id="mem" tabindex="-1" role="dialog" aria-labelledby="introit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Memory Text</h4>
                    </div>
                    <div class="modal-body"> <?php echo $row->memory_text; ?></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default inverted" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--                CLOSING HYMN-->
    <div class="modal fade" id="closing" tabindex="-1" role="dialog" aria-labelledby="introit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Closing Hymn</h4>
                </div>
                <div class="modal-body"> <?php echo $row->closing; ?> </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default inverted" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--                AFFIRMATION HYMN-->
<div class="modal fade" id="affirm" tabindex="-1" role="dialog" aria-labelledby="introit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Affirmation Hymn</h4>
            </div>
            <div class="modal-body"> <?php echo $row->affirmation; ?> </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default inverted" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
<?php
}
?>
                                </div>
                            </div>
                        </article>


                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Start Footer -->
    <?php include "footer.php";?>
  <!-- End Footer --> 
  <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a> 
</div>
<?php include "script.php";?>
</body>
</html>