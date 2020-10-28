<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Book;
use App\Author;

class BookManagementTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function a_book_can_be_added_to_the_library()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/books', $this->data());
        //$response->assertOk();
        $this->assertCount(1, Book::all());
        $response->assertRedirect('/books/' . Book::first()->id);
    }
    /** @test */
    public function a_title_is_required()
    {
        //$this->withoutExceptionHandling();

        $response = $this->post('/books', array_merge($this->data(), ['title' => '']));
        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_author_is_required()
    {
        //$this->withoutExceptionHandling();

        $response = $this->post('/books', array_merge($this->data(), ['author_id' => '']));
        $response->assertSessionHasErrors('author_id');
    }
    /** @test */
    public function a_book_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/books', $this->data());

        $book = Book::first();

        $response = $this->patch('/books/' . $book->id, [
            'title' => 'New Title',
            'author_id' => 'New Author'
        ]);
        $this->assertEquals('New Title', Book::first()->title);
        $this->assertEquals(2, Book::first()->author_id);
        $response->assertRedirect('/books/' . Book::first()->id);
    }
    /** @test */
    public function a_book_can_be_deleted() {
        #$this->withoutExceptionHandling();

        $response = $this->post('/books', $this->data());

        $book = Book::first();

        $this->assertCount(1, Book::all());

        $response = $this->delete('/books/' . $book->id);

        $this->assertCount(0, Book::all());
        $response->assertRedirect('/books');
    }

    /** @test */
    public function a_new_author_is_automatically_added() {
        $this->withoutExceptionHandling();

        $this->post('/books', [
            "title" => "Cool Book",
            'author_id' => 'Victor'
        ]);


        $book = Book::first();
        $author = Author::first();


        $this->assertEquals($author->id, $book->author_id);
        $this->assertCount(1, Author::all());
    }

    private function data() {
        return [
            "title" => "Cool Book Title",
            'author_id' => "NTN"
        ];
    }
}
