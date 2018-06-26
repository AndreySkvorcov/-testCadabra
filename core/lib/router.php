<?php

// принимаем не обработанный URI, возвращаяем массив с контроллером и методом
function getPartPath(string $uri)
{
    $path  = parse_url($uri, PHP_URL_PATH);
    $parts = array_diff(explode('/', $path), ['']);
    $parts = array_values($parts);

    return $parts;
}

// принимаем массив с контроллером и функцией, и опр существует ли запрашиваемая страница, если да то подключаем её, если нет возвращаем дефолтную страницу
function prepareParts(array $parts)
{
    $controller = BASE_DIR . '/app/controller/index/index.php';

    $parts[0] = $parts[0] ?? 'index';
    $parts[1] = $parts[1] ?? 'index';

    if (realpath($file = BASE_DIR . '/app/controller/' . $parts[0] . '/' . $parts[1] . '.php')) {
        $controller = $file;
    }

    return [
        'controller' => $controller,
        'method'     => 'index',
    ];
}

// обрабатываем урл и возвращаем страницу которую будем подключать
function router()
{
    $parts = getPartPath($_SERVER['REQUEST_URI']);
    $parts = prepareParts($parts);

    return $parts;
}
