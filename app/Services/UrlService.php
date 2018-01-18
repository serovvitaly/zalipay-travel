<?php

namespace App\Services;


use App\Models\Url;

class UrlService
{
    /**
     * Проверка адресы url на наличие в БД
     * @param $slugs
     * @param \Closure $closure
     * @return bool
     */
    public function check($slugs, \Closure $closure)
    {
        $urlModel = Url::where('url', $slugs)->first();

        if (!$urlModel) {
            return false;
        }

        $closure->call($this, $urlModel);

        return true;
    }

    /**
     * Обработчик роута
     * @param Url $urlModel
     * @return string
     * @throws \Exception
     */
    public function handle(Url $urlModel)
    {
        if (!class_exists($urlModel->handler)) {
            throw new \Exception('Url handler class does not exists, ' . $urlModel->handler);
        }

        /** @var UrlHandlerInterface $handler */
        $handler = app()->make($urlModel->handler);

        if (!$handler instanceof UrlHandlerInterface) {
            throw new \Exception('Url handler does not implement UrlHandlerInterface');
        }

        return $handler->get($urlModel);
    }
}