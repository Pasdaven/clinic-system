<?php


class Core {

    public function jump() {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            require_once($decoded['controller']);
            $string =  implode(',', $decoded['parameter']);
            $data = $this->$decoded['method']($string);

            $result = json_encode($data);
        }

        header("Content-Type: application/json; charset=UTF-8");
        echo $result;
    }
}
