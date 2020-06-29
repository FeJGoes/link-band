<?php

if (!empty($this->js))
    foreach($this->js as $js)
        echo '<script type="text/javascript" src="'.HOST.$js.'?v='.filemtime($js).'"></script>';

?>