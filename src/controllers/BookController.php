<?php

namespace src\controllers;

class BookController
{
    public function searchBooks(string $title)
    {
        $url = 'https://openlibrary.org/search.json?q='.urlencode($title);
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        $books = [];
        foreach ($data['docs'] as $doc) {
            $book = [
                'title' => $doc['title'],
                'author' => isset($doc['author_name'][0])
                            ? $doc['author_name'][0] : 'Autor desconhecido',

                'summary' => $doc['description'] ?? 'Resumo não fornecido',
            ];
            $books[] = $book;
        }

        return $books;
    }
}
