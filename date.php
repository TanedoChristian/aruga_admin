<?php

// Set Timezone
date_default_timezone_set('Asia/Manila');

// Display date format : Time / Day / Date
echo date("h:i:s A")."&emsp;".date("l")."&emsp;".date("m/d/Y");

// Refresh Button 
// echo '&emsp;
// <a href="index.php">
//     <button type="button" class="index_btn_refresh" name="submitSearch" id="submitSearch">
//         <i class="fa fa-refresh"></i>
//     </button>
// </a>';