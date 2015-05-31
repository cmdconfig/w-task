<?php
/**
 * Created by PhpStorm.
 * User: asm
 * Date: 5/26/15
 * Time: 8:49 PM
 */

class NamespaceAutoloader
{

    /**
     * карта для соответствия неймспейса пути в файловой системе
     * @var array
     */
    protected $namespacesMap = array();

    /**
     * Метод подгрузки Namespac
     * @param $namespace
     * @param $rootDir
     * @return bool
     */
    public function addNamespace($namespace, $rootDir)
    {
        if (is_dir($rootDir)) {
            $this->namespacesMap[$namespace] = $rootDir;
            return true;
        }


        return false;
    }

    /**
     * Метод регистрации автолодера
     */
    public function register()
    {
        spl_autoload_register(array($this, 'autoload'));
    }

    /**
     * Метод регистрации класса
     * @param $class
     * @return bool
     */
    protected function autoload($class)
    {

        $pathParts = explode('\\', $class);

        if (is_array($pathParts)) {
            $namespace = array_shift($pathParts);

            if (!empty($this->namespacesMap[$namespace])) {
                $filePath = $this->namespacesMap[$namespace] . '/' . implode('/', $pathParts) . '.php';
                require_once strtolower($filePath);
                return true;
            }
        }

        return false;
    }

}