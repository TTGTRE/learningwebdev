<?php

function copyFile() {
    copy("myfile.txt", "myfile2.txt") or die("Could not copy file");
    echo "File copied to myfile2.txt";
}
