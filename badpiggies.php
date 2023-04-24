<?php
/**
 * Copyright (C) 2002 - 2023 Jaida Wu (MlgmXyysd) All rights reserved.
 * https://neko.ink/
 */
$k=base64_decode("R6BnRbBzsifR9TqQLXMYlF7V5Q1VNugFYp0uKB9AbHE=");$i=base64_decode("qdKm9JjeDLKxP0qg+yhOJA==");if(isset($argv[1])&&$argv[1]==="d"){$d=file_get_contents("Progress.dat");if(bin2hex(substr($d,0,20))!==sha1(substr($d,20))){echo("Warn: Progress profile hash mismatch.".PHP_EOL);}file_put_contents("Progress.xml",openssl_decrypt(substr($d,20),"AES-256-CBC",$k,OPENSSL_RAW_DATA,$i));file_put_contents("Progress.dat.bak",$d);}elseif(isset($argv[1])&&$argv[1]==="e"){$d=openssl_encrypt(file_get_contents("Progress.xml"),"AES-256-CBC",$k,OPENSSL_RAW_DATA,$i);file_put_contents("Progress.dat",hex2bin(sha1($d)).$d);}else{echo("Usage: badpiggies [d/e]".PHP_EOL);}