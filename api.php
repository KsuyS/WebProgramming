<?php

require_once "database.php";

$method = $_SERVER['REQUEST_METHOD'];
echo $method;

if ($method != "POST") {
  echo "Ожидался другой метод";
} else {
  $dataAsJson = file_get_contents("php://input");
  $dataAsArray = json_decode($dataAsJson, true);
  saveImage($dataAsArray['image_post']);
  $conn = createDBConnection();
  addPost($dataAsArray, $conn);
  closeDBConnection($conn);
}

function saveImage(string $imageBase64)
{
  $imageBase64Array = explode(';base64,', $imageBase64);
  $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
  $imageDecoded = base64_decode($imageBase64Array[1]);
  saveFile("images/my-new-post.{$imgExtention}", $imageDecoded);
}

function saveFile(string $file, string $data): void
{
  $myFile = fopen($file, 'w');
  if ($myFile) {
    $result = fwrite($myFile, $data);
    if ($result) {
      echo 'Данные успешно сохранены в файл';
    } else {
      echo 'Произошла ошибка при сохранении данных в файл';
    }
    fclose($myFile);
  } else {
    echo 'Произошла ошибка при открытии файла';
  }

  function addPost(array $dataAsArray, $conn): void
  {
    $title = $dataAsArray['title'] ?? null;
    $subtitle = $dataAsArray['subtitle'] ?? null;
    $image_post = "http://localhost/images/my-new-post.jpg";
    $content = $dataAsArray['content'] ?? null;
    $author = $dataAsArray['author'] ?? null;
    $publish_date = $dataAsArray['publish_date'] ?? null;
    $author_url = $dataAsArray['author_url'] ?? null;
    $image_author = "http://localhost/images/william-wong.png";
    $featured = $dataAsArray['featured'] ?? null;
    $class = $dataAsArray['class'] ?? null;
    $sql = "INSERT INTO post(title, subtitle, image_post, content, author, publish_date, author_url, image_author, featured, class) 
    VALUES ('$title', '$subtitle', '$image_post', '$content', '$author', '$publish_date', '$author_url', '$image_author', $featured, '$class')";
    $conn->query($sql);
  }

}