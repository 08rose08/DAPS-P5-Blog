<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<h1>Hello world</h1>
<p>Aujourd'hui nous sommes le <?php echo date('d/m/Y h:i:s'); ?>.</p>
<a href='index.php?action=getPosts'>-> Les posts</a>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>