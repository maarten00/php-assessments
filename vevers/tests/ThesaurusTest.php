<?php declare(strict_types=1);
namespace Tests;

use PHPUnit\Framework\TestCase;
use \Vevers\DijAssessments\Thesaurus;

final class ThesaurusTest extends TestCase
{
    /** @var Thesaurus */
    protected $thesaurus;

    protected function setUp(): void
    {
        $exampleData = ["buy" => ["purchase"], "big" => ["great", "large"]];

        $this->thesaurus = new Thesaurus($exampleData);
    }

    /** @test */
    public function it_looks_up_existing_synonyms()
    {

        $this->assertEquals('{"word":"big","synonyms":["great","large"]}', $this->thesaurus->getSynonyms("big"));
    }

    /** @test */
    public function it_can_handle_words_without_synonyms()
    {
        $this->assertEquals('{"word":"fantastic","synonyms":[]}', $this->thesaurus->getSynonyms("fantastic"));
    }
}