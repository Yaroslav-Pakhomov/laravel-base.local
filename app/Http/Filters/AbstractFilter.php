<?php

declare(strict_types = 1);

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter implements FilterInterface
{
    /**
     * @var array
     * Свойства по которым фильтруем
     */
    private array $queryParams;

    /**
     * AbstractFilter constructor.
     *
     * @param array $queryParams
     * Инициализируем параметры при вызове дочернего класса
     */
    public function __construct(array $queryParams)
    {
        $this->queryParams = $queryParams;
    }

    // Возвращается массив отфильтрованных данных, которые отфильтровываются по массиву методов where ('category_id', $data['category_id']).
    // Для каждого ключа свой Callback. Метод getCallbacks() возвращает массив этих "Callback"ов
    abstract protected function getCallbacks(): array;

    // После того как метод getCallbacks() вернул массив "Callback"ов здесь мы начинаем с ними работать.
    // Проверяем на наличие ключа $name в массиве $this->queryParams то,
    // вызываем метод call_user_func()
    /**
     * @param Builder $builder
     * @return void
     */
    public function apply(Builder $builder): void
    {
        $this->before($builder);

        foreach ($this->getCallbacks() as $name => $callback) {
            if (isset($this->queryParams[$name])) {
                call_user_func($callback, $builder, $this->queryParams[$name]);
            }
        }
    }

    /**
     * @param Builder $builder
     */
    protected function before(Builder $builder): void
    {
    }

    /**
     * @param string $key
     * @param mixed|null $default
     *
     * @return mixed
     */
    protected function getQueryParam(string $key, mixed $default = null): mixed
    {
        return $this->queryParams[$key] ?? $default;
    }

    /**
     * @param string[] $keys
     *
     * @return AbstractFilter
     */
    protected function removeQueryParam(string ...$keys): static
    {
        foreach ($keys as $key) {
            unset($this->queryParams[$key]);
        }

        return $this;
    }
}
