<?php

session_destroy();
Header("Refresh: 0; URL = ?page=index");
echo 'Trwa wylogowywanie';
