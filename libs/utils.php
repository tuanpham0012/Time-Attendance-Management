<?php

function query($conn, $arr, $tbl, $param = '')
{
    $sql = "SELECT $arr FROM $tbl $param";
    $res = mysqli_query($conn, $sql);
    while ($rows = mysqli_fetch_assoc($res)) {
        $result[] = $rows;
    }
    if (isset($result)) {
        return $result;
    } else {
        return null;
    }
}

function countQuery($conn, $arr, $tbl, $param = '')
{
    $sql = "SELECT $arr FROM $tbl $param";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        return mysqli_num_rows($res);
    } else {
        return 0;
    }
}


function update($conn, $tbl, $value, $param){
    $sql = "UPDATE $tbl SET $value $param";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        return true;
    } else {
        return false;
    }
}


function insert($conn, $tbl, $col, $val){
    $sql = "INSERT INTO $tbl ($col) VALUES ($val)";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        return true;
    } else {
        return false;
    }
}

function delete($conn, $tbl, $param){
    $sql = "DELETE FROM $tbl $param";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        return true;
    } else {
        return false;
    }
}


function formatDate($date, $is_full = true)
{
    if ($date) {
        if ($is_full) {
            return date('d/m/Y H:i:s', strtotime($date));
        }
        return date('d/m/Y', strtotime($date));

    } else {
        return null;
    }

}

function lastday($month = '', $year = '') {
    if (empty($month)) {
       $month = date('m');
    }
    if (empty($year)) {
       $year = date('Y');
    }
    $result = strtotime("{$year}-{$month}-01");
    $result = strtotime('-1 second', strtotime('+1 month', $result));
    return date('Y-m-d', $result);
}


function paginate($base_url, $total, $page_index = 1, $page_size = 2)
{
    $link = '';
    $index = 1;
    $btn_next = '>';
    $btn_last = '>|';
    $btn_previous = '<';
    $btn_first = '|<';

    if ($total > 0 && $page_index >= 1 && $page_size >= 1) {
        $pages = ceil($total / $page_size);

        // Previous page
        if ($page_index > 1) {
            $link .= '<a class="pms-page" href="' . $base_url . '&page=1">' . $btn_first . '</a>';
            $link .= '<a class="pms-page" href="' . $base_url . '&page=' . ($page_index - 1) . '">' . $btn_previous . '</a>';
        }

        if ($pages <= 10) {
            for ($index = 1; $index <= $pages; $index++) {
                if ($index == $page_index) {
                    $link .= '<span class="pms-page-current">' . $index . '</span>';
                } else {
                    $link .= '<a class="pms-page" href="' . $base_url . '&page=' . $index . '">' . $index . '</a>';
                }
            }
        } else {
            if ($page_index <= 5) {
                for ($index = 1; $index <= 5; $index++) {
                    if ($index == $page_index) {
                        $link .= '<span class="pms-page-current">' . $index . '</span>';
                    } else {
                        $link .= '<a class="pms-page" href="' . $base_url . '&page=' . $index . '">' . $index . '</a>';
                    }
                }

                $link .= '...';

                $link .= '<a class="pms-page" href="' . $base_url . '&page=' . ($pages - 1) . '">' . ($pages - 1) . '</a>';
                $link .= '<a class="pms-page" href="' . $base_url . '&page=' . $pages . '">' . $pages . '</a>';
            } else if ($page_index > 5 && $page_index < ($pages - 4)) {
                $link .= '<a class="pms-page" href="' . $base_url . '&page=1">1</a>';
                $link .= '<a class="pms-page" href="' . $base_url . '&page=2">2</a>';
                $link .= '...';

                for ($index = ($page_index - 2); $index <= ($page_index + 2); $index++) {
                    if ($index == $page_index) {
                        $link .= '<span class="pms-page-current">' . $index . '</span>';
                    } else {
                        $link .= '<a class="pms-page" href="' . $base_url . '&page=' . $index . '">' . $index . '</a>';
                    }
                }

                $link .= '...';

                $link .= '<a class="pms-page" href="' . $base_url . '&page=' . ($pages - 1) . '">' . ($pages - 1) . '</a>';
                $link .= '<a class="pms-page" href="' . $base_url . '&page=' . $pages . '">' . $pages . '</a>';

            } else {
                $link .= '<a class="pms-page" href="' . $base_url . '&page=1">1</a>';
                $link .= '<a class="pms-page" href="' . $base_url . '&page=2">2</a>';
                $link .= '...';

                for ($index = ($pages - 4); $index <= $pages; $index++) {
                    if ($index == $page_index) {
                        $link .= '<span class="pms-page-current">' . $index . '</span>';
                    } else {
                        $link .= '<a class="pms-page" href="' . $base_url . '&page=' . $index . '">' . $index . '</a>';
                    }
                }
            }
        }

        // Next page
        if ($page_index < $pages) {
            $link .= '<a class="pms-page" href="' . $base_url . '&page=' . ($page_index + 1) . '">' . $btn_next . '</a>';
            $link .= '<a class="pms-page" href="' . $base_url . '&page=' . $pages . '">' . $btn_last . '</a>';
        }

    }

    return $link;
}


function sendEmailByGoogle($email_address, $subject, $content)
{
    require_once ('vendor/autoload.php');

    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = \PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'tuanpham310820@gmail.com';
        $mail->Password   = 'anhem12345';
        $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('tuanpham310820@gmail.com', 'LOTUS');
        $mail->addAddress($email_address, 'USER');     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->CharSet = 'UTF-8';
        $mail->send();

        return true;

    } catch (Exception $e) {
        return false;
    }

}