<?php

require_once "database.php";

$method = $_SERVER['REQUEST_METHOD'];
echo $method;

if ($method != "POST") {
  echo "Ожидался другой метод";
} else {
  $dataAsJson = file_get_contents("php://input");
  $dataAsArray = json_decode($dataAsJson, true);
  //saveImage($dataAsArray['image_post']);
  $conn = createDBConnection();
  addPost($dataAsArray, $conn);
  closeDBConnection($conn);
}

function saveImage(string $imageBase64, string $imageName)
{
  $imageBase64Array = explode(';base64,', $imageBase64);
  $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
  $imageDecoded = base64_decode($imageBase64Array[1]);
  saveFile("images/{$imageName}.{$imgExtention}", $imageDecoded);
  return "images/{$imageName}.{$imgExtention}";
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
}
function addPost(array $dataAsArray, $conn): void
{
  $title = $dataAsArray['title'] ?? null;
  $subtitle = $dataAsArray['subtitle'] ?? null;
  $authorName = $dataAsArray['authorName'] ?? null;
  $authorPhoto = saveImage($dataAsArray['authorPhoto'], $authorName);
  $datePost = $dataAsArray['datePost'] ?? null;
  $mainPostImage = saveImage($dataAsArray['mainPostImage'], $title);
  $content = $dataAsArray['content'] ?? null;
  $sql = "INSERT INTO post(title, subtitle, author, image_author, publish_date, image_post, content) 
    VALUES ('$title', '$subtitle', '$authorName', '$authorPhoto', '$datePost', '$mainPostImage', '$content')";
  $conn->query($sql);
}

