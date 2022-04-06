<?php

declare(strict_types=1);

// Некий класс ответа на запрос из нашего фреймворка. Приведен просто для референса
class Response
{
    public function __construct(
        string $content,
        int $code
    ) {
    }

    // ...
}

class LogController
{
    private int $maxExecTime;

    public function __construct(
        int $maxExecTime = 1000
    )
    {
        $this->maxExecTime = $maxExecTime;
    }

    /**
     * Метод numberOfErrors возвращает в ответ json, со следующей структурой:
     * {
     *   "found_errors": <int>
     * }
     *
     * Он выполняется максимум X мс, которые мы можем задать в конфиге.
     * Он проходится по файлу log.txt и ищет там ошибки с кодом $errorCode.
     * Он возвращает количество найденных ошибок за период времени.
     *
     * На сервере для PHP процесса выделяется 250 mb памяти. Размер файла log.txt - 10gb
     * Файл расположен в корне (/log.txt), его содержимое:
     * <timestamp>;<error_code>
     */
    public function numberOfErrors(int $errorCode): Response
    {
        $startTime = microtime(true);

        $errorCounter = 0;

        foreach ($this->readFile('/log.txt') as $logString) {

            $logArray = explode(';', $logString);

            if(
                !empty($logArray[1])
                && $logArray[1] === $errorCode
            ) {
                $errorCounter++;
            }

            $execTime = microtime(true);
            if (($execTime - $startTime) * 1000 >= $this->maxExecTime) {
                break;
            }
        }

        $responseArray = [
            'found_errors' => $errorCounter,
        ];

        return new Response(json_encode($responseArray), 200);
    }

    private function readFile(string $path): iterable
    {
        $f = fopen($path, 'rb');
        if ($f === false) {
            throw new Exception('No such file');
        }

        while (!feof($f)) {
            yield fgets($f, 4096);
        }

        fclose($f);
    }
}
