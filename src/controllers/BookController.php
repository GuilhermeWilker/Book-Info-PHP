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

    public function searchByCategory(string $category)
    {
        $url = 'https://openlibrary.org/subjects/'.urlencode($category).'.json';
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        $works = $data['works'] ?? [];

        $books = [];
        foreach ($works as $work) {
            $book = [
                'title' => $work['title'],
                'authors' => [],
            ];

            if (isset($work['authors'])) {
                foreach ($work['authors'] as $author) {
                    $book['authors'][] = $author['name'];
                }
            }

            $books[] = $book;
        }

        return $books;
    }

    public function bookRecommendations()
    {
        $categories = ['love', 'action', 'fiction', 'science', 'filosophy', 'drama', 'adventure', 'romance', 'poem'];

        $randomCategory = $categories[array_rand($categories)];
        $url = 'https://openlibrary.org/search.json?subject='.urlencode($randomCategory);
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        $books = [];
        $count = 0;

        foreach ($data['docs'] as $doc) {
            $book = [
                'title' => $doc['title'],
                'author' => isset($doc['author_name'][0]) ? $doc['author_name'][0] : 'Autor desconhecido',
                'summary' => $doc['description'] ?? 'Resumo não fornecido',
            ];

            $books[] = $book;
            ++$count;

            if ($count >= 4) {
                break;
            }
        }

        return $books;
    }
}
