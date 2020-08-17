<?php
session_start();
include '../controllers/editor.php';
(new Editor())->process_content();
