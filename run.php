<?php
$upload_dir = "uploads/";
$files = glob($upload_dir . "*.tar.gz");

if (count($files) > 0) {
    $latest_file = end($files);
    $extract_dir = "extracted/";

    // Ekstrak file
    shell_exec("mkdir -p $extract_dir && tar -xzf $latest_file -C $extract_dir");

    // Jalankan NoVNC Server
    shell_exec("websockify -D --web=/usr/share/novnc 6080 localhost:5901");

    echo "NoVNC dijalankan. Akses di: <a href='http://localhost:6080/vnc.html'>Klik Disini</a>";
} else {
    echo "Tidak ada file .tar.gz untuk diekstrak.";
}
?>
