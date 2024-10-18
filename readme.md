# <img src="public/favicon.ico" alt="Иконка!" align="left">

Собственный блог на PHP (Symfony).

[vovan.veliona.no](https://vovan.veliona.no)

# Установка

Установка проста: нужно всего лишь установить Composer, LAMP и склонировать репозиторий:

```
git clone https://github.com/cheburashka777/blog-symfony
```

Затем нужно настроить Apache: в конфигурационном файле в строке `DirectoryIndex` прописать путь к файлу `public/index.php`. Если у вас нет доступа к конфигу, переместите .htaccess из папки public в корень проекта и измените упоминания `index.php` на `public/index.php`.

**Вот и всё!**
