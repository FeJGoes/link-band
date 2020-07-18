<script type="text/javascript" src="<?=HOST.JS_DIR.'utils.js?v='.filemtime(JS_DIR.'utils.js')?>"></script>

<?php

if (!empty($this->js))
    foreach($this->js as $js)
        echo '<script type="text/javascript" src="'.HOST.$js.'?v='.filemtime($js).'"></script>';

?>