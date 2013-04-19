<!doctype html>
<html lang="en">
<head>
    <link href="<?= URL::asset('stylesheets/vendor/bootstrap.min.css') ?>" rel="stylesheet" media="all" />
    <link href="<?= URL::asset('stylesheets/vendor/bootstrap-responsive.min.css') ?>" rel="stylesheet" media="all" />
    <link href="<?= URL::asset('stylesheets/main.css') ?>" rel="stylesheet" media="all" />
</head>
<body>

    <?= View::make('shared._main_nav') ?>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span6">
                <h3>Rum Forums</h3>
            </div>
            <div class="span6">
                <ul class="nav nav-pills">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Users</a></li>
                    <li><a href="#">Search</a></li>
                    <li><a href="#">My Profile</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </div>
        </div>
        <hr />
        <div class="row-fluid">
            <div class="span12">
                <?= $content ?>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="<?= URL::asset('javascripts/vendor/jquery.min.js') ?>"></script>
    <script src="<?= URL::asset('javascripts/vendor/bootstrap.min.js') ?>"></script>
    <script src="<?= URL::asset('javascripts/vendor/underscore.min.js') ?>"></script>
    <script src="<?= URL::asset('javascripts/vendor/backbone.min.js') ?>"></script>
    <script src="<?= URL::asset('javascripts/main.js') ?>"></script>
</body>
</html>
