<?php

echo password_hash('88888888',PASSWORD_DEFAULT);
echo '<br>';
echo password_hash('88888888',PASSWORD_DEFAULT);
echo '<br>';
echo password_hash('88888888',PASSWORD_DEFAULT);
echo '<br>';
/*
$2y$10$EbcnQURFjRs6ZYrZ055GIesbaAAE2f0Z5Mi1o1xF6F5wMjZ9gX9Qu
$2y$10$HWpOsls91DeWe.4PMdFNV.rd4.FwjS3rMTXUwzaCkwaOGCpuPmU8W
$2y$10$b56j5wc3WrITAuvatV2/wuUb5uN3pMYOuBdjdWzRKrvYx/H0QwVg.
*/

$hash = '$2y$10$yUSs.WAbHVlwsog3PEONzO2MgcXiMLvP8O7w/MxGfBoHFkj7/R67i';
echo password_verify('88888888', $hash)? 'yes':'no';

?>