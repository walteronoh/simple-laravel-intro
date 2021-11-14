<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $date;
    public $excerpt;
    public $body;
    public $slug;

    public function __construct($title, $date, $excerpt, $body, $slug)
    {
        $this->title = $title;
        $this->date = $date;
        $this->excerpt = $excerpt;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()
    {
        //Collect all the files in one container
        //Cache them to save on resources
        return cache()->rememberForever('posts.all', fn() => collect(File::files(resource_path("posts/")))
        //Get the files metadata
        ->map(fn ($file) => YamlFrontMatter::parseFile($file))
        //Return them as per their poreperties
        ->map(fn ($document) => new Post($document->title, $document->date, $document->excerpt, $document->body(), $document->slug))
        //Sort the files by modification date
        ->sortBy('date'));
        //Sorting in Descending order
        // -> sortByDesc('date);

        // $files = File::files(resource_path("posts/"));
        // //Get front data using Yaml Front Matter
        // $document = [];
        // foreach ($files as $file) {
        //     $document[] = YamlFrontMatter::parseFile($file);
        // }
        // //Map over the files
        // return array_map(fn ($doc) => $doc->body(), $document);
    }

    public static function find($slug)
    {
        // //Enter the path for the file
        // $path = resource_path("posts/$slug.html");
        // //If file path does not exist, throw an exception
        // if (!file_exists($path)) {
        //     //You can return an error 404 not found
        //     //abort(404);
        //     //or a model exception
        //     throw new ModelNotFoundException();
        // }
        // //Else return the file contents
        // //The contents are cached
        // return cache()->remember("path{$slug}", 1200, fn () => file_get_contents($path));
        return static::all()->firstWhere('slug', $slug);
    }
}

//Using tinker to check on caching
// Run : php artisan tinker
// cache('Key you used when caching')
// To clear the caching data,
// Run : cache()->forget('Key used when caching');