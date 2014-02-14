<!doctype html>
<html>
<head>
    <title>All Pages - Wayang CMS</title>
</head>
<body>
    <h2>All Pages</h2>
    <ul>
    <?php foreach($pages as $page): ?>
        <li><?php echo $page['page_title']; ?></li>
    <?php endforeach; ?>
    </ul>
</body>
</html>
