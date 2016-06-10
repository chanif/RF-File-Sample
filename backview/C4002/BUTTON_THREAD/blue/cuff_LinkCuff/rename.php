<?php
function rename_win($oldfile,$newfile) {
    if (!rename($oldfile,$newfile)) {
        if (copy ($oldfile,$newfile)) {
            unlink($oldfile);
            return TRUE;
        }
        return FALSE;
    }
    return TRUE;
}

if ($handle = opendir('.')) {
    while (false !== ($fileName = readdir($handle))) {
        $newName = str_replace("thread_","",$fileName);
        rename_win($fileName, $newName);
    }
    closedir($handle);
}
?>