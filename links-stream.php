<?php

ob_start("ob_gzhandler");
echo file_get_contents('links-stream.json');