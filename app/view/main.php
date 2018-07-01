<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $this->pageTitle; ?></title>
</head>
<body>
    <?= $this->partial(__DIR__ . '/layouts/header.php'); ?>
    <section role="main"><?= $this->yieldView(); ?></section>
    <?= $this->partial(__DIR__ . '/layouts/footer.php'); ?>
</body>
</html>
