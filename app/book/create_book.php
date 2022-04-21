<?php

require_once("../../model/book.php");

$Book = new Book();

$data = json_decode(file_get_contents('php://input'), true);

$time = date("Y-m-d H:i:s");

$Book->createBook($data['parameter']['name'], $data['parameter']['id_num'], $data['parameter']['email'], $data['parameter']['doc_id'], $time);
$book_url = $Book->generateUrl($data['parameter']['id_num'], $time);

echo $book_url;
// echo '掛號成功';
// echo '<br>';
// echo 'link: ';
// echo '<a href="/clinic-system/app/book/history.php?book_url=' . $book_url . '" target="_blank">localhost/clinic-system/app/book/history.php?book_url=' . $book_url . '</a>';