<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
</head>
<body>
    <?php if ($this->session->userdata('fqc') === 'quality'): ?>
        <h1>Selamat datang, Anda memiliki akses sebagai Quality!</h1>
        <p>Session data: <?php echo $this->session->userdata('fqc'); ?></p>
    <?php else: ?>
        <h1>Akses ditolak. Anda tidak memiliki izin.</h1>
        <p>Session data: <?php echo $this->session->userdata('fqc'); ?></p>
    <?php endif; ?>
</body>
</html>
