<?php

require_once("../../model/book.php");

$Book = new Book();

if (isset($_POST["register"])) {
    $register = $_POST["register"];
    $patient_name = $register[0];
    $id_num = $register[1];
    $email_address = $register[2];
    $doc_id = $register[3];
    $time = date("Y-m-d H:i:s");

    $Book->createBook($patient_name, $id_num, $email_address, $doc_id, $time);
    $book_url = $Book->generateUrl($id_num, $time);

    header("Location: ./bookComplete.html");
    echo json_encode($book_url);
    // echo '掛號成功';
    // echo '<br>';
    // echo 'link: ';
    // echo '<a href="/clinic-system/app/book/history.php?book_url=' . $book_url . '" target="_blank">localhost/clinic-system/app/book/history.php?book_url=' . $book_url . '</a>';
}