<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=HOST.IMGS_DIR?>linkeband.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?=HOST.CSS_DIR?>variables.css<?='?v='.filemtime(BASE_DIR.CSS_DIR.'variables.css')?>">
    <link rel="stylesheet" href="<?=HOST.CSS_DIR?>header.css<?='?v='.filemtime(BASE_DIR.CSS_DIR.'header.css')?>">
    <link rel="stylesheet" href="<?=HOST.CSS_DIR?>footer.css<?='?v='.filemtime(BASE_DIR.CSS_DIR.'footer.css')?>">
    <?php

    if (!empty($this->css))
        foreach($this->css as $css)
            echo ' <link rel="stylesheet" type="text/css" href="'.HOST.$css.'?v='.filemtime($css).'">';

    ?>
    
    <link rel="stylesheet" href="<?=HOST.LIBS_DIR?>Uikit@3.2.3/css/uikit.min.css" />
    <script src="<?=HOST.LIBS_DIR?>Uikit@3.2.3/js/uikit.min.js"></script>
    <script src="<?=HOST.LIBS_DIR?>Uikit@3.2.3/js/uikit-icons.min.js"></script>
    
    <title><?=$title?></title>
</head>