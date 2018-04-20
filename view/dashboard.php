<body>
<?php use Jenssegers\Date\Date;

include '_topbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="musicfeed">
                <h1><i class="fa fa-clock-o"></i> Sound Feed</h1>
                <?php foreach ($musics

                               as $music) { ?>
                    <div class="music animated fadeInDown" data-src="<?php echo $music['file']; ?>">
                        <div class="row">
                            <div class="col-xs-2 col-sm-2 col-md-1 col-lg-1">
                                <div class="author">
                                    <?php
                                    $sql = "SELECT picture FROM users WHERE id = :id LIMIT 1";
                                    $req = $db->prepare($sql);
                                    $req->execute(array(
                                        ':id' => $music['user_id']
                                    ));
                                    $result = $req->fetch(PDO::FETCH_ASSOC);
                                    if (!empty($result)) {
                                        echo '<img class="" src="' . $result['picture'] . '" alt="">';
                                    } else {
                                        echo '<img src="view/profil_pic/undefined.jpg" alt=""></a>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-xs-10 col-sm-10 col-md-11 col-lg-11">
                                <div class="pull-right">
                                    <ul class="list-inline actionicon">
                                        <?php if ($music['user_id'] == $_SESSION['id']) {
                                            echo '<li><a href="edit.php?id=' . $music['id'] . '&&user_id=' . $music['user_id'] . '"><i class="fa fa-pencil"></i></a></li>';
                                            echo '<li><a href="delete.php?id=' . $music['id'] . '"><i class="fa fa-times"></i></a></li>';
                                        } ?>
                                    </ul>
                                </div>
                                <b class="username">Posté par <?php echo $music['username']; ?></b>
                                <h3 class="title">
                                    <?php echo $music['title']; ?>
                                </h3>
                                <p class="clearfix">
                                    <small class="date pull-right">
                                        <i class="fa fa-clock-o"></i> <?php echo $music['created_at']; ?></small>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <strong>Tags:</strong>
                            <?php
                            $artistName = getArtistWithMusicName($music['title']);
                            $tags = getTagsByArtist($artistName);
                            displayTagsByArtist($tags);
                            ?>

                            <form class='comments' method='POST' action='comments.php' style="margin-bottom: 25px; margin-top: 25px">
                                <input type='hidden' name='userid' value='<?php echo $_SESSION['id']; ?>'>
                                <input type='hidden' name='musicid' value='<?php echo $music['id']; ?>'>
                                <textarea class="form-control" name='message' id='' cols='100' rows='4'
                                        placeholder='Écrire un commentaire'></textarea><br>
                                <button type='submit' name='commentSubmit' class='btn btn-success'>Ajouter un
                                    commentaire
                                </button>
                            </form>


                            <?php
                            $comments = getComments($db, $music['id']);
                            if (!empty($comments)) :
                                foreach ($comments as $row) : ?>
                                    <p><?php echo $row['message']; ?></p>
                                    <p><small>
                                        Message posté par .. le <?php $date = new Date($row['date']);
                                        echo $date->format('l j F Y H:i:s'); ?>
                                    </small></p>
                                    <hr>

                                <?php endforeach; endif; ?>
                        </div>
                    </div>
                    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
                    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                    <!------ Include the above in your HEAD tag ---------->

                <?php } ?>
            </div>
        </div>
    </div>
</div>
</div>
</body>


